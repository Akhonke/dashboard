<?php if(isset($_SESSION['projectmanager']['logintype']))
{
    $res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Project_Manager','user_id'=>$_SESSION['projectmanager']['user_id'],'module_name'=>'Finance'],'row_array');
    
}else
{
    $res = array();
    if (empty($res)) {
        $logintype = 'main-user';
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
                        <h3 class="h6 text-uppercase mb-0">Expenditure</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>

                                        <th>Project Manager</th>

                                        <th>Learnership Type</th>

                                        <th>Learnership Subtype</th>

                                        <th>Expense ID</th>

                                        <th>Expense Type</th>

                                        <th>Expense Name</th>

                                        <th>Expense Amount</th>

                                        <th>Date of Expense</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 

                                    if (!empty($data)) { $i = 0;

                                        foreach ($data as $key => $value) {

                                            $project = $this->common->accessrecord('project_manager', [], ['id'=>$value->project_id], 'row');
                                            $project_nm = $project?$project->project_manager:"";

                                            $learnership = $this->common->accessrecord('learnership', [], ['id'=>$value->learnship_id], 'row');
                                            $learnership_name = $learnership?$learnership->name:"";

                                            $sublearnership = $this->common->accessrecord('learnership_sub_type', [], ['id'=>$value->learnershipSubType], 'row');
                                            $sublearnership_name = $sublearnership?$sublearnership->sub_type:"";

                                          $i++; ?>

                                            <tr id="del-<?= $value->id ?>">

                                                <td><?= $i ?></td>

                                                <td><?= $project_nm ?></td>

                                                <td><?= $learnership_name ?></td>

                                                <td><?= $sublearnership_name ?></td>

                                                <td><?= $value->expense_id ?></td>

                                                <td><?= $value->expense_type ?></td> 

                                                <td><?= $value->expense_name ?></td>

                                                <td><?= 'R  '.$value->expense_amount ?></td>

                                                <td><?= $value->date ?></td>

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

                                                    <a href="projectmanager-create-expense-item?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                   <?php if($res['is_delete']==1) { ?>
                                                    <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecord('finance_expense_item&behalf','id',<?= $value->id?>)"><i

                                                            class="fa fa-trash"></i></a>
                                                            <?php } ?>
                                                </td>

                                            </tr>

                                    <?php } } ?>

                            </table>

                        </div>

                        <?php if(!empty($count)){ ?>

                            <div class="btn btn-info">Total Expense : <?php 

                               if(!empty($count)){

                                echo $count->total_expense_amount;

                                }else{

                                 echo "0";

                                } 

                                ?>

                            </div>

                        <?php } ?>

                    </div>



                </div>



            </div>

            <div class="col-lg-3 mb-1"></div>

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
            var project_nm = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var learnership_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var sublearnership_name = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var expense_id = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
            var expense_type = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
  			var expense_name = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
            var expense_amount = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 
            var date = $(event.relatedTarget).closest("tr").find("td:eq(8)").text(); 
         
         
  			
  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Project Manager :</span><span class='pull-right'> " + project_nm + 
              "</div><div class=col-sm-12><span class='pull-left'>Learnership Name:</span><span class='pull-right'> " + learnership_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Sublearnership Name:</span><span class='pull-right'> " + sublearnership_name + 
              "</div><div class=col-sm-12><span class='pull-left'>Expense ID : </span><span class='pull-right'>" + expense_id + 
              "</div><div class=col-sm-12><span class='pull-left'>Expense Type  :</span><span class='pull-right'> " + expense_type + 
              "</div><div class=col-sm-12><span class='pull-left'>Expense Name :</span><span class='pull-right'> " + expense_name +
              "</div><div class=col-sm-12><span class='pull-left'>Expense  Amount: </span><span class='pull-right'>" + expense_amount +
              "</div><div class=col-sm-12><span class='pull-left'>Date:</span><span class='pull-right'> " + date +
              
               
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>