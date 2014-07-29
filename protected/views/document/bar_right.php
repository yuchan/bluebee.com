 <div class="one-third">
                       <?php $this->renderPartial('partial/upload');?>
                        <div class="wrap_fliter">
                            <div class="clearfix">
                                <span>Lọc theo tình trạng</span>
                                <div class="filter_subjects">
                                    <label class="checkbox-styled">
                                        <input class="status_input" type="checkbox" id="latest" value="latest">
                                               <span>Mới nhất</span>
                                    </label>
                                    <label class="checkbox-styled">
                                        <input class="status_input" type="checkbox" id="oldest" value="oldest"/>
                                        <span>Cũ nhất</span>
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
                                <div class="filter_subjects" id="filter_subject">
                                    <label class="checkbox-styled">
                                        <input type="checkbox"/>
                                        <span>Tất cả</span>
                                    </label>
                                   
                                </div>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>