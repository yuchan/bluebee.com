<div class="l-submain">
    <div class="l-submain-h i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/bar_left", array('category_father' => $category_father, 'subject_type' => $subject_type)) ?>

            <div class="three-fourths">
                <div class="w-gallery type_slider">
                    <div class="w-gallery-h">
                        <div class="w-gallery-main">
                            <div class="w-gallery-main-h flexslider flex-loading">
                                <ul class="slides">
                                    <li>
                                        <img width="728" height="410" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/department_1.jpg" />
                                    </li>
                                    <li>
                                        <img width="728" height="410" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/department_3.jpg" />
                                    </li>
                                </ul>
                                <ul class="flex-direction-nav">
                                    <li>
                                        <a href="#" class="flex-prev">Previous</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex-next">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(window).load(function() {
                        jQuery(".flexslider").flexslider({
                            directionalNav: false,
                            controlNav: false,
                            smoothHeight: true,
                            start: function() {
                                jQuery(".flexslider").removeClass("flex-loading");
                            }
                        });
                    });
                </script>

                <div class="g-cols">
                    <div class="one-third">
                        <h3>Nhân sự lãnh đạo</h3>

                        <div style="height: 250px">
                            <div class="w-team-member" style="width: 170px;height: 170px">
                                <div class="w-team-member-h">
                                    <div class="w-team-member-image">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-5.jpg" alt="Item picture" />
                                        <div class="w-team-member-links">
                                            <div class="w-team-member-links-list">
                                                <a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>
                                                <a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-team-member-meta">
                                        <h4 class="w-team-member-name">Nguyễn Duy Kiên</h4>
                                        <div class="w-team-member-role">Trưởng bộ môn</div>
                                        <!--<div class="w-team-member-description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor.</p>						
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="height: 250px">
                            <div class="w-team-member" style="width: 170px;height: 170px">
                                <div class="w-team-member-h">
                                    <div class="w-team-member-image">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-5.jpg" alt="Item picture" />
                                        <div class="w-team-member-links">
                                            <div class="w-team-member-links-list">
                                                <a class="w-team-member-links-item" href="http://www.twitter.com/" target="_blank"><i class="icon-twitter"></i></a>
                                                <a class="w-team-member-links-item" href="http://www.linkedin.com/" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-team-member-meta">
                                        <h4 class="w-team-member-name">Jane Smith</h4>
                                        <div class="w-team-member-role">Project Manager</div>
                                        <!--<div class="w-team-member-description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor.</p>						
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="g-hr">
                            <span class="g-hr-h">
                                <i class="icon-star"></i>
                            </span>
                        </div>
                        <ul>
                            <li><strong>Client</strong>: ThemeForest</li>
                            <li><strong>Date</strong>: April 16, 2013</li>
                            <li><strong>Project URL</strong>:&nbsp;<a href="#">www.yoursite.com</a></li>
                        </ul>
                    </div>
                    <div class="two-thirds">

                        <h3>Thông tin chi tiết</h3>

                        <div class="w-tabs">
                            <div class="w-tabs-h">
                                <div class="w-tabs-list">
                                    <div class="w-tabs-item active">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Lĩnh vực nghiên cứu</span>
                                    </div>
                                    <div class="w-tabs-item">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Công trình khoa học</span>
                                    </div>
                                    <div class="w-tabs-item">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Tin tức</span>
                                    </div>
                                </div>
                                <div class="w-tabs-section active">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Lĩnh vực nghiên cứu</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content" style="">
                                        <div class="w-tabs-section-content-h">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis.</p>
                                            <blockquote><p>At delectus doloremque dolores explicabo laudantium minima qui. Animi aperiam aspernatur atque debitis distinctio impedit inventore iure labore modi omnis, optio rerum ut veritatis voluptatum?</p></blockquote>
                                            <p>Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Công trình khoa học</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <div class="g-cols">
                                                <div class="one-half">
                                                    <h4>One Half</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Etiam facilisis venenatis libero, ac fermentum dolor euismod in. Phasellus placerat egestas varius. Vivamus eleifend at massa sodales faucibus. Vestibulum egestas nibh in turpis volutpat ornare.</p>
                                                </div>
                                                <div class="one-half">
                                                    <h4>One Half</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Etiam facilisis venenatis libero, ac fermentum dolor euismod in. Phasellus placerat egestas varius. Vivamus eleifend at massa sodales faucibus. Vestibulum egestas nibh in turpis volutpat ornare.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Tin tức</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <p>Etiam facilisis venenatis libero, ac fermentum dolor euismod in. Phasellus placerat egestas varius. Vivamus eleifend at massa sodales faucibus. Vestibulum egestas nibh in turpis volutpat ornare. Ut tempor lacinia purus, ac gravida tortor suscipit eget. Maecenas id mi ac sapien ornare imperdiet. Nullam et faucibus urna, at bibendum ante. Donec dapibus nisi blandit augue malesuada, non porttitor est aliquet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>