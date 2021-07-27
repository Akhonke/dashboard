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
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="text">
              <h6 class="mb-0">Total Projects</h6><span class="text-gray"><?= $project ?></span>
            </div>
          </div>          
        </div>
      </div>
     
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Total Training Providers</h6><span class="text-gray"><?= $trainer ?></span>
            </div>
          </div>          
        </div>
      </div>
       <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Facilitators</h6><span class="text-gray"><?= $facilitator ?></span>
            </div>
          </div>          
        </div>
      </div>
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Total Assessors</h6><span class="text-gray"><?= $assessor ?></span>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">     
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Internal Moderators</h6><span class="text-gray"><?= $internal_moderator ?></span>
            </div>
          </div>          
        </div>
      </div>
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total External Moderators</h6><span class="text-gray"><?= $external_moderator ?></span>
            </div>
          </div>          
        </div>
      </div>
	   <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Uploaded Mark sheets</h6><span class="text-gray"><?= $marksheet ?></span>
            </div>
          </div>          
        </div>
      </div> 
	  <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Classes</h6><span class="text-gray"><?= $class ?></span>
            </div>
          </div>          
        </div>		
      </div> 
    </div>
	 
	  
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
     
     
     
 <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Dropouts</h6><span class="text-gray"><?= $drop_out ?></span>
            </div>
          </div>          
        </div>
      </div>  	  
    </div>
  </section>
  <section class="pb-5 pt-0">
    <div class="row">
 
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
  
 
