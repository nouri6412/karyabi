<div class="section-head d-flex head-counter clearfix">
    <div class="mr-auto">
        <h2 class="m-b5">دسته های ثبت شده</h2>
        <?php
        $args = array(
            'post_type' => 'job-cat'
        );
        $the_query2 = new WP_Query($args);
        $count = $the_query2->post_count;
        ?>
        <h6 class="fw3"><?php echo $count . ' ' . 'دسته بندی'; ?></h6>
    </div>
    <div class="head-counter-bx">
        <?php
        $args = array(
            'post_type' => 'job'
        );
        $the_query3 = new WP_Query($args);
        $count = $the_query3->post_count;
        ?>
        <h2 class="m-b5 counter"><?php echo $count; ?></h2>
        <h6 class="fw3">شغل ارسال شده</h6>
    </div>
    <div class="head-counter-bx">
        <?php
        $args = array(
            'meta_key' => 'user_type',
            'meta_value' => 'company'
        );
        $the_query4 = new WP_User_Query($args);
        $count = $the_query4->get_total();
        ?>
        <h2 class="m-b5 counter"><?php echo $count; ?></h2>
        <h6 class="fw3">کارفرما</h6>
    </div>
    <div class="head-counter-bx">
        <?php
        $args = array(
            'meta_key' => 'user_type',
            'meta_value' => 'user'
        );
        $the_query4 = new WP_User_Query($args);
        $count = $the_query4->get_total();
        ?>
        <h2 class="m-b5 counter"><?php echo $count; ?></h2>
        <h6 class="fw3">کارجو</h6>
    </div>
</div>