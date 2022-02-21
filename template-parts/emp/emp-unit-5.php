<?php
$unit = get_field("unit5");
?>
<div class="p-5">
    <div class="container">
        <div class="pt-5 pb-5">
            <div class="text-center">
                <h2><?php echo $unit["title"]; ?>
                </h2>
            </div>
            <div class="mt-4 text-center">
                <p><?php echo $unit["desc"]; ?>
                </p>
            </div>
            <div class="row mt-5 g-4">
                <?php
                foreach ($unit["items"] as $item) {
                ?>
                    <div class="col-12 col-lg-4">
                        <div class="d-flex">
                            <div>
                                <span><svg version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" fill="#c9d2dc" style="enable-background:new 0 0 512 512;width: 25px;height: 25px;margin-left: 10px;" xml:space="preserve">
                                        <g>
                                            <path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0
                                                              c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7
                                                              C514.5,101.703,514.499,85.494,504.502,75.496z"></path>
                                        </g>
                                    </svg></span>

                            </div>
                            <div>
                                <h6><?php echo $item["title"]; ?></h6>
                                <p><?php echo $item["desc"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>