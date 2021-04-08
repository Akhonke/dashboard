<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JscssOrganisation extends CI_Model
{
	public function css($page)
	{
		$css = [];
		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="' . BASEURL . 'assets/admin/fontawesome/all.css" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">';
    	$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/orionicons.css" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/custom.css" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="' . BASEURL . 'assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">';
    	$css[] = '<link href="' . BASEURL . 'assets/validation/css/screen.css" rel="stylesheet" type="text/css">';
		if ($page == 'create_province'||$page =='create_training'||$page =='create_project'||$page =='create_city'||$page=='organisation_list'||$page=='programmer_list'||$page=='project_list'||$page=='training_list'||$page=='facilitator_list'||$page=='assessor_list'||$page=='moderator_list'||$page=='organisation_view'||$page=='progammer_director_view'||$page=='project_manager_view'||$page=='training_provider_view'||$page=='assessor_view'||$page=='monderator_view'||$page=='facilitator_view'||$page=='learner_view'||$page=='class_list'||$page=='learner_marks_list'||$page=='attendance_list'||$page=='drop_out_list'||$page=='stipend_list'||$page=='organisation_report_list'||$page=='learner_list' || $page == 'createUser' ||$page == 'userList') {
			$css[] = '<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">';
			$css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';
		}
		

		return $css;
	}
	public function js($page)
	{
		$js = [];
		$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/vendor/jquery/jquery.min.js"></script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/vendor/popper.js/umd/popper.min.js"> </script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/vendor/bootstrap/js/bootstrap.min.js"></script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/vendor/jquery.cookie/jquery.cookie.js"> </script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/jsdelivr/js.cookie.min.js"></script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/js/front.js"></script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/sweetalert/sweetalert.js"></script>';
    	$js[] = '<script src="' . BASEURL . 'assets/admin/sweetalert/sweetalert.min.js"></script>';
    	$js[] = '<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>';
		if ($page == 'dashboard') {
		$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/vendor/chart.js/Chart.min.js"></script>';
		$js[] = '<script src="' . BASEURL . 'assets/admin/cloudfront/js/charts-home.js"></script>';
		}
		if ($page == 'editprofile'||$page =='create_programmer'||$page =='create_training'||$page =='create_project'||$page=='organisation_list'||$page=='programmer_list'||$page=='project_list'||$page=='training_list'||$page=='facilitator_list'||$page=='assessor_list'||$page=='moderator_list'||$page="changepassword"||$page=='organisation_view'||$page=='progammer_director_view'||$page=='project_manager_view'||$page=='training_provider_view'||$page=='assessor_view'||$page=='monderator_view'||$page=='facilitator_view'||$page=='learner_view'||$page=='class_list'||$page=='learner_marks_list'||$page=='attendance_list'||$page=='drop_out_list'||$page=='stipend_list'||$page=='organisation_report_list'||$page=='learner_list' || $page == 'createUser' ||$page == 'userList') {
		$js[] = '<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>';
		$js[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>';
		$js[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>';
		$js[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>';
		$js[] = '<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>';
		$js[] = "<script>
		        	$(document).ready(function() {
			$('.table').DataTable( {
				dom: 'Bfrtip',
				buttons: [
				{
                  extend: 'pdfHtml5',
                  orientation: 'landscape',//landscape give you more space
                  pageSize: 'A0',//A0 is the largest A5 smallest(A0,A1,A2,A3,legal,A4,A5,letter))
                },
					'copy', 'csv', 'excel', 'print' ,'colvis'
				]
			} );
			$('.table').addClass('nowrap')
		} );
		</script>";
		    if($page !='programmer_list'||$page !='project_list'||$page !='training_list'){
	         $js[] ='<script>
		        function deleterecord(tablename,columnname,id){ 
	                swal({
	                    title: "Are you sure?",
	                    text: "Delete",
	                    type: "warning",
	                    showCancelButton: true,
	                    confirmButtonClass: "btn-danger",
	                    confirmButtonText: "Yes, delete it!",
	                    cancelButtonText: "No, cancel plx!",
	                    closeOnConfirm: false,
	                    closeOnCancel: false
	                }, 
	                function (isConfirm) {
	                    if (isConfirm) {
	                        $.ajax({
	                            type:"GET",
							    url: "organisation-deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,
	                            success : function(data){
	                                swal("Deleted!", "Record Delete Successfully.", "success");
	                                $("#del-"+id).remove();
	                            },
	                            error : function(jqXHR, textStatus, errorThrown){
	                                swal("Error deleting!", "Please try again", "error");
	                            }
	                        });
	                    } else {
	                      swal("Cancelled", "Your imaginary file is safe :)", "error");
	                    }
	                });    
	            }
	            </script>';
            }

		}
		if($page =='programmer_list'){
        	   $js[] ='<script>
		        function organisationdeletedataprojectmanager(tablename,columnname,id){ 
                    swal({
	                    title: "Are you sure?",
	                    text: "Delete",
	                    type: "warning",
	                    showCancelButton: true,
	                    confirmButtonClass: "btn-danger",
	                    confirmButtonText: "Yes, delete it!",
	                    cancelButtonText: "No, cancel it!",
	                    closeOnConfirm: false,
	                    closeOnCancel: false
	                }, 
	                function (isConfirm) {
	                    if (isConfirm) {
	                        $.ajax({
	                            type:"GET",
							    url:"organisationdeletedataprojectmanager?table="+tablename+"&behalf="+columnname+"&data="+id,
							    dataType: "json",
	                            success : function(data){
	                            	if(data.status == "true"){
                                        swal("Deleted!", "Record Delete Successfully.", "success");
                                       $("#del-"+id).remove();
                                    }
                                    if(data.error == "error"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
	                            },
	                            error : function(jqXHR, textStatus, errorThrown){
	                                swal("Error deleting!", "Please try again", "error");
	                            }
	                        });
	                    } else {
	                      swal("Cancelled", "Your imaginary file is safe :)", "error");
	                    }
	                });    
	            }
           	</script>';
        }
        if($page =='project_list'){
        	   $js[] ='<script>
		        function organisationdeletedataprojectmanager(tablename,columnname,id){ 
                    swal({
	                    title: "Are you sure?",
	                    text: "Delete",
	                    type: "warning",
	                    showCancelButton: true,
	                    confirmButtonClass: "btn-danger",
	                    confirmButtonText: "Yes, delete it!",
	                    cancelButtonText: "No, cancel it!",
	                    closeOnConfirm: false,
	                    closeOnCancel: false
	                }, 
	                function (isConfirm) {
	                    if (isConfirm) {
	                        $.ajax({
	                            type:"GET",
							    url:"organisationdeletedataprojectmanager?table="+tablename+"&behalf="+columnname+"&data="+id,
							    dataType: "json",
	                            success : function(data){
	                            	if(data.status == "true"){
                                        swal("Deleted!", "Record Delete Successfully.", "success");
                                       $("#del-"+id).remove();
                                    }
                                    if(data.error == "error"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
	                            },
	                            error : function(jqXHR, textStatus, errorThrown){
	                                swal("Error deleting!", "Please try again", "error");
	                            }
	                        });
	                    } else {
	                      swal("Cancelled", "Your imaginary file is safe :)", "error");
	                    }
	                });    
	            }
           	</script>';
        }
        if($page =='training_list'){
        	   $js[] ='<script>
		        function organisationdeletedatatraining(tablename,columnname,id){ 
                    swal({
	                    title: "Are you sure?",
	                    text: "Delete",
	                    type: "warning",
	                    showCancelButton: true,
	                    confirmButtonClass: "btn-danger",
	                    confirmButtonText: "Yes, delete it!",
	                    cancelButtonText: "No, cancel plx!",
	                    closeOnConfirm: false,
	                    closeOnCancel: false
	                }, 
	                function (isConfirm) {
	                    if (isConfirm) {
	                        $.ajax({
	                            type:"GET",
							    url:"organisationdeletedatatraining?table="+tablename+"&behalf="+columnname+"&data="+id,
							    dataType: "json",
	                            success : function(data){
	                            	if(data.status == "true"){
                                        swal("Deleted!", "Record Delete Successfully.", "success");
                                       $("#del-"+id).remove();
                                    }
                                    if(data.error == "moderator"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&moder"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&moder&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&asso&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&fac&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "learner&moder&ass&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    ///------- moderator-------------//
                                    if(data.error == "moderator&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&lea&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&asso&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&fac&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "moderator&lea&asso&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    //------------assessor
                                    if(data.error == "assessor&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&lea&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&mon&fac"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&fac&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "assessor&lea&fac&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    //--------------Facilitator
                                    if(data.error == "facilitator&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&mon"){
                                        swal("Error deleting!","You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&lea&asso"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&asso&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&mon&lea"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
                                    if(data.error == "facilitator&lea&asso&mon"){
                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");
                                    }
	                            },
	                            error : function(jqXHR, textStatus, errorThrown){
	                                swal("Error deleting!", "Please try again", "error");
	                            }
	                        });
	                    } else {
	                      swal("Cancelled", "Your imaginary file is safe :)", "error");
	                    }
	                });    
	            }
           	</script>';
        }
		if($page == 'changepassword'){
			  $js[] = '<script>
				    $(function() {
				       $("#ChangepasswordForm").validate({
				           rules: {
				            oldpassword:{
                                required: true,
                            },
					        password:{
					          required: true,
					          minlength:5,
					        },
					        confirm_password:{
					          required: true,
					          minlength:5,
					          equalTo:"#password",
					        },  
				          },
				            messages: {
				            	oldpassword:{
                                  required: "Please enter your old password",
                                  minlength: "Password must be at least 5 characters long"
                                },
				                password:{
                                  required: "Please enter your new password ",
                                  minlength: "Password must be at least 5 characters long"
                                },
					            confirm_password:{
					              required: "Please enter your confirm password",
					              minlength: "Confirm password must be at least 5 characters long",
					              equalTo:"Password and confirm password not match!",
					            },
				            },
				            submitHandler: function(form) {
				                form.submit();
				            }
				        });
				    });
				    </script>';
			
		}
		if($page == 'editprofile'){
		  $js[] = '<script>
				    $(function() {
				    	$.validator.addMethod("fullname", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
                        }, "Only letters and white space allowed.");

                        $.validator.addMethod("surname", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
                        }, "Only letters and white space allowed.");
				    	$.validator.addMethod("organisation_name", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
                        }, "Only letters and white space allowed.");
				        $("#CreateOrganisationForm").validate({
				            rules: {
				            	fullname: "required",
				                surname: "required",
				                organisation_name:{
				                    required: true,
				                },
				                email_address: {
				                    required: true,
				                    email: true
				                },
				               
				                mobile_number: {
				                    required: true,
				                    number: true,
				                    minlength: 9,
				                    maxlength: 9,
				               },
				                landline_number: {
				                    required: true,
				                    number: true,
				                    minlength: 9,
				                    maxlength: 9,
				                },province:{
			                        required: true,
			                    },
					            district:{
					              required: true,
					            },
					            region:{
					              required: true,
					            },
					            city:{
					              required: true,
					            },
					            Suburb:{
					              required: true,
					            },
					            Street_name:{
					              required: true,
					            },
					            Street_number:{
					              required: true,
					            },
				            },
				            messages: {
				            	fullname: "Please enter your fullname name",
				                surname: "Please enter your surname name",
				                organisation_name:  {
				                    required: "Please enter your organisation name",
				                },
				                email_address: "Please enter a valid email address",
				                
				                
				                mobile_number: {
				                    required: "Please enter your mobile number",
				                    minlength: "Your mobile number must be at least 9 characters long"
				                },
				                landline_number: {
				                    required: "Please enter your mobile number",
				                    minlength: "Your mobile number must be at least 9 characters long"
				                },
				                province:{
			                       required: "Please select your province name",
			                    },
					            district:{
					              required: "Please select your district",
					            },
					            region:{
					              required: "Please select your region",
					            },
					            city:{
					              required: "Please select your city",
					            },
					            Suburb:{
					              required: "Please enter your Suburb",
					            },
					            Street_name:{
					              required: "Please enter your street name",
					            },
					            Street_number:{
					              required: "Please enter your street number",
					            },
				            },
				            submitHandler: function(form) {
				                form.submit();
				            }
				        });
				    });
				</script>';	
		}
		if($page == 'create_programmer'){
		  $js[] = '<script>
				    $(function() {
				    	$.validator.addMethod("fullname", function(value, element) {
					        // allow any non-whitespace characters as the host part
					            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
					        }, "Only letters and white space allowed.");

					        $.validator.addMethod("surname", function(value, element) {
					        // allow any non-whitespace characters as the host part
					            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
					        }, "Only letters and white space allowed.");
				    	$.validator.addMethod("project_director", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
                        }, "Only letters and white space allowed.");

                      /*  $.validator.addMethod("programme_name", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
                        }, "Only letters and white space allowed.");*/
                        $.validator.addMethod("dateBefore", function (value, element, params) {
			            // if end date is valid, validate it as well
			            var end = $(params);
			            if (!end.data("validation.running")) {
			                $(element).data("validation.running", true);
			                setTimeout($.proxy(

			                function () {
			                    this.element(end);
			                }, this), 0);
			                // Ensure clearing the "flag" happens after the validation of "end" to prevent endless looping
			                setTimeout(function () {
			                    $(element).data("validation.running", false);
			                }, 0);
			            }
			            return this.optional(element) || this.optional(end[0]) || new Date(value) < new Date(end.val());

			        }, "Must be before corresponding end date");

			        $.validator.addMethod("dateAfter", function (value, element, params) {
			            // if start date is valid, validate it as well
			            var start = $(params);
			            if (!start.data("validation.running")) {
			                $(element).data("validation.running", true);
			                setTimeout($.proxy(

			                function () {
			                    this.element(start);
			                }, this), 0);
			                setTimeout(function () {
			                    $(element).data("validation.running", false);
			                }, 0);
			            }
			            return this.optional(element) || this.optional(start[0]) || new Date(value) > new Date($(params).val());

			        }, "Must be after corresponding start date");

				        $("#CreateProgrammerForm").validate({
				            rules: {
				            	 fullname: "required",
                                surname: "required",
				                project_director:{
				                    required: true,
				                },
				                programme_name:{
				                    required: true,
				                },
				                programme_start_date:{
			                      dateBefore: "#programme_end_date",
			                      required: true
			                    },
			                    programme_end_date:{
			                      dateAfter: "#programme_start_date",
			                      required: true
			                    },
			                    q1_start_date:{
			                      dateBefore: "#q1_end_date",
			                      required: true
			                    },
			                    q1_end_date:{
			                      dateAfter: "#q1_start_date",
			                      required: true
			                    },
			                     q2_start_date:{
			                      dateBefore: "#q2_end_date",
			                      required: true
			                    },
			                    q2_end_date:{
			                      dateAfter: "#q2_start_date",
			                      required: true
			                    },
			                     q3_start_date:{
			                      dateBefore: "#q3_end_date",
			                      required: true
			                    },
			                    q3_end_date:{
			                      dateAfter: "#q3_start_date",
			                      required: true
			                    },
			                    q4_start_date:{
			                      dateBefore: "#q4_end_date",
			                      required: true
			                    },
			                    q4_end_date:{
			                      dateAfter: "#q4_start_date",
			                      required: true
			                    },
				                physical_address: {
				                    required: true,
				                    minlength: 5
				                },
				                contact_person: {
				                   required: true,
				                    minlength: 9,
				                    maxlength: 9,
				                    number: true},
				                email_address: {
				                    required:true,
				                    email:true,
				                },
				               /* tax_clearance: {
				                    required: true,
				                },
				                "company_registration_documents[]":{
				                 required: true,
				                },*/
				                password:{
			                       required: true,
			                       minlength: 5,
			                    }, province:{
				                    required: true,
				                },
				                district:{
				                  required: true,
				                },
				                region:{
				                  required: true,
				                },
				                city:{
				                  required: true,
				                },
				                Suburb:{
				                  required: true,
				                },
				                Street_name:{
				                  required: true,
				                },
				                Street_number:{
				                  required: true,
				                },
				                
				                contact_person: {
				                    required: true,
				                    number: true,
				                    minlength: 9,
				                    maxlength: 9,
				               },
				               mobile_number: {
				                    required: true,
				                    number: true,
				                    minlength: 9,
				                    maxlength: 9,
				               },

				            },
				            messages: {
				            	fullname: "Please enter your fullname name",
                                surname: "Please enter your surname name",
				                project_director:  {
				                    required: "Please enter your project director",
				                },
				                programme_name:  {
				                    required: "Please enter your programme name",
				                },
				                programme_start_date:{
			                       required: "Please enter your programme start date",
			                    },
			                    programme_end_date:{
			                       required: "Please enter your programme end date",
			                    },
			                     q1_start_date:{
			                       required: "Please enter your Quarter 1 start date",
			                    },
			                    q1_end_date:{
			                       required: "Please enter your Quarter 1 end date",
			                    },
			                     q2_start_date:{
			                       required: "Please enter your Quarter 2 start date",
			                    },
			                    q2_end_date:{
			                       required: "Please enter your Quarter 2 end date",
			                    },
			                    q3_start_date:{
			                       required: "Please enter your Quarter 3 start date",
			                    },
			                    q3_end_date:{
			                       required: "Please enter your Quarter 3 end date",
			                    },
			                     q4_start_date:{
			                       required: "Please enter your Quarter 4 start date",
			                    },
			                    q4_end_date:{
			                       required: "Please enter your Quarter 4 end date",
			                    },
				                contact_person:  {
				                    required: "Please enter your landline number",
				                    minlength: "Your landline number must be at least 9 characters long"
				                },

				                email_address: {
				                	required:"Please enter your email address",
				                    email:"Please enter a valid email address",
				                },
				                
				              
				                
				                /*tax_clearance: {
				                    required: "Please choose tex clearance",
				                   
				                },
				                "company_registration_documents[]":{
                                   required: "Please choose company document",
				                },*/
				                password:{
			                       required: "Please enter your password",
			                       minlength:"password must be at least 5 characters long"
			                    },
			                     province:{
			                       required: "Please select your province name",
			                    },
					            district:{
					              required: "Please select your district",
					            },
					            region:{
					              required: "Please select your region",
					            },
					            city:{
					              required: "Please select your city",
					            },
					            Suburb:{
					              required: "Please enter your Suburb",
					            },
					            Street_name:{
					              required: "Please enter your street name",
					            },
					            Street_number:{
					              required: "Please enter your street number",
					            },
					            mobile_number: {
				                  required: "Please enter your mobile number",
				                    minlength: "Your mobile number must be at least 9 characters long"
				               },
				            },
				            submitHandler: function(form) {
				                form.submit();
				            }
				        });
				    });
				</script>';	
		} 

		if($page == 'create_programmer'||$page== 'editprofile'||$page=='create_training'||$page =='create_project'){
			$js[] ="<script> $('.province').change(function(){
				        $.ajax({
				            url: 'organisation-getdestrict',
				            data: { 'value': $('.province').val() },
				            dataType:'json',
				            type: 'post',
				            success: function(data){
				                var option = '';
				               $.each(data, function(i, star) {
				                    if(i == 'error'){
				                        $('.district_option').html(option);
				                        $('#district-error').show();
				                        $('#district-error').html(star);
				                    }else{
				                      option += '<option value='+star.id+'>'+star.name+'</option>'
				                      $('.district_option').html('<option>Select District</option>'+option);
				                      $('#district-error').hide();
				                    }
				                });
				              
				            }
				        });
				    });
				    $('.district_option').change(function(){
				       $.ajax({
				            url: 'organisation-getregion',
				            data: { 'value': $('.district_option').val() },
				            dataType:'json',
				            type: 'post',
				            success: function(data){
				                var option = '';
				               $.each(data, function(i, star) {
				                if(i == 'error'){
				                        $('#region').html(option);
				                        $('#region-error').show();
				                        $('#region-error').html(star);
				                 }else{
				                       option += '<option value='+star.id+'>'+star.region+'</option>'
				                       $('#region').html('<option>Select Region</option>'+option);
				                       $('#region-error').hide();
				                }
				                });
				              
				            }
				        });
				    });

				    $('#region').change(function(){
				       $.ajax({
				            url: 'organisation-getcity',
				            data: { 'value': $('#region').val() },
				            dataType:'json',
				            type: 'post',
				            success: function(data){
				                var option = '';
				               $.each(data, function(i, star) {
				                    if(i == 'error'){
				                        $('#city').html(option);
				                        $('#city-error').show();
				                        $('#city-error').html(star);
				                    }else{
				                        option += '<option value='+star.id+'>'+star.city+'</option>'
				                        $('#city').html('<option>Select City</option>'+option);
				                        $('#city-error').hide();
				                    }
				                });
				            }
				        });
				    });
			</script>";
		}
		if($page =='programmer_list'||$page=='project_list'){
			$js[] = '<script>
			$(document).on("click",".status_checks",function(){
		        var status = ($(this).hasClass("btn-success")) ? "0" : "1"; 
		        var msg = (status=="0")? "Deactivate" : "Activate";
		        var current_element = $(this);  
			    swal({
			        title: "Are you sure?",
			        text: msg,
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: msg,
			        closeOnConfirm: false
		        }, function (isConfirm) {
		        if (!isConfirm) return;
			        $.ajax({
			            url :"organisation-changestatus",
			            type : "POST",
			            dataType : "JSON",
			            data: {tablenm_id:$(current_element).attr("data"),status:status},
			            success : function(data){
			            	location.reload();
			            },
			            error : function(jqXHR, textStatus, errorThrown){
			                swal("Error deleting!", "Please try again", "error");
			            }
					});
		        });    
	        });
	       </script>';
		}
		if($page == 'create_project'){
		  $js[] = '<script>
				    $(function() {
				    	$.validator.addMethod("fullname", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
                        }, "Only letters and white space allowed.");

                        $.validator.addMethod("surname", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
                        }, "Only letters and white space allowed.");
				    
                      /*  $.validator.addMethod("programme_name", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );
                        }, "Only letters and white space allowed.");*/

                        $.validator.addMethod("project_manager", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
                        }, "Only letters and white space allowed.");

                        $.validator.addMethod("project_name", function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
                        }, "Only letters and white space allowed.");
                        
                        $.validator.addMethod("dateBefore", function (value, element, params) {
			            // if end date is valid, validate it as well
			            var end = $(params);
			            if (!end.data("validation.running")) {
			                $(element).data("validation.running", true);
			                setTimeout($.proxy(

			                function () {
			                    this.element(end);
			                }, this), 0);
			                // Ensure clearing the "flag" happens after the validation of "end" to prevent endless looping
			                setTimeout(function () {
			                    $(element).data("validation.running", false);
			                }, 0);
			            }
			            return this.optional(element) || this.optional(end[0]) || new Date(value) < new Date(end.val());

			        }, "Must be before corresponding end date");

			        $.validator.addMethod("dateAfter", function (value, element, params) {
			            // if start date is valid, validate it as well
			            var start = $(params);
			            if (!start.data("validation.running")) {
			                $(element).data("validation.running", true);
			                setTimeout($.proxy(

			                function () {
			                    this.element(start);
			                }, this), 0);
			                setTimeout(function () {
			                    $(element).data("validation.running", false);
			                }, 0);
			            }
			            return this.optional(element) || this.optional(start[0]) || new Date(value) > new Date($(params).val());

			        }, "Must be after corresponding start date");

				        $("#CreateProjectForm").validate({
				            rules: {
				            	fullname: "required",
				                surname: "required",
				                project_manager:{
				                    required: true,
				                },
				                project_name:{
				                    required: true,
				                },
				                programme_director:{
				                    required: true,
				                },
				                programme_name:{
				                    required: true,
				                },
				                project_start_date:{
			                      dateBefore: "#project_end_date",
			                      required: true
			                    },
			                    project_end_date:{
			                      dateAfter: "#project_start_date",
			                      required: true
			                    },
			                    q1_start_date:{
			                      dateBefore: "#q1_end_date",
			                      required: true
			                    },
			                    q1_end_date:{
			                      dateAfter: "#q1_start_date",
			                      required: true
			                    },
			                     q2_start_date:{
			                      dateBefore: "#q2_end_date",
			                      required: true
			                    },
			                    q2_end_date:{
			                      dateAfter: "#q2_start_date",
			                      required: true
			                    },
			                     q3_start_date:{
			                      dateBefore: "#q3_end_date",
			                      required: true
			                    },
			                    q3_end_date:{
			                      dateAfter: "#q3_start_date",
			                      required: true
			                    },
			                    q4_start_date:{
			                      dateBefore: "#q4_end_date",
			                      required: true
			                    },
			                    q4_end_date:{
			                      dateAfter: "#q4_start_date",
			                      required: true
			                    },
				                email_address: {
				                    required:true,
				                    email:true,
				                },
				               /* tax_clearance: {
				                    required: true,
				                },
				                assesor_acreditations: {
				                    required: true,
				                },
				                seta_creditiation: {
				                    required: true,
				                },
				                moderator_accreditation: {
				                    required: true,
				                },
				                "company_registration_documents[]":{
				                 required: true,
				                },*/
				                mobile_number: {
				                    required: true,
				                    minlength: 9,
				                    maxlength: 9,
				                    number: true
				                },
				                landline_number: {
				                    required: true,
				                    minlength: 9,
				                    maxlength: 9,
				                    number: true
				                },
				                password:{
			                       required: true,
			                       minlength: 5,
			                    },
			                    province:{
			                        required: true,
			                    },
					            district:{
					              required: true,
					            },
					            region:{
					              required: true,
					            },
					      