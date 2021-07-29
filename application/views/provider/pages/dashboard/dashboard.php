<?php


?>

<div class="container-fluid px-xl-5">
  <!-- <section class="pt-5 all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-facilitator-user') ?>" class="text-white">Create Facilitator</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-learnership') ?>" class="text-white">Create Learnership Type</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-sub-learnership') ?>" class="text-white">Create Learnership Subtype</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('provider-create-class') ?>" class="text-white">Create Class</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-learner') ?>" class="text-white">Create Learner</a></button>
          </li>


          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-unit') ?>" class="text-white">Create Unit</a></button>
          </li>

          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-assessor-user') ?>" class="text-white">Create Assessor</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-moderator-user') ?>" class="text-white">Create Internal Moderator</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create-externalmoderator-user') ?>" class="text-white">Create External Moderator</a></button>
          </li>

          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('provider-learner-marks') ?>" class="text-white">Create Marksheet</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('provider-create-attendance') ?>" class="text-white">Create Attendance</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('Create-Quaterly-Report') ?>" class="text-white">Create Quaterly Report</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('Create-Provider-User') ?>" class="text-white">Create User</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create_learner_attendance') ?>" class="text-white">Create Learner Attendance</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create_banking_detail') ?>" class="text-white">Create Banking Details</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('create_learner_information') ?>" class="text-white">Create Learner Information</a></button>
          </li>
  </ul>
</div>
<div class="col-lg-12 py-3">
  <ul>


  </ul>
</div>
<div class="col-lg-12 py-3">
  <ul>

  </ul>
</div>
<div class="col-lg-12 py-3">
  <ul>

  </ul>
</div>
</div>
</section> -->

  <section class="py-3">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3">
          <div class="card-body">
            <h5>TOTAL LEARNERS <a href="<?= base_url('learner-list'); ?>"> <button class="btn btn-primary  text-white" style="float:right;">VIEW ALL</button></a></h5>
            <div class="row align-items-center flex-row">
              <div class="col-lg-12">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
                </div>
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
                </div>
                <canvas id="chDonut1" width="537" height="268" class="chartjs-render-monitor" style="display: block; width: 537px; height: 268px;"></canvas>
              </div>
              <div class="col-lg-12 d-flex  text-center">
                <div class="col-sm-6">
                  <h2 class="mb-0  align-items-center"><span>2</span><span class="dot bg-green d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:9px;">Active Learners</span></h2>
                </div>
                <div class="col-sm-6">
                  <h2 class="mb-0 align-items-center"><span>1</span><span class="dot bg-green d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:9px;">Dropouts</span></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<<<<<<< Updated upstream
      <div class="col-lg-6 mb-4 mb-lg-0">


        <div class="py-3">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-violet"></div>
              <div class="text">
                <h6 class="mb-0">Total Learnership </h6><span class="text-gray"><?= $learnership ?></span>
              </div>
            </div>
            <div class="icon bg-violet text-white"><i class="fas fa-clipboard-check"></i></div>
          </div>
        </div>
        <div class="py-3">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-green"></div>
              <div class="text">
                <h6 class="mb-0">Total Sub Learnership</h6><span class="text-gray"><?= $sublearnership ?></span>
              </div>
            </div>
            <div class="icon bg-green text-white"><i class="fas fa-dollar-sign"></i></div>
          </div>
        </div>
        <div class="py-3">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-blue"></div>
              <div class="text">
                <h6 class="mb-0">Total Units</h6><span class="text-gray">--</span>
              </div>
            </div>
            <div class="icon bg-blue text-white"><i class="fas fa-user-friends"></i></div>
          </div>
        </div>
=======
      <div class="col-lg-6 mb-4 mb-lg-0">        
