<?php

defined('BASEPATH') or exit('No direct script access allowed');



class JscssExternalmoderator extends CI_Model

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
		$css[] = '<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" id="theme-stylesheet" rel="stylesheet" type="text/css">';

		$css[] = '<style>p.lead.text-muted{

    		color:#000 !important;

    	} </style>';

		if ($page == 'create_province' || $page == 'create_district' || $page == 'create_region' || $page == 'create_city' || $page == 'organisation_list' || $page == 'programmer_list' || $page == 'create_attendance' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'moderator_list' || $page == "create_attendance") {

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

		if ($page == 'moderator_editprofile' || $page == 'create_attendance' || $page == 'create_region' || $page == 'create_city' || $page == 'organisation_list' || $page == 'programmer_list' || $page == 'project_list' || $page == 'training_list' || $page == 'facilitator_list' || $page == 'assessor_list' || $page == 'moderator_list' || $page = "changepassword" || $page == "create_attendance") {

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

		if ($page == 'moderator_editprofile') {

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

				        $("#CreateModeratorForm").validate({

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

				                    url:"moderator-acreditations-file-delete",

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

		if ($page == 'moderator_editprofile') {

			$js[] = "<script> $('.province').change(function(){
				debugger;
				        $.ajax({

				            url: 'external-moderator-getdestrict',

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

				    //         url: 'moderator-getregion',

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
	
						        url: 'external-moderator-getcity',
	
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

				    //         url: 'moderator-getcity',

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
 
							 url: 'external-moderator-get_municipality',
 
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

		if ($page == 'createmoderation') {

			$js[] = "<script>
			function deleterecord(tablename,columnname,id){ 

				swal({
				
					title: 'Are you sure?',
				
					text: 'Delete',
				
					type: 'warning',
				
					showCancelButton: true,
				
					confirmButtonClass: 'btn-danger',
				
					confirmButtonText: 'Yes, delete it!',
				
					cancelButtonText: 'No, cancel plx!',
				
					closeOnConfirm: false,
				
					closeOnCancel: false
				
				}, 
				
				function (isConfirm) {
				
					if (isConfirm) {
				
						$.ajax({
				
							type:'GET',
				
							url: 'internal-moderator-deletedata?table='+tablename+'&behalf='+columnname+'&data='+id,
				
							success : function(data){
				
								swal('Deleted!', 'Record Delete Successfully.', 'success');
				
								$('#del-'+id).remove();
				
							},
				
							error : function(jqXHR, textStatus, errorThrown){
				
								swal('Error deleting!', 'Please try again', 'error');
				
							}
				
						});
				
					} else {
				
					  swal('Cancelled', 'Your imaginary file is safe :)', 'error');
				
					}
				
				});    
				
				}
			    $(function() {

			        $('#CreateModerationForm').validate({

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
					
						url: 'internal-moderator-get_sublearnership',
					
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
						
							url: 'internal-moderator-getclassname',
						
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

			            url: 'internal-moderator-getunitstandard',

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
					
						url: 'internal-moderator	-getlearner',
					
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
