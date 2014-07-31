<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.subject").click(function() {
            var $self = $(this);
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfoView') ?>",
                beforeSend: function() {
                    $('#loading-image').show();
                },
                success: function(data) {
                    var json = data;
                    var result = data;
                    jQuery('.three-fourths').html(data);
                    var faculty_id = $self.attr("faculty-id");
                    var dept_id = $self.attr("dept-id");
                    var subject_type = $self.attr("subject-type");
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfo') ?>",
                        data: {subject_dept: dept_id, subject_faculty: faculty_id, subject_type: subject_type},
                        beforeSend: function() {
                            jQuery('.three-fourths').hide();
                        },
                        success: function(data) {

                            var result = $.parseJSON(data);
                            $("#loading-image").hide();
                            jQuery('.three-fourths').show();
                            jQuery.each(result.subject_group_type, function(key, value) {
                                jQuery('#subject_type_tab').append(
                                        '<div class="w-tabs-item" subject_type_id=' + this.subject_type_id + '>' +
                                        '<span class="w-tabs-item-icon"></span>' +
                                        '<span class="w-tabs-item-title">' + this.subject_group_type + '</span>' +
                                        '</div>');
                                jQuery('#subject_type_details').append(
                                        '<div class="w-tabs-section">' +
                                        ' <div class="w-tabs-section-title">' +
                                        '<span class="w-tabs-section-title-icon"></span>' +
                                        '<span class="w-tabs-section-title-text">' + this.subject_group_type + '</span>' +
                                        '<span class="w-tabs-section-title-control"></span>' +
                                        '</div>' +
                                        '<div class="w-tabs-section-content" style="">' +
                                        '<div class="w-tabs-section-content-h">' + this.detail + '</div>' +
                                        '</div>' +
                                        '</div>');
                            });

                            jQuery('#subject_type_tab').children().first().addClass('active');
                            jQuery.each(result.subject_data, function(key, value) {
                                jQuery('#listsubject').append(
                                        '<tr style="border-bottom: 1px solid #d0d6d9">' +
                                        '<td><a href = "<?php echo Yii::app()->createUrl('listOfSubject/subject?subject_id=') ?>' + this.subject_id + '">' + this.subject_name + '</a></td>' +
                                        '<td>' + this.subject_credits + '</td>' +
                                        '<td>' + this.subject_credit_hour + '</td>' +
                                        '<td>' + this.subject_code + '</td>' +
                                        '</tr>');
                            });
                            var list = result.subject_type;
                            jQuery.each(result.subject_type, function(i, item) {
                                $('#subject_type_name').html(item.subject_type_name);
                                console.log(item.subject_type_name);
                            });
                            jQuery(".w-tabs").wTabs();
                            $("#content-tabs.w-tabs .w-tabs-section").first().addClass('active');
                            $('#loading-image').hide();
                        }
                    });
                }
            });
        });
    });
</script>
<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {
        $('#loading-image').hide();
        jQuery("a.dept").click(function() {
            var $self = $(this);
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/deptInfoView') ?>",
                beforeSend: function() {
                    $('#loading-image').show();
                },
                success: function(data) {
                    var json = data;
                    var faculty_id = $self.attr("faculty-id");
                    var dept_id = $self.attr("dept-id");
                    jQuery('.three-fourths').html(data);
                    jQuery("#tab_acc.w-tabs").wTabs();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/DeptInfo') ?>",
                        data: {faculty_id: faculty_id, dept_id: dept_id},
                        beforeSend: function() {
                            jQuery('.three-fourths').hide();
                        },
                        success: function(data) {
                            jQuery('.three-fourths').show();
                            var json = $.parseJSON(data);
                            //  $('#subject_type_tab').html('');
                            var list = json.dept_data;
                            $.each(list, function(i, item) {
                                $('#head_subject').html(item.dept_name);
                                $('#dept_detail').html(item.dept_target);
                                $('#dept_knowledge').html(item.dept_knowleadge);
                                $('#dept_skill').html(item.dept_skill);
                                $('#dept_behavior').html(item.dept_behavior);
                                $('#dept_name').html(item.dept_name);
                                $('#dept_in_standart').html(item.dept_in_standart);
                                $('#dept_out_standard').html(item.dept_out_standard);
                                $('#dept_contact').html(item.dept_contact);
                                $('#dept_credits').html(item.dept_credits);
                                $('#dept_language').html(item.dept_language);
                                $('#dept_out_standard').html(item.dept_out_standard);
                                $('#dept_code').html(item.dept_code);
                                $('#target_detail').html(item.dept_target);
                            });
                            jQuery("#tab_acc.w-tabs").wTabs();
                            $('#loading-image').hide();
                        }
                    });
                }
            });
        });
    });
