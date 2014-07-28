<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {

        jQuery("a.subject").click(function() {
            var $self = $(this);
            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfoView') ?>",
                success: function(data) {
                    var json = data;
                    var result = data;
                    jQuery('.three-fourths').html(data);


                    var faculty_id = $self.attr("faculty-id");
                    var dept_id = $self.attr("dept-id");
                    var subject_type = $self.attr("subject-type");

                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/listOfSubjectInfo') ?>",
                        data: {subject_dept: dept_id, subject_faculty: faculty_id, subject_type: subject_type},
                        dataType: 'json',
                        success: function(data) {
                            var json = data;
                            var result = data;
                            $("#loading-image").hide();

                            //  $('#subject_type_tab').html('');

                            jQuery.each(result.subject_group_type, function(key, value) {
                                jQuery('#subject_type_tab').append(
                                        '<div class="w-tabs-item" subject_type_id=' + this.subject_type_id + '>' +
                                        '<span class="w-tabs-item-icon"></span>' +
                                        '<span class="w-tabs-item-title">' + this.subject_group_type + '</span>' +
                                        '</div>');

                                jQuery('#subject_type_details').append(
                                        '<div class="w-tabs-section">' +
                                        ' <div class="w-tabs-section-title">' +
                                        '<span class="w-tabs-section-title-icon"></span>' +
                                        '<span class="w-tabs-section-title-text">' + this.subject_group_type + '</span>' +
                                        '<span class="w-tabs-section-title-control"></span>' +
                                        '</div>' +
                                        '<div class="w-tabs-section-content" style="">' +
                                        '<div class="w-tabs-section-content-h">' + this.detail + '</div>' +
                                        '</div>' +
                                        '</div>');


                            });


                            jQuery('#subject_type_tab').children().first().addClass('active');


                            jQuery.each(result.subject_data, function(key, value) {
                                jQuery('#listsubject').append(
                                        '<tr style="border-bottom: 1px solid #d0d6d9">' +
                                        '<td><a href = "<?php echo Yii::app()->createUrl('subject') ?>' + this.subject_id + '">' + this.subject_name + '</a></td>' +
                                        '<td>' + this.subject_credits + '</td>' +
                                        '<td>' + this.subject_credit_hour + '</td>' +
                                        '<td>' + this.subject_code + '</td>' +
                                        '</tr>');
                            });

                            jQuery(".w-tabs").wTabs();
                            $("#content-tabs.w-tabs .w-tabs-section").first().addClass('active');
                        }
                    });

                }
            });
        });
    });
</script>


<script type="text/javascript">
    // var $j = jQuery.noConflict(); 
    $(document).ready(function() {
        jQuery("a.dept").click(function() {
            var $self = $(this);

            jQuery.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('listOfSubject/deptInfoView') ?>",
                success: function(data) {
                    var json = data;
                    var faculty_id = $self.attr("faculty-id");
                    var dept_id = $self.attr("dept-id");

                    jQuery('.three-fourths').html(data);
                    jQuery("#tab_acc.w-tabs").wTabs();

                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('listOfSubject/DeptInfo') ?>",
                        data: {faculty_id: faculty_id, dept_id: dept_id},
                        //dataType: 'json',
                        success: function(data) {
                            var json = $.parseJSON(data);
                            //  $('#subject_type_tab').html('');
                            var list = json.dept_data;
                            $.each(list, function(i, item) {
                                $('#head_subject').html(item.dept_name);
                                $('#dept_detail').html(item.dept_target);
                                $('#dept_knowledge').html(item.dept_knowleadge);
                                $('#dept_skill').html(item.dept_skill);
                                $('#dept_behavior').html(item.dept_behavior);
                                $('#dept_name').html(item.dept_name);
                                $('#dept_in_standart').html(item.dept_in_standart);
                                $('#dept_out_standard').html(item.dept_out_standard);
                                $('#dept_contact').html(item.dept_contact);
                                $('#dept_credits').html(item.dept_credits);
                                $('#dept_language').html(item.dept_language);
                                $('#dept_out_standard').html(item.dept_out_standard);
                                $('#dept_code').html(item.dept_code);
                                $('#target_detail').html(item.dept_target);
                            });
                            jQuery("#tab_acc.w-tabs").wTabs();
                        }
                    });
                }
            });
        });
    });

