<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProgrammeDirector extends CI_Controller
{
 public function __construct()
	{
	 	parent::__construct();
	    if(empty($_SESSION['programme_director']['id'])) {
	 		redirect('programme');
	 	}
    }

	public function dashboard()
	{
		$this->data['page'] = 'dashboard';
		$this->data['content'] = 'pages/dashboard/dashboard';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	/*=================delete record============= */
	 function deletedata(){
		 $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
		 $this->session->set_flashdata('success','Record Deleted Successfully');
		 redirect($_SERVER['HTTP_REFERER']);
	 }
	/*=================end=========end=========== */
	public function logout(){
		$this->session->unset_userdata("programmeDirector");
		$this->session->sess_destroy();
		redirect('programme');
	}
	public function programme_changepassword(){
		$this->data['page'] = 'changepassword';
		$this->data['content'] = 'changepassword';
	    if ($_POST) {
	    	if(isset($_SESSION['programme_director']['id'])){
		       $id = $_SESSION['programme_director']['id'];
		    }else{
			  $id = '';
		    }
	    	$oldpassword = $this->input->post('oldpassword');
	    	$password = $this->input->post('password');
			$datau = $this->common->accessrecord('programme_director', ['id, password'], array('id'=>$id), 'row');
			if(!empty($datau)){
			    if ($datau->password == sha1($oldpassword)) {
					$this->common->updateData('programme_director', array('password'=>sha1($password)), array('id'=>$id));
					$this->session->set_flashdata('success', 'Your Password Successfully Update');
					redirect('programme-changepassword');
				}else{
					$this->session->set_flashdata('error', 'Your Old Password Not Match');
				}
			}else{
				$this->session->set_flashdata('error', 'Your Old Password Not Match');
			}
		}
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
    
    public function programme_editprofile(){
        if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		if ($_POST) {
			if (!empty($_FILES['tax_clearances']['name'])) {
			   $tax_clearances['tax_clearances']=$this->singlefileupload('tax_clearances','./uploads/programmer/tax_clearance/','gif|jpg|png|xls|doc|docx|jpeg');
			}else{
				$tax_clearance =$this->common->accessrecord('programme_director', [], ['id'=>$programme_id], 'row');
				$tax_clearances['tax_clearances'] = $tax_clearance->tax_clearance;
			}
			if (!empty($_FILES['company_documents']['name'])) {
				$path = "./uploads/programmer/company_documents/";
				$image = $this->MultipleImageUpload($_FILES['company_documents'], $path, 'company_documents');
				$company_documents_regi =$this->common->accessrecord('programme_director', [], ['id'=>$programme_id], 'row');
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
				$company_documents_regi =$this->common->accessrecord('programme_director', [], ['id'=>$programme_id], 'row');
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
				            'project_director'=> $this->input->post('project_director'),
				            'programme_name'=> $this->input->post('programme_name'),
				            'programme_start_date'=> $this->input->post('programme_start_date'),
				            'programme_end_date'=> $this->input->post('programme_end_date'),
				            'q1_start_date'=> $this->input->post('q1_start_date'),
				            'q1_end_date'=> $this->input->post('q1_end_date'),
				            'q2_start_date'=> $this->input->post('q2_start_date'),
				            'q2_end_date'=> $this->input->post('q2_end_date'),
				            'q3_start_date'=> $this->input->post('q3_start_date'),  
				            'q3_end_date'=> $this->input->post('q3_end_date'),
				            'q4_start_date'=> $this->input->post('q4_start_date'),
				            'q4_end_date'=> $this->input->post('q4_end_date'),
				            'email_address'=> $this->input->post('email_address'),
				            'organisation_id'=> $this->input->post('organisation_id'), 
				            'contact_number'=> $this->input->post('contact_person'), 
				            'mobile_number'=> $this->input->post('mobile_number'),  
				            'Suburb'=> $this->input->post('Suburb'),
					        'Street_name'=> $this->input->post('Street_name'),
					        'Street_number'=> $this->input->post('Street_number'),
					        'fullname'=> $this->input->post('fullname'),
					        'surname'=> $this->input->post('surname'),
					        'district'=> $district_name,
					        'region'=> $region_name,
					        'city'=> $city_name,
					        'province'=> $this->input->post('province'),
				            'tax_clearance'=>$tax_clearances['tax_clearances'],
				            'company_registration_documents'=> $company_documents['company_documents'],
				            'created_by'=> $this->input->post('created_by'),
					        );

            if($this->common->updateData('programme_director',$data,['id'=>$programme_id])){
		        $this->session->set_flashdata('success','Profile Updated Successfully');
		        redirect('programme-editprofile');
		    }else {
			    $this->session->set_flashdata('error', 'Please Try Again');
			    redirect('programme-editprofile');
            }
	    }else{
			$this->data['record']=$this->common->accessrecord('programme_director', [], ['id'=>$programme_id], 'row');
			$this->data['data']=$this->common->accessrecord('organisation', [], [], 'result');
			$this->data['District']=$this->common->get_District();
			$this->data['province']=$this->common->get_province();
			$this->data['region']=$this->common->get_region();
			$this->data['city']=$this->common->get_city();
			$this->data['page'] = 'editprofile';
			$this->data['content'] = 'pages/myprofile/editprofile';
			$this->load->view('programmeDirector/tamplate', $this->data);
		}
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
    public function programme_getdestrict(){
		$data = $_POST;
		$DistrictData=$this->common->get_District_province($data);
		if(!empty($DistrictData)){
           $District = $DistrictData;
	    }else{
           $District = array('error' => 'Destrict list not available in this province');
	    }
	    echo json_encode($District);
	}
    public function programme_getregion(){
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
    public function programme_getcity(){
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
	public function change_leaner_status(){
		$reason = $this->input->post('text');
		$status = $this->input->post('status');
        $tablenm_id = $this->input->post('tablenm_id');
        $explode = explode('.',$tablenm_id);
        $tablenm = $explode[0];
        $id = $explode[1];
        $data = $this->common->updateData($tablenm,['status'=>$status,'reason'=>$reason],['id'=>$id]);
        if($data){
          echo json_encode(array('status' => 200));
        }
	}
	public function acreditations_file_delete(){
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
    public function changestatus(){
    	$status = $this->input->post('status');
        $tablenm_id = $this->input->post('tablenm_id');
        $explode = explode('.',$tablenm_id);
        $tablenm = $explode[0];
        $id = $explode[1];
        $data = $this->common->update_status($tablenm,$id,$status);
        if($data){
          echo "true";
        }
    }
    public function project_list(){
    	if(isset($_SESSION['programme_director']['id'])){
		    $id = $_SESSION['programme_director']['id'];
		}else{
			$id = '';
		}
		$this->data['record']=$this->common->accessrecord('project_manager', [], ['programme_director'=>$id], 'result');
		$this->data['page'] = 'project_list';
		$this->data['content'] = 'pages/project/project_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function create_project(){
		$id=0;
		if(!empty($_GET['id'])){
			$id= $_GET['id'];
			$this->data['record']=$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
	    }
	    if ($_POST) {
			    if ($id != 0) {
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
                    $password = $_POST['password'];
		    		if($moderator = $this->common->accessrecord('project_manager', [], ['id'=>$id,'password'=>$password], 'row')){
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
						           'created_by'=> $this->input->post('created_by'),
						           'password'=>$pass,
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
						redirect('programme-project-list');
				    }else {
					  $this->session->set_flashdata('error', 'Please Try Again');
					  redirect('programme-project-list');
	                }
	            
				}else{
					if (!empty($_FILES['company_registration_documents']['name'])) {
						$path = "./uploads/project/company_documents/";
						$image = $this->MultipleImageUpload($_FILES['company_registration_documents'], $path, 'company_registration_documents');
					    $gallery = "";
					    foreach ($image as $value) {
					     	$gallery .= $value.",";
					    }
					    $company_documents['company_documents'] = rtrim($gallery,',');
				    }else{
				    	$company_documents['company_documents'] = "";
				    }
				    if (!empty($_FILES['tax_clearance']['name'])) {
	                   $tax_clearances['tax_clearances']=$this->singlefileupload('tax_clearance','./uploads/project/tax_clearance/','gif|jpg|png|xls|doc|docx|jpeg');
	                }else{
				    	$tax_clearances['tax_clearances'] = "";
				    }
	                if (!empty($_FILES['moderator_accreditation']['name'])) {
	                   $moderator_accreditations['moderator_accreditations']=$this->singlefileupload('moderator_accreditation','./uploads/project/moderator_accreditations/','gif|jpg|png|xls|doc|docx|jpeg');
	                }else{
				    	 $moderator_accreditations['moderator_accreditations'] = "";
				    }
	                if (!empty($_FILES['assesor_acreditations']['name'])) {
	                   $assesor_acreditations['assesor_acreditations']=$this->singlefileupload('assesor_acreditations','./uploads/project/assesor_acreditations/','gif|jpg|png|xls|doc|docx|jpeg');
	                }else{
				    	  $assesor_acreditations['assesor_acreditations'] = "";
				    }
	                if (!empty($_FILES['seta_creditiation']['name'])) {
	                   $seta_creditiations['seta_creditiations']=$this->singlefileupload('tax_clearance','./uploads/project/seta_creditiations/','gif|jpg|png|xls|doc|docx|jpeg');
	                }else{
				    	$seta_creditiations['seta_creditiations'] = "";
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
							            //'programme_name'=> $this->input->post('programme_name'),
							            'project_start_date'=> $this->input->post('project_start_date'),
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
							            'created_by'=> $this->input->post('created_by'),
							            'password'=>sha1($this->input->post('password')),
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
					if($this->common->insertData('project_manager',$data)){
					   $this->session->set_flashdata('success','Project Insert Successful');
					   redirect('programme-project-list');
					}else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect('programme-create-project');
		            }
		        }
		    if($id!=0){
			   $this->data['record']=$this->common->accessrecord('project_manager', [], ['id'=>$id], 'row');
		    }
		}
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_director = $_SESSION['programme_director']['id'];
		}else{
			$programme_director = '';
		}
		$this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$this->data['programme_director']=$this->common->accessrecord('programme_director', [], ['id'=>$programme_director], 'result');
		$this->data['page'] = 'create_project';
		$this->data['content'] = 'pages/project/create_project';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

    public function create_training(){
    	if(isset($_SESSION['programme_director']['id'])){
		    $programme_directorid = $_SESSION['programme_director']['id'];
		}else{
			$programme_directorid = '';
		}
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
				redirect('programme-training-list');
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
				    $data['created_by'] = $programme_directorid;
				$training = $this->common->insertData('trainer',$data);
                $this->session->set_flashdata('success','Add Training Successfully');
				redirect('programme-training-list');
			}
        }
		$this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
	    $this->data['project']= $this->common->accessrecord('project_manager', [], ['programme_director'=>$programme_id], 'result');
	    $this->data['page'] = 'create_training';
		$this->data['content'] = 'pages/training/create_training';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function training_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['training']= $this->common->progammerTraining($programme_id);
		$this->data['reports'] = [];
		foreach ($this->data['training'] as $key => $value) {
			foreach ($value as $key1 => $value1) {
							$this->data['reports'][]= $value1;
			}
		}

		foreach ($this->data['reports'] as $ke => $val) {
			if($attendance= $this->common->accessrecord('attendance', [], ['training_provider'=>$val->company_name], 'result')){
						$this->data['reports'][$ke]->total_attendance=sizeof($attendance);
			}else{
				$this->data['reports'][$ke]->total_attendance=0;
			}
			if($marksheet= $this->common->accessrecord('learner_marks', [], ['training_provider'=>$val->company_name], 'result')){
				$this->data['reports'][$ke]->total_marksheet=sizeof($marksheet);
			}else{
				$this->data['reports'][$ke]->total_marksheet=0;
			}
		}
		$this->data['page'] = 'training_list';
		$this->data['content'] = 'pages/training/training_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
				redirect('programme-list-learner');
			}else{
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
				redirect('programme-list-learner');
			}
            
		}
		$this->data['learnership_sub_type']=$this->common->accessrecord('learnership_sub_type', [], [], 'result');
		$this->data['District']=$this->common->get_District();
		$this->data['province']=$this->common->get_province();
		$this->data['region']=$this->common->get_region();
		$this->data['city']=$this->common->get_city();
		$projcetid =projectmanagerid();
		$this->data['training']=$this->common->accessrecord('trainer', [], ['created_by'=>$projcetid], 'result');
	    $this->data['page'] = 'create_learner';
		$this->data['content'] = 'pages/learner/create_learner';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function list_learner(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['record'] =$this->common->programmeTrainingIdWise($programme_id,'learner');
	    $this->data['page'] = 'learner_list';
		$this->data['content'] = 'pages/learner/learner_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
				            'classname'=> $this->input->post('classname'),
				    	);
    		    if($this->common->updateData('facilitator',$data,['id'=>$_GET['id']])){
			        $this->session->set_flashdata('success','Facilitator Update Successfully');
			        redirect('programme-facilitator-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('programme-facilitator-list');
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
							    'classname'=> $this->input->post('classname'),
					    	);
					
			
				if($this->common->insertData('facilitator',$data)){
				   $this->session->set_flashdata('success','Facilitator Insert Successful');
				   redirect('programme-facilitator-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('programme-create-facilitator');
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
		$this->data['training']=$this->common->accessrecord('trainer', [], ['created_by'=>$projcetid], 'result');
		$this->data['classname']=$this->common->accessrecord('class_name', [], [], 'result');
		$this->data['page'] = 'create_facilitator';
		$this->data['content'] = 'pages/facilitator/create_facilitator';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function facilitator_list(){
		$projcetid =projectmanagerid();
		$this->data['facilitator']=$this->common->accessrecord('facilitator', [], ['created_by'=>$projcetid,'user_type'=>2], 'result');
		$this->data['page'] = 'facilitator_list';
		$this->data['content'] = 'pages/facilitator/facilitator_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
			        redirect('programme-assessor-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('programme-assessor-list');
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
				   redirect('programme-assessor-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('programme-create-assessor');
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
		$this->data['training']=$this->common->accessrecord('trainer', [], ['created_by'=>$projcetid], 'result');
		$this->data['page'] = 'create_assessor';
		$this->data['content'] = 'pages/assessor/create_assessor';
		$this->load->view('programmeDirector/tamplate', $this->data);
    }

	public function assessor_list(){
		$projcetid =projectmanagerid();
		$this->data['assessor']=$this->common->accessrecord('assessor', [], ['created_by'=>$projcetid,'user_type'=>2], 'result');
		$this->data['page'] = 'assessor_list';
		$this->data['content'] = 'pages/assessor/assessor_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
			        redirect('programme-moderator-list');
			    }else {
				    $this->session->set_flashdata('error', 'Please Try Again');
				    redirect('programme-moderator-list');
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
				   redirect('programme-moderator-list');
				}else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect('programme-create-moderator');
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
		$this->data['training']=$this->common->accessrecord('trainer', [], ['created_by'=>$projcetid], 'result');
	    $this->data['page'] = 'create_moderator';
		$this->data['content'] = 'pages/moderator/create_moderator';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function moderator_list(){
		$projcetid =projectmanagerid();
	    $this->data['moderator']=$this->common->accessrecord('moderator', [], ['created_by'=>$projcetid,'user_type'=>2], 'result');
		$this->data['page'] = 'moderator_list';
		$this->data['content'] = 'pages/moderator/moderator_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

    public function programme_report_list(){
    	if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['record'] = $this->common->programmeReportdata($programme_id);
	    $this->data['page'] = 'progammme_report_list';
		$this->data['content'] = 'pages/report/progammme_report_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function progammer_director_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->accessrecord('programme_director', [], ['id'=>$id], 'result');
	    $this->data['page'] = 'progammer_director_view';
		$this->data['content'] = 'pages/report/progammer_director_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function project_manager_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->accessrecord('project_manager', [], ['programme_director'=>$id], 'result');
	    $this->data['page'] = 'project_manager_view';
		$this->data['content'] = 'pages/report/project_manager_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function training_provider_view(){
		$id = $this->input->get('id');
		$this->data['record'] =  $this->common->progammerTraining($id);
	    $this->data['page'] = 'training_provider_view';
		$this->data['content'] = 'pages/report/training_provider_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function monderator_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->programmeTrainingIdWise($id,'moderator');
	    $this->data['page'] = 'monderator_view';
		$this->data['content'] = 'pages/report/monderator_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function assessor_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->programmeTrainingIdWise($id,'assessor');
	    $this->data['page'] = 'assessor_view';
		$this->data['content'] = 'pages/report/assessor_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function facilitator_view(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->programmeTrainingIdWise($id,'facilitator');
	    $this->data['page'] = 'facilitator_view';
		$this->data['content'] = 'pages/report/facilitator_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function learner_view(){
		$id = $this->input->get('id');
		$this->data['record'] =$this->common->programmeTrainingIdWise($id,'learner');
	    $this->data['page'] = 'learner_view';
		$this->data['content'] = 'pages/report/learner_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
            redirect('programme-import-learner');
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
         $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true,true,true,true,true,null,null,null,true,true,true,true,true,true,true,true,true,true,true,null,null,null,null);
        
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray =array('TraingProviderName','LearnerFullName','LearnerSurnameName','Email','IdNumber','SETA','PrimaryMobileNumber','SecondaryMobileNumber','Gender','LearnershipSubType','Password','Province','District','City','Region','Suburb','StreetName','StreetNumber','Assessment','IsDisable','UifBenefits','LearnerAcceptedforTraining');
        $makeArray = array('TraingProviderName' => 'TraingProviderName', 'LearnerFullName' => 'LearnerFullName',  'LearnerSurnameName' => 'LearnerSurnameName', 'Email' => 'Email','IdNumber'=>'IdNumber','SETA'=>'SETA','PrimaryMobileNumber'=>'PrimaryMobileNumber','SecondaryMobileNumber'=>'SecondaryMobileNumber','Gender'=>'Gender','LearnershipSubType'=>'LearnershipSubType','Password'=>'Password','Province'=>'Province','District'=>'District','City'=>'City','Region'=>'Region','Suburb'=>'Suburb','StreetName'=>'StreetName','StreetNumber'=>'StreetNumber','Assessment'=>'Assessment','IsDisable'=>'IsDisable','UifBenefits'=>'UifBenefits','LearnerAcceptedforTraining'=>'LearnerAcceptedforTraining');
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
                $trining_provider = $SheetDataKey['TraingProviderName'];
                $first_name = $SheetDataKey['LearnerFullName'];
                //$second_name = $SheetDataKey['LearnerSecondName'];
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
                $trining_provider = filter_var(trim($allDataInSheet[$i][$trining_provider]), FILTER_SANITIZE_STRING);
                if(empty($trining_provider)){
                    $this->session->set_flashdata('error','Please Enter your training provider');
                    redirect('programme-import-learner');
                 }
                $first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);
                if(empty($first_name)){
                    $this->session->set_flashdata('error','Please enter your full name');
                    redirect('programme-import-learner');
                }
                //$second_name = filter_var(trim($allDataInSheet[$i][$second_name]), FILTER_SANITIZE_EMAIL);
                $surname = filter_var(trim($allDataInSheet[$i][$surname]), FILTER_SANITIZE_STRING);
                if(empty($surname)){
                    $this->session->set_flashdata('error','Please enter your surname');
                    redirect('programme-import-learner');
                }
                $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
                if(empty($email)){
                    $this->session->set_flashdata('error','Please enter your email');
                    redirect('programme-import-learner');
                }
                $mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);
                if(empty($mobile)){
                    $this->session->set_flashdata('error','Please enter your  primary cellphone number');
                    redirect('programme-import-learner');
                }
                $mobile_number = filter_var(trim($allDataInSheet[$i][$mobile_number]), FILTER_SANITIZE_STRING);
                if(empty($mobile_number)){
                    $this->session->set_flashdata('error','Please enter your second cellphone number');
                    redirect('programme-import-learner');
                }
                $assessment = filter_var(trim($allDataInSheet[$i][$assessment]), FILTER_SANITIZE_EMAIL);
                if(empty($assessment)){
                    $this->session->set_flashdata('error','Please enter your assessment status');
                    redirect('programme-import-learner');
                }
                $disable = filter_var(trim($allDataInSheet[$i][$disable]), FILTER_SANITIZE_STRING);
                if(empty($disable)){
                    $this->session->set_flashdata('error','Please enter your disabled');
                    redirect('programme-import-learner');
                }
                $utf_benefits = filter_var(trim($allDataInSheet[$i][$utf_benefits]), FILTER_SANITIZE_STRING);
                if(empty($utf_benefits)){
                    $this->session->set_flashdata('error','Please enter your  U.I.F Beneficiary');
                    redirect('programme-import-learner');
                }
                $learner_accepted_training = filter_var(trim($allDataInSheet[$i][$learner_accepted_training]), FILTER_SANITIZE_STRING);
                if(empty($learner_accepted_training)){
                    $this->session->set_flashdata('error','Please enter your learner accepted training');
                    redirect('programme-import-learner');
                }
                $learnershipSubType = filter_var(trim($allDataInSheet[$i][$learnershipSubType]), FILTER_SANITIZE_STRING);
                if(empty($learnershipSubType)){
                    $this->session->set_flashdata('error','Please enter your learnership Sub Type');
                    redirect('programme-import-learner');
                }
                $id_number = filter_var(trim($allDataInSheet[$i][$id_number]), FILTER_SANITIZE_STRING);
                if(empty($id_number)){
                    $this->session->set_flashdata('error','Please enter your id number');
                    redirect('programme-import-learner');
                }
                $SETA = filter_var(trim($allDataInSheet[$i][$SETA]), FILTER_SANITIZE_EMAIL);
                if(empty($SETA)){
                    $this->session->set_flashdata('error','Please enter your SETA');
                    redirect('programme-import-learner');
                }
                $province = filter_var(trim($allDataInSheet[$i][$province]), FILTER_SANITIZE_STRING);
                if(empty($province)){
                    $this->session->set_flashdata('error','Please enter your province');
                    redirect('programme-import-learner');
                }
                $district = filter_var(trim($allDataInSheet[$i][$district]), FILTER_SANITIZE_STRING);
                if(empty($district)){
                    $this->session->set_flashdata('error','Please enter your district');
                    redirect('programme-import-learner');
                }
                $city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);
                if(empty($city)){
                    $this->session->set_flashdata('error','Please enter your city');
                    redirect('programme-import-learner');
                }
                $region = filter_var(trim($allDataInSheet[$i][$region]), FILTER_SANITIZE_STRING);
                if(empty($region)){
                    $this->session->set_flashdata('error','Please enter your region');
                    redirect('programme-import-learner');
                }
                $Suburb = filter_var(trim($allDataInSheet[$i][$Suburb]), FILTER_SANITIZE_STRING);
                if(empty($Suburb)){
                    $this->session->set_flashdata('error','Please enter your Suburb');
                    redirect('programme-import-learner');
                }
                $Street_name = filter_var(trim($allDataInSheet[$i][$Street_name]), FILTER_SANITIZE_STRING);
                if(empty($Street_name)){
                    $this->session->set_flashdata('error','Please enter your street name');
                    redirect('programme-import-learner');
                }
                $Street_number = filter_var(trim($allDataInSheet[$i][$Street_number]), FILTER_SANITIZE_STRING);
                if(empty($Street_number)){
                    $this->session->set_flashdata('error','Please enter your street number');
                    redirect('programme-import-learner');
                }
                $password = filter_var(trim($allDataInSheet[$i][$password]), FILTER_SANITIZE_STRING);
                if(empty($password)){
                    $this->session->set_flashdata('error','Please enter your password');
                    redirect('programme-import-learner');
                }
                $gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);
                if(empty($gender)){
                    $this->session->set_flashdata('error','Please enter your gender');
                    redirect('programme-import-learner');
                }
                
                $fetchData[] = array('trining_provider' =>$trining_provider, 'first_name' =>$first_name,  'surname' =>$surname, 'email' =>$email,'mobile'=>$mobile,'mobile_number'=>$mobile_number,'assessment'=>$assessment,'disable'=>$disable,'utf_benefits'=>$utf_benefits,'learner_accepted_training'=>$learner_accepted_training,'learnershipSubType'=>$learnershipSubType,'id_number'=>$id_number,'SETA'=>$SETA,'province'=>$province,'district'=>$district,'city'=>$city,'region'=>$region,'Suburb'=>$Suburb,'Street_name'=>$Street_name,'Street_number'=>$Street_number,'password'=>sha1($password),'gender'=>$gender);
            }              
            $data['employeeInfo'] = $fetchData;
            $this->common->setBatchImport($fetchData);
            $this->common->importData();
            } else {
            $this->session->set_flashdata('error','Please import correct file');
            redirect('programme-import-learner');
        }
        redirect('programme-list-learner');
    }

    public function import_learner(){
    	$this->data['page'] = 'import_learner';
		$this->data['content'] = 'pages/learner/import_learner';
		$this->load->view('programmeDirectorr/tamplate', $this->data);	
	}
	public function learnermarks_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}
	    $this->data['record'] = $this->common->ProgrammeDirectorLearnerMark($programme_id,'programme_director');
    	$this->data['page'] = 'learner_marks_list';
		$this->data['content'] = 'pages/learner_marks/learner_marks_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function attendance_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}
	    $this->data['record'] = $this->common->ProgrammeDirectorAttendance($programme_id,'programme_director');
		$this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/attendance/attendance_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function assessorview(){
        $id= $this->input->get('id');
	    $this->data['record'] = $this->common->accessrecord('assessor', [], ['trainer_id'=>$id], 'result');
		$this->data['page'] = 'assessorview';
		$this->data['content'] = 'pages/assessor/assessorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function facilitatorview(){
		$id= $this->input->get('id');
	    $this->data['record'] = $this->common->accessrecord('facilitator', [], ['trainer_id'=>$id], 'result');
		$this->data['page'] = 'facilitatorview';
		$this->data['content'] = 'pages/facilitator/facilitatorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function learnerview(){
		$id = $this->input->get('id');
	    $this->data['record'] = $this->common->ProjectLearnerIdWise($id,'learner');
		$this->data['page'] = 'learnerview';
		$this->data['content'] = 'pages/learner/learnerview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function moderatorview(){
		$id= $this->input->get('id');
	    $this->data['record'] = $this->common->accessrecord('moderator', [], ['trainer_id'=>$id], 'result');
		$this->data['page'] = 'moderatorview';
		$this->data['content'] = 'pages/moderator/moderatorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function training_view(){
		$id= $this->input->get('id');
	    $this->data['record'] = $this->common->accessrecord('trainer', [], ['project_id'=>$id], 'result');
		$this->data['page'] = 'training_view';
		$this->data['content'] = 'pages/training/training_view';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function projectassessorview(){
        $id= $this->input->get('id');
	    $this->data['record'] = $this->common->projectmangertrainingproviderIdWise($id, 'assessor');
		$this->data['page'] = 'projectassessorview';
		$this->data['content'] = 'pages/assessor/projectassessorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function projectfacilitatorview(){
		$id= $this->input->get('id');
	    $this->data['record'] = $this->common->projectmangertrainingproviderIdWise($id,'facilitator');
		$this->data['page'] = 'projectfacilitatorview';
		$this->data['content'] = 'pages/facilitator/projectfacilitatorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function projectlearnerview(){
		$id = $this->input->get('id');
		$this->data['record'] = $this->common->projectmangertrainingproviderIdWise($id,'learner');
		$this->data['page'] = 'projectlearnerview';
		$this->data['content'] = 'pages/learner/projectlearnerview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function projectmoderatorview(){
		$id= $this->input->get('id');
	    $this->data['record'] = $this->common->projectmangertrainingproviderIdWise($id,'moderator');
		$this->data['page'] = 'projectmoderatorview';
		$this->data['content'] = 'pages/moderator/projectmoderatorview';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function drop_out_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['record'] = $this->common->programmeDorpout('drop_out',$programme_id);
		$this->data['page'] = 'drop_out_list';
		$this->data['content'] = 'pages/drop_out/drop_out_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function stipends_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['record'] = $this->common->programmeDorpout('stipend',$programme_id);
	    $this->data['page'] = 'stipend_list';
		$this->data['content'] = 'pages/stipend/stipend_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
    public function deletedataprojectmanager(){
		if(!empty($_GET['data'])){
            if($this->common->accessrecord('trainer',[],['project_id'=>$_GET['data']],'row')){
                echo json_encode(array('error'=>"error"));
            }else{
                $this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
                echo json_encode(array('status'=>'true'));
            }
        }
	}
	public function deletedataTrainingprovider(){
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
	public function income_item_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
        $this->data['record']=$this->common->AccountBalanceData('programmer_total_income',$programme_id);
        $this->data['count']=$this->common->AccountBalanceData('programmer_total_count_income',$programme_id);
        $this->data['page'] = 'income_item_list';
		$this->data['content'] = 'pages/finance/income_item_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function expense_item_list(){
    	if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
    	$this->data['data']=$this->common->AccountBalanceData('programmer_total_expense',$programme_id);
    	$this->data['count']=$this->common->AccountBalanceData('programmer_total_count_expense',$programme_id);
		$this->data['page'] = 'expense_item_list';
		$this->data['content'] = 'pages/finance/expense_item_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
    public function account_balance_list(){
    	if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
		$this->data['record']=$this->common->AccountBalanceData('programmer_total_account',$programme_id);
        $this->data['page'] = 'account_balance_list';
		$this->data['content'] = 'pages/finance/account_balance_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function bank_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
        $this->data['record'] = $this->common->ProgrammeDirectorBankDetail('programme_director',$programme_id);
	    $this->data['page'] = 'bank_list';
		$this->data['content'] = 'pages/bank/bank_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
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
    public function class_list(){
		if(isset($_SESSION['programme_director']['id'])){
		    $programme_id = $_SESSION['programme_director']['id'];
		}else{
			$programme_id = '';
		}
        $this->data['record']=$this->common->ProjectManagerClass('programme_director',$programme_id);
		$this->data['page'] = 'class_list';
		$this->data['content'] = 'pages/class/class_list';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function create_user(){
		if($_POST){
			// echo '<pre>';print_r($_POST);
			$trainer_id = $_SESSION['programme_director']['id'];
			$data=array('first_name'=>$_POST['first_name'],'second_name'=>$_POST['second_name'],'designation'=>$_POST['designation'],'email'=>$_POST['email'],'password'=>base64_encode($_POST['password']),'type'=>'Programme_Director','created_by_id'=>$trainer_id, 'mobile'=>$_POST['mobile'],);
			if(!empty($_POST['modules'])){
			if($ins=$this->common->insertData('sub_user',$data)){
				// echo '<pre>'; print_r($ins);die();
              //  if(!empty($_POST['modules'])){
				$modules=$_POST['modules'];
				$modularr['user_id']=$ins;
				$modularr['user_type']='Programme_Director';
				foreach ($modules as $key => $value) {
					if(sizeof($value)>0 ){
					$modularr['module_name']=$key;
					if($value!=='on'){
					$modularr['is_view']=(in_array('view', $value))?1:0;
					$modularr['is_add']=(in_array('add', $value))?1:0;
					$modularr['is_edit']=(in_array('edit', $value))?1:0;
					$modularr['is_delete']=(in_array('delete', $value))?1:0;
				     }else{
				     $modularr['is_view']=0;
				     $modularr['is_add']=0;
				     $modularr['is_edit']=0;
				     $modularr['is_delete']=0;	
				     }
                    $this->common->insertData('user_permission',$modularr);
                     }else{
						$this->session->set_flashdata('module_error', 'Please select add permission type (add /edit /delete /view)');

                    }

				  } 
		            $this->session->set_flashdata('success','Insert Successful');
				     redirect('programme-User-list');
					}else {
						$this->session->set_flashdata('error', 'Please Try Again');
					redirect('Create-programme-User');
		            }
		        }else{
						$this->session->set_flashdata('module_error', 'Please select modules for permission');

           }     
		}
	  	$this->data['module'] = $this->common->accessrecord('user_modules',[],['panel_name'=>'Programme_Director','status'=>1],'result');
        $this->data['page'] = 'create_user';
		$this->data['content'] = 'pages/user/create_user';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
	public function user_list(){
		$trainer_id = $_SESSION['programme_director']['id'];
		$this->data['record'] = $this->common->accessrecord('sub_user',[],['type'=>'Programme_Director', 'created_by_id'=>$trainer_id],'result');
        $this->data['page'] = 'user_list';
		$this->data['content'] = 'pages/user/user_list';
		// echo '<pre>'; print_r($this->data['record']);die();
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function deleteUser()
	{
		// echo '<pre>'; print_r($_GET); die();
		$this->common->deleteRecord('user_permission',['user_id'=>$_GET['data']]);

			
		$this->common->deleteRecord($_GET['table'],[$_GET['behalf']=>$_GET['data']]);
		
	}

	public function user_edit(){
		$trainer_id = $_SESSION['programme_director']['id'];
		$id=$_GET['id'];
		$this->data['record'] = $this->common->accessrecord('sub_user',[],['type'=>'Programme_Director','id'=>$_GET['id'],'created_by_id'=>$trainer_id],'row');

       $modules = $this->common->accessrecord('user_permission',['module_name'],['user_type'=>'Programme_Director','user_id'=>$_GET['id']],'result');
       // echo '<pre>'; print_r($modules);die();

       $modulearr=array();
       if(!empty($modules)){
       	
       	foreach ($modules as $key => $value) {
       		$modulearr[]=$value->module_name;
       	}

       	}
		$this->data['module'] = $this->common->accessrecord('user_modules',[],['panel_name'=>'Programme_Director','status'=>1],'result');
       	// echo '<pre>'; print_r($this->data['module']);die();
		foreach ($this->data['module'] as $ke => $val) {
			if(in_array($val->module_name, $modulearr)){
				$this->data['module'][$ke]->is_selected=1;
				$res=$this->common->accessrecord('user_permission',['is_view,is_add,is_edit,is_delete'],['user_type'=>'Programme_Director','user_id'=>$_GET['id'],'module_name'=>$val->module_name],'row');
				$this->data['module'][$ke]->is_view=$res->is_view;
				$this->data['module'][$ke]->is_add=$res->is_add;
				$this->data['module'][$ke]->is_edit=$res->is_edit;
				$this->data['module'][$ke]->is_delete=$res->is_delete;

			}else{
				$this->data['module'][$ke]->is_selected=0;
				$this->data['module'][$ke]->is_view=0;
				$this->data['module'][$ke]->is_add=0;
				$this->data['module'][$ke]->is_edit=0;
				$this->data['module'][$ke]->is_delete=0;
			}
		}
		if($_POST){
			//echo '<pre>';print_r($_POST);
			$trainer_id = $_SESSION['programme_director']['id'];
			$data=array('first_name'=>$_POST['first_name'],'second_name'=>$_POST['second_name'],'designation'=>$_POST['designation'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'password'=>base64_encode($_POST['password']));
           if(!empty($_POST['modules'])){
				$this->common->updateData('sub_user',$data,array('type'=>'Programme_Director','created_by_id'=>$trainer_id,'id'=>$id));
               // if(!empty($_POST['modules'])){
				$modules=$_POST['modules'];
				$modularr['user_id']=$id;
				$modularr['user_type']='Programme_Director';
                $this->common->deleteRecord('user_permission',['user_id'=>$id,'user_type'=>'Programme_Director']);

				foreach ($modules as $key => $value) {
					$modularr['module_name']=$key;
					
					
					if($value!=='on'){
					$modularr['is_view']=(in_array('view', $value))?1:0;
					$modularr['is_add']=(in_array('add', $value))?1:0;
					$modularr['is_edit']=(in_array('edit', $value))?1:0;
					$modularr['is_delete']=(in_array('delete', $value))?1:0;
				     }else{
				     $modularr['is_view']=0;
				     $modularr['is_add']=0;
				     $modularr['is_edit']=0;
				     $modularr['is_delete']=0;	
				     }
                    $this->common->insertData('user_permission',$modularr);
                  } 
				 
		            $this->session->set_flashdata('success','Update Successful');
				     redirect('programme-User-list');
			}else{
						$this->session->set_flashdata('module_error', 'Please select modules for permission');

           }		

			
		}
        //echo '<pre>'; print_r($this->data['module']);die;
        $this->data['page'] = 'create_user';
		$this->data['content'] = 'pages/user/edit_user';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function forgetpassword()
	{
		if(empty($_SESSION['programme_director']['id']))
		$this->load->view('programmeDirector/forgetpassword');
	}

	public function totalQuarterlyReport(){
		$programme_id = programmeDirectorId();

		$this->data['training']= $this->common->progammerTraining($programme_id);
		$this->data['reports'] = [];
		foreach ($this->data['training'] as $key => $value) {
			foreach ($value as $key1 => $value1) {
							$this->data['reports'][]= $value1;
				foreach ($this->data['reports'] as $key2 => $value2) {
					if($report= $this->common->accessrecord('quarterly_progress_report', [], ['training_provider_name'=>$value2->id], 'result')){
						$this->data['reports'][$key2]->total_report=sizeof($report);
					}else{
						$this->data['reports'][$key2]->total_report=0;
					}
				}
			}
		}
		// echo '<pre>';print_r($this->data['reports']);die();
		$this->data['page'] = 'progammme_report_list';
		$this->data['content'] = 'pages/report/provider_quarterly_report';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function listQuarterlyReportCreatedByProvider()
	{
		$id = $_GET['id'];
		if($training= $this->common->getTrainerQuarterlyReport($id)){
			$this->data['record']=$training;
			
			// echo '<pre>';print_r($training);die();
		}
		// echo '<pre>';print_r($training);die();
		$this->data['page'] = 'progammme_report_list';
		$this->data['content'] = 'pages/report/quarterly_report_created_by_provider';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function providerAddedMarksheet()
	{
		if($marksheets= $this->common->accessrecord('learner_marks', [], ['training_provider'=>$_GET['company_name']], 'result')){
			$this->data['marksheet']=$marksheets;
       	// echo '<pre>';print_r($this->data['record']);die();
		}
		$this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/report/mark_sheet';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}

	public function providerAddedAttendance()
	{
		if($attendances= $this->common->accessrecord('attendance', [], ['training_provider'=>$_GET['company_name']], 'result')){
			$this->data['attendance']=$attendances;
       	// echo '<pre>';print_r($this->data['attendance']);die();
		}
		$this->data['page'] = 'attendance_list';
		$this->data['content'] = 'pages/report/list_attendance';
		$this->load->view('programmeDirector/tamplate', $this->data);
	}
}