<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Task List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered nowrap" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>

                                        <th>Project Name</th>

                                        <th>Task Name</th>

                                        <th>Task Description</th>

                                        <th>Task Owner</th>

                                        <th>Planned Start Date</th>

                                        <th>Actual Start Date</th>

                                        <th>Planned End Date</th>

                                        <th>Actual End Date</th>

                                        <th>Task Status</th>

                                        <th>Task Status Colors</th>
                                        <th>Action</th>


                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (!empty($task)) {

                                        $i = 1;

                                        foreach ($task as $key => $row) {

                                            $project = $this->common->accessrecord('project', [], ['project_manager' => $_SESSION['projectmanager']['id'],'id'=>$row['project']], 'row');
                                            // echo $this->db->last_query();
                                            if (!empty($project) && !empty($project->project_name)) {
                                                $projectname = $project->project_name;
                                            } 
                                            else {
                                                $projectname = '';
                                            }
                                            // $projectname = $project->project_name;

                                    ?>

                                            <tr id="del-<?= $row['id'] ?>">

                                                <td class="1"><?= $i; ?></td>

                                                <td class="2"><?= $projectname ?></td>

                                                <td class="3"><?= $row['task_name']; ?></td>

                                                <td class="4"><?= $row['task_desc']; ?></td>

                                                <td class="5"><?= $row['task_owner']; ?></td>

                                                <td class=6><?= $row['planned_start_date']; ?></td>

                                                <td class="7"><?= $row['actual_start_date']; ?></td>

                                                <td class="8"><?= $row['planned_end_date']; ?></td>

                                                <td class="9"><?= $row['actual_end_date']; ?></td>

                                                <td class="10"><?= $row['task_status']; ?></td>

                                                <td class="11">
                                                    <div class="progress">
                                                        <div class="progress-bar  <?php if($row['task_status_colour'] == 'Red'){ echo 'progress-bar-danger';} if($row['task_status_colour'] == 'Amber'){ echo 'progress-bar-info';} if($row['task_status_colour'] == 'Green'){echo 'progress-bar-success';}?>"
                                                         role="progressbar" 
                                                         style="width: <?php if($row['task_status'] == 'Started'){ echo '10';} if($row['task_status'] == 'Inprogress'){ echo '65';} if($row['task_status'] == 'Completed'){echo '100';}?>%"
                                                          aria-valuenow="100"
                                                          data-color="<?php if($row['task_status_colour'] == 'Red'){ echo 'Red';} if($row['task_status_colour'] == 'Amber'){ echo 'Blue';} if($row['task_status_colour'] == 'Green'){echo 'Green';}?>"
                                                           div>
                                                    </div>
                                                </td>

                                                <td>
                                                <!-- <a href="#" req_id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#exampleModal" id= "view" onclick="view(<?= $row['id']; ?>)" class="btn btn-primary btn-sm view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$row['id']?>" data-name="<?=$row['id']?>" onclick="view(<?= $row['id']; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <!-- Modal -->
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
                                                    <a href="Projectmanager-create_new_task?id=<?= $row['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                    <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('task&behalf','id',<?= $row['id'] ?>)"><i class="fa fa-trash"></i></a>

                                                    <?php $tablenm_id = 'task' . '.' . $row['id'];

                                                    ?>



                                                </td>

                                            </tr>



                                    <?php $i++;
                                        }
                                    } ?>







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


  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var projectname = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var task_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var task_desc = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var task_owner = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            var actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            var planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
  			var actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
              var task_status = $(event.relatedTarget).closest("tr").find("td:eq(9)").text(); 
              var task_status_colour = $(event.relatedTarget).closest("tr").find("td:eq(10) .progress-bar").attr("data-color");
           
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>project Name: </span><span class='pull-right'>  " + projectname +
               "</div><div class=col-sm-12><span class='pull-left'>Task Name:</span><span class='pull-right'>  " + task_name + 
               "</div><div class=col-sm-12><span class='pull-left'>Task Desc:</span><span class='pull-right'>  " + task_desc +
                "</div><div class=col-sm-12><span class='pull-left'>Task Owner :</span><span class='pull-right'>  " + task_owner + 
              "</div><div class=col-sm-12><span class='pull-left'>Planned start date:</span><span class='pull-right'>  " + planned_start_date +
              "</div><div class=col-sm-12><span class='pull-left'>Actual Start Date: </span><span class='pull-right'> " + actual_start_date +
              "</div><div class=col-sm-12><span class='pull-left'>planned end date:</span><span class='pull-right'>  " + planned_end_date + 
              "</div><div class=col-sm-12><span class='pull-left'>Actual End Date:</span><span class='pull-right'>  " + actual_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Task Status:</span><span class='pull-right'> " + task_status +
                  "</div><div class=col-sm-12><span class='pull-left'>Task Status Color: </span><span class='pull-right'> " + task_status_colour + "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
