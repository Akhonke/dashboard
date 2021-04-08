<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">My Stipends History</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Serial No.</th>

                                    <th>Learner Name</th>

                                    <th>Project Manager</th>

                                    <th>Date</th>

                                    <th>Month</th>

                                    <th>Year</th>

                                    <th>Amount</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                   if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { 

                                            $learner = $this->common->accessrecord('learner',[],['id'=>$row->learner_id],'row');

                                            if(!empty($learner)){

                                                $learner_name = $learner->first_name;

                                            }else{

                                                $learner_name = "";

                                            }

                                            $trainer = $this->common->accessrecord('project_manager',[],['id'=>$row->project_manager],'row');

                                            if(!empty($trainer)){

                                                $trainer_name = $trainer->fullname;

                                            }else{

                                                $trainer_name = "";

                                            }

                                            $date = $row->date;

                                            $date_create=date_create($date);



                                    ?>

                                <tr>

                                    <td><?= $i; ?></td>

                                    <td><?= $learner_name; ?></td>

                                    <td><?= $trainer_name; ?></td>

                                    <td><?=  $date; ?></td>

                                    <td><?php echo date_format($date_create,"F");?></td>

                                    <td><?php echo date_format($date_create,"Y");?></td>

                                    <td><?= $row->amount; ?></td>

                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"  onclick="view()"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      
                                    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <!-- <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div> -->
                                                  <div class="modal-body " id="personDetails">
                                              
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                  
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      </td>

                                </tr>

                                <?php $i++; } } ?>

                            </tbody>

                        </table>

                    </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<script>
    function view(){

        debugger;
  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var learner_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var trainer_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var date = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var date_create = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var date_create = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            var amount = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
          
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Learner Name : </span><span class='pull-right'> " + learner_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Project Manager :</span><span class='pull-right'>  " + trainer_name + 
              "</div><div class=col-sm-12> <span class='pull-left'>Date :</span><span class='pull-right'>  " + date + 
              "</div><div class=col-sm-12><span class='pull-left'>Month :</span><span class='pull-right'>  " + date_create + 
              "</div><div class=col-sm-12><span class='pull-left'>Year :</span><span class='pull-right'>  " + date_create + 
              "</div><div class=col-sm-12><span class='pull-left'>Amount : </span><span class='pull-right'> " + amount + 
           
             
            
              
                 
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
