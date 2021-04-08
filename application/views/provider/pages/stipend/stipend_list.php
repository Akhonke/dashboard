<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'Stipends'],'row_array');
             

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
                       <h3 class="h6 text-uppercase mb-0">Stipends List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Learner Name</th>
                                    <th>Training Provider</th>
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
                                           if($learner = $this->common->accessrecord('learner',[],['id'=>$row->learner_id],'row')){

                                                $learner_name = $learner->first_name;
                                           }else{
                                              $learner_name ="";
                                           }
                                            if($trainer= $this->common->accessrecord('trainer',[],['id'=>$row->provider_id],'row')){

                                                $trainer_nm = $trainer->company_name;
                                            }else{
                                                $trainer_nm =  "";
                                            }
                                ?>
                                <tr id="del-<?= $row->id ?>">
                                    <td><?= $i; ?></td>
                                    <td><?= $learner_name; ?></td>
                                    <td><?= $trainer_nm; ?></td>
                                    <td><?= $row->date; ?></td>
                                    <td><?='R  '. $row->amount; ?></td>
                                    <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php if($res['is_edit']==1){?>
                                        <a href="provider-create-stipends?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i
                                                        class="fa fa-edit"></i></a>
                                     <?php }if($res['is_delete']==1){?> 

                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecord('stipend&behalf','id',<?= $row->id?>)"><i
                                                        class="fa fa-trash"></i></a>
                                             <?php }?> 
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

function deleterecord(tablename,columnname,id){ 

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

          swal("Cancelled", "Your imaginary file is safe :)", "error");

        }

    });    

}

</script>