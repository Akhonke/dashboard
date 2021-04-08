<div class="col-xl-3 col-md-6 col-sm-6">
  <a href="<?= base_url('superAdmin-paid_and_free_user') ?>">
    <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
      <div class="ms-card-body media">
        <div class="media-body">
          <h6>Total Users</h6>
          <p class="ms-card-change"><?php echo $organisation; ?> </p>
        </div>
      </div>
      <i class="fas fa-user-tie ms-icon-mr"></i>
    </div>
  </a>
</div>
<div class="col-xl-3 col-md-6 col-sm-6">
  <a href="<?= base_url('superAdmin-invoiceList') ?>">
    <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
      <div class="ms-card-body media">
        <div class="media-body">
          <h6>Total Invoice</h6>
          <p class="ms-card-change"> <?php echo $invoicettl ?></p>
        </div>
      </div>
      <i class="fas fa-file-invoice"></i>
    </div>
  </a>
</div>
<div class="col-xl-3 col-md-6 col-sm-6">
  <a href="<?= base_url('superAdmin-ticketList') ?>">
    <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
      <div class="ms-card-body media">
        <div class="media-body">
          <h6 class="bold">Total Enquiry</h6>
          <p class="ms-card-change"><?php echo $contactus; ?></p>
        </div>
      </div>
      <i class="fa fa-user ms-icon-mr"></i>
    </div>
  </a>
</div>
<div class="col-xl-3 col-md-6 col-sm-6">
  <a href="<?= base_url('superAdmin-plan') ?>">
    <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
      <div class="ms-card-body media">
        <div class="media-body">
          <h6 class="bold">total Plan</h6>
          <p class="ms-card-change"> <?php echo $plan; ?></p>
        </div>
      </div>
      <i class="material-icons  ms-icon-mr">assignment</i>
    </div>
  </a>
</div>
<!-- <div class="col-xl-3 col-md-6 col-sm-6">
  <a href="<?= base_url('superAdmin-plan') ?>">
    <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
      <div class="ms-card-body media">
        <div class="media-body">
          <h6 class="bold">Total Orders History</h6>
          <p class="ms-card-change"> <?php echo $plan; ?></p>
        </div>
      </div>
      <i class="fas fa-shopping-cart"></i>
    </div>
  </a>
</div> -->
<div class="col-xl-12 col-lg-12">
  <div class="ms-panel ms-device-sessions ms-quick-mic">
    <div class="ms-panel-header">
      <h6>Project base Analytics</h6>
    </div>
    <div class="ms-panel-body">
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-6 col-6 ms-device">
          <i class="fas fa-thumbs-up"></i>
          <h4>Active</h4>
          <p class="ms-text-primary"><?= $activeprojectpercent ?>%</p>
          <span class="ms-text-primary"><?= $active_project ?></span>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-6 col-6 ms-device">
          <i class="fas fa-spinner"></i>
          <h4>Inactive</h4>
          <p class="ms-text-current"><?= $inactiveprojectpercent ?>%</p>
          <span class="ms-text-current"><?= $inactive_project ?></span>
        </div>
      </div>
      <div class="progress">
        <!-- <div class="progress-bar bg-primary" role="progressbar" style="width: 45.07%" aria-valuenow="45.07" aria-valuemin="0" aria-valuemax="100"></div> -->
        <div class="progress-bar bg-current" role="progressbar" style="width: <?= $activeprojectpercent ?>%" aria-valuenow="<?= $activeprojectpercent ?>" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $inactiveprojectpercent ?>%" aria-valuenow="<?= $inactiveprojectpercent ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-6 col-md-12">
  <div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Client Total</h6>
    </div>
    <div class="ms-panel-body">
      <canvas id="line-chart"></canvas>
    </div>
  </div>
</div>
<div class="col-xl-6 col-md-12">
  <div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Client In</h6>
    </div>
    <div class="ms-panel-body">
      <canvas id="bar-chart-grouped"></canvas>
    </div>
  </div>
</div>
<div class="col-xl-6 col-lg-12" style="display: none;">
  <div class="ms-panel ms-panel-fh ms-facebook-engagements">

    <div class="ms-panel-body p-0">

      <ul class="ms-list clearfix">
        <li class="ms-list-item">
          <div class="d-flex justify-content-between align-items-end">

            <div class="ms-graph-canvas">
              <canvas id="engaged-users"></canvas>
            </div>
          </div>
        </li>
        <li class="ms-list-item">
          <div class="d-flex justify-content-between align-items-end">

            <div class="ms-graph-canvas">
              <canvas id="page-impressions"></canvas>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php if (!empty($this->session->flashdata('success'))) { ?>
  <script>
    swal.fire("Success", "<?= $this->session->flashdata('success') ?>", "success");
  </script>
<?php } ?>