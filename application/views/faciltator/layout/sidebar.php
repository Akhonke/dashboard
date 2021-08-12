<?php
        $Facilitator_id = $_SESSION['facilitator']['id'];
        $facilitato = $this->common->accessrecord('facilitator', [], array('id'=>$Facilitator_id), 'row');

        $facilitator = $this->db->where('id',  $Facilitator_id)->get('facilitator')->result();
        $organisation = $this->db->where('id', $facilitator[0]->organization)->get('organisation')->result();
        $plan = $this->db->where('id', $organisation[0]->packageId)->get('plan')->result();

        $arrayfeatures = explode("%@#$", $plan[0]->feature);
?>
<div id="sidebar" class="sidebar py-3">

   <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"><?=$facilitato->fullname .' '.$facilitato->surname;?></div>
   <ul class="sidebar-menu list-unstyled">

      <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-dashboard" title="From Here You Can See Dashboard" class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a></li>

      <!-- *************************** -->

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can Assessments" data-target="#pages6" aria-expanded="false" aria-controls="pages6" class="sidebar-link text-white">
            <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Assessment</span></a>
         <div id="pages6" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>facilitator-create-assessment" title="From Here You Can Create An Assessment" class="sidebar-link text-white pl-lg-5">Create Assessment</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create An Assessment" class="sidebar-link text-white pl-lg-5">Create Assessment</a>
                  <?php } ?>
               </li>
               <li class="sidebar-list-item">
                  <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                  if (in_array("Learner Performance Management", $arrayfeatures)) {
                  ?>
                     <a href="<?= BASEURL ?>facilitator-assessment-list" title="From Here You Can See AssessmentList" class="sidebar-link text-white pl-lg-5">View Assessment List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Assessment List" class="sidebar-link text-white pl-lg-5">View Assessment List</a>
                  <?php } ?>
               </li>


               <li class="sidebar-list-item">
                  <?php if (in_array("Learner Performance Management", $arrayfeatures)) { ?>
                     <a href="<?= BASEURL ?>facilitator-completed-assessment-list" title="From Here You Can See AssessmentList" class="sidebar-link text-white pl-lg-5">View Completed Assessment List</a>
                  <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Completed Assessment List" class="sidebar-link text-white pl-lg-5">View Completed Assessment List</a>
                  <?php } ?>
               </li>

            </ul>
         </div>
      </li>
      <!-- *************************** -->

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" title="From Here You Can See Manage Marksheet" data-target="#pages14" aria-expanded="false" aria-controls="pages14" class="sidebar-link text-white">
         <i class="o-wireframe-1 mr-3 text-gray"></i><span>MarkSheet</span></a>
         <div id="pages14" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-create-mark-sheet" title="From Here You Can Create Marksheet" class="sidebar-link text-white pl-lg-5">Create Marksheet</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-mark-sheet-list" title="From Here You Can See MarksheetList" class="sidebar-link text-white pl-lg-5">View MarkSheet List</a></li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages5" title="From Here You Can Manage Attendance" aria-expanded="false" aria-controls="pages5" class="sidebar-link text-white">
         <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Attendance</span></a>
         <div id="pages5" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item">
                    <?php  $arrayfeatures = explode("%@#$",$plan[0]->feature);
                      if (in_array("Attendance Management", $arrayfeatures)) {
                    ?>
                     <a href="<?= BASEURL ?>facilitator-create-attendance" title="From Here You Can Create Attendance" class="sidebar-link text-white pl-lg-5">Create Attendance</a>
                    <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can Create Attendance"  class="sidebar-link text-white pl-lg-5">Create Attendance</a>
                    <?php } ?>
                </li>
                <li class="sidebar-list-item">
                    <?php  $arrayfeatures = explode("%@#$",$plan[0]->feature);
                      if (in_array("Attendance Management", $arrayfeatures)) {
                    ?>
                     <a href="<?= BASEURL ?>facilitator-attendance-list" title="From Here You Can See Attendance List" class="sidebar-link text-white pl-lg-5">View Attendence List</a>
                    <?php } else { ?>
                     <a onclick="subscriptionMessage()" title="From Here You Can See Attendance List" class="sidebar-link text-white pl-lg-5">View Attendence List</a>
                    <?php } ?>
                </li>
            </ul>
         </div>
      </li>

      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse" data-target="#pages4" title="From Here You Can Manage Learner Discipline" aria-expanded="false" aria-controls="pages4" class="sidebar-link text-white">
         <i class="o-wireframe-1 mr-3 text-gray"></i><span>Learner Discipline</span></a>
         <div id="pages4" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>facilitator-create-discipline"  title="From Here You Can Add Issue" class="sidebar-link text-white pl-lg-5">New Issue</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>facilitator-discipline-list"  title="From Here You Can See Issue List" class="sidebar-link text-white pl-lg-5">View Issues List</a></li>
            </ul>
         </div>
      </li>


      <li class="sidebar-list-item">
         <a href="#" data-toggle="collapse"  title="From Here You Can Manage Messages" data-target="#pages544" aria-expanded="false" aria-controls="pages544" class="sidebar-link text-white">
         <i class="o-wireframe-1 mr-3 text-gray"></i><span>Messages</span></a>
         <div id="pages544" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-sendMassage" title="From Here You Can Compose Messages" class="sidebar-link text-white pl-lg-5">Compose Message</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-inbox" title="From Here You Can See Inbox Messages" class="sidebar-link text-white pl-lg-5">Inbox</a></li>
               <li class="sidebar-list-item"><a href="<?= BASEURL ?>Faciltator-sentbox" title="From Here You Can See Sent Messages" class="sidebar-link text-white pl-lg-5">Sent Box</a></li>
            </ul>
         </div>
      </li>

   </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    function subscriptionMessage()
    {
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