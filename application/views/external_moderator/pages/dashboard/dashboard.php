<div class="container-fluid px-xl-5">



  <section class="py-3">
    <div class="row text-dark">
      <div class="col-lg-6 mb-6 mb-lg-0">
        <a href="<?= base_url('external-moderator-create-moderation') ?>">
          <div class="card rounded credit-card bg-hover-gradient-violet">
            <div class="content d-flex flex-column justify-content-between p-4">
              <h1 class="mb-5 text-center">Create Moderation Report</h1>
              <div class="d-flex justify-content-between align-items-end pt-3">
                <div class="text-uppercase">
                  <div class="font-weight-bold d-block">
                    <!-- <h4 class="mb-0">Free</h4> -->
                  </div>
                </div>
                <!-- <h4 class="mb-0"> <button class="btn btn-primary  text-white">Upgrade Now</button></h4> -->
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-6 mb-lg-0">
        <a href="<?= base_url('external-moderator-moderation-list') ?>">
          <div class="card rounded credit-card bg-hover-gradient-blue">
            <div class="content d-flex flex-column justify-content-between p-4">
              <h1 class="mb-5 text-center">Total Moderation Report</h1>
              <div class="d-flex justify-content-between align-items-end pt-3">
                <div class="text-uppercase">
                  <!-- <div class="font-weight-bold d-block">Free</div> -->
                </div>
                <h4 class="mb-0"><?= $external_moderation_report ?></h4>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

</div>