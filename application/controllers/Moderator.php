<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Moderator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($_SESSION['moderator']['id'])) {
			redirect('moderator');
		} else {
			$assessor = $this->common->accessrecord('moderator', [], ['id' => $this->session->userdata['moderator']['id']], 'row');
			$this->data['organization_id']  = $assessor->organization;
			$this->data['project_manager_id']  = $assessor->project_manager;
			$this->data['trainer_id']  = $assessor->trainer_id;
		}
	}

	public function dashboard()
	{
		$this->data['moderation_report_'] = $this->common->accessrecord('moderation_report', [], ['moderator_id' => $this->session->userdata['moderator']['id']], 'result');
		$this->data['moderation_report'] = count($this->data['moderation_report_']);

		$this->data['page'] = 'dashboard';

		$this->data['content'] = 'pages/dashboard/dashboard';

		$this->load->view('moderator/tamplate', $this->data);
	}

	/*=================delete record============= */
	function deletedata()
	{

		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

		$this->session->set_flashdata('success', 'Record Deleted Successfully');

		redirect($_SERVER['HTTP_REFERER']);
	}
	/*=================end=========end=========== */

	public function logout()
	{

		$this->session->unset_userdata("moderator");

		$this->session->sess_destroy();

		redirect('internal-moderator');
	}

	public function moderator_changepassword()
	{

		$this->data['page'] = 'changepassword';

		$this->data['content'] = 'changepassword';

		if ($_POST) {

			if (isset($_SESSION['moderator']['id'])) {

				$id = $_SESSION['moderator']['id'];
			} else {

				$id = '';
			}

			$oldpassword = $this->input->post('oldpassword');

			$password = $this->input->post('password');

			$datau = $this->common->accessrecord('moderator', ['id, password'], array('id' => $id), 'row');

			if (!empty($datau)) {

				if ($datau->password == sha1($oldpassword)) {

					$this->common->updateData('moderator', array('password' => sha1($password)), array('id' => $id));

					$this->session->set_flashdata('success', 'Your Password Successfully Update');

					redirect('internal-moderator-changepassword');
				} else {

					$this->session->set_flashdata('error', 'Your Old Password Not Match');
				}
			} else {

				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}

		$this->load->view('moderator/tamplate', $this->data);
	}


	public function moderator_editprofile()
	{

		if (isset($_SESSION['moderator']['id'])) {

			$moderator_id = $_SESSION['moderator']['id'];
		} else {

			$moderator_id = '';
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

						$path = './uploads/moderator/acreditationsfiles/';

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
			if (!empty($_FILES['profile_image']['name'])) {

				$path = './uploads/internal_moderator/profile_image/';

				$images = $this->fileupload('profile_image', $path);

				$profile_image = $images;
			}else{
			$imgdata = 	$this->common->accessrecord('moderator', [], ['id' => $moderator_id], 'row');
			$profile_image = $imgdata->profile_image;
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
				'municipality' => $municipality,
				'province' => $this->input->post('province'),

				'profile_image' => $profile_image
			);

			if ($this->common->updateData('moderator', $data, ['id' => $moderator_id])) {

				$this->session->set_flashdata('success', 'Profile Updated Successfully');

				redirect('internal-moderator-editprofile');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('internal-moderator-editprofile');
			}
		} else {

			$this->data['record'] = $this->common->accessrecord('moderator', [], ['id' => $moderator_id], 'row');
			// print_r($this->data['record']);

			$this->data['training'] = $this->common->accessrecord('trainer', [], [], 'result');

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();
			$this->data['municipality'] = $this->common->get_municipality();
			$this->data['page'] = 'moderator_editprofile';

			$this->data['content'] = 'pages/myprofile/moderator_editprofile';

			$this->load->view('moderator/tamplate', $this->data);
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

	public function moderator_changestatus()
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

	public function moderator_getdestrict()
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

	// public function moderator_getregion()
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

	public function moderator_getcity()
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

	public function moderator_acreditations_file_delete()
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





	public function create_moderation()
	{
		$moderator_id = $_SESSION['moderator']['id'];
		if (empty($_POST)) {

			$this->data['moderator_Record'] = $this->common->accessrecord('moderator', [], ['id' => $moderator_id], 'row');

			$this->data['learnershipSubType'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result_array');

			// print_r($this->data['trainer_id']);die;
			// $this->data['learnership'] = $this->common->accessrecord('learnership', [], ['trainer_id' =>  $this->data['trainer_id']], 'result');
			// TODO: I have temporarily removed the link between the moderator and trainer, so that we can access all classes and assessments
			$this->data['learnership'] = $this->common->accessrecord('learnership', [], ['organization' => $this->data['organization_id']], 'result');


			$this->data['page'] = 'createmoderation';

			$this->data['content'] = 'pages/moderation/createmoderation';

			$this->load->view('moderator/tamplate', $this->data);
		} else {


			$learnerid = $_POST['lid'];
			$lperform = $_POST['lperform'];
			$locmnt = $_POST['locmnt'];
			$bulk = array();
			foreach ($learnerid as $key => $value) {
				$bulk[$key]['lid'] = $value;
				$bulk[$key]['lperform'] = $lperform[$key];
				$bulk[$key]['locmnt'] = $locmnt[$key];
			};
			// echo "<pre>"; 	print_r($bulk); die;
			$data = array(
				'moderator_name' => $this->input->post('fullname'),
				'moderator_surname' => $this->input->post('surname'),
				'moderation_number' => $this->input->post('moderation_number'),
				'moderation_date' => $this->input->post('moderation_date'),
				'learnship_id' => $this->input->post('learnship_id'),
				'learnership_sub_type' => $this->input->post('learnershipSubType'),
				'classname' => $this->input->post('classname'),
				'unit_statndards' => $this->input->post('unit_statndards'),
				'organization' => $this->data['organization_id'],
				'project_manager' => $this->data['project_manager_id'],
				'trainer_id' => $this->data['trainer_id'],
				// 'learner_id' => $this->input->post('learner_id'),
				// 'learner_name' => $this->input->post('learner_name'),
				// 'learner_surname' => $this->input->post('learner_surname'),
				'overall_comments' => $this->input->post('overall_comment'),
				'moderator_id' => $moderator_id,
			);
			$res = $this->common->insertData('moderation_report', $data);
			$assessment_report_id = $res;
			foreach ($bulk as $key => $value) {
				$datal = array(
					'moderation_report_id' => $assessment_report_id,
					'learner_id' => $value['lid'],
					'review' => $value['lperform'],
					'overallcmnt' => $value['locmnt']
				);
				$respn = $this->common->insertData('moderation_report_learner', $datal);
			}


			if ($respn) {

				$this->session->set_flashdata('success', 'Moderation Report Added Successfully');
				redirect('internal-moderator-moderation-list');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');
				redirect('internal-moderator-create-moderation');
			}
		}
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

	public function get_classname()
	{
		// if (isset($_SESSION['moderator']['id'])) {
		// 	$moderatorid = $_SESSION['moderator']['id'];
		// 	$moderator = $this->common->accessrecord('moderator', [], ['id' => $moderatorid], 'row');

		// 	$trainer_id = $moderator->trainer_id;
		// 	// print_r($moderator);die;
		// } else {
		// 	$trainer_id = '';
		// }
		// if (isset($trainer_id)) {
		// 	$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');
		// 	$trainerid = $trainer->id;
		// } else {
		// 	$trainerid = '';
		// }
		// $id = $this->input->post('value');
		// $record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'trainer_id' => $trainerid], 'result');
		// // print_r($record);die;
		// if (!empty($record)) {
		// 	$data = $record;
		// } else {
		// 	$data = array('error' => 'classname list not available in this learnershipsubtype');
		// }
		// echo json_encode($data);


		// if (isset($_SESSION['moderator']['id'])) {

		// 	$moderatorid = $_SESSION['moderator']['id'];

		// 	$moderator = $this->common->accessrecord('moderator', [], ['id' => $moderatorid], 'row');
		// 	$trainer_id = $moderator->trainer_id;
		// 	// $trainer_id = $facilitator->trainer_id;
		// } else {

		// 	$trainer_id = '';
		// }

		// if (!empty($moderator)) {

		// 	$trainer = $this->common->accessrecord('trainer', [], ['id' => $trainer_id], 'row');

		// 	$trainerid = $trainer->id;

		// } else {

		// 	$trainerid = '';
		// }

		$id = $this->input->post('value');

		// $record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'trainer_id' => $trainerid], 'result');
		$record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id], 'result');

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

	public function moderationlist()
	{
		$moderator_id = $_SESSION['moderator']['id'];

		$this->data['moderation_report'] = $this->common->accessrecord('moderation_report', [], ['moderator_id' => $moderator_id], 'result_array');

		$this->data['page'] = 'moderationlist';

		$this->data['content'] = 'pages/moderation/moderationlist';

		$this->load->view('moderator/tamplate', $this->data);
	}

	public function user_listing()
	{
		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];
			$this->data['moderation_record'] = $this->common->accessrecord('moderation_report', [], ['id' => $id], 'row');
			$this->data['learner_record'] = $this->common->accessrecord('moderation_report_learner', [], ['moderation_report_id' => $id], 'result_array');
		}

		$this->data['page'] = 'moderationlist';

		$this->data['content'] = 'pages/moderation/moderation_learner_list';

		$this->load->view('moderator/tamplate', $this->data);
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


	//****************************Assessments******************//
	public function list_complete_assessments(){


	    if (isset($_SESSION['moderator']['id'])) {
	        $moderator_id = $_SESSION['moderator']['id'];
	    } else {

	        $moderator_id = '';
	    }

	    $moderator = $this->db->where('id',  $moderator_id)->get('moderator')->row();
	    $organisation_id  = $moderator->organization;



	    $this->data['record'] = $this->common->assessmentListByModerator($moderator_id);

	    $this->data['page'] = 'list_complete_assessments';

	    $this->data['content'] = '/pages/assessment/assessment_list';

	    $this->load->view('moderator/tamplate', $this->data);
	}

// 	public function list_moderation_classes()
// 	{
//
//
// 	    if (isset($_SESSION['moderator']['id'])) {
// 	        $moderator_id = $_SESSION['moderator']['id'];
// 	    } else {
// 	        $moderator_id = '';
// 	    }
//
// 	    $moderator = $this->db->where('id',  $moderator_id)->get('moderator')->row();
// 	    $organisation_id  = $moderator->organization;
//
// 	    $this->data['record'] = $this->common->AssessmentModerationListsByOrganisation($organisation_id);
//
// 	    $this->data['page'] = 'list_complete_assessments';
//
// 	    $this->data['content'] = '/pages/assessment/moderation_class_list';
//
// 	    $this->load->view('moderator/tamplate', $this->data);
// 	}


	public function view_assessment(){

	    if (isset($_SESSION['moderator']['id'])) {
	        $moderator_id = $_SESSION['moderator']['id'];
	    } else {
	        $moderator_id = '';
	    }

	    $assessment_id = 0;
	    if (!empty($_GET['id'])) {
	        $assessment_id = $_GET['id'];
	    }
	    if ($assessment_id == 0) {
	        echo "Invalid Assessment";
	        return;
	    }

	    $this->data['assessment'] = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
	    $this->data['class'] = $this->common->accessrecord('class_name', [], ['id' => ($this->data['assessment'])->class_id ], 'row');
	    $this->data['module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['assessment'])->module_id ], 'row');
	    $this->data['unit'] = $this->common->accessrecord('units', [], ['id' => ($this->data['assessment'])->unit_standard ], 'row');

	    $unit_standard_list = $this->common->getAssessmentUnits($assessment_id);
	    $unit_standards = [];
	    foreach ($unit_standard_list as $unit_standard_item) {
	        $unit_standards[] = $unit_standard_item->title;
	    }
	    $this->data['unit_standards'] = $unit_standards;

	    $this->data['moderation_report'] = $this->common->accessrecord('moderation_report', [], ['assessment_id' => $assessment_id], 'row');

	    $this->data['page'] = 'view_assessment';

	    $this->data['content'] = 'pages/assessment/assessment_details';

	    $this->load->view('moderator/tamplate', $this->data);

	}


	public function moderation_submission_list() {

	    if (isset($_SESSION['moderator']['id'])) {
	        $moderator_id = $_SESSION['moderator']['id'];
	    } else {
	        $moderator_id = '';
	    }

	    $moderation_report_id = $this->input->post('moderator_report_id');
	    $assessment_id = $this->input->post('assessment_id');

	    $this->data['moderation_report'] = false;
	    if ($moderation_report_id) {
	        $this->data['moderation_report'] = $this->common->accessrecord('moderation_report', [], ['id' => $moderation_report_id], 'row');
	    }

	    $this->data['assessment'] = false;
	    if ($assessment_id) {
	        $this->data['assessment'] = $this->common->accessrecord('assessment', [], ['id' => $assessment_id], 'row');
	    }


	    // Create the moderation report if it does not exist
	    if (!$this->data['moderation_report']) {

	        $moderation_report_data = array(
	            'moderator_name' => '',
	            'moderator_surname' => '',
	            'moderation_number' => $this->input->post('moderation_number'),
	            'moderation_date' => date('Y-m-d'),
	            'learnship_id' => '',
	            'learnership_sub_type' => '',
	            'classname' => '',
	            'unit_statndards' => '',
	            'organization' => '',
	            'project_manager' => '',
	            'trainer_id' => '',
	            // 'learner_id' => $this->input->post('learner_id'),
	            // 'learner_name' => $this->input->post('learner_name'),
	            // 'learner_surname' => $this->input->post('learner_surname'),
	            'overall_comments' => '',
	            'moderator_id' => $moderator_id,
	            'sample_percentage' => $this->input->post('sample_percentage'),
	            'assessment_id' => $assessment_id,
	        );

	        $res = $this->common->insertData('moderation_report', $moderation_report_data);

	        // if saved the report entry, lets choose assessment submissions to work with
	        if ($res) {

	            // Get count of submissions
	            $submissions_list = $this->common->accessrecord('learner_assessment', [], ['assessment_id' => $assessment_id], 'result');
	            $submission_count = count($submissions_list);

	            $sample_percentage = $this->input->post('sample_percentage');

	            $sample_size = ceil(($sample_percentage / 100) * $submission_count);

	            $sample_list_idx = array_rand($submissions_list, $sample_size);

	            $sample_list = [];

	            if (is_numeric($sample_list_idx)) {
	                $sample_list[] = $submissions_list[$sample_list_idx];
	            } else {
	                foreach ($sample_list_idx as $index) {
	                    $sample_list[] = $submissions_list[$index];
	                }
	            }

	            foreach ($sample_list as $sample_list_item) {
	                $this->common->updateData('learner_assessment', array('internal_moderation_status' => 'selected'), array('id' => $sample_list_item->id));
	            }

	            $assessment_data = [
	                'status' => 'moderation in progress',
	                'updated_date' => date('Y-m-d H:i:s')
	            ];

	            $this->common->updateData('assessment', $assessment_data, array('id' => $assessment_id));

	            // Load the list of selected submissions
	            $this->data['record'] = $this->common->assessmentSubmissionByModerationStatus($assessment_id, 'selected');

	            $this->data['page'] = 'list_complete_assessments';

	            $this->data['content'] = 'pages/assessment/moderation_submission_list';
	            $this->session->set_flashdata('success', 'The moderation list is available.');

	            $this->load->view('moderator/tamplate', $this->data);

	        }

	    } else {

	        // Moderation report exists. Just load the data

	        // Load the list of selected submissions
	        $this->data['record'] = $this->common->assessmentSubmissionByModerationStatus($assessment_id, 'selected');

	        $this->data['page'] = 'list_complete_assessments';

	        $this->data['content'] = 'pages/assessment/moderation_submission_list';

	        $this->load->view('moderator/tamplate', $this->data);
	    }


	}

	public function view_assessment_submission()
	{

	    if (isset($_SESSION['moderator']['id'])) {
	        $moderator_id = $_SESSION['moderator']['id'];
	    } else {
	        $moderator_id = '';
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

	    $unit_standard_list = $this->common->getAssessmentUnits(($this->data['record'])->assessment_id);
	    $unit_standards = [];
	    foreach ($unit_standard_list as $unit_standard_item) {
	        $unit_standards[] = $unit_standard_item->title;
	    }
	    $this->data['unit_standards'] = $unit_standards;


	    $this->data['page'] = 'view_assessment';

	    $this->data['content'] = 'pages/assessment/assessment_submission_details';

	    $this->load->view('moderator/tamplate', $this->data);

	}

	public function moderate_submission()
	{


	    if (isset($_SESSION['moderator']['id'])) {
	        $moderator_id = $_SESSION['moderator']['id'];
	    } else {
	        $moderator_id = '';
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


}










