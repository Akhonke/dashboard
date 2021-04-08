<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{



	public function __construct()
	{

		parent::__construct();
		$this->token  = '431da571-d56c-42e0-b0d6-9e937b10c995';
		$this->secret  = 'f91820ca-7c1a-4935-a860-87d06cc3eee3';

		// $this->token = '83021470-bf49-4e37-a5b8-5ee1d386bf7b';
		// $this->secret = 'cb56b39d-ce6d-4029-b884-361105347518';
	}

	public function card_auth()
	{
		$this->load->view('web/payment/card_auth');
	}
	public function index()
	{
		$this->data['logo'] = $this->common->accessrecord('ourCustomerLogo', ['*'], array(), 'result');
		$query = $this->db->get('plan');
		$this->data['plan'] = $query->result();
		$this->data['page'] = 'homepage';
		$this->data['content'] = 'frontpages/homepage';
		$this->load->view('web/tamplate', $this->data);
	}



	public function product()
	{

		$this->data['page'] = 'product';
		$this->data['content'] = 'frontpages/product';
		$this->load->view('web/tamplate', $this->data);
	}

	public function support()

	{

		$this->data['page'] = 'suport';

		$this->data['content'] = 'frontpages/support';

		$this->load->view('web/tamplate', $this->data);
	}


	public function register()
	{
		$this->data['page'] = 'register';
		$this->data['content'] = 'frontpages/register';
		$this->load->view('web/tamplate', $this->data);
	}

	// public function register_data()
	// {
	// 	// print_r($_POST); die;
	// 	$vaildate = $this->form_validation->set_rules('email', 'Email', 'is_unique[organisation.email_address]');
	// 	if ($this->form_validation->run() == false) {
	// 		header('Content-Type: application/json');
	// 		echo json_encode(array('status' => 403, 'msg' => 'This Email Already Exists'));
	// 	} else {
	// 		$selectPackageName = $this->input->post('selectPackageName');
	// 		$selectPackageId = $this->input->post('selectPackageId');
	// 		$query = $this->db->where('id', $selectPackageId)->get('plan');
	// 		$plan =  $query->result();
	// 		if ($plan[0]->pricediscount == 0) {
	// 			$packagePrice = $plan[0]->price;
	// 		} else {
	// 			$packagePrice = $plan[0]->price * $plan[0]->pricediscount / 100;
	// 			$packagePrice = $plan[0]->price - $packagePrice;
	// 		}
	// 		if ($plan[0]->price != 0) {
	// 			$paid_and_free = 1;
	// 		} else {
	// 			$paid_and_free = 0;
	// 		}
	// 		$packageExpiryDate = date('d-m-Y', strtotime('+' . $plan[0]->duration));


	// 		$data = array(
	// 			'fullname' => $this->input->post('firstName'),
	// 			'surname' => $this->input->post('lastName'),
	// 			'landline_number' => $this->input->post('landineNumber'),
	// 			'mobile_number' => $this->input->post('mobileNumber'),
	// 			'email_address' => $this->input->post('email'),
	// 			'password' => sha1($this->input->post('password')),
	// 			'cardHolderName' => $this->input->post('cardHolderName'),
	// 			'cardNumber' => $this->input->post('cardNumber'),
	// 			'cardCVV' => $this->input->post('cvv'),
	// 			'cardExpiration' => $this->input->post('mm') . "/" . $this->input->post('yy'),
	// 			'packageName' => $selectPackageName,
	// 			'packageExpiryDate' => $packageExpiryDate,
	// 			'packageCreatedDate' => date("d/m/Y"),
	// 			'packagePrice' => $packagePrice,
	// 			'paid_and_free' => $paid_and_free,
	// 			'packageId' => $selectPackageId,
	// 			'organisation_name' => $this->input->post('organisation_name'),
	// 			'companyAddress' => $this->input->post('companyAddress')
	// 		);
	// 		// $this->session->set_userdata('register', $data);
	// 		$oreData = $this->common->insertData('organisation', $data);
	// 		header('Content-Type: application/json');
	// 			 echo json_encode(array('status' => 200, 'success' => true));
	// 		if ($oreData) {
	// 			$session['id'] = $oreData;
	// 			$this->session->set_userdata('organisation', $session);
	// 			header('Content-Type: application/json');
	// 			 echo json_encode(array('status' => 200, 'success' => true, 'data_id' => $oreData));
				 
	// 			//  echo json_encode($oreData);
	// 			// header('Content-Type: application/json');
	// 			// echo json_encode(array('status' => 200,'data_id' => $oreData, 'msg' => 'success'));
				
	// 		} else {
	// 			header('Content-Type: application/json');
	// 			echo json_encode(array('status' => 404, 'success' => false));
	// 			// header('Content-Type: application/json');
	// 			// echo json_encode(array('status' => 404, 'msg' => '...........'));
	// 		}
	// 	}
	// }
	public function register_data()
	{
		// print_r($_POST); die;
		$vaildate = $this->form_validation->set_rules('email', 'Email', 'is_unique[organisation.email_address]');
		if ($this->form_validation->run() == false) {
			header('Content-Type: application/json');
			echo json_encode(array('status' => 403, 'msg' => 'This Email Already Exists'));
		} else {
			// print_r($this->input->post());
			$selectPackageName = $this->input->post('selectPackageName');
			$selectPackageId = $this->input->post('selectPackageId');
			$query = $this->db->where('id', $selectPackageId)->get('plan');
			$plan =  $query->result();
			// print_r($plan);
			if ($plan[0]->pricediscount == 0) {
				$packagePrice = $plan[0]->price;

			} else {
				$packagePrice = $plan[0]->price * $plan[0]->pricediscount / 100;
				$packagePrice = $plan[0]->price - $packagePrice;
			}
			if ($plan[0]->price != 0) {
				$paid_and_free = 1;
			} else {
				$paid_and_free = 0;
			}
			$packageExpiryDate = date('d-m-Y', strtotime('+' . $plan[0]->duration));


			$data = array(
				'fullname' => $this->input->post('firstName'),
				'surname' => $this->input->post('lastName'),
				'landline_number' => $this->input->post('landineNumber'),
				'mobile_number' => $this->input->post('mobileNumber'),
				'email_address' => $this->input->post('email'),
				'password' => sha1($this->input->post('password')),
				'cardHolderName' => $this->input->post('cardHolderName'),
				'cardNumber' => $this->input->post('cardNumber'),
				'cardCVV' => $this->input->post('cvv'),
				'cardExpiration' => $this->input->post('mm') . "/" . $this->input->post('yy'),
				'packageName' => $selectPackageName,
				'packageExpiryDate' => $packageExpiryDate,
				'packageCreatedDate' => date("d/m/Y"),
				'packagePrice' => $packagePrice,
				'paid_and_free' => $paid_and_free,
				'packageId' => $selectPackageId,
				'organisation_name' => $this->input->post('organisation_name'),
				'companyAddress' => $this->input->post('companyAddress')
			);
			$this->session->set_userdata('register', $data);
			if ($oreData = $this->common->insertData('organisation', $data)) {
				$session['id'] = $oreData;
				$this->session->set_userdata('organisation', $session);
				header('Content-Type: application/json');
				echo json_encode(array('status' => 200, 'success' => true,'data_id' => $oreData));
			} 
			else {
				header('Content-Type: application/json');
				echo json_encode(array('status' => 404, 'success' => 'flash'));
			}
		}
	}


	public function success_payment_page()
	{
		$this->data['page'] = 'register';
		$this->data['content'] = 'frontpages/success_payment_page';
		$this->load->view('web/tamplate', $this->data);
	}
	private function send($body = null)
	{
		if ($body != null) {
			$body = json_encode($body);
		}
		// print_r($body); die;
		$endpoint = "https://developer.paygenius.co.za/pg/api/v2/util/validate";
		$payload = "$body";
		$token = $this->token;
		// echo $token;
		$signature = hash_hmac('sha256', trim($endpoint . "\n" . $payload), $this->secret);;
		// $token = "b3394743-4c5b-496f-a0e6-06580ba12b1e";

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $payload,
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"content-type: application/json",
				"x-signature: " . $signature,
				"x-token: " . $token
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$res = json_decode($response);
		if (!empty($res) && $res->success == 1) {
			return $this->createPayment($body);
		} else {
			// print_r('send step');
			// print_r($response);
			header('Content-Type: application/json');
			echo json_encode(array('status' => 404, 'success' => 'flash'));
		}
	}


	private function  createPayment($body)
	{
		// print_r($body); die;
		$endpoint = "https://developer.paygenius.co.za/pg/api/v2/payment/create";
		$payload = "$body";
		$token = $this->token;
		$signature = hash_hmac('sha256', trim($endpoint . "\n" . $payload), $this->secret);;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $payload,
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"content-type: application/json",
				"x-signature: " . $signature,
				"x-token: " . $token
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$res = json_decode($response);
		if ($res->success == 1) {
			// return $this->confirmSecure($res);
			// echo "<pre>";
			// print_r($res);   
			// $this->load->view('web/frontpages/test', $res);
			$this->data['res'] = $res;
			$this->data['page'] = 'homepage';
			$this->data['content'] = 'frontpages/test';
			$this->load->view('web/tamplate', $this->data);
			// header('Content-Type: application/json');
			// 	echo json_encode(array('status' => 200, 'success' => true));
		} else {
			// print_r('create payment step');
			// print_r($response);
			header('Content-Type: application/json');
			echo json_encode(array('status' => 404, 'success' => 'flash'));
		}
	}
	public function login()
	{
		$data = $_POST;
		$data['password'] = sha1($_POST['password']);
		if ($data = $this->common->accessrecord('organisation', [], $data, 'row')) {
			if ($data->status != 1) {
				$session['id'] = $data->id;
				$this->session->set_userdata('organisation', $session);
				header('Content-Type: application/json');
				echo json_encode(array('status' => 200, 'success' => true));
			} else {
				header('Content-Type: application/json');
				echo json_encode(array('status' => 404, 'msg' => 'Please Contact with Admin'));
			}
		} else {

			header('Content-Type: application/json');
			echo json_encode(array('status' => 404, 'msg' => 'Invalid login creadential'));
		}
	}

	public function contactus()
	{
		$name = $this->input->post('NameContact_us');
		$email = $this->input->post('EmailContact_us');
		$MessageContact_us = $this->input->post('MessageContact_us');


		$data = array(
			'name' => $this->input->post('NameContact_us'),
			'email' => $this->input->post('EmailContact_us'),
			'message' => $this->input->post('MessageContact_us'),
		);

						$to = "support@digilims.com";
						$subject = "Enquirie Message";
						$message = "<!DOCTYPE html PUBLIC >
						<html xmlns='http://www.w3.org/1999/xhtml' 
						xmlns:v='urn:schemas-microsoft-com:vml'
						xmlns:o='urn:schemas-microsoft-com:office:office'>
						<head>
						  <!--[if gte mso 9]><xml>
						  <o:OfficeDocumentSettings>
							<o:AllowPNG/>
							<o:PixelsPerInch>96</o:PixelsPerInch>
						  </o:OfficeDocumentSettings>
						  </xml><![endif]-->
						  <!-- fix outlook zooming on 120 DPI windows devices -->
						  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
						  <meta name='viewport' content='width=device-width, initial-scale=1'> <!-- So that mobile will display zoomed in -->
						  <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- enable media queries for windows phone 8 -->
						  <meta name='format-detection' content='date=no'> <!-- disable auto date linking in iOS 7-9 -->
						  <meta name='format-detection' content='telephone=no'> <!-- disable auto telephone linking in iOS 7-9 -->
						  <title>Single Column</title>
						  
						  <style type='text/css'>
						body {
						  margin: 0;
						  padding: 0;
						  -ms-text-size-adjust: 100%;
						  -webkit-text-size-adjust: 100%;
						}

						table {
						  border-spacing: 0;
						}

						table td {
						  border-collapse: collapse;
						}

						.ExternalClass {
						  width: 100%;
						}

						.ExternalClass,
						.ExternalClass p,
						.ExternalClass span,
						.ExternalClass font,
						.ExternalClass td,
						.ExternalClass div {
						  line-height: 100%;
						}

						.ReadMsgBody {
						  width: 100%;
						  background-color: #ebebeb;
						}

						table {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						img {
						  -ms-interpolation-mode: bicubic;
						}

						.yshortcuts a {
						  border-bottom: none !important;
						}

						@media screen and (max-width: 599px) {
						  .force-row,
						  .container {
							width: 100% !important;
							max-width: 100% !important;
						  }
						}
						@media screen and (max-width: 400px) {
						  .container-padding {
							padding-left: 12px !important;
							padding-right: 12px !important;
						  }
						}
						.ios-footer a {
						  color: #aaaaaa !important;
						  text-decoration: underline;
						}
						a[href^='x-apple-data-detectors:'],
						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}
						</style>
						</head>

						<body style='margin:0; padding:0;' bgcolor='#F0F0F0' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>

						<!-- 100% background wrapper (grey background) -->
						<table border='0' width='100%' height='100%' cellpadding='0' cellspacing='0' bgcolor='#F0F0F0'>
						  <tr>
							<td align='center' valign='top' bgcolor='#F0F0F0' style='background-color: #F0F0F0;'>

							  <br>

							  <!-- 600px container (white background) -->
							  <table border='0' width='600' cellpadding='0' cellspacing='0' class='container' style='width:600px;max-width:600px'>
								
								<tr>
								  <td class='container-padding content' align='left' style='padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff'>
									<br>

						<div class='title' style='font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550'>

						<img src='https://digilims.com/assets/web/img/digilims-logo.png' style='width:100%; height:auto;' width='100%' height='auto'/>
						<br />
						<br />
						Conact Person Name ".$name.",
						<br>Conact Person Email ".$email.",</br>
						<br>Conact Person message ".$MessageContact_us.",</br>
						
						
						<br> <br></div></div>
						
								  </td>
								</tr>
								<tr 
								  <td class='container-padding footer-text' align='left' style='font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px'>
								  

								  </td>
								</tr>
							  </table>
						<!--/600px container -->


							</td>
						  </tr>
						</table>
						<!--/100% background wrapper-->

						</body>
						</html>";
						$header = "From: forgetpassword@wantpg.com \r\n";
						$header .= "Content-type: text/html\r\n";

						$send = mail($to, $subject, $message, $header);


		if ($this->common->insertData('contactus', $data)) {
			header('Content-Type: application/json');
			echo json_encode(array('status' => 200, 'success' => true));
		} else {
			header('Content-Type: application/json');
			echo json_encode(array('status' => 404, 'success' => false));
		}
	}

	public function pricing()
	{

		$this->data['page'] = 'register';

		$this->data['content'] = 'frontpages/pricing';

		$this->load->view('web/tamplate', $this->data);
	}

	public function about_us()

	{

		$this->data['page'] = 'register';

		$this->data['content'] = 'frontpages/about_us';

		$this->load->view('web/tamplate', $this->data);
	}

	public function faq()

	{

		$this->data['page'] = 'faq';

		$this->data['content'] = 'frontpages/faq';

		$this->load->view('web/tamplate', $this->data);
	}

	public function contact_support()

	{

		$this->data['page'] = 'contact_support';

		$this->data['content'] = 'frontpages/contact_support';

		$this->load->view('web/tamplate', $this->data);
	}

	public function career()

	{

		$this->data['page'] = 'register';

		$this->data['content'] = 'frontpages/career';

		$this->load->view('web/tamplate', $this->data);
	}

	public function product_services()

	{

		$this->data['page'] = 'register';

		$this->data['content'] = 'frontpages/product_services';

		$this->load->view('web/tamplate', $this->data);
	}
}
