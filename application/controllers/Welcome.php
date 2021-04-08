<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Welcome extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();
	}



	public function index()
	{

		$this->form_validation->set_rules('email_address', 'Email Address', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);
			if ($emailverify = $this->common->accessrecord('organisation', [], ['email_address' => $_POST['email_address']], 'row')) {
				if ($data = $this->common->accessrecord('organisation', [], $data, 'row')) {

					$session['id'] = $data->id;

					$this->session->set_userdata('organisation', $session);

					$this->session->set_flashdata('success', 'Login Successful');


					redirect('dashboard');
				} else {

					$this->session->set_flashdata('error', 'Invalid Password');
				}
			} else {

				$this->session->set_flashdata('error', 'Invalid Email Address');
			}
		}

		$this->load->view('MyOrganization/login');
	}




	public function superAdmin()
	{

		$this->form_validation->set_rules('email_address', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);

			if ($data = $this->common->accessrecord('master_admin', [], $data, 'row')) {

				$session['id'] = $data->id;

				$this->session->set_userdata('superadmin', $session);

				$this->session->set_flashdata('success', 'Login Successful');

				redirect('superAdmin-dashboard');
			} else {

				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}

		$this->load->view('super-admin/login');
	}

	public function superAdmin_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('super-admin/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email_address' => $_POST['email_address']];
				$data = $this->common->accessrecord('master_admin', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('super-admin/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('master_admin', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('super-admin/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('super-admin/forget_password');
						}
						$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
						$this->load->view('super-admin/forget_password');
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('super-admin/forget_password');
					}
				}
			}
		}
	}

	public function organisation()

	{

		$this->form_validation->set_rules('email_address', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);

			if ($data = $this->common->accessrecord('organisation', [], $data, 'row')) {

				$session['id'] = $data->id;

				$this->session->set_userdata('organisation', $session);

				$this->session->set_flashdata('success', 'Login Successful');

				redirect('organisation-dashboard');
			} else {

				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}

		$this->load->view('organisation/login');
	}

	
	public function faciltator()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);
			if ($verify = $this->common->accessrecord('facilitator', [], ['email' => $_POST['email']], 'row')) {
				if ($data = $this->common->accessrecord('facilitator', [], $data, 'row')) {

					$session['id'] = $data->id;

					$this->session->set_userdata('facilitator', $session);

					$this->session->set_flashdata('success', 'Login Successful');

					redirect('Faciltator-dashboard');
				} else {

					$this->session->set_flashdata('error', 'Invalid Password');
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid Email Address');
			}
		}

		$this->load->view('faciltator/login');
	}

	public function facilitator_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('faciltator/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('facilitator', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('faciltator/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('facilitator', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('faciltator/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('faciltator/forget_password');
						}
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('faciltator/forget_password');
					}
				}
			}
		}
	}



	public function moderator()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);

			if($this->common->accessrecord('moderator', [], ['email'=>$_POST['email']], 'row'))
			{
				if ($data = $this->common->accessrecord('moderator', [], $data, 'row')) {

					$session['id'] = $data->id;
	
					$this->session->set_userdata('moderator', $session);
	
					$this->session->set_flashdata('success', 'Login Successful');
	
					redirect('internal-Moderator-dashboard');
				} else {
	
					$this->session->set_flashdata('error', 'Invalid <Password></Password>');
				}
			}else{
				$this->session->set_flashdata('error', 'Invalid Email Address');
			}
		}

		$this->load->view('moderator/login');
	}



	public function internal_moderator_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('moderator/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('moderator', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('moderator/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('moderator', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('faciltator/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('faciltator/forget_password');
						}
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('faciltator/forget_password');
					}
				}
			}
		}
	}














	public function projectmanager()
	{

		$this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);

			if ($this->common->accessrecord(TBL_Project_Manager, [], ['email_address' => $_POST['email_address']], 'row')) {
				// print_r($data);die;
				if ($data = $this->common->projectmanager_login($data)) {
					// print_r($data);die;
					$organ['id'] = $data->organization;
					$this->session->set_userdata('organisation', $organ);
					$session['id'] = $data->id;
					// print_r($session['id']);die;
					$this->session->set_userdata('projectmanager', $session);

					redirect('projectmanager-dashboard');
				} else {

					$this->session->set_flashdata('error', 'Invalid Password ');
				}
			} else {

				$this->session->set_flashdata('error', 'Invalid Email Address ');
			}
		}

		$this->load->view('project-manager/login');
	}

	public function projectmanager_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('project-manager/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email_address' => $_POST['email_address']];
				$data = $this->common->accessrecord('project_manager', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('project-manager/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('project_manager', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('project-manager/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('project-manager/forget_password');
						}
						$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
						$this->load->view('project-manager/forget_password');
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('project-manager/forget_password');
					}
				}
			}
		}
	}

	public function assosser()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);
			if($this->common->accessrecord('assessor', [], ['email'=> $_POST['email']], 'row')){
				if ($data = $this->common->accessrecord('assessor', [], $data, 'row')) {

					$session['id'] = $data->id;
	
					$this->session->set_userdata('assessor', $session);
	
					$this->session->set_flashdata('success', 'Login Successful');
	
					redirect('assessor-dashboard');
				} else {
	
					$this->session->set_flashdata('error', 'Invalid Password');
				}
			}else{
				$this->session->set_flashdata('error', 'Invalid Email Address');

			}
		
		}

		$this->load->view('assessor/login');
	}

	public function assessor_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('assessor/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('assessor', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('assessor/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('assessor', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('assessor/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('assessor/forget_password');
						}
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('assessor/forget_password');
					}
				}
			}
		}
	}







	public function learner()
	{

		if ($_POST) {

			$this->form_validation->set_rules('email', 'Email', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == false) {

				//$this->load->view('learner/login');

			} else {

				$data = $_POST;

				$data['password'] = sha1($_POST['password']);

				if($this->common->accessrecord('learner', [], ['email'=> $_POST['email']], 'row'))
				{
					if ($data = $this->common->learner_login($data)) {

						$query = $this->db->where('id', $data->organization)->get('organisation');
						$organisation =  $query->result();
						// print_r($organisation);die;
						$session['id'] = $data->id;
	
						$this->session->set_userdata('learner', $session);
	
						redirect('learner-Dashboard');
					} else {
	
						$this->session->set_flashdata('error', 'Invalid Password');
					}
				}else{
					$this->session->set_flashdata('error', 'Invalid Email Address');

				}
				
			}

			$this->load->view('learner/login');
		} else {

			$this->load->view('learner/login');
		}
	}


	public function learner_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('learner/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('learner', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('learner/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('learner', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('learner/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('learner/forget_password');
						}
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('learner/forget_password');
					}
				}
			}
		}
	}



	public function trainingprovider()
	{

		if ($_POST) {

			$this->form_validation->set_rules('email', 'Email', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == false) {

				$this->load->view('provider/login');
			} else {

				$data = $_POST;

				$data['password'] = sha1($_POST['password']);

				if ($this->common->accessrecord(TBL_Trainer_Provider, [], ['email' => $_POST['email']], 'row')) {

					if ($data = $this->common->accessrecord(TBL_Trainer_Provider, [], $data, 'row')) {
						$organ['id'] = $data->organization;
						$this->session->set_userdata('organisation', $organ);
						$session['trainer_id'] = $data->id;

						$this->session->set_userdata('admin', $session);

						redirect('Provider-Dashboard');
					} else {

						$this->session->set_flashdata('error', 'Invalid Password');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Email Address');
				}
			}

			$this->load->view('provider/login');
		} else {

			$this->load->view('provider/login');
		}
	}

	public function provider_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('provider/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('trainer', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('provider/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('trainer', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('provider/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('provider/forget_password');
						}
						$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
						$this->load->view('provider/forget_password');
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('provider/forget_password');
					}
				}
			}
		}
	}




	public function externalmoderator()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
		} else {

			$data = $_POST;

			$data['password'] = sha1($_POST['password']);

			if($this->common->accessrecord('external_moderator', [], ['email'=>$_POST['email']], 'row'))
			{
				if ($data = $this->common->accessrecord('external_moderator', [], $data, 'row')) {

					$session['id'] = $data->id;
	
					$this->session->set_userdata('external_moderator', $session);
	
					$this->session->set_flashdata('success', 'Login Successful');
	
	
	
	
					redirect('external-Moderator-dashboard');
				} else {
	
					$this->session->set_flashdata('error', 'Invalid Password');
				}
			}else{
				$this->session->set_flashdata('error', 'Invalid Email Address');
			}
		}

		$this->load->view('external_moderator/login');
	}


	public function external_moderator_forgetpassword()
	{
		if (empty($_POST)) {
			$this->load->view('external_moderator/forget_password');
		} else {
			$this->form_validation->set_rules('email_address', 'Email', 'required');
			if ($this->form_validation->run() == false) {
			} else {
				$condition = ['email' => $_POST['email_address']];
				$data = $this->common->accessrecord('external_moderator', [], $condition, 'row');
				if (empty($data)) {
					$this->session->set_flashdata('error', 'Email Doesnt Exist, Try with right Email Adress');
					$this->load->view('external_moderator/forget_password');
				} else {
					$password = rand(0000000, 9999999);
					$dataa['password'] = sha1($password);

					$res = $this->common->updateData('external_moderator', $dataa, ['id' => $data->id]);


					if ($res) {
						$email = $_POST['email_address'];
						$to = "$email";
						$subject = "DigiLims Password Change";
						$message = "<!DOCTYPE html>					
								<head>
									<title>PASSWORD UPDATED</title>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<meta http-equiv='X-UA-Compatible' content='IE=edge' />
									<meta name='viewport' content='width=device-width, initial-scale=1.0 ' />
									<meta name='format-detection' content='telephone=no' />
									
									<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' />
								
									<style type='text/css'>
										body {
											-webkit-text-size-adjust: 100% !important;
											-ms-text-size-adjust: 100% !important;
											-webkit-font-smoothing: antialiased !important;
										}
								
										img {
											border: 0 !important;
											outline: none !important;
										}
								
										p {
											Margin: 0px !important;
											Padding: 0px !important;
										}
								
										table {
											border-collapse: collapse;
											mso-table-lspace: 0px;
											mso-table-rspace: 0px;
										}
								
										td,
										a,
										span {
											border-collapse: collapse;
											mso-line-height-rule: exactly;
										}
								
										.ExternalClass * {
											line-height: 100%;
										}
								
										span.MsoHyperlink {
											mso-style-priority: 99;
											color: inherit;
										}
								
										span.MsoHyperlinkFollowed {
											mso-style-priority: 99;
											color: inherit;
										}
									</style>
									<style media='only screen and (min-width:481px) and (max-width:599px)' type='text/css'>
										@media only screen and (min-width:481px) and (max-width:599px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
									<style media='only screen and (max-width:480px)' type='text/css'>
										@media only screen and (max-width:480px) {
											table[class=em_main_table] {
												width: 100% !important;
											}
								
											table[class=em_wrapper] {
												width: 100% !important;
											}
								
											td[class=em_hide],
											br[class=em_hide],
											span[class=em_hide] {
												display: none !important;
											}
								
											td[class=em_align_cent] {
												text-align: center !important;
											}
								
											td[class=em_height] {
												height: 20px !important;
											}
								
											td[class=em_aside] {
												padding-left: 10px !important;
												padding-right: 10px !important;
											}
								
											td[class=em_font] {
												font-size: 14px !important;
												line-height: 28px !important;
											}
								
											span[class=em_br] {
												display: block !important;
											}
								
											td[class=em_align_cent1] {
												text-align: center !important;
												padding-bottom: 10px !important;
											}
										}
									</style>
								</head>
								<body style='margin:0px; padding:0px;' bgcolor='#ffffff'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
								
								
										
										<tr>
											<td align='center' valign='top' bgcolor='#ffffff'>
												<table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='em_main_table'
													style='table-layout:fixed;'>
													
													<tr>
														<td height='40' class='em_height'>&nbsp;</td>
													</tr>
													<tr>
														<td align='center'><a href='#' target='_blank' style='text-decoration:none;'><img
																	src='https://waytwodigital.com/DigiLims/assets/web/img/digilims-logo.png'
																	width='230' height='80'
																	style='display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;'
																	border='0' alt='LoGo Here' /></a></td>
													</tr>
								
								
								
													<tr>
														<td height='1' bgcolor='#fed69c' style='font-size:0px; line-height:0px;'><img
																src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif' width='1'
																height='1' style='display:block;' border='0' alt='' /></td>
													</tr>
												
													<tr>
														<td valign='top' class='em_aside'>
															<table width='100%' border='0' cellspacing='0' cellpadding='0'>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td valign='middle' align='center'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/img1.png'
																			width='150' height='149' alt=''
																			style='display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;'
																			border='0' /></td>
																</tr>
																<tr>
																	<td height='25' class='em_height'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'>
																		<img src='https://www.sendwithus.com/assets/img/emailmonks/images/update.png'
																			width='172' height='35'
																			style='display:block;font-family:'FISHfingers', Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;'
																			border='0' alt='UPDATE' />
																	</td>
																</tr>
																<tr>
																	<td height='25' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td height='1' bgcolor='#d8e4f0' style='font-size:0px;line-height:0px;'><img
																			src='https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif'
																			width='1' height='1' alt='' style='display:block;' border='0' /></td>
																</tr>
																<tr>
																	<td height='34' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;'>
																		Your account password have been updated.</td>
																</tr>
																<tr>
																	<td height='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
																<tr>
																	<td align='center'
																		style='font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:20px; color:#feae39;'>
																		Your Updated Password is $password </td>
																</tr>
																<tr>
																	<td height='15' style='font-size:1px; line-height:1px;'>&nbsp;</td>
																</tr>
															
															</table>
														</td>
													</tr>
													
												</table>
											</td>
										</tr>
										
									</table>
								
								</body>
								
								</html>";
						$header = "From: ashutosh.slashtech@gmail.com; \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);
						if ($send) {
							$this->session->set_flashdata('success', 'Requested Successfully, Please check your Email');
							$this->load->view('external_moderator/forget_password');
						} else {
							$this->session->set_flashdata('error', 'Something Went Wrong');
							$this->load->view('external_moderator/forget_password');
						}
					} else {
						$this->session->set_flashdata('error', 'Something Went Wrong');
						$this->load->view('external_moderator/forget_password');
					}
				}
			}
		}
	}

}
