<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard') ?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
         <h6>Users</h6>
      </div>
      <div class="ms-panel-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="MYtable">
               <thead>
                  <tr>
                     <th>S. Num.</th>
                     <th scope="col">Name</th>
                     <th scope="col">Email Address</th>
                     <th scope="col">Mobile Number</th>
                     <th scope="col">Package Name</th>
                     <th scope="col">Package Start Date</th>
                     <th scope="col">Package End Date</th>
                     <th scope="col">Package Price</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($organisation as $cu) { ?>
                     <tr>
                        <td></td>
                        <td><?php echo $cu->fullname; ?>&nbsp;&nbsp;<?php echo $cu->surname; ?></td>
                        <td><?php echo $cu->email_address; ?></td>
                        <td><?php echo $cu->mobile_number; ?></td>
                        <td><?php echo ucwords(strtolower($cu->packageName)); ?></td>
                        <td><?php echo $cu->packageCreatedDate; ?></td>
                        <td><?php echo $cu->packageExpiryDate; ?></td>
                        <td><?php echo $cu->packagePrice; ?></td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="view()" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>



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

                           <!-- <a href='<?= base_url('superAdmin-editCoupon') ?>'><i class='fas fa-pencil-alt ms-text-primary'></i></a> -->
                           <a href='#'><i onclick="delete_user('<?php echo $cu->id; ?>')" class='fas fa-trash  ms-text-danger'></i></a>
                           <?php if ($cu->status == 0) { ?> <button class="btn btn-info" onclick="active_user('<?php echo $cu->id; ?>')">Activated</button> <?php } ?>
                           <?php if ($cu->status == 1) { ?><button class="btn btn-danger" onclick="inactive_user('<?php echo $cu->id; ?>')">Deactivated</button> <?php } ?>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<script>
   function view() {

      //   debugger;

      $("#exampleModal").modal({
         keyboard: true,
         backdrop: "static",
         show: false,

      }).on("show.bs.modal", function(event) {
         var button = $(event.relatedTarget); // button the triggered modal
         var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
         var fullname = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
         var email_address = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
         var mobile_number = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
         var packageName = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
         var packageCreatedDate = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
         var packageExpiryDate = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
         // var img = $(event.relatedTarget).closest("tr").find("td:eq(7).image-col img").attr("src");


         // var warning_letter = $(event.relatedTarget).closest("tr").find("td:eq(8).image-col1 img").attr("src");
         var packagePrice = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();

         $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Name :</span><span class='pull-right'> " + fullname +
            "</div><div class=col-sm-12><span class='pull-left'>Email Address :</span><span class='pull-right'> " + email_address +
            "</div><div class=col-sm-12><span class='pull-left'>Mobile Number :</span><span class='pull-right'> " + mobile_number +
            "</div><div class=col-sm-12><span class='pull-left'>Package Name  : </span><span class='pull-right'>" + packageName +
            "</div><div class=col-sm-12><span class='pull-left'>Package Start Date  :</span><span class='pull-right'> " + packageCreatedDate +
            "</div><div class=col-sm-12><span class='pull-left'>Package End Date  : </span><span class='pull-right'>" + packageExpiryDate +

            "</div><div class=col-sm-12><span class='pull-left'>Package Price :</span><span class='pull-right'> " + packagePrice +

            "</span></div></div></span>"))
      }).on("hide.bs.modal", function(event) {
         $(this).find("#personDetails").html("");
      });
   }
</script>


<link href="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.js"></script>
<script src="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
   function active_user(id) {
      debugger;
      $.ajax({
         type: 'POST',
         url: 'SuperAdmin/active_user',
         data: {
            id: id
         },
         datatype: 'json',
         success: function(resultData) {
            if (resultData) {
               swal({
                  title: "Done!",
                  text: "User Deactivate Successfully!",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
               }, function() {
                  location.reload();
               });
            } else {
               swal({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  footer: '<p>Please Try Again<p>'
               })
            }
         }
      });
   }

   function inactive_user(id) {
      $.ajax({
         type: 'POST',
         url: 'SuperAdmin/inactive_user',
         data: {
            id: id
         },
         datatype: 'json',
         success: function(resultData) {
            alert(resultData);
            if (resultData) {
               swal({
                  title: "Done!",
                  text: "User Activated Successfully!",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
               }, function() {
                  location.reload();
               });
            } else {
               swal({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  footer: '<p>Please Try Again<p>'
               })
            }
         }
      });
   }

   function delete_user(id) {
      var result = confirm("Want to delete?");
      // debugger;
      if (result) {
         $.ajax({
            type: 'POST',
            url: 'SuperAdmin/delete_user',
            data: {
               id: id
            },
            datatype: 'json',
            success: function(resultData) {
               if (resultData) {
                  swal({
                     title: "Done!",
                     text: "User Delete Successfully!",
                     type: "success",
                     timer: 2000,
                     showConfirmButton: false
                  }, function() {
                     location.reload();
                  });
               } else {
                  swal({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Something went wrong!',
                     footer: '<p>Please Try Again<p>'
                  })
               }
            }
         });
      }
   }
</script>