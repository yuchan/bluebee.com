<!--Drag and Drop file to upload-->
<script type="text/javascript">
	Dropzone.autoDiscover = false;
    $(document).ready(function() {
        var myDropzone = new Dropzone("#my-dropzone");
        myDropzone.on("success", function(file, data) {
	        var json = data;
	        var result = $.parseJSON(json);
	        $('#thumbnail_url').val(result.thumbnail);
	        $('#doc_id').val(result.docid);
                
        });

    });
</script>
<style>
    .fixmargin{
        margin: 2% 5% 2% 5%;
    }
</style>
<div class="w-tabs layout_accordion type_toggle" style="margin-bottom: 5%">
    <div class="w-tabs-h">
        <div class="w-tabs-section with_icon">
            <div class="w-tabs-section-title">
                <span class="w-tabs-section-title-icon icon-book"></span>
                <span class="w-tabs-section-title-text">Bạn muốn chia sẻ 1 tài liệu lên?</span>
                <span class="w-tabs-section-title-control"><i class="icon-angle-down"></i></span>
            </div>
            <div class="w-tabs-section-content">

                <div class="g-form-group">
                    <div class="g-form-group-rows">
                        <div id="dropzone" class="fixmargin" style="min-height: 180px; border:2px dashed #4894C7; border-radius: 5px;">
                            <form action="<?php echo Yii::app()->createUrl('document/upload') ?>" class="dropzone dz-clickable dz-started"
                                  id="my-dropzone">
                            </form>
                        </div>
                    </div>
                    <form method="POST" id="formscribd" action="document/updateinfo">
                        <div class="g-form-group-rows">
                            <div class="g-form-row-field">
                                <div class="g-input">
                                    <input type="hidden" name="thumbnail_url" id="thumbnail_url" value="" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 5px; background-color: white;">
                                </div>
                            </div>
                        </div>

                        <div class="g-form-group-rows">
                            <div class="g-form-row-field">
                                <div class="g-input">
                                    <input type="hidden" name="doc_id" id="doc_id" value="" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 5px; background-color: white;" >
                                </div>
                            </div>
                        </div>
                        <div class="g-form-group-rows">
                            <div class="g-form-row-field">
                                <div class="g-input">
                                    <input type="text" name="title" id="title" value="" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 5px; background-color: white;" placeholder="Tên Tài Liệu *">
                                </div>
                            </div>
                        </div>
                        <div class="g-form-group-rows">
                            <div class="g-form-row-field">
                                <div class="g-input">
                                    <textarea name="description" id="description" value="" style="max-height: 5%; max-width: 90%; margin-left: 5%; margin-right: 5%; margin-top: 2%; border-radius: 5px; background-color: white;" placeholder="Thêm mô tả *"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="g-form-group-rows fixmargin one-third">
                            <select style="max-width: 300px; border-radius: 5px; background-color: white;" name="faculty">
                                <!--thêm ngành học tại đây-->
                                <option>Ngành học</option>
                                <option value="1">Công nghệ thông tin</option>
                                <option value="2">Vật lý kĩ thuật</option>
                            </select>
                        </div>
                        <div class="g-form-group-rows">
                            <button class="g-btn type_primary size_small fixmargin" type="submit" name="Submit">Đăng Tài Liệu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
