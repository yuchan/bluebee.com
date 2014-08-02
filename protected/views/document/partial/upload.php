<?php
if (Yii::app()->session["user_id"] == "") {
    echo '<script type="text/javascript">'
    , 'checkuploadfunction();'
    , '</script>';
}
?>

<script>
    function checkuploadfunction() {
        alert("Bạn phải đăng nhập mới được upload, hãy bấm đăng nhập với facebook phía trên");

    }
</script>
<div class="morph-button morph-button-modal morph-button-fixed" id="morph-upload">
    <button class="btn-2 btn-2a" type="button" onclick="<?php if (Yii::app()->session["user_id"] == "") echo 'checkuploadfunction();' ?>" >Đăng một tài liệu lên</button>
    <?php //if (Yii::app()->session["user_id"] != "") { ?>
        <div class="morph-content" id="upload_area_morph">
            <div class="content-style-text">
                <span class="icon icon-close">✕</span>
                <h4 style="margin-bottom: 5px;">Hãy chọn một tài liệu mà bạn muốn đăng</h4>
                <script type="text/javascript">
        $(document).ready(function() {
            $('.ssa').change(function() {
                var file = this.files[0];
                var file_size = file.size / 1024;
                file_size = (Math.round(file_size * 100) / 100);
                $('.upload_button').hide();
                $('.file_name').html(' ' + file.name + ' ');
                $('.file_size').html(' - ' + file_size + 'KB');
                $('.info_file').show();
            });
            $('.cancel_file').click(function(event) {
                $('.info_file').hide();
                $('.upload_button').show();
            });
        });
                </script>
                <form method="POST" action="<?php echo Yii::app()->createUrl('document/upload') ?>" enctype="multipart/form-data" id="">
                    <label class="g-btn size_small type_primary upload_button">
                        <input class="ssa" type="file" multiple="multiple" name="file" style="display: none;" />
                        <span>Chọn 1 tệp tin</span>
                    </label>
                    <div class="info_file" style="display: none">
                        <span class="file_name"></span>
                        <span class="file_size"></span>
                        <span class="cancel_file">✕</span>
                    </div>
                    <input id="name_document" type="text" placeholder="Tên tài liệu" name="doc_name"/>
                    <textarea id="description_document" placeholder="Mô tả" name="doc_description"></textarea>
                    <select style="max-width: 200px; border-radius: 3px; background-color: white; margin: 5px 0;" name="subject_id">
                        <!--thêm môn học tại đây-->
                        <option>Môn học</option>
                        <?php foreach ($subject_info as $subject_info_detail) : ?>
                            <option value="<?php echo $subject_info_detail->subject_id ?>"><?php echo $subject_info_detail->subject_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br/>
                    <button class="g-btn size_small type_primary" type="submit">Đăng tài liệu</button>
                </form>
            </div>
        </div>
    <?php //} ?>
</div><!-- morph-button -->
