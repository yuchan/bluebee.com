
<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#loginform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('welcomepage/Login') ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    if (result.success) {
                        location.href = result.url;
                    }
                    else {

                        var item = $('<div class="g-form-row-field">' +
                                '<div id="error" class="g-alert type_error">' +
                                '<div class="g-alert-body">' +
                                '<p><b>' + result.message + '</b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>').hide().fadeIn(120);

                        $('#alert').html(item)
                        //   var json = $.parseJSON(data);
                        //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                    }
                }
            });
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });</script>
<!-- MAIN -->
<div class="l-submain" style="height: 100%">
    <div class="l-submain-h i-cf" style="width: 60%">
        <div class="l-content">
            <div class="l-content-h i-widgets">
                <div class="g-cols" style="margin-top: 10%; margin-bottom: 0">
                    <div class="one-half">
                        <div style="margin-top: 15%; text-align: center">
                            <h3>Welcome to Our Social</h3>
                            <img style="height: 150px; width: 150px; margin: auto" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.jpg" />
                            <h4>Ong Xanh Mặt Ngầu</h4>
                        </div>
                    </div>
                    <div class="one-half">
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
                                                    <form class="g-form" action="<?php $this->createUrl('welcomepage/login') ?>" method="POST" id="loginform">
                                                        <div class="g-form-group">
                                                            <div class="g-form-group-rows">
                                                                <div class="g-form-row"id="alert" style="position: absolute; z-index: 2; width: 89%; right:100%">

                                                                </div>
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
                                                                        <label style="display: inline; margin-bottom: 0; font-weight: normal; cursor:pointer;">
                                                                            <input type="checkbox" style="float:left; line-height: normal; margin: 5px 0 0 -20px;">
                                                                            Duy trì Đăng Nhập
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row"  style="padding-bottom: 5px; margin-top: -10px">
                                                                    <div class="g-form-row-field">
                                                                        <button class="g-btn type_primary size_small" type="submit" name="Submit" value="Submit">Đăng Nhập</button>
                                                                        <a href="quenmatkhau" style="float:right; margin-top: 5px">Quên Mật Khẩu?</a>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                <?php $this->renderPartial('fb') ?>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section" style="border-top: 2px dashed #429edb">
                                    <?php $this->renderPartial('signup') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            #learn-more {
                margin:  50px auto 0 auto;
                width: 20%;
                text-align: center;
                cursor: pointer;
                float: none;
                clear: both;
            }
            @media screen and (max-width: 73.5em) {
                #learn-more {
                    width: 40%;
                    margin:  -20px auto 0 auto;
                }
            }
        </style>
        <div id="learn-more">
            <a href="#rock"> Learn more <br><i class="icon-angle-down" style="margin-left: 3px"></i> </a>
        </div>
    </div>
</div>
<div id="rock" style="border-top: 2px solid whitesmoke; margin-top: 80px"></div>
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