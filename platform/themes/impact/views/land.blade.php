@php
    Theme::asset()->remove('leaflet');
    Theme::asset()->remove('leaflet-gesture-handling');
    Theme::asset()->remove('leaflet-markercluster');
    Theme::asset()->remove('leaflet-markercluster-default');
    Theme::asset()->remove('nouislider');
    Theme::asset()->remove('leaflet.js');
    Theme::asset()->remove('leaflet-gesture-handling');
    Theme::asset()->remove('leaflet-providers');
    Theme::asset()->remove('leaflet-markercluster');
    Theme::asset()->remove('map-style2.js');


    Theme::asset()->container('footer')->remove('leaflet-gesture-handling');
    Theme::asset()->container('footer')->remove('leaflet-providers');
    Theme::asset()->container('footer')->remove('leaflet-markercluster');
    Theme::asset()->container('footer')->remove('map-style2.js');
    Theme::asset()->container('footer')->remove('leaflet');
    Theme::asset()->container('footer')->remove('jquery-magnific-popup');
    Theme::asset()->container('footer')->remove('owl-carousel');
    Theme::asset()->container('footer')->remove('slick');
    Theme::asset()->container('footer')->remove('nouislider');
    Theme::asset()->container('footer')->remove('lightcase');
    Theme::asset()->container('footer')->remove('map-style2');
    Theme::asset()->container('footer')->remove('range');
@endphp
<div class="inner-pages">

    <div class="bgheadproject hidden-xs mb-5">
        <div class="description mb-5">
            <div class="container-fluid w90">
                <h1 class="text-center mt-4"> سجل معنا الأن</h1>
            </div>
        </div>
    </div>

    <!-- START SECTION CONTACT US -->
    <section class="contact-us inner-pages land">
        <div class="container">

            <div class="clearfix"></div>
            <div class="row mb-5">
                <div class="col-lg-12 col-md-12">
                    <h3 class="mb-4" style="text-align: center">سجل الان مع Impact Investments وبادر بحجز وحدتك</h3>
                    <div class="dector thm-bg-clr center"></div>
                    <form action="{{ route('public.send.contact') }}" method="post" class="generic-form">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="الاسم *"
                                   required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email"
                                   placeholder="{{ __('Email') }} *" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone"
                                   placeholder="{{ __('Phone') }}">
                        </div>
                        <div class="form-group">
                                    <textarea class="form-control" name="content" rows="6" minlength="10"
                                              placeholder="{{ __('Message') }} *" required=""></textarea>
                        </div>
                        @if (setting('enable_captcha') && is_plugin_active('captcha'))
                            <div class="form-group">
                                {!! Captcha::display([], ['lang' => app()->getLocale()]) !!}
                            </div>
                        @endif
                        <div class="alert alert-success text-success text-right" style="display: none;">
                            <span></span>
                        </div>
                        <div class="alert alert-danger text-danger text-right" style="display: none;">
                            <span></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button class="btn btn-black btn-md rounded full-width btn-block" type="submit">إرسال</button>
                            <a href="" class="btn btn-black btn-md btn-success btn-block whats-btn">للتواصل واتساب <i class="fab fa-whatsapp"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="featured portfolio bg-white">
        <div class="container">

            <property-component type="sale" url="{{ route('public.ajax.properties') }}" :seeMore="false"></property-component>

        </div>
    </section>

</div>
