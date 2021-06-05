	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class Traningprovider extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (empty($this->session->userdata['admin']['trainer_id'])) {
				redirect("Traningprovider");
			} else {
				// print_r($this->session->userdata['admin']['trainer_id']);die;
				$this->data['trainingprovider']  = $this->common->accessrecord('trainer', [], ['id' => $this->session->userdata['admin']['trainer_id']], 'row');
				$this->data['projectmanagerid']  = $this->data['trainingprovider']->project_id;
				$this->data['organizationid']  = $this->data['trainingprovider']->organization;
			}
		}

		public function info()
		{
			phpinfo();
		}

		public function dashboard()
		{
			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];

				$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

				$company_name = $trainer->company_name;
			} else {

				$company_name = '';
			}

			$this->data['learner_'] = $this->common->accessrecord('learner', [], ['trainer_id' => $_SESSION['admin']['trainer_id'], 'learner_accepted_training' => 'yes', 'drop_out' => 0], 'result');
			$this->data['learner'] = count($this->data['learner_']);

			$this->data['learnership_'] = $this->common->accessrecord('learnership', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['learnership'] = count($this->data['learnership_']);

			$this->data['sublearnership_'] = $this->common->accessrecord('learnership_sub_type', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['sublearnership'] = count($this->data['sublearnership_']);

			$this->data['facilitator_'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['facilitator'] = count($this->data['facilitator_']);

			$this->data['assessor_'] = $this->common->accessrecord('assessor', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['assessor'] = count($this->data['assessor_']);

			$this->data['internal_moderator_'] = $this->common->accessrecord('moderator', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['internal_moderator'] = count($this->data['internal_moderator_']);

			$this->data['external_moderator_'] = $this->common->accessrecord('external_moderator', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['external_moderator'] = count($this->data['external_moderator_']);

			$this->data['class_'] = $this->common->accessrecord('class_name', [], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['class'] = count($this->data['class_']);

			$this->data['marksheet_'] = $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name], 'result');
			$this->data['marksheet'] = count($this->data['marksheet_']);

			if (isset($_SESSION['admin']['trainer_id'])) {
				$trainer = $this->common->accessrecord('trainer', [], ['id' =>  $_SESSION['admin']['trainer_id']], 'row');
				$company_name = $trainer->company_name;
			} else {
				$company_name = '';
			}
			$this->data['attendance_'] = $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');
			$this->data['attendance'] = count($this->data['attendance_']);

			$this->data['sub_user_'] = $this->common->accessrecord('sub_user', [], ['created_by_id' => $_SESSION['admin']['trainer_id'], 'type' => 'Provider'], 'result');
			$this->data['sub_user'] = count($this->data['sub_user_']);

			$this->data['quarterly_progress_report_'] = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['quarterly_progress_report'] = count($this->data['quarterly_progress_report_']);

			$this->data['attendance_'] = $this->common->accessrecord('learner_absent', [], ['trainer' => $_SESSION['admin']['trainer_id']], 'result_array');
			$this->data['attendance'] = count($this->data['attendance_']);



			$this->data['page'] = 'dashboard';
			$this->data['content'] = 'pages/dashboard/dashboard';
			$this->load->view('provider/tamplate', $this->data);
		}


		// ****************************Message*******************************************************************************
		public function sendBulkMessage()
		{
			if (empty($_POST)) {
				$this->data['page'] = 'tpbulk_message';
				$this->data['content'] = 'pages/bulk/bulk_message';
				$this->load->view('provider/tamplate', $this->data);
			} else {
				if (empty($_POST['receiver'])) {
					$this->session->set_flashdata('error', "Please select your receivers");
					redirect('provider-sendBulkMassage');
				} else {
					// []
					$username = 'TutuMolomo123';
					$password = 'NosiphoMolomo1974';

					$messages = array(
						'to' => $_POST['receiver'],
						'body' => $_POST['message']
					);
					// print_r(json_encode($messages)); die();

					$result = $this->send_message(json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password);

					if ($result['http_status'] != 201) {
						$sendmsg =  "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status " . $result['http_status'] . "; Response was " . $result['server_response']);
						$this->session->set_flashdata('error', "$sendmsg");
						redirect('provider-sendBulkMassage');
					} else {
						$this->session->set_flashdata('success', "Messages sent Successfully");
						redirect('provider-sendBulkMassage');
					}
				}
			}
		}

		function send_message($post_body, $url, $username, $password)
		{
			$ch = curl_init();
			$headers = array(
				'Content-Type:application/json',
				'Authorization:Basic ' . base64_encode("$username:$password")
			);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
			// Allow cUrl functions 20 seconds to execute
			curl_setopt($ch, CURLOPT_TIMEOUT, 20);
			// Wait 10 seconds while trying to connect
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			$output = array();
			$output['server_response'] = curl_exec($ch);
			$curl_info = curl_getinfo($ch);
			$output['http_status'] = $curl_info['http_code'];
			$output['error'] = curl_error($ch);
			curl_close($ch);
			return $output;
		}

		public function sendMassage()
		{
			if (empty($_POST)) {
				$this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'trainer'], 'result');
				// $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
				$this->data['page'] = 'tpsend_massage';
				$this->data['content'] = 'pages/massage/send_massage';
				$this->load->view('provider/tamplate', $this->data);
			} else {

				$receiverarr = $_POST['receiver'];
				$receiver = implode(",", $receiverarr);

				if (!empty($_FILES['attachment']['name'])) {

					$attachment = $this->singlefileupload('attachment', './uploads/messageattachment/', 'gif|jpg|png|pdf|doc|docx');
				} else {
					$attachment = "";
				}
				$data = array(
					'sender_id' => $_SESSION['admin']['trainer_id'],
					'sender_type' => 'trainer',
					'receiver_id' => $receiver,
					'receiver_type' => $_POST['receiver_type'],
					'subject' => $_POST['subject'],
					'message' => $_POST['message'],
					'attachment' => $attachment
				);
				$datau = $this->common->insertData('message', $data);
				$this->session->set_flashdata('success', 'Message Sent Successfully');
				redirect('provider-sendMassage');
			}
		}
		public function get_receiver()
		{
			$type = $this->input->post('value');
			$data = array();
			if ($type == 'projectmanager') {
				$rece = $this->common->accessrecord('project_manager', ['*'], ['id' => $this->data['projectmanagerid']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['id'] = $recev->id;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} elseif ($type == 'organization') {
				$rece = $this->common->accessrecord('organisation', ['*'], ['id' => $this->data['organizationid']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['id'] = $recev->id;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} elseif ($type == 'facilitator') {
				$rece = $this->common->accessrecord('facilitator', ['*'], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['id'] = $recev->id;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} else {
				$data = [];
			}
			echo json_encode($data);
		}

// 		public function get_module_uploads()
// 		{
//
// 		    $module_id = $this->input->post('value');
//
// 		    $module_uploads = $this->common->accessrecord('class_module', ['*'], ['id' => $module_id], 'row');
// 		    $class = $this->common->accessrecord('class_name', ['*'], ['id' => $module_uploads->class_id], 'row');
//
// 		    $markup = '<h6>Assessment Material</h6>';
// 		    $markup .= '<p>The following material is used for this assessment.</p>';
//
//  		    $markup .= '<p><label class="form-control-label">Learner Guide : </span></label>';
//  		    $markup .= '<a href="/uploads/class/learner_guide/' . $class->upload_learner_guide . '" target="_blank">Download the Learner Guide - ' . $class->upload_learner_guide_name . '</a></p>';
//
// 		    $markup .= '<p><label class="form-control-label">Learner Workbook : </span></label>';
// 		    $markup .= '<a href="/uploads/class/learner_workbook/' . $module_uploads->upload_workbook . '" target="_blank">Download the Learner Workbook - ' . $module_uploads->upload_workbook_name . '</a></p>';
//
// 		    $markup .= '<p><label class="form-control-label">Learner POE : </span></label>';
// 		    $markup .= '<a href="/uploads/class/learner_poe/' . $module_uploads->upload_poe . '" target="_blank">Download the Learner POE - ' . $module_uploads->upload_poe_name . '</a></p>';
//
// 		    $markup .= '<p><label class="form-control-label">Facilitator Guide : </span></label>';
// 		    $markup .= '<a href="/uploads/class/facilitator_guide/' . $module_uploads->upload_facilitator_guide . '" target="_blank">Download the Facilitator Guide - ' . $module_uploads->upload_facilitator_guide_name . '</a></p>';
//
// 		    echo $markup;
//
// 		}



		public function get_receiver_contact()
		{
			$type = $this->input->post('value');
			$data = array();
			if ($type == 'projectmanager') {
				$rece = $this->common->accessrecord('project_manager', ['*'], ['id' => $this->data['projectmanagerid']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['mobile_number'] = $recev->mobile_number;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} elseif ($type == 'organization') {
				$rece = $this->common->accessrecord('organisation', ['*'], ['id' => $this->data['organizationid']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['mobile_number'] = $recev->mobile_number;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} elseif ($type == 'facilitator') {
				$rece = $this->common->accessrecord('facilitator', ['*'], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['mobile_number'] = $recev->mobile;
					$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
				}
			} elseif ($type == 'learner') {
				$rece = $this->common->accessrecord('learner', ['*'], ['trainer_id' => $_SESSION['admin']['trainer_id']], 'result');

				foreach ($rece as $key => $recev) {
					$data[$key]['mobile_number'] = $recev->mobile;
					$data[$key]['name'] = $recev->first_name . " " . $recev->surname;
				}
			} else {
				$data = [];
			}
			echo json_encode($data);
		}

		public function inbox()
		{
			$this->data[] = array();
			$rcvd = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'trainer'], 'result');
			foreach ($rcvd as $rcv => $received) {
				$receivers =  explode(',', $received->receiver_id);
				if (in_array($_SESSION['admin']['trainer_id'], $receivers)) {
					$this->data['received'][$rcv] = $received;
				}
			}

			$this->data['page'] = 'received_massage';
			$this->data['content'] = 'pages/massage/received_messages';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function sentbox()
		{
			$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'trainer', 'sender_id' => $_SESSION['admin']['trainer_id']], 'result');
			$this->data['page'] = 'sent_massage';
			$this->data['content'] = 'pages/massage/sent_massage';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function sentboxview($id)
		{
			$this->data['viewsent'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
			$this->data['page'] = 'sentboxview';
			$this->data['content'] = 'pages/massage/sentboxview';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function inboxview($id)
		{
			$this->data['viewreceived'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
			$this->data['page'] = 'inboxview';
			$this->data['content'] = 'pages/massage/inboxview';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function trash()
		{
			$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization', 'sender_id' => $_SESSION['organisation']['id']], 'result');
			$this->data['page'] = 'sent_massage';
			$this->data['content'] = 'pages/massage/sent_massage';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function important()
		{
			$this->data['important'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization'], 'result');
			$this->data['page'] = 'important_massage';
			$this->data['content'] = 'pages/massage/important';
			$this->load->view('MyOrganization/tamplate', $this->data);
		}
		// ****************************LOCATION******************************************************************************

		public function getdestrict()
		{
			$data = $_POST;
			$DistrictData = $this->common->get_District_province($data);
			if (!empty($DistrictData)) {
				$District = $DistrictData;
			} else {
				$District = array('error' => 'Destrict list not available in this province');
			}
			echo json_encode($District);
		}

		public function getregion()
		{
			$District = $this->common->one_District($this->input->post('value'));
			$district_id = $District->name;
			$regiondata = $this->common->get_region_District($district_id);
			if (!empty($regiondata)) {
				$region = $regiondata;
			} else {
				$region = array('error' => 'Region list not available in this destrict');
			}
			echo json_encode($region);
		}

		public function getcity()
		{
			$District = $this->common->one_District($this->input->post('value'));
			$district_id = $District->name;
			$citydata = $this->common->get_district_city($district_id);
			if (!empty($citydata)) {
				$city_data = $citydata;
			} else {
				$city_data = array('error' => 'City list not available in this region');
			}
			echo json_encode($city_data);
		}

		public function getmunicipality()
		{
			$city = $this->common->one_city($this->input->post('value'));
			$city_id = $city->city;
			$municipalitydata = $this->common->get_city_municipality($city_id);
			if (!empty($municipalitydata)) {
				$mun_data = $municipalitydata;
			} else {
				$mun_data = array('error' => 'Municipality list not available in this City');
			}
			echo json_encode($mun_data);
		}
		// ****************************LEARNER*******************************************************************************

		public function createLearner()
		{
			$this->data['page'] = 'createLearner';
			$this->data['content'] = 'pages/learner/create_learner';
			$id = 0;
			if (!empty($_GET['id'])) {
				$id = $_GET['id'];
				$this->data['record'] = $this->common->one_learner($id);
			}
			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`created_by`=$trainer_id";

			$this->data['learnershipSubType'] = $this->common->learnershipSubType($trainer_id);

			if ($_POST) {

				$data = $_POST;

				$district = ($this->input->post('district')) ? $this->input->post('district') : '';

				$District = ($district) ? $this->common->one_District($district) : '';

				$data['district'] = ($District) ? $District->name : '';

				$region = ($this->input->post('region')) ? $this->input->post('region') : '';

				$regiondata = ($region) ? $this->common->one_region($region) : '';

				$data['region'] = ($regiondata) ? $regiondata->region : '';

				$city = ($this->input->post('city')) ? $this->input->post('city') : '';

				$citydata = ($city) ? $this->common->one_city($city) : '';

				$data['city'] = ($citydata) ? $citydata->city : '';

				$data['municipality'] = ($this->input->post('municipality')) ? $this->input->post('municipality') : '';

				$data['organization'] = $this->data['organizationid'];

				$data['project_manager'] = $this->data['projectmanagerid'];

				$data['trainer_id'] = $this->session->userdata['admin']['trainer_id'];

				$data['enrollment_date'] = ($this->input->post('enrollment_date')) ? $this->input->post('enrollment_date') : '';

				$data['completion_date'] = ($this->input->post('completion_date')) ? $this->input->post('completion_date') : '';

				$data['tax_reference'] = ($this->input->post('tax_reference')) ? $this->input->post('tax_reference') : '';

				if ($id != 0) {

					if (!empty($_FILES['upload_proof_of_bankings']['name'])) {

						$path = './uploads/learner/upload_proof_of_banking/';

						$images = $this->fileupload('upload_proof_of_bankings', $path, '*');

						$data['upload_proof_of_banking'] = $images;
					} else {

						$upload_proof_of_banking = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['upload_proof_of_banking'] = $upload_proof_of_banking->upload_proof_of_banking;
					}

					if (!empty($_FILES['id_copy']['name'])) {

						$path = './uploads/learner/id_copy/';

						$images = $this->fileupload('id_copy', $path);

						$data['id_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['id_copy'] = $learner->id_copy;
					}

					if (!empty($_FILES['certificate_copy']['name'])) {

						$path = './uploads/learner/certificate_copy/';

						$images = $this->fileupload('certificate_copy', $path);

						$data['certificate_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['certificate_copy'] = $learner->certificate_copy;
					}

					if (!empty($_FILES['contract_copy']['name'])) {

						$path = './uploads/learner/contract_copy/';

						$images = $this->fileupload('contract_copy', $path);

						$data['contract_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['contract_copy'] = $learner->contract_copy;
					}

					$password = $_POST['password'];

					if ($learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row')) {

						$old_password = $learner->password;

						if ($old_password == $password) {

							$data['password'] = $old_password;
						} else {

							$data['password'] = sha1($_POST['password']);
						}
					} else {

						$data['password'] = sha1($_POST['password']);
					}

					$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

					$data['trining_provider'] = $trainer->company_name;



					$this->common->update_learner($id, $data);

					$this->session->set_flashdata('success', 'Trining updated Succesfully');



					redirect('learner-list');
				} else {

					if (!empty($_FILES['upload_proof_of_banking']['name'])) {

						$path = './uploads/learner/upload_proof_of_banking/';

						$images = $this->fileupload('upload_proof_of_banking', $path, '*');

						$data['upload_proof_of_banking'] = $images;
					}

					if (!empty($_FILES['id_copy']['name'])) {

						$path = './uploads/learner/id_copy/';

						$images = $this->fileupload('id_copy', $path);

						$data['id_copy'] = $images;
					} else {

						$data['id_copy'] = "";
					}

					if (!empty($_FILES['certificate_copy']['name'])) {

						$path = './uploads/learner/certificate_copy/';

						$images = $this->fileupload('certificate_copy', $path);

						$data['certificate_copy'] = $images;
					} else {

						$data['certificate_copy'] = "";
					}

					if (!empty($_FILES['contract_copy']['name'])) {

						$path = './uploads/learner/contract_copy/';

						$images = $this->fileupload('contract_copy', $path);

						$data['contract_copy'] = $images;
					} else {

						$data['contract_copy'] = "";
					}

					if (isset($_SESSION['admin']['trainer_id'])) {

						$trainer_id = $_SESSION['admin']['trainer_id'];
					}

					$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

					$data['trining_provider'] = $trainer->company_name;

					$data['password'] = sha1($_POST['password']);

					// echo '<pre>';print_r($data);die;

					$training = $this->common->save_learner($data);
					// print_r($training);die;

					$this->session->set_flashdata('success', 'Add Learner successful');

					redirect('learner-list');
				}

				//}

			}
			// print_r($this->data['projectmanagerid']); die;
			$this->data['employer'] = $this->common->accessrecord('employer', [], ['project_manager' => $this->data['projectmanagerid']], 'result');

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();


			$this->data['training'] = $this->common->get_training();

			$this->load->view('provider/tamplate', $this->data);
		}

		public function learnerList()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$id = $_SESSION['admin']['trainer_id'];
			}

			$trainer  = $this->common->accessrecord('trainer', [], array('id' => $id), 'row');

			$trainer_nm = $trainer->id;

			$this->data['learner']  = $this->common->accessrecord('learner', [], array('trainer_id' => $trainer_nm, 'learner_accepted_training' => 'yes', 'drop_out' => 0), 'result');

			$this->data['page'] = 'providerlearnerList';
			$this->data['pagename'] = 'Learners List';

			$this->data['content'] = 'pages/learner/learner_list';

			$this->load->view('provider/tamplate', $this->data);
		}
		// *************************FACILITATOR******************************************************************************

		public function createfacilitator()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$condition = "`id`=$id";

				$this->data['record'] = $this->common->accessrecord('facilitator', [], $condition, 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					$array = [];

					if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

						foreach ($_POST['acreditations_image'] as  $value_one) {

							$exp = explode(',', $value_one);

							$array_two[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);

							$image_id = $exp[0];
						}

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/facilitator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								$increment_id = '';

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$increment_id = $image_id + 1 + $key;

									$array_one[] = array(
										'id' => $increment_id,

										'acreditations' => $_POST['acreditations'][$increment_id],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = array_merge($array_two, $array_one);
					} elseif (!empty($_POST['acreditations_image'])) {

						foreach ($_POST['acreditations_image'] as $key => $value) {

							$exp = explode(',', $value);

							$array[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);
						}

						$acreditations_files = $array;
					} else {

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/facilitator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$array[] = array(
										'id' => $key,

										'acreditations' => $_POST['acreditations'][$key],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = $array;
					}

					if (empty($acreditations_files)) {

						$acreditations_file = '';
					} else {

						$acreditations_file = serialize($acreditations_files);
					}

					$password = $_POST['password'];

					if ($facilitator = $this->common->accessrecord('facilitator', [], ['id' => $id], 'row')) {

						$old_password = $facilitator->password;

						if ($old_password == $password) {

							$pass = $old_password;
						} else {

							$pass = sha1($password);
						}
					} else {

						$pass = sha1($password);
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => $pass,

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'municipality' => $this->input->post('municipality'),

						'province' => $this->input->post('province'),

						// 'classname' => $this->input->post('classname'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid']

					);



					if ($this->common->updateData('facilitator', $data, ['id' => $_GET['id']])) {

						$this->session->set_flashdata('success', 'Facilitator Update Successfully');

						redirect('facilitator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('facilitator-user-list');
					}
				} else {

					$array = [];

					if (!empty($_FILES['acreditations_file']['name'])) {

						$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

						if (!empty($arrayFilter)) {

							$path = './uploads/facilitator/acreditationsfiles/';

							$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

							foreach ($_POST['acreditations'] as $key => $value) {

								$array[] = array(
									'id' => $key,

									'acreditations' => $value,

									'acreditations_file' => $image[$key]

								);
							}
						}

						$acreditations_filess = serialize($array);
					} else {

						$acreditations_filess = '';
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_filess,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => sha1($this->input->post('password')),

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'province' => $this->input->post('province'),

						// 'classname' => $this->input->post('classname'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'municipality' => $this->input->post('municipality'),


					);
// print_r($data);die;
					if ($this->common->insertData('facilitator', $data)) {

						$this->session->set_flashdata('success', 'Facilitator Insert Successful');

						redirect('facilitator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('create-facilitator-user');
					}
				}

				if ($id != 0) {

					$condition = "`id`=$id";

					$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], $condition, 'row');
				}
			}

			// $this->data['classname'] = $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');


			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();


			$this->data['page'] = 'createfacilitator';

			$this->data['content'] = 'pages/facilitator/create_facilitator';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function facilitatoruserlist()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`trainer_id`=$trainer_id";

			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], $condition, 'result');



			$this->data['page'] = 'facilitatoruserlist';

			$this->data['content'] = 'pages/facilitator/facilitator_list';

			$this->load->view('provider/tamplate', $this->data);
		}
		// *************************ASSESSOR*********************************************************************************
		public function createassessoruser()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$condition = "`id`=$id";

				$this->data['record'] = $this->common->accessrecord('assessor', [], $condition, 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					$array = [];

					if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

						foreach ($_POST['acreditations_image'] as  $value_one) {

							$exp = explode(',', $value_one);

							$array_two[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);

							$image_id = $exp[0];
						}

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								$increment_id = '';

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$increment_id = $image_id + 1 + $key;

									$array_one[] = array(
										'id' => $increment_id,

										'acreditations' => $_POST['acreditations'][$increment_id],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = array_merge($array_two, $array_one);
					} elseif (!empty($_POST['acreditations_image'])) {

						foreach ($_POST['acreditations_image'] as $key => $value) {

							$exp = explode(',', $value);

							$array[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);
						}

						$acreditations_files = $array;
					} else {

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$array[] = array(
										'id' => $key,

										'acreditations' => $_POST['acreditations'][$key],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = $array;
					}

					if (empty($acreditations_files)) {

						$acreditations_file = '';
					} else {

						$acreditations_file = serialize($acreditations_files);
					}

					$password = $_POST['password'];

					if ($assessor = $this->common->accessrecord('assessor', [], ['id' => $id, 'password' => $password], 'row')) {

						$old_password = $assessor->password;

						if ($old_password == $password) {

							$pass = $old_password;
						} else {

							$pass = sha1($password);
						}
					} else {

						$pass = sha1($password);
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => $pass,

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'municipality' => $this->input->post('municipality')

					);



					if ($this->common->updateData('assessor', $data, ['id' => $_GET['id']])) {

						$this->session->set_flashdata('success', 'Assessor Update Successfully');

						redirect('assessor-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('assessor-user-list');
					}
				} else {

					$array = [];

					if (!empty($_FILES['acreditations_file']['name'])) {

						$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

						if (!empty($arrayFilter)) {

							$path = './uploads/acreditationsfiles/';

							$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

							foreach ($_POST['acreditations'] as $key => $value) {

								$array[] = array(
									'id' => $key,

									'acreditations' => $value,

									'acreditations_file' => $image[$key]

								);
							}
						}

						$acreditations_file = serialize($array);
					} else {

						$acreditations_file = "";
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					$region = $this->input->post('region');

					$regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => sha1($this->input->post('password')),

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'municipality' => $this->input->post('municipality')

					);

					if ($this->common->insertData('assessor', $data)) {

						$this->session->set_flashdata('success', 'Assessor Insert Successfully');

						redirect('assessor-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('create-assessor-user');
					}
				}

				if ($id != 0) {

					$condition = "`id`=$id";

					$this->data['assessor'] = $this->common->accessrecord('assessor', [], $condition, 'row');
				}
			}

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();


			$this->data['page'] = 'createassessor';

			$this->data['content'] = 'pages/assessor/create_assessor';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function assessoruserlist()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`trainer_id`=$trainer_id";

			$this->data['assessor'] = $this->common->accessrecord('assessor', [], $condition, 'result');



			$this->data['page'] = 'assessoruserlist';

			$this->data['content'] = 'pages/assessor/assessor_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		// *******************************MODERATOR**************************************************************************

		public function createmoderatoruser()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$condition = "`id`=$id";

				$this->data['record'] = $this->common->accessrecord('moderator', [], $condition, 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					$array = [];

					if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

						foreach ($_POST['acreditations_image'] as  $value_one) {

							$exp = explode(',', $value_one);

							$array_two[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);

							$image_id = $exp[0];
						}

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/moderator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								$increment_id = '';

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$increment_id = $image_id + 1 + $key;

									$array_one[] = array(
										'id' => $increment_id,

										'acreditations' => $_POST['acreditations'][$increment_id],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = array_merge($array_two, $array_one);
					} elseif (!empty($_POST['acreditations_image'])) {

						foreach ($_POST['acreditations_image'] as $key => $value) {

							$exp = explode(',', $value);

							$array[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);
						}

						$acreditations_files = $array;
					} else {

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/moderator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$array[] = array(
										'id' => $key,

										'acreditations' => $_POST['acreditations'][$key],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = $array;
					}

					if (empty($acreditations_files)) {

						$acreditations_file = '';
					} else {

						$acreditations_file = serialize($acreditations_files);
					}

					$password = $_POST['password'];

					if ($moderator = $this->common->accessrecord('moderator', [], ['id' => $id], 'row')) {

						$old_password = $moderator->password;

						if ($old_password == $password) {

							$pass = $old_password;
						} else {

							$pass = sha1($password);
						}
					} else {

						$pass = sha1($password);
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => $pass,

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'municipality' => $this->input->post('municipality')

					);



					if ($this->common->updateData('moderator', $data, ['id' => $_GET['id']])) {

						$this->session->set_flashdata('success', 'Moderator Update Successfully');

						redirect('moderator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('moderator-user-list');
					}
				} else {

					$array = [];

					if (!empty($_FILES['acreditations_file']['name'])) {

						$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

						if (!empty($arrayFilter)) {

							$path = './uploads/moderator/acreditationsfiles/';

							$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

							foreach ($_POST['acreditations'] as $key => $value) {

								$array[] = array(
									'id' => $key,

									'acreditations' => $value,

									'acreditations_file' => $image[$key]

								);
							}
						}

						$acreditations_file = serialize($array);
					} else {

						$acreditations_file = "";
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => sha1($this->input->post('password')),

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'municipality' => $this->input->post('municipality')

					);

					if ($this->common->insertData('moderator', $data)) {

						$this->session->set_flashdata('success', 'Moderator Insert Successfully');

						redirect('moderator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('create-moderator-user');
					}
				}

				if ($id != 0) {

					$condition = "`id`=$id";

					$this->data['moderator'] = $this->common->accessrecord('moderator', [], $condition, 'row');
				}
			}

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();

			$this->data['page'] = 'createmoderator';

			$this->data['content'] = 'pages/moderator/create_moderator';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function moderatoruserlist()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`trainer_id`= $trainer_id";

			$this->data['moderator'] = $this->common->accessrecord('moderator', [], $condition, 'result');

			$this->data['page'] = 'moderatorlist';

			$this->data['content'] = 'pages/moderator/moderator_list';

			$this->load->view('provider/tamplate', $this->data);
		}



		public function createexternalmoderatoruser()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$condition = "`id`=$id";

				$this->data['record'] = $this->common->accessrecord('external_moderator', [], $condition, 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					$array = [];

					if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

						foreach ($_POST['acreditations_image'] as  $value_one) {

							$exp = explode(',', $value_one);

							$array_two[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);

							$image_id = $exp[0];
						}

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/moderator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								$increment_id = '';

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$increment_id = $image_id + 1 + $key;

									$array_one[] = array(
										'id' => $increment_id,

										'acreditations' => $_POST['acreditations'][$increment_id],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = array_merge($array_two, $array_one);
					} elseif (!empty($_POST['acreditations_image'])) {

						foreach ($_POST['acreditations_image'] as $key => $value) {

							$exp = explode(',', $value);

							$array[] = array(
								'id' => $exp[0],

								'acreditations' => $exp[1],

								'acreditations_file' => $exp[2]

							);
						}

						$acreditations_files = $array;
					} else {

						if (!empty($_FILES['acreditations_file']['name'])) {

							$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

							if (!empty($arrayFilter)) {

								$path = './uploads/moderator/acreditationsfiles/';

								$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

								foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

									$array[] = array(
										'id' => $key,

										'acreditations' => $_POST['acreditations'][$key],

										'acreditations_file' => $image[$key]

									);
								}
							}
						}

						$acreditations_files = $array;
					}

					if (empty($acreditations_files)) {

						$acreditations_file = '';
					} else {

						$acreditations_file = serialize($acreditations_files);
					}

					$password = $_POST['password'];

					if ($moderator = $this->common->accessrecord('external_moderator', [], ['id' => $id, 'password' => $password], 'row')) {

						$old_password = $moderator->password;

						if ($old_password == $password) {

							$pass = $old_password;
						} else {

							$pass = sha1($password);
						}
					} else {

						$pass = sha1($password);
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => $pass,

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'municipality' => $this->input->post('municipality'),

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid']

					);



					if ($this->common->updateData('external_moderator', $data, ['id' => $_GET['id']])) {

						$this->session->set_flashdata('success', 'Moderator Update Successfully');

						redirect('externalmoderator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('externalmoderator-user-list');
					}
				} else {

					$array = [];

					if (!empty($_FILES['acreditations_file']['name'])) {

						$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

						if (!empty($arrayFilter)) {

							$path = './uploads/moderator/acreditationsfiles/';

							$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

							foreach ($_POST['acreditations'] as $key => $value) {

								$array[] = array(
									'id' => $key,

									'acreditations' => $value,

									'acreditations_file' => $image[$key]

								);
							}
						}

						$acreditations_file = serialize($array);
					} else {

						$acreditations_file = "";
					}

					$district = $this->input->post('district');

					$District = $this->common->one_District($district);

					$district_name = $District->name;

					// $region = $this->input->post('region');

					// $regiondata = $this->common->one_region($region);

					// $region_name = $regiondata->region;

					$city = $this->input->post('city');

					$citydata = $this->common->one_city($city);

					$city_name = $citydata->city;

					$data = array(
						'fullname' => $this->input->post('fullname'),

						'surname' => $this->input->post('surname'),

						'email' => $this->input->post('email'),

						'id_number' => $this->input->post('id_number'),

						'landline' => $this->input->post('landline'),

						'mobile' => $this->input->post('mobile'),

						'acreditations_file' => $acreditations_file,

						'user_type' => '2',

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id,

						'password' => sha1($this->input->post('password')),

						'Suburb' => $this->input->post('Suburb'),

						'Street_name' => $this->input->post('Street_name'),

						'Street_number' => $this->input->post('Street_number'),

						'district' => $district_name,

						// 'region' => $region_name,

						'city' => $city_name,

						'municipality' => $this->input->post('municipality'),

						'province' => $this->input->post('province'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid']

					);

					if ($this->common->insertData('external_moderator', $data)) {

						$this->session->set_flashdata('success', 'Moderator Created Successfully');

						redirect('externalmoderator-user-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('create-externalmoderator-user');
					}
				}

				if ($id != 0) {

					$condition = "`id`=$id";

					$this->data['moderator'] = $this->common->accessrecord('external_moderator', [], $condition, 'row');
				}
			}

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();

			$this->data['page'] = 'createmoderator';

			$this->data['content'] = 'pages/external-moderator/create_moderator';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function externalmoderatoruserlist()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`trainer_id`= $trainer_id";

			$this->data['moderator'] = $this->common->accessrecord('external_moderator', [], $condition, 'result');

			$this->data['page'] = 'moderatorlist';

			$this->data['content'] = 'pages/external-moderator/moderator_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		// *******************************CLASS******************************************************************************

		public function create_class()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('class_name', [], ['id' => $id], 'row');
			}

			if ($_POST) {

			    // Upload files
		        if (!empty($_FILES['upload_learner_guide']['name'])) {
		            $upload_learner_guide['upload_learner_guide']['store'] = $this->singlefileupload('upload_learner_guide', './uploads/class/learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
		            $upload_learner_guide['upload_learner_guide']['name'] = $_FILES['upload_learner_guide']['name'];
		        }

				$data = array(
					'learnership_id' => $this->input->post('learnship_id'),

					'learnership_sub_type_id' => $this->input->post('learnership_sub_type_id'),

					'trainer_id' => $this->input->post('trainer_id'),

				    'class_name' => $this->input->post('class_name'),

					'intervention' => $this->input->post('intervention'),

					'created_by' => $this->input->post('created_by'),

					'user_type' => '1',

					'project_manager' => $this->data['projectmanagerid'],

					'organization' => $this->data['organizationid'],

					'facilitator_id' => $this->input->post('facilitator_id')

				);

				if (!empty($upload_learner_guide['upload_learner_guide']['store'])) {
				    $data['upload_learner_guide']  = $upload_learner_guide['upload_learner_guide']['store'];
				    $data['upload_learner_guide_name']  = $upload_learner_guide['upload_learner_guide']['name'];
				}


				$class_modules_list = [];
				$modules = [];

				// Get the module data from the form
				$form_class_modules_list = (key_exists('class_module_id', $_POST)) ? $_POST['class_module_id'] : [];

				// BUG ALERT: When class module is deleted, it is not removed from the database.

				foreach ($form_class_modules_list as $key => $class_module_id) {

				    $modules[$key]['id'] = $class_module_id;

				    if ( (key_exists('class_module', $_POST)) && (!empty($_POST['class_module'][$key]))) {
				        $modules[$key]['title'] = $_POST['class_module'][$key];
				    }

// 				    if ( (key_exists('learner_guide', $_FILES)) && (!empty($_FILES['learner_guide']['name'][$key]))) {
//
// 				        $file_entry = [
// 				            'name' => $_FILES['learner_guide']['name'][$key],
// 				            'type' => $_FILES['learner_guide']['type'][$key],
// 				            'tmp_name' => $_FILES['learner_guide']['tmp_name'][$key],
// 				            'error' => $_FILES['learner_guide']['error'][$key],
// 				            'size' => $_FILES['learner_guide']['size'][$key],
// 				        ];
//
// 				        $_FILES['upload_learner_guide'] = $file_entry;
//
// 				        $modules[$key]['learner_guide']['store'] = $this->singlefileupload('upload_learner_guide', './uploads/class/learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 				        $modules[$key]['learner_guide']['name'] = $_FILES['learner_guide']['name'][$key];
// 				    }

				    if ( (key_exists('learner_poe', $_FILES)) && (!empty($_FILES['learner_poe']['name'][$key]))) {

				        $file_entry = [
				            'name' => $_FILES['learner_poe']['name'][$key],
				            'type' => $_FILES['learner_poe']['type'][$key],
				            'tmp_name' => $_FILES['learner_poe']['tmp_name'][$key],
				            'error' => $_FILES['learner_poe']['error'][$key],
				            'size' => $_FILES['learner_poe']['size'][$key],
				        ];

				        $_FILES['upload_learner_poe'] = $file_entry;

				        $modules[$key]['learner_poe']['store'] = $this->singlefileupload('upload_learner_poe', './uploads/class/learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				        $modules[$key]['learner_poe']['name'] = $_FILES['learner_poe']['name'][$key];

				    }


				    if ( (key_exists('learner_workbook', $_FILES)) && (!empty($_FILES['learner_workbook']['name'][$key]))) {

				        $file_entry = [
				            'name' => $_FILES['learner_workbook']['name'][$key],
				            'type' => $_FILES['learner_workbook']['type'][$key],
				            'tmp_name' => $_FILES['learner_workbook']['tmp_name'][$key],
				            'error' => $_FILES['learner_workbook']['error'][$key],
				            'size' => $_FILES['learner_workbook']['size'][$key],
				        ];

				        $_FILES['upload_learner_workbook'] = $file_entry;

				        $modules[$key]['learner_workbook']['store'] = $this->singlefileupload('upload_learner_workbook', './uploads/class/learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				        $modules[$key]['learner_workbook']['name'] = $_FILES['learner_workbook']['name'][$key];

				    }

				    if ( (key_exists('facilitator_guide', $_FILES)) && (!empty($_FILES['facilitator_guide']['name'][$key]))) {

				        $file_entry = [
				            'name' => $_FILES['facilitator_guide']['name'][$key],
				            'type' => $_FILES['facilitator_guide']['type'][$key],
				            'tmp_name' => $_FILES['facilitator_guide']['tmp_name'][$key],
				            'error' => $_FILES['facilitator_guide']['error'][$key],
				            'size' => $_FILES['facilitator_guide']['size'][$key],
				        ];

				        $_FILES['upload_facilitator_guide'] = $file_entry;


				        $modules[$key]['facilitator_guide']['store'] = $this->singlefileupload('upload_facilitator_guide', './uploads/class/facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				        $modules[$key]['facilitator_guide']['name'] = $_FILES['facilitator_guide']['name'][$key];

				    }

				}



				if ($id != 0) {

					if ($this->common->updateData('class_name', $data, ['id' => $id])) {
                        ;
					} else {
					    // BUG !! Saving, but returning false
// 					    $this->session->set_flashdata('error', 'Please Try Again');
// 						redirect('provider-class-list');
                        ;
					}
				} else {

					if ($class_id = $this->common->insertData('class_name', $data)) {
					    $id = $class_id;
					} else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect('provider-create-class');
					}
				}


				// Save the class modules

				$save_status = true;
				foreach ($modules as $class_module_item) {
				    $class_module_data = [

				        'class_id' => $id,
				        'title' => $class_module_item['title'],

				        'title' => $class_module_item['title'],
				        'title' => $class_module_item['title'],

// 				        'created_date' => date('Y-m-d H:i:s'),`
				        'updated_date' => date('Y-m-d H:i:s'),

				    ];

// 				    if (!empty($class_module_item['learner_guide']['store'])) {
// 				        $class_module_data['upload_learner_guide'] = $class_module_item['learner_guide']['store'];
// 				        $class_module_data['upload_learner_guide_name'] = $class_module_item['learner_guide']['name'];
// 				    }

				    if (!empty($class_module_item['learner_workbook']['store'])) {
				        $class_module_data['upload_workbook'] = $class_module_item['learner_workbook']['store'];
				        $class_module_data['upload_workbook_name'] = $class_module_item['learner_workbook']['name'];
				    }

				    if (!empty($class_module_item['learner_poe']['store'])) {
				        $class_module_data['upload_poe'] = $class_module_item['learner_poe']['store'];
				        $class_module_data['upload_poe_name'] = $class_module_item['learner_poe']['name'];
				    }

				    if (!empty($class_module_item['facilitator_guide']['store'])) {
				        $class_module_data['upload_facilitator_guide'] = $class_module_item['facilitator_guide']['store'];
				        $class_module_data['upload_facilitator_guide_name'] = $class_module_item['facilitator_guide']['name'];
				    }

				    if (!empty($class_module_item['id'])) {
				        $class_module_query = $this->common->updateData('class_module', $class_module_data, ['id' => $class_module_item['id']]);
				    } else {
// 				        $class_module_data['created_date'] = date('Y-m-d H:i:s');
				        $class_module_query = $this->common->insertData('class_module', $class_module_data);
				    }

				    if (empty($class_module_query)) {
				        $save_status = false;
				    }

				}

				if ($save_status == true) {
				    $this->session->set_flashdata('success', 'Class Updated Succesfully');
				    redirect('provider-class-list');
				} else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('provider-create-class');
				}


			}

			$condition = "`trainer_id` IN ('1','$trainer_id')";

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$this->data['facilitators'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			if ($id) {
			    $this->data['class_modules'] = $this->common->accessrecord('class_module', [], ['class_id' => $id], 'result');
			} else {
			    $this->data['class_modules'] = [];
			}

			$this->data['page'] = 'create_class';

			$this->data['content'] = 'pages/class/create_class';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function class_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$this->data['record'] = $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['page'] = 'classlist';

			$this->data['content'] = 'pages/class/class_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		// ***************************LEARNERSHIP************************************************************************************

		public function createLearnership()
		{

			$this->data['page'] = 'createLearnership';

			$this->data['content'] = 'pages/manage-learnership/create-learnership';

			if (isset($_GET['learnid'])) {

				$learnid = $_GET['learnid'];

				$this->data['learn'] = $this->common->accessrecord('learnership', [], array('id' => $learnid), 'row');
			}

			$this->form_validation->set_rules('name', 'Learnership name', 'required');

			$this->form_validation->set_rules('saqa_registration_id', 'SAQA Registration ID', 'required');



			if (isset($_POST)) {

				if ($this->form_validation->run() == FALSE) {
				} else {

					$data = $_POST;

					if (!empty($learnid)) {

						$this->common->update_learner_tr('learnership', array('id' => $learnid), $data);

						$this->session->set_flashdata('success', 'Learnership updated Succesfully');

						redirect('learnership-list');
					} else {

						if (isset($_SESSION['admin']['trainer_id'])) {

							$trainer_id = $_SESSION['admin']['trainer_id'];
						} else {

							$trainer_id = '';
						}

						$data['project_manager'] = $this->data['projectmanagerid'];

						$data['organization'] = $this->data['organizationid'];

						$data['trainer_id'] = $trainer_id;

						$data['created_by'] = $trainer_id;

						$data['user_type'] = 2;

						$training = $this->common->save_learner_tr('learnership', $data);

						$this->session->set_flashdata('success', 'Learnership add Succesfully');

						redirect('learnership-list');
					}
				}
			}

			$this->load->view('provider/tamplate', $this->data);
		}

		public function manageLearnership()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = array('trainer_id' => $trainer_id);

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

			$this->data['page'] = 'providerlearnershipList';

			$this->data['content'] = 'pages/manage-learnership/learnership-list';

			$this->load->view('provider/tamplate', $this->data);
		}


		// ******************************SUBLEARNERSHIP**********************************************************************

		public function createSubLearnership()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];

				$condition = array('trainer_id' => $trainer_id);

				$this->data['learnership'] = $this->common->accessrecord('learnership', ['id, name'], $condition, 'result');
			} else {

				$trainer_id = '';
			}

			if (!empty($_GET['sublearnid'])) {

				$sublearnid = $_GET['sublearnid'];

				$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], array('id' => $sublearnid), 'row');
			}

			if (!empty($_POST)) {

				$this->form_validation->set_rules('learnship_id', 'Learnership name', 'required');

				$this->form_validation->set_rules('sub_type', 'Learnership sub type name', 'required');

				//$this->form_validation->set_rules('unit_standard', 'Unit standards', 'required');

				$this->form_validation->set_rules('min_credit', 'Minimum credits', 'required');

				$this->form_validation->set_rules('total_credits_allocated', 'Total credits allocated', 'required');

				//$this->form_validation->set_rules('location', 'Location', 'required');

				if ($this->form_validation->run() == FALSE) {
				} else {

					$units = $this->input->post('unit_standard');

					$newunit = array();

					foreach ($units as $key => $value) {

						$un_name = $this->common->accessrecord('units', ['title'], array('id' => $value), 'row');

						$newunit[] = $un_name->title;
					}

					extract($_POST);

					$data = array(
						'user_type' => 2,

						'learnship_id' => $this->input->post('learnship_id'),

						'sub_type' => $this->input->post('sub_type'),

						'min_credit' => $this->input->post('min_credit'),

						'unit_standard' => implode(',', $this->input->post('unit_standard')),

						'unit_name' => implode(',', $newunit),

						'total_credits_allocated' => $this->input->post('total_credits_allocated'),

						'facilitator' => $this->input->post('facilitator_id'),

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

						'trainer_id' => $trainer_id,

						'created_by' => $trainer_id

					);

					if (!empty($sublearnid)) {

						$this->common->update_learner_tr('learnership_sub_type', array('id' => $sublearnid), $data);

						$this->session->set_flashdata('success', 'Learnership sub type updated Succesfully');
					} else {

						$training = $this->common->save_learner_tr('learnership_sub_type', $data);

						$this->session->set_flashdata('success', 'Learnership sub type add Succesfully');
					}

					redirect('learnership-sub-list');
				}
			}

			$this->data['units'] = $this->common->accessrecord('units', [], [], 'result');

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], $condition, 'result_array');

			$this->data['page'] = 'createlearnershipSubType';

			$this->data['content'] = 'pages/manage-sub-learnership/create-sub-learnership';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function learnershipSubList()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = array('trainer_id' => $trainer_id);

			$this->data['learnershipSubType'] = $this->common->learnershipSubType($trainer_id);

			$this->data['page'] = 'providerlearnershipSubType';

			$this->data['content'] = 'pages/manage-sub-learnership/learnership-sub-list';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function get_sublearnership()
		{

			if (!empty($this->input->post('value'))) {
				$id = $this->input->post('value');
			} else {
				$id = 0;
			}

			$record = $this->common->accessrecord('learnership_sub_type', [], ['learnship_id' => $id], 'result');

			if (!empty($record)) {

				$data = $record;
			} else {

				$data = array('error' => 'Learnership not available of this id');
			}

			echo json_encode($data);
		}

		public function get_learnership()
		{

			if (!empty($this->input->post('value'))) {
				$id = $this->input->post('value');
			} else {
				$id = 0;
			}

			$record = $this->common->accessrecord('learnership', [], ['id' => $id], 'result');

			if (!empty($record)) {

				$data = $record;
			} else {

				$data = array('error' => 'Learnership not available of this id');
			}

			echo json_encode($data);
		}

		// ******************************LEARNER MARK************************************************************************

		public function create_learner_mark()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					if (!empty($_FILES['attachments']['name'])) {

						$attachment['attachment'] = $this->singlefileupload('attachments', './uploads/learner/import_learnermarks/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
					} else {

						$attachments = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');

						$attachment['attachment'] = $attachments->attachment;
					}

					$data = array(

						'training_provider' => $this->input->post('training_provider'),

						'year' => $this->input->post('year'),

						'learnship_id' => $this->input->post('learnship_id'),

						'learnership_sub_type' => $this->input->post('learnership_sub_type_id'),

						'learner_classname' => $this->input->post('learner_classname'),

						'facilirator' => $this->input->post('facilitator_id'),

						'attachment' => $attachment['attachment'],

						'created_by' => $trainer_id,

						'user_type' => 2,

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

					);

					if ($this->common->updateData('learner_marks', $data, array('id' => $id))) {

						$this->session->set_flashdata('success', 'Mark Sheet Updated Succesfully');

						redirect('provider-learnermark-list');
					} else {

						$this->session->set_flashdata('success', 'Mark Sheet Updated Succesfully');

						redirect('provider-learnermark-list');
					}
				} else {

					if (!empty($_FILES['attachment']['name'])) {

						$attachment['attachment'] = $this->singlefileupload('attachment', './uploads/learner/import_learnermarks/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
					} else {

						$attachment['attachment'] = "";
					}

					$learnership = $this->input->post('learnership_sub_type');

					$data = array(

						'training_provider' => $this->input->post('training_provider'),

						'year' => $this->input->post('year'),

						'learnship_id' => $this->input->post('learnship_id'),

						'learnership_sub_type' => $this->input->post('learnership_sub_type_id'),

						'learner_classname' => $this->input->post('learner_classname'),

						'facilirator' => $this->input->post('facilitator_id'),

						'attachment' => $attachment['attachment'],

						'created_by' => $trainer_id,

						'user_type' => 2,

						'project_manager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

					);

					/*   if($this->common->accessrecord('facilitator',[],['fullname'=>$this->input->post('facilirator')],'row')){*/

					if ($this->common->accessrecord('learner_marks', [], ['year' => $this->input->post('year'), 'learner_classname' => $this->input->post('learner_classname'), 'learnership_sub_type' => $this->input->post('learnership_sub_type'), 'facilirator' => $this->input->post('facilirator')], 'row')) {

						$this->session->set_flashdata('error', 'Mark Sheet Already Generate');

						redirect('provider-learner-marks');
					} else {

						if ($this->common->insertData('learner_marks', $data)) {

							$this->session->set_flashdata('success', 'Mark Sheet Insert Successful');

							redirect('provider-learnermark-list');
						} else {

							$this->session->set_flashdata('error', 'Please Try Again');

							redirect('provider-learner-marks');
						}
					}

					/* }else{

			        	$this->session->set_flashdata('error', 'error');

						redirect('provider-learner-marks');

			        }*/
				}

				if ($id != 0) {

					$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');
				}
			}
			$condition = "`trainer_id` IN ('1','$trainer_id')";



			$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

			$this->data['learner'] = $this->common->accessrecord('learner_marks', [], [], 'result');

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');
			// print_r($this->data['facilitator']);die;

			if (!empty($_GET['id'])) {

				$learner_marks = $this->common->accessrecord('learner_marks', [], ['id' => $_GET['id']], 'row');
				// print_r($learner_marks);die;

				$this->data['learner_ship_SubType'] = $this->common->accessrecord('learnership_sub_type', [], ['id' => $learner_marks->learnership_sub_type], 'row');
				$this->data['learnership'] = $this->common->accessrecord('learnership', [], ['id' => $learner_marks->learnship_id], 'row');


				$this->data['class_name'] = $this->common->accessrecord('class_name', [], ['id' => $learner_marks->learner_classname], 'row');
				// print_r($this->data['class_name']);die;
				$this->data['facilitator_data'] = $this->common->accessrecord('facilitator', [], ['id' => $this->data['class_name']->facilitator_id], 'row');
				//  print_r($this->data['facilitator_data']);die;
			} else {

				$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

				$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');
			}
			// print_r($this->data['class_name']); die;
			$this->data['page'] = 'create_learner_marks';

			$this->data['content'] = 'pages/learner_marks/create_learner_marks';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function learner_mark_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];

				$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

				$company_name = $trainer->company_name;
			} else {

				$company_name = '';
			}

			$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name], 'result');

			$this->data['page'] = 'learner_marks_list';

			$this->data['content'] = 'pages/learner_marks/learner_marks_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function get_learnerclassname()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = $this->input->post('value');

			$record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'trainer_id' => $trainer_id], 'result');

			if (!empty($record)) {

				$data = $record;
			} else {

				$data = array('error' => 'classname list not available in this learnershipsubtype');
			}

			echo json_encode($data);
		}

		public function get_units_for_leanership_subtype()
		{

		    if (isset($_SESSION['admin']['trainer_id'])) {

		        $trainer_id = $_SESSION['admin']['trainer_id'];
		    } else {

		        $trainer_id = '';
		    }

		    $id = $this->input->post('value');

		    $units = $this->common->getAssessmentUnitsFromlearnershipSubType($id);

		    if (!empty($units)) {
		        $data = $units;
		    } else {

		        $data = array('error' => 'This learnershipsubtype has no units.');
		    }

		    echo json_encode($data);
		}

		public function get_facilitator()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = $this->input->post('value');
			// print_r($id);die;
			$cdata = $this->common->accessrecord('class_name', [], ['id' => $id, 'trainer_id' => $trainer_id], 'row');

			$record = $this->common->accessrecord('facilitator', [], ['id' => $cdata->facilitator_id, 'trainer_id' => $trainer_id], 'result');

			if (!empty($record)) {

				$data = $record;
			} else {

				$data = array('error' => 'facilitator not available in this class');
			}

			echo json_encode($data);
		}

		// **********************************LEARNER ATTENDANCE*************************************************************

		public function create_attendance()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');
			}

			if ($_POST) {

				if ($id != 0) {

					if (!empty($_FILES['attachments']['name'])) {

						$attachment['attachment'] = $this->singlefileupload('attachments', './uploads/attendance/attachment_one/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
					} else {

						$attachments = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');

						$attachment['attachment'] = $attachments->attachment_one;
					}

					if (!empty($this->input->post('learner_classname'))) {

						$classname = $this->input->post('learner_classname');
					} else {

						$this->session->set_flashdata('classname', 'please choose class name');

						redirect('assessor-create-attendance');
					}

					$data = array(

						'training_provider' => $this->input->post('training_provider'),

						// 'year' => $this->input->post('year'),

						'learnership_id' => $this->input->post('learnship_id'),

						'learnership_sub_type' => $this->input->post('learnership_sub_type_id'),

						'classname' => $classname,

						'facilitator' => $this->input->post('facilitator'),
						'week_date' => $this->input->post('week_date'),
						'week_start_date' => $this->input->post('week_start_date'),

						'attachment_one' => $attachment['attachment'],

						'created_by' => $trainer_id,

						'assessor_id' => $trainer_id,

						'user_type' => 1,

						'projectmanager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

					);

					if ($this->common->updateData('attendance', $data, array('id' => $id))) {

						$this->session->set_flashdata('success', 'Attendance Updated Succesfully');

						redirect('provider-attendance-list');
					} else {

						$this->session->set_flashdata('success', 'Attendance Updated Succesfully');

						redirect('provider-attendance-list');
					}
				} else {

					if (!empty($_FILES['attachment']['name'])) {

						$attachment['attachment'] = $this->singlefileupload('attachment', './uploads/attendance/attachment_one/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
					} else {

						$attachment['attachment'] = "";
					}

					if (!empty($this->input->post('learner_classname'))) {

						$classname = $this->input->post('learner_classname');
					} else {

						$this->session->set_flashdata('classname', 'please choose class name');

						redirect('provider-create-attendance');
					}

					$learnership = $this->input->post('learnership_sub_type');

					$data = array(

						'training_provider' => $this->input->post('training_provider'),

						// 'year' => $this->input->post('year'),

						'learnership_id' => $this->input->post('learnship_id'),

						'learnership_sub_type' => $this->input->post('learnership_sub_type_id'),

						'classname' => $classname,

						'facilitator' => $this->input->post('facilitator'),

						'week_date' => $this->input->post('week_date'),
						'week_start_date' => $this->input->post('week_start_date'),
						'attachment_one' => $attachment['attachment'],

						'assessor_id' => $trainer_id,

						'created_by' => $trainer_id,

						'user_type' => 1,

						'projectmanager' => $this->data['projectmanagerid'],

						'organization' => $this->data['organizationid'],

					);

					if ($this->common->accessrecord('attendance', [], ['year' => $this->input->post('year'), 'classname' => $this->input->post('learner_classname'), 'learnership_sub_type' => $this->input->post('learnership_sub_type'), 'facilitator' => $this->input->post('facilitator'), 'week_date' => $this->input->post('week_date')], 'row')) {

						$this->session->set_flashdata('error', 'Attendance Already Generate');

						redirect('provider-create-attendance');
					} else {

						if ($this->common->insertData('attendance', $data)) {

							$this->session->set_flashdata('success', 'Attendance Insert Successful');

							redirect('provider-attendance-list');
						} else {

							$this->session->set_flashdata('error', 'Please Try Again');

							redirect('provider-create-attendance');
						}
					}
				}

				if ($id != 0) {

					$this->data['record'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');
				}
			}
			$condition = "`trainer_id` IN ('1','$trainer_id')";

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

			$this->data['attendance'] = $this->common->accessrecord('attendance', [], [], 'result');

			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			if (!empty($_GET['id'])) {

				$attendance = $this->common->accessrecord('attendance', [], ['id' => $_GET['id']], 'row');

				// $this->data['learner_ship_SubType'] = $this->common->accessrecord('learnership_sub_type', [], ['id' => $attendance->learnership_sub_type], 'row');
				// print_r($this->data['learner_ship_SubType']);die;
				$this->data['learnershipSubType'] = $this->common->learnershipSubType($attendance->learnership_sub_type);
				$this->data['class_name'] = $this->common->accessrecord('class_name', [], ['id' => $attendance->classname], 'row');


				$this->data['facilitatord'] = $this->common->accessrecord('facilitator', [], ['id' => $this->data['class_name']->facilitator_id, 'trainer_id' => $trainer_id], 'row');
			} else {

				$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');


				$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');
			}

			$this->data['page'] = 'create_attendance';

			$this->data['content'] = 'pages/attendance/create_attendance';

			$this->load->view('provider/tamplate', $this->data);
		}

		// ****************************QUATERLY REPORT***********************************************************************

		public function create_quaterly_report()
		{

			// $project_id = projectmanagerid();

			$trainer_id = $_SESSION['admin']['trainer_id'];

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('quarterly_progress_report', [], ['id' => $id], 'row');
			}

			if ($_POST) {

				//echo '<pre>';print_r($_POST);die();
				$_POST['project_manager'] = $this->data['projectmanagerid'];
				$_POST['organization'] = $this->data['organizationid'];

				if ($id != 0) {

					if (!empty($_FILES['documentnew']['name'])) {

						$upload_bank_statement['upload_bank_statement'] = $this->singlefileupload('documentnew', './uploads/quatery_report_proof/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
					} else {

						$uploadbankstatement = $this->common->accessrecord('quarterly_progress_report', [], ['id' => $id], 'row');

						$upload_bank_statement['document'] = $uploadbankstatement->document;
					}

					$_POST['document'] = $upload_bank_statement['document'];


					if ($this->common->updateData('quarterly_progress_report', $_POST, array('id' => $id))) {

						$this->session->set_flashdata('success', 'Updated Succesfully');

						redirect('Quaterly-Report-list');
					} else {

						$this->session->set_flashdata('success', 'Updated Succesfully');

						redirect('Quaterly-Report-list');
					}
				} else {

					if (!empty($_FILES['document']['name'])) {

						$upload_bank_statement['document'] = $this->singlefileupload('document', './uploads/quatery_report_proof/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
					}

					$_POST['document'] = $upload_bank_statement['document'];

					if ($this->common->insertData('quarterly_progress_report', $_POST)) {

						$this->session->set_flashdata('success', 'Insert Successful');

						redirect('Quaterly-Report-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('Quaterly-Report-list');
					}
				}

				if ($id != 0) {

					$this->data['record'] = $this->common->accessrecord('quarterly_progress_report', [], ['id' => $id], 'row');
				}
			}

			//ECHO '<pre>';print_r($_SESSION);

			$this->data['taringprovider'] = $this->common->accessrecord('trainer', ['id as trainer_id,project_id,company_name'], ['id' => $_SESSION['admin']['trainer_id']], 'row');

			//print_r($this->data['taringprovider']);



			$projectid = $this->data['taringprovider']->project_id;

			$this->data['project'] = $this->common->accessrecord('project', ['id,project_name'], ['id' => $projectid], 'row');





			//ECHO '<pre>';print_r($this->data);die;

			$this->data['page'] = 'create_bank';

			$this->data['content'] = 'pages/bank/create_bank';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function quaterly_report_list()
		{

			$trainer_id = $_SESSION['admin']['trainer_id'];

			$this->data['record'] = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $trainer_id], 'result');

			foreach ($this->data['record'] as $key => $value) {

				$trainer = $this->common->accessrecord('trainer', ['id as trainer_id,project_id,company_name'], ['id' => $_SESSION['admin']['trainer_id']], 'row');

				$this->data['record'][$key]->training_provider_name = $trainer->company_name;
			}

			$this->data['page'] = 'quaterly_report_list';

			$this->data['content'] = 'pages/bank/bank_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		// ************************************LEARNER ATTENDANCE   absent***************************************************


		public function create_learner_attendance()
		{
			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('class_name', [], ['id' => $id], 'row');
			}
			if (empty($_POST)) {
				$condition = "`trainer_id` IN ('1','$trainer_id')";

				$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

				$this->data['reason']  = $this->common->accessrecord('reason', [], [], 'result_array');

				$this->data['page'] = 'learner-attandance';

				$this->data['content'] = 'pages/learner-attandance/create_learner_attendance';

				$this->load->view('provider/tamplate', $this->data);
			} else {

				if ($id == 0) {

					$date = $this->input->post('date');

					$data = array(
						'learner_name' => $this->input->post('learner_name'),
						'learner_surname' => $this->input->post('learner_surname'),
						'learner_id' => $this->input->post('learner_id'),
						'learnership_id' => $this->input->post('learnship_ids'),
						'sublearnership_id' => $this->input->post('learnership_sub_type_ids'),
						'class_name' => $this->input->post('learner_classname'),
						'date' => $this->input->post('date'),
						'project_manager' => $this->data['projectmanagerid'],
						'organization' => $this->data['organizationid'],
						'trainer' => $trainer_id,
						'reason' => $this->input->post('reason_not_attend'),
					);
					if (!empty($_FILES['doctor_note']['name'])) {

						$path = './uploads/learner/doctor_note/';

						$images = $this->fileupload('doctor_note', $path);

						$data['doctor_note'] = $images;
					}

					$response = $this->common->insertData('learner_absent', $data);

					if ($response) {
						$this->session->set_flashdata('success', 'Learner Absent Added Succesfully');
						redirect('list_learner_attendance');
					} else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect('create_learner_attendance');
					}
				} else {
					$data = array();
					if (!empty($this->input->post('learner_name'))) {
						$data['learner_name'] = $this->input->post('learner_name');
					}
					if (!empty($this->input->post('learner_surname'))) {
						$data['learner_surname'] = $this->input->post('learner_surname');
					}
					if (!empty($this->input->post('learner_id'))) {
						$data['learner_id'] = $this->input->post('learner_id');
					}
					if (!empty($this->input->post('learnship_id'))) {
						$data['learnership_id'] = $this->input->post('learnship_id');
					}
					if (!empty($this->input->post('learnership_sub_type_id'))) {
						$data['sublearnership_id'] = $this->input->post('learnership_sub_type_id');
					}
					if (!empty($this->input->post('learner_classname'))) {
						$data['class_name'] = $this->input->post('learner_classname');
					}
					if (!empty($this->input->post('date'))) {
						$data['date'] = $this->input->post('date');
					}
					if (!empty($this->data['projectmanagerid'])) {
						$data['project_manager'] = $this->data['projectmanagerid'];
					}
					if (!empty($this->data['organizationid'])) {
						$data['organization'] = $this->data['organizationid'];
					}
					if (!empty($_FILES['doctor_note']['name'])) {

						$path = './uploads/learner/doctor_note/';

						$images = $this->fileupload('doctor_note', $path);

						$data['doctor_note'] = $images;
					}
				}
			}
		}

		public function list_learner_attendance()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];

			$this->data['attendance'] = $this->common->accessrecord('learner_absent', [], ['trainer' => $trainer_id], 'result_array');

			$this->data['page'] = 'list_learner_attendance';

			$this->data['content'] = 'pages/learner-attandance/list_learner_attendance';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function get_learnername()
		{

			if (!empty($this->input->post('value'))) {
				$id = $this->input->post('value');
			} else {
				$id = 0;
			}

			// $record = $this->common->accessrecordLearnerjoin('learner', [],  $id, 'result');
			$record = $this->common->get_learnername($id);
			if (!empty($record)) {

				$data = $record;
			} else {
				// $data = $this->db->last_query();

				$data = array('error' => 'Learner not available of this id');
			}

			echo json_encode($data);
		}
		// **********************************BANKING DETAIL********************************************************************

		public function create_banking_detail()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];

			if (empty($_POST)) {
				$condition = "`trainer_id` IN ('1','$trainer_id')";
				$this->data['banklist'] = $this->common->accessrecord('bank', [], ['status' => 1], 'result');

				$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

				$this->data['page'] = 'banking-detail';

				$this->data['content'] = 'pages/banking-detail/create_banking_detail';

				$this->load->view('provider/tamplate', $this->data);
			} else {
				print_r($_POST);

				$data  = array(
					'id_number' => $this->input->post('learner_id'),
					'learner_name' => $this->input->post('learner_name'),
					'learner_surname' => $this->input->post('learner_surname'),
					'learnship_id' => $this->input->post('learnship_id'),
					'learnership_sub_type_id' => $this->input->post('learnership_sub_type_id'),
					'learner_classname' => $this->input->post('learner_classname'),
					'bank_name' => $this->input->post('bank_name'),
					'bank_branch_name' => $this->input->post('bank_branch_name'),
					'account_type' => $this->input->post('account_type'),
					'branch_code' => $this->input->post('branch_code'),
					'account_number' => $this->input->post('account_number'),
					'account_holder_name' => $this->input->post('account_holder_name'),
					'account_holder_surname' => $this->input->post('account_holder_surname'),
					'account_holder_idnumber' => $this->input->post('account_holder_idnumber'),
					'training_provider' => $trainer_id

				);
				if (!empty($_FILES['account_holder_id']['name'])) {

					$data['account_holder_id'] = $this->singlefileupload('account_holder_id', './uploads/bankproof/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				}
				if (!empty($_FILES['account_holder_proof_id']['name'])) {

					$data['account_holder_proof_id'] = $this->singlefileupload('account_holder_proof_id', './uploads/bankproof/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				}


	// print_r($data);die;
				if ($this->common->insertData('learner_bankdetail', $data)) {

					$this->session->set_flashdata('success', 'Insert Successful');

					redirect('list_banking_detail');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('create_banking_detail');
				}
			}
		}
		public function list_banking_detail()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];

			$this->data['bankdetail'] = $this->common->accessrecord('learner_bankdetail', [], ['training_provider' => $trainer_id], 'result_array');
			$this->data['page'] = 'banking-detail';

			$this->data['content'] = 'pages/banking-detail/list_banking_detail';

			$this->load->view('provider/tamplate', $this->data);
		}

		// *****************************************************************************************************************
		public function drop_out()
		{
			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			if ($_GET['id']) {
				$this->data['old_drop_out'] = $this->common->accessrecord('drop_out', [], ['learner_id' => $_GET['id']], 'row');
				// echo '<pre>';print_r($this->data['old_drop_out']);die();
			}
			if ($_POST) {

				if ($learnercheck = $this->common->accessrecord('drop_out', [], ['learner_id' => $_GET['id']], 'row')) {
					if (!empty($_FILES['attachments']['name'])) {
						$path = './uploads/learner/drop_out/';
						$_POST['attachments'] = $this->fileupload('attachments', $path);

						$learner = $this->common->accessrecord('learner', [], ['id' => $_GET['id']], 'row');
						$_POST['learner_id'] = $learner->id;
						$_POST['learner_name'] = $learner->first_name;
						$_POST['learner_surname'] = $learner->surname;
						$_POST['learner_id_number'] = $learner->id_number;
						$_POST['learner_classname'] = $learner->classname;
						$_POST['learnership_sub_type'] = $learner->learnershipSubType;
						$_POST['trainer_id'] = $trainer_id;
						$_POST['organization'] = $this->data['organizationid'];
						$_POST['project_manager'] = $this->data['projectmanagerid'];
						$this->common->updateData('drop_out', $_POST, ['learner_id' => $_GET['id']]);
						$this->common->updateData('learner', ['drop_out' => 1], ['id' => $_GET['id']]);
						$this->session->set_flashdata('success', 'Drop out record updated successfully');
						redirect('provider-drop-out-list');
					}
				} else {
					if (!empty($_FILES['attachments']['name'])) {

						$path = './uploads/learner/drop_out/';

						$_POST['attachments'] = $this->fileupload('attachments', $path);
						$learner = $this->common->accessrecord('learner', [], ['id' => $_GET['id']], 'row');
						$_POST['learner_id'] = $learner->id;
						$_POST['learner_name'] = $learner->first_name;
						$_POST['learner_surname'] = $learner->surname;
						// $_POST['learner_id_number'] = $learner->id_number;
						$_POST['learner_classname'] = $learner->classname;
						$_POST['learnership_sub_type'] = $learner->learnershipSubType;
						$_POST['trainer_id'] = $trainer_id;
						$_POST['organization'] = $this->data['organizationid'];
						$_POST['project_manager'] = $this->data['projectmanagerid'];
						// echo '<pre>';print_r($_POST);die();
					}
					$this->common->insertData('drop_out', $_POST);
					$this->common->updateData('learner', ['drop_out' => 1], ['id' => $_GET['id']]);
					$this->session->set_flashdata('success', 'Drop out record updated successfully');
					redirect('provider-drop-out-list');
				}
			}
			$this->data['page'] = 'providerlearnerList';
			$this->data['content'] = 'pages/drop_out/drop_out';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function provider_drop_out_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {
				$id = $_SESSION['admin']['trainer_id'];
			}
			$trainer  = $this->common->accessrecord('trainer', [], array('id' => $id), 'row');
			$trining_provider = $trainer->company_name;
			$this->data['learner']  = $this->common->learnerdropout($trining_provider);
			// echo '<pre>';print_r($this->data['learner']);die();
			$this->data['page'] = 'providerlearnerList';
			$this->data['content'] = 'pages/drop_out/drop_out_list';
			$this->load->view('provider/tamplate', $this->data);
		}

		public function bring_back_drop_out()
		{

			$this->common->updateData('learner', ['drop_out' => 0], ['id' => $_POST['id']]);

			echo json_encode(array('status' => 200));
		}



















































































































		public function create_user()
		{
			if ($_POST) {
				//echo '<pre>';print_r($_POST);
				$trainer_id = $_SESSION['admin']['trainer_id'];
				$data = array('first_name' => $_POST['first_name'], 'second_name' => $_POST['second_name'], 'designation' => $_POST['designation'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'password' => base64_encode($_POST['password']), 'type' => 'Provider', 'created_by_id' => $trainer_id);

				//echo '<pre>';print_r($_POST['modules']);die();
				if ($ins = $this->common->insertData('sub_user', $data)) {

					// $modules = $_POST['modules'];
					// $modularr['user_id'] = $ins;
					// $modularr['user_type'] = 'Provider';
					// foreach ($modules as $key => $value) {
					// 	//print_r($value);
					// 	if (sizeof($value) > 0) {
					// 		$modularr['module_name'] = $key;
					// 		if ($value !== 'on') {
					// 			$modularr['is_view'] = (in_array('view', $value)) ? 1 : 0;
					// 			$modularr['is_add'] = (in_array('add', $value)) ? 1 : 0;
					// 			$modularr['is_edit'] = (in_array('edit', $value)) ? 1 : 0;
					// 			$modularr['is_delete'] = (in_array('delete', $value)) ? 1 : 0;
					// 		} else {
					// 			$modularr['is_view'] = 0;
					// 			$modularr['is_add'] = 0;
					// 			$modularr['is_edit'] = 0;
					// 			$modularr['is_delete'] = 0;
					// 		}
					// 		$this->common->insertData('user_permission', $modularr);
					// 	} else {
					// 		$this->session->set_flashdata('module_error', 'Please select add permission type (add /edit /delete /view)');
					// 	}
					// }
					$this->session->set_flashdata('success', 'Insert Successful');
					redirect('Provider-User-list');
				} else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('Create-Provider-User');
				}
			}
			$this->data['module'] = $this->common->accessrecord('user_modules', [], ['panel_name' => 'Provider', 'status' => 1], 'result');
			$this->data['page'] = 'create_user';
			$this->data['content'] = 'pages/user/create_user';
			$this->load->view('provider/tamplate', $this->data);
		}






		public function create_learner_information()
		{

			$this->data['page'] = 'learner-information';

			$this->data['content'] = 'pages/learner-information/create_learner_information';

			$this->load->view('provider/tamplate', $this->data);
		}
		public function list_learner_information()
		{

			$this->data['page'] = 'learner-information';

			$this->data['content'] = 'pages/learner-information/list_learner_information';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function create_Dropouts()
		{
			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('class_name', [], ['id' => $id], 'row');
			}

			if (empty($_POST)) {
				$this->data['learner'] = $this->common->accessrecord('learner', [], ['trainer_id' => $trainer_id, 'drop_out' => 0], 'result');

				$this->data['page'] = 'Dropouts';

				$this->data['content'] = 'pages/Dropouts/create_Dropouts';

				$this->load->view('provider/tamplate', $this->data);
			} else {

				if ($id == 0) {

					$data = array();
					$data['learner_id'] = $this->input->post('learner_id');
					$data['reason_for_dropping_out'] = $this->input->post('reason');
					$data['trainer_id'] = $trainer_id;
					$data['organization'] = $this->data['organizationid'];
					$data['project_manager'] = $this->data['projectmanagerid'];
					if (!empty($_FILES['attachments']['name'])) {
						$path = './uploads/learner/drop_out/';
						$data['attachments'] = $this->fileupload('attachments', $path);
					}
					// print_r($data); die;
					$this->common->insertData('drop_out', $data);
					$this->common->updateData('learner', ['drop_out' => 1], ['id' => $this->input->post('learner_id')]);
					$this->session->set_flashdata('success', 'Learner Added to Dropout Successfully');
					redirect('list_Dropouts');
				} else {
				}
			}
		}
		public function list_Dropouts()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];

			$this->data['drop_out'] = $this->common->accessrecord('drop_out', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['page'] = 'Dropouts';

			$this->data['content'] = 'pages/Dropouts/list_Dropouts';

			$this->load->view('provider/tamplate', $this->data);
		}




		public function updatePassword()
		{

			$this->data['page'] = 'updatePassword';

			$this->data['content'] = 'updatePassword';

			$this->form_validation->set_rules('oldpassword', 'Password', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_rules('newpassword', 'Password Confirmation', 'required');

			if ($this->form_validation->run() == false) {

				$this->load->view('provider/tamplate', $this->data);
			} else {

				if ($_POST) {

					extract($_POST);

					if (isset($_SESSION['admin']['trainer_id'])) {

						$id = $_SESSION['admin']['trainer_id'];
					} else {

						$id = '';
					}



					$datau = $this->common->accessrecord(TBL_Trainer_Provider, ['id, password'], array('id' => $id), 'row');

					if ($datau->password == sha1($oldpassword)) {

						$this->common->updateData(TBL_Trainer_Provider, array('password' => sha1($password)), array('id' => $id));

						$this->session->set_flashdata('success', 'Your Password Successfully Update');
					} else {

						$this->session->set_flashdata('error', 'Your Old Password Not Match');
					}
				}

				$this->load->view('provider/tamplate', $this->data);
			}
		}

		public function provider_editprofile()
		{
			if (isset($_SESSION['admin']['trainer_id'])) {
				$id = $_SESSION['admin']['trainer_id'];
			} else {
				$id = '';
			}
			if ($_POST) {
				$data = $_POST;
				if (!empty($_FILES['attach_documents']['name'])) {
					$path = "./uploads/training/attach_documents/";
					$image = $this->MultipleImageUpload($_FILES['attach_documents'], $path, 'attach_documents');
					$company_documents_regi = $this->common->accessrecord('trainer', [], ['id' => $id], 'row');
					$company_image = $company_documents_regi->attach_documents;
					$gallery = "";
					foreach ($image as $value) {
						$gallery .= $value . ",";
					}
					$company_files = rtrim($gallery, ',');
					if (!empty($company_files)) {
						if (!empty($company_image)) {
							$data['attach_documents'] = $company_image . ',' . $company_files;
						} else {
							$data['attach_documents'] = $company_files;
						}
					} else {
						$data['attach_documents'] = $company_image;
					}
				} else {
					$company_documents_regi = $this->common->accessrecord('trainer', [], ['id' => $id], 'row');
					$data['attach_documents'] = $company_documents_regi->attach_documents;
				}

				if (!empty($_FILES['profile_image']['name'])) {

					$data['profile_image'] = $this->singlefileupload('profile_image', './uploads/training/', 'gif|jpg|png|jpeg');
				}

				$district = $this->input->post('district');
				$District = $this->common->one_District($district);
				$data['district'] = $District->name;
				$region = $this->input->post('region');
				$regiondata = $this->common->one_region($region);
				$data['region'] = $regiondata->region;
				$city = $this->input->post('city');
				$citydata = $this->common->one_city($city);
				$data['city'] = $citydata->city;
				if ($this->common->updateData(TBL_Trainer_Provider, $data, ['id' => $id])) {
					if ($_POST['company_name'] != $company_documents_regi->company_name) {
						// echo '<pre>'; print_r($new->training_provider);die();
						$this->common->updateData('learner_marks', array('training_provider' => $_POST['company_name']), ['training_provider' => $company_documents_regi->company_name]);

						$this->common->updateData('attendance', array('training_provider' => $_POST['company_name']), ['training_provider' => $company_documents_regi->company_name]);

						$this->common->updateData('learner', array('trining_provider' => $_POST['company_name']), ['trining_provider' => $company_documents_regi->company_name]);
					}
					$this->session->set_flashdata('success', 'Profile Updated Succesfully');
					redirect('provider-editprofile');
				} else {
					redirect('provider-editprofile');
				}
			} else {
				$this->data['District'] = $this->common->get_District();
				$this->data['province'] = $this->common->get_province();
				$this->data['region'] = $this->common->get_region();
				$this->data['city'] = $this->common->get_city();
				$this->data['project'] = $this->common->accessrecord('project_manager', [], [], 'result');
				$this->data['record'] = $this->common->accessrecord(TBL_Trainer_Provider, [], ['id' => $id], 'row');
				$this->data['page'] = 'editprofile';
				$this->data['content'] = 'pages/myprofile/editprofile';
				$this->load->view('provider/tamplate', $this->data);
			}
		}


		public function learnerListold()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$id = $_SESSION['admin']['trainer_id'];
			}

			$trainer  = $this->common->accessrecord('trainer', [], array('id' => $id), 'row');

			$trainer_nm = $trainer->company_name;

			$this->data['learner']  = $this->common->accessrecord('learner', [], array('trining_provider' => $trainer_nm), 'result');

			$this->data['page'] = 'providerlearnerList';

			$this->data['content'] = 'pages/learner/learner_list';

			$this->load->view('provider/tamplate', $this->data);
		}



		public function createLearnerold()
		{

			$this->data['page'] = 'createLearner';

			$this->data['content'] = 'pages/learner/create_learner';

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->one_learner($id);
			}



			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`created_by`=$trainer_id";

			$this->data['learnershipSubType'] = $this->common->learnershipSubType();

			if ($_POST) {

				//print_r($_POST);die;

				/*$this->form_validation->set_rules('first_name', 'first name', 'required');

			$this->form_validation->set_rules('second_name', 'second name', 'required');

			$this->form_validation->set_rules('surname', 'surname', 'required');

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			$this->form_validation->set_rules('mobile', 'mobile', 'required|integer|max_length[9]');

			$this->form_validation->set_rules('mobile_number', 'mobile_number', 'integer|max_length[9]');

			$this->form_validation->set_rules('id_number', 'ID number', 'integer');

			$this->form_validation->set_rules('SETA', 'SETA', 'integer');

			$this->form_validation->set_rules('province', 'province', 'required');

			$this->form_validation->set_rules('district', 'district', 'required');

			$this->form_validation->set_rules('city', 'city', 'required');

			$this->form_validation->set_rules('Suburb', 'Suburb', 'required');

			$this->form_validation->set_rules('Street_name', 'Street_name', 'required');

			$this->form_validation->set_rules('Street_number', 'Street_number', 'required');

			if (empty($_GET['id'])) {

				$this->form_validation->set_rules('password', 'password', 'required|max_length[8]|min_length[5]');

			}

			if ($this->form_validation->run() == FALSE){ }

            else

            {*/

				$data = $_POST;

				$data['organization'] = $this->data['organizationid'];

				$data['project_manager'] = $this->data['projectmanagerid'];

				$district = $this->input->post('district');

				$District = $this->common->one_District($district);

				$data['district'] = $District->name;

				$region = $this->input->post('region');

				$regiondata = $this->common->one_region($region);

				$data['region'] = $regiondata->region;

				$city = $this->input->post('city');

				$citydata = $this->common->one_city($city);

				$data['city'] = $citydata->city;

				if ($id != 0) {

					if (!empty($_FILES['id_copy']['name'])) {

						$path = './uploads/learner/id_copy/';

						$images = $this->fileupload('id_copy', $path);

						$data['id_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['id_copy'] = $learner->id_copy;
					}

					if (!empty($_FILES['certificate_copy']['name'])) {

						$path = './uploads/learner/certificate_copy/';

						$images = $this->fileupload('certificate_copy', $path);

						$data['certificate_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['certificate_copy'] = $learner->certificate_copy;
					}

					if (!empty($_FILES['contract_copy']['name'])) {

						$path = './uploads/learner/contract_copy/';

						$images = $this->fileupload('contract_copy', $path);

						$data['contract_copy'] = $images;
					} else {

						$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

						$data['contract_copy'] = $learner->contract_copy;
					}

					$password = $_POST['password'];

					if ($learner = $this->common->accessrecord('learner', [], ['id' => $id, 'password' => $password], 'row')) {

						$old_password = $learner->password;

						if ($old_password == $password) {

							$data['password'] = $old_password;
						} else {

							$data['password'] = sha1($_POST['password']);
						}
					} else {

						$data['password'] = sha1($_POST['password']);
					}

					// $trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

					$data['trining_provider'] = $trainer_id;



					$this->common->update_learner($id, $data);

					$this->session->set_flashdata('success', 'Trainee updated Succesfully');



					redirect('learner-list');
				} else {

					if (!empty($_FILES['id_copy']['name'])) {

						$path = './uploads/learner/id_copy/';

						$images = $this->fileupload('id_copy', $path);

						$data['id_copy'] = $images;
					} else {

						$data['id_copy'] = "";
					}

					if (!empty($_FILES['certificate_copy']['name'])) {

						$path = './uploads/learner/certificate_copy/';

						$images = $this->fileupload('certificate_copy', $path);

						$data['certificate_copy'] = $images;
					} else {

						$data['certificate_copy'] = "";
					}

					if (!empty($_FILES['contract_copy']['name'])) {

						$path = './uploads/learner/contract_copy/';

						$images = $this->fileupload('contract_copy', $path);

						$data['contract_copy'] = $images;
					} else {

						$data['contract_copy'] = "";
					}

					if (isset($_SESSION['admin']['trainer_id'])) {

						$trainer_id = $_SESSION['admin']['trainer_id'];
					}

					$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

					$data['trining_provider'] = $trainer->company_name;

					$data['password'] = sha1($_POST['password']);

					$training = $this->common->save_learner($data);

					$this->session->set_flashdata('success', 'Learner Added successful');

					redirect('learner-list');
				}

				//}

			}

			$this->data['classname'] = $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			$this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['training'] = $this->common->get_training();

			$this->load->view('provider/tamplate', $this->data);
		}


		public function rejected_learnerList()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$id = $_SESSION['admin']['trainer_id'];
			}

			$trainer  = $this->common->accessrecord('trainer', [], array('id' => $id), 'row');

			$trainer_nm = $trainer->company_name;

			// $this->data['learner']  = $this->common->accessrecord('learner', [], array('trining_provider'=>$trainer_nm,'learner_accepted_training'=>''), 'result');
			$this->data['learner'] = $this->common->getTrainingRejectedLerner($trainer_nm);
			$this->data['page'] = 'providerlearnerList';
			$this->data['pagename'] = 'Learners Not Accepted';

			$this->data['content'] = 'pages/learner/learner_list';

			$this->load->view('provider/tamplate', $this->data);
		}
		public function dopout_learnerList()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$id = $_SESSION['admin']['trainer_id'];
			}

			$trainer  = $this->common->accessrecord('trainer', [], array('id' => $id), 'row');

			$trainer_nm = $trainer->company_name;

			$this->data['learner']  = $this->common->accessrecord('learner', [], array('trining_provider' => $trainer_nm, 'drop_out' => 1), 'result');

			$this->data['page'] = 'providerlearnerList';

			$this->data['content'] = 'pages/learner/learner_list';

			$this->load->view('provider/tamplate', $this->data);
		}















		public function manageUnit()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}



			$condition = ['created_by' => $trainer_id];

			$this->data['units'] = $this->common->accessrecord('units', [], $condition, 'result');

			$this->data['page'] = 'providerunitList';

			$this->data['content'] = 'pages/manage-unit/unit-list';

			$this->load->view('provider/tamplate', $this->data);
		}



		public function createUnit()
		{
			$this->data['page'] = 'createUnit';
			$this->data['content'] = 'pages/manage-unit/create_unit';
			if (isset($_GET['uid'])) {
				$unitid = $_GET['uid'];
				$this->data['units'] = $this->common->accessrecord('units', [], array('id' => $unitid), 'row');
			}
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('total_credits', 'Credits', 'required');
			$this->form_validation->set_rules('unit_standard_type', 'Unit Standard Type', 'required');
			$this->form_validation->set_rules('standard_id', 'Standard ID', 'required');
			if (isset($_POST)) {
				if ($this->form_validation->run() == FALSE) {
				} else {
					$data = $_POST;
					if (!empty($unitid)) {
						$this->common->update_learner_tr('units', array('id' => $unitid), $data);
						$this->session->set_flashdata('success', 'Unit updated Succesfully');
						redirect('manage-unit');
					} else {
						if (isset($_SESSION['admin']['trainer_id'])) {
							$trainer_id = $_SESSION['admin']['trainer_id'];
						} else {
							$trainer_id = '';
						}
						$data['created_by'] = $trainer_id;
						$data['user_type'] = 2;
						// print_r($data); die;
						$training = $this->common->save_learner_tr('units', $data);
						$this->session->set_flashdata('success', 'Unit add Succesfully');
						redirect('manage-unit');
					}
				}
			}
			$this->load->view('provider/tamplate', $this->data);
		}

		public function get_destrict()
		{
			$data = $_POST;
			$District = $this->common->get_District_province($data);
			print_r(json_encode($District));
		}



		public function get_region()
		{

			$data = $_POST;

			$region = $this->common->get_region_District($data);

			print_r(json_encode($region));
		}

		public function get_city()
		{

			$data = $_POST;

			$region = $this->common->get_region_city($data);

			print_r(json_encode($region));
		}


		/*=================delete record============= */

		function deletedata()
		{

			$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
		}

		/*=================end delete record============= */

		public function logout()
		{

			$this->session->unset_userdata("trainer");

			$this->session->sess_destroy();

			redirect('Traningprovider');
		}



		private function fileupload($image, $path)
		{

			$config['upload_path']          = $path;

			$config['allowed_types']        = '*';

			$config['encrypt_name']         = TRUE;

			$config['remove_spaces']        = TRUE;

			$config['detect_mime']          = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload($image)) {

				echo  $this->upload->display_errors();
				die;
			} else {

				$data = $this->upload->data();

				$image = $data['file_name'];

				return $image;
			}
		}

		private function MultipleImageUpload($files, $path, $title)
		{

			$tempp = array_filter($files['name']);

			$config = array(

				'upload_path'   => $path,

				'allowed_types' => 'jpg|gif|png|jpeg',

				'overwrite'     => 1,

			);

			$this->load->library('upload', $config);

			$images = array();

			foreach ($tempp as $key => $image) {

				$_FILES['images[]']['name'] = $files['name'][$key];

				$_FILES['images[]']['type'] = $files['type'][$key];

				$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];

				$_FILES['images[]']['error'] = $files['error'][$key];

				$_FILES['images[]']['size'] = $files['size'][$key];



				$explode = explode('.', $image);

				$fileName = time() . '_' . $key . '.' . end($explode);

				$images[] = $fileName;

				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('images[]')) {

					$this->upload->data();
				} else {

					return false;
				}
			}

			return $images;
		}

		public function acreditationsfiledelete()
		{

			$table = $_POST['table'];

			$id = $_POST['id'];

			$file_index = $_POST['file_index'];

			$acreditations_img = $this->common->accessrecord($table, [], ['id' => $id], 'row');

			$image_file = unserialize($acreditations_img->acreditations_file);

			foreach ($image_file as  $key => $value) {

				$image_id = $value['id'];

				if ($image_id == $file_index) {
				} else {

					$data[] = $value;
				}
			}

			foreach ($data as $key_one => $value_one) {

				$data[$key_one]['id'] = $key_one;
			}

			$file = serialize($data);

			$result = $this->common->updateData($table, ['acreditations_file' => $file], ['id' => $id]);

			if ($result) {

				echo "true";
			}
		}

		public function provider_import_learner()
		{

			$this->data['page'] = 'import_learner';

			$this->data['content'] = 'pages/learner/import_learner';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function provider_import_dataold()
		{

			$path = './uploads/learner/import_learner/';

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'xls';

			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('learner')) {

				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('provider-import-learner');
			} else {

				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {

				$import_xls_file = $data['upload_data']['file_name'];
			} else {

				$import_xls_file = 0;
			}

			$inputFileName = $path . $import_xls_file;

			try {

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {

				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)

					. '": ' . $e->getMessage());
			}

			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, null);

			$arrayCount = count($allDataInSheet);

			$flag = 0;

			$createArray = array('TrainingProviderName', 'LearnerFullName', 'LearnerSurnameName', 'Email', 'IdNumber', 'SETA', 'PrimaryMobileNumber', 'SecondaryMobileNumber', 'Gender', 'LearnershipSubType', 'Password', 'Province', 'District', 'City', 'Region', 'Suburb', 'StreetName', 'StreetNumber', 'Assessment', 'IsDisable', 'UifBenefits', 'LearnerAcceptedforTraining', 'ClassName');

			$makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName', 'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email', 'IdNumber' => 'IdNumber', 'SETA' => 'SETA', 'PrimaryMobileNumber' => 'PrimaryMobileNumber', 'SecondaryMobileNumber' => 'SecondaryMobileNumber', 'Gender' => 'Gender', 'LearnershipSubType' => 'LearnershipSubType', 'Password' => 'Password', 'Province' => 'Province', 'District' => 'District', 'City' => 'City', 'Region' => 'Region', 'Suburb' => 'Suburb', 'StreetName' => 'StreetName', 'StreetNumber' => 'StreetNumber', 'Assessment' => 'Assessment', 'IsDisable' => 'IsDisable', 'UifBenefits' => 'UifBenefits', 'LearnerAcceptedforTraining' => 'LearnerAcceptedforTraining', 'ClassName' => 'ClassName');

			$SheetDataKey = array();

			foreach ($allDataInSheet as $dataInSheet) {

				foreach ($dataInSheet as $key => $value) {

					if (in_array(trim($value), $createArray)) {

						$value = preg_replace('/\s+/', '', $value);

						$SheetDataKey[trim($value)] = $key;
					} else {
					}
				}
			}

			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {

				$flag = 1;
			}

			if ($flag == 1) {

				for ($i = 2; $i <= $arrayCount; $i++) {

					$addresses = array();

					$company_name = $SheetDataKey['TrainingProviderName'];

					$first_name = $SheetDataKey['LearnerFullName'];

					//$second_name = $SheetDataKey['LearnerSecondName'];

					$classname = $SheetDataKey['ClassName'];

					$surname = $SheetDataKey['LearnerSurnameName'];

					$email = $SheetDataKey['Email'];

					$mobile = $SheetDataKey['PrimaryMobileNumber'];

					$mobile_number = $SheetDataKey['SecondaryMobileNumber'];

					$assessment = $SheetDataKey['Assessment'];

					$disable = $SheetDataKey['IsDisable'];

					$utf_benefits = $SheetDataKey['UifBenefits'];

					$learner_accepted_training = $SheetDataKey['LearnerAcceptedforTraining'];

					$learnershipSubType = $SheetDataKey['LearnershipSubType'];

					$id_number = $SheetDataKey['IdNumber'];

					$SETA = $SheetDataKey['SETA'];

					$province = $SheetDataKey['Province'];

					$district = $SheetDataKey['District'];

					$city = $SheetDataKey['City'];

					$region = $SheetDataKey['Region'];

					$Suburb = $SheetDataKey['Suburb'];

					$Street_name = $SheetDataKey['StreetName'];

					$Street_number = $SheetDataKey['StreetNumber'];

					$password = $SheetDataKey['Password'];

					$gender = $SheetDataKey['Gender'];





					$company_name = filter_var(trim($allDataInSheet[$i][$company_name]), FILTER_SANITIZE_STRING);

					if (empty($company_name)) {

						$this->session->set_flashdata('error', 'Please Enter your training provider');

						redirect('provider-import-learner');
					}

					$first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);

					if (empty($first_name)) {

						$this->session->set_flashdata('error', 'Please enter your full name');

						redirect('provider-import-learner');
					}

					//$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);

					$surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);

					if (empty($surname)) {

						$this->session->set_flashdata('error', 'Please enter your surname');

						redirect('provider-import-learner');
					}

					$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);

					if (empty($email)) {

						$this->session->set_flashdata('error', 'Please enter your email');

						redirect('provider-import-learner');
					}

					$mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);

					if (empty($mobile)) {

						$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');

						redirect('provider-import-learner');
					}

					$mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);

					if (empty($mobile_number)) {

						$this->session->set_flashdata('error', 'Please enter your second cellphone number');

						redirect('provider-import-learner');
					}

					$assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);

					if (empty($assessment)) {

						$this->session->set_flashdata('error', 'Please enter your assessment status');

						redirect('provider-import-learner');
					}

					$disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);

					if (empty($disable)) {

						$this->session->set_flashdata('error', 'Please enter your disabled');

						redirect('provider-import-learner');
					}

					$utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);

					if (empty($utf_benefits)) {

						$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');

						redirect('provider-import-learner');
					}

					$learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);

					if (empty($learner_accepted_training)) {

						$this->session->set_flashdata('error', 'Please enter your learner accepted training');

						redirect('provider-import-learner');
					}

					$learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);

					if (empty($learnershipSubType)) {

						$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');

						redirect('provider-import-learner');
					}

					$id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);

					if (empty($id_number)) {

						$this->session->set_flashdata('error', 'Please enter your id number');

						redirect('provider-import-learner');
					}

					$SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);

					if (empty($SETA)) {

						$this->session->set_flashdata('error', 'Please enter your SETA');

						redirect('provider-import-learner');
					}

					$province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);

					if (empty($province)) {

						$this->session->set_flashdata('error', 'Please enter your province');

						redirect('provider-import-learner');
					}

					$district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);

					if (empty($district)) {

						$this->session->set_flashdata('error', 'Please enter your district');

						redirect('provider-import-learner');
					}

					$city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);

					if (empty($city)) {

						$this->session->set_flashdata('error', 'Please enter your city');

						redirect('provider-import-learner');
					}

					$region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);

					if (empty($region)) {

						$this->session->set_flashdata('error', 'Please enter your region');

						redirect('provider-import-learner');
					}

					$Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);

					if (empty($Suburb)) {

						$this->session->set_flashdata('error', 'Please enter your Suburb');

						redirect('provider-import-learner');
					}

					$Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);

					if (empty($Street_name)) {

						$this->session->set_flashdata('error', 'Please enter your street name');

						redirect('provider-import-learner');
					}

					$Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);

					if (empty($Street_number)) {

						$this->session->set_flashdata('error', 'Please enter your street number');

						redirect('provider-import-learner');
					}

					$password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);

					if (empty($password)) {

						$this->session->set_flashdata('error', 'Please enter your password');

						redirect('provider-import-learner');
					}

					$gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);

					if (empty($gender)) {

						$this->session->set_flashdata('error', 'Please enter your gender');

						redirect('provider-import-learner');
					}

					$classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);

					if (empty($classname)) {

						$this->session->set_flashdata('error', 'Please enter your class name');

						redirect('provider-import-learner');
					}



					$fetchData[] = array('trining_provider' => $company_name, 'first_name' => $first_name,  'surname' => $surname, 'email' => $email, 'mobile' => $mobile, 'mobile_number' => $mobile_number, 'assessment' => $assessment, 'disable' => $disable, 'utf_benefits' => $utf_benefits, 'learner_accepted_training' => $learner_accepted_training, 'learnershipSubType' => $learnershipSubType, 'id_number' => $id_number, 'SETA' => $SETA, 'province' => $province, 'district' => $district, 'city' => $city, 'region' => $region, 'Suburb' => $Suburb, 'Street_name' => $Street_name, 'Street_number' => $Street_number, 'password' => sha1($password), 'gender' => $gender, 'classname' => $classname);
				}

				$data['employeeInfo'] = $fetchData;

				$this->common->setBatchImport($fetchData);

				$this->common->importData();
			} else {

				$this->session->set_flashdata('error', "Please import correct file");

				redirect('provider-import-learner');
			}

			redirect('learner-list');
		}

		public function provider_import_data2()
		{

			$path = './uploads/learner/import_learner/';

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'xlsx|xls|ods';

			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('learner')) {

				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('provider-import-learner');
			} else {

				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {

				$import_xls_file = $data['upload_data']['file_name'];
			} else {

				$import_xls_file = 0;
			}

			$inputFileName = $path . $import_xls_file;

			try {

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {

				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)

					. '": ' . $e->getMessage());
			}

			/* $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,null);*/

			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, null);

			$arrayCount = count($allDataInSheet);

			$flag = 0;

			$createArray = array('TrainingProviderName', 'LearnerFullName', 'LearnerSurnameName', 'Email', 'IdNumber', 'SETA', 'PrimaryMobileNumber', 'SecondaryMobileNumber', 'Gender', 'LearnershipSubType', 'Password', 'Province', 'District', 'City', 'Region', 'Suburb', 'StreetName', 'StreetNumber', 'Assessment', 'IsDisable', 'UifBenefits', 'LearnerAcceptedforTraining', 'ClassName', 'EmployerName', 'BankName', 'BankAccountType', 'BankAccountNumber', 'BranchName', 'BranchCode');

			$makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email', 'IdNumber' => 'IdNumber', 'SETA' => 'SETA', 'PrimaryMobileNumber' => 'PrimaryMobileNumber', 'SecondaryMobileNumber' => 'SecondaryMobileNumber', 'Gender' => 'Gender', 'LearnershipSubType' => 'LearnershipSubType', 'Password' => 'Password', 'Province' => 'Province', 'District' => 'District', 'City' => 'City', 'Region' => 'Region', 'Suburb' => 'Suburb', 'StreetName' => 'StreetName', 'StreetNumber' => 'StreetNumber', 'Assessment' => 'Assessment', 'IsDisable' => 'IsDisable', 'UifBenefits' => 'UifBenefits', 'LearnerAcceptedforTraining' => 'LearnerAcceptedforTraining', 'ClassName' => 'ClassName', 'EmployerName' => 'EmployerName', 'BankName' => 'BankName', 'BankAccountType' => 'BankAccountType', 'BankAccountNumber' => 'BankAccountNumber', 'BranchName' => 'BranchName', 'BranchCode' => 'BranchCode');
			// print_r($makeArray);die;
			$SheetDataKey = array();

			foreach ($allDataInSheet as $dataInSheet) {

				foreach ($dataInSheet as $key => $value) {

					if (in_array(trim($value), $createArray)) {

						$value = preg_replace('/\s+/', '', $value);

						$SheetDataKey[trim($value)] = $key;
					} else {
					}
				}
			}

			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {

				$flag = 1;
			}

			if ($flag == 1) {

				for ($i = 2; $i <= $arrayCount; $i++) {

					$addresses = array();

					$company_name = $SheetDataKey['TrainingProviderName'];

					$employer_name = $SheetDataKey['EmployerName'];

					$bank_name = $SheetDataKey['BankName'];

					$bank_account_type = $SheetDataKey['BankAccountType'];

					$bank_account_number = $SheetDataKey['BankAccountNumber'];

					$branch_name = $SheetDataKey['BranchName'];

					$branch_code = $SheetDataKey['BranchCode'];

					$first_name = $SheetDataKey['LearnerFullName'];

					//$second_name = $SheetDataKey['LearnerSecondName'];

					$classname = $SheetDataKey['ClassName'];

					$surname = $SheetDataKey['LearnerSurnameName'];

					$email = $SheetDataKey['Email'];

					$mobile = $SheetDataKey['PrimaryMobileNumber'];

					$mobile_number = $SheetDataKey['SecondaryMobileNumber'];

					$assessment = $SheetDataKey['Assessment'];

					$disable = $SheetDataKey['IsDisable'];

					$utf_benefits = $SheetDataKey['UifBenefits'];

					$learner_accepted_training = $SheetDataKey['LearnerAcceptedforTraining'];

					$learnershipSubType = $SheetDataKey['LearnershipSubType'];

					$id_number = $SheetDataKey['IdNumber'];

					$SETA = $SheetDataKey['SETA'];

					$province = $SheetDataKey['Province'];

					$district = $SheetDataKey['District'];

					$city = $SheetDataKey['City'];

					$region = $SheetDataKey['Region'];

					$Suburb = $SheetDataKey['Suburb'];

					$Street_name = $SheetDataKey['StreetName'];

					$Street_number = $SheetDataKey['StreetNumber'];

					$password = $SheetDataKey['Password'];

					$gender = $SheetDataKey['Gender'];



					$employer_name = filter_var(trim($allDataInSheet[$i][$employer_name]), FILTER_SANITIZE_STRING);

					if (empty($employer_name)) {

						$this->session->set_flashdata('error', 'Please enter your employer name');

						redirect('provider-import-learner');
					}

					$bank_name = filter_var(trim($allDataInSheet[$i][$bank_name]), FILTER_SANITIZE_STRING);

					if (empty($bank_name)) {

						$this->session->set_flashdata('error', 'Please enter your bank name');

						redirect('provider-import-learner');
					}



					$branch_code = filter_var(trim($allDataInSheet[$i][$branch_code]), FILTER_SANITIZE_STRING);

					if (empty($branch_code)) {

						$this->session->set_flashdata('error', 'Please enter your branch code');

						redirect('provider-import-learner');
					}



					$bank_account_type = filter_var(trim($allDataInSheet[$i][$bank_account_type]), FILTER_SANITIZE_STRING);

					if (empty($bank_account_type)) {

						$this->session->set_flashdata('error', 'Please enter your bank account type');

						redirect('provider-import-learner');
					}



					$bank_account_number = filter_var(trim($allDataInSheet[$i][$bank_account_number]), FILTER_SANITIZE_STRING);

					if (empty($bank_account_number)) {

						$this->session->set_flashdata('error', 'Please enter your bank account number');

						redirect('provider-import-learner');
					}



					$branch_name = filter_var(trim($allDataInSheet[$i][$branch_name]), FILTER_SANITIZE_STRING);

					if (empty($branch_name)) {

						$this->session->set_flashdata('error', 'Please enter your branch name');

						redirect('provider-import-learner');
					}



					$company_name = filter_var(trim($allDataInSheet[$i][$company_name]), FILTER_SANITIZE_STRING);

					if (empty($company_name)) {

						$this->session->set_flashdata('error', 'Please Enter your training provider');

						redirect('provider-import-learner');
					}

					$first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);

					if (empty($first_name)) {

						$this->session->set_flashdata('error', 'Please enter your full name');

						redirect('provider-import-learner');
					}

					//$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);

					$surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);

					if (empty($surname)) {

						$this->session->set_flashdata('error', 'Please enter your surname');

						redirect('provider-import-learner');
					}

					$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);

					if (empty($email)) {

						$this->session->set_flashdata('error', 'Please enter your email');

						redirect('provider-import-learner');
					}

					$mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);

					if (empty($mobile)) {

						$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');

						redirect('provider-import-learner');
					}

					$mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);

					if (empty($mobile_number)) {

						$this->session->set_flashdata('error', 'Please enter your second cellphone number');

						redirect('provider-import-learner');
					}

					$assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);

					if (empty($assessment)) {

						$this->session->set_flashdata('error', 'Please enter your assessment status');

						redirect('provider-import-learner');
					}

					$disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);

					if (empty($disable)) {

						$this->session->set_flashdata('error', 'Please enter your disabled');

						redirect('provider-import-learner');
					}

					$utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);

					if (empty($utf_benefits)) {

						$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');

						redirect('provider-import-learner');
					}

					$learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);

					if (empty($learner_accepted_training)) {

						$this->session->set_flashdata('error', 'Please enter your learner accepted training');

						redirect('provider-import-learner');
					}

					$learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);

					if (empty($learnershipSubType)) {

						$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');

						redirect('provider-import-learner');
					}

					$id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);

					if (empty($id_number)) {

						$this->session->set_flashdata('error', 'Please enter your id number');

						redirect('provider-import-learner');
					}

					$SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);

					if (empty($SETA)) {

						$this->session->set_flashdata('error', 'Please enter your SETA');

						redirect('provider-import-learner');
					}

					$province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);

					if (empty($province)) {

						$this->session->set_flashdata('error', 'Please enter your province');

						redirect('provider-import-learner');
					}

					$district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);

					if (empty($district)) {

						$this->session->set_flashdata('error', 'Please enter your district');

						redirect('provider-import-learner');
					}

					$city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);

					if (empty($city)) {

						$this->session->set_flashdata('error', 'Please enter your city');

						redirect('provider-import-learner');
					}

					$region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);

					if (empty($region)) {

						$this->session->set_flashdata('error', 'Please enter your region');

						redirect('provider-import-learner');
					}

					$Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);

					if (empty($Suburb)) {

						$this->session->set_flashdata('error', 'Please enter your Suburb');

						redirect('provider-import-learner');
					}

					$Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);

					if (empty($Street_name)) {

						$this->session->set_flashdata('error', 'Please enter your street name');

						redirect('provider-import-learner');
					}

					$Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);

					if (empty($Street_number)) {

						$this->session->set_flashdata('error', 'Please enter your street number');

						redirect('provider-import-learner');
					}

					$password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);

					if (empty($password)) {

						$this->session->set_flashdata('error', 'Please enter your password');

						redirect('provider-import-learner');
					}

					$gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);

					if (empty($gender)) {

						$this->session->set_flashdata('error', 'Please enter your gender');

						redirect('provider-import-learner');
					}

					$classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);

					if (empty($classname)) {

						$this->session->set_flashdata('error', 'Please enter your class name');

						redirect('provider-import-learner');
					}



					$fetchData[] = array('trining_provider' => $company_name, 'first_name' => $first_name,  'surname' => $surname, 'email' => $email, 'mobile' => $mobile, 'mobile_number' => $mobile_number, 'assessment' => $assessment, 'disable' => $disable, 'utf_benefits' => $utf_benefits, 'learner_accepted_training' => $learner_accepted_training, 'learnershipSubType' => $learnershipSubType, 'id_number' => $id_number, 'SETA' => $SETA, 'province' => $province, 'district' => $district, 'city' => $city, 'region' => $region, 'Suburb' => $Suburb, 'Street_name' => $Street_name, 'Street_number' => $Street_number, 'password' => sha1($password), 'gender' => $gender, 'classname' => $classname, 'employer_name' => $employer_name, 'bank_name' => $bank_name, 'bank_account_type' => $bank_account_type, 'bank_account_number' => $bank_account_number, 'branch_name' => $branch_name, 'branch_code' => $branch_code);
				}

				$data['employeeInfo'] = $fetchData;

				$this->common->setBatchImport($fetchData);

				$this->common->importData();
			} else {

				$this->session->set_flashdata('error', "Please import correct file");

				redirect('provider-import-learner');
			}

			redirect('learner-list');
		}

		 /*************************Download CSv xls*******************************/
    //Demo CSV download******************************
    public function provider_download_csv_data() {
        // file name
		$filename = 'LearnerSheetDemo' . date('Y-m-d') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: Question-List/csv; ");
        // get data
        $file = fopen('php://output', 'w');
        $header = array("TrainingProviderName", "LearnerFullName", "LearnerSurnameName", "Email", "IdNumber", "SETA", "PrimaryMobileNumber", "SecondaryMobileNumber", "Gender", "LearnershipSubType", "Password", "Province", "District", "City", "Municipality", "Suburb", "StreetName", "StreetNumber", "Assessment", "IsDisable", "UifBenefits","LearnerAcceptedforTraining","ClassName");
        fputcsv($file, $header);
        fclose($file);
        exit;
	}


    /*************************upload CSv xls*******************************/
    //Import Learner Via CSV Upload ******************************
    public function provider_import_data() {


            // if (empty($_FILES['uploadFile'])) {
            //     $this->form_validation->set_rules('uploadFile', 'UploadFile', 'required');
            // }
            // if ($this->form_validation->run() == true) {
                $fileExt = pathinfo($_FILES["learner"]["name"], PATHINFO_EXTENSION);
                if ($fileExt == 'csv') {

                    $csv = $_FILES['learner']['tmp_name'];
                    $handle = fopen($csv, "r");
                    $flag = true;
                    while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
                    {
                        if ($flag) {
                            $flag = false;
                            continue;
                        } // remove first line of CSV
                        if ($row[0] == NULL) //remove empty line of csv file
						continue;

						$company_name = trim($row[0]);
						if (empty($company_name)) {
							$this->session->set_flashdata('error', 'Please Enter your training provider');
							redirect('provider-import-learner');

						}
						$first_name = trim($row[1]);
						if (empty($first_name)) {
							$this->session->set_flashdata('error', 'Please enter your full name');
							redirect('provider-import-learner');

						}
						$surname = trim($row[2]);
						if (empty($surname)) {
							$this->session->set_flashdata('error', 'Please enter your surname');
							redirect('provider-import-learner');

						}

						$email =  trim($row[3]);
						if (empty($email)) {
							$this->session->set_flashdata('error', 'Please enter your email');
							redirect('provider-import-learner');

						}
						$id_number = trim($row[4]);
						if (empty($id_number)) {

							$this->session->set_flashdata('error', 'Please enter your id number');

							redirect('provider-import-learner');

						}

						$SETA = trim($row[5]);

						if (empty($SETA)) {

							$this->session->set_flashdata('error', 'Please enter your SETA');

							redirect('provider-import-learner');

						}
						$mobile = trim($row[6]);
						if (empty($mobile)) {
							$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');
							redirect('provider-import-learner');

						}
						$mobile_number = trim($row[7]);
						if (empty($mobile_number)) {
							$this->session->set_flashdata('error', 'Please enter your second cellphone number');
							redirect('provider-import-learner');

						}

						$gender = trim($row[8]);

					if (empty($gender)) {

						$this->session->set_flashdata('error', 'Please enter your gender');

						redirect('provider-import-learner');

					}

					$learnershipSubType = trim($row[9]);
					if (empty($learnershipSubType)) {
						$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');
						redirect('provider-import-learner');

					}
					$password = trim($row[10]);

					if (empty($password)) {

						$this->session->set_flashdata('error', 'Please enter your password');

						redirect('provider-import-learner');

					}


					$province = trim($row[11]);

					if (empty($province)) {

						$this->session->set_flashdata('error', 'Please enter your province');

						redirect('provider-import-learner');

					}

					$district = trim($row[12]);

					if (empty($district)) {

						$this->session->set_flashdata('error', 'Please enter your district');

						redirect('provider-import-learner');
					}

					$city = trim($row[13]);

					if (empty($city)) {

						$this->session->set_flashdata('error', 'Please enter your city');

						redirect('provider-import-learner');

					}

					$municipality = trim($row[14]);

					if (empty($municipality)) {

						$this->session->set_flashdata('error', 'Please enter your municipality');

						redirect('provider-import-learner');

					}


					$Suburb = trim($row[15]);

					if (empty($Suburb)) {

						$this->session->set_flashdata('error', 'Please enter your Suburb');

						redirect('provider-import-learner');

					}

					$Street_name = trim($row[16]);

					if (empty($Street_name)) {

						$this->session->set_flashdata('error', 'Please enter your street name');

						redirect('provider-import-learner');

					}

					$Street_number = trim($row[17]);

					if (empty($Street_number)) {

						$this->session->set_flashdata('error', 'Please enter your street number');

						redirect('provider-import-learner');

					}


					$assessment = trim($row[18]);
					if (empty($assessment)) {
						$this->session->set_flashdata('error', 'Please enter your assessment status');
						redirect('provider-import-learner');

					}
					$disable = trim($row[19]);
					if (empty($disable)) {
						$this->session->set_flashdata('error', 'Please enter your disabled');
						redirect('provider-import-learner');

					}

					$utf_benefits = trim($row[20]);
					if (empty($utf_benefits)) {
						$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');
						redirect('provider-import-learner');

					}
					$learner_accepted_training = trim($row[21]);
					if (empty($learner_accepted_training)) {
						$this->session->set_flashdata('error', 'Please enter your learner accepted training');
						redirect('provider-import-learner');

				}





					//  $classname = trim($row[22]);
					//   if(empty($classname)){
					// 	  $this->session->set_flashdata('error','Please enter your class name');
					// 	   redirect('provider-import-learner');
					// 	 }

						// $data = array(
						//    'trining_provider' => trim($row[0]),
						//    'first_name' => trim($row[1]),
						//    'surname' => trim($row[2]),
						//    'email' => trim($row[3]),
						//    'mobile' => trim($row[4]),
						//    'mobile_number' => trim($row[5]),
						//    'assessment' => trim($row[6]),
						//    'disable' => trim($row[7]),
						//    'utf_benefits' => trim($row[8]),
						//    'learner_accepted_training' => trim($row[9]),
						//    'learnershipSubType' => trim($row[10]),
						//    'id_number' => trim($row[11]),
						//    'SETA' => trim($row[12]),
						//    'province' => trim($row[13]),
						//    'district' => trim($row[14]),
						//    'city' => trim($row[15]),
						//    'municipality' => trim($row[16]),
						//    'Suburb' => trim($row[17]),
						//    'Street_name' => trim($row[18]),
						//    'Street_number' => trim($row[19]),
						//    'password' => sha1(trim($row[20])),
						//    'gender' => trim($row[21]),
						//    'classname' => trim($row[22]),
						//    'employer_name' => trim($row[23]),
						//    'bank_name' => trim($row[24]),
						//    'bank_account_type' => trim($row[25]),
						//    'branch_name' => trim($row[26]),
						//    'branch_code' => trim($row[27]),


						// );
						$data = array(
							'trining_provider' => $company_name,
							'first_name' => $first_name,
							'surname' => $surname,
							'email' => $email,
							'mobile' => $mobile,
							'mobile_number' => $mobile_number,
							'assessment' => $assessment,
							'disable' => $disable,
							'utf_benefits' => $utf_benefits,
							'learner_accepted_training' => $learner_accepted_training,
							'learnershipSubType' => $learnershipSubType,
							'id_number' => $id_number,
							'SETA' => $SETA,
							'province' => $province,
							'district' => $district,
							'city' => $city,
							'municipality' => $municipality,
							'Suburb' => $Suburb,
							'Street_name' => $Street_name,
							'Street_number' =>$Street_number,
							'password' => sha1($password),
							'gender' => $gender,
							'classname' => trim($row[22]),
							// 'employer_name' => trim($row[23]),
							// 'bank_name' => trim($row[24]),
							// 'bank_account_type' => trim($row[25]),
							// 'branch_name' => trim($row[26]),
							// 'branch_code' => trim($row[27]),


						 );




						//    $fetchData[] = array('trining_provider' => $company_name,
						//    'first_name' => $first_name,
						//    'surname' => $surname,
						//    'email' => $email,
						//    'mobile' => $mobile,
						//    'mobile_number' => $mobile_number,
						//    'assessment' => $assessment,
						//    'disable' => $disable,
						//    'utf_benefits' => $utf_benefits,
						//    'learner_accepted_training' => $learner_accepted_training,
						//    'learnershipSubType' => $learnershipSubType,
						//    'id_number' => $id_number,
						//    'SETA' => $SETA,
						//    'province' => $province,
						//    'district' => $district,
						//    'city' => $city,
						//    'region' => $region,
						//    'Suburb' => $Suburb,
						//    'Street_name' => $Street_name,
						//    'Street_number' => $Street_number,
						//    'password' => sha1($password),
						//    'gender' => $gender,
						//    'classname' => $classname,
						//    'employer_name' => $employer_name,
						//    'bank_name' => $bank_name,
						//    'bank_account_type' => $bank_account_type,
						// 	'bank_account_number' => $bank_account_number,
						// 	 'branch_name' => $branch_name,
						// 	  'branch_code' => $branch_code);



                        $res = $this->common->insertData('learner', $data);
                    }

                    if ($res) {
                        $this->session->set_flashdata('success', 'Learner Added Successfully');
                       redirect('provider-import-learner');
                    } else {
                        $this->session->set_flashdata('error', 'Something Went Wrong Please try Again');
                       redirect('provider-import-learner');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Please Choose CSV file only');
                   redirect('provider-import-learner');
                }
            // } else {
            //     $this->session->set_flashdata('error', 'Please fillup all Fields');
            //    redirect('provider-import-learner');
            // }

    }


		public function provider_import_data3()
		{

			$path = './uploads/learner/import_learner/';

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'xlsx|xls|ods';

			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('learner')) {

				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('provider-import-learner');
			} else {

				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {

				$import_xls_file = $data['upload_data']['file_name'];
			} else {

				$import_xls_file = 0;
			}

			$inputFileName = $path . $import_xls_file;

			try {

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				// print_r($inputFileType);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				// print_r($objReader);die;
				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {

				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)

					. '": ' . $e->getMessage());
			}



			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, null);

			foreach ($allDataInSheet as $key1 => &$row1) {
				$row1 = array_filter(
					$row1,
					function ($cell) {
						return !is_null($cell);
					}
				);
				if (count($row1) == 0) {
					unset($allDataInSheet[$key1]);
				}
			}
			unset($row1);


			$arrayCount = count($allDataInSheet);

			$flag = 0;

			$createArray = array('Serial Number', 'Training Provider Name', 'Learner Full Name', 'Learner Surname', 'Email', 'Id Number', 'SETA', 'Primary Mobile Number', 'Secondary Mobile Number', 'Gender', 'Learnership Sub Type', 'Password', 'Province', 'District', 'City', 'Region', 'Suburb', 'Street Name', 'Street Number', 'Assessment', 'Is Disable', 'Uif Benefits', 'Learner Accepted for Training', 'Class Name', 'Employer Name', 'Bank Name', 'Bank Account Type', 'Bank Account Number', 'Branch Name', 'Branch Code');


			$makeArray = array('SerialNumber' => 'SerialNumber', 'TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurname' => 'LearnerSurname', 'Email' => 'Email', 'IdNumber' => 'IdNumber', 'SETA' => 'SETA', 'PrimaryMobileNumber' => 'PrimaryMobileNumber', 'SecondaryMobileNumber' => 'SecondaryMobileNumber', 'Gender' => 'Gender', 'LearnershipSubType' => 'LearnershipSubType', 'Password' => 'Password', 'Province' => 'Province', 'District' => 'District', 'City' => 'City', 'Region' => 'Region', 'Suburb' => 'Suburb', 'StreetName' => 'StreetName', 'StreetNumber' => 'StreetNumber', 'Assessment' => 'Assessment', 'IsDisable' => 'IsDisable', 'UifBenefits' => 'UifBenefits', 'LearnerAcceptedforTraining' => 'LearnerAcceptedforTraining', 'ClassName' => 'ClassName', 'EmployerName' => 'EmployerName', 'BankName' => 'BankName', 'BankAccountType' => 'BankAccountType', 'BankAccountNumber' => 'BankAccountNumber', 'BranchName' => 'BranchName', 'BranchCode' => 'BranchCode');


			$SheetDataKey = array();

			foreach ($allDataInSheet as $dataInSheet) {

				foreach ($dataInSheet as $key => $value) {

					if (in_array(trim($value), $createArray)) {

						$value = preg_replace('/\s+/', '', $value);

						$SheetDataKey[trim($value)] = $key;
					} else {
					}
				}
			}

			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {

				$flag = 1;
			}
			// echo $flag;
			//echo '<pre>';print_r($allDataInSheet);die;
			if ($flag == 1) {

				for ($i = 2; $i <= $arrayCount; $i++) {

					$addresses = array();

					$company_name = $SheetDataKey['TrainingProviderName'];

					$employer_name = $SheetDataKey['EmployerName'];

					$bank_name = $SheetDataKey['BankName'];

					$bank_account_type = $SheetDataKey['BankAccountType'];

					$bank_account_number = $SheetDataKey['BankAccountNumber'];

					$branch_name = $SheetDataKey['BranchName'];

					$branch_code = $SheetDataKey['BranchCode'];

					$first_name = $SheetDataKey['LearnerFullName'];

					//$second_name = $SheetDataKey['LearnerSecondName'];

					$classname = $SheetDataKey['ClassName'];

					$surname = $SheetDataKey['LearnerSurname'];

					$email = $SheetDataKey['Email'];

					$mobile = $SheetDataKey['PrimaryMobileNumber'];

					$mobile_number = $SheetDataKey['SecondaryMobileNumber'];

					$assessment = $SheetDataKey['Assessment'];

					$disable = $SheetDataKey['IsDisable'];

					$utf_benefits = $SheetDataKey['UifBenefits'];

					$learner_accepted_training = $SheetDataKey['LearnerAcceptedforTraining'];

					$learnershipSubType = $SheetDataKey['LearnershipSubType'];

					$id_number = $SheetDataKey['IdNumber'];

					$SETA = $SheetDataKey['SETA'];

					$province = $SheetDataKey['Province'];

					$district = $SheetDataKey['District'];

					$city = $SheetDataKey['City'];

					$region = $SheetDataKey['Region'];

					$Suburb = $SheetDataKey['Suburb'];

					$Street_name = $SheetDataKey['StreetName'];

					$Street_number = $SheetDataKey['StreetNumber'];

					$password = $SheetDataKey['Password'];

					$gender = $SheetDataKey['Gender'];



					$company_name = filter_var(trim($allDataInSheet[$i][$company_name]), FILTER_SANITIZE_STRING);

					if (empty($company_name)) {

						$this->session->set_flashdata('error', 'Please Enter your training provider');

						redirect('provider-import-learner');
					}

					$first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);

					if (empty($first_name)) {

						$this->session->set_flashdata('error', 'Please enter your full name');

						redirect('provider-import-learner');
					}

					//$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);

					$surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);

					if (empty($surname)) {

						$this->session->set_flashdata('error', 'Please enter your surname');

						redirect('provider-import-learner');
					}

					$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);

					if (empty($email)) {

						$this->session->set_flashdata('error', 'Please enter your email');

						redirect('provider-import-learner');
					}

					$mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);

					if (empty($mobile)) {

						$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');

						redirect('provider-import-learner');
					}

					$mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);

					if (empty($mobile_number)) {

						$this->session->set_flashdata('error', 'Please enter your second cellphone number');

						redirect('provider-import-learner');
					}

					$assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);

					if (empty($assessment)) {

						$this->session->set_flashdata('error', 'Please enter your assessment status');

						redirect('provider-import-learner');
					}

					$disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);

					if (empty($disable)) {

						$this->session->set_flashdata('error', 'Please enter your disabled');

						redirect('provider-import-learner');
					}

					$utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);

					if (empty($utf_benefits)) {

						$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');

						redirect('provider-import-learner');
					}

					$learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);

					if (empty($learner_accepted_training)) {

						$this->session->set_flashdata('error', 'Please enter your learner accepted training');

						redirect('provider-import-learner');
					}

					$learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);

					if (empty($learnershipSubType)) {

						$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');

						redirect('provider-import-learner');
					}

					$id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);

					if (empty($id_number)) {

						$this->session->set_flashdata('error', 'Please enter your id number');

						redirect('provider-import-learner');
					}

					$SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);

					if (empty($SETA)) {

						$this->session->set_flashdata('error', 'Please enter your SETA');

						redirect('provider-import-learner');
					}

					$province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);

					if (empty($province)) {

						$this->session->set_flashdata('error', 'Please enter your province');

						redirect('provider-import-learner');
					}

					$district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);

					if (empty($district)) {

						$this->session->set_flashdata('error', 'Please enter your district');

						redirect('provider-import-learner');
					}

					$city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);

					if (empty($city)) {

						$this->session->set_flashdata('error', 'Please enter your city');

						redirect('provider-import-learner');
					}

					$region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);

					if (empty($region)) {

						$this->session->set_flashdata('error', 'Please enter your region');

						redirect('provider-import-learner');
					}

					$Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);

					if (empty($Suburb)) {

						$this->session->set_flashdata('error', 'Please enter your Suburb');

						redirect('provider-import-learner');
					}

					$Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);

					if (empty($Street_name)) {

						$this->session->set_flashdata('error', 'Please enter your street name');

						redirect('provider-import-learner');
					}

					$Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);

					if (empty($Street_number)) {

						$this->session->set_flashdata('error', 'Please enter your street number');

						redirect('provider-import-learner');
					}

					$password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);

					if (empty($password)) {

						$this->session->set_flashdata('error', 'Please enter your password');

						redirect('provider-import-learner');
					}

					$gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);

					if (empty($gender)) {

						$this->session->set_flashdata('error', 'Please enter your gender');

						redirect('provider-import-learner');
					}

					/* $classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);

                if(empty($classname)){

                    $this->session->set_flashdata('error','Please enter your class name');

                    redirect('provider-import-learner');

                }*/



					$fetchData[] = array('trining_provider' => $company_name, 'first_name' => $first_name,  'surname' => $surname, 'email' => $email, 'mobile' => $mobile, 'mobile_number' => $mobile_number, 'assessment' => $assessment, 'disable' => $disable, 'utf_benefits' => $utf_benefits, 'learner_accepted_training' => $learner_accepted_training, 'learnershipSubType' => $learnershipSubType, 'id_number' => $id_number, 'SETA' => $SETA, 'province' => $province, 'district' => $district, 'city' => $city, 'region' => $region, 'Suburb' => $Suburb, 'Street_name' => $Street_name, 'Street_number' => $Street_number, 'password' => sha1($password), 'gender' => $gender, 'classname' => $classname, 'employer_name' => $employer_name, 'bank_name' => $bank_name, 'bank_account_type' => $bank_account_type, 'bank_account_number' => $bank_account_number, 'branch_name' => $branch_name, 'branch_code' => $branch_code);
				}

				$data['employeeInfo'] = $fetchData;

				$this->common->setBatchImport($fetchData);

				$this->common->importData();
			} else {

				$this->session->set_flashdata('error', "Please import correct file");

				redirect('provider-import-learner');
			}

			redirect('learner-list');
		}



		public function provider_stipends_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$this->data['record'] = $this->common->accessrecord('stipend', [], ['	provider_id' => $trainer_id], 'result');

			$this->data['page'] = 'stipend_list';

			$this->data['content'] = 'pages/stipend/stipend_list';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function provider_create_stipends()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('stipend', [], ['id' => $id], 'row');
			}

			$data = array(
				'learner_id' => $this->input->post('learner_id'),

				'provider_id' => $trainer_id,

				'date' => $this->input->post('date'),

				'amount' => $this->input->post('amount')

			);

			if ($_POST) {

				if ($id != 0) {

					$this->common->updateData('stipend', $data, ['id' => $id]);

					$this->session->set_flashdata('success', 'Stipend Updated Succesfully');

					redirect('provider-stipends-list');
				} else {

					$this->common->insertData('stipend', $data);

					$this->session->set_flashdata('success', 'Stipend Insert Successfully');

					redirect('provider-stipends-list');
				}
			}

			$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$this->data['learner'] = $this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'result');

			$this->data['page'] = 'create_stipend';

			$this->data['content'] = 'pages/stipend/create_stipend';

			$this->load->view('provider/tamplate', $this->data);
		}



		public function provider_changeleanerstatus()
		{

			$reason = $this->input->post('text');

			$learner = $this->input->post('learner');

			$tablenm_id = $this->input->post('tablenm_id');

			$explode = explode('.', $tablenm_id);

			$tablenm = $explode[0];

			$id = $explode[1];

			$data = $this->common->updateData($tablenm, ['learner_accepted_training' => $learner, 'reason' => $reason], ['id' => $id]);
			$this->session->set_flashdata('success', 'Training record updated successfully !');

			if ($data) {

				echo json_encode(array('status' => 200));
			}
		}

		public function training_report_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$this->data['record'] = $this->common->TrainingProviderReportdata($trainer_id);

			$this->data['page'] = 'training_report_list';

			$this->data['content'] = 'pages/report/training_report_list';

			$this->load->view('provider/tamplate', $this->data);
		}



		public function training_provider_view()
		{

			$id = $this->input->get('id');

			$this->data['record'] = $this->common->accessrecord('trainer', [], ['id' => $id], 'result');;

			$this->data['page'] = 'training_provider_view';

			$this->data['content'] = 'pages/report/training_provider_view';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function monderator_view()
		{

			$id = $this->input->get('id');

			$this->data['record'] = $this->common->TrainingProviderIdWise($id, 'moderator');

			$this->data['page'] = 'monderator_view';

			$this->data['content'] = 'pages/report/monderator_view';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function assessor_view()
		{

			$id = $this->input->get('id');

			$this->data['record'] = $this->common->TrainingProviderIdWise($id, 'assessor');

			$this->data['page'] = 'assessor_view';

			$this->data['content'] = 'pages/report/assessor_view';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function facilitator_view()
		{

			$id = $this->input->get('id');

			$this->data['record'] = $this->common->TrainingProviderIdWise($id, 'facilitator');

			$this->data['page'] = 'facilitator_view';

			$this->data['content'] = 'pages/report/facilitator_view';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function learner_view()
		{

			$id = $this->input->get('id');

			$this->data['record'] = $this->common->TrainingProviderIdWise($id, 'learner');

			$this->data['page'] = 'learner_view';

			$this->data['content'] = 'pages/report/learner_view';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function create_learner_markold()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = 0;

			if (!empty($_GET['id'])) {

				$id = $_GET['id'];

				$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');
			}

			if ($_POST) {

				$learner_surname = $this->input->post('learner_surname');

				$learner_name = $this->input->post('learner_name');

				$learner_id_number = $this->input->post('learner_id_number');

				$first_test = $this->input->post('first_test');

				$second_test = $this->input->post('second_test');

				$third_test = $this->input->post('third_test');

				$attempt1 = $this->input->post('attempt1');

				$attempt2 = $this->input->post('attempt2');

				$attempt3 = $this->input->post('attempt3');

				$total_credits_allocated = $this->input->post('total_credits_allocated');

				$percentage = $this->input->post('percentage');

				foreach ($learner_name as $key => $value) {

					$data = array(

						'programme_id' => $this->input->post('programme_id'),

						'project_id' => $this->input->post('project_id'),

						'training_provider' => $this->input->post('training_provider'),

						'learnership_sub_type' => $this->input->post('learnership_sub_type'),

						'facilirator_id' => $this->input->post('facilirator_id'),

						'assessor' => $this->input->post('assessor'),

						'assessor_reg_no' => $this->input->post('assessor_reg_no'),

						'moderator' => $this->input->post('moderator'),

						'moderator_reg_no' => $this->input->post('moderator_reg_no'),

						'training_start_date' => $this->input->post('training_start_date'),

						'training_end_date' => $this->input->post('training_end_date'),

						'no_of_learner' => $this->input->post('no_of_learner'),

						'cluster' => implode(',', $this->input->post('cluster')),

						'standrad_name' => implode(',', $this->input->post('standrad_name')),

						'standard_id' => implode(',', $this->input->post('standard_id')),

						'unit_standard_type' => implode(',', $this->input->post('unit_standard_type')),

						'available_credits' => implode(',', $this->input->post('available_credits')),

						'learner_name' => $value,

						'learner_surname' => $learner_surname[$key],

						'learner_id_number' => $learner_id_number[$key],

						'first_test' => $first_test[$key],

						'second_test' => $second_test[$key],

						'third_test' => $third_test[$key],

						'attempt1' => $attempt1[$key],

						'attempt2' => $attempt2[$key],

						'attempt3' => $attempt3[$key],

						'created_by' => $trainer_id,

						'user_type' => 2,

						'total_credits_allocated' => $total_credits_allocated[$key],

						'percentage' => $percentage[$key]

					);

					$this->common->insertData('learner_marks', $data);

					$this->session->set_flashdata('success', 'Learner Mark Successfully');
				}

				redirect('provider-learnermark-list');
			}

			$this->data['record'] = $this->common->accessrecord('learner_marks', [], [], 'result');

			$this->data['programme_director'] = $this->common->TrainingLearnerMark('programme_director', $trainer_id);

			$this->data['project'] = $this->common->TrainingLearnerMark('project_manager', $trainer_id);

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$this->data['learnership_sub_type'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');

			$this->data['page'] = 'create_learner_marks';

			$this->data['content'] = 'pages/learner_marks/create_learner_marks';

			$this->load->view('provider/tamplate', $this->data);
		}







		public function provider_learnership()
		{

			$learnership = $this->input->post('learnership');

			$record = $this->common->LearnerShipUnit($learnership);

			echo json_encode($record);
		}

		public function learnermarks_import_data()
		{

			$path = './uploads/learner/import_learnermarks/';

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'xlsx|xls|ods';

			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('learnermarks')) {

				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('provider-import-learnermarks');
			} else {

				$data = array('upload_data' => $this->upload->data());
			}

			if (!empty($data['upload_data']['file_name'])) {

				$import_xls_file = $data['upload_data']['file_name'];
			} else {

				$import_xls_file = 0;
			}

			$inputFileName = $path . $import_xls_file;

			try {

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {

				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)

					. '": ' . $e->getMessage());
			}

			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, null, null, null, null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, null, null, null, null, null, null, null, null, null);

			$arrayCount = count($allDataInSheet);

			$flag = 0;

			$createArray = array('TrainingProviderName', 'LearnershipSubType', 'ProgrammeDirectorName', 'ProjectManagerName', 'Facilitator', 'NumberofLearner', 'TrainingStartDate', 'TrainingEndDate', 'ClusterName', 'UnitStandradName', 'UnitStandardId', 'UnitSandardType', 'AvailableCredits', 'LearnerName', 'LearnerSurname', 'LearnerIdNumber', 'LearnerClassName', 'FirstTest', 'SecondTest', 'ThirdTest');

			$makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnershipSubType' => 'LearnershipSubType', 'ProgrammeDirectorName' => 'ProgrammeDirectorName', 'ProjectManagerName' => 'ProjectManagerName', 'Facilitator' => 'Facilitator', 'NumberofLearner' => 'NumberofLearner', 'TrainingStartDate' => 'TrainingStartDate', 'TrainingEndDate' => 'TrainingEndDate', 'ClusterName' => 'ClusterName', 'UnitStandradName' => 'UnitStandradName', 'UnitStandardId' => 'UnitStandardId', 'UnitSandardType' => 'UnitSandardType', 'AvailableCredits' => 'AvailableCredits', 'LearnerName' => 'LearnerName', 'LearnerSurname' => 'LearnerSurname', 'LearnerIdNumber' => 'LearnerIdNumber', 'LearnerClassName' => 'LearnerClassName', 'FirstTest' => 'FirstTest', 'SecondTest' => 'SecondTest', 'ThirdTest' => 'ThirdTest');

			$SheetDataKey = array();

			foreach ($allDataInSheet as $dataInSheet) {

				foreach ($dataInSheet as $key => $value) {

					if (in_array(trim($value), $createArray)) {

						$value = preg_replace('/\s+/', '', $value);

						$SheetDataKey[trim($value)] = $key;
					} else {
					}
				}
			}

			$data = array_diff_key($makeArray, $SheetDataKey);

			if (empty($data)) {

				$flag = 1;
			}

			if ($flag == 1) {

				for ($i = 2; $i <= $arrayCount; $i++) {

					$addresses = array();

					$training_provider = $SheetDataKey['TrainingProviderName'];

					$learnership_sub_type = $SheetDataKey['LearnershipSubType'];

					$programme_director = $SheetDataKey['ProgrammeDirectorName'];

					$project_manager = $SheetDataKey['ProjectManagerName'];

					$facilirator = $SheetDataKey['Facilitator'];

					$no_of_learner = $SheetDataKey['NumberofLearner'];

					$training_start_date = $SheetDataKey['TrainingStartDate'];

					$training_end_date = $SheetDataKey['TrainingEndDate'];

					$cluster = $SheetDataKey['ClusterName'];

					$standrad_name = $SheetDataKey['UnitStandradName'];

					$standard_id = $SheetDataKey['UnitStandardId'];

					$unit_standard_type = $SheetDataKey['UnitSandardType'];

					$available_credits = $SheetDataKey['AvailableCredits'];

					$learner_name = $SheetDataKey['LearnerName'];

					$learner_surname = $SheetDataKey['LearnerSurname'];

					$learner_id_number = $SheetDataKey['LearnerIdNumber'];

					$learner_classname = $SheetDataKey['LearnerClassName'];

					$first_test = $SheetDataKey['FirstTest'];

					$second_test = $SheetDataKey['SecondTest'];

					$third_test = $SheetDataKey['ThirdTest'];

					$training_provider = filter_var(trim($allDataInSheet[$i][$training_provider]), FILTER_SANITIZE_STRING);

					if (empty($training_provider)) {

						$this->session->set_flashdata('error', 'Please Enter your training provider');

						redirect('provider-import-learnermarks');
					}



					$learnership_sub_type = filter_var(trim($allDataInSheet[$i][$learnership_sub_type]), FILTER_SANITIZE_STRING);

					if (empty($learnership_sub_type)) {

						$this->session->set_flashdata('error', 'Please enter your learnership sub type');

						redirect('provider-import-learnermarks');
					}

					$programme_director = filter_var(trim($allDataInSheet[$i][$programme_director]), FILTER_SANITIZE_STRING);

					if (empty($programme_director)) {

						$this->session->set_flashdata('error', 'Please enter your programme director');

						redirect('provider-import-learnermarks');
					}

					$project_manager = filter_var(trim($allDataInSheet[$i][$project_manager]), FILTER_SANITIZE_STRING);

					if (empty($project_manager)) {

						$this->session->set_flashdata('error', 'Please enter your project manager');

						redirect('provider-import-learnermarks');
					}

					$facilirator = filter_var(trim($allDataInSheet[$i][$facilirator]), FILTER_SANITIZE_STRING);

					if (empty($facilirator)) {

						$this->session->set_flashdata('error', 'Please enter your  facilirator');

						redirect('provider-import-learnermarks');
					}

					$no_of_learner = filter_var(trim($allDataInSheet[$i][$no_of_learner]), FILTER_SANITIZE_STRING);

					if (empty($no_of_learner)) {

						$this->session->set_flashdata('error', 'Please enter your no of learner');

						redirect('provider-import-learnermarks');
					}

					$training_start_date = filter_var(trim($allDataInSheet[$i][$training_start_date]), FILTER_SANITIZE_STRING);

					if (empty($training_start_date)) {

						$this->session->set_flashdata('error', 'Please enter your training start date');

						redirect('provider-import-learnermarks');
					}

					$training_end_date = filter_var(trim($allDataInSheet[$i][$training_end_date]), FILTER_SANITIZE_STRING);

					if (empty($training_end_date)) {

						$this->session->set_flashdata('error', 'Please enter your training end date');

						redirect('provider-import-learnermarks');
					}

					$cluster = filter_var(trim($allDataInSheet[$i][$cluster]), FILTER_SANITIZE_STRING);

					if (empty($cluster)) {

						$this->session->set_flashdata('error', 'Please enter your  cluster');

						redirect('provider-import-learnermarks');
					}

					$standrad_name = filter_var(trim($allDataInSheet[$i][$standrad_name]), FILTER_SANITIZE_STRING);

					if (empty($standrad_name)) {

						$this->session->set_flashdata('error', 'Please enter your unit standrad name');

						redirect('provider-import-learnermarks');
					}

					$standard_id = filter_var(trim($allDataInSheet[$i][$standard_id]), FILTER_SANITIZE_STRING);

					if (empty($standard_id)) {

						$this->session->set_flashdata('error', 'Please enter your unit standard id');

						redirect('provider-import-learnermarks');
					}

					$unit_standard_type = filter_var(trim($allDataInSheet[$i][$unit_standard_type]), FILTER_SANITIZE_STRING);

					if (empty($unit_standard_type)) {

						$this->session->set_flashdata('error', 'Please enter your unit standard type');

						redirect('provider-import-learnermarks');
					}

					$available_credits = filter_var(trim($allDataInSheet[$i][$available_credits]), FILTER_SANITIZE_STRING);

					if (empty($available_credits)) {

						$this->session->set_flashdata('error', 'Please enter your available credits');

						redirect('provider-import-learnermarks');
					}

					$learner_name = filter_var(trim($allDataInSheet[$i][$learner_name]), FILTER_SANITIZE_STRING);

					if (empty($learner_name)) {

						$this->session->set_flashdata('error', 'Please enter your learner name');

						redirect('provider-import-learnermarks');
					}

					$learner_surname = filter_var(trim($allDataInSheet[$i][$learner_surname]), FILTER_SANITIZE_STRING);

					if (empty($learner_surname)) {

						$this->session->set_flashdata('error', 'Please enter your learner surname');

						redirect('provider-import-learnermarks');
					}

					$learner_id_number = filter_var(trim($allDataInSheet[$i][$learner_id_number]), FILTER_SANITIZE_STRING);

					if (empty($learner_id_number)) {

						$this->session->set_flashdata('error', 'Please enter your learner id number');

						redirect('provider-import-learnermarks');
					}

					$learner_classname = filter_var(trim($allDataInSheet[$i][$learner_classname]), FILTER_SANITIZE_STRING);

					if (empty($learner_classname)) {

						$this->session->set_flashdata('error', 'Please enter your learner classname');

						redirect('provider-import-learnermarks');
					}

					$first_test = filter_var(trim($allDataInSheet[$i][$first_test]), FILTER_SANITIZE_STRING);

					$second_test = filter_var(trim($allDataInSheet[$i][$second_test]), FILTER_SANITIZE_STRING);

					$third_test = filter_var(trim($allDataInSheet[$i][$third_test]), FILTER_SANITIZE_STRING);

					$starttimestamp = strtotime($training_start_date);

					$endtimestamp = strtotime($training_end_date);

					$fetchData[] = array('training_provider' => $training_provider, 'learnership_sub_type' => $learnership_sub_type,  'programme_director' => $programme_director, 'project_manager' => $project_manager, 'facilirator' => $facilirator, 'no_of_learner' => $no_of_learner, 'training_start_date' => date("Y-m-d", $starttimestamp), 'training_end_date' => date("Y-m-d", $endtimestamp), 'cluster' => $cluster, 'standrad_name' => $standrad_name, 'standard_id' => $standard_id, 'unit_standard_type' => $unit_standard_type, 'available_credits' => $available_credits, 'learner_name' => $learner_name, 'learner_surname' => $learner_surname, 'learner_id_number' => $learner_id_number, 'learner_classname' => $learner_classname, 'first_test' => $first_test, 'second_test' => $second_test, 'third_test' => $third_test);
				}

				$data['employeeInfo'] = $fetchData;

				$this->common->setBatchImport($fetchData);

				$this->common->importDataLearnerMarks();
			} else {

				$this->session->set_flashdata('error', "Please import correct file");

				redirect('provider-import-learnermarks');
			}

			redirect('provider-learnermark-list');
		}

		public function provider_import_learnermarks()
		{

			$this->data['page'] = 'import_learnermarks';

			$this->data['content'] = 'pages/learner_marks/import_learnermarks';

			$this->load->view('provider/tamplate', $this->data);
		}

		public function get_classname()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$id = $this->input->post('value');

			$record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'trainer_id' => $trainer_id], 'result');

			if (!empty($record)) {

				$data = $record;
			} else {

				$data = array('error' => 'classname list not available in this learnershipsubtype');
			}

			echo json_encode($data);
		}

		private function singlefileupload($image, $path, $allowed_types)
		{

			$config['upload_path']          = $path;

			$config['allowed_types']        = $allowed_types;

			$config['encrypt_name']         = TRUE;

			$config['remove_spaces']        = TRUE;

			$config['detect_mime']          = TRUE;

			$config['overwrite']            = TRUE;

			$config['file_ext_tolower']     = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload($image)) {

				echo $this->upload->display_errors();
				die;
			} else {

				$data = $this->upload->data();

				$name = $data['file_name'];

				return $name;
			}
		}

		public function attendance_list()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			if (isset($trainer_id)) {

				$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

				$company_name = $trainer->company_name;
			} else {

				$company_name = '';
			}

			$this->data['record'] = $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');

			$this->data['page'] = 'attendance_list';

			$this->data['content'] = 'pages/attendance/attendance_list';

			$this->load->view('provider/tamplate', $this->data);
		}




		function deletedataClass()
		{

			if (!empty($_GET['classname'])) {

				$classname = $this->common->accessrecord('class_name', [], ['class_name' => $_GET['classname']], 'row');

				if ($this->common->accessrecord('learner', [], ['classname' => $_GET['classname']], 'row')) {

					echo json_encode(array('error' => "error"));
				} elseif ($this->common->accessrecord('attendance', [], ['classname' => $classname->id], 'row')) {

					echo json_encode(array('error' => "error"));
				} elseif ($this->common->accessrecord('learner_marks', [], ['learner_classname' => $classname->id], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataAssessor()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('attendance', [], ['assessor_id' => $_GET['data'], 'training_provider' => $_GET['trainer_id']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataFacilitator()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('learner_marks', [], ['training_provider' => $_GET['training_provider']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataLearner()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('stipend', [], ['learner_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "stipend"));
				} elseif ($this->common->accessrecord('drop_out', [], ['learner_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "drop_out"));
				} elseif ($this->common->accessrecord('complaints_and_suggestions', [], ['learner_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "complaints_and_suggestions"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataModerator()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataLearnerName()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('learnership_sub_type', [], ['	learnship_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}

		function deletedataUnit()
		{

			if (!empty($_GET['data'])) {

				$data = "";

				$Sub = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

				foreach ($Sub as $key => $value) {

					$unit_standard = $value->unit_standard;

					$unitstandard = explode(',', $unit_standard);

					if (in_array($_GET['data'], $unitstandard)) {

						$data = array('error' => "error");
					} else {

						$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

						$data = array('status' => 'true');
					}
				}

				echo json_encode($data);
			}
		}

		function deletedataLearnerShipType()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('learner', [], ['learnershipSubType' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['learnSub_id']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}









		function deleterecord()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('programme_director', [], ['organisation_id' => $_GET['data']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}


		public function user_edit()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];
			$id = $_GET['id'];
			$this->data['record'] = $this->common->accessrecord('sub_user', [], ['type' => 'Provider', 'id' => $_GET['id'], 'created_by_id' => $trainer_id], 'row');

			$modules = $this->common->accessrecord('user_permission', ['module_name'], ['user_type' => 'Provider', 'user_id' => $_GET['id']], 'result');
			if (!empty($modules)) {
				$modulearr = array();
				foreach ($modules as $key => $value) {
					$modulearr[] = $value->module_name;
				}
			}
			// echo '<pre>'; print_r($modulearr);
			$this->data['module'] = $this->common->accessrecord('user_modules', [], ['panel_name' => 'Provider', 'status' => 1], 'result');
			foreach ($this->data['module'] as $ke => $val) {
				if (in_array($val->module_name, $modulearr)) {
					$this->data['module'][$ke]->is_selected = 1;
					$res = $this->common->accessrecord('user_permission', ['is_view,is_add,is_edit,is_delete'], ['user_type' => 'Provider', 'user_id' => $_GET['id'], 'module_name' => $val->module_name], 'row');
					$this->data['module'][$ke]->is_view = $res->is_view;
					$this->data['module'][$ke]->is_add = $res->is_add;
					$this->data['module'][$ke]->is_edit = $res->is_edit;
					$this->data['module'][$ke]->is_delete = $res->is_delete;
				} else {
					$this->data['module'][$ke]->is_selected = 0;
					$this->data['module'][$ke]->is_view = 0;
					$this->data['module'][$ke]->is_add = 0;
					$this->data['module'][$ke]->is_edit = 0;
					$this->data['module'][$ke]->is_delete = 0;
				}
			}
			if ($_POST) {
				//echo '<pre>';print_r($_POST);
				$trainer_id = $_SESSION['admin']['trainer_id'];
				$data = array('first_name' => $_POST['first_name'], 'second_name' => $_POST['second_name'], 'designation' => $_POST['designation'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'password' => base64_encode($_POST['password']));
				// if (!empty($_POST['modules'])) {
				$this->common->updateData('sub_user', $data, array('type' => 'Provider', 'created_by_id' => $trainer_id, 'id' => $id));
				//echo $this->db->last_query();
				//die();
				//if($this->common->updateData('sub_user',$data,array('type'=>'Provider','created_by_id'=>$trainer_id,'id'=>$id))){
				// if(!empty($_POST['modules'])){
				$modules = $_POST['modules'];
				$modularr['user_id'] = $id;
				$modularr['user_type'] = 'Provider';
				$this->common->deleteRecord('user_permission', ['user_id' => $id, 'user_type' => 'Provider']);

				foreach ($modules as $key => $value) {
					$modularr['module_name'] = $key;

					$modularr['module_name'] = $key;
					if ($value !== 'on') {
						$modularr['is_view'] = (in_array('view', $value)) ? 1 : 0;
						$modularr['is_add'] = (in_array('add', $value)) ? 1 : 0;
						$modularr['is_edit'] = (in_array('edit', $value)) ? 1 : 0;
						$modularr['is_delete'] = (in_array('delete', $value)) ? 1 : 0;
					} else {
						$modularr['is_view'] = 0;
						$modularr['is_add'] = 0;
						$modularr['is_edit'] = 0;
						$modularr['is_delete'] = 0;
					}
					$this->common->insertData('user_permission', $modularr);
				}
				$this->session->set_flashdata('success', 'Update Successful');
				redirect('Provider-User-list');
				/*}else {
						$this->session->set_flashdata('error', 'Please Try Again');
					redirect('Create-Provider-User');
		            }*/
				// } else {
				// 	$this->session->set_flashdata('module_error', 'Please select modules for permission');
				// }
			}
			//echo '<pre>'; print_r($this->data['module']);die;
			$this->data['page'] = 'create_user';
			$this->data['content'] = 'pages/user/edit_user';
			$this->load->view('provider/tamplate', $this->data);
		}
		public function user_list()
		{
			$trainer_id = $_SESSION['admin']['trainer_id'];
			$this->data['record'] = $this->common->accessrecord('sub_user', [], ['created_by_id' => $trainer_id, 'type' => 'Provider'], 'result');
			$this->data['page'] = 'user_list';
			$this->data['content'] = 'pages/user/user_list';
			$this->load->view('provider/tamplate', $this->data);
		}
		public function deleteUser()
		{
			$this->common->deleteRecord('user_permission', ['user_id' => $_GET['data']]);


			$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
		}

		public function bulkDelete()
		{

			// POST values
			$user_ids = $this->input->post('user_ids');

			// Delete records
			$this->common->deleteUser($user_ids);

			echo 1;
			exit;
		}

		#######################################################################################################################################################################################################

		public function test()
		{
			$this->data['page'] = 'create_test';

			$this->data['content'] = 'pages/class/create_test';

			$this->load->view('provider/pages/elearning/test', $this->data);
		}




		public function createClass()
		{
			$createTokenRes = $this->createToken();
			if ($createTokenRes != 'false') {
				$callApiRes = $this->callApi($createTokenRes);
			} else {
				print_r('Token Creation Failed');
			}
		}

		private function createToken()
		{
			$body = array(
				"api_public_key" => "e12376f636156311b7dc6f96",
				"api_private_key" => 'e53b2e7cf226b88236f75c5e1ebe6ae804030d6c'
			);

			if ($body != null) {
				$body = json_encode($body);
			}

			$endpoint = "https://app.learncube.com/api/virtual-classroom/get-api-token/";
			$bodydata = "$body";

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $bodydata,
				CURLOPT_HTTPHEADER => array(
					"accept: application/json",
					"content-type: application/json",
					"api_public_key: e12376f636156311b7dc6f96",
					"api_private_key: e53b2e7cf226b88236f75c5e1ebe6ae804030d6c",
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$res = json_decode($response);

			if (isset($res->token) && !empty($res->token)) {
				return $res->token;
				// print_r($res->token); die;
			} else {
				return false;
			}
		}


		private function callApi($token)
		{
			$body = array(
				"api_public_key" => "e12376f636156311b7dc6f96",
				"api_private_key" => 'e53b2e7cf226b88236f75c5e1ebe6ae804030d6c'
			);

			if ($body != null) {
				$body = json_encode($body);
			}
			$endpoint = "https://app.learncube.com/api/virtual-classroom/classrooms/";
			$bearer = 'Bearer ' . $token . 'https://www.waytwodigital.com/DigiLims/Traningprovider/authenticate';
			// echo "<pre>";
			// print_r($bearer); die;
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $body,
				CURLOPT_HTTPHEADER => array(
					"Authorization: $bearer",
					"api_public_key: e12376f636156311b7dc6f96",
					"api_private_key: e53b2e7cf226b88236f75c5e1ebe6ae804030d6c",
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$res = json_decode($response);
			print_r($res);
			die;

			// if (isset($res->token) && !empty($res->token)) {
			// 	return $res->token;
			// print_r($res->token); die;
			// } else {
			// 	return false;
			// }
		}


		public function authenticate()
		{
			// print_r($_GET); die;
			$data = array(
				"pub_key" => "4d1132ed12673487474648c4",
				"status" => true,
				"message" => "",
				"userid" => "example-user-sWpUJb",
				"full_name" => "ashupatidar",
				"avatar" => "https://randomuser.me/api/portraits/med/women/53.jpg",
				"is_teacher" => true
			);

			$bodys = json_encode($data);

			return $bodys;
		}


		// *************  E-Learner Link start ********************************

		public function learnerlink()
		{


			$trainer_id = $_SESSION['admin']['trainer_id'];

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');
			$this->data['classrecord'] = $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');
			if ($_POST) {

				$data = array(
					'trainer_id' => $this->input->post('trainer_id'),

					'class_name' => $this->input->post('class_id'),

					'date' => $this->input->post('date'),

					'time' => $this->input->post('time'),

					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),

					'link' => $this->input->post('link'),

					'status' => '1',

					'project_manager' => $this->data['projectmanagerid'],


					'orgnaization_id' => $this->data['organizationid'],
					'create_at' => date('Y-m-d H:i:s')


				);
				// print_r($data);die;
				// print_r($this->data['projectmanagerid']);die;


				if ($this->common->insertData('elearner', $data)) {

					$this->session->set_flashdata('success', 'Class Created Successfully');

					redirect('create-learner-link-List');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('create-learner-link');
				}
			}

			$this->data['page'] = 'create_learner_link';
			$this->data['content'] = 'pages/elearning/create_learner_link';
			$this->load->view('provider/tamplate', $this->data);
		}


		public function learnerlinklist()
		{

			if (isset($_SESSION['admin']['trainer_id'])) {

				$trainer_id = $_SESSION['admin']['trainer_id'];
			} else {

				$trainer_id = '';
			}

			$condition = "`trainer_id`=$trainer_id";

			$this->data['learnerlinklist'] = $this->common->accessrecord('elearner', [], $condition, 'result');



			$this->data['page'] = 'learnerlinklist';

			$this->data['content'] = 'pages/elearning/learnerlinklist';

			$this->load->view('provider/tamplate', $this->data);
		}

		function deletedataLiveClass()
		{

			if (!empty($_GET['data'])) {

				if ($this->common->accessrecord('elearner', [], ['id' => $_GET['data'], 'trainer_id' => $_GET['trainer_id']], 'row')) {

					echo json_encode(array('error' => "error"));
				} else {

					$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

					echo json_encode(array('status' => 'true'));
				}
			}
		}



		// *************  E-Learner Link End  ********************************
		public function list_assessments()
		{

		    if (isset($_SESSION['admin']['trainer_id'])) {
		        $trainer_id = $_SESSION['admin']['trainer_id'];
		    } else {

		        $trainer_id = '';
		    }

		    $this->data['record'] = $this->common->assessmentListByTrainer($trainer_id);

		    foreach ($this->data['record'] as &$record) {

		        $unit_standard_list = $this->common->getAssessmentUnits($record->id);
		        if ($unit_standard_list) {
		            $unit_standards = [];
		            foreach ($unit_standard_list as $unit_standard_item) {
		                $unit_standards[] = $unit_standard_item->title;
		            }
		            $record->unit_standard = join(",", $unit_standards);
		        }
		    }

		    $this->data['page'] = 'list_assessments';

		    $this->data['content'] = 'pages/assessment/assessment_list';

		    $this->load->view('provider/tamplate', $this->data);

		}

		public function create_assessment()
		{

		    if (isset($_SESSION['admin']['trainer_id'])) {

		        $trainer_id = $_SESSION['admin']['trainer_id'];
		    } else {

		        $trainer_id = '';
		    }

// 		    $project_manager_id = $_SESSION['projectmanager']['id'];
		    $organisation_id = $_SESSION['organisation']['id'];

		    $id = 0;

		    if (!empty($_GET['id'])) {

		        $id = $_GET['id'];

		        $this->data['record'] = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
		        $class_name = $this->common->accessrecord('class_name', [], ['id' => ($this->data['record'])->class_id], 'row');
		        $this->data['record']->classname = $class_name->class_name;
		        $this->data['class_module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['record'])->module_id], 'row');
		    }

		    if ($_POST) {

		        if ($id != 0) {


// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_guide']['name'])) {
// 		                $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
// 		                $upload_learner_guide['upload_learner_guide'] = $assessment->upload_learner_guide;
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_workbook']['name'])) {
// 		                $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
// 		                $upload_learner_workbook['upload_learner_workbook'] = $assessment->upload_learner_workbook;
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_poe']['name'])) {
// 		                $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
// 		                $upload_learner_poe['upload_learner_poe'] = $assessment->upload_learner_poe;
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_facilitator_guide']['name'])) {
// 		                $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './assessment/bank/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
// 		                $upload_facilitator_guide['upload_facilitator_guide'] = $assessment->upload_facilitator_guide;
// 		            }

		            $data = [
		                'assessment_start_date' => $this->input->post('assessment_start_date'),
		                'assessment_end_date' => $this->input->post('assessment_end_date'),
		                'title' => $this->input->post('title'),
		                'assessment_type' => $this->input->post('assessment_type'),
		                'submission_type' => $this->input->post('submission_type'),
		                'class_id' => $this->input->post('classname'),
		                'module_id' => $this->input->post('class_module'),
		                'qualification' => $this->input->post('qualification'),
		                'learning_programme' => $this->input->post('learning_programme'),
// 		                'unit_standard' => $this->input->post('unit_standard'),
		                // 	                'programme_name' => $this->input->post('programme_name'),
		            // 	                'programme_number' => $this->input->post('programme_number'),
		                'intervention_name' => $this->input->post('intervention_name'),

// 		                'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
// 		                'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
// 		                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
// 		                'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

		                'created_by' => $trainer_id,
		                'created_by_role' => 'trainer',
		                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
		                'created_date' => date('Y-m-d H:i:s'),
		                'updated_date' => date('Y-m-d H:i:s'),

		            ];

		            if (!empty($_POST['unit_standard']) && is_array($_POST['unit_standard'])) {
		                $data['unit_standard'] = join(',', $_POST['unit_standard']);
		            }

		            if ($this->common->updateData('assessment', $data, array('id' => $id))) {

		                $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

		                redirect('provider-assessment-list');
		            } else {

		                $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

		                redirect('provider-assessment-list');
		            }

		        } else {

// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_guide']['name'])) {
// 		                $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $upload_learner_guide = [];
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_workbook']['name'])) {
// 		                $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $upload_learner_workbook = [];
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_learner_poe']['name'])) {
// 		                $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $upload_learner_poe = [];
// 		            }

// 		            // Upload files
// 		            if (!empty($_FILES['upload_facilitator_guide']['name'])) {
// 		                $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './uploads/assessment/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 		            } else {
// 		                $upload_facilitator_guide = [];
// 		            }

		            $data = [
		                'assessment_start_date' => $this->input->post('assessment_start_date'),
		                'assessment_end_date' => $this->input->post('assessment_end_date'),
		                'title' => $this->input->post('title'),
		                'assessment_type' => $this->input->post('assessment_type'),
		                'submission_type' => $this->input->post('submission_type'),
		                'class_id' => $this->input->post('classname'),
		                'module_id' => $this->input->post('class_module'),
		                // 'qualification' => $this->input->post('qualification'),
		                'learning_programme' => $this->input->post('learning_programme'),
// 		                'unit_standard' => $this->input->post('unit_standard'),
		                // 	                'programme_name' => $this->input->post('programme_name'),
		            // 	                'programme_number' => $this->input->post('programme_number'),
		                'intervention_name' => $this->input->post('intervention_name'),

// 		                'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
// 		                'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
// 		                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
// 		                'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

		                'created_by' => $trainer_id,
		                'created_by_role' => 'trainer',
		                'created_date' => date('Y-m-d H:i:s'),
		                'updated_date' => date('Y-m-d H:i:s'),

		            ];

		            if (!empty($_POST['unit_standard']) && is_array($_POST['unit_standard'])) {
		                $data['unit_standard'] = join(',', $_POST['unit_standard']);
		            }

		            if ($this->common->insertData('assessment', $data)) {

		                $this->Email_model->email_learner_in_class(
		                    $data['class_id'],
		                    'You have been assigned a new assessment.',
		                    'A new new assessment has been created
                         http://digilims.com/new_assessment
                        '
		                    );

		                $this->session->set_flashdata('success', 'Assessement Saved Successfully');

		                redirect('provider-assessment-list');
		            } else {

		                $this->session->set_flashdata('error', 'Please Try Again');

		                redirect('provider-create-assessment');
		            }
		        }

		        if ($id != 0) {
		            $this->data['record'] = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
		            // $this->data['class_module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['record'])->module_id], 'row');
		        }
		    }

		    if ($id != 0) {
		        $this->data['class_module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['record'])->module_id], 'row');
		    }

		    $this->data['classes'] = $this->common->accessrecord('class_name', [], [], 'result_array');
		    $this->data['units'] = $this->common->accessrecord('units', [], [], 'result_array');

		    $this->data['page'] = 'create_assessment';

		    $this->data['content'] = 'pages/assessment/assessment_form';

		    $this->data['learnership'] = $this->common->accessrecord('learnership', [], ['organization' => $organisation_id], 'result');

		    $this->load->view('provider/tamplate', $this->data);
		}

		function assessment_delete()
		{

		    if (!empty($_GET['data'])) {

		        if ($this->common->accessrecord('assessment', [], ['id' => $_GET['data']], 'row')) {

		            echo json_encode(array('error' => "error"));
		        } else {

		            $this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

		            echo json_encode(array('status' => 'true'));
		        }
		    }
		}

		public function get_class_module()
		{

		    $class_id = $this->input->post('value');

		    $record = $this->common->accessrecord('class_module', [], ['class_id' => $class_id], 'result');

		    if (!empty($record)) {

		        $data = $record;
		    } else {

		        $data = array('error' => 'facilitator not available in this class');
		    }

		    echo json_encode($data);
		}


		//****************************Assessments******************//
		public function list_complete_assessments(){


		    if (isset($_SESSION['facilitator']['id'])) {
		        $trainer_id = $_SESSION['facilitator']['id'];
		    } else {
		        $trainer_id = '';
		    }

		    if (!empty($_GET['aid'])) {
		        $assessment_id = $_GET['aid'];
		        $this->data['record'] = $this->common->compeletedAssessmentListByAssessment($assessment_id);
		    } else {
		        $assessment_id = 0;
		        $this->data['record'] = $this->common->compeletedAssessmentListByTrainer($trainer_id);
		    }

		    $this->data['page'] = 'list_complete_assessments';

		    $this->data['content'] = '/pages/assessment/complete_assessment_list';

		    $this->load->view('provider/tamplate', $this->data);
		}

		public function view_assessment(){


		    if (isset($_SESSION['facilitator']['id'])) {
		        $trainer_id = $_SESSION['facilitator']['id'];
		    } else {
		        $trainer_id = '';
		    }

		    $learner_assessment_id = 0;
		    if (!empty($_GET['id'])) {
		        $learner_assessment_id = $_GET['id'];
		    }
		    if ($learner_assessment_id == 0) {
		        echo "Invalid Assessment";
		        return;
		    }

		    $this->data['record'] = $this->common->compeletedAssessmentListByID($learner_assessment_id);

		    $assessment_submissions = [];
		    $assessment_submissions = $this->common->accessrecord('learner_assessment_submission', [], ['learner_assessment_id' => $learner_assessment_id], 'result');
		    $this->data['learner_assessment_submissions'] = $assessment_submissions;

		    $this->data['page'] = 'view_assessment';

		    $this->data['content'] = '/pages/assessment/assessment_details';

		    $this->load->view('provider/tamplate', $this->data);


		}
	}