<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Location\Repositories\Eloquent\CityRepository;
use Botble\Location\Repositories\Interfaces\CityInterface;
use Botble\RealEstate\Http\Requests\SendConsultRequest;
use Botble\RealEstate\Models\Category;
use Botble\RealEstate\Models\Consult;
use Botble\RealEstate\Models\Project;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
use Botble\RealEstate\Repositories\Interfaces\ConsultInterface;
use Botble\RealEstate\Repositories\Interfaces\CurrencyInterface;
use Botble\RealEstate\Repositories\Interfaces\ProjectInterface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use EmailHandler;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use RvMedia;
use SeoHelper;
use SlugHelper;
use Theme;
use Throwable;

class PublicController extends Controller
{

    /**
     * @param SendConsultRequest $request
     * @param BaseHttpResponse $response
     * @param ConsultInterface $consultRepository
     * @param PropertyInterface $propertyRepository
     * @param ProjectInterface $projectRepository
     * @return BaseHttpResponse
     * @throws Throwable
     */
    public function postSendConsult(
        SendConsultRequest $request,
        BaseHttpResponse $response,
        ConsultInterface $consultRepository,
        PropertyInterface $propertyRepository,
        ProjectInterface $projectRepository
    ) {
        try {
            /**
             * @var Consult $consult
             */
            $consult = $consultRepository->getModel();

            $sendTo = null;
            $link = null;
            $subject = null;

            if ($request->input('type') == 'project') {
                $request->merge(['project_id' => $request->input('data_id')]);
                $project = $projectRepository->findById($request->input('data_id'));
                if ($project) {
                    $link = $project->url;
                    $subject = $project->name;
                }
            } else {
                $request->merge(['property_id' => $request->input('data_id')]);
                $property = $propertyRepository->findById($request->input('data_id'), ['author']);
                if ($property && $property->author->email) {
                    $sendTo = $property->author->email;
                    $link = $property->url;
                    $subject = $property->name;
                }

            }

            $consult->fill($request->input());
            $consultRepository->createOrUpdate($consult);

            EmailHandler::setModule(REAL_ESTATE_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'consult_name'    => $consult->name ?? 'N/A',
                    'consult_email'   => $consult->email ?? 'N/A',
                    'consult_phone'   => $consult->phone ?? 'N/A',
                    'consult_content' => $consult->content ?? 'N/A',
                    'consult_link'    => $link ?? 'N/A',
                    'consult_subject' => $subject ?? 'N/A',
                ])
                ->sendUsingTemplate('notice', $sendTo);

            return $response->setMessage(trans('تم الارسال بنجاح'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('حدث خطأ برجاء المحاولة فى وقت لاحق'));
        }
    }

