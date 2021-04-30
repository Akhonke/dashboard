<?php

defined('BASEPATH') or exit('No direct script access allowed');



$route['default_controller'] = 'Web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*WEBSITE*/

$route['support'] = 'web/support';
$route['Product'] = 'web/product';
$route['Register'] = 'web/register';
// $route['RegisterData'] = 'web/register_data';
$route['RegistersDetails'] = 'web/register_data';
$route['Login'] = 'web/login';
$route['Pricing'] = 'web/pricing';
$route['Customer'] = 'web/customer';
$route['About-us'] = 'web/about_us';
$route['Carrer'] = 'web/career';
$route['Product-Services'] = 'web/product_services';
$route['Faq'] = 'web/faq';
$route['Contact-support'] = 'web/contact_support';
$route['success_payment_page'] = 'web/success_payment_page';

// $route['card-auth'] = 'web/card_auth';
// ********************************************************************SUPER ADMIN********************************************************************************************************

/*SUPER__ADMIN*/
$route['super-admin'] = 'welcome/superAdmin';
$route['super-admin-forget-password'] = 'welcome/superAdmin_forgetpassword';
$route['superAdmin-profile'] = 'SuperAdmin/profile';
$route['superAdmin-logout'] = 'SuperAdmin/logout';
$route['superAdmin-dashboard'] = 'SuperAdmin/dashboard';
$route['superAdmin-userList'] = 'SuperAdmin/usersList';
$route['superAdmin-plan'] = 'SuperAdmin/plan';
$route['superAdmin-planList'] = 'SuperAdmin/planList';
$route['superAdmin-sendMassage'] = 'SuperAdmin/sendMassage';
$route['superAdmin-sentbox'] = 'SuperAdmin/sentbox';
$route['superAdmin-sentboxview/(:any)'] = 'SuperAdmin/sentboxview/$1';
$route['superAdmin-inboxview/(:any)'] = 'SuperAdmin/inboxview/$1';
$route['superAdmin-inbox'] = 'SuperAdmin/inbox';
$route['superAdmin-sendBulkMassage'] = 'SuperAdmin/sendBulkMessage';
$route['superAdmin-sendBulkEmails'] = 'SuperAdmin/sendbulkEmails';
$route['superAdmin-our-customer-logo-list'] = 'SuperAdmin/ourCustomersLogoList';
$route['superAdmin-ticketList'] = 'SuperAdmin/ticketList';
$route['superAdmin-invoiceList'] = 'SuperAdmin/invoiceList';
$route['superAdmin-orderList'] = 'SuperAdmin/orderList';
$route['superAdmin-paid_and_free_user'] = 'SuperAdmin/paid_and_free_user';
$route['superAdmin-addBank'] = 'SuperAdmin/add_bank';
$route['superAdmin-banklist'] = 'SuperAdmin/banklist';
$route['create_province'] = 'SuperAdmin/create_province';
$route['create_district'] = 'SuperAdmin/create_district';
$route['create_region'] = 'SuperAdmin/create_region';
$route['create_city'] = 'SuperAdmin/create_city';
$route['create_municipality'] = 'SuperAdmin/create_municipality';










$route['superAdmin-userDetail'] = 'SuperAdmin/userDetail';
$route['superAdmin-editUser'] = 'SuperAdmin/editUser';
$route['superAdmin-our-customer-logo'] = 'SuperAdmin/ourCustomersLogo';
$route['superAdmin-addPlan'] = 'SuperAdmin/addPlan';
$route['superAdmin-editPlan/(:any)'] = 'SuperAdmin/editPlan/$1';
$route['superAdmin-updatePlan'] = 'SuperAdmin/updatePlan';
$route['superAdmin-trash'] = 'SuperAdmin/trash';
$route['superAdmin-important'] = 'SuperAdmin/important';
$route['superAdmin-couponList'] = 'SuperAdmin/couponList';
$route['superAdmin-addCoupon'] = 'SuperAdmin/addCoupon';
$route['superAdmin-editCoupon'] = 'SuperAdmin/editCoupon';
$route['superAdmin-couponDetail'] = 'SuperAdmin/couponDetail';
$route['superAdmin-paymentList'] = 'SuperAdmin/paymentList';
$route['superAdmin-addPayment'] = 'SuperAdmin/addPayment';
$route['superAdmin-paypal'] = 'SuperAdmin/paypal';
$route['superAdmin-skrills'] = 'SuperAdmin/skrills';
$route['superAdmin-payment_gateway'] = 'SuperAdmin/payment_gateway';
$route['superAdmin-slider'] = 'SuperAdmin/slider';
$route['superAdmin-logo'] = 'SuperAdmin/logo';
$route['superAdmin-blog'] = 'SuperAdmin/blog';
$route['superAdmin-emailList'] = 'SuperAdmin/emailList';
$route['superAdmin-addEmail'] = 'SuperAdmin/addEmail';
$route['superAdmin-leadList'] = 'SuperAdmin/leadList';
$route['superAdmin-payment_history'] = 'SuperAdmin/payment_history';
$route['superAdmin-order_history'] = 'SuperAdmin/order_history';
$route['superadmindeletedataRegion'] = 'SuperAdmin/deletedataRegion';
$route['superadmindeleterecordProvince'] = 'SuperAdmin/deleterecordProvince';
$route['deletedataDistrict'] = 'SuperAdmin/deletedataDistrict';
$route['deletedataCity'] = 'SuperAdmin/deletedataCity';
$route['superadmin_get_destrict'] = 'SuperAdmin/get_destrict';
$route['superadmin_get_region'] = 'SuperAdmin/get_region';
$route['superadmin_get_city'] = 'SuperAdmin/get_city';
$route['All-create-learnership'] = 'SuperAdmin/createLearnership';
$route['superadmin-editprofile'] = 'SuperAdmin/editProfile';
$route['superadmin-changepassword'] = 'SuperAdmin/changepassword';
$route['super_admin-invoicedetail'] = 'SuperAdmin/invoiceDetails';
// ********************************************************************ORGANIZATION********************************************************************************************************

