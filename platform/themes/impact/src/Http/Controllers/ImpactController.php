<?php
namespace Theme\Impact\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Location\Repositories\Interfaces\CityInterface;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyStatusEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\Theme\Http\Controllers\PublicController;
use File;
use Illuminate\Http\Request;
use Theme\Impact\Http\Resources\PostResource;
use Theme\Impact\Http\Resources\PropertyResource;
use SeoHelper;
use Theme;

class ImpactController extends PublicController
{
    public function getView(BaseHttpResponse $response, $key = null)
    {
        return parent::getView($response, $key);
    }



    public function ajaxGetPosts(BaseHttpResponse $response)
    {
        $posts = app(PostInterface::class)->getFeatured(3);

        return $response
            ->setData(PostResource::collection($posts))
            ->toApiResponse();
    }

    public function ajaxGetProperties(Request $request, BaseHttpResponse $response)
    {
        $properties = [];
        switch ($request->input('type')) {
            case 'related':
                $properties = app(PropertyInterface::class)
                    ->getRelatedProperties($request->input('property_id'),
                        theme_option('number_of_related_properties', 8));
                break;
            case 'rent':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.is_featured'       => true,
                        're_properties.type'              => PropertyTypeEnum::RENT,
                        ['re_properties.status', 'NOT_IN', [PropertyStatusEnum::NOT_AVAILABLE]],
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    theme_option('number_of_properties_for_sale', 8),
                    ['currency', 'city', 'slugable']
                );
                break;
            case 'sale':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.is_featured'       => true,
                        're_properties.type'              => PropertyTypeEnum::SALE,
                        ['re_properties.status', 'NOT_IN', [PropertyStatusEnum::NOT_AVAILABLE]],
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    theme_option('number_of_properties_for_sale', 8),
                    ['currency', 'city', 'slugable']
                );
                break;
            case 'project-properties-for-sell':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.project_id'        => $request->input('project_id'),
                        're_properties.type'              => PropertyTypeEnum::SALE,
                        ['re_properties.status', 'NOT_IN', [PropertyStatusEnum::NOT_AVAILABLE]],
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    theme_option('number_of_properties_for_sale', 8),
                    ['currency', 'city', 'slugable']
                );
                break;
            case 'project-properties-for-rent':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.project_id'        => $request->input('project_id'),
                        're_properties.type'              => PropertyTypeEnum::RENT,
                        ['re_properties.status', 'NOT_IN', [PropertyStatusEnum::NOT_AVAILABLE]],
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    theme_option('number_of_properties_for_sale', 3),
                    ['currency', 'city', 'slugable']
                );
                break;
        }

        return $response
            ->setData(PropertyResource::collection($properties))
            ->toApiResponse();

    }

    public function ajaxPropertiesMap(BaseHttpResponse $response)
    {
        $properties = app(PropertyInterface::class)->getPropertiesByConditions(
            [
//                're_properties.is_featured'       => true,
//                're_properties.type'              => PropertyTypeEnum::RENT,
                ['re_properties.status', 'NOT_IN', [PropertyStatusEnum::NOT_AVAILABLE]],
                're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
            ],
            15,
            ['currency', 'city', 'slugable']
        );
//dd($properties[0]->url);
        return $response
                ->setData(PropertyResource::collection($properties))
                ->toApiResponse();
    }

    public function contact()
    {
        SeoHelper::setTitle('اتصل بنا');

        return Theme::scope('contact')->render();
    }


    public function getMapLocation()
    {
        if (File::exists('map.json')) {
            echo file_get_contents('map.json');
        }
    }

    public function getInteractiveMap()
    {
        SeoHelper::setTitle('الخريطة التفاعلية');
        Theme::asset()->serve('interactive-map');
        $interactiveMap = true;
        return Theme::scope('interactive-map', compact('interactiveMap'))->render();

    }

    public function advancedSearch(
        Request $request,
        PropertyInterface $propertyRepository,
        CategoryInterface $categoryRepository,
        CityInterface $city,
        BaseHttpResponse $response
    )
    {
        SeoHelper::setTitle(__('Properties'));

        $filters = [
            'type'        => $request->input('type'),
            'building_type'        => $request->input('building_type'),
            'category_id' => $request->input('category_id'),
            'city_id'     => request()->input('city_id'),
        ];

        $params = [
            'paginate' => [
                'per_page'      => theme_option('number_of_properties_per_page', 12),
                'current_paged' => $request->input('page', 1),
            ],
            'order_by' => ['re_properties.created_at' => 'DESC'],
        ];

        $properties = $propertyRepository->getSearchedProperties($filters, $params);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Properties'), route('public.properties'));

        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');

        $cities = $city->pluck('name', 'id');

        return Theme::scope('properties', compact('properties', 'categories', 'cities'))->render();
    }

    public function getImpactLand()
    {
        return Theme::scope('land')->render();
    }

    public function getSiteMap()
    {
        return parent::getSiteMap();
    }


    public function careers()
    {
        return Theme::scope('careers')->render();
    }

}
