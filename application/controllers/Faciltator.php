<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Faciltator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($_SESSION['facilitator']['id'])) {
			redirect('Faciltator');
		} else {
			$facilitator = $this->common->accessrecord('facilitator', [], ['id' => $_SESSION['facilitator']['id']], 'row');
			$this->data['facilitator'] = $facilitator->id;

			$this->data['trainer_id'] = $facilitator->trainer_id;
			$this->data['projectmanager'] = $facilitator->project_manager;
			$this->data['organization'] = $facilitator->organization;
		}
	}

	public function dashboard()
	{
		$this->data['discipline_'] = $this->common->accessrecord('learner_performance', [], ['type' => 'Facilitator', 'created_by' => $_SESSION['facilitator']['id']], 'result');
		$this->data['discipline'] = count($this->data['discipline_']);

		if (isset($_SESSION['facilitator']['id'])) {
			$facilitator_id = $_SESSION['facilitator']['id'];
			$facilitator = $this->common->accessrecord('facilitator', [], ['id' => $facilitator_id], 'row');
			$trainer_id = $facilitator->trainer_id;
		} else {
			$trainer_id = '';
		}
		if (!empty($facilitator)) {
			$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');
			$company_name = $trainer->company_name;
		} else {
			$company_name = '';
		}
		$this->data['marksheet_'] = $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name, 'facilirator' => $facilitator->fullname], 'result');
		$this->data['marksheet'] = count($this->data['marksheet_']);

		$this->data['attendance_'] = $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');
		$this->data['attendance'] = count($this->data['attendance_']);

		$this->data['page'] = 'dashboard';

		$this->data['content'] = 'pages/dashboard/dashboard';

		$this->load->view('faciltator/tamplate', $this->data);
	}





	/*=================delete record============= */

	function deletedata()
	{

		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
	}

	/*=================end=========end=========== */

	public function logout()
	{

		$this->session->unset_userdata("faciltator");

		$this->session->sess_destroy();

		redirect('Faciltator');
	}

	public function faciltator_changepassword()
	{

		$this->data['page'] = 'changepassword';

		$this->data['content'] = 'changepassword';

		if ($_POST) {

			if (isset($_SESSION['facilitator']['id'])) {

				$id = $_SESSION['facilitator']['id'];
			} else {

				$id = '';
			}

			$oldpassword = $this->input->post('oldpassword');

			$password = $this->input->post('password');

			$datau = $this->common->accessrecord('facilitator', ['id, password'], array('id' => $id), 'row');

			if (!empty($datau)) {

				if ($datau->password == sha1($oldpassword)) {

					$this->common->updateData('facilitator', array('password' => sha1($password)), array('id' => $id));

					$this->session->set_flashdata('success', 'Your Password Successfully Update');

					redirect('Faciltator-changepassword');
				} else {

					$this->session->set_flashdata('error', 'Your Old Password Not Match');
				}
			} else {

				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}

		$this->load->view('faciltator/tamplate', $this->data);
	}



	public function faciltator_editprofile()
	{


		if (isset($_SESSION['facilitator']['id'])) {

			$assessor_id = $_SESSION['facilitator']['id'];
		} else {

			$assessor_id = '';
		}

		if ($_POST) {
			// print_r($_POST); die;
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

						$path = './uploads/facilitator/acreditationsfiles/';

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
			if (!empty($_FILES['profile_image']['name'])) {

				$profile_image = $this->singlefileupload('profile_image', './uploads/facilitator/profile_image/', 'gif|jpg|png|jpeg');
			} else {

				$profile_iage = $this->common->accessrecord('facilitator', [], ['id' => $_SESSION['facilitator']['id']], 'row');

				$profile_image = $profile_iage->profile_image;
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

				'classname' => $this->input->post('classname'),

				'profile_image' => $profile_image,
				'municipality' => $municipality
			);

			if ($this->common->updateData('facilitator', $data, ['id' => $assessor_id])) {

				$this->session->set_flashdata('success', 'Profile Updated Successfully');

				redirect('Faciltator-editprofile');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('Faciltator-editprofile');
			}
		} else {

			$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');



			$this->data['record'] = $this->common->accessrecord('facilitator', [], ['id' => $assessor_id], 'row');
			// print_r($this->data['record']);

			$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();
			// print_r($this->data['province']);
			$this->data['city'] = $this->common->get_city();
			// print_r($this->data['city']);
			$this->data['municipality'] = $this->common->get_municipality();
			// print_r($this->data['municipality']);die;

			$this->data['page'] = 'editprofile';

			$this->data['content'] = 'pages/myprofile/editprofile';

			$this->load->view('faciltator/tamplate', $this->data);
		}
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

	public function facilitator_changestatus()
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

	public function faciltator_getdestrict()
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

	// public function faciltator_getregion()
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

	public function faciltator_getcity()
	{

		$District = $this->common->one_District($this->input->post('value'));

		$district_id = $District->name;

		$regiondata = $this->common->get_district_city($district_id);

		if (!empty($regiondata)) {

			$region_data = $regiondata;
		} else {

			$region_data = array('error' => 'City list not available in this destrict');
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

	public function faciltator_acreditations_file_delete()
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

	public function create_learner_mark()
	{

		if (isset($_SESSION['facilitator']['id'])) {

			$facilitator_id = $_SESSION['facilitator']['id'];
		} else {

			$facilitator_id = '';
		}

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');
			// print_r($this->data['record']);
		}

		if ($_POST) {

			if ($id != 0) {

				if (!empty($_FILES['attachments']['name'])) {

					$attachment['attachment'] = $this->singlefileupload('attachments', './uploads/learner/import_learnermarks/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
				} else {

					$attachments = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');

					$attachment['attachment'] = $attachments->attachment;
				}

				$data = array(

					'training_provider' => $this->input->post('training_provider'),

					'year' => $this->input->post('year'),
					'date' => $this->input->post('date'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),

					'learner_classname' => $this->input->post('learner_classname'),

					'facilirator' => $this->input->post('facilirator'),

					'attachment' => $attachment['attachment'],

					'created_by' => $facilitator_id,

					'user_type' => 2,

				);

				if ($this->common->updateData('learner_marks', $data, array('id' => $id))) {

					$this->session->set_flashdata('success', 'Mark Sheet Updated Succesfully');

					redirect('Faciltator-mark-sheet-list');
				} else {

					$this->session->set_flashdata('success', 'Mark Sheet Updated Succesfully');

					redirect('Faciltator-mark-sheet-list');
				}
			} else {

				if (!empty($_FILES['attachment']['name'])) {

					$attachment['attachment'] = $this->singlefileupload('attachment', './uploads/learner/import_learnermarks/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
				} else {

					$attachment['attachment'] = "";
				}

				$data = array(

					'training_provider' => $this->input->post('training_provider'),

					'year' => $this->input->post('year'),
					'date' => $this->input->post('date'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),

					'learner_classname' => $this->input->post('learner_classname'),

					'facilirator' => $this->input->post('facilirator'),

					'attachment' => $attachment['attachment'],

					'created_by' => $facilitator_id,

					'user_type' => 2,

				);

				if ($datauser = $this->common->accessrecord('learner_marks', [], ['year' => $this->input->post('year'), 'learner_classname' => $this->input->post('learner_classname'), 'learnership_sub_type' => $this->input->post('learnership_sub_type'), 'facilirator' => $this->input->post('facilirator')], 'row')) {

					$this->session->set_flashdata('error', 'Mark Sheet Already Generate');

					redirect('Faciltator-create-mark-sheet');
				} else {

					if ($this->common->insertData('learner_marks', $data)) {

						$this->session->set_flashdata('success', 'Mark Sheet Insert Successful');

						redirect('Faciltator-mark-sheet-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('Faciltator-create-mark-sheet');
					}
				}
			}

			if ($id != 0) {

				$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['id' => $id], 'row');

			}
		}

		if (isset($_SESSION['facilitator']['id'])) {

			$facilitatorid = $_SESSION['facilitator']['id'];

			$facilitatordata = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');

			$trainer_id = $facilitatordata->trainer_id;
		} else {

			$trainer_id = '';
		}

		if (!empty($facilitatordata)) {

			$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');
		}

		$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');

		$this->data['learner'] = $this->common->accessrecord('learner_marks', [], [], 'result');

		if (!empty($_GET['id'])) {

			$learner_marks = $this->common->accessrecord('learner_marks', [], ['id' => $_GET['id']], 'row');

			$this->data['learner_ship_SubType'] = $this->common->accessrecord('learnership_sub_type', [], ['id' => $learner_marks->learnership_sub_type], 'row');

			$this->data['class_name'] = $this->common->accessrecord('class_name', [], ['id' => $learner_marks->learner_classname], 'row');
		} else {


			$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');
		}

		$this->data['page'] = 'create_learner_marks';

		$this->data['content'] = 'pages/learner_marks/create_learner_marks';

		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function learner_mark_list()
	{

		if (isset($_SESSION['facilitator']['id'])) {

			$facilitator_id = $_SESSION['facilitator']['id'];

			$facilitator = $this->common->accessrecord('facilitator', [], ['id' => $facilitator_id], 'row');

			$trainer_id = $facilitator->trainer_id;
		} else {

			$trainer_id = '';
		}

		if (!empty($facilitator)) {

			$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

			$company_name = $trainer->company_name;
		} else {

			$company_name = '';
		}

		$this->data['record'] = $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name, 'facilirator' => $facilitator->fullname], 'result');

		$this->data['page'] = 'learner_marks_list';

		$this->data['content'] = 'pages/learner_marks/learner_marks_list';

		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function get_classname()
	{

		if (isset($_SESSION['facilitator']['id'])) {

			$facilitator_id = $_SESSION['facilitator']['id'];

			$facilitator = $this->common->accessrecord('facilitator', [], ['id' => $facilitator_id], 'row');

			$trainer_id = $facilitator->trainer_id;
		} else {

			$trainer_id = '';
		}

		if (!empty($facilitator)) {

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


	public function get_learnername()
	{

		if (!empty($this->input->post('value'))) {
			$id = $this->input->post('value');
		} else {
			$id = 0;
		}

		$record = $this->common->accessrecord('learner', [], ['id_number' => $id], 'result');

		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'Learner not available of this id');
		}

		echo json_encode($data);
	}


	public function attendance_list()
	{

		if (isset($_SESSION['facilitator']['id'])) {
			$facilitatorid = $_SESSION['facilitator']['id'];
			$facilitatordata = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');
			$trainerDATA = $this->common->accessrecord('trainer', ['id', 'full_name'], ['id' => $facilitatordata->trainer_id], 'row');
			$trainer_id  = $trainerDATA->id;
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

		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function create_attendance()
	{


		if (isset($_SESSION['facilitator']['id'])) {

			$facilitatorid = $_SESSION['facilitator']['id'];
			$facilitatordata = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');
			$trainerDATA = $this->common->accessrecord('trainer', ['id', 'full_name'], ['id' => $facilitatordata->trainer_id], 'row');
			$trainerid  = $trainerDATA->id;
		} else {

			$facilitatorid = '';
		}

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');
			// print_r($this->data['record']);
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

					// print_r($this->input->post('learner_classname'));die;
					$classname = $this->input->post('learner_classname');
				} else {

					$this->session->set_flashdata('classname', 'please choose class name');

					redirect('faciltator-create-attendance');
				}

				$data = array(

					'training_provider' => $this->input->post('training_provider'),

					// 'year' => $this->input->post('year'),
					'learnership_id' => $this->input->post('learnship_id'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),

					'classname' => $classname,

					'facilitator' => $this->input->post('facilirator'),

					'week_date' => $this->input->post('week_date'),
					'week_start_date' => $this->input->post('week_start_date'),
					'attachment_one' => $attachment['attachment'],

					'created_by' => 'facilitator',

					'facilitator' => $facilitatorid,



					'user_type' => 1,

				);

				if ($this->common->updateData('attendance', $data, array('id' => $id))) {

					$this->session->set_flashdata('success', 'Attendance Updated Succesfully');

					redirect('facilitator-attendance-list');
				} else {

					$this->session->set_flashdata('success', 'Attendance Updated Succesfully');

					redirect('facilitator-attendance-list');
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

					redirect('facilitator-create-attendance');
				}

				$learnership = $this->input->post('learnership_sub_type');

				$data = array(

					'training_provider' => $this->input->post('training_provider'),

					// 'year' => $this->input->post('year'),
'learnership_id' => $this->input->post('learnship_id'),
					'learnership_sub_type' => $this->input->post('learnership_sub_type'),

					'classname' => $classname,


					'facilitator' => $this->input->post('facilirator'),

					'week_date' => $this->input->post('week_date'),
					'week_start_date' => $this->input->post('week_start_date'),
					'attachment_one' => $attachment['attachment'],

					'created_by' => 'facilitator',

					'facilitator' => $facilitatorid,


					'user_type' => 1,

				);
// print_r($data);die;
				if ($this->common->accessrecord('attendance', [], ['year' => $this->input->post('year'), 'classname' => $this->input->post('learner_classname'), 'learnership_sub_type' => $this->input->post('learnership_sub_type'), 'facilitator' => $this->input->post('facilirator'), 'week_date' => $this->input->post('week_date')], 'row')) {

					$this->session->set_flashdata('error', 'Attendance Already Generate');

					redirect('facilitator-create-attendance');
				} else {

					if ($this->common->insertData('attendance', $data)) {

						$this->session->set_flashdata('success', 'Attendance Insert Successful');

						redirect('facilitator-attendance-list');
					} else {

						$this->session->set_flashdata('error', 'Please Try Again');

						redirect('facilitator-create-attendance');
					}
				}
			}

			if ($id != 0) {

				$this->data['record'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'row');
			}
		}

		$this->data['attendance'] = $this->common->accessrecord('attendance', [], [], 'result');

		$this->data['facilitator'] = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');

		$this->data['training'] = $this->common->accessrecord('trainer', [], ['id' => $trainerid], 'row');

		if (!empty($_GET['id'])) {

			$attendance = $this->common->accessrecord('attendance', [], ['id' => $_GET['id']], 'row');

			// $this->data['learner_ship_SubType'] = $this->common->accessrecord('learnership_sub_type', [], ['id' => $attendance->learnership_sub_type], 'row');
			$this->data['learnershipSubType'] = $this->common->learnershipSubType($attendance->learnership_sub_type);
			$this->data['class_name'] = $this->common->accessrecord('class_name', [], ['id' => $attendance->classname], 'row');
		} else {

			$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');
		}

		$condition = "`trainer_id` IN ('1','$trainerid')";

		$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

		// print_r($this->data); die;

		$this->data['page'] = 'create_attendance';

		$this->data['content'] = 'pages/attendance/create_attendance';

		$this->load->view('faciltator/tamplate', $this->data);
	}

	public  function create_discipline()
	{
		if (empty($_POST)) {
			$this->data['page'] = 'create_discipline';

			$this->data['content'] = 'pages/discipline/create_discipline';

			$this->load->view('faciltator/tamplate', $this->data);
		} else {
			$data = array(
				'learner_name' => $this->input->post('learner_name'),
				'learner_surname' => $this->input->post('learner_surname'),
				'learner_id' => $this->input->post('learner_id'),
				'date_of_incident' => $this->input->post('date_of_incident'),
				'insident_desc' => $this->input->post('incidence_desc'),
				'current_status_incident' => $this->input->post('issue_status'),
				'outcome_of_incident' => $this->input->post('outcome'),
				'created_by' => $_SESSION['facilitator']['id'],
				'type' => 'Facilitator'

			);
			// $path = './uploads/evidence/';

			// $image = $this->MultiImageUpload($_FILES['evidence'], $path, 'evidence');
			// $comma_separated = implode(",", $image);
			// $data['evidance'] = $comma_separated;
			if (!empty($_FILES['evidence']['name'])) {

				$arrayFilter = array_values(array_filter($_FILES['evidence']['name']));

				if (!empty($arrayFilter)) {

					$path = './uploads/evidence/';

					$image = $this->MultipleImageUpload($_FILES['evidence'], $path, 'evidence');

					foreach ($_FILES['evidence']['name'] as $key => $value) {
						$tab[$key] = $image[$key];
					}
				}
			}

			$evi_files = $tab;
			if (empty($evi_files)) {

				$evidence_file = '';
			} else {

				$evidence_file = implode(",", $tab);
			}
			$data['evidance'] = $evidence_file;
			$warning_letter = $this->singlefileupload('warning_letter', './uploads/warningletter/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
			$data['warning_letter'] = $warning_letter;

			if ($this->common->insertData('learner_performance', $data)) {

				$this->session->set_flashdata('success', 'Learner performance Insert Successful');

				redirect('facilitator-discipline-list');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('facilitator-create-discipline');
			}
		}
	}


	public  function discipline_list()
	{
		$this->data['discipline'] = $this->common->accessrecord('learner_performance', [], ['type' => 'Facilitator', 'created_by' => $_SESSION['facilitator']['id']], 'result_array');

		$this->data['page'] = 'discipline_list';

		$this->data['content'] = 'pages/discipline/discipline_list';

		$this->load->view('faciltator/tamplate', $this->data);
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

	public function sendMassage()
	{
		if (empty($_POST)) {
			$this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'facilitator'], 'result');
			// $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
			$this->data['page'] = 'send_massage';
			$this->data['content'] = 'pages/massage/send_massage';
			$this->load->view('faciltator/tamplate', $this->data);
		} else {

			$receiverarr = $_POST['receiver'];
			$receiver = implode(",", $receiverarr);

			if (!empty($_FILES['attachment']['name'])) {

				$attachment = $this->singlefileupload('attachment', './uploads/messageattachment/', 'gif|jpg|png|pdf|doc|docx');
			} else {
				$attachment = "";
			}
			$data = array(
				'sender_id' => $_SESSION['facilitator']['id'],
				'sender_type' => 'facilitator',
				'receiver_id' => $receiver,
				'receiver_type' => $_POST['receiver_type'],
				'subject' => $_POST['subject'],
				'message' => $_POST['message'],
				'attachment' => $attachment
			);
			$datau = $this->common->insertData('message', $data);
			$this->session->set_flashdata('success', 'Message Sent Successfully');
			redirect('Faciltator-sendMassage');
		}
	}
	public function get_receiver()
	{
		$type = $this->input->post('value');
		$data = array();
		if ($type == 'projectmanager') {
			$rece = $this->common->accessrecord('project_manager', ['*'], ['id' => $this->data['projectmanager']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'trainer') {
			$rece = $this->common->accessrecord('trainer', ['*'], ['id' => $this->data['trainer_id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->full_name . " " . $recev->surname;
			}
		} elseif ($type == 'organization') {
			$rece = $this->common->accessrecord('organisation', ['*'], ['id' => $this->data['organization']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		}
		echo json_encode($data);
	}

	public function inbox()
	{
		$this->data[] = array();
		$rcvd = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'facilitator',], 'result');
		foreach ($rcvd as $rcv => $received) {
			$receivers =  explode(',', $received->receiver_id);
			if (in_array($this->data['facilitator'], $receivers)) {
				$this->data['received'][$rcv] = $received;
			}
		}

		$this->data['page'] = 'received_massage';
		$this->data['content'] = 'pages/massage/received_messages';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function sentbox()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'facilitator', 'sender_id' => $this->data['facilitator']], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function sentboxview($id)
	{
		$this->data['viewsent'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'sentboxview';
		$this->data['content'] = 'pages/massage/sentboxview';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function inboxview($id)
	{
		$this->data['viewreceived'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'inboxview';
		$this->data['content'] = 'pages/massage/inboxview';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function trash()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization', 'sender_id' => $_SESSION['organisation']['id']], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	public function important()
	{
		$this->data['important'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization'], 'result');
		$this->data['page'] = 'important_massage';
		$this->data['content'] = 'pages/massage/important';
		$this->load->view('faciltator/tamplate', $this->data);
	}

	// Assessments

	//****************************Assessments******************//
	public function list_complete_assessments(){


	    if (isset($_SESSION['facilitator']['id'])) {
	        $facilitator_id = $_SESSION['facilitator']['id'];
	    } else {
	        $facilitator_id = '';
	    }


	    $assessment_id = 0;
	    if (!empty($_GET['aid'])) {
	        $assessment_id = $_GET['aid'];
	        $this->data['record'] = $this->common->completedAssessmentListByAssessment($assessment_id);
	        $this->data['assessment'] = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');

	    } else {
	        $this->data['record'] = $this->common->completedAssessmentListByFacilitator($facilitator_id);
	    }

	    $this->data['page'] = 'list_assessments';

	    $this->data['content'] = '/pages/assessment/complete_assessment_list';

	    $this->load->view('faciltator/tamplate', $this->data);
	}

	public function view_assessment(){


	    if (isset($_SESSION['facilitator']['id'])) {
	        $facilitatorid = $_SESSION['facilitator']['id'];
	    } else {

	        $facilitatorid = '';
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

	    $this->load->view('faciltator/tamplate', $this->data);



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

	public function mark_assessment()
	{


	    if (isset($_SESSION['facilitator']['id'])) {
	        $facilitatorid = $_SESSION['facilitator']['id'];
	    } else {

	        $facilitatorid = '';
	    }

	    $learner_assessment_submission_id = 0;
	    if (!empty($_POST['learner_assessment_submission_id'])) {
	        $learner_assessment_submission_id = $_POST['learner_assessment_submission_id'];
	    }

	    if ($learner_assessment_submission_id == 0) {
	        $this->session->set_flashdata('error', 'Invalid Learner Assessment Submission. Please Try Again');
	        redirect('list_complete_assessments');
	    }

	    $assessment_submission = $this->common->accessrecord('learner_assessment_submission', [], ['id' => $learner_assessment_submission_id], 'row');
	    $learner_assessment = $this->common->accessrecord('learner_assessment', [], ['id' => $assessment_submission->learner_assessment_id], 'row');


	    // Upload files
// 	    if (!empty($_FILES['upload_marked_learner_guide']['name'])) {
// 	        $upload_marked_learner_guide['upload_marked_learner_guide']['store'] = $this->singlefileupload('upload_marked_learner_guide', './uploads/assessment/upload_marked_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 	        $upload_marked_learner_guide['upload_marked_learner_guide']['name'] = $_FILES['upload_marked_learner_guide']['name'];
// 	    } else {
// 	        $this->session->set_flashdata('error', 'No learner guide submitted. Please Try Again');
// 	        redirect('/faciltator/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	    }

	    if (!empty($_FILES['upload_marked_workbook']['name'])) {
	        $upload_marked_workbook['upload_marked_workbook']['store'] = $this->singlefileupload('upload_marked_workbook', './uploads/assessment/upload_marked_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	        $upload_marked_workbook['upload_marked_workbook']['name'] = $_FILES['upload_marked_workbook']['name'];
	    } else {
	        $this->session->set_flashdata('error', 'No learner workbook submitted. Please Try Again');
	        redirect('/faciltator/view_assessment?id=' . $assessment_submission->learner_assessment_id);
	    }

// 	    if (!empty($_FILES['upload_marked_poe']['name'])) {
// 	        $upload_marked_poe['upload_marked_poe']['store'] = $this->singlefileupload('upload_marked_poe', './uploads/assessment/upload_marked_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
// 	        $upload_marked_poe['upload_marked_poe']['name'] = $_FILES['upload_marked_poe']['name'];
// 	    } else {
// 	        $this->session->set_flashdata('error', 'No learner POE submitted. Please Try Again');
// 	        redirect('/faciltator/view_assessment?id=' . $assessment_submission->learner_assessment_id);
// 	    }

	    $learner_assessment_data = [
	        'status' => 'marked',
	        'updated_date' => date('Y-m-d H:i:s'),
	        'competency_status' => $this->input->post('competency_status'),
	    ];

	    if (!$this->common->updateData('learner_assessment', $learner_assessment_data , ['id' => $assessment_submission->learner_assessment_id])) {
	        $this->session->set_flashdata('error', 'Cannot save learner assessment. Please Try Again');
	        redirect('/faciltator/view_assessment?id=' . $assessment_submission->learner_assessment_id);
	    }

	    $assessment_submission_data = [
	        'marked_status' => 'marked',
	        'marked_by' => $facilitatorid,
	        'assessment_date'  => date('Y-m-d H:i:s'),

	        'assessment_notes' => $this->input->post('assessment_notes'),
	        'learner_feedback' => $this->input->post('learner_feedback'),
	        'overall_assessment' => $this->input->post('overall_assessment'),

	        'assessment_mark' => $this->input->post('assessment_mark'),
	        'competency_status' => $this->input->post('competency_status'),

	        'updated_date' => date('Y-m-d H:i:s'),
	    ];

	    if (!empty($upload_marked_workbook['upload_marked_workbook']['store'])) {
	        $assessment_submission_data['upload_marked_workbook'] = $upload_marked_workbook['upload_marked_workbook']['store'];
	        $assessment_submission_data['upload_marked_workbook_name'] = $upload_marked_workbook['upload_marked_workbook']['name'];
	    }

// 	    if (!empty($upload_marked_learner_guide['upload_marked_learner_guide']['store'])) {
// 	        $assessment_submission_data['upload_marked_learner_guide'] = $upload_marked_learner_guide['upload_marked_learner_guide']['store'];
// 	        $assessment_submission_data['upload_marked_learner_guide_name'] = $upload_marked_learner_guide['upload_marked_learner_guide']['name'];
// 	    }

// 	    if (!empty($upload_marked_poe['upload_marked_poe']['store'])) {
// 	        $assessment_submission_data['upload_marked_poe'] = $upload_marked_poe['upload_marked_poe']['store'];
// 	        $assessment_submission_data['upload_marked_poe_name'] = $upload_marked_poe['upload_marked_poe']['name'];
// 	    }

	    if ($this->common->updateData('learner_assessment_submission', $assessment_submission_data , ['id' => $learner_assessment_submission_id])) {

            $this->Email_model->email_assessor_from_assessment(
                $learner_assessment->id,
                'A new assessment has been submitted by a learner.',
                'A new assessment submission has been created
                         http://digilims.com/new_assessment
                        '
                );

	        $this->session->set_flashdata('success', 'Assessement Saved Successfully');

	        redirect('facilitator-completed-assessment-list?aid=' . $assessment_submission->learner_assessment_id);
	    } else {

	        $this->session->set_flashdata('error', 'Cannot save marked submission. Please Try Again');

	        redirect('/faciltator/view_assessment?id=' . $assessment_submission->learner_assessment_id);
	    }


	}

	public function list_assessments()
	{

	    if (isset($_SESSION['facilitator']['id'])) {
	        $facilitatorid = $_SESSION['facilitator']['id'];
	    } else {
	        $facilitatorid = '';
	    }

	    if ($facilitatorid) {
	        $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $facilitatorid], 'row');
// 	        $this->data['facilitator'] = $facilitator->id;
// 	        $this->data['trainer_id'] = $facilitator->trainer_id;
// 	        $this->data['projectmanager'] = $facilitator->project_manager;
	        $organization_id = $facilitator->organization;
	    } else {
	        $organization_id = 0;
	    }

	    $this->data['record'] = $this->common->assessmentListByOrganisation($organization_id);

	    foreach ($this->data['record'] as &$record) {

	        $unit_standard_list = $this->common->getAssessmentUnits($record->id);
	        $unit_standards = [];
	        if ($unit_standard_list) {
	            foreach ($unit_standard_list as $unit_standard_item) {
	                $unit_standards[] = $unit_standard_item->title;
	            }
	            $record->unit_standard = join(",", $unit_standards);
	        }
	    }

	    $this->data['page'] = 'list_assessments';

	    $this->data['content'] = 'pages/assessment/assessment_list';

	    $this->load->view('faciltator/tamplate', $this->data);

	}

    public function create_assessment()
    {

        if (isset($_SESSION['facilitator']['id'])) {
            $facilitator_id = $_SESSION['facilitator']['id'];
        } else {
            $facilitator_id = '';
        }

        // $project_manager_id = $_SESSION['projectmanager']['id'];
        $organisation_id = $this->data['organization'];

        $id = 0;

        if (! empty($_GET['id'])) {

            $id = $_GET['id'];

            $this->data['record'] = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
            $class_name = $this->common->accessrecord('class_name', [], ['id' => ($this->data['record'])->class_id], 'row');
            $this->data['class_name'] = $class_name;
            $this->data['record']->classname = $class_name->class_name;
            $this->data['class_module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['record'])->module_id], 'row');
            $this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], ['learnship_id' => $class_name->learnership_id], 'result');
        }

        if ($_POST) {

            if ($id != 0) {

                // // Upload files
                // if (!empty($_FILES['upload_learner_guide']['name'])) {
                // $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
                // $upload_learner_guide['upload_learner_guide'] = $assessment->upload_learner_guide;
                // }

                // // Upload files
                // if (!empty($_FILES['upload_learner_workbook']['name'])) {
                // $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
                // $upload_learner_workbook['upload_learner_workbook'] = $assessment->upload_learner_workbook;
                // }

                // // Upload files
                // if (!empty($_FILES['upload_learner_poe']['name'])) {
                // $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
                // $upload_learner_poe['upload_learner_poe'] = $assessment->upload_learner_poe;
                // }

                // // Upload files
                // if (!empty($_FILES['upload_facilitator_guide']['name'])) {
                // $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './assessment/bank/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
                // $upload_facilitator_guide['upload_facilitator_guide'] = $assessment->upload_facilitator_guide;
                // }

                $data = [
                    'assessment_start_date' => $this->input->post('assessment_start_date'),
                    'assessment_end_date' => $this->input->post('assessment_end_date'),
                    'title' => $this->input->post('title'),
                    'assessment_type' => $this->input->post('assessment_type'),
                    'submission_type' => $this->input->post('submission_type'),
                    'class_id' => $class_name->id,
                    'module_id' => $this->input->post('class_module'),
                    'qualification' => $this->input->post('qualification'),
                    'learning_programme' => $this->input->post('learning_programme'),
                    // 'unit_standard' => $this->input->post('unit_standard'),
                    // 'programme_name' => $this->input->post('programme_name'),
                    // 'programme_number' => $this->input->post('programme_number'),
                    'intervention_name' => $this->input->post('intervention_name'),

                    // 'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
                    // 'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
                    // 'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
                    // 'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

//                     'created_by' => $facilitator_id,
//                     'created_by_role' => 'faciltator',
               //     'created_date' => date('Y-m-d H:i:s'),
                    'updated_date' => date('Y-m-d H:i:s')
                ];

                if (! empty($_POST['unit_standard']) && is_array($_POST['unit_standard'])) {
                    $data['unit_standard'] = join(',', $_POST['unit_standard']);
                }

                if ($this->common->updateData('assessment', $data, array(
                    'id' => $id
                ))) {

                    $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

                    redirect('facilitator-assessment-list');
                } else {

                    $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

                    redirect('facilitator-assessment-list');
                }
            } else {

                // // Upload files
                // if (!empty($_FILES['upload_learner_guide']['name'])) {
                // $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $upload_learner_guide = [];
                // }

                // // Upload files
                // if (!empty($_FILES['upload_learner_workbook']['name'])) {
                // $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $upload_learner_workbook = [];
                // }

                // // Upload files
                // if (!empty($_FILES['upload_learner_poe']['name'])) {
                // $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $upload_learner_poe = [];
                // }

                // // Upload files
                // if (!empty($_FILES['upload_facilitator_guide']['name'])) {
                // $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './uploads/assessment/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                // } else {
                // $upload_facilitator_guide = [];
                // }

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
                    // 'unit_standard' => $this->input->post('unit_standard'),
                    // 'programme_name' => $this->input->post('programme_name'),
                    // 'programme_number' => $this->input->post('programme_number'),
                    'intervention_name' => $this->input->post('intervention_name'),

                    // 'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
                    // 'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
                    // 'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
                    // 'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

                    'created_by' => $facilitator_id,
                    'created_by_role' => 'faciltator',
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_date' => date('Y-m-d H:i:s')
                ];

                if (! empty($_POST['unit_standard']) && is_array($_POST['unit_standard'])) {
                    $data['unit_standard'] = join(',', $_POST['unit_standard']);
                }

                if ($this->common->insertData('assessment', $data)) {

                    $this->Email_model->email_learner_in_class($data['class_id'], 'You have been assigned a new assessment.', 'A new new assessment has been created
                     http://digilims.com/new_assessment
                    ');

                    $this->session->set_flashdata('success', 'Assessement Saved Successfully');

                    redirect('facilitator-assessment-list');
                } else {

                    $this->session->set_flashdata('error', 'Please Try Again');

                    redirect('faciltator-create-assessment');
                }
            }

            if ($id != 0) {
                $this->data['record'] = $this->common->accessrecord('assessment', [], [
                    'id' => $id
                ], 'row');
                $this->data['class_module'] = $this->common->accessrecord('class_module', [], [
                    'id' => ($this->data['record'])->module_id
                ], 'row');
            }
        }

        $this->data['classes'] = $this->common->accessrecord('class_name', [], [], 'result_array');
        $this->data['units'] = $this->common->accessrecord('units', [], [], 'result');
        $this->data['submission_count'] = $this->common->submissionCountByAssessment($id);

        $this->data['page'] = 'create_assessment';

        $this->data['content'] = 'pages/assessment/assessment_form';

        $this->data['learnership'] = $this->common->accessrecord('learnership', [], ['organization' => $organisation_id], 'result');



        $this->load->view('faciltator/tamplate', $this->data);
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

        public function facilitator_request_assessor_review()
        {

            if (isset($_SESSION['facilitator']['id'])) {
                $facilitator_id = $_SESSION['facilitator']['id'];
            } else {
                $facilitator_id = '';
            }

            $assessment_id = 0;
            if (!empty($_GET['id'])) {
                $assessment_id = $_GET['id'];
            }
            if ($assessment_id == 0) {
                $this->session->set_flashdata('error', 'Invalid Assessment. The request document was not found.');
                redirect('facilitator-assessment-list');
            }

            $assessment = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
            if (!$assessment) {
                $this->session->set_flashdata('error', 'Invalid Assessment. The request document was not found.');
                redirect('facilitator-assessment-list');
            }

            if ($_POST) {

                if (!empty($_FILES['upload_assessed_overall_report']['name'])) {
                    $upload_assessed_overall_report['upload_assessed_overall_report']['store'] = $this->singlefileupload('upload_assessed_overall_report', './uploads/assessment/upload_assessed_overall_report/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                    $upload_assessed_overall_report['upload_assessed_overall_report']['name'] = $_FILES['upload_assessed_overall_report']['name'];
                } else {
                    if (empty($learner_assessment->upload_assessed_overall_report)) {
                        $this->session->set_flashdata('error', 'No Overall Report. Please Try Again');
                        redirect('/assessor/view_assessment?id=' . $learner_assessment_id);
                    }
                }

                $assessment_data = [
                    'facilitator_status' => 'complete',
                    'status' => 'awaiting assessment review',
                    'updated_date' => date('Y-m-d H:i:s'),
                    'assessor_status' =>  'awaiting assessment review',
                    'assessment_update_date' => date('Y-m-d H:i:s'),
                ];

                if (!empty($upload_assessed_overall_report['upload_assessed_overall_report']['store'])) {
                    $assessment_data['upload_assessed_overall_report'] = $upload_assessed_overall_report['upload_assessed_overall_report']['store'];
                    $assessment_data['upload_assessed_overall_report_name'] = $upload_assessed_overall_report['upload_assessed_overall_report']['name'];
                }

                $this->common->updateData('assessment', $assessment_data, array('id' => $assessment_id));

                $this->Email_model->notify_assessor_of_review_request(
                    $assessment_id,
                    'A new assessment has been submitted for moderation.',
                    'A new assessment moderation has been submission
                         http://digilims.com/new_assessment'
                    );

                $this->session->set_flashdata('success', 'The assessment has been submitted for moderation.');

            } else {
               // $this->session->set_flashdata('error', 'No Overall Report. Please Try Again');
               ;
            }


            redirect('facilitator-assessment-list');


        }


}
