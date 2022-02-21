<?php
$unit = get_field("unit2");
$unit1 = get_field("unit1");
?>
<div class="container">
    <div>
        <div style="background-image: url(<?php echo $unit1["image"]; ?>);" class="banner-image">

        </div>
    </div>
    <div class="col-10 m-auto">
        <div class="row row-cols-1 row-cols-lg-3 g-3">
            <?php
            foreach ($unit as $item) {
            ?>
                <div class="col-12 col-lg-4 text-center">
                    <img src="<?php echo $item["image"]; ?>" alt="<?php echo $item["title"]; ?>" width="150px">
                    <div class="text-center">
                        <p class="mb-2 text-dark"><strong><?php echo $item["title"]; ?></strong></p>
                        <p><?php echo $item["desc"]; ?>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>