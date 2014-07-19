<script type="text/javascript">
    $(document).ready(function() {
        $("span.subject").each(function() {
            var faculty_id = $(this).attr("faculty-id");
            var dept_id = $(this).attr("dept-id");
            var subject_type = $(this).attr("subject-type");
            $(this).click(function() {
                $.ajax({
                type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfo') ?>",
                        data: { subject_dept: dept_id, subject_faculty: faculty_id, subject_type:subject_type },
                        dataType: 'json',
                        success: function(data) {
                           console.log(data);
                        }

            });
        });
    });
    });
</script>

