
<form class="g-form white-popup-block mfp-hide" id="newclassform" action="<?php echo $this->createUrl('classPage/createClass')?>" method="POST">
                        <h3>Tạo một lớp mới</h3>
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
                                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit">Tạo lớp mới</button>
                                    </div>
                                </div>

                            </div>
                            <div id="alert"></div>
                        </div>
                    </form>