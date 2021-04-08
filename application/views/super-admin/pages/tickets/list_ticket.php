<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Total Enquiry List</a></li>

        </ol>
    </nav>
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Total Enquiry List</h6>
            <!-- <a href="#" class="ms-text-primary">Add Tickets</a> -->
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="MYtable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Massage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php $i=1; foreach ($contactus as  $value) {   ?>
                           
                        <tr>

                            <td><?php  echo $i; ?></td>
                            <td><?php  echo $value->name; ?></td>
                            <td><?php  echo $value->email; ?></td>
                            <td><?php  echo $value->message; ?></td>
                            <td>
                            <a href="#" data-toggle="modal" data-target="#exampleModal"  onclick="view()"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                   

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

                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function view(){

        // debugger;
  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var email = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var message = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
 
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Name :</span><span class='pull-right'>  " + name + 
              "</div><div class=col-sm-12><span class='pull-left'>Email Address :</span><span class='pull-right'>  " + email + 
              "</div><div class=col-sm-12><span class='pull-left'>Mobile Number :</span><span class='pull-right'>  " + message + 
              
            // "</div><div class=col-sm-12><span class='pull-left'>Package Price : " + packagePrice +
                 
            "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>