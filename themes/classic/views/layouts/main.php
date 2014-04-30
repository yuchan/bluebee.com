<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic" />
        <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700" />

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/motioncss.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/motioncss-widgets.css" />


        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/rs-settings.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/switcher.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/magnific-popup.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/responsive.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/animation.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/colors/color_11.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ava.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/dropzone.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/basic.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/token-input.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/token-input-facebook.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/token-input-mac.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/component.css" />


        <!-- javascript -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/g-alert.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.carousello.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.flexslider.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.magnific-popup.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.parallax.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.simpleplaceholder.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.smoothScroll.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/navToSelect.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/w-lang.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/w-search.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/w-tabs.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/w-timeline.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/dropzone.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/w-switcher.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.tokeninput.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/classie.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/cbpScroller.js"></script>

        <!-- Star rating-->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ratings.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.barrating.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.example-f').barrating({showSelectedRating: false});
            });
        </script>

        <!-- Pop-up -->
        <script>
            $(document).ready(function() {
                $('.novaCat').on('blur', function(ui, event) {
                    var valor = $('.novaCat').val();
                    if (valor) {
                        $('#novaCategoria').dialog({
                            modal: true,
                            resizable: false,
                            buttons: {
                                "OK": function() {
                                    $(this).dialog("close");
                                }
                            }
                        });
                    }
                    ;
                });

                //formulário popup
                $('.popup-with-form').magnificPopup({
                    type: 'inline',
                    preloader: false,
                    focus: '#name',
                    callbacks: {
                        beforeOpen: function() {
                            if ($(window).width() < 700) {
                                this.st.focus = false;
                            } else {
                                this.st.focus = '#name';
                            }
                        }
                    }
                });

            });
        </script>
        

        <!-- GMap-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.gmap.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.w-map-h').gMap({
                    controls: {
                        panControl: false,
                        zoomControl: true,
                        mapTypeControl: true,
                        scaleControl: false,
                        streetViewControl: false,
                        overviewMapControl: false
                    },
                    address: "Đại học Quốc Gia Hà Nội - Xuân Thủy, 144 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam",
                    zoom: 15,
                    markers: [
                        {
                            address: "Đại học Quốc Gia Hà Nội - Xuân Thủy, 144 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam",
                            html: "Trụ sở của chúng tôi",
                            popup: true
                        }
                    ]
                });
            });
        </script>
        <script type="text/javascript">var switchTo5x = true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options
                    ({publisher: "ur-b6bcdd5b-dde-cce8-a00c-478890414ff", doNotHash: true, doNotCopy: true, hashAddressBar: true});
        </script>

    </head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="l-body home" style="background-color: white">

    <!-- CANVAS -->
    <div class="l-canvas type_wide col_cont headerpos_fixed headertype_extended">
        <div class="l-canvas-h">

            <!-- HEADER -->
            <div class="l-header">
                <div class="l-header-h">
                    <div class="l-subheader at_top" style="background-image: url('<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/header.jpg')">
                    </div>

                    <div class="l-subheader at_middle">
                        <div class="l-subheader-h i-cf">
                            <!-- LOGO -->
                            <div class="w-logo">
                                <div class="w-logo-h">
                                    <a class="w-logo-link" href="<?php echo Yii::app()->createUrl("home") ?>" class="w-nav-anchor level_1">
                                        <img class="w-logo-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.jpg" alt="BlueBee" />
                                        <span class="w-logo-title">
                                            <span class="w-logo-title-h">BlueBee</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="w-logo">
                                <div class="w-logo-h">
                                    <a class="w-logo-link" href="<?php echo Yii::app()->createUrl("home") ?>" class="w-nav-anchor level_1">
                                        <img class="w-logo-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo2.jpg" alt="BlueBee" />
                                        <span class="w-logo-title">
                                            <span class="w-logo-title-h">BlueBee</span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- SEARCH -->
                            <div class="w-search submit_inside">
                                <div class="w-search-h">
                                    <a class="w-search-show" href="javascript:void(0)" style="margin: auto;">
                                        <i class="icon-search" style="line-height: inherit"></i>
                                    </a>
                                    <form class="w-search-form show_hidden" action="#" />
                                    <div class="w-search-input">
                                        <input type="text" value="" placeholder="Bạn muốn tìm gì ?" />
                                    </div>
                                    <div class="w-search-submit">
                                        <input type="submit" value="Search" />

                                    </div>
                                    <a class="w-search-close" href="javascript:void(0)" title="Close search"> &#10005; </a>
                                    </form>
                                </div>
                            </div>

                            <!-- NAV -->
                            <nav class="w-nav ">
                                <div class="w-nav-h align_center">
                                    <div class="w-nav-select">
                                        <select class="w-nav-select-h">
                                        </select>
                                    </div>
                                    <div class="w-nav-list layout_hor width_auto float_right level_1">
                                        <div class="w-nav-list-h">
                                            <div class="w-nav-item level_1 active">
                                                <div class="w-nav-item-h">
                                                    <a href="<?php echo Yii::app()->createUrl("home") ?>" class="w-nav-anchor level_1">
                                                        <span class="w-nav-icon"><i class="icon-star"></i></span>
                                                        <span class="w-nav-title">Trang chủ</span>
                                                        <span class="w-nav-hint"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="w-nav-item level_1">
                                                <div class="w-nav-item-h">
                                                    <a href="<?php echo Yii::app()->createUrl("share/teacherListPage") ?>" class="w-nav-anchor level_1">
                                                        <span class="w-nav-icon"><i class="icon-star"></i></span>
                                                        <span class="w-nav-title">Giáo viên</span>
                                                        <span class="w-nav-hint"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="w-nav-item level_1">
                                                <div class="w-nav-item-h">