    /**
     * @param string $key
     * @param SlugInterface $slugRepository
     * @param ProjectInterface $projectRepository
     * @return \Illuminate\Http\Response|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getProject(string $key, SlugInterface $slugRepository, ProjectInterface $projectRepository, CategoryInterface $categoryRepository)
    {
        $slug = $slugRepository->getFirstBy([
            'slugs.key'      => $key,
            'reference_type' => Project::class,
            'prefix'         => SlugHelper::getPrefix(Project::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');

        $project = $projectRepository->getFirstBy(
            ['id' => $slug->reference_id],
            ['*'],
            ['features', 'currency', 'category', 'facilities']
        );

        if (!$project) {
            abort(404);
        }


        SeoHelper::setTitle($project->name)->setDescription(Str::words($project->description, 120));

        $meta = new SeoOpenGraph;
        if ($project->image) {
            $meta->setImage(RvMedia::getImageUrl($project->image));
        }
        $meta->setDescription($project->description);
        $meta->setUrl($project->url);
        $meta->setTitle($project->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add($project->name, $project->url);

        $relatedProjects = $projectRepository->getRelatedProjects($project->id,
            theme_option('number_of_related_projects', 8));

//        Theme::asset()->usePath()->add('validation-jquery-css',
//            'libraries/jquery-validation/validationEngine.jquery.css');
//        Theme::asset()->add('images-grid-css',
//            'https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.css');
//        Theme::asset()->container('header')->add('images-grid-js',
//            'https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.js', ['jquery']);
//        Theme::asset()->container('header')->usePath()->add('jquery-validationEngine-vi-js',
//            'libraries/jquery-validation/jquery.validationEngine-vi.js', ['jquery']);
//        Theme::asset()->container('header')->usePath()->add('jquery-validationEngine-js',
//            'libraries/jquery-validation/jquery.validationEngine.js', ['jquery']);

        if (function_exists('admin_bar')) {
            admin_bar()->registerLink(__('Edit this project'), route('project.edit', $project->id));
        }

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PROJECT_MODULE_SCREEN_NAME, $project);

        $images = [];
        foreach ($project->images as $image) {
            $images[] = RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage());
        }

        return Theme::scope('project', compact('project', 'images', 'relatedProjects', 'categories'))->render();
    }

    /**
     * @param string $key
     * @param SlugInterface $slugRepository
     * @param PropertyInterface $propertyRepository
     * @return \Illuminate\Http\Response|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getProperty(string $key, SlugInterface $slugRepository, PropertyInterface $propertyRepository, CategoryInterface $categoryRepository)
    {
        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');

        $slug = $slugRepository->getFirstBy([
            'slugs.key'      => $key,
            'reference_type' => Property::class,
            'prefix'         => SlugHelper::getPrefix(Property::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $property = $propertyRepository->getProperty(
            $slug->reference_id,
            ['features', 'project', 'currency', 'author', 'category', 'facilities']
        );

        if (!$property) {
            abort(404);
        }

        SeoHelper::setTitle($property->name)->setDescription(Str::words($property->description, 120));

        $meta = new SeoOpenGraph;
        if ($property->image) {
            $meta->setImage(RvMedia::getImageUrl($property->image));
        }
        $meta->setDescription($property->description);
        $meta->setUrl($property->url);
        $meta->setTitle($property->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add($property->name, $property->url);

//        Theme::asset()->usePath()->add('validation-jquery-css',
//            'libraries/jquery-validation/validationEngine.jquery.css');
//        Theme::asset()->add('images-grid-css',
//            'https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.css');
//        Theme::asset()->container('header')->add('images-grid-js',
//            'https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.js', ['jquery']);
//        Theme::asset()->container('header')->usePath()->add('jquery-validationEngine-vi-js',
//            'libraries/jquery-validation/jquery.validationEngine-vi.js', ['jquery']);
//        Theme::asset()->container('header')->usePath()->add('jquery-validationEngine-js',
//            'libraries/jquery-validation/jquery.validationEngine.js', ['jquery']);

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PROPERTY_MODULE_SCREEN_NAME, $property);

        if (function_exists('admin_bar')) {
            admin_bar()->registerLink(__('Edit this property'), route('property.edit', $property->id));
        }

        $images = [];
        foreach ($property->images as $image) {
            $images[] = RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage());
        }

        return Theme::scope('property', compact('property', 'images', 'categories'))->render();
    }

    /**
     * @param Request $request
     * @param ProjectInterface $projectRepository
     * @param CategoryInterface $categoryRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Response
     */
    public function getProjects(
        Request $request,
        ProjectInterface $projectRepository,
        CategoryInterface $categoryRepository,
        BaseHttpResponse $response,
        CityInterface $city
    ) {
        SeoHelper::setTitle(__('Projects'));

        $filters = [
            'keyword'     => $request->input('k'),
            'blocks'      => $request->input('blocks'),
            'min_floor'   => $request->input('min_floor'),
            'max_floor'   => $request->input('max_floor'),
            'min_flat'    => $request->input('min_flat'),
            'max_flat'    => $request->input('max_flat'),
            'category_id' => $request->input('category_id'),
            'city_id'     => request()->input('city_id'),
            'location'    => request()->input('location'),
        ];

        $params = [
            'paginate' => [
                'per_page'      => theme_option('number_of_projects_per_page', 12),
                'current_paged' => $request->input('page', 1),
            ],
            'order_by' => ['re_projects.created_at' => 'DESC'],
        ];

        $projects = $projectRepository->getProjects($filters, $params);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Projects'), route('public.projects'));


        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');
        $cities = $city->pluck('name', 'id');


        if ($request->ajax()) {
//            return $response->setData(Theme::partial('search-suggestion', ['items' => $projects]));
            return $response->setData(Theme::partial('ajax-projects', compact('projects', 'categories', 'cities')));

        }


        return Theme::scope('projects', compact('projects', 'categories', 'cities'))->render();
    }

