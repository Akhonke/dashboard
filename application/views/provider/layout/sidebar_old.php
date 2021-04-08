<div id="sidebar" class="sidebar py-3">
    <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item"><a href="<?= base_url('Provider-Dashboard'); ?>" class="sidebar-link text-white active"><i
                    class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages7" aria-expanded="false" aria-controls="pages7"
                class="sidebar-link text-white"><i class="o-user-1 mr-3 text-gray"></i><span>Learners</span></a>
            <div id="pages7" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= base_url('create-learner'); ?>" class="sidebar-link text-white pl-lg-5">Create Learner</a></li>
                    <li class="sidebar-list-item"><a href="<?= base_url('learner-list'); ?>" class="sidebar-link text-white pl-lg-5">Learner List</a></li>
                    <li class="sidebar-list-item"><a href="<?= base_url('provider-import-learner'); ?>" class="sidebar-link text-white pl-lg-5">Import Learner</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages1" aria-expanded="false" aria-controls="pages1"
                class="sidebar-link text-white"><i class="o-settings-window-1 mr-3 text-gray"></i><span>Unit & Types</span></a>
                <div id="pages1" class="collapse">
                    <!-- type -->
                 <a href="#" data-toggle="collapse" data-target="#pages2" aria-expanded="false" aria-controls="pages1"
                class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-muted"></i><span>Learnership Type </span></a>    
                <div id="pages2" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="<?= base_url('create-learnership'); ?>" class="sidebar-link text-white pl-lg-5">Create Learnership Type</a></li>
                        <li class="sidebar-list-item"><a href="<?= base_url('learnership-list'); ?>" class="sidebar-link text-white pl-lg-5">Learnership Type List</a></li>

                       
                    </ul>
                </div>
                <!--  -->
                  <a href="#" data-toggle="collapse" data-target="#pages3" aria-expanded="false" aria-controls="pages1"
                class="sidebar-link text-muted"><i class="o-news-article-1 mr-3 text-muted"></i><span>Learnership Sub-Type</span></a>    
                <div id="pages3" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                         <li class="sidebar-list-item"><a href="<?= base_url('create-sub-learnership'); ?>" class="sidebar-link text-white pl-lg-5">Create Learnership Sub Type</a></li>
                          <li class="sidebar-list-item"><a href="<?= base_url('learnership-sub-list'); ?>" class="sidebar-link text-white pl-lg-5">Learnership Sub Type List</a></li>

                       
                    </ul>
                </div>
                <!--  -->

                <a href="#" data-toggle="collapse" data-target="#pages4" aria-expanded="false" aria-controls="pages1"
                class="sidebar-link text-muted"><i class="o-presentation-1 mr-3 text-muted"></i><span>Unit</span></a>    
                <div id="pages4" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                         <li class="sidebar-list-item"><a href="<?= base_url('create-unit'); ?>" class="sidebar-link text-white pl-lg-5">Create Unit</a></li>
                        <li class="sidebar-list-item"><a href="<?= base_url('manage-unit'); ?>" class="sidebar-link text-white pl-lg-5">Unit List</a></li>
                       
                    </ul>
                </div>

            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages8" aria-expanded="false" aria-controls="pages8"
                class="sidebar-link text-white">
                <i class="o-laptop-screen-1 mr-3 text-gray"></i><span>Facilitator</span></a>
            <div id="pages8" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= site_url('create-facilitator-user'); ?>" class="sidebar-link text-white pl-lg-5">Create New facilitator</a></li>
                    <li class="sidebar-list-item"><a href="<?= site_url('facilitator-user-list'); ?>" class="sidebar-link text-white pl-lg-5">List All Facilitator</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages9" aria-expanded="false" aria-controls="pages9"
                class="sidebar-link text-white">
                <i class="o-imac-screen-1 mr-3 text-gray"></i><span>Assessor</span></a>
            <div id="pages9" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= site_url('create-assessor-user'); ?>" class="sidebar-link text-white pl-lg-5">Create
                            New Assessor</a></li>
                    <li class="sidebar-list-item"><a href="<?= site_url('assessor-user-list'); ?>" class="sidebar-link text-white pl-lg-5">List
                            All Assessor</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages10" aria-expanded="false" aria-controls="pages10"
                class="sidebar-link text-white">
                <i class="o-id-card-1 mr-3 text-gray"></i><span>Moderator</span></a>
            <div id="pages10" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= site_url('create-moderator-user'); ?>" class="sidebar-link text-white pl-lg-5">Create
                            New Moderator</a></li>
                    <li class="sidebar-list-item"><a href="<?= site_url('moderator-user-list'); ?>" class="sidebar-link text-white pl-lg-5">List
                            All Moderator</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages11" aria-expanded="false" aria-controls="pages11"
                class="sidebar-link text-white">
                <i class="o-id-card-1 mr-3 text-gray"></i><span>Stipends</span></a>
            <div id="pages11" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL?>provider-create-stipends" class="sidebar-link text-white pl-lg-5">Create New Stipends</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL?>provider-stipends-list" class="sidebar-link text-white pl-lg-5">List Stipends</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-drop-out-list" class="sidebar-link text-white"><i
                    class="o-paperwork-1 mr-3 text-gray"></i><span>Drop Out List</span></a>
        </li>
        <li class="sidebar-list-item"><a href="<?= BASEURL ?>change-passowrd" class="sidebar-link text-white"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Change Password</span></a>
        </li>
        <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages15" aria-expanded="false"
                aria-controls="pages15" class="sidebar-link text-white"><i class="o-earth-globe-1 mr-3 text-gray"></i><span>Report</span></a>
            <div id="pages15" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL?>provider-report-list"
                            class="sidebar-link text-white pl-lg-5">Training Provider Report List</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages13" aria-expanded="false" aria-controls="pages13"
                class="sidebar-link text-white">
                <i class="o-wireframe-1 mr-3 text-gray"></i><span>Class</span></a>
            <div id="pages13" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-create-class"
                            class="sidebar-link text-white pl-lg-5">Create
                            New Class Name</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-class-list"
                            class="sidebar-link text-white pl-lg-5">Class Name List</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages14" aria-expanded="false" aria-controls="pages14"
                class="sidebar-link text-white">
                <i class="o-wireframe-1 mr-3 text-gray"></i><span>Mark Sheet</span></a>
            <div id="pages14" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-learner-marks"
                            class="sidebar-link text-white pl-lg-5">Create
                            New Mark Sheet</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-learnermark-list"
                            class="sidebar-link text-white pl-lg-5">Mark Sheet List</a></li>
                   <!--  <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-import-learnermarks"
                            class="sidebar-link text-white pl-lg-5">Import Learner Marks</a></li> -->
                </ul>
            </div>
        </li>
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages5" aria-expanded="false" aria-controls="pages5"
                class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>Attendance</span></a>
            <div id="pages5" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-create-attendance"
                            class="sidebar-link text-white pl-lg-5">Create
                            Attendance</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-attendance-list" class="sidebar-link text-white pl-lg-5">Attendance Sheet List</a></li>
                </ul>
            </div>
        </li>
         <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages6" aria-expanded="false" aria-controls="pages6"
                class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>employer</span></a>
            <div id="pages6" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-create-employer"
                            class="sidebar-link text-white pl-lg-5">Create
                            Employer</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>provider-employer-list" class="sidebar-link text-white pl-lg-5">Employer List</a></li>
                </ul>
            </div>
        </li>
         <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages12" aria-expanded="false" aria-controls="pages12"
                class="sidebar-link text-white">
                <i class="o-code-window-1 mr-3 text-gray"></i><span>Quarterly Report</span></a>
            <div id="pages12" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>Create-Quaterly-Report"
                            class="sidebar-link text-white pl-lg-5">Create
                            Quarterly Report</a></li>
                    <li class="sidebar-list-item"><a href="<?= BASEURL ?>Quaterly-Report-list" class="sidebar-link text-white pl-lg-5">Report List</a></li>
                </ul>
            </div>
        </li>
         <!-- <li class="sidebar-list-item"><a href="<?= BASEURL?>provider-attendance-list" class="sidebar-link text-white"><i
                    class="o-paperwork-1 mr-3 text-gray"></i><span>Attendance Sheet List</span></a>
        </li> -->
    </ul>
</div>