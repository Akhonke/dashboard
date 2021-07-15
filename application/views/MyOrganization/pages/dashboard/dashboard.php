<div class="container-fluid px-xl-5">
  <!-- <section class="pt-5 all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>

            <button class="btn btn-primary  text-white"><a href="<?= BASEURL ?>create_project" class="text-white">Create Project Manager</a></button>

          </li>
          <li>

            <button class="btn btn-primary  text-white"><a href="<?= BASEURL ?>myorganization-upcoming" class="text-white">Create Financial Year</a></button>

          </li>

        </ul>

      </div>




    </div>
  </section> -->
  <section class="py-5">
    <div class="row">
      <div class="col-lg-12 mb-4 mb-lg-0">
        <div class="card">
          <div class="card-header">
            <h2 class="h6 text-uppercase mb-0">My Plan</h2>
          </div>
          <div class="card-body">
            <p class="font-weight-bold text-uppercase"><?= $organization->packageName   ?>
              <?php if ($organization->packageId != 3) { ?>
                <button class="btn btn-primary  text-white">Upgrade Now</button>
              <?php } ?>
            </p>
            <div class="row pt-3">
              <div class="col-sm-4">
                <h6 style="font-weight: normal !important;font-size: 22px;font-family: poppins !important;"><b style="color:#20bcd5!important;">Purchase Date :</b><span> <?= $organization->packageCreatedDate ?> </span></h6>
              </div>
              <div class="col-sm-4">
                <h6 style="font-weight: normal !important;font-size: 22px;font-family: poppins !important;"><b style="color:#20bcd5!important;">Expiry Date :</b> <span id="expdate" value="<?= $organization->packageExpiryDate ?>"> <?= $organization->packageExpiryDate ?></span></h6>
              </div>
              <div class="col-sm-4">
                <div class="container">
                  <h6 style="font-weight: normal !important;font-size: 22px;font-family: poppins !important;"><b style="color:#20bcd5!important;">Your Plan Expire after:</b></h6>

                  <ul class="plan-time">
                    <li>Days</br><span id="days" style="color:#20bcd5!important;"></span></li>
                    <li>Hours</br><span style="color: #20bcd5!important;" id="hours"></span></li>
                    <li>Minutes</br><span style="color: #20bcd5!important;" id="minutes"></span></li>
                    <li>Seconds</br><span style="color: #20bcd5!important;" id="seconds"></span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-3">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3">
          <div class="card-body">
            <h5> PROJECTS <a href="<?= BASEURL ?>myorganization-create_projects_list"> <button class="btn btn-primary  text-white" style="float:right;">VIEW ALL</button></a></h5>
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
                <canvas id="chDonut1"></canvas>
              </div>
              <div class="col-lg-12 d-flex  text-center">
                <div class="col-sm-6">
                  <h2 class="mb-0  align-items-center"><span><?= $activeproject ?></span><span class="dot bg-green d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:12px;">Active</span></h2>
                </div>
                <div class="col-sm-6">
                  <h2 class="mb-0 align-items-center"><span><?= $inactiveproject ?></span><span class="dot bg-green d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:12px;">Inactive</span></h2>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 mb-lg-0">


        <div class="card">
          <div class="card-body">
            <h5>PROJECT MANAGER<a href="<?= base_url('project_list') ?>"> <button class="btn btn-primary  text-white" style="float:right;">VIEW ALL</button></a></h5>
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
                <!-- <canvas id="pieChartHome2" width="201" height="100" class="chartjs-render-monitor" style="display: block; width: 201px; height: 100px;"></canvas> -->
                <canvas id="chDonut2" width="201" height="100" style="display: block; width: 201px; height: 100px;"></canvas>
              </div>
              <div class="col-lg-12 d-flex  text-center">
                <div class="col-sm-6">
                  <h2 class="mb-0 align-items-center"><span><?= $activeprojectmanager ?></span><span class="dot bg-violet d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:12px;">Active </span></h2>
                </div>
                <div class="col-sm-6">
                  <h2 class="mb-0 align-items-center"><span><?= $inactiveprojectmanager ?></span><span class="dot bg-violet d-inline-block ml-3"></span><br><span class="text-muted text-uppercase small" style="font-size:12px;">Inactive </span></h2>
                </div>


              </div>

            </div>
          </div>
        </div>

      </div>
      <!-- <div class="col-lg-12 mb-4 mb-lg-0 pl-lg-0 d-flex">
        <div class="col-sm-4">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-violet"></div>
              <div class="text">
                <h6 class="mb-0">New Projects</h6><span class="text-gray">127</span>
              </div>
            </div>
            <div class="icon bg-violet text-white"><i class="fas fa-clipboard-check"></i></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-green"></div>
              <div class="text">
                <h6 class="mb-0">New Task</h6><span class="text-gray">214</span>
              </div>
            </div>
            <div class="icon bg-green text-white"><i class="fas fa-dollar-sign"></i></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-blue"></div>
              <div class="text">
                <h6 class="mb-0">New Message</h6><span class="text-gray">25</span>
              </div>
            </div>
            <div class="icon bg-blue text-white"><i class="fas fa-user-friends"></i></div>
          </div>
        </div>
      </div> -->
    </div>


  </section>

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
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-blue"></div>
            <div class="text">
              <h6 class="mb-0">Total Training Provider</h6><span class="text-gray"><?= $trainer ?></span>
            </div>
          </div>
          <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-red"></div>
            <div class="text">
              <h6 class="mb-0">
                Total Facilitators</h6><span class="text-gray"><?= $facilitator ?></span>
            </div>
          </div>
          <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
        </div>
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
              <h6 class="mb-0">Total Assessors
              </h6><span class="text-gray"><?= $assessor ?></span>
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
              <h6 class="mb-0">Total Internal Moderators</h6><span class="text-gray"><?= $internal_moderator ?></span>
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
              <h6 class="mb-0">Total External Moderators</h6><span class="text-gray"><?= $external_moderator ?></span>
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
              <h6 class="mb-0">Total Learners</h6><span class="text-gray"><?= $learner ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
      
     
    </div>
  </section>