$route['MyOrganization'] = 'welcome/index';
$route['myorganization-create_projects_list'] = 'MyOrganization/create_projects_list';
$route['create_new_task'] = 'MyOrganization/create_new_task';
$route['create_new_task_list'] = 'MyOrganization/create_new_task_list';
$route['dashboard'] = 'MyOrganization/dashboard';
$route['logout'] = 'MyOrganization/logout';
$route['unit_standards'] = 'MyOrganization/unit_standards';
$route['create_finanacial_year'] = 'MyOrganization/create_finanacial_year';
$route['create_quarterly_periods'] = 'MyOrganization/create_quarterly_periods';
$route['create-income-item'] = 'MyOrganization/create_income_item';
$route['income-item-list'] = 'MyOrganization/income_item_list';
$route['expense-view'] = 'MyOrganization/expense_view';
$route['create-expense-item'] = 'MyOrganization/create_expense_item';
$route['expense-item-list'] = 'MyOrganization/expense_item_list';
$route['account-balance-list'] = 'MyOrganization/account_balance_list';
$route['create_organisation'] = 'MyOrganization/create_organisation';
$route['organisation_list'] = 'MyOrganization/organisation_list';
$route['changestatus'] = 'MyOrganization/changestatus';
$route['programmer_list'] = 'MyOrganization/programmer_list';
$route['create_programmer'] = 'MyOrganization/create_programmer';
$route['project_list'] = 'MyOrganization/project_list';
$route['create_project'] = 'MyOrganization/create_project';
$route['training_list'] = 'MyOrganization/training_list';
$route['create_facilitator'] = 'MyOrganization/create_facilitator';
$route['facilitator_list'] = 'MyOrganization/facilitator_list';
$route['create_assessor'] = 'MyOrganization/create_assessor';
$route['create_moderator'] = 'MyOrganization/create_moderator';
$route['moderator_list'] = 'MyOrganization/moderator_list';
$route['external_moderator_list'] = 'MyOrganization/external_moderator_list';
$route['assessor_list'] = 'MyOrganization/assessor_list';
$route['deletedata'] = 'MyOrganization/deletedata';
$route['create_training'] = 'MyOrganization/create_training';
$route['create_learner'] = 'MyOrganization/create_learner';
$route['list_learner'] = 'MyOrganization/list_learner';
$route['All-manage-unit'] = 'MyOrganization/manageUnit';
$route['All-create-unit'] = 'MyOrganization/createUnit';
$route['All-learnership-list'] = 'MyOrganization/manageLearnership';
$route['All-learnership-sub-list'] = 'MyOrganization/learnershipSubList';
$route['All-create-sub-learnership'] = 'MyOrganization/createSubLearnership';
$route['acreditations_file_delete'] = 'MyOrganization/acreditations_file_delete';
$route['editprofile'] = 'MyOrganization/editprofile';
$route['changepass'] = 'MyOrganization/changepassword';
$route['import_learner'] = 'MyOrganization/import_learner';
$route['import_data'] = 'MyOrganization/import_data';
$route['complaints-suggestion-list'] = 'MyOrganization/complaints_suggestion_list';
$route['drop-out-list'] = 'MyOrganization/drop_out_list';
$route['stipends-list'] = 'MyOrganization/stipends_list';
$route['change-leaner-status'] = 'MyOrganization/change_leaner_status';
$route['new-create-sub-learnership'] = 'MyOrganization/newcreateSubLearnership';
$route['admin-forgot-password'] = 'welcome/forgot_password';
$route['deletedata'] = 'MyOrganization/deletedata';
$route['organisation-report-list'] = 'MyOrganization/organisation_report_list';
$route['organisation-view'] = 'MyOrganization/organisation_view';
$route['progammer-director-view'] = 'MyOrganization/progammer_director_view';
$route['project-manager-view'] = 'MyOrganization/project_manager_view';
$route['training-provider-view'] = 'MyOrganization/training_provider_view';
$route['monderator-view'] = 'MyOrganization/monderator_view';
$route['assessor-view'] = 'MyOrganization/assessor_view';
$route['facilitator-view'] = 'MyOrganization/facilitator_view';
$route['learner-view'] = 'MyOrganization/learner_view';
$route['learner-reason'] = 'MyOrganization/create_learner_reason';
$route['create-class'] = 'MyOrganization/create_class';
$route['class-list'] = 'MyOrganization/class_list';
$route['report'] = 'MyOrganization/report';
$route['attendance-list'] = 'MyOrganization/attendance_list';
$route['mark-sheet-list'] = 'MyOrganization/mark_sheet_list';
$route['get_destrict'] = 'MyOrganization/get_destrict';
$route['get_region'] = 'MyOrganization/get_region';
$route['get_city'] = 'MyOrganization/get_city';
$route['get_municipality'] = 'MyOrganization/get_municipality';
$route['deletedataclass'] = 'MyOrganization/deletedataClass';
$route['deletedataOrganisation'] = 'MyOrganization/deletedataOrganisation';
$route['deletedataprogrammedirector'] = 'MyOrganization/deletedataprogrammedirector';
$route['deletedataprojectmanager'] = 'MyOrganization/deletedataprojectmanager';
$route['deletedataAssessor'] = 'MyOrganization/deletedataAssessor';
$route['deletedataFacilitator'] = 'MyOrganization/deletedataFacilitator';
$route['deletedataLearner'] = 'MyOrganization/deletedataLearner';
$route['deletedataModerator'] = 'MyOrganization/deletedataModerator';
$route['deletedataTrainingprovider'] = 'MyOrganization/deletedataTrainingprovider';
$route['deletedataLearnerName'] = 'MyOrganization/deletedataLearnerName';
$route['deletedataLearnerShipType'] = 'MyOrganization/deletedataLearnerShipType';
$route['deletedataUnit'] = 'MyOrganization/deletedataUnit';
$route['trainingcompanyname'] = 'MyOrganization/trainingcompanyname';
$route['programme-Provider-Quaterly-Report-list']    = 'MyOrganization/totalQuarterlyReport';
$route['myorganization-upcoming'] = 'MyOrganization/upcoming';
$route['organisation-sendMassage'] = 'MyOrganization/sendMassage';
$route['organisation-inbox'] = 'MyOrganization/inbox';
$route['organisation-sentbox'] = 'MyOrganization/sentbox';
$route['organisation-sentboxview/(:any)'] = 'MyOrganization/sentboxview/$1';
$route['organisation-inboxview/(:any)'] = 'MyOrganization/inboxview/$1';
$route['MyOrganization-get_receiver'] = 'MyOrganization/get_receiver';
$route['organisation-trash'] = 'MyOrganization/trash';
$route['organisation-important'] = 'MyOrganization/important';
$route['organisation-sendBulkMassage'] = 'MyOrganization/sendBulkMessage';
$route['organisation-sendBulkEmails'] = 'MyOrganization/sendbulkEmails';
$route['MyOrganization-get_receiver_contact'] = 'MyOrganization/get_receiver_contact';

