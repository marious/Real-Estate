@php
    use Botble\RealEstate\Enums\PropertyStatusEnum;
    use Botble\RealEstate\Enums\PropertyTypeEnum;use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
    use Botble\Location\Repositories\Interfaces\CityInterface;
    use Botble\RealEstate\Enums\PropertyBuildingTypeEnum;

    $categories = app(CategoryInterface::class)
             ->pluck('re_categories.name', 're_categories.id');
    $types = PropertyTypeEnum::labels();

$cities = app(CityInterface::class)->pluck('name', 'id');

$buildingImages = [
    'flat' => 'https://booking-realestate.com/files/thumbnail/group_87.png',
    'villa' => 'https://booking-realestate.com/files/thumbnail/group_87.png',
    'offices' => 'https://booking-realestate.com/files/thumbnail/group_88.png',
    'penthouse' => 'https://booking-realestate.com/files/thumbnail/group_84.png',
    'duplex' => 'https://booking-realestate.com/files/thumbnail/group_86.png',
    'chamber' => 'https://booking-realestate.com/files/thumbnail/group_83.png',
    'studio' => 'https://booking-realestate.com/files/thumbnail/group_91.png',
    'chalet' => 'https://booking-realestate.com/files/thumbnail/group_82.png',
    'buildings' => 'https://booking-realestate.com/files/thumbnail/group_92.png',
    'shops' => 'https://booking-realestate.com/files/thumbnail/group_89.png',
    'factories' => 'https://booking-realestate.com/files/thumbnail/group_85%20(1).png',
    'land' => 'https://booking-realestate.com/files/thumbnail/group_81.png',
];
@endphp
<div class="home-page">
    <aside>
        <form action="{{ route('public.advancedSearch') }}" method="POST" id="filter-form" class="">
            {!! csrf_field() !!}
            <div class="boxed-widget opening-hours margin-top-0 project-main">
                <div class="section-search-title">
                    <h5><span class="im im-icon-Filter-2"></span>تصنيف</h5>
                </div>
                <div class="section-options justify-content-between ">
                    @foreach($categories as $k => $category)
                    <div class="input_group">
                        <input class="form-check-input" type="checkbox"
                               name="category_id[]"
                               id="search_multi_option_{{ $k }}"
                               value="{{ $k }}"/>
                        <label class="form-check-label"
                               for="search_multi_option_{{ $k }}">{{ $category }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="boxed-widget opening-hours margin-top-5 project-type">
                <div class="section-search-title">
                    <h5><span class="im im-icon-Filter-2"></span>نوع المشروع</h5>
                </div>
                <div class="section-options justify-content-between">
                    @foreach ($types as $k => $type)
                    <div class="input_group">
                        <input  class="form-check-input" type="checkbox"
                                name="type[]"
                                id="search_multi_option_type_{{ $loop->index }}"
                                value="{{ $k }}"/>
                        <label class="form-check-label"
                               for="search_multi_option_type_{{ $loop->index }}"> {{ $type }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="boxed-widget opening-hours margin-top-5 realestate-type">
                <div class="section-search-title dropdown-title">
                    <h5><span class="im im-icon-Filter-2"></span>نوع العقار</h5>
                    <span class="icon">
                    <i class="fas fa-angle-down"></i>
                </span>
                </div>
                <div class="section-options">
                    @foreach ($buildingImages as $k => $image)
                    <div class="input_group">
                        <input type="checkbox" name="building_type[]"
                               id="search_multi_option_{{ $k }}"
                               value="{{ $k }}"/>
                        <label class="form-check-label" for="search_multi_option_{{ $k }}">
                            <img src="{{ $image }}"
                                 title="{{ PropertyBuildingTypeEnum::getLabel($k) }}" alt="{{ PropertyBuildingTypeEnum::getLabel($k) }}"/>
                            <small>{{ PropertyBuildingTypeEnum::getLabel($k) }}</small>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="boxed-widget opening-hours margin-top-5 location">
                <div class="section-search-title dropdown-title">
                    <h5><span class="im im-icon-Filter-2"></span>المنطقه</h5>
                    <span class="icon">
                    <i class="fas fa-angle-down"></i>
                </span>
                </div>
                <div class="section-options">
                    @foreach($cities as $k => $city)
                    <div class="input_group">
                        <input type="checkbox" name="city_id[]"
                               data-value-path="العاصمة الأدارية"
                               id="search_multi_option_city_{{ $k }}"
                               value="{{ $k }}"  />
                        <label for="search_multi_option_city_{{ $k }}">{{ $city }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="">
                <button type="submit" id="filter-submit" form="filter-form" class="btn btn-block" title="بحث">
                    <span>بحث</span>
                    <i class="fas fa-check"></i>

                </button>
            </div>


            {{--        <button type="reset" id="filter-reset" form="filter-form" class="">--}}
            {{--            <span>  إعادة تصفية </span>--}}
            {{--            <!--<i class="fas fa-close"></i>-->--}}
            {{--        </button>--}}
            <!--<span class="btn btn-link reset-btn">
            إعادة تصفية     </span>-->

        </form>
    </aside>


</div>


