 
<script type="text/javascript">
    $(document).ready(function() {
        var form = $('#newclassform');
        form.submit(function(event) {
            $('#res').html('');
            var data = form.serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->createUrl('classpage/createclass') ?>',
                data: data,
                success: function(data) {
                    var json = data;
                    var result = $.parseJSON(json);
                    //       $('#res').html(result.message);
                    alert(result.message);
                }
            });
            event.preventDefault();
            event.stopPropagation();
            return false;
        });
    });</script>
<form class="g-form white-popup-block mfp-hide" id="newclassform" action="<?php $this->createUrl('classpage/createclass')?>" method="POST">
                        <h3>Create A New Class</h3>
                        <div class="g-form-group">
                            <div class="g-form-group-rows">
                                <div class="g-form-row">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="classcode">Mã lớp</label>
                                    </div>
                                    <div class="g-form-row-field">
                                        <div class="g-input">
                                            <input type="text" name="classcode" id="contact_username" placeholder="Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="g-form-row">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="classname">Tên lớp</label>
                                    </div>
                                    <div class="g-form-row-field">
                                        <div class="g-input">
                                            <input type="text" name="classname" id="contact_username" placeholder="Email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="g-form-group">
                                    <div class="g-form-row-label">
                                        <label class="g-form-row-label-h" for="description">Miêu tả</label>
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
                                        <button class="g-btn type_primary" type="submit" name="Submit" value="Submit">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>