<div id="app">
    <section class="main-homes pb-3">
        <div class="bgheadproject hidden-xs mb-5">
            <div class="description mb-5">
                <div class="container-fluid w90">
                    <h1 class="text-center mt-4">الوحدات</h1>
                     {!! Theme::partial('breadcrumb') !!}
                </div>
            </div>
        </div>
        <div class="container-fluid w90 padtop30">
            <div class="projecthome">
                <form action="{{ route('public.properties')  }}" method="get" id="ajax-filters-form">
                    {!! Theme::partial('search-suggestion', ['categories' => $categories, 'cities' => $cities]) !!}
                    <div class="row rowm10">
                        <div class=" col-lg-7 left-page-content " data-class-full="col-lg-12 full-page-content" data-class-left="col-lg-7 left-page-content" id="properties-list">
                            <div class="shop__sort bg-light p-2 round">
                                <div class="row">
                                    <div class="col-toggle-filter col-12 col-xs-2 col-sm-2 d-md-none my-1 pr-sm-1">
                                        <div class="toggle-filter-offcanvas bg-light toggle-filter-mobile">
                                            <i class="fal fa-filter mr-1"></i> <span class="toggle-filter-name d-block d-xs-none d-sm-block d-md-block">Filter</span>
                                        </div>
                                    </div>
                                    <div class="col-showing col-6 col-sm-5 col-md-6 my-1">
                                        <div class="form-group--inline">
                                            <div class="form-group__content">
                                                <div class="select--arrow">
                                                    <select name="per_page" id="per-page" class="form-control">
                                                        <option value="">مشاهدة</option>
                                                        <option value="">15</option>
                                                        <option value="30">30</option>
                                                        <option value="45">45</option>
                                                        <option value="75">75</option>
                                                        <option value="120">120</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sort-by col-6 col-sm-5 col-md-6 my-1">
                                        <div class="sort-by-wrap d-flex">
                                            <div class="form-group--inline">
                                                <div class="form-group__content">
                                                    <div class="select--arrow">
                                                        <select name="sort_by" id="sort-by" class="form-control">
                                                            <option value="">ترتيب</option>
                                                            <option value="">Default</option>
                                                            <option value="date_asc">Oldest</option>
                                                            <option value="date_desc">Newest</option>
                                                            <option value="price_asc">Price: low to high</option>
                                                            <option value="price_desc">Price: high to low</option>
                                                            <option value="name_asc">Name: A-Z</option>
                                                            <option value="name_desc">Name: Z-A</option>
                                                        </select>
                                                        <i class="fas fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                <div class="change-view ml-2" style="align-self: center">
                                                    <i class="fas fa-map-marker-alt view-type-map active"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="data-listing mt-2">
                                <div id="loading">
                                    <div class="half-circle-spinner">
                                        <div class="circle circle-1"></div>
                                        <div class="circle circle-2"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="page" data-value="1">
                                <div class="row portfolio">
                                    @if ($properties->count())
                                        @foreach($properties as $property)

                                            <div class="colm10 property-item">
                                            <div class="item" data-lat="{{ $property->latitude }}" data-long="{{ $property->longitude }}">
                                                <div class="project-single">
                                                    <div class="project-inner project-head">
                                                        <div class="homes">
                                                            <!-- homes img -->
                                                            <a href="{{ $property->url }}" class="homes-img">
                                                                <div class="homes-tag button alt featured">{{ $property->type == 'sale' ? 'للبيع': 'للإيجار' }}</div>
{{--                                                                <div class="homes-price">{{ $property->price }}</div>--}}
                                                                <img class="thumb" data-src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                                                     alt="{{ $property->name }}" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="button-effect">
                                                            <a href="{{ $property->url }}" class="btn"><i class="fa fa-link"></i></a>
                                                            <a href="{{ $property->url }}" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- homes content -->
                                                    <div class="homes-content">
                                                        <!-- homes address -->
                                                        <h3><a href="{{ $property->url }}">{{ $property->name }}</a></h3>
                                                        <p class="homes-address mb-3">
                                                            <a href="{{ $property->url }}">
                                                                <i class="fa fa-map-marker"></i><span>{{ $property->location }}</span>
                                                            </a>
                                                        </p>
                                                        <!-- homes List -->
                                                        <ul class="homes-list clearfix">
                                                            @if ($property->number_bedroom)
                                                                <li>
                                                                    <i class="flaticon-bed"></i>
                                                                    <span> {{ $property->number_bedroom }} غرف نوم</span>
                                                                </li>
                                                            @endif
                                                            @if ($property->number_bathroom)
                                                                <li>
                                                                    <i class="flaticon-shower"></i>
                                                                    <span> {{ $property->number_bathroom }} حمام</span>
                                                                </li>
                                                            @endif
                                                            @if ($property->square)
                                                                <li>
                                                                    <i class="flaticon-design-tool"></i>
                                                                    <span> {{ $property->square }} متر</span>
                                                                </li>
                                                            @endif
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="item alert alert-warning col-md-12">لا يوجد نتائج لهذا البحث</div>
                                    @endif

                                </div>
                                <br>
                                <div class="col-sm-12">
                                    <nav class="d-flex justify-content-center pt-3" aria-label="Page navigation example">
                                        {!! $properties->appends(request()->query())->links() !!}
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" id="properties-map">
                            <div class="rightmap h-100">
                                <div id="map" data-type="" data-url="{{ route('public.properties.map') }}" data-center="[29.952654, 30.921919]"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>


