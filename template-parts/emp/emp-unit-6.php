<?php
$unit = get_field("unit6");
?>
<div class="section quote pt-5" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/1-08.png);min-height: 100vh;min-height: 680px;background-size: 100% 110%;background-repeat: no-repeat;">
    <div class="container">
        <div class="row quote-header pt-5">
            <div class="col">
                <div class="font-size-4xl sm-font-size-2xl font-weight-bold text-center text-white">
                    <h2><?php echo $unit["title"]; ?>
                    </h2>
                </div>
            </div>
        </div>
        
        <div class="row align-items-center overflow-hidden mt-5">
            <div class="col-1 d-none d-sm-block">
                <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/quote-right.svg">
                </div>
            </div>
            <div class="multiple-items m-0 col-12 pb-5 col-lg-10 overflow-hidden">
                <?php
                foreach ($unit["items"] as $item) {
                ?>
                    <div>
                        <div class="transition">
                            <img class="" id="quoteSlideImg1" src="<?php echo $item["image"]; ?>" alt="2">
                            <div class="slide active" id="quoteSlide3">
                                <div class="text"><?php echo $item["desc"]; ?>
                                </div>
                                <span class="name"><?php echo $item["name"]; ?></span>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-1 d-none d-sm-block">
                <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/quote-left.svg"></div>
            </div>
        </div>
    </div>
</div>