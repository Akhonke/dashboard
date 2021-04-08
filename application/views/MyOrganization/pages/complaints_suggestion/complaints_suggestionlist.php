<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <?php 

            if($_GET['type']=="complaints"){

                $name = "Complaints";

            }

            if($_GET['type']=="suggestions"){

                 $name = "Suggestions";

            }

            ?>

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Learner name</th>

                                    <th><?= $name ?></th>

                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                 $record = $this->common->accessrecord('complaints_and_suggestions', [], ['type'=>$name], 'result');

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                           $learner_id = $row->learner_id;

                                           $learner =$this->common->accessrecord('learner', [], ['id'=>$learner_id], 'row');

                                           $learner_name = $learner->first_name. ' '.$learner->second_name;

                                        ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $learner_name; ?></td>

                                            <td><?= $row->type; ?></td>

                                            <td><?= $row->description; ?></td>
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$row->id?>" data-name="<?=$row->id?>" onclick="view(<?= $row->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            
                                            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Learner Details</h5>
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

                                <?php $i++; } } 

                                ?>

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
            var type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var description = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
           
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-6>Learner Name   : " + learner_name + 
              "</div><div class=col-sm-6>Type: " + type + 
              "</div><div class=col-sm-6> Description: " + description + 
                "</div></div>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>