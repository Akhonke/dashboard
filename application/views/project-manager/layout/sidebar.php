<?php
$learner_id = $_SESSION['projectmanager']['id'];
// echo '<pre>';print_r($_SESSION['projectmanager']);

// $user_id =$_SESSION['projectmanager']['user_id'];
$learner = $this->common->accessrecord(TBL_Project_Manager, [], array('id' => $learner_id), 'row_array');
// print_r($learner['organization']);die;
// print_r( $learner['organization']);die;
$menus = getprojectmanageroptions();
$res = array();
$organisation = $this->db->where('id', $learner['organization'])->get('organisation')->result();
// echo 
// print_r($organisation);die;
$plan = $this->db->where('id', $organisation[0]->packageId)->get('plan')->result();

$Project = $this->db->where('organization', $learner['organization'])->get('project')->result();
$projectcount = count($Project);

?>
<div id="sidebar" class="sidebar py-3">
   <div>
      <?php if ($this->session->userdata('user_image')) { ?>
         <img src="<?php echo base_url('uploads/project/projectmanager_pic/' . $this->session->userdata('user_image')); ?>" alt="Jason Doe" style="max-width: 3.5rem; margin: 0 auto; display: block;" class="img-fluid rounded-circle shadow">
      <?php  } else if (!empty($learner['profile_pic'])) { ?>
         <img src="<?php echo base_url('uploads/project/projectmanager_pic/' . $learner['profile_pic']); ?>" alt="Jason Doe" style="max-width: 3.5rem; margin: 0 auto; display: block;" class="img-fluid rounded-circle shadow">
      <?php  } else { ?>
         <img src="assets/admin/cloudfront/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 3.5rem; margin: 0 auto; display: block;" class="img-fluid rounded-circle shadow">
      <?php } ?>
   </div>
   <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family" style="text-align: center;">
      <?php
      if (isset($_SESSION['projectmanager']['logintype'])) {
         echo $this->session->userdata['projectmanager']['first_name'] . ' ' . $this->session->userdata['projectmanager']['second_name'];
      } else {
         // $trainer_id =$_SESSION['projectmanager']['id'];
         echo $learner_nm = $learner['fullname'] . ' ' . $learner['surname'];
      }
      ?>
   </div>
   <ul class="sidebar-menu list-unstyled">
      <li class="sidebar-list-item"><a href="<?= base_url('projectmanager-dashboard'); ?>" title="From Here You See Dashboard " class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a></li>
      <!-- *************************** -->
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Projects " data-target="#pages31" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
            <i class="o-archive-1 mr-3 text-gray"></i><span>Manage Projects</span></a>
         <div id="pages31" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $manage_project_value = $plan[0]->manage_project_value;
                  if ($manage_project_value == 0 || $manage_project_value >= $projectcount) {
                  ?>
                     <a href="<?= BASEURL ?>create_new_project" title="From Here You Can Create Projects " class="sidebar-link text-white pl-lg-5">Create Projects</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You  Can Create Projects" class="sidebar-link text-white pl-lg-5">Create Projects</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_projects_list" title="From Here You  Can See Projects List" class="sidebar-link text-white pl-lg-5">All
                     Projects List</a>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Task" data-target="#pages32" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
            <i class="o-archive-1 mr-3 text-gray"></i><span> New Task</span></a>
         <div id="pages32" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Projectmanager-create_new_task" title="From Here You Can Create Task" class="sidebar-link text-white pl-lg-5">Create New Task</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Projectmanager-create_new_task_list" title="From Here You Can See Task Lsit" class="sidebar-link text-white pl-lg-5"> Task List</a></li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages36" title="From Here You Can Manage Stipend" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
            <i class="o-archive-1 mr-3 text-gray"></i><span> Create Stipend</span></a>
         <div id="pages36" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Stipend Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-create_new_stipend" title="From Here You  Can Create Stipend" class="sidebar-link text-white pl-lg-5">Create New Stipend</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create Stipend" class="sidebar-link text-white pl-lg-5">Create New Stipend</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Stipend Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-create_stipend_list" title="From Here You Can See Stipend List" class="sidebar-link text-white pl-lg-5">Stipend List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Stipend List" class="sidebar-link text-white pl-lg-5">Stipend List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages7" title="From Here You Can Manage Training Provider" aria-expanded="false" aria-controls="pages7" class="sidebar-link text-white">
            <i class="o-wireframe-1 mr-3 text-gray"></i><span>Training Provider</span></a>
         <div id="pages7" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>projectmanager-create-training" title="From Here You Can Create Training Providers" class="sidebar-link text-white pl-lg-5">Create Training Provider</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>projectmanagertraining-list" title="From Here You Can See Training Providers List" class="sidebar-link text-white pl-lg-5">Training Providers List</a></li>
            </ul>
         </div>
      </li>

      <!-- *************************** -->
      
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Employer" data-target="#pages6" aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Employer</span></a>
         <div id="pages6" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Host employer Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>Projectmanager-create-employer" title="From Here You Can Create Employer" class="sidebar-link text-white pl-lg-5">Create Employer</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create Employer" class="sidebar-link text-white pl-lg-5">Create Employer</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Host employer Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>Projectmanager-employer-list" title="From Here You Can See Employers List" class="sidebar-link text-white pl-lg-5">Employers List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Employers List" class="sidebar-link text-white pl-lg-5">Employers List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>
      <!-- *************************** -->

      <li class="sidebar-list-item">
         <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
         if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
         ?>
            <a href="<?= BASEURL ?>projectmanager-facilitator-list" title="From Here You Can See Facilitor List" class="sidebar-link text-white"><i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Facilitators List</span></a>
         <?php } else { ?>
            <a onclick="subscriptionMessage()" title="From Here You Can See Facilitor List" class="sidebar-link text-white"><i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Facilitators List</span></a>
         <?php } ?>
      </li>

      <!-- *************************** -->
      <li class="sidebar-list-item"><a href="<?= BASEURL ?>projectmanager-assessor-list" title="From Here You Can See Assessor List" class="sidebar-link text-white"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Assessors List</span></a></li>

      <!-- *************************** -->
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Moderators" data-target="#pages2" aria-expanded="false" aria-controls="pages2" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Moderators</span></a>
         <div id="pages2" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-moderator-list" title="From Here You Can See Moderators List" class="sidebar-link text-white"><i class="o-id-card-1 mr-3 text-gray"></i><span>Internal Moderators List</span></a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Moderators List" class="sidebar-link text-white pl-lg-5">Moderators List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-external-moderator-list" title="From Here You Can See External Moderator List" class="sidebar-link text-white"><i class="o-id-card-1 mr-3 text-gray"></i><span>External Moderator List</span></a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See External Moderator List" class="sidebar-link text-white pl-lg-5">External Moderator List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>




      <!-- <li class="sidebar-list-item">
         <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
         if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
         ?>
            <a href="<?= BASEURL ?>projectmanager-moderator-list" class="sidebar-link text-white"><i class="o-id-card-1 mr-3 text-gray"></i><span>Moderators List</span></a>
         <?php } else { ?>
            <a onclick="subscriptionMessage()" class="sidebar-link text-white"><i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Moderators List</span></a>
         <?php } ?>
      </li> -->

      <!-- ********************* -->
      <!-- <li class="sidebar-list-item">
         <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
         if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
         ?>
            <a href="<?= BASEURL ?>projectmanager-moderator-list" class="sidebar-link text-white"><i class="o-id-card-1 mr-3 text-gray"></i><span>External Moderator List</span></a>
         <?php } else { ?>
            <a onclick="subscriptionMessage()" class="sidebar-link text-white"><i class="o-laptop-screen-1 mr-3 text-gray"></i><span>External Moderators List</span></a>
         <?php } ?>
      </li> -->

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Learner" data-target="#pages11" aria-expanded="false" aria-controls="pages11" class="sidebar-link text-white">
            <i class="o-user-1 mr-3 text-gray"></i><span>Learner</span></a>
         <div id="pages11" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-list-learner" title="From Here You Can See Learners List" class="sidebar-link text-white pl-lg-5">Learners List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Learners List" class="sidebar-link text-white pl-lg-5">Learners List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-mark-sheet-list" title="From Here You Can See Marksheet List" class="sidebar-link text-white pl-lg-5"><span>Mark Sheet List</span></a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Marksheet List" class="sidebar-link text-white pl-lg-5">Mark Sheet List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-attendance-list" title="From Here You Can See Attendence List" class="sidebar-link text-white pl-lg-5"><span>Attendence List</span></a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Attendence List" class="sidebar-link text-white pl-lg-5">Attendence List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-drop-out-list" title="From Here You Can See Drop Out List" class="sidebar-link text-white pl-lg-5"><span>Drop Out List</span></a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Drop Out List" class="sidebar-link text-white pl-lg-5">Drop Out List</a>
                  <?php } ?>
               </li>
               <!-- <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?> 
                  <a href="<?= BASEURL ?>projectmanager-stipends-list" class="sidebar-link text-white pl-lg-5"><span>Stipends List</span></a>
                  <?php } else { ?>
                            <a onclick="subscriptionMessage()" class="sidebar-link text-white pl-lg-5">Stipends List</a>
                  <?php } ?> 
               </li> -->
            </ul>
         </div>
      </li>


      <!-- ***************************** -->
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Report " data-target="#pages15" aria-expanded="false" aria-controls="pages15" class="sidebar-link text-white"><i class="o-earth-globe-1 mr-3 text-gray"></i><span>Report</span></a>
         <div id="pages15" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Quarterly report Compilation", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>Provider-Quaterly-Report-list" title="From Here You Can See Training Providers Quarterly Reports" class="sidebar-link text-white pl-lg-5">Training Providers Quarterly Reports</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Training Providers Quarterly Reports" class="sidebar-link text-white pl-lg-5">Training Providers Quarterly Reports</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>


      <!-- ***************************** -->
      <li class="sidebar-list-item">
         <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
         if (in_array("Stipend Management", $arrayfeatures)) {
         ?>
            <a href="<?= BASEURL ?>projectmanager-class-list" title="From Here You Can See Class List" class="sidebar-link text-white"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Class List</span></a>
         <?php } else { ?>
            <a onclick="subscriptionMessage()" title="From Here You Can See Class List" class="sidebar-link text-white"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Class List</span></a>
         <?php } ?>
      </li>
      
      
      <!-- *************************** -->
      
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Employer" data-target="#pages6" aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Assessment</span></a>
         <div id="pages6" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-create-assessment" title="From Here You Can Create An Assessment" class="sidebar-link text-white pl-lg-5">Create Assessment</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create An Assessment" class="sidebar-link text-white pl-lg-5">Create Assessment</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-assessment-list" title="From Here You Can See AssessmentList" class="sidebar-link text-white pl-lg-5">Assessment List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Assessment List" class="sidebar-link text-white pl-lg-5">Assessment List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>
      <!-- *************************** -->

      


      <!-- ******************************** -->
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Finace " data-target="#pages3" aria-expanded="false" aria-controls="pages3" class="sidebar-link text-white">
            <i class="o-wireframe-1 mr-3 text-gray"></i><span>Finance</span></a>
         <div id="pages3" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-create-income-item" title="From Here You Can Create Capture Income" class="sidebar-link text-white pl-lg-5">Create Capture Income</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create Capture Income" class="sidebar-link text-white pl-lg-5">Create Capture Income</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>projectmanager-income-item-list" title="From Here You Can See Income List" class="sidebar-link text-white pl-lg-5">Income List</a>
               </li>
            <?php } else { ?>
               <a onclick="subscriptionMessage()" title="From Here You Can See Income List" class="sidebar-link text-white pl-lg-5">Income List</a>
      </li>
   <?php } ?>

   <li class="sidebar-list-item">
      <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
      if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
      ?>
         <a href="<?= BASEURL ?>projectmanager-create-expense-item" title="From Here You Can Capture New Expense" class="sidebar-link text-white pl-lg-5">Capture New Expense</a>
      <?php } else { ?>
         <a onclick="subscriptionMessage()" title="From Here You Can Capture New Expense" class="sidebar-link text-white pl-lg-5">Capture New Expense</a>
      <?php } ?>
   </li>

   <li class="sidebar-list-item">
      <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
      if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
      ?>
         <a href="<?= BASEURL ?>projectmanager-expense-item-list" title="From Here You Can See Expenditure List" class="sidebar-link text-white pl-lg-5">Expenditure</a>
      <?php } else { ?>
         <a onclick="subscriptionMessage()" title="From Here You Can See Expenditure List " class="sidebar-link text-white pl-lg-5">Expenditure</a>
      <?php } ?>
   </li>

   <li class="sidebar-list-item">
      <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
      if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
      ?>
         <a href="<?= BASEURL ?>projectmanager-account-balance-list" title="From Here You Can See Cashflow Report" class="sidebar-link text-white pl-lg-5">Cashflow Report</a>
      <?php } else { ?>
         <a onclick="subscriptionMessage()" title="From Here You Can See Cashflow Report" class="sidebar-link text-white pl-lg-5">Cashflow Report</a>
      <?php } ?>
   </li>
   </ul>
