<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#signupform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('welcomepage/signup') ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    $('#res2').html(result.message);
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

<div id="signuparea" class="w-tabs-section-title">
    <span class="w-tabs-section-title-text fix-g-form" style="margin: 0 0 0 5px; padding: 0">Chưa có Tài Khoản? Đăng Ký!</span>
</div>
<div class="w-tabs-section-content" style="display: none;">
    <div class="w-tabs-section-content-h">
        <div class="wpb_text_column ">
            <div class="wpb_wrapper">
                <form class="g-form" action="<?php echo Yii::app()->createUrl('welcomepage/signup') ?>" method="POST" id="signupform">
                    <input type="hidden" name="action" value="contact">
                    <div class="g-form-group">
                        <div class="g-form-group-rows">
                            <div class="g-form-row">
                                <div class="g-form-row-field">
                                    <div class="g-input">
                                        <input type="text" name="contact_name" id="contact_name" value="" placeholder="Tên của bạn *">
                                    </div>
                                </div>
                            </div>
                            <div class="g-form-row">
                                <div class="g-form-row-field">
                                    <div class="g-input">
                                        <input type="text" name="contact_email" id="contact_email" value="" placeholder="Email của bạn *">
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
                                <div class="g-form-row-field">
                                    <div class="g-alert type_success with_close" style="position: absolute; z-index: 2; width: 89%">
                                        <div class="g-alert-close"> ✕ </div>
                                        <div class="g-alert-body">
                                            <p><b>Success Message</b>. Your Text Goes Here.</p>
                                        </div>
                                    </div>
                                    <div class="g-alert type_error with_close" style="position: absolute; z-index: 2; width: 89%">
                                        <div class="g-alert-close"> ✕ </div>
                                        <div class="g-alert-body">
                                            <p><b>Success Message</b>. Your Text Goes Here.</p>
                                        </div>
                                    </div>
                                    <button class="g-btn type_primary size_small" type="submit" name="Submit" value="Submit" style="width: 100%">
                                        <i class="icon-pencil"></i>
                                        Đăng Ký</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>