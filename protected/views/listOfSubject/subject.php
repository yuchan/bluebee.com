<?php foreach($subject as $subject): ?>
<div class="l-submain">
    <div class="l-submain-h i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/bar_left",  array('category_father'=>$category_father, 'subject_type' => $subject_type)); ?>
            <div class="three-fourths">
                <div class="head"><?php echo $subject->subject_name ?></div>
                <div class="w-testimonial">
                    <div class="w-testimonial-h">
                        <blockquote>
                            <q class="w-testimonial-text"><?php echo $subject->subject_target ?></q>
                            <div class="w-testimonial-person">
                                <i class="icon-user"></i>
                                <span class="w-testimonial-person-name">Mục tiêu môn học</span>
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="g-cols" style="margin-top:20px">
                    <div class="two-thirds" >
                        <strong style="color: #262626">Nội dung môn học</strong>
                        <p style="margin-right: 25px;margin-top: 20px;margin-bottom: 20px">
                            <?php echo $subject->subject_content ?>
                        </p>
                        <strong style="color: #262626">Giáo viên giảng dạy</strong>

                        <div class="g-cols" style="margin-right: 30px;margin-top: 20px">
<?php foreach($result as $teacher): ?>
                            <div class="one-third">
                                <div class="w-team-member">
                                    <div class="w-team-member-h">
                                        <div class="w-team-member-image">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/demo/member-3.jpg" alt="Item picture" />
                                            <div class="w-team-member-links">
                                                <div class="w-team-member-links-list">
                                                    <a class="w-team-member-links-item" href="http://www.fb.com/" target="_blank">
                                                        <i class="icon-facebook"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-team-member-meta">
                                            <h4 class="w-team-member-name"><?php echo $teacher->teacher_name ?></h4>
                                            <div class="w-team-member-role">Trưởng nhóm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php endforeach; ?>                    
                             
                        </div>
                    </div>
                    <div class="one-third">
                        <div class="box more-box">
                            <h6 style="color: #262626"><strong>THÔNG TIN</strong></h6>

                            <h6> Thông tin cơ bản </h6>
                            <div class="white">
                                Mã môn học : <?php echo $subject->subject_code ?>
                                <div class="underline1"></div>
                                Tên môn : <?php echo $subject->subject_name ?>
                                <div class="underline1"></div>
                                Số tín chỉ : <?php echo $subject->subject_credits ?>
                                <div class="underline1"></div>
                                Môn học tiên quyết : không
                            </div>

                            <h6> Tài liệu bắt buộc </h6>
                            <div class="white">
                                - <a href="#">Trần Trọng Huệ, Đại số tuyến tính và hình học giải tích,  NXB GD  2007.</a>
                                <div class="underline1"></div>
                                - <a href="#">Nguyễn Đình Trí và Tạ Văn Đĩnh, Toán cao cấp, Tập I, NXB GD  2007.</a>
                                <div class="underline1"></div>
                                - <a href="#">Nguyễn Đức Đạt, Bài tập đại số và hình học giải tích,  NXB ĐHQGHN  2005.</a>
                            </div>

                            <h6> Tài liệu tham khảo </h6>
                            <div class="white">
                                - <a href="#"> Nguyễn Hữu Việt Hưng, Đại số tuyến tính,  NXB ĐHQGHN (tái bản)  2004.</a>                                  
                                <div class="underline1"></div>
                                - <a href="#">Lê Tuấn Hoa, Đại số tuyến tính qua các ví dụ và bài tập, NXB ĐHQGHN 2006.</a>
                                <div class="underline1"></div>
                                - <a href="#">Nguyễn Thủy Thanh, Bài tập toán cao cấp, Tập I, NXB ĐHQGHN 2002.</a>
                            </div>
                        </div>
                    </div>
                    <div class="full-width">
                     <table class="g-table">
                    <thead>
                        <tr>
                            <th>Bài học</th>
                            <th>Tuần</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #d0d6d9">
                            <td><a>Những nguyên lý cơ bản của chủ nghĩa Mác - Lênin 1</a></td>
                            <td>2</td>
                            
                        </tr>
                        <tr style="border-bottom: 1px solid #d0d6d9">
                            <td><a>Những nguyên lý cơ bản của chủ nghĩa Mác – Lênin 2</a></td>
                            <td>3</td>
                            
                        </tr>
                        
                    </tbody>
                </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>