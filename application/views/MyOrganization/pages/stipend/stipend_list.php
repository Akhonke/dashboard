<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Stipend List</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Learner Name</th>

                                    <th>Project Manager</th>

                                    <th>Date</th>

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

                                            if((!empty($learner->surname)) &&(!empty($learner->first_name))){

                                            $learner_name = $learner->first_name;

                                            }else{

                                                $learner_name = "";  

                                            }

                                            $project_manager= $this->common->accessrecord('project_manager',[],['id'=>$row->project_manager],'row');

                                            if(!empty($project_manager)){

                                              $project_manager_name =$project_manager->project_manager;

                                            }else{

                                             $project_manager_name = "";

                                            }

                                            ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $row->learner_name; ?></td>

                                            <td><?= $project_manager_name; ?></td>

                                            <td><?=  $row->date; ?></td>

                                            <td><?= $row->amount; ?></td>
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$row->id?>" data-name="<?=$row->id?>" onclick="view(<?= $row->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            
                                                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body " id="personDetails">
                                                        
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            
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
              var ss  =    $(this).attr("photoss");
                var base_url = "your base url";
            var learner_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var trainer_nm = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var date = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var amount = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var learnership_sub_type = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
  			var replacement_learner_details = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            var date_of_resignation = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
            var reason_for_dropping_out = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
  			  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Learner Name:  </span><span class='pull-right'>" + learner_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Training Provider: </span><span class='pull-right'>" + trainer_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Date:</span><span class='pull-right'> " + date + 
              "</div><div class=col-sm-12><span class='pull-left'>Amount : </span><span class='pull-right'>" + amount + 
            
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>