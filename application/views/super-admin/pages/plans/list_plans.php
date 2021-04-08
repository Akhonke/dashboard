<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item"><a href="#">Plan</a></li>
         <li class="breadcrumb-item active" aria-current="page">Plan List</li>
      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
         <h6>Plan</h6>
         <?php if ($this->session->flashdata('success')) { ?>
         <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
         </div>
         <?php }?>
      </div>
      <div class="ms-panel-body">
         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Duration</th>
                     <!--<th scope="col">Limit</th>-->
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     foreach($coupon as $cu){
                         
                     
                     ?>
                  <tr>
                     <td><?php echo $cu->name;?></td>
                     <td><?php echo $cu->price;?></td>
                     <td><?php echo $cu->duration;?></td>
                     <!--<td><?php echo $cu->limits;?></td>-->
                     <td>
                        <a href='<?=base_url('superAdmin-couponDetail')?>'><i class='fas fa-eye ms-text-primary'></i></a>
                        <a href='<?=base_url('superAdmin-editCoupon')?>'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                        <a href='#'><i class='fas fa-trash  ms-text-danger'></i></a>
                     </td>
                  </tr>
                  <?php }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>