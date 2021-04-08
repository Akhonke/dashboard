<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'Class'],'row_array');
             

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

                        <h3 class="h6 text-uppercase mb-0">MY CLASS LIST</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered  " style="width:100%">

                            <thead>

                                <tr >

                                    <th>S. No.</th>

                                    <th>Training Provider</th>

                                    <th>Learnership Type</th>

                                    <th>Learnership Sub Type</th>

                                    <th>Facilitator</th>

                                    <th>Class Name</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {
                                            $learnership =$this->common->accessrecord('learnership', ['name'], ['id'=>$row->learnership_id], 'row');

                                            if(!empty($learnership)){

                                              $learnership_nm =$learnership->name;

                                            }else{

                                               $learnership_nm = "";

                                            } 

                                            $learner =$this->common->accessrecord('learnership_sub_type', ['sub_type'], ['id'=>$row->learnership_sub_type_id], 'row');

                                            if(!empty($learner)){

                                              $learner_nm =$learner->sub_type;

                                            }else{

                                               $learner_nm = "";

                                            }

                                            $trainer =$this->common->accessrecord('trainer', ['full_name','company_name'], ['id'=>$row->trainer_id], 'row');

                                            if(!empty($trainer)){

                                              $company_name =$trainer->company_name;

                                            }else{

                                               $company_name = "";

                                            }


                                            $facilitator =$this->common->accessrecord('facilitator', ['fullname'], ['id'=>$row->facilitator_id], 'row');

                                            if(!empty($facilitator)){

                                              $facilitator_name =$facilitator->fullname;

                                            }else{

                                               $facilitator_name = "";

                                            }

                                            ?>

                                        <tr id="del-<?= $row->id ?>">

                                            <td><?= $i; ?></td>

                                            <td><?= $company_name; ?></td>

                                            <td><?= $learnership_nm ?></td>

                                            <td><?= $learner_nm; ?></td>

                                            <td><?= $facilitator_name; ?></td>


                                            <td><?= $row->class_name; ?></td>

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

                                                <a href="provider-create-class?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i
                                                        class="fa fa-edit"></i></a>
                                     <?php }if($res['is_delete']==1){?> 

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecordClass('class_name&behalf','id','<?= $row->id?>','<?= $row->class_name;?>')"><i class="fa fa-trash"></i></a>
                                             <?php }?>  

                                            </td>

                                        </tr>

                                <?php $i++; } }  ?>

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
            var company_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var learnership_nm = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var learner_nm = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var facilitator_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var class_name = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
          
            
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
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Training Provider :</span><span class='pull-right'> " + company_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Learnership Type :</span><span class='pull-right'> " + learnership_nm + 
              "</div><div class=col-sm-12><span class='pull-left'> Learnership Sub Type : </span><span class='pull-right'>" + learner_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Facilitator  :</span><span class='pull-right'> " + facilitator_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Class Name  :</span><span class='pull-right'> " + class_name + 
            
              
                 
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>



<script>

   function deleterecordClass(tablename,columnname,id,classname){ 

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

                                url: "Traningprovider/deletedataClass?table="+tablename+"&behalf="+columnname+"&data="+id+"&classname="+classname,

                                dataType: "json",

                                success : function(data){

                                    if(data.status == 'true'){

                                        swal("Deleted!", "Record Delete Successfully.", "success");

                                       $("#del-"+id).remove();

                                    }

                                    if(data.error == 'error'){

                                        swal("Error deleting!", "You Can Not Delete This Class Added By Learner", "error");

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