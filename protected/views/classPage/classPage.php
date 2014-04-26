<?php foreach ($detail_classpage as $class): ?> 
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/post_style.css" />
    <script type="text/javascript">
        $(document).ready(function() {
            var form = $('#edit-infomation-class');
            form.submit(function(event) {
                var data = form.serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo Yii::app()->createUrl('classPage/changeClassInformation?classid=' . $class->class_id) ?>',
                    data: data,
                    success: function(data) {
                        var json = data;
                        var result = $.parseJSON(json);
                        $('#alert1').html('');
                        if (result.success) {
                            var item = $('<div class="g-form-row-field">' +
                                    '<div id="success" class="g-alert1 type_success">' +
                                    '<div class="g-alert1-body">' +
                                    '<p><b>' + result.message + '</b></p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');
                            var hide = $('#alert1').css('display');
                            if (hide == 'none') {
                                $('#alert11').html(item).slideDown('slow');
                            } else {
                                $('#alert11').slideUp(function() {
                                    $('#alert11').html(item).slideDown('slow');
                                });
                            }
                            //location.href = result.url;
                        }
                        else {
                            var item = $('<div class="g-form-row-field">' +
                                    '<div id="error" class="g-alert1 type_error">' +
                                    '<div class="g-alert1-body" style="text-align: center">' +
                                    '<p><b>' + result.message + '</b></p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');
                            var hide = $('#alert1').css('display');
                            if (hide == 'none') {
                                $('#alert1').html(item).slideDown('slow');
                            } else {
                                $('#alert1').slideUp(function() {
                                    $('#alert1').html(item).slideDown('slow');
                                });
                            }
                        }
                    }});
            });
    </script>
    <script type="text/javascript">
            var post = $('#post_form');
            post.submit(function(event) {
                var data = post.serialize();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Yii::app()->createUrl('classPage/createPost') ?>',
                    data: data,
                    success: function(data) {
                        var json = data;                        
                        var result = $.parseJSON(json);
                        alert(result.message);
                        var item = $('<div class="activity-item">' +
                                '<a class="other-user-avatar" href="/glang">' +
                                '<img class="" width="50" height="50" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/GrangerLang.png" style="opacity: 1;">' +
                                '</a>' +
                                '<div  class="profile clearfix">' +
                                '<a style="float: left" href="/glang">' +
                                '<span data-paths="profile.firstName profile.lastName" id="el-105">Granger Lang</span>' +
                                '</a>' +
                                '<p style="color: #dadcdd; float: left">&nbsp;&nbsp;12 hours ago</p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-right"></i></a>' +
                                '<p style="float: right"><strong>&nbsp; 69 &nbsp;</strong></p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-left"></i></a>' +
                                '</div>' +
                                '<article data-paths="body" id="el-99">' +
                                '<p>' + result.message + '</p>' +
                                '</article>' +
                                '<button class=" g-btn type_primary size_small opencmt button-in-activity-box" id="opencmt"><span>Xem thêm</span></button>' +
                                '<div class="comment-container">' +
                                '<div class="list-item-comment-wrapper">' +
                                '<div class="item-comment">' +
                                '<a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">' +
                                '<img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/sancak.png" style="opacity: 1;">' +
                                '</a>' +
                                '<div class="comment-content">' +
                                '<div  class="fix-style-profile profile clearfix">' +
                                '<a style="float: left" href="/glang">' +
                                '<span data-paths="profile.firstName profile.lastName" id="el-105">sancak</span>' +
                                '</a>' +
                                '<p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-right"></i></a>' +
                                '<p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-left"></i></a>' +
                                '</div>' +
                                '<div class="comment-body-container">' +
                                '<p data-paths="body" id="el-1140">think it harder, make it possible! :)</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="item-comment">' +
                                '<a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">' +
                                '<img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/JoshMax.png" style="opacity: 1;">' +
                                '</a>' +
                                '<div class="comment-content">' +
                                '<div  class="fix-style-profile profile clearfix">' +
                                '<a style="float: left" href="/glang">' +
                                '<span data-paths="profile.firstName profile.lastName" id="el-105">Josh Max</span>' +
                                '</a>' +
                                '<p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-right"></i></a>' +
                                '<p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-left"></i></a>' +
                                '</div>' +
                                '<div class="comment-body-container">' +
                                '<p data-paths="body" id="el-1140">I never ask "is this possible?" pertaining to web development. I ask "how long will this take me and is it worth the end result?" Then I start, get stuck somewhere and ask one of the guys on SO for advice, and they ask "is this even possible?" for me ;)</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="item-comment">' +
                                '<a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">' +
                                '<img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/trillobite.png" style="opacity: 1;">' +
                                '</a>' +
                                '<div class="comment-content">' +
                                '<div  class="fix-style-profile profile clearfix">' +
                                '<a style="float: left" href="/glang">' +
                                '<span data-paths="profile.firstName profile.lastName" id="el-105">trillobite</span>' +
                                '</a>' +
                                '<p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-right"></i></a>' +
                                '<p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>' +
                                '<a class="fix-vote-button"><i class="icon-chevron-left"></i></a>' +
                                '</div>' +
                                '<div class="comment-body-container">' +
                                '<p data-paths="body" id="el-1140">Is it possible that the core of the moon could just be peanut butter? I mean, think about it, it weighs less than it should if it is supposed to contain matter from earth from a horrific meteor strike, and peanut butter probably weighs less than iron/rock. How awesome would that be, aliens come to earth, and we explain to them that world hunger vanished after we discovered the moon, and the info came public :P Then North Korea got pissed off and blew up the moon, cause it made no sense, and now there is peanut butter all over the earth..Show more.... the end.</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<button class=" g-btn type_primary size_small more-comment button-in-activity-box" id="more-comment"><span>Xem thêm 4 bình luận nữa</span></button>' +
                                '</div>').hide().fadeIn(800);
                        $('#activity_content').prepend(item);
                        $('#post_form').reset();
                        alert(result.message);
                       
                    }
                    
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.comment-container').hide();
            $('.opencmt').click(function(event) {
                var hide = $('.comment-container').css('display');
                if (hide == 'none') {
                    $(this).html('<span>Đóng</span>');
                    $('.comment-container').slideDown('slow', function() {
                    });
                } else {
                    $(this).html('<span>Xem thêm</span>');
                    $('.comment-container').slideUp();
                }
            });
        });
    </script>

    <form class="g-form white-popup-block mfp-hide" id="edit-infomation-class" action="" method="POST">
        <h3>Chỉnh Sửa Thông Tin</h3>
        <div class="g-form-group">
            <div class="g-form-group-rows">
                <div class="g-form-row">
                    <div class="g-form-row-label">
                        <label class="g-form-row-label-h" for="classcode">Mã lớp (*)</label>
                    </div>
                    <div class="g-form-row-field">
                        <div class="g-input">
                            <input type="text" name="classcode" id="contact_username" placeholder="Mã lớp" value="">
                        </div>
                    </div>
                </div>
                <div class="g-form-row">
                    <div class="g-form-row-label">
                        <label class="g-form-row-label-h" for="classname">Tên lớp (*)</label>
                    </div>
                    <div class="g-form-row-field">
                        <div class="g-input">
                            <input type="text" name="classname" id="contact_username" placeholder="Tên lớp" value="">
                        </div>
                    </div>
                </div>
                <div class="g-form-row">
                    <div class="g-form-row-label">
                        <label class="g-form-row-label-h" for="classCredit">Số tín chỉ (*)</label>
                    </div>
                    <div class="g-form-row-field">
                        <div class="g-input">
                            <input type="text" name="classCredit" id="contact_username" placeholder="Số tín chỉ" value="">
                        </div>
                    </div>
                </div>
                <div class="g-form-row">
                    <div class="g-form-row-label">
                        <label class="g-form-row-label-h" for="classWebsite">Website Môn học (*)</label>
                    </div>
                    <div class="g-form-row-field">
                        <div class="g-input">
                            <input type="text" name="classWebsite" id="contact_username" placeholder="Website Môn học" value="">
                        </div>
                    </div>
                </div>
                <div class="g-form-group">
                    <div class="g-form-row-label">
                        <label class="g-form-row-label-h" for="description">Miêu tả (*)</label>
                    </div>
                    <div class="g-form-group-rows">
                        <div class="g-form-row">
                            <div class="g-form-row-field">
                                <textarea name="description" id="input1x3" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-form-row">
                    <div class="g-form-row-field">
                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit" style="text-transform: inherit" action="">Lưu thông tin</button>
                    </div>
                </div>

            </div>
            <div id="alert11"></div>
        </div>
    </form>



    <div class="l-submain-h i-cf">
        <div class="l-content">
            <div class="l-content-h i-widgets">

                <div class="cover" style="">
                    <img style="width: 100%; position: relative; margin-top: -120px" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/cover.jpg"/>
                    <div class="button-on-cover" style="position: absolute; display: none">
                        <button class="g-btn type_primary size_small" id="changecover" >
                            <span>Change Cover</span>
                        </button>
                        <button class="g-btn type_primary size_small">
                            <span>Create A Class</span>
                        </button>
                    </div>
                </div>
                <div class="g-cols">
                    <div class="two-thirds">
                        <!-- w-tabs -->
                        <div class="w-tabs">
                            <div class="w-tabs-h" id="fix-style-w-tab">
                                <div class="w-tabs-list">
                                    <div class="w-tabs-item fix-w-tab-item active">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Hoạt động</span>
                                    </div>

                                    <div class="w-tabs-item fix-w-tab-item" style="display: none">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Documents</span>
                                    </div>
                                    <div class="w-tabs-item fix-w-tab-item" style="display: none">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Teacher</span>
                                    </div>
                                </div>

                                <div class="w-tabs-section active">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Hoạt động</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>

                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h" style="padding-top: 0px;">
                                            <div class="activity-input">
                                                <a class="avatar-view" href="user">
                                                    <img class="" width="50" height="50" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default-avatar.png" style="opacity: 1;">
                                                </a>
                                                <form class="activity-input-box" id="post_form" action ="" method="post">
                                                    <textarea contenteditable="true" name ="post_content" class="activity-input-content" data-placeholder="Có Gì Hot?"></textarea>
                                                    <button type="submit" class="g-btn type_primary size_small submit-button">
                                                        <span>Đăng Tin</span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="border-top: 1px solid #d8d8d8;">
                                                <div class="activity-content" id="activity_content">
                                                    <div class="activity-item">
                                                        <a class="other-user-avatar" href="/glang">
                                                            <img class="" width="50" height="50" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/GrangerLang.png" style="opacity: 1;">
                                                        </a>
                                                        <div  class="profile clearfix">
                                                            <a style="float: left" href="/glang">
                                                                <span data-paths="profile.firstName profile.lastName" id="el-105">Granger Lang</span>
                                                            </a>
                                                            <p style="color: #dadcdd; float: left">&nbsp;&nbsp;12 hours ago</p>
                                                            <a class="fix-vote-button"><i class="icon-chevron-right"></i></a>
                                                            <p style="float: right"><strong>&nbsp; 69 &nbsp;</strong></p>
                                                            <a class="fix-vote-button"><i class="icon-chevron-left"></i></a>
                                                        </div>
                                                        <article data-paths="body" id="el-99">
                                                            <p>Sometimes, I would ask myself: "Is this possible?" Then answer my own question with: "What <em>isn't</em> possible?" and work on finding a solution to how to make it possible.</p>
                                                        </article>
                                                        <button class=" g-btn type_primary size_small opencmt button-in-activity-box" id="opencmt"><span>Xem thêm</span></button>

                                                        <div class="comment-container">
                                                            <div class="list-item-comment-wrapper">
                                                                <div class="item-comment">
                                                                    <a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">
                                                                        <img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/sancak.png" style="opacity: 1;">
                                                                    </a>
                                                                    <div class="comment-content">
                                                                        <div  class="fix-style-profile profile clearfix">
                                                                            <a style="float: left" href="/glang">
                                                                                <span data-paths="profile.firstName profile.lastName" id="el-105">sancak</span>
                                                                            </a>
                                                                            <p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-right"></i></a>
                                                                            <p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-left"></i></a>
                                                                        </div>
                                                                        <div class="comment-body-container">
                                                                            <p data-paths="body" id="el-1140">think it harder, make it possible! :)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-comment">
                                                                    <a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">
                                                                        <img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/JoshMax.png" style="opacity: 1;">
                                                                    </a>
                                                                    <div class="comment-content">
                                                                        <div  class="fix-style-profile profile clearfix">
                                                                            <a style="float: left" href="/glang">
                                                                                <span data-paths="profile.firstName profile.lastName" id="el-105">Josh Max</span>
                                                                            </a>
                                                                            <p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-right"></i></a>
                                                                            <p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-left"></i></a>
                                                                        </div>
                                                                        <div class="comment-body-container">
                                                                            <p data-paths="body" id="el-1140">I never ask "is this possible?" pertaining to web development. I ask "how long will this take me and is it worth the end result?" Then I start, get stuck somewhere and ask one of the guys on SO for advice, and they ask "is this even possible?" for me ;)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-comment">
                                                                    <a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">
                                                                        <img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/trillobite.png" style="opacity: 1;">
                                                                    </a>
                                                                    <div class="comment-content">
                                                                        <div  class="fix-style-profile profile clearfix">
                                                                            <a style="float: left" href="/glang">
                                                                                <span data-paths="profile.firstName profile.lastName" id="el-105">trillobite</span>
                                                                            </a>
                                                                            <p style="color: #dadcdd; float: left">&nbsp;&nbsp;16 hours ago</p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-right"></i></a>
                                                                            <p style="float: right"><strong>&nbsp; 2 &nbsp;</strong></p>
                                                                            <a class="fix-vote-button"><i class="icon-chevron-left"></i></a>
                                                                        </div>
                                                                        <div class="comment-body-container">
                                                                            <p data-paths="body" id="el-1140">Is it possible that the core of the moon could just be peanut butter? I mean, think about it, it weighs less than it should if it's supposed to contain matter from earth from a horrific meteor strike, and peanut butter probably weighs less than iron/rock. How awesome would that be, aliens come to earth, and we explain to them that world hunger vanished after we discovered the moon, and the info came public :P Then North Korea got pissed off and blew up the moon, cause it made no sense, and now there is peanut butter all over the earth..Show more.... the end.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class=" g-btn type_primary size_small more-comment button-in-activity-box" id="more-comment"><span>Xem thêm 4 bình luận nữa</span></button>
                                                            </div>
                                                        </div>
                                                        <div class="item-add-comment-box">
                                                            <a class="avatar-view fix-avatar-view" href="user">
                                                                <img class="" width="35" height="35" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default-avatar.png" style="opacity: 1;">
                                                            </a>
                                                            <div class="comment-input-box">
                                                                <div contenteditable="true" class="comment-input-content" data-placeholder="Bình luận?"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-tabs-section" style="display: none">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Documents</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                        </div>
                                    </div>
                                </div>

                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Teacher(coming soon)</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <div class="g-cols">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="one-third">
                        <h3 style="margin-top: 20px">Lớp: <br><?php echo $class->class_name ?></h3>
                        <p style="float: left"><strong>Mã Môn Học: </strong><?php echo $class->class_code ?></p>
                        <a style="float: right; margin-top: 0" href="#edit-infomation-class" class="popup-with-form">
                            Chỉnh Sửa
                            <i class="icon-pencil"></i>
                        </a>

                        <p style="clear: both"><strong>Số tín chỉ: </strong> <?php echo $class->class_credit_number ?></p>
                        <p><strong>Website Môn Học: </strong> <a href="bluebee-uet.com"><?php echo $class->class_website ?></a></p>
                        <div class="clearfix">
                            <p style="float: left"><strong>Thành viên: </strong><a><?php echo $number_of_user ?></a></p>
                            <a id="add-members" style="float: right" href="javascript:void(0)"><p id="add-members-contents">Thêm thành viên <i class="icon-plus"></i></p></a>
                            <script>
                                $(document).ready(function() {
                                    $('a#add-members').click(function(event) {
                                        var hide = $('#box-invite-friends').css('display');
                                        if (hide == 'none') {
                                            $('#box-invite-friends').slideDown('400');
                                        } else {
                                            $('#box-invite-friends').slideUp('400');
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <?php $this->renderPartial('inviteform', array('classid' => $class->class_id)) ?>
                        <div class="g-hr" style="clear: both">
                            <span class="g-hr-h">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        <div class="clearfix">
                            <h3 style="float: left">Giáo Viên</h3>
                            <a style="float: right; margin-top: 10px" href="javascript:void(0)"><p id="add-members-contents">Thêm giáo viên <i class="icon-plus"></i></p></a>
                        </div>
                        <ul>
                            <li>
                                <div class="teacher-block">
                                    <script type="text/javascript">
                                        $(function() {
                                            $('.teacher-block-rating-outside').barrating({showSelectedRating: false, readonly: true});
                                        });
                                    </script>
                                    <img style="float: left" class="ava" src="http://localhost:7070/bluebee.com/themes/classic/assets/img/demo/blog-1.jpg" />
                                    <div>
                                        <p>Nguyễn Văn A</p>
                                        <a href="">Thông tin cá nhân</a>
                                    </div>
                                    <div class="input select rating-f read-only">
                                        <p style="float: left">Độ yêu thích:&nbsp;&nbsp;</p>
                                        <select class="teacher-block-rating-outside" name="rating" style="display: none; float: right">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="teacher-block">
                                    <img style="float: left" class="ava" src="http://localhost:7070/bluebee.com/themes/classic/assets/img/demo/blog-1.jpg" />
                                    <div>
                                        <p>Nguyễn Văn B</p>
                                        <a href="">Thông tin cá nhân</a>
                                    </div>
                                    <div class="input select rating-f read-only">
                                        <p style="float: left">Độ yêu thích:&nbsp;&nbsp;</p>
                                        <select class="teacher-block-rating-outside" name="rating" style="display: none; float: right">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
