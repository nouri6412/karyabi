<?php
$data = get_field("footer-col-2", 'option');
?>
<div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
    <div class="widget border-0">
        <h5 class="m-b30 text-white"><?php echo $data["title"]; ?></h5>
        <ul class="list-2 list-line">
            <?php
            foreach ($data["links"] as $item) {
               // var_dump($item["link"]["link"]);
            ?>
                <li><a title="<?php echo $item["link"]["text"]; ?>" href="<?php if (isset($item["link"]["link"]->ID))  echo  get_permalink( $item["link"]["link"]->ID);  ?>"><?php echo $item["link"]["text"]; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>