/******************************(17 FEB 2021)***************************************/
// create user
$route['create_user'] = 'MyOrganization/createUser';
$route['user_list'] = 'MyOrganization/userList';
// create department
$route['create_department'] = 'MyOrganization/createDepartment';
$route['department_list'] = 'MyOrganization/departmentList';
// create User Group
$route['create_user_group'] = 'MyOrganization/craeteUserGroup';
$route['user_group_list'] = 'MyOrganization/userGroupList';
// create User Role
$route['create_user_role'] = 'MyOrganization/craeteUserRole';
$route['user_role_list'] = 'MyOrganization/userRoleList';
// create Programme
$route['create_new_programme'] = 'MyOrganization/createNewProgramme';
$route['programme_list'] = 'MyOrganization/programmeList';
// create New Expense Item
$route['create_new_expense_item'] = 'MyOrganization/createNewExpenseItem';
$route['expense_item_list'] = 'MyOrganization/expenseitemList';
// create Sub Contractor Work Type
$route['create_sub_contractor_work_type'] = 'MyOrganization/createSubContractorWorkType';
$route['sub_contractor_work_type_list'] = 'MyOrganization/subContractorWorkTypeList';

// ********************************************************************PROJECT MANAGER********************************************************************************************************
$route['projectmanager'] = 'welcome/projectmanager';
$route['projectmanager-dashboard'] = 'projectmanager/dashboard';
$route['projectmanager-forget-password'] = 'welcome/projectmanager_forgetpassword';
$route['projectmanager-changepassword'] = 'projectmanager/changepassword';
$route['projectmanager-editprofile'] = 'projectmanager/editprofile';
$route['create_new_project'] = 'projectmanager/create_new_project';
$route['create_projects_list'] = 'projectmanager/create_projects_list';
$route['view_new_project'] = 'projectmanager/view_new_project';
$route['project_delete'] = 'projectmanager/project_delete';
$route['projectmanager-changestatus'] = 'projectmanager/projectmanager_changestatus';
$route['Projectmanager-create_new_task'] = 'projectmanager/create_new_task';
$route['Projectmanager-create_new_task_list']  = 'projectmanager/create_new_task_list';
$route['projectmanager-create_new_stipend'] = 'projectmanager/create_new_stipend';
$route['projectmanager-getlearner'] = 'projectmanager/get_learnername';
$route['projectmanager-create-training'] = 'projectmanager/projectmanager_create_training';
$route['projectmanagertraining-list'] = 'projectmanager/projectmanager_training_list';
$route['Projectmanager-create-employer'] = 'projectmanager/create_employer';
$route['projectmanager-facilitator-list'] = 'projectmanager/facilitator_list';
$route['projectmanager-assessor-list'] = 'projectmanager/assessor_list';
$route['projectmanager-moderator-list'] = 'projectmanager/moderator_list';
$route['projectmanager-external-moderator-list'] = 'projectmanager/external_moderator_list';
$route['projectmanager-list-learner'] = 'projectmanager/list_learner';
$route['projectmanager-mark-sheet-list'] = 'projectmanager/learner_mark_list';
$route['projectmanager-attendance-list'] = 'projectmanager/attendance_list';
$route['projectmanager-drop-out-list'] = 'projectmanager/drop_out_list';
$route['projectmanager-stipends-list'] = 'projectmanager/stipends_list';
$route['Provider-Quaterly-Report-list']    = 'projectmanager/quarterlyReport';
$route['Provider-Created-Quaterly-Report-list']    = 'projectmanager/quarterlyReportCreatedByProvider';
$route['projectmanager-class-list'] = 'projectmanager/class_list';
$route['projectmanager-create-income-item'] = 'projectmanager/create_income_item';
$route['projectmanager-income-item-list'] = 'projectmanager/income_item_list';
$route['projectmanager-create-expense-item'] = 'projectmanager/create_expense_item';
$route['projectmanager-expense-item-list'] = 'projectmanager/expense_item_list';
$route['projectmanager-account-balance-list'] = 'projectmanager/account_balance_list';
$route['projectmanager-bank-list'] = 'projectmanager/bank_list';
$route['Create-Projectmanager-User'] = 'projectmanager/create_user';
$route['Projectmanager-User-list'] = 'projectmanager/user_list';
$route['list-Attendance-Sheet']    = 'projectmanager/listProviderAddedAttendance';
$route['Projectmanager-employer-list'] = 'projectmanager/employer_list';
$route['projectmanager-create-bank'] = 'projectmanager/create_bank';
$route['projectmanager-get_sublearnership'] = 'projectmanager/get_sublearnership';
$route['projectmanager-getclassname'] = 'projectmanager/get_learnerclassname';
$route['Projectmanager-sendMassage'] = 'projectmanager/sendMassage';
$route['Projectmanager-inbox'] = 'projectmanager/inbox';
$route['Projectmanager-sentbox'] = 'projectmanager/sentbox';
$route['Projectmanager-sentboxview/(:any)'] = 'projectmanager/sentboxview/$1';
$route['Projectmanager-inboxview/(:any)'] = 'projectmanager/inboxview/$1';
$route['projectmanager-get_receiver'] = 'projectmanager/get_receiver';
$route['projectmanager-get_receiver_contact'] = 'projectmanager/get_receiver_contact';

