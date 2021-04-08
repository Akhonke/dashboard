<?php if (isset($_SESSION['projectmanager']['logintype'])) {
    $res = $this->common->accessrecord('user_permission', ['is_view,is_add,is_edit,is_delete'], ['user_type' => 'Project_Manager', 'user_id' => $_SESSION['projectmanager']['user_id'], 'module_name' => 'Upload_Bank_Statement'], 'row_array');
} else {
    $res = array();
    if (empty($res)) {
        $logintype = 'main-user';
        $res['is_edit'] = 1;
        $res['is_delete'] = 1;
    }
}
?>

<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Bank Statement List</h3>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped table-responsive" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Project Manager Name</th>

                                    <th>Project Name</th>

                                    <th>Quarter</th>

                                    <th>Bank Start Date</th>

                                    <th>Bank End Date</th>

                                    <th>Bank Statement</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                if (!empty($record)) {

                                    foreach ($record as $key => $value) {

                                        $project = $this->common->accessrecord('project', [], ['id' => $value->project_name], 'row');
                                        if (!empty($project)) {
                                            $project_name = $project->project_name;
                                        } else {
                                            $project_name = '';
                                        }

                                        $i++;

                                ?>

                                        <tr id="del-<?= $value->id ?>" class="filters">

                                            <td><?= $i ?></td>

                                            <td><?= $value->project_manager_name ?></td>

                                            <td><?= $project_name ?></td>

                                            <td><?= $value->quarter ?></td>

                                            <td><?= date('d-M-Y', strtotime($value->bank_start_date)) ?></td>

                                            <td><?= date('d-M-Y', strtotime($value->bank_end_date)) ?></td>

                                            <td><?php if (!empty($value->upload_bank_statement)) { ?>

                                                    <a href="<?= BASEURL . 'uploads/bank/upload_bank_statement/' . $value->upload_bank_statement ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                                                <?php } ?>

                                            </td>

                                            <td>
                                                
                                            
                                            </div>

                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value->id?>" data-name="<?=$value->id?>" onclick="view(<?= $value->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      
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








                                                <?php if ($res['is_edit'] == 1) { ?>
                                                    <a href="projectmanager-create-bank?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                <?php }
                                                if ($res['is_delete'] == 1) { ?>
                                                    <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('finance_bank_details&behalf','id',<?= $value->id ?>)"><i class="fa fa-trash"></i></a>
                                                <?php } ?>
                                            </td>

                                        </tr>

                                <?php

                                    }
                                }

                                ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<script>
    function view(){

  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
              var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
              var ss  =    $(this).attr("photoss");
                var base_url = "your base url";
            var project_manager_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var project_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var quarter = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var bank_start_date = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var bank_end_date = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
  		
           
         
         
  			
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Project Manager Name :</span><span class='pull-right'> " + project_manager_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Project Name:</span><span class='pull-right'> " + project_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Quarter :</span><span class='pull-right'> " + quarter + 
              "</div><div class=col-sm-12><span class='pull-left'>Bank Start Date : </span><span class='pull-right'>" + bank_start_date + 
              "</div><div class=col-sm-12><span class='pull-left'>Bank End Date  :</span><span class='pull-right'> " + bank_end_date + 
             
             
               
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>