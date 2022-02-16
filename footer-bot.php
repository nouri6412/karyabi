<?php
get_template_part('template-parts/footer/footer', 'popup-login');
get_template_part('template-parts/footer/footer', 'cols');
?>
<!-- JAVASCRIPT FILES ========================================= -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/combining.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/share.js"></script>
<script>
    <?php
    if (isset($_GET["login"])) {
    ?>
        $('#car-details').modal('show');
    <?php
    }
    ?>
</script>
<?php
get_template_part('template-parts/custom-js/custom-js', 'create-job');
?>

<script>
    $time_bot = 0;
    setInterval(() => {
        if ($time_bot == 0) {
            $time_bot = 1;
            jQuery.ajax({
                url: 'http://localhost:84/reserve/bot',
                success: function() {
                    $time_bot = 0;
                },
                beforeSend: function() {
                    jQuery('.loading-ajax').show();
                },
                complete: function() {
                    jQuery('.loading-ajax').hide();
                }
            });
        } else {
            $time_bot++;
        }

        if ($time_bot > 5) {
            $time_bot = 0;
        }

    }, 2000);
</script>
</body>

</html>