$route['projectmanager-sendBulkMassage'] = 'projectmanager/sendBulkMessage';
$route['projectmanager-sendBulkEmails'] = 'projectmanager/sendbulkEmails';
// $route['Projectmanager-trash'] = 'projectmanager/trash';
// $route['Projectmanager-important'] = 'projectmanager/important';
$route['projectmanager-create-income'] = 'projectmanager/create_income_item';
$route['projectmanager-income-list'] = 'projectmanager/income_list';
$route['projectmanager-create-expenditure'] = 'projectmanager/create_expenditure_item';
$route['projectmanager-expenditure-list'] = 'projectmanager/expenditure_list';
$route['projectmanager-create_stipend_list'] = 'projectmanager/create_stipend_list';
$route['projectmanager-stipends-list'] = 'projectmanager/stipends_list';
$route['projectmanager-create-trainer'] = 'projectmanager/create_training';
$route['projectmanager-trainer-list'] = 'projectmanager/training_list';
$route['projectmanager-getcity'] = 'projectmanager/projectmanager_getcity';
$route['projectmanager-getmunicipality'] = 'projectmanager/projectmanager_getmunicipality';
$route['projectmanager-getdestrict'] = 'projectmanager/projectmanager_getdestrict';
$route['projectmanager-getregion'] = 'projectmanager/projectmanager_getregion';
$route['projectmanager-logout'] = 'projectmanager/logout';
$route['projectmanager-create-facilitator'] = 'projectmanager/create_facilitator';
$route['projectmanager-create-assessor'] = 'projectmanager/create_assessor';
$route['projectmanager-create-moderator'] = 'projectmanager/create_moderator';
$route['projectmanager-create-learner'] = 'projectmanager/create_learner';
$route['projectmanager-delete'] = 'projectmanager/projectmanager_acreditations_file_delete';
$route['projectmanager-deletedata'] = 'projectmanager/deletedata';
$route['projectmanager-report-list'] = 'projectmanager/projectmanager_report_list';
$route['projectmanager-project-view'] = 'projectmanager/project_manager_view';
$route['projectmanager-training-view'] = 'projectmanager/training_provider_view';
$route['projectmanager-monderator-view'] = 'projectmanager/monderator_view';
$route['projectmanager-assessor-view'] = 'projectmanager/assessor_view';
$route['projectmanager-facilitator-view'] = 'projectmanager/facilitator_view';
$route['projectmanager-learner-view'] = 'projectmanager/learner_view';
$route['projectmanager-import-learner'] = 'projectmanager/import_learner';
$route['projectmanager-leaner'] = 'projectmanager/change_leaner_status';
$route['projectmanager-import-data'] = 'projectmanager/import_data';
$route['projectmanager-create-class'] = 'projectmanager/create_class';
$route['projectmanager-stipends-list'] = 'projectmanager/stipends_list';
$route['projectmanager-deletedataclass'] = 'projectmanager/deletedataClass';
$route['projectmanager-expense-view'] = 'projectmanager/expense_view';
$route['projectmanagerdeletedataAssessor'] = 'projectmanager/deletedataAssessor';
$route['projectmanagerdeletedataFacilitator'] = 'projectmanager/deletedataFacilitator';
$route['projectmanagerdeletedataLearner'] = 'projectmanager/deletedataLearner';
$route['projectmanagerdeletedataModerator'] = 'projectmanager/deletedataModerator';
$route['projectmanagerdeletedataTrainingprovider'] = 'projectmanager/deletedataTrainingprovider';
$route['projectmanager-trainingcompanyname'] = 'projectmanager/trainingcompanyname';
$route['Projectmanager-User-Login']      =    'User/projectManagerUserLogin';
$route['Projectmanager-User-Edit'] = 'projectmanager/user_edit';
$route['Projectmanager-User-Delete']    =    'projectmanager/deleteUser';
$route['list-Mark-Sheet']    = 'projectmanager/listProviderAddedMarksheet';
$route['projectmanager-getdestrict'] = 'projectmanager/projectmanager_getdestrict';

