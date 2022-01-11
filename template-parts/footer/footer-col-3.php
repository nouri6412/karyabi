<?php
$data = get_field("footer-col-3", 'option');
?>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
    <div class="widget border-0">
        <h5 class="m-b30 text-white"><?php echo $data["title"]; ?></h5>
        <ul class="list-2 w10 list-line">
            <?php
            foreach ($data["links"] as $item) {
            ?>
                <li><a title="<?php echo $item["link"]["text"]; ?>" href="<?php if (isset($item["link"]["link"]->ID))  echo  get_permalink($item["link"]["link"]->ID);  ?>"><?php echo $item["link"]["text"]; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>