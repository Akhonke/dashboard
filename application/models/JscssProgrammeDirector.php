<?php

defined('BASEPATH') or exit('No direct script access allowed');



class JscssProgrammeDirector extends CI_Model

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

		if ($page=='learner_list'||$page=='project_list'||$page=='training_list'||$page=='facilitator_list'||$page=='assessor_list'||$page=='moderator_list'||$page == 'learner_list'||$page=='progammer_director_view'||$page=='project_manager_view'||$page=='training_provider_view'||$page=='assessor_view'||$page=='monderator_view'||$page=='facilitator_view'||$page=='learner_view'||$page=='progammer_director_view'||$page=='progammme_report_list'||$page=='learner_marks_list'||$page=='assessorview'||$page=='facilitatorview'||$page=='learnerview'||$page=='moderatorview'||$page=='training_view'||$page=='projectassessorview'||$page=='projectmoderatorview'||$page=='projectlearnerview'||$page=='projectfacilitatorview'||$page=='stipend_list'||$page=='drop_out_list'||$page=='attendance_list'||$page =='income_item_list'||$page =='expense_item_list'||$page =='account_balance_list'||$page=='class_list'||$page=='bank_list'||$page =='user_list') {

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

		if ($page=='learner_list'||$page=='project_list'||$page=='training_list'||$page=='facilitator_list'||$page=='assessor_list'||$page=='moderator_list'||$page == 'learner_list'||$page=='progammer_director_view'||$page=='project_manager_view'||$page=='training_provider_view'||$page=='assessor_view'||$page=='monderator_view'||$page=='facilitator_view'||$page=='learner_view'||$page=="programme_report_list"||$page=='create_assessor'||$page=='create_moderator'||$page=='create_facilitator'||$page == 'create_learner'||$page=='create_training'||$page =='create_project'||$page=='progammme_report_list'||$page=='learner_marks_list'||$page=='assessorview'||$page=='facilitatorview'||$page=='learnerview'||$page=='moderatorview'||$page=='training_view'||$page=='projectassessorview'||$page=='projectmoderatorview'||$page=='projectlearnerview'||$page=='projectfacilitatorview'||$page=='stipend_list'||$page=='drop_out_list'||$page=='attendance_list'||$page =='income_item_list'||$page =='expense_item_list'||$page =='account_balance_list'||$page=='class_list'||$page=='bank_list'||$page =='user_list') {

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

			var table=$('.table').DataTable( {

				dom: 'Bfrtip',
				columnDefs: [  
                    {
                        'searchable': false,
                        'orderable': false,
                        'targets': 0
                    },
                ],
                order: [[0, 'asc']] ,


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
			 table.on('order.dt search.dt', function () {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                     table.cell(cell).invalidate('dom');
                });
            }).draw();

		} );

		</script>";

			if($page !='project_list'||$page !='training_list'){

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

								    url: "programme-deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

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

        if($page =='editprofile'){

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

                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

                        }, "Only letters and white space allowed.");



                      /*  $.validator.addMethod("programme_name", function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

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

				                

			                    province:{

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

					            organisation_id:{

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

				               



				                email_address: {

				                	required:"Please enter your email address",

				                    email:"Please enter a valid email address",

				                },

				                

				                

				                

				               /* tax_clearance: {

				                    required: "Please choose tex clearance",

				                   

				                },

				                "company_registration_documents[]":{

                                   required: "Please choose company document",

				                },*/

				                

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

					            organisation_id:{

					              required: "Please choose your organisation name",

					            },

					            contact_person: {

				                  required: "Please enter your landline number",

				                    minlength: "Your landline number must be at least 9 characters long"

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

		if($page== 'editprofile'||$page =='create_training'||$page =='create_assessor'||$page =='create_moderator'||$page =='create_facilitator'||$page=='create_learner'||$page=='create_project'){

			$js[] ="<script> $('.province').change(function(){

				        $.ajax({

				            url: 'programme-getdestrict',

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

				            url: 'programme-getregion',

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

				            url: 'programme-getcity',

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

		if($page =='create_assessor'||$page =='create_moderator'){

			$js[] = '<script>

				   $(document).ready(function(){

					    var maxField = 10; //Input fields increment limitation

					    var addButton = $(".add_button"); //Add button selector

					    var wrapper = $(".field_wrapper"); //Input field wrapper

					    var fieldHTML = "<div class=row id=row_><div class=col-md-6><label class=form-control-label>Acreditations</label><input type=text name=acreditations[] class=form-control  placeholder=Enter Acreditations Name></div><div class=col-md-6><label class=form-control-label>Acreditations Files</label><input type=file name=acreditations_file[] class=form-control></div><a href=javascript:void(0); class=remove_button>Remove</a></div>"; 

					    var x = 1; //Initial field counter is 1

					    

					    //Once add button is clicked

					    $(addButton).click(function(){

					        //Check maximum number of input fields

					        if(x < maxField){ 

					            x++; //Increment field counter

					            

					            $(wrapper).append(fieldHTML); //Add field html

					        }

							// $(.remove_button).addClass(btn btn-danger)

							$(".remove_button").addClass("btn btn-danger");

							$(".remove_button").css("margin","15px");

					    });

					    

					    //Once remove button is clicked

					    $(wrapper).on("click", ".remove_button", function(e){

					        e.preventDefault();

					        $(this).parent("div").remove(); //Remove field html

					        x--; //Decrement field counter

					    });

				    });

				    $(function() {

				        $("#CreateAssessorForm").validate({

				            rules: {

				                fullname: "required",

				                surname: "required",

				                email: {

				                    required: true,

				                    email: true

				                },

				                id_number: {

				                    required: true,

				                    minlength: 5,

				               },

				                mobile: {

				                    required: true,

				                    minlength: 9,

				                    maxlength: 9,

				                    number: true

				                },

				                landline: {

				                    required: true,

				                    minlength: 9,

				                    maxlength: 9,

				                    number: true

				                },

				                trainer_id:{

				                	required: true,

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

				                email: "Please enter a valid email address",

				                

				                id_number: {

				                    required: "Please enter your id number",

				                    minlength: "Your id number must be at least 5 characters long"

				                },

				                

				                mobile: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

				                landline: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

				                trainer_id: {

				                	required: "Please select your training provide",

				                },

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



				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				    function remove_file(table,file_id,id){

                        swal({

				            title:"Do you want delete this acreditations?",

				            type: "warning",

				            showCancelButton: true,

				            confirmButtonClass: "btn btn-success",

				            cancelButtonClass: "btn btn-danger",

				            buttonsStyling: false,

				            confirmButtonText: "Delete",

				            cancelButtonText: "Cancel",

				            closeOnConfirm: false,

				            showLoaderOnConfirm: true,

				        },

				        function(isConfirm){

				            if(isConfirm){

				                $.ajax({

				                    url:"acreditations_file_delete",

				                    type: "POST",

				                    data:{table:table,id:id,file_index:file_id},

				                    success: function(resp){

				                    if(resp){

				                    	$("#remove_file"+file_id).remove();

				                       // swal("Deleted!", "Your acreditations file has been deleted.", "success");

				                        location.reload(true);

				                    }



				                    }

				                });

				            }else {

				             swal("Cancelled", "Your  acreditations is safe :)", "error");

				            }

				           ;

				        });

                     };

				</script>';

		}

		if($page =='create_facilitator'){

			$js[] = '<script>

				   $(document).ready(function(){

					    var maxField = 10; //Input fields increment limitation

					    var addButton = $(".add_button"); //Add button selector

					    var wrapper = $(".field_wrapper"); //Input field wrapper

					    var fieldHTML = "<div class=row id=row_><div class=col-md-6><label class=form-control-label>Acreditations</label><input type=text name=acreditations[] class=form-control  placeholder=Enter Acreditations Name></div><div class=col-md-6><label class=form-control-label>Acreditations Files</label><input type=file name=acreditations_file[] class=form-control></div><a href=javascript:void(0); class=remove_button>Remove</a></div>"; 

					    var x = 1; //Initial field counter is 1

					    

					    //Once add button is clicked

					    $(addButton).click(function(){

					        //Check maximum number of input fields

					        if(x < maxField){ 

					            x++; //Increment field counter

					            

					            $(wrapper).append(fieldHTML); //Add field html

					        }

							// $(.remove_button).addClass(btn btn-danger)

							$(".remove_button").addClass("btn btn-danger");

							$(".remove_button").css("margin","15px");

					    });

					    

					    //Once remove button is clicked

					    $(wrapper).on("click", ".remove_button", function(e){

					        e.preventDefault();

					        $(this).parent("div").remove(); //Remove field html

					        x--; //Decrement field counter

					    });

				    });

				    $(function() {

				        $("#CreateAssessorForm").validate({

				            rules: {

				                fullname: "required",

				                surname: "required",

				                email: {

				                    required: true,

				                    email: true

				                },

				                id_number: {

				                    required: true,

				                    minlength: 5,

				               },

				                mobile: {

				                    required: true,

				                    minlength: 9,

				                    maxlength: 9,

				                    number: true

				                },

				                landline: {

				                    required: true,

				                    minlength: 9,

				                    maxlength: 9,

				                    number: true

				                },

				                trainer_id:{

				                	required: true,

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

					            classname:{

					            	required: true,

					            },

				            },

				            messages: {

				                fullname: "Please enter your fullname name",

				                surname: "Please enter your surname name",

				                email: "Please enter a valid email address",

				                

				                id_number: {

				                    required: "Please enter your id number",

				                    minlength: "Your id number must be at least 5 characters long"

				                },

				                

				                mobile: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

				                landline: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

				                trainer_id: {

				                	required: "Please select your training provide",

				                },

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

					            classname: {

                                   required: "Please choose your class name",

                                },



				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				    function remove_file(table,file_id,id){

                        swal({

				            title:"Do you want delete this acreditations?",

				            type: "warning",

				            showCancelButton: true,

				            confirmButtonClass: "btn btn-success",

				            cancelButtonClass: "btn btn-danger",

				            buttonsStyling: false,

				            confirmButtonText: "Delete",

				            cancelButtonText: "Cancel",

				            closeOnConfirm: false,

				            showLoaderOnConfirm: true,

				        },

				        function(isConfirm){

				            if(isConfirm){

				                $.ajax({

				                    url:"acreditations_file_delete",

				                    type: "POST",

				                    data:{table:table,id:id,file_index:file_id},

				                    success: function(resp){

				                    if(resp){

				                    	$("#remove_file"+file_id).remove();

				                       // swal("Deleted!", "Your acreditations file has been deleted.", "success");

				                        location.reload(true);

				                    }



				                    }

				                });

				            }else {

				             swal("Cancelled", "Your  acreditations is safe :)", "error");

				            }

				           ;

				        });

                     };

				</script>';

		}

	    if($page =='create_learner'){

			$js[] = "<script>

			        $(function () {

			        	$.validator.addMethod('full_name', function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );

                        }, 'Only letters and white space allowed.');



                        $.validator.addMethod('surname', function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );

                        }, 'Only letters and white space allowed.');



			            $.validator.addMethod('email', function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );

                        }, 'Please enter a valid email address.');



                        $.validator.addMethod('mobile', function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, 'Invalid Mobile Number');



                         $.validator.addMethod('mobile_number', function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, 'Invalid Mobile Number');



                        $.validator.addMethod('password',function(value, element) {

                           return /^[A-Za-z0-9\d=!\-@._*]+$/.test(value);

                        },'Password Formate Not Match');



			        $('#CreateLearnerForm').validate({

			          rules:{

			          	'full_name':{

			              required: true,

			            },

			           

			            'surname':{

			              required: true,

			            },

			            

			            'email':{

			              required: true,

			            },



			            'id_number':{

			              required: true,

			               minlength: 5

			            },

			            'SETA':{

                          required: true,

                           minlength: 5

			            },

			            'mobile':{

			              required: true,

			            },

			            'mobile_number':{

			              required: true,

			            },

			             'gender':{

			              required: true,

			            },

			             'trining_provider':{

			              required: true,

			            },

			            'learnershipSubType':{

			              required: true,

			            },

			            'province':{

			              required: true,

			            },

			            'district':{

			              required: true,

			            },

			            'region':{

			              required: true,

			            },

			            'city':{

			              required: true,

			            },

			            'Suburb':{

			              required: true,

			            },

			            'Street_name':{

			              required: true,

			            },

			            'Street_number':{

			              required: true,

			            },

			            'password':{

			              required: true,

			              minlength: 5,

			            },

			            'assessment': 'required',

                        'disable': 'required',

                        'utf_benefits': 'required',

                        'learnershipSubType':'required',

                         'learner_accepted_training': 'required',

                        reason:{

                         required: true, 

                        },





			        },

                      messages:{

                      	'full_name':{

			              required: 'Please enter your full name',

			            },

			            'second_name':{

			              required: 'Please enter your second name',

			            },

			            'surname':{

			              required: 'Please enter your surname',

			            },

			            'email':{

			              required: 'Please enter your email',

			            },

			            'id_number':{

			            	required:'Please enter your id number',

			               minlength: 'Your id number must be at least 5 characters long'



			            },

			            'SETA':{

			            	required:'Please enter your SETA',

			            	 minlength: 'Your seat number must be at least 5 characters long'

			            },

			            'mobile':{

			              required: 'Please enter your primary cellphone number',

			            },

			            'mobile_number':{

			              required: 'Please enter your second cellphone number',

			            },

			             'gender':{

			              required: 'Please select your gender',

			            },

			             'trining_provider':{

			              required: 'Please select your training provider',

			            },

			            'learnershipSubType':{

			              required: 'Please select your learnership sub type',

			            },

			            'province':{

			              required: 'Please select your province name',

			            },

			            'district':{

			              required: 'Please select your district',

			            },

			            'region':{

			              required: 'Please select your region',

			            },

			            'city':{

			              required: 'Please select your city',

			            },

			            'Suburb':{

			              required: 'Please enter your Suburb',

			            },

			            'Street_name':{

			              required: 'Please enter your street name',

			            },

			            'Street_number':{

			              required: 'Please enter your street number',

			            },

			            'password':{

			              required: 'Please enter your password',

			              minlength:'password must be at least 5 characters long'

			            },

			           

                        assessment: 'Please select your assessment status',

			            disable: 'Please select your disabled',

			            utf_benefits: 'Please select your U.I.F Beneficiary',

			            learnershipSubType: 'Please choose your learnership Sub Type',

			            learner_accepted_training:'Please select your learner accpeted for training',

			            reason: {

                          required: 'Please enter your reason',

                        },

						}

			        });

			        $.validator.setDefaults({

			           submitHandler: function(form) {

			           form.submit();

			        }

			      });

			    });

			    function Beneficiary(type,reason){

			        if(type =='no'){

			          $('#addtextarea').html('<div id=textarea><label class=form-control-label>Reason</label><textarea rows=4 name=reason  id=reason class=form-control style=resize:none>'+reason+'</textarea><label id=reason-error class=error for=reason></label></div>');

			        }

			        if(type =='yes'){

			          $('#textarea').remove();

			        }

                }

			</script> ";

		}

		if($page == 'import_learner'){

			$js[] = '<script>

				    $(function() {

				       $("#ImportLearnerForm").validate({

				            rules: {

					            learner:{

	                               required: true,

	                            },

					        },

				            messages: {

				            	learner:{

                                  required: "Please choose your file",

                                },

				              

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				</script>';

		}

		if($page =='learner_list'){

			$js[] = '<script>

			     $(document).on("click",".status_change",function(){

			        var status = ($(this).hasClass("btn-success")) ? "0" : "1"; 

			        var msg = (status=="0")? "Not Accepted" : "Accepted";

			        var current_element = $(this);  

				    swal({

					  title: "Reason",

					 // text: "Enter your Reason!",

					  type: "input",

					  showCancelButton: true,

					  closeOnConfirm: false,

					  animation: "slide-from-top",

					  inputPlaceholder: "Enter your Reason"

	                },

					function(inputValue){

					  if (inputValue === false) return false;

					  

					  if (inputValue === "") {

					    swal.showInputError("Please Enter Your Reason");

					    return false

					  }

	                    $.ajax({

					        url :"programme-leaner",

					        type : "POST",

					        dataType : "JSON",

					        data: {tablenm_id:$(current_element).attr("data"),status:status,text:inputValue},

					        success : function(data){

					        	if(data["status"] == 200){

					        	  location.reload();

					            }

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

				                project_manager:  {

				                    required: "Please enter your project manager",

				                },

				                project_name:  {

				                    required: "Please enter your project name",

				                },

				                programme_director:  {

				                    required: "Please enter your programme director",

				                },

				                programme_name:  {

				                    required: "Please enter your programme name",

				                },

				                project_start_date:{

			                       required: "Please enter your project start date",

			                    },

			                    project_end_date:{

			                       required: "Please enter your project end date",

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

				                email_address: {

				                	required:"Please enter your email address",

				                    email:"Please enter a valid email address",

				                },

				                

				               

				                /*tax_clearance: {

				                    required: "Please choose tex clearance",

				                },

				                assesor_acreditations: {

				                    required: "Please choose assesor acreditations",

				                },

				                seta_creditiation: {

				                    required: "Please choose tex seta creditiations",

				                },

				                moderator_accreditation: {

				                    required: "Please choose moderator accreditations",

				                },

				                "company_registration_documents[]":{

                                   required: "Please choose company document",

				                },*/

				                mobile_number: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

				                landline_number: {

				                    required: "Please enter your mobile number",

				                    minlength: "Your mobile number must be at least 9 characters long"

				                },

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

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				</script>';	

		} 

		if($page =='create_training'){

			$js[] = "<script>

			        $(function () {

			        	$.validator.addMethod('full_name', function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

                        }, 'Only letters and white space allowed.');

			            $.validator.addMethod('email', function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );

                        }, 'Please enter a valid email address.');

                        $.validator.addMethod('mobile', function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, 'Invalid Mobile Number');

			            $.validator.addMethod('landline', function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, 'Invalid Landline Number');

                      var trainer_id = $('#trainer_id').val();

			        $('#CreateTraininForm').validate({

			            rules:{

			          	'full_name':{

			              required: true,

			            },

			            'company_name':{

			              required: true,

			              remote: 'programme-trainingcompanyname?id='+trainer_id,

	                    },

			            'surname':{

			              required: true,

			            },

			            'email':{

			              required: true,

			            },

			            'mobile':{

			              required: true,

			            },

			            'landline':{

			              required: true,

			            },

			            'province':{

			              required: true,

			            },

			            'district':{

			              required: true,

			            },

			            'region':{

			              required: true,

			            },

			            'city':{

			              required: true,

			            },

			            'Suburb':{

			              required: true,

			            },

			            'Street_name':{

			              required: true,

			            },

			            'Street_number':{

			              required: true,

			            },

			            'project_id':{

			              required: true,

			            },

			            'password':{

			              required: true,

			              minlength: 5,

			            },

			        },

                      messages:{

                      	'full_name':{

			              required: 'Please enter your name',

			            },

			            'company_name':{

			              required: 'Please enter your training provider',

			              remote: 'training provider already in use',

			            },

			            'surname':{

			              required: 'Please enter your surname name',

			            },

			            

			            'email':{

			              required: 'Please enter your email',

			            },

			            'mobile':{

			              required: 'Please enter your mobile',

			            },

			            'landline':{

			              required: 'Please enter your landline',

			            },

			            'province':{

			              required: 'Please select your province name',

			            },

			            'district':{

			              required: 'Please select your district name',

			            },

			            'region':{

			              required: 'Please select your region',

			            },

			            'city':{

			              required: 'Please select your city',

			            },

			            'Suburb':{

			              required: 'Please enter your Suburb',

			            },

			            'Street_name':{

			              required: 'Please enter your street name',

			            },

			            'Street_number':{

			              required: 'Please enter your street number',

			            },

			            'project_id':{

			              required: 'Please enter your project manager',

			            },

			            'password':{

			              required: 'Please enter your password',

			              minlength:'password must be at least 5 characters long'

			            },

			        }

			        });

			        $.validator.setDefaults({

			           submitHandler: function(form) {

			           form.submit();

			        }

			      });

			    });

			</script> ";

		}

		if($page=="project_list"){

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

			            url :"programme-changestatus",

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

		if($page =='training_list'){

        	   $js[] ='<script>

		        function programmedeletedataTrainingprovider(tablename,columnname,id){ 

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

							    url:"programmedeletedataTrainingprovider?table="+tablename+"&behalf="+columnname+"&data="+id,

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

        if($page =='project_list'){

        	   $js[] ='<script>

		        function programmedeletedataprojectmanager(tablename,columnname,id){ 

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

							    url:"programmedeletedataprojectmanager?table="+tablename+"&behalf="+columnname+"&data="+id,

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

        if($page =='user_list'){
        	$js[]='<script>
        	 function deleteuser(tablename,columnname,id){ 
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
								    url: "programme-User-Delete?table="+tablename+"&behalf="+columnname+"&data="+id,
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

        if($page =='create_user'){
			$js[] = "<script>
			        $(function () {
			            $.validator.addMethod('email', function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
                        }, 'Please enter a valid email address.');
                        
                        $.validator.addMethod('mobile', function (value, element) {
			              return this.optional(element) || /^[0-9]{9}$/.test(value);
			            }, 'Invalid Mobile Number');
				        $('#CreateUserForm').validate({
					        rules:{
					            first_name:{
		                         required: true, 
		                        },
		                        second_name:{
		                         required: true, 
		                        },
		                        email:{
		                         required: true, 
		                        },
		                        mobile:{
		                         required: true, 
		                        },
		                        password:{
		                         required: true, 
		                        },
		                        designation:{
		                         required: true, 
		                        },
		                    },
		                    messages:{
		                        first_name: {
		                          required: 'Please enter uesr first name',
		                        },
		                        second_name: {
		                          required: 'Please enter user second number',
		                        },
		                        email: {
		                          required: 'Please enter user contact email',
		                        },
		                        mobile: {
		                          required: 'Please enter user mobile number',
		                        }, 
		                        password: {
		                          required: 'Please enter user password',
		                        },
		                        designation: {
		                          required: 'Please enter user designation',
		                        },
		                    }
					        });
					        $.validator.setDefaults({
					           submitHandler: function(form) {
					           form.submit();
					        }
				        });
			        });
			      </script> ";
			    }
			    
		return $js;

	}

}