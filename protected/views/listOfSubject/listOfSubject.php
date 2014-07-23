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
                            $('#listsubject').html('');

                            $.each(result.subject_data, function(key, value) {

                                $('#listsubject').append(
                                        '<tr style="border-bottom: 1px solid #d0d6d9">' +
                                        '<td><a href = "<?php echo Yii::app()->createUrl('subject') ?>' + this.subject_id + '">' + this.subject_name + '</a></td>' +
                                        '<td>2</td>' +
                                        '<td>21 - 5 - 4</td>' +
                                        '<td>PHI1004</td>' +
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