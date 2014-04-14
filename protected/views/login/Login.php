<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#loginform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('login/Login') ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    $('#res').html(result.message);
//                    var json = $.parseJSON(data);
//                    $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                }
            });
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });
</script>
<!-- MAIN -->
<div class="l-submain">
    <div class="l-submain-h g-html i-cf">
        <div class="l-content">
            <div class="l-content-h i-widgets">
                <div class="g-cols">
                    <div class="one-half">
                        <div class="wpb_text_column ">
                            <div class="wpb_wrapper">
                                <h3>Project Info</h3>
                                <blockquote>
                                    <b>Vu Ngoc Son</b>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                                    Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
                                    natoque penatibus et magnis dis parturient montes.
                                </blockquote>
                            </div>
                        </div>
                        <div class="w-video ratio_16-9">
                            <div class="w-video-h">
                                <iframe src="//www.youtube.com/embed/on0bAfbLALQ" width="1500" height="844" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" __idm_id__="3631105"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="one-half">

                        <div class="w-tabs layout_accordion with_icon">
                            <div class="w-tabs-h">
                                <div class="w-tabs-section with_icon active">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon fa fa-trophy">
                                        </span>
                                        <span class="w-tabs-section-title-text">Đăng Nhập</span>
                                        <span class="w-tabs-section-title-control">
                                            <i class="icon-angle-down"></i>
                                        </span>
                                    </div>
                                    <div class="w-tabs-section-content" style="display: none;">
                                        <div class="w-tabs-section-content-h">
                                            <div class="wpb_text_column ">
                                                <div class="wpb_wrapper">
                                                    <form class="g-form" action="" method="POST" id="loginform">
                                                        <div class="g-form-group">
                                                            <div class="g-form-group-rows">
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" for="contact_email">Tên người dùng (User name) *</label>
                                                                    </div>
                                                                    <div class="g-form-row-field">
                                                                        <div class="g-input">
                                                                            <input type="text" name="username" id="contact_username" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" for="Password">Mật Khẩu *</label>
                                                                    </div>
                                                                    <div class="g-form-row-field">
                                                                        <div class="g-input">
                                                                            <input type="password" name="Password" id="Password" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-label">
                                                                        <label class="g-form-row-label-h" id="res" style="color: red;"></label>
                                                                    </div>

                                                                </div>
                                                                <div class="g-form-row">
                                                                    <div class="checkbox" style="display: block; min-height: 20px; margin: 0; padding-left: 20px;">
                                                                        <label style="display: inline; margin-bottom: 0; font-weight: normal; cursor:pointer;">
                                                                            <input type="checkbox" style="float:left; line-height: normal; margin: 5px 0 0 -20px;">
                                                                            Duy trì Đăng Nhập
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <a href="quenmatkhau" style="float:right; margin-top: 5px;">Quên Mật Khẩu?</a>
                                                                <div class="g-form-row">
                                                                    <div class="g-form-row-field">
                                                                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit">Đăng Nhập</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php $this->renderPartial('fb') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section with_icon" href ="khoalevan" name ="Sign_up">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon fa fa-flask"></span>
                                        <span class="w-tabs-section-title-text">Chua co tai khoan? Dang ky!</span>
                                        <span class="w-tabs-section-title-control">
                                            <i class="icon-angle-down"></i>
                                        </span>
                                    </div>
                                    <?php $this->renderPartial('signup') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /MAIN -->