<div class="container-fluid px-xl-5">
  <!-- <section class="pt-5 all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>

            <button class="btn btn-primary  text-white"><a href="<?= base_url('Faciltator-create-mark-sheet') ?>" class="text-white">Create Marksheet</a></button>

          </li>
          <li>

            <button class="btn btn-primary  text-white"><a href="<?= base_url('facilitator-create-attendance') ?>" class="text-white">Create Attendance</a></button>

          </li>
          <li>

            <button class="btn btn-primary  text-white"><a href="<?= base_url('facilitator-create-discipline') ?>" class="text-white">Create New Issue</a></button>

          </li>
        </ul>

      </div>




    </div>
  </section> -->


  <section class="py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('Faciltator-mark-sheet-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Total Mark Sheet</h6><span class="text-gray"><?= $marksheet ?></span>
            </div>
          </div>          
        </div>
		</a>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('facilitator-attendance-list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Attendance Registers</h6><span class="text-gray"><?= $attendance ?></span>
            </div>
<<<<<<< HEAD
          </div>
<<<<<<< Updated upstream
          <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
=======
         </a>          
>>>>>>> Stashed changes
=======
          </div>          
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
	  <a href="<?= base_url('training_list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">           
            <div class="text">
              <h6 class="mb-0">Total Issue List</h6><span class="text-gray"><?= $discipline ?></span>
            </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
          </div>
          <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
=======
=======
          </div>          
        </div>
      </div>
<div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Uploaded Completed Assessments</h6><span class="text-gray"><?= $assessment_report_learner ?></span>
            </div>
>>>>>>> 397e9a3297bf8ace564ebaacc8d8c76dc20d8d1c
          </div>          
        </div>
		</a>
      </div>
    <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
       <a href="<?= base_url('training_list') ?>">
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">            
            <div class="text">
              <h6 class="mb-0">Uploaded Completed Assessments</h6><span class="text-gray"><?= $assessment_report_learner ?></span>
            </div>
          </div>          
>>>>>>> Stashed changes
        </div>
		</a>
      </div>
    </div>
  </section>
</div>
