<!-- Modal Box -->
<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body row m-a0 clearfix">
                <div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
                    <div class="form-info text-white align-self-center">
                        <h3 class="m-b15">وارد حساب کاربری خود شوید</h3>
                        <p class="m-b15">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        <ul class="list-inline m-a0">
                            <li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-a0">
                    <div class="lead-form browse-job text-left">
                        <form>
                            <h3 class="m-t0">ورود</h3>
                            <div class="form-group">
                                <input value="" class="form-control" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input value="" class="form-control" placeholder="شماره موبایل">
                            </div>
                            <div class="clearfix">
                                <button type="button" class="btn-primary site-button btn-block">ثبت </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Box End -->
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

</body>

</html>