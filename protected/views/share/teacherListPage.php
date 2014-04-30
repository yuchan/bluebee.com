<div class="l-main-h">
    
    <div class="l-submain" id="teacherListHeader">
        <p>
            <strong>Hãy tìm kiếm giáo viên của lớp bạn. Nếu chưa có, hãy thêm giáo viên ngay ------> <button class="g-btn type_primary size_small"><span>Nhập giáo viên</span></button></strong>
        </p>
    </div>
    <div class="l-submain">
        <div class="l-submain-h g-html i-cf">
            <div class="g-cols">
                <div class="one-fifth">
                    <div class="teacherList">
                        <div class="navigation roundedBorder">

                            <h6>Danh sách các khoa:</h6>
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

                <div class="four-fifths">
                    <h5>Khoa học máy tính</h5>
                    <div class="teacherList">
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <img class="teacherImage" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-1.jpg"/>
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
                            <button class="g-btn type_outline size_small"><span>Thêm giáo viên</span></button>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <img class="teacherImage" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-2.jpg"/>
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
                            <button class="g-btn type_outline size_small"><span>Thêm giáo viên</span></button>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <img class="teacherImage" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-3.jpg"/>
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
                            <button class="g-btn type_outline size_small"><span>Thêm giáo viên</span></button>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <img class="teacherImage" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-4.jpg"/>
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
                            <button class="g-btn type_outline size_small"><span>Thêm giáo viên</span></button>
                        </div>
                        <div class="leftAlignedImage">
                            <div class="coverWrapper">
                                <img class="teacherImage" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/portfolio-5.jpg"/>
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
                            <button class="g-btn type_outline size_small"><span>Thêm giáo viên</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>