</script>

<div class="l-submain">
    <div class="l-submain-h i-cf">
        <div class="g-cols">
            <?php $this->renderPartial("partial/bar_left", array('category_father' => $category_father, 'subject_type' => $subject_type)); ?>
            <div class="three-fourths">
<!--                <img id="loading-image" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax_loader_blue_128.gif"/>-->
            </div>
        </div>
    </div>
</div><!--


<div class="head">Khoa học máy tính</div>
                <div class="g-cols">
                    <div class="two-thirds" >
                        <strong style="color: #262626">Mục tiêu đào tạo</strong>
                        <p  style="margin-right: 20px">Chương trình đào tạo Khoa học máy tính của khoa Công nghệ thông tin, Trường Đại học Công nghệ, Đại học Quốc gia Hà Nội nhằm tạo ra nguồn nhân lực chất lượng cao trong lĩnh vực Khoa học máy tính, có khả năng nghiên cứu và làm việc trong các tập đoàn lớn về Công nghệ thông tin ở Việt Nam cũng như các nước trong khu vực.
                        </p>

                        <h3 style="color: #262626 ;margin-top: 25px">Mô tả khái quát</h3>
                        <div class="w-tabs layout_accordion" style="margin-right: 20px;">
                            <div class="w-tabs-h">
                                <div class="w-tabs-section active">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text"><strong>1. Về kiến thức</strong></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <p>Sinh viên tốt nghiệp được trang bị kiến thức có hệ thống và hiện đại, phù hợp với các chương trình đào tạo tiên tiến trên thế giới.  <br/>
                                                •	Kiến thức tổng hợp về toán, khoa học tự nhiên, khoa học xã hội và nhân văn, ngoại ngữ. <br/>
                                                •	Kiến thức nền tảng trong KHMT như cơ sở toán trong KHMT, lập trình, cấu trúc dữ liệu và giải thuật, lý thuyết thông tin, chương trình dịch, trí tuệ nhân tạo. Đối với kiến thức sâu về ngành, tập trung đào chuyên sâu theo định hướng “Các hệ thống thông minh” và “Tương tác người máy” như xử lý ngôn ngữ tự nhiên, học máy, nhận dạng mẫu, tin sinh, xử lý tiếng nói, xử lý ảnh, tương tác người máy tính, lập trình trò chơi.<br/>
                                                •	Kiến thức tổng quan khác trong CNTT như công nghệ phần mềm, cơ sở dữ liệu, mạng máy tính, kiến trúc máy tính thông qua tỉ lệ môn học lựa chọn cao cùng với số lượng các môn học lựa chọn phong phú.<br/>
                                                •	Sinh viên được chú trọng đào tạo về kỹ năng lập trình với các ngôn ngữ, môi trường lập trình tiên tiến, tỉ trọng thực hành cao và nhiều bài tập ứng dụng thực tế. <br/>
                                                •	Sinh viên được đào tạo tăng cường tiếng Anh để có khả năng tự cập nhật kiến thức và làm việc trong môi trường CNTT trên thế giới. <br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text"><strong>2. Về năng lực:  Sinh viên ra trường có</strong></span>
                                        <span class="w-tabs-section-title-control"><i class="icon-angle-down"></i></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <p>
                                                •	Tư duy logic tốt, có năng lực sáng tạo để giải quyết các bài toán ứng dụng cụ thể. có năng lực tự học để nắm bắt các công nghệ, công cụ, kỹ năng mới trong phát triển phần mềm. <br/>
                                                •	Năng lực làm việc với vị trí lập trình viên trình độ cao cho các công ty phát triển phần mềm và hệ thống của các công ty trong và ngoài nước. Đặc biệt thích hợp cho các vị trí trong các lĩnh vực đòi hỏi công nghệ hiện đại và sáng tạo như phát triển các hệ thống thông minh, tương tác người máy. <br/>
                                                •	Khả năng làm việc ở nhiều vị trí khác nhau trong các cơ quan tổ chức phát triển và ứng dụng CNTT hàng đầu trong nước.   <br/>
                                                •	Sinh viên được trang bị kiến thức nền tảng và một số chuyên đề chuyên sâu trong KHMT, vì vậy có nhiều thuận lợi trong việc học lên thạc sĩ và tiến sĩ ngành KHMT và trở thành nhà nghiên cứu, giảng viên các trường đại học. <br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-tabs-section">
                                    <div class="w-tabs-section-title">
                                        <span class="w-tabs-section-title-icon"></span>
                                        <span class="w-tabs-section-title-text"><strong>3. Về thái độ: Cử nhân ngành KHMT có</strong></span>
                                        <span class="w-tabs-section-title-control"><i class="icon-angle-down"></i></span>
                                    </div>
                                    <div class="w-tabs-section-content">
                                        <div class="w-tabs-section-content-h">
                                            <p>
                                                •	Phẩm chất chính trị tốt <br/>
                                                •	Ý thức tổ chức kỷ luật, có tác phong làm việc khoa học, nghiêm túc, có đạo đức nghề nghiệp về bảo vệ thông tin, bản quyền.<br/>
                                                •	Tinh thần làm việc theo nhóm, rèn luyện thường xuyên tính kỷ luật và khả năng giao tiếp.<br/>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="one-third">
                        <div class="box more-box">
                            <h6 style="color: #262626"><strong>THÔNG TIN</strong></h6>

                            <h6> Thông tin cơ bản </h6>
                            <div class="white">
                                Tên ngành đào tạo : Khoa học máy tính (Computer Science)
                                <div class="underline1"></div>
                                Mã số đào tạo : 52480101
                                <div class="underline1"></div>
                                Trình độ đào tạo : Đại học
                                <div class="underline1"></div>
                                Thời gian đào tạo : 4 năm
                                <div class="underline1"></div>
                                Số tín chỉ : 140 tín chỉ
                                <div class="underline1"></div>
                                Ngôn ngữ : Tiếng Anh
                            </div>

                            <h6> Thông tin tuyển sinh </h6>
                            <div class="white">
                                Hình thức tuyển sinh : Thi tuyển sinh đại học hàng năm
                                <div class="underline1"></div>
                                Chỉ tiêu : Theo quy định của Bộ Giáo dục & Đào tạo
                            </div>

                            <h6> Yêu cầu đầu vào </h6>
                            <div class="white">
                                Đạt điểm đại học lớn hơn hoặc bằng điểm chuẩn của ngành
                                <div class="underline1"></div>
                                Làm bài kiểm tra đầu vào bằng tiếng anh
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-cols">
                    <div class="full-width">
                        <h3 style="color: #262626 ;margin-top: 25px">Chuẩn đầu ra của chương trình đào tạo</h3>
                        <p>
                            <a href="#">Chuẩn đầu ra của chương trình đào tạo (download)</a>  giúp sinh viên có thể đảm nhận :<br/>
                            -	Giảng viên về nhóm ngành Máy tính và Công nghệ Thông tin<br/>
                            -	Chuyên gia nghiên cứu và phát triển về Công nghệ Thông tin <br/>
                            -	Trưởng nhóm phát triển phần mềm<br/>
                            -	Chuyên viên phát triển ứng dụng web/trò chơi/di động/các hệ thống nhúng<br/>
                            -	Trưởng nhóm phát triển<br/>
                            -	Quản lý dự án<br/>
                            -	Lập trình viên<br/>
                            Bên cạnh đó, với thế mạnh về ngoại ngữ và chuyên môn, sinh viên tốt nghiệp cũng có thể học lên các bậc cao hơn như thạc sỹ, tiến sĩ, sau khi ra trường.<br/>
                        </p>

                        <h3 style="color: #262626 ;margin-top: 25px">Liên hệ</h3>
                        <p>
                            Nếu bạn có thắc mắc về ngành Khoa học máy tính , hãy liên hệ :<br/>

                            <strong>Đại học Công Nghệ - Đại học Quốc Gia Hà Nội</strong><br/>
                            Khoa học máy tính <br/>
                            Số 2, Xuân Thủy, Cầu Giấy, Hà Nội<br/>
                            Điện thoại :<br/>
                            Fax : <br/>
                            Email : <a>kienduynguyen94@gmail.com</a><br/>
                            Web : <a>uet.vnu.edu.vn</a><br/>
                        </p>
                    </div>
                </div>
   