</div>

<style>
  .timer li {
    display: inline-block;
    font-size: 1.5em;
    list-style-type: none;
    padding: 1em;
    text-transform: uppercase;
  }

  .timer li #days {
    display: block;
    font-size: 4.5rem;
  }

  .timer li #hours {
    display: block;
    font-size: 4rem;
  }

  .timer li #minutes {
    display: block;
    font-size: 3.5rem;
  }

  .timer li #seconds {
    display: block;
    font-size: 3rem;
  }

  .h2 {
    color: #fff;
  }

  .card {
    box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);
    padding: .5rem 0;
  }

  .card:hover {
    box-shadow: none;
  }
</style>
<!-- <div class="mt--7 mb-5">
  <div class="row">

    <div class="col-xl-6 offset-xl-3 mb-5 mb-xl-0">

      <div class="card shadow">

        <div class="card-header border-0">

          <div class="row align-items-center">

            <div class="col">

              <h3 class="mb-0">Timer</h3>

            </div>

            <ul class="timer">
              <li class="text-info text-center"><span id="days"></span>days</li>
              <li class="text-primary text-center"><span id="hours"></span>Hours</li>
              <li class="text-warning text-center"><span id="minutes"></span>Minutes</li>
              <li class="text-danger text-center"><span id="seconds"></span>Seconds</li>
            </ul>
          </div>

        </div>
      </div>
    </div>

  </div>


</div> -->

<?php
$orgDate = "$organization->packageExpiryDate";
$newDate = date("m-d-Y", strtotime($orgDate));
?>
<!-- 
<script>

var datess = "<?= $newDate ?>";
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  let countDown = new Date(datess).getTime(),
    x = setInterval(function() {

      let now = new Date().getTime(),
        distance = countDown - now;

      document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

        if (distance < 0) {
			 clearInterval(x);
			 "Your Plan Expired!";
			}
	  
    }, second)
</script> -->
<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/admin/cloudfront/js/charts-home.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  var number = "<?= $newDate ?>";
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  let countDown = new Date(number).getTime(),
    x = setInterval(function() {

      let now = new Date().getTime(),
        distance = countDown - now;

      document.getElementById("days").innerText = Math.floor(distance / (day)),
        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

      // do something later when date is reached
      // if (distance < 0) {
      //  clearInterval(x);
      //  "IT"S MY BIRTHDAY!;
      // }

    }, second)