</div>
</li>


<!-- ***************************** -->
<li class="sidebar-list-item">
   <a href="#" data-toggle="collapse" title="From Here You Can Manage Bank Statement" data-target="#pages4" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
      <i class="o-wireframe-1 mr-3 text-gray"></i><span>Upload Bank Statement</span></a>
   <div id="pages4" class="collapse">
      <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
         <li class="sidebar-list-item">
            <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
            if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
            ?>
               <a href="<?= BASEURL ?>projectmanager-create-bank" title="From Here You Can Create Bank Statement" class="sidebar-link text-white pl-lg-5">Create Bank Statement</a>
            <?php } else { ?>
               <a onclick="subscriptionMessage()" title="From Here You Can Create Bank Statement" class="sidebar-link text-white pl-lg-5">Create Bank Statement</a>
            <?php } ?>
         </li>
         <li class="sidebar-list-item">
            <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
            if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
            ?>
               <a href="<?= BASEURL ?>projectmanager-bank-list" title="From Here You Can See Bank Statement List" class="sidebar-link text-white pl-lg-5">Bank Statement List</a>
            <?php } else { ?>
               <a onclick="subscriptionMessage()" title="From Here You Can See Bank Statement List" class="sidebar-link text-white pl-lg-5"> Bank Statement List</a>
            <?php } ?>
         </li>
      </ul>
   </div>
