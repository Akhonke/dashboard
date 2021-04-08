  <div class="container-fluid px-xl-5">

  <section class="py-5">

    <div class="row">

      <!-- Form Elements -->

      <div class="col-lg-12 mb-1">

        <div class="card">

          <div class="card-header">

            <h3 class="h6 text-uppercase mb-0">Resign From Training</h3>

          </div>

          <div class="card-body">

            <form class="form-horizontal" method="post" id="CreateDropOutForm" enctype="multipart/form-data">

              <div class="form-group row">

                <div class="col-md-6">

                

                  <label class="form-control-label">Date Of Resignation<span style="color:red;font-weight:bold;"> *</span></label>

                  <input type="date" class="form-control" name="date_of_resignation">

                  <label id="date_of_resignation-error" class="error" for="date_of_resignation"></label>

                </div>

                
                <!-- <div class="col-md-6">

                  <label class="form-control-label">Reason From Training<span style="color:red;font-weight:bold;"> *</span></label>

                  <input type="text" placeholder="Enter Your Reason For Dropping Out" class="form-control" name="reason_for_dropping_out">

                  <label id="reason_for_dropping_out-error" class="error" for="reason_for_dropping_out"></label>


                </div>
                <div class="col-md-6">

                  <label class="form-control-label">Reason For Registration<span style="color:red;font-weight:bold;"> *</span></label>

                  <input type="text" placeholder="Enter Your Reason For Dropping Out" class="form-control" name="reason_for_dropping_out">

                  <label id="reason_for_dropping_out-error" class="error" for="reason_for_dropping_out"></label>


                </div> -->

                <div class="col-md-6">

                  <label class="form-control-label">Reason For Dropping Out<span style="color:red;font-weight:bold;"> *</span></label>

                  <input type="text" placeholder="Enter Your Reason For Dropping Out" class="form-control" name="reason_for_dropping_out">

                  <label id="reason_for_dropping_out-error" class="error" for="reason_for_dropping_out"></label>


                </div>



                <div class="col-md-6">
                  <label class="form-control-label">Attach Resignation Letter<span style="color:red;font-weight:bold;"> *</span></label>

                  <input type="file" class="form-control" name="attachments">

                </div>

                <div class="col-md-6">

                      <!-- <label class="form-control-label">Replacement Learner Details</label> 

                  <input type="text" placeholder="Enter Your Replacement Learner Details" class="form-control" name="replacement_learner_details">

                   <label id="replacement_learner_details-error" class="error" for="replacement_learner_details"></label> -->


                </div>

              </div>

              <div class="line"></div>

              <div class="form-group row">

                <div class="col-md-12">

                  <div class="text-center">

                    <button type="submit" class="btn btn-primary">Add</button>

                  </div>

                </div>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>