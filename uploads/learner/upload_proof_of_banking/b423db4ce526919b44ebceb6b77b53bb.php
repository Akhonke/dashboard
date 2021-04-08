<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projectmanager extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	    if (empty($this->session->userdata['projectmanager'])) {
		 	redirect("projectmanager");
	    }
	}
    public function dashboard(){
		$this->data['page'] = 'dashboard';
		$this->data['content'] = 'pages/dashboard/dashboard';
		$this->load->view('project-manager/tamplate', $this->data);
	}

    public function changepassword(){
		$this->data['page'] = 'changepassword';
		$this->data['content'] = 'changepassword';
	    if ($_POST) {
	    	$id = projectmanagerid();
	    	$oldpassword = $this->input->post('oldpassword');
	    	$password = $this->input->post('password');
			$datau = $this->common->accessrecord(TBL_Project_Manager, ['id, password'], array('id'=>$id), 'row');
		    if ($datau->password == sha1($oldpassword)) {
				$this->common->updateData(TBL_Project_Manager, array('password'=>sha1($password)), array('id'=>$id));
				$this->session->set_flashdata('success', 'Your Password Successfully Update');
				redirect('projectmanager-changepassword');
			}else{
				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}
		$this->load->view('project-manager/tamplate', $this->data);
	}

    public function forgot_password(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		if($this->form_validation->run()==FALSE){
			echo "failed"; 
		}else{
			extract($_POST);
			$user = $this->common->accessrecord(TBL_Project_Manager, ['*'], array('email'=>$email), 'row');
			if(!empty($user)){
				 $getId = $user->id;
				$newpas = rand(6,1000000);
				$this->common->updateData(TBL_Project_Manager, array('password'=>sha1($newpas)), array('email_address'=>$email));
				$message = 'Your password is successfully updated!! <br>your new password is - '.$newpas; 
				 if($html = $this->Email_model->send_email_to_admin($email,$message)){
					$this->load->library('email');
					$this->email->from('slashtechnologies007@gmail.com','LEARNING MANEGMENT');
					$this->email->to($email);
					$this->email->subject('Password is successfully updated');
					$this->email->set_mailtype("html");
					$this->email->message($html);
					if($this->email->send()){
					echo json_encode(array('status'=>'success', 'msg'=>'Your password is successfully updated check your email for current password !!'));
					}else{
					echo json_encode(array('status'=>'error', 'msg'=>'Your request email is not currect!!'));
					}
				}

			}
		}
	}

    public function editprofile(){
        $id = projectmanagerid();
		if ($_POST) {
			if (!empty($_FILES['tax_clearances']['name'])) {
                       $tax_clearances['tax_clearances']=$this->singlefileupload('tax_clearances','./uploads/project/tax_clearance/','gif|jpg|png|xls|doc|docx|jpeg');
                    }else{
                    	$tax_clearance =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$tax_clearances['tax_clearances'] = $tax_clearance->tax_clearance;
                    }
                    if (!empty($_FILES['moderator_accreditations']['name'])) {
                       $moderator_accreditations['moderator_accreditations']=$this->singlefileupload('moderator_accreditations','./uploads/project/moderator_accreditations/','gif|jpg|png|xls|doc|docx|jpeg');
                    }else{
                    	$moderator =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$moderator_accreditations['moderator_accreditations'] = $moderator->moderator_accreditations;
                    }
                    if (!empty($_FILES['assesor_acreditation']['name'])) {
                       $assesor_acreditations['assesor_acreditations']=$this->singlefileupload('assesor_acreditation','./uploads/project/assesor_acreditations/','gif|jpg|png|xls|doc|docx|jpeg');
                    }else{
                    	$assesor =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$assesor_acreditations['assesor_acreditations'] = $assesor->assesor_acreditations;
                    }
                    if (!empty($_FILES['seta_creditiations']['name'])) {
                       $seta_creditiations['seta_creditiations']=$this->singlefileupload('seta_creditiations','./uploads/project/seta_creditiations/','gif|jpg|png|xls|doc|docx|jpeg');
                    }else{
                    	$seta =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$seta_creditiations['seta_creditiations'] = $seta->seta_creditiations;
                    }
                    if (!empty($_FILES['company_documents']['name'])) {
                    	$path = "./uploads/project/company_documents/";
						$image = $this->MultipleImageUpload($_FILES['company_documents'], $path, 'company_documents');
						$company_documents_regi =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$company_image = $company_documents_regi->company_registration_documents;
						$gallery = "";
					    foreach ($image as $value) {
					     	$gallery .= $value.",";
				        }
                        $company_files = rtrim($gallery,',');
                        if(!empty($company_files)){
                        	if(!empty($company_image)){
					            $company_documents['company_documents'] = $company_image.','.$company_files;
					        }else{
					    	    $company_documents['company_documents'] = $company_files;
					        }
					    }else{
					      $company_documents['company_documents'] = $company_image;
					    }
				    }else{
                    	$company_documents_regi =$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
                    	$company_documents['company_documents'] = $company_documents_regi->company_registration_documents;
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

	                $data = array(
						            'project_manager'=> $this->input->post('project_manager'),
						            'project_name'=> $this->input->post('project_name'),
						            'programme_director'=> $this->input->post('programme_director'),
						          //'project_start_date'=> $this->input->post('project_start_date'),
						            'project_end_date'=> $this->input->post('project_end_date'),
						            'q1_start_date'=> $this->input->post('q1_start_date'),
						            'q1_end_date'=> $this->input->post('q1_end_date'),
						            'q2_start_date'=> $this->input->post('q2_start_date'),
						            'q2_end_date'=> $this->input->post('q2_end_date'),
						            'q3_start_date'=> $this->input->post('q3_start_date'),  
						            'q3_end_date'=> $this->input->post('q3_end_date'),
						            'q4_start_date'=> $this->input->post('q4_start_date'),
						            'q4_end_date'=> $this->input->post('q4_end_date'),
						            'email_address'=> $this->input->post('email_address'),
						            'landline_number'=> $this->input->post('landline_number'),
						            'mobile_number'=> $this->input->post('mobile_number'), 
						            'tax_clearance'=>$tax_clearances['tax_clearances'],
						            'company_registration_documents'=> $company_documents['company_documents'],
						            'moderator_accreditations'=>$moderator_accreditations['moderator_accreditations'],
						            'assesor_acreditations'=>$assesor_acreditations['assesor_acreditations'],
						           'seta_creditiations'=>$seta_creditiations['seta_creditiations'],
						          
						          
						           'Suburb'=> $this->input->post('Suburb'),
							        'Street_name'=> $this->input->post('Street_name'),
							        'Street_number'=> $this->input->post('Street_number'),
							        'fullname'=> $this->input->post('fullname'),
							        'surname'=> $this->input->post('surname'),
							        'district'=> $district_name,
							        'region'=> $region_name,
							        'city'=> $city_name,
							        'province'=> $this->input->post('province'),
						        );
			        if($this->common->updateData('project_manager',$data,array('id'=>$id))){
	                     $this->session->set_flashdata('success','Project Updated Succesfully');
						redirect('projectmanager-editprofile');
				    }else {
					  $this->session->set_flashdata('error', 'Please Try Again');
					  redirect('projectmanager-editprofile');
	                }
		}else{
			$this->data['record']=$this->common->accessrecord('project_manager', [], ['id'=>projectmanagerid()], 'row');
			$this->data['programme_director']=$this->common->accessrecord('programme_director', [], [], 'result');
			$this->data['District']=$this->common->get_District();
			$this->data['province']=$this->common->get_province();
			$this->data['region']=$this->common->get_region();
			$this->data['city']=$this->common->get_city();
        	$this->data['page'] = 'editprofile';
			$this->data['content'] = 'pages/myprofile/editprofile';
			$this->load->view('project-manager/tamplate', $this->data);
		}
	}
	/*=================delete record============= */
	function deletedata(){
		$this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
	}
	/*=================end=========end=========== */
	public function logout(){
		$this->session->unset_userdata(projectmanagerid());
		$this->session->sess_destroy();
		redirect('projectmanager');
	}
	private function MultipleImageUpload($files, $path, $title) {
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
            $explode =explode('.', $image);
            $fileName = time(). '_'.$key.'.'.end($explode);
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
    private function singlefileupload($image,$path,$allowed_types){
        $config['upload_path']          = $path;
        $config['allowed_types']        = $allowed_types;
        $config['encrypt_name']         = TRUE; 
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']          = TRUE;
        $config['overwrite']            =TRUE;
        $config['file_ext_tolower']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($image)){
         echo  $this->upload->display_errors(); die;
        }else{
            $data = $this->upload->data();
            $name = $data['file_name'];   
            return $name;    
        }
    }
    public function change_leaner_status(){
		$reason = $this->input->post('text');
		$learner = $this->input->post('learner');
        $tablenm_id = $this->input->post('tablenm_id');
        $explode = explode('.',$tablenm_id);
        $tablenm = $explode[0];
        $id = $explode[1];
        $data = $this->common->updateData($tablenm,['learner_accepted_training'=>$learner,'reason'=>$reason],['id'=>$id]);
        if($data){
          echo json_encode(array('status' => 200));
        }
	}
    public function projectmanager_getdestrict(){
		$data = $_POST;
		$DistrictData=$this->common->get_District_province($data);
		if(!empty($DistrictData)){
           $District = $DistrictData;
	    }else{
           $District = array('error' => 'Destrict list not available in this province');
	    }
	    echo json_encode($District);
	}
    public function projectmanager_getregion(){
        $District = $this->common->one_District($this->input->post('value'));
        $district_id = $District->name;
		$regiondata=$this->common->get_region_District($district_id);
		if(!empty($regiondata)){
           $region = $regiondata;
	    }else{
           $region = array('error' => 'Region list not available in this destrict');
	    }
		echo json_encode($region);
	}
    public function projectmanager_getcity(){
	    $region = $this->common->one_region($this->input->post('value'));
	    $region_id = $region->region;
	    $regiondata = $this->common->get_region_city($region_id);
	    if(!empty($regiondata)){
           $region_data = $regiondata;
	    }else{
           $region_data = array('error' => 'City list not available in this region');
	    }
		echo json_encode($region_data);
	}
	public function  projectmanager_acreditations_file_delete(){
    	$table = $_POST['table'];
    	$id = $_POST['id'];
    	$file_index = $_POST['file_index'];
    	$acreditations_img =$this->common->accessrecord($table, [], ['id'=>$id], 'row');
	    $image_file = unserialize($acreditations_img->acreditations_file);
	    foreach ($image_file as  $key =>$value) {
	    	$image_id = $value['id'];
	    	if($image_id == $file_index){
            }else{
            	$data[] = $value;
            }
	    }
	    foreach($data as $key_one => $value_one){
			 $data[$key_one]['id'] = $key_one;
		}
		$file = serialize($data);
         $result = $this->common->updateData($table,['acreditations_file'=>$file],['id'=>$id]);
	    if($result){
	       echo "true";
	    }
    }
	public function projectmanager_create_training(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record'] = $this->common->one_trining($id);
		}
        if ($_POST) {
	        $data['company_name'] = $this->input->post('company_name');
            $data['full_name'] = $this->input->post('full_name');
            $data['surname'] = $this->input->post('surname');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['landline'] = $this->input->post('landline');
            $data['project_id'] = $this->input->post('project_id');
            $data['province'] = $this->input->post('province');
            $data['Suburb'] = $this->input->post('Suburb');
            $data['Street_name'] = $this->input->post('Street_name');
            $data['Street_number'] = $this->input->post('Street_number');
	        $district = $this->input->post('district');
			$District = $this->common->one_District($district);
		    $data['district'] = $District->name;
		    $region = $this->input->post('region');
			$regiondata = $this->common->one_region($region);
	        $data['region'] = $regiondata->region;
			$city = $this->input->post('city');
			$citydata = $this->common->one_city($city);
	        $data['city'] = $citydata->city;
        	if ($id != 0) {
			    $password = $_POST['password'];
				if($trainer = $this->common->accessrecord('trainer', [], ['id'=>$id,'password'=>$password], 'row')){
					$old_password = $trainer->password;
					if($old_password == $password){
						$data['password'] = $old_password;
					}else{
	                    $data['password'] = sha1($_POST['password']);
					}
			    }else{
	                $data['password'] = sha1($_POST['password']);
				}
				if (!empty($_FILES['attach_documents']['name'])) {
                    	$path = "./uploads/training/attach_documents/";
						$image = $this->MultipleImageUpload($_FILES['attach_documents'], $path, 'attach_documents');
						$company_documents_regi =$this->common->accessrecord('trainer', [], ['id'=>$id], 'row');
                    	$company_image = $company_documents_regi->attach_documents;
						$gallery = "";
					    foreach ($image as $value) {
					     	$gallery .= $value.",";
				        }
                        $company_files = rtrim($gallery,',');
                        if(!empty($company_files)){
                        	if(!empty($company_image)){
					          $data['attach_documents'] = $company_image.','.$company_files;
					        }else{
					        	 $data['attach_documents'] = $company_files;
					        }
					    }else{
					    	$data['attach_documents'] = $company_image;
					    }
				    }else{
                    	$company_documents_regi =$this->common->accessrecord('trainer', [], ['id'=>$id], 'row');
                    	$data['attach_documents'] = $company_documents_regi->attach_documents;
                    }
                    $data['user_type'] = 2;
				$this->common->updateData('trainer',$data,array('id'=>$id));
				$this->session->set_flashdata('success','Training Updated Succesfully');
				redirect('projectmanagertraining-list');
			}else{
                if (!empty($_FILES['attach_document']['name'])) {
						$path = "./uploads/training/attach_documents/";
						$image = $this->MultipleImageUpload($_FILES['attach_document'], $path, 'attach_document');
					    $gallery = "";
					    foreach ($image as $value) {
					     	$gallery .= $value.",";
					    }
					    $data['attach_documents'] = rtrim($gallery,',');
				    }else{
				    	$data['attach_documents'] = "";
				    }
				    $data['password'] = sha1($_POST['password']);
				    $data['user_type'] = 2;
				$training = $this->common->insertData('trainer',$data);
                $this->session->set_flashdata('success','Add Training Successfully');
				redirect('projectmanagertraining-list');
			}
        }
		$this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$this->data['project']=$this->common->accessrecord('project_manager', [], ['id'=>projectmanagerid()], 'result');
	    $this->data['page'] = 'create_training';
		$this->data['content'] = 'pages/training/create_training';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function projectmanager_training_list(){
		$id = projectmanagerid();
		$this->data['training']= $this->common->accessrecord('trainer', [], ['project_id'=>$id], 'result');
		$this->data['page'] = 'training_list';
		$this->data['content'] = 'pages/training/training_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
    public function create_learner(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record'] = $this->common->one_learner($id);
		}
		if ($_POST) {
		    $data = $_POST;
        	if ($id != 0) {
        		if(!empty($_FILES['upload_proof_of_bankings']['name'])){
					$path = './uploads/learner/upload_proof_of_banking/';
			         $images = $this->singlefileupload('upload_proof_of_bankings', $path,'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
					$data['upload_proof_of_banking'] = $images;
				}else{
					$upload_proof_of_banking =$this->common->accessrecord('learner', [], ['id'=>$id], 'row');
					$data['upload_proof_of_banking'] = $upload_proof_of_banking->upload_proof_of_banking;
				}
			    if(!empty($_FILES['id_copy']['name'])){
					$path = './uploads/learner/id_copy/';
					
					$images = $this->singlefileupload('id_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['id_copy'] = $images;
				}else{
					$learner =$this->common->accessrecord('learner', [], ['id'=>$id], 'row');
					$data['id_copy'] = $learner->id_copy;
				}
				if(!empty($_FILES['certificate_copy']['name'])){
					
					$path = './uploads/learner/certificate_copy/';
					$images = $this->singlefileupload('certificate_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['certificate_copy'] = $images;
				}else{
					$learner =$this->common->accessrecord('learner', [], ['id'=>$id], 'row');
					$data['certificate_copy'] = $learner->certificate_copy;
				}
				if(!empty($_FILES['contract_copy']['name'])){
					
					$path = './uploads/learner/contract_copy/';
					$images = $this->singlefileupload('contract_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['contract_copy'] = $images;
				}else{
					$learner =$this->common->accessrecord('learner', [], ['id'=>$id], 'row');
					$data['contract_copy'] = $learner->contract_copy;
				}
				$password = $_POST['password'];
				if($learner = $this->common->accessrecord('learner', [], ['id'=>$id,'password'=>$password], 'row')){
					$old_password = $learner->password;
					if($old_password == $password){
						$data['password'] = $old_password;
					}else{
	                    $data['password'] = sha1($_POST['password']);
					}
			    }else{
	                    $data['password'] = sha1($_POST['password']);
				}
                $district = $this->input->post('district');
				$District = $this->common->one_District($district);
			    $data['district'] = $District->name;
			    $region = $this->input->post('region');
				$regiondata = $this->common->one_region($region);
		        $data['region'] = $regiondata->region;
				$city = $this->input->post('city');
				$citydata = $this->common->one_city($city);
		        $data['city'] = $citydata->city;
			    $this->common->update_learner($id, $data);
				$this->session->set_flashdata('success','Learner Updated Succesfully');
				redirect('projectmanager-list-learner');
			}else{
				if(!empty($_FILES['upload_proof_of_banking']['name'])){
					$path = './uploads/learner/upload_proof_of_banking/';
				    $images = $this->singlefileupload('upload_proof_of_banking', $path,'gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
					$data['upload_proof_of_banking'] = $images;
				}
				if(!empty($_FILES['id_copy']['name'])){
					$path = './uploads/learner/id_copy';
					$images = $this->singlefileupload('id_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['id_copy'] = $images;
				}else{
					$data['id_copy'] ="";
				}
				if(!empty($_FILES['certificate_copy']['name'])){
					$path = './uploads/learner/certificate_copy/';
					$images = $this->singlefileupload('certificate_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['certificate_copy'] = $images;
				}else{
					$data['certificate_copy']="";
				}
				if(!empty($_FILES['contract_copy']['name'])){
				    $path = './uploads/learner/contract_copy/';
					$images = $this->singlefileupload('contract_copy', $path,'gif|jpg|png|xls|doc|docx|jpeg');
					$data['contract_copy'] = $images;
				}else{
					$data['contract_copy']  ="";
				}

		  	    $district = $this->input->post('district');
				$District = $this->common->one_District($district);
			    $data['district'] = $District->name;
			    $region = $this->input->post('region');
				$regiondata = $this->common->one_region($region);
		        $data['region'] = $regiondata->region;
				$city = $this->input->post('city');
				$citydata = $this->common->one_city($city);
		        $data['city'] = $citydata->city;
                $training = $this->common->save_learner($data);
                $this->session->set_flashdata('success','Add Learner Successfully');
				redirect('projectmanager-list-learner');
			}
            
		}
		$this->data['employer']=$this->common->accessrecord('employer', [], [], 'result');
		$this->data['learnership_sub_type']=$this->common->accessrecord('learnership_sub_type', [], [], 'result');
		$this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$projcetid =projectmanagerid();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['project_id'=>$projcetid], 'result');
		$this->data['classname']= $this->common->ProjectManagerClass('project_manager',$projcetid);;
	    $this->data['page'] = 'create_learner';
		$this->data['content'] = 'pages/learner/create_learner';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function list_learner(){
		$projcetid =projectmanagerid();
		$this->data['learner']  = $this->common->projectmangertrainerIdWise($projcetid,'learner');
		$this->data['page'] = 'learner_list';
		$this->data['content'] = 'pages/learner/learner_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function create_facilitator(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record']=$this->common->accessrecord('facilitator', [], ['id'=>$id], 'row');
	    }
	    if ($_POST) {
	    	if ($id != 0) {
	    		$array = [];
	    		if((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))){
	    		 	foreach ($_POST['acreditations_image'] as  $value_one) {
		    			$exp = explode(',', $value_one);
		    			$array_two[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			$id = $exp[0];
		    		}
		    		if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/facilitator/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        $increment_id = '';
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	            $increment_id = $id+1+$key;
			    	            $array_one[] =array('id'=>$increment_id,
						           'acreditations'=>$_POST['acreditations'][$increment_id],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		    $acreditations_files = array_merge($array_two,$array_one);
	    		}elseif(!empty($_POST['acreditations_image'])){
		    		foreach ($_POST['acreditations_image'] as $key => $value) {
		    			$exp = explode(',', $value);
		    			$array[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			
		    		}
		    	   $acreditations_files = $array;
	    		}else{
	    		   	if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/facilitator/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	        	$array[] =array('id'=>$key,
						           'acreditations'=>$_POST['acreditations'][$key],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		   	$acreditations_files = $array;
	    		}
	    		if(empty($acreditations_files)){
                   $acreditations_file = '';
	    		}else{
                    $acreditations_file = serialize($acreditations_files);
	    		}
	    		$password = $_POST['password'];
	    		if($facilitator = $this->common->accessrecord('facilitator', [], ['id'=>$id,'password'=>$password], 'row')){
					$old_password = $facilitator->password;
					if($old_password == $password){
						$pass = $old_password;
					}else{
	                    $pass = sha1($_POST['password']);
					}
			    }else{
	                $pass = sha1($_POST['password']);
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
			    $data = array('fullname'=>$this->input->post('fullname'),
				    		'surname'=>$this->input->post('surname'),
				    		'email'=>$this->input->post('email'),
				    		'id_number'=>$this->input->post('id_number'),
				    		'landline'=>$this->input->post('landline'),
				    		'mobile'=>$this->input->post('mobile'),
				    		'acreditations_file'=>$acreditations_file,
				    		'trainer_id'=>$this->input->post('trainer_id'),
				    		'created_by'=>$this->input->post('created_by'),
				    		'password'=>$pass,
				    		'Suburb'=> $this->input->post('Suburb'),
							'Street_name'=> $this->input->post('Street_name'),
				            'Street_number'=> $this->input->post('Street_number'),
				            'district'=> $district_name,
				             'user_type'=>2,
				            'region'=> $region_name,
				            'city'=> $city_name,
				            'province'=> $this->input->post('province'),
				            'classname'=>$this->input->post('classname'),
				    	);
    		    if($this->common->updateData('facilitator',$data,['id'=>$_GET['id']])){
			        $this->session->set_flashdata('success','Facilitator Update Successfully');
			        redirect('projectmanager-facilitator-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('projectmanager-facilitator-list');
                }
            }else{
            	$array = [];
		        if(!empty($_FILES['acreditations_file']['name'])){
			        $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
					if (!empty($arrayFilter)) {
						$path = './uploads/facilitator/acreditationsfiles/';
						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
						foreach ($_POST['acreditations'] as $key => $value) {
						    $array[]=array('id'=>$key,
								           'acreditations'=>$value,
								           'acreditations_file' =>$image[$key]
						                  );
					    }
					}
					$acreditations_file =serialize($array);
				}else{
					$acreditations_file = "";
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
					    $data = array('fullname'=>$this->input->post('fullname'),
					    		'surname'=>$this->input->post('surname'),
					    		'email'=>$this->input->post('email'),
					    		'id_number'=>$this->input->post('id_number'),
					    		'landline'=>$this->input->post('landline'),
					    		'mobile'=>$this->input->post('mobile'),
					    		'acreditations_file'=>$acreditations_file,
					    		'trainer_id'=>$this->input->post('trainer_id'),
					    		'created_by'=>$this->input->post('created_by'),
					    		'password'=>sha1($this->input->post('password')),
					    		'Suburb'=> $this->input->post('Suburb'),
							    'Street_name'=> $this->input->post('Street_name'),
							    'Street_number'=> $this->input->post('Street_number'),
							    'user_type'=>2,
							    'district'=> $district_name,
							    'region'=> $region_name,
							    'city'=> $city_name,
							    'province'=> $this->input->post('province'),
							    'classname'=>$this->input->post('classname'),
					    	);
					
			
				if($this->common->insertData('facilitator',$data)){
				   $this->session->set_flashdata('success','Facilitator Insert Successful');
				   redirect('projectmanager-facilitator-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('projectmanager-create-facilitator');
	            }
	        }
		    if($id!=0){
			   $this->data['facilitator']=$this->common->accessrecord('facilitator', [], ['id'=>$id], 'row');
		    }
	    }
	    $projcetid =projectmanagerid();
	    $this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['project_id'=>$projcetid], 'result');
		$this->data['classname']=$this->common->accessrecord('class_name', [], [], 'result');
		$this->data['page'] = 'create_facilitator';
		$this->data['content'] = 'pages/facilitator/create_facilitator';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function facilitator_list(){
		$projcetid =projectmanagerid();
		$this->data['facilitator']= $this->common->projectmangertrainerIdWise($projcetid,'facilitator');
		$this->data['page'] = 'facilitator_list';
		$this->data['content'] = 'pages/facilitator/facilitator_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	
    public function create_assessor(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record']=$this->common->accessrecord('assessor', [], ['id'=>$id], 'row');
	    }
	    if ($_POST) {
	    	if ($id != 0) {
	    		$array = [];
	    		 if((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))){
	    		 	foreach ($_POST['acreditations_image'] as  $value_one) {
		    			$exp = explode(',', $value_one);
		    			$array_two[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			$id = $exp[0];
		    		}
		    		if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        $increment_id = '';
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	            $increment_id = $id+1+$key;
			    	            $array_one[] =array('id'=>$increment_id,
						           'acreditations'=>$_POST['acreditations'][$increment_id],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		    $acreditations_files = array_merge($array_two,$array_one);
	    		}elseif(!empty($_POST['acreditations_image'])){
		    		foreach ($_POST['acreditations_image'] as $key => $value) {
		    			$exp = explode(',', $value);
		    			$array[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			
		    		}
		    	   $acreditations_files = $array;
	    		}else{
	    		   	if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	        	$array[] =array('id'=>$key,
						           'acreditations'=>$_POST['acreditations'][$key],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		   	$acreditations_files = $array;
	    		}
	    		if(empty($acreditations_files)){
                   $acreditations_file = '';
	    		}else{
                    $acreditations_file = serialize($acreditations_files);
	    		}
	    		$password = $_POST['password'];
	    		if($assessor = $this->common->accessrecord('assessor', [], ['id'=>$id,'password'=>$password], 'row')){
					$old_password = $assessor->password;
					if($old_password == $password){
						$pass = $old_password;
					}else{
	                    $pass = sha1($password);
					}
			    }else{
	                $pass = sha1($password);
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
    		    $data = array('fullname'=>$this->input->post('fullname'),
				    		'surname'=>$this->input->post('surname'),
				    		'email'=>$this->input->post('email'),
				    		'id_number'=>$this->input->post('id_number'),
				    		'landline'=>$this->input->post('landline'),
				    		'mobile'=>$this->input->post('mobile'),
				    		'acreditations_file'=>$acreditations_file,
				    		'trainer_id'=>$this->input->post('trainer_id'),
				    		'created_by'=>$this->input->post('created_by'),
				    		'password'=>$pass,
				    		'Suburb'=> $this->input->post('Suburb'),
							'Street_name'=> $this->input->post('Street_name'),
				            'Street_number'=> $this->input->post('Street_number'),
				            'district'=> $district_name,
				            'region'=> $region_name,
				            'user_type'=>2,
				            'city'=> $city_name,
				            'province'=> $this->input->post('province'),

				    	);
    		    if($this->common->updateData('assessor',$data,['id'=>$_GET['id']])){
			        $this->session->set_flashdata('success','Assessors Update Successfully');
			        redirect('projectmanager-assessor-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('projectmanager-assessor-list');
                }
	    	}else{
	    		$array =[];
			    if(!empty($_FILES['acreditations_file']['name'])){
			        $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
					if (!empty($arrayFilter)) {
						$path = './uploads/acreditationsfiles/';
						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
						foreach ($_POST['acreditations'] as $key => $value) {
						    $array[]=array('id'=>$key,
								           'acreditations'=>$value,
								           'acreditations_file' =>$image[$key]
						                  );
					    }
				    }
				    $acreditations_file = serialize($array);
				}else{
					 $acreditations_file = "";
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
					    $data = array('fullname'=>$this->input->post('fullname'),
					    		'surname'=>$this->input->post('surname'),
					    		'email'=>$this->input->post('email'),
					    		'id_number'=>$this->input->post('id_number'),
					    		'landline'=>$this->input->post('landline'),
					    		'mobile'=>$this->input->post('mobile'),
					    		'acreditations_file'=>$acreditations_file,
					    		'trainer_id'=>$this->input->post('trainer_id'),
					    		'created_by'=>$this->input->post('created_by'),
					    		'password'=>sha1($this->input->post('password')),
					    		'Suburb'=> $this->input->post('Suburb'),
							    'Street_name'=> $this->input->post('Street_name'),
							    'Street_number'=> $this->input->post('Street_number'),
							    'user_type'=>2,
							    'district'=> $district_name,
							    'region'=> $region_name,
							    'city'=> $city_name,
							    'province'=> $this->input->post('province'),
					    	);
				
				if($this->common->insertData('assessor',$data)){
				   $this->session->set_flashdata('success','Assessors Insert Successfully');
				   redirect('projectmanager-assessor-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('projectmanager-create-assessor');
	            }
	        }
		    if($id!=0){
			   $this->data['assessor']=$this->common->accessrecord('assessor', [], ['id'=>$id], 'row');
		    }
	    }
	    $projcetid =projectmanagerid();
	    $this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['project_id'=>$projcetid], 'result');
		$this->data['page'] = 'create_assessor';
		$this->data['content'] = 'pages/assessor/create_assessor';
		$this->load->view('project-manager/tamplate', $this->data);
    }
	public function assessor_list(){
		$projcetid =projectmanagerid();
		$this->data['assessor']=$this->common->projectmangertrainerIdWise($projcetid,'assessor');
		$this->data['page'] = 'assessor_list';
		$this->data['content'] = 'pages/assessor/assessor_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function create_moderator(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record']=$this->common->accessrecord('moderator', [], ['id'=>$id], 'row');
	    }
	    if ($_POST) {
	    	if ($id != 0) {
	    	    $array = [];
	    		if((!empty($_POST['acreditations_image'])) && (!empty($_FILES['acreditations_file']['name']))){
	    		 	foreach ($_POST['acreditations_image'] as  $value_one) {
		    			$exp = explode(',', $value_one);
		    			$array_two[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			$id = $exp[0];
		    		}
		    		if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/moderator/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        $increment_id = '';
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	            $increment_id = $id+1+$key;
			    	            $array_one[] =array('id'=>$increment_id,
						           'acreditations'=>$_POST['acreditations'][$increment_id],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		    $acreditations_files = array_merge($array_two,$array_one);
	    		}elseif(!empty($_POST['acreditations_image'])){
		    		foreach ($_POST['acreditations_image'] as $key => $value) {
		    			$exp = explode(',', $value);
		    			$array[] = array('id'=>$exp[0],
									           'acreditations'=>$exp[1],
									           'acreditations_file' =>$exp[2]
							    ); 
		    			
		    		}
		    	   $acreditations_files = $array;
	    		}else{
	    		   	if(!empty($_FILES['acreditations_file']['name'])){
	    		   	    $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
						if (!empty($arrayFilter)) {
                        	$path = './uploads/moderator/acreditationsfiles/';
			    	        $image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
			    	        foreach ($_FILES['acreditations_file']['name'] as $key => $value) {
			    	        	$array[] =array('id'=>$key,
						           'acreditations'=>$_POST['acreditations'][$key],
						           'acreditations_file' =>$image[$key]
				                  );
			    	        }
				    	}	
	    		   	}
	    		   	$acreditations_files = $array;
	    		}
	    		if(empty($acreditations_files)){
                   $acreditations_file = '';
	    		}else{
                    $acreditations_file = serialize($acreditations_files);
	    		}
	    		$password = $_POST['password'];
	    		if($moderator = $this->common->accessrecord('moderator', [], ['id'=>$id,'password'=>$password], 'row')){
					$old_password = $moderator->password;
					if($old_password == $password){
						$pass = $old_password;
					}else{
	                    $pass = sha1($password);
					}
			    }else{
	                $pass = sha1($password);
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
    		    $data = array('fullname'=>$this->input->post('fullname'),
				    		'surname'=>$this->input->post('surname'),
				    		'email'=>$this->input->post('email'),
				    		'id_number'=>$this->input->post('id_number'),
				    		'landline'=>$this->input->post('landline'),
				    		'mobile'=>$this->input->post('mobile'),
				    		'acreditations_file'=>$acreditations_file,
				    		'trainer_id'=>$this->input->post('trainer_id'),
				    		'created_by'=>$this->input->post('created_by'),
				    		'password'=>$pass,
				    		'Suburb'=> $this->input->post('Suburb'),
							'Street_name'=> $this->input->post('Street_name'),
				            'Street_number'=> $this->input->post('Street_number'),
				            'district'=> $district_name,
				            'region'=> $region_name,
				            'user_type'=>2,
				            'city'=> $city_name,
				            'province'=> $this->input->post('province'),
				    	);
    		    if($this->common->updateData('moderator',$data,['id'=>$_GET['id']])){
			        $this->session->set_flashdata('success','Moderator Update Successfully');
			        redirect('projectmanager-moderator-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('projectmanager-moderator-list');
                }
            }else{
            	$array =[];
		        if(!empty($_FILES['acreditations_file']['name'])){
			        $arrayFilter = array_values(array_filter($_FILES['acreditations_file']['name']));
					if (!empty($arrayFilter)) {
						$path = './uploads/moderator/acreditationsfiles/';
						$image = $this->MultipleImageUpload($_FILES['acreditations_file'], $path, 'acreditations_file');
						foreach ($_POST['acreditations'] as $key => $value) {
						    $array[] = array('id'=>$key,
								           'acreditations'=>$value,
								           'acreditations_file' =>$image[$key]
						                  );
					    }
					   
					}
					$acreditations_file =serialize($array);
				}else{
                   $acreditations_file = "";
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
				    $data = array('fullname'=>$this->input->post('fullname'),
				    		'surname'=>$this->input->post('surname'),
				    		'email'=>$this->input->post('email'),
				    		'id_number'=>$this->input->post('id_number'),
				    		'landline'=>$this->input->post('landline'),
				    		'mobile'=>$this->input->post('mobile'),
				    		'acreditations_file'=>$acreditations_file,
				    		'trainer_id'=>$this->input->post('trainer_id'),
				    		'created_by'=>$this->input->post('created_by'),
				    		'password'=>sha1($this->input->post('password')),
				    		'Suburb'=> $this->input->post('Suburb'),
						    'Street_name'=> $this->input->post('Street_name'),
						    'Street_number'=> $this->input->post('Street_number'),
						    'district'=> $district_name,
						    'region'=> $region_name,
						    'city'=> $city_name,
						    'user_type'=>2,
						    'province'=> $this->input->post('province'),
				    	);
				if($this->common->insertData('moderator',$data)){
				   $this->session->set_flashdata('success','Moderator Insert Successful');
				   redirect('projectmanager-moderator-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('projectmanager-create-moderator');
	            }
	        }
		    if($id!=0){
			   $this->data['moderator']=$this->common->accessrecord('moderator', [], ['id'=>$id], 'row');
		    }
	    }
	    $this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$projcetid =projectmanagerid();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['project_id'=>$projcetid], 'result');
	    $this->data['page'] = 'create_moderator';
		$this->data['content'] = 'pages/moderator/create_moderator';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function moderator_list(){
		$projcetid =projectmanagerid();
	    $this->data['moderator']=$this->common->projectmangertrainerIdWise($projcetid,'moderator');
		$this->data['page'] = 'moderator_list';
		$this->data['content'] = 'pages/moderator/moderator_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
    public function projectmanager_report_list(){
    	$projcetid = projectmanagerid();
		$this->data['record'] = $this->common->porjectmanagerReportdata($projcetid);
	    $this->data['page'] = 'projectmanagar_report_list';
		$this->data['content'] = 'pages/report/projectmanagar_report_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	
	public function project_manager_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->accessrecord('project_manager', [], ['id'=>$id], 'result');
	    $this->data['page'] = 'project_manager_view';
		$this->data['content'] = 'pages/report/project_manager_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function training_provider_view(){
		$id = $this->input->get('id');
		$this->data['record'] =  $this->common->accessrecord('trainer', [], ['project_id'=>$id], 'result');
	    $this->data['page'] = 'training_provider_view';
		$this->data['content'] = 'pages/report/training_provider_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function monderator_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->projectmangertrainerIdWise($id,'moderator');
	    $this->data['page'] = 'monderator_view';
		$this->data['content'] = 'pages/report/monderator_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function assessor_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->projectmangertrainerIdWise($id,'assessor');
	    $this->data['page'] = 'assessor_view';
		$this->data['content'] = 'pages/report/assessor_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function facilitator_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->projectmangertrainerIdWise($id,'facilitator');
	    $this->data['page'] = 'facilitator_view';
		$this->data['content'] = 'pages/report/facilitator_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function learner_view(){
		$id = $this->input->get('id');
		$this->data['record'] =$this->common->projectmangertrainerIdWise($id,'learner');
	    $this->data['page'] = 'learner_view';
		$this->data['content'] = 'pages/report/learner_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function import_data() {
        $path = './uploads/learner/import_learner/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls|ods';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('learner')) {
        	$this->session->set_flashdata('error',$this->upload->display_errors());
            redirect('projectmanager-import-learner');
        } else {
        	$data = array('upload_data' => $this->upload->data());
       
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
        /* $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,null);
        */
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,true,true,true,true,true,true,true,true,true,true,true,null,null,true,true,true,true,true,true,true,true,null,null);
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray =array('TrainingProviderName','LearnerFullName','LearnerSurnameName','Email','IdNumber','SETA','PrimaryMobileNumber','SecondaryMobileNumber','Gender','LearnershipSubType','Password','Province','District','City','Region','Suburb','StreetName','StreetNumber','Assessment','IsDisable','UifBenefits','LearnerAcceptedforTraining','ClassName','EmployerName','BankName','BankAccountType','BankAccountNumber','BranchName','BranchCode');
       // print_r($createArray);die;
        $makeArray = array('TrainingProviderName' => 'TrainingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email','IdNumber'=>'IdNumber','SETA'=>'SETA','PrimaryMobileNumber'=>'PrimaryMobileNumber','SecondaryMobileNumber'=>'SecondaryMobileNumber','Gender'=>'Gender','LearnershipSubType'=>'LearnershipSubType','Password'=>'Password','Province'=>'Province','District'=>'District','City'=>'City','Region'=>'Region','Suburb'=>'Suburb','StreetName'=>'StreetName','StreetNumber'=>'StreetNumber','Assessment'=>'Assessment','IsDisable'=>'IsDisable','UifBenefits'=>'UifBenefits','LearnerAcceptedforTraining'=>'LearnerAcceptedforTraining','ClassName'=>'ClassName','EmployerName'=>'EmployerName','BankName'=>'BankName','BankAccountType'=>'BankAccountType','BankAccountNumber'=>'BankAccountNumber','BranchName'=>'BranchName','BranchCode'=>'BranchCode');
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
                $employer_name = $SheetDataKey['EmployerName'];
                $bank_name = $SheetDataKey['BankName'];
                $bank_account_type = $SheetDataKey['BankAccountType'];
                $bank_account_number = $SheetDataKey['BankAccountNumber'];
                $branch_name = $SheetDataKey['BranchName'];
                $branch_code = $SheetDataKey['BranchCode'];
                //$second_name = $SheetDataKey['LearnerSecondName'];
                $classname = $SheetDataKey['ClassName'];
                $surname = $SheetDataKey['LearnerSurnameName'];
                $email=$SheetDataKey['Email'];
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
                $region = $SheetDataKey['Region'];
                $Suburb = $SheetDataKey['Suburb'];
                $Street_name = $SheetDataKey['StreetName'];
                $Street_number = $SheetDataKey['StreetNumber'];
                $password = $SheetDataKey['Password'];
                $gender = $SheetDataKey['Gender'];
                $employer_name = filter_var(trim($allDataInSheet[$i][$employer_name]), FILTER_SANITIZE_STRING);
                if(empty($employer_name)){
                 $this->session->set_flashdata('error','Please enter your employer name');
                     redirect('projectmanager-import-learner');
                }
                $bank_name = filter_var(trim($allDataInSheet[$i][$bank_name]), FILTER_SANITIZE_STRING);
                if(empty($bank_name)){
                    $this->session->set_flashdata('error','Please enter your bank name');
                    redirect('projectmanager-import-learner');
                }

                $branch_code = filter_var(trim($allDataInSheet[$i][$branch_code]), FILTER_SANITIZE_STRING);
                if(empty($branch_code)){
                    $this->session->set_flashdata('error','Please enter your branch code');
                    redirect('projectmanager-import-learner');
                }

                $bank_account_type = filter_var(trim($allDataInSheet[$i][$bank_account_type]), FILTER_SANITIZE_STRING);
                if(empty($bank_account_type)){
                    $this->session->set_flashdata('error','Please enter your bank account type');
                    redirect('projectmanager-import-learner');
                }

                $bank_account_number = filter_var(trim($allDataInSheet[$i][$bank_account_number]), FILTER_SANITIZE_STRING);
                if(empty($bank_account_number)){
                    $this->session->set_flashdata('error','Please enter your bank account number');
                     redirect('projectmanager-import-learner');
                }

                $branch_name = filter_var(trim($allDataInSheet[$i][$branch_name]), FILTER_SANITIZE_STRING);
                if(empty($branch_name)){
                    $this->session->set_flashdata('error','Please enter your branch name');
                    redirect('projectmanager-import-learner');
                }
                $trining_provider = filter_var(trim($allDataInSheet[$i][$trining_provider]), FILTER_SANITIZE_STRING);
                if(empty($trining_provider)){
                    $this->session->set_flashdata('error','Please Enter your training provider');
                    redirect('projectmanager-import-learner');
                 }
                $first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);
                if(empty($first_name)){
                    $this->session->set_flashdata('error','Please enter your full name');
                    redirect('projectmanager-import-learner');
                }
                //$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);
                $surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);
                if(empty($surname)){
                    $this->session->set_flashdata('error','Please enter your surname');
                    redirect('projectmanager-import-learner');
                }
                $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
                if(empty($email)){
                    $this->session->set_flashdata('error','Please enter your email');
                    redirect('projectmanager-import-learner');
                }
                $mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);
                if(empty($mobile)){
                    $this->session->set_flashdata('error','Please enter your  primary cellphone number');
                    redirect('projectmanager-import-learner');
                }
                $mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);
                if(empty($mobile_number)){
                    $this->session->set_flashdata('error','Please enter your second cellphone number');
                    redirect('projectmanager-import-learner');
                }
                $assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);
                if(empty($assessment)){
                    $this->session->set_flashdata('error','Please enter your assessment status');
                    redirect('projectmanager-import-learner');
                }
                $disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);
                if(empty($disable)){
                    $this->session->set_flashdata('error','Please enter your disabled');
                    redirect('projectmanager-import-learner');
                }
                $utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);
                if(empty($utf_benefits)){
                    $this->session->set_flashdata('error','Please enter your  U.I.F Beneficiary');
                    redirect('projectmanager-import-learner');
                }
                $learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);
                if(empty($learner_accepted_training)){
                    $this->session->set_flashdata('error','Please enter your learner accepted training');
                    redirect('projectmanager-import-learner');
                }
                $learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);
                if(empty($learnershipSubType)){
                    $this->session->set_flashdata('error','Please enter your learnership Sub Type');
                    redirect('projectmanager-import-learner');
                }
                $id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);
                if(empty($id_number)){
                    $this->session->set_flashdata('error','Please enter your id number');
                    redirect('projectmanager-import-learner');
                }
                $SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);
                if(empty($SETA)){
                    $this->session->set_flashdata('error','Please enter your SETA');
                    redirect('projectmanager-import-learner');
                }
                $province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);
                if(empty($province)){
                    $this->session->set_flashdata('error','Please enter your province');
                    redirect('projectmanager-import-learner');
                }
                $district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);
                if(empty($district)){
                    $this->session->set_flashdata('error','Please enter your district');
                    redirect('projectmanager-import-learner');
                }
                $city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);
                if(empty($city)){
                    $this->session->set_flashdata('error','Please enter your city');
                    redirect('projectmanager-import-learner');
                }
                $region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);
                if(empty($region)){
                    $this->session->set_flashdata('error','Please enter your region');
                    redirect('projectmanager-import-learner');
                }
                $Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);
                if(empty($Suburb)){
                    $this->session->set_flashdata('error','Please enter your Suburb');
                    redirect('projectmanager-import-learner');
                }
                $Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);
                if(empty($Street_name)){
                    $this->session->set_flashdata('error','Please enter your street name');
                    redirect('projectmanager-import-learner');
                }
                $Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);
                if(empty($Street_number)){
                    $this->session->set_flashdata('error','Please enter your street number');
                    redirect('projectmanager-import-learner');
                }
                $password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);
                if(empty($password)){
                    $this->session->set_flashdata('error','Please enter your password');
                    redirect('projectmanager-import-learner');
                }
                $gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);
                if(empty($gender)){
                    $this->session->set_flashdata('error','Please enter your gender');
                    redirect('projectmanager-import-learner');
                }
                $classname = filter_var(trim($allDataInSheet[$i][$classname]), FILTER_SANITIZE_STRING);
                if(empty($classname)){
                    $this->session->set_flashdata('error','Please enter your class name');
                    redirect('import_learner');
                }
                
                $fetchData[] = array('trining_provider' =>$trining_provider, 'first_name' =>$first_name,  'surname' =>$surname, 'email' =>$email,'mobile'=>$mobile,'mobile_number'=>$mobile_number,'assessment'=>$assessment,'disable'=>$disable,'utf_benefits'=>$utf_benefits,'learner_accepted_training'=>$learner_accepted_training,'learnershipSubType'=>$learnershipSubType,'id_number'=>$id_number,'SETA'=>$SETA,'province'=>$province,'district'=>$district,'city'=>$city,'region'=>$region,'Suburb'=>$Suburb,'Street_name'=>$Street_name,'Street_number'=>$Street_number,'password'=>sha1($password),'gender'=>$gender,'classname'=>$classname,'employer_name'=>$employer_name,'bank_name'=>$bank_name,'bank_account_type'=>$bank_account_type,'bank_account_number'=>$bank_account_number,'branch_name'=>$branch_name,'branch_code'=>$branch_code);
            }              
            $data['employeeInfo'] = $fetchData;
            $this->common->setBatchImport($fetchData);
            $this->common->importData();
            } else {
            $this->session->set_flashdata('error','Please import correct file');
            redirect('projectmanager-import-learner');
        }
    }
        redirect('projectmanager-list-learner');
    }
    public function import_learner(){
    	$this->data['page'] = 'import_learner';
		$this->data['content'] = 'pages/learner/import_learner';
		$this->load->view('project-manager/tamplate', $this->data);	
	}
	public function create_class(){   
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record'] = $this->common->accessrecord('class_name',[],['id'=>$id],'row');
		}
		if ($_POST) {
			$data =$_POST;
			$data['user_type'] = '2';
		    if($id!=0){
		        if($this->common->updateData('class_name',$data,['id'=>$id])){
                    $this->session->set_flashdata('success','Class Updated Succesfully');
					redirect('projectmanager-class-list');
			    }else {
				  redirect('projectmanager-class-list');
                }
		    }else{
		  	    if($this->common->insertData('class_name',$data)){
				    $this->session->set_flashdata('success','Class Insert Successfully');
			        redirect('projectmanager-class-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('projectmanager-create-class');
	            }
			}
		}
		$projcetid =projectmanagerid();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['project_id'=>$projcetid], 'result');
		$this->data['sublearnship'] = $this->common->accessrecord('learnership_sub_type', [], [], 'result');
        $this->data['page'] = 'create_class';
		$this->data['content'] = 'pages/class/create_class';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function class_list(){
		$projcetid =projectmanagerid();
        //$this->data['record']=$this->common->accessrecord('class_name', [], ['created_by'=>$projcetid,'user_type'=>'2'], 'result');
        $this->data['record']=$this->common->ProjectManagerClass('project_manager',$projcetid);
		$this->data['page'] = 'class_list';
		$this->data['content'] = 'pages/class/class_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function learner_mark_list(){
		$projcetid =projectmanagerid();
	    $this->data['record'] = $this->common->ProgrammeDirectorLearnerMark($projcetid,'project_manager');
    	$this->data['page'] = 'learner_marks_list';
		$this->data['content'] = 'pages/learner_marks/learner_marks_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function attendance_list(){
		$projcetid =projectmanagerid();
	    $this->data['record'] = $this->common->ProgrammeDirectorAttendance($projcetid,'project_manager');
        $this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/attendance/attendance_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
    public function drop_out_list(){
    	$projcetid = projectmanagerid();
		$this->data['record'] = $this->common->Projectdropout('drop_out',$projcetid);
		$this->data['page'] = 'drop_out_list';
		$this->data['content'] = 'pages/drop_out/drop_out_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function stipends_list(){
		$projcetid = projectmanagerid();
		$this->data['record'] = $this->common->Projectdropout('stipend',$projcetid);
	    $this->data['page'] = 'stipend_list';
		$this->data['content'] = 'pages/stipend/stipend_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	function deletedataClass(){
		if(!empty($_GET['classname'])){
			$classname = $this->common->accessrecord('class_name',[],['class_name'=>$_GET['classname']],'row');
            if($this->common->accessrecord('learner',[],['classname'=>$_GET['classname']],'row')){
                echo json_encode(array('error'=>"error"));
            }elseif($this->common->accessrecord('attendance',[],['classname'=>$classname->id],'row')){
                echo json_encode(array('error'=>"error"));
            }elseif($this->common->accessrecord('learner_marks',[],['learner_classname'=>$classname->id],'row')){
                echo json_encode(array('error'=>"error"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	public function create_income_item()
	{
		$id=0;
		if(!empty($_GET['id'])){
		$id= $_GET['id'];
		$this->data['record'] = $this->common->accessrecord('finance_income_item',[],['id'=>$id],'row');
		}
		if ($_POST) {
			$_POST['project_id'] = projectmanagerid();
			if($id!=0){
			    if($this->common->updateData('finance_income_item',$_POST,['id'=>$id])){
			   	  $this->session->set_flashdata('success',' Income Item Updated Succesfully');
			      redirect('projectmanager-income-item-list');
			    }else{
			       $this->session->set_flashdata('success',' Income Item Updated Succesfully');
			       redirect('projectmanager-income-item-list');
			    }
			}else{
			    $_POST['funding_id'] = rand(100000,999999);
			    if($this->common->insertData('finance_income_item',$_POST)){
                   $this->session->set_flashdata('success','Income Item Inserted Successfully');
			       redirect('projectmanager-income-item-list');
			    }else{
			    	$this->session->set_flashdata('error', 'Please Try Again');
			        redirect('projectmanager-create-income-item');
			    }
			  
			}
		}
		$this->data['data']=$this->common->accessrecord('finance_income_item', [], [], 'result');
		$this->data['page'] = 'create_income_item';
		$this->data['content'] = 'pages/finance/create_income_item';
		$this->load->view('project-manager/tamplate', $this->data);
	}

    public function income_item_list(){
    	if(!empty($_GET['id'])){
            $id = $_GET['id'];
            if($count = $this->common->accessrecord('finance_income_item', ['SUM(`amount`) as total_income_amount'],  ['project_id'=>$id], 'row')){
            $this->data['count']= $count;
			}else{
				$this->data['count']= 0;
			}
        }else{
            $id = projectmanagerid();
        }
		$this->data['data']=$this->common->accessrecord('finance_income_item', [], ['project_id'=>$id], 'result');
		$this->data['page'] = 'income_item_list';
		$this->data['content'] = 'pages/finance/income_item_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}

	public function create_expense_item()
	{
		$id=0;
		if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$this->data['record'] = $this->common->accessrecord('finance_expense_item',[],['id'=>$id],'row');
		}
		if ($_POST) {
			$incomeitem = $this->common->accessrecord('finance_income_item',['SUM(amount) as amount'],['project_id'=> projectmanagerid()],'row');
			if(!empty($incomeitem)){
			    $_POST['project_id'] = projectmanagerid();
				if($id!=0){
					if($incomeitem->amount >= $_POST['expense_amount']){
			            $data = $this->common->accessrecord('finance_expense_item',['SUM(expense_amount) as expense_amount'],['project_id'=> projectmanagerid()],'row');
			            $expense =  $data->expense_amount+$_POST['expense_amount'];
			            if($incomeitem->amount >= $expense){
						    if($this->common->updateData('finance_expense_item',$_POST,['id'=>$id])){
	                            $this->session->set_flashdata('success','Expense Item Updated Succesfully');
						        redirect('projectmanager-expense-item-list');
						    }else{
	                           $this->session->set_flashdata('success','Expense Item Updated Succesfully');
						        redirect('projectmanager-expense-item-list');
						    }
						}else{
				          $this->session->set_flashdata('msg','your expense amount more than your income amount');
			              redirect('projectmanager-create-expense-item?id='.$id);
				        }
					}else{
						$this->session->set_flashdata('msg','your expense amount more than your income amount');
					    redirect('projectmanager-create-expense-item?id='.$id);
		            }
				}else{
					if($incomeitem->amount >= $_POST['expense_amount']){
			            $data = $this->common->accessrecord('finance_expense_item',['SUM(expense_amount) as expense_amount'],['project_id'=> projectmanagerid()],'row');
			            $expense =  $data->expense_amount+$_POST['expense_amount'];
						if($incomeitem->amount >= $expense){
							$_POST['expense_id'] = rand(100000,999999);
						    if($this->common->insertData('finance_expense_item',$_POST)){
	                            $this->session->set_flashdata('success','Expense Item Successfully');
						        redirect('projectmanager-expense-item-list');
						    }else{
						    	$this->session->set_flashdata('error', 'Please Try Again');
	                            redirect('projectmanager-create-expense-item');
						    }
						}else{
				          $this->session->set_flashdata('msg','your expense amount more than your income amount');
			              redirect('projectmanager-create-expense-item');
				        }
				    }else{
						$this->session->set_flashdata('msg','your expense amount more than your income amount');
					    redirect('projectmanager-create-expense-item');
		            }
				}
		    }else{
		    	$this->session->set_flashdata('error', 'Please Try Again');
	            redirect('projectmanager-create-expense-item');
		    }
		}
	    $this->data['data']=$this->common->accessrecord('finance_expense_item', [], [], 'result');
		$this->data['income']=$this->common->accessrecord('finance_income_item', [], [], 'result');
		$this->data['page'] = 'create_expense_item';
		$this->data['content'] = 'pages/finance/create_expense_item';
		$this->load->view('project-manager/tamplate', $this->data);
	}
    
    public function expense_item_list(){
    	if(!empty($_GET['id'])){
            $id = $_GET['id'];
            if($count = $this->common->accessrecord('finance_expense_item', ['SUM(`expense_amount`) as total_expense_amount'],  ['project_id'=>$id], 'row')){
            $this->data['count']= $count;
			}else{
				$this->data['count']= 0;
			}
        }else{
            $id = projectmanagerid();
        }
    	$this->data['data']=$this->common->accessrecord('finance_expense_item', [], ['project_id'=>$id], 'result');
		$this->data['page'] = 'expense_item_list';
		$this->data['content'] = 'pages/finance/expense_item_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
    public function account_balance_list(){
		$this->data['record']=$this->common->AccountBalanceData('total_account',projectmanagerid());
		$this->data['page'] = 'account_balance_list';
		$this->data['content'] = 'pages/finance/account_balance_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function expense_view(){
		$expesnse_id = $this->input->get('id');
        $this->data['record']=$this->common->accessrecord('finance_expense_item', [], ['funding_id'=>$expesnse_id], 'result');
        $this->data['page'] = 'expense_view';
		$this->data['content'] = 'pages/finance/expense_view';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	function deletedataAssessor(){
		if(!empty($_GET['data'])){
            if($this->common->accessrecord('attendance',[],['assessor_id'=>$_GET['data'],'training_provider'=>$_GET['trainer_id']],'row')){
                echo json_encode(array('error'=>"error"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	function deletedataFacilitator(){
		if(!empty($_GET['data'])){
            if($this->common->accessrecord('learner_marks',[],['training_provider'=>$_GET['training_provider']],'row')){
                echo json_encode(array('error'=>"error"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	function deletedataLearner(){
		if(!empty($_GET['data'])){
            if($this->common->accessrecord('stipend',[],['learner_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"stipend"));
            }elseif($this->common->accessrecord('drop_out',[],['learner_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"drop_out"));
            }elseif($this->common->accessrecord('complaints_and_suggestions',[],['learner_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"complaints_and_suggestions"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	function deletedataModerator(){
		if(!empty($_GET['data'])){
            if($this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"error"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	function deletedataTrainingprovider(){
		if(!empty($_GET['data'])){
			$trainer = $this->common->accessrecord('trainer',[],['id'=>$_GET['data']],'row');
            if($this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"moderator"));
            }elseif($this->common->accessrecord('assessor',[],['trainer_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"assessor"));
            }elseif($this->common->accessrecord('facilitator',[],['trainer_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"facilitator"));
            }else if($this->common->accessrecord('learner',[],['trining_provider'=>$trainer->company_name],'row')){
                echo json_encode(array('error'=>"learner"));
            }else if($this->common->accessrecord('learner',[],['trining_provider'=>$trainer->company_name],'row')){
                $datamon = $this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row');
                $datass = $this->common->accessrecord('assessor',[],['trainer_id'=>$_GET['data']],'row');
                $datafac = $this->common->accessrecord('facilitator',[],['trainer_id'=>$_GET['data']],'row');
                if(!empty($datamon)){
                    echo json_encode(array('error'=>"learner&moder"));
                } 
                if(!empty($datass)){
                    echo json_encode(array('error'=>"learner&asso"));
                } 
                if(!empty($datafac)){
                    echo json_encode(array('error'=>"learner&fac"));
                } 
                if((!empty($datamon))&&(!empty($datass))){
                    echo json_encode(array('error'=>"learner&moder&asso"));
                } 
                if((!empty($datass))&&(!empty($datafac))){
                    echo json_encode(array('error'=>"learner&asso&fac"));
                } 
                if((!empty($datafac))&&(!empty($datamon))){
                    echo json_encode(array('error'=>"learner&fac&mon"));
                } 
                if((!empty($datamon))&&(!empty($datass))&&(!empty($datafac))){
                    echo json_encode(array('error'=>"learner&moder&ass&fac"));
                }
            }else if($this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row')){
                 $datalea =$this->common->accessrecord('learner',[],['trining_provider'=>$trainer->company_name],'row');
                $datass = $this->common->accessrecord('assessor',[],['trainer_id'=>$_GET['data']],'row');
                $datafac = $this->common->accessrecord('facilitator',[],['trainer_id'=>$_GET['data']],'row');
                if(!empty($datalea)){
                    echo json_encode(array('error'=>"moderator&lea"));
                } 
                if(!empty($datass)){
                    echo json_encode(array('error'=>"moderator&asso"));
                } 
                if(!empty($datafac)){
                    echo json_encode(array('error'=>"moderator&fac"));
                } 
                if((!empty($datalea))&&(!empty($datass))){
                    echo json_encode(array('error'=>"moderator&lea&asso"));
                } 
                if(!empty($datass)&&(!empty($datafac))){
                    echo json_encode(array('error'=>"moderator&asso&fac"));
                } 
                if((!empty($datafac))&&(!empty($datalea))){
                    echo json_encode(array('error'=>"moderator&fac&lea"));
                } 
                if((!empty($datalea))&&(!empty($datass))&&(!empty($datafac))){
                    echo json_encode(array('error'=>"moderator&lea&asso&fac"));
                }
            }else if($this->common->accessrecord('assessor',[],['trainer_id'=>$_GET['data']],'row')){
                $datalea =$this->common->accessrecord('learner',[],['trining_provider'=>$trainer->company_name],'row');
                $datamon = $this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row');
                $datafac = $this->common->accessrecord('facilitator',[],['trainer_id'=>$_GET['data']],'row');
                if(!empty($datalea)){
                    echo json_encode(array('error'=>"assessor&lea"));
                } 
                if(!empty($datamon)){
                    echo json_encode(array('error'=>"assessor&mon"));
                } 
                if(!empty($datafac)){
                    echo json_encode(array('error'=>"assessor&fac"));
                } 
                if((!empty($datalea))&&(!empty($datamon))){
                    echo json_encode(array('error'=>"assessor&lea&mon"));
                } 
                if(!empty($datamon)&&(!empty($datafac))){
                    echo json_encode(array('error'=>"assessor&mon&fac"));
                } 
                if((!empty($datafac))&&(!empty($datalea))){
                    echo json_encode(array('error'=>"assessor&fac&lea"));
                } 
                if((!empty($datalea))&&(!empty($datamon))&&(!empty($datafac))){
                    echo json_encode(array('error'=>"assessor&lea&fac&mon"));
                }
            }else if($this->common->accessrecord('facilitator',[],['trainer_id'=>$_GET['data']],'row')){
                 $datalea =$this->common->accessrecord('learner',[],['trining_provider'=>$trainer->company_name],'row');
                $datass = $this->common->accessrecord('assessor',[],['trainer_id'=>$_GET['data']],'row');
                $datamon = $this->common->accessrecord('moderator',[],['trainer_id'=>$_GET['data']],'row');
                if(!empty($datalea)){
                    echo json_encode(array('error'=>"facilitator&lea"));
                } 
                if(!empty($datass)){
                    echo json_encode(array('error'=>"facilitator&asso"));
                } 
                if(!empty($datamon)){
                    echo json_encode(array('error'=>"facilitator&mon"));
                } 
                if((!empty($datalea))&&(!empty($datass))){
                    echo json_encode(array('error'=>"facilitator&lea&asso"));
                } 
                if(!empty($datass)&&(!empty($datamon))){
                    echo json_encode(array('error'=>"facilitator&asso&mon"));
                } 
                if((!empty($datamon))&&(!empty($datalea))){
                    echo json_encode(array('error'=>"facilitator&mon&lea"));
                } 
                if((!empty($datalea))&&(!empty($datass))&&(!empty($datamon))){
                    echo json_encode(array('error'=>"facilitator&lea&asso&mon"));
                }
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
    public function create_bank(){
        $project_id = projectmanagerid();
	    $id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record'] = $this->common->accessrecord('finance_bank_details',[],['id'=>$id],'row');
		}
		if ($_POST) {
			    if ($id != 0) {
			        if (!empty($_FILES['upload_bank_statements']['name'])) {
                       $upload_bank_statement['upload_bank_statement']=$this->singlefileupload('upload_bank_statements','./uploads/bank/upload_bank_statement/','gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt|rar|zip');
                    }else{
                    	$uploadbankstatement =$this->common->accessrecord('finance_bank_details', [], ['id'=>$id], 'row');
                    	$upload_bank_statement['upload_bank_statement'] = $uploadbankstatement->upload_bank_statement;
                    }
                    $data = array(
						           'project_manager_name'=> $this->input->post('project_manager_name'),
						           'project_id'=>$this->input->post('project_id'),
						           'quarter'=>$this->input->post('quarter'),
							       'project_name'=> $this->input->post('project_name'),
							       'bank_start_date'=> $this->input->post('bank_start_date'),
							       'bank_end_date'=> $this->input->post('bank_end_date'),
							       'upload_bank_statement'=>$upload_bank_statement['upload_bank_statement'],
						            'created_by'=> $project_id,
						            'user_type'=>2,
						        );
                    if($this->common->updateData('finance_bank_details',$data,array('id'=>$id))){
                        $this->session->set_flashdata('success','Bank Statement Updated Succesfully');
						redirect('projectmanager-bank-list');
				    }else {
					    $this->session->set_flashdata('success', 'Bank Statement Updated Succesfully');
					    redirect('projectmanager-bank-list');
	                }
		        }else{
					if (!empty($_FILES['upload_bank_statement']['name'])) {
	                   $upload_bank_statement['upload_bank_statement']=$this->singlefileupload('upload_bank_statement','./uploads/bank/upload_bank_statement/','gif|jpg|png|xls|doc|docx|jpeg|pdf|xlsx|ods|ppt|pptx|txt');
	                }
				    $data = array(
				           'project_manager_name'=> $this->input->post('project_manager_name'),
				           'project_id'=>$this->input->post('project_id'),
				           'quarter'=>$this->input->post('quarter'),
					       'project_name'=> $this->input->post('project_name'),
					       'bank_start_date'=> $this->input->post('bank_start_date'),
					       'bank_end_date'=> $this->input->post('bank_end_date'),
					       'upload_bank_statement'=>$upload_bank_statement['upload_bank_statement'],
				           'created_by'=> $project_id,
				            'user_type'=>2,
				        );
                    if($this->common->insertData('finance_bank_details',$data)){
				       $this->session->set_flashdata('success','Bank Statement Insert Successful');
				       redirect('projectmanager-bank-list');
					}else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect('projectmanager-create-bank');
		            }
			    }
		    if($id!=0){
			   $this->data['record']=$this->common->accessrecord('finance_bank_details', [], ['id'=>$id], 'row');
		    }
		}
        $this->data['projectmanager']=$this->common->accessrecord('project_manager', [], ['id'=>$project_id], 'row');
		$this->data['page'] = 'create_bank';
		$this->data['content'] = 'pages/bank/create_bank';
		$this->load->view('project-manager/tamplate', $this->data);
	}
	public function bank_list(){
		$project_id = projectmanagerid();
		$this->data['record'] = $this->common->accessrecord('finance_bank_details',[],['project_id'=>$project_id],'result');
	    $this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/bank/bank_list';
		$this->load->view('project-manager/tamplate', $this->data);
	}

    public function trainingcompanyname(){
		if((isset($_GET['id']))&&(isset($_GET['company_name']))){
	        if($_GET['id'] == '0'){
			    if($this->common->accessrecord('trainer',[],['company_name'=>$_GET['company_name']],'row')){
			   	  echo "false";
	            }else{
	           		echo  "true";
	            }
	        }else{
	        	if($trainer = $this->common->accessrecord('trainer',[],['company_name'=>$_GET['company_name'],'id'=>$_GET['id']],'row')){
	        	    echo "true";
	        	}else{
	        		 if($this->common->accessrecord('trainer',[],['company_name'=>$_GET['company_name']],'row')){
				   	  echo "false";
		            }else{
		           		echo  "true";
		            }
	            }
	        } 
        }
    }
}