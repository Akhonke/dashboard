

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Account Balance List</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">



                        <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Total Income Item</th>

                                    <th>Total Expense Item</th>

                                    <th>Remaining Amount</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($record)) { 

                                    foreach ($record as $key => $value) {

                                    $i = 0;

                                        if((!empty($value->total_income))&&(!empty($value->expense_amount))){

                                            $remaining_amount = $value->total_income-$value->expense_amount;

                                        }else{

                                            $remaining_amount = "0";

                                        }

                                    $i++;

                                    ?>

                                        <tr>

                                            <td><?= $i ?></td>

                                            <td><?php if (!empty($value->total_income)) { ?><a href="income-item-list" class="btn btn-info btn-sm"><?='R ' . $value->total_income ?></a><?php } ?></td>

                                            <td><?php if (!empty($value->expense_amount)) { ?><a href="expense-item-list" class="btn btn-info btn-sm"><?='R ' . $value->expense_amount ?></a><?php } ?></td> 

                                            <td><?='R ' . $remaining_amount ?></td>
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

                                <?php }  } ?>

                        </table>



                    </div>

                    </div>



                </div>



            </div>

            <div class="col-lg-3 mb-1"></div>

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
            var total_income = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
            var expense_amount = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
  			var remaining_amount = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            
            // var landline = $(event.relatedTarget).closest("tr").find("td:eq(16)").text(); 
           
          
  			  		
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Total Income Item : </span><span class='pull-right'>  " + total_income + 
              "</div><div class=col-sm-12><span class='pull-left'>Total Expense Item :</span><span class='pull-right'>  " + expense_amount + 
              "</div><div class=col-sm-12><span class='pull-left'>Remaining Amount :</span><span class='pull-right'>  " + remaining_amount + 
            
             
              "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>
