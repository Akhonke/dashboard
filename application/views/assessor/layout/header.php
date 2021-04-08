<header class="header">
<?php
                            $assessor_id = $_SESSION['assessor']['id'];
                            $assessor = $this->common->accessrecord('assessor', [], array('id'=>$assessor_id), 'row');
                           
                            ?>
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a  href="javascript:;" class="navbar-brand font-weight-bold text-uppercase text-base">
    <img src="<?= BASEURL ?>assets/images/logo1.png" width="60%"></a>
        <!-- <a href="javascript:;"
            class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a
            href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">LEARNING(assessor)</a> -->
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
           
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="javascript:;" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img
                        src="<?=base_url()?>uploads/assessor/profile_image/<?=$assessor->profile_image?>" alt="Jason Doe" style="max-width: 2.5rem;"
                        class="img-fluid rounded-circle shadow"></a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong
                            class="d-block text-uppercase headings-font-family"><?php
                            
                            echo $assessor->fullname .' '.$assessor->surname;
                            ?></strong><small>Assessor</small></a>
                    <div class="dropdown-divider"></div><a href="<?= base_url('assessor-changepassword'); ?>" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div><a href="<?= base_url('assessor-editprofile'); ?>" class="dropdown-item">Edit Profile</a>
               <!-- <a href="#"
                        class="dropdown-item">Activity log </a> -->
                    <div class="dropdown-divider"></div><a href="assessor-logout" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>