$route['projectmanager-create-assessment'] = 'projectmanager/create_assessment';
$route['projectmanager-assessment-list'] = 'projectmanager/list_assessments';


/******************************(18 FEB 2021)***************************************/
// create Project
$route['Create-New-Project'] = 'projectmanager/createNewProject';
$route['New-Project-List'] = 'projectmanager/newProjectList';
// create New Subcontractor
$route['Create-New-Subcontractor'] = 'projectmanager/createNewSubcontractor';
$route['New-Subcontractor-List'] = 'projectmanager/newSubcontractorList';

// *************  Training Provider Routes  ********************************
$route['Traningprovider'] = 'welcome/trainingprovider'; //use for provider login
$route['provider-logout'] = 'Traningprovider/logout';
$route['Provider-Dashboard'] = 'Traningprovider/dashboard';
$route['change-passowrd'] = 'Traningprovider/updatePassword';
$route['learner-list'] = 'Traningprovider/learnerList';
$route['Rejected-learner-list'] = 'Traningprovider/rejected_learnerList';
$route['Dropout-learner-list'] = 'Traningprovider/dopout_learnerList';
$route['create-learner'] = 'Traningprovider/createLearner';
$route['create_learner_attendance'] = 'Traningprovider/create_learner_attendance';
$route['list_learner_attendance'] = 'Traningprovider/list_learner_attendance';
$route['create_banking_detail'] = 'Traningprovider/create_banking_detail';
$route['list_banking_detail'] = 'Traningprovider/list_banking_detail';
$route['create_learner_information'] = 'Traningprovider/create_learner_information';
$route['list_learner_information'] = 'Traningprovider/list_learner_information';
$route['create_Dropouts'] = 'Traningprovider/create_Dropouts';
$route['list_Dropouts'] = 'Traningprovider/list_Dropouts';
$route['manage-unit'] = 'Traningprovider/manageUnit';
$route['create-unit'] = 'Traningprovider/createUnit';
$route['learnership-list'] = 'Traningprovider/manageLearnership';
$route['create-learnership'] = 'Traningprovider/createLearnership';
$route['learnership-sub-list'] = 'Traningprovider/learnershipSubList';
$route['create-sub-learnership'] = 'Traningprovider/createSubLearnership';
$route['create-facilitator-user'] = 'Traningprovider/createfacilitator';
$route['facilitator-user-list'] = 'Traningprovider/facilitatoruserlist';
$route['assessor-user-list'] = 'Traningprovider/assessoruserlist';
$route['create-assessor-user'] = 'Traningprovider/createassessoruser';
$route['create-moderator-user'] = 'Traningprovider/createmoderatoruser';
$route['moderator-user-list'] = 'Traningprovider/moderatoruserlist';
$route['acreditationsfiledelete'] = 'Traningprovider/acreditationsfiledelete';
$route['provider-editprofile'] = 'Traningprovider/provider_editprofile';
$route['provider-import-learner'] = 'Traningprovider/provider_import_learner';
$route['provider-import-data'] = 'Traningprovider/provider_import_data';
$route['provider-download-csv-data'] = 'Traningprovider/provider_download_csv_data';
$route['provider-drop-out-list'] = 'Traningprovider/provider_drop_out_list';
$route['provider-stipends-list'] = 'Traningprovider/provider_stipends_list';
$route['provider-create-stipends'] = 'Traningprovider/provider_create_stipends';
$route['provider-getcity'] = 'Traningprovider/getcity';
$route['provider-getdestrict'] = 'Traningprovider/get_destrict';
$route['provider-getmunicipality'] = 'Traningprovider/getmunicipality';
$route['provider-changeleanerstatus'] = 'Traningprovider/provider_changeleanerstatus';
$route['trainingprovider-view'] = 'Traningprovider/training_provider_view';
$route['provider-monderator-view'] = 'Traningprovider/monderator_view';
$route['provider-assessor-view'] = 'Traningprovider/assessor_view';
$route['provider-facilitator-view'] = 'Traningprovider/facilitator_view';
$route['provider-learner-view'] = 'Traningprovider/learner_view';
$route['provider-report-list'] = 'Traningprovider/training_report_list';
$route['provider-learner-marks'] = 'Traningprovider/create_learner_mark';
$route['provider-learnermark-list'] = 'Traningprovider/learner_mark_list';
$route['provider-create-class'] = 'Traningprovider/create_class';
$route['provider-class-list'] = 'Traningprovider/class_list';
$route['provider-learnership'] = 'Traningprovider/provider_learnership';
$route['provider-export'] = 'Traningprovider/export_learnerMarks';
$route['provider-learnermarks-import-data'] = 'Traningprovider/learnermarks_import_data';
$route['provider-import-learnermarks'] = 'Traningprovider/provider_import_learnermarks';
$route['provider-getclassname'] = 'Traningprovider/get_learnerclassname';
$route['provider-attendance-list'] = 'Traningprovider/attendance_list';
$route['providerdeletedataAssessor'] = 'Traningprovider/deletedataAssessor';
$route['providerdeletedataFacilitator'] = 'Traningprovider/deletedataFacilitator';
$route['providerdeletedataLearner'] = 'Traningprovider/deletedataLearner';
$route['providerdeletedataModerator'] = 'Traningprovider/deletedataModerator';
$route['providerdeletedataLearnerName'] = 'Traningprovider/deletedataLearnerName';
$route['providerdeletedataLearnerShipType'] = 'Traningprovider/deletedataLearnerShipType';
$route['providerdeletedataUnit'] = 'Traningprovider/deletedataUnit';
$route['provider-create-attendance'] = 'Traningprovider/create_attendance';
$route['Create-Quaterly-Report'] = 'Traningprovider/create_quaterly_report';
$route['Quaterly-Report-list'] = 'Traningprovider/quaterly_report_list';
// $route['deleterecord'] = 'Traningprovider/deleterecord';
$route['Create-Provider-User'] = 'Traningprovider/create_user';
$route['Provider-User-list'] = 'Traningprovider/user_list';
$route['Provider-User-Edit'] = 'Traningprovider/user_edit';
$route['Provider-User-Login']    =    'User/providerUserLogin';
$route['Provider-User-Delete']    =    'Traningprovider/deleteUser';
$route['Bulk-Delete']    = 'Traningprovider/bulkDelete';
$route['provider-create-drop-out'] = 'Traningprovider/drop_out';
$route['bring-back-drop-out'] = 'Traningprovider/bring_back_drop_out';
$route['provider-getfacilitator'] = 'Traningprovider/get_facilitator';
$route['provider-getlearner'] = 'Traningprovider/get_learnername';
$route['provider-get_learnership'] = 'Traningprovider/get_learnership';
$route['provider-get_sublearnership'] = 'Traningprovider/get_sublearnership';
$route['create-test'] = 'Traningprovider/test';
$route['create-learner-link'] = 'Traningprovider/learnerlink';
$route['create-learner-link-List'] = 'Traningprovider/learnerlinklist';
$route['providerdeletedataLiveclass'] = 'Traningprovider/deletedataLiveClass';
$route['provider-sendMassage'] = 'Traningprovider/sendMassage';
$route['provider-inbox'] = 'Traningprovider/inbox';
$route['provider-sentbox'] = 'Traningprovider/sentbox';
$route['provider-trash'] = 'Traningprovider/trash';
$route['provider-important'] = 'Traningprovider/important';
$route['provider-sentboxview/(:any)'] = 'Traningprovider/sentboxview/$1';
$route['provider-inboxview/(:any)'] = 'Traningprovider/inboxview/$1';
$route['provider-get_receiver'] = 'Traningprovider/get_receiver';
$route['provider-get_receiver_contact'] = 'Traningprovider/get_receiver_contact';

