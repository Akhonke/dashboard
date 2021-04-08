<div class="col-md-12">
    <nav aria-label="breadcrumb" class="ms-panel-custome">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>

    </nav>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="ms-card">
        <div class="ms-card-body">
            <div class="media fs-14">
                <div class="mr-2 align-self-center">
                    <img src="<?=base_url()?>assets/super-admin/img/user(4).png" class="ms-img-round" alt="people">
                </div>
                <div class="media-body">
                    <h6>Michael Sullivan </h6>
                    <div class="dropdown float-right">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="ms-dropdown-list">
                                <a class="media p-2" href="<?=base_url('superAdmin-userDetail')?>">
                                    <div class="media-body">
                                        <span>View Details</span>
                                    </div>
                                </a>

                                <a class="media p-2" href="<?=base_url('superAdmin-editUser')?>">
                                    <div class="media-body">
                                        <span>Edit</span>
                                    </div>
                                </a>
                                <a class="media p-2" href="#">
                                    <div class="media-body">
                                        <span>Delete</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="fs-12 my-1 text-disabled">Free Plan</p>
                    <h6 class="mt-2">
                        <span class="fs-14">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        Unlimited</h6>
                    <h6 class="mt-2">
                        <span class="fs-14">
                            <i class="fas fa-envelope"></i>
                        </span>
                        user@gmail.com</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="ms-card">
        <div class="ms-card-body">
            <div class="media fs-14">
                <div class="mr-2 align-self-center">
                    <img src="<?=base_url()?>assets/super-admin/img/user(4).png" class="ms-img-round" alt="people">
                </div>
                <div class="media-body">
                    <h6>Linda Barrett</h6>
                    <div class="dropdown float-right">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                    <div class="media-body">
                                        <span>View Details</span>
                                    </div>
                                </a>

                                <a class="media p-2" href="#">
                                    <div class="media-body">
                                        <span>Edit</span>
                                    </div>
                                </a>
                                <a class="media p-2" href="#">
                                    <div class="media-body">
                                        <span>Delete</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="fs-12 my-1 text-disabled">Free Plan</p>
                    <h6 class="mt-2">
                        <span class="fs-14">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        Unlimited</h6>
                    <h6 class="mt-2">
                        <span class="fs-14">
                            <i class="fas fa-envelope"></i>
                        </span>
                        user@gmail.com</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Followers Widget -->
<div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh ms-widget">
        <div class="ms-panel-header">
            <h6>Active/Inactive Users</h6>
        </div>
        <div class="ms-panel-body p-0">
            <ul class="ms-followers ms-list ms-scrollable">
                <li class="ms-list-item media">
                    <img src="<?=base_url()?>assets/super-admin/img/user(4).png" class="ms-img-small ms-img-round" alt="people">
                    <div class="media-body mt-1">
                        <h4>James Zathila</h4>

                    </div>
                    <button type="button" class="ms-btn-icon btn-info" name="button"><i class="material-icons">person_add</i> </button>
                </li>
                <li class="ms-list-item media">
                    <img src="<?=base_url()?>assets/super-admin/img/user(4).png" class="ms-img-small ms-img-round" alt="people">
                    <div class="media-body mt-1">
                        <h4>John Doe</h4>

                    </div>
                    <button type="button" class="ms-btn-icon btn-success" name="button"><i class="material-icons">check</i> </button>
                </li>
                <li class="ms-list-item media">
                    <img src="<?=base_url()?>assets/super-admin/img/user(4).png" class="ms-img-small ms-img-round" alt="people">
                    <div class="media-body mt-1">
                        <h4>Khadiza Rehna</h4>

                    </div>
                    <button type="button" class="ms-btn-icon btn-info" name="button"><i class="material-icons">person_add</i> </button>
                </li>
               
            </ul>
        </div>
    </div>
</div>