<?php if (is_page('profile') && isset($_GET["action"]) && ($_GET["action"] == "create-job" || $_GET["action"] == "resume")) : ?>
    <!--profile page custom JS-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/tagcomplete/tagcomplete.css">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/tagcomplete/tagcomplete.js"></script>
    <script>
        $(function() {
            <?php
            $args = array(
                'post_type' => 'job-tag'
            );
            $the_query = new WP_Query($args);
            ?>
            var data = [
                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                ?> '<?php echo get_the_title(); ?>',
                <?php
                endwhile;
                wp_reset_query();
                ?>
            ];

            $(".tags_input").tagComplete({

                keylimit: 1,
                hide: false,
                autocomplete: {
                    data: data
                }
            });

            $(".tag_input").on('keypress', function(e) {
                if (e.which == 13) {
                    custom_theme_mbm_base_ajax({
                        'action': 'mbm_job_tag_insert',
                        'title': $(this).val()
                    }, function(result) {

                    });
                }
            });

        });
    </script>
<?php endif; ?>