$route['provider-sendBulkMassage'] = 'Traningprovider/sendBulkMessage';
$route['provider-sendBulkEmails'] = 'Traningprovider/sendbulkEmails';
// $route['provider-create-course'] = 'Traningprovider/create_course';
// $route['provider-create-test'] = 'Traningprovider/create_test';
// $route['provider-create-course'] = 'Traningprovider/create_course';
$route['provider-forget-password'] = 'welcome/provider_forgetpassword';

// ****************** Learner **************************** //
$route['learner'] = 'welcome/learner'; //use for Learner login
$route['learner-Dashboard'] = 'Learner/dashboard';
$route['learner-logout'] = 'Learner/logout';
$route['learner-editprofile'] = 'Learner/learner_editprofile';
$route['learner-changepassword'] = 'Learner/learner_changepassword';
$route['learner-complaints-suggestion'] = 'Learner/complaints_suggestion';
$route['learner-attendance-list'] = 'Learner/attendance_list';
$route['learner-attachments'] = 'Learner/attachments_list';
$route['learnerlist'] = 'Learner/learnerlist';
$route['learner-performance-list'] = 'Learner/performance_list';
$route['learner-drop-out'] = 'Learner/create_drop_out';
$route['learner-stipends-list'] = 'Learner/stipends_list';
$route['learner-live-class-List'] = 'Learner/live_class_list';
$route['learner-get-city'] = 'Learner/learner_getcity';
$route['learner-get-destrict'] = 'Learner/learner_getdestrict';
$route['learner-get-region'] = 'Learner/learner_getregion';
$route['learner-complaint-list'] = 'Learner/complaint_list';
$route['learner-suggestion-list'] = 'Learner/suggestion_list';
$route['learner-forget-password'] = 'welcome/learner_forgetpassword';

