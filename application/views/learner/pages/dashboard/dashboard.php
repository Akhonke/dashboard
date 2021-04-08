<div class="container-fluid px-xl-5">
  <!-- <section class="pt-5 all-button">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('learner-complaints-suggestion') ?>" class="text-white">Create Complaint</a></button>
          </li>
          <li>
            <button class="btn btn-primary  text-white"><a href="<?= base_url('learner-complaints-suggestion') ?>" class="text-white">Create Suggestion</a></button>
          </li>
        </ul>
      </div>
    </div>
  </section> -->

  <section class="py-3">
    <div class="row">


      <div class="col-lg-12 mb-4 mb-lg-0 pl-lg-0 d-flex">
        <div class="col-sm-4">
          <a href="<?= base_url('learner-complaint-list') ?>">
            <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Total Complaints</h6><span class="text-gray"><?= $complaint_list ?></span>
                </div>
              </div>
              <div class="icon bg-violet text-white"><i class="fas fa-clipboard-check"></i></div>
            </div>
          </a>
        </div>
        <div class="col-sm-4">
          <a href="<?= base_url('learner-suggestion-list') ?>">
            <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-green"></div>
                <div class="text">
                  <h6 class="mb-0">Total Suggestions</h6><span class="text-gray"><?= $suggestion_list ?></span>
                </div>
              </div>
              <div class="icon bg-green text-white"><i class="fas fa-dollar-sign"></i></div>
            </div>
          </a>
        </div>
        <!-- <div class="col-sm-4">
          <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
              <div class="dot mr-3 bg-blue"></div>
              <div class="text">
                <h6 class="mb-0">New Message</h6><span class="text-gray">25</span>
              </div>
            </div>
            <div class="icon bg-blue text-white"><i class="fas fa-user-friends"></i></div>
          </div>
        </div> -->
      </div>
    </div>


  </section>
  <p class="ddd"></p>

</div>