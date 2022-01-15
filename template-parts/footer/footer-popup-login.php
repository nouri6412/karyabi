<?php
$data = get_field("footer-popup-login", 'option');
$data_sosial = get_field("footer-col-1", 'option');
?>
<!-- Modal Box -->
<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body row m-a0 clearfix">
                <div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(<?php echo $data["image"]; ?>);  background-position:center; background-size:cover;">
                    <div class="form-info text-white align-self-center">
                        <h3 class="m-b15"><?php echo $data["title"]; ?></h3>
                        <p class="m-b15"><?php echo $data["text"]; ?></p>
                        <ul class="list-inline m-a0">
                            <?php
                            if (isset($data_sosial["sosial"]) && is_array($data_sosial["sosial"])) {
                                foreach ($data_sosial["sosial"] as $item) {
                            ?>
                                    <li><a href="<?php echo $item["link"]; ?>" class="m-r10 text-white"><i class="fa fa-<?php echo $item["icon"]; ?>"></i></a></li>
                            <?php
                                }
                            }
                            ?>
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