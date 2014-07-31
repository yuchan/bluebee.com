<div class="one-fourth" style="
     border-right-style: double;
     border-right-width: thick;
     border-color: #d0d6d9;
     ">

    <h3>Các chủ đề</h3>            
    <div class="widget">
        <nav class="w-nav">
            <div class="w-nav-h">
                <div class="w-nav-list layout_ver level_1">
                    <div class="w-nav-list-h">
                        <?php foreach ($category_father as $category): ?>
                            <div class="w-nav-item level_1 active">

                                <?php $dept = Dept::model()->findAllByAttributes(array('dept_faculty' => $category->faculty_id)); ?>
                                <div class="w-nav-item-h">
                                    <a href="javascript:void(0)" class="w-nav-anchor level_1 faculty" faculty-id="<?php echo $category->faculty_id ?>"><?php echo $category->faculty_name ?> 
                                        <span class="w-nav-title " ></span>
                                    </a>

                                    <?php
                                    if ($dept) {
                                        foreach ($dept as $dept_detail):
                                            ?>
                                            <div class="w-tabs layout_accordion type_toggle">
                                                <div class="w-tabs-h">
                                                    <div class="w-tabs-section with_icon">

                                                        <div class="w-tabs-section-title">
                                                            <a class="w-tabs-section-title-text dept" style="margin-left: 32px" faculty-id="<?php echo $category->faculty_id ?>" dept-id="<?php echo $dept_detail->dept_id ?>">- <?php echo $dept_detail->dept_name ?></a>
                                                        </div>
                                                        <div class="w-tabs-section-content">
                                                            <div class="w-tabs-section-content-h">
                                                                <?php foreach ($subject_type as $subject_detail): ?>
                                                                    <div class="w-nav-item level_2 active">
                                                                        <div class="w-nav-item-h">

                                                                            <a href="javascript:void(0)" class="w-nav-anchor level_2 subject" faculty-id="<?php echo $category->faculty_id; ?>" dept-id="<?php echo $dept_detail->dept_id ?>" subject-type="<?php echo $subject_detail->id ?>">
                                                                                <span class="w-nav-title " >
                                                                                    <?php echo $subject_detail->subject_type_name ?>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <div class="w-tabs-section-content">
                                            <div class="w-tabs-section-content-h">
                                                <?php foreach ($subject_type as $subject_detail): ?>
                                                    <div class="w-nav-item level_2 active">
                                                        <div class="w-nav-item-h">

                                                            <a href="#" class="w-nav-anchor level_2 subject" faculty-id="<?php echo $category->faculty_id; ?>" dept-id="<?php echo $dept_detail->dept_id ?>" subject-type="<?php echo $subject_detail->id ?>">
                                                                <span class="w-nav-title" >
                                                                    <?php echo $subject_detail->subject_type_name ?>
                                                                </span>
                                                            </a>

                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                        <?php endforeach; ?>  
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>


<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.subject").click(function() {
            var $self = $(this);
            var faculty_id = $self.attr("faculty-id");
            var dept_id = $self.attr("dept-id");
            var subject_type = $self.attr("subject-type");
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('document/listdocument') ?>",
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
                                '<a href="/viewdocument?' + this.doc_id + '" class="document_img_hover">' +
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
                                '<span>' + this.subject_name + '</span>' +
                                '</label>');
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.dept").click(function() {
            var $self = $(this);
            var faculty_id = $self.attr("faculty-id");
            var dept_id = $self.attr("dept-id");
            var subject_type = $self.attr("subject-type");
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('document/listdocumentdept') ?>",
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
                                '<a href="/viewdocument?' + this.doc_id + '" class="document_img_hover">' +
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
                                '<span>' + this.subject_name + '</span>' +
                                '</label>');
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.f").click(function() {
            var $self = $(this);
            var faculty_id = $self.attr("faculty-id");
            var dept_id = $self.attr("dept-id");
            var subject_type = $self.attr("subject-type");
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
                                '<a href="/viewdocument' + ?this.doc_id + '" class="document_img_hover">' +
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
                                '<span>' + this.subject_name + '</span>' +
                                '</label>');
                    });
                }
            });
        });
    });
</script>



