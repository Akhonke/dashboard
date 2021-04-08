<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">My 
                        <?php if($page == 'complaint_list'){?>
                            Complaints
                        <?php }else{ ?>
                        Suggestions
                        <?php } ?>
                        </h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Serial No.</th>

                                    <th>Review Type</th>

                                    <th>Description</th>

                                    <th>Review Date</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                   if (!empty($complaint_list)) {

                                        $i = 1;

                                        foreach ($complaint_list as $key => $value) { 
                                            $date = $value['created_date'];

                                            $date_create = date_create($date);
                                    ?>

                                <tr>

                                    <td><?= $i; ?></td>

                                    <td><?= $value['type']; ?></td>

                                    <td><?= $value['description']; ?></td>

                                   
                                    <td><?= date_format($date_create,"d/m/Y");?></td>

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
            var type = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var description = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var date_create = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
          
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Review Type :</span><span class='pull-right'> " + type + 
              "</span></div><div class=col-sm-12><span class='pull-left'>Description:</span> <span class='pull-right'>" + description + 
              "</span></div><div class=col-sm-12><span class='pull-left'>Review Date :</span> <span class='pull-right'> " + date_create + 
             
            
              
                 
                 "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
