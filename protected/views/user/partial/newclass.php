
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
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    if (result.success) {
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
                    else if (result.message == 0){

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
                    
                    else {
                       var item = $('<div class="g-form-row-field">' +
                                '<div id="error" class="g-alert type_error">' +
                                '<div class="g-alert-body">' +
                                '<p><b>' + result.message + ' <a href = '+result.url_class_exist+'>đây</a></b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>').hide().fadeIn(120);

                        $('#alert').html(item) 
                }
            });
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });</script>


<form class="g-form white-popup-block mfp-hide" id="newclassform" action="<?php $this->createUrl('classPage/createClass')?>" method="POST">
                        <h3>Tạo một lớp mới</h3>
                        <div class="g-form-group">
                            <div class="g-form-group-rows">
                                <div class="g-form-row">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="classcode">Mã lớp</label>
                                    </div>
                                    <div class="g-form-row-field">
                                        <div class="g-input">
                                            <input type="text" name="classcode" id="contact_username" placeholder="Mã lớp" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="g-form-row">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="classname">Tên lớp</label>
                                    </div>
                                    <div class="g-form-row-field">
                                        <div class="g-input">
                                            <input type="text" name="classname" id="contact_username" placeholder="Tên lớp" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="g-form-group">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="description">Miêu tả</label>
                                    </div>
                                    <div class="g-form-group-rows">
                                        <div class="g-form-row">
                                            <div class="g-form-row-field">
                                                <textarea name="description" id="input1x3" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="g-form-row">
                                    <div class="g-form-row-field">
                                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit">Tạo lớp mới</button>
                                    </div>
                                </div>

                            </div>
                            <div id="alert"></div>
                        </div>
                    </form>