<div class="data-listing mt-2">
    <div id="loading">
        <div class="half-circle-spinner">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
        <input type="hidden" name="page" data-value="1">
    </div>
    <div class="featured portfolio bg-white row portfolio-items">
        @if ($projects->count())
            {{--                                <div class="row portfolio-items">--}}
            @foreach ($projects as $project)
                <div  class="col-12 col-sm-6 col-md-4 col-lg-3 colm10">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="homes">
                                <!-- homes img -->
                                <a href="single-property-1.html" class="homes-img">
                                    <div class="homes-tag button alt featured">مميزة</div>
                                    <div class="homes-tag button alt sale">{{ $project->type == 'sale' ? 'للبيع': 'للإيجار' }}</div>
                                    <div class="homes-price">{{ $project->price }}</div>
                                    <img class="thumb" data-src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                         alt="{{ $project->name }}" class="img-responsive">
                                </a>
                            </div>
                            <div class="button-effect">
                                <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                            </div>
                        </div>
                        <!-- homes content -->
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3><a href="single-property-1.html">{{ $project->name }}</a></h3>
                            <p class="homes-address mb-3">
                                <a href="single-property-1.html">
                                    <i class="fa fa-map-marker"></i><span>{{ $project->location }}</span>
                                </a>
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                @if ($project->number_bedroom)
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        <span> {{ $project->number_bedroom }} غرف نوم</span>
                                    </li>
                                @endif
                                @if ($project->number_bathroom)
                                    <li>
                                        <i class="flaticon-shower"></i>
                                        <span> {{ $project->number_bathroom }} حمام</span>
                                    </li>
                                @endif
                                @if ($project->square)
                                    <li>
                                        <i class="flaticon-design-tool"></i>
                                        <span> {{ $project->square }} متر</span>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            @endforeach
            {{--                                </div>--}}
        @else
            <div class="item alert alert-warning col-md-12">لا يوجد نتائج لهذا البحث</div>
        @endif
        <nav class="d-flex justify-content-center pt-3" aria-label="Page navigation example">
            {!! $projects->appends(request()->query())->links() !!}
        </nav>
    </div>
    <div class="col-sm-12"></div>

</div>