</script>
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
      //   {
      //     data: [639, 465, 493, 478, 589, 632, 674],
      //     backgroundColor: colors[3],
      //     borderColor: colors[1],
      //     borderWidth: 4,
      //     pointBackgroundColor: colors[1]
      //   }
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

  /* large pie/donut chart */
  // var chPie = document.getElementById('chPie');
  // if (chPie) {
  //   new Chart(chPie, {
  //     type: 'pie',
  //     data: {
  //       labels: ['Desktop', 'Phone', 'Tablet', 'Unknown'],
  //       datasets: [{
  //         backgroundColor: [colors[1], colors[0], colors[2], colors[5]],
  //         borderWidth: 0,
  //         data: [50, 40, 15, 5]
  //       }]
  //     },
  //     plugins: [{
  //       beforeDraw: function(chart) {
  //         var width = chart.chart.width,
  //           height = chart.chart.height,
  //           ctx = chart.chart.ctx;
  //         ctx.restore();
  //         var fontSize = (height / 70).toFixed(2);
  //         ctx.font = fontSize + 'em sans-serif';
  //         ctx.textBaseline = 'middle';
  //         var text = chart.config.data.datasets[0].data[0] + '%',
  //           textX = Math.round((width - ctx.measureText(text).width) / 2),
  //           textY = height / 2;
  //         ctx.fillText(text, textX, textY);
  //         ctx.save();
  //       }
  //     }],
  //     options: {
  //       layout: {
  //         padding: 0
  //       },
  //       legend: {
  //         display: false
  //       },
  //       cutoutPercentage: 80
  //     }
  //   });
  // }

  /* bar chart */
  // var chBar = document.getElementById('chBar');
  // if (chBar) {
  //   new Chart(chBar, {
  //     type: 'bar',
  //     data: {
  //       labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
  //       datasets: [{
  //           data: [589, 445, 483, 503, 689, 692, 634],
  //           backgroundColor: colors[0]
  //         },
  //         {
  //           data: [639, 465, 493, 478, 589, 632, 674],
  //           backgroundColor: colors[1]
  //         }
  //       ]
  //     },
  //     options: {
  //       legend: {
  //         display: false
  //       },
  //       scales: {
  //         xAxes: [{
  //           barPercentage: 0.4,
  //           categoryPercentage: 0.5
  //         }]
  //       }
  //     }
  //   });
  // }

  /* 3 donut charts */
  var donutOptions = {
    cutoutPercentage: 85,
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
    labels: ['Active', 'Inactive'],
    datasets: [{
      backgroundColor: colors.slice(0, 7),
      borderWidth: 0,
      data: [<?= $activeproject ?>, <?= $inactiveproject ?>]
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
      data: [<?= $activeprojectmanager ?>, <?= $inactiveprojectmanager ?>]
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

  /* 3 line charts */
  // var lineOptions = {
  //   legend: {
  //     display: false
  //   },
  //   tooltips: {
  //     interest: false,
  //     bodyFontSize: 11,
  //     titleFontSize: 11
  //   },
  //   scales: {
  //     xAxes: [{
  //       ticks: {
  //         display: false
  //       },
  //       gridLines: {
  //         display: false,
  //         drawBorder: false
  //       }
  //     }],
  //     yAxes: [{
  //       display: false
  //     }]
  //   },
  //   layout: {
  //     padding: {
  //       left: 6,
  //       right: 6,
  //       top: 4,
  //       bottom: 6
  //     }
  //   }
  // };

  // var chLine1 = document.getElementById('chLine1');
  // if (chLine1) {
  //   new Chart(chLine1, {
  //     type: 'line',
  //     data: {
  //       labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
  //       datasets: [{
  //         backgroundColor: '#ffffff',
  //         borderColor: '#ffffff',
  //         data: [10, 11, 4, 11, 4],
  //         fill: false
  //       }]
  //     },
  //     options: lineOptions
  //   });
  // }
  // var chLine2 = document.getElementById('chLine2');
  // if (chLine2) {
  //   new Chart(chLine2, {
  //     type: 'line',
  //     data: {
  //       labels: ['A', 'B', 'C', 'D', 'E'],
  //       datasets: [{
  //         backgroundColor: '#ffffff',
  //         borderColor: '#ffffff',
  //         data: [4, 5, 7, 13, 12],
  //         fill: false
  //       }]
  //     },
  //     options: lineOptions
  //   });
  // }

  // var chLine3 = document.getElementById('chLine3');
  // if (chLine3) {
  //   new Chart(chLine3, {
  //     type: 'line',
  //     data: {
  //       labels: ['Pos', 'Neg', 'Nue', 'Other', 'Unknown'],
  //       datasets: [{
  //         backgroundColor: '#ffffff',
  //         borderColor: '#ffffff',
  //         data: [13, 15, 10, 9, 14],
  //         fill: false
  //       }]
  //     },
  //     options: lineOptions
  //   });
  // }
</script>