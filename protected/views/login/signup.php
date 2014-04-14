<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#signupform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('login/signup') ?>',
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
<div class="w-tabs-section-content" style="display: none;">
    <div class="w-tabs-section-content-h">
        <div class="wpb_text_column ">
            <div class="wpb_wrapper">
                <form class="g-form" action="<?php echo Yii::app()->createUrl('login/signup') ?>" method="POST" id="signupform">
                    <input type="hidden" name="action" value="contact">
                    <div class="g-form-group">
                        <div class="g-form-group-rows">
                            <div class="g-form-row">
                                <div class="g-form-row-label">
                                    <label class="g-form-row-label-h" for="new_user_name">Tên của bạn *</label>
                                </div>
                                <div class="g-form-row-field">
                                    <div class="g-input">
                                        <input type="text" name="contact_name" id="contact_name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="g-form-row">
                                <div class="g-form-row-label">
                                    <label class="g-form-row-label-h" for="contact_email">Email của bạn *</label>
                                </div>
                                <div class="g-form-row-field">
                                    <div class="g-input">
                                        <input type="text" name="contact_email" id="contact_email" value="">
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
                                    <label class="g-form-row-label-h" id="res2" style="color: red;"></label>
                                </div>

                            </div>
                            <div class="g-form-row">
                                <div class="g-form-row-field">
                                    <button class="g-btn type_primary" type="submit" name="Submit" value="Submit">Dang ky</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>