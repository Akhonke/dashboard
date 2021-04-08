<?php if(!isset($_SESSION['admin']['trainer_id'])){ redirect('provider-logout'); } ?>

<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="javascript:;"
            class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a>
            <a href="javascript:;" class="navbar-brand font-weight-bold text-uppercase text-base">
            <img src="<?= BASEURL ?>assets/images/logo1.png" width="60%">
        </a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
        
           <?php
           
           $trainer_id =$_SESSION['admin']['trainer_id'];
                            $trainer = $this->common->accessrecord('trainer', [], array('id'=>$trainer_id), 'row');
           ?>
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="javascript:;" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img
                        src="<?=base_url()?>uploads/training/<?=$trainer->profile_image?>" alt="Jason Doe" style="max-width: 2.5rem;"
                        class="img-fluid rounded-circle shadow"></a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong
                            class="d-block text-uppercase headings-font-family">
                          <?php 

                            if(isset($_SESSION['admin']['logintype'])){
                               echo $this->session->userdata['admin']['first_name'].' '.$this->session->userdata['admin']['second_name'];?>
                             
                            
                        </strong><small>Trainer</small></a>
                   
                      <?php }else{ 
                            
                            echo $trainer->full_name; ?>
                            
                             </strong><small>Trainer</small></a>
                              <div class="dropdown-divider"></div><a href="<?= base_url('change-passowrd'); ?>" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div><a href="<?= base_url('provider-editprofile'); ?>" class="dropdown-item">Edit Profile</a>
                           <?php    }
                            ?>
                    
                    <div class="dropdown-divider"></div><a href="provider-logout" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>