$route['learner-assessment-list'] = 'learner/list_assessments';
$route['learner-view-assessment'] = 'learner/view_assessment';
$route['learner-load-assessment'] = 'learner/load_assessment';

//****************************Assessor******************//
$route['assessor'] = 'welcome/assosser';
$route['assessor-dashboard'] = 'assessor/dashboard';
$route['assessor-logout'] = 'assessor/logout';
$route['assessor-changepassword'] = 'assessor/assessor_changepassword';
$route['assessor-editprofile'] = 'assessor/assessor_editprofile';
$route['assessor-changestatus'] = 'assessor/assessor_changestatus';
$route['assessor-getcity'] = 'assessor/assessor_getcity';
$route['assessor-getdestrict'] = 'assessor/assessor_getdestrict';
$route['assessor-getregion'] = 'assessor/assessor_getregion';
$route['assessor-get_municipality'] = 'assessor/get_municipality';
$route['assessor-create-attendance'] = 'assessor/assessor_create_attendance';
$route['assessor-attendance-list'] = 'assessor/assessor_attendance_list';
$route['assessor-create-absentee'] = 'assessor/assessor_create_absentee';
$route['assessor-absentee-list'] = 'assessor/assessor_absentee_list';
$route['assessor-acreditations-file-delete'] = 'assessor/assessor_acreditations_file_delete';
$route['assessor-autocomplete'] = 'assessor/assessor_autocomplete';
$route['assessor-getleaner'] = 'assessor/getLeaner';
$route['attendance-view'] = 'assessor/attendance_view';
$route['assessor-getclassname'] = 'assessor/get_classname';
$route['assessor-deletedata'] = 'assessor/deletedata';
$route['assessor-assesment-list'] = 'assessor/assesmentlist';
$route['assessor-create-assesment'] = 'assessor/createassesment';
$route['assessor-getunitstandard'] = 'assessor/getunitstandard';
$route['assessor-getlearner'] = 'assessor/get_learnername';
$route['assessor-get_sublearnership'] = 'assessor/get_sublearnership';
$route['assessor-user_listing'] = 'assessor/user_listing';
$route['assessor-forget-password'] = 'welcome/assessor_forgetpassword';

$route['assessor-completed-assessment-list'] = 'assessor/list_complete_assessments';
$route['assessor-view-assessment'] = 'assessor/view_assessment';
$route['assessor-mark-assessment'] = 'assessor/mark_assessment';

//*********************Assessor************************//










//**************************Moderator********************************
$route['moderator'] = 'welcome/moderator';
$route['moderator-dashboard'] = 'moderator/dashboard';






//***faciltator***/
$route['Faciltator'] = 'welcome/faciltator';
$route['Faciltator-dashboard'] = 'faciltator/dashboard';
$route['Faciltator-logout'] = 'faciltator/logout';
$route['Faciltator-changepassword'] = 'faciltator/faciltator_changepassword';
$route['Faciltator-editprofile'] = 'faciltator/faciltator_editprofile';
$route['Faciltator-changestatus'] = 'faciltator/faciltator_changestatus';
$route['Faciltator-getcity'] = 'faciltator/faciltator_getcity';
$route['Faciltator-getdestrict'] = 'faciltator/faciltator_getdestrict';
$route['Faciltator-getregion'] = 'faciltator/faciltator_getregion';
$route['faciltator-get_municipality'] = 'faciltator/get_municipality';
$route['Faciltator-acreditations-file-delete'] = 'faciltator/faciltator_acreditations_file_delete';
$route['Faciltator-getclassname'] = 'faciltator/get_classname';
$route['Faciltator-create-mark-sheet'] = 'faciltator/create_learner_mark';
$route['Faciltator-mark-sheet-list'] = 'faciltator/learner_mark_list';
$route['Faciltator-deletedata'] = 'faciltator/deletedata';
$route['Faciltator-getclassname'] = 'faciltator/get_classname';
$route['Faciltator-get_sublearnership'] = 'faciltator/get_sublearnership';
$route['facilitator-create-attendance'] = 'faciltator/create_attendance';
$route['facilitator-attendance-list'] = 'faciltator/attendance_list';
$route['facilitator-create-discipline'] = 'faciltator/create_discipline';
$route['facilitator-discipline-list'] = 'faciltator/discipline_list';
$route['Faciltator-getlearner'] = 'faciltator/get_learnername';
$route['Faciltator-sendMassage'] = 'faciltator/sendMassage';
$route['Faciltator-inbox'] = 'faciltator/inbox';
$route['Faciltator-sentbox'] = 'faciltator/sentbox';
$route['Faciltator-trash'] = 'faciltator/trash';
$route['Faciltator-important'] = 'faciltator/important';
$route['Facilitator-get_receiver'] = 'faciltator/get_receiver';
$route['Facilitator-sentboxview/(:any)'] = 'faciltator/sentboxview/$1';
$route['Facilitator-inboxview/(:any)'] = 'faciltator/inboxview/$1';
$route['Faciltator-forget-password'] = 'welcome/facilitator_forgetpassword';

