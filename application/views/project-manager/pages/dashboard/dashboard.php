<div class="container-fluid px-xl-5">
  <!-- <section class="pt-5 all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('create_new_project') ?>" class="text-white">Create Project</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('Projectmanager-create_new_task') ?>" class="text-white">Create Task</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('projectmanager-create_new_stipend') ?>" class="text-white">Create Stipend</a></button>
          </li>
        </ul>
      </div>
    </div>
  </section> -->
  <!-- <section class=" all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('projectmanager-create-training') ?>" class="text-white">Create Training Provider</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('Projectmanager-create-employer') ?>" class="text-white">Create Employer</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('projectmanager-create-income-item') ?>" class="text-white">Create Income</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('projectmanager-create-expense-item') ?>" class="text-white">Create Expense</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('projectmanager-create-bank') ?>" class="text-white">Create Bank Statement</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_urL('Create-Projectmanager-User') ?>" class="text-white">Create User</a></button>
          </li>
        </ul>
      </div>
    </div>
  </section> -->
  <section class="py-5">
    <div class="row">
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('create_projects_list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="text">
              <h6 class="mb-0">Total Projects</h6><span class="text-gray"><?= $project ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
     
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('projectmanagertraining-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Total Training Providers</h6><span class="text-gray"><?= $trainer ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
       <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('projectmanager-facilitator-list') ?>">
>>>>>>> Stashed changes
=======
       <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Facilitators</h6><span class="text-gray"><?= $facilitator ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('projectmanager-assessor-list') ?>">
>>>>>>> Stashed changes
=======
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Total Assessors</h6><span class="text-gray"><?= $assessor ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">     
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('projectmanager-moderator-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Internal Moderators</h6><span class="text-gray"><?= $internal_moderator ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('projectmanager-external-moderator-list') ?>">
>>>>>>> Stashed changes
=======
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total External Moderators</h6><span class="text-gray"><?= $external_moderator ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	   <a href="<?= base_url('projectmanager-mark-sheet-list') ?>">
>>>>>>> Stashed changes
=======
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Uploaded Mark sheets</h6><span class="text-gray"><?= $marksheet ?></span>
            </div>
          </div>          
        </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
		</a>
      </div> 
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('projectmanager-class-list') ?>">
>>>>>>> Stashed changes
=======
      </div> 
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Classes</h6><span class="text-gray"><?= $class ?></span>
            </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
          </div>
          <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
        </div>
      </div>

=======
          </div>          
        </div>		
      </div> 
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
    </div>
	 
	  
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
<<<<<<< HEAD
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
=======
          </div>          
        </div>
		</a>
      </div> 
    </div>	  
  </section>
  <section class="pb-5 pt-0">
    <div class="row">     
 <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
     <a href="<?= base_url('projectmanager-drop-out-list') ?>">
>>>>>>> Stashed changes
=======
     
     
     
 <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Dropouts</h6><span class="text-gray"><?= $drop_out ?></span>
            </div>
          </div>          
        </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-green"></div>
            <div class="text">
              <h6 class="mb-0">Total Reports</h6><span class="text-gray"><?= $report ?></span>
            </div>
          </div>
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-blue"></div>
            <div class="text">
              <h6 class="mb-0">Total Bank Statements</h6><span class="text-gray"><?= $bank_statement ?></span>
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
              <h6 class="mb-0">Total Users</h6><span class="text-gray"><?= $user ?></span>
            </div>
          </div>
          <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
        </div>
      </div>

=======
      </div>  	  
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
<<<<<<< HEAD
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row align-items-center mb-3 flex-row">
              <div class="col-lg-5">
                <h2 class="mb-0 d-flex align-items-center"><span>86%</span><span class="dot bg-violet d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Monthly Usage</span>
                <hr><small class="text-muted">Lorem ipsum dolor sit</small>
              </div>
              <div class="col-lg-7">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
                </div>
                <canvas id="pieChartHome3" width="192" height="96" class="chartjs-render-monitor" style="display: block; width: 192px; height: 96px;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center flex-row">
              <div class="col-lg-5">
                <h2 class="mb-0 d-flex align-items-center"><span>$126,41</span><span class="dot bg-green d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">All Income</span>
                <hr><small class="text-muted">Lorem ipsum dolor sit</small>
              </div>
              <div class="col-lg-7">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
                </div>
                <canvas id="pieChartHome4" width="192" height="96" class="chartjs-render-monitor" style="display: block; width: 192px; height: 96px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header">
            <h2 class="h6 text-uppercase mb-0">Total Overdue</h2>
          </div>
          <div class="card-body">
            <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <div class="chart-holder">
              <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                  <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                </div>
                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                  <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                </div>
              </div>
              <canvas id="lineChart2" style="max-height: 14rem !important; display: block; width: 529px; height: 264px;" class="w-100 chartjs-render-monitor" width="529" height="264"></canvas>
            </div>
          </div>
        </div>
      </div>
=======
		</a>
      </div>  	  
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row"> 
>>>>>>> Stashed changes
=======
 
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
    </div>
  </section>

 
  <!-- <section class="py-5">
    <div class="row text-dark">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card rounded credit-card bg-hover-gradient-violet">
          <div class="content d-flex flex-column justify-content-between p-4">
            <h1 class="mb-5"><i class="fab fa-cc-visa"></i></h1>
            <div class="d-flex justify-content-between align-items-end pt-3">
              <div class="text-uppercase">
                <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
              </div>
              <h4 class="mb-0">$417.78</h4>
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
                <div class="font-weight-bold d-block">Card Number</div><small class="text-gray">1245 1478 1362 6985</small>
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
  
 
