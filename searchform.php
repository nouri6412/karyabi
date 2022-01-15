<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input name="s" class="form-control" placeholder="کلمه کلیدی خود را وارد کنید" type="text" value="<?php echo get_search_query(); ?>">
        <span class="input-group-btn">
            <button class="fa fa-search text-primary"></button>
        </span>
    </div>
</form>