$route['facilitator-completed-assessment-list'] = 'faciltator/list_complete_assessments';
$route['faciltator-view-assessment'] = 'faciltator/view_assessment';
$route['facilitator-mark-assessment'] = 'faciltator/mark_assessment';

// $route['faciltator-view-assessment-submission'] = 'faciltator/view_assessment_submission';
// $route['faciltator-load-assessment'] = 'faciltator/load_assessment';



/******************INternal Moderator*****************************************/
$route['internal-moderator'] = 'welcome/moderator';
$route['internal-Moderator-dashboard'] = 'moderator/dashboard';
$route['internal-moderator-logout'] = 'moderator/logout';
$route['internal-moderator-changepassword'] = 'moderator/moderator_changepassword';
$route['internal-moderator-editprofile'] = 'moderator/moderator_editprofile';
$route['internal-moderator-changestatus'] = 'moderator/moderator_changestatus';
$route['internal-moderator-getcity'] = 'moderator/moderator_getcity';
$route['internal-moderator-getdestrict'] = 'moderator/moderator_getdestrict';
$route['internal-moderator-getregion'] = 'moderator/moderator_getregion';
$route['internal-moderator-get_municipality'] = 'moderator/get_municipality';
$route['internal-moderator-acreditations-file-delete'] = 'moderator/moderator_acreditations_file_delete';
$route['internal-moderator-create-moderation'] = 'moderator/create_moderation';
$route['internal-moderator-getunitstandard'] = 'moderator/getunitstandard';
$route['internal-moderator-getlearner'] = 'moderator/get_learnername';
$route['internal-moderator-get_sublearnership'] = 'moderator/get_sublearnership';
$route['internal-moderator-user_listing'] = 'moderator/user_listing';
$route['internal-moderator-getclassname'] = 'moderator/get_classname';
$route['internal-moderator-moderation-list'] = 'moderator/moderationlist';
$route['internal-moderator-deletedata'] = 'moderator/deletedata';
$route['internal-moderator-forget-password'] = 'welcome/internal_moderator_forgetpassword';
// **************************** external moderator ************************************************
$route['external-moderator'] = 'welcome/externalmoderator';
$route['external-Moderator-dashboard'] = 'External_moderator/dashboard';
$route['external-moderator-logout'] = 'External_moderator/logout';
$route['external-moderator-changepassword'] = 'External_moderator/moderator_changepassword';
$route['external-moderator-editprofile'] = 'External_moderator/moderator_editprofile';
$route['external-moderator-changestatus'] = 'External_moderator/moderator_changestatus';
$route['external-moderator-getcity'] = 'External_moderator/moderator_getcity';
$route['external-moderator-getdestrict'] = 'External_moderator/moderator_getdestrict';
$route['external-moderator-getregion'] = 'External_moderator/moderator_getregion';
$route['external-moderator-get_municipality'] = 'External_moderator/get_municipality';
$route['external-moderator-acreditations-file-delete'] = 'External_moderator/moderator_acreditations_file_delete';
$route['external-moderator-create-moderation'] = 'External_moderator/create_moderation';
$route['external-moderator-getunitstandard'] = 'External_moderator/getunitstandard';
$route['external-moderator-getlearner'] = 'External_moderator/get_learnername';
$route['external-moderator-get_sublearnership'] = 'External_moderator/get_sublearnership';
$route['external-moderator-user_listing'] = 'External_moderator/user_listing';
$route['external-moderator-getclassname'] = 'External_moderator/get_classname';
$route['external-moderator-moderation-list'] = 'External_moderator/moderationlist';
$route['external-moderator-deletedata'] = 'External_moderator/deletedata';
$route['external-moderator-forget-password'] = 'welcome/external_moderator_forgetpassword';
$route['create-externalmoderator-user'] = 'Traningprovider/createexternalmoderatoruser';
$route['externalmoderator-user-list'] = 'Traningprovider/externalmoderatoruserlist';
