<div class="container-fluid px-xl-5">

<section class="py-5">

<div class="row">

<!-- Form Elements -->

<div class="col-lg-12 mb-1">

<div class="card">

    <div class="card-header">

        <h3 class="h6 text-uppercase mb-0">Attendance List</h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped " style="width:100%">

            <thead> 

                <tr>

                    <th>#</th>

                    <th>Training Provider</th>

                    <th>Learnership Sub Type</th>

                    <th>ClassName</th>

                    <th>Facilitator</th>

                    <th>Year</th>

                    <th>Week Ending Date</th>

                    <th>Attendance Sheet</th>
                    <th>Action</th>

                    

                </tr>

            </thead>

            <tbody>

                <?php

                    $i = 0; 

                   if(!empty($attendance)){

                    foreach ($attendance as $value_one) {

                    // foreach ($value_one as $key => $value) {

                        $learnership_sub_type =$this->common->accessrecord(' learnership_sub_type', [], ['id'=>$value_one->learnership_sub_type], 'row');

                                if(!empty($learnership_sub_type)){

                                        $sub_type =$learnership_sub_type->sub_type;

                                }else{

                                   $sub_type ="";

                                }

                            $class_name =$this->common->accessrecord('class_name', [], ['id'=> $value_one->classname], 'row');

                                if(!empty($class_name)){

                                        $classname =$class_name->class_name;

                                }else{

                                   $classname ="";

                                }

                      $i++;

                ?>

                <tr id="del-<?= $value_one->id ?>" class="filters">

                    <td><?= $i ?></td>

                    <td><?= $value_one->training_provider ?></td>

                    <td><?= $sub_type ?></td>

                    <td><?= $classname ?></td>

                    <td><?= $value_one->facilirator ?></td>

                    <td><?= $value_one->year ?></td>

                    <td><?= $value_one->week_date ?></td>

                    <td><?php if(!empty($value_one->attachment_one)){ ?>

                        <a href="<?= BASEURL .'uploads/attendance/attachment_one/'.$value_one->attachment_one ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                        <?php } ?>

                    </td>

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
            var training_provider = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var classname = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var facilirator = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var year = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
  			var week_date = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            // var week_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
          
  			  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-6><span class='pull-left'>Training Provider : </span><span class='pull-right'>  " + training_provider + 
              "</div><div class=col-sm-6><span class='pull-left'>Learnership Sub Type :</span><span class='pull-right'>  " + sub_type + 
              "</div><div class=col-sm-6><span class='pull-left'>ClassName : </span><span class='pull-right'> " + classname + 
              "</div><div class=col-sm-6><span class='pull-left'>Facilitator : </span><span class='pull-right'> " + facilirator + 
              "</div><div class=col-sm-6><span class='pull-left'>Year : </span><span class='pull-right'> " + year + 
              "</div><div class=col-sm-6><span class='pull-left'>Week Ending Date :</span><span class='pull-right'>  " + week_date +
            //   "</div><div class=col-sm-6>Week Ending Date : " + week_date +
             
            "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>


