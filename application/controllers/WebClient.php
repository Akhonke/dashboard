<?php

defined('BASEPATH') or exit('No direct script access allowed');

// namespace PayGenius;



class WebClient extends CI_Controller

{

	// private $endpointPrefix;

	// private $token;

	// private $secret;



	function __construct()

	{

		$this->endpointPrefix = '';

		$this->token = '431da571-d56c-42e0-b0d6-9e937b10c995';

		$this->secret = 'f91820ca-7c1a-4935-a860-87d06cc3eee3';
	}



	public function pay()
	{



		$body = array(

			'creditCard' => array(

				"number" => 4245180013587016,

				"cardHolder" => 'sachin',

				"expiryYear" => 2022,

				"expiryMonth" => 04,

				"type" => 'visa',

				"cvv" => 384

			),



			'transaction' => array(

				'reference' => "Invoice #1871",

				'currency' => 'ZAR',

				'amount' => 10,

				'email' => 'slash.kapil@gmail.com'



			),

			'threeDSecure' => false,

		);

		$endpoint = "https://paygenius.co.za/pg/api/v2/util/validate";

		$payload = json_encode($body);

		// 		print_r($payload);die;

		$signature = hash_hmac('sha256', trim($endpoint . "\n" . $payload), 'cb56b39d-ce6d-4029-b884-361105347518');

		$token = "83021470-bf49-4e37-a5b8-5ee1d386bf7b";



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



		echo $response;
	}



	public function create()

	{

		$data = array();

		$data['name'] = $_POST['name'];

		$data['surname'] = $_POST['surname'];

		$data['amount'] = $_POST['amount'];

		$data['currency'] = $_POST['currency'];

		$data['email'] = $_POST['email'];

		// $data['reference'] = $_POST['reference'];

		// $data['page'] = $_POST['page'];

		// $data['successUrl'] = $_POST['successurl'];

		// $data['errorUrl'] = $_POST['errorurl'];

		$data['number'] = $_POST['number'];

		$data['cardHolder'] = $_POST['cardHolder'];

		$data['expiryYear'] = $_POST['expiryYear'];

		$data['expiryMonth'] = $_POST['expiryMonth'];

		$data['type'] = $_POST['type'];

		$data['cvv'] = $_POST['cvv'];



		$this->send(

			'redirect/create',

			array(

				'creditCard' => array(

					"number" => $data['number'],

					"cardHolder" => $data['cardHolder'],

					"expiryYear" => $data['expiryYear'],

					"expiryMonth" => $data['expiryMonth'],

					"type" => $data['type'],

					"cvv" => $data['cvv']

				),

				'transaction' => array(

					'reference' => "Invoice #1871",

					'currency' => $data['currency'],

					'amount' => $data['amount']

				),

				'threeDSecure' => false,
			)
		);
	}







	private function send($url, $body = null)

	{

		if ($body != null) {

			$body = json_encode($body);
		}

		// print_r($body); die;

		$endpoint = "https://www.paygenius.co.za/pg/api/v2/util/validate";

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

			$this->createPayment('redirect/create', $body);
		} else {

			print_r('send step');

			print_r($response);
		}
	}



	private function createPayment($url, $body)

	{

		// print_r($body); die;

		$endpoint = "https://www.paygenius.co.za/pg/api/v2/payment/create";

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

			$this->confirmSecure($res);

			// print_r($res);

		} else {

			print_r('create payment step');

			print_r($response);
		}
	}



	private function confirmSecure($respns)

	{





		$endpoint = "https://www.paygenius.co.za/pg/api/v2/payment/$respns->reference/confirm";

		$as = $respns->threeDSecure->paReq;

		$pareq = array(

			"paRes" => "$as"

		);

		// print_r(json_encode($pareq)); die;

		$paylod = json_encode($pareq);

		$payload = "$paylod";

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

			print_r($res);
		} else {

			print_r('confirm secure step');



			print_r($response);
		}
	}
}
