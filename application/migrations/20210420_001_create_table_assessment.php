<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_20210420_001_create_table_assessment extends CI_Migration {

    public function up()
    {

        /*


CREATE TABLE `class_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `upload_learner_guide` varchar(255) NOT NULL,
  `upload_learner_guide_name` varchar(255) NOT NULL,
  `upload_workbook` varchar(255) NOT NULL,
  `upload_workbook_name` varchar(255) NOT NULL,
  `upload_poe` varchar(255) NOT NULL,
  `upload_poe_name` varchar(255) NOT NULL,
  `upload_facilitator_guide` varchar(255) NOT NULL,
  `upload_facilitator_guide_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;



CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_start_date` DATETIME NOT NULL,
  `assessment_end_date` DATETIME NOT NULL,
  `title` varchar(255) NOT NULL,
  `assessment_type` varchar(255) NOT NULL,
  `submission_type` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `unit_standard` varchar(255) NOT NULL,
  `programme_name` varchar(255) DEFAULT NULL,
  `programme_number` varchar(255) DEFAULT NULL,
  `intervention_name` varchar(255) DEFAULT NULL,
  `upload_learner_guide` varchar(255) NOT NULL,
  `upload_learner_workbook` varchar(255) NOT NULL,
  `upload_learner_poe` varchar(255) NOT NULL,
  `upload_facilitator_guide` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
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

  `upload_assessed_workbook` varchar(255) NOT NULL,
  `upload_assessed_workbook_name` varchar(255) NOT NULL,
  `upload_assessed_learner_feedback` varchar(255) NOT NULL,
  `upload_assessed_learner_feedback_name` varchar(255) NOT NULL,
  `upload_assessed_overall_report` varchar(255) NOT NULL,
  `upload_assessed_overall_report_name` varchar(255) NOT NULL,


  `upload_moderated_poe` varchar(255) NOT NULL,
  `upload_moderated_poe_name` varchar(255) NOT NULL,

  `internal_moderation_status` varchar(255) NOT NULL,
  `internal_moderation_by` int(11) DEFAULT NULL,
  `internal_moderation_date` DATETIME NOT NULL,
  `internal_moderation_notes` text DEFAULT NULL,

  `external_moderation_status` varchar(255) NOT NULL,
  `external_moderation_by` int(11) DEFAULT NULL,
  `external_moderation_date` DATETIME NOT NULL,
  `external_moderation_notes` text DEFAULT NULL,

  `upload_moderated_learner_guide` varchar(255) NOT NULL,
  `upload_moderated_learner_guide_name` varchar(255) NOT NULL,
  `upload_moderated_workbook` varchar(255) NOT NULL,
  `upload_moderated_workbook_name` varchar(255) NOT NULL,
  `upload_moderated_poe` varchar(255) NOT NULL,
  `upload_moderated_poe_name` varchar(255) NOT NULL,

  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

  `competency_status` varchar(255),

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `learner_assessment_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_assessment_id` int(11) NOT NULL,
  `assessment_submission_date` DATETIME NOT NULL,

  `upload_completed_learner_guide` varchar(255) NOT NULL,
  `upload_completed_learner_guide_name` varchar(255) NOT NULL,
  `upload_completed_workbook` varchar(255) NOT NULL,
  `upload_completed_workbook_name` varchar(255) NOT NULL,
  `upload_completed_poe` varchar(255) NOT NULL,
  `upload_completed_poe_name` varchar(255) NOT NULL,

  `assessment_status` varchar(255) NOT NULL,
  `assessed_by` int(11) DEFAULT NULL,
  `assessment_date` DATETIME NOT NULL,
  `assessment_notes` text DEFAULT NULL,
  `learner_feedback` text DEFAULT NULL,
  `overall_assessment` text DEFAULT NULL,

  `marked_status` varchar(255) NOT NULL;
  `marked_by` int(11) DEFAULT NULL,
  `marked_date` DATETIME NOT NULL,

  `upload_marked_learner_guide` varchar(255) NOT NULL,
  `upload_marked_learner_guide_name` varchar(255) NOT NULL,
  `upload_marked_workbook` varchar(255) NOT NULL,
  `upload_marked_workbook_name` varchar(255) NOT NULL,
  `upload_marked_poe` varchar(255) NOT NULL,
  `upload_marked_poe_name` varchar(255) NOT NULL,

  `assessment_mark` varchar(255),
  `competency_status` varchar(255),

  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


ALTER TABLE `moderation_report` ADD COLUMN `sample_percentage` int(11) DEFAULT NULL;
ALTER TABLE `moderation_report` ADD COLUMN `assessment_id` int(11) DEFAULT NULL;
ALTER TABLE `moderation_report` ADD COLUMN `status` varchar(255) DEFAULT NULL;


ALTER TABLE `class_name` ADD COLUMN `upload_learner_guide` varchar(255) DEFAULT NULL;
ALTER TABLE `class_name` ADD COLUMN `upload_learner_guide_name` varchar(255) DEFAULT NULL;

ALTER TABLE `class_name` ADD COLUMN `intervention` varchar(255) DEFAULT NULL;

ALTER TABLE `assessment` ADD COLUMN `facilitator_status` varchar(255) DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `assessor_status` varchar(255) DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `assessment_update_date` DATETIME NULL DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `internal_moderator_status` varchar(255) DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `internal_moderator_update_date` DATETIME NULL DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `external_moderator_status` varchar(255) DEFAULT NULL;
ALTER TABLE `assessment` ADD COLUMN `external_moderator_update_date` DATETIME NULL DEFAULT NULL;


ALTER TABLE `assessment` ADD COLUMN `upload_assessed_overall_report` varchar(255) NOT NULL;
ALTER TABLE `assessment` ADD COLUMN `upload_assessed_overall_report_name` varchar(255) NOT NULL;


ALTER TABLE `learner` ADD COLUMN `tax_reference` varchar(255) DEFAULT NULL;



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