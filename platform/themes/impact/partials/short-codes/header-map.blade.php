<!-- STAR HEADER GOOGLE MAP -->

<div id="map-container" class="fullwidth-home-map header-map google-maps pull-top map-leaflet-wrapper">
    <div class="search-sidebar">
        {!! Theme::partial('search-side') !!}
    </div>
     <div id="map-leaflet" data-url="{{ route('public.properties.map') }}" class="map-section"></div>
</div>


<!-- END HEADER GOOGLE MAP -->
