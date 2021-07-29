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

		    $module_uploads = $this->common->accessrecord('module', ['*'], ['id' => $module_id], 'row');
		    $class = $this->common->accessrecord('class_name', ['*'], ['id' => $module_uploads->class_id], 'row');

		    $markup = '<h6>Assessment Material</h6>';
		    $markup .= '<p>The following material is used for this assessment.</p>';

		    $markup .= '<div class="row">';

		    $markup .= '<div class="col-md-3">';
		    $markup .= '   <a href="/uploads/class/learner_guide/' . $class->upload_learner_guide . '" target="_blank"><img src="/assets/web/img/download_learner_guide_icon.png" style="width:120px;"></a>';
		    $markup .= '   <p>' . $class->upload_learner_guide_name . '</p>';
		    $markup .= '</div>';

		    $markup .= '<div class="col-md-3">';
		    $markup .= '   <a href="/uploads/class/learner_workbook/' . $module_uploads->upload_workbook . '" target="_blank"><img src="/assets/web/img/download_learner_workbook_icon.png" style="width:120px;"></a>';
		    $markup .= '   <p>' . $module_uploads->upload_workbook_name . '</p>';
		    $markup .= '</div>';

		    $markup .= '<div class="col-md-3">';
		    $markup .= '   <a href="/uploads/class/learner_poe/' . $module_uploads->upload_poe . '" target="_blank"><img src="/assets/web/img/download_learner_poe_icon.png" style="width:120px;"></a>';
		    $markup .= '   <p>' . $module_uploads->upload_poe_name . '</p>';
		    $markup .= '</div>';

		    $markup .= '<div class="col-md-3">';
		    $markup .= '   <a href="/uploads/class/facilitator_guide/' . $module_uploads->upload_facilitator_guide . '" target="_blank"><img src="/assets/web/img/download_facilitator_guide.png" style="width:120px;"></a>';
		    $markup .= '   <p>' . $module_uploads->upload_facilitator_guide_name . '</p>';
		    $markup .= '</div>';

		    $markup .= '</div>';

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

		public function online_result()
		{

		    $post_vars = $_POST;

		    if (empty($post_vars['assessment_id']))  {
		        $response = ['result' => false, 'Message' => 'Invalid assessment id.'];
		        return json_encode($response);
		    }


		    $assessment = $this->common->accessrecord('assessment', [], ['id' => $post_vars['assessment_id']], 'row');



		    $learner_assessment_data = [
		        'assessment_id' => $post_vars['assessment_id'],
		        'learner_id' => $post_vars['learner_id'],
		        'status' => 'submitted for marking',
		        'internal_moderation_status' => '',
		        'created_date' => date('Y-m-d H:i:s'),
		        'updated_date' => date('Y-m-d H:i:s'),
		    ];

		    $learner_assessment_id = $this->common->insertData('learner_assessment', $data);

		    if ($learner_assessment_id) {

		        $submission_data = [
		            'learner_assessment_id'               => $learner_assessment_id,
		            'assessment_submission_date'          => date('Y-m-d H:i:s'),
		            'assessment_status'                   => 'submitted for marking',
		            'created_date' => date('Y-m-d H:i:s'),
		            'updated_date' => date('Y-m-d H:i:s'),
		        ];

		        $this->common->insertData('learner_assessment_submission', $submission_data);

		}


	}