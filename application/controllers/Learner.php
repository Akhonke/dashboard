<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Learner extends CI_Controller

{

	public function __construct()
	{

		parent::__construct();

		if (empty($_SESSION['learner']['id'])) {

			redirect("learner");
		}
	}

	public function dashboard()
	{
		$id = $_SESSION['learner']['id'];

		$this->data['complaint_list_'] = $this->common->accessrecord('complaints_and_suggestions', [], ['learner_id' => $id,'type'=>'complaints'], 'result');
		$this->data['complaint_list'] = count($this->data['complaint_list_']);

		$this->data['suggestion_list_'] = $this->common->accessrecord('complaints_and_suggestions', [], ['learner_id' => $id,'type'=>'suggestions'], 'result');
		$this->data['suggestion_list'] = count($this->data['suggestion_list_']);

		$this->data['page'] = 'dashboard';

		$this->data['content'] = 'pages/dashboard/dashboard';

		$this->load->view('learner/tamplate', $this->data);
	}

	public function logout()
	{

		$this->session->unset_userdata("learner");

		$this->session->sess_destroy();

		redirect('learner');
	}

	public function complaints_suggestion()
	{

		if ($_POST) {

			if (isset($_SESSION['learner']['id'])) {

				$id = $_SESSION['learner']['id'];
			} else {

				$id = '';
			}

			$data = array(
				'learner_id' => $id,

				'type' => $this->input->post('type'),

				'description' => $this->input->post('description'),

			);

			if ($this->common->insertData('complaints_and_suggestions', $data)) {

				$this->session->set_flashdata('success', 'Data Insert Successfully');
				if ($this->input->post('type') == 'complaints') {
					redirect('learner-complaint-list');
				} else {
					redirect('learner-suggestion-list');
				}
			} else {

				$this->session->set_flashdata('error', "Please Try Again");

				redirect('learner-complaints-suggestion');
			}
		} else {

			$this->data['page'] = 'complaints_suggestion';

			$this->data['content'] = 'pages/complaints_suggestion/complaints_suggestion';

			$this->load->view('learner/tamplate', $this->data);
		}
	}

	public function complaint_list()
	{

		$id = $_SESSION['learner']['id'];

		$this->data['complaint_list'] = $this->common->accessrecord('complaints_and_suggestions', [], ['learner_id' => $id,'type'=>'complaints'], 'result_array');

		$this->data['page'] = 'complaint_list';

		$this->data['content'] = 'pages/complaintandsuggestion/complaint_list';

		$this->load->view('learner/tamplate', $this->data);
	}

	public function suggestion_list()
	{
		$id = $_SESSION['learner']['id'];

		$this->data['complaint_list'] = $this->common->accessrecord('complaints_and_suggestions', [], ['learner_id' => $id,'type'=>'suggestions'], 'result_array');

		$this->data['page'] = 'suggewstion_list';

		$this->data['content'] = 'pages/complaintandsuggestion/complaint_list';

		$this->load->view('learner/tamplate', $this->data);
	}

	public function attendance_list()
	{

		if (isset($_SESSION['learner']['id'])) {

			$id = $_SESSION['learner']['id'];
		} else {

			$id = '';
		}

		$this->data['data'] = $this->common->accessrecord('attendance', [], ['id' => $id], 'result');

		$this->data['page'] = 'attendance_list';

		$this->data['content'] = 'pages/attendance/attendance_list';

		$this->load->view('learner/tamplate', $this->data);
	}



	public function attachments_list()
	{

		if (isset($_SESSION['learner']['id'])) {

			$id = $_SESSION['learner']['id'];
		} else {

			$id = '';
		}

		$this->data['learner'] = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

		$this->data['page'] = 'attachments_list';

		$this->data['content'] = 'pages/attachments/attachments_list';

		$this->load->view('learner/tamplate', $this->data);
	}



	public function learnerlist()
	{

		if (isset($_SESSION['learner']['id'])) {

			$id = $_SESSION['learner']['id'];
		} else {

			$id = '';
		}

		$this->data['learner'] = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

		$this->data['page'] = 'learner_list';

		$this->data['content'] = 'pages/attachments/learner_list';

		$this->load->view('learner/tamplate', $this->data);
	}



	public function performance_list()
	{

		$this->data['data'] = $this->common->accessrecord('organisation', [], [], 'result');

		$this->data['page'] = 'performance_list';

		$this->data['content'] = 'pages/performance/performance_list';

		$this->load->view('learner/tamplate', $this->data);
	}



	public function stipends_list()
	{

		if (isset($_SESSION['learner']['id'])) {

			$id = $_SESSION['learner']['id'];
		} else {

			$id = '';
		}

		$this->data['record'] = $this->common->accessrecord('stipend', [], ['id_number' => $id], 'result');

		$this->data['page'] = 'stipends_list';

		$this->data['content'] = 'pages/stipends/stipends_list';

		$this->load->view('learner/tamplate', $this->data);
	}

	public function create_drop_out()
	{

		if ($_POST) {

			if (isset($_SESSION['learner']['id'])) {

				$learner_id = $_SESSION['learner']['id'];
			} else {

				$learner_id = '';
			}

			$learner = $this->common->accessrecord('learner', [], ['id' => $learner_id], 'row');

			if (!empty($_FILES['attachments']['name'])) {

				$path = './uploads/learner/drop_out/';

				$attachments = $this->fileupload('attachments', $path);

				$data = array(
					'learner_id' => $learner_id,

					'learner_name' => $learner->first_name,

					'learner_surname' => $learner->surname,

					'learner_id_number' => $learner_id,

					'learner_classname' => $learner->classname,

					'learnership_sub_type' => $learner->learnershipSubType,

					// 'replacement_learner_details'=>$this->input->post('replacement_learner_details'),

					'date_of_resignation' => $this->input->post('date_of_resignation'),

					'reason_for_dropping_out' => $this->input->post('reason_for_dropping_out'),

					'attachments' => $attachments,

				);
			}

			if ($this->common->insertData('drop_out', $data)) {

				$this->session->set_flashdata('success', 'Drop Out Added Successfully');

				redirect('learner-drop-out');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('learner-drop-out');
			}
		} else {

			$this->data['learnership_sub_type'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['page'] = 'create_drop_out';

			$this->data['content'] = 'pages/drop_out/create_drop_out';

			$this->load->view('learner/tamplate', $this->data);
		}
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

	public function learner_changepassword()
	{

		$this->data['page'] = 'changepassword';

		$this->data['content'] = 'changepassword';

		if ($_POST) {

			if (isset($_SESSION['learner']['id'])) {

				$learner_id = $_SESSION['learner']['id'];
			} else {

				$learner_id = '';
			}

			$oldpassword = $this->input->post('oldpassword');

			$password = $this->input->post('password');

			$datau = $this->common->accessrecord('learner', ['id, password'], array('id' => $learner_id), 'row');

			if ($datau->password == sha1($oldpassword)) {

				$this->common->updateData('learner', array('password' => sha1($password)), array('id' => $learner_id));

				$this->session->set_flashdata('success', 'Your Password Successfully Update');

				redirect('learner-changepassword');
			} else {

				$this->session->set_flashdata('error', 'Your Old Password Not Match');

				redirect('learner-changepassword');
			}
		}

		$this->load->view('learner/tamplate', $this->data);
	}



	public function learner_editprofile()
	{

		if (isset($_SESSION['learner']['id'])) {

			$id = $_SESSION['learner']['id'];
		}

		if ($_POST) {

			if ($id != 0) {

				$data = $_POST;

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

				if (!empty($_FILES['profile_image']['name'])) {

					$path = './uploads/learner/profile_image/';

					$images = $this->fileupload('profile_image', $path);

					$data['profile_image'] = $images;
				}else {

					$learner = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

					$data['profile_image'] = $learner->profile_image;
				}
				$learner_data = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

				$district = $this->input->post('district');

				$District = $this->common->one_District($district);

				$data['district'] = $District->name;

				$region = $this->input->post('region');

				$regiondata = $this->common->one_region($region);

				$data['region'] = $regiondata->region;

				$city = $this->input->post('city');

				$citydata = $this->common->one_city($city);

				$data['city'] = $citydata->city;

				$data['trining_provider'] = $learner_data->trining_provider;

				// $data['password'] = $learner_data->password;

				$this->common->update_learner($id, $data);

				if ($this->session->set_flashdata('success', 'Profile Updated Succesfully')) {

					redirect('learner-editprofile');
				} else {

					redirect('learner-editprofile');
				}
			}
		} else {

			$this->data['learnership_sub_type'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

			$this->data['classname'] = $this->common->accessrecord('class_name', [], [], 'result');

			$this->data['training'] = $this->common->get_training();

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			$this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['record'] = $this->common->accessrecord('learner', [], ['id' => $id], 'row');

			$this->data['page'] = 'learner_editprofile';

			$this->data['content'] = 'pages/myprofile/learner_editprofile';

			$this->load->view('learner/tamplate', $this->data);
		}
	}

	public function learner_getdestrict()
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

	public function learner_getregion()
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

	public function learner_getcity()
	{

		$region = $this->common->one_region($this->input->post('value'));

		$region_id = $region->region;

		$regiondata = $this->common->get_region_city($region_id);

		if (!empty($regiondata)) {

			$region_data = $regiondata;
		} else {

			$region_data = array('error' => 'City list not available in this region');
		}

		echo json_encode($region_data);
	}


//****************************Learner Live Class******************//
public function live_class_list(){


	if (isset($_SESSION['learner']['id'])) {

		$id = $_SESSION['learner']['id'];
		// print_r($id);die;
	}



	$this->data['learner'] = $this->common->accessrecord('learner', ['trainer_id'], ['id'=> $id], 'row');
	$trainer_id = $this->data['learner']->trainer_id;

	// print_r($trainer_id);die;
	$this->data['learnerlinklist'] = $this->common->accessrecord('elearner', [], ['trainer_id'=>$trainer_id], 'result');


		$this->data['page'] = 'live_class_list';

		$this->data['content'] = 'pages/elearner/live_class_list';

		$this->load->view('learner/tamplate', $this->data);
}


//****************************Learner Live Class******************//



//****************************Assessments******************//
public function list_assessments(){


     $learner_id = null;
     if (isset($_SESSION['learner']['id'])) {
         $learner_id = $_SESSION['learner']['id'];
     }


     $this->data['record'] = $this->common->assessmentListByLearner($learner_id);

     $this->data['page'] = 'list_assessments';

     $this->data['content'] = 'pages/assessment/assessment_list';

     $this->load->view('learner/tamplate', $this->data);
}

public function view_assessment(){


    $learner_id = null;
    if (isset($_SESSION['learner']['id'])) {
        $learner_id = $_SESSION['learner']['id'];
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
    $this->data['learner_assessment'] = $this->common->accessrecord('learner_assessment', [], ['learner_id' => $learner_id, 'assessment_id' => $assessment_id], 'row');
    $this->data['class'] = $this->common->accessrecord('class_name', [], ['id' => ($this->data['assessment'])->class_id ], 'row');
    $this->data['unit'] = $this->common->accessrecord('units', [], ['id' => ($this->data['assessment'])->unit_standard ], 'row');
    $this->data['class_module'] = $this->common->accessrecord('class_module', [], ['id' => ($this->data['assessment'])->module_id ], 'row');

    $assessment_submissions = [];
    $assessment_submissions = $this->common->accessrecord('learner_assessment_submission', [], ['learner_assessment_id' => ($this->data['learner_assessment'])->id], 'result');
    $this->data['learner_assessment_submissions'] = $assessment_submissions;

    $this->data['learner_id'] = $learner_id;
    $this->data['assessment_id'] = $assessment_id;

    $this->data['page'] = 'view_assessment';

    $this->data['content'] = 'pages/assessment/assessment_details';

    $this->load->view('learner/tamplate', $this->data);



}

// TODO: This file is define in multiple files (eg Project manager controller

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

public function load_assessment(){


    $learner_id = null;
    if (isset($_SESSION['learner']['id'])) {
        $learner_id = $_SESSION['learner']['id'];
    }

    $assessment_id = 0;
    if (!empty($_POST['assessment_id'])) {
        $assessment_id = $_POST['assessment_id'];
    }

    if ($assessment_id == 0) {
        $this->session->set_flashdata('error', 'Invalid Assessment. Please Try Again');
        redirect('learner-assessment-list');
    }


    // Upload files
    if (!empty($_FILES['upload_completed_learner_guide']['name'])) {
        $upload_completed_learner_guide['upload_completed_learner_guide']['store'] = $this->singlefileupload('upload_completed_learner_guide', './uploads/assessment/upload_completed_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
        $upload_completed_learner_guide['upload_completed_learner_guide']['name'] = $_FILES['upload_completed_learner_guide']['name'];
    } else {
        $this->session->set_flashdata('error', 'No learner guide submitted. Please Try Again');
        redirect('/learner/view_assessment?id=' . $assessment_id);
    }

    if (!empty($_FILES['upload_completed_workbook']['name'])) {
        $upload_completed_workbook['upload_completed_workbook']['store'] = $this->singlefileupload('upload_completed_workbook', './uploads/assessment/upload_completed_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
        $upload_completed_workbook['upload_completed_workbook']['name'] = $_FILES['upload_completed_workbook']['name'];
    } else {
        $this->session->set_flashdata('error', 'No learner workbook submitted. Please Try Again');
        redirect('/learner/view_assessment?id=' . $assessment_id);
    }

    if (!empty($_FILES['upload_completed_poe']['name'])) {
        $upload_completed_poe['upload_completed_poe']['store'] = $this->singlefileupload('upload_completed_poe', './uploads/assessment/upload_completed_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
        $upload_completed_poe['upload_completed_poe']['name'] = $_FILES['upload_completed_poe']['name'];
    } else {
        $this->session->set_flashdata('error', 'No learner POE submitted. Please Try Again');
        redirect('/learner/view_assessment?id=' . $assessment_id);
    }

    $data = [
        'assessment_id' => $this->input->post('assessment_id'),
        'learner_id' => $learner_id,

        'status' => 'assessment',
        'internal_moderation_status' => 'submitted',
        'created_date' => date('Y-m-d H:i:s'),
        'updated_date' => date('Y-m-d H:i:s'),

    ];


    $learner_assessment_id = $this->common->insertData('learner_assessment', $data);

    if ($learner_assessment_id) {

        $submission_data = [
            'learner_assessment_id'               => $learner_assessment_id,
            'assessment_submission_date'          => date('Y-m-d H:i:s'),

            'upload_completed_learner_guide'      => $upload_completed_learner_guide['upload_completed_learner_guide']['store'],
            'upload_completed_learner_guide_name' => $upload_completed_learner_guide['upload_completed_learner_guide']['name'],

            'upload_completed_workbook'           => $upload_completed_workbook['upload_completed_workbook']['store'],
            'upload_completed_workbook_name'      => $upload_completed_workbook['upload_completed_workbook']['name'],

            'upload_completed_poe'                => $upload_completed_poe['upload_completed_poe']['store'],
            'upload_completed_poe_name'           => $upload_completed_poe['upload_completed_poe']['name'],

            'assessment_status'                   => 'new',

            'created_date' => date('Y-m-d H:i:s'),
            'updated_date' => date('Y-m-d H:i:s'),
        ];

        if ($this->common->insertData('learner_assessment_submission', $submission_data)) {

//             $this->Email_model->email_assessor_from_assessment(
//                 $assessment_id,
//                 'A new assessment has been submitted by a learner.',
//                 'A new assessment submission has been created
//                          http://digilims.com/new_assessment
//                         '
//                 );

            $this->Email_model->email_facilitator_from_assessment(
                $assessment_id,
                'A new assessment has been submitted by a learner.',
                'A new assessment submission has been created
                         http://digilims.com/new_assessment
                        '
                );


            $this->session->set_flashdata('success', 'Assessement Saved Successfully');
            redirect('learner-assessment-list');
        }

    }

    // If we are here, something went wrong saving either the learner_assessment or learner_assessment_submission
    $this->session->set_flashdata('error', 'Please Try Again');
    redirect('/learner/view_assessment?id=' . $assessment_id);


}


}
