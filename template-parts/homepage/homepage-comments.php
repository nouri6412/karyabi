<div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" style="background-image: url(<?php echo get_field("comments_image") ?>);">
    <div class="container">
        <div class="section-head text-center text-white">
            <h2 class="m-b5">نظر کاربران</h2>
            <h5 class="fw4">چند کلمه از زبان کارجویان</h5>
        </div>
        <div class="blog-carousel-center owl-carousel owl-none">
            <?php
            $comments = get_field("comments");
            foreach ($comments as $item) {
                $comment=$item["comment"];
            ?>
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p><?php echo $comment["text"] ?> </p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="<?php echo $comment["icon"] ?>" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name"><?php echo $comment["name"] ?></strong>
                            <span class="testimonial-position"><?php echo $comment["job"] ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>