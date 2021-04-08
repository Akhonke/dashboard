<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
<div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
  <?php
  $master = $this->common->accessrecord('master_admin', [], ['id' => 1], 'row');

  ?>
  <div class="logo-sn ms-d-block-lg">
    <a class="pl-0 ml-0 text-center" href="<?= base_url('superAdmin-dashboard') ?>"> <img src="<?= base_url() ?>assets/super-admin/img/digilims-logo.png" alt="logo"> </a>
    <a href="#" class="text-center ms-logo-img-link"> <img src="<?= base_url() ?>uploads/sadminprofile/<?= $master->profile_image ?>" alt="logo"></a>
    <h5 class="text-center text-white mt-2"><?= $master->name ?></h5>
    <h6 class="text-center text-white mb-3"><?= $master->email_address ?></h6>
  </div>

  <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-dashboard') ?>" title="From Here You Can See Dashboard">
        <span><i class="material-icons fs-16">dashboard</i>Dashboard</span>
      </a>
    </li>

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-userList') ?>" title="From Here You Can See Superadmin UserList">
        <span><i class="material-icons fs-16">dashboard</i>Users</span>
      </a>
    </li>

    <!--   <li class="menu-item">
        <a href="" class="has-chevron" data-toggle="collapse" data-target="#Plans" aria-expanded="false" aria-controls="Plans">
          <span><i class="material-icons fs-16">dashboard</i>Plans</span>
        </a>
        <ul id="Plans" class="collapse" aria-labelledby="Plans" data-parent="#side-nav-accordion">
          <li> <a href="<?= base_url('superAdmin-plan') ?>">Plans</a> </li>
           <li> <a href="<?= base_url('superAdmin-addPlan') ?>">Add Plans</a> </li>
           <li> <a href="<?= base_url('superAdmin-planList') ?>">Plans List</a> </li>  
        </ul>
      </li> -->

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-plan') ?>" title="From Here You Can See Plan List">
        <span><i class="material-icons fs-16">dashboard</i>Plan</span>
      </a>
    </li>

    <!-- <li class="menu-item">
      <a href="<?= base_url('superAdmin-orderList') ?>">
        <span><i class="material-icons fs-16">dashboard</i>Order</span>
      </a>
    </li> -->

    <!-- <li class="menu-item">
      <a href="<?= base_url('superAdmin-sendMassage') ?>">
        <span><i class="material-icons fs-16">dashboard</i>Message</span>
      </a>
    </li> -->

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-sendMassage') ?>" title="From Here You Can Send Message" class="has-chevron" data-toggle="collapse" data-target="#messagesection" aria-expanded="false" aria-controls="messagesection">
        <span><i class="material-icons fs-16">dashboard</i>Message</span>
      </a>
      <ul id="messagesection" class="collapse" aria-labelledby="messagesection" data-parent="#side-nav-accordion">
        <li> <a href="<?= base_url('superAdmin-sendMassage') ?>" title="From Here You Can Compose Message">Compose Message</a> </li>
        <li> <a href="<?= base_url('superAdmin-sentbox') ?>" title="From Here You Can See Sent Message">Sent Box</a> </li>
        <li> <a href="<?= base_url('superAdmin-inbox') ?>" title="From Here You Can See Inbox Message">Inbox</a> </li>
        <!-- <li> <a href="<?= base_url('superAdmin-trash') ?>">Trash</a> </li>
        <li> <a href="<?= base_url('superAdmin-important') ?>">Important</a> </li> -->


      </ul>
    </li>
    <li class="menu-item">
      <a href="<?= base_url('superAdmin-sendMassage') ?>" title="From Here You Can Send Message And Email In Bulk" class="has-chevron" data-toggle="collapse" data-target="#bulkmessagesection" aria-expanded="false" aria-controls="bulkmessagesection">
        <span><i class="material-icons fs-16">dashboard</i>Bulk Messages and Emails</span>
      </a>
      <ul id="bulkmessagesection" class="collapse" aria-labelledby="bulkmessagesection" data-parent="#side-nav-accordion">
        <li> <a href="<?= base_url('superAdmin-sendBulkMassage') ?>" title="From Here You Can Send Message In Bulk">Send Bulk Messages</a> </li>
        <li> <a href="<?= base_url('superAdmin-sendBulkEmails') ?>" title="From Here You Can Send Email In Bulk">Send Bulk Emails</a> </li>
      </ul>
    </li>


    <!-- <li class="menu-item">
      <a href="coupon.html" class="has-chevron" data-toggle="collapse" data-target="#Coupons" aria-expanded="false" aria-controls="Coupons">
        <span><i class="material-icons fs-16">dashboard</i>Coupons</span>
      </a>
      <ul id="Coupons" class="collapse" aria-labelledby="Coupons" data-parent="#side-nav-accordion">
        <li> <a href="<?= base_url('superAdmin-addCoupon') ?>">Add Coupons</a> </li>
        <li> <a href="<?= base_url('superAdmin-couponList') ?>">Coupons List</a> </li>
      </ul>
    </li> -->

    <!--  <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#payment" aria-expanded="false" aria-controls="payment">
          <span><i class="material-icons fs-16">dashboard</i>Payment</span>
        </a>
        <ul id="payment" class="collapse" aria-labelledby="payment" data-parent="#side-nav-accordion">
          <li> <a href="<?= base_url('superAdmin-addPayment') ?>">Add Payment</a> </li>
          <li> <a href="<?= base_url('superAdmin-paymentList') ?>">Payment List</a> </li>
          <li> <a href="<?= base_url('superAdmin-paypal') ?>">Paypal</a> </li>
          <li> <a href="<?= base_url('superAdmin-skrills') ?>">Skrill</a> </li>
          <li> <a href="<?= base_url('superAdmin-payment_gateway') ?>">Local or International Payment Getway</a> </li>
        </ul>
      </li> -->

    <li class="menu-item">
      <a href="setting.html" class="has-chevron" title="SuperAdmin Settings" data-toggle="collapse" data-target="#Settings" aria-expanded="false" aria-controls="Settings">
        <span><i class="material-icons fs-16">dashboard</i>Settings</span>
      </a>
      <ul id="Settings" class="collapse" aria-labelledby="Settings" data-parent="#side-nav-accordion">
        <!--  <li> <a href="<?= base_url('superAdmin-slider') ?>">Slider</a> </li>
          <li> <a href="<?= base_url('superAdmin-logo') ?>">Logo</a> </li>
          <li> <a href="<?= base_url('superAdmin-blog') ?>">Blog</a> </li> -->
        <li> <a href="<?= base_url('superAdmin-our-customer-logo-list') ?>" title="Customers Logo List">Our Customers Logo</a> </li>
      </ul>
    </li>

    <!--  <li class="menu-item">
          <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Email" aria-expanded="false" aria-controls="email">
          <span><i class="material-icons fs-16">dashboard</i>Email templates</span>
        </a>
        <ul id="Email" class="collapse" aria-labelledby="email" data-parent="#side-nav-accordion">
             <li> <a href="<?= base_url('superAdmin-addEmail') ?>">Add Email templates</a> </li>
          <li> <a href="<?= base_url('superAdmin-emailList') ?>">Email templates List</a> </li>
        </ul>
      </li> -->

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-ticketList') ?>" title="From Here You Can See Total Enquiry">
        <span><i class="material-icons fs-16">dashboard</i>Total Enquiry</span>
      </a>
    </li>

    <!-- <li class="menu-item">
        <a href="<?= base_url('superAdmin-leadList') ?>">
          <span><i class="material-icons fs-16">dashboard</i>Total Leads</span>
        </a>
      </li> -->

    <li class="menu-item">
      <a href="<?= base_url('superAdmin-invoiceList') ?>" title="From Here You Can see Total Invoice">
        <span><i class="material-icons fs-16">dashboard</i>Total Invoice</span>
      </a>
    </li>

    <!-- Report -->
    <li class="menu-item">
      <a href="#" class="has-chevron" title="From Here You Can See Report" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="report">
        <span><i class="material-icons fs-16">dashboard</i>Report</span>
      </a>
      <ul id="report" class="collapse" aria-labelledby="report" data-parent="#side-nav-accordion">
        <!--     <li> <a href="<?= base_url('superAdmin-payment_history') ?>">Payment History</a> </li> -->
        <li> <a href="<?= base_url('superAdmin-orderList') ?>" title="From Here You Can See Order History">Order History</a> </li>
        <li> <a href="<?= base_url('superAdmin-paid_and_free_user') ?>" title="From Here You Can See Paid and Free users">Paid and Free users</a> </li>
      </ul>
    </li>
    <!-- /Report -->

    <!-- Bank -->
    <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" title="From Here You Can Manage Banking" data-target="#bank" aria-expanded="false" aria-controls="bank">
        <span><i class="material-icons fs-16">dashboard</i>Manage Banking</span>
      </a>
      <ul id="bank" class="collapse" aria-labelledby="bank" data-parent="#side-nav-accordion">
        <li> <a href="<?= base_url('superAdmin-addBank') ?>" title="From Here You Can Create Bank ">Create Bank</a> </li>
        <li> <a href="<?= base_url('superAdmin-banklist') ?>" title="From Here You Can See Bank Lsit">Banks LIst</a> </li>
      </ul>
    </li>
    <!-- /Bank -->

    <!-- Locations -->
    <li class="menu-item">
      <a href="#" class="has-chevron" title="From Here You Can Manage Your Location" data-toggle="collapse" data-target="#locations" aria-expanded="false" aria-controls="locations">
        <span><i class="material-icons fs-16">dashboard</i>Manage Locations</span>
      </a>
      <ul id="locations" class="collapse" aria-labelledby="locations" data-parent="#side-nav-accordion">
        <li><a href="<?= base_url('create_province') ?>" title="From Here You Can Create Province"> Province</a></li>
        <li><a href="<?= base_url('create_district') ?>" title="From Here You Can Create District"> District</a></li>
        <!-- <li><a href="<?= base_url('create_region') ?>" title="From Here You Can Create Region"> Region</a></li> -->
        <li><a href="<?= base_url('create_city') ?>" title="From Here You Can Create City"> City</a></li>
        <li><a href="<?= base_url('create_municipality') ?>" title="From Here You Can Create Municipality"> Municipality</a></li>

      </ul>
    </li>
    <!-- /Locations -->



  </ul>
</aside>