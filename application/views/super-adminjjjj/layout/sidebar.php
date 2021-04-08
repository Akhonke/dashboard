<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="index.html"> <img src="<?=base_url()?>assets/super-admin/img/digilims-logo.png" alt="logo"> </a>
      <a href="#" class="text-center ms-logo-img-link"> <img src="<?=base_url()?>assets/super-admin/img/user(4).png" alt="logo"></a>
      <h5 class="text-center text-white mt-2">John Doe</h5>
      <h6 class="text-center text-white mb-3">Super Admin</h6>
    </div>
  
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    
       <li class="menu-item">
        <a href="<?=base_url('superAdmin-dashboard')?>">
          <span><i class="material-icons fs-16">dashboard</i>Dashboard</span>
        </a>
      </li>
     
      <li class="menu-item">
        <a href="<?=base_url('superAdmin-userList')?>">
          <span><i class="material-icons fs-16">dashboard</i>Users</span>
        </a>
       
      </li>
    
      <li class="menu-item">
        <a href="" class="has-chevron" data-toggle="collapse" data-target="#Plans" aria-expanded="false" aria-controls="Plans">
          <span><i class="material-icons fs-16">dashboard</i>Plans</span>
        </a>
        <ul id="Plans" class="collapse" aria-labelledby="Plans" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-addPlan')?>">Add Plans</a> </li>
          <li> <a href="<?=base_url('superAdmin-planList')?>">Plans List</a> </li>
        </ul>
      </li>
       <li class="menu-item">
        <a href="<?=base_url('superAdmin-orderList')?>">
          <span><i class="material-icons fs-16">dashboard</i>Order</span>
        </a>
       
      </li>
     
  
      <li class="menu-item">
        <a href="coupon.html" class="has-chevron" data-toggle="collapse" data-target="#Coupons" aria-expanded="false" aria-controls="Coupons">
          <span><i class="material-icons fs-16">dashboard</i>Coupons</span>
        </a>
        <ul id="Coupons" class="collapse" aria-labelledby="Coupons" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-addCoupon')?>">Add Coupons</a> </li>
          <li> <a href="<?=base_url('superAdmin-couponList')?>">Coupons List</a> </li>
        </ul>
      </li>
    
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#payment" aria-expanded="false" aria-controls="payment">
          <span><i class="material-icons fs-16">dashboard</i>Payment</span>
        </a>
        <ul id="payment" class="collapse" aria-labelledby="payment" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-addPayment')?>">Add Payment</a> </li>
          <li> <a href="<?=base_url('superAdmin-paymentList')?>">Payment List</a> </li>
          <li> <a href="<?=base_url('superAdmin-paypal')?>">Paypal</a> </li>
          <li> <a href="<?=base_url('superAdmin-skrills')?>">Skrill</a> </li>
          <li> <a href="<?=base_url('superAdmin-payment_gateway')?>">Local or International Payment Getway</a> </li>
        </ul>
      </li>
  
      <li class="menu-item">
        <a href="setting.html" class="has-chevron" data-toggle="collapse" data-target="#Settings" aria-expanded="false" aria-controls="Settings">
          <span><i class="material-icons fs-16">dashboard</i>Settings</span>
        </a>
        <ul id="Settings" class="collapse" aria-labelledby="Settings" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-slider')?>">Slider</a> </li>
          <li> <a href="<?=base_url('superAdmin-logo')?>">Logo</a> </li>
          <li> <a href="<?=base_url('superAdmin-blog')?>">Blog</a> </li>
        </ul>
      </li>
       <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Email" aria-expanded="false" aria-controls="email">
          <span><i class="material-icons fs-16">dashboard</i>Email templates</span>
        </a>
        <ul id="Email" class="collapse" aria-labelledby="email" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-addEmail')?>">Add Email templates</a> </li>
          <li> <a href="<?=base_url('superAdmin-emailList')?>">Email templates List</a> </li>
        </ul>
      </li>
       <li class="menu-item">
        <a href="<?=base_url('superAdmin-ticketList')?>">
          <span><i class="material-icons fs-16">dashboard</i>Total tickets</span>
        </a>
      </li>
      <li class="menu-item">
        <a href="<?=base_url('superAdmin-leadList')?>">
          <span><i class="material-icons fs-16">dashboard</i>Total Leads</span>
        </a>
      </li>
      <li class="menu-item">
        <a href="<?=base_url('superAdmin-invoiceList')?>">
          <span><i class="material-icons fs-16">dashboard</i>Total Invoice</span>
        </a>
      </li>
      
      <!-- Report -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="report">
          <span><i class="material-icons fs-16">dashboard</i>Report</span>
        </a>
        <ul id="report" class="collapse" aria-labelledby="report" data-parent="#side-nav-accordion">
          <li> <a href="<?=base_url('superAdmin-payment_history')?>">Payment History</a> </li>
          <li> <a href="<?=base_url('superAdmin-order_history')?>">Order History</a> </li>
          <li> <a href="<?=base_url('superAdmin-paid_and_free_user')?>">Paid & Free users</a> </li>

        </ul>
      </li>
      <!-- /Report -->
    
      
    </ul>
  </aside>