</li>

<li class="sidebar-list-item">
   <a href="#" data-toggle="collapse" title="From Here You Can Manager User" data-target="#pages17" aria-expanded="false" aria-controls="pages17" class="sidebar-link text-white">
      <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage User</span></a>
   <div id="pages17" class="collapse">
      <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Create-Projectmanager-User" title="From Here You Can Create User" class="sidebar-link text-white pl-lg-5">Create User</a>
         </li>
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Projectmanager-User-list" title="From Here You Can See User List" class="sidebar-link text-white pl-lg-5">User List</a>
         </li>
      </ul>
   </div>
</li>

<li class="sidebar-list-item">
   <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
   if (in_array("SMS and Email Sending", $arrayfeatures)) {
   ?>
      <a href="#" data-toggle="collapse" title="From Here You Can Manage Message" data-target="#pages88" aria-expanded="false" aria-controls="pages88" class="sidebar-link text-white">
         <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Message</span></a>
      <div id="pages88" class="collapse">
         <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item">
               <a href="<?= BASEURL ?>Projectmanager-sendMassage" title="From Here You Can Compose Message" class="sidebar-link text-white pl-lg-5">Compose Message</a>
            </li>
            <li class="sidebar-list-item">
               <a href="<?= BASEURL ?>Projectmanager-inbox" title="From Here You Can See Inbox Message" class="sidebar-link text-white pl-lg-5">Inbox</a>
            </li>
            <li class="sidebar-list-item">
               <a href="<?= BASEURL ?>Projectmanager-sentbox" title="From Here You Can See Sentbox Message" class="sidebar-link text-white pl-lg-5">Sent Box</a>
            </li>
            <!-- <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>Projectmanager-trash" class="sidebar-link text-white pl-lg-5">Trash</a>                    
               </li>
               <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>Projectmanager-important" class="sidebar-link text-white pl-lg-5">Important</a>                     
               </li>-->


         </ul>
      </div>
   <?php } else { ?>
      <a onclick="subscriptionMessage()" title="From Here You Can Manage Message" class="sidebar-link text-white"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Message</span></a>
   <?php } ?>
