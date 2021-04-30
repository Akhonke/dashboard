<?php

defined('BASEPATH') or exit('No direct script access allowed');



class JscssProjectmanger extends CI_Model

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
		$css[] = '<style>

		table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {

			border-bottom-width: 0;

			vertical-align: middle;

			text-transform: capitalize;

		}

		.sa-button-container .cancel.btn.btn-lg.btn-default{

			background:#f95506;

		}



		</style>';

		if ($page == 'employer_list' || $page == 'create_stipend_list' || $page == 'new_task' || $page == 'create_projects_list' || $page == 'learner_list' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'moderator_list' || $page == 'create_class' || $page == 'class_list' || $page == 'learner_view' || $page == 'facilitator_view' || $page == 'assessor_view' || $page == 'monderator_view' || $page == 'training_provider_view' || $page == 'project_manager_view' || $page == 'projectmanagar_report_list' || $page == 'stipend_list' || $page == 'drop_out_list' || $page == 'attendance_list' || $page == 'income_item_list' || $page == 'expense_item_list' || $page == 'account_balance_list' || $page == 'bank_list' || $page == 'learner_marks_list' || $page == 'user_list') {

			$css[] = '<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">';

			$css[] = '<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">';
			$css[] = '<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" rel="stylesheet">';
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

		if ($page == 'employer_list' || $page == 'create_stipend_list' || $page == 'create_projects_list' || $page == 'new_task' || $page == 'learner_list' || $page == 'project_list' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'moderator_list' || $page == 'create_class' || $page == 'class_list' || $page == 'learner_view' || $page == 'facilitator_view' || $page == 'assessor_view' || $page == 'monderator_view' || $page == 'training_provider_view' || $page == 'project_manager_view' || $page == 'projectmanagar_report_list' || $page == 'stipend_list' || $page == 'drop_out_list' || $page == 'attendance_list' || $page == 'income_item_list' || $page == 'expense_item_list' || $page == 'account_balance_list' || $page == 'create_income_item' || $page == 'create_expense_item' || $page == 'finance_expense_item' || $page == 'expense_view' || $page == 'bank_list' || $page == 'learner_marks_list' || $page == 'user_list' ||  $page == 'list_assessments' ) {

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

			if ($page != 'class_list' || $page != "training_list" || $page != 'facilitator_list' || $page != 'assessor_list' || $page != 'learner_list') {

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

							    url: "projectmanager-deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if ($page == 'send_massage') {

			$js[] = "<script>

			$('#receiver_type').change(function() {

				$.ajax({

				   url: 'projectmanager-get_receiver',

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

		if ($page == 'create_new_project') {

			$js[] = "<script>
			$('.province').change(function(){

				        $.ajax({

				            url: 'projectmanager-getdestrict',

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
										var test = '<option hidden value='+'>Select District</option>';
				                      option += '<option value='+star.id+'>'+star.name+'</option>'

				                      $('.district_option').html(test+option);

				                      $('#district-error').hide();

				                    }

				                });



				            }

				        });

				    });

				    $('.district_option').change(function(){

				       $.ajax({

				            url: 'projectmanager-getcity',

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
									var test = '<option hidden value='+'>Select City</option>';
									option += '<option value='+star.id+'>'+star.city+'</option>'

									$('#city').html(test+option);

									$('#city-error').hide();

								}

				                });



				            }

				        });

				    });




					$('#city').change(function(){
						$.ajax({
							 url: 'projectmanager-getmunicipality',
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
									 var test = '<option hidden value='+'>Select Municipality</option>'
										 option += '<option value='+star.id+'>'+star.municipality+'</option>'
										 $('#municipality').html(test+option);
										 $('#municipality-error').hide();
									 }
								 });
							 }
						 });
					 });

			</script>";
		}

		if ($page == 'create_projects_list' || $page == 'new_task') {
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

							url: "deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

							success : function(data){

								swal("Deleted!", "Record Delete Successfully.", "success");

								$("#del-"+id).remove();

							},

							error : function(jqXHR, textStatus, errorThrown){

								swal("Error deleting!", "Please try again", "error");

							}

						});

					} else {

					  swal("Cancelled", "Your data is safe :)", "error");

					}

				});

			}


            // delete project
			function project_delete(tablename,columnname,id){

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

						url:"project_delete?table="+tablename+"&behalf="+columnname+"&data="+id,

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



			$(document).on("click",".status_checks",function(){

				var status = ($(this).hasClass("btn-success")) ? "0" : "1";

				var msg = (status=="0")? "Inactivate" : "Activate";

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

						url :"projectmanager-changestatus",

						type : "POST",

						dataType : "JSON",

						data: {tablenm_id:$(current_element).attr("data"),status:status},

						success : function(data){

							swal("Status changed", "Status successfully changed", "success")
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

		if ($page == 'new_task') {
			$js[] = '<script>

				    $(function() {



						$("#task_status").change(function(){
							if($("#task_status").val() == "Inprogress"){
								$("#task_status_colour").val("Amber");
							}
							if($("#task_status").val() == "Completed"){
								$("#task_status_colour").val("Green");
							}
							if($("#task_status").val() == "Started"){
								$("#task_status_colour").val("Red");
							}

						});

							$.validator.addMethod("task_name", function(value, element) {

							// allow any non-whitespace characters as the host part

								return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

							}, "Only letters and white space allowed.");



                        $.validator.addMethod("task_desc", function(value, element) {

                        // allow any non-whitespace characters as the host part

                            return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

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



				        $("#CreateTaskForm").validate({

				            rules: {
								project: "required",

				            	task_name: "required",

				                task_desc: "required",

				                task_owner:{

				                    required: true,

				                },
								task_status:{

				                    required: true,

								},
								task_status_colour:{

				                    required: true,

				                },
				                planned_start_date:{

			                    //   dateBefore: "#planned_end_date",

			                      required: true

			                    },

			                    planned_end_date:{

			                      dateAfter: "#planned_start_date",

			                      required: true

			                    },

			                    actual_start_date:{

			                      dateBefore: "#actual_end_date",

			                      required: true

			                    },

			                    actual_end_date:{

			                      dateAfter: "#actual_start_date",

			                      required: true

			                    },

				            },

				            messages: {
								project: "Please enter your Project name",

				            	task_name: "Please enter your Task name",

								task_desc: "Please enter your Task Description",

								task_owner : "Please enter your Task Owner Name",

								task_status:{

									required: "Please select Task Status",

								 },
								 task_status_colour:{

				                    required: "Please Select Task Status Colour",

				                },
				                planned_start_date:{

			                       required: "Please enter Planned start date",

			                    },

			                    planned_end_date:{

			                       required: "Please enter Planned end date",

			                    },

								actual_start_date:{

			                       required: "Please enter your Actual start date",

			                    },

			                    actual_end_date:{

			                       required: "Please enter your Actual end date",

			                    },

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				</script>';
		}

		if ($page == 'bulk_message') {

			$js[] = "<script>

			$('#receiver_type').change(function() {

				$.ajax({

				   url: 'projectmanager-get_receiver_contact',

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
							option += '<option value=+27' + star.mobile_number + '>' + star.name + '</option>'

							$('#receiver').html(test + option);

							$('#receiver-error').hide();

						 }

					  });

				   }

				});
			 });
			</script>";
		}


		if ($page == 'create_new_stipend') {
			$js[] = "<script>
			        $(function () {

						$('#learner_id').keyup(function(){
							debugger;
							$.ajax({

								 url: 'projectmanager-getlearner',

								 data: { 'value': $('#learner_id').val() },

								 dataType:'json',

								 type: 'post',

								 success: function(data){

									 var option = '';

									$.each(data, function(i, star) {

										 if(i == 'error'){

											 $('#learner_name').val(option);

											 $('#learner_surname').val(option);

											 $('#learnship_id').val(option);
											 $('#learnership_sub_type_id').val(option);

											 $('#class').val(option);

											 $('#bank_name').val(option);
											 $('#bank_branch_name').val(option);

											 $('#account_type').val(option);

											 $('#branch_code').val(option);
											 $('#acccount_number').val(option);


											 $('#city-error').html(star);

										 }else{

											$('#learner_name').val(star.first_name);

											$('#learner_surname').val(star.surname);

											$('#learnship_id').val(star.learnship_id);
											// $('#learnship_id').text(star.learnshipname);
											$('#learnership_sub_type_ids').val(star.learnershipSubType);
											$('#learnership_sub_type_id').val(star.sublearnshipname);
											$('#class').val(star.classname);

											$('#bank_name').val(star.bank_name);
											$('#bank_branch_name').val(star.branch_name);

											$('#account_type').val(star.bank_account_type);
											$('#branch_code').val(star.branch_code);

											$('#acccount_number').val(star.bank_account_number);


										 }

									 });

								 }
								})
							 });



			            $.validator.addMethod('email', function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
                        }, 'Please enter a valid email address.');

                        $.validator.addMethod('mobile', function (value, element) {
			              return this.optional(element) || /^[0-9]{9}$/.test(value);
			            }, 'Invalid Mobile Number');
				        $('#CreateStipendForm').validate({
					        rules:{
					            learner_id:{
		                         required: true,
		                        },
		                        learner_name:{
		                         required: true,
								},
								learner_surname:{
									required: true,
								},
								learnership_sub_type:{
									required: true,
								},
		                        class:{
		                         required: true,
		                        },
		                        bank_name:{
		                         required: true,
		                        },
		                        bank_branch_name:{
		                         required: true,
		                        },
		                        account_type:{
		                         required: true,
								},
								branch_code:{
									required: true,
								   },
								account_number:{
								  required: true,
								},
								total_attend:{
									required: true,
								},
								paid_amount:{
								   required: true,
								},


		                    },
		                    messages:{
		                        learner_id: {
		                          required: 'Please enter Learner ID',
		                        },
		                        learner_name: {
		                          required: 'Please enter Valid Learner ID',
								},
								learner_surname: {
									required: 'Please enter Valid Learner ID',
								},
								learnership_sub_type: {
									required: 'Please select Learnership Sub type',
								},
		                        class: {
		                          required: 'Please enter Class Name',
		                        },
		                        bank_name: {
		                          required: 'Please enter Bank Name',
		                        },
		                        bank_branch_name: {
		                          required: 'Please enter Branch Name',
		                        },
		                        account_type: {
		                          required: 'Please enterAccount Type',
								},
								branch_code:{
									required: 'Please enter Branch Code',
								},
								account_number:{
									required: 'Please enter Account Number',
								},
								total_attend:{
									required: 'Please enter Number of days attended',
								},
								paid_amount:{
									required: 'Please enter Total to be paid Amount',
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
		// ********************************************************************************************************************************

		if ($page == 'class_list') {

			$js[] = '<script>

		        function deleterecordClass(tablename,columnname,id,classname){

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

							    url: "projectmanager-deletedataclass?table="+tablename+"&behalf="+columnname+"&data="+id+"&classname="+classname,

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

		if ($page == 'editprofile' || $page == 'create_new_project') {

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

					$.validator.addMethod("mobile", function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, "Invalid Mobile Number");

			            $.validator.addMethod("landline", function (value, element) {

			            return this.optional(element) || /^[0-9]{9}$/.test(value);

			            }, "Invalid Landline Number");

				        $("#CreateProjectForm").validate({

				            rules: {



				                project_name:  {

				                    required: true,

								},

								project_type:  {

				                    required: true,

								},

								province:  {

				                    required: true,

								},

								province:  {

				                    required: true,

				                },

				                province:  {

				                    required: true,

				                },

				                district:  {

				                    required: true,

				                },

				                region:  {

				                    required: true,

				                },

				                city:  {

				                    required: true,

								},

								municipality:  {

				                    required: true,

				                },

				                planned_start_date:{
									dateBefore: "#actual_end_date",
									dateBefore: "#actual_start_date",

			                       required: true,

			                    },

			                    actual_start_date:{
									dateAfter: "#planned_start_date",
									dateBefore: "#planned_end_date",
			                       required: true,

			                    },

								planned_end_date:{
									dateAfter: "#actual_start_date",
									dateBefore: "#actual_end_date",
			                       required:true,

			                    },

			                    actual_end_date:{
									dateAfter: "#planned_end_date",

			                       required: true,

			                    },

								project_owner_name:{

								   required: true,
								   fullname : true

			                    },

			                    project_owner_surname:{

			                       required:true,
								   fullname : true

			                    },

			                    project_owner_email:{

								   required: true,

								   email : true,

			                    },

			                    mobile_number:{

								   required: true,
									mobile: true
			                    },

								landline_number:{

								   required: true,
								   landline:true,

			                    },

			                    id_number:{

			                       required: true,

			                    },

				                gender: {

				                	required:true,

				                },

				                dob: {

				                    required: true,
				                },



				                pre_implement_actual_start_date: {

									required: true,

									dateBefore: "#pre_implement_actual_end_date",

								},

								pre_implement_planned_start_date: {

									required: true,
									dateBefore: "#pre_implement_planned_end_date",

								},

								pre_implement_planned_end_date: {

									required: true,
									dateAfter: "#pre_implement_planned_start_date",

								},

								pre_implement_actual_end_date: {

									required: true,
									dateAfter: "#pre_implement_actual_start_date",

								},
								implement_planned_start_date: {

				                    required: true,
									dateBefore: "#implement_planned_end_date",
								},
								implement_actual_start_date: {

				                    required: true,
									dateBefore: "#implement_actual_end_date",
								},
								implement_planned_end_date: {

				                    required: true,
									dateAfter: "#implement_planned_start_date",
								},
								implement_actual_end_date: {

				                    required: true,
									dateAfter: "#implement_actual_start_date",
								},
								closeout_planned_start_date: {

				                    required: true,
									dateBefore: "#closeout_planned_end_date",
								},
								closeout_actual_start_date: {

				                    required: true,
									dateBefore: "#closeout_actual_end_date",
								},
								closeout_planned_end_date: {

				                    required: true,
									dateAfter: "#closeout_planned_start_date",
								},
								closeout_actual_end_date: {

				                    required: true,
									dateAfter: "#closeout_actual_start_date",
								},



				            },

				            messages: {

								project_name: "Please enter your project Name",

								project_type: "Please Select Project",

				                project_manager: "Please enter your Project Manager",

				                province:  {

				                    required: "Please select Province",

				                },

				                district:  {

				                    required: "Please select District",

				                },

				                region:  {

				                    required: "Please select Region",

				                },

				                city:  {

				                    required: "Please Select City",

								},

								municipality:  {

				                    required: "Please Select Municipality",

				                },

				                planned_start_date:{

			                       required: "Please enter Planned start date",

			                    },

			                    actual_start_date:{

			                       required: "Please enter Actual start date",

			                    },

								planned_end_date:{

			                       required: "Please enter Planned end date",

			                    },

			                    actual_end_date:{

			                       required: "Please enter Actual end date",

			                    },

								project_owner_name:{

			                       required: "Please enter your Project Owner Name",

			                    },

			                    project_owner_surname:{

			                       required: "Please enter your Project Owneer Surname",

			                    },

			                    project_owner_email:{

			                       required: "Please enter your Project Owner Email",

			                    },

			                    mobile_number:{

			                       required: "Please enter Mobile Number",

			                    },

								landline_number:{

			                       required: "Please enter Landline Number",

			                    },

			                    id_number:{

			                       required: "Please enter ID number",

			                    },

				                gender: {

				                	required:"Please select  gender",

				                },

				                dob: {

				                    required: "Please enter Date of Birth",
				                },

				                pre_implement_actual_start_date: {

				                    required: "Please select Pre implementation Actual start date",

								},

								pre_implement_planned_start_date: {

				                    required: "Please select Pre implementation Planned start date",

								},

								pre_implement_planned_end_date: {

				                    required: "Please select Pre implementation Planned end date",

								},

								pre_implement_actual_end_date: {

				                    required: "Please select Pre implementation Actual end date",

								},
								implement_planned_start_date: {

				                    required: "Please select Implementation Planned Start date",

								},
								implement_actual_start_date: {

				                    required: "Please select Implementation Actual Start date",

								},
								implement_planned_end_date: {

				                    required: "Please select Implementation Planned End date",

								},
								implement_actual_end_date: {

				                    required: "Please select Implementation Actual end date",

								},
								closeout_planned_start_date: {

				                    required: "Please select Closeout Planned Start Date",

								},
								closeout_actual_start_date: {

				                    required: "Please select Closeout Actaul Start Date",

								},
								closeout_planned_end_date: {

				                    required: "Please select Closeout Planned end Date",

								},
								closeout_actual_end_date: {

				                    required: "Please select Closeout Actual end Date",

								},

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

					});




				</script>';
		}



		if ($page == 'editprofile' || $page == 'create_training' || $page == 'create_assessor' || $page == 'create_moderator' || $page == 'create_facilitator' || $page == 'create_learner') {

			$js[] = "<script> $('.province').change(function(){

				        $.ajax({

				            url: 'projectmanager-getdestrict',

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
										var test = '<option hidden value='+'>Select District</option>';
				                      option += '<option value='+star.id+'>'+star.name+'</option>'

				                      $('.district_option').html(test+option);

				                      $('#district-error').hide();

				                    }

				                });



				            }

				        });

				    });

				    $('.district_option').change(function(){

				       $.ajax({

				            url: 'projectmanager-getcity',

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
									var test = '<option hidden value='+'>Select City</option>';
									option += '<option value='+star.id+'>'+star.city+'</option>'

									$('#city').html(test+option);

									$('#city-error').hide();

								}

				                });



				            }

				        });

				    });




					$('#city').change(function(){
						$.ajax({
							 url: 'projectmanager-getmunicipality',
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
									 var test = '<option hidden value='+'>Select Municipality</option>'
										 option += '<option value='+star.id+'>'+star.municipality+'</option>'
										 $('#municipality').html(test+option);
										 $('#municipality-error').hide();
									 }
								 });
							 }
						 });
					 });

			</script>";
		}

		if ($page == 'create_training') {

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

			              remote: 'projectmanager-trainingcompanyname?id='+trainer_id,

			            },

			            'surname':{

			              required: true,

			            },

			            'email':{

						  required: true,

						  email: true

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


			            'municipality':{

							required: true,

						  },
			            'Suburb':{

			              required: true,

			            },

			            'Street_name':{

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

						  required: 'Please enter valid email',

						  email: 'Please enter valid email',

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

						'municipality':{

							required: 'Please select your municipality',

						  },

			            'Suburb':{

			              required: 'Please enter your Suburb',

			            },

			            'Street_name':{

			              required: 'Please enter your street name',

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

		if ($page == 'create_assessor' || $page == 'create_moderator') {

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

				                	required: "Please select your training provider",

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

		if ($page == 'create_facilitator') {

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

				                	required: "Please select your training provider",

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

		if ($page == 'create_learner') {

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

                         classname:{

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

                        classname: {

                          required: 'Please choose your class name',

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

		if ($page == 'import_learner') {

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

		if ($page == 'learner_list') {

			$js[] = '<script>

			   $(document).on("click",".status_change",function(){

			   	var learner = $(this).data("learner");

		        // var status = ($(this).hasClass("btn-success")) ? "0" : "1";

                var msg =((learner =="No")||(learner=="no"))? "Not Accepted" : "Accepted";

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

				        url :"projectmanager-leaner",

				        type : "POST",

				        dataType : "JSON",

				        data: {tablenm_id:$(current_element).attr("data"),learner:"no",text:inputValue},

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

	        $(document).on("click",".status_accepted",function(){

		       var learner = $(this).data("learner");

               var msg =((learner =="Yes")||(learner=="yes"))? "Not Accepted" : "Accepted";

		        var current_element = $(this);

		        var text = "";

		        swal({

	                    title: "Are you sure?",

	                    text: msg,

	                    type: "warning",

	                    showCancelButton: true,

	                    confirmButtonClass: "btn-danger",

	                    confirmButtonText: msg,

	                    cancelButtonText: "No, cancel it!",

	                    closeOnConfirm: false,

	                    closeOnCancel: false

	                },

	                function (isConfirm) {

	                    if (isConfirm) {

	                        $.ajax({

						        url :"projectmanager-leaner",

						        type : "POST",

						        dataType : "JSON",

						        data: {tablenm_id:$(current_element).attr("data"),learner:"yes",text:text},

						        success : function(data){

						        	if(data["status"] == 200){

						        	  location.reload();

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

		    });

	      </script>';
		}

		if ($page == 'create_class') {

			$js[] = "<script>

				        $(function () {

				            $('#CreateClassForm').validate({

						        rules:{

						          	'trainer_id':{

						              required: true,

						            },

						            '_id':{

						              rlearnership_sub_typeequired: true,

						            },

						            'class_name':{

						              required: true,

						            },

						        },

			                    messages:{

			                        'trainer_id':{

						              required: 'Please select your training provider',

						            },

						            'learnership_sub_type_id':{

						              required: 'Please select your learnership sub type',

						            },

						             class_name: {

			                          required: 'Please enter your class name',

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

		if ($page == 'create_income_item') {

			$js[] = '<script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>';

			$js[] = '<script>


				$(function () {
					$(".learnship_id").change(function(){

						$.ajax({

							url: "projectmanager-get_sublearnership",

							data: { "value": $(".learnship_id").val() },

							dataType:"json",

							type: "post",

							success: function(data){

								var option = "";

							   $.each(data, function(i, star) {

										if(i == "error"){

										$(".learnership_sub_type_id").html(option);

										$("#learnership_sub_type_id-error").show();

										$("#learnership_sub_type_id-error").html(star);

									}else{
										var test = "<option hidden value="+">Select Sublearnership</option>";
									  option += "<option value="+star.id+">"+star.sub_type+"</option>"

									  $(".learnership_sub_type_id").html(test+option);

									  $("#learnership_sub_type_id-error").hide();

									}

								});



							}

						});

						});

			        $("#CreateIncomeItem").validate({

			          rules:{

						"learnship_id" :{
							required : true
						},

						"learnership_sub_type_id" :{
							required : true
						},

			            "date":{

			              required: true,

			            },

			            "amount":{

			              required: true,

			            },

			            "payer":{

			              required: true,

			            },

			            "description":{

			              required: true,

			            },

			        },

                      messages:{
						"learnship_id" :{
							required : "Please select Learnership type",
						},

						"learnership_sub_type_id" :{
							required : "Please select Learnership sub type",
						},
			            "date":{

			              required: "Please enter your date",

			            },

			             "amount":{

			              required: "Please enter your amount",

			            },

			             "payer":{

			              required: "Please enter your Source Of Funds",

			            },

			             "description":{

			              required: "Please enter your date",

			            },

			        }

			        });

			        $.validator.setDefaults({

			           submitHandler: function(form) {

			           form.submit();

			        }

			      });

			    });

				</script>';
		}

		if ($page == 'create_expense_item') {

			$js[] = '<script>

				    $(function () {

						$(".learnship_id").change(function(){

							$.ajax({

								url: "projectmanager-get_sublearnership",

								data: { "value": $(".learnship_id").val() },

								dataType:"json",

								type: "post",

								success: function(data){

									var option = "";

								   $.each(data, function(i, star) {

											if(i == "error"){

											$(".learnership_sub_type_id").html(option);

											$("#learnership_sub_type_id-error").show();

											$("#learnership_sub_type_id-error").html(star);

										}else{
											var test = "<option hidden value="+">Select Sublearnership</option>";
										  option += "<option value="+star.id+">"+star.sub_type+"</option>"

										  $(".learnership_sub_type_id").html(test+option);

										  $("#learnership_sub_type_id-error").hide();

										}

									});



								}

							});

							});

						$.validator.addMethod("fullname", function(value, element) {

							// allow any non-whitespace characters as the host part

								return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

							}, "Only letters and white space allowed.");



			        $("#CreateExpenseItem").validate({

			          rules:{


						"learnershipSubType" :{
							required :true,
						},
			            "expense_type":{

			              required: true,

			            },

			            "expense_name":{
							fullname : true,
			              required: true,

			            },

			            "expense_amount":{

			              required: true,

			            },

			            "date":{

			              required: true,

			            },

			        },

                      messages:{


						"learnershipSubType" :{
							required : "Please select Learnership sub type",
						},
			             "expense_type":{

			              required: "Please enter your expense type",

			            },

			             "expense_name":{

			              required: "Please enter your expense name",

			            },

			            "expense_amount":{

			              required: "Please enter your expense amount",

			            },

			            "date":{

			              required: "Please select your date of expense item",

			            },

			        }

			        });

			        $.validator.setDefaults({

			           submitHandler: function(form) {

			           form.submit();

			        }

			      });

			    });

			    </script>';
		}

		if ($page == 'assessor_list') {

			$js[] = '<script>

		        function projectmanagerdeletedataAssessor(tablename,columnname,id,trainer_id){

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

							    url:"projectmanagerdeletedataAssessor?table="+tablename+"&behalf="+columnname+"&data="+id+"&trainer_id="+trainer_id,

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

		if ($page == 'moderator_list') {

			$js[] = '<script>

		        function projectmanagerdeletedataModerator(tablename,columnname,id){

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

							    url:"projectmanagerdeletedataModerator?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if ($page == 'facilitator_list') {

			$js[] = '<script>

		        function projectmanagerdeletedataFacilitator(tablename,columnname,id,training_provider){

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

							    url:"projectmanagerdeletedataFacilitator?table="+tablename+"&behalf="+columnname+"&data="+id+"&training_provider="+training_provider,

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

		if ($page == 'learner_list') {

			$js[] = '<script>

		        function projectmanagerdeletedataLearner(tablename,columnname,id){

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

							    url:"projectmanagerdeletedataLearner?table="+tablename+"&behalf="+columnname+"&data="+id,

							    dataType: "json",

	                            success : function(data){

	                            	if(data.status == "true"){

                                        swal("Deleted!", "Record Delete Successfully.", "success");

                                       $("#del-"+id).remove();

                                    }

                                    if(data.error == "stipend"){

                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                                    }

                                    if(data.error == "drop_out"){

                                        swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                                    }

                                    if(data.error == "complaints_and_suggestions"){

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

		if ($page == 'training_list') {

			$js[] = '<script>

		        function projectmanagerdeletedataTrainingprovider(tablename,columnname,id){

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

							    url:"projectmanagerdeletedataTrainingprovider?table="+tablename+"&behalf="+columnname+"&data="+id,

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

		if ($page == 'create_bank') {

			$js[] = '<script>

				    $(function() {

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



				        $("#CreateBankForm").validate({

				            rules: {
								task_status:{

				                    required: true,

				                },
				                project_manager_name:{

				                    required: true,

				                },

				                project_name:{

				                    required: true,

				                },

				                quarter:{

				               	  required: true,

				                },

				                bank_start_date:{

			                      dateBefore: "#bank_end_date",

			                      required: true

			                    },

			                    bank_end_date:{

			                      dateAfter: "#bank_start_date",

			                      required: true

			                    },

			                    upload_bank_statement:{

					              required: true,

					            },

				            },

				            messages: {

				            	task_status:{

				                    required: "Please select Bank status",

				                },

				                project_manager_name:  {

				                    required: "Please enter your project manager name",

				                },

				                project_name:  {

				                    required: "Please enter your project name",

				                },

				                quarter:  {

				                    required: "Please select your quarter",

				                },

				                bank_start_date:{

			                       required: "Please enter your bank start date",

			                    },

			                    bank_end_date:{

			                       required: "Please enter your bank end date",

			                    },

			                    upload_bank_statement:{

					              required: "Please select your bank statement",

					            },

				            },

				            submitHandler: function(form) {

				                form.submit();

				            }

				        });

				    });

				</script>';
		}

		if ($page == 'user_list') {
			$js[] = '<script>
        	 function deleteuser(tablename,columnname,id){
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
								    url: "Projectmanager-User-Delete?table="+tablename+"&behalf="+columnname+"&data="+id,
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

		if ($page == 'create_user') {
			$js[] = "<script>
			        $(function () {
			            $.validator.addMethod('email', function(value, element) {
                        // allow any non-whitespace characters as the host part
                            return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
                        }, 'Please enter a valid email address.');
						$.validator.addMethod('fullname', function(value, element) {

							// allow any non-whitespace characters as the host part

								return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

							}, 'Only letters and white space allowed.');
                        $.validator.addMethod('mobile', function (value, element) {
			              return this.optional(element) || /^[0-9]{9}$/.test(value);
			            }, 'Invalid Mobile Number,Only Nine Digits Allowed');
				        $('#CreateUserForm').validate({
					        rules:{
					            first_name:{
								 required: true,
								 fullname : true,
		                        },
		                        second_name:{
								 required: true,
								 fullname : true,

		                        },
		                        email:{
								 required: true,
								 email :true
		                        },
		                        mobile:{
								 required: true,
								 mobile : true
		                        },
		                        password:{
		                         required: true,
		                        },
		                        designation:{
								 required: true,
								 fullname : true,

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



		if ($page == 'create_employer') {

			$js[] = "<script>

			$(function () {
				$.validator.addMethod('employer_contact_email', function(value, element) {
				// allow any non-whitespace characters as the host part
					return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
				}, 'Please enter a valid email address.');

				$.validator.addMethod('employer_contact_number', function (value, element) {
				  return this.optional(element) || /^[0-9]{9}$/.test(value);
				}, 'Invalid Mobile Number');

				$.validator.addMethod('fullname', function(value, element) {

					// allow any non-whitespace characters as the host part

						return this.optional( element ) || /^[a-zA-Z\s]+$/.test( value );

					}, 'Only letters and white space allowed.');



				$('#CreateEmployerForm').validate({
					rules:{
						employer_name:{
						 required: true,
						 fullname : true,
						},
						employer_contact_email:{
						 required: true,
						},
						employer_contact_number:{
						 required: true,
						},
						employer_province:{
						 required: true,
						},
						employer_district:{
						 required: true,
						},
						employer_region:{
						 required: true,
						},
						employer_city:{
						required:true,
						},
						employer_Suburb:{
						 required:true,
						},
						employer_Street_name:{
						 required:true,
						},

					    contact_person_name:{
						 required:true,
						 fullname : true,

						},
    				    contact_person_surname:{
						 required:true,
						 fullname : true,

						},
						contact_person_contact_no:{
						 required:true,
						},
						'municipality':{
							required : true,
						}


					},
					messages:{
						employer_name: {
						  required: 'Please enter Employer name',
						},
						employer_contact_email: {
						  required: 'Please enter Employer contact email',
						},
						employer_contact_number: {
						  required: 'Please enter Employer mobile number',
						},
						employer_province:{
							required: 'Please Enter Employer Province',
						   },
						   employer_district:{
							required: 'Please Choose Employer District',
						   },
						   employer_region:{
							required: 'Please Choose Employer Region',
						   },
						   employer_city:{
						   required:'Please Choose Employer City',
						   },
						   employer_Suburb:{
							required:'Please Enter Employer Suburb',
						   },
						   employer_Street_name:{
							required:'Please Enter Employer Street name',
						   },

						   contact_person_name:{
							required:'Please Enter Employer Contactr Person Name',
						   },
						   contact_person_surname:{
							required:'Please Enter Employer Contact Person Surname',
						   },
						   contact_person_contact_no:{
							required:'Please Enter Employer Contact Person Contact Number',
						   },
						   municipality:{
							required:'Please Select Municipality',
						   },
					}
					});
					$.validator.setDefaults({
					   submitHandler: function(form) {
					   form.submit();
					}
				});
			});


			$('.employer_province').change(function(){

				$.ajax({

					url: 'projectmanager-getdestrict',

					data: { 'value': $('.employer_province').val() },

					dataType:'json',

					type: 'post',

					success: function(data){

						var option = '';

					   $.each(data, function(i, star) {

							if(i == 'error'){

								$('.employer_district').html(option);

								$('#employer_district-error').show();

								$('#employer_district-error').html(star);

							}else{
								var test = '<option hidden value='+'>Select District</option>';

							  option += '<option value='+star.id+'>'+star.name+'</option>'

							  $('.employer_district').html(test+option);

							  $('#employer_district-error').hide();

							}

						});



					}

				});

			});





			$('#employer_district').change(function(){

			   $.ajax({

					url: 'projectmanager-getcity',

					data: { 'value': $('#employer_district').val() },

					dataType:'json',

					type: 'post',

					success: function(data){

						var option = '';

					   $.each(data, function(i, star) {

							if(i == 'error'){

								$('#employer_city').html(option);

								$('#employer_city-error').show();

								$('#employer_city-error').html(star);

							}else{
								var test = '<option hidden value='+'>Select City</option>';
								option += '<option value='+star.id+'>'+star.city+'</option>'

								$('#employer_city').html(test+option);

								$('#employer_city-error').hide();

							}

						});

					}

				});

			});


			$('#employer_city').change(function(){
				$.ajax({
					 url: 'projectmanager-getmunicipality',
					 data: { 'value': $('#employer_city').val() },
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
							 var test = '<option hidden value='+'>Select Municipality</option>'
								 option += '<option value='+star.id+'>'+star.municipality+'</option>'
								 $('#municipality').html(test+option);
								 $('#municipality-error').hide();
							 }
						 });
					 }
				 });
			 });


			</script>";
		}
		if ($page == 'create_income_item') {

			$js[] = '<script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>';

			$js[] = '<script>
			CKEDITOR.editorConfig = function (config) {

				config.language = "es";

				config.uiColor = "#F7B42C";

				config.height = 300;

				config.toolbarCanCollapse = true;

			};

			CKEDITOR.replace("description");

			</script>';
		}
		if ( ($page == 'create_new_stipend') || ($page == 'create_assessment')) {

			$js[] = "<script>

			$('.learnship_id').change(function(){

				$.ajax({

					url: 'projectmanager-get_sublearnership',

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


			</script><script>
			$('.learnership_sub_type_id').change(function(){

				$.ajax({

					url: 'projectmanager-getclassname',

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

debugger;
								var test = '<option hidden value='+'>Select Class</option>';
							  option += '<option value='+star.id+'>'+star.class_name+'</option>'

							  $('.learner_classname').html(test+option);

							  $('#learner_classname-error').hide();

							}

						});



					}

				});

			});



			</script>";
		}


		// Assessments
		if ($page == 'list_assessments') {
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

							url: "deletedata?table="+tablename+"&behalf="+columnname+"&data="+id,

							success : function(data){

								swal("Deleted!", "Record Delete Successfully.", "success");

								$("#del-"+id).remove();

							},

							error : function(jqXHR, textStatus, errorThrown){

								swal("Error deleting!", "Please try again", "error");

							}

						});

					} else {

					  swal("Cancelled", "Your data is safe :)", "error");

					}

				});

			}


            // delete project
			function project_assessment(tablename,columnname,id){

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

						url:"assessment_delete?table="+tablename+"&behalf="+columnname+"&data="+id,

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



			$(document).on("click",".status_checks",function(){

				var status = ($(this).hasClass("btn-success")) ? "0" : "1";

				var msg = (status=="0")? "Inactivate" : "Activate";

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

						url :"projectmanager-changestatus",

						type : "POST",

						dataType : "JSON",

						data: {tablenm_id:$(current_element).attr("data"),status:status},

						success : function(data){

							swal("Status changed", "Status successfully changed", "success")
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


		return $js;
	}
}
