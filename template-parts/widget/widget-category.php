<?php
$cats = get_field('widget-category', 'option');
?>
<div class="widget widget_archive">
    <h6 class="widget-title">دسته ها</h6>
    <ul>
        <?php
        if (is_array($cats)) {
            foreach ($cats as $cat) {
        ?>
                <li><a href="<?php echo get_category_link( $cat["cat"]["link"]->term_id ) ?>"><?php echo $cat["cat"]["text"] ?></a></li>
        <?php
            }
        }
        ?>
    </ul>
</div>