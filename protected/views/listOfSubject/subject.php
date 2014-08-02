
<?php foreach ($subject as $subject): ?>
    <div class="l-submain">
        <div class="l-submain-h i-cf">
            <div class="g-cols">
               
                <div class="full-width">
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
                                <?php foreach ($teacher as $teacher): ?>
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
                                    <?php foreach ($doc as $doc): ?>
                                        - <a href="google.com"><?php echo $doc->doc_name . ", " . $doc->doc_author . ", " . $doc->doc_publisher ?></a>
                                        <div class="underline1"></div>
                                    <?php endforeach; ?>
                                </div>

                                <h6> Tài liệu tham khảo </h6>
                                <div class="white">
                                    <?php foreach ($reference as $reference): ?>
                                        - <a href="<?php echo $reference->doc_url ?>"><?php echo $reference->doc_name . ", " . $reference->doc_author . ", " . $reference->doc_publisher ?></a>
                                        <div class="underline1"></div>
                                    <?php endforeach; ?>
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
                                    <?php foreach ($lesson as $lesson): ?>
                                        <tr style="border-bottom: 1px solid #d0d6d9">
                                            <td><a><?php echo $lesson->lesson_name ?></a></td>
                                            <td><?php echo $lesson->lesson_weeks ?></td>                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="fb-comments" data-href="<?php echo Yii::app()->createAbsoluteUrl('listOfSubject/subject?subject_id=').$subject->subject_id ?>" data-width="1000" data-numposts="8" data-colorscheme="light"></div>
                    </div>

                </div>
            </div>
            <!--cmt facebook-->
        </div>
    </div>
<?php endforeach; ?>