<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#box-invite-friends');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('classPage/invite?classid='.$classid) ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    if (result.success) {
//                            var item = $('<div class="g-form-row-field">' +
//                                    '<div id="success" class="g-alert type_success">' +
//                                    '<div class="g-alert-body">' +
//                                    '<p><b>' + result.message + '</b></p>' +
//                                    '</div>' +
//                                    '</div>' +
//                                    '</div>').hide().fadeIn(120);
//                                    $('#alert').html(item)
                        alert(result.message);
                        location.href = result.url;
                    }
                    else {

//                            var item = $('<div class="g-form-row-field">' +
//                                    '<div id="error" class="g-alert type_error">' +
//                                    '<div class="g-alert-body">' +
//                                    '<p><b>' + result.message + '</b></p>' +
//                                    '</div>' +
//                                    '</div>' +
//                                    '</div>').hide().fadeIn(120);
//                                    $('#alert').html(item)
                        //   var json = $.parseJSON(data);
                        //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                        alert(result.message);
                    }

                }});
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });</script>
<form id="box-invite-friends" style="clear: both; display: none" action="">
    <input contenteditable=true id="invite-friends" type="text" name="friends"></input>
    <button type="submit" id="invite-friends-button" class="g-btn type_primary size_small" style="width: 100%">
        <span>Invite Your Friends</span>
    </button>
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajax({
                type: "get",
                url: '<?php echo Yii::app()->createUrl('classPage/suggestfriend') ?>',
                success: function(data) {
                    var arr = $.parseJSON(data);
                    $("#invite-friends").tokenInput(
                            arr
                            , {
                        theme: "facebook",
                        preventDuplicates: true
                    });
//                                    $('button#invite-friends-button').click(function () {
//                                        alert("Would submit: " + $(this).siblings("#invite-friends").val());
//                                    });
                }
            });
            // chay thu phat, a 
        });
    </script>
</form>