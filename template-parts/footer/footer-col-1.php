<?php
$data = get_field("footer-col-1", 'option');
?>
<div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
    <div class="widget">
        <img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo $data["icon"]; ?>" width="180" class="m-b15">
        <p class="text-capitalize m-b20"><?php echo $data["text"]; ?></p>
        <div class="subscribe-form m-b20">
            <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                <div class="dzSubscribeMsg"></div>
                <div class="input-group">
                    <input name="dzEmail" required="required" class="form-control" placeholder="آدرس ایمیل" type="email">
                    <span class="input-group-btn">
                        <button name="submit" value="Submit" type="submit" class="site-button radius-xl">عضویت</button>
                    </span>
                </div>
            </form>
        </div>
        <ul class="list-inline m-a0">
            <?php
            if (isset($data["sosial"]) && is_array($data["sosial"])) {
                foreach ($data["sosial"] as $item) {
            ?>
                    <li><a title="<?php echo $item["text"]; ?>" href="<?php echo $item["link"]; ?>" class="site-button white <?php echo $item["icon"]; ?> circle "><i class="fa fa-<?php echo $item["icon"]; ?>"></i></a></li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>