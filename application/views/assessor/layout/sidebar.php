<?php
$assessor_id = $_SESSION['assessor']['id'];
$assessor = $this->db->where('id',  $assessor_id)->get('assessor')->result();
$organisation = $this->db->where('id', $assessor[0]->organization)->get('organisation')->result();
$plan = $this->db->where('id', $organisation[0]->packageId)->get('plan')->result();


                            $assessora = $this->common->accessrecord('assessor', [], array('id'=>$assessor_id), 'row');

                            ?>
<div id="sidebar" class="sidebar py-3">
   <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"><?php

                            echo $assessora->fullname .' '.$assessora->surname;
                            ?></div>
   <ul class="sidebar-menu list-unstyled">
      <li class="sidebar-list-item">
         <a href="<?= BASEURL ?>assessor-dashboard" title="From Here You Can See Dashboard"  class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a>
      </li>
      <!-- <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages5" aria-expanded="false" aria-controls="pages5"
            class="sidebar-link text-white">
         <i class="o-code-window-1 mr-3 text-gray"></i><span>Attendance</span></a>
         <div id="pages5" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Attendance Management", $arrayfeatures)) {
                  ?>
                  <a href="<?= BASEURL ?>assessor-create-attendance" class="sidebar-link text-white pl-lg-5">Create Attendance</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" class="sidebar-link text-white pl-lg-5">Create Attendance</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                     <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                     if (in_array("Attendance Management", $arrayfeatures)) {
                     ?>
                     <a href="<?= BASEURL ?>assessor-attendance-list" class="sidebar-link text-white pl-lg-5">List All Attendance</a>
                     <?php } else { ?>
                     <a onclick="subscriptionMessage()" class="sidebar-link text-white pl-lg-5">List All Attendance</a>
                     <?php } ?>
               </li>
            </ul>
         </div>
      </li> -->

<?php
/*
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse"  title="From Here You Can Manage Assessment" data-target="#pages6" aria-expanded="false" aria-controls="pages5" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Assessment</span></a>
         <div id="pages6" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>assessor-create-assesment" title="From Here You Can Create Assessment Report " class="sidebar-link text-white pl-lg-5">Create
                     Assessment Report</a>
               </li>
               <li class="sidebar-list-item"><a  href="<?= BASEURL ?>assessor-assesment-list"  title="From Here You Can My Assessment Reports" class="sidebar-link text-white pl-lg-5">My
                     Assessment Reports</a>

               </li>
            </ul>
         </div>
      </li>
*/
?>

            <!-- *************************** -->

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Assessments" data-target="#pages7" aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Assessment</span></a>
         <div id="pages7" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

               <li class="sidebar-list-item">
                  <?php if (in_array("Learner Performance Management", $arrayfeatures)) { ?>
                     <a href="<?= BASEURL ?>assessor-manage-assessment-list" title="From Here You Can Manage Assessments" class="sidebar-link text-white pl-lg-5">Manage Assessment</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Manage Assessments" class="sidebar-link text-white pl-lg-5">Manage Assessment</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php if (in_array("Learner Performance Management", $arrayfeatures)) { ?>
                     <a href="<?= BASEURL ?>assessor-completed-assessment-list" title="From Here You Can See AssessmentList" class="sidebar-link text-white pl-lg-5">Completed Assessment List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Completed Assessment List" class="sidebar-link text-white pl-lg-5">Completed Assessment List</a>
                  <?php } ?>
               </li>

            </ul>
         </div>
      </li>
      <!-- *************************** -->


   </ul>
</div>


