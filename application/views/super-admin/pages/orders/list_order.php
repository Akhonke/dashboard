<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
      <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Order History</li>
      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
         <h6>Order History List</h6>
      </div>
      <div class="ms-panel-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="MYtable">
               <thead>
                  <tr>
                     <th scope="col">S.No.</th>
                     <th scope="col">User Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Package Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Start Date</th>
                     <th scope="col">End Date</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i =1;  foreach($organisation as $cu){ ?>
                  <tr>
                     <td>$i</td>
                     <td><?php echo $cu->fullname."  " .$cu->surname;?></td>
                     <td><?php echo $cu->email_address;?></td>
                     <td><?php echo ucwords(strtolower($cu->packageName));?></td>
                     <td><?php echo $cu->packagePrice;?></td>
                     <td><?php echo $cu->packageCreatedDate;?></td>
                     <td><?php echo $cu->packageExpiryDate;?></td>
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

        debugger;
  
  		$("#exampleModal").modal({
  			keyboard: true,
  			backdrop: "static",
  			show: false,
  
  		}).on("show.bs.modal", function(event){
  		  var button = $(event.relatedTarget); // button the triggered modal
  			var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var fullname = $(event.relatedTarget).closest("tr").find("td:eq(1)").text(); 
  			var email_address = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); 
            var packageName = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); 
            var packagePrice = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); 
  			var packageCreatedDate = $(event.relatedTarget).closest("tr").find("td:eq(5)").text(); 
            var packageExpiryDate = $(event.relatedTarget).closest("tr").find("td:eq(6)").text(); 
 
           
  			//displays values to modal
              $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>User Name :</span><span class='pull-right'>" + fullname + 
              "</div><div class=col-sm-12><span class='pull-left'>Email :</span><span class='pull-right'> " + email_address + 
              "</div><div class=col-sm-12><span class='pull-left'>Package Name :</span><span class='pull-right'> " + packageName + 
              "</div><div class=col-sm-12><span class='pull-left'>Price :</span><span class='pull-right'> " + packagePrice + 
              "</div><div class=col-sm-12><span class='pull-left'>Start Date : </span><span class='pull-right'>" + packageCreatedDate + 
              
            "</div><div class=col-sm-12><span class='pull-left'>End Date : </span><span class='pull-right'>" + packageExpiryDate +
                 
            "</span></div></div></span>"))
  		}).on("hide.bs.modal", function (event) {
			$(this).find("#personDetails").html("");
		});
    }
</script>