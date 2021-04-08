<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'Assessor'],'row_array');
}else{
 $res=array();
 if(empty($res)){
                    $logintype='main-user';
                    $res['is_edit']=1;
                    $res['is_delete']=1;
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
                        <h3 class="h6 text-uppercase mb-0">Created Live Class List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Orgnaization Name</th>
                                    <th>Project Manager Name</th>
                                    <th>Training Provider</th>
                                    <th>Class Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($learnerlinklist)) {
                                        $i = 1;
                                        foreach ($learnerlinklist as $key => $row) {
                                          $trainer= $this->common->accessrecord('trainer', [], ['id'=>$row->trainer_id], 'row'); 
                                            $trainer_nm = $trainer ? $trainer->company_name : '';
                                            $orgnaization= $this->common->accessrecord('organisation', [], ['id'=>$row->orgnaization_id], 'row'); 
                                            $orgnaization_name = $orgnaization ? $orgnaization->organisation_name : '';
                                            $projectmanager= $this->common->accessrecord('project_manager', [], ['id'=>$row->project_manager], 'row'); 
                                            $project_manager = $projectmanager ? $projectmanager->project_manager : '';
                                            $class= $this->common->accessrecord('class_name', [], ['id'=>$row->class_name], 'row'); 
                                            $class_name = $class ? $class->class_name : '';
                                        
                                        
                                        ?>
                                        <tr id="del-<?= $row->id ?>">
                                            <td><?= $i; ?></td>
                                            <td><?= $orgnaization_name; ?></td>
                                            <td><?=$project_manager ?></td>
                                            <td><?= $trainer_nm; ?></td>
                                            <td><?= $class_name; ?></td>
                                            <td><?= $row->date; ?></td>
                                            <td><?= $row->time; ?></td>
                                            <td><?= $row->mobile; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td>
                                            <a href="<?= $row->link?>" target="_blank" rel="noopener noreferrer"><?= $row->link?></a>
                                            </td>
                                        
                                         
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row->id?>" data-name="<?= $row->id?>" onclick="view(<?=  $row->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      
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
                                                <?php if($res['is_edit']==1){?>

                                                <!-- <a href="create-assessor-user?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i
                                                        class="fa fa-edit"></i></a> -->
                                             <?php }
                                             if($res['is_delete']==1){?> 

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="providerdeletedataAssessor('elearner&behalf','id','<?= $row->id?>','<?= $trainer_nm ?>')"><i
                                                        class="fa fa-trash"></i></a>
                                             <?php }?> 
                                             </td>
                                        </tr>
                                <?php $i++; } } ?>
                        </table>
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
            var orgnaization_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var project_manager = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var trainer_nm = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var class_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var date = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            var time = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            var mobile = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
  			var email = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
  			var link = $(event.relatedTarget).closest("tr").find("td:eq(9)").text(); 
          

          
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'> Orgnaization Name :</span><span class='pull-right'> " + orgnaization_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Project Manager Name : </span><span class='pull-right'>" + project_manager + 
              "</div><div class=col-sm-12><span class='pull-left'> Training Provider :</span><span class='pull-right'> " + trainer_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Class Name  :</span><span class='pull-right'> " + class_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Date  :</span><span class='pull-right'> " + date + 
              "</div><div class=col-sm-12><span class='pull-left'>Time   :</span><span class='pull-right'> " + time +
              "</div><div class=col-sm-12><span class='pull-left'>Mobile  :</span><span class='pull-right'> " + mobile +
              "</div><div class=col-sm-12><span class='pull-left'>Email   :</span><span class='pull-right'>  " + email + 
              "</div><div class=col-sm-12><span class='pull-left'>Link   :</span><span class='pull-right'>  " + link + 
            
                 
                 "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
<script>

    function providerdeletedataAssessor(tablename,columnname,id,trainer_id){ 
debugger;
            swal({
                title: "Are you sure?",
                text: "Delete",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, 
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type:"GET",
                        url:"providerdeletedataLiveclass?table="+tablename+"&behalf="+columnname+"&data="+id+"&trainer_id="+trainer_id,
                        dataType: "json",
                        success : function(data){
                            if(data.status == "true"){
                                swal("Deleted!", "Record Delete Successfully.", "success");
                               $("#del-"+id).remove();
                            }
                            if(data.error == "error"){
                                swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                            }
                        },
                        error : function(jqXHR, textStatus, errorThrown){

                            swal("Error deleting!", "Please try again", "error");
                        }
                    });
                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");

                }
        });    
    }
</script>