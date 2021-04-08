<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'QuarterlyReport'],'row_array');
             

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
                        <h3 class="h6 text-uppercase mb-0">Quarterly Progress Report</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive" style="width:100%">
                            <thead> 
                                <tr>
                                    <th>Serial No.</th> 
                                    <th>Created By First Name</th>
                                    <th>Created By Surname</th>
                                    <th>Training Provider </th>
                                    <th>Project Manager</th>
                                    <th>Quarter</th>
                                    <th>Quarter Start Date</th>
                                    <th>Quarter End Date</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0; 
                                   if(!empty($record)){
                                    foreach ($record as $key => $value) {
                                        
                                      $i++;
                                ?>
                                <tr id="del-<?= $value->id ?>" class="filters">
                                    <td><?= $i ?></td>
                                    <td><?= $value->created_by_first_name ?></td>
                                    <td><?= $value->created_by_surname ?></td>
                                    <td><?= $value->training_provider_name ?></td>
                                    <td><?= $value->project_manager_name ?></td>
                                    <td><?= $value->quater_name ?></td>
                                    <td><?=  date('d-M-Y',strtotime($value->start_date)) ?></td>
                                    <td><?=  date('d-M-Y',strtotime($value->end_date)) ?></td>
                                    <td><?php if(!empty($value->document)){ ?>
                                        <a href="<?= BASEURL .'uploads/quatery_report_proof/'.$value->document ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=  $value->id?>" data-name="<?=  $value->id?>" onclick="view(<?=   $value->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      
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
                                        <a href="Create-Quaterly-Report?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php } if($res['is_delete']==1){?>
                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecord('quarterly_progress_report&behalf','id',<?= $value->id?>)"><i class="fa fa-trash"></i></a>
                                         <?php }?> 
                                        
                                    </td>
                                </tr>
                                <?php
                                    } }
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

        debugger;
  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var created_by_first_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var created_by_surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var training_provider_name = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var project_manager_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var quater_name = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
              var start_date = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
              var end_date  = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
          
            
            var src = [];

            $(event.relatedTarget).closest("tr").find("td:eq(15) div").each(function(){
               src.push($(this).find("img").attr("src"));
            });
            var attchedImage;
            if(src.length > 1){
                for(var i=0; i<src.length; i++){
                    attchedImage = i===0 ? 
                    '<img width="50" src="'+ src[i] +'" / > ':
                     attchedImage + '<img width="50" src="'+ src[i] +'" / > ';                   
                }
            }
            else{
                 attchedImage = '<img width="50" src="'+ src[0] +'" / > ';
            }
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Created By First Name : </span><span class='pull-right'> " + created_by_first_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Created By Surname : </span><span class='pull-right'> " + created_by_surname + 
              "</div><div class=col-sm-12><span class='pull-left'>Training Providere :  </span><span class='pull-right'>" + training_provider_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Project Manager  :  </span><span class='pull-right'>" + project_manager_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Quarter  : </span><span class='pull-right'> " + quater_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Quarter Start Date  : </span><span class='pull-right'> " + start_date + 
              "</div><div class=col-sm-12><span class='pull-left'>Quarter End Date  : </span><span class='pull-right'> " + end_date + 
            
              
                 
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>






<script>
function deleterecord(tablename,columnname,id){ 
    //alert();
    swal({
        title: "Are you sure?",
        text: "Delete",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel it!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, 
    function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type:"GET",
                url: "Traningprovider/deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,
                success : function(data){
                     swal("Deleted!", "Record Delete Successfully.", "success");
                     $("#del-"+id).remove();
                },
                error : function(jqXHR, textStatus, errorThrown){
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        } else {
          swal("Cancelled", "Your data is safe :)", "error");
        }
    });    
}
</script>
