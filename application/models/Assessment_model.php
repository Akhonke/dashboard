<?php
namespace application\models;

use CI_Model;


class AssessmentModel extends CI_Model {

    const DB_TABLE = 'assessment';

    public int $id;
    public string $assessment_start_date;
    public string $assessment_end_date;
    public string $title;
    public string $assessment_type;
    public string $submission_type;
    public string $class_name;
    public string $unit_standard;
    public string $programme_name;
    public string $programme_number;
    public string $intervention_name;
    public string $upload_learner_guide;
    public string $upload_learner_workbook;
    public string $upload_learner_poe;
    public string $upload_facilitator_guide;
    public int $created_by;
    public string $created_date;
    public string $updated_date;

//     public assessment(int id_,DateTime assessment_start_date_,DateTime assessment_end_date_,string title_,string assessment_type_,string submission_type_,string class_name_,string unit_standard_,string programme_name_,string programme_number_,string intervention_name_,string upload_learner_guide_,string upload_learner_workbook_,string upload_learner_poe_,string upload_facilitator_guide_,int created_by_,byte[] created_date_,byte[] updated_date_)
//     {
//         $this->id = $id_;
//         $this->assessment_start_date = $assessment_start_date_;
//         $this->assessment_end_date = $assessment_end_date_;
//         $this->title = $title_;
//         $this->assessment_type = $assessment_type_;
//         $this->submission_type = $submission_type_;
//         $this->class_name = $class_name_;
//         $this->unit_standard = $unit_standard_;
//         $this->programme_name = $programme_name_;
//         $this->programme_number = $programme_number_;
//         $this->intervention_name = $intervention_name_;
//         $this->upload_learner_guide = $upload_learner_guide_;
//         $this->upload_learner_workbook = $upload_learner_workbook_;
//         $this->upload_learner_poe = $upload_learner_poe_;
//         $this->upload_facilitator_guide = $upload_facilitator_guide_;
//         $this->created_by = $created_by_;
//         $this->created_date = $created_date_;
//         $this->updated_date = $updated_date_;
//     }

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


    // Send message to all students in class
    public function email_students_in_class($class_name, $subject, $message) {

    }
}

