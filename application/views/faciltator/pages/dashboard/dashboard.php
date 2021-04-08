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
        <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
          <div class="flex-grow-1 d-flex align-items-center">
            <div class="dot mr-3 bg-violet"></div>
            <div class="text">
              <h6 class="mb-0">Total Marksheet</h6><span class="text-gray"><?= $marksheet ?></span>
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
              <h6 class="mb-0">Total Attendance Sheet</h6><span class="text-gray"><?= $attendance ?></span>
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
              <h6 class="mb-0">Total Issue List</h6><span class="text-gray"><?= $discipline ?></span>
            </div>
          </div>
          <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
        </div>
      </div>


    </div>
  </section>
</div>