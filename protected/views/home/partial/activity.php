<div class="l-content">
    <div class='g-cols'>
        <div class='full-width' style="margin-top: 15px">
            <div class="border_bottom">
                <h2>Thông tin cập nhật</h2>
            </div>

            <div class="w-blog imgpos_atleft meta_tagscomments">
                <div class="w-blog-h">
                    <div class="w-blog-list">
                        <?php
                        foreach ($class_user_attend as $class_activity_info):
                            $post_activity = Post::model()->findAllByAttributes(array('post_class' => $class_activity_info->class_id));
                            foreach ($post_activity as $post_info):
                                ?>
                                <div class="w-blog-entry">
                                    <div class="w-blog-entry-h">
                                        <a class="w-blog-entry-link" href="blog-post.html">
                                            <span class="w-blog-entry-img animate_afc">
                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-1.jpg" alt="" />
                                            </span>
                                        </a>
                                        <div class="w-blog-entry-body">
                                            <div class="w-blog-entry-meta">
                                                <div class="w-blog-entry-meta-date">
                                                    <i class="icon-time"></i>
                                                    <span class="w-blog-entry-meta-date-month"><?php echo $post_info->post_date?></span>
                                                    
                                                </div>

                                                <div class="w-blog-entry-meta-author">
                                                    <i class="icon-user"></i>
                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);"><?php echo $post_info->post_author ?></a>
                                                </div>
                                                <div class="w-blog-entry-meta-comments">
                                                    <i class="icon-comments"></i>
                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                </div>
                                            </div>

                                            <div class="w-blog-entry-short">
                                                <p><?php echo $post_info->post_content ?></p>
                                            </div>

                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="w-blog-pagination">
                        <div class="g-pagination">
                            <a href="javascript:void(0);" class="g-pagination-item to_prev">Prev</a>
                            <a href="javascript:void(0);" class="g-pagination-item">1</a>
                            <a href="javascript:void(0);" class="g-pagination-item active">2</a>
                            <a href="javascript:void(0);" class="g-pagination-item">3</a>
                            <a href="javascript:void(0);" class="g-pagination-item">4</a>
                            <a href="javascript:void(0);" class="g-pagination-item">5</a>
                            <a href="javascript:void(0);" class="g-pagination-item to_next">Next</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>