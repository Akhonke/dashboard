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



                        <h3 class="h6 text-uppercase mb-0">LEARNERSHIP SUB TYPE LIST</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">

                          <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Learnship Name</th>

                                    <th>Sub Learnship</th>

                                    <th>Unit Standard</th>

                                    <th>Min Credit</th>

                                    <th>Total Credits Allocated</th>

                                    <th>Facilitator</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($learnershipSubType)) { $i = 0;

                                    foreach ($learnershipSubType as $key => $learnSub) {  $i++;
                                       $facilitator =  $this->common->accessrecord('facilitator',['fullname'],['id'=>$learnSub->facilitator],'row');
                                    ?>

                                        <tr id="del-<?= $learnSub->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $learnSub->learnship_name ?></td>

                                            <td><?= $learnSub->sub_type ?></td>

                                            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#unitname-<?php echo $learnSub->id ;?>">View Unit Standard</button>

                                            </td>

                                            <td><?= $learnSub->min_credit ?></td>

                                            <td><?= $learnSub->total_credits_allocated ?></td>

                                            <td><?php if(isset($facilitator)){ echo $facilitator->fullname; }?></td>

                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$learnSub->id?>" data-name="<?=$learnSub->id?>" onclick="view(<?= $learnSub->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                      
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

                                                <a href="create-sub-learnership?sublearnid=<?= $learnSub->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                             <?php }if($res['is_delete']==1){?> 

                                            <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="providerdeletedataLearnerShipType('learnership_sub_type&behalf','id','<?= $learnSub->sub_type?>','<?= $learnSub->id?>')"><i
                                                        class="fa fa-trash"></i></a>

                                             <?php }?> 

                                              

                                            </td>

                                        </tr>

                                        <div class="modal fade" id="unitname-<?php echo $learnSub->id ;?>" role="dialog">

                                            <div class="modal-dialog unitss">

                                             <!-- Modal content-->

                                              <div class="modal-content">

                                                <div class="modal-header">

                                                  
                                                  <h4 class="modal-title">Unit Standard</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>


                                                </div>

                                                <div class="modal-body">

                                                 <ul id="unitul" class="unit-cls">

                                                     <?php if(!empty($learnSub->id)){

                                                        $exp = explode(',',$learnSub->unit_name);

                                                        $unit_standard = $learnSub->unit_standard;

                                                        $unitstandard = explode(',', $unit_standard);

                                                        foreach ($unitstandard as $key => $value) {

                                                           $unit_id = $value;

                                                         $units = $this->common->accessrecord('units',[],['id'=>$unit_id],'result');

                                                        if(!empty($units)){

                                                        foreach ($units as  $value_two) {

                                                    ?>

                                                     <li id="unitname" class="unitnm-cls"><?= $value_two->title."-".$value_two->standard_id."-".$value_two->unit_standard_type; ?></li>

                                                   <?php } }else{ 

                                                        echo "Unit Standard Not Available";  

                                                        } 

                                                      }

                                                     }

                                                   ?>

                                                </ul>

                                                </div>

                                                <div class="modal-footer">

                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                </div>

                                              </div>

                                            </div>

                                        </div>

                                    <?php } } ?>

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
                var learnship_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
                var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
                var min_credit = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
                var total_credits_allocated = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
                var fullname = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
                // var first_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			   
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Learnship Name : </span><span class='pull-right'> " + learnship_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Sub Learnship :</span><span class='pull-right'>  " + sub_type + 
              "</div><div class=col-sm-12><span class='pull-left'>Min Credit :</span><span class='pull-right'>  " + min_credit +
              "</div><div class=col-sm-12><span class='pull-left'>Total Credits Allocated :</span><span class='pull-right'>  " + total_credits_allocated +
              "</div><div class=col-sm-12><span class='pull-left'>Facilitator :</span><span class='pull-right'>  " + fullname +
             
             
               "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>

<script>

  function providerdeletedataLearnerShipType(tablename,columnname,id,learnSub_id){ 

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

                                url:"providerdeletedataLearnerShipType?table="+tablename+"&behalf="+columnname+"&data="+id+"&learnSub_id="+learnSub_id,

                                dataType: "json",

                                success : function(data){

                                    if(data.status == "true"){

                                        swal("Deleted!", "Record Delete Successfully.", "success");

                                       $("#del-"+learnSub_id).remove();

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







