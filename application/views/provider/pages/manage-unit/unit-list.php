<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'UnitTypes'],'row_array');
             

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



                        <h3 class="h6 text-uppercase mb-0">Unit Standard List</h3>



                    </div>



                    <div class="card-body">



                        <table class=" table table-bordered table-striped " style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Title</th>

                                    <th>Unit</th>

                                    <th>Credit</th>

                                    <th>Standard Id</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($units)) { $i = 0;

                                    foreach ($units as $key => $unit) {  $i++; ?>

                                        <tr id="del-<?= $unit->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $unit->title ?></td>

                                            <td><?= $unit->unit_standard_type ?></td>

                                            <td><?= $unit->total_credits ?></td>

                                            <td><?= $unit->standard_id ?></td>

                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $unit->id?>" data-name="<?= $unit->id?>" onclick="view(<?=  $unit->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
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

                                                <a href="create-unit?uid=<?= $unit->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                             <?php }if($res['is_delete']==1){?> 
                                                
                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="providerdeletedataUnit('units&behalf','id',<?= $unit->id?>)"><i
                                                        class="fa fa-trash"></i></a>
                                             <?php }?>  

                                                

                                            </td>

                                        </tr>

                                <?php } } ?>

                        </table>



                    </div>



                </div>



            </div>

            <div class="col-lg-3 mb-1"></div>

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
                var learnship_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
                var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
                var min_credit = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
                var total_credits_allocated = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
                // var fullname = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
                // var first_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			   
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Title :</span><span class='pull-right'> " + learnship_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Unit :</span><span class='pull-right'> " + sub_type + 
              "</div><div class=col-sm-12><span class='pull-left'>Credit :</span><span class='pull-right'> " + min_credit +
              "</div><div class=col-sm-12><span class='pull-left'>Standard Id :</span><span class='pull-right'> " + total_credits_allocated +
             
             
               "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>

<script>

  function providerdeletedataUnit(tablename,columnname,id){ 

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

                                url:"providerdeletedataUnit?table="+tablename+"&behalf="+columnname+"&data="+id,

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