>>>>>>> Stashed changes
      </div>
    </div>
  </section>
  <!-- <p class="ddd"></p> -->
  <!-- <section class="py-3">
    <div class="row text-dark">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card rounded credit-card bg-hover-gradient-violet">
          <div class="content d-flex flex-column justify-content-between p-4">
            <h1 class="mb-5 text-center">FREEMIUM</h1>
            <div class="d-flex justify-content-between align-items-end pt-3">
              <div class="text-uppercase">
                <div class="font-weight-bold d-block">
                  <h4 class="mb-0">Free</h4>
                </div>
              </div>
              <h4 class="mb-0"> <button class="btn btn-primary  text-white">Upgrade Now</button></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card rounded credit-card bg-hover-gradient-blue">
          <div class="content d-flex flex-column justify-content-between p-4">
            <h1 class="mb-5"><i class="fab fa-cc-mastercard"></i></h1>
            <div class="d-flex justify-content-between align-items-end pt-3">
              <div class="text-uppercase">
                <div class="font-weight-bold d-block">Free</div>
              </div>
              <h4 class="mb-0">$124.17</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card rounded credit-card bg-hover-gradient-green">
          <div class="content d-flex flex-column justify-content-between p-4">
            <h1 class="mb-5"><i class="fab fa-cc-discover"></i></h1>
            <div class="d-flex justify-content-between align-items-end pt-3">
              <div class="text-uppercase">
                <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
              </div>
              <h4 class="mb-0">$568.00</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <p class="ddd"></p>
  <section class="py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('learner-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-violet"></div>
            <div class="text">
              <h6 class="mb-0">Total Learners</h6><span class="text-gray"><?= $learner ?></span>
            </div>
          </div>
          <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('facilitator-user-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Facilitators</h6><span class="text-gray"><?= $facilitator ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('assessor-user-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-blue"></div>
            <div class="text">
              <h6 class="mb-0">Total Assessors</h6><span class="text-gray"><?= $assessor ?></span>
            </div>
          </div>
          <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('moderator-user-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-red"></div>
            <div class="text">
              <h6 class="mb-0">
                Total Internal Moderator</h6><span class="text-gray"><?= $internal_moderator ?></span>
            </div>
          </div>
          <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
        </div>
		</a>
      </div>
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('externalmoderator-user-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-violet"></div>
            <div class="text">
              <h6 class="mb-0">Total External Moderator
              </h6><span class="text-gray"><?= $external_moderator ?></span>
            </div>
          </div>
          <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('provider-class-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Classes</h6><span class="text-gray"><?= $class ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('provider-learnermark-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Marksheets</h6><span class="text-gray"><?= $marksheet ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
		</a>
      </div>
<<<<<<< Updated upstream
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	    <a href="<?= base_url('Quaterly-Report-list') ?>">
>>>>>>> Stashed changes
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Attendace Reports</h6><span class="text-gray"><?= $attendance ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
		</a>
      </div>
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-violet"></div>
            <div class="text">
              <h6 class="mb-0">Total Quaterly Reports
              </h6><span class="text-gray"><?= $quarterly_progress_report  ?></span>
            </div>
          </div>
          <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Users</h6><span class="text-gray"><?= $sub_user ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Attendace(absent) Reports</h6><span class="text-gray"><?= $attendance ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Banking Details</h6><span class="text-gray">remain</span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
      </div>




    </div>
  </section>




  <section class="py-5">
    <div class="row">
      <?php $i = 1;
      foreach ($learner_ as $learn) { ?>
        <?php
        $date_of_post = $learn->created_at;
        $date = $date_of_post; // 6 october 2011 2:28 pm
        $stamp = strtotime($date); // outputs 1307708880
        ?>


        <div class="col-lg-12">
          <a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
            <div class="row">
              <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left"><strong class="h5 mb-0"><?php echo date("d", $stamp); ?><sup class="smaller text-gray font-weight-normal"><?php echo date("M", $stamp); ?></sup></strong><img src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/img/avatar-1.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                <h6 class="mb-0"><?= $learn->first_name ?></h6>
              </div>
              <div class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                <div class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">Learner</div>
                <p class="mb-0 mt-3 mt-lg-0">Email : <span><?= $learn->email   ?> </span> , Contact Number : <span><?= $learn->mobile ?></span>, Address : <span><?= $learn->city ?>,<?= $learn->region ?>,<?= $learn->district ?></span></p>
              </div>
            </div>
          </a>
        </div>
        <?php
        if ($i >= 4) {
          break;
        }
        ?>
      <?php $i++;
      } ?>
    </div>
  </section>
</div>

<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/admin/cloudfront/js/charts-home.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  /* chart.js chart examples */

  // chart colors
  var colors = ['#7DB634', '#1E94FD', '#333333', '#c3e6cb', '#dc3545', '#6c757d', 'red'];

  /* large line chart */
  var chLine = document.getElementById('chLine');
  var chartData = {
    labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
    datasets: [{
        data: [589, 445, 483, 503, 689, 692, 634],
        backgroundColor: 'transparent',
        borderColor: colors[0],
        borderWidth: 4,
        pointBackgroundColor: colors[0]
      }

    ]
  };
  if (chLine) {
    new Chart(chLine, {
      type: 'line',
      data: chartData,
      options: {
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        },
        responsive: true
      }
    });
  }


  /* 3 donut charts */
  var donutOptions = {
    cutoutPercentage: 0,
    legend: {
      position: 'bottom',
      padding: 5,
      labels: {
        pointStyle: 'circle',
        usePointStyle: true
      }
    }
  };

  // donut 1
  var chDonutData1 = {
    labels: ['Learner', 'Dropouts'],
    datasets: [{
      backgroundColor: colors.slice(0, 7),
      borderWidth: 0,
      data: [3, 2]
    }]
  };

  var chDonut1 = document.getElementById('chDonut1');
  if (chDonut1) {
    new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
    });
  }

  // donut 2
  var chDonutData2 = {
    labels: ['Active', 'Inactive'],
    datasets: [{
      backgroundColor: colors.slice(0, 3),
      borderWidth: 0,
      data: [4, 13]
    }]
  };
  var chDonut2 = document.getElementById('chDonut2');
  if (chDonut2) {
    new Chart(chDonut2, {
      type: 'pie',
      data: chDonutData2,
      options: donutOptions
    });
  }

  // donut 3
  var chDonutData3 = {
    labels: ['Angular', 'React', 'Other'],
    datasets: [{
      backgroundColor: colors.slice(0, 3),
      borderWidth: 0,
      data: [21, 45, 55, 33]
    }]
  };
  var chDonut3 = document.getElementById('chDonut3');
  if (chDonut3) {
    new Chart(chDonut3, {
      type: 'pie',
      data: chDonutData3,
      options: donutOptions
    });
  }
</script>