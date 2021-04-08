<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function providerUserLogin()
	{
		if ($_POST)
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()==true)
			{
				$data['password'] = base64_encode($_POST['password']);
				$data['email']	= $_POST['email'];
				// echo '<pre>'; print_r($data);die();
				
				if ($data1 = $this->common->accessrecord('sub_user', [], $data, 'row_array')) {
					// echo "string";die();
					$data1['user_id'] = $data1['id'];
					$data1['trainer_id'] = $data1['created_by_id'];
					$data1['logintype'] = 'user';
					// echo '<pre>';print_r($data1);die;
					$this->session->set_userdata('admin', $data1);
					//$this->session->set_userdata('logintype', 'user');
					// echo '<pre>'; print_r($this->session->userdata['admin']);die;
					redirect('Provider-Dashboard');
				} else {
					$this->session->set_flashdata('error', 'Invalid login creadential');
				}
			}
		}
		$this->load->view('provider/provideruserlogin');
	}

	public function projectManagerUserLogin()
	{
		if ($_POST)
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
	    	$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == true) 
			{
				$_POST['type'] = 'Project_Manager';
				$_POST['password'] = base64_encode($_POST['password']);
				// $data = $_POST;
				// echo '<pre>'; print_r($_POST);die();
				if ($data1 = $this->common->accessrecord('sub_user',[], $_POST, 'row_array'))
				{
					$data1['user_id'] = $data1['id'];
					$data1['id'] = $data1['created_by_id'];
					$data1['logintype'] = 'user';
					$this->session->set_userdata('projectmanager', $data1);
					// echo '<pre>'; print_r($this->session->userdata['projectmanager']);die();
					redirect('projectmanager-dashboard');
				}else 
				{
					$this->session->set_flashdata('error', 'Invalid login creadential');
				}
			}
		}
        $this->load->view('project-manager/manageruserlogin');
	}

	public function programme()
	{
		if ($_POST)
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == true)
			{
				$_POST['type'] = 'Programme_Director';
				$_POST['password'] = base64_encode($_POST['password']);
				if ($data1 = $this->common->accessrecord('sub_user', [], $_POST, 'row_array'))
				{
					$data1['user_id'] = $data1['id'];
					$data1['id'] = $data1['created_by_id'];
					$data1['logintype'] = 'user';
					
					$this->session->set_userdata('programme_director', $data1);
					// $this->session->set_flashdata('success', 'Login Successful');
					// echo '<pre>'; print_r($this->session->userdata('programme_director'));die();

					redirect('programme-dashboard');
				} else {
					$this->session->set_flashdata('error', 'Invalid login creadential');
				}
			}
		}
		$this->load->view('programmeDirector/directoruserlogin');
	}


	/*public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord(TBL_USER, [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('admin', $session);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('admin/login');
	}*/

	/*public function organisation(){
		$this->form_validation->set_rules('email_address', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('organisation', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('organisation', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('dashboard1');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('organisation/login');
	}*/
	/*public function organisation()
	{
		$this->form_validation->set_rules('email_address', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('organisation', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('organisation', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('organisation-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('organisation/login');
	}*/
	/*public function programme(){
		$this->form_validation->set_rules('email_address', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$d = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('programme_director', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('programme_director', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('programme-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('programmeDirector/login');
	}*/
	/*public function faciltator(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('facilitator', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('facilitator', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('Faciltator-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('faciltator/login');
	}*/
	/*public function moderator(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('moderator', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('moderator', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('Moderator-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('moderator/login');
	}*/
	/*public function projectmanager(){
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {} else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->ulogin(TBL_Project_Manager, $data)) {
				$session['id'] = $data->id;
				$this->session->set_userdata('projectmanager', $session);
				redirect('projectmanager-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
        $this->load->view('project-manager/login');
	}*/
	/*public function assosser(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) { } else {
			$data = $_POST;
			$data['password'] = sha1($_POST['password']);
			if ($data = $this->common->accessrecord('assessor', [], $data, 'row')) {
				$session['id'] = $data->id;
				$this->session->set_userdata('assessor', $session);
				$this->session->set_flashdata('success', 'Login Successful');
				redirect('assessor-dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid login creadential');
			}
		}
		$this->load->view('assessor/login');
	}*/
	/*public function learner(){
	   if ($_POST) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == false) { 
				//$this->load->view('learner/login');
			} else {
				$data = $_POST;
				$data['password'] = sha1($_POST['password']);
				if ($data = $this->common->learner_login($data)) {
					$session['id'] = $data->id;
					$this->session->set_userdata('learner', $session);
					redirect('learner-Dashboard');
				} else {
					$this->session->set_flashdata('error', 'Invalid login creadential');
				}
			}
			$this->load->view('learner/login');
		}else{
			$this->load->view('learner/login');
		}
	}
    */
}