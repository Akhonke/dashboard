<?php
namespace application\models;

use CI_Model;


class Assessment_model extends CI_Model {

    const DB_TABLE = 'assessment';

    public $id;
    public $assessment_start_date;
    public $assessment_end_date;
    public $title;
    public $assessment_type;
    public $submission_type;
    public $class_name;
    public $unit_standard;
    public $programme_name;
    public $programme_number;
    public $intervention_name;
    public $upload_learner_guide;
    public $upload_learner_workbook;
    public $upload_learner_poe;
    public $upload_facilitator_guide;
    public $created_by;
    public $created_date;
    public $updated_date;


    public function insert()
    {
            $this->id = $id_;
            $this->assessment_start_date = $assessment_start_date_;
            $this->assessment_end_date = $assessment_end_date_;
            $this->title = $title_;
            $this->assessment_type = $assessment_type_;
            $this->submission_type = $submission_type_;
            $this->class_name = $class_name_;
            $this->unit_standard = $unit_standard_;
            $this->programme_name = $programme_name_;
            $this->programme_number = $programme_number_;
            $this->intervention_name = $intervention_name_;
            $this->upload_learner_guide = $upload_learner_guide_;
            $this->upload_learner_workbook = $upload_learner_workbook_;
            $this->upload_learner_poe = $upload_learner_poe_;
            $this->upload_facilitator_guide = $upload_facilitator_guide_;
            $this->created_by = $created_by_;
            $this->created_date = $created_date;
            $this->updated_date = $updated_date;

        $this->db->insert(self::DB_TABLE, $this);
    }

}

