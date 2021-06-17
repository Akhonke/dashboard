<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Assessor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata['assessor'])) {
			redirect("assessor");
		} else {
			$assessor = $this->common->accessrecord('assessor', [], ['id' => $this->session->userdata['assessor']['id']], 'row');
			$this->data['organization_id']  = $assessor->organization;
			$this->data['project_manager_id']  = $assessor->project_manager;
			$this->data['trainer_id']  = $assessor->trainer_id;
		}
	}

	public function dashboard()
	{
		$this->data['assessment_report_'] = $this->common->accessrecord('assessment_report', [], ['assesor_id' => $this->session->userdata['assessor']['id']], 'result');
		$this->data['assessment_report']  = count($this->data['assessment_report_']);
		$this->data['page'] = 'dashboard';
		$this->data['content'] = 'pages/dashboard/dashboard';
		$this->load->view('assessor/tamplate', $this->data);
	}

	public function assessor_changepassword()
	{
		$this->data['page'] = 'changepassword';
		$this->data['content'] = 'changepassword';
		if ($_POST) {
			if (isset($_SESSION['assessor']['id'])) {
				$id = $_SESSION['assessor']['id'];
			} else {
				$id = '';
			}
			$oldpassword = $this->input->post('oldpassword');
			$password = $this->input->post('password');
			$datau = $this->common->accessrecord('assessor', ['id, password'], array('id' => $id), 'row');
			if (!empty($datau)) {
				if ($datau->password == sha1($oldpassword)) {
					$this->common->updateData('assessor', array('password' => sha1($password)), array('id' => $id));
					$this->session->set_flashdata('success', 'Your Password Successfully Update');
					redirect('assessor-changepassword');
				} else {
					$this->session->set_flashdata('error', 'Your Old Password Not Match');
				}
			} else {
				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}
		$this->load->view('assessor/tamplate', $this->data);
	}

	public function assessor_editprofile()
	{
		if (isset($_SESSION['assessor']['id'])) {
			$assessor_id = $_SESSION['assessor']['id'];
		} else {
			$assessor_id = '';
		}
		if ($_POST) {
			$array = [];
			if ((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))) {
				foreach ($_POST['acreditations_image'] as  $value_one) {
					$exp = explode(',', $value_one);
					$array_two[] = array(
						'id' => $exp[0],
						'acreditations' => $exp[1],
						'acreditations_file' => $exp[2]
					);
					$id = $exp[0];
				}
				if (!empty($_FILES['acreditations_file']['name'])) {
					$arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
					if (!empty($arrayFilter)) {
						$path = './uploads/acreditationsfiles/';
						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
						$increment_id = '';
						foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
							$increment_id = $id + 1 + $key;
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

			if (!empty($_FILES['profile_image']['name'])) {

				$path = './uploads/assessor/profile_image/';

				$images = $this->fileupload('profile_image', $path);

				$profile_image = $images;
			}else{
			$record = $this->common->accessrecord('assessor', [], ['id' => $assessor_id], 'row');
			$profile_image = $record->profile_image;

			}
			$district = $this->input->post('district');
			$District = $this->common->one_District($district);
			$district_name = $District->name;
			$region = $this->input->post('region');
			$regiondata = $this->common->one_region($region);
			$region_name = $regiondata->region;
			$city = $this->input->post('city');
			$citydata = $this->common->one_city($city);
			$city_name = $citydata->city;
			$municipality = $this->input->post('municipality');
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'surname' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'id_number' => $this->input->post('id_number'),
				'landline' => $this->input->post('landline'),
				'mobile' => $this->input->post('mobile'),
				'acreditations_file' => $acreditations_file,
				'trainer_id' => $this->input->post('trainer_id'),
				'created_by' => $this->input->post('created_by'),
				'Suburb' => $this->input->post('Suburb'),
				'Street_name' => $this->input->post('Street_name'),
				'Street_number' => $this->input->post('Street_number'),
				'district' => $district_name,
				// 'region' => $region_name,
				'city' => $city_name,
				'province' => $this->input->post('province'),
				'municipality' => $municipality,
				'profile_image' => $profile_image
			);
			if ($this->common->updateData('assessor', $data, ['id' => $assessor_id])) {
				$this->session->set_flashdata('success', 'Profile Updated Successfully');
				redirect('assessor-editprofile');
			} else {
				$this->session->set_flashdata('error', 'Please Try Again');
				redirect('assessor-editprofile');
			}
		} else {
			$this->data['record'] = $this->common->accessrecord('assessor', [], ['id' => $assessor_id], 'row');

			$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');
			$this->data['District'] = $this->common->get_District();
			$this->data['province'] = $this->common->get_province();
			// $this->data['region'] = $this->common->get_region();
			$this->data['city'] = $this->common->get_city();
			$this->data['municipality'] = $this->common->get_municipality();
			$this->data['page'] = 'editprofile';
			$this->data['content'] = 'pages/myprofile/editprofile';
			$this->load->view('assessor/tamplate', $this->data);
		}
	}

	public function assessor_create_attendance()
	{
		if (isset($_SESSION['assessor']['id'])) {
			$assessor_id = $_SESSION['assessor']['id'];
		} else {
			$assessor_id = '';
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
					'year' => $this->input->post('year'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),
					'classname' => $classname,
					'facilirator' => $this->input->post('facilirator'),
					'week_date' => $this->input->post('week_date'),
					'attachment_one' => $attachment['attachment'],
					'created_by' => $assessor_id,
					'assessor_id' => $assessor_id,
					'user_type' => 2,
				);
				if ($this->common->updateData('attendance', $data, array('id' => $id))) {
					$this->session->set_flashdata('success', 'Attendance Updated Succesfully');
					redirect('assessor-attendance-list');
				} else {
					$this->session->set_flashdata('success', 'Attendance Updated Succesfully');
					redirect('assessor-attendance-list');
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
					redirect('assessor-create-attendance');
				}
				$learnership = $this->input->post('learnership_sub_type');
				$data = array(
					'training_provider' => $this->input->post('training_provider'),
					'year' => $this->input->post('year'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),
					'classname' => $classname,
					'facilirator' => $this->input->post('facilirator'),
					'week_date' => $this->input->post('week_date'),
					'attachment_one' => $attachment['attachment'],
					'assessor_id' => $assessor_id,
					'created_by' => $assessor_id,
					'user_type' => 2,
				);
				/*if($this->common->accessrecord('facilitator',[],['fullname'=>$this->input->post('facilirator')],'row')){*/
				if ($this->common->accessrecord('attendance', [], ['year' => $this->input->post('year'), 'classname' => $this->input->post('learner_classname'), 'learnership_sub_type' => $this->input->post('learnership_sub_type'), 'facilirator' => $this->input->post('facilirator'), 'week_date' => $this->input->post('week_date')], 'row')) {
					$this->session->set_flashdata('error', 'Attendance Already Generate');
					redirect('assessor-create-attendance');
				} else {
					if ($this->common->insertData('attendance', $data)) {
						$this->session->set_flashdata('success', 'Attendance Insert Successful');
						redirect('assessor-attendance-list');
					} else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect('assessor-create-attendance');
					}
				}
				/* }else{
			        	$this->session->set_flashdata('error', 'error');
						redirect('assessor-create-attendance');
			        }*/
			}

			if ($id != 0) {

				$this->data['record'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');
			}
		}

		$this->data['attendance'] = $this->common->accessrecord('attendance', [], [], 'result');

		$assessor = $this->common->accessrecord('assessor', [], ['id' => $assessor_id], 'row');

		$trainer_id = $assessor->trainer_id;

		if (isset($trainer_id)) {

			$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$trainerid = $trainer->id;
		} else {

			$trainerid = '';
		}

		$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['trainer_id' => $trainerid], 'result');

		$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

		if (!empty($_GET['id'])) {

			$attendance = $this->common->accessrecord('attendance', [], ['id' => $_GET['id']], 'row');

			$this->data['learner_ship_SubType'] = $this->common->accessrecord('learnership_sub_type', [], ['id' => $attendance->learnership_sub_type], 'row');

			$this->data['class_name'] = $this->common->accessrecord('class_name', [], ['id' => $attendance->classname], 'row');
		} else {

			$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');
		}

		$this->data['page'] = 'create_attendance';

		$this->data['content'] = 'pages/attendance/create_attendance';

		$this->load->view('assessor/tamplate', $this->data);
	}

	public function assessor_attendance_list()
	{

		if (isset($_SESSION['assessor']['id'])) {

			$assessorid = $_SESSION['assessor']['id'];

			$assessor = $this->common->accessrecord('assessor', [], ['id' => $assessorid], 'row');

			$trainer_id = $assessor->trainer_id;
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

		$this->load->view('assessor/tamplate', $this->data);
	}

	public function attendance_view()
	{

		$id = $this->input->get('id');

		if (isset($_SESSION['assessor']['id'])) {

			$assessor_id = $_SESSION['assessor']['id'];
		} else {

			$assessor_id = '';
		}

		$condition = "`assessor_id`='$assessor_id' && `learner_id`='$id'";

		$this->data['record'] = $this->common->accessrecord('attendance', [], $condition, 'result');

		$this->data['page'] = 'attendance_view';

		$this->data['content'] = 'pages/attendance/attendance_view';

		$this->load->view('assessor/tamplate', $this->data);
	}

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

			echo  $this->upload->display_errors();
			die;
		} else {

			$data = $this->upload->data();

			$name = $data['file_name'];

			return $name;
		}
	}

	/*=================delete record============= */
	function deletedata()
	{
		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
	}
	/*=================end=========end=========== */

	public function logout()
	{
		$this->session->unset_userdata("assessor");
		$this->session->sess_destroy();
		redirect('assessor');
	}

	public function assessor_changestatus()
	{

		$status = $this->input->post('status');

		$tablenm_id = $this->input->post('tablenm_id');

		$explode = explode('.', $tablenm_id);

		$tablenm = $explode[0];

		$id = $explode[1];

		$data = $this->common->updateData($tablenm, ['status' => $status], ['id' => $id]);

		if ($data) {

			echo "true";
		}
	}

	public function assessor_getdestrict()
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

	// public function assessor_getregion()
	// {

	// 	$District = $this->common->one_District($this->input->post('value'));

	// 	$district_id = $District->name;

	// 	$regiondata = $this->common->get_region_District($district_id);

	// 	if (!empty($regiondata)) {

	// 		$region = $regiondata;
	// 	} else {

	// 		$region = array('error' => 'Region list not available in this destrict');
	// 	}

	// 	echo json_encode($region);
	// }

	public function assessor_getcity()
	{

		$District = $this->common->one_District($this->input->post('value'));

		$district_id = $District->name;

		$regiondata = $this->common->get_district_city($district_id);

		if (!empty($regiondata)) {

			$region_data = $regiondata;
		} else {

			$region_data = array('error' => 'City list not available in this region');
		}

		echo json_encode($region_data);
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

	/**
	 * @deprecated. Use Api/get_sublearnership()
	 */
// 	public function get_sublearnership()
// 	{

// 		if (!empty($this->input->post('value'))) {
// 			$id = $this->input->post('value');
// 		} else {
// 			$id = 0;
// 		}

// 		$record = $this->common->accessrecord('learnership_sub_type', [], ['learnship_id' => $id], 'result');

// 		if (!empty($record)) {

// 			$data = $record;
// 		} else {

// 			$data = array('error' => 'Learnership not available of this id');
// 		}

// 		echo json_encode($data);
// 	}

	public function assessor_acreditations_file_delete()
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

	public function assessor_autocomplete()
	{

		$term = $this->input->post('term');

		if (!empty($term)) {

			$data = $this->common->searchLearner('learner', $term, 'search');

			if (!empty($data)) {

				echo json_encode($data);
			} else {

				$error = array('error' => 'Learner Name not found');

				echo json_encode($error);
			}
		}
	}

	public function getLeaner()
	{

		$lerner_nm = $this->input->post('lerner_nm');

		if (!empty($lerner_nm)) {

			$data = $this->common->searchLearner('learner', $lerner_nm, 'get');

			echo json_encode($data);
		}
	}

	public function get_classname()
	{

		if (isset($_SESSION['assessor']['id'])) {

			$assessorid = $_SESSION['assessor']['id'];

			$assessor = $this->common->accessrecord('assessor', [], ['id' => $assessorid], 'row');

			$trainer_id = $assessor->trainer_id;
		} else {

			$trainer_id = '';
		}



		if (isset($trainer_id)) {

			$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$trainerid = $trainer->id;
		} else {

			$trainerid = '';
		}

		$id = $this->input->post('value');

		$record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'trainer_id' => $trainerid], 'result');

		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'classname list not available in this learnershipsubtype');
		}

		echo json_encode($data);
	}

	public function getunitstandard()
	{

		$id = $this->input->post('value');

		$record = $this->common->accessrecord('learnership_sub_type', ['unit_standard'], ['id' => $id], 'result');

		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'unit standards not available');
		}

		echo json_encode($data);
	}

	public function createassesment()
	{
		$assesor_Id = $_SESSION['assessor']['id'];
		if (empty($_POST)) {

			$this->data['assessor_Record'] = $this->common->accessrecord('assessor', [], ['id' => $assesor_Id], 'row');

			$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result_array');

			$this->data['learnership'] = $this->common->accessrecord('learnership', [], ['trainer_id' => $this->data['trainer_id']], 'result');


			$this->data['page'] = 'createassesment';

			$this->data['content'] = 'pages/assesment/createassesment';

			$this->load->view('assessor/tamplate', $this->data);
		} else {


		$learnerid = $_POST['lid'];
		$lperform = $_POST['lperform'];
		$locmnt = $_POST['locmnt'];
		$bulk = array();
		foreach($learnerid as $key => $value){
			$bulk[$key]['lid'] = $value;
			$bulk[$key]['lperform'] = $lperform[$key];
			$bulk[$key]['locmnt'] = $locmnt[$key];
		};
		// echo "<pre>"; 	print_r($bulk); die;
			$data = array(
				'assesor_fullname' => $this->input->post('fullname'),
				'assesor_surname' => $this->input->post('surname'),
				'assesment_number' => $this->input->post('assesment_number'),
				'assesment_date' => $this->input->post('assesment_date'),
				'learnship_id' => $this->input->post('learnship_id'),
				'learnership_sub_type' => $this->input->post('learnershipSubType'),
				'classname' => $this->input->post('classname'),
				'unit_statndards' => $this->input->post('unit_statndards'),
				'organization' => $this->data['organization_id'],
				'project_manager' => $this->data['project_manager_id']  ,
				'trainer_id' => $this->data['trainer_id'],
				// 'learner_id' => $this->input->post('learner_id'),
				// 'learner_name' => $this->input->post('learner_name'),
				// 'learner_surname' => $this->input->post('learner_surname'),
				// 'overall_comment' => $this->input->post('overall_comment'),
				'assesor_id' => $assesor_Id,
			);
			$res = $this->common->insertData('assessment_report', $data);
			$assessment_report_id = $res;
			foreach($bulk as $key =>$value){
				$datal = array(
					'assessment_report_id' => $assessment_report_id,
					'learner_id' => $value['lid'],
					'review' => $value['lperform'],
					'overallcmnt' => $value['locmnt']
				);
				$respn = $this->common->insertData('assessment_report_learner', $datal);
			}


			if ($respn) {

				$this->session->set_flashdata('success', 'Assessment Report Added Successfully');
				redirect('assessor-assesment-list');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');
				redirect('assessor-create-assesment');
			}
		}
	}

	public function assesmentlist()
	{
		$assesor_Id = $_SESSION['assessor']['id'];

		$this->data['assessment_report'] = $this->common->accessrecord('assessment_report', [], ['assesor_id' => $assesor_Id], 'result_array');

		$this->data['page'] = 'assesmentlist';

		$this->data['content'] = 'pages/assesment/assesmentlist';

		$this->load->view('assessor/tamplate', $this->data);
	}

	public function get_learnername()
	{

		if (!empty($this->input->post('value'))) {
			$id = $this->input->post('value');
		} else {
			$id = 0;
		}

		$record = $this->common->accessrecord('learner', [], ['classname' => $id], 'result');

		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'Learner not available in this class');
		}

		echo json_encode($data);
	}

	public function user_listing()
	{
		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];
			$this->data['assessment_record'] = $this->common->accessrecord('assessment_report', [], ['id' => $id], 'row');
			$this->data['learner_record'] = $this->common->accessrecord('assessment_report_learner', [], ['assessment_report_id' => $id], 'result_array');
		}

		$this->data['page'] = 'assesmentlist';

		$this->data['content'] = 'pages/assesment/assesment_learner_list';

		$this->load->view('assessor/tamplate', $this->data);
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

	// Assessments

	//****************************Assessments******************//


	public function manage_assessment_list()
	{

	    if (isset($_SESSION['assessor']['id'])) {
	        $assessor_id = $_SESSION['assessor']['id'];
	    } else {

	        $assessor_id = '';
	    }

	    if ($assessor_id) {
	        $assessor = $this->common->accessrecord('assessor', [], ['id' => $assessor_id], 'row');
	        $organization_id = $assessor->organization;
	    } else {
	        $organization_id = 0;
	    }

	    $this->data['record'] = $this->common->assessmentListByOrganisation($organization_id);

	    foreach ($this->data['record'] as &$record) {

	        $unit_standard_list = $this->common->getAssessmentUnits($record->id);
	        $unit_standards = [];
	        foreach ($unit_standard_list as $unit_standard_item) {
	            $unit_standards[] = $unit_standard_item->title;
	        }
	        $record->unit_standard = join(",", $unit_standards);
	    }

	    $this->data['page'] = 'list_assessments';

	    $this->data['content'] = 'pages/assesment/manage_assessment_list';

	    $this->load->view('assessor/tamplate', $this->data);

	}

	/**
	 * Display all submitted learner assessments
	 *
	 */
	public function list_complete_assessments(){


	    if (isset($_SESSION['assessor']['id'])) {
	        $assessorid = $_SESSION['assessor']['id'];
	    } else {

	        $assessorid = '';
	    }

	    // TODO : Allow for aid filter

	    $this->data['record'] = $this->common->completedAssessmentListByAssessor($assessorid);

	    $this->data['page'] = 'list_complete_assessments';

	    $this->data['content'] = 'pages/assesment/complete_assessment_list';

	    $this->load->view('assessor/tamplate', $this->data);
	}


	/**
	 * View details of the given learner_assessment
	 *
	 */

	public function view_assessment(){


	    if (isset($_SESSION['assessor']['id'])) {
	        $assessorid = $_SESSION['assessor']['id'];
	    } else {

	        $assessorid = '';
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

	    $this->data['content'] = 'pages/assesment/assessment_details';

	    $this->load->view('assessor/tamplate', $this->data);



	}

	// 	// TODO: This file is define in multiple files (eg Project manager controller

	// 	private function singlefileupload($image, $path, $allowed_types)
	// 	{

	    // 	    $config['upload_path']          = $path;

	    // 	    $config['allowed_types']        = $allowed_types;

	    // 	    $config['encrypt_name']         = TRUE;

	    // 	    $config['remove_spaces']        = TRUE;

	    // 	    $config['detect_mime']          = TRUE;

	    // 	    $config['overwrite']            = TRUE;

	    // 	    $config['file_ext_tolower']     = TRUE;

	    // 	    $this->load->library('upload', $config);

	    // 	    $this->upload->initialize($config);

	    // 	    if (!$this->upload->do_upload($image)) {

	    // 	        echo  $this->upload->display_errors();
	    // 	        die;
	    // 	    } else {

	    // 	        $data = $this->upload->data();

	    // 	        $name = $data['file_name'];

	    // 	        return $name;
	    // 	    }
	    // 	}

	    public function mark_assessment(){


	        if (isset($_SESSION['assessor']['id'])) {
	            $assessorid = $_SESSION['assessor']['id'];
	        } else {

	            $assessorid = '';
	        }

	        $learner_assessment_id = 0;
	        if (!empty($_POST['learner_assessment_id'])) {
	            $learner_assessment_id = $_POST['learner_assessment_id'];
	        }

	        if ($learner_assessment_id == 0) {
	            $this->session->set_flashdata('error', 'Invalid Learner Assessment Submission. Please Try Again');
	            redirect('assessor-completed-assessment-list');
	        }

// 	        $assessment_submission = $this->common->accessrecord('learner_assessment_submission', [], ['id' => $learner_assessment_submission_id], 'row');
	        $learner_assessment = $this->common->accessrecord('learner_assessment', [], ['id' => $learner_assessment_id], 'row');


	        // Upload files
// 	        if (!empty($_FILES['upload_marked_learner_guide']['name'])) {
// 	            $upload_marked_learner_guide['upload_marked_learner_guide']['store'] = $this->singlefileupload('upload_marked_learner_guide', './uploads/assessment/upload_marked_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 	            $upload_marked_learner_guide['upload_marked_learner_guide']['name'] = $_FILES['upload_marked_learner_guide']['name'];
// 	        } else {
// 	            if (empty($assessment_submission->upload_marked_learner_guide)) {
// 	                $this->session->set_flashdata('error', 'No learner guide submitted. Please Try Again');
// 	                redirect('/assessor/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	            }
// 	        }

// 	        if (!empty($_FILES['upload_marked_workbook']['name'])) {
// 	            $upload_marked_workbook['upload_marked_workbook']['store'] = $this->singlefileupload('upload_marked_workbook', './uploads/assessment/upload_marked_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 	            $upload_marked_workbook['upload_marked_workbook']['name'] = $_FILES['upload_marked_workbook']['name'];
// 	        } else {
// 	            if (empty($assessment_submission->upload_marked_workbook)) {
// 	                $this->session->set_flashdata('error', 'No learner workbook submitted. Please Try Again');
// 	                redirect('/assessor/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	            }
// 	        }

// 	        if (!empty($_FILES['upload_marked_poe']['name'])) {
// 	            $upload_marked_poe['upload_marked_poe']['store'] = $this->singlefileupload('upload_marked_poe', './uploads/assessment/upload_marked_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 	            $upload_marked_poe['upload_marked_poe']['name'] = $_FILES['upload_marked_poe']['name'];
// 	        } else {
// 	            if (empty($assessment_submission->upload_marked_poe)) {
// 	                $this->session->set_flashdata('error', 'No learner POE submitted. Please Try Again');
// 	                redirect('/assessor/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	            }
// 	        }

	        if (!empty($_FILES['upload_assessed_workbook']['name'])) {
	            $upload_assessed_workbook['upload_assessed_workbook']['store'] = $this->singlefileupload('upload_assessed_workbook', './uploads/assessment/upload_assessed_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            $upload_assessed_workbook['upload_assessed_workbook']['name'] = $_FILES['upload_assessed_workbook']['name'];
	        } else {
	            if (empty($learner_assessment->upload_assessed_workbook)) {
	                $this->session->set_flashdata('error', 'No Assessed Workbook. Please Try Again');
	                redirect('/assessor/view_assessment?id=' . $learner_assessment_id);
	            }
	        }

	        if (!empty($_FILES['upload_assessed_learner_feedback']['name'])) {
	            $upload_assessed_learner_feedback['upload_assessed_learner_feedback']['store'] = $this->singlefileupload('upload_assessed_learner_feedback', './uploads/assessment/upload_assessed_learner_feedback/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            $upload_assessed_learner_feedback['upload_assessed_learner_feedback']['name'] = $_FILES['upload_assessed_learner_feedback']['name'];
	        } else {
	            if (empty($learner_assessment->upload_assessed_learner_feedback)) {
	                $this->session->set_flashdata('error', 'No Learner Feedback. Please Try Again');
	                redirect('/assessor/view_assessment?id=' . $learner_assessment_id);
	            }
	        }

	        if (!empty($_FILES['upload_assessed_overall_report']['name'])) {
	            $upload_assessed_overall_report['upload_assessed_overall_report']['store'] = $this->singlefileupload('upload_assessed_overall_report', './uploads/assessment/upload_assessed_overall_report/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            $upload_assessed_overall_report['upload_assessed_overall_report']['name'] = $_FILES['upload_assessed_overall_report']['name'];
	        } else {
	            if (empty($learner_assessment->upload_assessed_overall_report)) {
	                $this->session->set_flashdata('error', 'No Overall Report. Please Try Again');
	                redirect('/assessor/view_assessment?id=' . $learner_assessment_id);
	            }
	        }


	        $learner_assessment_data = [
	            'status' => 'assessed',
	            'updated_date' => date('Y-m-d H:i:s'),
	        ];

	        if (!empty($upload_assessed_workbook['upload_assessed_workbook']['store'])) {
	            $learner_assessment_data['upload_assessed_workbook'] = $upload_assessed_workbook['upload_assessed_workbook']['store'];
	            $learner_assessment_data['upload_assessed_workbook_name'] = $upload_assessed_workbook['upload_assessed_workbook']['name'];
	        }

	        if (!empty($upload_assessed_learner_feedback['upload_assessed_learner_feedback']['store'])) {
	            $learner_assessment_data['upload_assessed_learner_feedback'] = $upload_assessed_learner_feedback['upload_assessed_learner_feedback']['store'];
	            $learner_assessment_data['upload_assessed_learner_feedback_name'] = $upload_assessed_learner_feedback['upload_assessed_learner_feedback']['name'];
	        }

	        if (!empty($upload_assessed_overall_report['upload_assessed_overall_report']['store'])) {
	            $learner_assessment_data['upload_assessed_overall_report'] = $upload_assessed_overall_report['upload_assessed_overall_report']['store'];
	            $learner_assessment_data['upload_assessed_overall_report_name'] = $upload_assessed_overall_report['upload_assessed_overall_report']['name'];
	        }

	        if (!$this->common->updateData('learner_assessment', $learner_assessment_data , ['id' => $learner_assessment_id])) {
	            $this->session->set_flashdata('error', 'Cannot save learner assessment. Please Try Again');
	            redirect('/assessor/view_assessment?id=' . $learner_assessment_id);
	        } else {
	            $this->session->set_flashdata('success', 'Assessement Saved Successfully');
	            redirect('assessor-completed-assessment-list');
	        }

// 	        $assessment_submission_data = [
// 	            'assessment_status' => 'marked',
// 	            'assessed_by' => $assessorid,
// 	            'assessment_notes' => $this->input->post('assessment_notes'),
// 	            'learner_feedback' => $this->input->post('learner_feedback'),
// 	            'overall_assessment' => $this->input->post('overall_assessment'),
// 	            'assessment_date'  => date('Y-m-d H:i:s'),
// 	            'updated_date' => date('Y-m-d H:i:s'),
// 	        ];

// 	        if (!empty($upload_marked_workbook['upload_marked_workbook']['store'])) {
// 	            $assessment_submission_data['upload_marked_workbook'] = $upload_marked_workbook['upload_marked_workbook']['store'];
// 	            $assessment_submission_data['upload_marked_workbook_name'] = $upload_marked_workbook['upload_marked_workbook']['name'];
// 	        }

// 	        if (!empty($upload_marked_learner_guide['upload_marked_learner_guide']['store'])) {
// 	            $assessment_submission_data['upload_marked_learner_guide'] = $upload_marked_learner_guide['upload_marked_learner_guide']['store'];
// 	            $assessment_submission_data['upload_marked_learner_guide_name'] = $upload_marked_learner_guide['upload_marked_learner_guide']['name'];
// 	        }

// 	        if (!empty($upload_marked_poe['upload_marked_poe']['store'])) {
// 	            $assessment_submission_data['upload_marked_poe'] = $upload_marked_poe['upload_marked_poe']['store'];
// 	            $assessment_submission_data['upload_marked_poe_name'] = $upload_marked_poe['upload_marked_poe']['name'];
// 	        }

// 	        if ($this->common->updateData('learner_assessment_submission', $assessment_submission_data , ['id' => $learner_assessment_submission_id])) {
// 	            $this->session->set_flashdata('success', 'Assessement Saved Successfully');
// 	            redirect('assessor-completed-assessment-list');
// 	        } else {
// 	            $this->session->set_flashdata('error', 'Cannot save marked submission. Please Try Again');
// 	            redirect('/assessor/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	        }

	    }

        public function manage_assessment()
        {
            if (isset($_SESSION['assessor']['id'])) {
                $assessor_id = $_SESSION['assessor']['id'];
            } else {

                $assessor_id = '';
            }

            if ($assessor_id) {
                $assessor = $this->common->accessrecord('assessor', [], ['id' => $assessor_id], 'row');
                $organization_id = $assessor->organization;
            } else {
                $organization_id = 0;
            }

            $id = 0;

            if (! empty($_GET['id'])) {

                $id = $_GET['id'];

                $this->data['record'] = $this->common->accessrecord('assessment', [], [
                    'id' => $id
                ], 'row');
                $class_name = $this->common->accessrecord('class_name', [], [
                    'id' => ($this->data['record'])->class_id
                ], 'row');
                $this->data['class_name'] = $class_name;
                $this->data['record']->classname = $class_name->class_name;
                $this->data['class_module'] = $this->common->accessrecord('class_module', [], [
                    'id' => ($this->data['record'])->module_id
                ], 'row');
                $this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [
                    'learnship_id' => $class_name->learnership_id
                ], 'result');
            }

            $this->data['classes'] = $this->common->accessrecord('class_name', [], [], 'result_array');
            $this->data['units'] = $this->common->accessrecord('units', [], [], 'result');

            $this->data['page'] = 'create_assessment';

            $this->data['content'] = 'pages/assesment/manage_assessment';

            $this->data['learnership'] = $this->common->accessrecord('learnership', [], [
                'organization' => $organization_id
            ], 'result');

            $this->load->view('assessor/tamplate', $this->data);
        }

        public function assessor_request_moderation()
        {

            if (isset($_SESSION['assessor']['id'])) {
                $assessorid = $_SESSION['assessor']['id'];
            } else {

                $assessorid = '';
            }

            $assessment_id = 0;
            if (!empty($_GET['id'])) {
                $assessment_id = $_GET['id'];
            }
            if ($assessment_id == 0) {
                $this->session->set_flashdata('error', 'Invalid Assessment. The request document was not found.');
                redirect('/assessor/manage_assessment?id=' . $assessment_id);
            }

            $assessment = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
            if (!$assessment) {
                $this->session->set_flashdata('error', 'Invalid Assessment. The request document was not found.');
                redirect('/assessor/manage_assessment?id=' . $assessment_id);
            }

            $assessment_data = [
                'status' => 'awaiting moderation',
                'updated_date' => date('Y-m-d H:i:s')
            ];

            $this->common->updateData('assessment', $assessment_data, array('id' => $assessment_id));

            $this->Email_model->notify_moderator_of_moderation_request(
                $assessment_id,
                'A new assessment has been submitted for moderation.',
                'A new assessment moderation has been submission
                         http://digilims.com/new_assessment'
            );

            $this->session->set_flashdata('success', 'The assessment has been submitted for moderation.');
            redirect('/assessor/manage_assessment?id=' . $assessment_id);


        }

}
