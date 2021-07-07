@php
Theme::asset()->remove('leaflet');
Theme::asset()->remove('leaflet-gesture-handling');
Theme::asset()->remove('leaflet-markercluster');
Theme::asset()->remove('leaflet-markercluster-default');
Theme::asset()->remove('maps');
Theme::asset()->remove('nouislider');
Theme::asset()->remove('leaflet.js');
Theme::asset()->remove('leaflet-gesture-handling');
Theme::asset()->remove('leaflet-providers');
Theme::asset()->remove('leaflet-markercluster');
Theme::asset()->remove('map-style2.js');
Theme::asset()->remove('range.js');
@endphp
<!-- START SECTION PROPERTIES LISTING -->
<div class="bgheadproject hidden-xs mb-5">
    <div class="description mb-5">
        <div class="container-fluid w90">
            <h1 class="text-center mt-4">{{ $property->name }}</h1>
            {!! Theme::partial('breadcrumb') !!}
        </div>
    </div>
</div>
<section class="single-proper blog details">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>{{ $property->name }}
                                            <span class="mrg-l-5 category-tag">
                                                {{ $property->type == 'sale' ? 'للبيع': 'للإيجار' }}
                                            </span>
                                        </h3>
                                        <div class="mt-0">
                                            <p class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                                {{ $property->location }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single detail-wrapper mr-2">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h4>{{ format_price($property->price, $property->currency) }}</h4>
                                            <div class="mt-0">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- main slider carousel items -->
                        <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                            <h5 class="mb-4">معرض الصور</h5>
                            <div class="carousel-inner">
                                @foreach($property->images as $image)
                                    @php
                                    $index = $loop->index + 1;
                                    @endphp
                                <div class="{{ $index == 1 ? 'active' : '' }} item carousel-item" data-slide-number="{{ $index }}">
                                    <img src="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}" class="img-fluid"
                                         alt="slider-listing-{{$index}}">
                                </div>
                                @endforeach
                                <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-right"></i></a>
                                <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <!-- main slider carousel nav controls -->
                            <ul class="carousel-indicators smail-listing list-inline">
                                @foreach($property->images as $image)
                                    @php
                                        $index = $loop->index;
                                    @endphp

                                    <li class="list-inline-item {{ $index == 0 ? 'active' : '' }}">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="{{$index}}" data-target="#listingDetailsSlider">
                                        <img src="{{ RvMedia::getImageUrl($image, 'thumb', false, RvMedia::getDefaultImage()) }}" class="img-fluid" alt="listing-small">
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                            <!-- main slider carousel items -->
                        </div>
                        <div class="blog-info details mb-30">
                            <h5 class="mb-4">الوصف</h5>
                            {!! $property->content !!}
                        </div>
                    </div>
                </div>
                <div class="single homes-content details mb-30">
                    <!-- title -->
                    <h5 class="mb-4">خصائص الوحدة</h5>
                    <div class="block-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            @if ($property->category->name)<tr><td>النوع</td> <td><strong>{{ $property->category->name }}</strong></td></tr>@endif
                            @if ($property->square)<tr><td>المساحة</td> <td><strong>{{ $property->square }} متر مربع</strong></td></tr>@endif
                            @if ($property->number_bedroom)<tr><td>غرف النوم</td> <td><strong>{{ $property->number_bedroom }}</strong></td></tr>@endif
                            @if ($property->number_bathroom)<tr><td>الحمام</td> <td><strong>{{ $property->number_bathroom }}</strong></td></tr>@endif
                            @if ($property->price)<tr><td>السعر</td> <td><strong>{{ format_price($property->price, $property->currency) }}</strong></td></tr>@endif
                            </tbody>
                        </table>
                    </div>
                    <!-- title -->
                    @if (count($property->facilities))
                    <h5 class="mt-5">المسافات للأماكن الهامة</h5>
                    @endif
                    <!-- cars List -->
                    @foreach($property->facilities as $facility)
                        <div class="col-sm-4">
                            <p><i class="@if ($facility->icon) {{ $facility->icon }} @else fas fa-check @endif text-orange text0i"></i>  {{ $facility->name }} - {{ $facility->pivot->distance }}Km</p>
                        </div>
                    @endforeach
                </div>

                @if ($property->latitude && $property->longitude)
                <div class="blog-info details mb-30">
                    <h5 class="mb-4">
                        <i class="fa fa-map-marker"></i>
                        الموقع على الخريطة
                    </h5>
                    <div id="g-map" style="width: 100%;height:500px;"></div>
                </div>
                @endif

                <!-- Star Reviews -->
                <!-- End Reviews -->
                <!-- Star Add Review -->
                <!-- End Add Review -->
            </div>
            <aside class="col-lg-4 col-md-12 car">
                <div class="single widget">

                    <!-- end author-verified-badge -->
                    <div class="sidebar">
                        @if ($property->autho_id)
                        <div class="widget-boxed mt-33 mt-5">
                            <div class="widget-boxed-header">
                                <h4>معلومات البائع</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="sidebar-widget author-widget2">

                                    <div class="author-box clearfix">
                                        @if ($property->author->username)
                                        <img src="{{ $property->author->avatar_url }}" alt="{{ $property->author->getFullName() }}" class="author__img">
                                        <h4 class="author__title">{{ $property->author->getFullName() }}</h4>
                                        @else
                                            <img src="{{ $property->author->avatar_url }}" alt="{{ $property->author->getFullName() }}" class="img-thumbnail">
                                        @endif
                                    </div>

                                    <ul class="author__contact">
                                        <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>302 Av Park, New York</li>
                                        <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">(234) 0200 17813</a></li>
                                        <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">lisa@gmail.com</a></li>
                                    </ul>
                                    @endif
                                    <div class="agent-contact-form-sidebar">
                                        {!! Theme::partial('consult-form', ['type' => 'property', 'data' => $property]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="main-search-field-2">
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <!-- START SIMILAR PROPERTIES -->
        <section class="similar-property recently portfolio bshd p-0 bg-white-inner">
            <div class="container">
                <h5>وحدات مشابهة</h5>
                <property-component type="related" url="{{ route('public.ajax.properties') }}" property_id="{{ $property->id }}"></property-component>
            </div>
        </section>
        <!-- END SIMILAR PROPERTIES -->
    </div>
</section>
<!-- END SECTION PROPERTIES LISTING -->

@if ($property->latitude && $property->longitude)
@php
    Theme::asset()->container('footer')->writeContent('google-map-init', "<script>
        // Initialize and add the map
        function initMap() {
          // The location of Uluru
          const uluru = { lat: $property->latitude , lng:  $property->longitude };
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById(\"g-map\"), {
            zoom: 15,
            center: uluru,
            disableDefaultUI: true
          });
          // The marker, positioned at Uluru
          const marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });
        }
        </script>");

    Theme::asset()->container('footer')->writeContent('google-map',
'<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpFQYxzUOojKPGAz83rN73e2UBKKhkxfc&callback=initMap&libraries=&v=weekly" type="text/javascript"></script>
');
@endphp
@endif
