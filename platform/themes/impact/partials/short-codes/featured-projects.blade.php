@php
    use Botble\RealEstate\Enums\ProjectStatusEnum;
    use Botble\RealEstate\Repositories\Interfaces\ProjectInterface;

    $projects = collect([]);
    if (is_plugin_active('real-estate')) {
        $projects = app(ProjectInterface::class)->advancedGet([
            'condition' => [
                're_projects.is_featured' => true,
                ['re_projects.status', 'NOT_IN', [ProjectStatusEnum::NOT_AVAILABLE]],
            ],
            'take'      => 3,
            'with'      => ['slugable', 'currency', 'city', 'city.state'],
        ]);
     }
@endphp
@if ($projects->count())
    <section class="featured portfolio bg-white featured-projects-section">
        <div class="container">
            <div class="sec-title">
                <h2><span> مشاريع </span> مميزة </h2>
            </div>
            <div class="row portfolio-items">
            @foreach($projects as $project)

                    <div class="item col-lg-4 col-md-6 col-xs-12">
                        <div class="project-single">
                            <div class="project-inner project-head">

                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="{{ $project->url }}" class="homes-img" title="{{ $project->name }}">
                                        <img src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $project->name }}" alt="{{ $project->name }}" class="thumb">
                                    </a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a href="{{ $project->url }}" title="{{ $project->name }}">{{ $project->name }}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="{{ $project->url }}">
                                        <i class="fa fa-map-marker"></i><span>{{ $project->location }}</span>
                                    </a>
                                </p>
                                <!-- homes List -->

                            </div>
                        </div>
                    </div>

            @endforeach
            </div>
        </div>
    </section>

@endif
