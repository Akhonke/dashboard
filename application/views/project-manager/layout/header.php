<?php 
    $learner_id =$_SESSION['projectmanager']['id'];
    $learner = $this->common->accessrecord(TBL_Project_Manager, [], array('id'=>$learner_id), 'row');

?>


<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="javascript:;"
            class="sidebar-toggler text-gray-500 mr-2 mr-lg-3 lead"><i class="fas fa-align-left"></i></a>
            <a  href="javascript:;" class="navbar-brand font-weight-bold text-uppercase text-base">
    <img src="<?= BASEURL ?>assets/images/logo1.png" width="60%"></a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
           
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="javascript:;" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    <?php if($this->session->userdata('user_image')){ ?>
                        <img src="<?php echo base_url('uploads/project/projectmanager_pic/'.$this->session->userdata('user_image')); ?>" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                    <?php  }else if(!empty($learner->profile_pic)){ ?>
                        <img src="<?php echo base_url('uploads/project/projectmanager_pic/'.$learner->profile_pic); ?>" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                    <?php  }else{ ?> 
                        <img src="assets/admin/cloudfront/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                    <?php }?>
                    </a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong
                            class="d-block text-uppercase headings-font-family">
                            <?php 
                            
                        if(isset($_SESSION['projectmanager']['logintype']))
                        {
                            echo $this->session->userdata['projectmanager']['first_name'].' '.$this->session->userdata['projectmanager']['second_name'];
                            $usertype = 'User';

                        }else
                        {
                            $project_id =projectmanagerid();
                            $project = $this->common->accessrecord('project_manager', [], array('id'=>$project_id), 'row');
                            echo $project_nm=$project->fullname.' '.$project->surname; 
                            $usertype = 'Project Manager';
                        } ?>
                        </strong><small><?= $usertype ?></small></a>
                    <div class="dropdown-divider"></div><a href="<?=BASEURL?>projectmanager-changepassword" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div><a href="<?=BASEURL?>projectmanager-editprofile" class="dropdown-item">Edit Profile</a>
                    <!-- <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a> -->
                    <div class="dropdown-divider"></div><a href="<?=BASEURL?>projectmanager-logout" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>