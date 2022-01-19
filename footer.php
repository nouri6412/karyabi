<?php
get_template_part('template-parts/footer/footer', 'popup-login');
?>
<!-- Footer -->
<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <?php
                get_template_part('template-parts/footer/footer', 'col-1');
                get_template_part('template-parts/footer/footer', 'col-2');
                get_template_part('template-parts/footer/footer', 'col-3');
                ?>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <?php
    get_template_part('template-parts/footer/footer', 'copy');
    ?>
</footer>
<!-- Footer END -->
<!-- scroll top button -->
<button class="scroltop fa fa-arrow-up"></button>
</div>
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
</body>

</html>