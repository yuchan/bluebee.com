<div class="rounded2 color_alternate" style="margin-top: 10px">
    <h6>Lớp môn học của bạn</h6>
</div>
<?php foreach ($class_user_attend as $class_id) : ?>
    <?php $class_info = class_model::model()->findByAttributes(array('class_id' => $class_id->class_id)) ?>

    <div class="w-portfolio columns_2 wide-margins type_sortable">
        <div class="w-portfolio-h">
            <div class="w-portfolio-list">
                <div class="w-portfolio-list-h">
                    <div class="w-portfolio-item naming webdesign">
                        <div class="w-portfolio-item-h animate_afc">
                            <a class="w-portfolio-item-anchor" href="project-another-slider.html">
                                <div class="w-portfolio-item-image">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-1.jpg" alt="" />
                                    <div class="w-portfolio-item-meta">
                                        <h2 class="w-portfolio-item-title"><?php echo $class_info->class_name ?></h2>
                                        <i class="icon-mail-forward"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="" style="margin-left: 30px">More...</a>
        <br/>

    </div>
<?php endforeach; ?>