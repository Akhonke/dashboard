<?php

defined('BASEPATH') or exit('No direct script access allowed');



class JscssFaciltator extends CI_Model

{

	public function css($page)

	{

		$css = [];

		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="' . BASEURL . 'assets/admin/fontawesome/all.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">';
		$css[] = '<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">';
		$css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';
		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/orionicons.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';
		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/custom.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="' . BASEURL . 'assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="' . BASEURL . 'assets/validation/css/screen.css" rel="stylesheet" type="text/css">';
		$css[] = '<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">';

		$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';
		$css[] = '<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';
		// if ($page == 'create_province' || $page == 'create_district' || $page == 'create_region' || $page == 'create_city' || $page == 'organisation_list' || $page == 'programmer_list' || $page == 'project_list' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'moderator_list' || $page == 'learner_marks_list' || $page == 'discipline_list') {

		// 	$css[] = '<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">';

		// 	$css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';
		// 	$css[] = '<link href="' . BASEURL . 'assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';
		// }

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

		if ($page == 'editprofile' || $page == 'create_district' || $page == 'create_region' || $page == 'create_city' || $page == 'organisation_list' || $page == 'programmer_list' || $page == 'project_list' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'changepassword' || $page == 'learner_marks_list' || $page == 'discipline_list' || $page == 'attendance_list' || $page == 'list_assessments') {

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

			// $js[] = '<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>';

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

						 'csv', 'excel', 'print' ,'colvis'

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

				                url: "Faciltator-deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if($page == 'send_massage'){

			$js[] = "<script>

			$('#receiver_type').change(function() {

				$.ajax({

				   url: 'Facilitator-get_receiver',

				   data: {
					  'value': $('#receiver_type').val()
				   },

				   dataType: 'json',

				   type: 'post',

				   success: function(data) {

					  var option = '';

					  $.each(data, function(i, star) {

						 if (i == 'error') {

							$('#receiver').html(option);

							$('#receiver-error').show();

							$('#receiver-error').html(star);

						 } else {
							var test = '<option hidden value=' + '>Select Receiver</option>';
							option += '<option value=' + star.id + '>' + star.name + '</option>'

							$('#receiver').html(test + option);

							$('#receiver-error').hide();

						 }

					  });

				   }

				});
			 });
			</script>";
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

				        $("#CreateFacilitatorForm").validate({

				            rules: {


								fullname: {

				                    required: true,
									full_name: true
				                },

								surname: {

									required: true,
									full_name: true

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
								  full_name: true

					            },

					            Street_number:{

					              required: true,

					            },

					            classname:{

                                   required: true,

                                },

				            },

				            messages: {



				                email: "Please enter a valid email address",
								fullname: {

				                	required: "Please enter your fullname name",

								},
								surname: {

				                	required: "Please enter your surname name",
				                },


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

				                    url:"Faciltator-acreditations-file-delete",

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

			$js[] = "<script> $('.province').change(function(){

				        $.ajax({

				            url: 'Faciltator-getdestrict',

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

				    //         url: 'Faciltator-getregion',

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

							 url: 'Faciltator-getcity',

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

				    $('#city').change(function(){

				       $.ajax({

				            url: 'faciltator-get_municipality',

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

		if ($page == 'create_learner_marks') {

			$js[] = "<script>

			    $(function() {

			        $('#CreateLearnerMarksForm').validate({

			            'rules': {

			                'year': {

			                	required:true,

			                	number:true,

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

			            url: 'Faciltator-getclassname',

			            data: { 'value': $('.learnshipsubtype').val() },

			            dataType:'json',

			            type: 'post',

			            success: function(data){

			                var option = '';

			               $.each(data, function(i, star) {

			                    if(i == 'error'){

			                        $('.classname').html(option);

			                        $('#learner_classname-error').show();

			                        $('#learner_classname-error').html(star);

			                    }else{
									var test = '<option hidden value=' + '>Select Class Name</option>';

			                      option += '<option value='+star.id+'>'+star.class_name+'</option>'

			                      $('.classname').html(test+option);

			                      $('#learner_classname-error').hide();



			                    }

			                });



			            }

			        });

			    });

            </script>";
		}

		if ($page == 'create_attendance') {
			$js[] = "<script>

			$('.learnship_id').change(function() {

				$.ajax({

					url: 'Faciltator-get_sublearnership',

					data: {
						'value': $('.learnship_id').val()
					},

					dataType: 'json',

					type: 'post',

					success: function(data) {

						var option = '';

						$.each(data, function(i, star) {

							if (i == 'error') {

								$('.learnership_sub_type_id').html(option);

								$('#learnership_sub_type_id-error').show();

								$('#learnership_sub_type_id-error').html(star);

							} else {
								var test = '<option hidden value=' + '>Select Sublearnership</option>';
								option += '<option value=' + star.id + '>' + star.sub_type + '</option>'

								$('.learnership_sub_type_id').html(test + option);

								$('#learnership_sub_type_id-error').hide();

							}

						});



					}

				});

				});
				</script>
				<script>
				$('.learnership_sub_type_id').change(function() {

				$.ajax({

					url: 'Faciltator-getclassname',

					data: {
						'value': $('.learnership_sub_type_id').val()
					},

					dataType: 'json',

					type: 'post',

					success: function(data) {

						var option = '';

						$.each(data, function(i, star) {

							if (i == 'error') {

								$('.learner_classname').html(option);

								$('#learner_classname-error').show();

								$('#learnership_sub_type_id-error').html(star);

							} else {
								var test = '<option hidden value=' + '>Select Class</option>';
								option += '<option value=' + star.id + '>' + star.class_name + '</option>'

								$('.learner_classname').html(test + option);

								$('#learner_classname-error').hide();

							}

						});



					}

				});

				});


				$('.learner_classname').change(function() {

				$.ajax({

					url: 'provider-getfacilitator',

					data: {
						'value': $('.learner_classname').val()
					},

					dataType: 'json',

					type: 'post',

					success: function(data) {

						var option = '';

						$.each(data, function(i, star) {

							if (i == 'error') {

								$('.facilitator').val(option);

								$('#facilitator-error').show();

								$('#facilitator-error').html(star);

							} else {
								$('.facilitator').val(star.fullname);

								$('#facilitator-error').hide();

							}

						});



					}

				});

				});
			$(function() {

				$('#CreateAttendanceForm').validate({

					'rules': {

						'year': {

							required:true,

							number:true,

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
						'week_date':{

							'required': true,

						},
						'learnship_id': {

							required:true,

							},
					},

					'messages': {

						'year': {

							'required': 'Please choose your year',

						  },

						'learnership_sub_type':{

							'required': 'Please select your learnership sub type',

						  },

						'learner_classname':{

						  'required': 'Please select your classname',

						},

						'facilirator':{

						  'required': 'Please enter your faciliator',

						},

					   'attachment':{

						  'required': 'Please enter your attachment',

						},
						'week_date':{

							'required' : 'Please choose Date',

						},
						'learnship_id':{

							'required': 'Please select your learnership type',

							},

					},

					submitHandler: function(form) {

						form.submit();

					}

				});

			});



			$('.learnshipsubtype').change(function(){

				$.ajax({

					url: 'Faciltator-getclassname',

					data: { 'value': $('.learnshipsubtype').val() },

					dataType:'json',

					type: 'post',

					success: function(data){

						var option = '';

					   $.each(data, function(i, star) {

							if(i == 'error'){

								$('.classname').html(option);

								$('#learner_classname-error').show();

								$('#learner_classname-error').html(star);

							}else{

							  option += '<option value='+star.id+'>'+star.class_name+'</option>'

							  $('.classname').html('<option>Select Class Name</option>'+option);

							  $('#learner_classname-error').hide();



							}

						});



					}

				});

			});

		</script>";


		}

		if($page == 'attendance_list')
		{
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

							url: "faciltator/deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if($page == 'create_discipline')
		{
			$js[] = "<script>

				$(function(){
					$('#CreateissueForm').validate({
						'rules':{
							'learner_id':{
								required : true,
								number : true,
							},
							'learner_name':{
								required : true,
							},
							'incidence_desc' :{
								required : true
							},
							'date_of_incident':{
								required : true,
							},
							'issue_status' : {
								required : true,
							},
							// 'outcome' : {
							// 	required : true,
							// },
							// 'warning_letter':{
							// 	required : true,
							// }
						},
						'messages':{
							'learner_id':{
								required : 'Please enter Learner ID',
								number : 'Please enter a Valid Learner ID'
							},
							'learner_name':{
								required : 'Please Enter A Valid Learner ID',
							},
							'incidence_desc' :{
								required : 'Please enter Incidence Description',
							},
							'date_of_incident' : {
								required : 'Please Enter Incident Date',
							},
							'issue_status' : {
								required : 'Please Select Incident Current Status',
							},
							// 'outcome' : {
							// 	required : 'Please Select Outcome',
							// },
							// 'warning_letter' : {
							// 	required : 'Please Select Warning Letter',
							// }

						}
					});

					$('.learner_id').keyup(function(){


						$.ajax({

							url: 'Faciltator-getlearner',

							data: { 'value': $('.learner_id').val() },

							dataType:'json',

							type: 'post',

							success: function(data){

								var option = '';

							   $.each(data, function(i, star) {

									if(i == 'error'){

										$('#learner_name').val(option);

										$('#learner_surname').val(option);

										$('#learner_name-error').show();

										$('#learner_name-error').val(star);

									}else{

										$('#learner_name').val(star.first_name);

										$('#learner_surname').val(star.surname);

									  $('#learner_classname-error').hide();



									}

								});



							}

						});

					});

				});

			</script>";
		}

		if($page == 'learner_marks_list')
		{
			$js[] = " <script>
			$(document).ready(function() {
				var table = $('#learner_mark').DataTable();

				$('#dropdown1').on('keyup', function() {
					table.columns(1).search(this.value).draw();
				});
				$('#dropdown2').on('keyup', function() {
					table.columns(2).search(this.value).draw();
				});
				$('#dropdown3').on('keyup', function() {
					table.columns(3).search(this.value).draw();
				});
				$('#dropdown4').on('keyup', function() {
					table.columns(4).search(this.value).draw();
				});
				$('#dropdown5').on('keyup', function() {
					table.columns(5).search(this.value).draw();
				});
			});
			</script>";



		}


		if ($page == 'create_assessment') {
		    $js[] = "<script>

			$('.learnship_id').change(function(){

				$.ajax({

					url: '/provider-get_sublearnership',

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

					url: '/provider-getclassname',

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
							  option += '<option value='+star.id+'>'+star.class_name+'</option>'

							  $('.learner_classname').html(test+option);

							  $('#learner_classname-error').hide();

							}

						});



					}

				});

			});


			$('.learnership_sub_type_id').change(function(){

				$.ajax({

					url: '/provider-leanership-subtype-units',

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
							  option += '<option value='+star.id+'>'+star.title+'</option>'

							  $('.lstBox1').html(test+option);

							  $('#lstBox1-error').hide();

							}

						});



					}

				});

			});

/// //////////////////////////
// ///////////////////////////////

			$('.learner_classname').change(function(){

				$.ajax({

					url: '/provider-get_class_module',

					data: { 'value': $('.learner_classname').val() },

					dataType:'json',

					type: 'post',

					success: function(data){

						var option = '';

					   $.each(data, function(i, star) {

								if(i == 'error'){

								$('.module').html(option);

								$('#module-error').show();

								$('#module-error').html(star);

							}else{
								var test = '<option hidden value='+'>Select Class Module</option>';
							  option += '<option value='+star.id+'>'+star.title+'</option>'

							  $('.module').html(test+option);

							  $('#module-error').hide();

							}

						});

					}

				});

			});


			$('.module').change(function(){

				$.ajax({

					url: '/api-module-uploads',

					data: { 'value': $('.module').val() },

					type: 'post',

					success: function(data){
			             $('#class_module_uploads').html(data);
					}

				});

			});

			$('.learner_classname').change(function(){

				$.ajax({

					url: '/api-get-class',

					data: { 'value': $('.learner_classname').val() },

					type: 'post',

                    dataType: 'json',

					success: function(data){
			             $('#intervention').val(data.intervention);
					}

				});

			});


			</script>";
		}


		// if ($page == 'createlearnershipSubType' || $page == 'newcreatesublearnership' || $page == 'create_assessment') {
	    if ($page == 'create_assessment') {

		    $js[] = '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';

		    $js[] = '<script src="' . BASEURL . 'assets/admin/multiselect/jquery.multiselect.js"></script>';

		    $js[] = '<script>

					    $(function () {

					    	$("select[multiple].active.3col").multiselect({

			                	placeholder: "Select Unit Standard",

					            selectAll: true,

					            optionul:function(element){

                              return $(element).html("<ul><li>spansss</li></ul>") || $(element).text();

                              },



					        });

				        });

                        $(document).ready(function(){

					        $("select[multiple].active.3col").change(function(){

					        	var brands = $("select[multiple].active.3col option:selected");

					        	var options = [];

					        	var sum=0;

					            $(brands).each(function(index, brand){

							        var options = $(this).attr("data-price");

					            	sum+=+$(this).attr("data-price");

					                //$("#min_credit").val(sum);

					                $("#total_credits_allocated").val(sum);



							    });

							});

                        });

                        $(".unitype").click(function(e){

                         var checkboxes = document.getElementsByName("unit_standard1[]");

                          console.log(checkboxes);

							var vals = "";

							for (var i=0, n=checkboxes.length;i<n;i++)

							{

							    if (checkboxes[i].checked)

							    {

							        vals += ","+checkboxes[i].value;

							    }

							}

							if (vals) vals = vals.substring(1);



                        });

		                $(function() {
							$.validator.addMethod("full_name", function(value, element) {

								// allow any non-whitespace characters as the host part

								return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);

							  }, "Only letters and white space allowed.");

		                 	$("#sublearnshipform").validate({

							    rules: {

							      learnship_id: { required: true },

							      sub_type: { required: true },

							      "unit_standard[]": { required: true },

							      min_credit: { required: true, number: true },

								  total_credits_allocated: { required: true, number: true },

								  facilitator_id: { required: true},

							    },

							    messages: {

							      learnship_id: "Please select your learnship name",

							      sub_type: { required : "Please enter your sub type", },

							      "unit_standard[]":{

							       required: "Please select your unit standard",



							      },

							      min_credit:{

							        required:"Please enter your minimum credits",

							        number: "Please enter valid number"

							      },

							      total_credits_allocated:{

							        required: "Please enter your total credits allocated",

							        number: "Please enter valid number"

								  },
								  facilitator_id: "Please Select Facilitator",

							    },

							    submitHandler: function(form) {

							    	validateTheForm ();

							     /* form.submit();*/

							    }

						    });

	                    });

	                    $(document).ready(function(){

					        $("#multiple_select").change(function(){

					        	var brands = $("#multiple_select input:selected");

					        	var options = [];

					        	var sum=0;

					            $(brands).each(function(index, brand){

							        var options = $(this).attr("data-price");

					            	sum+=+$(this).attr("data-price");

					            	console.log(sum)

					               // $("#min_credit").val(sum);

					                $("#total_credits_allocated").val(sum);





							    });

					        });



                        });

                        function strDes(a, b) {

								   if (a.value>b.value) return 1;

								   else if (a.value<b.value) return -1;

								   else return 0;

								 }



								console.clear();

								(function () {

								    $("#btnRight").click(function (e) {

								        var selectedOpts = $("#lstBox1 option:selected");

								        if (selectedOpts.length == 0) {

								            alert("Nothing to move.");

								            e.preventDefault();

								        }



								        $("#lstBox2").append($(selectedOpts).clone());

								        $(selectedOpts).remove();


                                        $("#lstBox2").children("option").prop("selected", true);



								        /* -- Uncomment for optional sorting --*/

								        var box2Options = $("#lstBox2 option");

								        var box2OptionsSorted;

								        box2OptionsSorted = box2Options.toArray().sort(strDes);

								        $("#lstBox2").empty();

								        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								        })



								       var sum=0; var units=[];

                                        var box2Options = $("#lstBox2 option");

                                        console.log(box2Options);

                                        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								            units.push($(opt).attr("data-id"));

								          console.log($(opt).attr("data-price"));

								           sum+=+$(opt).attr("data-price");

								        })

								         console.log(units);

                                         console.log(sum);

								        $("#total_credits_allocated").val(sum);

								        $("#lstBox2").val(units);







								        e.preventDefault();







								    });



								    $("#btnAllRight").click(function (e) {

								        var selectedOpts = $("#lstBox1 option");

								        if (selectedOpts.length == 0) {

								            alert("Nothing to move.");

								            e.preventDefault();

								        }



								        $("#lstBox2").append($(selectedOpts).clone());

								        $(selectedOpts).remove();

								        var box2Options = $("#lstBox2 option");

								        var box2OptionsSorted;

								        box2OptionsSorted = box2Options.toArray().sort(strDes);

								        $("#lstBox2").empty();

								        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								        })



								       var sum=0; var units=[];

                                        var box2Options = $("#lstBox2 option");

                                        console.log(box2Options);

                                        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								            units.push($(opt).attr("data-id"));

								          console.log($(opt).attr("data-price"));

								           sum+=+$(opt).attr("data-price");

								        })

								         console.log(units);

                                         console.log(sum);

								        $("#total_credits_allocated").val(sum);

								        $("#lstBox2").val(units);

								        e.preventDefault();


                                        $("#lstBox2").children("option").prop("selected", true);

								    });



								    $("#btnLeft").click(function (e) {

								        var selectedOpts = $("#lstBox2 option:selected");

								        if (selectedOpts.length == 0) {

								            alert("Nothing to move.");

								            e.preventDefault();

								        }



								        $("#lstBox1").append($(selectedOpts).clone());

								        $(selectedOpts).remove();

								        var box2Options = $("#lstBox2 option");

								        var box2OptionsSorted;

								        box2OptionsSorted = box2Options.toArray().sort(strDes);

								        $("#lstBox2").empty();

								        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								        })



								      var sum=0; var units=[];

                                        var box2Options = $("#lstBox2 option");

                                        console.log(box2Options);

                                        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								            units.push($(opt).attr("data-id"));

								          console.log($(opt).attr("data-price"));

								           sum+=+$(opt).attr("data-price");

								        })

								         console.log(units);

                                         console.log(sum);

								        $("#total_credits_allocated").val(sum);

								        $("#lstBox2").val(units);



								        e.preventDefault();

								    });



								    $("#btnAllLeft").click(function (e) {

								        var selectedOpts = $("#lstBox2 option");

								        if (selectedOpts.length == 0) {

								            alert("Nothing to move.");

								            e.preventDefault();

								        }



								        $("#lstBox1").append($(selectedOpts).clone());

								        $(selectedOpts).remove();

								        var box2Options = $("#lstBox2 option");

								        var box2OptionsSorted;

								        box2OptionsSorted = box2Options.toArray().sort(strDes);

								        $("#lstBox2").empty();

								        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								        })



								      var sum=0; var units=[];

                                        var box2Options = $("#lstBox2 option");

                                        console.log(box2Options);

                                        box2OptionsSorted.forEach(function(opt){

								          $("#lstBox2").append(opt);

								            units.push($(opt).attr("data-id"));

								          console.log($(opt).attr("data-price"));

								           sum+=+$(opt).attr("data-price");

								        })

								         console.log(units);

                                         console.log(sum);

								        $("#total_credits_allocated").val(sum);

								        $("#lstBox2").val(units);

								        e.preventDefault();

								    });



								}(jQuery));







					</script>';

		    $js[] = "<script>

			$(function () {

				$('#learnship_id').change(function(){

				$.ajax({

						url: '/provider-get_learnership',

						data: { 'value': $('#learnship_id').val() },

						dataType:'json',

						type: 'post',

						success: function(data){

							var option = '';

						$.each(data, function(i, star) {

									if(i == 'error'){

										$('#min_credit').val();

									}else{



										$('#min_credit').val(star.total_credits);

									}

							});



						}

					});

			});
		});

		</script>";
		}



		return $js;
	}
}