</script>



<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {
        $('#loading-image').hide();
        jQuery("a.faculty").click(function() {
            var $self = $(this);
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/facultyInfoView') ?>",
                beforeSend: function() {
                    //  $('#loading-image').show();
                },
                success: function(data) {
                    var json = data;
                    var faculty_id = $self.attr("faculty-id");
                    jQuery('.three-fourths').html(data);
                    jQuery("#detail_faculty.w-tabs").wTabs();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/facultyInfo') ?>",
                        data: {faculty_id: faculty_id},
                        beforeSend: function() {
                            jQuery('.three-fourths').hide();
                        },
                        success: function(data) {
                            jQuery('.three-fourths').show();
                            var result = $.parseJSON(data);
                            //  $('#subject_type_tab').html('');
                            jQuery.each(result.teacher_faculty_position, function(key, value) {
                                jQuery('#teacher_lead').append(
                                        '<div style="height: 250px">' +
                                        '<div class="w-team-member" style="width: 170px;height: 170px">' +
                                        '<div class="w-team-member-h">' +
                                        '<div class="w-team-member-image">' +
                                        '<img src="' + this.teacher_avatar + '" />' +
                                        '<div class="w-team-member-links">' +
                                        ' <div class="w-team-member-links-list">' +
                                        '<a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>' +
                                        '<a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="w-team-member-meta">' +
                                        '<h4 class="w-team-member-name">' + this.teacher_name + '</h4>' +
                                        '<div class="w-team-member-role">' + this.teacher_position + '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>');
                            });
                            jQuery.each(result.faculty_data, function(key, value) {
                                jQuery('#research').append(
                                        this.faculty_research);
                                jQuery('#faculty_lab').append(
                                        this.faculty_lab);
                            });
                            $('#loading-image').hide();
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    function test() {
        var $self = $(this);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('listOfSubject/facultyInfoView') ?>",
            beforeSend: function() {
                //  $('#loading-image').show();
            },
            success: function(data) {
                var json = data;
                var faculty_id = '1';
                jQuery('.three-fourths').html(data);
                jQuery("#detail_faculty.w-tabs").wTabs();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('listOfSubject/facultyInfo') ?>",
                    data: {faculty_id: faculty_id},
                    beforeSend: function() {
                        jQuery('.three-fourths').hide();
                    },
                    success: function(data) {
                        jQuery('.three-fourths').show();
                        var result = $.parseJSON(data);
                        //  $('#subject_type_tab').html('');
                        jQuery.each(result.teacher_faculty_position, function(key, value) {
                            jQuery('#teacher_lead').append(
                                    '<div style="height: 250px">' +
                                    '<div class="w-team-member" style="width: 170px;height: 170px">' +
                                    '<div class="w-team-member-h">' +
                                    '<div class="w-team-member-image">' +
                                    '<img src="' + this.teacher_avatar + '" />' +
                                    '<div class="w-team-member-links">' +
                                    ' <div class="w-team-member-links-list">' +
                                    '<a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>' +
                                    '<a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="w-team-member-meta">' +
                                    '<h4 class="w-team-member-name">' + this.teacher_name + '</h4>' +
                                    '<div class="w-team-member-role">' + this.teacher_position + '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');
                        });
                        jQuery.each(result.faculty_data, function(key, value) {
                            jQuery('#research').append(
                                    this.faculty_research);
                            jQuery('#faculty_lab').append(
                                    this.faculty_lab);
                        });
                        $('#loading-image').hide();
                    }
                });
            }
        });
    }
    window.onload = test;
</script>



<div class="l-submain">
    <div class="l-submain-h i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/bar_left", array('category_father' => $category_father, 'subject_type' => $subject_type)); ?>
            <div class="three-fourths">
                <img id="loading-image" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax_loader_blue_128.gif" style="margin-left: 400px;"/>
            </div>
        </div>
    </div>
</div><!--
