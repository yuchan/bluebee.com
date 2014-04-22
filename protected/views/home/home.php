    <script type="text/javascript">
        $(document).ready(function() {
            var form = $('#newclassform');
            form.submit(function(event) {
                $('#res').html('');
                var data = form.serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo Yii::app()->createUrl('classPage/createclass') ?>',
                    data: data,
                    beforeSend: function() {
                        $('#alert').html('<img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax_loader_blue_128.gif" alt="" style="" id="loading"/>');
                    },
                    success: function(data) {
                        var json = data;
                        var result = $.parseJSON(json);
                        //       $('#res').html(result.message);
                        $('#alert').html('');

                        if (result.success == 1) {
                            var item = $('<div class="g-form-row-field">' +
                                    '<div id="success" class="g-alert type_success">' +
                                    '<div class="g-alert-body">' +
                                    '<p><b>' + result.message + '</b></p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>').hide().fadeIn(120);

                            $('#alert').html(item)
                            location.href = result.url;
                        }
                        else if (result.success == 2) {

                            var item = $('<div class="g-form-row-field">' +
                                    '<div id="error" class="g-alert type_error">' +
                                    '<div class="g-alert-body">' +
                                    '<p><b>' + result.message + ' <a href = "' + result.url_class_exist + '">đây</a></b></p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>').hide().fadeIn(120);

                            $('#alert').html(item)
                            //   var json = $.parseJSON(data);
                            //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                        }

                        else {

                            var item = $('<div class="g-form-row-field">' +
                                    '<div id="error" class="g-alert type_error">' +
                                    '<div class="g-alert-body">' +
                                    '<p><b>' + result.message + '</b></p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>').hide().fadeIn(120);

                            $('#alert').html(item)
                            //   var json = $.parseJSON(data);
                            //  $('#res').html('Message : ' + json.message + '<br>Success : ' + json.success)
                        }
                    }});
                event.preventDefault();
                event.stopPropagation();
                return false;
            });
        });</script>

