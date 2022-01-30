<?php
$unit = get_field("unit6");
?>
<div class="section quote">
    <div class="container">
        <div class="row quote-header">
            <div class="col">
                <div class="font-size-4xl sm-font-size-2xl font-weight-bold text-center text-white"> <?php echo $unit["title"]; ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center overflow-hidden">
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
<svg version="1.1" id="Layer_1" class="svg-defs" x="0px" y="0px" viewBox="0 0 1920 399.4" enable-background="new 0 0 1920 399.4" xml:space="preserve">
    <defs>
        <clipPath id="clipping">
            <path d="M0,23.9C655.7,128,1291.8-69.2,1920,27.6v371.8H0V23.9z"></path>
        </clipPath>
    </defs>
</svg>