</li>

<!-- 
<li class="sidebar-list-item">
   <a href="#" data-toggle="collapse" data-target="#pages88" aria-expanded="false" aria-controls="pages88" class="sidebar-link text-white">
      <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Message</span></a>
   <div id="pages88" class="collapse">
      <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Projectmanager-sendMassage" class="sidebar-link text-white pl-lg-5">Compose Message</a>
         </li>
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Projectmanager-inbox" class="sidebar-link text-white pl-lg-5">Inbox</a>
         </li>
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Projectmanager-sentbox" class="sidebar-link text-white pl-lg-5">Sent Box</a>
         </li> -->
<!-- <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>Projectmanager-trash" class="sidebar-link text-white pl-lg-5">Trash</a>                    
               </li>
               <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>Projectmanager-important" class="sidebar-link text-white pl-lg-5">Important</a>                     
               </li>-->
<!-- 

      </ul>
   </div>
</li> -->

<li class="sidebar-list-item">
   <a href="#" data-toggle="collapse" title="From Here You Can Manage Bulk Messages And Emails" data-target="#pages4111" aria-expanded="false" aria-controls="pages4111" class="sidebar-link text-white">
      <i class="o-archive-1 mr-3 text-gray"></i><span> Bulk Messages and Emails</span></a>
   <div id="pages4111" class="collapse">
      <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
         <li class="sidebar-list-item"><a href="<?= BASEURL ?>projectmanager-sendBulkMassage" title="From Here You Can  Send Message In Bulk" class="sidebar-link text-white pl-lg-5">Send Bulk Messages</a></li>
         <!-- <li class="sidebar-list-item"><a href="<?= BASEURL ?>projectmanager-sendBulkEmails" title="From Here You Can  Send Email In Bulk" class="sidebar-link text-white pl-lg-5">Send Bulk Emails</a></li>  -->
      </ul>
   </div>
</li>
<li class="sidebar-list-item">
   <a href="#" data-toggle="collapse" title="From Here You Can Manager User" data-target="#pages77" aria-expanded="false" aria-controls="pages17" class="sidebar-link text-white">
      <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Sub Contractor</span></a>
   <div id="pages77" class="collapse">
      <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>Create-New-Subcontractor" title="From Here You Can Create Sub Contractor" class="sidebar-link text-white pl-lg-5">Create Sub Contractor</a>
         </li>
         <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>New-Subcontractor-List" title="From Here You Can See Sub Contractor List" class="sidebar-link text-white pl-lg-5">Sub Contractor List</a>
         </li>
      </ul>
   </div>
</li>
<!-- ****************************** -->
</ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
   function subscriptionMessage() {
      Swal.fire({
         title: 'Membership Required ',
         text: "A membership required to use these features. Just go explore membership and subscribe and use features.",
         icon: 'error',
         showCancelButton: true,
         cancelButtonColor: '#d33',
         confirmButtonColor: '#3085d6',
         confirmButtonText: 'Explore Membership'
      }).then((result) => {
         if (result.isConfirmed) {
            window.location.replace("<?= BASEURL ?>");
         }
      })
   }
</script>