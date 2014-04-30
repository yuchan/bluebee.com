<script>
    $(document).ready(function() {
        var urlstring = window.location;
        var realurlstring = urlstring.toString();
        var classid = realurlstring.substr(realurlstring.lastIndexOf('=') + 1);
        $('#class_id_cover').val(classid);
    });
</script>
<div class="custom_file_upload info">

    <form class="file_upload" id ="file_upload" enctype="multipart/form-data" action="<?php echo Yii::app()->createUrl('classPage/changecover')?>">  
        <input type="hidden" id="class_id_cover" name="class_id_cover">
        <input type="file" id="file_upload" name="file_upload" class="">
    </form>  
</div>