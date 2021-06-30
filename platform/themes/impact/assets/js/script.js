

"use strict";

jQuery(document).on('ready', function ($) {


    // Price Range
    $("#price-range").each(function () {

        var dataMin = $(this).attr('data-min');
        var dataMax = $(this).attr('data-max');
        var dataUnit = $(this).attr('data-unit');

        $(this).append("<input type='text' class='first-slider-value' disabled/><input type='text' class='second-slider-value' disabled/>");


        $(this).slider({

            range: true,
            min: dataMin,
            max: dataMax,
            values: [dataMin, dataMax],

            slide: function (event, ui) {
                event = event;
                $(this).children(".first-slider-value").val(dataUnit + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                $(this).children(".second-slider-value").val(dataUnit + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            }
        });
        $(this).children(".first-slider-value").val(dataUnit + $(this).slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        $(this).children(".second-slider-value").val(dataUnit + $(this).slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));


    });

    /*---------------------------------
     //------ PRELOADER ------//
     ----------------------------------*/
    $('#status').fadeOut();
    $('#preloader').delay(200).fadeOut('slow');

    /*---------------------------------
     //------ ANIMATE HEADER ------//
     ----------------------------------*/
    $(window).on('scroll', function () {
        var sticky = $(".sticky-header");
        var scroll = $(window).scrollTop();
        if (scroll < 265) {
            sticky.removeClass("sticky");
        } else {
            sticky.addClass("sticky");
        }
    });



    /*----------------------------------
    //------ SMOOTHSCROLL ------//
    -----------------------------------*/
    smoothScroll.init({
        speed: 1000, // Integer. How fast to complete the scroll in milliseconds
        offset: 200, // Integer. How far to offset the scrolling anchor location in pixels

    });

    /*----------------------------------
    //------ LIGHTCASE ------//
    -----------------------------------*/
    if ($('a[data-rel^=lightcase]').length) {
        $('a[data-rel^=lightcase]').lightcase();
    }


    /*----------------------------------
    //------ ISOTOPE GALLERY ------//
    -----------------------------------*/
    /* activate jquery isotope */
    // $(window).on('load', function () {
    //     var $container = $('.portfolio-items').isotope({
    //         itemSelector: '.item',
    //         isOriginLeft: false,
    //         masonry: {
    //             columnWidth: '.col-xs-12'
    //         }
    //     });
    // });
    // // init Isotope
    // var $grid = $('.portfolio-items').isotope({
    //     // options...
    // });
    // // layout Isotope after each image loads
    // $grid.imagesLoaded().progress(function () {
    //     $grid.isotope('layout');
    // });
    // // bind filter button click
    // var filters = $('.filters-group ul li');
    // filters.on('click', function () {
    //     filters.removeClass('active');
    //     $(this).addClass('active');
    //     var filterValue = $(this).attr('data-filter');
    //     // use filterFn if matches value
    //     $('.portfolio-items').isotope({
    //         filter: filterValue
    //     });
    // });

    /*----------------------------------
    //------ OWL CAROUSEL ------//
    -----------------------------------*/
    if ($('.style1').length) {
        $('.style1').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1,
                    margin: 20
                },
                500: {
                    items: 1,
                    margin: 20
                },
                768: {
                    items: 2,
                    margin: 20
                },
                991: {
                    items: 2,
                    margin: 20
                },
                1025: {
                    items: 3,
                    margin: 20
                }
            }
        });
    }


    if ($('.style2').length) {
        $('.style2').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2,
                    margin: 20
                },
                400: {
                    items: 2,
                    margin: 20
                },
                500: {
                    items: 3,
                    margin: 20
                },
                768: {
                    items: 4,
                    margin: 20
                },
                992: {
                    items: 5,
                    margin: 20
                },
                1000: {
                    items: 6,
                    margin: 20
                }
            }
        });
    }

    if ($('.style3').length) {
        $('.style3').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1,
                    margin: 20
                },
                500: {
                    items: 1,
                    margin: 20
                },
                768: {
                    items: 2,
                    margin: 20
                },
                991: {
                    items: 2,
                    margin: 20
                },
                1000: {
                    items: 5,
                    margin: 20
                }
            }
        });
    }

    if ($('.carousel4').length) {
        $('.carousel4').owlCarousel({
            autoPlay: false,
            navigation: true,
            slideSpeed: 600,
            items: 3,
            itemsDesktop: [1239, 3],
            itemsTablet: [991, 2],
            itemsMobile: [767, 1]
        });
    }


    /*----------------------------------
    //------ TOP LOCATION ------//
    -----------------------------------*/
    if ($('#tp-carousel').length) {
        $('#tp-carousel').owlCarousel({
            loop: true,
            margin: 2,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1024: {
                    items: 3,
                    nav: true
                },
                1025: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    }

    /*----------------------------------
    //------ JQUERY SCROOLTOP ------//
    -----------------------------------*/
    var go = $(".go-up");
    $(window).on('scroll', function () {
        var scrolltop = $(this).scrollTop();
        if (scrolltop >= 50) {
            go.fadeIn();
        } else {
            go.fadeOut();
        }
    });

    /*----------------------------------
    //----- JQUERY COUNTER UP -----//
    -----------------------------------*/
    // $('.counter').counterUp({
    //     delay: 10,
    //     time: 5000,
    //     offset: 100,
    //     beginAt: 0,
    //     formatter: function (n) {
    //         return n.replace(/,/g, '.');
    //     }
    // });

    /*----------------------------------
    //------ MAGNIFIC POPUP ------//
    -----------------------------------*/
    $(document).ready(function () {
        // $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        //     disableOn: 700,
        //     type: 'iframe',
        //     mainClass: 'mfp-fade',
        //     removalDelay: 160,
        //     preloader: false,
        //     fixedContentPos: false
        // });
    });

    /*----------------------------------------------
    //------ FILTER TOGGLE (ON GOOGLE MAPS) ------//
    ----------------------------------------------*/
    $('.filter-toggle').on('click', function () {
        $(this).parent().find('form').stop(true, true).slideToggle();
    });

    /*----------------------------------
    //------ RANGE SLIDER ------//
    -----------------------------------*/
    $(".slider-range").slider({
        range: true,
        min: 5000,
        max: 200000,
        step: 1000,
        values: [60000, 130000],
        slide: function (event, ui) {
            $(".slider_amount").val("$" + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " - $" + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        }
    });
    $(".slider_amount").val("Price Range: $" + $(".slider-range").slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " - $" + $(".slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

    /*----------------------------------
    //------ MODAL ------//
    -----------------------------------*/
    var modal = {};
    modal.hide = function () {
        $('.modal').fadeOut();
        $("html, body").removeClass("hid-body");
    };
    $('.modal-open').on("click", function (e) {
        e.preventDefault();
        $('.modal').fadeIn();
        $("html, body").addClass("hid-body");
    });
    $('.close-reg').on("click", function () {
        modal.hide();
    });

    /*----------------------------------
    //------ TABS ------//
    -----------------------------------*/
    $(".tabs-menu a").on("click", function (a) {
        a.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var b = $(this).attr("href");
        $(".tab-contents").not(b).css("display", "none");
        $(b).fadeIn();
    });

    // $(".dropdown-menu.keep-open select").on("click", function (e) {
    //     e.stopPropagation();
    // });


}(jQuery));

// $(document).on("click", ".list-of-suggetions li", function (t) {
//     t.preventDefault();
//     var a = $(t.currentTarget),
//         n = a.closest(".dropdown");
//     n.find(".dropdown-toggle span").text(a.text());
//     // var o = a.data("value").split("-");
//     n.find("input.min-input").val(o[0]).trigger("change"), n.find("input.max-input").val(o[1]).trigger("change"), a.closest("form").trigger("submit");
// });
//
// $(document).on("change keyup", "input.min-input, input.max-input", function (t) {
//     p($(this).closest(".form-group"));
// });
// $(".dropdown .min-max-input").map(function () {
//     p($(this));
// });
//
// function p(e) {
//     var t = e.data("calc"),
//         a = e.find("input.min-input"),
//         n = e.find(".min-label"),
//         o = e.find(".max-label"),
//         i = e.find("input.max-input"),
//         r = parseInt(a.val()),
//         s = parseInt(i.val());
//     a.val(r || ""), i.val(s || "");
//     var c = e.data("all"),
//         l = "",
//         d = "";
//     s || r
//         ? (t.map(function (e) {
//             r >= e.number && !l && (l = e.label.replace("__value__", new Intl.NumberFormat().format(parseFloat((r / (e.number || 1)).toFixed(2))))),
//             s >= e.number && !d && (d = e.label.replace("__value__", new Intl.NumberFormat().format(parseFloat((s / (e.number || 1)).toFixed(2)))));
//         }),
//             n.text(l),
//             o.text(d),
//         r || (c = "< "),
//             s ? (r ? (c = l + " - " + d) : (c += d)) : (c = "> " + l))
//         : (n.text(l), o.text(d)),
//         e.closest(".dropdown").find(".dropdown-toggle span").text(c);
// }

!(function (e) {
    "use strict";
    e(document).ready(function () {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $(document).on('click', '.generic-form button[type=submit]', function (event) {
            event.preventDefault();
            event.stopPropagation();
            var buttonText = $(this).text();
            $(this).prop('disabled', true).html('<i class="fa fa-spin fa-spinner"></i>');

            $.ajax({
                type: 'POST',
                cache: false,
                url: $(this).closest('form').prop('action'),
                data: new FormData($(this).closest('form')[0]),
                contentType: false,
                processData: false,
                success: res => {
                    $(this).closest('form').find('.text-success').html('').hide();
                    $(this).closest('form').find('.text-danger').html('').hide();

                    if (!res.error) {
                        $(this).closest('form').find('input[type=text]:not([readonly])').val('');
                        $(this).closest('form').find('input[type=email]').val('');
                        $(this).closest('form').find('input[type=url]').val('');
                        $(this).closest('form').find('input[type=tel]').val('');
                        $(this).closest('form').find('select').val('');
                        $(this).closest('form').find('textarea').val('');

                        $(this).closest('form').find('.text-success').html(res.message).show();

                        if (res.data && res.data.next_page) {
                            window.location.href = res.data.next_page;
                        }

                        setTimeout(function () {
                            $(this).closest('form').find('.text-success').html('').hide();
                        }, 5000);
                    } else {
                        $(this).closest('form').find('.text-danger').html(res.message).show();

                        setTimeout(function () {
                            $(this).closest('form').find('.text-danger').html('').hide();
                        }, 5000);
                    }

                    if (typeof refreshRecaptcha !== 'undefined') {
                        refreshRecaptcha();
                    }

                    $(this).prop('disabled', false).html(buttonText);
                },
                error: res => {
                    if (typeof refreshRecaptcha !== 'undefined') {
                        refreshRecaptcha();
                    }
                    $(this).prop('disabled', false).html(buttonText);
                    handleError(res, $(this).closest('form'));
                }
            });
        });

        var handleError = function (data, form) {
            if (typeof (data.errors) !== 'undefined' && !_.isArray(data.errors)) {
                handleValidationError(data.errors, form);
            } else {
                if (typeof (data.responseJSON) !== 'undefined') {
                    if (typeof (data.responseJSON.errors) !== 'undefined') {
                        if (data.status === 422) {
                            handleValidationError(data.responseJSON.errors, form);
                        }
                    } else if (typeof (data.responseJSON.message) !== 'undefined') {
                        $(form).find('.text-danger').html(data.responseJSON.message).show();
                    } else {
                        var message = '';
                        $.each(data.responseJSON, (index, el) => {
                            $.each(el, (key, item) => {
                                message += item + '<br />';
                            });
                        });

                        $(form).find('.text-danger').html(message).show();
                    }
                } else {
                    $(form).find('.text-danger').html(data.statusText).show();
                }
            }
        };

        var handleValidationError = function (errors, form) {
            let message = '';
            $.each(errors, (index, item) => {
                message += item + '<br />';
            });

            $(form).find('.text-success').html('').hide();
            $(form).find('.text-danger').html('').hide();

            $(form).find('.text-danger').html(message).show();
        };




        var n = "project",
            o = e("#txtkey"),
            i = e("#hometypesearch");
        i.find("a").on("click", function () {
            e(".advanced-search-content").removeClass("active"),
                "project" === e(this).attr("rel")
                    ? (e(".advanced-search-content.property-advanced-search input").prop("disabled", !0),
                        e(".advanced-search-content.property-advanced-search select").prop("disabled", !0),
                        e(".advanced-search-content.project-advanced-search input").prop("disabled", !1),
                        e(".advanced-search-content.project-advanced-search select").prop("disabled", !1))
                    : (e(".advanced-search-content.project-advanced-search input").prop("disabled", !0),
                        e(".advanced-search-content.project-advanced-search select").prop("disabled", !0),
                        e(".advanced-search-content.property-advanced-search input").prop("disabled", !1),
                        e(".advanced-search-content.property-advanced-search select").prop("disabled", !1)),
                e(".listsuggest").html("").hide(),
                o.val(""),
                (n = e(this).attr("rel")),
                i.find("a").removeClass("active"),
                e(this).addClass("active"),
                e("#txttypesearch").val(n),
                e("#frmhomesearch").prop("action", e(this).data("url"));
        });
        var r = null;
        o.on("keydown", function () {
            e(".listsuggest").html("").hide(), e(this).parents(".keyword-input").find(".spinner-icon").hide();
        }),
            o.on("keyup", function () {
                var t = e(this).val();
                if (t) {
                    var a = e(this).parents(".keyword-input");
                    a.find(".spinner-icon").show(),
                        clearTimeout(r),
                        (r = setTimeout(function () {
                            e.get(e("#frmhomesearch").prop("action") + "?type=" + n + "&k=" + t, function (t) {
                                t.error || "" === t.data ? e(".listsuggest").html("").hide() : e(".listsuggest").html(t.data).show(), a.find(".spinner-icon").hide();
                            });
                        }, 500));
                }
            });
        var s,
            c = document.querySelectorAll("img.lazy");
        !(function e() {
            s && clearTimeout(s),
                (s = setTimeout(function () {
                    var t = window.pageYOffset;
                    c.forEach(function (e) {
                        e.offsetTop < window.innerHeight + t && ((e.src = e.dataset.src), e.classList.remove("lazy"));
                    }),
                    0 == c.length && (document.removeEventListener("scroll", e), window.removeEventListener("resize", e), window.removeEventListener("orientationChange", e));
                }, 200));
        })(),
            e(document).scroll(function () {
                window.pageYOffset > 0 ? e(".cd-top").find(".fas").attr("class", "fas fa-arrow-up") : e(".cd-top").find(".fas").attr("class", "fas fa-arrow-down");
            }),
            e(".pagination").addClass("pagination-sm"),
            e('[data-toggle="tooltip"]').tooltip(),
            e(document).on("click", ".cd-top", function (t) {
                return t.preventDefault(), e("html").scrollTop() > 0 ? e("body,html").animate({ scrollTop: 0 }, 800) : e("body,html").animate({ scrollTop: e("html").height() }, 800), !1;
            });
        var l = null;
        function d(t) {
            var a = [];
            t.find("select[name]").map(function (t) {
                var n = e(this).find("option:selected");
                n.text() && n.val() && a.push(n.text());
            }),
                t.find(".dropdown-toggle span").text(a && a.length ? a.join(" - ") : t.data("text-default"));
        }
        function p(e) {
            var t = e.data("calc"),
                a = e.find("input.min-input"),
                n = e.find(".min-label"),
                o = e.find(".max-label"),
                i = e.find("input.max-input"),
                r = parseInt(a.val()),
                s = parseInt(i.val());
            a.val(r || ""), i.val(s || "");
            var c = e.data("all"),
                l = "",
                d = "";
            s || r
                ? (t.map(function (e) {
                    r >= e.number && !l && (l = e.label.replace("__value__", new Intl.NumberFormat().format(parseFloat((r / (e.number || 1)).toFixed(2))))),
                    s >= e.number && !d && (d = e.label.replace("__value__", new Intl.NumberFormat().format(parseFloat((s / (e.number || 1)).toFixed(2)))));
                }),
                    n.text(l),
                    o.text(d),
                r || (c = "< "),
                    s ? (r ? (c = l + " - " + d) : (c += d)) : (c = "> " + l))
                : (n.text(l), o.text(d)),
                e.closest(".dropdown").find(".dropdown-toggle span").text(c);
        }
        function u() {
            window.innerWidth > 991 && e("#navbarSupportedContent").collapse("hide"), window.innerWidth <= 767 ? e("#ajax-filters-form .search-box").addClass("animation") : e("#ajax-filters-form .search-box").removeClass("animation");
        }
        e(".select-city-state")
            .on("keydown", function () {
                e(this).parents(".location-input").find(".suggestion").html("").hide();
            })
            .on("keyup", function () {
                var t = e(this).val();
                if (t) {
                    var a = e(this).parents(".location-input");
                    a.find(".input-has-icon i").hide(),
                        a.find(".spinner-icon").show(),
                        clearTimeout(l),
                        (l = setTimeout(function () {
                            e.get(window.siteUrl + "/ajax/cities?k=" + t, function (e) {
                                e.error || "" === e.data ? a.find(".suggestion").html("").hide() : a.find(".suggestion").html(e.data).show(), a.find(".spinner-icon").hide(), a.find(".input-has-icon i").show();
                            });
                        }, 500));
                }
            }),
            e(document).on("click", ".suggestion li a", function (t) {
                t.preventDefault(), t.stopPropagation();
                var a = e(this).parents(".location-input");
                a.find("input[name=city_id]").val(e(this).data("id")), a.find(".select-city-state").val(e(this).text()), a.find(".suggestion").html("").hide();
            }),
            e("#header-waypoint").waypoint({
                handler: function (t) {
                    "down" === t ? (e(".main-header").addClass("header-sticky"), e("body").addClass("is-sticky")) : (e(".main-header").removeClass("header-sticky"), e("body").removeClass("is-sticky"));
                },
            }),
            e("#navbarSupportedContent")
                .on("show.bs.collapse", function () {
                    e("body")
                        .addClass("hidden-scroll-main-menu")
                        .css(
                            "padding-right",
                            (function () {
                                var e = document.createElement("div");
                                (e.className = "modal-scrollbar-measure"), document.body.appendChild(e);
                                var t = e.getBoundingClientRect().width - e.clientWidth;
                                return document.body.removeChild(e), t;
                            })()
                        );
                })
                .on("hidden.bs.collapse", function () {
                    e("body").removeClass("hidden-scroll-main-menu").css("padding-right", "");
                }),
            e(document).on("click", ".main-menu-darken, .toggle-main-menu-offcanvas", function (t) {
                t.preventDefault(), e("#navbarSupportedContent").collapse("hide");
            }),
            e(document).on("click", ".advanced-search-toggler", function (t) {
                t.preventDefault(),
                    "project" === e("#hometypesearch a.active").attr("rel")
                        ? (e(".advanced-search-content.property-advanced-search").removeClass("active"), e(".advanced-search-content.project-advanced-search").toggleClass("active"))
                        : (e(".advanced-search-content.project-advanced-search").removeClass("active"), e(".advanced-search-content.property-advanced-search").toggleClass("active")),
                    e(".advanced-search-content.active").length
                        ? e(".listsuggest").css({ top: e(this).closest("form").height() + e(".advanced-search-content.property-advanced-search").height() + 5 + "px" })
                        : e(".listsuggest").css({ top: e(this).closest("form").height() + "px" });
            }),
            e(document).on("change", ".shop__sort select", function (t) {
                t.preventDefault(), e(this).closest("form").trigger("submit");
            }),
            e(document).on("click", function (t) {
                "form-control" !== t.target.className && ("keyword-input" !== t.target.className && e(".listsuggest").hide(), "location-input" !== t.target.className && e(".suggestion").hide());
            }),
            e(document).on("click", ".view-type-map", function () {
                e("#properties-map").toggleClass("d-none");
                var t = e("#properties-list").data("class-left");
                e(this).hasClass("active") && (t = e("#properties-list").data("class-full")), e("#properties-list").attr("class", t), e(this).toggleClass("active");
            }),
        e("#map2").length &&
        (function () {
            var t = e("#map2"),
                a = 0,
                n = 1,
                o = { type: t.data("type"), page: n },
                i = e("#map2").data("center"),
                r = e("#properties-list .property-item[data-lat][data-long]").filter(function () {
                    return e(this).data("lat") && e(this).data("long");
                });
            r && r.length && (i = [r.data("lat"), r.data("long")]), window.activeMap && (window.activeMap.off(), window.activeMap.remove());
            var s = L.map("map2", { zoomControl: !0, scrollWheelZoom: !0, dragging: !0, maxZoom: 22 }).setView(i, 14);
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(s);
            var c = new L.MarkerClusterGroup(),
                l = [],
                d = e("#traffic-popup-map-template").html();
            !(function i() {
                return (
                    (0 == a || n <= a) &&
                    ((o.page = n),
                        e.ajax({
                            url: t.data("url"),
                            type: "POST",
                            data: o,
                            success: function (e) {
                                e.data.length > 0 &&
                                (e.data.forEach(function (e) {
                                    if (e.latitude && e.longitude) {
                                        var t = L.divIcon({ className: "boxmarker", iconSize: L.point(50, 20), html: e.map_icon }),
                                            a = (function (e, t) {
                                                var a = Object.keys(e);
                                                for (var n in a)
                                                    if (a.hasOwnProperty(n)) {
                                                        var o = a[n];
                                                        t = t.replace(new RegExp("__" + o + "__", "gi"), e[o] || "");
                                                    }
                                                return t;
                                            })(e, d),
                                            n = new L.Marker(new L.LatLng(e.latitude, e.longitude), { icon: t }).bindPopup(a).addTo(s);
                                        l.push(n),
                                            c.addLayer(n),
                                            s.flyToBounds(
                                                L.latLngBounds(
                                                    l.map(function (e) {
                                                        return e.getLatLng();
                                                    })
                                                )
                                            );
                                    }
                                }),
                                // 0 == a && (a = e.meta.last_page),
                                    n++,
                                    i());
                            },
                        })),
                        !1
                );
            })(),
                s.addLayer(c),
                (window.activeMap = s);
        })(),
            e("#ajax-filters-form")
                .find(".select-dropdown")
                .map(function () {
                    d(e(this));
                }),
            e(document).on("click", "#ajax-filters-form .select-dropdown .btn-clear", function () {
                e(this)
                    .closest(".select-dropdown")
                    .find("select[name]")
                    .map(function () {
                        e(this).val("").trigger("change");
                    }),
                    e("#ajax-filters-form").trigger("submit");
            }),
            e(document).on("click", "#ajax-filters-form .select-dropdown button[type=submit]", function () {
                e("#ajax-filters-form").trigger("submit");
            }),
            e(document).on("click", "#ajax-filters-form button[type=reset]", function () {
                e("#ajax-filters-form").find(":input[name]").val("").trigger("change"), e("#ajax-filters-form").trigger("submit");
            }),
            e(document).on("submit", "#ajax-filters-form", function (t) {
                t.preventDefault();
                var a = e(t.currentTarget),
                    n = a.serializeArray(),
                    o = [],
                    i = [];
                n.forEach(function (e) {
                    e.value && (o.push(e), i.push(e.name + "=" + e.value));
                });
                var r = a.attr("action") + (i && i.length ? "?" + i.join("&") : "");
                a.find(".select-dropdown").map(function () {
                    d(e(this));
                }),
                    o.push({ name: "is_searching", value: 1 }),
                    e.ajax({
                        url: a.attr("action"),
                        type: "GET",
                        data: o,
                        beforeSend: function () {
                            e("#loading").show(), e("html, body").animate({ scrollTop: e("#ajax-filters-form").offset().top - (e(".main-header").height() + 50) }, 500), a.find(".search-box").removeClass("active");
                        },
                        success: function (t) {
                            if (0 == t.error) {
                                if ((a.find(".data-listing").html(t.data), window.wishlishInElement(a.find(".data-listing")), window.activeMap)) {
                                    var n = e("#properties-list .property-item[data-lat][data-long]").filter(function () {
                                        return e(this).data("lat") && e(this).data("long");
                                    });
                                    n.length && window.activeMap.setView([n.data("lat"), n.data("long")], 8);
                                }
                                r != window.location.href && window.history.pushState(o, t.message, r);
                            } else window.showAlert("alert-error", t.message || "Opp!");
                        },
                        complete: function () {
                            e("#loading").hide();
                        },
                    });
            }),
            window.addEventListener(
                "popstate",
                function (t) {
                    var a = e("#ajax-filters-form"),
                        n = window.location.origin + window.location.pathname;
                    if (a.attr("action") == n) {
                        var o = (function () {
                            var e,
                                t,
                                a = window.location.search.substring(1).split("&"),
                                n = {};
                            for (t in a) "" !== a[t] && ((e = a[t].split("=")), (n[decodeURIComponent(e[0])] = decodeURIComponent(e[1])));
                            return n;
                        })();
                        a.find("input, select, textarea").each(function (t, a) {
                            var n = e(a),
                                i = o[n.attr("name")] || "";
                            n.val() != i && n.val(i).trigger("change");
                        }),
                            a.trigger("submit");
                    } else history.back();
                },
                !1
            ),
            e(".dropdown-menu.keep-open select").on("click", function (e) {
                e.stopPropagation();
            }),
            e(document).on("click", ".list-of-suggetions li", function (t) {
                t.preventDefault();
                var a = e(t.currentTarget),
                    n = a.closest(".dropdown");
                n.find(".dropdown-toggle span").text(a.text());
                var o = a.data("value").split("-");
                n.find("input.min-input").val(o[0]).trigger("change"), n.find("input.max-input").val(o[1]).trigger("change"), a.closest("form").trigger("submit");
            }),
            e(document).on("change keyup", "input.min-input, input.max-input", function (t) {
                p(e(this).closest(".form-group"));
            }),
            e(".dropdown .min-max-input").map(function () {
                p(e(this));
            }),
            e(document).on("click", "#ajax-filters-form .pagination a", function (t) {
                t.preventDefault();
                var a = new URL(e(t.currentTarget).attr("href")).searchParams.get("page");
                e("#ajax-filters-form input[name=page]").val(a), e("#ajax-filters-form").trigger("submit");
            }),
            e(document).on("click", ".toggle-filter-offcanvas", function (t) {
                t.preventDefault(), e("#ajax-filters-form .search-box").toggleClass("active");
            }),
            u(),
            e(window).on("resize", function (e) {
                u();
            }),
            e(document).on("click", "#ajax-filters-form .screen-darken", function (t) {
                t.preventDefault(), e("#ajax-filters-form .search-box").removeClass("active");
            });
        var m,
            f = e("#trafficMapModal");
        function h(t) {
            m && (m.off(), m.remove()), f.find(".modal-title").text(e("h1").text()), (m = L.map(t.data("map-id"), { zoomControl: !1, scrollWheelZoom: !0, dragging: !0, maxZoom: 22 }).setView(t.data("center"), 14));
            var a = L.divIcon({ className: "boxmarker", iconSize: L.point(50, 20), html: t.data("map-icon") });
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(m),
                L.marker(t.data("center"), { icon: a })
                    .addTo(m)
                    .bindPopup(e(t.data("popup-id")).html())
                    .openPopup();
        }
        e('[data-popup-id="#traffic-popup-map-template"]').length && h(e('[data-popup-id="#traffic-popup-map-template"]')),
        jQuery().magnificPopup &&
        (e(".show-gallery-image").on("click", function () {
            e("#listcarouselthumb .showfullimg:first").trigger("click");
        }),
            e("#listcarouselthumb, #listcarousel").magnificPopup({
                delegate: ".showfullimg",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "mfp-img-mobile",
                gallery: { enabled: !0, navigateByImgClick: !0, preload: [0, 1] },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function (e) {
                        return e.el.attr("title");
                    },
                },
            }),
            e(".popup-youtube").magnificPopup({
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 160,
                preloader: !1,
                hiddenClass: "zxcv",
                overflowY: "hidden",
                iframe: {
                    patterns: {
                        youtube: {
                            index: "youtube.com",
                            id: function (e) {
                                var t = e.match(/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/);
                                return t && 11 == t[7].length ? t[7] : e;
                            },
                            src: "//www.youtube.com/embed/%id%?autoplay=1",
                        },
                    },
                },
            }),
            e(document).on("click", "[data-magnific-popup]", function (t) {
                var a = e(t.currentTarget),
                    n = a.data("magnific-popup");
                e.magnificPopup.open({
                    items: { src: n, type: "inline" },
                    removalDelay: 300,
                    overflowY: "hidden",
                    midClick: !0,
                    callbacks: {
                        beforeOpen: function () {
                            a.data("clicked") || e(this.st.items.src).html("");
                        },
                        open: function () {
                            a.data("clicked") || (a.data("clicked", !0), h(a));
                        },
                    },
                }),
                    t.preventDefault();
            }));
    });
})(jQuery);

$(document).ready(function(){

    /*--------------------------------------------------*/
    /*  Mobile Menu - mmenu.js
    /*--------------------------------------------------*/
    $(function() {
        function mmenuInit() {
            var wi = $(window).width();
            if(wi <= '992') {

                $('#footer').removeClass("sticky-footer");

                $(".mmenu-init" ).remove();
                $("#navigation").clone().addClass("mmenu-init").insertBefore("#navigation").removeAttr('id').removeClass('style-1 style-2').find('ul').removeAttr('id');
                $(".mmenu-init").find(".container").removeClass("container");

                $(".mmenu-init").mmenu({
                    "counters": true,
                    "extensions": [
                        "position-back",
                        "position-right"
                    ]
                }, {
                    // configuration
                    offCanvas: {
                        pageNodetype: "#wrapper",
                    }
                });

                var mmenuAPI = $(".mmenu-init").data( "mmenu" );
                var $icon = $(".hamburger");

                $(".mmenu-trigger").click(function() {
                    mmenuAPI.open();
                });

                mmenuAPI.bind( "open:finish", function() {
                    setTimeout(function() {
                        $icon.addClass( "is-active" );
                    });
                });
                mmenuAPI.bind( "close:finish", function() {
                    setTimeout(function() {
                        $icon.removeClass( "is-active" );
                    });
                });


            }
            $(".mm-next").addClass("mm-fullsubopen");
        }
        mmenuInit();
        $(window).resize(function() { mmenuInit(); });
    });

    /*  User Menu */
    $('.user-menu').on('click', function(){
        $(this).toggleClass('active');
    });


    /*----------------------------------------------------*/
    /*  Sticky Header
    /*----------------------------------------------------*/
    $( "#header" ).not( "#header-container.header-style-2 #header" ).clone(true).addClass('cloned unsticky').insertAfter( "#header" );
    $( "#navigation.style-2" ).clone(true).addClass('cloned unsticky').insertAfter( "#navigation.style-2" );

    // Logo for header style 2
    $( "#logo .sticky-logo" ).clone(true).prependTo("#navigation.style-2.cloned ul#responsive");


    // sticky header script
    var headerOffset = $("#header-container").height() * 2; // height on which the sticky header will shows

    $(window).scroll(function(){
        if($(window).scrollTop() >= headerOffset){
            $("#header.cloned").addClass('sticky').removeClass("unsticky");
            $("#navigation.style-2.cloned").addClass('sticky').removeClass("unsticky");
        } else {
            $("#header.cloned").addClass('unsticky').removeClass("sticky");
            $("#navigation.style-2.cloned").addClass('unsticky').removeClass("sticky");
        }
    });




    /*----------------------------------------------------*/
    /*  Tabs
    /*----------------------------------------------------*/

    var $tabsNav    = $('.tabs-nav'),
        $tabsNavLis = $tabsNav.children('li');

    $tabsNav.each(function() {
        var $this = $(this);

        $this.next().children('.tab-content').stop(true,true).hide()
            .first().show();

        $this.children('li').first().addClass('active').stop(true,true).show();
    });

    $tabsNavLis.on('click', function(e) {
        var $this = $(this);

        $this.siblings().removeClass('active').end()
            .addClass('active');

        $this.parent().next().children('.tab-content').stop(true,true).hide()
            .siblings( $this.find('a').attr('href') ).fadeIn();

        e.preventDefault();
    });
    var hash = window.location.hash;
    var anchor = $('.tabs-nav a[href="' + hash + '"]');
    if (anchor.length === 0) {
        $(".tabs-nav li:first").addClass("active").show(); //Activate first tab
        $(".tab-content:first").show(); //Show first tab content
    } else {
        console.log(anchor);
        anchor.parent('li').click();
    }



    /*----------------------------------------------------*/
    /*	Toggle
    /*----------------------------------------------------*/

    $(".toggle-container").hide();

    $('.trigger, .trigger.opened').on('click', function(a){
        $(this).toggleClass('active');
        a.preventDefault();
    });

    $(".trigger").on('click', function(){
        $(this).next(".toggle-container").slideToggle(300);
    });

    $(".trigger.opened").addClass("active").next(".toggle-container").show();


    /*----------------------------------------------------*/
    /* Panel Dropdown
    /*----------------------------------------------------*/
    function close_panel_dropdown() {
        $('.panel-dropdown').removeClass("active");
        $('.fs-inner-container.content').removeClass("faded-out");
    }

    $('.panel-dropdown a').on('click', function(e) {

        if ( $(this).parent().is(".active") ) {
            close_panel_dropdown();
        } else {
            close_panel_dropdown();
            $(this).parent().addClass('active');
            $('.fs-inner-container.content').addClass("faded-out");
        }

        e.preventDefault();
    });

    // Apply / Close buttons
    $('.panel-buttons button').on('click', function(e) {
        $('.panel-dropdown').removeClass('active');
        $('.fs-inner-container.content').removeClass("faded-out");
    });

    // Closes dropdown on click outside the conatainer
    var mouse_is_inside = false;

    $('.panel-dropdown').hover(function(){
        mouse_is_inside=true;
    }, function(){
        mouse_is_inside=false;
    });

    $("body").mouseup(function(){
        if(! mouse_is_inside) close_panel_dropdown();
    });


    // Adjusting Panel Dropdown Width
    $(window).on('load resize', function() {
        var panelTrigger = $('.booking-widget .panel-dropdown a');
        $('.booking-widget .panel-dropdown .panel-dropdown-content').css({
            'width' : panelTrigger.outerWidth()
        });
    });


// ------------------ End Document ------------------ //
});


// Search Side bar

function s(e) {
    if (e.prop("checked"))
        e.one("click", function () {
            e.prop("checked", !1);
            $(e).trigger("change");
        });
}
if ($("#filter-form").length) {
    $("#filter-form").on("keyup change paste", "input, select, textarea", function () {
        // manualSearch(0);
        return !1;
    });
    $("#filter-submit").click(function (e) {
       //  e.preventDefault();
        // if (typeof scroll_enabled === "undefined") scroll_enabled = "#results_conteiner";
        // if ($(scroll_enabled).length)
        //     if ($(".fullscreen-inner-md").length) {
        //         $(document).scrollTop($(scroll_enabled).offset().top - 450);
        //     } else if (scroll_enabled && !$(".fullscreen-inner-md").length) {
        //         $(document).scrollTop($(scroll_enabled).offset().top - 150);
        //     }
        // return 0;
    });
    $(this).on("mouseup", 'input[type="radio"]', function () {
        var e = $(this);
        s(e);
    });
    $(this).on("mouseup", "label", function () {
        var t = $(this),
            e;
        if (t.attr("for")) e = $("#" + t.attr("for")).filter('input[type="radio"]');
        else e = t.children('input[type="radio"]');
        if (e.length) s(e);
    });
}


// Price Slider

var priceSlider = document.getElementsByClassName('noui-slider-range');
if (priceSlider.length >= 1) {
    for (var i = 0; i < priceSlider.length; i++) {
        let rangeSlider = priceSlider[i];
        var a = document.getElementById($(priceSlider[i]).attr("id"));
            // n = wNumb({ decimals: $(rangeSlider).data("format-decimals"), thousand: ",", postfix: " " + $(rangeSlider).data("format-prefix") });
        $(rangeSlider).parents(".slider-wrapper").find(".range-from-val").html($(rangeSlider).data("min-value"));
        $(rangeSlider).parents(".slider-wrapper").find(".range-to-val").html($(rangeSlider).data("max-value"));
        $(rangeSlider).find("input[data-target=min-value]").val($(rangeSlider).data("min-value"));
        $(rangeSlider).find("input[data-target=max-value]").val($(rangeSlider).data("max-value"));

        noUiSlider.create(a, {
            start: [$(rangeSlider).data("min-value"), $(rangeSlider).data("max-value")],
            step: $(rangeSlider).data("step"),
            margin: $(rangeSlider).data("step"),
            direction: $(rangeSlider).data("direction"),
            range: { min: [$(rangeSlider).data("min-value")], max: [$(rangeSlider).data("max-value")] },
            // format: n,
            connect: !0
        });

        a.noUiSlider.on("update", function (e, t) {
            $(rangeSlider).parents(".slider-wrapper").find(".range-from-val").html(e[0]);
            $(rangeSlider).parents(".slider-wrapper").find(".range-to-val").html(e[1]);
        });
        a.noUiSlider.on("end", function (e, t) {
            $(rangeSlider).parents(".slider-wrapper").find(".range-from-val").html(e[0]);
            $(rangeSlider).parents(".slider-wrapper").find(".range-to-val").html(e[1]);
            $(rangeSlider).find("input[data-target=min-value]").val(n.from(e[0]));
            $(rangeSlider).find("input[data-target=max-value]").val(n.from(e[1])).trigger("change");
        });
    }
}
