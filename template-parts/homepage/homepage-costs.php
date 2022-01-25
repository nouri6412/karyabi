    <!-- Our Latest Blog -->
    <?php
    $costs = get_field("costs");
    ?>
    <div class="section-full content-inner-2 overlay-white-middle" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/lines.png); background-position:bottom; background-repeat:no-repeat; background-size: 100%;">
        <div class="container">
            <div class="section-head text-black text-center">
                <h2 class="m-b0"><?php echo $costs["text"]; ?></h2>
                <p><?php echo $costs["desc"]; ?></p>
            </div>
            <!-- Pricing table-1 Columns 3 with gap -->
            <div class="section-content box-sort-in button-example m-t80">
                <div class="pricingtable-row">
                    <div class="row max-w1000 m-auto">
                        <?php
                        foreach ($costs["plans"] as $plan) {
                            $active = "";

                            if ($plan["def"] == "خیر") {
                        ?>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                                    <div class="pricingtable-wrapper style2 bg-white">
                                        <div class="pricingtable-inner">
                                            <div class="pricingtable-price">
                                                <h4 class="font-weight-300 m-t10 m-b0"><?php echo $plan["title"]; ?></h4>
                                                <div class="pricingtable-bx"> <?php echo $plan["price"]; ?> </div>
                                            </div>
                                            <p><?php echo $plan["text"]; ?> </p>
                                            <div class="m-t20">
                                                <a href="<?php echo $plan["link"]->url; ?>" class="site-button radius-xl"><span class="p-lr30"><?php echo $plan["btn-text"]; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {

                            ?>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                                    <div class="pricingtable-wrapper style2 bg-primary text-white active">
                                        <div class="pricingtable-inner">
                                            <div class="pricingtable-price">
                                                <h4 class="font-weight-300 m-t10 m-b0"><?php echo $plan["title"]; ?></h4>
                                                <div class="pricingtable-bx"> <?php echo $plan["price"]; ?> </div>
                                            </div>
                                            <p><?php echo $plan["text"]; ?> </p>
                                            <div class="m-t20">
                                            <a href="<?php echo get_the_permalink($plan["link"]->ID); ?>" class="site-button radius-xl"><span class="p-lr30"><?php echo $plan["btn-text"]; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Latest Blog -->