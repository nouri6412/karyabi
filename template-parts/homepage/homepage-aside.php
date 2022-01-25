<?php
$box1=get_field("aside")["box1"];
$box2=get_field("aside")["box2"];
?>
<div class="sticky-top">
    <div class="candidates-are-sys m-b30">
        <div class="candidates-bx">
            <div class="testimonial-pic radius"><img src="<?php echo $box1["icon"]; ?>" alt="" width="100" height="100"></div>
            <div class="testimonial-text">
                <p><?php echo $box1["text"]; ?></p>
            </div>
            <div class="testimonial-detail"> <strong class="testimonial-name"><?php echo $box1["name"]; ?></strong> <span class="testimonial-position"><?php echo $box1["city"]; ?></span> </div>
        </div>
    </div>
    <div style="background-image: url(<?php echo $box2["image"]; ?>);" class="quote-bx">
        <div class="quote-info">
            <h4><?php echo $box2["text1"]; ?></h4>
            <p><?php echo $box2["text2"]; ?></p>
            <a href="<?php echo home_url("register") ?>" class="site-button">ایجاد حساب کاربری</a>
        </div>
    </div>
</div>