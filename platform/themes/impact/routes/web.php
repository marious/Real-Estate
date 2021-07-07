<?php
Route::group(['namespace' => 'Theme\Impact\Http\Controllers', 'middleware' => 'web'], function () {

    Route::get('contact', 'ImpactController@contact')->name('public.contact');

    Route::get('interactive-map', 'ImpactController@getInteractiveMap')->name('public.interactivemap');

    Route::get('impact-projects', 'ImpactController@getImpactLand')->name('public.land');

    Route::get('maploc', 'ImpactController@getmaplocation');

    Route::get('/careers', 'ImpactController@careers');


    Theme::routes();
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('/', 'ImpactController@getIndex')->name('public.index');
    });


    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {



        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'ImpactController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'ImpactController@getView',
        ]);

        Route::post('search/properties', 'ImpactController@advancedSearch')->name('public.advancedSearch');

        Route::get('ajax/properties', 'ImpactController@ajaxGetProperties')->name('public.ajax.properties');
        Route::get('ajax/posts', 'ImpactController@ajaxGetPosts')->name('public.ajax.posts');
        Route::get('ajax/map', 'ImpactController@ajaxPropertiesMap')->name('public.properties.map');
    });

});
