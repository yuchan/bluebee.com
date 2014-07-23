<script type="text/javascript">
    $(document).ready(function() {
        $("span.subject").click(function() {
            $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfoView') ?>",
                    success: function(data) {
                        var json = data;
                        var result = data;
                        $('.three-fourths').html(data);

                       
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