<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">OUR CUSTOMERS LOGO List</li>
      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
         <h6>Our Customers Logo</h6>
         <a href="<?=base_url('superAdmin-our-customer-logo')?>" class="ms-text-primary">Add</a>
         <?php if ($this->session->flashdata('success')) { ?>
         <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
         </div>
         <?php }?>
      </div>
      <div class="ms-panel-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="MYtable">
               <thead>
                  <tr>
                     <th scope="col">Sr. Number</th>
                     <th scope="col">Logo</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i=1; foreach($logo as $cu){ ?>
                  <tr>
                     <td><?php echo $i;?></td>
                     <td> <img src="<?php echo base_url('uploads/OurCustomersLogo/').$cu->logo; ?>" alt="price" width="120" class="img-fluid"></td>
                     <td><a href='#'><i onclick="delete_logo('<?php echo $cu->id;?>')" class='fas fa-trash  ms-text-danger'></i></a></td>
                     <!--  <td>
                        <a href='<?=base_url('superAdmin-couponDetail')?>'><i class='fas fa-eye ms-text-primary'></i></a>
                         <a href='<?=base_url('superAdmin-editCoupon')?>'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                          <a href='#'><i class='fas fa-trash  ms-text-danger'></i></a>
                        </td> -->
                  </tr>
                  <?php $i++; } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<link href="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.js"></script>
<script src="<?php echo BASEURL ?>assets/admin/sweetalert/sweetalert.min.js"></script>               
<script type="text/javascript">
   function delete_logo(id){
    var result = confirm("Want to delete?");
    if (result){
              $.ajax({
                  type: 'POST',
                  url: 'SuperAdmin/delete_logo',
                  data: {id:id},
                  datatype:'json',
                  success: function(resultData){ 
                            if(resultData){  
                                        swal({
                                               title: "Done!",
                                               text: "logo Delete Successfully!",
                                               type: "success",
                                               timer: 2000,
                                               showConfirmButton: false
                                             }, function(){
                                                     location.reload();
                                             });
                            }else {
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