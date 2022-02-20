<?php
$unit = get_field("unit3");
?>
<div class="section share-job pb-5">
    <div class="container pb-4">
        <div class="row share-job-header">
        <div class=" col-1 d-none d-sm-inline-block"></div>
            <div class="col">
                <div class="font-size-4xl sm-font-size-xl font-weight-bold  color-grey-dark-3">
                    <?php echo $unit["title"]; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?php
                foreach ($unit["items"] as $item) {
                ?>
                    <div class="item">
                        <div class="icon"><img src="<?php echo $item["image"]; ?>"></div>
                        <div class="text">
                            <div class="font-size-lg font-weight-bold color-grey-dark-3 mb-3"><?php echo $item["title"]; ?>
                            </div>
                            <div class="font-size-lg color-grey-dark-2">
                            <?php echo $item["desc"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="col-md-7 d-none d-lg-block">
                <div class="img"><img src="<?php echo $unit["image"]; ?>" alt="<?php echo $unit["title"]; ?>">
                </div>
            </div>
        </div>
    </div>
</div>