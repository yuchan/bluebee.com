<div class="l-main-h">

    <div class="l-submain" id="teacherListHeader">
        <p>
            <strong>Hãy tìm kiếm giáo viên của lớp bạn. Nếu chưa có, hãy thêm giáo viên ngay ------> <button class="g-btn type_primary size_small"><span>Nhập giáo viên</span></button></strong>
        </p>
    </div>
    <div class="l-submain">
        <div class="l-submain-h g-html i-cf">
            <div class="g-cols">
                <div class="one-fourth">
                    <div class="teacherList-nav">
                        <h4 class="header-color"> Danh sách các khoa:</h4>
                        <div class="navigation roundedBorder">


                            <div class="navigationLinks" id="additionalGenres">
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=poetry" class="actionLinkLite " id="nav_to_poetry" onclick="rateBooksToGenre('poetry', '/user/rate_books?genre=poetry');
                                            return false;">Poetry</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=psychology" class="actionLinkLite " id="nav_to_psychology" onclick="rateBooksToGenre('psychology', '/user/rate_books?genre=psychology');
                                            return false;">Psychology</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=religion" class="actionLinkLite " id="nav_to_religion" onclick="rateBooksToGenre('religion', '/user/rate_books?genre=religion');
                                            return false;">Religion</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=sports" class="actionLinkLite " id="nav_to_sports" onclick="rateBooksToGenre('sports', '/user/rate_books?genre=sports');
                                            return false;">Sports</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=thriller" class="actionLinkLite " id="nav_to_thriller" onclick="rateBooksToGenre('thriller', '/user/rate_books?genre=thriller');
                                            return false;">Thriller</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=travel" class="actionLinkLite " id="nav_to_travel" onclick="rateBooksToGenre('travel', '/user/rate_books?genre=travel');
                                            return false;">Travel</a>
                                </div>
                                <div class="navRow">
                                    <a href="/user/rate_books?genre=young-adult" class="actionLinkLite " id="nav_to_young-adult" onclick="rateBooksToGenre('young-adult', '/user/rate_books?genre=young-adult');
                                            return false;">Young Adult</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="three-fourths ">
                    <h3 class="header-color" > Khoa học máy tính</h3>
                    <div class="teacherList Side">
                        <div class="leftAlignedImage ">
                            <div class="coverWrapper">
                                <div class="w-team-member">
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-1.jpg" alt="Item picture" />
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-2.jpg" alt="Item picture" />
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-2.jpg" alt="Item picture" />
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="teacherList Side">
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-3.jpg" alt="Item picture" />
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-4.jpg" alt="Item picture" />
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
                            <div class="input select rating-f read-only ratingMargin" >
                                <select class="teacher-block-rating-outside" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>