<!--                                                    <a href="<?php echo Yii::app()->createUrl("document") ?>" class="w-nav-anchor level_1">
                                                        <span class="w-nav-icon"><i class="icon-star"></i></span>
                                                        <span class="w-nav-title">Tài liệu</span>
                                                        <span class="w-nav-hint"></span>
                                                    </a>-->
                                                </div>
                                            </div>

                                            <div class="w-nav-item level_1">
                                                <div class="w-nav-item-h">
                                                    <a href="#" class="w-nav-anchor level_1">
                                                        <span class="w-nav-icon"><i class="icon-star"></i></span>
                                                        <span class="w-nav-title">Lớp môn học</span>
                                                        <span class="w-nav-hint"></span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="w-nav-item level_1">
                                                <div class="w-nav-item-h">
<!--                                                    <a href="<?php echo Yii::app()->createUrl("share") ?>" class="w-nav-anchor level_1">
                                                        <span class="w-nav-icon"><i class="icon-star"></i></span>
                                                        <span class="w-nav-title">Nhóm</span>
                                                        <span class="w-nav-hint"></span>
                                                    </a>-->

                                                    <div class="w-nav-list place_down show_onhover level_2">
                                                        <div class="w-nav-list-h">
                                                            <div class="w-nav-item level_2">
                                                                <div class="w-nav-item-h">
                                                                    <a href="home-landing.html" class="w-nav-anchor level_2">Group - Vietnam National University</a>
                                                                </div>
                                                            </div>
                                                            <div class="w-nav-item level_2">
                                                                <div class="w-nav-item-h">
                                                                    <a href="home-parallax.html" class="w-nav-anchor level_2">Group - Blue UET team</a>
                                                                </div>
                                                            </div>
                                                            <div class="w-nav-item level_2">
                                                                <div class="w-nav-item-h">
                                                                    <a href="home-parallax.html" class="w-nav-anchor level_2">Group - Blue UET team</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="w-nav-item level_1">
                                                <div class="w-nav-item-h">
                                                    <a href="<?php echo Yii::app()->createUrl("user?token=" . Yii::app()->session['token']) ?>" class="w-nav-anchor level_ava">
                                                        <img style="border: 5px solid white;"class="ava" src="<?php
                                                        if (Yii::app()->session['user_avatar'] == "") {
                                                            echo Yii::app()->theme->baseUrl, "/assets/img/logo.jpg";
                                                        } else {

                                                            echo Yii::app()->session['user_avatar'];
                                                        }
                                                        ?>"/>
                                                    </a>


                                                    <div class="w-nav-list place_down show_onhover level_2">
                                                        <div class="w-nav-list-h">
                                                            <div class="w-nav-item level_2">
                                                                <div class="w-nav-item-h">
                                                                    <a href="<?php echo Yii::app()->createUrl('welcomePage/logout') ?>" class="w-nav-anchor level_2">Đăng xuất</a>
                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="w-nav-item level_2">
                                                                                                                            <div class="w-nav-item-h">
                                                                                                                                <a href="home-parallax.html" class="w-nav-anchor level_2">Cập nhật thông tin</a>
                                                                                                                            </div>
                                                                                                                        </div>-->

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                            </nav>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /HEADER -->

            <!-- MAIN -->
            <div class="l-main">
                <?php echo $content; ?>
            </div>
            <!-- /MAIN -->
        </div>
    </div>
    <!-- /CANVAS -->

    <!-- FOOTER -->
    <div class="l-footer type_normal" style="margin-top: 50px;">
        <div class="l-footer-h">
            <!-- subfooter: bottom -->
            <div class="l-subfooter at_bottom">
                <div class="l-subfooter-h i-cf">
                    <div class="w-copyright">© 2014 All rights reserved. <a href='bluebee-uet.com'>BlueBee Team - K57CA - UET</a></div>

                    <!-- NAV -->
                    <nav class="w-nav">
                        <div class="w-nav-h">
                            <div class="w-nav-list layout_hor width_auto float_right level_1">
                                <div class="w-nav-list-h">
                                    <div class="w-nav-item level_1">
                                        <div class="w-nav-item-h">
                                            <a href="" class="w-nav-anchor level_1">Điều khoản và dịch vụ</a>
                                        </div>
                                    </div>
                                    <div class="w-nav-item level_1">
                                        <div class="w-nav-item-h">
                                            <a href="" class="w-nav-anchor level_1">FAQ</a>
                                        </div>
                                    </div>
                                    <div class="w-nav-item level_1">
                                        <div class="w-nav-item-h">
                                            <a href="<?php echo Yii::app()->createUrl("Contact") ?>" class="w-nav-anchor level_1">Liên hệ</a>
                                        </div>
                                    </div>

                                    <div class="w-nav-item level_1">
                                        <div class="w-nav-item-h">
                                            <a href="<?php echo Yii::app()->createUrl("aboutUs") ?>" class="w-nav-anchor level_1">Về chúng tôi</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
    </div>

    <!-- /FOOTER -->

    <a class="w-toplink" href="#"><i class="icon-angle-up" style="line-height: inherit"></i></a>
    <script>
        $(document).ready(function () {
            $('.comment-container').hide();
            $('.opencmt').click(function(event) {
                var current = $(this);
                var hide = current.next().css('display');
                if (hide == 'none') {
                    $(this).html('<i class="icon-chevron-up"></i><span>&nbsp;Đóng</span>');
                    current.next().slideDown('slow', function() {
                    });
                } else {
                    $(this).html('<i class="icon-chevron-down"></i><span>&nbsp;Xem thêm</span>');
                    current.next().slideUp();
                }
            });
        });
        window.color_scheme = "color_11";
        window.body_layout = "wide";
    </script>

</body>
</html>
