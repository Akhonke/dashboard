<nav class="navbar ms-navbar">
  <?php
  $master = $this->common->accessrecord('master_admin', [], ['id' => 1], 'row');

  ?>
  <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
  </div>
  <div class="logo-sn logo-sm ms-d-block-sm">
    <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.html"><img src="<?= base_url() ?>assets/super-admin/img/digilims-logo.png" alt="logo"> </a>
  </div>
  <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
    <li class="ms-nav-item dropdown">
      <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bell"></i></a>
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
        <li class="dropdown-menu-header">
          <?php
          $data = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'superadmin'], 'result');
          $msg = count($data);
          ?>
          <h6 class="dropdown-header ms-inline m-0"><span style="float:left;" class="text-disabled">Messages</span><span style="float:right;" class="badge badge-pill pull-right badge-info"><?= $msg ?> Total</span></h6>

        </li>
        <li class="dropdown-divider"></li>
        <!-- <li class="ms-scrollable ms-dropdown-list">
              
              <a class="media p-2" href="#">
                <div class="media-body">
                  <span>You have newly registered users</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45 minutes ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="media-body">
                  <span>Your account was logged in from an unauthorized IP</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2 hours ago</p>
                </div>
              </a>
              
            </li> -->
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer text-center">
          <a href="<?= base_url('superAdmin-inbox') ?>">View all messages</a>
        </li>
      </ul>
    </li>
    <li class="ms-nav-item ms-nav-user dropdown">
      <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img style="height:34px !important;" class="ms-user-img ms-img-round float-right" src="<?= base_url() ?>uploads/sadminprofile/<?= $master->profile_image ?>" alt="" width="34"> </a>
      <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, <?= $master->name ?></span></h6>
        </li>
        <li class="dropdown-divider"></li>
        <li class="ms-dropdown-list">
          <a class="media fs-14 p-2" href="<?= base_url('superAdmin-profile') ?>"> <span><i class="flaticon-user mr-2"></i> Profile</span> </a>

          <!-- <a class="media fs-14 p-2" href="#"> <span><i class="flaticon-gear mr-2"></i> Account Settings</span> </a>  -->
        </li>
        <li class="dropdown-divider"></li>
        <!-- <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="#"> <span><i class="flaticon-user mr-2"></i>Edit Profile</span> </a>
            </li> -->
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer">
          <a class="media fs-14 p-2" href="superAdmin-logout"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
        </li>
      </ul>
    </li>
  </ul>
  <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
    <span class="ms-toggler-bar bg-white"></span>
  </div>
</nav>