<header class="header">
    <?php $learner_id = $_SESSION['learner']['id'];

    $learner = $this->common->accessrecord('learner', [], array('id' => $learner_id), 'row');



    ?>
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="javascript:;" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="javascript:;" class="navbar-brand font-weight-bold text-uppercase text-base">

            <img src="<?  BASEURL ?>assets/images/logo1.png" width="60%">

        </a>

        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">



            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <?php if(!empty($learner->profile_image)){?>
                    <img src="<?= base_url() ?>/uploads/learner/profile_image/<?= $learner->profile_image ?>" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <?php }else{ ?>
                <img src="<?= base_url() ?>/uploads/learner/profile_image/no_image.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>

            <?php } ?>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?php

                                                                                                                                                                    echo $learner_nm = $learner->first_name . ' ' . $learner->surname;

                                                                                                                                                                    ?></strong><small></small></a>

                    <div class="dropdown-divider"></div><a href="<?= BASEURL ?>learner-changepassword" class="dropdown-item">Change Password</a>

                    <div class="dropdown-divider"></div><a href="<?= BASEURL ?>learner-editprofile" class="dropdown-item">Edit Profile</a>



                    <div class="dropdown-divider"></div><a href="<?= BASEURL ?>learner-logout" class="dropdown-item">Logout</a>

                </div>

            </li>

        </ul>

    </nav>

</header>