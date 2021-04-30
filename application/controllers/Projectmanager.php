<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Projectmanager extends CI_Controller

{

	public function __construct()
	{

		parent::__construct();

		if (empty($this->session->userdata['projectmanager'])) {

			redirect("projectmanager");
		} else {
			$projectmanager = $this->common->accessrecord('project_manager', [], ['id' => $this->session->userdata['projectmanager']['id']], 'row');
			$this->data['organization_id']  = $projectmanager->organization;
		}
	}

	public function dashboard()
	{

		$this->data['project_'] = $this->common->accessrecord('project', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['project'] = count($this->data['project_']);

		$this->data['task_'] = $this->common->accessrecord('task', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['task'] = count($this->data['task_']);

		$this->data['stipend_'] = $this->common->accessrecord('stipend', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['stipend'] = count($this->data['stipend_']);

		$this->data['trainer_'] = $this->common->accessrecord('trainer', [], ['project_id' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['trainer'] = count($this->data['trainer_']);

		$this->data['employee_'] = $this->common->accessrecord('employer', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['employee'] = count($this->data['employee_']);

		$this->data['facilitator_'] = $this->common->accessrecord('facilitator', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['facilitator'] = count($this->data['facilitator_']);

		$this->data['assessor_'] = $this->common->accessrecord('assessor', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['assessor'] = count($this->data['assessor_']);

		$this->data['internal_moderator_'] = $this->common->accessrecord('moderator', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['internal_moderator'] = count($this->data['internal_moderator_']);

		$this->data['external_moderator_'] = $this->common->accessrecord('external_moderator', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['external_moderator'] = count($this->data['external_moderator_']);

		$this->data['learner_'] = $this->common->accessrecord('learner', [], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['learner'] = count($this->data['learner_']);

		$this->data['marksheet_'] =  $this->common->ProgrammeDirectorLearnerMark($_SESSION['projectmanager']['id'], 'project_manager');
		$this->data['marksheet'] = count($this->data['marksheet_']);

		$this->data['attendance_'] = $this->common->ProgrammeDirectorAttendance($_SESSION['projectmanager']['id'], 'project_manager');
		if (!empty($this->data['attendance_'])) {
			$this->data['attendance'] = count($this->data['attendance_']);
		} else {
			$this->data['attendance'] = 0;
		}

		$this->data['drop_out_'] = $this->common->Projectdropout('drop_out', $_SESSION['projectmanager']['id']);
		if (!empty($this->data['attendance_'])) {
			$this->data['drop_out'] = count($this->data['drop_out_']);
		} else {
			$this->data['drop_out'] = 0;
		}

		$this->data['training'] = $this->common->accessrecord('trainer', ['id, full_name, surname, company_name'], ['project_id' => $_SESSION['projectmanager']['id']], 'result');
		$trainer_report = 0;
		foreach ($this->data['training'] as $key => $value) {
			if ($training = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $value->id], 'result')) {
				$this->data['training'][$key]->total_report = sizeof($training);
				$trainer_report = $trainer_report + sizeof($training);
			} else {
				$this->data['training'][$key]->total_report = 0;
			}
		}
		$this->data['report'] = $trainer_report;

		$this->data['bank_statement_'] = $this->common->accessrecord('finance_bank_details', [], ['project_id' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['bank_statement'] = count($this->data['bank_statement_']);

		$this->data['user_'] = $this->common->accessrecord('sub_user', [], ['type' => 'Project_Manager', 'created_by_id' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['user'] = count($this->data['user_']);

		$this->data['page'] = 'dashboard';

		$this->data['content'] = 'pages/dashboard/dashboard';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	// *********************************************PROJECT*******************************************************************************************************************************************
	public function create_new_project()
	{
		$id = 0;
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$this->data['record'] = $this->common->accessrecord('project', [], ['id' => $id], 'row');
		}
		if ($id === 0) {
			if (empty($_POST)) {
				$this->data['province'] = $this->common->get_province();
				// $this->data['District'] = $this->common->get_district();
				// $this->data['city'] = $this->common->get_city();
				// $this->data['municipality'] = $this->common->get_municipality();

				$this->data['page'] = 'create_new_project';
				$this->data['content'] = 'pages/create_project/create_new_project';
				$this->load->view('project-manager/tamplate', $this->data);
			} else {
				$data =  array(
					'organization' =>  $this->data['organization_id'],
					'project_manager' => $_SESSION['projectmanager']['id'],
					'project_name' => $this->input->post('project_name'),
					'project_type' => $this->input->post('project_type'),
					'province' => $this->input->post('province'),
					'district' => $this->input->post('district'),
					// 'region' => $this->input->post('region'),
					'city' => $this->input->post('city'),
					'planned_start_date' => $this->input->post('planned_start_date'),
					'actual_start_date' => $this->input->post('actual_start_date'),
					'planned_end_date' => $this->input->post('planned_end_date'),
					'actual_end_date' => $this->input->post('actual_end_date'),
					'project_owner_name' => $this->input->post('project_owner_name'),
					'project_owner_surname' => $this->input->post('project_owner_surname'),
					'project_owner_email' => $this->input->post('project_owner_email'),
					'project_owner_mobile' => $this->input->post('mobile_number'),
					'project_owner_landline' => $this->input->post('landline_number'),
					'project_owner_id_number' => $this->input->post('id_number'),
					'project_owner_gender' => $this->input->post('gender'),
					'project_owner_dob' => $this->input->post('dob'),
					'pre_implement_planned_start_date' => $this->input->post('pre_implement_planned_start_date'),
					'pre_implement_actual_start_date' => $this->input->post('pre_implement_actual_start_date'),
					'pre_implement_planned_end_date' => $this->input->post('pre_implement_planned_end_date'),
					'pre_implement_actual_end_date' => $this->input->post('pre_implement_actual_end_date'),
					'implement_planned_start_date' => $this->input->post('implement_planned_start_date'),
					'implement_actual_start_date' => $this->input->post('implement_actual_start_date'),
					'implement_planned_end_date' => $this->input->post('implement_planned_end_date'),
					'implement_actual_end_date' => $this->input->post('implement_actual_end_date'),
					'closeout_planned_start_date' => $this->input->post('closeout_planned_start_date'),
					'closeout_actual_start_date' => $this->input->post('closeout_actual_start_date'),
					'closeout_planned_end_date' => $this->input->post('closeout_planned_end_date'),
					'closeout_actual_end_date' => $this->input->post('closeout_actual_end_date'),
					'municipality' => $this->input->post('municipality')
				);
				if ($res =  $this->common->insertData('project', $data)) {
					$this->session->set_flashdata('success', 'Project Added Successfully');
					redirect('create_projects_list');
				} else {
					$this->session->set_flashdata('error', 'Project Not Added');
					redirect('create_new_project');
				}
			}
		} else {
			if (empty($_POST)) {
				$this->data['District'] = $this->common->get_District();
				$this->data['province'] = $this->common->get_province();
				// $this->data['region'] = $this->common->get_region();
				$this->data['city'] = $this->common->get_city();
				$this->data['province'] = $this->common->get_province();
				$this->data['municipality'] = $this->common->get_municipality();

				$this->data['page'] = 'create_new_project';
				$this->data['content'] = 'pages/create_project/create_new_project';
				$this->load->view('project-manager/tamplate', $this->data);
			} else {
				$data =  array();
				if (!empty($this->data['organization_id'])) {
					$data['organization'] =  $this->data['organization_id'];
				}
				if (!empty($_SESSION['projectmanager']['id'])) {
					$data['project_manager'] =  $_SESSION['projectmanager']['id'];
				}
				if (!empty($this->input->post('project_name'))) {
					$data['project_name'] =  $this->input->post('project_name');
				}
				if (!empty($this->input->post('project_type'))) {
					$data['project_type'] =  $this->input->post('project_type');
				}
				if (!empty($this->input->post('province'))) {
					$data['province'] =  $this->input->post('province');
				}
				if (!empty($this->input->post('province'))) {
					$data['province'] =  $this->input->post('province');
				}
				if (!empty($this->input->post('district'))) {
					$data['district'] =  $this->input->post('district');
				}

				if (!empty($this->input->post('city'))) {
					$data['city'] =  $this->input->post('city');
				}
				if (!empty($this->input->post('planned_start_date'))) {
					$data['planned_start_date'] =  $this->input->post('planned_start_date');
				}
				if (!empty($this->input->post('actual_start_date'))) {
					$data['actual_start_date'] =  $this->input->post('actual_start_date');
				}
				if (!empty($this->input->post('planned_end_date'))) {
					$data['planned_end_date'] =  $this->input->post('planned_end_date');
				}
				if (!empty($this->input->post('actual_end_date'))) {
					$data['actual_end_date'] =  $this->input->post('actual_end_date');
				}
				if (!empty($this->input->post('project_owner_name'))) {
					$data['project_owner_name'] =  $this->input->post('project_owner_name');
				}
				if (!empty($this->input->post('project_owner_surname'))) {
					$data['project_owner_surname'] =  $this->input->post('project_owner_surname');
				}
				if (!empty($this->input->post('project_owner_email'))) {
					$data['project_owner_email'] =  $this->input->post('project_owner_email');
				}
				if (!empty($this->input->post('mobile_number'))) {
					$data['project_owner_mobile'] =  $this->input->post('mobile_number');
				}
				if (!empty($this->input->post('landline_number'))) {
					$data['project_owner_landline'] =  $this->input->post('landline_number');
				}
				if (!empty($this->input->post('id_number'))) {
					$data['project_owner_id_number'] =  $this->input->post('id_number');
				}
				if (!empty($this->input->post('gender'))) {
					$data['project_owner_gender'] =  $this->input->post('gender');
				}
				if (!empty($this->input->post('dob'))) {
					$data['project_owner_dob'] =  $this->input->post('dob');
				}
				if (!empty($this->input->post('pre_implement_planned_start_date'))) {
					$data['pre_implement_planned_start_date'] =  $this->input->post('pre_implement_planned_start_date');
				}
				if (!empty($this->input->post('pre_implement_actual_start_date'))) {
					$data['pre_implement_actual_start_date'] =  $this->input->post('pre_implement_actual_start_date');
				}
				if (!empty($this->input->post('pre_implement_planned_end_date'))) {
					$data['pre_implement_planned_end_date'] =  $this->input->post('pre_implement_planned_end_date');
				}
				if (!empty($this->input->post('pre_implement_actual_end_date'))) {
					$data['pre_implement_actual_end_date'] =  $this->input->post('pre_implement_actual_end_date');
				}
				if (!empty($this->input->post('implement_planned_start_date'))) {
					$data['implement_planned_start_date'] =  $this->input->post('implement_planned_start_date');
				}
				if (!empty($this->input->post('implement_actual_start_date'))) {
					$data['implement_actual_start_date'] =  $this->input->post('implement_actual_start_date');
				}
				if (!empty($this->input->post('implement_planned_end_date'))) {
					$data['implement_planned_end_date'] =  $this->input->post('implement_planned_end_date');
				}
				if (!empty($this->input->post('implement_actual_end_date'))) {
					$data['implement_actual_end_date'] =  $this->input->post('implement_actual_end_date');
				}
				if (!empty($this->input->post('closeout_planned_start_date'))) {
					$data['closeout_planned_start_date'] =  $this->input->post('closeout_planned_start_date');
				}
				if (!empty($this->input->post('closeout_actual_start_date'))) {
					$data['closeout_actual_start_date'] =  $this->input->post('closeout_actual_start_date');
				}
				if (!empty($this->input->post('closeout_planned_end_date'))) {
					$data['closeout_planned_end_date'] =  $this->input->post('closeout_planned_end_date');
				}
				if (!empty($this->input->post('closeout_actual_end_date'))) {
					$data['closeout_actual_end_date'] =  $this->input->post('closeout_actual_end_date');
				}
				if (!empty($this->input->post('municipality'))) {
					$data['municipality'] =  $this->input->post('municipality');
				}
				if ($res =  $this->common->updateData('project', $data, array('id' => $id))) {
					$this->session->set_flashdata('success', 'Project Updated Successfully');
					redirect('create_projects_list');
				} else {
					$this->session->set_flashdata('error', 'Project Not Updated');
					redirect('create_new_project');
				}
			}
		}
	}

	public function create_projects_list()
	{
		$id =  $_SESSION['projectmanager']['id'];


		$this->data['project'] = $this->common->accessrecord('project', [], ['project_manager' => $id, 'organization' => $this->data['organization_id']], 'result_array');

		$this->data['page'] = 'create_projects_list';

		$this->data['content'] = 'pages/create_project/create_projects_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	function project_delete()
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

	public function projectmanager_changestatus()
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

	// *************************************************TASK***************************************************************************************************************************************
	public function create_new_task()
	{
		$id = 0;
		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('task', [], ['id' => $id], 'row');
		}
		if (empty($_POST)) {
			$this->data['project'] = $this->common->accessrecord('project', [], ['project_manager' => $this->session->userdata['projectmanager']['id'], 'organization' => $this->data['organization_id']], 'result_array');

			$this->data['page'] = 'new_task';

			$this->data['content'] = 'pages/new_task/create_new_task';

			$this->load->view('project-manager/tamplate', $this->data);
		} else {

			if ($id != 0) {
				$data  = array();
				if (!empty($this->data['organization_id'])) {
					$data['organization'] = $this->data['organization_id'];
				}
				if (!empty($this->input->post('created_by'))) {
					$data['project_manager'] = $this->input->post('created_by');
				};
				if (!empty($this->input->post('project'))) {
					$data['project'] = $this->input->post('project');
				};
				if (!empty($this->input->post('task_name'))) {
					$data['task_name'] = $this->input->post('task_name');
				};
				if (!empty($this->input->post('task_desc'))) {
					$data['task_desc'] = $this->input->post('task_desc');
				};
				if (!empty($this->input->post('task_owner'))) {

					$data['task_owner'] = $this->input->post('task_owner');
				};
				if (!empty($this->input->post('planned_start_date'))) {

					$data['planned_start_date'] = $this->input->post('planned_start_date');
				};
				if (!empty($this->input->post('planned_end_date'))) {

					$data['planned_end_date'] = $this->input->post('planned_end_date');
				};
				if (!empty($this->input->post('actual_start_date'))) {

					$data['actual_start_date'] = $this->input->post('actual_start_date');
				};
				if (!empty($this->input->post('actual_end_date'))) {

					$data['actual_end_date'] = $this->input->post('actual_end_date');
				};
				if (!empty($this->input->post('task_status'))) {

					$data['task_status'] = $this->input->post('task_status');
				};
				if (!empty($this->input->post('task_status_colour'))) {

					$data['task_status_colour'] = $this->input->post('task_status_colour');
				};

				if ($res =  $this->common->updateData('task', $data, ['id' => $id])) {
					$this->session->set_flashdata('success', 'Task Updated Successfully');
					redirect('Projectmanager-create_new_task_list');
				} else {
					$this->session->set_flashdata('error', 'Task Not Updated');
					redirect('Projectmanager-create_new_task');
				}
			} else {
				$data  = array(
					'organization' => $this->data['organization_id'],
					'project_manager' => $this->input->post('created_by'),
					'project' => $this->input->post('project'),
					'task_name' => $this->input->post('task_name'),
					'task_desc' => $this->input->post('task_desc'),
					'task_owner' => $this->input->post('task_owner'),
					'planned_start_date' => $this->input->post('planned_start_date'),
					'planned_end_date' => $this->input->post('planned_end_date'),
					'actual_start_date' => $this->input->post('actual_start_date'),
					'actual_end_date' => $this->input->post('actual_end_date'),
					'task_status' => $this->input->post('task_status'),
					'task_status_colour' => $this->input->post('task_status_colour')
				);

				if ($res =  $this->common->insertData('task', $data)) {
					$this->session->set_flashdata('success', 'Task Added Successfully');
					redirect('Projectmanager-create_new_task_list');
				} else {
					$this->session->set_flashdata('error', 'Task Not Added');
					redirect('Projectmanager-create_new_task');
				}
			}
		}
	}

	public function create_new_task_list()
	{
		$id =  $_SESSION['projectmanager']['id'];
		// print_r($id);die;
		// $organization_id = $this->data['organization_id']
		$this->data['task'] = $this->common->accessrecord('task', [], ['project_manager' => $id, 'organization' => $this->data['organization_id']], 'result_array');
		// echo $this->db->last_query();die;
		// print_r($this->data['organization_id']);die;

		$this->data['page'] = 'new_task';

		$this->data['content'] = 'pages/new_task/create_new_task_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	// *************************************************STIPEND***************************************************************************************************************************************
	public function create_new_stipend()
	{
		$id = 0;
		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('stipend', [], ['id' => $id], 'row');
		}
		if ($id == 0) {
			if (empty($_POST)) {
				$projectmanagerid = $_SESSION['projectmanager']['id'];
				$condition = array('project_manager' => $projectmanagerid);

				$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

				$this->data['bank_name'] = $this->common->accessrecord('bank', [], [], 'result');

				$this->data['page'] = 'create_new_stipend';

				$this->data['content'] = 'pages/stipend_list/create_new_stipend';

				$this->load->view('project-manager/tamplate', $this->data);
			} else {


				$data = array(
					'organization' => $this->data['organization_id'],
					'learner_name' => $this->input->post('learner_name'),
					'learner_surname' => $this->input->post('learner_surname'),
					'id_number' => $this->input->post('learner_id'),
					'learnship_id' => $this->input->post('learnship_id'),
					'learnership_subtype' => $this->input->post('learnership_sub_type_ids'),
					'class' => $this->input->post('class'),
					'bank_name' => $this->input->post('bank_name'),
					'bank_branch_name' => $this->input->post('bank_branch_name'),
					'account_type' => $this->input->post('account_type'),
					'branch_code' => $this->input->post('branch_code'),
					'account_number' => $this->input->post('account_number'),
					'total_attendence' => $this->input->post('total_attend'),
					'amount' => $this->input->post('paid_amount'),
					'project_manager' => $_SESSION['projectmanager']['id'],
					'date' =>date('Y-m-d H:i:s')

				);
				if ($res =  $this->common->insertData('stipend', $data)) {
					$this->session->set_flashdata('success', 'Stipend Added Successfully');
					redirect('projectmanager-create_stipend_list');
				} else {
					$this->session->set_flashdata('error', 'Stipend Not Added');
					redirect('projectmanager-create_new_stipend');
				}
			}
		} else {
			if (empty($_POST)) {
				$projectmanagerid = $_SESSION['projectmanager']['id'];
				$condition = array('project_manager' => $projectmanagerid);

				$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');

				$this->data['bank_name'] = $this->common->accessrecord('bank', [], [], 'result');

				$this->data['page'] = 'create_new_stipend';

				$this->data['content'] = 'pages/stipend_list/create_new_stipend';

				$this->load->view('project-manager/tamplate', $this->data);
			} else {


				$data = array();
				if (!empty($this->data['organization_id'])) {
					$data['organization'] = $this->data['organization_id'];
				}
				if (!empty($this->input->post('learner_name'))) {
					$data['learner_name'] = $this->input->post('learner_name');
				}
				if (!empty($this->input->post('learner_surname'))) {
					$data['learner_surname'] = $this->input->post('learner_surname');
				}
				if (!empty($this->input->post('learner_id'))) {
					$data['id_number'] = $this->input->post('learner_id');
				}
				if (!empty($this->input->post('learnership_sub_type'))) {

					$data['learnership_subtype'] = $this->input->post('learnership_sub_type_id');
				}
				if (!empty($this->input->post('learnship_id'))) {
					$data['learnship_id']  = $this->input->post('learnship_id');
				}
				if (!empty($this->input->post('class'))) {
					$data['class'] = $this->input->post('class');
				}
				if (!empty($this->input->post('bank_name'))) {
					$data['bank_name'] = $this->input->post('bank_name');
				}
				if (!empty($this->input->post('bank_branch_name'))) {
					$data['bank_branch_name'] = $this->input->post('bank_branch_name');
				}
				if (!empty($this->input->post('account_type'))) {
					$data['account_type'] = $this->input->post('account_type');
				}
				if (!empty($this->input->post('branch_code'))) {
					$data['branch_code'] = $this->input->post('branch_code');
				}
				if (!empty($this->input->post('account_number'))) {
					$data['account_number'] = $this->input->post('account_number');
				}
				if (!empty($this->input->post('total_attend'))) {
					$data['total_attendence'] = $this->input->post('total_attend');
				}
				if (!empty($this->input->post('paid_amount'))) {
					$data['amount'] = $this->input->post('paid_amount');
				}
				if (!empty($_SESSION['projectmanager']['id'])) {
					$data['project_manager'] = $_SESSION['projectmanager']['id'];
				}


				if ($res =  $this->common->updateData('stipend', $data, ['id' => $id])) {
					$this->session->set_flashdata('success', 'Stipend Updated Successfully');
					redirect('projectmanager-create_stipend_list');
				} else {
					$this->session->set_flashdata('error', 'Stipend Not Updated');
					redirect('projectmanager-create_new_stipend');
				}
			}
		}
	}

	public function create_stipend_list()
	{
		$id = $_SESSION['projectmanager']['id'];

		$this->data['stipend'] = $this->common->accessrecord('stipend', [], array('project_manager' => $id), 'result_array');


		$this->data['page'] = 'create_stipend_list';

		$this->data['content'] = 'pages/stipend_list/create_stipend_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	// *************************************************TRAINING PROVIDER***************************************************************************************************************************************
	public function projectmanager_create_training()
	{

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->one_trining($id);
		}

		if ($_POST) {

			$data['organization'] = $this->data['organization_id'];

			$data['company_name'] = $this->input->post('company_name');

			$data['full_name'] = $this->input->post('full_name');

			$data['surname'] = $this->input->post('surname');

			$data['email'] = $this->input->post('email');

			$data['mobile'] = $this->input->post('mobile');

			$data['landline'] = $this->input->post('landline');

			$data['project_id'] = $_SESSION['projectmanager']['id'];

			$data['province'] = $this->input->post('province');

			$data['Suburb'] = $this->input->post('Suburb');

			$data['Street_name'] = $this->input->post('Street_name');

			$data['Street_number'] = $this->input->post('Street_number');

			$district = $this->input->post('district');

			$District = $this->common->one_District($district);

			$data['district'] = $District->name;

			// $region = $this->input->post('region');

			// $regiondata = $this->common->one_region($region);

			// $data['region'] = $regiondata->region;

			$city = $this->input->post('city');

			$citydata = $this->common->one_city($city);

			$data['city'] = $citydata->city;

			$municipality = $this->input->post('municipality');

			$municipalitydata = $this->common->one_municipality($municipality);

			$data['municipality'] = $municipalitydata->municipality;

			if ($id != 0) {

				$password = $_POST['password'];

				if ($trainer = $this->common->accessrecord('trainer', [], ['id' => $id], 'row')) {

					$old_password = $trainer->password;

					if ($old_password == $password) {

						$data['password'] = $old_password;
					} else {

						$data['password'] = sha1($_POST['password']);
					}
				} else {

					$data['password'] = sha1($_POST['password']);
				}

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

				$data['user_type'] = 2;

				$this->common->updateData('trainer', $data, array('id' => $id));

				$this->session->set_flashdata('success', 'Training Updated Succesfully');

				redirect('projectmanagertraining-list');
			} else {

				if (!empty($_FILES['attach_document']['name'])) {

					$path = "./uploads/training/attach_documents/";

					$image = $this->MultipleImageUpload($_FILES['attach_document'], $path, 'attach_document');

					$gallery = "";

					foreach ($image as $value) {

						$gallery .= $value . ",";
					}

					$data['attach_documents'] = rtrim($gallery, ',');
				} else {

					$data['attach_documents'] = "";
				}

				$data['password'] = sha1($_POST['password']);

				$data['user_type'] = 2;

				$training = $this->common->insertData('trainer', $data);

				$this->session->set_flashdata('success', 'Add Training Successfully');

				redirect('projectmanagertraining-list');
			}
		}

		$this->data['District'] = $this->common->get_District();

		$this->data['province'] = $this->common->get_province();

		// $this->data['region'] = $this->common->get_region();

		$this->data['city'] = $this->common->get_city();
		$this->data['municipality'] = $this->common->get_municipality();

		$this->data['project'] = $this->common->accessrecord('project_manager', [], ['id' => projectmanagerid()], 'row');

		$this->data['page'] = 'create_training';

		$this->data['content'] = 'pages/training/create_training';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function projectmanager_training_list()
	{

		$id = $_SESSION['projectmanager']['id'];

		$this->data['training'] = $this->common->accessrecord('trainer', [], ['project_id' => $id], 'result');
		foreach ($this->data['training'] as $key => $value) {
			//$trainer_report = count($value);
			if ($attendance = $this->common->accessrecord('attendance', [], ['training_provider' => $value->company_name], 'result')) {
				$this->data['training'][$key]->total_attendance = sizeof($attendance);
			} else {
				$this->data['training'][$key]->total_attendance = 0;
			}
			if ($marksheet = $this->common->accessrecord('learner_marks', [], ['training_provider' => $value->company_name], 'result')) {
				$this->data['training'][$key]->total_marksheet = sizeof($marksheet);
			} else {
				$this->data['training'][$key]->total_marksheet = 0;
			}
		}
		$this->data['page'] = 'training_list';

		$this->data['content'] = 'pages/training/training_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}
	// *************************************************EMPLOYER***************************************************************************************************************************************
	public function create_employer()
	{

		if (isset($_SESSION['projectmanager']['id'])) {

			$trainer_id = $_SESSION['projectmanager']['id'];
		} else {

			$trainer_id = '';
		}

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('employer', [], ['id' => $id], 'row');
		}

		if ($_POST) {

			if ($id != 0) {
				$data['organization'] = $this->data['organization_id'];

				$data['employer_province'] = $this->input->post('employer_province');

				$employer_district = $this->input->post('employer_district');

				$employer_District = $this->common->one_District($employer_district);

				$data['employer_district'] = $employer_District->name;

				// $employer_region = $this->input->post('employer_region');

				// $employer_regiondata = $this->common->one_region($employer_region);

				// $data['employer_region'] = $employer_regiondata->region;

				$employer_city = $this->input->post('employer_city');

				$employer_citydata = $this->common->one_city($employer_city);

				$data['employer_city'] = $employer_citydata->city;

				$municipality = $this->input->post('municipality');

				$municipalitydata = $this->common->one_municipality($municipality);

				$data['municipality'] = $municipalitydata->municipality;

				$data['project_manager'] = $trainer_id;

				$data['created_by'] = $trainer_id;

				$data['user_type'] = 2;

				// $data['learner_place_of_employment'] = $this->input->post('learner_place_of_employment');

				$data['employer_name'] = $this->input->post('employer_name');

				$data['employer_contact_number'] = $this->input->post('employer_contact_number');

				$data['employer_contact_email'] = $this->input->post('employer_contact_email');

				$data['employer_Suburb'] = $this->input->post('employer_Suburb');

				$data['employer_Street_name'] = $this->input->post('employer_Street_name');

				$data['employer_Street_number'] = $this->input->post('employer_Street_number');

				$data['contact_person_name'] = $this->input->post('contact_person_name');

				$data['contact_person_surname'] = $this->input->post('contact_person_surname');

				$data['contact_person_contact_no'] = $this->input->post('contact_person_contact_no');

				if ($this->common->updateData('employer', $data, array('id' => $id))) {

					$this->session->set_flashdata('success', 'Learner Updated Succesfully');

					redirect('Projectmanager-employer-list');
				} else {

					$this->session->set_flashdata('success', 'Learner Updated Succesfully');

					redirect('Projectmanager-employer-list');
				}
			} else {
				$data['organization'] = $this->data['organization_id'];

				$data['employer_province'] = $this->input->post('employer_province');

				$employer_district = $this->input->post('employer_district');

				$employer_District = $this->common->one_District($employer_district);

				$data['employer_district'] = $employer_District->name;

				// $employer_region = $this->input->post('employer_region');

				// $employer_regiondata = $this->common->one_region($employer_region);

				// $data['employer_region'] = $employer_regiondata->region;

				$employer_city = $this->input->post('employer_city');

				$employer_citydata = $this->common->one_city($employer_city);

				$data['employer_city'] = $employer_citydata->city;

				$data['project_manager'] = $trainer_id;

				$data['created_by'] = $trainer_id;

				$data['user_type'] = 2;

				$data['employer_name'] = $this->input->post('employer_name');

				$data['employer_contact_number'] = $this->input->post('employer_contact_number');

				$data['employer_contact_email'] = $this->input->post('employer_contact_email');

				$data['employer_Suburb'] = $this->input->post('employer_Suburb');

				$data['employer_Street_name'] = $this->input->post('employer_Street_name');

				$data['employer_Street_number'] = $this->input->post('employer_Street_number');

				$data['contact_person_name'] = $this->input->post('contact_person_name');

				$data['contact_person_surname'] = $this->input->post('contact_person_surname');

				$data['contact_person_contact_no'] = $this->input->post('contact_person_contact_no');

				// print_r($data); die;

				if ($this->common->insertData('employer', $data)) {

					$this->session->set_flashdata('success', 'Add Employer Successfully');

					redirect('Projectmanager-employer-list');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('Projectmanager-create-employer');
				}
			}
		}

		$this->data['District'] = $this->common->get_District();

		$this->data['province'] = $this->common->get_province();

		// $this->data['region'] = $this->common->get_region();

		$this->data['city'] = $this->common->get_city();

		$this->data['municipality'] = $this->common->get_municipality();


		// echo "<pre>";

		// print_r($this->data); die;

		$this->data['page'] = 'create_employer';

		$this->data['content'] = 'pages/employer/create_employer';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function employer_list()
	{

		if (isset($_SESSION['projectmanager']['id'])) {

			$trainer_id = $_SESSION['projectmanager']['id'];
		} else {

			$trainer_id = '';
		}

		$this->data['employers'] = $this->common->accessrecord('employer', [], ['project_manager' => $trainer_id,], 'result_array');

		$this->data['page'] = 'employer_list';

		$this->data['content'] = 'pages/employer/employer_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	// *************************************************BANk STATEMENT***************************************************************************************************************************************

	public function create_bank()
	{

		$project_id = $_SESSION['projectmanager']['id'];

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('finance_bank_details', [], ['id' => $id], 'row');
		}

		if ($_POST) {

			if ($id != 0) {

				if (!empty($_FILES['upload_bank_statements']['name'])) {

					$upload_bank_statement['upload_bank_statement'] = $this->singlefileupload('upload_bank_statements', './uploads/bank/upload_bank_statement/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
				} else {

					$uploadbankstatement = $this->common->accessrecord('finance_bank_details', [], ['id' => $id], 'row');

					$upload_bank_statement['upload_bank_statement'] = $uploadbankstatement->upload_bank_statement;
				}

				$data = array(

					'project_manager_name' => $this->input->post('project_manager_name'),

					'project_id' => $project_id,

					'quarter' => $this->input->post('quarter'),

					'project_name' => $this->input->post('project_name'),

					'bank_start_date' => $this->input->post('bank_start_date'),

					'bank_end_date' => $this->input->post('bank_end_date'),

					'upload_bank_statement' => $upload_bank_statement['upload_bank_statement'],

					'created_by' => $project_id,

					'user_type' => 2,

				);

				if ($this->common->updateData('finance_bank_details', $data, array('id' => $id))) {

					$this->session->set_flashdata('success', 'Bank Statement Updated Succesfully');

					redirect('projectmanager-bank-list');
				} else {

					$this->session->set_flashdata('success', 'Bank Statement Updated Succesfully');

					redirect('projectmanager-bank-list');
				}
			} else {

				if (!empty($_FILES['upload_bank_statement']['name'])) {

					$upload_bank_statement['upload_bank_statement'] = $this->singlefileupload('upload_bank_statement', './uploads/bank/upload_bank_statement/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
				}

				$data = array(

					'project_manager_name' => $this->input->post('project_manager_name'),

					'project_id' => $project_id,

					'quarter' => $this->input->post('quarter'),

					'project_name' => $this->input->post('project_name'),

					'bank_start_date' => $this->input->post('bank_start_date'),

					'bank_end_date' => $this->input->post('bank_end_date'),

					'upload_bank_statement' => $upload_bank_statement['upload_bank_statement'],

					'created_by' => $project_id,

					'user_type' => 2,

				);

				if ($this->common->insertData('finance_bank_details', $data)) {

					$this->session->set_flashdata('success', 'Bank Statement Insert Successful');

					redirect('projectmanager-bank-list');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('projectmanager-create-bank');
				}
			}

			if ($id != 0) {

				$this->data['record'] = $this->common->accessrecord('finance_bank_details', [], ['id' => $id], 'row');
			}
		}

		$this->data['projectmanager'] = $this->common->accessrecord('project_manager', [], ['id' => $project_id], 'row');

		$this->data['project'] = $this->common->accessrecord('project', [], ['project_manager' => $project_id], 'result_array');

		$this->data['page'] = 'create_bank';

		$this->data['content'] = 'pages/bank/create_bank';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function bank_list()
	{
		$project_id = $_SESSION['projectmanager']['id'];
		$this->data['record'] = $this->common->accessrecord('finance_bank_details', [], ['project_id' => $project_id], 'result');
		$this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/bank/bank_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	// *************************************************MESSAGE***************************************************************************************************************************************
	public function create_message()
	{

		$this->data['page'] = 'create_message';

		$this->data['content'] = 'pages/message/create_message';

		$this->load->view('project-manager/tamplate', $this->data);
	}
	// ************************************************************message*********************************************************


	public function sendMassage()
	{
		if (empty($_POST)) {
			$this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'projectmanager'], 'result');
			// $this->data['organisation'] = $this->common->accessrecord('organisation', ['*'], array(), 'result');
			$this->data['page'] = 'send_massage';
			$this->data['content'] = 'pages/massage/send_massage';
			$this->load->view('project-manager/tamplate', $this->data);
		} else {

			$receiverarr = $_POST['receiver'];
			$receiver = implode(",", $receiverarr);

			if (!empty($_FILES['attachment']['name'])) {

				$attachment = $this->singlefileupload('attachment', './uploads/messageattachment/', 'gif|jpg|png|pdf|doc|docx');
			} else {
				$attachment = "";
			}
			$data = array(
				'sender_id' => $_SESSION['projectmanager']['id'],
				'sender_type' => 'projectmanager',
				'receiver_id' => $receiver,
				'receiver_type' => $_POST['receiver_type'],
				'subject' => $_POST['subject'],
				'message' => $_POST['message'],
				'attachment' => $attachment
			);
			$datau = $this->common->insertData('message', $data);
			$this->session->set_flashdata('success', 'Message Sent Successfully');
			redirect('Projectmanager-sendMassage');
		}
	}

	public function sendBulkMessage()
	{
		if (empty($_POST)) {
			$this->data['page'] = 'bulk_message';
			$this->data['content'] = 'pages/bulk/bulk_message';
			$this->load->view('project-manager/tamplate', $this->data);
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
				redirect('projectmanager-sendBulkMassage');
			} else {
				$this->session->set_flashdata('success', "Messages sent Successfully");
				redirect('projectmanager-sendBulkMassage');
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


	public function get_receiver()
	{
		$type = $this->input->post('value');
		$data = array();
		if ($type == 'superadmin') {
			$data[0]['id'] = 'superadmin';
			$data[0]['name'] = 'superadmin';
		} elseif ($type == 'organization') {
			$rece = $this->common->accessrecord('organisation', ['*'], ['id' => $this->data['organization_id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'projectmanager') {
			$rece = $this->common->accessrecord('project_manager', ['*'], ['id' => $_SESSION['projectmanager']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'trainer') {
			$rece = $this->common->accessrecord('trainer', ['*'], ['project_id' => $_SESSION['projectmanager']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['id'] = $recev->id;
				$data[$key]['name'] = $recev->full_name . " " . $recev->surname;
			}
		} elseif ($type == 'facilitator') {
			$rece = $this->common->accessrecord('facilitator', ['*'], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');

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
		} elseif ($type == 'organization') {
			$rece = $this->common->accessrecord('organisation', ['*'], ['id' => $this->data['organization_id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile_number;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		} elseif ($type == 'trainer') {
			$rece = $this->common->accessrecord('trainer', ['*'], ['project_id' => $_SESSION['projectmanager']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile;
				$data[$key]['name'] = $recev->full_name . " " . $recev->surname;
			}
		} elseif ($type == 'facilitator') {
			$rece = $this->common->accessrecord('facilitator', ['*'], ['project_manager' => $_SESSION['projectmanager']['id']], 'result');

			foreach ($rece as $key => $recev) {
				$data[$key]['mobile_number'] = $recev->mobile;
				$data[$key]['name'] = $recev->fullname . " " . $recev->surname;
			}
		}
		echo json_encode($data);
	}


	public function inbox()
	{
		$this->data['received'] = $this->common->accessrecord('message', ['*'], ['receiver_type' => 'projectmanager', 'receiver_id' => $_SESSION['projectmanager']['id']], 'result');
		$this->data['page'] = 'received_massage';
		$this->data['content'] = 'pages/massage/received_messages';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function sentbox()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'projectmanager'], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function sentboxview($id)
	{
		$this->data['viewsent'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'sentboxview';
		$this->data['content'] = 'pages/massage/sentboxview';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function inboxview($id)
	{
		$this->data['viewreceived'] = $this->common->accessrecord('message', ['*'], ['id' => $id], 'row');
		$this->data['page'] = 'inboxview';
		$this->data['content'] = 'pages/massage/inboxview';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function trash()
	{
		$this->data['sent'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization'], 'result');
		$this->data['page'] = 'sent_massage';
		$this->data['content'] = 'pages/massage/sent_massage';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function important()
	{
		$this->data['important'] = $this->common->accessrecord('message', ['*'], ['sender_type' => 'organization'], 'result');
		$this->data['page'] = 'important_massage';
		$this->data['content'] = 'pages/massage/important';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	// **************************************************LOCATIONS**************************************************************************************************************************************

	// public function change_leaner_status()
	// {

	// 	$reason = $this->input->post('text');

	// 	$learner = $this->input->post('learner');

	// 	$tablenm_id = $this->input->post('tablenm_id');

	// 	$explode = explode('.', $tablenm_id);

	// 	$tablenm = $explode[0];

	// 	$id = $explode[1];

	// 	$data = $this->common->updateData($tablenm, ['learner_accepted_training' => $learner, 'reason' => $reason], ['id' => $id]);

	// 	if ($data) {

	// 		echo json_encode(array('status' => 200));
	// 	}
	// }

	public function projectmanager_getdestrict()
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

	// public function projectmanager_getregion()
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

	public function projectmanager_getcity()
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

	public function projectmanager_getmunicipality()
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
	// ****************************************************************************************************************************************************************************************

	public function  projectmanager_acreditations_file_delete()
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


	// ***************************************************OTHER*************************************************************************************************************************************
	public function editprofile()
	{

		$id = $_SESSION['projectmanager']['id'];

		if ($_POST) {
			if (!empty($_FILES['profile_pic']['name'])) {

				$profile_pic = $this->singlefileupload('profile_pic', './uploads/project/projectmanager_pic/', 'gif|jpg|png|xls|doc|docx|jpeg');
			} else {

				$profile_picdata = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$profile_pic = $profile_picdata->profile_pic;
			}

			if (!empty($_FILES['tax_clearances']['name'])) {

				$tax_clearances['tax_clearances'] = $this->singlefileupload('tax_clearances', './uploads/project/tax_clearance/', 'gif|jpg|png|xls|doc|docx|jpeg');
			} else {

				$tax_clearance = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$tax_clearances['tax_clearances'] = $tax_clearance->tax_clearance;
			}

			if (!empty($_FILES['moderator_accreditations']['name'])) {

				$moderator_accreditations['moderator_accreditations'] = $this->singlefileupload('moderator_accreditations', './uploads/project/moderator_accreditations/', 'gif|jpg|png|xls|doc|docx|jpeg');
			} else {

				$moderator = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$moderator_accreditations['moderator_accreditations'] = $moderator->moderator_accreditations;
			}

			if (!empty($_FILES['assesor_acreditation']['name'])) {

				$assesor_acreditations['assesor_acreditations'] = $this->singlefileupload('assesor_acreditation', './uploads/project/assesor_acreditations/', 'gif|jpg|png|xls|doc|docx|jpeg');
			} else {

				$assesor = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$assesor_acreditations['assesor_acreditations'] = $assesor->assesor_acreditations;
			}

			if (!empty($_FILES['seta_creditiations']['name'])) {

				$seta_creditiations['seta_creditiations'] = $this->singlefileupload('seta_creditiations', './uploads/project/seta_creditiations/', 'gif|jpg|png|xls|doc|docx|jpeg');
			} else {

				$seta = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$seta_creditiations['seta_creditiations'] = $seta->seta_creditiations;
			}

			if (!empty($_FILES['company_documents']['name'])) {

				$path = "./uploads/project/company_documents/";

				$image = $this->MultipleImageUpload($_FILES['company_documents'], $path, 'company_documents');

				$company_documents_regi = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$company_image = $company_documents_regi->company_registration_documents;

				$gallery = "";

				foreach ($image as $value) {

					$gallery .= $value . ",";
				}

				$company_files = rtrim($gallery, ',');

				if (!empty($company_files)) {

					if (!empty($company_image)) {

						$company_documents['company_documents'] = $company_image . ',' . $company_files;
					} else {

						$company_documents['company_documents'] = $company_files;
					}
				} else {

					$company_documents['company_documents'] = $company_image;
				}
			} else {

				$company_documents_regi = $this->common->accessrecord('project_manager', [], ['id' => $id], 'row');

				$company_documents['company_documents'] = $company_documents_regi->company_registration_documents;
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

				'project_manager' => $this->input->post('project_manager'),

				// 'project_name' => $this->input->post('project_name'),

				// 'programme_director' => $this->input->post('programme_director'),

				//'project_start_date'=> $this->input->post('project_start_date'),

				// 'project_end_date' => $this->input->post('project_end_date'),

				// 'q1_start_date' => $this->input->post('q1_start_date'),

				// 'q1_end_date' => $this->input->post('q1_end_date'),

				// 'q2_start_date' => $this->input->post('q2_start_date'),

				// 'q2_end_date' => $this->input->post('q2_end_date'),

				// 'q3_start_date' => $this->input->post('q3_start_date'),

				// 'q3_end_date' => $this->input->post('q3_end_date'),

				// 'q4_start_date' => $this->input->post('q4_start_date'),

				// 'q4_end_date' => $this->input->post('q4_end_date'),

				'email_address' => $this->input->post('email_address'),

				'landline_number' => $this->input->post('landline_number'),

				'mobile_number' => $this->input->post('mobile_number'),

				'tax_clearance' => $tax_clearances['tax_clearances'],

				'company_registration_documents' => $company_documents['company_documents'],

				'moderator_accreditations' => $moderator_accreditations['moderator_accreditations'],

				'assesor_acreditations' => $assesor_acreditations['assesor_acreditations'],

				'seta_creditiations' => $seta_creditiations['seta_creditiations'],

				'profile_pic' => $profile_pic,

				'Suburb' => $this->input->post('Suburb'),

				'Street_name' => $this->input->post('Street_name'),

				'Street_number' => $this->input->post('Street_number'),

				'fullname' => $this->input->post('fullname'),

				'surname' => $this->input->post('surname'),

				'district' => $district_name,

				// 'region' => $region_name,

				'city' => $city_name,

				'province' => $this->input->post('province'),

			);

			if ($this->common->updateData('project_manager', $data, array('id' => $id))) {

				$this->session->set_flashdata('success', 'Project Updated Succesfully');

				redirect('projectmanager-editprofile');
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('projectmanager-editprofile');
			}
		} else {

			$this->data['record'] = $this->common->accessrecord('project_manager', [], ['id' => projectmanagerid()], 'row');

			$this->data['programme_director'] = $this->common->accessrecord('programme_director', [], [], 'result');

			$this->data['District'] = $this->common->get_District();

			$this->data['province'] = $this->common->get_province();

			// $this->data['region'] = $this->common->get_region();

			$this->data['city'] = $this->common->get_city();

			$this->data['municipality'] = $this->common->get_municipality();

			$this->data['page'] = 'editprofile';

			$this->data['content'] = 'pages/myprofile/editprofile';

			$this->load->view('project-manager/tamplate', $this->data);
		}
	}

	function deletedata()
	{

		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
	}

	public function changepassword()
	{

		$this->data['page'] = 'changepassword';

		$this->data['content'] = 'changepassword';

		if ($_POST) {
			if (isset($_SESSION['projectmanager']['id'])) {

				$id = $_SESSION['projectmanager']['id'];
			} else {

				$id = '';
			}


			// print_r($id);die;
			$oldpassword = $this->input->post('oldpassword');
			// print_r($oldpassword);die;

			$password = $this->input->post('password');

			$datau = $this->common->accessrecord(TBL_Project_Manager, ['id, password'], array('id' => $id), 'row');
			// print_r($datau);die;
			if ($datau->password == sha1($oldpassword)) {

				$this->common->updateData(TBL_Project_Manager, array('password' => sha1($password)), array('id' => $id));

				$this->session->set_flashdata('success', 'Your Password Successfully Update');

				redirect('projectmanager-changepassword');
			} else {

				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function logout()
	{

		$this->session->unset_userdata(projectmanagerid());

		$this->session->sess_destroy();

		redirect('projectmanager');
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

	public function get_learnername()
	{

		if (!empty($this->input->post('value'))) {
			$id = $this->input->post('value');
		} else {
			$id = 0;
		}
$record = $this->common->get_learnername($id);

// $record=  $this->common->accessrecordLearnerjoin($id);

		// $record = $this->common->accessrecord('learner', [], ['id_number' => $id], 'result');


		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'Learner not available of this id');
		}

		echo json_encode($data);
	}



	public function forgot_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {

			echo "failed";
		} else {

			extract($_POST);

			$user = $this->common->accessrecord(TBL_Project_Manager, ['*'], array('email' => $email), 'row');

			if (!empty($user)) {

				$getId = $user->id;

				$newpas = rand(6, 1000000);

				$this->common->updateData(TBL_Project_Manager, array('password' => sha1($newpas)), array('email_address' => $email));

				$message = 'Your password is successfully updated!! <br>your new password is - ' . $newpas;

				if ($html = $this->Email_model->send_email_to_admin($email, $message)) {

					$this->load->library('email');

					$this->email->from('slashtechnologies007@gmail.com', 'LEARNING MANEGMENT');

					$this->email->to($email);

					$this->email->subject('Password is successfully updated');

					$this->email->set_mailtype("html");

					$this->email->message($html);

					if ($this->email->send()) {

						echo json_encode(array('status' => 'success', 'msg' => 'Your password is successfully updated check your email for current password !!'));
					} else {

						echo json_encode(array('status' => 'error', 'msg' => 'Your request email is not currect!!'));
					}
				}
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

	public function get_learnerclassname()
	{

		if (isset($_SESSION['projectmanager']['id'])) {

			$trainer_id = $_SESSION['projectmanager']['id'];
		} else {

			$trainer_id = '';
		}

		$id = $this->input->post('value');

		$record = $this->common->accessrecord('class_name', [], ['learnership_sub_type_id' => $id, 'project_manager' => $trainer_id], 'result');

		if (!empty($record)) {

			$data = $record;
		} else {

			$data = array('error' => 'classname list not available in this learnershipsubtype');
		}

		echo json_encode($data);
	}
	// ****************************************************************************************************************************************************************************************

	public function list_learner()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['learner']  = $this->common->projectmangertrainerIdWise($projcetid, 'learner');

		$this->data['page'] = 'learner_list';

		$this->data['content'] = 'pages/learner/learner_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function facilitator_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['facilitator'] = $this->common->projectmangertrainerIdWise($projcetid, 'facilitator');

		$this->data['page'] = 'facilitator_list';

		$this->data['content'] = 'pages/facilitator/facilitator_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	//
	public function assessor_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['assessor'] = $this->common->projectmangertrainerIdWise($projcetid, 'assessor');

		$this->data['page'] = 'assessor_list';

		$this->data['content'] = 'pages/assessor/assessor_list';

		$this->load->view('project-manager/tamplate', $this->data);
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

	// 				'user_type' => 2,

	// 				'city' => $city_name,

	// 				'province' => $this->input->post('province'),

	// 			);

	// 			if ($this->common->updateData('moderator', $data, ['id' => $_GET['id']])) {

	// 				$this->session->set_flashdata('success', 'Moderator Update Successfully');

	// 				redirect('projectmanager-moderator-list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('projectmanager-moderator-list');
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

	// 				'user_type' => 2,

	// 				'province' => $this->input->post('province'),

	// 			);

	// 			if ($this->common->insertData('moderator', $data)) {

	// 				$this->session->set_flashdata('success', 'Moderator Insert Successful');

	// 				redirect('projectmanager-moderator-list');
	// 			} else {

	// 				$this->session->set_flashdata('error', 'Please Try Again');

	// 				redirect('projectmanager-create-moderator');
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

	// 	$projcetid = $_SESSION['projectmanager']['id'];

	// 	$this->data['training'] = $this->common->accessrecord('trainer', [], ['project_id' => $projcetid], 'result');

	// 	$this->data['page'] = 'create_moderator';

	// 	$this->data['content'] = 'pages/moderator/create_moderator';

	// 	$this->load->view('project-manager/tamplate', $this->data);
	// }

	public function moderator_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['moderator'] = $this->common->projectmangertrainerIdWise($projcetid, 'moderator');

		$this->data['page'] = 'moderator_list';

		$this->data['content'] = 'pages/moderator/moderator_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}


	public function external_moderator_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['moderator'] = $this->common->projectmangertrainerIdWise($projcetid, 'external_moderator');

		$this->data['page'] = 'external_moderator_list';

		$this->data['content'] = 'pages/moderator/external_moderator_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}


	public function projectmanager_report_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['record'] = $this->common->porjectmanagerReportdata($projcetid);

		$this->data['page'] = 'projectmanagar_report_list';

		$this->data['content'] = 'pages/report/projectmanagar_report_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	public function project_manager_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->accessrecord('project_manager', [], ['id' => $id], 'result');

		$this->data['page'] = 'project_manager_view';

		$this->data['content'] = 'pages/report/project_manager_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function training_provider_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] =  $this->common->accessrecord('trainer', [], ['project_id' => $id], 'result');

		$this->data['page'] = 'training_provider_view';

		$this->data['content'] = 'pages/report/training_provider_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function monderator_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->projectmangertrainerIdWise($id, 'moderator');

		$this->data['page'] = 'monderator_view';

		$this->data['content'] = 'pages/report/monderator_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function assessor_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->projectmangertrainerIdWise($id, 'assessor');

		$this->data['page'] = 'assessor_view';

		$this->data['content'] = 'pages/report/assessor_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function facilitator_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->projectmangertrainerIdWise($id, 'facilitator');

		$this->data['page'] = 'facilitator_view';

		$this->data['content'] = 'pages/report/facilitator_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function learner_view()
	{

		$id = $this->input->get('id');

		$this->data['record'] = $this->common->projectmangertrainerIdWise($id, 'learner');

		$this->data['page'] = 'learner_view';

		$this->data['content'] = 'pages/report/learner_view';

		$this->load->view('project-manager/tamplate', $this->data);
	}

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

			redirect('projectmanager-import-learner');
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

		$makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email', 'IdNumber' => 'IdNumber', 'SETA' => 'SETA', 'PrimaryMobileNumber' => 'PrimaryMobileNumber', 'SecondaryMobileNumber' => 'SecondaryMobileNumber', 'Gender' => 'Gender', 'LearnershipSubType' => 'LearnershipSubType', 'Password' => 'Password', 'Province' => 'Province', 'District' => 'District', 'City' => 'City', 'Suburb' => 'Suburb', 'StreetName' => 'StreetName', 'StreetNumber' => 'StreetNumber', 'Assessment' => 'Assessment', 'IsDisable' => 'IsDisable', 'UifBenefits' => 'UifBenefits', 'LearnerAcceptedforTraining' => 'LearnerAcceptedforTraining', 'ClassName' => 'ClassName');

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

				$trining_provider = $SheetDataKey['TrainingProviderName'];

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

				// $region = $SheetDataKey['Region'];

				$Suburb = $SheetDataKey['Suburb'];

				$Street_name = $SheetDataKey['StreetName'];

				$Street_number = $SheetDataKey['StreetNumber'];

				$password = $SheetDataKey['Password'];

				$gender = $SheetDataKey['Gender'];

				$trining_provider = filter_var(trim($allDataInSheet[$i][$trining_provider]), FILTER_SANITIZE_STRING);

				if (empty($trining_provider)) {

					$this->session->set_flashdata('error', 'Please Enter your training provider');

					redirect('projectmanager-import-learner');
				}

				$first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);

				if (empty($first_name)) {

					$this->session->set_flashdata('error', 'Please enter your full name');

					redirect('projectmanager-import-learner');
				}

				//$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);

				$surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);

				if (empty($surname)) {

					$this->session->set_flashdata('error', 'Please enter your surname');

					redirect('projectmanager-import-learner');
				}

				$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);

				if (empty($email)) {

					$this->session->set_flashdata('error', 'Please enter your email');

					redirect('projectmanager-import-learner');
				}

				$mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);

				if (empty($mobile)) {

					$this->session->set_flashdata('error', 'Please enter your  primary cellphone number');

					redirect('projectmanager-import-learner');
				}

				$mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);

				if (empty($mobile_number)) {

					$this->session->set_flashdata('error', 'Please enter your second cellphone number');

					redirect('projectmanager-import-learner');
				}

				$assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);

				if (empty($assessment)) {

					$this->session->set_flashdata('error', 'Please enter your assessment status');

					redirect('projectmanager-import-learner');
				}

				$disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);

				if (empty($disable)) {

					$this->session->set_flashdata('error', 'Please enter your disabled');

					redirect('projectmanager-import-learner');
				}

				$utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);

				if (empty($utf_benefits)) {

					$this->session->set_flashdata('error', 'Please enter your  U.I.F Beneficiary');

					redirect('projectmanager-import-learner');
				}

				$learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);

				if (empty($learner_accepted_training)) {

					$this->session->set_flashdata('error', 'Please enter your learner accepted training');

					redirect('projectmanager-import-learner');
				}

				$learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);

				if (empty($learnershipSubType)) {

					$this->session->set_flashdata('error', 'Please enter your learnership Sub Type');

					redirect('projectmanager-import-learner');
				}

				$id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);

				if (empty($id_number)) {

					$this->session->set_flashdata('error', 'Please enter your id number');

					redirect('projectmanager-import-learner');
				}

				$SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);

				if (empty($SETA)) {

					$this->session->set_flashdata('error', 'Please enter your SETA');

					redirect('projectmanager-import-learner');
				}

				$province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);

				if (empty($province)) {

					$this->session->set_flashdata('error', 'Please enter your province');

					redirect('projectmanager-import-learner');
				}

				$district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);

				if (empty($district)) {

					$this->session->set_flashdata('error', 'Please enter your district');

					redirect('projectmanager-import-learner');
				}

				$city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);

				if (empty($city)) {

					$this->session->set_flashdata('error', 'Please enter your city');

					redirect('projectmanager-import-learner');
				}

				$region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);

				// if (empty($region)) {

				// 	$this->session->set_flashdata('error', 'Please enter your region');

				// 	redirect('projectmanager-import-learner');
				// }

				$Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);

				if (empty($Suburb)) {

					$this->session->set_flashdata('error', 'Please enter your Suburb');

					redirect('projectmanager-import-learner');
				}

				$Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);

				if (empty($Street_name)) {

					$this->session->set_flashdata('error', 'Please enter your street name');

					redirect('projectmanager-import-learner');
				}

				$Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);

				if (empty($Street_number)) {

					$this->session->set_flashdata('error', 'Please enter your street number');

					redirect('projectmanager-import-learner');
				}

				$password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);

				if (empty($password)) {

					$this->session->set_flashdata('error', 'Please enter your password');

					redirect('projectmanager-import-learner');
				}

				$gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);

				if (empty($gender)) {

					$this->session->set_flashdata('error', 'Please enter your gender');

					redirect('projectmanager-import-learner');
				}

				$classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);

				if (empty($classname)) {

					$this->session->set_flashdata('error', 'Please enter your class name');

					redirect('import_learner');
				}



				$fetchData[] = array('trining_provider' => $trining_provider, 'first_name' => $first_name,  'surname' => $surname, 'email' => $email, 'mobile' => $mobile, 'mobile_number' => $mobile_number, 'assessment' => $assessment, 'disable' => $disable, 'utf_benefits' => $utf_benefits, 'learner_accepted_training' => $learner_accepted_training, 'learnershipSubType' => $learnershipSubType, 'id_number' => $id_number, 'SETA' => $SETA, 'province' => $province, 'district' => $district, 'city' => $city, 'Suburb' => $Suburb, 'Street_name' => $Street_name, 'Street_number' => $Street_number, 'password' => sha1($password), 'gender' => $gender, 'classname' => $classname);
			}

			$data['employeeInfo'] = $fetchData;

			$this->common->setBatchImport($fetchData);

			$this->common->importData();
		} else {

			$this->session->set_flashdata('error', 'Please import correct file');

			redirect('projectmanager-import-learner');
		}

		redirect('projectmanager-list-learner');
	}

	public function import_learner()
	{

		$this->data['page'] = 'import_learner';

		$this->data['content'] = 'pages/learner/import_learner';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function create_class()
	{

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('class_name', [], ['id' => $id], 'row');
		}

		if ($_POST) {

			$data = $_POST;

			$data['user_type'] = '2';

			if ($id != 0) {

				if ($this->common->updateData('class_name', $data, ['id' => $id])) {

					$this->session->set_flashdata('success', 'Class Updated Succesfully');

					redirect('projectmanager-class-list');
				} else {

					redirect('projectmanager-class-list');
				}
			} else {

				if ($this->common->insertData('class_name', $data)) {

					$this->session->set_flashdata('success', 'Class Insert Successfully');

					redirect('projectmanager-class-list');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('projectmanager-create-class');
				}
			}
		}

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['training'] = $this->common->accessrecord('trainer', [], ['project_id' => $projcetid], 'result');

		$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');

		$this->data['page'] = 'create_class';

		$this->data['content'] = 'pages/class/create_class';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	public function class_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		//$this->data['record']=$this->common->accessrecord('class_name', [], ['created_by'=>$projcetid,'user_type'=>'2'], 'result');

		$this->data['record'] = $this->common->ProjectManagerClass('project_manager', $projcetid);

		$this->data['page'] = 'class_list';

		$this->data['content'] = 'pages/class/class_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function learner_mark_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['record'] = $this->common->ProgrammeDirectorLearnerMark($projcetid, 'project_manager');

		$this->data['page'] = 'learner_marks_list';

		$this->data['content'] = 'pages/learner_marks/learner_marks_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function attendance_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['record'] = $this->common->ProgrammeDirectorAttendance($projcetid, 'project_manager');

		$this->data['page'] = 'attendance_list';

		$this->data['content'] = 'pages/attendance/attendance_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function drop_out_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['record'] = $this->common->Projectdropout('drop_out', $projcetid);
		// print_r($this->data['record']);
		// die;

		$this->data['page'] = 'drop_out_list';

		$this->data['content'] = 'pages/drop_out/drop_out_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function stipends_list()
	{

		$projcetid = $_SESSION['projectmanager']['id'];

		$this->data['record'] = $this->common->Projectdropout('stipend', $projcetid);

		$this->data['page'] = 'stipend_list';

		$this->data['content'] = 'pages/stipend/stipend_list';

		$this->load->view('project-manager/tamplate', $this->data);
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

	public function create_income_item()

	{

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('finance_income_item', [], ['id' => $id], 'row');
		}

		if ($_POST) {

			$_POST['project_id'] = $_SESSION['projectmanager']['id'];
			$_POST['organization'] = $_SESSION['organisation']['id'];

			if ($id != 0) {

				if ($this->common->updateData('finance_income_item', $_POST, ['id' => $id])) {

					$this->session->set_flashdata('success', ' Income Item Updated Succesfully');

					redirect('projectmanager-income-item-list');
				} else {

					$this->session->set_flashdata('success', ' Income Item Updated Succesfully');

					redirect('projectmanager-income-item-list');
				}
			} else {

				$_POST['funding_id'] = rand(100000, 999999);

				if ($this->common->insertData('finance_income_item', $_POST)) {

					$this->session->set_flashdata('success', 'Income Item Inserted Successfully');

					redirect('projectmanager-income-item-list');
				} else {

					$this->session->set_flashdata('error', 'Please Try Again');

					redirect('projectmanager-create-income-item');
				}
			}
		}
		$projectmanagerid = $_SESSION['projectmanager']['id'];
		$condition = array('project_manager' => $projectmanagerid);

		$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');
		$this->data['data'] = $this->common->accessrecord('finance_income_item', [], [], 'result');

		$this->data['page'] = 'create_income_item';

		$this->data['content'] = 'pages/finance/create_income_item';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	public function income_item_list()
	{

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			if ($count = $this->common->accessrecord('finance_income_item', ['SUM(`amount`) as total_income_amount'],  ['project_id' => $id], 'row')) {

				$this->data['count'] = $count;
			} else {

				$this->data['count'] = 0;
			}
		} else {

			$id = $_SESSION['projectmanager']['id'];
		}

		$this->data['data'] = $this->common->accessrecord('finance_income_item', [], ['project_id' => $id], 'result');

		$this->data['page'] = 'income_item_list';

		$this->data['content'] = 'pages/finance/income_item_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	public function create_expense_item()

	{

		$id = 0;

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			$this->data['record'] = $this->common->accessrecord('finance_expense_item', [], ['id' => $id], 'row');
			// 	print_r($this->data['record']);
		}

		if ($_POST) {

			$incomeitem = $this->common->accessrecord('finance_income_item', ['SUM(amount) as amount'], ['project_id' => projectmanagerid()], 'row');

			if (!empty($incomeitem)) {

				$_POST['project_id'] = $_SESSION['projectmanager']['id'];

				if ($id != 0) {

					if ($incomeitem->amount >= $_POST['expense_amount']) {

						$data = $this->common->accessrecord('finance_expense_item', ['SUM(expense_amount) as expense_amount'], ['project_id' => projectmanagerid()], 'row');

						$expense =  $data->expense_amount + $_POST['expense_amount'];

						if ($incomeitem->amount >= $expense) {

							if ($this->common->updateData('finance_expense_item', $_POST, ['id' => $id])) {

								$this->session->set_flashdata('success', 'Expense Item Updated Succesfully');

								redirect('projectmanager-expense-item-list');
							} else {

								$this->session->set_flashdata('success', 'Expense Item Updated Succesfully');

								redirect('projectmanager-expense-item-list');
							}
						} else {

							$this->session->set_flashdata('msg', 'your expense amount more than your income amount');

							redirect('projectmanager-create-expense-item?id=' . $id);
						}
					} else {

						$this->session->set_flashdata('msg', 'your expense amount more than your income amount');

						redirect('projectmanager-create-expense-item?id=' . $id);
					}
				} else {

					if ($incomeitem->amount >= $_POST['expense_amount']) {

						$data = $this->common->accessrecord('finance_expense_item', ['SUM(expense_amount) as expense_amount'], ['project_id' => projectmanagerid()], 'row');

						$expense =  $data->expense_amount + $_POST['expense_amount'];

						if ($incomeitem->amount >= $expense) {

							$_POST['expense_id'] = rand(100000, 999999);

							if ($this->common->insertData('finance_expense_item', $_POST)) {

								$this->session->set_flashdata('success', 'Expense Item Successfully');

								redirect('projectmanager-expense-item-list');
							} else {

								$this->session->set_flashdata('error', 'Please Try Again');

								redirect('projectmanager-create-expense-item');
							}
						} else {

							$this->session->set_flashdata('msg', 'your expense amount more than your income amount');

							redirect('projectmanager-create-expense-item');
						}
					} else {

						$this->session->set_flashdata('msg', 'your expense amount more than your income amount');

						redirect('projectmanager-create-expense-item');
					}
				}
			} else {

				$this->session->set_flashdata('error', 'Please Try Again');

				redirect('projectmanager-create-expense-item');
			}
		}
		$projectmanagerid = $_SESSION['projectmanager']['id'];
		$condition = array('project_manager' => $projectmanagerid);

		$this->data['learnership'] = $this->common->accessrecord('learnership', [], $condition, 'result');
		$this->data['learnership_sub'] = $this->common->accessrecord('learnership_sub_type', [], $condition, 'result');
		// print_r($this->data['learnership_sub']);
		$this->data['data'] = $this->common->accessrecord('finance_expense_item', [], [], 'result');

		$this->data['income'] = $this->common->accessrecord('finance_income_item', [], [], 'result');

		$this->data['page'] = 'create_expense_item';

		$this->data['content'] = 'pages/finance/create_expense_item';

		$this->load->view('project-manager/tamplate', $this->data);
	}



	public function expense_item_list()
	{

		if (!empty($_GET['id'])) {

			$id = $_GET['id'];

			if ($count = $this->common->accessrecord('finance_expense_item', ['SUM(`expense_amount`) as total_expense_amount'],  ['project_id' => $id], 'row')) {

				$this->data['count'] = $count;
			} else {

				$this->data['count'] = 0;
			}
		} else {

			$id = $_SESSION['projectmanager']['id'];
		}

		$this->data['data'] = $this->common->accessrecord('finance_expense_item', [], ['project_id' => $id], 'result');

		$this->data['page'] = 'expense_item_list';

		$this->data['content'] = 'pages/finance/expense_item_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function account_balance_list()
	{

		$this->data['record'] = $this->common->AccountBalanceData('total_account', projectmanagerid());

		$this->data['page'] = 'account_balance_list';

		$this->data['content'] = 'pages/finance/account_balance_list';

		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function expense_view()
	{

		$expesnse_id = $this->input->get('id');

		$this->data['record'] = $this->common->accessrecord('finance_expense_item', [], ['funding_id' => $expesnse_id], 'result');

		$this->data['page'] = 'expense_view';

		$this->data['content'] = 'pages/finance/expense_view';

		$this->load->view('project-manager/tamplate', $this->data);
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

	function deletedataTrainingprovider()
	{

		if (!empty($_GET['data'])) {

			$trainer = $this->common->accessrecord('trainer', [], ['id' => $_GET['data']], 'row');

			if ($this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row')) {

				echo json_encode(array('error' => "moderator"));
			} elseif ($this->common->accessrecord('assessor', [], ['trainer_id' => $_GET['data']], 'row')) {

				echo json_encode(array('error' => "assessor"));
			} elseif ($this->common->accessrecord('facilitator', [], ['trainer_id' => $_GET['data']], 'row')) {

				echo json_encode(array('error' => "facilitator"));
			} else if ($this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'row')) {

				echo json_encode(array('error' => "learner"));
			} else if ($this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'row')) {

				$datamon = $this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row');

				$datass = $this->common->accessrecord('assessor', [], ['trainer_id' => $_GET['data']], 'row');

				$datafac = $this->common->accessrecord('facilitator', [], ['trainer_id' => $_GET['data']], 'row');

				if (!empty($datamon)) {

					echo json_encode(array('error' => "learner&moder"));
				}

				if (!empty($datass)) {

					echo json_encode(array('error' => "learner&asso"));
				}

				if (!empty($datafac)) {

					echo json_encode(array('error' => "learner&fac"));
				}

				if ((!empty($datamon)) && (!empty($datass))) {

					echo json_encode(array('error' => "learner&moder&asso"));
				}

				if ((!empty($datass)) && (!empty($datafac))) {

					echo json_encode(array('error' => "learner&asso&fac"));
				}

				if ((!empty($datafac)) && (!empty($datamon))) {

					echo json_encode(array('error' => "learner&fac&mon"));
				}

				if ((!empty($datamon)) && (!empty($datass)) && (!empty($datafac))) {

					echo json_encode(array('error' => "learner&moder&ass&fac"));
				}
			} else if ($this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row')) {

				$datalea = $this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'row');

				$datass = $this->common->accessrecord('assessor', [], ['trainer_id' => $_GET['data']], 'row');

				$datafac = $this->common->accessrecord('facilitator', [], ['trainer_id' => $_GET['data']], 'row');

				if (!empty($datalea)) {

					echo json_encode(array('error' => "moderator&lea"));
				}

				if (!empty($datass)) {

					echo json_encode(array('error' => "moderator&asso"));
				}

				if (!empty($datafac)) {

					echo json_encode(array('error' => "moderator&fac"));
				}

				if ((!empty($datalea)) && (!empty($datass))) {

					echo json_encode(array('error' => "moderator&lea&asso"));
				}

				if (!empty($datass) && (!empty($datafac))) {

					echo json_encode(array('error' => "moderator&asso&fac"));
				}

				if ((!empty($datafac)) && (!empty($datalea))) {

					echo json_encode(array('error' => "moderator&fac&lea"));
				}

				if ((!empty($datalea)) && (!empty($datass)) && (!empty($datafac))) {

					echo json_encode(array('error' => "moderator&lea&asso&fac"));
				}
			} else if ($this->common->accessrecord('assessor', [], ['trainer_id' => $_GET['data']], 'row')) {

				$datalea = $this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'row');

				$datamon = $this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row');

				$datafac = $this->common->accessrecord('facilitator', [], ['trainer_id' => $_GET['data']], 'row');

				if (!empty($datalea)) {

					echo json_encode(array('error' => "assessor&lea"));
				}

				if (!empty($datamon)) {

					echo json_encode(array('error' => "assessor&mon"));
				}

				if (!empty($datafac)) {

					echo json_encode(array('error' => "assessor&fac"));
				}

				if ((!empty($datalea)) && (!empty($datamon))) {

					echo json_encode(array('error' => "assessor&lea&mon"));
				}

				if (!empty($datamon) && (!empty($datafac))) {

					echo json_encode(array('error' => "assessor&mon&fac"));
				}

				if ((!empty($datafac)) && (!empty($datalea))) {

					echo json_encode(array('error' => "assessor&fac&lea"));
				}

				if ((!empty($datalea)) && (!empty($datamon)) && (!empty($datafac))) {

					echo json_encode(array('error' => "assessor&lea&fac&mon"));
				}
			} else if ($this->common->accessrecord('facilitator', [], ['trainer_id' => $_GET['data']], 'row')) {

				$datalea = $this->common->accessrecord('learner', [], ['trining_provider' => $trainer->company_name], 'row');

				$datass = $this->common->accessrecord('assessor', [], ['trainer_id' => $_GET['data']], 'row');

				$datamon = $this->common->accessrecord('moderator', [], ['trainer_id' => $_GET['data']], 'row');

				if (!empty($datalea)) {

					echo json_encode(array('error' => "facilitator&lea"));
				}

				if (!empty($datass)) {

					echo json_encode(array('error' => "facilitator&asso"));
				}

				if (!empty($datamon)) {

					echo json_encode(array('error' => "facilitator&mon"));
				}

				if ((!empty($datalea)) && (!empty($datass))) {

					echo json_encode(array('error' => "facilitator&lea&asso"));
				}

				if (!empty($datass) && (!empty($datamon))) {

					echo json_encode(array('error' => "facilitator&asso&mon"));
				}

				if ((!empty($datamon)) && (!empty($datalea))) {

					echo json_encode(array('error' => "facilitator&mon&lea"));
				}

				if ((!empty($datalea)) && (!empty($datass)) && (!empty($datamon))) {

					echo json_encode(array('error' => "facilitator&lea&asso&mon"));
				}
			} else {

				$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);

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

	public function create_user()
	{
		if ($_POST) {
			// echo '<pre>';print_r($_POST);
			$trainer_id = $_SESSION['projectmanager']['id'];
			$data = array('first_name' => $_POST['first_name'], 'second_name' => $_POST['second_name'], 'designation' => $_POST['designation'], 'email' => $_POST['email'], 'password' => base64_encode($_POST['password']), 'type' => 'Project_Manager', 'created_by_id' => $trainer_id, 'mobile' => $_POST['mobile'],);

			if ($ins = $this->common->insertData('sub_user', $data)) {
				$this->session->set_flashdata('success', 'Insert Successful');
				redirect('Projectmanager-User-list');
			} else {
				$this->session->set_flashdata('error', 'Please Try Again');
				redirect('Create-Projectmanager-User');
			}
		}
		$this->data['module'] = $this->common->accessrecord('user_modules', [], ['panel_name' => 'Project_Manager', 'status' => 1], 'result');
		$this->data['page'] = 'create_user';
		$this->data['content'] = 'pages/user/create_user';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function user_list()
	{
		$trainer_id = $_SESSION['projectmanager']['id'];
		$this->data['record'] = $this->common->accessrecord('sub_user', [], ['type' => 'Project_Manager', 'created_by_id' => $trainer_id], 'result');
		$this->data['page'] = 'user_list';
		$this->data['content'] = 'pages/user/user_list';
		// echo '<pre>'; print_r($this->data['record']);die();
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function deleteUser()
	{
		$this->common->deleteRecord('user_permission', ['user_id' => $_GET['data']]);


		$this->common->deleteRecord($_GET['table'], [$_GET['behalf'] => $_GET['data']]);
	}

	public function user_edit()
	{
		$trainer_id = $_SESSION['projectmanager']['id'];
		$id = $_GET['id'];
		$this->data['record'] = $this->common->accessrecord('sub_user', [], ['type' => 'Project_Manager', 'id' => $_GET['id'], 'created_by_id' => $trainer_id], 'row');

		$modules = $this->common->accessrecord('user_permission', ['module_name'], ['user_type' => 'Project_Manager', 'user_id' => $_GET['id']], 'result');
		// echo '<pre>'; print_r($modules);die();

		$modulearr = array();
		if (!empty($modules)) {

			foreach ($modules as $key => $value) {
				$modulearr[] = $value->module_name;
			}
		}
		$this->data['module'] = $this->common->accessrecord('user_modules', [], ['panel_name' => 'Project_Manager', 'status' => 1], 'result');
		// echo '<pre>'; print_r($this->data['module']);die();
		foreach ($this->data['module'] as $ke => $val) {
			if (in_array($val->module_name, $modulearr)) {
				$this->data['module'][$ke]->is_selected = 1;
				$res = $this->common->accessrecord('user_permission', ['is_view,is_add,is_edit,is_delete'], ['user_type' => 'Project_Manager', 'user_id' => $_GET['id'], 'module_name' => $val->module_name], 'row');
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
			$trainer_id = $_SESSION['projectmanager']['id'];
			$data = array('first_name' => $_POST['first_name'], 'second_name' => $_POST['second_name'], 'designation' => $_POST['designation'], 'email' => $_POST['email'], 'mobile' => $_POST['mobile'], 'password' => base64_encode($_POST['password']));
			// if (!empty($_POST['modules'])) {
			$this->common->updateData('sub_user', $data, array('type' => 'Project_Manager', 'created_by_id' => $trainer_id, 'id' => $id));

			$modules = $_POST['modules'];
			$modularr['user_id'] = $id;
			$modularr['user_type'] = 'Project_Manager';
			$this->common->deleteRecord('user_permission', ['user_id' => $id, 'user_type' => 'Project_Manager']);

			foreach ($modules as $key => $value) {
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
			redirect('Projectmanager-User-list');
			// } else {
			// 	$this->session->set_flashdata('module_error', 'Please select modules for permission');
			// }
		}
		//echo '<pre>'; print_r($this->data['module']);die;
		$this->data['page'] = 'create_user';
		$this->data['content'] = 'pages/user/edit_user';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function quarterlyReport()
	{
		$id = $_SESSION['projectmanager']['id'];

		$this->data['training'] = $this->common->accessrecord('trainer', ['id, full_name, surname, company_name'], ['project_id' => $id], 'result');
		//$trainer_report = [];

		// print_r($this->data['training']);die;
		foreach ($this->data['training'] as $key => $value) {
			//$trainer_report = count($value);
			if ($training = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $value->id], 'result')) {

				$this->data['training'][$key]->total_report = sizeof($training);
			} else {
				$this->data['training'][$key]->total_report = 0;
			}
		}
		$this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/report/provider_quarterly_report';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function createdquarterlyReport()
	{
		$id = $_SESSION['projectmanager']['id'];

		$this->data['training'] = $this->common->accessrecord('trainer', ['id, full_name, surname, company_name'], ['project_id' => $id], 'result');

		$this->data['quarterly_progress_report'] = $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name' => $this->data['training']->id], 'result');


		$this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/report/provider_quarterly_report';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function quarterlyReportCreatedByProvider()
	{
		$id = $_GET['id'];
		if ($training = $this->common->getTrainerQuarterlyReport($id)) {
			$this->data['record'] = $training;
			// echo '<pre>';print_r($this->data['record']);die();
		}
		$this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/report/quarterly_report_created_by_provider';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function listProviderAddedMarksheet()
	{
		if ($marksheets = $this->common->accessrecord('learner_marks', [], ['training_provider' => $_GET['company_name']], 'result')) {
			$this->data['marksheet'] = $marksheets;
			// echo '<pre>';print_r($this->data['record']);die();
		}
		$this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/report/mark_sheet';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function listProviderAddedAttendance()
	{
		if ($attendances = $this->common->accessrecord('attendance', [], ['training_provider' => $_GET['company_name']], 'result')) {
			$this->data['attendance'] = $attendances;
			// echo '<pre>';print_r($this->data['attendance']);die();
		}
		$this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/attendance/list_attendance';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function createNewSubcontractor(){

		$this->data['page'] = 'createNewSubcontractor';
		$this->data['content'] = 'pages/subcontractor/createNewSubcontractor';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function newSubcontractorList(){

		$this->data['page'] = 'newSubcontractorList';
		$this->data['content'] = 'pages/subcontractor/newSubcontractorList';
		$this->load->view('project-manager/tamplate', $this->data);
	}


	public function list_assessments()
	{
	    $project_manager_id = $_SESSION['projectmanager']['id'];

	    $this->data['record'] = $this->common->assessmentListByProjectManager($project_manager_id);

	    $this->data['page'] = 'list_assessments';

	    $this->data['content'] = 'pages/assessment/assessment_list';

	    $this->load->view('project-manager/tamplate', $this->data);

	}

	public function create_assessment()
	{

	    $project_manager_id = $_SESSION['projectmanager']['id'];
	    $organisation_id = $_SESSION['organisation']['id'];

	    $id = 0;

	    if (!empty($_GET['id'])) {

	        $id = $_GET['id'];

	        $this->data['record'] = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	    }

	    if ($_POST) {

	        if ($id != 0) {


	            // Upload files
	            if (!empty($_FILES['upload_learner_guide']['name'])) {
	                $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	                $upload_learner_guide['upload_learner_guide'] = $assessment->upload_learner_guide;
	            }

	            // Upload files
	            if (!empty($_FILES['upload_learner_workbook']['name'])) {
	                $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	                $upload_learner_workbook['upload_learner_workbook'] = $assessment->upload_learner_workbook;
	            }

	            // Upload files
	            if (!empty($_FILES['upload_learner_poe']['name'])) {
	                $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	                $upload_learner_poe['upload_learner_poe'] = $assessment->upload_learner_poe;
	            }

	            // Upload files
	            if (!empty($_FILES['upload_facilitator_guide']['name'])) {
	                $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './assessment/bank/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $assessment = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	                $upload_facilitator_guide['upload_facilitator_guide'] = $assessment->upload_facilitator_guide;
	            }

	            $data = [
	                'assessment_start_date' => $this->input->post('assessment_start_date'),
	                'assessment_end_date' => $this->input->post('assessment_end_date'),
	                'title' => $this->input->post('title'),
	                'assessment_type' => $this->input->post('assessment_type'),
	                'submission_type' => $this->input->post('submission_type'),
	                'classname' => $this->input->post('classname'),
	                'unit_standard' => $this->input->post('unit_standard'),
// 	                'programme_name' => $this->input->post('programme_name'),
// 	                'programme_number' => $this->input->post('programme_number'),
	                'intervention_name' => $this->input->post('intervention_name'),

	                'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
	                'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
	                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
	                'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

	                'created_by' => $project_manager_id,
	                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
	                'created_date' => date('Y-m-d H:i:s'),
	                'updated_date' => date('Y-m-d H:i:s'),

	            ];

 	            if ($this->common->updateData('assessment', $data, array('id' => $id))) {

 	                $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

 	                redirect('projectmanager-assessment-list');
 	            } else {

 	                $this->session->set_flashdata('success', 'Assessment Updated Succesfully');

 	                redirect('projectmanager-assessment-list');
 	            }

	        } else {

	            // Upload files
	            if (!empty($_FILES['upload_learner_guide']['name'])) {
	                $upload_learner_guide['upload_learner_guide'] = $this->singlefileupload('upload_learner_guide', './uploads/assessment/upload_learner_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $upload_learner_guide = [];
	            }

	            // Upload files
	            if (!empty($_FILES['upload_learner_workbook']['name'])) {
	                $upload_learner_workbook['upload_learner_workbook'] = $this->singlefileupload('upload_learner_workbook', './uploads/assessment/upload_learner_workbook/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $upload_learner_workbook = [];
	            }

	            // Upload files
	            if (!empty($_FILES['upload_learner_poe']['name'])) {
	                $upload_learner_poe['upload_learner_poe'] = $this->singlefileupload('upload_learner_poe', './uploads/assessment/upload_learner_poe/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $upload_learner_poe = [];
	            }

	            // Upload files
	            if (!empty($_FILES['upload_facilitator_guide']['name'])) {
	                $upload_facilitator_guide['upload_facilitator_guide'] = $this->singlefileupload('upload_facilitator_guide', './uploads/assessment/upload_facilitator_guide/', 'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
	            } else {
	                $upload_facilitator_guide = [];
	            }

	            $data = [
	                'assessment_start_date' => $this->input->post('assessment_start_date'),
	                'assessment_end_date' => $this->input->post('assessment_end_date'),
	                'title' => $this->input->post('title'),
	                'assessment_type' => $this->input->post('assessment_type'),
	                'submission_type' => $this->input->post('submission_type'),
	                'classname' => $this->input->post('classname'),
	                'unit_standard' => $this->input->post('unit_standard'),
// 	                'programme_name' => $this->input->post('programme_name'),
// 	                'programme_number' => $this->input->post('programme_number'),
	                'intervention_name' => $this->input->post('intervention_name'),

	                'upload_learner_guide' => $upload_learner_guide['upload_learner_guide'],
	                'upload_learner_workbook' => $upload_learner_workbook['upload_learner_workbook'],
	                'upload_learner_poe' => $upload_learner_poe['upload_learner_poe'],
	                'upload_facilitator_guide' => $upload_facilitator_guide['upload_facilitator_guide'],

	                'created_by' => $project_manager_id,
	                'created_by_role' => 'project manager',
	                'created_date' => date('Y-m-d H:i:s'),
	                'updated_date' => date('Y-m-d H:i:s'),

	            ];

	            if ($this->common->insertData('assessment', $data)) {

	                /*
// Send emails to learners,


				$this->load->library('email');

				$this->email->from('info@digilims.com','LEARNING MANEGMENT');

				$this->email->to($email);

				$this->email->subject('Password is successfully updated');

				$this->email->set_mailtype("html");

				$this->email->message($html);

                $this->email->send();

			//	echo $this->email->print_debugger();die;

	                 */

	                $this->session->set_flashdata('success', 'Assessement Saved Successfully');

	                redirect('projectmanager-assessment-list');
	            } else {

	                $this->session->set_flashdata('error', 'Please Try Again');

	                redirect('projectmanager-create-assessment');
	            }
	        }

	        if ($id != 0) {

	            $this->data['record'] = $this->common->accessrecord('assessment', [], ['id' => $id], 'row');
	        }
	    }

// 	    $this->data['projectmanager'] = $this->common->accessrecord('project_manager', [], ['id' => $project_id], 'row');


	    $this->data['classes'] = $this->common->accessrecord('class_name', [], [], 'result_array');
	    $this->data['units'] = $this->common->accessrecord('units', [], [], 'result_array');

 	    $this->data['page'] = 'create_assessment';

	    $this->data['content'] = 'pages/assessment/assessment_form';

	    $this->data['learnership'] = $this->common->accessrecord('learnership', [], ['organization' => $organisation_id], 'result');

	    $this->load->view('project-manager/tamplate', $this->data);
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


}
