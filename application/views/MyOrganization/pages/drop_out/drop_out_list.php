<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Drop Out List</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Learner Name</th>

                                    <th>Learner Surname</th>

                                    <th>Learner Id Number</th>

                                    <th>Learner Class Name</th>

                                    <th>Learnership Sub Type</th>

                                    <th>Replacement Learner Details</th>

                                    <th>Date of Resignation</th>

                                    <th>Reason For Dropping Out</th>

                                    <th>Attachments</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $row->learner_name; ?></td>

                                            <td><?= $row->learner_surname; ?></td>

                                            <td><?= $row->learner_id_number; ?></td>

                                            <td><?= $row->learner_classname; ?></td>

                                            <td><?=  $row->learnership_sub_type; ?></td>

                                            <td><?=  $row->replacement_learner_details; ?></td>

                                            <td><?= $row->date_of_resignation; ?></td>

                                            <td><?= $row->reason_for_dropping_out; ?></td>

                                            <td>

                                            <?php if(!empty($row->attachments)){ ?> 

                                              <a href="<?= BASEURL .'uploads/learner/drop_out/'.$row->attachments ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                                            <?php } 

                                            ?>

                                            </td>
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
            var learner_surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var learner_id_number = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var learner_classname = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var learnership_sub_type = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
  			var replacement_learner_details = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            var date_of_resignation = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
            var reason_for_dropping_out = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
  			  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-6>Learner Name:  " + learner_name + 
              "</div><div class=col-sm-6>Learner SurName: " + learner_surname + 
              "</div><div class=col-sm-6>Learner ID Number: " + learner_id_number + 
              "</div><div class=col-sm-6>Learner Classname : " + learner_classname + 
              "</div><div class=col-sm-6>Learnership Sub Type : " + learnership_sub_type + 
              "</div><div class=col-sm-6>Replacement Learner Details : " + replacement_learner_details +
              "</div><div class=col-sm-6>Date Of Resignation: " + date_of_resignation +
              "</div><div class=col-sm-6>Reason For Dropping Out  : " + reason_for_dropping_out + 
            
               
               "</div></div>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>