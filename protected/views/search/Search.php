<style>
    #styleforsearchbar{
        background-color: white;
        min-height: 60px;
        font-size: 30px;
        border: none;
        outline: none;
        border-top: 2px solid white;
        border-radius: 0px;
    }
    #styleforsearchbar:focus{
        border: none;
        box-shadow: none;

        box-shadow: 0px 6px 0px 0px rgba(53, 53, 53, 0.41);
    }
</style>

<div class="l-submain-h" style="margin-top: 2%">
    <input type="text" id="styleforsearchbar" value="" placeholder="Bạn muốn tìm gì ?"/>
</div>
<div class="l-submain-h g-html i-cf" style="margin-top: 5%">
    <div class="g-cols" style="margin-left: 0px;">
        <?php $this->renderPartial("partial/result-bar-left") ?>
        <?php
        $this->renderPartial("partial/result-bar-right")?>