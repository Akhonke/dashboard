<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_20210420_001_create_table_assessment extends CI_Migration {

    public function up()
    {

        /*

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_start_date` DATETIME NOT NULL,
  `assessment_end_date` DATETIME NOT NULL,
  `title` varchar(255) NOT NULL,
  `assessment_type` varchar(255) NOT NULL,
  `submission_type` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `unit_standard` varchar(255) NOT NULL,
  `programme_name` varchar(255) DEFAULT NULL,
  `programme_number` varchar(255) DEFAULT NULL,
  `intervention_name` varchar(255) DEFAULT NULL,
  `upload_learner_guide` varchar(255) NOT NULL,
  `upload_learner_workbook` varchar(255) NOT NULL,
  `upload_learner_poe` varchar(255) NOT NULL,
  `upload_facilitator_guide` varchar(255) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_by_role` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `learner_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `upload_completed_learner_guide` varchar(255) NOT NULL,
  `upload_completed_learner_guide_name` varchar(255) NOT NULL,
  `upload_completed_workbook` varchar(255) NOT NULL,
  `upload_completed_workbook_name` varchar(255) NOT NULL,
  `upload_completed_poe` varchar(255) NOT NULL,
  `upload_completed_poe_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `assessed_by` int(11) DEFAULT NULL,
  `assessment_notes` text DEFAULT NULL,
  `learner_feedback` text DEFAULT NULL,
  `overall_assessment` text DEFAULT NULL,
  `upload_marked_learner_guide` varchar(255) NOT NULL,
  `upload_marked_learner_guide_name` varchar(255) NOT NULL,
  `upload_marked_workbook` varchar(255) NOT NULL,
  `upload_marked_workbook_name` varchar(255) NOT NULL,
  `upload_marked_poe` varchar(255) NOT NULL,
  `upload_marked_poe_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


         */

//         $this->dbforge->add_field(array(
//             'assessment_id' => array(
//                 'type' => 'INT',
//                 'constraint' => 5,
//                 'unsigned' => TRUE,
//                 'auto_increment' => TRUE
//             ),
//             'assessment_start_date' => array(
//                 'type' => 'DATE',
//                 'constraint' => '100',
//             ),
//             'assessment_start_date' => array(
//                 'type' => 'TEXT',
//                 'null' => TRUE,
//             ),
//         ));
//         $this->dbforge->add_key('assessment_id', TRUE);
//         $this->dbforge->create_table('assessment');
    }

    public function down()
    {
//         $this->dbforge->drop_table('assessment');
    }
}