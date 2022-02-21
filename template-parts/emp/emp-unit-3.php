<?php
$unit = get_field("unit3");
?>
<div class="mt-5 pt-5 pb-5">
    <div class="container">
        <div class="ps-5">
            <h2><?php echo $unit["title"]; ?></h2>
        </div>
        <div>
            <div>
                <div class="row mt-4">
                    <div class="col">
                        <?php
                        foreach ($unit["items"] as $item) {
                        ?>
                            <div class="d-flex align-items-center">
                                <img src="<?php echo $item["image"]; ?>" alt="" width="60px">
                                <div>
                                    <h6><?php echo $item["title"]; ?>
                                    </h6>
                                    <p class="mb-0"><?php echo $item["desc"]; ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col d-none d-lg-block">
                        <img src="<?php echo $unit["image"]; ?>" alt="<?php echo $unit["title"]; ?>" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>