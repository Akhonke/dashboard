<div id="sidebar" class="sidebar py-3">
   <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
      <?php $id =  $_SESSION['organisation']['id'];
      $admin = $this->common->accessrecord('organisation', [], array('id' => $id), 'row');
      echo $admin->organisation_name;
      ?>
   </div>
   <?php $query = $this->db->where('id', $admin->packageId)->get('plan');
   $plan =  $query->result();
   ?>
   <ul class="sidebar-menu list-unstyled">
      <li class="sidebar-list-item"><a href="<?= base_url() . 'dashboard' ?>" title="From Here You Can See Dashboard " class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a></li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can See Project List " data-target="#pages31" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
            <i class="o-archive-1 mr-3 text-gray"></i><span>Project</span></a>
         <div id="pages31" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>myorganization-create_projects_list" title="From Here You Can See Project List " class="sidebar-link text-white pl-lg-5"> All Projects List
                  </a>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages6" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-bookmark-archive-1 mr-3 text-gray"></i><span>Project Manager</span></a>
         <div id="pages6" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_project" title="From Here You Can Create Project Manager " class="sidebar-link text-white pl-lg-5">Create
                     Project Manager</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>project_list" title="From Here You Can See  Project Manager List" class="sidebar-link text-white pl-lg-5">
                     All Project Managers List</a>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Training Provider " data-target="#pages7" aria-expanded="false" aria-controls="pages7" class="sidebar-link text-white">
            <i class="o-diploma-1 mr-3 text-gray"></i><span>Training Provider</span></a>
         <div id="pages7" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="training_list" title="From Here You Can See All Training Providers List" class="sidebar-link text-white pl-lg-5">
                     All Training Providers List</a>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Facilitator " data-target="#pages8" aria-expanded="false" aria-controls="pages8" class="sidebar-link text-white">
            <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Facilitator</span></a>
         <div id="pages8" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>facilitator_list" title="From Here You Can See Facilitator List " class="sidebar-link text-white pl-lg-5">Facilitators List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Facilitator List" class="sidebar-link text-white pl-lg-5">Facilitators List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>


      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Assessor " data-target="#pages9" aria-expanded="false" aria-controls="pages9" class="sidebar-link text-white">
            <i class="o-imac-screen-1 mr-3 text-gray"></i><span>Assessor</span></a>
         <div id="pages9" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>assessor_list" title="From Here You Can See Assessor List" class="sidebar-link text-white pl-lg-5">
                     Assessors List</a>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Moderator " data-target="#pages10" aria-expanded="false" aria-controls="pages10" class="sidebar-link text-white">
            <i class="o-id-card-1 mr-3 text-gray"></i><span>Moderator</span></a>
         <div id="pages10" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>moderator_list" title="From Here You Can See Moderator List " class="sidebar-link text-white pl-lg-5">Internal Moderators List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Moderator List" class="sidebar-link text-white pl-lg-5">Internal Moderators List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>external_moderator_list" title="From Here You Can See Moderator List " class="sidebar-link text-white pl-lg-5">External Moderators List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Moderator List" class="sidebar-link text-white pl-lg-5">External Moderators List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Learner " data-target="#pages11" aria-expanded="false" aria-controls="pages11" class="sidebar-link text-white">
            <i class="o-user-1 mr-3 text-gray"></i><span>Learner</span></a>
         <div id="pages11" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>list_learner" title="From Here You Can See Learner List " class="sidebar-link text-white pl-lg-5">Learners List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Learner List " class="sidebar-link text-white pl-lg-5">Learners List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>complaints-suggestion-list?type=complaints" title="From Here You Can See Complaints List " class="sidebar-link text-white pl-lg-5">Complaints List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Complaints List " class="sidebar-link text-white pl-lg-5">Complaints List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>complaints-suggestion-list?type=suggestions" title="From Here You Can See Suggestions List " class="sidebar-link text-white pl-lg-5">Suggestions List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Suggestions List " class="sidebar-link text-white pl-lg-5">Suggestions List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>drop-out-list" title="From Here You Can See Drop Out List " class="sidebar-link text-white pl-lg-5">Drop Out List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Drop Out List " class="sidebar-link text-white pl-lg-5">Drop Out List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>stipends-list" title="From Here You Can See Stipends List " class="sidebar-link text-white pl-lg-5">Stipends List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Stipends List " class="sidebar-link text-white pl-lg-5">Stipends List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>attendance-list" title="From Here You Can See Attendance List " class="sidebar-link text-white pl-lg-5">Attendance List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Attendance List " class="sidebar-link text-white pl-lg-5">Attendance List</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>mark-sheet-list" title="From Here You Can See Mark Sheet List" class="sidebar-link text-white pl-lg-5">Mark Sheet List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Mark Sheet List" class="sidebar-link text-white pl-lg-5">Mark Sheet List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Report" data-target="#pages15" aria-expanded="false" aria-controls="pages15" class="sidebar-link text-white"><i class="o-earth-globe-1 mr-3 text-gray"></i><span>Report</span></a>
         <div id="pages15" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Quarterly report Compilation", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>programme-Provider-Quaterly-Report-list" title="From Here You See Quaterly Report List" class="sidebar-link text-white pl-lg-5">Quaterly Report List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You See Quaterly Report List" class="sidebar-link text-white pl-lg-5">Quaterly Report List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Periods" data-target="#pages2" aria-expanded="false" aria-controls="pages2" class="sidebar-link text-white">
            <i class="o-clock-1 mr-3 text-gray"></i><span>Periods</span></a>
         <div id="pages2" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>create_finanacial_year" title="From Here You Can Create New Financial year" class="sidebar-link text-white pl-lg-5">Create New Financial year</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create New Financial year" class="sidebar-link text-white pl-lg-5">Create New Financial year</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>myorganization-upcoming" title="From Here You Can Create New Quarterly periods" class="sidebar-link text-white pl-lg-5">Create New Quarterly periods</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create New Quarterly periods" class="sidebar-link text-white pl-lg-5">Create New Quarterly periods</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Finance" data-target="#pages3" aria-expanded="false" aria-controls="pages3" class="sidebar-link text-white">
            <i class="o-wireframe-1 mr-3 text-gray"></i><span>Finance</span></a>
         <div id="pages3" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>account-balance-list" title="From Here You See Account Balance List" class="sidebar-link text-white pl-lg-5">Account Balance List </a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You See Account Balance List" class="sidebar-link text-white pl-lg-5">Account Balance List</a>
                  <?php } ?>
               </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Message" data-target="#pages88" aria-expanded="false" aria-controls="pages88" class="sidebar-link text-white">
            <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Message</span></a>
         <div id="pages88" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
               if (in_array("SMS and Email Sending", $arrayfeatures)) {
               ?>
                  <li class="sidebar-list-item">
                     <a href="<?= BASEURL ?>organisation-sendMassage" title="From Here You Can Compose Message" class="sidebar-link text-white pl-lg-5">Compose Message</a>
                  </li>
               <?php } else { ?>
                  <li>
                     <a onclick="subscriptionMessage()" title="From Here You Can Compose Message" class="sidebar-link text-white pl-lg-5">Compose Message</a>
                  </li>
               <?php } ?>

               <li class="sidebar-list-item">
                  <a href="<?= BASEURL ?>organisation-inbox" title="From Here You See Inbox Message" class="sidebar-link text-white pl-lg-5">Inbox</a>
               </li>
               <li class="sidebar-list-item">
                  <a href="<?= BASEURL ?>organisation-sentbox" title="From Here You See Sentbox Message" class="sidebar-link text-white pl-lg-5">Sent Box</a>
               </li>
               <!-- <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>organisation-trash" class="sidebar-link text-white pl-lg-5">Trash</a>                    
               </li>
               <li class="sidebar-list-item">
                      <a href="<?= BASEURL ?>organisation-important" class="sidebar-link text-white pl-lg-5">Important</a>                    
               </li> -->
            </ul>
         </div>
      </li>


      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Manage Bulk Messages And Emails" data-target="#pages828" aria-expanded="false" aria-controls="pages828" class="sidebar-link text-white">
            <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Bulk Messages and Emails</span></a>
         <div id="pages828" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
               if (in_array("SMS and Email Sending", $arrayfeatures)) {
               ?>
                  <li class="sidebar-list-item">
                     <a href="<?= BASEURL ?>organisation-sendBulkMassage" title="From Here You Can  Send Message In Bulk " class="sidebar-link text-white pl-lg-5">Send Bulk Messages</a>
                  </li>
               <?php } else { ?>
                  <li>
                     <a onclick="subscriptionMessage()" title="From Here You Can Send Message In Bulk" class="sidebar-link text-white pl-lg-5">Send Bulk Messages</a>
                  </li>
               <?php } ?>

               <li class="sidebar-list-item">
                  <!-- <a href="<?= BASEURL ?>organisation-sendBulkEmails"  title="From Here You See Send Email In Bulk " class="sidebar-link text-white pl-lg-5">Send Bulk Emails</a>                     -->
               </li>

            </ul>
         </div>
      </li>
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages66" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="fas fa-user-check mr-3 text-gray"></i><span>User</span></a>
         <div id="pages66" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_user" title="From Here You Can Create User " class="sidebar-link text-white pl-lg-5">
                    Create User</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>user_list" title="From Here You Can See  User List" class="sidebar-link text-white pl-lg-5">
                     User List</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages77" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="fas fa-clipboard mr-3 text-gray"></i><span>Department</span></a>
         <div id="pages77" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_department" title="From Here You Can Create department " class="sidebar-link text-white pl-lg-5">
                    Create Department</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>department_list" title="From Here You Can See  Department List" class="sidebar-link text-white pl-lg-5">
                     Department List</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages78" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="fas fa-user-friends mr-3 text-gray"></i><span>User Group</span></a>
         <div id="pages78" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_user_group" title="From Here You Can Create User Group " class="sidebar-link text-white pl-lg-5">
                    Create User Group</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>user_group_list" title="From Here You Can See  User Group List" class="sidebar-link text-white pl-lg-5">
               User Group List</a>
               </li>
            </ul>
         </div>
      </li>
     
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages79" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="fas fa-address-book mr-3 text-gray"></i><span>User Role</span></a>
         <div id="pages79" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_user_role" title="From Here You Can Create User Group " class="sidebar-link text-white pl-lg-5">
                    Create User Role</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>user_role_list" title="From Here You Can See  User Group List" class="sidebar-link text-white pl-lg-5">
               User Role List</a>
               </li>
            </ul>
         </div>
      </li>
     
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages80" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="fas fa-chalkboard-teacher mr-3 text-gray"></i><span>New Programme</span></a>
         <div id="pages80" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_new_programme" title="From Here You Can Create New Programme " class="sidebar-link text-white pl-lg-5">
                    Create New Programme</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>programme_list" title="From Here You Can See Programme List" class="sidebar-link text-white pl-lg-5">
               Programme List</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages81" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="far fa-folder-open mr-3 text-gray"></i><span>Expense Item</span></a>
         <div id="pages81" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_new_expense_item" title="From Here You Can Create New Expense Item " class="sidebar-link text-white pl-lg-5">
                    Create New Expense Item</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>expense_item_list" title="From Here You Can See  Expense Item List" class="sidebar-link text-white pl-lg-5">
               Expense Item List</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages82" title="From Here You Can Manage Project Manager " aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-bookmark-archive-1 mr-3 text-gray"></i><span>Sub Contractor Work Type</span></a>
         <div id="pages82" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>create_sub_contractor_work_type" title="From Here You Can Create Sub Contractor Work Type" class="sidebar-link text-white pl-lg-5">
                    Create Sub Contractor Work Type</a>
               </li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>sub_contractor_work_type_list" title="From Here You Can See Sub Contractor Work Type List" class="sidebar-link text-white pl-lg-5">
               Sub Contractor Work Type List</a>
               </li>
            </ul>
         </div>
      </li>
    
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