<div class="l-main-h">
    <div class="l-main-h">

        <div class="l-submain for_pagehead">
            <div class="l-submain-h g-html i-cf">
                <div class="w-pagehead">
                    <h1>Trang chủ</h1>
                    <p>Cập nhật thông tin mới nhất</p>
                </div>
            </div>
        </div>

        <div class="l-submain">
            <div class="l-submain-h g-html i-cf">
                <div class="g-cols">
                    <div class="two-thirds">
                        <div class="g-cols">
                            <div class="one-half">
                                <div class="w-iconbox icon_top">
                                    <div class="w-iconbox-h">
                                        <div class="w-iconbox-icon">
                                            <i class="icon-group"></i>
                                        </div>
                                        <div class="w-iconbox-text  color_alternate">
                                            <div class="w-iconbox-text-description">
                                                <a class="popup-with-form" href="#newclassform">
                                                    <button class="g-btn type_primary size_big"><span><i class="icon-heart"></i>Tạo lớp môn học</span></button>
                                                </a>

                                              <?php $this->renderPartial('newclass')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one-half">
                                <div class="w-iconbox icon_top">
                                    <div class="w-iconbox-h">
                                        <div class="w-iconbox-icon">
                                            <i class="icon-book"></i>
                                        </div>
                                        <div class="w-iconbox-text color_alternate">
                                            <div class="w-iconbox-text-description">
                                                <button class="g-btn type_primary size_big"><span><i class="icon-arrow-up"></i>Tạo nhóm học tập</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="l-content">
                            <div class='g-cols'>
                                <div class='full-width' style="margin-top: 15px">
                                    <div class="border_bottom">
                                        <h2>Thông tin cập nhật</h2>
                                    </div>

                                    <div class="w-blog imgpos_atleft meta_tagscomments">
                                        <div class="w-blog-h">
                                            <div class="w-blog-list">

                                                <div class="w-blog-entry">
                                                    <div class="w-blog-entry-h">
                                                        <a class="w-blog-entry-link" href="blog-post.html">
                                                            <span class="w-blog-entry-img animate_afc">
                                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-1.jpg" alt="" />
                                                            </span>

                                                            <h2 class="w-blog-entry-title">
                                                                <span class="w-blog-entry-title-h">This is a Post</span>
                                                            </h2>
                                                        </a>
                                                        <div class="w-blog-entry-body">
                                                            <div class="w-blog-entry-meta">
                                                                <div class="w-blog-entry-meta-date">
                                                                    <i class="icon-time"></i>
                                                                    <span class="w-blog-entry-meta-date-month">March</span>
                                                                    <span class="w-blog-entry-meta-date-day">23,</span>
                                                                    <span class="w-blog-entry-meta-date-year">2013</span>
                                                                </div>

                                                                <div class="w-blog-entry-meta-author">
                                                                    <i class="icon-user"></i>
                                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-tags">
                                                                    <i class="icon-tags"></i>
                                                                    <a href="javascript:void(0);">Web Design</a>,
                                                                    <a href="javascript:void(0);">Branding</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-comments">
                                                                    <i class="icon-comments"></i>
                                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                                </div>
                                                            </div>

                                                            <div class="w-blog-entry-short">
                                                                <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                                            </div>

                                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html"><span>Read More</span></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="w-blog-entry">
                                                    <div class="w-blog-entry-h">
                                                        <a class="w-blog-entry-link" href="blog-post.html">
                                                            <span class="w-blog-entry-img animate_afc">
                                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-2.jpg" alt="" />
                                                            </span>

                                                            <h2 class="w-blog-entry-title">
                                                                <span class="w-blog-entry-title-h">Another Single Interesting Post</span>
                                                            </h2>
                                                        </a>
                                                        <div class="w-blog-entry-body">
                                                            <div class="w-blog-entry-meta">
                                                                <div class="w-blog-entry-meta-date">
                                                                    <i class="icon-time"></i>
                                                                    <span class="w-blog-entry-meta-date-month">March</span>
                                                                    <span class="w-blog-entry-meta-date-day">23,</span>
                                                                    <span class="w-blog-entry-meta-date-year">2013</span>
                                                                </div>

                                                                <div class="w-blog-entry-meta-author">
                                                                    <i class="icon-user"></i>
                                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-tags">
                                                                    <i class="icon-tags"></i>
                                                                    <a href="javascript:void(0);">Web Design</a>,
                                                                    <a href="javascript:void(0);">Branding</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-comments">
                                                                    <i class="icon-comments"></i>
                                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                                </div>
                                                            </div>

                                                            <div class="w-blog-entry-short">
                                                                <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                                            </div>

                                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html"><span>Read More</span></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="w-blog-entry">
                                                    <div class="w-blog-entry-h">
                                                        <a class="w-blog-entry-link" href="blog-post.html">
                                                            <span class="w-blog-entry-img animate_afc">
                                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-3.jpg" alt="" />
                                                            </span>

                                                            <h2 class="w-blog-entry-title">
                                                                <span class="w-blog-entry-title-h">This is a Single Clean Post</span>
                                                            </h2>
                                                        </a>
                                                        <div class="w-blog-entry-body">
                                                            <div class="w-blog-entry-meta">
                                                                <div class="w-blog-entry-meta-date">
                                                                    <i class="icon-time"></i>
                                                                    <span class="w-blog-entry-meta-date-month">March</span>
                                                                    <span class="w-blog-entry-meta-date-day">23,</span>
                                                                    <span class="w-blog-entry-meta-date-year">2013</span>
                                                                </div>

                                                                <div class="w-blog-entry-meta-author">
                                                                    <i class="icon-user"></i>
                                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-tags">
                                                                    <i class="icon-tags"></i>
                                                                    <a href="javascript:void(0);">Web Design</a>,
                                                                    <a href="javascript:void(0);">Branding</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-comments">
                                                                    <i class="icon-comments"></i>
                                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                                </div>
                                                            </div>

                                                            <div class="w-blog-entry-short">
                                                                <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                                            </div>

                                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html"><span>Read More</span></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="w-blog-entry">
                                                    <div class="w-blog-entry-h">
                                                        <a class="w-blog-entry-link" href="blog-post.html">
                                                            <span class="w-blog-entry-img animate_afc">
                                                                <img class="w-blog-entry-img-h" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/blog-4.jpg" alt="" />
                                                            </span>

                                                            <h2 class="w-blog-entry-title">
                                                                <span class="w-blog-entry-title-h">Another Single Interesting Post</span>
                                                            </h2>
                                                        </a>
                                                        <div class="w-blog-entry-body">
                                                            <div class="w-blog-entry-meta">
                                                                <div class="w-blog-entry-meta-date">
                                                                    <i class="icon-time"></i>
                                                                    <span class="w-blog-entry-meta-date-month">March</span>
                                                                    <span class="w-blog-entry-meta-date-day">23,</span>
                                                                    <span class="w-blog-entry-meta-date-year">2013</span>
                                                                </div>

                                                                <div class="w-blog-entry-meta-author">
                                                                    <i class="icon-user"></i>
                                                                    <a class="w-blog-entry-meta-author-h" href="javascript:void(0);">Admin</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-tags">
                                                                    <i class="icon-tags"></i>
                                                                    <a href="javascript:void(0);">Web Design</a>,
                                                                    <a href="javascript:void(0);">Branding</a>
                                                                </div>

                                                                <div class="w-blog-entry-meta-comments">
                                                                    <i class="icon-comments"></i>
                                                                    <a class="w-blog-entry-meta-comments-h" href="javascript:void(0);">13 comments</a>
                                                                </div>
                                                            </div>

                                                            <div class="w-blog-entry-short">
                                                                <p>Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales.</p>
                                                            </div>

                                                            <a class="w-blog-entry-more g-btn type_default size_small" href="blog-post.html"><span>Read More</span></a>
                                                        </div>
                                                    </div>
                                                </div>
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
                    </div>

                    <div class="one-third">
                        <div class="rounded2 color_alternate" style="margin-top: 10px">
                            <h6>Lớp môn học của bạn</h6>
                        </div>

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
                                                            <h2 class="w-portfolio-item-title">Vietnam National University</h2>
                                                            <i class="icon-mail-forward"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="w-portfolio-item naming webdesign">
                                            <div class="w-portfolio-item-h animate_afc">
                                                <a class="w-portfolio-item-anchor" href="project-another-slider.html">
                                                    <div class="w-portfolio-item-image">
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-1.jpg" alt="" />
                                                        <div class="w-portfolio-item-meta">
                                                            <h2 class="w-portfolio-item-title">Vietnam National University</h2>
                                                            <i class="icon-mail-forward"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="w-portfolio-item naming webdesign">
                                            <div class="w-portfolio-item-h animate_afc">
                                                <a class="w-portfolio-item-anchor" href="project-another-slider.html">
                                                    <div class="w-portfolio-item-image">
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-1.jpg" alt="" />
                                                        <div class="w-portfolio-item-meta">
                                                            <h2 class="w-portfolio-item-title">Vietnam National University</h2>
                                                            <i class="icon-mail-forward"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="w-portfolio-item naming branding">
                                            <div class="w-portfolio-item-h animate_afc d1">
                                                <a class="w-portfolio-item-anchor" href="project-slider.html">
                                                    <div class="w-portfolio-item-image">
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-2.jpg" alt="" />
                                                        <div class="w-portfolio-item-meta">
                                                            <h2 class="w-portfolio-item-title">Kien's Group</h2>
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

                        <div class="rounded2 color_alternate">
                            <h6>Nhóm bạn tham gia</h6>
                        </div>

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
                                                            <h2 class="w-portfolio-item-title">Vietnam National University</h2>
                                                            <i class="icon-mail-forward"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="w-portfolio-item naming webdesign">
                                            <div class="w-portfolio-item-h animate_afc">
                                                <a class="w-portfolio-item-anchor" href="project-another-slider.html">
                                                    <div class="w-portfolio-item-image">
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-1.jpg" alt="" />
                                                        <div class="w-portfolio-item-meta">
                                                            <h2 class="w-portfolio-item-title">Vietnam National University</h2>
                                                            <i class="icon-mail-forward"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="w-portfolio-item naming branding">
                                            <div class="w-portfolio-item-h animate_afc d1">
                                                <a class="w-portfolio-item-anchor" href="project-slider.html">
                                                    <div class="w-portfolio-item-image">
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-2.jpg" alt="" />
                                                        <div class="w-portfolio-item-meta">
                                                            <h2 class="w-portfolio-item-title">Kien's Group</h2>
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

                        <div class="rounded2 color_alternate">
                            <h6>Cuốn sách bạn theo dõi</h6>
                        </div>

                        <div class="w-gallery layout_tile size_xs">
                            <div class="w-gallery-h">
                                <div class="w-gallery-tnails">
                                    <div class="w-gallery-tnails-h">

                                        <a class="w-gallery-tnail" href="img/demo/photo-1.jpg" title="Photo Title">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-1.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>
                                        <a class="w-gallery-tnail" href="img/demo/photo-2.jpg">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-2.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>
                                        <a class="w-gallery-tnail" href="img/demo/photo-3.jpg">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-3.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>
                                        <a class="w-gallery-tnail" href="img/demo/photo-4.jpg">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-4.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>
                                        <a class="w-gallery-tnail" href="img/demo/photo-5.jpg">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-5.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>

                                        <a class="w-gallery-tnail" href="img/demo/project-2.jpg">
                                            <span class="w-gallery-tnail-h">
                                                <img class="w-gallery-tnail-img" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/thumb-6.jpg" alt="photo" />
                                                <span class="w-gallery-tnail-title"><i class="icon-mail-forward"></i></span>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="" style="margin-left: 30px">More...</a>
                            <br/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

