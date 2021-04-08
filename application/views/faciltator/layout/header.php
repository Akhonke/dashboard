<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a  href="javascript:;" class="navbar-brand font-weight-bold text-uppercase text-base">
    <img src="<?= BASEURL ?>assets/images/logo1.png" width="60%"></a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
            <!-- <li class="nav-item">
                <form id="searchForm" class="ml-auto d-none d-lg-block">
                    <div class="form-group position-relative mb-0">
                        <button type="submit" style="top: -3px; left: 0;"
                            class="position-absolute bg-white border-0 p-0"><i
                                class="o-search-magnify-1 text-gray text-lg"></i></button>
                        <input type="search" placeholder="Search ..."
                            class="form-control form-control-sm border-0 no-shadow pl-4">
                    </div>
                </form>
            </li> -->
            <!-- <li class="nav-item dropdown mr-3"><a id="notifications" href="javascript:;" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i
                        class="fa fa-bell"></i><span class="notification-icon"></span></a>
                <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                            <div class="text ml-2">
                                <p class="mb-0">You have 2 followers</p>
                            </div>
                        </div>
                    </a><a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                            <div class="text ml-2">
                                <p class="mb-0">You have 6 new messages</p>
                            </div>
                        </div>
                    </a><a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                            <div class="text ml-2">
                                <p class="mb-0">Server rebooted</p>
                            </div>
                        </div>
                    </a><a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                            <div class="text ml-2">
                                <p class="mb-0">You have 2 followers</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small
                            class="font-weight-bold headings-font-family text-uppercase">View all
                            notifications</small></a>
                </div>
            </li> -->
            <?php
                            $facilitator_id = $_SESSION['facilitator']['id'];
                            $facilitator = $this->common->accessrecord('facilitator', [], array('id'=>$facilitator_id), 'row');
                     
                            ?>
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="javascript:;" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img
                        src="<?=base_url()?>uploads/facilitator/profile_image/<?=$facilitator->profile_image?>" alt="Jason Doe" style="max-width: 2.5rem;"
                        class="img-fluid rounded-circle shadow"></a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong
                            class="d-block text-uppercase headings-font-family"><?php
                            echo $facilitator->fullname .' '.$facilitator->surname;
                            ?></strong><small></small></a>
                    <div class="dropdown-divider"></div><a href="<?= base_url('Faciltator-changepassword'); ?>" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div><a href="<?= base_url('Faciltator-editprofile'); ?>" class="dropdown-item">Edit Profile</a>
                    <!-- <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a> -->
                    <!-- <a href="#"
                        class="dropdown-item">Activity log </a> -->
                    <div class="dropdown-divider"></div><a href="Faciltator-logout" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>