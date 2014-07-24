<script type="text/javascript">
    $(document).ready(function() {
        $("a.subject").click(function() {
            var $self = $(this);
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfoView') ?>",
                success: function(data) {
                    var json = data;
                    var result = data;
                    $('.three-fourths').html(data);


                    var faculty_id = $self.attr("faculty-id");
                    var dept_id = $self.attr("dept-id");
                    var subject_type = $self.attr("subject-type");

                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfo') ?>",
                        data: {subject_dept: dept_id, subject_faculty: faculty_id, subject_type: subject_type},
                        dataType: 'json',
                        success: function(data) {
                            var json = data;
                            var result = data;

                            //  $('#subject_type_tab').html('');

                            $.each(result.subject_group_type, function(key, value) {
                                $('#subject_type_tab').append(
                                        '<div class="w-tabs-item" subject_type_id='+this.subject_type_id+'>' +
                                        '<span class="w-tabs-item-icon"></span>' +
                                        '<span class="w-tabs-item-title">' + this.subject_group_type + '</span>' +
                                        '</div>');

                                $('#subject_type_details').append(
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
                            
           
                            $('#subject_type_tab').children().first().addClass('active');
                            $('.w-tabs-section').first().addClass('active');

                            $.each(result.subject_data, function(key, value) {
                                $('#listsubject').append(
                                        '<tr style="border-bottom: 1px solid #d0d6d9">' +
                                        '<td><a href = "<?php echo Yii::app()->createUrl('subject') ?>' + this.subject_id + '">' + this.subject_name + '</a></td>' +
                                        '<td>' + this.subject_credits + '</td>' +
                                        '<td>' + this.subject_credit_hour + '</td>' +
                                        '<td>' + this.subject_code + '</td>' +
                                        '</tr>');
                            });
                        }
                    });

                }
            });
        });
    });
</script>
<div class="l-submain">
    <div class="l-submain-h i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/bar_left", array('category_father' => $category_father, 'subject_type' => $subject_type)); ?>
            <div class="three-fourths">

            </div>
        </div>
    </div>
</div>