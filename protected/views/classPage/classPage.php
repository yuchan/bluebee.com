 <?php foreach ($detail_classpage as $class): ?> 
<script type="text/javascript">
        $(document).ready(function() {
            var form = $('#edit-infomation-class');
            form.submit(function(event) {
                var data = form.serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo Yii::app()->createUrl('classPage/changeClassInformation?classid='. $class->class_id) ?>',
                    data: data,
                    success: function(data) {
                        var json = data;
                        var result = $.parseJSON(json);
                        $('#alert1').html('');
                        if (result.success == 1) {
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
                            location.href = result.url;
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
                <style>
                    .cover {
                        max-height: 200px;
                        overflow: hidden;
                    }
                    .button-on-cover {
                        top: 150px;
                        left: 700px;
                    }
                    #fix-style-w-tab {
                        border-top: none;
                        border-left: 1px solid #d0d6d9;
                        border-bottom: none;
                        border-right: 1px solid #d0d6d9;
                        min-height: 500px;
                    }
                    .fix-w-tab-item {
                        width: 25%;
                        text-align: center;
                    }
                </style>
                <div class="cover" style="">
                    <img style="width: 100%; position: relative; margin-top: -120px" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/cover.jpg"/>
                    <div class="button-on-cover" style="position: absolute">
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
                                    <style>
                                        .activity-input {
                                            display: block;
                                            width: auto;
                                            height: auto;
                                            position: relative;
                                            overflow: visible;
                                            min-height: 60px;
                                        }
                                        .avatar-view {
                                            width:50px;
                                            height: 50px;
                                            background-size: 35px;
                                            border-radius: 50%;
                                            top: 6px;
                                            left: 20px;
                                            z-index: 2;
                                            position: absolute;
                                        }
                                        .activity-input-box {
                                            border-top: 1px solid #d0d6d9;
                                            box-sizing: border-box;
                                            display: inline-block;
                                            min-width: 50px;
                                            width: 100%;
                                            height: 100%;
                                            overflow: hidden;
                                            vertical-align: baseline;
                                        }
                                        .activity-input-content {
                                            color: #3c4752;
                                            width: 100%;
                                            height: auto;
                                            min-height: 45px;
                                            line-height: 16px;
                                            font-size: 14px;
                                            padding: 15px 110px 14px 95px;
                                        }
                                        [contenteditable=true]:empty:not(:focus):before{
                                          content:attr(data-placeholder);
                                          color:grey;
                                        }
                                        .placeholder {
                                            color: #acacac;
                                        }
                                        .submit-button {
                                            right: 9px;
                                            top: 8px;
                                            position: absolute;
                                            z-index: 1;
                                            margin: 0;
                                        }
                                        .one-third li {
                                            clear: both;
                                        }
                                        .teacher-block:after, .one-third li:after, .clearfix:after {
                                            clear: both;
                                            content: ".";
                                            display: block;
                                            height: 0;
                                            line-height: 0;
                                            visibility: hidden;
                                        }
                                        .teacher-block {
                                            clear: both;
                                            min-height: 80px;
                                            position: relative;
                                            border: 1px solid #d0d6d9;
                                            border-radius: 5px;
                                            margin-bottom: 10px;
                                        }

                                    </style>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h" style="padding-top: 0px;">
                                            <div class="activity-input">
                                                <a class="avatar-view" href="user">
                                                    <img class="" width="50" height="50" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default-avatar.png" style="opacity: 1;">
                                                </a>
                                                <div class="activity-input-box">
                                                    <div contenteditable="true" class="activity-input-content" data-placeholder="Có Gì Hot?"></div>
                                                    <button type="submit" class="g-btn type_primary size_small submit-button">
                                                        <span>Đăng Tin</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <style>
                                                .activity-content {
                                                    width: auto;
                                                    height: auto;
                                                    overflow: visible;
                                                    position: relative;
                                                    margin: 10px 20px 0 80px;
                                                    height: 100%;
                                                }
                                                .activity-item {
                                                    position: relative;
                                                    box-sizing: border-box;
                                                }
                                                .activity-item article {
                                                    display: block;
                                                    color: #3c4572;
                                                    font-weight: 200;
                                                    margin-bottom: 16px;
                                                }
                                                .activity-item article p{
                                                    padding-left: 15px;
                                                    padding-right: 15px;
                                                }
                                                .other-user-avatar {
                                                    background-size: 50px;
                                                    width: 50px;
                                                    height: 50px;
                                                    display: block;
                                                    top:0;
                                                    right: 100%;
                                                    margin-right: 10px;
                                                    position: absolute;
                                                }

                                                a.avatar-view-user {
                                                    left: 6px;
                                                    z-index: 2;
                                                    position: absolute;
                                                    margin-top: 5px;
                                                }

                                                a.avatar-view-user img, a.other-user-avatar img{
                                                    border-radius: 50%;
                                                }
                                                .profile {
                                                    margin: 10px 15px;
                                                    display: inline-block;
                                                    width: 95%;
                                                }
                                                .fix-vote-button {
                                                    float: right;
                                                    margin-top: 6px;
                                                }
                                                .comment-container {
                                                    position: relative;
                                                    width: 100%;
                                                    height: 100%;
                                                    margin: 0;
                                                    padding: 0;
                                                }
                                                .show-more-comment {
                                                    background-color: #ececec;
                                                    border-top: 1px solid #d8d8d8;
                                                    border-bottom: 1px solid #d8d8d8;
                                                    text-align: center;
                                                    height: 40px;
                                                    line-height: 40px;
                                                    position: relative;
                                                }
                                                .view-more {
                                                    width: 100%;
                                                    display: block;
                                                }
                                                .list-item-comment-wrapper {
                                                    position: relative;
                                                    width: 100%;
                                                    height: 100%;
                                                    display: block;
                                                }
                                                .item-comment {
                                                    padding: 5px 10px;
                                                    border-bottom: 1px solid #d8d8d8;
                                                }
                                                .comment-content {
                                                    margin: 15px 0 15px 60px;
                                                    width: 88%;
                                                }
                                                .button-in-activity-box{
                                                    width: 100%;
                                                    text-transform: none;
                                                    font-size: 14px;
                                                    font-weight: normal;
                                                    margin: 0;
                                                }
                                                .item-add-comment-form {
                                                    max-height: 70px;
                                                    height: 47px;
                                                    background-color: white;
                                                    line-height: 24px;
                                                    outline: none;
                                                    margin-left: 47px;
                                                    width: 91%;
                                                }
                                                .item-add-comment-form:focus {
                                                    outline: none;
                                                }
                                                .fix-style-profile {
                                                    margin: 0 0 15px 0;
                                                    width: 100%;
                                                }
                                            </style>
                                            <div style="border-top: 1px solid #d8d8d8;">
                                                <div class="activity-content">
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
                                                        <style type="text/css">
                                                            .item-add-comment-box {
                                                                display: block;
                                                                width: auto;
                                                                height: auto;
                                                                position: relative;
                                                                overflow: visible;
                                                            }
                                                            .comment-input-box {
                                                                border: 1px solid #d0d6d9;
                                                                box-sizing: border-box;
                                                                display: inline-block;
                                                                min-width: 50px;
                                                                width: 100%;
                                                                height: 100%;
                                                                overflow: hidden;
                                                                vertical-align: baseline;
                                                            }
                                                            .comment-input-content {
                                                                color: #3c4752;
                                                                width: 100%;
                                                                height: auto;
                                                                min-height: 45px;
                                                                line-height: 16px;
                                                                font-size: 14px;
                                                                padding: 15px 100px 14px 56px;
                                                            }
                                                            .fix-avatar-view{
                                                                left: 6px;
                                                            }
                                                        </style>
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
                        <p style="float: left"><strong>Mã Môn Học:</strong><?php echo $class->class_code ?></p>
                        <a style="float: right; margin-top: 0" href="#edit-infomation-class" class="popup-with-form">
                            Chỉnh Sửa
                            <i class="icon-pencil"></i>
                        </a>

                        <p style="clear: both"><strong>Số tín chỉ:</strong> <?php echo $class->class_credit_number ?></p>
                        <p><strong>Website Môn Học:</strong> <a href="bluebee-uet.com"><?php echo $class->class_website ?></a></p>
                        <div class="clearfix">
                            <p style="float: left"><strong>Thành viên:</strong> <a>7 người</a></p>
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
                        <?php $this->renderPartial('inviteform') ?>
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
                                    <img style="float: left" class="ava" src="http://localhost:7070/SE_2014_Group5/themes/classic/assets/img/demo/blog-1.jpg" />
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
                                    <img style="float: left" class="ava" src="http://localhost:7070/SE_2014_Group5/themes/classic/assets/img/demo/blog-1.jpg" />
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
