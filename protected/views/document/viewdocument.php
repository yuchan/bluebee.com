<script type="text/javascript">
    $(document).ready(function() {
        $('#loading').hide();
        var form = $('#commentform');
        form.submit(function(event) {
            // prevent default action
            event.preventDefault();
            // send ajax request
            $.ajax({
                beforeSend: function() {
                    $('#loading').show();
                },
                url: '<?php echo Yii::app()->createUrl('document/comment') ?>',
                type: 'POST',
                data: form.serialize(), //form serizlize data
                success: function(data) {
                    // Append with fadeIn see http://stackoverflow.com/a/978731
                    var json = data;
                    var result = $.parseJSON(json);
                    var item = $('<div class="w-comments-item" id="comment-1">\
                                    <div class="w-comments-item-meta">\
                                        <div class="w-comments-item-icon">\
                                            <img src="img/avatar.png" alt="" />\
                                        </div>\
                                        <div class="w-comments-item-author">Norman Cook</div>\
                                        <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>\
                                    </div>\
                                     <div class="w-comments-item-text">\
                                       <p>' + result.message + '</p>\
                                    </div>\
                                </div>').hide().fadeIn(800);
                    $('#commentblock').append(item);
                    document.getElementById("commentform").reset();
                },
                complete: function() {
                    $('#loading').hide();
                },
                error: function(event) {
                    alert(event);
                }
            });

            event.stopPropagation();
            return false;
        });
    });
</script>
<?php foreach ($detaildoc as $detail): ?>
    <div id="content">
        <div class="l-submain for_pagehead">
            <div class="l-submain-h g-html i-cf">
                <div class="w-pagehead">
                    <h1 style="font-size: 30px;"><?php echo $detail->doc_name ?></h1>
                    <p>Đăng bởi</p>
                    <a href="#" style="font-size: 22px; margin: 10px 0 0 10px; float: left;">User</a>
                </div>
            </div>
        </div>
        <div class="l-submain">
            <div class="l-submain-h g-html i-cf ">
                <div class="g-cols">
                    <div class="four-fifths" style="float: none; margin: 0 auto">
                        <div class="l-content">
                            <iframe class="scribd_iframe_embed" src="//www.scribd.com/embeds/<?php echo $detail->doc_scribd_id ?>/content?start_page=1&view_mode=list&share=false&show_recommendations=false" data-auto-height="true" data-aspect-ratio="1.2938689217759" scrolling="no" id="doc_87674" width="100%" height="600" frameborder="1"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="l-submain-h g-html i-cf ">
            <div class="g-cols">
                <div class="four-fifths" style="float: none; margin: 0 auto">
                    <button class="g-btn type_default size_small"><span><i class="icon-download-alt"></i>Chia sẻ Tài liệu</span></button>
                    <button class="g-btn type_default size_small"><span><i class="icon-plus-sign-alt"></i>Thêm vào mục yêu thích</span></button>
                </div>
            </div>
        </div>


        <div class="l-submain-h g-html i-cf ">
            <div class="g-cols">
                <div class="four-fifths" style="float: none; margin: 0 auto">
                    <div class="l-content">
                        <div id="comments" class="w-comments has_form" value = "show">
                            <div class="w-comments-h">
                                <h4 class="w-comments-title"><i class="icon-comments"></i>5 Comments. <a href="#form">Leave new</a></h4>

                                <div class="w-comments-list" id="commentblock">
                                    <?php foreach ($detailcomment as $comment): ?>
                                        <div class="w-comments-item" id="comment-1">
                                            <div class="w-comments-item-meta">
                                                <div class="w-comments-item-icon">
                                                    <img src="img/avatar.png" alt="" />
                                                </div>
                                                <div class="w-comments-item-author">Norman Cook</div>
                                                <a class="w-comments-item-date" href="#comment-5">April 4th, 2013 3:37 am</a>
                                            </div>
                                            <div class="w-comments-item-text">
                                                <p><?php echo $comment->comment_content ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <div> <img class="" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax-loader.gif" alt="" style="" id="loading"/></div>
                                <div class="w-comments-form" style="margin-left: 5%; margin-right: 5%" id="form">
                                    <div class="w-comments-form-title">Bình luận</div>
                                    <div class="w-comments-form-text">Cho chúng tôi thấy ý kiến của bạn !!</div>
                                    <form class="g-form" action="<?php echo Yii::app()->createUrl('document/comment') ?>" method="POST" id="commentform"/>
                                    <div class="g-form-group-rows">
                                        <div class="g-form-row-field">
                                            <div class="g-input">
                                                <input type="hidden" name="comment_doc_id" id="comment_doc_id" value="<?php echo $detail->doc_scribd_id; ?>" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 5px; background-color: white;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="g-form-group">
                                        <div class="g-form-group-rows">

                                            <div class="g-form-row">

                                                <div class="g-form-row-field">
                                                    <textarea name="content" id="input1x3" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="g-form-row">
                                                <div class="g-form-row-label"></div>
                                                <div class="g-form-row-field">
                                                    <button class="g-btn type_primary size_small" type="submit" name="Submit" id="submit">Gửi bình luận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
