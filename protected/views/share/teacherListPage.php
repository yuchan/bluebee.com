
<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.dept").click(function() {
            var $self = $(this);
            var faculty_id = $self.attr("faculty-id");
            var dept_id = $self.attr("dept-id");
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('share/ListTeacherDeptFaculty') ?>",
                data: {dept_id: dept_id, faculty_id: faculty_id},
                beforeSend: function() {
                    $('#loading-image').show();
                },
                success: function(data) {
                    var result = $.parseJSON(data);
                    jQuery('#teacher-list').empty();
                    jQuery.each(result.teacher_data, function(key, value) {
                        jQuery('#teacher-list').append(
                                '<div class="leftAlignedImage ">' +
                                '<div class="coverWrapper">' +
                                '<div class="w-team-member">' +
                                '<div class="w-team-member-h">' +
                                '<div class="w-team-member-image">' +
                                '<img src="' + this.teacher_avatar + '" />' +
                                '<div class="w-team-member-links">' +
                                '<div class="w-team-member-links-list">' +
                                '<a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>' +
                                '<a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="w-team-member-meta">' +
                                '<h4 class="w-team-member-name">' + this.teacher_name + '</h4>' +
                                '<div class="w-team-member-role">' + this.teacher_description + '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                ' </div>' +
                                '<div class="input select rating-f read-only ratingMargin" >' +
                                '<select class="teacher-block-rating-outside" name="rating">' +
                                '<option value="1">1</option>' +
                                '<option value="2">2</option>' +
                                '<option value="3">3</option>' +
                                '<option value="4">4</option>' +
                                '<option value="5">5</option>' +
                                '</select>' +
                                '</div>' +
                                '</div> ').hide().fadeIn(500);
                    });
                    jQuery.each(result.dept_data, function(key, value) {
                        jQuery('#teacher_header').html(this.dept_name).hide().fadeIn(500);
                    });

                }
            });
        });
    });
</script>

<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.faculty").click(function() {
            var $self = $(this);
            var faculty_id = $self.attr("faculty-id");

            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('share/ListTeacherFaculty') ?>",
                data: {faculty_id: faculty_id},
                beforeSend: function() {
                    $('#loading-image').show();
                },
                success: function(data) {
                    var result = $.parseJSON(data);
                    jQuery('#teacher-list').empty();
                    jQuery.each(result.teacher_data, function(key, value) {
                        jQuery('#teacher-list').append(
                                '<div class="leftAlignedImage ">' +
                                '<div class="coverWrapper">' +
                                '<div class="w-team-member">' +
                                '<div class="w-team-member-h">' +
                                '<div class="w-team-member-image">' +
                                '<img src="' + this.teacher_avatar + '" />' +
                                '<div class="w-team-member-links">' +
                                '<div class="w-team-member-links-list">' +
                                '<a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>' +
                                '<a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="w-team-member-meta">' +
                                '<h4 class="w-team-member-name">' + this.teacher_name + '</h4>' +
                                '<div class="w-team-member-role">' + this.teacher_description + '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                ' </div>' +
                                '<div class="input select rating-f read-only ratingMargin" >' +
                                '<select class="teacher-block-rating-outside" name="rating">' +
                                '<option value="1">1</option>' +
                                '<option value="2">2</option>' +
                                '<option value="3">3</option>' +
                                '<option value="4">4</option>' +
                                '<option value="5">5</option>' +
                                '</select>' +
                                '</div>' +
                                '</div> ').hide().fadeIn(500);
                    });
                    jQuery.each(result.faculty_data, function(key, value) {
                        jQuery('#teacher_header').html(this.faculty_name).hide().fadeIn(500);
                    });

                }
            });
        });
    });
</script>

<script>
    function listteacher() {
        var $self = $(this);
        var faculty_id = 1;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('share/ListTeacherFaculty') ?>",
            data: {faculty_id: faculty_id},
            beforeSend: function() {
                $('#loading-image').show();
            },
            success: function(data) {
                var result = $.parseJSON(data);
                jQuery('#teacher-list').empty();
                jQuery.each(result.teacher_data, function(key, value) {
                    jQuery('#teacher-list').append(
                            '<div class="leftAlignedImage ">' +
                            '<div class="coverWrapper">' +
                            '<div class="w-team-member">' +
                            '<div class="w-team-member-h">' +
                            '<div class="w-team-member-image">' +
                            '<img src="' + this.teacher_avatar + '" />' +
                            '<div class="w-team-member-links">' +
                            '<div class="w-team-member-links-list">' +
                            '<a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>' +
                            '<a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="w-team-member-meta">' +
                            '<h4 class="w-team-member-name">' + this.teacher_name + '</h4>' +
                            '<div class="w-team-member-role">' + this.teacher_description + '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            ' </div>' +
                            '<div class="input select rating-f read-only ratingMargin" >' +
                            '<select class="teacher-block-rating-outside" name="rating">' +
                            '<option value="1">1</option>' +
                            '<option value="2">2</option>' +
                            '<option value="3">3</option>' +
                            '<option value="4">4</option>' +
                            '<option value="5">5</option>' +
                            '</select>' +
                            '</div>' +
                            '</div> ').hide().fadeIn(500);
                });
                jQuery.each(result.faculty_data, function(key, value) {
                    jQuery('#teacher_header').html(this.faculty_name).hide().fadeIn(500);
                });

            }
        });
        
    }
    window.onload = listteacher;
</script>
<div class="l-main-h">
    <div class="l-submain">
        <div class="l-submain-h g-html i-cf">
            <div class="g-cols">
                <?php $this->renderPartial("partial/bar_left", array('category_father' => $category_father, 'subject_type' => $subject_type)) ?>

                <div class="three-fourths ">
                    <h3 id="teacher_header"></h3>
                    <div class="teacherList" id="teacher-list">

                        <!--cmt facebook-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>