<?php
$unit = get_field("unit7");
?>
<div class="section section-cta">

    <div class="bg" style="background-image: url(<?php echo $unit["image"]; ?>)"></div>
    <div class="container">
        <div class="row">
            <div class="d-none d-sm-block col-sm-2"></div>
            <div class="col">
                <div class="card card-cta p-7">
                    <div class="font-size-4xl sm-font-size-2xl font-weight-bold text-center color-grey-dark-3">
                        <?php echo $unit["title"]; ?>
                    </div>
                    <div class="font-size-2xl sm-font-size-lg mt-2 text-center color-grey-dark-2 mb-5"><?php echo $unit["desc1"]; ?>
                    </div>
                    <a href="" class="btn btn-lg btn-cta position-relative">

                        برو به پنل درج آگهی

                        <i class="fa fa-long-arrow-left mr-3"></i>
                    </a>
                </div>
            </div>
            <div class="d-none d-sm-block col-sm-2">

            </div>
        </div>
    </div>
</div>