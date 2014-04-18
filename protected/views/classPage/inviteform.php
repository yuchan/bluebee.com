
<form id="box-invite-friends" style="clear: both; display: none" action="<?php echo Yii::app()->createUrl('classPage/invite') ?>">
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