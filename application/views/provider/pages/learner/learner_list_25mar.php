<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Learner List</h3>

                    </div>

                    <div class="card-body">

                        <table class="table table-responsive table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Training Provider</th>

                                    <th>Full name</th>

                                    <th>Surname</th>

                                    <th>Email</th>

                                    <th>Mobile</th>

                                    <th>Other Mobile</th>

                                    <th>ID Number</th>

                                    <th>SETA</th>

                                    <th>Province</th>

                                    <th>District</th>

                                    <th>City</th>

                                    <!-- <th>Region</th> -->

                                    <th>Suburb</th>

                                    <th>Street name</th>

                                    <th>Street number</th>

                                    <th>Learnership Sub Type</th>

                                    <th>Gender</th>

                                    <th>Learner Accepted Training</th>

                                    <th>Assessment</th>

                                    <th>Disable</th>

                                    <th>U.I.F Beneficiary</th>

                                    <th>Reason</th>

                                    <th>Class Name</th>

                                    <th>I.D.Copy</th>

                                    <th>Certificate Copy</th>

                                    <th>Contract Copy</th>

                                    <th>Upload File Formate(Excel)</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                $i = 0;

                                    foreach ($learner as $key => $value) {

                                    $i++;

                                ?>

                                <tr id="del-<?= $value->id ?>">

                                    <td><?= $i ?></td>

                                    <td><?= $value->trining_provider ?></td>

                                    <td><?= $value->first_name ?></td>

                                    <td><?= $value->surname ?></td>

                                    <td><?= $value->email ?></td>

                                    <td><?= '+27-'.$value->mobile ?></td>

                                    <td><?= '+27-'.$value->mobile_number ?></td>

                                    <td><?= $value->id_number ?></td>

                                    <td><?= $value->SETA ?></td>

                                    <td><?= $value->province ?></td>

                                    <td><?= $value->district ?></td>

                                    <td><?= $value->city ?></td>

                                    <!-- <td><?= $value->region ?></td> -->

                                    <td><?= $value->Suburb ?></td>

                                    <td><?= $value->Street_name ?></td>

                                    <td><?= $value->Street_number ?></td>

                                    <td><?= $value->learnershipSubType ?></td>

                                    <td><?= $value->gender ?></td>

                                    <td><?= $value->learner_accepted_training ?></td>

                                    <td><?= $value->assessment ?></td>

                                    <td><?= $value->disable ?></td>

                                    <td><?= $value->utf_benefits ?></td>

                                    <td><?= $value->reason ?></td>

                                    <td><?= $value->classname ?></td>

                                     <td>  

                                            <?php if(!empty($value->id_copy)){ ?>

                                            <img src="<?= BASEURL .'uploads/learner/id_copy/'.$value->id_copy ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

                                        </td>

                                         <td>  

                                            <?php if(!empty($value->certificate_copy)){ ?>

                                            <img src="<?= BASEURL .'uploads/learner/certificate_copy/'.$value->certificate_copy ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

                                        </td>

                                         <td>  

                                            <?php if(!empty($value->contract_copy)){ ?>

                                            <img src="<?= BASEURL .'uploads/learner/contract_copy/'.$value->contract_copy ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

                                        </td>

                                        <td><?php if(!empty($value)){ ?>

                                        <a href="<?= BASEURL .'uploads/learner/LearnerSheetDemo.xls' ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                                        <?php } ?>

                                       </td>

                                    <td>

                                        <a href="create-learner?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i

                                                class="fa fa-edit"></i></a>

                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="providerdeletedataLearner('learner&behalf','id',<?= $value->id?>)"><i

                                                        class="fa fa-trash"></i></a>

                                       

                                        <?php $tablenm_id ='learner'.'.'.$value->id; 

                                        if(($value->learner_accepted_training == "no")||($value->learner_accepted_training == "No")){ ?>

                                           <i data="<?php echo $tablenm_id;?>" class=" status_accepted btn btn-warning" data-learner="<?php echo $value->learner_accepted_training;?>">Not Accepted</i>

                                         <?php }else{ ?>

                                           <i data="<?php echo $tablenm_id;?>"  class="status_change btn btn-success" data-learner="<?php echo $value->learner_accepted_training;?>">Accepted</i>

                                        <?php } ?>    

                                                 

                                                    

                                                   

                                                

                                      

                                    </td>

                                </tr>

                                <?php

                                    }

                                 ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<script src="<?= BASEURL?>assets/admin/cloudfront/vendor/jquery/jquery.min.js"></script>

<script>

    $(document).on("click",".status_change",function(){

                var learner = $(this).data("learner");  

                var msg =((learner =="No")||(learner=="no"))? "Not Accepted" : "Accepted";

                var current_element = $(this); 

              

                swal({

                  title: "Reason",

                 // text: "Enter your Reason!",

                  type: "input",

                  showCancelButton: true,

                  closeOnConfirm: false,

                  animation: "slide-from-top",

                  inputPlaceholder: "Enter your Reason"

                },

                function(inputValue){

                  if (inputValue === false) return false;

                  

                  if (inputValue === "") {

                    swal.showInputError("Please Enter Your Reason");

                    return false

                  }

                    $.ajax({

                        url :"provider-changeleanerstatus",

                        type : "POST",

                        dataType : "JSON",

                        data: {tablenm_id:$(current_element).attr("data"),learner:"no",text:inputValue},

                        success : function(data){

                            if(data["status"] == 200){

                              location.reload();

                            }

                        },

                        error : function(jqXHR, textStatus, errorThrown){

                            swal("Error deleting!", "Please try again", "error");

                        }

                    });

                });

            });

    $(document).on("click",".status_accepted",function(){

        var learner = $(this).data("learner");

        var msg =((learner =="Yes")||(learner=="yes"))? "Not Accepted" : "Accepted";

        var current_element = $(this);  

        var text = "";

        swal({

            title: "Are you sure?",

            text: msg,

            type: "warning",

            showCancelButton: true,

            confirmButtonClass: "btn-danger",

            confirmButtonText: msg,

            cancelButtonText: "No, cancel plx!",

            closeOnConfirm: false,

            closeOnCancel: false

        },

        function (isConfirm) {

            if (isConfirm) {

                $.ajax({

                    url :"provider-changeleanerstatus",

                    type : "POST",

                    dataType : "JSON",

                    data: {tablenm_id:$(current_element).attr("data"),learner:"yes",text:text},

                    success : function(data){

                        if(data["status"] == 200){

                          location.reload();

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

    });

    function providerdeletedataLearner(tablename,columnname,id){ 

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

                    url:"providerdeletedataLearner?table="+tablename+"&behalf="+columnname+"&data="+id,

                    dataType: "json",

                    success : function(data){

                        if(data.status == "true"){

                            swal("Deleted!", "Record Delete Successfully.", "success");

                           $("#del-"+id).remove();

                        }

                        if(data.error == "stipend"){

                            swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                        }

                        if(data.error == "drop_out"){

                            swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                        }

                        if(data.error == "complaints_and_suggestions"){

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

    $(function() {

        $('#toggle').bootstrapToggle({

          on: 'Accepted',

          off: 'Not Accepted'

        });

    })

</script>