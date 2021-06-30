<div class="bgheadproject hidden-xs mb-5">
    <div class="description mb-5">
        <div class="container-fluid w90">
            <h1 class="text-center mt-4">الخريطة التفاعلية</h1>
            {!! Theme::partial('breadcrumb') !!}
        </div>
    </div>
</div>

<div id="polygon-map" class="w-100" style="height: 100vh"></div>
<?php Theme::asset()->container('footer')->add('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBu59bO8dSz200iScX-Jy2Y6a87EtRnpF8&amp;language=ar&region=EG&amp;libraries=places') ?>
<?php Theme::asset()->container('footer')->add('interactive-map', 'themes/impact/js/interactive-map.js'); ?>
<?php Theme::asset()->container('footer')->add('polygon', 'themes/impact/js/polygon.min.js'); ?>
