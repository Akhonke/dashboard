<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">List of Banking Details</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Serial No.</th>

                                    <th>Learner Name</th>

                                    <th>Learner Surname</th>

                                    <th>I.D Number</th>

                                    <th>Learnership Sub Type</th>
                                    <th>Class</th>
                                    <th>Bank Name</th>
                                    <th> Bank Branch Name </th>
                                    <th>Account Type</th>
                                    <th>Branch Code</th>
                                    <th>Account Number</th>
                                    <th>Account holder name</th>
                                    <th>Account Surname Name</th>
                                    <th>Account Holder I.D Number</th>
                                    <th>Upload Account Holder I.D</th>
                                    <th>Upload Account Holder Proof ID </th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($bankdetail)) {

                                        $i = 1;

                                        foreach ($bankdetail as $key => $row) {
                                            $learnership_sub_type =$this->common->accessrecord(' learnership_sub_type', [], ['id'=>$row['learnership_sub_type_id']], 'row');

                                            if(!empty($learnership_sub_type)){

                                                    $sub_type =$learnership_sub_type->sub_type;

                                            }else{

                                               $sub_type ="";

                                            }
                                            
                                            ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $row['learner_name']; ?></td>

                                            <td><?= $row['learner_surname']; ?></td>

                                            <td><?= $row['id_number']; ?></td>

                                            <td><?= $row['learnership_sub_type_id']; ?></td>

                                            <td><?= $row['learner_classname']; ?></td>

                                            <td><?= $row['bank_name']; ?></td>

                                            <td><?= $row['bank_branch_name']; ?></td>

                                            <td><?= $row['account_type']; ?></td>

                                            <td><?= $row['branch_code']; ?></td>

                                            <td><?= $row['account_number']; ?></td>

                                            <td><?= $row['account_holder_name']; ?></td>

                                            <td><?= $row['account_holder_surname']; ?></td>

                                            <td><?= $row['account_holder_idnumber']; ?></td>

                                            <td><button class="btn btn-info download"><i class="fa fa-download" aria-hidden="true"></i><a href="<?=base_url('uploads/learner/banking/')?><?= $row['account_holder_id']; ?>">Download</a></button></td>


                                            <td><button class="btn btn-info download"><i class="fa fa-download" aria-hidden="true"></i><a href="<?=base_url('uploads/learner/banking/')?><?= $row['account_holder_proof_id']; ?>">Download</a></button></td>
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=  $row['id']?>" data-name="<?=  $row['id']?>" onclick="view(<?=   $row['id']; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            
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
    function view(){

        debugger;
  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var learner_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var learner_surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var id_number = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var learnership_sub_type_id = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var learner_classname = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
              var bank_name = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
              var bank_branch_name  = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
              var account_type = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
              var branch_code = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
              var account_number  = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
              var account_holder_name = $(event.relatedTarget).closest("tr").find("td:eq(11)").text(); 
              var account_holder_surname = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
              var account_holder_idnumber  = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
          
            
            
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Learner Name :</span><span class='pull-right'> " + learner_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Learner Surname :</span><span class='pull-right'> " + learner_surname + 
              "</div><div class=col-sm-12><span class='pull-left'>I.D Number :</span><span class='pull-right'> " + id_number + 
              "</div><div class=col-sm-12><span class='pull-left'>Learnership Sub Type :</span><span class='pull-right'> " + learnership_sub_type_id + 
              "</div><div class=col-sm-12><span class='pull-left'>Class  :</span><span class='pull-right'> " + learner_classname + 
              "</div><div class=col-sm-12><span class='pull-left'>Bank Name  : </span><span class='pull-right'>" + bank_name + 
              "</div><div class=col-sm-12><span class='pull-left'> Bank Branch Name   : </span><span class='pull-right'>" + bank_branch_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Account Type  :</span><span class='pull-right'> " + account_type + 
              "</div><div class=col-sm-12><span class='pull-left'>Branch Code  : </span><span class='pull-right'>" + branch_code + 
              "</div><div class=col-sm-12><span class='pull-left'>Account Number : </span><span class='pull-right'>" + account_number + 
              "</div><div class=col-sm-12><span class='pull-left'>Account holder nam  : </span><span class='pull-right'>" + account_holder_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Account Surname Name  :</span><span class='pull-right'> " + account_holder_surname + 
              "</div><div class=col-sm-12><span class='pull-left'>Account Holder I.D Number : </span><span class='pull-right'>" + account_holder_idnumber + 
            
              
                 
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
