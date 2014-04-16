<div class="l-submain-h i-cf">
    <div class="l-content">
        <div class="l-content-h i-widgets">
            <style>
                .cover {
                    background-image: url(<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/cover.jpg);
                    background-repeat: no-repeat;
                    background-size: 100% 100%;
                    min-height: 400px;
                }
                .button-on-cover {
                    top: 350px;
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
            <div class="cover">
                <div class="button-on-cover" style="position: absolute">
                    <script>
                        $(document).ready(function($) {
                            $('#changecover').click(function(event) {
                                $(this).find('.cover')
                            });
                        });
                    </script>
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
                                        <span class="w-tabs-item-title">Activity</span>
                                    </div>

                                    <div class="w-tabs-item fix-w-tab-item">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Documents</span>
                                    </div>

                                    <div class="w-tabs-item fix-w-tab-item">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Information</span>
                                    </div>

                                    <div class="w-tabs-item fix-w-tab-item">
                                        <span class="w-tabs-item-icon"></span>
                                        <span class="w-tabs-item-title">Members</span>
                                    </div>
                                </div>

                                <div class="w-tabs-section active">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Activity</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <style>
                                        .activity-input {
                                            margin: 20px;
                                            display: block;
                                            width: auto;
                                            height: auto;
                                            position: relative;
                                            overflow: visible;
                                        }
                                        .avatar-view {
                                            width:35px;
                                            height: 35px;
                                            background-size: 35px;
                                            border-radius: 50%;
                                            top: 6px;
                                            left: 6px;
                                            z-index: 2;
                                            position: absolute;
                                        }
                                        .activity-input-box {
                                            border: 1px solid #d0d6d9;
                                            border-radius: 5px;
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
                                            padding: 15px 100px 14px 56px;
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
                                        <div class="w-tabs-section-content-h" style="padding-top: 10px;">
                                            <div class="activity-input">
                                                <a class="avatar-view" href="user">
                                                    <img class="" width="35" height="35" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default-avatar.png" style="opacity: 1;">
                                                </a>
                                                <div class="activity-input-box">
                                                    <div contenteditable="true" class="activity-input-content">
                                                        What's new User?
                                                    </div>
                                                    <button type="submit" class="g-btn type_primary size_small submit-button">
                                                        <span>Post</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <style>
                                                .activity-content {
                                                    width: auto;
                                                    height: auto;
                                                    overflow: visible;
                                                    position: relative;
                                                    margin: 0 20px 0 80px;
                                                    height: 100%;
                                                }
                                                .activity-item {
                                                    border-radius: 5px;
                                                    position: relative;
                                                    border: 1px solid #d8d8d8;
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
                                                    background-color: #f6f6f6;
                                                    border-radius: 0 0 5px 5px;
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
                                                    border-top: 1px solid #d8d8d8;
                                                }
                                                .comment-content {
                                                    margin: 0 0 0 40px;
                                                    width: 92%;
                                                }
                                            </style>
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
                                                    <div class="comment-container">
                                                        <div class="show-more-comment">
                                                            <a class="view-more" href="#">
                                                                View all <span data-paths="repliesCount" id="el-117">4</span> comments...
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="list-item-comment-wrapper">
                                                        <div class="item-comment">
                                                            <a class="avatar-view-user" href="/sancak" style="width: 40px; height: 40px; background-size: 40px; background-image: none;">
                                                                <img class="" width="40" height="40" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/sancak.png" style="opacity: 1;">
                                                            </a>
                                                            <div class="comment-content">
                                                                <div  class="profile clearfix" style="margin: 0; width: 100%">
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
                                                                <div  class="profile clearfix" style="margin: 0; width: 100%">
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
                                                                <div  class="profile clearfix" style="margin: 0; width: 100%">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Documents</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla suctus. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <div class="g-cols">
                                                <div class="one-half">
                                                    <h4>One Half</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo.</p>
                                                </div>
                                                <div class="one-half">
                                                    <h4>One Half</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Information</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <div class="g-cols">
                                                <div class="one-third">
                                                    <img src="img/demo/team-1.jpg" alt="" />
                                                </div>
                                                <div class="one-third">
                                                    <h4>One Third</h4>
                                                    <p>At delectus doloremque dolores explicabo laudantium minima qui. Animi aperiam
                                                        aspernatur atque debitis distinctio impedit inventore iure labore modi omnis,
                                                        optio rerum ut veritatis voluptatum?</p>
                                                </div>
                                                <div class="one-third">
                                                    <h4>One Third</h4>
                                                    <p>Accusamus et hic inventore iure iusto modi reprehenderit soluta. Aliquam,
                                                        assumenda at consequuntur cumque, enim, explicabo iusto libero maiores nisi
                                                        numquam odio porro praesentium quis.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text">Members</span>
                                        <span class="w-tabs-section-title-control"></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <div class="g-cols">
                                                <div class="one-third">
                                                    <img src="img/demo/team-1.jpg" alt="" />
                                                </div>
                                                <div class="one-third">
                                                    <h4>One Third</h4>
                                                    <p>At delectus doloremque dolores explicabo laudantium minima qui. Animi aperiam
                                                        aspernatur atque debitis distinctio impedit inventore iure labore modi omnis,
                                                        optio rerum ut veritatis voluptatum?</p>
                                                </div>
                                                <div class="one-third">
                                                    <h4>One Third</h4>
                                                    <p>Accusamus et hic inventore iure iusto modi reprehenderit soluta. Aliquam,
                                                        assumenda at consequuntur cumque, enim, explicabo iusto libero maiores nisi
                                                        numquam odio porro praesentium quis.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="one-third">
                    <h3 style="margin-top: 20px">Lớp: <br>Công Nghệ Phần Mềm</h3>
                    <p><strong>Mã Môn Học:</strong> INT2208</p>
                    <p><strong>Số tín chỉ:</strong> 3</p>
                    <p><strong>Website Môn Học:</strong> <a href="bluebee-uet.com">bluebee-uet.com</a></p>
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
                    <div id="box-invite-friends" style="clear: both; display: none">
                        <div contenteditable=true id="invite-friends"></div>
                        <button type="submit" id="invite-friends-button" class="g-btn type_primary size_small" style="width: 100%">
                            <span>Invite Your Friends</span>
                        </button>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            
                            $.ajax({
                                type : "get",
                                url : '<?php echo Yii::app()->createUrl('classpage/suggestfriend')?>', // loi o day nha,
                                success : function(data){
                                    var arr = $.parseJSON(data);
                                    $("#invite-friends").tokenInput(
                                       arr
                                       , {
                                        theme: "facebook"
//                                        preventDuplicates: true
                                    });
                                    $('button#invite-friends-button').click(function () {
                                        alert("Would submit: " + $(this).siblings("#invite-friends").val());
                                    });
                                }
                            });
                            // chay thu phat, a 
                        });
                        </script>
                    </div>
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
                                <img style="float: left" class="ava" src="http://localhost:7070/SE_2014_Group5/themes/classic/assets/img/demo/blog-1.jpg" />
                                <div>
                                    <p>Nguyễn Văn A</p>
                                    <a href="">Thông tin cá nhân</a>
                                </div>
                                <div class="input select rating-f">
                                    <p style="float: left">Rating: </p>
                                    <select class="example-f" name="rating" style="display: none; float: right">
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
                                <div class="input select rating-f">
                                    <p style="float: left">Rating: </p>
                                    <select class="example-f" name="rating" style="display: none; float: right">
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