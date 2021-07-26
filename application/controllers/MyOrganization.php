<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MyOrganization extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($_SESSION['organisation'])) {
			redirect(BASEURL);
		}
	}

	public function dashboard()
	{
		$this->data['organization'] = $this->common->accessrecord('organisation', [], ['id' => $_SESSION['organisation']['id']], 'row');

		$this->data['active_project'] = $this->common->accessrecord('project', [], ['organization' => $_SESSION['organisation']['id'], 'status' => 1], 'result');
		$this->data['activeproject'] = count($this->data['active_project']);
		$this->data['inactive_project'] = $this->common->accessrecord('project', [], ['organization' => $_SESSION['organisation']['id'], 'status' => 0], 'result');
		$this->data['inactiveproject'] = count($this->data['inactive_project']);

		$this->data['done_task'] = $this->common->accessrecord('task', [], ['organization' => $_SESSION['organisation']['id'], 'task_status' => 'Completed'], 'result');
		$this->data['donetask'] = count($this->data['done_task']);
		$this->data['inprogress_task'] = $this->common->accessrecord('task', [], ['organization' => $_SESSION['organisation']['id'], 'task_status' => 'Inprogress'], 'result');
		$this->data['inprogresstask'] = count($this->data['inprogress_task']);

		$this->data['active_projectmanager'] = $this->common->accessrecord('project_manager', [], ['organization' => $_SESSION['organisation']['id'], 'status' => 1], 'result');
		$this->data['activeprojectmanager'] = count($this->data['active_projectmanager']);
		$this->data['inactive_projectmanager'] = $this->common->accessrecord('project_manager', [], ['organization' => $_SESSION['organisation']['id'], 'status' => 0], 'result');
		$this->data['inactiveprojectmanager'] = count($this->data['inactive_projectmanager']);

		$this->data['project_'] = $this->common->accessrecord('project', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['project'] = count($this->data['project_']);

		$this->data['project_manager_'] = $this->common->accessrecord('project_manager', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['project_manager'] = count($this->data['project_manager_']);

		$this->data['trainer_'] = $this->common->accessrecord('trainer', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['trainer'] = count($this->data['trainer_']);

		$this->data['facilitator_'] = $this->common->accessrecord('facilitator', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['facilitator'] = count($this->data['facilitator_']);

		$this->data['assessor_'] = $this->common->accessrecord('assessor', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['assessor'] = count($this->data['assessor_']);

		$this->data['internal_moderator_'] = $this->common->accessrecord('moderator', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['internal_moderator'] = count($this->data['internal_moderator_']);

		$this->data['external_moderator_'] = $this->common->accessrecord('external_moderator', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['external_moderator'] = count($this->data['external_moderator_']);

		$this->data['learner_'] = $this->common->accessrecord('learner', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['learner'] = count($this->data['learner_']);
        
		$this->data['drop_out'] = $this->common->accessrecord('drop_out', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['drop_out'] = count($this->data['drop_out']);
		
		$this->data['page'] = 'dashboard';
		$this->data['content'] = 'pages/dashboard/dashboard';
		$this->load->view('MyOrganization/tamplate', $this->data);
		
		
	}

	public function create_projects_list()
	{
		$this->data['record'] = $this->common->accessrecord('project', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['page'] = 'create_projects_list';
		$this->data['content'] = 'pages/create_project/create_projects_list';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// **********************************************************project manager*************************************************************
	public function create_project()
	{
		$id = 0;
		$ids = $_SESSION['organisation']['id'];
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$this->data['record'] = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');
		}
		if ($_POST) {
			if ($id == 0) {
				if (!empty($_FILES['company_registration_documents']['name'])) {

					$path = "./uploads/project/company_documents/";

					$company_documents['company_documents']  = $this->singlefileupload('company_registration_documents', "./uploads/project/company_documents/", 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				} else {

					$company_documents['company_documents'] = "";
				}

				if (!empty($_FILES['tax_clearance']['name'])) {

					$tax_clearances['tax_clearances'] = $this->singlefileupload('tax_clearance', './uploads/project/tax_clearance/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				} else {

					$tax_clearances['tax_clearances'] = "";
				}

				if (!empty($_FILES['moderator_accreditation']['name'])) {

					$moderator_accreditations['moderator_accreditations'] = $this->singlefileupload('moderator_accreditation', './uploads/project/moderator_accreditations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				} else {

					$moderator_accreditations['moderator_accreditations'] = "";
				}

				if (!empty($_FILES['assesor_acreditations']['name'])) {

					$assesor_acreditations['assesor_acreditations'] = $this->singlefileupload('assesor_acreditations', './uploads/project/assesor_acreditations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				} else {

					$assesor_acreditations['assesor_acreditations'] = "";
				}

				if (!empty($_FILES['seta_creditiation']['name'])) {

					$seta_creditiations['seta_creditiations'] = $this->singlefileupload('tax_clearance', './uploads/project/seta_creditiations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				} else {

					$seta_creditiations['seta_creditiations'] = "";
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

				$municipality = $this->input->post('municipality');

				$municipalitydata = $this->common->one_municipality($municipality);

				$municipality_name = $municipalitydata->municipality;

				$data = array(

					'project_manager' => $this->input->post('project_manager'),

					'organization' => $this->input->post('organization'),

					'email_address' => $this->input->post('email_address'),

					'landline_number' => $this->input->post('landline_number'),

					'mobile_number' => $this->input->post('mobile_number'),

					'tax_clearance' => $tax_clearances['tax_clearances'],

					'company_registration_documents' => $company_documents['company_documents'],

					'moderator_accreditations' => $moderator_accreditations['moderator_accreditations'],

					'assesor_acreditations' => $assesor_acreditations['assesor_acreditations'],

					'seta_creditiations' => $seta_creditiations['seta_creditiations'],

					'created_by' => $id,

					'password' => sha1($this->input->post('password')),

					'Suburb' => $this->input->post('Suburb'),

					'Street_name' => $this->input->post('Street_name'),

					'Street_number' => $this->input->post('Street_number'),

					'fullname' => $this->input->post('fullname'),

					'surname' => $this->input->post('surname'),

					'district' => $district_name,

					// 'region' => $region_name,

					'city' => $city_name,

					'municipality' => $municipality_name,

					'province' => $this->input->post('province'),

				);

				if ($this->common->insertData('project_manager', $data)) {

					$this->session->set_flashdata('success', 'Project Manager Insert Successful');

					redirect('project_list');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('create_project');
				}
			} else {

				if (!empty($_FILES['company_documents']['name'])) {
					$path = "./uploads/project/company_documents/";
					$company_documents['company_documents']  = $this->singlefileupload('company_documents', "./uploads/project/company_documents/", 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				}

				if (!empty($_FILES['tax_clearances']['name'])) {
					$tax_clearances['tax_clearances'] = $this->singlefileupload('tax_clearances', './uploads/project/tax_clearance/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				}
				if (!empty($_FILES['moderator_accreditations']['name'])) {
					$moderator_accreditations['moderator_accreditations'] = $this->singlefileupload('moderator_accreditations', './uploads/project/moderator_accreditations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				}
				if (!empty($_FILES['assesor_acreditation']['name'])) {
					$assesor_acreditations['assesor_acreditations'] = $this->singlefileupload('assesor_acreditation', './uploads/project/assesor_acreditations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
				}
				if (!empty($_FILES['seta_creditiations']['name'])) {
					$seta_creditiations['seta_creditiations'] = $this->singlefileupload('seta_creditiations', './uploads/project/seta_creditiations/', 'pdf|gif|jpg|png|xls|doc|docx|jpeg');
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
				$municipality = $this->input->post('municipality');
				$municipalitydata = $this->common->one_municipality($municipality);
				$municipality_name = $municipalitydata->municipality;

				$data = array(
					'project_manager' => $this->input->post('project_manager'),
					'organization' => $this->input->post('organization'),
					'email_address' => $this->input->post('email_address'),
					'landline_number' => $this->input->post('landline_number'),
					'mobile_number' => $this->input->post('mobile_number'),
					'tax_clearance' => $tax_clearances['tax_clearances'],
					// 'company_registration_documents' => $company_documents['company_documents'],
					// 'moderator_accreditations' => $moderator_accreditations['moderator_accreditations'],
					// 'assesor_acreditations' => $assesor_acreditations['assesor_acreditations'],
					// 'seta_creditiations' => $seta_creditiations['seta_creditiations'],
					'created_by' => $id,
					// 'password' => sha1($this->input->post('password')),
					'Suburb' => $this->input->post('Suburb'),
					'Street_name' => $this->input->post('Street_name'),
					'Street_number' => $this->input->post('Street_number'),
					'fullname' => $this->input->post('fullname'),
					'surname' => $this->input->post('surname'),
					'district' => $district_name,
					// 'region' => $region_name,
					'city' => $city_name,
					'municipality' => $municipality_name,
					'province' => $this->input->post('province'),
				);
				if (!empty($company_documents['company_documents'])) {
					$data['company_registration_documents'] = $company_documents['company_documents'];
				}
				if (!empty($moderator_accreditations['moderator_accreditations'])) {
					$data['moderator_accreditations'] = $moderator_accreditations['moderator_accreditations'];
				}
				if (!empty($assesor_acreditations['assesor_acreditations'])) {
					$data['assesor_acreditations'] = $assesor_acreditations['assesor_acreditations'];
				}
				if (!empty($seta_creditiations['seta_creditiations'])) {
					$data['seta_creditiations'] = $seta_creditiations['seta_creditiations'];
				}
				if (!empty($this->input->post('password'))) {
					$pmanager = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');
					if ($this->input->post('password') != $pmanager->password) {
						$data['password'] =  sha1($this->input->post('password'));
					}
				}
				if ($this->common->updateData('project_manager', $data, ['id' => $id])) {
					$this->session->set_flashdata('success', 'Project Manager Updated Successful');
					redirect('project_list');
				} else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('create_project?id=' . $id);
				}
			}
		}
		if ($id != 0) {
			$this->data['record'] = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');
		}

		$this->data['District'] = $this->common->get_District();
		$this->data['province'] = $this->common->get_province();
		// $this->data['region'] = $this->common->get_region();
		$this->data['city'] = $this->common->get_city();
		$this->data['municipality'] = $this->common->get_municipality();

		$this->data['organization'] = $this->common->accessrecord('organisation', [], ['id' => $ids], 'result');
		$this->data['page'] = 'create_project';
		$this->data['content'] = 'pages/project/create_project';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function project_list()
	{
		$this->data['record'] = $this->common->accessrecord('project_manager', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		$this->data['page'] = 'project_list';
		$this->data['content'] = 'pages/project/project_list';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	// ************************************************************task*********************************************************

	public function create_new_task()
	{
		$this->data['page'] = 'new_task';
		$this->data['content'] = 'pages/new_task/create_new_task';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function create_new_task_list()
	{
		$this->data['page'] = 'new_task';
		$this->data['content'] = 'pages/new_task/create_new_task_list';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// ************************************************************message*********************************************************


	public function sendMassage()
	{
		if (empty($_POST)) {
			$this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'superadmin'], 'result');
			// $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
			$this->data['page'] = 'send_massage';
			$this->data['content'] = 'pages/massage/send_massage';
			$this->load->view('MyOrganization/tamplate', $this->data);
		} else {

			$receiverarr = $_POST['receiver'];
			$receiver = implode(",", $receiverarr);

			if (!empty($_FILES['attachment']['name'])) {

				$attachment = $this->singlefileupload('attachment', './uploads/messageattachment/', 'gif|jpg|png|pdf|doc|docx');
			} else {
				$attachment = "";
			}
			$data = array(
				'sender_id' => $_SESSION['organisation']['id'],
				'sender_type' => 'organization',
				'receiver_id' => $receiver,
				'receiver_type' => $_POST['receiver_type'],
				'subject' => $_POST['subject'],
				'message' => $_POST['message'],
				'attachment' => $attachment
			);
			$datau = $this->common->insertData('message', $data);
			$this->session->set_flashdata('success', 'Message Sent Successfully');
			redirect('organisation-sendMassage');
		}
	}
	public function get_receiver()
	{
		$type = $this->input->post('value');
		$data = array();
		if ($type == 'superadmin') {
			$data[0]['id'] = 'superadmin';
			$data[0]['name'] = 'superadmin';
		} elseif ($type == 'projectmanager') {
			$rece = $this->common->accessrecord('project_manager', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'trainer') {
			$rece = $this->common->accessrecord('trainer', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->full_name . " " . $recev->surname;
			}
		} elseif ($type == 'facilitator') {
			$rece = $this->common->accessrecord('facilitator', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		}
		echo json_encode($data);
	}

	public function get_receiver_contact()
	{
		$type = $this->input->post('value');
		$data = array();
		if ($type == 'superadmin') {
			$rece = $this->common->accessrecord('master_admin', ['*'], ['id' => 1], 'result');
			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile_number;
				$data[$key]['name'] = $recev->name;
			}
		} elseif ($type == 'projectmanager') {
			$rece = $this->common->accessrecord('project_manager', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile_number;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'trainer') {
			$rece = $this->common->accessrecord('trainer', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile;
				$data[$key]['name'] = $recev->full_name . " " . $recev->surname;
			}
		} elseif ($type == 'facilitator') {
			$rece = $this->common->accessrecord('facilitator', ['*'], ['organization' => $_SESSION['organisation']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		}
		echo json_encode($data);
	}

	public function inbox()
	{
		$this->data[] = array();
		$rcvd = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'organization'], 'result');
		foreach ($rcvd as $rcv => $received) {
			$receivers =  explode(',', $received->receiver_id);
			if (in_array($_SESSION['organisation']['id'], $receivers)) {
				$this->data['received'][$rcv] = $received;
			}
		}

		$this->data['page'] = 'received_massage';
		$this->data['content'] = 'pages/massage/received_messages';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function sentbox()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization', 'sender_id' => $_SESSION['organisation']['id']], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function sentboxview($id)
	{
		$this->data['viewsent'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'sentboxview';
		$this->data['content'] = 'pages/massage/sentboxview';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function inboxview($id)
	{
		$this->data['viewreceived'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'inboxview';
		$this->data['content'] = 'pages/massage/inboxview';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function trash()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization', 'sender_id' => $_SESSION['organisation']['id']], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function important()
	{
		$this->data['important'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization'], 'result');
		$this->data['page'] = 'important_massage';
		$this->data['content'] = 'pages/massage/important';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}


	// ************************************************************locations*********************************************************

	// public function create_province()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->accessrecord('province', [], ['id' => $id], 'row');
	// 	}

	// 	if ($_POST) {

	// 		if ($id != 0) {

	// 			$this->common->updateData('province', $_POST, ['id' => $id]);

	// 			$this->session->set_flashdata('success', 'Province Name Updated Succesfully');

	// 			redirect('create_province');
	// 		} else {

	// 			$data = array(
	// 				'name' =>  $this->input->post('name'),
	// 				'organization' => $_SESSION['organisation']['id']
	// 			);
	// 			$this->common->insertData('province', $data);

	// 			$this->session->set_flashdata('success', 'Province Name Successfully');
	// 		}
	// 	}


	// 	$this->data['data'] = $this->common->accessrecord('province', [], ['organization' => $_SESSION['organisation']['id']], 'result');

	// 	$this->data['page'] = 'create_province';

	// 	$this->data['content'] = 'pages/location/create_province';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	// public function create_district()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->one_District($id);
	// 	}

	// 	if ($_POST) {


	// 		$data = array(
	// 			'province_id' => $this->input->post('province_id'),
	// 			'name' => $this->input->post('name'),
	// 			'organization' => $_SESSION['organisation']['id']
	// 		);

	// 		if ($id != 0) {

	// 			$this->common->update_district($id, $data);

	// 			$this->session->set_flashdata('success', 'District Updated Succesfully');

	// 			redirect('create_district');
	// 		}

	// 		$this->common->insertDistrict($data);

	// 		$this->session->set_flashdata('success', 'District Added Successfully');

	// 		redirect('create_district');
	// 	} else {

	// 		//  get all data from province table :- 25-11-19

	// 		$this->data['District'] = $this->common->get_District();

	// 		$this->data['province'] = $this->common->get_province();

	// 		$this->data['page'] = 'create_district';

	// 		$this->data['content'] = 'pages/location/create_district';

	// 		$this->load->view('MyOrganization/tamplate', $this->data);
	// 	}
	// }



	// public function create_region()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->one_region($id);
	// 	}

	// 	if ($_POST) {



	// 		if ($id != 0) {

	// 			$data = $_POST;
	// 			$data['organization'] = $_SESSION['organisation']['id'];

	// 			print_r($data);
	// 			die;
	// 			$this->common->update_region($id, $data);

	// 			$this->session->set_flashdata('success', 'Region Updated Succesfully');

	// 			redirect('create_region');
	// 		} else {



	// 			$District = $this->common->one_District($this->input->post('District'));

	// 			$district_id = $District->name;

	// 			$data = array(
	// 				'organization' => $_SESSION['organisation']['id'],

	// 				'district_id' => $district_id,

	// 				'province_id' => $this->input->post('province'),

	// 				'region' => $this->input->post('region'),



	// 			);

	// 			$this->common->insertregion($data);

	// 			$this->session->set_flashdata('success', 'Region Added Successfully');

	// 			redirect('create_region');
	// 		}
	// 	} else {
	// 		$this->data['organization'] = $_SESSION['organisation']['id'];

	// 		$this->data['District'] = $this->common->get_District();

	// 		$this->data['province'] = $this->common->get_province();

	// 		$this->data['region'] = $this->common->get_region();


	// 		$this->data['page'] = 'create_region';

	// 		$this->data['content'] = 'pages/location/create_region';

	// 		$this->load->view('MyOrganization/tamplate', $this->data);
	// 	}
	// }



	// public function create_city()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->one_city($id);
	// 	}

	// 	if ($_POST) {

	// 		if ($id != 0) {

	// 			$data = $_POST;
	// 			$data['organization'] = $_SESSION['organisation']['id'];
	// 			$this->common->update_city($id, $data);

	// 			$this->session->set_flashdata('success', 'City Name Updated Succesfully');

	// 			redirect('create_city');
	// 		} else {

	// 			$District = $this->common->one_District($this->input->post('District'));

	// 			$district_id = $District->name;

	// 			$region = $this->common->one_region($this->input->post('region'));

	// 			$region_id = $region->region;

	// 			$data = array(
	// 				'organization' => $_SESSION['organisation']['id'],

	// 				'district_id' => $district_id,

	// 				'province_id' => $this->input->post('province'),

	// 				'region_id' => $region_id,

	// 				'city' => $this->input->post('city')



	// 			);

	// 			$this->common->insertcity($data);

	// 			$this->session->set_flashdata('success', 'City Name successfully');

	// 			redirect('create_city');
	// 		}
	// 	} else {

	// 		$this->data['District'] = $this->common->get_District();

	// 		$this->data['province'] = $this->common->get_province();

	// 		$this->data['region'] = $this->common->get_region();

	// 		$this->data['city'] = $this->common->get_city();



	// 		$this->data['page'] = 'create_city';

	// 		$this->data['content'] = 'pages/location/create_city';

	// 		$this->load->view('MyOrganization/tamplate', $this->data);
	// 	}
	// }

	public function get_destrict()
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

	public function get_region()
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

	public function get_city()
	{

		$District = $this->common->one_District($this->input->post('value'));

		$district_id = $District->name;

		$citydata = $this->common->get_district_city($district_id);

		if (!empty($citydata)) {

			$city_data = $citydata;
		} else {

			$city_data = array('error' => 'City list not available in this District');
		}

		echo json_encode($city_data);
	}



	// ************************************************************change password*********************************************************


	public function changepassword()
	{

		$this->data['page'] = 'changepassword';

		$this->data['content'] = 'changepassword';

		if ($_POST) {

			$id = $_SESSION['organisation']['id'];

			$oldpassword = sha1($this->input->post('oldpassword'));

			$password = $this->input->post('password');

			$datau = $this->common->accessrecord('organisation', ['id, password'], array('id' => $id), 'row');

			if ($datau->password == $oldpassword) {

				$this->common->updateData('organisation', array('password' => sha1($password)), array('id' => $id));

				$this->session->set_flashdata('success', 'Your Password Successfully Update');

				redirect('changepass');
			} else {

				$this->session->set_flashdata('error', 'Your Old Password Not Matched');
			}
		}

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// ************************************************************other*********************************************************
	public function editprofile()
	{

		$id = $_SESSION['organisation']['id'];

		if ($_POST) {
			// echo "hiii";die;


			if (!empty($_FILES['profile_image']['name'])) {

				$path = './uploads/orgprofile/';


				$_POST['profile_image'] = $this->fileupload('profile_image', $path);
				// print_r($_POST['profile_image']);die;
			} else {

				$organisation = $this->common->accessrecord('organisation', [], ['id' => $id], 'row');

				$data['profile_image'] = $organisation->profile_image;
				// print_r($data['profile_image']);die;
			}

			if ($this->common->updateData('organisation', $_POST, ['id' => $id])) {

				$this->session->set_flashdata('success', 'Profile Updated Succesfully');

				redirect('editprofile');
			} else {
				$this->session->set_flashdata('error', 'Please try Again');
				redirect('editprofile');
			}
		} else {

			$this->data['record'] = $this->common->accessrecord('organisation', [], ['id' => $id], 'row');

			$this->data['page'] = 'editprofile';

			$this->data['content'] = 'pages/myprofile/editprofile';

			$this->load->view('MyOrganization/tamplate', $this->data);
		}
	}




	public function report()
	{

		$this->data['page'] = 'report';

		$this->data['content'] = 'pages/report/report';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	// ************************************************************change password*********************************************************

	public function emailsend()
	{

		$newpas = rand(6, 1000000);

		$message = 'Your password is successfully updated!! <br>your new password is - ' . $newpas;

		if ($html = $this->Email_model->send_email_to_admin('deepasengar4444@gmail.com', $message)) {

			$this->load->library('email');

			$this->email->from('slash.sudeepshahu@gmail.com', 'LEARNING MANEGMENT');

			$this->email->to($email);

			$this->email->subject('Password is successfully updated');

			$this->email->set_mailtype("html");

			$this->email->message($html);

			$this->email->send();

			echo $this->email->print_debugger();
			die;
		}
	}

	//  get_destrict
	public function unit_standards()
	{

		$this->data['page'] = 'unit_standards';

		$this->data['content'] = 'pages/unit_standards/unit_standards';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	public function create_finanacial_year()
	{

		$this->data['page'] = 'create_finanacial_year';

		$this->data['content'] = 'pages/periods/create_finanacial_year';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	public function create_quarterly_periods()
	{

		$this->data['page'] = 'create_quarterly_periods';

		$this->data['content'] = 'pages/periods/create_quarterly_periods';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function income_item_list()
	{

		$this->data['record'] = $this->common->accessrecord('finance_income_item', [], [], 'result');

		if ($count = $this->common->accessrecord('finance_income_item', ['SUM(`amount`) as total_income_amount'], [], 'row')) {

			$this->data['count'] = $count;
		} else {

			$this->data['count'] = 0;
		}

		$this->data['page'] = 'income_item_list';

		$this->data['content'] = 'pages/finance/income_item_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function expense_item_list()
	{

		$this->data['data'] = $this->common->accessrecord('finance_expense_item', [], [], 'result');

		if ($count = $this->common->accessrecord('finance_expense_item', ['SUM(`expense_amount`) as total_expense_amount'], [], 'row')) {

			$this->data['count'] = $count;
		} else {

			$this->data['count'] = 0;
		}

		$this->data['page'] = 'expense_item_list';

		$this->data['content'] = 'pages/finance/expense_item_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	public function account_balance_list()
	{

		$this->data['record'] = $this->common->AccountBalanceData('admin_total_account', '');

		$this->data['page'] = 'account_balance_list';

		$this->data['content'] = 'pages/finance/account_balance_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function expense_view()
	{

		$expesnse_id = $this->input->get('id');

		$this->data['record'] = $this->common->accessrecord('finance_expense_item', [], ['funding_id' => $expesnse_id], 'result');

		$this->data['page'] = 'expense_view';

		$this->data['content'] = 'pages/finance/expense_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// 	public function create_organisation(){MyOrganizationadmin/tamplate', $this->data);

	// 	}



	// 	public function organisation_list(){MyOrganizationadmin/tamplate', $this->data);

	// 	}



	public function programmer_list()
	{

		$this->data['record'] = $this->common->accessrecord('programme_director', [], [], 'result');

		$this->data['page'] = 'programmer_list';

		$this->data['content'] = 'pages/programmer/programmer_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}


	private function fileupload($image, $path)
	{

		$config['upload_path']          = $path;

		$config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip|jpeg|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt';

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


	private function singlefileupload($image, $path, $allowed_types)
	{

		$config['upload_path']          = $path;

		$config['allowed_types']        = $allowed_types;

		$config['encrypt_name']         = TRUE;

		$config['remove_spaces']        = TRUE;

		$config['detect_mime']          = TRUE;

		$config['overwrite']            = TRUE;

		$config['file_ext_tolower']     = TRUE;

		// $rand=mt_rand(8,strtotime(date('Y-m-d')));

		//    $ext = pathinfo($image, PATHINFO_EXTENSION);

		//    $fileName =$rand;

		//   // $images[] = $fileName.'.'.$ext;

		//    $config['file_name'] = $fileName.'.'.$ext;



		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if (!$this->upload->do_upload($image)) {
			echo ($path);
			echo $this->upload->display_errors();
			die;
		} else {

			$data = $this->upload->data();

			$name = $data['file_name'];

			return $name;
		}
	}



	// 	public function create_programmer(){MyOrganizationadmin/tamplate', $this->data);

	// 	}








	// public function create_training()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->one_trining($id);
	// 	}



	// 	if ($_POST) {

	// 		$data['company_name'] = $this->input->post('company_name');

	// 		$data['full_name'] = $this->input->post('full_name');

	// 		$data['surname'] = $this->input->post('surname');

	// 		$data['email'] = $this->input->post('email');

	// 		$data['mobile'] = $this->input->post('mobile');

	// 		$data['landline'] = $this->input->post('landline');

	// 		$data['project_id'] = $this->input->post('project_id');

	// 		$data['province'] = $this->input->post('province');

	// 		$data['Suburb'] = $this->input->post('Suburb');

	// 		$data['Street_name'] = $this->input->post('Street_name');

	// 		$data['Street_number'] = $this->input->post('Street_number');

	// 		$district = $this->input->post('district');

	// 		$District = $this->common->one_District($district);

	// 		$data['district'] = $District->name;

	// 		$region = $this->input->post('region');

	// 		$regiondata = $this->common->one_region($region);

	// 		$data['region'] = $regiondata->region;

	// 		$city = $this->input->post('city');

	// 		$citydata = $this->common->one_city($city);

	// 		$data['city'] = $citydata->city;

	// 		if ($id != 0) {

	// 			$password = $_POST['password'];

	// 			if ($trainer = $this->common->accessrecord('trainer', [], ['id' => $id, 'password' => $password], 'row')) {

	// 				$old_password = $trainer->password;

	// 				if ($old_password == $password) {

	// 					$data['password'] = $old_password;
	// 				} else {

	// 					$data['password'] = sha1($_POST['password']);
	// 				}
	// 			} else {

	// 				$data['password'] = sha1($_POST['password']);
	// 			}

	// 			if (!empty($_FILES['attach_documents']['name'])) {

	// 				$path = "./uploads/training/attach_documents/";

	// 				$image = $this->MultipleImageUpload($_FILES['attach_documents'], $path, 'attach_documents');

	// 				$company_documents_regi = $this->common->accessrecord('trainer', [], ['id' => $id], 'row');

	// 				$company_image = $company_documents_regi->attach_documents;

	// 				$gallery = "";

	// 				foreach ($image as $value) {

	// 					$gallery .= $value . ",";
	// 				}

	// 				$company_files = rtrim($gallery, ',');

	// 				if (!empty($company_files)) {

	// 					if (!empty($company_image)) {

	// 						$data['attach_documents'] = $company_image . ',' . $company_files;
	// 					} else {

	// 						$data['attach_documents'] = $company_files;
	// 					}
	// 				} else {

	// 					$data['attach_documents'] = $company_image;
	// 				}
	// 			} else {

	// 				$company_documents_regi = $this->common->accessrecord('trainer', [], ['id' => $id], 'row');

	// 				$data['attach_documents'] = $company_documents_regi->attach_documents;
	// 			}

	// 			$this->common->update_training($id, $data);

	// 			$this->session->set_flashdata('success', 'Training Updated Succesfully');

	// 			redirect('training_list');
	// 		} else {

	// 			if (!empty($_FILES['attach_document']['name'])) {

	// 				$path = "./uploads/training/attach_documents/";

	// 				$image = $this->MultipleImageUpload($_FILES['attach_document'], $path, 'attach_document');

	// 				$gallery = "";

	// 				foreach ($image as $value) {

	// 					$gallery .= $value . ",";
	// 				}

	// 				$data['attach_documents'] = rtrim($gallery, ',');
	// 			} else {

	// 				$data['attach_documents'] = "";
	// 			}

	// 			$training = $this->common->save_training($data);

	// 			$this->session->set_flashdata('success', 'Add Training Successfully');

	// 			redirect('training_list');
	// 		}
	// 	}

	// 	$this->data['District'] = $this->common->get_District();

	// 	$this->data['province'] = $this->common->get_province();

	// 	$this->data['region'] = $this->common->get_region();

	// 	$this->data['city'] = $this->common->get_city();

	// 	$this->data['project'] = $this->common->accessrecord('project_manager', ['organization'=>$_SESSION['organisation']['id']], [], 'result');

	// 	$this->data['page'] = 'create_training';

	// 	$this->data['content'] = 'pages/training/create_training';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	//  Learner

	// public function create_learner()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->one_learner($id);
	// 	}

	// 	if ($_POST) {

	// 		$data = $_POST;

	// 		if ($id != 0) {

	// 			if (!empty($_FILES['id_copy']['name'])) {

	// 				$path = './uploads/learner/id_copy/';



	// 				$images = $this->singlefileupload('id_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['id_copy'] = $images;
	// 			} else {

	// 				$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

	// 				$data['id_copy'] = $learner->id_copy;
	// 			}

	// 			if (!empty($_FILES['certificate_copy']['name'])) {



	// 				$path = './uploads/learner/certificate_copy/';

	// 				$images = $this->singlefileupload('certificate_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['certificate_copy'] = $images;
	// 			} else {

	// 				$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

	// 				$data['certificate_copy'] = $learner->certificate_copy;
	// 			}

	// 			if (!empty($_FILES['contract_copy']['name'])) {



	// 				$path = './uploads/learner/contract_copy/';

	// 				$images = $this->singlefileupload('contract_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['contract_copy'] = $images;
	// 			} else {

	// 				$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

	// 				$data['contract_copy'] = $learner->contract_copy;
	// 			}

	// 			$password = $_POST['password'];

	// 			if ($learner = $this->common->accessrecord('learner', [], ['id' => $id, 'password' => $password], 'row')) {

	// 				$old_password = $learner->password;

	// 				if ($old_password == $password) {

	// 					$data['password'] = $old_password;
	// 				} else {

	// 					$data['password'] = sha1($_POST['password']);
	// 				}
	// 			} else {

	// 				$data['password'] = sha1($_POST['password']);
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$data['district'] = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$data['region'] = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$data['city'] = $citydata->city;

	// 			$this->common->update_learner($id, $data);

	// 			$this->session->set_flashdata('success', 'Learner Updated Succesfully');

	// 			redirect('list_learner');
	// 		} else {

	// 			if (!empty($_FILES['id_copy']['name'])) {

	// 				$path = './uploads/learner/id_copy/';

	// 				$images = $this->singlefileupload('id_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['id_copy'] = $images;
	// 			} else {

	// 				$data['id_copy'] = "";
	// 			}

	// 			if (!empty($_FILES['certificate_copy']['name'])) {

	// 				$path = './uploads/learner/certificate_copy/';

	// 				$images = $this->singlefileupload('certificate_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['certificate_copy'] = $images;
	// 			} else {

	// 				$data['certificate_copy'] = "";
	// 			}

	// 			if (!empty($_FILES['contract_copy']['name'])) {

	// 				$path = './uploads/learner/contract_copy/';

	// 				$images = $this->singlefileupload('contract_copy', $path, 'gif|jpg|png|xls|doc|docx|jpeg');

	// 				$data['contract_copy'] = $images;
	// 			} else {

	// 				$data['contract_copy']  = "";
	// 			}



	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$data['district'] = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$data['region'] = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$data['city'] = $citydata->city;

	// 			$training = $this->common->save_learner($data);

	// 			$this->session->set_flashdata('success', 'Add Learner Successfully');

	// 			redirect('list_learner');
	// 		}
	// 	}

	// 	$this->data['learnership_sub_type'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

	// 	$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');

	// 	$this->data['District'] = $this->common->get_District();

	// 	$this->data['province'] = $this->common->get_province();

	// 	$this->data['region'] = $this->common->get_region();

	// 	$this->data['city'] = $this->common->get_city();

	// 	$this->data['training'] =  $this->common->accessrecord('trainer', [], ['organization'=>$_SESSION['organisation']['id']], 'result');

	// 	$this->data['page'] = 'create_learner';

	// 	$this->data['content'] = 'pages/learner/create_learner';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	public function training_list()
	{

		$this->data['training'] = $this->common->accessrecord('trainer', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'training_list';

		$this->data['content'] = 'pages/training/training_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	/* List learner*/

	public function list_learner()
	{

		$this->data['learner'] = $this->common->accessrecord('learner', [], ['organization' => $_SESSION['organisation']['id']], 'result');
		// print_r($this->data['learner']);die;
		$this->data['page'] = 'learner_list';

		$this->data['content'] = 'pages/learner/learner_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	// public function create_facilitator()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->accessrecord('facilitator', [], ['id' => $id], 'row');
	// 	}

	// 	if ($_POST) {

	// 		if ($id != 0) {

	// 			$array = [];

	// 			if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

	// 				foreach ($_POST['acreditations_image'] as  $value_one) {

	// 					$exp = explode(',', $value_one);

	// 					$array_two[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);

	// 					$id = $exp[0];
	// 				}

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/facilitator/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						$increment_id = '';

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$increment_id = $id + 1 + $key;

	// 							$array_one[] = array(
	// 								'id' => $increment_id,

	// 								'acreditations' => $_POST['acreditations'][$increment_id],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = array_merge($array_two, $array_one);
	// 			} elseif (!empty($_POST['acreditations_image'])) {

	// 				foreach ($_POST['acreditations_image'] as $key => $value) {

	// 					$exp = explode(',', $value);

	// 					$array[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);
	// 				}

	// 				$acreditations_files = $array;
	// 			} else {

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/facilitator/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$array[] = array(
	// 								'id' => $key,

	// 								'acreditations' => $_POST['acreditations'][$key],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = $array;
	// 			}

	// 			if (empty($acreditations_files)) {

	// 				$acreditations_file = '';
	// 			} else {

	// 				$acreditations_file = serialize($acreditations_files);
	// 			}

	// 			$password = $_POST['password'];

	// 			if ($facilitator = $this->common->accessrecord('facilitator', [], ['id' => $id, 'password' => $password], 'row')) {

	// 				$old_password = $facilitator->password;

	// 				if ($old_password == $password) {

	// 					$pass = $old_password;
	// 				} else {

	// 					$pass = sha1($_POST['password']);
	// 				}
	// 			} else {

	// 				$pass = sha1($_POST['password']);
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => $pass,

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 				'classname' => $this->input->post('classname'),

	// 			);

	// 			if ($this->common->updateData('facilitator', $data, ['id' => $_GET['id']])) {

	// 				$this->session->set_flashdata('success', 'Facilitator Update Successfully');

	// 				redirect('facilitator_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('facilitator_list');
	// 			}
	// 		} else {

	// 			$array = [];

	// 			if (!empty($_FILES['acreditations_file']['name'])) {

	// 				$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 				if (!empty($arrayFilter)) {

	// 					$path = './uploads/facilitator/acreditationsfiles/';

	// 					$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 					foreach ($_POST['acreditations'] as $key => $value) {

	// 						$array[] = array(
	// 							'id' => $key,

	// 							'acreditations' => $value,

	// 							'acreditations_file' => $image[$key]

	// 						);
	// 					}
	// 				}

	// 				$acreditations_file = serialize($array);
	// 			} else {

	// 				$acreditations_file = "";
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => sha1($this->input->post('password')),

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 				'classname' => $this->input->post('classname'),

	// 			);





	// 			if ($this->common->insertData('facilitator', $data)) {

	// 				$this->session->set_flashdata('success', 'Facilitator Insert Successful');

	// 				redirect('facilitator_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('create_facilitator');
	// 			}
	// 		}

	// 		if ($id != 0) {

	// 			$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['id' => $id], 'row');
	// 		}
	// 	}

	// 	$this->data['District'] = $this->common->get_District();

	// 	$this->data['province'] = $this->common->get_province();

	// 	$this->data['region'] = $this->common->get_region();

	// 	$this->data['city'] = $this->common->get_city();

	// 	$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');



	// 	$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');

	// 	$this->data['page'] = 'create_facilitator';

	// 	$this->data['content'] = 'pages/facilitator/create_facilitator';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	public function facilitator_list()
	{

		$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'facilitator_list';

		$this->data['content'] = 'pages/facilitator/facilitator_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	// public function create_assessor()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->accessrecord('assessor', [], ['id' => $id], 'row');
	// 	}

	// 	if ($_POST) {

	// 		if ($id != 0) {

	// 			$array = [];

	// 			if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

	// 				foreach ($_POST['acreditations_image'] as  $value_one) {

	// 					$exp = explode(',', $value_one);

	// 					$array_two[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);

	// 					$id = $exp[0];
	// 				}

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						$increment_id = '';

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$increment_id = $id + 1 + $key;

	// 							$array_one[] = array(
	// 								'id' => $increment_id,

	// 								'acreditations' => $_POST['acreditations'][$increment_id],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = array_merge($array_two, $array_one);
	// 			} elseif (!empty($_POST['acreditations_image'])) {

	// 				foreach ($_POST['acreditations_image'] as $key => $value) {

	// 					$exp = explode(',', $value);

	// 					$array[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);
	// 				}

	// 				$acreditations_files = $array;
	// 			} else {

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$array[] = array(
	// 								'id' => $key,

	// 								'acreditations' => $_POST['acreditations'][$key],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = $array;
	// 			}

	// 			if (empty($acreditations_files)) {

	// 				$acreditations_file = '';
	// 			} else {

	// 				$acreditations_file = serialize($acreditations_files);
	// 			}

	// 			$password = $_POST['password'];

	// 			if ($assessor = $this->common->accessrecord('assessor', [], ['id' => $id, 'password' => $password], 'row')) {

	// 				$old_password = $assessor->password;

	// 				if ($old_password == $password) {

	// 					$pass = $old_password;
	// 				} else {

	// 					$pass = sha1($password);
	// 				}
	// 			} else {

	// 				$pass = sha1($password);
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => $pass,

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),



	// 			);

	// 			if ($this->common->updateData('assessor', $data, ['id' => $_GET['id']])) {

	// 				$this->session->set_flashdata('success', 'Assessors Update Successfully');

	// 				redirect('assessor_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('assessor_list');
	// 			}
	// 		} else {

	// 			$array = [];

	// 			if (!empty($_FILES['acreditations_file']['name'])) {

	// 				$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 				if (!empty($arrayFilter)) {

	// 					$path = './uploads/acreditationsfiles/';

	// 					$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 					foreach ($_POST['acreditations'] as $key => $value) {

	// 						$array[] = array(
	// 							'id' => $key,

	// 							'acreditations' => $value,

	// 							'acreditations_file' => $image[$key]

	// 						);
	// 					}
	// 				}

	// 				$acreditations_file = serialize($array);
	// 			} else {

	// 				$acreditations_file = "";
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => sha1($this->input->post('password')),

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 			);



	// 			if ($this->common->insertData('assessor', $data)) {

	// 				$this->session->set_flashdata('success', 'Assessors Insert Successfully');

	// 				redirect('assessor_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('create_assessor');
	// 			}
	// 		}

	// 		if ($id != 0) {

	// 			$this->data['assessor'] = $this->common->accessrecord('assessor', [], ['id' => $id], 'row');
	// 		}
	// 	}

	// 	$this->data['District'] = $this->common->get_District();

	// 	$this->data['province'] = $this->common->get_province();

	// 	$this->data['region'] = $this->common->get_region();

	// 	$this->data['city'] = $this->common->get_city();

	// 	$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');

	// 	$this->data['page'] = 'create_assessor';

	// 	$this->data['content'] = 'pages/assessor/create_assessor';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }

	public function assessor_list()
	{

		$this->data['assessor'] = $this->common->accessrecord('assessor', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'assessor_list';

		$this->data['content'] = 'pages/assessor/assessor_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// public function create_moderator()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->accessrecord('moderator', [], ['id' => $id], 'row');
	// 	}

	// 	if ($_POST) {

	// 		if ($id != 0) {

	// 			$array = [];

	// 			if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {

	// 				foreach ($_POST['acreditations_image'] as  $value_one) {

	// 					$exp = explode(',', $value_one);

	// 					$array_two[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);

	// 					$id = $exp[0];
	// 				}

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/moderator/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						$increment_id = '';

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$increment_id = $id + 1 + $key;

	// 							$array_one[] = array(
	// 								'id' => $increment_id,

	// 								'acreditations' => $_POST['acreditations'][$increment_id],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = array_merge($array_two, $array_one);
	// 			} elseif (!empty($_POST['acreditations_image'])) {

	// 				foreach ($_POST['acreditations_image'] as $key => $value) {

	// 					$exp = explode(',', $value);

	// 					$array[] = array(
	// 						'id' => $exp[0],

	// 						'acreditations' => $exp[1],

	// 						'acreditations_file' => $exp[2]

	// 					);
	// 				}

	// 				$acreditations_files = $array;
	// 			} else {

	// 				if (!empty($_FILES['acreditations_file']['name'])) {

	// 					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 					if (!empty($arrayFilter)) {

	// 						$path = './uploads/moderator/acreditationsfiles/';

	// 						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {

	// 							$array[] = array(
	// 								'id' => $key,

	// 								'acreditations' => $_POST['acreditations'][$key],

	// 								'acreditations_file' => $image[$key]

	// 							);
	// 						}
	// 					}
	// 				}

	// 				$acreditations_files = $array;
	// 			}

	// 			if (empty($acreditations_files)) {

	// 				$acreditations_file = '';
	// 			} else {

	// 				$acreditations_file = serialize($acreditations_files);
	// 			}

	// 			$password = $_POST['password'];

	// 			if ($moderator = $this->common->accessrecord('moderator', [], ['id' => $id, 'password' => $password], 'row')) {

	// 				$old_password = $moderator->password;

	// 				if ($old_password == $password) {

	// 					$pass = $old_password;
	// 				} else {

	// 					$pass = sha1($password);
	// 				}
	// 			} else {

	// 				$pass = sha1($password);
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => $pass,

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 			);

	// 			if ($this->common->updateData('moderator', $data, ['id' => $_GET['id']])) {

	// 				$this->session->set_flashdata('success', 'Moderator Update Successfully');

	// 				redirect('moderator_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('moderator_list');
	// 			}
	// 		} else {

	// 			$array = [];

	// 			if (!empty($_FILES['acreditations_file']['name'])) {

	// 				$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));

	// 				if (!empty($arrayFilter)) {

	// 					$path = './uploads/moderator/acreditationsfiles/';

	// 					$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');

	// 					foreach ($_POST['acreditations'] as $key => $value) {

	// 						$array[] = array(
	// 							'id' => $key,

	// 							'acreditations' => $value,

	// 							'acreditations_file' => $image[$key]

	// 						);
	// 					}
	// 				}

	// 				$acreditations_file = serialize($array);
	// 			} else {

	// 				$acreditations_file = "";
	// 			}

	// 			$district = $this->input->post('district');

	// 			$District = $this->common->one_District($district);

	// 			$district_name = $District->name;

	// 			$region = $this->input->post('region');

	// 			$regiondata = $this->common->one_region($region);

	// 			$region_name = $regiondata->region;

	// 			$city = $this->input->post('city');

	// 			$citydata = $this->common->one_city($city);

	// 			$city_name = $citydata->city;

	// 			$data = array(
	// 				'fullname' => $this->input->post('fullname'),

	// 				'surname' => $this->input->post('surname'),

	// 				'email' => $this->input->post('email'),

	// 				'id_number' => $this->input->post('id_number'),

	// 				'landline' => $this->input->post('landline'),

	// 				'mobile' => $this->input->post('mobile'),

	// 				'acreditations_file' => $acreditations_file,

	// 				'trainer_id' => $this->input->post('trainer_id'),

	// 				'created_by' => $this->input->post('created_by'),

	// 				'password' => sha1($this->input->post('password')),

	// 				'Suburb' => $this->input->post('Suburb'),

	// 				'Street_name' => $this->input->post('Street_name'),

	// 				'Street_number' => $this->input->post('Street_number'),

	// 				'district' => $district_name,

	// 				'region' => $region_name,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 			);

	// 			if ($this->common->insertData('moderator', $data)) {

	// 				$this->session->set_flashdata('success', 'Moderator Insert Successful');

	// 				redirect('moderator_list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('create_moderator');
	// 			}
	// 		}

	// 		if ($id != 0) {

	// 			$this->data['moderator'] = $this->common->accessrecord('moderator', [], ['id' => $id], 'row');
	// 		}
	// 	}

	// 	$this->data['District'] = $this->common->get_District();

	// 	$this->data['province'] = $this->common->get_province();

	// 	$this->data['region'] = $this->common->get_region();

	// 	$this->data['city'] = $this->common->get_city();

	// 	$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');

	// 	$this->data['page'] = 'create_moderator';

	// 	$this->data['content'] = 'pages/moderator/create_moderator';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }

	public function moderator_list()
	{

		$this->data['moderator'] = $this->common->accessrecord('moderator', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'moderator_list';

		$this->data['content'] = 'pages/moderator/moderator_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}


	public function external_moderator_list()
	{

		$this->data['moderator'] = $this->common->accessrecord('external_moderator', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'moderator_list';

		$this->data['content'] = 'pages/moderator/moderator_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function upcoming()
	{

		$this->data['page'] = 'upcoming';

		$this->data['content'] = 'pages/finance/upcoming';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	/*=================delete record============= */

	function deletedata()
	{

		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

		/*$this->session->set_flashdata('success','Record Deleted Successfully');

		redirect($_SERVER['HTTP_REFERER']);*/
	}

	/*=================end=========end=========== */



	public function logout()
	{

		$this->session->unset_userdata("admin");

		$this->session->sess_destroy();

		redirect(BASEURL);
	}

	public function manageLearnership()
	{

		$this->data['learnership'] = $this->common->accessrecord('learnership', [], [], 'result');

		$this->data['page'] = 'learnershipList';

		$this->data['content'] = 'pages/manage-learnership/learnership-list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// public function createLearnership()
	// {

	// 	$this->data['page'] = 'createLearnership';

	// 	$this->data['content'] = 'pages/manage-learnership/create-learnership';

	// 	if (isset($_GET['learnid'])) {

	// 		$learnid = $_GET['learnid'];

	// 		$this->data['learn'] = $this->common->accessrecord('learnership', [], array('id' => $learnid), 'row');
	// 	}

	// 	$this->form_validation->set_rules('name', 'Learnership name', 'required');

	// 	$this->form_validation->set_rules('saqa_registration_id', 'SAQA Registration ID', 'required');



	// 	if (isset($_POST)) {

	// 		if ($this->form_validation->run() == FALSE) {
	// 		} else {

	// 			$data = $_POST;

	// 			if (!empty($learnid)) {

	// 				$this->common->update_learner_tr('learnership', ['id' => $learnid], $data);

	// 				$this->session->set_flashdata('success', 'Learnership updated Succesfully');

	// 				redirect('All-learnership-list');
	// 			} else {

	// 				$data['created_by'] = $_SESSION['organisation']['id'];

	// 				$data['user_type'] = 1;

	// 				$training = $this->common->save_learner_tr('learnership', $data);

	// 				$this->session->set_flashdata('success', 'Learnership add Succesfully');

	// 				redirect('All-learnership-list');
	// 			}
	// 		}
	// 	}

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	public function learnershipSubList()
	{

		$this->data['learnershipSubType'] = $this->common->learnershipSubType('learnership_sub_type', [], [], 'result');

		$this->data['page'] = 'learnershipSubType';

		$this->data['content'] = 'pages/manage-sub-learnership/learnership-sub-list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	// public function createSubLearnership()
	// {

	// 	if (!empty($_GET['sublearnid'])) {

	// 		$sublearnid = $_GET['sublearnid'];

	// 		$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], array('id' => $sublearnid), 'row');
	// 	}

	// 	if (!empty($_POST)) {

	// 		$this->form_validation->set_rules('learnship_id', 'Learnership name', 'required');

	// 		$this->form_validation->set_rules('sub_type', 'Learnership sub type name', 'required');

	// 		$this->form_validation->set_rules('min_credit', 'Minimum credits', 'required');

	// 		$this->form_validation->set_rules('total_credits_allocated', 'Total credits allocated', 'required');

	// 		if ($this->form_validation->run() == FALSE) {
	// 		} else {

	// 			extract($_POST);

	// 			//

	// 			$units = $this->input->post('unit_standard');

	// 			$newunit = array();

	// 			foreach ($units as $key => $value) {

	// 				$un_name = $this->common->accessrecord('units', ['title'], array('id' => $value), 'row');

	// 				$newunit[] = $un_name->title;
	// 			}

	// 			$data = array(
	// 				'user_type' => 1,

	// 				'learnship_id' => $this->input->post('learnship_id'),

	// 				'sub_type' => $this->input->post('sub_type'),

	// 				'min_credit' => $this->input->post('min_credit'),

	// 				'unit_standard' => implode(',', $this->input->post('unit_standard')),

	// 				'unit_name' => implode(',', $newunit),

	// 				'total_credits_allocated' => $this->input->post('total_credits_allocated'),

	// 				'created_by' => adminid()

	// 			);

	// 			if (!empty($sublearnid)) {

	// 				$this->common->update_learner_tr('learnership_sub_type', ['id' => $sublearnid], $data);

	// 				$this->session->set_flashdata('success', 'Learnership sub type updated Succesfully');
	// 			} else {

	// 				$training = $this->common->save_learner_tr('learnership_sub_type', $data);

	// 				$this->session->set_flashdata('success', 'Learnership sub type add Succesfully');
	// 			}

	// 			redirect('All-learnership-sub-list');
	// 		}
	// 	}

	// 	$this->data['units'] = $this->common->accessrecord('units', [], [], 'result');

	// 	$this->data['learnership'] = $this->common->accessrecord('learnership', [], [], 'result');

	// 	$this->data['page'] = 'createlearnershipSubType';

	// 	$this->data['content'] = 'pages/manage-sub-learnership/create-sub-learnership';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }

	public function manageUnit()
	{

		$this->data['units'] = $this->common->accessrecord('units', [], [], 'result');

		$this->data['page'] = 'unitList';

		$this->data['content'] = 'pages/manage-unit/unit-list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	// public function createUnit()
	// {

	// 	$this->data['page'] = 'createUnit';

	// 	$this->data['content'] = 'pages/manage-unit/create_unit';

	// 	if (isset($_GET['uid'])) {

	// 		$unitid = $_GET['uid'];

	// 		$this->data['units'] = $this->common->accessrecord('units', [], array('id' => $unitid), 'row');
	// 	}

	// 	$this->form_validation->set_rules('title', 'Title', 'required');

	// 	$this->form_validation->set_rules('total_credits', 'Credits', 'required');

	// 	$this->form_validation->set_rules('unit_standard_type', 'Unit Standard Type', 'required');

	// 	$this->form_validation->set_rules('standard_id', 'Standard ID', 'required');

	// 	if (isset($_POST)) {

	// 		if ($this->form_validation->run() == FALSE) {
	// 		} else {

	// 			$data = $_POST;

	// 			if (!empty($unitid)) {

	// 				if ($this->common->update_learner_tr('units', ['id' => $unitid], $data)) {

	// 					$this->session->set_flashdata('success', 'Unit updated Succesfully');

	// 					redirect('All-manage-unit');
	// 				}
	// 			} else {

	// 				$data['created_by'] = $_SESSION['organisation']['id'];

	// 				$data['user_type'] = 1;

	// 				$training = $this->common->save_learner_tr('units', $data);

	// 				$this->session->set_flashdata('success', 'Unit add Succesfully');

	// 				redirect('All-manage-unit');
	// 			}
	// 		}
	// 	}

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }

	private function MultipleImageUpload($files, $path, $title)
	{



		$tempp = array_filter($files['name']);

		// for multiple file uploads

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

	public function changestatus()
	{

		$status = $this->input->post('status');

		$tablenm_id = $this->input->post('tablenm_id');

		$explode = explode('.', $tablenm_id);

		$tablenm = $explode[0];

		$id = $explode[1];

		$data = $this->common->update_status($tablenm, $id, $status);

		if ($data) {

			echo "true";
		}
	}

	public function acreditations_file_delete()
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

	// public function import_learner()
	// {

	// 	$this->data['page'] = 'import_learner';

	// 	$this->data['content'] = 'pages/learner/import_learner';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }

	public function import_data()
	{

		$path = './uploads/learner/import_learner/';

		$config['upload_path'] = $path;

		$config['allowed_types'] = 'xls';

		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('learner')) {

			$this->session->set_flashdata('error', $this->upload->display_errors());

			redirect('import_learner');
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

		$makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email', 'IdNumber' => 'IdNumber', 'SETA' => 'SETA', 'PrimaryMobileNumber' => 'PrimaryMobileNumber', 'SecondaryMobileNumber' => 'SecondaryMobileNumber', 'Gender' => 'Gender', 'LearnershipSubType' => 'LearnershipSubType', 'Password' => 'Password', 'Province' => 'Province', 'District' => 'District', 'City' => 'City', 'Region' => 'Region', 'Suburb' => 'Suburb', 'StreetName' => 'StreetName', 'StreetNumber' => 'StreetNumber', 'Assessment' => 'Assessment', 'IsDisable' => 'IsDisable', 'UifBenefits' => 'UifBenefits', 'LearnerAcceptedforTraining' => 'LearnerAcceptedforTraining', 'ClassName' => 'ClassName');

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

					$this->session->set_flashdata('error', 'Please enter your training provider');

					redirect('import_learner');
				}

				$first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);

				if (empty($first_name)) {

					$this->session->set_flashdata('error', 'Please enter your full name');

					redirect('import_learner');
				}

				//$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);

				$surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);

				if (empty($surname)) {

					$this->session->set_flashdata('error', 'Please enter your surname');

					redirect('import_learner');
				}

				$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);

				if (empty($email)) {

					$this->session->set_flashdata('error', 'Please enter your email');

					redirect('import_learner');
				}

				$mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);

				if (empty($mobile)) {

					$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');

					redirect('import_learner');
				}

				$mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);

				if (empty($mobile_number)) {

					$this->session->set_flashdata('error', 'Please enter your second cellphone number');

					redirect('import_learner');
				}

				$assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);

				if (empty($assessment)) {

					$this->session->set_flashdata('error', 'Please enter your assessment status');

					redirect('import_learner');
				}

				$disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);

				if (empty($disable)) {

					$this->session->set_flashdata('error', 'Please enter your disabled');

					redirect('import_learner');
				}

				$utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);

				if (empty($utf_benefits)) {

					$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');

					redirect('import_learner');
				}

				$learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);

				if (empty($learner_accepted_training)) {

					$this->session->set_flashdata('error', 'Please enter your learner accepted training');

					redirect('import_learner');
				}

				$learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);

				if (empty($learnershipSubType)) {

					$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');

					redirect('import_learner');
				}

				$id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);

				if (empty($id_number)) {

					$this->session->set_flashdata('error', 'Please enter your id number');

					redirect('import_learner');
				}

				$SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);

				if (empty($SETA)) {

					$this->session->set_flashdata('error', 'Please enter your SETA');

					redirect('import_learner');
				}

				$province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);

				if (empty($province)) {

					$this->session->set_flashdata('error', 'Please enter your province');

					redirect('import_learner');
				}

				$district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);

				if (empty($district)) {

					$this->session->set_flashdata('error', 'Please enter your district');

					redirect('import_learner');
				}

				$city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);

				if (empty($city)) {

					$this->session->set_flashdata('error', 'Please enter your city');

					redirect('import_learner');
				}

				$region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);

				if (empty($region)) {

					$this->session->set_flashdata('error', 'Please enter your region');

					redirect('import_learner');
				}

				$Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);

				if (empty($Suburb)) {

					$this->session->set_flashdata('error', 'Please enter your Suburb');

					redirect('import_learner');
				}

				$Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);

				if (empty($Street_name)) {

					$this->session->set_flashdata('error', 'Please enter your street name');

					redirect('import_learner');
				}

				$Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);

				if (empty($Street_number)) {

					$this->session->set_flashdata('error', 'Please enter your street number');

					redirect('import_learner');
				}

				$password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);

				if (empty($password)) {

					$this->session->set_flashdata('error', 'Please enter your password');

					redirect('import_learner');
				}

				$gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);

				if (empty($gender)) {

					$this->session->set_flashdata('error', 'Please enter your gender');

					redirect('import_learner');
				}

				$classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);

				if (empty($classname)) {

					$this->session->set_flashdata('error', 'Please enter your class name');

					redirect('import_learner');
				}

				$fetchData[] = array('trining_provider' => $company_name, 'first_name' => $first_name,  'surname' => $surname, 'email' => $email, 'mobile' => $mobile, 'mobile_number' => $mobile_number, 'assessment' => $assessment, 'disable' => $disable, 'utf_benefits' => $utf_benefits, 'learner_accepted_training' => $learner_accepted_training, 'learnershipSubType' => $learnershipSubType, 'id_number' => $id_number, 'SETA' => $SETA, 'province' => $province, 'district' => $district, 'city' => $city, 'region' => $region, 'Suburb' => $Suburb, 'Street_name' => $Street_name, 'Street_number' => $Street_number, 'password' => sha1($password), 'gender' => $gender, 'classname' => $classname);
			}

			$data['employeeInfo'] = $fetchData;

			$this->common->setBatchImport($fetchData);

			$this->common->importData();
		} else {

			$this->session->set_flashdata('error', 'Please import correct file');

			redirect('import_learner');
		}

		redirect('list_learner');
	}

	public function complaints_suggestion_list()
	{

		$this->data['page'] = 'complaints_suggestionlist';

		$this->data['content'] = 'pages/complaints_suggestion/complaints_suggestionlist';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function drop_out_list()
	{

		$this->data['record'] = $this->common->accessrecord('drop_out', [], [], 'result');

		$this->data['page'] = 'drop_out_list';

		$this->data['content'] = 'pages/drop_out/drop_out_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function stipends_list()
	{

		$this->data['record'] = $this->common->accessrecord('stipend', [], ['organization' => $_SESSION['organisation']['id']], 'result');

		$this->data['page'] = 'stipend_list';

		$this->data['content'] = 'pages/stipend/stipend_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function change_leaner_status()
	{

		$reason = $this->input->post('text');

		$learner = $this->input->post('learner');

		$tablenm_id = $this->input->post('tablenm_id');

		$explode = explode('.', $tablenm_id);

		$tablenm = $explode[0];

		$id = $explode[1];

		$data = $this->common->updateData($tablenm, ['learner_accepted_training' => $learner, 'reason' => $reason], ['id' => $id]);

		if ($data) {

			echo json_encode(array('status' => 200));
		}
	}



	public function organisation_report_list()
	{

		$this->data['record'] = $this->common->Reportdata('organisation');

		$this->data['page'] = 'organisation_report_list';

		$this->data['content'] = 'pages/report/organisation_report_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function organisation_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->accessrecord('organisation', [], ['id' => $id], 'result');

		$this->data['page'] = 'organisation_view';

		$this->data['content'] = 'pages/report/organisation_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function progammer_director_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->accessrecord('programme_director', [], ['organisation_id' => $id], 'result');

		$this->data['page'] = 'progammer_director_view';

		$this->data['content'] = 'pages/report/progammer_director_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function project_manager_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReportProjectdata($id);

		$this->data['page'] = 'project_manager_view';

		$this->data['content'] = 'pages/report/project_manager_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function training_provider_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReportTrainingdata($id);

		$this->data['page'] = 'training_provider_view';

		$this->data['content'] = 'pages/report/training_provider_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function monderator_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReporttrainerIdWise($id, 'moderator');

		$this->data['page'] = 'monderator_view';

		$this->data['content'] = 'pages/report/monderator_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function assessor_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReporttrainerIdWise($id, 'assessor');

		$this->data['page'] = 'assessor_view';

		$this->data['content'] = 'pages/report/assessor_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function facilitator_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReporttrainerIdWise($id, 'facilitator');

		$this->data['page'] = 'facilitator_view';

		$this->data['content'] = 'pages/report/facilitator_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function learner_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->ReporttrainerIdWise($id, 'learner');

		$this->data['page'] = 'learner_view';

		$this->data['content'] = 'pages/report/learner_view';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	public function create_learner_reason()
	{

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('reason', [], ['id' => $id], 'row');
		}

		if ($_POST) {

			if ($id != 0) {

				$this->common->updateData('reason', $_POST, ['id' => $id]);

				$this->session->set_flashdata('success', 'Reason Updated Succesfully');

				redirect('learner-reason');
			} else {

				$this->common->insertData('reason', $_POST);

				$this->session->set_flashdata('success', 'Reason Insert Successfully');

				redirect('learner-reason');
			}
		}

		$this->data['data'] = $this->common->accessrecord('reason', [], [], 'result');

		$this->data['page'] = 'create_learner_reason';

		$this->data['content'] = 'pages/reason/create_learner_reason';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	// public function create_class()
	// {

	// 	$id = 0;

	// 	if (!empty($_GET['id'])) {

	// 		$id = $_GET['id'];

	// 		$this->data['record'] = $this->common->accessrecord('class_name', [], ['id' => $id], 'row');
	// 	}

	// 	if ($_POST) {

	// 		$data = $_POST;

	// 		if ($id != 0) {

	// 			if ($this->common->updateData('class_name', $data, ['id' => $id])) {

	// 				$this->session->set_flashdata('success', 'Class Updated Succesfully');

	// 				redirect('class-list');
	// 			} else {

	// 				redirect('class-list');
	// 			}
	// 		} else {

	// 			if ($this->common->insertData('class_name', $data)) {

	// 				$this->session->set_flashdata('success', 'Class Insert Successfully');

	// 				redirect('class-list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('create-class');
	// 			}
	// 		}
	// 	}



	// 	$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');

	// 	$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

	// 	$this->data['page'] = 'create_class';

	// 	$this->data['content'] = 'pages/class/create_class';

	// 	$this->load->view('MyOrganization/tamplate', $this->data);
	// }



	public function class_list()
	{

		$this->data['record'] = $this->common->accessrecord('class_name', [], [], 'result');

		$this->data['page'] = 'class_list';

		$this->data['content'] = 'pages/class/class_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function attendance_list()
	{

		$this->data['record'] = $this->common->accessrecord('attendance', [], [], 'result');

		$this->data['page'] = 'attendance_list';

		$this->data['content'] = 'pages/attendance/attendance_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
	}



	public function mark_sheet_list()
	{

		$this->data['record'] = $this->common->accessrecord('learner_marks', [], [], 'result');

		$this->data['page'] = 'learner_marks_list';

		$this->data['content'] = 'pages/learner_marks/learner_marks_list';

		$this->load->view('MyOrganization/tamplate', $this->data);
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

	function deletedataOrganisation()
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


	function deletedataprojectmanager()
	{

		if (!empty($_GET['data'])) {

			if ($this->common->accessrecord('trainer', [], ['project_id' => $_GET['data']], 'row')) {

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

	public function trainingcompanyname()
	{

		if ((isset($_GET['id'])) && (isset($_GET['company_name']))) {

			if ($_GET['id'] == '0') {

				if ($this->common->accessrecord('trainer', [], ['company_name' => $_GET['company_name']], 'row')) {

					echo "false";
				} else {

					echo  "true";
				}
			} else {

				if ($trainer = $this->common->accessrecord('trainer', [], ['company_name' => $_GET['company_name'], 'id' => $_GET['id']], 'row')) {

					echo "true";
				} else {

					if ($this->common->accessrecord('trainer', [], ['company_name' => $_GET['company_name']], 'row')) {

						echo "false";
					} else {

						echo  "true";
					}
				}
			}
		}
	}


	public function totalQuarterlyReport()
	{
		$programme_id = $_SESSION['organisation']['id'];

		$this->data['training'] = $this->common->progammerTraining($programme_id);
		$this->data['reports'] = [];
		if (!empty($this->data['training'])) {
			foreach ($this->data['training'] as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$this->data['reports'][] = $value1;
					foreach ($this->data['reports'] as $key2 => $value2) {
						if ($report = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $value2->id], 'result_array')) {
							$this->data['reports'][$key2]->total_report = sizeof($report);
						} else {
							$this->data['reports'][$key2]->total_report = 0;
						}
					}
				}
			}
		}
		// print_r()
		// echo '<pre>';print_r($this->data['reports']);die();
		$this->data['page'] = 'progammme_report_list';
		$this->data['content'] = 'pages/report/provider_quarterly_report';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}

	public function sendBulkMessage()
	{
		if (empty($_POST)) {
			$this->data['page'] = 'bulk_message';
			$this->data['content'] = 'pages/bulk/bulk_message';
			$this->load->view('MyOrganization/tamplate', $this->data);
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
				redirect('organisation-sendBulkMassage');
			} else {
				$this->session->set_flashdata('success', "Messages sent Successfully");
				redirect('organisation-sendBulkMassage');
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


	public function get_municipality()
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

	/********************************************************(17 FEB 2021)*************************************************************** */
	/***** User*********/
	public function createUser()
	{
		$this->data['page'] = 'createUser';
		$this->data['content'] = 'pages/user/createUser';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function userList()
	{
		$this->data['page'] = 'userList';
		$this->data['content'] = 'pages/user/userList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/***** Department*********/
	public function createDepartment()
	{
		$this->data['page'] = 'createDepartment';
		$this->data['content'] = 'pages/department/createDepartment';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function departmentList()
	{
		$this->data['page'] = 'departmentList';
		$this->data['content'] = 'pages/department/departmentList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/***** User Group*********/
	public function craeteUserGroup()
	{
		$this->data['page'] = 'craeteUserGroup';
		$this->data['content'] = 'pages/user_group/craeteUserGroup';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function userGroupList()
	{
		$this->data['page'] = 'userGroupList';
		$this->data['content'] = 'pages/user_group/userGroupList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/***** User Role*********/
	public function craeteUserRole()
	{
		$this->data['page'] = 'craeteUserRole';
		$this->data['content'] = 'pages/user_role/craeteUserRole';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function userRoleList()
	{
		$this->data['page'] = 'userRoleList';
		$this->data['content'] = 'pages/user_role/userRoleList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/*****New Programme*********/
	public function createNewProgramme()
	{
		$this->data['page'] = 'createNewProgramme';
		$this->data['content'] = 'pages/programme/createNewProgramme';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function programmeList()
	{
		$this->data['page'] = 'programmeList';
		$this->data['content'] = 'pages/programme/programmeList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/***** Expense Item*********/
	public function createNewExpenseItem()
	{
		$this->data['page'] = 'createNewExpenseItem';
		$this->data['content'] = 'pages/expense_item/createNewExpenseItem';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function expenseitemList()
	{
		$this->data['page'] = 'expenseitemList';
		$this->data['content'] = 'pages/expense_item/expenseitemList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	/*****sub Contractor Work Type*********/
	public function createSubContractorWorkType()
	{
		$this->data['page'] = 'createSubContractorWorkType';
		$this->data['content'] = 'pages/sub_contractor/createSubContractorWorkType';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
	public function subContractorWorkTypeList()
	{
		$this->data['page'] = 'subContractorWorkTypeList';
		$this->data['content'] = 'pages/sub_contractor/subContractorWorkTypeList';
		$this->load->view('MyOrganization/tamplate', $this->data);
	}
}
