<style>
    #styleforsearchbar{
        background-color: white;
        min-height: 60px;
        font-size: 30px;
        border: none;
        outline: none;
        border-radius: 0px;
    }
    #styleforsearchbar:focus{
        border: none;
        box-shadow: none;
        border-bottom: 2px solid black !important;
    }
    .clear-shadow {
        clear: both;
    }
    .tabs {
        position: relative;
        margin: 40px auto;
        width: 1000px;
        border-top: 1px solid #d8d8d8;
    }

    .tabs input {
        position: absolute;
        z-index: 1000;
        width: 250px;
        height: 40px;
        left: 0px;
        top: 0px;
        opacity: 0;
        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        cursor: pointer;
    }
    .tabs input#tab-2{
        top: 40px;
    }
    .tabs input#tab-3{
        top: 80px;
    }
    .tabs input#tab-4{
        top: 120px;
    }

    .tabs label {
        background: #ebf0f0;
        font-size: 15px;
        line-height: 40px;
        height: 40px;
        position: relative;
        padding: 0 20px;
        display: block;
        width: 80px;
        color: #385c5b;
        letter-spacing: 1px;
        text-align: right;
        float: left;
        clear: both;
        text-shadow: 1px 1px 1px rgba(255,255,255,0.3);
        box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
        width: 250px;
    }

    .tabs input:hover + label {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .tabs label:first-of-type {
        z-index: 4;
    }

    .tab-label-2 {
        z-index: 3;
    }

    .tab-label-3 {
        z-index: 2;
    }

    .tab-label-4 {
        z-index: 1;
    }

    .tabs input:checked + label {
        background: #fff;
        z-index: 6;
        border-left: 5px solid #429edb;
    }

    .tabs label:after {
        content: '';
        background: #fff;
        position: absolute;
        right: -2px;
        top: 0;
        width: 2px;
        height: 100%;
    }

    .clear-shadow {
        clear: both;
    }

    .content {
        border-left: 1px solid #d8d8d8;
        background: #fff;
        position: relative;
        width: auto;
        margin: -160px 0 0 250px;
        height: 400px;
        z-index: 5;
        overflow: hidden;
    }

    .content .child{
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 40px;
        z-index: 1;
        opacity: 0;

        -webkit-transition: opacity linear 0.1s;
        -moz-transition: opacity linear 0.1s;
        -o-transition: opacity linear 0.1s;
        -ms-transition: opacity linear 0.1s;
        transition: opacity linear 0.1s;
    }

    .tabs input.tab-selector-1:checked ~ .content .content-1,
    .tabs input.tab-selector-2:checked ~ .content .content-2,
    .tabs input.tab-selector-3:checked ~ .content .content-3,
    .tabs input.tab-selector-4:checked ~ .content .content-4 {
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        -o-transform: translateY(0px);
        -ms-transform: translateY(0px);
        transform: translateY(0px);
        z-index: 100;
        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        filter: alpha(opacity=100);
        opacity: 1;
        -webkit-transition: ease-out 0.3s 0.3s;
        -moz-transition: ease-out 0.3s 0.3s;
        -o-transition: ease-out 0.3s 0.3s;
        -ms-transition: ease-out 0.3s 0.3s;
        transition: ease-out 0.3s 0.3s;
    }

    .content div h2,
    .content div h3{
        color: #398080;
    }
    .content div p {
        font-size: 14px;
        line-height: 22px;
        font-style: italic;
        text-align: left;
        margin: 0;
        color: #777;
        padding-left: 15px;
        font-family: Cambria, Georgia, serif;
        border-left: 8px solid rgba(63,148,148, 0.1);
    }
</style>

<div class="l-submain-h" style="margin-top: 2%">
    <h1>kết quả cho: "Sơn"</h1>
    <input class="none-display" type="text" id="styleforsearchbar" value="" placeholder="Bạn muốn tìm gì ?"/>
</div>

<div class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
    <label for="tab-1" class="tab-label-1">người dùng (2 kết quả)</label>
    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
    <label for="tab-2" class="tab-label-2">giáo viên (3 kết quả)</label>
    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3">
    <label for="tab-3" class="tab-label-3">lớp (4 kết quả)</label>
    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4">
    <label for="tab-4" class="tab-label-4">khác (69 kết quả)</label>
    <div class="clear-shadow"></div>
    <div class="content">
        <div class="child content-1">
            <h2>Người dùng</h2>
            <style>
                .relative {
                    position: relative;
                }
                .float-left {
                    float: left;
                }
            </style>
            <div style="width: 100%">
                <a class="avatar-view relative float-left" href="user">
                    <img class="" width="50" height="50" src="http://localhost:7070/bluebee.com/themes/classic/assets/img/default-avatar.png" style="opacity: 1;">
                </a>
                <a style="float: left" href="/glang">
                    <span data-paths="profile.firstName profile.lastName" id="el-105">Granger Lang</span>
                </a>
            </div>
            <div style="width: 100%">
                <a class="avatar-view" href="user">
                    <img class="" width="50" height="50" src="http://localhost:7070/bluebee.com/themes/classic/assets/img/default-avatar.png" style="opacity: 1;">
                </a>
            </div>
        </div>
        <div class="child content-2">
            <h2>Giáo viên</h2>
            
        </div>
        <div class="child content-3">
            <h2>Lớp</h2>
            
        </div>
        <div class="child content-4">
            <h2>Khác</h2>
            
        </div>
    </div>
</div>