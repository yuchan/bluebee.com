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
        font-weight: bold;
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

    .clear-shadow {
        clear: both;
    }

    .content {
        background: #fff;
        position: relative;
        width: auto;
        margin: -175px 0 0 250px;
        height: 400px;
        z-index: 5;
        overflow: hidden;
        box-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        border-radius: 3px;
    }

    .content div {
        position: absolute;
        top: 0;
        padding: 10px 40px;
        z-index: 1;
        opacity: 0;
        -webkit-transition: all linear 0.5s;
        -moz-transition: all linear 0.5s;
        -o-transition: all linear 0.5s;
        -ms-transition: all linear 0.5s;
        transition: all linear 0.5s;
    }

    .content div{
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
    <input type="text" id="styleforsearchbar" value="" placeholder="Bạn muốn tìm gì ?"/>
</div>

<section class="tabs">
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
                    <div class="content-1">
                        <h2>About us</h2>
                        <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man.</p>
                        <h3>How we work</h3>
                        <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
                    </div>
                    <div class="content-2">
                        <h2>Services</h2>
                        <p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb.</p>
                        <h3>Excellence</h3>
                        <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
                    </div>
                    <div class="content-3">
                        <h2>Portfolio</h2>
                        <p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother's keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.</p>
                        <h3>Examples</h3>
                        <p>Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass. </p>
                    </div>
                    <div class="content-4">
                        <h2>Contact</h2>
                        <p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic.</p>
                        <h3>Get in touch</h3>
                        <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows. Some pilots get picked and become television programs. Some don't, become nothing. She starred in one of the ones that became nothing. </p>
                    </div>
                </div>
            </section>