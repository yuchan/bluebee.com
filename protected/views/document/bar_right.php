 <div class="one-third">
                       <?php $this->renderPartial('partial/upload');?>
                        <div class="wrap_fliter">
                            <div class="clearfix">
                                <span>Lọc theo tình trạng</span>
                                <div class="filter_subjects">
                                    <label class="checkbox-styled">
                                        <input class="status_input" type="checkbox"/ checked>
                                               <span>Mới nhất</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input class="status_input" type="checkbox"/>
                                        <span>Cũ nhất</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input class="status_input" type="checkbox"/>
                                        <span>Xem nhiều</span>
                                    </label>
                                </div>
                                <script type="text/javascript">
                                    $('input.status_input').on('change', function() {
                                        $('input.status_input').not(this).prop('checked', false);
                                    });
                                </script>
                            </div>
                            <div class="clearfix" style="margin-top: 10px">
                                <span class="">Lọc theo Môn học</span>
                                <div class="filter_subjects">
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tất cả</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tin học cơ sở 1</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tin học cơ sở 2</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tin học cơ sở 3</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tin học cơ sở 4</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/ checked>
                                               <span>Công nghệ phần mềm</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Đại số tuyến tính</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Mạng máy tính</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Nguyên lý hệ điều hành</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Giải tích 2</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>