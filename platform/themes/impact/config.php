<?php
use Botble\Theme\Theme;

return [
    /*
  |--------------------------------------------------------------------------
  | Inherit from another theme
  |--------------------------------------------------------------------------
  |
  | Set up inherit from another if the file is not exists,
  | this is work with "layouts", "partials" and "views"
  |
  | [Notice] assets cannot inherit.
  |
  */

    'inherit' => null, //default

    'events' => [

        'asset' => function($asset)
        {
            // Preparing asset you need to serve after.
            $asset->cook('interactive-map', function($asset)
            {
                $asset->add('interactive', 'js/interactive-map.js');
                $asset->add('polygon', 'js/polygon.min.js');
            });
        },


        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme)
        {
            // Partial composer.
            // $theme->partialComposer('header', function($view) {
            //     $view->with('auth', \Auth::user());
            // });

            // You may use this event to set up your assets.
            $theme->asset()->usePath()
                ->usePath()->add('fontawesome', 'css/fontawesome-all.min.css')
                ->usePath()->add('fontawesome-5-all', 'css/fontawesome-5-all.min.css')
                ->usePath()->add('font-aweseom.min', 'css/font-awesome.min.css')
                ->usePath()->add('leaflet', 'css/leaflet.css')

                ->usePath()->add('leaflet-gesture-handling', 'css/leaflet-gesture-handling.min.css')
                ->usePath()->add('leaflet-markercluster', 'css/leaflet.markercluster.css')
                ->usePath()->add('leaflet-markercluster-default', 'css/leaflet.markercluster.default.css')
                ->usePath()->add('nouislider', 'css/nouislider.min.css')
                ->usePath()->add('search', 'css/search.css')
                ->usePath()->add('animate', 'css/animate.css')
                ->usePath()->add('aos', 'css/aos.css')
                ->usePath()->add('aos2', 'css/aos2.css')
                ->usePath()->add('magnific-popup', 'css/magnific-popup.css')
                ->usePath()->add('lightcase', 'css/lightcase.css')
                ->usePath()->add('owl-carousel', 'css/owl.carousel.min.css')
                ->usePath()->add('bootstrap', 'css/bootstrap.min.css')
                ->usePath()->add('menu', 'css/menu.css')
                ->usePath()->add('slick', 'css/slick.css')
                ->usePath()->add('maps', 'css/maps.css')
                ->usePath()->add('styles', 'css/styles.css', null, [], filemtime(__DIR__ . '/public/css/styles.css'))
                ->usePath()->add('pink', 'css/colors/pink.css');

            $theme->asset()->container('footer')
                ->usePath()->add('jquery', 'js/jquery-3.5.1.min.js')
                ->usePath()->add('rangeSlider', 'js/rangeSlider.js')
                ->usePath()->add('nouislider', 'js/nouislider.min.js')
                ->usePath()->add('tether', 'js/tether.min.js')
                ->usePath()->add('popper', 'js/popper.min.js')
                ->usePath()->add('moment', 'js/moment.js')
                ->usePath()->add('bootstrap', 'js/bootstrap.min.js')
                ->usePath()->add('mmenu', 'js/mmenu.min.js')
                ->usePath()->add('aos', 'js/aos.js')
                ->usePath()->add('aos2', 'js/aos2.js')
                ->usePath()->add('slick', 'js/slick.min.js')
                ->usePath()->add('fitvids', 'js/fitvids.js')
                ->usePath()->add('jquery-waypoints', 'js/jquery.waypoints.min.js')
//                ->usePath()->add('jquery-counterup', 'js/jquery.counterup.min.js')
                ->usePath()->add('imagesloaded-pkgd', 'js/imagesloaded.pkgd.min.js')
//                ->usePath()->add('isotope-pkgd', 'js/isotope.pkgd.min.js')
                ->usePath()->add('smooth-scroll', 'js/smooth-scroll.min.js')
                ->usePath()->add('lightcase', 'js/lightcase.js')
                ->usePath()->add('search', 'js/search.js')
                ->usePath()->add('owl-carousel', 'js/owl.carousel.js')
                ->usePath()->add('jquery-magnific-popup', 'js/jquery.magnific-popup.min.js')
//                ->usePath()->add('ajaxchimp', 'js/ajaxchimp.min.js')
//                ->usePath()->add('newsletter', 'js/newsletter.js')
//                ->usePath()->add('jquery-form', 'js/jquery.form.js')
//                ->usePath()->add('jquery-validate', 'js/jquery.validate.min.js')
                ->usePath()->add('searched', 'js/searched.js')
//                ->usePath()->add('forms-2', 'js/forms-2.js')
                ->usePath()->add('leaflet', 'js/leaflet.js')
                ->usePath()->add('leaflet-gesture-handling', 'js/leaflet-gesture-handling.min.js')
                ->usePath()->add('leaflet-providers', 'js/leaflet-providers.js')
                ->usePath()->add('leaflet-markercluster', 'js/leaflet.markercluster.js')
                ->usePath()->add('map-style2', 'js/map-style2.js')
                ->usePath()->add('range', 'js/range.js')
                ->usePath()->add('components-js', 'js/components.js', [], [], '1.1.0')
                ->usePath()->add('script', 'js/script.js', [], [], '1.1.0');

            if (function_exists('shortcode')) {
                $theme->composer(['index', 'page', 'post'], function (\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }
        ]
    ]
];
