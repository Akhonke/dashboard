<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-dark"></div>
                        <div class="text">
                            <h6 class="mb-0">Total Learners</h6><span class="text-gray"><?php
                              $trainer =$this->common->accessrecord('trainer', [], ['id'=>$_SESSION['admin']['trainer_id']], 'row');
                              $trainer_nm =$trainer->company_name;
                              if($data =$this->common->accessrecord('learner', [], ['trining_provider'=>$trainer_nm], 'result')){
                                    echo count($data);
                              }else{
                                    echo "0";
                              }
                             ?></span>
                        </div>
                    </div>
                    <div class="icon text-white bg-dark"><i class="o-user-1"></i></div>
                </div>
            </div>
             <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-info"></div>
                        <div class="text">
                            <h6 class="mb-0">Total Facilitator</h6><span class="text-gray"><?php 
                            if($data =$this->common->accessrecord('facilitator', [], ['trainer_id'=>$_SESSION['admin']['trainer_id']], 'result')){
                                    echo count($data);
                              }else{
                                    echo "0";
                              }
                            ?></span>
                        </div>
                    </div>
                    <div class="icon text-white bg-info"><i class="o-laptop-screen-1"></i></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-warning"></div>
                        <div class="text">
                            <h6 class="mb-0">Total Assessor</h6><span class="text-gray"><?php
                             if($data = $this->common->accessrecord('assessor', [], ['trainer_id'=>$_SESSION['admin']['trainer_id']], 'result')){
                                    echo count($data);
                              }else{
                                    echo "0";
                              }
                             ?></span>
                        </div>
                    </div>
                    <div class="icon text-white bg-warning"><i class="o-imac-screen-1"></i></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-gray-500"></div>
                        <div class="text">
                            <h6 class="mb-0">Total Moderator</h6><span class="text-gray"><?php
                            if($data = $this->common->accessrecord('moderator', [], ['trainer_id'=>$_SESSION['admin']['trainer_id']], 'result')){
                                    echo count($data);
                              }else{
                                    echo "0";
                              } 
                            ?></span>
                        </div>
                    </div>
                    <div class="icon text-white bg-gray-500"><i class="o-id-card-1"></i></div>
                </div>
            </div>
         </div>
    </section>
    <section class="py-5">
      <div class="row">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-gray-500"></div>
                  <div class="text">
                      <h6 class="mb-0">Total Class</h6><span class="text-gray"><?php
                       if($data = $this->common->accessrecord('class_name', [], ['trainer_id'=>$_SESSION['admin']['trainer_id']], 'result')){
                            echo count($data);
                        }else{
                          echo "0";
                        } 
                      ?></span>
                  </div>
              </div>
              <div class="icon text-white bg-gray-500"><i class="o-id-card-1"></i></div>
          </div>
        </div>
      </div>
    </section>
</div>