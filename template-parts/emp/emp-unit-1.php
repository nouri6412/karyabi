<?php
$unit = get_field("unit1");
?>
<div class="landing">
    <div class="fold">
        <div class="container">
            <div class="text-center epm-header-panel">
                <div>
                    <h1 class="font-size-6xl sm-font-size-2xl"><?php echo $unit["title"]; ?></h1>
                </div>
                <div class="mt-5">
                    <p class="font-size-2xl sm-font-size-lg"><?php echo $unit["desc"]; ?></p>
                    <div class="mt-5">
                        <?php if (!is_user_logged_in()) { ?>
                            <a href="<?php echo home_url('?login=1') ?>" class="btn-cta">برو به پنل کاربری<i class="fa fa-long-arrow-left mr-3"></i></a>

                        <?php } else {
                        ?>
                            <a href="<?php echo home_url('profile') ?>" class="btn-cta">برو به پنل کاربری<i class="fa fa-long-arrow-left mr-3"></i></a>

                        <?php
                        } ?>
                    </div>
                    <p class="mt-5"><?php echo $unit["desc_short"]; ?></p>
                </div>

            </div>
        </div>
        <svg version="1.1" id="Layer_1" class="mask-white" x="0px" y="0px" viewBox="0 0 1920 99.4" enable-background="new 0 0 1920 99.4" xml:space="preserve">
            <path d="M0,99.4h1920V27.6C1291.8-69.2,655.7,128,0,23.9V99.4z"></path>
        </svg>
    </div>


    <!--  -->
</div>
<div class="my-container">
    <div class="row">
        <div class="col">
            <div class="fold-image">
                <div style="background-image: url(<?php echo $unit["image"]; ?>);" class="fold-images-container">
                </div>
            </div>
        </div>
    </div>
</div>