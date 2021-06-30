<div class="inner-pages">
    <div class="bgheadproject hidden-xs mb-5">
        <div class="description mb-5">
            <div class="container-fluid w90">
                <h1 class="text-center mt-4">اتصل بنا</h1>
            </div>
        </div>
    </div>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION CONTACT US -->
    <section class="contact-us inner-pages">
        <div class="container">
            <div class="property-location mb-5">
                <h3>موقعنا</h3>
                <div class="divider-fade"></div>
                <div id="map-contact" class="contact-map mb-5">
                    <iframe id="gmap_canvas" width="100%" height="350" src="https://maps.google.com/maps?q=%D8%B4%D8%A7%D8%B1%D8%B9+%D8%A7%D9%84%D8%AA%D8%B3%D8%B9%D9%8A%D9%86+%D8%A7%D9%84%D8%AA%D8%AC%D9%85%D8%B9+%D8%A7%D9%84%D8%AE%D8%A7%D9%85%D8%B3+%D8%A7%D9%84%D9%82%D8%A7%D9%87%D8%B1%D8%A9+%D8%A7%D9%84%D8%AC%D8%AF%D9%8A%D8%AF%D8%A9%20&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mb-5">
                <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">اتصل بنا</h3>
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
                            <button class="btn btn-black btn-md rounded full-width" type="submit">إرسال</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12 bgc">
                    <div class="call-info">
                        <h3>معلومات الاتصال</h3>
                        <p class="mb-5">يمكنك التواصل بنا عبر القنوات التالية</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">{{ theme_option('address') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p" style="font-family: arial">
                                        <a href="tel:{{ theme_option('hotline') }}" class="white">{{ theme_option('hotline') }}</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">
                                        <a href="mailto:{{ theme_option('email') }}" class="white">{{ theme_option('email') }}</a>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

