<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
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
                     <th scope="col">User Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Package Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Start Date</th>
                     <th scope="col">End Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($organisation as $cu){ ?>
                  <tr>
                     <td><?php echo $cu->fullname."  " .$cu->surname;?></td>
                     <td><?php echo $cu->email_address;?></td>
                     <td><?php echo ucwords(strtolower($cu->packageName));?></td>
                     <td><?php echo $cu->packagePrice;?></td>
                     <td><?php echo $cu->packageCreatedDate;?></td>
                     <td><?php echo $cu->packageExpiryDate;?></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>