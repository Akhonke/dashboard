<?php
$menus = getprovideroptions();
// echo '<pre>';print_r($menus);
$res = array();
if (!empty($_SESSION['admin']['trainer_id'])) {
    $trainer_id = $_SESSION['admin']['trainer_id'];
    // print_r($trainer_id);die;
    $trainer = $this->db->where('id',  $trainer_id)->get('trainer')->result();
    $organisation = $this->db->where('id', $trainer[0]->organization)->get('organisation')->result();
    $plan = $this->db->where('id', $organisation[0]->packageId)->get('plan')->result();
}
?>
<div id="sidebar" class="sidebar py-3">
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
        <?php

        if (!empty($_SESSION['admin']['trainer_id'])) {
            $trainer = $this->common->accessrecord('trainer', [], array('id' => $trainer_id), 'row');

            echo $trainer_name = $trainer->full_name . ' ' . $trainer->surname;
        }

        ?> </div>

    <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item"><a href="<?= base_url('Provider-Dashboard'); ?>" title="From Here You Can See Dashboard " class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Provider Dashboard</span></a>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Facilitators " data-target="#pages8" aria-expanded="false" aria-controls="pages8" class="sidebar-link text-white">
                <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>My Facilitators</span></a>
            <div id="pages8" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create-facilitator-user'); ?>" title="From Here You Can Create Facilitaors" class="sidebar-link text-white pl-lg-5">Create New facilitator</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= site_url('facilitator-user-list'); ?>" title="From Here You Can See Facilitaors List" class="sidebar-link text-white pl-lg-5">All Facilitators List</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Facilitaors List" class="sidebar-link text-white pl-lg-5">All Facilitators List</a>
                <?php } ?>

                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Qualification Management " data-target="#pages1" aria-expanded="false" aria-controls="pages1" class="sidebar-link text-white"><i class="o-settings-window-1 mr-3 text-gray"></i><span> Qualification Management</span></a>
            <div id="pages1" class="collapse">
                <a href="#" data-toggle="collapse" title="From Here You Can Manage Unit Standars " data-target="#pages4" aria-expanded="false" aria-controls="pages1" class="sidebar-link text-muted"><i class="o-presentation-1 mr-3 text-muted"></i><span>Unit Standards</span></a>
                <div id="pages4" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                        <li class="sidebar-list-item"><a href="<?= base_url('create-unit'); ?>" title="From Here You Can Create Unit Standards" class="sidebar-link text-white pl-lg-5">Create Unit Standard</a></li>

                        <li class="sidebar-list-item">
                            <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                            if (in_array("Qualification Management", $arrayfeatures)) {
                            ?>
                                <a href="<?= base_url('manage-unit'); ?>" title="From Here You Can See Unit Standard List " class="sidebar-link text-white pl-lg-5">Unit Standard List</a>
                        </li>
                    <?php } else { ?>
                        <a onclick="subscriptionMessage()" title="From Here You Can See Unit Standard List " class="sidebar-link text-white pl-lg-5">Unit Standard List</a>
                    <?php } ?>
                    </ul>
                </div>
                <!-- type -->
                <a href="#" data-toggle="collapse" title="From Here You Can Manage Learnership Type" data-target="#pages2" aria-expanded="false" aria-controls="pages1" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-muted"></i><span>Learnership Type </span></a>
                <div id="pages2" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                        <li class="sidebar-list-item">

                            <a href="<?= base_url('create-learnership'); ?>" title="From Here You Can Create Learnership Type " class="sidebar-link text-white pl-lg-5">Create Learnership Type</a>
                        </li>


                        <li class="sidebar-list-item">
                            <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                            if (in_array("Qualification Management", $arrayfeatures)) {
                            ?>
                                <a href="<?= base_url('learnership-list'); ?>" title="From Here You Can See Learnership Type List " class="sidebar-link text-white pl-lg-5">Learnership Type List</a>
                        </li>
                    <?php } else { ?>
                        <a onclick="subscriptionMessage()" title="From Here You Can See Learnership Type List " class="sidebar-link text-white pl-lg-5">Learnership Type List</a>
                    <?php } ?>


                    </ul>
                </div>
                <!--  -->
                <a href="#" data-toggle="collapse" title="From Here You Can Manage Learnership Sub-Type" data-target="#pages3" aria-expanded="false" aria-controls="pages1" class="sidebar-link text-muted"><i class="o-news-article-1 mr-3 text-muted"></i><span>Learnership Sub-Type</span></a>
                <div id="pages3" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                        <li class="sidebar-list-item">

                            <a href="<?= base_url('create-sub-learnership'); ?>" title="From Here You Can Create Learnership Sub-Type " class="sidebar-link text-white pl-lg-5">Create Learnership Sub Type</a>
                        </li>

                        <li class="sidebar-list-item">
                            <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                            if (in_array("Qualification Management", $arrayfeatures)) {
                            ?>
                                <a href="<?= base_url('learnership-sub-list'); ?>" title="From Here You Can See Learnership Sub-Type List" class="sidebar-link text-white pl-lg-5">Learnership Sub Type List</a>
                        </li>
                    <?php } else { ?>
                        <a onclick="subscriptionMessage()" title="From Here You Can See Learnership Sub-Type List" class="sidebar-link text-white pl-lg-5">Learnership Sub Type List</a>
                    <?php } ?>

                    </ul>
                </div>
                <!--  -->



            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can manage Class" data-target="#pages13" aria-expanded="false" aria-controls="pages13" class="sidebar-link text-white">
                <i class="o-wireframe-1 mr-3 text-gray"></i><span>Manage My Class</span></a>
            <div id="pages13" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-create-class" title="From Here You Can Create Class" class="sidebar-link text-white pl-lg-5">Create A
                            New Class</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Class Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= BASEURL ?>provider-class-list" title="From Here You Can See Class List" class="sidebar-link text-white pl-lg-5">My Class List</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Class List" class="sidebar-link text-white pl-lg-5">My Class List</a>
                <?php } ?>
                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" title="From Here You Can Manage Learners " data-toggle="collapse" data-target="#pages7" aria-expanded="false" aria-controls="pages7" class="sidebar-link text-white"><i class="o-user-1 mr-3 text-gray"></i><span>My Learners</span></a>

            <div id="pages7" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item">

                        <a href="<?= base_url('create-learner'); ?>" title="From Here You Can Create Learners " class="sidebar-link text-white pl-lg-5">Create Learner</a>
                    </li>
                    <li class="sidebar-list-item">

                        <a href="<?= base_url('provider-import-learner'); ?>" title="From Here You Can Import Learners " class="sidebar-link text-white pl-lg-5">Import Learners</a>
                    </li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Learner Performance Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= base_url('learner-list'); ?>" title="From Here You Can See Learners List " class="sidebar-link text-white pl-lg-5">Learners List</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Learners List " class="sidebar-link text-white pl-lg-5">Learners List</a>
                <?php } ?>
                <!-- <li class="sidebar-list-item"><a href="<?= base_url('Rejected-learner-list'); ?>" class="sidebar-link text-white pl-lg-5">Rejected For Training</a></li> -->
                <li class="sidebar-list-item">

                    <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                    if (in_array("Learner Performance Management", $arrayfeatures)) {
                    ?>
                        <a href="<?= base_url('provider-drop-out-list'); ?>" title="From Here You Can See Drop Outs List " class="sidebar-link text-white pl-lg-5">Drop Outs List</a>
                </li>

            <?php } else { ?>
                <a onclick="subscriptionMessage()" title="From Here You Can See Drop Outs List " class="sidebar-link text-white pl-lg-5">Drop Outs List</a>
            <?php } ?>
                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Attendance" data-target="#pages5" aria-expanded="false" aria-controls="pages5" class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Attendance</span></a>
            <div id="pages5" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-create-attendance" title="From Here You Can Create Attendance" class="sidebar-link text-white pl-lg-5">Create
                            Attendance</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Learner Performance Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= BASEURL ?>provider-attendance-list" title="From Here You Can See Attendance List" class="sidebar-link text-white pl-lg-5">Attendance List</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Attendance List" class="sidebar-link text-white pl-lg-5">Attendance List</a>
                <?php } ?>

                </ul>
            </div>
        </li>

        <!-- <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages41" aria-expanded="false" aria-controls="pages8" title="From Here You Can Manage Learner Absent" class="sidebar-link text-white">
                <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Learner Absent</span></a>
            <div id="pages41" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create_learner_attendance'); ?>" title="From Here You Can Create Learner Attendance" class="sidebar-link text-white pl-lg-5">Create Learner Attendance</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Learner Performance Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= site_url('list_learner_attendance'); ?>" title="From Here You Can See Learner Attendance List" class="sidebar-link text-white pl-lg-5">Learner Attendance List</a>
                        <?php } else { ?>
                            <a onclick="subscriptionMessage()" title="From Here You Can See Learner Attendance List" class="sidebar-link text-white pl-lg-5">Attendance List</a>
                        <?php } ?>
                    </li>


                </ul>
            </div>
        </li> -->

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Marks" data-target="#pages14" aria-expanded="false" aria-controls="pages14" class="sidebar-link text-white">
                <i class="o-wireframe-1 mr-3 text-gray"></i><span>Manage Marks</span></a>
            <div id="pages14" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-learner-marks" title="From Here You Can Create Marksheet" class="sidebar-link text-white pl-lg-5">Create
                            New Mark Sheet</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Learner Performance Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= BASEURL ?>provider-learnermark-list" title="From Here You Can See Marksheet List" class="sidebar-link text-white pl-lg-5">Mark Sheet List</a>
                        <?php } else { ?>
                            <a onclick="subscriptionMessage()" title="From Here You Can See Marksheet List" class="sidebar-link text-white pl-lg-5">Mark Sheet List</a>
                        <?php } ?>
                    </li>
                    <!--  <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-import-learnermarks"
                            class="sidebar-link text-white pl-lg-5">Import Learner Marks</a></li> -->

                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Assessor " data-target="#pages9" aria-expanded="false" aria-controls="pages9" class="sidebar-link text-white">
                <i class="o-imac-screen-1 mr-3 text-gray"></i><span>My Assessor</span></a>
            <div id="pages9" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create-assessor-user'); ?>" title="From Here You Can Create Assessor " class="sidebar-link text-white pl-lg-5">Create
                            New Assessor</a></li>

                    <li class="sidebar-list-item"><a href="<?= site_url('assessor-user-list'); ?>" title="From Here You Can See Assessor List" class="sidebar-link text-white pl-lg-5">All Assessor list</a></li>

                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Moderator" data-target="#pages10" aria-expanded="false" aria-controls="pages10" class="sidebar-link text-white">
                <i class="o-id-card-1 mr-3 text-gray"></i><span>My Moderator</span></a>
            <div id="pages10" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create-moderator-user'); ?>" title="From Here You Can Create Internal Moderator" class="sidebar-link text-white pl-lg-5">Create
                            Internal Moderator</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= site_url('moderator-user-list'); ?>" title="From Here You Can See Internal Moderator List" class="sidebar-link text-white pl-lg-5">Internal Moderator List</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Internal Moderator List" class="sidebar-link text-white pl-lg-5">Internal Moderator List</a>
                <?php } ?>

                <li class="sidebar-list-item"><a href="<?= site_url('create-externalmoderator-user'); ?>" title="From Here You Can Create External Moderator " class="sidebar-link text-white pl-lg-5">Create
                        External Moderator</a></li>

                <li class="sidebar-list-item">
                    <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                    if (in_array("Facilitator and Moderator Management", $arrayfeatures)) {
                    ?>
                        <a href="<?= site_url('externalmoderator-user-list'); ?>" title="From Here You Can See External Moderator List" class="sidebar-link text-white pl-lg-5">External moderator list</a>
                </li>
            <?php } else { ?>
                <a onclick="subscriptionMessage()" title="From Here You Can See External Moderator List" class="sidebar-link text-white pl-lg-5">External Moderator List</a>
            <?php } ?>
                </ul>
            </div>
        </li>
        <!--
        <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-drop-out-list" class="sidebar-link text-white"><i
                    class="o-paperwork-1 mr-3 text-gray"></i><span>Drop Out List</span></a>
        </li>
       -->
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Learner Banking Details" data-target="#pages40" aria-expanded="false" aria-controls="pages8" class="sidebar-link text-white">
                <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Learner Banking Details</span></a>
            <div id="pages40" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create_banking_detail'); ?>" title="From Here You Can Create  Banking Details" class="sidebar-link text-white pl-lg-5"> Create Banking Detail</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Financial Management (including Stipends)", $arrayfeatures)) {
                        ?>
                            <a href="<?= site_url('list_banking_detail'); ?>" title="From Here You Can See Banking Details List" class="sidebar-link text-white pl-lg-5">List Of Banking Detail</a>
                    </li>
                <?php } else { ?>
                    <a onclick="subscriptionMessage()" title="From Here You Can See Banking Details List" class="sidebar-link text-white pl-lg-5">List Of Banking Detail</a>
                <?php } ?>

                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Quarterly Report" data-target="#pages12" aria-expanded="false" aria-controls="pages12" class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>Quarterly Report</span></a>
            <div id="pages12" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">


                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>Create-Quaterly-Report" title="From Here You Can Create Quarterly Report" class="sidebar-link text-white pl-lg-5">Create
                            Quarterly Report</a></li>


                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Quarterly report Compilation", $arrayfeatures)) {
                        ?>
                            <a href="<?= BASEURL ?>Quaterly-Report-list" title="From Here You Can See Quarterly Report List" class="sidebar-link text-white pl-lg-5">Quarterly Progress Report</a>
                        <?php } else { ?>
                            <a onclick="subscriptionMessage()" title="From Here You Can See Quarterly Report List" class="sidebar-link text-white pl-lg-5">Quaterly Report List</a>
                        <?php } ?>
                    </li>


                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage Messages" data-target="#pages14257" aria-expanded="false" aria-controls="pages14257" class="sidebar-link text-white"><i class="o-user-1 mr-3 text-gray"></i><span>Messages</span></a>

            <div id="pages14257" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= base_url('provider-sendMassage'); ?>" title="From Here You Can Compose Message" class="sidebar-link text-white pl-lg-5">Compose Message</a></li>
                    <li class="sidebar-list-item"><a href="<?= base_url('provider-inbox'); ?>" title="From Here You Can See Inbox Message" class="sidebar-link text-white pl-lg-5">Inbox</a></li>
                    <li class="sidebar-list-item"><a href="<?= base_url('provider-sentbox'); ?>" title="From Here You Can See Sentbox Message" class="sidebar-link text-white pl-lg-5">Sent Box</a></li>


                </ul>
            </div>
        </li>

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can  Send Bulk Messages and Emails" data-target="#pages4257" aria-expanded="false" aria-controls="pages4257" class="sidebar-link text-white"><i class="o-user-1 mr-3 text-gray"></i><span>Send Bulk Messages and Emails</span></a>

            <div id="pages4257" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= base_url('provider-sendBulkMassage'); ?>" title="From Here You Can  Send Bulk Messages " class="sidebar-link text-white pl-lg-5">Send Messages</a></li>
                    <!-- <li class="sidebar-list-item"><a href="<?= base_url('provider-sendBulkEmails'); ?>" title="From Here You Can  Send Bulk  Emails" class="sidebar-link text-white pl-lg-5">Send Emails</a></li> -->


                </ul>
            </div>
        </li>




        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages17" aria-expanded="false" aria-controls="pages17" title="From Here You Can Manage User" class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>User</span></a>
            <div id="pages17" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>Create-Provider-User" title="From Here You Can Create User" class="sidebar-link text-white pl-lg-5">Create User</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>Provider-User-list" title="From Here You Can See User List" class="sidebar-link text-white pl-lg-5">Users List</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages41" aria-expanded="false" aria-controls="pages8" title="From Here You Can Manage Learner Attendance" class="sidebar-link text-white">
                <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Learner Attendance</span></a>
            <div id="pages41" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= site_url('create_learner_attendance'); ?>" title="From Here You Can Create Learner Attendance" class="sidebar-link text-white pl-lg-5">Create Learner Attendance</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Learner Performance Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= site_url('list_learner_attendance'); ?>" title="From Here You Can See Learner Attendance List" class="sidebar-link text-white pl-lg-5">Learner Attendance List</a>
                        <?php } else { ?>
                            <a onclick="subscriptionMessage()" title="From Here You Can See Learner Attendance List" class="sidebar-link text-white pl-lg-5">Attendance List</a>
                        <?php } ?>
                    </li>


                </ul>
            </div>
        </li>




        <!-- <li class="sidebar-list-item"><a href="<?= base_url('create-learner-link'); ?>" class="sidebar-link text-white active"><i
                    class="o-home-1 mr-3 text-gray"></i><span>E-Learning</span></a>
        </li> -->

        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" title="From Here You Can Manage E-Learning" data-target="#pages457" aria-expanded="false" aria-controls="pages457" class="sidebar-link text-white"><i class="o-user-1 mr-3 text-gray"></i><span>E-Learning</span></a>

            <div id="pages457" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">

                    <li class="sidebar-list-item"><a href="<?= base_url('create-learner-link'); ?>" title="From Here You Can Create Live Class" class="sidebar-link text-white pl-lg-5">Create Live Class</a></li>

                    <li class="sidebar-list-item">
                        <?php $arrayfeatures = explode("%@#$", $plan[0]->feature);
                        if (in_array("Class Management", $arrayfeatures)) {
                        ?>
                            <a href="<?= base_url('create-learner-link-List'); ?>" title="From Here You Can See Live Class List" class="sidebar-link text-white pl-lg-5">Create Learner Link</a>
                        <?php } else { ?>
                            <a onclick="subscriptionMessage()" title="From Here You Can See Live Class List" class="sidebar-link text-white pl-lg-5">Create Learner Link</a>
                        <?php } ?>
                    </li>

                </ul>
            </div>
        </li>

        <!-- <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-attendance-list" class="sidebar-link text-white"><i
                    class="o-paperwork-1 mr-3 text-gray"></i><span>Attendance Sheet List</span></a>
        </li> -->
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