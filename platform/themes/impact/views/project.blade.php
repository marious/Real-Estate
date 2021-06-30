<!-- START SECTION PROPERTIES LISTING -->
<div class="bgheadproject hidden-xs mb-5">
    <div class="description mb-5">
        <div class="container-fluid w90">
            <h1 class="text-center mt-4">المشروعات</h1>
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
                                        <h3>{{ $project->name }}
                                        </h3>
                                        <div class="mt-0">
                                            <p class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                                {{ $project->location }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single detail-wrapper mr-2">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <div class="mt-0">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- main slider carousel items -->
                        <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">

                            <div class="carousel-inner">
                                @foreach($project->images as $image)
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
                                @foreach($project->images as $image)
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

                        <div class="blog-info details mb-20">
                            <div class="block-body">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th> الحالة :</th>
                                        <td>{!! $project->status->toHtml() !!}</td>
                                    </tr>
                                    @if ($project->category->name)
                                        <tr><th>النوع:</th>
                                            <td>{{ $project->category->name }}</td>
                                        </tr>@endif
                                    @if ($project->number_block)
                                        <tr>
                                            <th>عدد المبانى:</th>
                                            <td>{{ $project->number_block }}</td>
                                        </tr>
                                    @endif
                                    @if ($project->number_floor)
                                        <tr>
                                            <th> عدد الأدوار:</th>
                                            <td>{{ $project->number_floor }}</td>
                                        </tr> @endif
                                    @if ($project->number_flat)
                                        <tr>
                                            <th>عدد الوحدات</th>
                                            <td>{{ $project->number_flat }}</td>
                                        </tr>@endif
                                    <tr>
                                        <th>سعر المتر يبدأ من : </th>
                                        <td>
                                            @if ($project->price_from || $project->price_to)
                                                @if ($project->price_from) <span class="price-range">{{ format_price($project->price_from, $project->currency, false) }}</span> @endif
                                                @if ($project->price_to) <span class="price-range">- {{ format_price($project->price_to, $project->currency, false) }}</span> @endif
                                            @endif
                                        </td>

                                    </tr>
                                </table>
                            </div>

                        </div>
                        <div class="blog-info details mb-30 mt-5">
                            <h5 class="mb-4">الوصف</h5>
                            {!! $project->content !!}
                        </div>

                    </div>



                </div>



                <!-- Star Reviews -->
                <!-- End Reviews -->
                <!-- Star Add Review -->
                <!-- End Add Review -->
            </div>
            <aside class="col-lg-4 col-md-12 car">
                <div class="single widget">

                    <!-- end author-verified-badge -->
                    <div class="sidebar">
                        @if ($project->autho_id)
                            <div class="widget-boxed mt-33 mt-5">
                                <div class="widget-boxed-header">
                                    <h4>معلومات البائع</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="sidebar-widget author-widget2">

                                        <div class="author-box clearfix">
                                            @if ($project->author->username)
                                                <img src="{{ $project->author->avatar_url }}" alt="{{ $project->author->getFullName() }}" class="author__img">
                                                <h4 class="author__title">{{ $project->author->getFullName() }}</h4>
                                            @else
                                                <img src="{{ $project->author->avatar_url }}" alt="{{ $project->author->getFullName() }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        @endif
                                        <div class="agent-contact-form-sidebar">
                                            {!! Theme::partial('consult-form', ['type' => 'property', 'data' => $project]) !!}
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
                <!-- Single Block Wrap -->
            </div>

    </div>
        </section>
        <!-- END SIMILAR PROPERTIES -->
    </div>
</section>
<!-- END SECTION PROPERTIES LISTING -->
