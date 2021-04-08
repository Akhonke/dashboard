<?php
if(isset($_SESSION['admin']['logintype'])){
      $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Provider','user_id'=>$_SESSION['admin']['id'],'module_name'=>'Employer'],'row_array');
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
                        <h3 class="h6 text-uppercase mb-0">Employers List</h3>
                    </div> 
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Training Provider</th>
                                        <!--<th>Learner Place Of Employment</th>-->
                                        <th>Employer Name</th>
                                        <th>Employer Contact Number</th>
                                        <th>Employer Contact Email</th>
                                        <th>Employer Province</th>
                                        <th>Employer District</th>
                                        <th>Employer City</th>
                                        <th>Employer Region</th>
                                        <th>Employer Suburb</th>
                                        <th>Employer Street Name</th>
                                        <th>Employer Street Number</th>
                                        <th>Contact Person Name</th>
                                        <th>Contact Person Surname</th>
                                        <th>Contact Person Contact Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(!empty($record)){
                                        $i = 0;
                                    foreach ($record as $key => $value) {
                                        $trainer =$this->common->accessrecord('trainer', [], ['id'=>$value->trainer_id], 'row');
                                        if(!empty($trainer)){
                                                $company_name =$trainer->company_name;
                                        }else{
                                           $company_name ="";
                                        }
                                        $i++;
                                    ?>
                                    <tr id="del-<?= $value->id ?>">
                                        <td><?= $i ?></td>
                                        <td><?= $company_name ?></td>
                                        <td><?= $value->employer_name ?></td>
                                        <td><?= '+27-'.$value->employer_contact_number ?></td>
                                        <td><?= $value->employer_contact_email ?></td>
                                        <td><?= $value->employer_province ?></td>
                                        <td><?= $value->employer_district ?></td>
                                        <td><?= $value->employer_region ?></td>
                                        <td><?= $value->employer_city ?></td>
                                        <td><?= $value->employer_Suburb ?></td>
                                        <td><?= $value->employer_Street_name ?></td>
                                        <td><?= $value->employer_Street_number ?></td>
                                        <td><?= $value->contact_person_name ?></td>
                                        <td><?= $value->contact_person_surname ?></td>
                                        <td><?= '+27-'.$value->contact_person_contact_no ?></td>
                                        <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                             <?php if($res['is_edit']==1){?>
                                            <a href="provider-create-employer?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                         <?php } if($res['is_delete']==1){?>

                                            <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecord('employer&behalf','id','<?= $value->id?>')"><i
                                                            class="fa fa-trash"></i></a>
                                         <?php }?> 
                                        </td>
                                    </tr>
                                    <?php
                                        } }
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