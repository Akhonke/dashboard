<?php

defined('BASEPATH') or exit('No direct script access allowed');



class JscssAssessor extends CI_Model

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

		if ($page == "create_attendance") {

			// $css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';

			// $css[] = '<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" rel="stylesheet">';

			$css[] = '<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">';
		}

		if ($page == 'attendance_list' || $page == 'assesmentlist' || $page == 'list_assessments') {

			$css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';

			$css[] = '<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" rel="stylesheet">';
		}

		if ($page == 'attendance_view') {

			$css[] = '<link href="' . BASEURL . 'assets/calender/calender.css" rel="stylesheet" type="text/css">';

			$css[] = '<style>

                     #calendarContainer,

					#organizerContainer {

					  float: left;

					  margin: 5px;

					}

			        </style>';
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

		if ($page == "attendance_list" || $page == 'assesmentlist' || $page == 'list_complete_assessments' || $page == 'list_assessments') {

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

			/*$js[] = '<script src="' . BASEURL . 'assets/admin/autocomplete/bootstrap-4-autocomplete.min.js?v2"></script>';*/

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

			$js[] = '<script>

				        function deleterecord(tablename,columnname,id){

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

									    url: "assessor-deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if ($page == 'changepassword') {

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

		if ($page == 'editprofile') {

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

					            //$(".remove_button").addClass("btn btn-danger");

					            $(wrapper).append(fieldHTML); //Add field html



					        }

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
						$.validator.addMethod("full_name", function(value, element) {

							// allow any non-whitespace characters as the host part

								return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

							}, "Only letters and white space allowed.");

				        $("#CreateAssessorForm").validate({

				            rules: {

								fullname: {

									required: true,
								full_name : true

				                },

								surname: {

				                    required: true,
									full_name : true
				                },

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
								  full_name : true

					            },

					            Street_number:{

					              required: true,

					            },

				            },

				            messages: {


								fullname: {

				                	required: "Please enter your fullname name",

				                },

								surname: {

				                	required: "Please enter your surname name",

				                },

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

				                	required: "Please select your training provider",

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

				                    url:"assessor-acreditations-file-delete",

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

		if ($page == 'editprofile') {

			$js[] = "<script>
			$('.province').change(function(){

				        $.ajax({

				            url: 'assessor-getdestrict',

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

				    // $('.district_option').change(function(){

				    //    $.ajax({

				    //         url: 'assessor-getregion',

				    //         data: { 'value': $('.district_option').val() },

				    //         dataType:'json',

				    //         type: 'post',

				    //         success: function(data){

				    //             var option = '';

				    //            $.each(data, function(i, star) {

				    //             if(i == 'error'){

				    //                     $('#region').html(option);

				    //                     $('#region-error').show();

				    //                     $('#region-error').html(star);

				    //              }else{

				    //                    option += '<option value='+star.id+'>'+star.region+'</option>'

				    //                    $('#region').html('<option>Select Region</option>'+option);

				    //                    $('#region-error').hide();

				    //             }

				    //             });



				    //         }

				    //     });

				    // });

					$('.district_option').change(function(){

						$.ajax({

							 url: 'assessor-getcity',

							 data: { 'value': $('.district_option').val() },

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



				    // $('#region').change(function(){

				    //    $.ajax({

				    //         url: 'assessor-getcity',

				    //         data: { 'value': $('#region').val() },

				    //         dataType:'json',

				    //         type: 'post',

				    //         success: function(data){

				    //             var option = '';

				    //            $.each(data, function(i, star) {

				    //                 if(i == 'error'){

				    //                     $('#city').html(option);

				    //                     $('#city-error').show();

				    //                     $('#city-error').html(star);

				    //                 }else{

				    //                     option += '<option value='+star.id+'>'+star.city+'</option>'

				    //                     $('#city').html('<option>Select City</option>'+option);

				    //                     $('#city-error').hide();

				    //                 }

				    //             });

				    //         }

				    //     });

					// });
					$('#city').change(function(){

						$.ajax({

							 url: 'assessor-get_municipality',

							 data: { 'value': $('#city').val() },

							 dataType:'json',

							 type: 'post',

							 success: function(data){

								 var option = '';

								$.each(data, function(i, star) {

								 if(i == 'error'){

										 $('#municipality').html(option);

										 $('#municipality-error').show();

										 $('#municipality-error').html(star);

								  }else{

										option += '<option value='+star.id+'>'+star.municipality+'</option>'

										$('#municipality').html('<option>Select Municipality</option>'+option);

										$('#municipality-error').hide();

								 }

								 });



							 }

						 });

					 });

			</script>";
		}

		/* if($page =='create_attendance'){

        	$js[]="<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>";

			$js[] = '<script>

		                $("#myAutocomplete").autocomplete({

							source: function(request, response) {

						        $.ajax({

						            url:"assessor-autocomplete",

						            data: {

						                term : request.term

						            },

						            type:"post",

						            dataType: "json",

						            success: function(data){

						            	console.log(data);

						                response(data);

						            }

						        });

						    },

						    treshold: 1,

						    select: function (values, ui) {

						    	$.ajax({

						            url:"assessor-getleaner",

						            data: {

						                lerner_nm :ui.item.label

						            },

						            type:"post",

						            dataType: "json",

						            success: function(data){

					            	    $("#learner_id_number").val(data.id_number);

						            	$("#learner_name").val(data.first_name);

						            	$("#learnership_sub_type").val(data.learnershipSubType);

						            	$("#classname").val(data.classname);

						            	$("#projectmanager").val(data.fullname);

						            	$("#training_provider").val(data.trining_provider);

						            	$("#learner_surname").val(data.surname);

						            	$("#learner_id").val(data.learner_id);

						            	$("#learnerinfo").css("display", "block");

							        }

						        });

						    }

				        });

		            </script>';

        	$js[] = '<script>

				    $(function() {

				        $("#attendanceForm").validate({

				            rules: {

				                date: {

				                    required: true,

				                },

				                reason: {

				                    required: true,

				                },

				            },

				            messages: {

				                date: {

				                   required: "Please choose your date",

				                },

				                reason: {

				                    required: "Please choose your reason",

				                },

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				</script>';

        }*/

		if ($page == 'create_attendance') {

			$js[] = "<script>

			    $(function() {

			        $('#CreateAttendanceForm').validate({

			            'rules': {

			                'year': {

			                	required:true,

			                	number:true,

			                	},

			                'week_date':{

			                	required:true,

			                },

			                'learnership_sub_type': {

			                	required:true,

			                	},



			                'learner_classname':{

			                    'required': true,

			                },

			                'facilirator':{

			                  'required': true,

			                },

			               'attachment':{

			                  'required': true,

			                },

			            },

			            'messages': {

			                'year': 'Please choose your year',

			                'week_date':'Please choose your week ending date',

			                'learnership_sub_type': 'Please select your learnership sub type',

			                'learner_classname':{

			                  'required': 'Please select your classname',

			                },

			                'facilirator':{

			                  'required': 'Please enter your faciliator',

			                },

			               'attachment':{

			                  'required': 'Please enter your attachment',

			                },

			            },

			            submitHandler: function(form) {

			                form.submit();

			            }

			        });

			    });



			    $('.learnshipsubtype').change(function(){

			        $.ajax({

			            url: 'assessor-getclassname',

			            data: { 'value': $('.learnshipsubtype').val() },

			            dataType:'json',

			            type: 'post',

			            success: function(data){

			                var option = '';

			               $.each(data, function(i, star) {

			                    if(i == 'error'){

			                        $('.classname').html(option);

			                        $('#classname-error').show();

			                        $('#classname-error').html(star);

			                    }else{

			                      option += '<option value='+star.id+'>'+star.class_name+'</option>'

			                      $('.classname').html('<option>Select Class Name</option>'+option);

			                      $('#classname-error').hide();

			                    }

			                });



			            }

			        });

			    });

            </script>";
		}

		if ($page == 'attendance_view') {

			//   $js[] ="<script src='https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js'></script>";

			/*  $js[]= '<script type="text/javascript">

                    "use strict";// function that creates dummy data for demonstration

					function createDummyData() {

					  var date = new Date();

					  var data = {};



					  for (var i = 0; i < 10; i++) {

					    data[date.getFullYear() + i] = {};



					    for (var j = 0; j < 12; j++) {

					      data[date.getFullYear() + i][j + 1] = {};



					      for (var k = 0; k < Math.ceil(Math.random() * 10); k++) {

					        var l = Math.ceil(Math.random() * 28);



					        try {

					          data[date.getFullYear() + i][j + 1][l].push({

					            startTime: "10:00",

					            endTime: "12:00",

					            text: "Some Event Here"

					          });

					        } catch (e) {

					          data[date.getFullYear() + i][j + 1][l] = [];

					          data[date.getFullYear() + i][j + 1][l].push({

					            startTime: "10:00",

					            endTime: "12:00",

					            text: "Some Event Here"

					          });

					        }

					      }

					    }

					  }



					  return data;

					}



				// creating the dummy static data

				var data = createDummyData();



				// initializing a new calendar object, that will use an html container to create itself

				var calendar = new Calendar(

				  "calendarContainer", // id of html container for calendar

				  "small", // size of calendar, can be small | medium | large

				  [

				    "Wednesday", // left most day of calendar labels

				    3 // maximum length of the calendar labels

				  ],

				  [

				    "#E91E63", // primary color

				    "#C2185B", // primary dark color

				    "#FFFFFF", // text color

				    "#F8BBD0" // text dark color

				  ]

				);



				// initializing a new organizer object, that will use an html container to create itself

				var organizer = new Organizer(

				  "organizerContainer", // id of html container for calendar

				  calendar, // defining the calendar that the organizer is related to

				  data // giving the organizer the static data that should be displayed

				);

				</script>';*/
		}

		if ($page == 'createassesment') {

			$js[] = "<script>

			    $(function() {

			        $('#CreateAssessmentForm').validate({

			            'rules': {

			                'fullname': {

			                	required:true,

			                	},

			                'surname':{

			                	required:true,

			                },

							'assesment_number': {

			                	required:true,

			                	},
								'assesment_date': {

									required:true,

									},
			                'learnership_sub_type': {

			                	required:true,

			                	},



			                'classname':{

			                    'required': true,

			                },

			                'unit_statndards':{

			                  'required': true,

			                },

			               'learner_id':{

							  'required': true,
							  'number':true,

							},
							'learner_name':{

								'required': true,

							  },

			            },

			            'messages': {

			                'fullname':{

								'required': 'Please Fill Assessor Fullname',

							  },
							  'surname':{

								'required': 'Please Fill Assessor Surname',

							  },
			                'assesment_number':{

			                  'required': 'Please select your classname',

			                },

			                'assesment_date':{

			                  'required': 'Please enter Assessment Date',

			                },

			               'learnership_sub_type':{

			                  'required': 'Please enter Learnership Subtype',

							},

							'classname':{

								'required': 'Please Select Class Name',

							  },

							  'unit_statndards':{

								'required': 'Please Enter Unit Standards',

							  },

							  'learner_id':{

								'required': 'Please Enter Learner ID',
								'number':'Please enter Valid ID',
							  },

							  'learner_name':{

								'required': 'Please Enter Learner ID',


							  },


			            },

			            submitHandler: function(form) {

			                form.submit();

			            }

			        });

			    });

				$('.learnship_id').change(function(){

					$.ajax({

						url: 'assessor-get_sublearnership',

						data: { 'value': $('.learnship_id').val() },

						dataType:'json',

						type: 'post',

						success: function(data){

							var option = '';

						   $.each(data, function(i, star) {

									if(i == 'error'){

									$('.learnership_sub_type_id').html(option);

									$('#learnership_sub_type_id-error').show();

									$('#learnership_sub_type_id-error').html(star);

								}else{
									var test = '<option hidden value='+'>Select Sublearnership</option>';
								  option += '<option value='+star.id+'>'+star.sub_type+'</option>'

								  $('.learnership_sub_type_id').html(test+option);

								  $('#learnership_sub_type_id-error').hide();

								}

							});



						}

					});

					});

					$('.learnership_sub_type_id').change(function(){

						$.ajax({

							url: 'assessor-getclassname',

							data: { 'value': $('.learnership_sub_type_id').val() },

							dataType:'json',

							type: 'post',

							success: function(data){

								var option = '';

							   $.each(data, function(i, star) {

										if(i == 'error'){

										$('.learner_classname').html(option);

										$('#learner_classname-error').show();

										$('#learnership_sub_type_id-error').html(star);

									}else{
										var test = '<option hidden value='+'>Select Class</option>';
									  option += '<option value='+star.class_name+'>'+star.class_name+'</option>'

									  $('.learner_classname').html(test+option);

									  $('#learner_classname-error').hide();

									}

								});



							}

						});

						});


				$('.learnership_sub_type_id').change(function(){

			        $.ajax({

			            url: 'assessor-getunitstandard',

			            data: { 'value': $('.learnership_sub_type_id').val() },

			            dataType:'json',

			            type: 'post',

			            success: function(data){

			                var option = '';

			               $.each(data, function(i, star) {

			                    if(i == 'error'){

									$('.unit_statndards').val(option);

			                        $('#unit_statndards-error').show();

			                        $('#unit_statndards-error').html(star);

			                    }else{

									$('.unit_statndards').val(star.unit_standard);

			                    }

			                });



			            }

			        });

				});

				$('.learner_classname').change(function(){

					$.ajax({

						url: 'assessor-getlearner',

						data: { 'value': $('.learner_classname').val() },

						dataType:'json',

						type: 'post',

						success: function(data){

							var option = '';

						   $.each(data, function(i, star) {

									if(i == 'error'){

									$('.learner').html(option);

									$('#learner-error').show();



								}else{
									var start = '<thead><tr><td>Learner ID</td><td>Learner Name</td><td>Learner Surname</td><td>Learner Performance</td><td>Overall Comment</td><tr></thead>'
								  option += '<tr><td>'+star.id+'<input value='+star.id+' name=lid[] type=hidden></td><td>'+star.first_name+'</td><td>'+star.surname+'</td><td><input class=form-control type=text name=lperform[] ></td><td><input class=form-control type=text name=locmnt[]></td></tr>'

								  $('.learner_table').html(start+option);

								  $('#learner_table-error').hide();

								}

							});



						}

					});

					});

            </script>";
		}

		return $js;
	}
}
