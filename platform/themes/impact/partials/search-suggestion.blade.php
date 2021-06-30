    <div class="search-box">
        <div class="screen-darken"></div>
        <div class="search-box-content">
            <div class="d-md-none bg-primary p-2"><span class="text-white">Filter</span> <span class="float-right toggle-filter-offcanvas text-white"><i class="far fa-times-circle"></i></span></div>
            <div class="search-box-items">
                <div class="row ml-md-0 mr-md-0">
                    <div class="col-xl-3 col-lg-2 col-md-4 px-1">
                        <div class="form-group">
                            <label for="keyword" class="control-label">كلمة البحث</label>
                            <div class="input-has-icon"><input type="text" id="keyword" name="k" value="" placeholder="اكتب هنا..." class="form-control">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 px-1">
                        <div class="form-group" style="position: relative;">
                            <input type="hidden" name="city_id"> <label for="location" class="control-label">الموقع</label>
                            <div class="select--arrow">
                                <select name="city_id" id="select-city" class="form-control">
                                    <option value="">-- اختر --</option>
                                    @foreach($cities as $k => $city)
                                        <option value="{{ $k }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 px-1">
                        <label for="select-type" class="control-label">الخيارات</label>
                        <div data-text-default="Type, category..." class="dropdown mb-2 select-dropdown">
                            <button type="button" id="dropdownMenuChoise" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary dropdown-toggle">
                                <span>النوع , التصنيف</span></button>
                            <div aria-labelledby="dropdownMenuChoise" class="dropdown-menu keep-open"
                                 style="min-width: 30rem; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);" x-placement="bottom-start">
                                <div class="dropdown-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="select-type" class="control-label">النوع</label>
                                                <div class="select--arrow">
                                                    <select name="type" id="select-type" class="form-control">
                                                        <option value="">-- اختر --</option>
                                                        @foreach(\Botble\RealEstate\Enums\PropertyTypeEnum::values() as $item)
                                                            <option value="{{ $item }}" @if (request()->input('type') == $item) selected @endif>{{ \Botble\RealEstate\Enums\PropertyTypeEnum::getLabel($item) }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="select-category" class="control-label">التصنيف</label>
                                                <div class="select--arrow">
                                                    <select name="category_id" id="select-category" class="form-control">
                                                        <option value="">-- اختر --</option>
                                                        @foreach($categories as $categoryId => $categoryName)
                                                            <option value="{{ $categoryId }}" @if (request()->input('category_id') == $categoryId) selected @endif>{{ $categoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="select-bedroom" class="control-label">غرف النوم</label>
                                                <div class="select--arrow">
                                                    <select name="bedroom" id="select-bedroom" class="form-control">
                                                        <option value="">-- اختر --</option>
                                                        <option value="1">
                                                            1 غرفة
                                                        </option>
                                                        <option value="2">
                                                            2 غرفة
                                                        </option>
                                                        <option value="3">
                                                            3 غرفة
                                                        </option>
                                                        <option value="4">
                                                            4 غرفة
                                                        </option>
                                                        <option value="5">5+ غرفة</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="select-bathroom" class="control-label">
                                                    الحمامات
                                                </label>
                                                <div class="select--arrow">
                                                    <select name="bathroom" id="select-bathroom" class="form-control">
                                                        <option value="">-- اختر --</option>
                                                        <option value="1">
                                                            1 غرفة
                                                        </option>
                                                        <option value="2">
                                                            2 غرفة
                                                        </option>
                                                        <option value="3">
                                                            3 غرفة
                                                        </option>
                                                        <option value="4">
                                                            4 غرفة
                                                        </option>
                                                        <option value="5">5+ غرفة</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="select-floor" class="control-label">
                                                    عدد الادوار
                                                </label>
                                                <div class="select--arrow">
                                                    <select name="floor" id="select-floor" class="form-control">
                                                        <option value="">-- اختر --</option>
                                                        <option value="1">
                                                            1 دور
                                                        </option>
                                                        <option value="2">
                                                            2 دور
                                                        </option>
                                                        <option value="3">
                                                            3 أدوار
                                                        </option>
                                                        <option value="4">
                                                            4 أدوار
                                                        </option>
                                                        <option value="5">5+ أدوار</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6" style="align-self: flex-end;">
                                            <div class="form-group"
                                            >
                                                <div class="col-xs-auto"><button type="submit" class="btn btn-primary">إدخال</button> <button type="button" class="btn btn-primary bg-secondary float-left btn-clear">Clear</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 px-1 mb-2">
                        <label for="select-type" class="control-label"> السعر</label>
                        <div class="dropdown">
                            <button type="button" id="dropdownMenuPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary dropdown-toggle"><span>كل الأسعار </span></button>
                            <div aria-labelledby="dropdownMenuPrice" class="dropdown-menu" style="min-width: 25em; position: absolute; will-change: transform; top: 0px; transform: translate3d(0px, 34px, 0px);" x-placement="bottom-start">
                                <div class="dropdown-item">
                                    <div data-calc="[{&quot;number&quot;:1000000000,&quot;label&quot;:&quot;__value__ billion&quot;},{&quot;number&quot;:1000000,&quot;label&quot;:&quot;__value__ million&quot;},{&quot;number&quot;:1000,&quot;label&quot;:&quot;__value__ thousand&quot;},{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__&quot;}]" data-all="All prices" class="form-group min-max-input">
                                        <div class="row">
                                            <div class="col-5 pl-1"><label for="min_price" class="control-label">
                                                    السعر من
                                                </label> <input type="number" name="min_price" id="min_price" value="" placeholder="من" min="0" step="1" class="form-control min-input"> <span class="position-absolute min-label"></span>
                                            </div>
                                            <div class="col-5 px-1"><label for="max_price" class="control-label">السعر إلى</label>
                                                <input type="number" name="max_price" id="max_price" value="" placeholder="إلى" min="0" step="1" class="form-control max-input"> <span class="position-absolute max-label"></span>
                                            </div>
                                            <div class="col-2 px-0 btn-min-max" style="align-self: flex-end;"><button class="btn btn-primary">ادخال</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 px-1 mb-2">
                        <label for="select-type" class="control-label">المساحة </label>
                        <div class="dropdown">
                            <button type="button" id="dropdownMenuSquare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary dropdown-toggle"><span>كل المساحات </span></button>
                            <div aria-labelledby="dropdownMenuSquare" class="dropdown-menu" style="min-width: 25em;">
                                <div class="dropdown-item">
                                    <div data-calc="[{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__ m\u00b2&quot;}]" data-all="كل المساحات" class="form-group min-max-input">
                                        <div class="row">
                                            <div class="col-5 pl-1"><label for="min_square" class="control-label">
                                                    المساحة من
                                                </label> <input type="number" name="min_square" id="min_square" value="" placeholder="من" step="10" min="0" class="form-control min-input"> <span class="position-absolute min-label"></span>
                                            </div>
                                            <div class="col-5 px-1"><label for="max_square" class="control-label">
                                                    المساحة إلى
                                                </label> <input type="number" name="max_square" id="max_square" value="" placeholder="إلى" step="10" min="0" class="form-control max-input"> <span class="position-absolute max-label"></span>
                                            </div>
                                            <div class="col-2 px-0" style="align-self: flex-end;"><span class="btn btn-primary">ادخال</span></div>
                                        </div>
                                    </div>
                                    <ul class="list-of-suggetions mt-4">
                                        <li data-value="0-100">&lt; 100 m²</li>
                                        <li data-value="100-200">100 m² - 200 m²</li>
                                        <li data-value="200-300">200 m² - 300 m²</li>
                                        <li data-value="300-400">300 m² - 400 m²</li>
                                        <li data-value="400-500">400 m² - 500 m²</li>
                                        <li data-value="500-0">&gt; 500 m²</li>
                                        <li data-value="">ل المساحات</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xl-1 col-md-2 px-1 button-search-wrapper" style="align-self: flex-end;">
                        <div class="btn-group text-center w-100">
                            <button type="submit" class="btn btn-primary btn-full">ابحث</button> <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle dropdown-toggle-split"><span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(130px, 34px, 0px);">
                                <button type="reset" class="dropdown-item">إعادة تعيين</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

