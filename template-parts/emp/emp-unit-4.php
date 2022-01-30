<?php
$unit = get_field("unit4");
?>
<div class="section sub-share-job d-flex align-items-center justify-content-center sm-pv-5 ">
    <div class="container">
        <div class="row">
            <?php
            foreach ($unit as $item) {
            ?>
                <div class="col-12 col-sm text-center d-flex d-sm-block justify-content-between align-items-center">
                    <div class="font-size-5xl sm-font-size-base font-weight-bold text-white order-1">
                        <?php echo $item["title"]; ?>
                    </div>
                    <span class="font-weight-bold sm-font-size-base text-white order-0">
                        <?php echo $item["desc"]; ?>
                        <span class="d-sm-none d-inline-block">:</span>
                    </span>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>