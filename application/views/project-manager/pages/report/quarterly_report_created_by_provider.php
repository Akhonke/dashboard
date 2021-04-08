<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Training Providers Quarterly Report</h3>
                    </div>
                    <div class="card-body">
                        <table class="table  table-bordered table-striped" style="width:100%">
                            <thead> 
                                <tr>
                                    <th>S. No.</th> 
                                    <!-- <th>Created By First Name</th>
                                    <th>Created By Surname</th>
                                    <th>Training Provider </th>
                                    <th>Project Manager</th> -->
                                    <th>Quarter</th>
                                    <th>Report Start Date</th>
                                    <th>Report End Date</th>
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
                                    <!-- <td><?= $value->created_by_first_name ?></td>
                                    <td><?= $value->created_by_surname ?></td>
                                    <td><?= $value->company_name ?>
                                        
                                    </td>
                                    <td><?= $value->project_manager_name ?></td> -->
                                    <td><?= $value->quater_name ?></td>
                                    <td><?=  date('d-M-Y',strtotime($value->start_date)) ?></td>
                                    <td><?=  date('d-M-Y',strtotime($value->end_date)) ?></td>
                                    <td><?php if(!empty($value->document)){ ?>
                                        <a href="<?= BASEURL .'uploads/quatery_report_proof/'.$value->document ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="view()"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        
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
              var ss  =    $(this).attr("photoss");
                var base_url = "your base url";
            var full_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var company_name = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            
            // var landline = $(event.relatedTarget).closest("tr").find("td:eq(16)").text(); 
           
          
  			  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12> <span class='pull-left'>Quarter : </span><span class='pull-right'> " + full_name + 
              "</div><div class=col-sm-12> <span class='pull-left'>Report Start Date :</span><span class='pull-right'> " + surname + 
              "</div><div class=col-sm-12> <span class='pull-left'>Report End Date : </span><span class='pull-right'>" + company_name + 
            
             
             
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>