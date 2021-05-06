<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		//$otherdb = $this->load->database('sudheer', TRUE);
	}

	function insertData($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function insertBatch($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function accessrecord($table, $select, $where, $want)
	{
		$this->db->select(implode(',', $select));
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get_where($table, $where);
		if ($want == 'row') {
			$result = $data->row();
		} elseif ($want == 'row_array') {
			$result = $data->row_array();
		} elseif ($want == 'result') {
			$result = $data->result();
		} elseif ($want == 'result_array') {
			$result = $data->result_array();
		} else {
			$result = $data->result_array();
		}
		return  $result;
		//echo $this->db->last_query(); die;
	}

	function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	function deleteRecord($table, $data)
	{
		$this->db->delete($table, $data);
	}

	function login($user, $password)
	{
		$this->db->where('username=', $user);
		$this->db->or_where('email=', $user);
		$this->db->where('password', $password);
		return $this->db->get(TBL_USER)->row();
	}

	function setMethod($table,  $method,  $feild,  $value, $where)
	{
		$this->db->set($feild, $feild . "" . $method . "" . $value, false);
		$this->db->where($where);
		$this->db->update($table);
	}

	function custumQuery($table, $select, $where, $random,  $want)
	{
		$custom = '';
		if (!empty($random)) {
			for ($i = 0; $i < count($random); $i++) {
				$custom .= $random[$i]['key'] . " " . $random[$i]['value'];
			}
		}
		$where = '';
		if (!empty($where)) {
			$where = " WHERE " .  implode('and', $where);
		}
		$select = !empty($select) ? implode(',', $select) : "*";
		$sql = "SELECT" . $select . "FROM " . $table . $where . $custom;
		return $want == 'row' ? $this->db->query($sql)->row() : $this->db->query($sql)->result();
		echo $this->db->last_query();
		die;
	}

	function accessrecordwithjoin($select,  $from,  $to, $join, $where,  $what, $yourQuery)
	{
		$custum = '';
		$possition = 0;
		$rows = 1;
		if (!empty($yourQuery)) {
			for ($i = 0; $i < count($yourQuery); $i++) {
				if (empty($yourQuery[$i]['key'])) {
					$possition = 1;
				}
				if (empty($yourQuery[$i]['key']) && ($yourQuery[$i]['value']) == 'row') {
					$rows = 0;
				}
				$custum .= $yourQuery[$i]['key'] . " " . $yourQuery[$i]['value'];
			}
		}
		$custumwhere = '';
		if (!empty($where)) {
			$data = array();
			foreach ($where as $key => $value) {
				$data[] = $key . "=" . $value;
			}
			$custumwhere = " WHERE " . implode(' and ', $data);
		}
		$temp = $custumwhere;
		$tempj = chop($custum, 'row');
		if ($possition == 1) {
			$custum = $temp;
			$custumwhere = $tempj;
		}
		$query = "SELECT " . implode(',', $select) . " FROM " . $from . " " . $what . " JOIN  " . $to . " ON " . implode('=', $join) . " " . $custumwhere . " " . $custum;
		$result = $this->db->query($query);
		//echo $this->db->last_query(); die;
		return $rows == 1 ? $result->result() : $result->row();
		echo $this->db->last_query();
		die;
	}
	//  getting all province data for adding new DISTRICT :- 25-11-19 (prashant)
	public function get_province()
	{

		$query = $this->db->get('province');
		// $this->db->where('district.organization');
		return $query->result();
	}
	//  inserting District 25-11-19 (prashant)
	public function insertDistrict($data)
	{

		$data =  $this->db->insert('district', $data);
		return $data;
	}
	//  Getting all data of District 11-25-19 (Prashant)
	public function get_District()
	{


		$this->db->select('district.*, province.name AS p_name');
		$this->db->from('district');
		$this->db->order_by('id', 'desc');
		$this->db->join('province', 'province.name = district.province_id');
		$query = $this->db->get();
		return $query->result();
	}
	//  Single District data
	public function one_District($id)
	{
		$query = $this->db->get_where('district', array('id' => $id));
		return $query->row();
	}
	//  Update District
	public function update_district($id, $data)
	{
		$data = array(
			'province_id' => $data['province_id'],
			'name' => $data['name']
		);
		$this->db->where('id', $id);
		$data = $this->db->update('district', $data);
		return $data;
	}
	// Insert Resion
	public function insertregion($data)
	{
		$data =  $this->db->insert('region', $data);
		return $data;
	}
	//  get Region 11-25-19
	public function get_region()
	{

		$this->db->select('region.*, district.province_id AS p_name , district.name AS d_name ');
		$this->db->from('region');
		$this->db->join('district', 'district.name = region.district_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	//  Single Region 11-25-19
	public function one_region($id)
	{
		$query = $this->db->get_where('region', array('id' => $id));
		return $query->row();
	}

	public function one_municipality($id)
	{
		$query = $this->db->get_where('municipality', array('id' => $id));
		return $query->row();
	}
	//  Update Region 11-25-19
	public function update_region($id, $data)
	{
		$data = array(
			'province_id' => $data['province'],
			'district_id' => $data['District'],
			'region' => $data['region']
		);
		$this->db->where('id', $id);
		$data = $this->db->update('region', $data);
		return $data;
	}

	public function get_District_province($data)
	{
		$query = $this->db->get_where('district', array('province_id' => $data['value']));
		return $query->result();
	}

	public function get_Sublearnership($data)
	{
		$query = $this->db->get_where('learnership', array('id' => $data['value']));
		return $query->result();
	}

	public function get_region_District($data)
	{
		$query = $this->db->get_where('region', array('district_id' => $data));
		return $query->result();
	}
	//  Insert city
	public function insertcity($data)
	{
		$new_city =  $this->db->insert('city', $data);
		return $data;
	}
	// get all city 11-25-19
	public function get_city()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('city');
		return $query->result();
	}

	public function get_municipality()
	{
		$query = $this->db->get('municipality');
		return $query->result();
	}
	//  get single city
	public function one_city($id)
	{
		$query = $this->db->get_where('city', array('id' => $id));
		return $query->row();
	}
	//  Update Region 11-25-19
	public function update_city($id, $data)
	{
		$details = array(
			'province_id' => $data['province'],
			'district_id' => $data['District'],
			'region_id' => $data['region'],
			'city' => $data['city']
		);
		$this->db->where('id', $id);
		$update = $this->db->update('city', $details);
		return $update;
	}

	public function get_region_city($data)
	{
		$query = $this->db->get_where('city', array('region_id' => $data));
		return $query->result();
	}


	public function get_district_city($data)
	{
		$query = $this->db->get_where('city', array('district_id' => $data));
		return $query->result();
	}


	public function get_city_municipality($data)
	{
		$query = $this->db->get_where('municipality', array('city_id' => $data));
		return $query->result();
	}

	public function save_training($data)
	{
		$password = sha1($data['password']);
		$details = array(
			'full_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'landline' => $data['landline'],
			'district' => $data['district'],
			'region' => $data['region'],
			'province' => $data['province'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'project_id' => $data['project_id'],
			'password' => $password,
			'company_name' => $data['company_name'],
			'attach_documents' => $data['attach_documents']
		);
		$new_trining =  $this->db->insert('trainer', $details);
		return $new_trining;
	}

	public function get_training()
	{
		// print_r($data); die;
		$query = $this->db->get('trainer');
		return $query->result();
	}

	public function one_trining($id)
	{
		$query = $this->db->get_where('trainer', array('id' => $id));
		return $query->row();
	}

	public function update_training($id, $data)
	{
		//$password = sha1($data['password']);
		$details = array(
			'full_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'landline' => $data['landline'],
			'district' => $data['district'],
			'region' => $data['region'],
			'province' => $data['province'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'project_id' => $data['project_id'],
			'password' => $data['password'],
			'company_name' => $data['company_name'],
			'attach_documents' => $data['attach_documents']
		);
		$this->db->where('id', $id);
		$update = $this->db->update('trainer', $details);
		return $update;
	}
	//  Save Learner
	public function save_learnerold($data)
	{
		$password = $data['password'];
		if (($data['learner_accepted_training'] == 'no') || ($data['learner_accepted_training'] == "No")) {
			$reason = $data['reason'];
			//$status = "0";
			$learner_accepted_training = $data['learner_accepted_training'];
		} else {
			//$status = "1";
			$reason = "";
			$learner_accepted_training = $data['learner_accepted_training'];
		}
		$details = array(
			'first_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'mobile_number' => $data['mobile_number'],
			'id_number' => $data['id_number'],
			'SETA' => $data['SETA'],
			'province' => $data['province'],
			'district' => $data['district'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'gender' => $data['gender'],
			'trining_provider' => $data['trining_provider'],
			'region' => $data['region'],
			'assessment' => $data['assessment'],
			'disable' => $data['disable'],
			'utf_benefits' => $data['utf_benefits'],
			'learner_accepted_training' => $learner_accepted_training,
			'reason' => $reason,
			'learnershipSubType' => $data['learnershipSubType'],
			'id_copy' => $data['id_copy'],
			'certificate_copy' => $data['certificate_copy'],
			'contract_copy' => $data['contract_copy'],
			'password' => $password,
			'classname' => $data['classname'],
			'id_number' => $data['id_number']
			//'status'=>$status
		);
		$new_learner =  $this->db->insert('learner', $details);
		return $new_learner;
	}



	public function save_learner($data)
	{
		$password = $data['password'];
		if (!empty($data['learner_accepted_training'])) {
			if (($data['learner_accepted_training'] == 'no') || ($data['learner_accepted_training'] == "No")) {
				$reason = $data['reason'];
				//$status = "0";
				$learner_accepted_training = $data['learner_accepted_training'];
			} else {
				//$status = "1";
				$reason = "";
				$learner_accepted_training = $data['learner_accepted_training'];
			}
		} else {
			$reason = "";
			$learner_accepted_training = '';
		}
		$details = array(
			'first_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'mobile_number' => $data['mobile_number'],

			'SETA' => $data['SETA'],
			'province' => $data['province'],
			'district' => $data['district'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'gender' => $data['gender'],
			'trining_provider' => $data['trining_provider'],
			'region' => $data['region'],
			'assessment' => isset($data['assessment']) ? $data['assessment'] : '',
			'disable' => isset($data['disable']) ? $data['disable'] : '',
			'utf_benefits' => isset($data['utf_benefits']) ? $data['utf_benefits'] : '',
			'learner_accepted_training' => $learner_accepted_training,
			'learnship_id' => $data['learnship_id'],
			'reason' => $reason,
			'learnershipSubType' => $data['learnershipSubType'],
			'id_copy' => $data['id_copy'],
			'certificate_copy' => $data['certificate_copy'],
			'contract_copy' => $data['contract_copy'],
			'password' => $password,
			'classname' => $data['classname'],
			'employer_name' => $data['employer_name'],
			'bank_name' => $data['bank_name'],
			'bank_account_type' => $data['bank_account_type'],
			'bank_account_number' => $data['bank_account_number'],
			'branch_name' => $data['branch_name'],
			'branch_code' => $data['branch_code'],
			'upload_proof_of_banking' => isset($data['upload_proof_of_banking']) ? $data['upload_proof_of_banking'] : '',
			'organization' => $data['organization'],
			'project_manager' => $data['project_manager'],
			'trainer_id' => $data['trainer_id'],
			'enrollment_date' => $data['enrollment_date'],
			'completion_date' => $data['completion_date'],
			'id_number' => $data['id_number'],
			'municipality' => $data['municipality']

		);
		// print_r($details);die;

		$new_learner =  $this->db->insert('learner', $details);
		return $new_learner;
	}

	public function get_learner()
	{
		$this->db->select('learner.*, trainer.full_name AS t_name ');
		$this->db->from('learner');
		$this->db->join('trainer', 'trainer.id = learner.trining_provider', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function one_learner($id)
	{
		$query = $this->db->get_where('learner', array('id' => $id));
		return $query->row();
	}
	//  update Larner
	public function update_learnerold($id, $data)
	{
		if (($data['learner_accepted_training'] == 'no') || ($data['learner_accepted_training'] == "No")) {
			$reason = $data['reason'];
			//$status = "0";
			$learner_accepted_training = $data['learner_accepted_training'];
		} else {
			//$status = "1";
			$reason = "";
			$learner_accepted_training = $data['learner_accepted_training'];
		}
		$details = array(
			'first_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'mobile_number' => $data['mobile_number'],
			'id_number' => $data['id_number'],
			'SETA' => $data['SETA'],
			'province' => $data['province'],
			'district' => $data['district'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'gender' => $data['gender'],
			'trining_provider' => $data['trining_provider'],
			'region' => $data['region'],
			'assessment' => $data['assessment'],
			'disable' => $data['disable'],
			'utf_benefits' => $data['utf_benefits'],
			'learner_accepted_training' => $learner_accepted_training,
			'reason' => $reason,
			'learnershipSubType' => $data['learnershipSubType'],
			'id_copy' => $data['id_copy'],
			'certificate_copy' => $data['certificate_copy'],
			'contract_copy' => $data['contract_copy'],
			// 'password' => $data['password'],
			'classname' => $data['classname'],
			//'status'=>$status
		);
		$this->db->where('id', $id);
		$update = $this->db->update('learner', $details);
		return $update;
	}

	public function update_learner($id, $data)
	{
		// $password = sha1($data['password']);
		if (!empty($data['learner_accepted_training'])) {
			if (($data['learner_accepted_training'] == 'no') || ($data['learner_accepted_training'] == "No")) {
				$reason = $data['reason'];
				//$status = "0";
				$learner_accepted_training = $data['learner_accepted_training'];
			} else {
				//$status = "1";
				$reason = "";
				$learner_accepted_training = $data['learner_accepted_training'];
			}
		} else {
			$reason = "";
			$learner_accepted_training = '';
		}
		$details = array(
			'first_name' => $data['full_name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'mobile_number' => $data['mobile_number'],

			// 'SETA' => $data['SETA'],
			'province' => $data['province'],
			'district' => $data['district'],
			'city' => $data['city'],
			'Suburb' => $data['Suburb'],
			'Street_name' => $data['Street_name'],
			'Street_number' => $data['Street_number'],
			'gender' => $data['gender'],
			'trining_provider' => $data['trining_provider'],
			'region' => $data['region'],
			'assessment' => isset($data['assessment']) ? $data['assessment'] : '',
			'disable' => isset($data['disable']) ? $data['disable'] : '',
			'utf_benefits' => isset($data['utf_benefits']) ? $data['utf_benefits'] : '',
			'learner_accepted_training' => $learner_accepted_training,
			'reason' => $reason,
			'profile_image' => isset($data['profile_image']) ? $data['profile_image'] : '',
			// 'learnershipSubType' => $data['learnershipSubType'],
			'id_copy' => $data['id_copy'],
			'certificate_copy' => $data['certificate_copy'],
			'contract_copy' => $data['contract_copy'],
			// 'password' => $password,
			// 'classname'=>$data['classname'],
			// 'employer_name' => $data['employer_name'],
			// 'bank_name' => $data['bank_name'],
			// 'bank_account_type' => $data['bank_account_type'],
			// 'bank_account_number' => $data['bank_account_number'],
			// 'branch_name'=>$data['branch_name'],
			// 'branch_code' => $data['branch_code'],
			'upload_proof_of_banking' => isset($data['upload_proof_of_banking']) ? $data['upload_proof_of_banking'] : '',
			//'status'=>$status
		);
		$this->db->where('id', $id);
		$update = $this->db->update('learner', $details);
		return $update;
	}
	//  learner Login
	public function learner_login($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$query = $this->db->get('learner');
		return $query->row();
	}
	/*****************************ZUBAIR 05/12/19*******************************************************/
	public function update_learner_tr($tbl = '', $whereid, $data)
	{
		$this->db->where($whereid);
		$update = $this->db->update($tbl, $data);
		return true;
	}

	public function save_learner_tr($tbl = '', $data = '')
	{
		// print_r($data); die;
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	public function learnershipSubType($condition)
	{


		$this->db->select('learnership_sub_type.*, learnership_sub_type.id AS learn_sub_id, learnership_sub_type.user_type AS learnship_sub_created_by, learnership.id AS learnship_id, learnership.name AS learnship_name, learnership.saqa_registration_id AS saqa_registration_id');
		$this->db->from('learnership_sub_type');
		$this->db->join('units', 'units.id = learnership_sub_type.unit_standard', 'left');
		$this->db->join('learnership', 'learnership.id = learnership_sub_type.learnship_id', 'left');
		$this->db->where('learnership.trainer_id', $condition);
		$this->db->order_by('learnership_sub_type.id', 'desc');
		$query = $this->db->get();
		return $query->result();
		// echo $this->db->last_query(); die;
	}

	public function update_status($table, $id, $status)
	{
		$this->db->where('id', $id);
		$query = $this->db->update($table, array('status' => $status));
		return $query ? true : false;
	}

	function setBatchImport($batchImport)
	{
		$this->_batchImport = $batchImport;
	}
	// save data
	function importData()
	{
		$data = $this->_batchImport;
		$this->db->insert_batch('learner', $data);
	}

	public function learnerdropout($trining_provider)
	{
		$this->db->select('learner.*,drop_out.*');

		$this->db->from('learner');

		$this->db->join('drop_out', 'drop_out.learner_id = learner.id', 'inner');

		$this->db->where('learner.trining_provider', $trining_provider);
		$this->db->where('learner.drop_out', 1);

		$query = $this->db->get();

		return $query->result();
	}

	public function learnerattendance($id)
	{
		$this->db->select('assessor.*,learner.id as learner_id,learner.first_name,learner.second_name,learner.surname as learner_surname ,learner.id_number as learner_id_number,learner.learnershipSubType');
		$this->db->from('assessor');
		$this->db->join('trainer', 'trainer.id = assessor.trainer_id', 'left');
		$this->db->join('learner', 'learner.trining_provider = trainer.company_name', 'left');
		$this->db->where('assessor.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	/***********************************Zubair 040120**************************************/
	public function ulogin($tbl = '', $data = '')
	{
		return $this->db->where($data)->get($tbl)->row();
	}


	public function projectmanager_login($data)
	{
		$this->db->where('email_address', $data['email_address']);
		$this->db->where('password', $data['password']);
		$query = $this->db->get('project_manager');
		return $query->row();
	}

	//-----------Admin Report Start-----------------//

	public function Reportdata($table)
	{
		$organisation = $this->accessrecord($table, ['id,organisation_name'], [], 'result');
		$i = 1;
		if (!empty($organisation)) {
			foreach ($organisation as $key => $value) {
				$organisation[$key]->total_organisation = $value->id;
				$organisation_id = $value->id;
				$programme = $this->accessrecord('programme_director', ['id', 'organisation_id'], ['organisation_id' => $organisation_id], 'result');
				if (!empty($programme)) {
					$organisation[$key]->total_programme_director = sizeof($programme);

					$sum_director = 0;
					$sum_mngr = 0;
					$sum_trainer = 0;
					$sum_assessor = 0;
					$sum_moderator = 0;
					$sum_facilitator = 0;
					$sum_learner = 0;

					foreach ($programme as $value_one) {

						$programmeid = $value_one->id;

						$organisationid = $value_one->organisation_id;

						$project_manager = $this->accessrecord('project_manager', ['id', 'programme_director'], ['programme_director' => $programmeid], 'result');

						if (!empty($project_manager)) {

							foreach ($project_manager as $value_two) {

								$sum_director = $sum_director + 1;

								$projectid = $value_two->id;

								$organisation[$key]->total_project_manager = $sum_director;

								$trainer = $this->accessrecord('trainer', ['id', 'project_id', 'full_name', 'company_name'], ['project_id' => $projectid], 'result');



								if (!empty($trainer)) {

									foreach ($trainer as $value_three) {

										$sum_trainer = $sum_trainer + 1;

										$trainerid = $value_three->id;

										$organisation[$key]->total_trainer = $sum_trainer;

										$trainer_name = $value_three->company_name;

										$assessor = $this->accessrecord('assessor', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($assessor)) {

											foreach ($assessor as $value_four) {

												$sum_assessor = $sum_assessor + 1;

												$assessor_id = $value_four->trainer_id;

												$organisation[$key]->total_assessor = $sum_assessor;
											}
										}

										$moderator = $this->accessrecord('moderator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($moderator)) {

											foreach ($moderator as $value_five) {

												$sum_moderator = $sum_moderator + 1;

												$organisation[$key]->total_moderator = $sum_moderator;

												$moderator_id = $value_five->trainer_id;
											}
										}

										$facilitator = $this->accessrecord('facilitator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($facilitator)) {

											foreach ($facilitator as $value_six) {

												$sum_facilitator = $sum_facilitator + 1;

												$organisation[$key]->total_facilitator = $sum_facilitator;

												$facilitator_id = $value_six->trainer_id;
											}
										}

										$learner = $this->accessrecord('learner', ['id', 'trining_provider'], ['trining_provider' => $trainer_name], 'result');

										if (!empty($learner)) {

											foreach ($learner as $value_seven) {

												$sum_learner = $sum_learner + 1;

												$learner_id = $value_seven->trining_provider;

												$organisation[$key]->total_learner = $sum_learner;
											}
										}
									}
								}
							}
						}
					}
				} else {

					$organisation[$key]->total_programme_director = 0;

					$organisation[$key]->total_project_manager = 0;

					$organisation[$key]->total_trainer = 0;

					$organisation[$key]->total_assessor = 0;

					$organisation[$key]->total_moderator = 0;

					$organisation[$key]->total_facilitator = 0;

					$organisation[$key]->total_learner = 0;
				}
			}
		}

		return $organisation;
	}

	public function ReportProjectdata($id)
	{

		$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id');

		$this->db->from('programme_director');

		$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

		$this->db->where('organisation.id', $id);

		$query = $this->db->get();

		$programme = $query->result();

		foreach ($programme as $key => $value) {

			$programme_id = $value->programme_id;

			$project[] = $this->accessrecord('project_manager', [], ['programme_director' => $programme_id], 'result');
		}

		return $project;
	}

	public function ReportTrainingdata($id)
	{

		$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id');

		$this->db->from('programme_director');

		$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

		$this->db->where('organisation.id', $id);

		$query = $this->db->get();

		$programme = $query->result();

		foreach ($programme as $key => $value) {

			$programme_id = $value->programme_id;

			$project = $this->accessrecord('project_manager', ['id', 'fullname', 'programme_director', 'surname', 'project_manager'], ['programme_director' => $programme_id], 'result');

			foreach ($project as $value_one) {

				$project_id = $value_one->id;

				$trainer[] = $this->accessrecord('trainer', [], ['project_id' => $project_id], 'result');
			}
		}

		return $trainer;
	}

	public function ReporttrainerIdWise($id, $type)
	{

		$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id');

		$this->db->from('programme_director');

		$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

		$this->db->where('organisation.id', $id);

		$query = $this->db->get();

		$programme = $query->result();

		foreach ($programme as $key => $value) {

			$programme_id = $value->programme_id;

			$project = $this->accessrecord('project_manager', ['id', 'fullname', 'programme_director', 'surname', 'project_manager'], ['programme_director' => $programme_id], 'result');

			foreach ($project as $value_one) {

				$project_id = $value_one->id;

				$trainer = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				foreach ($trainer as  $value_two) {

					$trainer_id = $value_two->id;

					$trainer_provider = $value_two->company_name;

					if ($type == 'assessor') {

						$data[] = $this->accessrecord('assessor', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'moderator') {

						$data[] = $this->accessrecord('moderator', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'facilitator') {

						$data[] = $this->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'learner') {

						$data[] = $this->accessrecord('learner', [], ['trining_provider' => $trainer_provider], 'result');
					}
				}
			}
		}

		return $data;
	}



	//-----------Admin Report End---------------------//

	//-----------Project Report Start-----------------//

	public function porjectmanagerReportdata($id)
	{

		$project_manager = $this->accessrecord('project_manager', ['id', 'project_manager'], ['id' => $id], 'result');

		$i = 1;

		$sum_trainer = 0;
		$sum_assessor = 0;
		$sum_moderator = 0;
		$sum_facilitator = 0;
		$sum_learner = 0;

		if (!empty($project_manager)) {

			foreach ($project_manager as $key => $value_two) {

				$projectid = $value_two->id;

				$project_manager[$key]->total_project_manager = $value_two->id;

				$trainer = $this->accessrecord('trainer', ['id', 'project_id', 'full_name', 'company_name'], ['project_id' => $projectid], 'result');

				if (!empty($trainer)) {

					foreach ($trainer as $value_three) {

						$sum_trainer = $sum_trainer + 1;

						$trainerid = $value_three->id;

						$project_manager[$key]->total_trainer = $sum_trainer;

						$trainer_name = $value_three->company_name;

						$assessor = $this->accessrecord('assessor', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');



						if (!empty($assessor)) {

							foreach ($assessor as $value_four) {

								$sum_assessor = $sum_assessor + 1;

								$assessor_id = $value_four->trainer_id;

								$project_manager[$key]->total_assessor = $sum_assessor;
							}
						}

						$moderator = $this->accessrecord('moderator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

						if (!empty($moderator)) {

							foreach ($moderator as $value_five) {

								$sum_moderator = $sum_moderator + 1;

								$project_manager[$key]->total_moderator = $sum_moderator;

								$moderator_id = $value_five->trainer_id;
							}
						}

						$facilitator = $this->accessrecord('facilitator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

						if (!empty($facilitator)) {

							foreach ($facilitator as $value_six) {

								$sum_facilitator = $sum_facilitator + 1;

								$project_manager[$key]->total_facilitator = $sum_facilitator;

								$facilitator_id = $value_six->trainer_id;
							}
						}



						$learner = $this->accessrecord('learner', ['id', 'trining_provider'], ['trining_provider' => $trainer_name], 'result');

						if (!empty($learner)) {

							foreach ($learner as $value_seven) {

								$sum_learner = $sum_learner + 1;

								$learner_id = $value_seven->trining_provider;

								$project_manager[$key]->total_learner = $sum_learner;
							}
						}
					}
				} else {

					$project_manager[$key]->total_assessor = 0;

					$project_manager[$key]->total_moderator = 0;

					$project_manager[$key]->total_facilitator = 0;

					$project_manager[$key]->total_learner = 0;
				}
			}
		}

		return $project_manager;
	}

	public function projectmangertrainerIdWise($id, $type)
	{

		$project = $this->accessrecord('project_manager', ['id', 'fullname', 'organization', 'surname', 'project_manager'], ['id' => $id], 'result');

		foreach ($project as $value_one) {

			$project_id = $value_one->id;

			$trainer = $this->accessrecord('trainer', [], ['project_id' => $id], 'result');

			foreach ($trainer as  $value_two) {

				$trainer_id = $value_two->id;

				$trainer_provider = $value_two->company_name;

				if ($type == 'assessor') {

					$data[] = $this->accessrecord('assessor', [], ['trainer_id' => $trainer_id], 'result');
				}

				if ($type == 'moderator') {

					$data[] = $this->accessrecord('moderator', [], ['trainer_id' => $trainer_id], 'result');
				}
				if ($type == 'external_moderator') {

					$data[] = $this->accessrecord('external_moderator', [], ['trainer_id' => $trainer_id], 'result');
				}

				if ($type == 'facilitator') {

					$data[] = $this->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');
				}

				if ($type == 'learner') {

					$data[] = $this->accessrecord('learner', [], ['trining_provider' => $trainer_provider], 'result');
				}
			}
		}

		if (!empty($data)) {

			return $data;
		} else {

			$data = "";

			return $data;
		}
	}

	//-----------Proiect Report End-------------------//

	//-----------Programme Report Start-----------------//

	public function programmeReportdata($id)
	{

		$programme = $this->accessrecord('programme_director', ['id', 'organisation_id', '	project_director'], ['id' => $id], 'result');

		if (!empty($programme)) {

			$sum_director = 0;
			$sum_mngr = 0;
			$sum_trainer = 0;
			$sum_assessor = 0;
			$sum_moderator = 0;
			$sum_facilitator = 0;
			$sum_learner = 0;

			foreach ($programme as $key => $value_one) {

				$programme[$key]->total_programme_director = $value_one->id;

				$programmeid = $value_one->id;

				$organisationid = $value_one->organisation_id;

				$project_manager = $this->accessrecord('project_manager', ['id', 'programme_director'], ['programme_director' => $programmeid], 'result');

				if (!empty($project_manager)) {

					foreach ($project_manager as $value_two) {

						$sum_director = $sum_director + 1;

						$projectid = $value_two->id;

						$programme[$key]->total_project_manager = $sum_director;

						$trainer = $this->accessrecord('trainer', ['id', 'project_id', 'full_name,company_name'], ['project_id' => $projectid], 'result');

						if (!empty($trainer)) {

							foreach ($trainer as $value_three) {

								$sum_trainer = $sum_trainer + 1;

								$trainerid = $value_three->id;

								$programme[$key]->total_trainer = $sum_trainer;

								$trainer_name = $value_three->company_name;

								$assessor = $this->accessrecord('assessor', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

								if (!empty($assessor)) {

									foreach ($assessor as $value_four) {

										$sum_assessor = $sum_assessor + 1;

										$assessor_id = $value_four->trainer_id;

										$programme[$key]->total_assessor = $sum_assessor;
									}
								}

								$moderator = $this->accessrecord('moderator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

								if (!empty($moderator)) {

									foreach ($moderator as $value_five) {

										$sum_moderator = $sum_moderator + 1;

										$programme[$key]->total_moderator = $sum_moderator;

										$moderator_id = $value_five->trainer_id;
									}
								}

								$facilitator = $this->accessrecord('facilitator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

								if (!empty($facilitator)) {

									foreach ($facilitator as $value_six) {

										$sum_facilitator = $sum_facilitator + 1;

										$programme[$key]->total_facilitator = $sum_facilitator;

										$facilitator_id = $value_six->trainer_id;
									}
								}

								$learner = $this->accessrecord('learner', ['id', 'trining_provider'], ['trining_provider' => $trainer_name], 'result');

								if (!empty($learner)) {

									foreach ($learner as $value_seven) {

										$sum_learner = $sum_learner + 1;

										$learner_id = $value_seven->trining_provider;

										$programme[$key]->total_learner = $sum_learner;
									}
								}
							}
						}
					}
				}
			}
		} else {

			$programme[$key]->total_programme_director = 0;

			$programme[$key]->total_project_manager = 0;

			$programme[$key]->total_trainer = 0;

			$programme[$key]->total_assessor = 0;

			$programme[$key]->total_moderator = 0;

			$programme[$key]->total_facilitator = 0;

			$programme[$key]->total_learner = 0;
		}

		return $programme;
	}

	public function programmeTrainingIdWise($id, $type)
	{

		$programme = $this->accessrecord('programme_director', ['id', 'organisation_id'], ['id' => $id], 'result');

		foreach ($programme as $key => $value) {

			$programme_id = $value->id;

			$project = $this->accessrecord('project_manager', [], ['programme_director' => $programme_id], 'result');

			foreach ($project as $value_one) {

				$project_id = $value_one->id;

				$trainer = $this->accessrecord('trainer', [], ['project_id' => $project_id], 'result');

				foreach ($trainer as  $value_two) {

					$trainer_id = $value_two->id;

					$trainer_provider = $value_two->company_name;

					if ($type == 'assessor') {

						$data[] = $this->accessrecord('assessor', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'moderator') {

						$data[] = $this->accessrecord('moderator', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'facilitator') {

						$data[] = $this->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');
					}

					if ($type == 'learner') {

						$data[] = $this->accessrecord('learner', [], ['trining_provider' => $trainer_provider], 'result');
					}
				}
			}
		}

		if (!empty($data)) {

			return $data;
		} else {

			$data = "";

			return $data;
		}
	}

	public function progammerTraining($id)
	{

		$programme = $this->accessrecord('organisation', ['id', '	organisation_name'], ['id' => $id], 'result');

		if (!empty($programme)) {

			foreach ($programme as $key => $value_one) {

				$programmeid = $value_one->id;

				$project_manager = $this->accessrecord('project_manager', ['id,project_manager'], ['organization' => $programmeid], 'result');

				if (!empty($project_manager)) {

					foreach ($project_manager as $value_two) {

						$projectid = $value_two->id;

						if ($dt = $this->accessrecord('trainer', [], ['project_id' => $projectid], 'result')) {
							foreach ($dt as $k => $v) {
								if (!empty($value_two->project_manager)) {
									$dt[$k]->project_manager = $value_two->project_manager;
								} else {
									$dt[$k]->project_manager = '';
								}
							}
							$trainer[] = $dt;
						}
					}
				}
			}
		}

		if (!empty($trainer)) {

			return $trainer;
		} else {

			$trainer = "";

			return $trainer;
		}
	}

	//-----------Programme Report End-----------------//

	//-----------Organisation Report Start-----------------//

	public function OrganisationReportdata($table, $id)
	{

		$organisation = $this->accessrecord($table, ['id,organisation_name'], ['id' => $id], 'result');

		$i = 1;

		if (!empty($organisation)) {

			foreach ($organisation as $key => $value) {

				$organisation[$key]->total_organisation = $value->id;

				$organisation_id = $value->id;



				$programme = $this->accessrecord('programme_director', ['id', 'organisation_id'], ['organisation_id' => $organisation_id], 'result');

				if (!empty($programme)) {

					$organisation[$key]->total_programme_director = sizeof($programme);

					$sum_director = 0;
					$sum_mngr = 0;
					$sum_trainer = 0;
					$sum_assessor = 0;
					$sum_moderator = 0;
					$sum_facilitator = 0;
					$sum_learner = 0;

					foreach ($programme as $value_one) {

						$programmeid = $value_one->id;

						$organisationid = $value_one->organisation_id;

						$project_manager = $this->accessrecord('project_manager', ['id', 'programme_director'], ['programme_director' => $programmeid], 'result');

						if (!empty($project_manager)) {

							foreach ($project_manager as $value_two) {

								$sum_director = $sum_director + 1;

								$projectid = $value_two->id;

								$organisation[$key]->total_project_manager = $sum_director;

								$trainer = $this->accessrecord('trainer', ['id', 'project_id', 'full_name', 'company_name'], ['project_id' => $projectid], 'result');

								if (!empty($trainer)) {

									foreach ($trainer as $value_three) {

										$sum_trainer = $sum_trainer + 1;

										$trainerid = $value_three->id;

										$organisation[$key]->total_trainer = $sum_trainer;

										$trainer_name = $value_three->company_name;

										$assessor = $this->accessrecord('assessor', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($assessor)) {

											foreach ($assessor as $value_four) {

												$sum_assessor = $sum_assessor + 1;

												$assessor_id = $value_four->trainer_id;

												$organisation[$key]->total_assessor = $sum_assessor;
											}
										}

										$moderator = $this->accessrecord('moderator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($moderator)) {

											foreach ($moderator as $value_five) {

												$sum_moderator = $sum_moderator + 1;

												$organisation[$key]->total_moderator = $sum_moderator;

												$moderator_id = $value_five->trainer_id;
											}
										}

										$facilitator = $this->accessrecord('facilitator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

										if (!empty($facilitator)) {

											foreach ($facilitator as $value_six) {

												$sum_facilitator = $sum_facilitator + 1;

												$organisation[$key]->total_facilitator = $sum_facilitator;

												$facilitator_id = $value_six->trainer_id;
											}
										}

										$learner = $this->accessrecord('learner', ['id', 'trining_provider'], ['trining_provider' => $trainer_name], 'result');

										if (!empty($learner)) {

											foreach ($learner as $value_seven) {

												$sum_learner = $sum_learner + 1;

												$learner_id = $value_seven->trining_provider;

												$organisation[$key]->total_learner = $sum_learner;
											}
										}
									}
								}
							}
						}
					}
				} else {

					$organisation[$key]->total_programme_director = 0;

					$organisation[$key]->total_project_manager = 0;

					$organisation[$key]->total_trainer = 0;

					$organisation[$key]->total_assessor = 0;

					$organisation[$key]->total_moderator = 0;

					$organisation[$key]->total_facilitator = 0;

					$organisation[$key]->total_learner = 0;
				}
			}
		}

		return $organisation;
	}

	public function OrganisationReportProjectdata($id)
	{

		$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id');

		$this->db->from('programme_director');

		$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

		$this->db->where('organisation.id', $id);

		$query = $this->db->get();

		$programme = $query->result();

		foreach ($programme as $key => $value) {

			$programme_id = $value->programme_id;

			$project[] = $this->accessrecord('project_manager', [], ['programme_director' => $programme_id], 'result');
		}

		return $project;
	}

	public function OrganisationReportTrainingdata($id)
	{

		$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id');

		$this->db->from('programme_director');

		$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

		$this->db->where('organisation.id', $id);

		$query = $this->db->get();

		$programme = $query->result();

		foreach ($programme as $key => $value) {

			$programme_id = $value->programme_id;

			$project = $this->accessrecord('project_manager', [], ['programme_director' => $programme_id], 'result');

			foreach ($project as $value_one) {

				$project_id = $value_one->id;

				$trainer[] = $this->accessrecord('trainer', [], ['project_id' => $project_id], 'result');
			}
		}

		return $trainer;
	}



	//-----------Organisation Report End---------------------//

	//-----------Training Provider Report Start-----------------//

	public function TrainingProviderReportdata($id)
	{

		$trainer = $this->accessrecord('trainer', ['id', 'project_id', 'full_name', 'company_name'], ['id' => $id], 'result');

		$sum_trainer = 0;
		$sum_assessor = 0;
		$sum_moderator = 0;
		$sum_facilitator = 0;
		$sum_learner = 0;

		if (!empty($trainer)) {

			foreach ($trainer as $key => $value_three) {

				$sum_trainer = $sum_trainer + 1;

				$trainerid = $value_three->id;

				$trainer[$key]->total_trainer = $sum_trainer;

				$trainer_name = $value_three->company_name;

				$assessor = $this->accessrecord('assessor', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

				if (!empty($assessor)) {

					foreach ($assessor as $value_four) {

						$sum_assessor = $sum_assessor + 1;

						$assessor_id = $value_four->trainer_id;

						$trainer[$key]->total_assessor = $sum_assessor;
					}
				}

				$moderator = $this->accessrecord('moderator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

				if (!empty($moderator)) {

					foreach ($moderator as $value_five) {

						$sum_moderator = $sum_moderator + 1;

						$trainer[$key]->total_moderator = $sum_moderator;

						$moderator_id = $value_five->trainer_id;
					}
				}

				$facilitator = $this->accessrecord('facilitator', ['id', 'trainer_id'], ['trainer_id' => $trainerid], 'result');

				if (!empty($facilitator)) {

					foreach ($facilitator as $value_six) {

						$sum_facilitator = $sum_facilitator + 1;

						$trainer[$key]->total_facilitator = $sum_facilitator;

						$facilitator_id = $value_six->trainer_id;
					}
				}

				$learner = $this->accessrecord('learner', ['id', 'trining_provider'], ['trining_provider' => $trainer_name], 'result');

				if (!empty($learner)) {

					foreach ($learner as $value_seven) {

						$sum_learner = $sum_learner + 1;

						$learner_id = $value_seven->trining_provider;

						$trainer[$key]->total_learner = $sum_learner;
					}
				}
			}
		}

		return $trainer;
	}

	public function TrainingProviderIdWise($id, $type)
	{

		$trainer = $this->accessrecord('trainer', ['id', 'full_name', 'company_name', 'surname', 'project_id'], ['id' => $id], 'result');

		foreach ($trainer as  $value_two) {

			$trainer_id = $value_two->id;

			$trainer_provider = $value_two->company_name;

			if ($type == 'assessor') {

				$data[] = $this->accessrecord('assessor', [], ['trainer_id' => $trainer_id], 'result');
			}

			if ($type == 'moderator') {

				$data[] = $this->accessrecord('moderator', [], ['trainer_id' => $trainer_id], 'result');
			}

			if ($type == 'facilitator') {

				$data[] = $this->accessrecord('facilitator', [], ['trainer_id' => $trainer_id], 'result');
			}

			if ($type == 'learner') {

				$data[] = $this->accessrecord('learner', [], ['trining_provider' => $trainer_provider], 'result');
			}
		}

		return $data;
	}

	//-----------Training Provider Report End---------------------//

	public function searchLearner($table, $learner_nm, $type)
	{

		if ($type == 'search') {

			$response = array();

			$this->db->select('*');

			if ($learner_nm) {

				$this->db->where("first_name like '%" . $learner_nm . "%' ");

				$result = $this->db->get($table)->result();

				foreach ($result as $row) {

					$response[] = array("label" => $row->first_name);
				}
			}

			return $response;
		}

		if ($type == 'get') {

			$this->db->select('learner.id as learner_id,learner.trining_provider,learner.first_name,learner.surname,learner.learnershipSubType,learner.id_number,learner.classname,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id ,project_manager.fullname');

			$this->db->from($table);

			$this->db->join('trainer', 'trainer.company_name = learner.trining_provider', 'left');

			$this->db->join('project_manager', 'project_manager.id = trainer.project_id', 'left');

			$this->db->where('learner.first_name', $learner_nm);

			$query = $this->db->get();

			return $query->row_array();
		}
	}

	public function TrainingLearnerMark($type, $id)
	{

		if ($type == 'project_manager') {

			$this->db->select('trainer.id,trainer.project_id,project_manager.id as project_id,project_manager.fullname,project_manager.project_manager');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'project_manager.id = trainer.project_id', 'left');

			$this->db->where('trainer.id', $id);

			$query = $this->db->get();

			return $query->row();
		}

		if ($type == 'programme_director') {

			$this->db->select('trainer.id,trainer.project_id,project_manager.id as project_id,project_manager.fullname,programme_director.id as programme_id,programme_director.project_director');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'project_manager.id = trainer.project_id', 'left');

			$this->db->join('programme_director', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('trainer.id', $id);

			$query = $this->db->get();

			return $query->row();
		}
	}

	public function LearnerShipUnit($learnership)
	{

		$this->db->select('learnership_sub_type.*,learner.first_name,learner.surname,learner.id_number,learner.id as learner_id,learner.trining_provider,learner.classname');

		$this->db->from('learnership_sub_type');

		$this->db->join('learner', 'learner.learnershipSubType = learnership_sub_type.sub_type', 'left');

		$this->db->where('learnership_sub_type.sub_type', $learnership);

		$query = $this->db->get();

		$record = $query->result();

		foreach ($record as $key => $value) {

			$data[] = $value;

			$unit_standard = $value->unit_standard;

			$unitstandard = explode(',', $unit_standard);
		}

		foreach ($unitstandard as $key_two => $value_three) {

			$unit_id = $value_three;

			$units[] = $this->accessrecord('units', ['`id`, `user_type`, `title as unit_title`, `standard_id`, `total_credits`, `unit_standard_type`, `created_by`, `created`, `updated`'], ['id' => $unit_id], 'result');
		}

		$result = array('leanerlist' => $data, 'unitnumber' => $units, 'totallearner' => count($data));

		return $result;
	}



	public function attendanceList($table, $id)
	{

		$this->db->select('DISTINCT(learner_id),learner_name,learner_surname,learner_id_number,learnership_sub_type,classname,learner_id');

		$this->db->where($id);

		$query = $this->db->get($table);

		return $query->result();
	}



	public function programmeTrainingdata($id, $type)
	{

		if ($type == 'programme_director') {

			$this->db->select('project_manager.*,programme_director,*');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $value_one) {

				$project_id = $value_one->id;

				$data = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				return $data;
			}
		}
	}

	function importDataLearnerMarks()
	{

		$data = $this->_batchImport;

		$this->db->insert_batch('learner_marks', $data);
	}

	public function AccountBalanceData($type, $id = 0)
	{

		if ($type == 'account_balance') {

			$this->db->select('finance_expense_item.id as expense_id,finance_expense_item.funding_id as expense_funding_id, finance_expense_item.expense_type,finance_expense_item.expense_name,finance_expense_item.expense_amount,finance_income_item.date,finance_income_item.amount,finance_income_item.payer,finance_income_item.description,finance_income_item.funding_id as income_funding_id,finance_income_item.id as income_id');

			$this->db->from('finance_expense_item');

			$this->db->join('finance_income_item', 'finance_income_item.funding_id = finance_expense_item.funding_id', 'left');

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $key => $value) {

					$funding_id = $value->expense_funding_id;

					if ($funding_id == $value->income_funding_id) {

						$this->db->select('funding_id as expensefunding_id, SUM(expense_amount) as expense_amount');

						$this->db->from('finance_expense_item');

						$this->db->where('funding_id', $funding_id);

						$query_one = $this->db->get();

						$data[$funding_id] = $query_one->row();

						$incomeData = $this->accessrecord('finance_income_item', ['amount', 'funding_id'], ['funding_id' => $funding_id], 'row');

						$data[$funding_id]->amount = $incomeData->amount;

						$data[$funding_id]->income_funding_id = $incomeData->funding_id;

						$data[$funding_id]->remaining_amount = $incomeData->amount - $data[$funding_id]->expense_amount;
					}
				}

				if (!empty($data)) {

					$res = $data;
				} else {

					$res = "";
				}

				$result = $res;
			} else {

				$result = "";
			}

			return $result;
		}



		if ($type == 'total_account') {

			$this->db->select('SUM(amount) as total_income');

			$this->db->from('finance_income_item');

			$this->db->where('project_id', $id);

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $key => $value) {

					$this->db->select('SUM(expense_amount) as expense_amount');

					$this->db->from('finance_expense_item');

					$this->db->where('project_id', $id);

					$query_one = $this->db->get();

					$record_one = $query_one->result();

					if (!empty($record_one)) {

						$record[$key]->project_id = $id;

						$record[$key]->expense_amount = $record_one[$key]->expense_amount;

						$record[$key]->expense_project_id = $id;
					}
				}

				return $record;
			} else {

				return false;
			}
		}



		if ($type == 'programmer_total_account') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			$sum_income = 0;
			$sum_expense_amount = 0;

			if (!empty($record)) {

				foreach ($record as $keyone => $valueone) {

					$projectid = $valueone->projectid;

					$record[$keyone]->programme_director = $valueone->programme_director;

					$this->db->select('SUM(amount) as total_income');

					$this->db->from('finance_income_item');

					$this->db->where('project_id', $projectid);

					$queryone = $this->db->get();

					$recordone = $queryone->result();

					if (!empty($recordone)) {

						foreach ($recordone as $key => $value) {

							$sum_income = $sum_income + $value->total_income;

							$record[$keyone]->total_income  = $sum_income;

							$this->db->select('SUM(expense_amount) as expense_amount');

							$this->db->from('finance_expense_item');

							$this->db->where('project_id', $projectid);

							$query_one = $this->db->get();

							$record_one = $query_one->result();

							if (!empty($record_one)) {

								foreach ($record_one as $key_two => $value_two) {

									$sum_expense_amount = $sum_expense_amount + $value_two->expense_amount;

									// $record[$keyone]->expensefunding_id = $value_two->expensefunding_id;

									$record[$keyone]->expense_amount = $sum_expense_amount;

									$record[$keyone]->expense_project_id = $projectid;
								}
							}
						}
					}
				}

				$res = sizeof($record);

				if (!empty($res)) {

					$index = $res - 1;

					return $record[$index];
				} else {

					return false;
				}
			} else {

				return false;
			}
		}



		if ($type == 'programmer_total_income') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $keyone => $valueone) {

					$projectid = $valueone->projectid;

					$this->db->select('*');

					$this->db->from('finance_income_item');

					$this->db->where('project_id', $projectid);

					$queryone = $this->db->get();

					$recordone = $queryone->result();

					if (!empty($recordone)) {

						foreach ($recordone as $key => $value) {

							$result[] = $value;
						}
					}
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}

		if ($type == 'programmer_total_count_income') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $keyone => $valueone) {

					$projectid = $valueone->projectid;

					$this->db->select('*');

					$this->db->from('finance_income_item');

					$this->db->where('project_id', $projectid);

					$queryone = $this->db->get();

					$record_one = $queryone->result();

					if (!empty($record_one)) {

						foreach ($record_one as $key => $value) {

							$result[] = $value->amount;
						}
					}
				}
			}

			if (!empty($result)) {

				$sum = array_sum($result);

				return $sum;
			} else {

				return false;
			}
		}

		if ($type == 'programmer_total_expense') {

			$result = array();

			$this->db->select('project_manager.id as project_id,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $keyone => $valueone) {

					$this->db->select('*');

					$this->db->from('finance_expense_item');

					$this->db->where('project_id', $valueone->project_id);

					$query_one = $this->db->get();

					$record_one = $query_one->result();

					if (!empty($record_one)) {

						foreach ($record_one as $key => $value) {

							$result[] = $value;
						}
					}
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}

		if ($type == 'programmer_total_count_expense') {

			$result = array();

			$this->db->select('project_manager.id as project_id,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			if (!empty($record)) {

				foreach ($record as $keyone => $valueone) {

					$this->db->select('*');

					$this->db->from('finance_expense_item');

					$this->db->where('project_id', $valueone->project_id);

					$query_one = $this->db->get();

					$record_one = $query_one->result();

					if (!empty($record_one)) {

						foreach ($record_one as $key => $value) {

							$result[] = $value->expense_amount;
						}
					}
				}
			}

			if (!empty($result)) {

				$sum = array_sum($result);

				return $sum;
			} else {

				return false;
			}
		}

		if ($type == 'admin_total_account') {

			$sum_income = 0;
			$sum_expense_amount = 0;

			$this->db->select('SUM(amount) as total_income');

			$this->db->from('finance_income_item');

			$queryone = $this->db->get();

			$record = $queryone->result();

			if (!empty($record)) {

				foreach ($record as $key => $value) {

					$this->db->select('SUM(expense_amount) as expense_amount');

					$this->db->from('finance_expense_item');

					$query_one = $this->db->get();

					$record_one = $query_one->result();

					if (!empty($record_one)) {

						//$record[$key]->expensefunding_id = $record_one[$key]->expensefunding_id;

						$record[$key]->expense_amount = $record_one[$key]->expense_amount;

						//$record[$key]->expense_project_id = $record_one[$key]->expense_project_id;

					}
				}

				return $record;
			} else {

				return false;
			}
		}
	}

	public function ProgrammeDirectorLearnerMark($id, $type)
	{
		$result = [];
		if ($type == 'programme_director') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $value_one) {

				$project_id = $value_one->projectid;

				$data = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				foreach ($data as $key => $value) {

					$company_name = $value->company_name;

					$result[]  =  $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name], 'result');
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}

		if ($type == 'project_manager') {

			$this->db->select('project_manager.id as projectid,trainer.*');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'trainer.project_id = project_manager.id', 'left');

			$this->db->where('project_manager.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $key => $value) {

				$company_name = $value->company_name;

				$result[]  =  $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name], 'result');
			}

			return $result;
		}

		if ($type == 'organisation') {

			$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id,project_manager.id as projectid,project_manager.programme_director');

			$this->db->from('programme_director');

			$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('organisation.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $value_one) {

				$project_id = $value_one->projectid;

				$data = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				foreach ($data as $key => $value) {

					$company_name = $value->company_name;

					$result[]  =  $this->common->accessrecord('learner_marks', [], ['training_provider' => $company_name], 'result');
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}
	}

	public function ProgrammeDirectorAttendance($id, $type)
	{

		$result = [];
		if ($type == 'project_manager') {

			$this->db->select('project_manager.id as projectid,trainer.*');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'trainer.project_id = project_manager.id', 'left');

			$this->db->where('project_manager.id', $id);

			$query = $this->db->get();

			$record = $query->result();


			foreach ($record as $key => $value) {

				$company_name = $value->company_name;

				$result[]  =  $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');
			}
			// print_r($result); die;

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}

		if ($type == 'programme_director') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $value_one) {

				$project_id = $value_one->projectid;

				$data = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				foreach ($data as $key => $value) {

					$company_name = $value->company_name;

					$result[]  =  $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}

		if ($type == 'organisation') {

			$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id,project_manager.id as projectid,project_manager.programme_director');

			$this->db->from('programme_director');

			$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('organisation.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $value_one) {

				$project_id = $value_one->projectid;

				$data = $this->accessrecord('trainer', ['id', 'full_name', 'surname', 'project_id', 'company_name'], ['project_id' => $project_id], 'result');

				foreach ($data as $key => $value) {

					$company_name = $value->company_name;

					$result[]  =  $this->common->accessrecord('attendance', [], ['training_provider' => $company_name], 'result');
				}
			}

			if (!empty($result)) {

				return $result;
			} else {

				return false;
			}
		}
	}

	public function projectmangertrainingproviderIdWise($id, $type)
	{

		$trainer = $this->accessrecord('trainer', ['id,company_name'], ['project_id' => $id], 'result');

		$sum_trainer = 0;
		$sum_assessor = 0;
		$sum_moderator = 0;
		$sum_facilitator = 0;
		$sum_learner = 0;

		if ($type == 'assessor') {

			if (!empty($trainer)) {

				foreach ($trainer as $key => $value_three) {

					$sum_trainer = $sum_trainer + 1;

					$trainerid = $value_three->id;

					$trainer[$key]->total_trainer = $sum_trainer;

					$trainer_name = $value_three->company_name;

					$assessor = $this->accessrecord('assessor', [], ['trainer_id' => $trainerid], 'result');

					if (!empty($assessor)) {

						foreach ($assessor as $value_four) {

							$sum_assessor = $sum_assessor + 1;

							$assessor_id = $value_four->trainer_id;

							$trainer[$key]->total_assessor = $sum_assessor;

							//$trainer[$key]->assessor=$assessor;

						}
					}
				}

				return $trainer;
			}
		}

		if ($type == 'moderator') {

			if (!empty($trainer)) {

				foreach ($trainer as $key => $value_three) {

					$sum_trainer = $sum_trainer + 1;

					$trainerid = $value_three->id;

					$trainer[$key]->total_trainer = $sum_trainer;

					$trainer_name = $value_three->company_name;

					$moderator = $this->accessrecord('moderator', [], ['trainer_id' => $trainerid], 'result');

					if (!empty($moderator)) {

						foreach ($moderator as $value_five) {

							$sum_moderator = $sum_moderator + 1;

							$trainer[$key]->total_moderator = $sum_moderator;

							//$trainer[$key]->moderator = $moderator;

						}
					}
				}
			}

			return $trainer;
		}

		if ($type == 'facilitator') {

			if (!empty($trainer)) {

				foreach ($trainer as $key => $value_three) {

					$sum_trainer = $sum_trainer + 1;

					$trainerid = $value_three->id;

					$trainer[$key]->total_trainer = $sum_trainer;

					$trainer_name = $value_three->company_name;

					$assessor = $this->accessrecord('assessor', [], ['trainer_id' => $trainerid], 'result');

					$facilitator = $this->accessrecord('facilitator', [], ['trainer_id' => $trainerid], 'result');

					if (!empty($facilitator)) {

						foreach ($facilitator as $value_six) {

							$sum_facilitator = $sum_facilitator + 1;

							$trainer[$key]->total_facilitator = $sum_facilitator;
						}
					}

					$learner = $this->accessrecord('learner', [], ['trining_provider' => $trainer_name], 'result');

					if (!empty($learner)) {

						foreach ($learner as $value_seven) {

							$sum_learner = $sum_learner + 1;

							$learner_id = $value_seven->trining_provider;

							$trainer[$key]->total_learner = $sum_learner;
						}
					}
				}
			}

			return $trainer;
		}

		if ($type == 'learner') {

			if (!empty($trainer)) {

				foreach ($trainer as $key => $value_three) {

					$sum_trainer = $sum_trainer + 1;

					$trainerid = $value_three->id;

					$trainer[$key]->total_trainer = $sum_trainer;

					$trainer_name = $value_three->company_name;

					$learner = $this->accessrecord('learner', [], ['trining_provider' => $trainer_name], 'result');

					if (!empty($learner)) {

						foreach ($learner as $value_seven) {

							$sum_learner = $sum_learner + 1;

							$learner_id = $value_seven->trining_provider;

							$trainer[$key]->total_learner = $sum_learner;

							//$trainer[$key]->learner = $learner;

						}
					}
				}
			}

			return $trainer;
		}
	}

	public function ProjectLearnerIdWise($id, $type)
	{

		if ($type == 'learner') {

			$this->db->select('learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');

			$this->db->from('learner');

			$this->db->join('trainer', 'trainer.company_name = learner.trining_provider', 'left');

			$this->db->where('trainer.id', $id);

			$query = $this->db->get();

			return $query->result();
		}
	}

	public function Projectdropout($type, $id)
	{

		if ($type == 'drop_out') {

			$this->db->select('project_manager.id as projectid,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'project_manager.id = trainer.project_id', 'left');

			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');

			$this->db->where('project_manager.id', $id);

			$query = $this->db->get();

			$record = $query->result();
			// echo $this->db->last_query();
			foreach ($record as $key => $value) {

				$data = $this->accessrecord('drop_out', [], ['learner_id' => $value->id], 'result');
				// echo $this->db->last_query();
				// die;
				return $data;
			}
		}

		if ($type == 'stipend') {

			$this->db->select('project_manager.id as projectid,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');

			$this->db->from('trainer');

			$this->db->join('project_manager', 'project_manager.id = trainer.project_id', 'left');

			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');

			$this->db->where('project_manager.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $key => $value) {

				return $data = $this->accessrecord('stipend', [], ['provider_id' => $value->trainer_id], 'result');
			}
		}
	}

	public function programmeDorpout($type, $id)
	{

		if ($type == 'drop_out') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');

			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $key => $value) {

				return $data = $this->accessrecord('drop_out', [], ['learner_id' => $value->id], 'result');
			}
		}

		if ($type == 'stipend') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');
			$this->db->from('programme_director');
			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');
			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');
			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');
			$this->db->where('programme_director.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				return $data = $this->accessrecord('stipend', [], ['provider_id' => $value->trainer_id], 'result');
			}
		}
	}

	public function Organisationdropout($type, $id)
	{

		if ($type == 'drop_out') {

			$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id,project_manager.id as projectid,project_manager.programme_director,programme_director.id,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');

			$this->db->from('programme_director');
			$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');
			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');
			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');
			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');
			$this->db->where('organisation.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				return $data = $this->accessrecord('drop_out', [], ['learner_id' => $value->id], 'result');
			}
		}

		if ($type == 'stipend') {

			$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id,project_manager.id as projectid,project_manager.programme_director,programme_director.id,learner.*,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');
			$this->db->from('programme_director');
			$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');
			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');
			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');
			$this->db->join('learner', 'trainer.company_name = learner.trining_provider', 'left');
			$this->db->where('organisation.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				return $data = $this->accessrecord('stipend', [], ['provider_id' => $value->trainer_id], 'result');
			}
		}
	}

	public function ProjectManagerClass($type, $id)
	{

		if ($type == 'project_manager') {

			$this->db->select('project_manager.id as projectid,trainer.*');
			$this->db->from('trainer');
			$this->db->join('project_manager', 'trainer.project_id = project_manager.id', 'left');
			$this->db->where('project_manager.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				$trainer_id = $value->id;
				$result[]  =  $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');
			}
			if (!empty($result)) {
				return $result;
			} else {
				return false;
			}
		}
		if ($type == 'programme_director') {

			$this->db->select('project_manager.id as projectid,project_manager.programme_director,programme_director.id,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');
			$this->db->from('programme_director');
			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');
			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');
			$this->db->where('programme_director.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				$trainer_id = $value->trainer_id;
				$result[]  =  $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');
			}
			if (!empty($result)) {
				return $result;
			} else {
				return false;
			}
		}
		if ($type == 'organisation') {

			$this->db->select('organisation.id,programme_director.organisation_id,programme_director.id as programme_id,project_manager.id as projectid,project_manager.programme_director,programme_director.id,trainer.company_name AS trainer_name,trainer.project_id,trainer.id as trainer_id');
			$this->db->from('programme_director');
			$this->db->join('organisation', 'organisation.id = programme_director.organisation_id', 'left');
			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');
			$this->db->join('trainer', 'project_manager.id = trainer.project_id', 'left');
			$this->db->where('organisation.id', $id);
			$query = $this->db->get();
			$record = $query->result();
			foreach ($record as $key => $value) {
				$trainer_id = $value->trainer_id;
				$result[]  =  $this->common->accessrecord('class_name', [], ['trainer_id' => $trainer_id], 'result');
			}
			if (!empty($result)) {
				return $result;
			} else {
				return false;
			}
		}
	}

	public function ProgrammeDirectorBankDetail($type, $id)
	{

		if ($type == 'programme_director') {

			$this->db->select('programme_director.id,project_manager.*');

			$this->db->from('programme_director');

			$this->db->join('project_manager', 'programme_director.id = project_manager.programme_director', 'left');

			$this->db->where('programme_director.id', $id);

			$query = $this->db->get();

			$record = $query->result();

			foreach ($record as $key => $value) {

				$project_id = $value->id;

				$result[]  =  $this->common->accessrecord('finance_bank_details', [], ['project_id' => $project_id], 'result');
			}
			if (!empty($result)) {
				return $result;
			} else {
				return false;
			}
		}
	}

	public function deleteUser($user_ids = array())
	{

		foreach ($user_ids as $userid) {
			$this->db->delete('attendance', array('learner_id' => $userid));
			$this->db->delete('complaints_and_suggestions', array('learner_id' => $userid));
			$this->db->delete('drop_out', array('learner_id' => $userid));
			$this->db->delete('stipend', array('learner_id' => $userid));
			$this->db->delete('learner', array('id' => $userid));
		}
		return 1;
	}

	public function getTrainingRejectedLerner($trainer_nm)
	{
		$result = $this->db->select('*')
			->where('trining_provider', $trainer_nm)
			->where('learner_accepted_training', '')
			->or_where('learner_accepted_training', 'no')
			->get('learner')->result();
		return $result;
	}

	public function getTrainerQuarterlyReport($id)
	{
		$result = $this->db->select('quarterly_progress_report.*, trainer.company_name')
			->from('quarterly_progress_report')
			->join('trainer', 'trainer.id = quarterly_progress_report.training_provider_name', 'left')
			->where('quarterly_progress_report.training_provider_name', $id)
			->get()->result();
		return $result;
	}

	public function getTasklist($id, $organization_id)
	{
		$result = $this->db->select('task.*, project.project_name')
			->from('task')
			->join('project', 'task.project = project.project_name')
			->where('task.project_manager', $id)
			->where('task.organization', $organization_id)
			->get()->result();
		return $result;
	}
	public function accessrecordLearnerjoin($table, $select, $where, $want)
	{

		$this->db->select('learner.*, learnership.name AS learnshipname, learnership.id As learnership_id, learnership_sub_type.sub_type AS sublearnshipname, learnership_sub_type.id As sublearnship_id');
		$this->db->from('learner');
		$this->db->join('learnership', 'learnership.id = learner.learnship_id');
		$this->db->join('learnership_sub_type', 'learnership_sub_type.id = learner.learnershipSubType');
		$this->db->where('learner.id_number', $where);

		$query = $this->db->get();

		return $query->result();
	}

	public function get_learnername($id){
		$this->db->select('learner.*, learnership.name AS learnshipname, learnership.id As learnership_id, learnership_sub_type.sub_type AS sublearnshipname, learnership_sub_type.id As sublearnship_id');
		$this->db->from('learner');
		$this->db->join('learnership', 'learnership.id = learner.learnship_id');
		$this->db->join('learnership_sub_type', 'learnership_sub_type.id = learner.learnershipSubType');
		$this->db->where('learner.id_number', $id);

		$query = $this->db->get();

		return $query->result();

	}

	// Assessments

	public function assessmentList()
	{

	    $this->db->select('*');

	    $query = $this->db->get('assessment');

	    return $query->result();
	}

	public function assessmentListByProjectManager($project_manager_id)
	{

	    $result = $this->db->select('assessment.*, class_name.class_name, units.title as unit_standard')
    	    ->from('assessment')
    	    ->join('class_name', 'class_name.id = assessment.class_id')
    	    ->join('units', 'units.id = assessment.unit_standard')
    	    ->where('assessment.created_by', $project_manager_id)
    	    ->get()
    	    ->result();

	    return $result;
	}

	/**
	 * Get all assessments for given learner
	 *
	 * @param unknown $learner_id
	 * @return unknown
	 */
	public function assessmentListByLearner($learner_id)
	{

	    //  select * from learner_assessment
	    // right join assessment on assessment.id = learner_assessment.assessment_id
	    // join class_name on class_name.id = assessment.class_id
	    // join learner on learner.classname = class_name.class_name

	    $select_fields = [
	        'learner_assessment.*',
	        'learner.first_name',
	        'learner.surname',
	        'assessment.id as assessment_id',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
	        'assessment.title',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'programme_name',
	        'programme_number',
	        'intervention_name'
	    ];


	    $result = $this->db->select($select_fields)
	    ->from('learner_assessment')
	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id', 'right')
	    ->join('class_name', 'class_name.id = assessment.class_id')
	    ->join('learner', 'learner.classname = class_name.class_name')
	    ->where('learner.id', $learner_id)
	    ->get()
	    ->result();

	    return $result;


// 	    $result = $this->db->select('*')
// 	    ->from('assessment')
// 	    ->join('class_name', 'class_name.id = assessment.classname')
// 	    ->join('elearner', 'elearner.class_name = class_name.id')
// 	    ->join('learner', 'learner.trainer_id = elearner.trainer_id')
// 	    ->where('learner.id', $learner_id)
// 	    ->get()
// 	    ->result();

// 	    return $result;
	}

	public function compeletedAssessmentListByFacilitator($facilitator_id)
	{

	    /*
	     select * from learner_assessment
	     left join assessment on assessment.id = learner_assessment.assessment_id
	     left join class_name on class_name.id = assessment.classname
	     where class_name.facilitator_id = 1
        */

	    $select_fields = [
	        'learner_assessment.*',
	        'learner.first_name',
	        'learner.surname',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
            'assessment.title',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'intervention_name'
	    ];


	    $result = $this->db->select($select_fields)
 	    ->from('learner_assessment')
 	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id')
 	    ->join('class_name', 'class_name.id = assessment.class_id')
 	    ->join('learner', 'learner.id = learner_assessment.learner_id')
 	    ->where('class_name.facilitator_id', $facilitator_id)
 	    ->get()
 	    ->result();

	    return $result;
	}

    /**
     * Load all submitted assessments for this assessor.
     * for now, we link the class organisation to the assessor organisation
     *
     * @param integer $assessorid
     * @return mixed
     */

	public function compeletedAssessmentListByAssessor($assessorid)
	{
	    $select_fields = [
	        'learner_assessment.*',
	        'learner.first_name',
	        'learner.surname',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
	        'assessment.title',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'programme_name',
	        'programme_number',
	        'intervention_name'
	    ];


	    $result = $this->db->select($select_fields)
	    ->from('learner_assessment')
	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id')
	    ->join('class_name', 'class_name.id = assessment.class_id')
	    ->join('learner', 'learner.id = learner_assessment.learner_id')
	    ->join('assessor', 'assessor.organization = class_name.organization')
	    ->get()
	    ->result();

	    return $result;
	}

	public function compeletedAssessmentListByID($learner_assessment_id)
	{

	    $select_fields = [
	        'learner_assessment.*',
	        'learner.first_name',
	        'learner.surname',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
	        'assessment.title',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'intervention_name'
	    ];


	    $result = $this->db->select($select_fields)
	    ->from('learner_assessment')
	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id')
	    ->join('class_name', 'class_name.id = assessment.class_id')
	    ->join('learner', 'learner.id = learner_assessment.learner_id')
	    ->where('learner_assessment.id', $learner_assessment_id)
	    ->get()
	    ->row();

	    return $result;
	}


	public function CompletedAssessmentListByOrganisation($organisation_id)
	{

	    $select_fields = [
	        'learner_assessment.*',
	        'learner.first_name',
	        'learner.surname',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
	        'assessment.title',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'programme_name',
	        'programme_number',
	        'intervention_name'
	    ];

	    $result = $this->db->select($select_fields)
	    ->from('learner_assessment')
	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id')
	    ->join('class_name', 'class_name.id = assessment.classname')
	    ->join('learner', 'learner.id = learner_assessment.learner_id')
	    ->where('class_name.organization', $organisation_id)
	    ->get()
	    ->result();

	    return $result;
	}


	public function AssessmentModerationListsByOrganisation($organisation_id)
	{

	    $select_fields = [
	        'assessment.id',
	        'assessment.assessment_start_date',
	        'assessment.assessment_end_date',
	        'assessment.title',
	        'assessment.status as status',
	        'assessment.created_date',
	        'assessment.updated_date',
	        'assessment_type',
	        'submission_type',
	        'class_name.class_name',
	        'unit_standard',
	        'intervention_name'
	    ];

// 	    $result = $this->db->select($select_fields)
// 	    ->from('learner_assessment')
// 	    ->join('assessment', 'assessment.id = learner_assessment.assessment_id')
// 	    ->join('class_name', 'class_name.id = assessment.class_id')
// 	    ->join('learner', 'learner.id = learner_assessment.learner_id')
// 	    ->where('class_name.organization', $organisation_id)
// 	    ->get()
// 	    ->result();

	    $result = $this->db->select($select_fields)
	    ->from('assessment')
	    ->join('class_name', 'class_name.id = assessment.class_id')
	    ->join('learner_assessment', 'assessment.id = learner_assessment.assessment_id')
	    ->where('class_name.organization', $organisation_id)
	    ->get()
	    ->result();

	    return $result;
	}



}

