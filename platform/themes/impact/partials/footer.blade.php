
<!-- START FOOTER -->
<footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="netabout">
                        <a href="" class="logo">
                            <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="Impact Investment" class="footer-logo">
                        </a>
                    </div>
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">
                                        {{ theme_option('address') }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">
                                        <a href="tel:{{ theme_option('hotline') }}">{{ theme_option('hotline') }}</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">
                                        <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <!-- Social Widget -->
                    <div class="footer-widget social-widget">
                        <h4>تابعنا </h4>
                        <ul class="social-icon-one">
                            <li><a href="https://www.facebook.com/ImpactInvestmentseg"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://lnkd.in/dGgnkU9"><span class="fab fa-instagram"></span></a></li>
                            <li><a href=""><span class="fab fa-youtube"></span></a></li>
                            <li><a href="https://lnkd.in/dG7kgi9"><span class="fab fa-twitter"></span></a></li>
                            <li><a href="https://lnkd.in/dqDtm4m"><span class="fab fa-telegram"></span></a></li>

                        </ul>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="newsletters">
                        <h3>النشرة البريدية</h3>
                        <p>اشترك الأن فى النشرة البريدية ليصلك كل جديد</p>
                    </div>
                    <form class="bloq-email mailchimp form-inline" method="post">
                        <label for="subscribeEmail" class="error"></label>
                        <div class="email">
                            <input type="email" id="subscribeEmail" name="EMAIL" placeholder="البريد الالكترونى">
                            <input type="submit" value="إشتراك">
                            <p class="subscription-success"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .wp-float:link, .wp-float:hover, .wp-float i {
        color: #fff !important;

    }
    .wp-float {
        position: fixed;
        width: 40px;
        height: 40px;
        bottom: 10px;
        right: 10px;
        background-color: #25d366;
        border-radius: 50px;
        text-align: center;
        font-size: 32px;
        z-index: 100;
    }
</style>
<a href="https://lnkd.in/esNDzTx" class="wp-float" target="_blank">
    <i class="fab fa-whatsapp  my-float"></i>
</a>
<!-- END FOOTER -->



<!-- START PRELOADER -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
{!! Theme::footer() !!}
@if (isset($interactiveMap))
    <script src="{{ Theme::asset()->url('js/interactive-map.js')  }}"></script>
    <script src="{{ Theme::asset()->url('js/polygon.min.js')  }}"></script>
@endif
<script>
    if ($('.slick-lancers').length) {
        $('.slick-lancers').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1292,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            }]
        });

    }

</script>

<script>
    $(".dropdown-filter").on('click', function() {

        $(".explore__form-checkbox-list").toggleClass("filter-block");

    });

</script>
</body>
</html>
