
<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#loginform');
        form.submit(function(event) {
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('welcomePage/Login') ?>',
                data: data,
                beforeSend: function () {
                        $('#alert').html('<img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax_loader_blue_128.gif" alt="" style="" id="loading"/>');
                    },
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    $('#alert').html('');
                    if (result.success) {
                        var item = $('<div class="g-form-row-field">' +
                                '<div id="success" class="g-alert type_success">' +
                                '<div class="g-alert-body" style="text-align: center">' +
                                '<p><b>' + result.message + '</b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>').hide().fadeIn(120);

                        $('#alert').html(item);
                        setInterval(location.href = result.url, 3000);
                        
                    }
                    else {

                        var item = $('<div class="g-form-row-field">' +
                                '<div id="error" class="g-alert type_error">' +
                                '<div class="g-alert-body" style="text-align: center">' +
                                '<p><b>' + result.message + '</b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        var hide = $('#alert').css('display');
                        if (hide == 'none') {
                            $('#alert').html(item).slideDown('slow');
                        } else {
                            $('#alert').html(item).slideUp('fast').slideDown('800');
                        }
                        //   var json = $.parseJSON(data);
                        //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                    }
                }
            });
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
        $('div#alert').click(function() {
            $('#alert').slideUp();
        });
    });
</script>

<!-- MAIN -->
<div class="l-submain" style="height: 100%; padding-top: 10px">
    <div class="l-submain-h i-cf">
        <div class="l-content">
            <div class="l-content-h i-widgets">
                <div id="alert" style="position: absolute; z-index: 99; width: 100%; top: -55px; display: none; text-align: center">

                </div>
                <div class="g-cols" style="margin-top: 10%; margin-bottom: 0">
                    <div class="two-thirds">
                        <div class="w-gallery type_slider">
                            <div class="w-gallery-h">
                                <div class="w-gallery-main">
                                    <div class="w-gallery-main-h flexslider flex-loading" style="margin: auto;<!--  border: 5px solid black -->">
                                        <ul class="slides">
                                            <li>
                                                <div>
                                                    <h3>Welcome to Our Social</h3>
                                                    <img style="height: 120px; width: 120px; margin: auto" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.jpg" />
                                                    <h4>Ong Xanh Mặt Ngầu</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="g-cols">
                                                        <div class="one-half">
                                                            <img height="375" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/big-2.jpg" />
                                                        </div>
                                                        <div class="one-half">
                                                            <div class="wpb_text_column ">
                                                                <div class="wpb_wrapper" style="text-align: left">
                                                                    <h3>Project Info</h3>
                                                                    <blockquote>
                                                                        <b>Vu Ngoc Son</b>
                                                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                                                                        Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
                                                                        natoque penatibus et magnis dis parturient montes.
                                                                    </blockquote>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div class="g-cols">
                                                        <div class="one-half">
                                                            <img height="375" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/our-goal.jpg" />
                                                        </div>
                                                        <div class="one-half">
                                                            <div class="wpb_text_column ">
                                                                <div class="wpb_wrapper" style="text-align: left">
                                                                    <h3>Our Goal</h3>
                                                                    <blockquote>
                                                                        <ul>
                                                                            <li><b>mục tiêu 1</b> bla bla</li>
                                                                            <li><b>mục tiêu 2</b> bla bla</li>
                                                                            <li><b>mục tiêu 3</b> bla bla</li>
                                                                        </ul>
                                                                    </blockquote>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <style type="text/css"></style>
                                        <ul class="flex-direction-nav">
                                            <li>
                                                <a href="#" class="flex-prev" style="color: black; border-bottom: none; ">Previous</a>
                                            </li>
                                            <li>
                                                <a href="#" class="flex-next" style="color: black; border-bottom: none">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            jQuery(window).load(function() {
                                jQuery(".flexslider").flexslider({
                                        directionalNav: true,
                                        controlNav: false,
                                        smoothHeight: true,
                                        pauseOnHover: true,
                                        start: function(slider) {
                                                jQuery(".flexslider").removeClass("flex-loading");
                                            }
                            });
                            });</script>
                    </div>
                    <div class="one-third">
                        <style type="text/css">
                            .fix-g-form {
                                text-align: center;
                            }
                        </style>
                        <div class="w-tabs layout_accordion" style="border: 2px dashed #429edb; border-radius: 5px; height: 398px">
                            <div class="w-tabs-h">
                                <div class="w-tabs-section active" style="border: none;">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-text fix-g-form" style="margin: 0 0 -2px 0; padding: 0">Đăng Nhập</span>
                                    </div>
                                    <div class="w-tabs-section-content" style="display: none;">
                                        <div class="w-tabs-section-content-h">
                                            <div class="wpb_text_column ">
                                                <div class="wpb_wrapper">
                                                    <form class="g-form" action="<?php $this->createUrl('welcomePage/Login') ?>" method="POST" id="loginform">
                                                        <div class="g-form-group">
                                                            <div class="g-form-group-rows">
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-field">
                                                                        <div class="g-input">
                                                                            <input type="text" name="username" id="contact_username" value="" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-field">

                                                                        <div class="g-input">
                                                                            <input type="password" name="Password" id="Password" value="" placeholder="Mật Khẩu *">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="checkbox" style="display: block; min-height: 20px; margin: -10px 0 0 0; padding-left: 20px;">
                                                                        <label style="margin-bottom: 0; font-weight: normal; cursor:pointer;float: left">
                                                                            <input type="checkbox" style="float:left; line-height: normal; margin: 5px 0 0 -20px;">
                                                                            <p style="margin-left: -5px">Duy trì Đăng Nhập</p>
                                                                        </label>
                                                                        <a href="quenmatkhau" style="float:right">Quên Mật Khẩu?</a>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row"  style="padding-bottom: 5px; margin-top: -5px">
                                                                    <div class="g-form-row-field">
                                                                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit" style="width: 100%">Đăng Nhập</button>
                                                                        
                                                                    </div>
                                                                </div>                                                   
                                                                <?php $this->renderPartial('fb') ?>
                                                            </div>
                                                        </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section" style="border-top: 2px dashed #429edb">
                                    <?php $this->renderPartial('signUp') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-actionbox controls_aside color_primary" style="padding: 20px 40px; margin-top: -20px">
    <div class="w-actionbox-h" style="max-width: 600px; margin: 0 auto">
        <div class="w-actionbox-text" style="font-size: 26px">
            <h3 style="float: left; margin-top: 7px">Click</h3>
            <a id="learn-more" class="w-actionbox-button g-btn type_primary size_big" href="#rock" target="_blank" style="float: left; margin-right: 20px"><span>Learn More</span></a>
            <p style="float: left; font-size: 16px">Add Some Text Here</p>
        </div>
        <div class="w-actionbox-controls">
            Add Some Text Here
        </div>
    </div>