    /**
     * @param Request $request
     * @param PropertyInterface $propertyRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Response
     */
    public function getProperties(
        Request $request,
        PropertyInterface $propertyRepository,
        CategoryInterface $categoryRepository,
        CityInterface $city,
        BaseHttpResponse $response
    ) {
        SeoHelper::setTitle(__('الوحدات'));

        $filters = [
            'keyword'     => $request->input('k'),
            'type'        => $request->input('type'),
            'bedroom'     => $request->input('bedroom'),
            'bathroom'    => $request->input('bathroom'),
            'floor'       => $request->input('floor'),
            'min_price'   => $request->input('min_price'),
            'max_price'   => $request->input('max_price'),
            'min_square'  => $request->input('min_square'),
            'max_square'  => $request->input('max_square'),
            'project'     => $request->input('project'),
            'category_id' => $request->input('category_id'),
            'city'        => $request->input('city'),
            'city_id'     => request()->input('city_id'),
            'location'    => request()->input('location'),
        ];

        $params = [
            'paginate' => [
                'per_page'      => theme_option('number_of_properties_per_page', 12),
                'current_paged' => $request->input('page', 1),
            ],
            'order_by' => ['re_properties.created_at' => 'DESC'],
        ];

        $properties = $propertyRepository->getProperties($filters, $params);


        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Properties'), route('public.properties'));

        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');

        $cities = $city->pluck('name', 'id');

        if ($request->ajax()) {
//            return $response->setData(Theme::partial('search-suggestion', ['items' => $properties, 'cities' => $cities, 'categories' => $categories]));
            return $response->setData(Theme::partial('ajax-properties', compact('properties', 'categories', 'cities')));
//            return Theme::load('properties', compact('properties', 'categories', 'cities'))->render();
        }


        return Theme::scope('properties', compact('properties', 'categories', 'cities'))->render();
    }

    /**
     * @param Request $request
     * @param PropertyInterface $propertyRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Response
     */
    public function getPropertyCategory(
        $key,
        Request $request,
        SlugInterface $slugRepository,
        PropertyInterface $propertyRepository,
        CategoryInterface $categoryRepository,
        BaseHttpResponse $response
    ) {
        $slug = $slugRepository->getFirstBy([
            'slugs.key'      => $key,
            'reference_type' => Category::class,
            'prefix'         => SlugHelper::getPrefix(Category::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $category = $categoryRepository->getFirstBy(
            ['id' => $slug->reference_id],
            ['*'],
            ['slugable']
        );

        if (!$category) {
            abort(404);
        }

        SeoHelper::setTitle($category->name)->setDescription(Str::words($category->description, 120));

        $meta = new SeoOpenGraph;
        $meta->setDescription($category->description);
        $meta->setUrl($category->url);
        $meta->setTitle($category->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add($category->name, $category->url);

        $filters = [
            'category_id' => $category->id,
        ];

        $params = [
            'paginate' => [
                'per_page'      => theme_option('number_of_properties_per_page', 12),
                'current_paged' => $request->input('page', 1),
            ],
            'order_by' => ['re_properties.created_at' => 'DESC'],
        ];

        $properties = $propertyRepository->getProperties($filters, $params);

        return Theme::scope('real-estate.property-category', compact('category', 'properties'))->render();
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @param null $title
     * @param CurrencyInterface $currencyRepository
     * @return BaseHttpResponse
     */
    public function changeCurrency(
        Request $request,
        BaseHttpResponse $response,
        CurrencyInterface $currencyRepository,
        $title = null
    ) {
        if (empty($title)) {
            $title = $request->input('currency');
        }

        if (!$title) {
            return $response;
        }

        $currency = $currencyRepository->getFirstBy(['title' => $title]);

        if ($currency) {
            cms_currency()->setApplicationCurrency($currency);
        }

        return $response;
    }
}
