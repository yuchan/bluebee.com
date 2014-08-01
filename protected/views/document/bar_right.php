<div class="one-third">
    <?php $this->renderPartial('partial/upload'); ?>
    <div class="wrap_fliter">
        <div class="clearfix">
            <script type="text/javascript">
                $('input.status_input').on('change', function() {
                    $('input.status_input').not(this).prop('checked', false);
                });
            </script>
        </div>
        <div class="clearfix" style="margin-top: 10px">
            <span class="">Lọc theo Môn học</span>
            <div class="filter_subjects" id="filter_subject">
                
            </div>
        </div>
    </div>
    <div>

    </div>
</div>

<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {
        jQuery("span.subject_filter").click(function() {
            var $self = $(this);
            var filter_time = $self.val();

            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('document/listdocumentfaculty') ?>",
                data: {subject_dept: dept_id, subject_faculty: faculty_id, subject_type: subject_type},
                beforeSend: function() {
                    $('#loading-image').show();
                },
                success: function(data) {
                    var result = $.parseJSON(data);
                    jQuery('#list_document').empty();
                    jQuery.each(result.doc_data, function(key, value) {
                        jQuery('#list_document').append(
                                '<li class="item_document">' +
                                '<div class="box_item">' +
                                '<div class="short_info_document clearfix">' +
                                '<div class="document_img">' +
                                '<img src="' + this.doc_url + '">' +
                                '<a href="/viewdocument?doc_id=' + this.doc_id + '" class="document_img_hover">' +
                                '<span class="describe_document">blah blah blah</span>' +
                                '<em class="timestamp"><i class="icon-time"></i>&nbsp;June 26, 2014</em>' +
                                '</a>' +
                                '</div>' +
                                ' <ul class="document_status clearfix">' +
                                '<li class="score"><i class="icon-heart"></i>2000</li>' +
                                '<li class="view"><i class="icon-eye-open"></i>1999</li>' +
                                '<li class="comment"><i class="icon-comment"></i>1203</li>' +
                                '</ul>' +
                                '<span class="attribution-user">' +
                                '<a href="/sonvn" class="url_user" title="Sonvn">' +
                                '<img class="photo_user" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default-avatar.png"> Sonvn' +
                                '</a>' +
                                '</span>' +
                                '</div>' +
                                '</div>' +
                                '<a class="name_document" href=""><strong>' + this.doc_name + '</strong></a>' +
                                '</li>');
                    });
                    jQuery.each(result.subject_data, function(key, value) {
                        jQuery('#filter_subject').empty();
                        jQuery('#filter_subject').append(
                                '<label class="checkbox-styled">' +
                                '<input type="checkbox"/>' +
                                '<span subject_id = "'+this.subject_id+'">' + this.subject_name + '</span>' +
                                '</label>');
                    });
                }
            });
        });
    });
</script>

