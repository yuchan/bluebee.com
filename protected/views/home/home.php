<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#newclassform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('classPage/createclass') ?>',
                data: data,
                beforeSend: function() {
                    $('#alert').html('<img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax_loader_blue_128.gif" alt="" style="" id="loading"/>');
                },
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    $('#alert').html('');

                    if (result.success == 1) {
                        var item = $('<div class="g-form-row-field">' +
                                '<div id="success" class="g-alert type_success">' +
                                '<div class="g-alert-body">' +
                                '<p><b>' + result.message + '</b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>').hide().fadeIn(120);

                        $('#alert').html(item)
                        location.href = result.url;
                    }
                    else if (result.success == 2) {

                        var item = $('<div class="g-form-row-field">' +
                                '<div id="error" class="g-alert type_error">' +
                                '<div class="g-alert-body">' +
                                '<p><b>' + result.message + ' <a href = "' + result.url_class_exist + '">đây</a></b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>').hide().fadeIn(120);

                        $('#alert').html(item)
                        //   var json = $.parseJSON(data);
                        //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
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
                }});
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });</script>

<div class="l-main-h">
    <div class="l-main-h">

        <div class="l-submain">
            <div class="l-submain-h g-html i-cf">
                <div class="g-cols">
                    <div class="two-thirds">
                        <div class="g-cols">
                            <div class="one-half">
                                <div class="w-iconbox icon_top">
                                    <div class="w-iconbox-h">
                                        <div class="w-iconbox-icon">
                                            <i class="icon-group"></i>
                                        </div>
                                        <div class="w-iconbox-text  color_alternate">
                                            <div class="w-iconbox-text-description">
                                                <a class="popup-with-form" href="#newclassform">
                                                    <button class="g-btn type_primary size_big"><span><i class="icon-heart"></i>Tạo lớp môn học</span></button>
                                                </a>

                                                <?php $this->renderPartial('newclass') ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one-half">
                                <div class="w-iconbox icon_top">
                                    <div class="w-iconbox-h">
                                        <div class="w-iconbox-icon">
                                            <i class="icon-book"></i>
                                        </div>
                                        <div class="w-iconbox-text color_alternate">
                                            <div class="w-iconbox-text-description">
                                                <button class="g-btn type_primary size_big"><span><i class="icon-arrow-up"></i>Tạo nhóm học tập</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->renderPartial('partial/activity') ?>
                    </div>

                    <div class="one-third">
                        <?php $this->renderPartial('partial/user_class') ?>
                        <?php $this->renderPartial('partial/user_group') ?>
                        <?php $this->renderPartial('partial/user_document') ?>                    

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

