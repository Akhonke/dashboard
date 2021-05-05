<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

	public function __construct()

	{

		$this->load->database();

		//$otherdb = $this->load->database('sudheer', TRUE);

	}
	function send_message ( $post_body, $url, $username, $password) {
  $ch = curl_init( );
  $headers = array(
  'Content-Type:application/json',
  'Authorization:Basic '. base64_encode("$username:$password")
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_POST, 1 );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
  // Allow cUrl functions 20 seconds to execute
  curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
  // Wait 10 seconds while trying to connect
  curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 40 );
  $output = array();
  $output['server_response'] = curl_exec( $ch );
  $curl_info = curl_getinfo( $ch );
  $output['http_status'] = $curl_info[ 'http_code' ];
  $output['error'] = curl_error($ch);
  curl_close( $ch );
  return $output;
}
	function EmailSend($email,$html,$subject){

        $this->load->library('email');
        $this->email->from('support@myinformation.in', 'Interview');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->set_mailtype("html");
        $this->email->message($html);
        $this->email->send();

     }

   public function send_email_to_admin($email,$message){
       $html='<html>

<head></head>

<body>
	<table bgcolor="#fff" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%"
		style="font-family:Helvetica,Arial,sans-serif;     ">
		<tbody>
			<tr>
				<td align="center">
					<table cellpadding="0" cellspacing="0" border="0" width="600" style="box-shadow: 0 0 1px #ccc;">
						<tbody>
							<tr>
								<td align="center" bgcolor="#fff" width="560" style="padding: 10px;background: #f7f7f7;"
									colspan="3">
									<a href="#"><img alt="LEARNING MANEGMENT
" src="'.base_url('assets/images/logo.jpeg').'" class="CToWUd"
											width="100px"></a>
								</td>
							</tr>
							<tr>
								<td bgcolor="#fff" width="560" style="padding:40px;font-size:13px;line-height:1.4">
									<table cellpadding="0" cellspacing="0" border="0" width="100%">
										<tbody>
											<tr>
												<td style="font-size:13px;line-height:1.4">
													<p><b>Dear Admin,</b></p>
													<p> <b>Email -</b> '.$email.'</p>
													<p><b>Date -</b>'.date('d-M-Y').' </p>
													<p>'.$message.'</p>
													<p>Thanking you,</p>
													<p>Click on below link -</p>
													<p><a href='.site_url().'>'.site_url().'</a></p>
													</td>
											</tr>
											<tr>
												<td style="background:#f3f3f1" height="1"></td>
											</tr>
											<tr>
												<td height="20"></td>
											</tr>
										</tbody>
									</table>

								</td>
							</tr>
							<tr height="40">
								<td align="center" bgcolor="#fff" width="560"
									style="padding: 10px;background-image: linear-gradient(to left, #f98441, #d90162, #c60087);">
									<h4 align="center" style="color:#fff;margin: 0">LEARNING MANEGMENT
</h4>
									<hr>

									<p style="background: #fff; padding:10px;"><a href="'.base_url().'">About us</a> &nbsp; &nbsp; <a
											href="'.base_url().'">Contact us</a> &nbsp; &nbsp; <a href="'.base_url().'">refer-end-earn</a> &nbsp; &nbsp;
										<a href="'.base_url().'">www.demo.com</a></p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>';
return $html;
	}


	// Send message to all students in class
	public function email_learner_in_class($class_id, $subject, $message)
	{

	    $this->load->library('email');

	    $class_name   = $this->common->accessrecord('class_name', [], ['id' => $class_id], 'row');
	    $learner_list = $this->common->accessrecord('learner', [], ['classname' => $class_name->class_name], 'result');

	    foreach ($learner_list as $learner) {

	        $this->email->from('info@digilims.com','LEARNING MANAGEMENT');

	        $this->email->to($learner->email);

	        $this->email->subject($subject);

	        $this->email->set_mailtype("html");

	        $this->email->message($message);

	        $this->email->send();

	        echo $this->email->print_debugger();

	    }

	}

	// Send message to all assessor in an organisation for a given assessment
	public function email_assessor_from_assessment($assessment_id, $subject, $message)
	{

	    $this->load->library('email');

	    $assessment    = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
	    $class         = $this->common->accessrecord('class_name', [], ['id' => $assessment->class_id], 'row');
	    $assessor_list = $this->common->accessrecord('assessor', [], ['organization' => $class->organization], 'result');


	    foreach ($assessor_list as $assessor) {


	        $this->email->from('info@digilims.com','LEARNING MANAGEMENT');

	        $this->email->to($assessor->email);

	        $this->email->subject($subject);

	        $this->email->set_mailtype("html");

	        $this->email->message($message);

	        $this->email->send();

	        $email =  $this->email->print_debugger();

	    }

	}


	// Send message to all assessor in an organisation for a given assessment
	public function email_facilitator_from_assessment($assessment_id, $subject, $message)
	{

	    $this->load->library('email');

	    $assessment    = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
	    $class         = $this->common->accessrecord('class_name', [], ['id' => $assessment->class_id], 'row');
	    $facilitator   = $this->common->accessrecord('facilitator', [], ['id' => $class->facilitator_id], 'row');

        $this->email->from('info@digilims.com','LEARNING MANAGEMENT');
        $this->email->to($facilitator->email);
        $this->email->subject($subject);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->send();
        $email =  $this->email->print_debugger();


	}

}