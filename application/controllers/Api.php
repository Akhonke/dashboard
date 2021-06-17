	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class Api extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}


		public function get_module_uploads()
		{

		    $module_id = $this->input->post('value');

		    $module_uploads = $this->common->accessrecord('class_module', ['*'], ['id' => $module_id], 'row');
		    $class = $this->common->accessrecord('class_name', ['*'], ['id' => $module_uploads->class_id], 'row');

		    $markup = '<h6>Assessment Material</h6>';
		    $markup .= '<p>The following material is used for this assessment.</p>';

 		    $markup .= '<p><label class="form-control-label">Learner Guide : </span></label>';
 		    $markup .= '<a href="/uploads/class/learner_guide/' . $class->upload_learner_guide . '" target="_blank">Download the Learner Guide - ' . $class->upload_learner_guide_name . '</a></p>';

		    $markup .= '<p><label class="form-control-label">Learner Workbook : </span></label>';
		    $markup .= '<a href="/uploads/class/learner_workbook/' . $module_uploads->upload_workbook . '" target="_blank">Download the Learner Workbook - ' . $module_uploads->upload_workbook_name . '</a></p>';

		    $markup .= '<p><label class="form-control-label">Learner POE : </span></label>';
		    $markup .= '<a href="/uploads/class/learner_poe/' . $module_uploads->upload_poe . '" target="_blank">Download the Learner POE - ' . $module_uploads->upload_poe_name . '</a></p>';

		    $markup .= '<p><label class="form-control-label">Facilitator Guide : </span></label>';
		    $markup .= '<a href="/uploads/class/facilitator_guide/' . $module_uploads->upload_facilitator_guide . '" target="_blank">Download the Facilitator Guide - ' . $module_uploads->upload_facilitator_guide_name . '</a></p>';

		    echo $markup;

		}

		public function get_class()
		{

		    $class_id = $this->input->post('value');

		    $record = $this->common->accessrecord('class_name', [], ['id' => $class_id], 'row');

		    if (!empty($record)) {

		        $data = $record;
		    } else {

		        $data = array('error' => 'No match for class name found.');
		    }

		    echo json_encode($data);
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

	}