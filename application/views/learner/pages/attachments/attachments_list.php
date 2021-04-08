<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">My Attachments</h3>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- <div class -->
                               <h5 style="text-align: center;font-weight: bold"> Id Copy</h5>
                                <?php if (!empty($learner->id_copy)) { ?>
                                    <img style="box-shadow:0px 4px 12px #00000063;" src="<?= BASEURL . 'uploads/learner/id_copy/' . $learner->id_copy ?>" width="100%">
                                <?php } else { ?>
                                    <img src="<?= BASEURL . 'uploads/no_image.jpg' ?>" width="100%">
                                <?php } ?>
                            </div>
                            <div class="col-sm-4">
                                <!-- <div class -->
                               <h5 style="text-align: center;font-weight: bold"> Ceritificate Copy</h5>
                                <?php if (!empty($learner->certificate_copy)) { ?>
                                    <img style="box-shadow: 0px 4px 12px #00000063;" src="<?= BASEURL . 'uploads/learner/certificate_copy/' . $learner->certificate_copy ?>" width="100%">
                                <?php } else { ?>
                                    <img src="<?= BASEURL . 'uploads/no_image.jpg' ?>" width="100%">
                                <?php } ?>
                            </div>
                            <div class="col-sm-4">
                                <!-- <div class -->
                                <h5 style="text-align: center; font-weight: bold">Contract Copy</h5>
                                <?php if (!empty($learner->contract_copy)) { ?>
                                    <img style="box-shadow: 0px 4px 12px #00000063;" src="<?= BASEURL . 'uploads/learner/contract_copy/' . $learner->contract_copy ?>" width="100%">
                                <?php } else { ?>
                                    <img src="<?= BASEURL . 'uploads/no_image.jpg' ?>" width="100%">
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>