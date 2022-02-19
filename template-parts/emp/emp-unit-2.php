<?php
$unit = get_field("unit2");
?>
<div style="    margin-top: 110px;" class="section intro-feature pt-5">
    <div class="container pt-4">
        <div class="row">
            <?php
            foreach ($unit as $item) {
            ?>
                <div class="col-12 col-sm item">
                    <div class="icon">
                        <img src="<?php echo $item["image"]; ?>">
                    </div>
                    <div class="text">
                        <div class="font-size-lg font-weight-bold color-grey-dark-3 mb-3">
                            <?php echo $item["title"]; ?>
                        </div>
                        <div class="font-size-lg color-grey-dark-2"><?php echo $item["desc"]; ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>