<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">User List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" style="width:100%">
                            <thead> 
                                <tr>
                                    <th>S. No.</th> 
                                    <th>Designation</th>
                                    <th>First Name</th>
                                    <th>Last Name </th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Password</th>
                                   
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
                                    <td><?= $value->designation ?></td>
                                    <td><?= $value->first_name ?></td>
                                    <td><?= $value->second_name ?></td>
                                   
                                    <td><?= $value->email ?></td>
                                    <td><?= $value->mobile ?></td>
                                    <td><?= $value->password ?></td>
                                  
                                   
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value->id?>" data-name="<?=$value->id?>" onclick="view(<?= $value->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                                    	<a href="Projectmanager-User-Edit?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <!-- <a href="Provider-User-list?id=<?= $value->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleteuser('sub_user&behalf','id',<?= $value->id?>)"><i class="fa fa-trash"></i></a>
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
        </div>
    </section>
</div>

<script>
    function view(){

  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
              var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
              var ss  =    $(this).attr("photoss");
                var base_url = "your base url";
            var designation = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var first_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var second_name = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
  			var email = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var mobile = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            var password = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
  		
           
         
         
  			
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Designation :</span><span class='pull-right'> " + designation + 
              "</div><div class=col-sm-12><span class='pull-left'>First Name:</span><span class='pull-right'> " + first_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Second Name:</span><span class='pull-right'> " + second_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Email : </span><span class='pull-right'>" + email + 
              "</div><div class=col-sm-12><span class='pull-left'>Mobile :</span><span class='pull-right'> " + mobile + 
              "</div><div class=col-sm-12><span class='pull-left'>Password  : </span><span class='pull-right'>" + password + 
             
             
               
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>