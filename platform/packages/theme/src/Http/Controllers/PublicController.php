<?php

namespace Botble\Theme\Http\Controllers;

use BaseHelper;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Page\Models\Page;
use Botble\Page\Services\PageService;
use Botble\Theme\Events\RenderingSingleEvent;
use Botble\Theme\Events\RenderingHomePageEvent;
use Botble\Theme\Events\RenderingSiteMapEvent;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Response;
use SeoHelper;
use SiteMapManager;
use SlugHelper;
use Theme;

class PublicController extends Controller
{
    /**
     * @return \Illuminate\Http\Response|Response
     */
    public function getIndex()
    {
        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            $homepageId = BaseHelper::getHomepageId();
            if ($homepageId) {
                $slug = SlugHelper::getSlug(null, SlugHelper::getPrefix(Page::class), Page::class, $homepageId);

                if ($slug) {
                    $data = (new PageService)->handleFrontRoutes($slug);

                    return Theme::scope($data['view'], $data['data'], $data['default_view'])->render();
                }
            }
        }

        SeoHelper::setTitle(theme_option('site_title'));

        Theme::breadcrumb()->add(__('Home'), url('/'));

        event(RenderingHomePageEvent::class);

        return Theme::scope('index')->render();
    }

    /**
     * @param string $key
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Illuminate\Http\RedirectResponse|Response
     * @throws FileNotFoundException
     */
    public function getView(BaseHttpResponse $response, $key = null)
    {
        if (empty($key)) {
            return $this->getIndex($response);
        }

        $slug = SlugHelper::getSlug($key, '');

        if (!$slug) {
            abort(404);
        }

        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            $homepageId = theme_option('homepage_id', setting('show_on_front'));
            if ($homepageId && $slug->reference_type == Page::class && $slug->reference_id == $homepageId) {
                return redirect()->to('/');
            }
        }

        $result = apply_filters(BASE_FILTER_PUBLIC_SINGLE_DATA, $slug);

        if (isset($result['slug']) && $result['slug'] !== $key) {
            return $response->setNextUrl(route('public.single', $result['slug']));
        }

        event(new RenderingSingleEvent($slug));

        if (!empty($result) && is_array($result)) {
            return Theme::scope($result['view'], $result['data'], Arr::get($result, 'default_view'))->render();
        }

        abort(404);
    }
    /**
     * @return string
     */
    public function getSiteMap()
    {
        event(RenderingSiteMapEvent::class);

        // show your site map (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return SiteMapManager::render('xml');
    }
}
