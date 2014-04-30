<script>
    $(document).ready(function() {
        var urlstring = window.location;
        var realurlstring = urlstring.toString();
        var classid = realurlstring.substr(realurlstring.lastIndexOf('=') + 1);
        $('#class_id_cover').val(classid);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#loading').hide();
        var form = $('#file_upload');
        form.change(function(event) {
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('classPage/changecover') ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    alert(json);
                }});
        });
    });
</script>
<div class="custom_file_upload info">

    <form class="file_upload" id ="file_upload" enctype="multipart/form-data" action="<?php echo Yii::app()->createUrl('classPage/changecover') ?>" method="POST">  
        <input type="hidden" id="class_id_cover" name="class_id_cover">
        <input type="file" id="file_upload_cover" name="file_upload_cover" class="">
    </form>  
</div>