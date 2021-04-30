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
			$this->data['learnership'] = $this->common->accessrecord('learnership', [], ['trainer_id' =>  $this->data['trainer_id']], 'result');


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



	    $this->data['record'] = $this->common->CompletedAssessmentListByOrganisation($organisation_id);

	    $this->data['page'] = 'list_complete_assessments';

	    $this->data['content'] = '/pages/assessment/complete_assessment_list';

	    $this->load->view('moderator/tamplate', $this->data);
	}

}










