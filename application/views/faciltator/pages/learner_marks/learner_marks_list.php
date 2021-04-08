<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Mark Sheet List</h3>

                    </div>

                    <div class="card-body">
                    <!-- <input id="dropdown1" placeholder="Training Provider" type="text">
                    <input id="dropdown2" placeholder="Learnership Subtype" type="text">
                    <input id="dropdown3" placeholder="Classname" type="text">
                    <input id="dropdown4" placeholder="Facilitator" type="text">
                    <input id="dropdown5" placeholder="Year" type="text"> -->
                    



                        <table class="table table-bordered table-striped table-responsive" id="learner_mark" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Serial No.</th>

                                    <th>Training Provider</th>

                                    <th>Learnership Sub Type</th>

                                    <th>Class Name</th>

                                    <th>Facilitator</th>

                                    <th>Year</th>

                                    <th>Mark Sheet</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                if (!empty($record)) {

                                    foreach ($record as $key => $value) {

                                        $learnership_sub_type = $this->common->accessrecord(' learnership_sub_type', [], ['id' => $value->learnership_sub_type], 'row');

                                        if (!empty($learnership_sub_type)) {

                                            $sub_type = $learnership_sub_type->sub_type;
                                        } else {

                                            $sub_type = "";
                                        }

                                        $class_name = $this->common->accessrecord('class_name', [], ['id' => $value->learner_classname], 'row');

                                        if (!empty($class_name)) {

                                            $classname = $class_name->class_name;
                                        } else {

                                            $classname = "";
                                        }

                                        $i++;

                                ?>

                                        <tr id="del-<?= $value->id ?>" class="filters">

                                            <td><?= $i ?></td>

                                            <td><?= $value->training_provider ?></td>

                                            <td><?= $sub_type ?></td>

                                            <td><?= $classname ?></td>

                                            <td><?= $value->facilirator ?></td>

                                            <td><?= $value->year ?></td>

                                            <td><?php if (!empty($value->attachment)) { ?>
                                                <div class="text-center">
                                                    <a href="<?= BASEURL . 'uploads/learner/import_learnermarks/' . $value->attachment ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                                </div>
                                                <?php } ?>

                                            </td>

                                            
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?=  $value->id?>" data-name="<?=  $value->id?>" onclick="view(<?=   $value->id; ?>)"  class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            
                                            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body " id="personDetails">
                                                    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <a href="Faciltator-create-mark-sheet?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('learner_marks&behalf','id',<?= $value->id ?>)"><i class="fa fa-trash"></i></a>

                                            </td>

                                        </tr>

                                <?php

                                    }
                                }

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
            var company_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var learnership_nm = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var learner_nm = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var facilitator_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var class_name = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            //   var year = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            //   var week  = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
          
            var src = [];

                $(event.relatedTarget).closest("tr").find("td:eq(6) div").each(function() {
                    src.push($(this).find("a").attr("href"));
                });
                var attchedImage;
                if (src.length > 1) {
                    for (var i = 0; i < src.length; i++) {
                        attchedImage = i === 0 ?
                            '<a href="' + src[i] + '"  download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>' :
                            attchedImage + '<a href="' + src[i] + '"  download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>';
                    }
                } else {
                    attchedImage = '<a width="50" href="' + src[0] + '"  download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>';
                }
                            
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Training Provider : </span><span class='pull-right'> " + company_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Learnership Sub Type :</span><span class='pull-right'>  " + learnership_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Class Name :</span><span class='pull-right'>  " + learner_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Facilitator  : </span><span class='pull-right'> " + facilitator_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Year  : </span><span class='pull-right'> " + class_name + 
             "</div><div class=col-sm-12><span class='pull-left'>Acreditations Files: </span><span class='pull-right'>" + attchedImage +

            //   "</div><div class=col-sm-12><span class='pull-left'>Week Ending Date  : </span><span class='pull-right'> " + week + 
            
              
                 
            "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
`