</div>
<div id="rock"></div>
<div class="l-submain">
    <div class="l-submain-h i-cf" style="width: 60%">
        <div id="cbp-so-scroller" class="cbp-so-scroller">
            <section class="cbp-so-section">
                <figure class="cbp-so-side cbp-so-side-left">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/2.png" alt="img01">
                </figure>
                <article class="cbp-so-side cbp-so-side-right">
                    <h2>Plum caramels</h2>
                    <p>Lollipop powder danish sugar plum caramels liquorice sweet cookie. Gummi bears caramels gummi bears candy canes cheesecake sweet roll icing dragée. Gummies jelly-o tart. Cheesecake unerdwear.com candy canes apple pie halvah chocolate tiramisu.</p>
                </article>
            </section>
            <section class="cbp-so-section">
                <article class="cbp-so-side cbp-so-side-left">
                    <h2>Marzipan gingerbread</h2>
                    <p>Soufflé bonbon jelly cotton candy liquorice dessert jelly bear claw candy canes. Pudding halvah bonbon marzipan powder. Marzipan gingerbread sweet jelly.</p>
                </article>
                <figure class="cbp-so-side cbp-so-side-right">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/3.png" alt="img01">
                </figure>
            </section>
            <section class="cbp-so-section">
                <figure class="cbp-so-side cbp-so-side-left">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/1.png" alt="img01">
                </figure>
                <article class="cbp-so-side cbp-so-side-right">
                    <h2>Carrot cake</h2>
                    <p>Sesame snaps sweet wafer danish. Chupa chups carrot cake icing donut halvah bonbon. Chocolate cake candy marshmallow pudding dessert marzipan jujubes sugar plum.</p>
                </article>
            </section>
            <section class="cbp-so-section"  style="margin-bottom:0">
                <article class="cbp-so-side cbp-so-side-left" style="padding: 0; width: 100%; min-height: 0; text-align: center;">
                    <h2>Take A Tour</h2>
                </article>
            </section>
            <section class="cbp-so-section">
                <figure class="cbp-so-side cbp-so-side-right" style="width: 100%">
                    <div class="w-video ratio_16-9">
                        <div class="w-video-h">
                            <iframe width="560" height="315" src="//www.youtube.com/embed/-HJodK56EsU" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </figure>
            </section>
            <div class="cbp-so-section">
                <div class="cbp-so-side cbp-so-side-left" style="padding: 0; width: 100%; min-height: 0; text-align: center;">
                    <a id="signup" href="#">
                        <button class="g-btn type_secondary size_big" style="background-color: #429edb"><span>Sign up now and join the fun!</span></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
                new cbpScroller(document.getElementById('cbp-so-scroller'));
        $(document).ready(function() {
            $('#signup').click(function() {
                $.smoothScroll({
                    scrollTarget: '#',
                    afterScroll: function() {
                        $('div#signuparea').trigger('click');
                    },
                    speed: 800,
                    easing: 'swing',
                });
                return false;
            });
            $('#learn-more').click(function() {
                $.smoothScroll({
                    scrollTarget: '#rock',
                    speed: 800,
                });
                return false;
            });
        });
    </script>
</div>
<!-- /MAIN -->