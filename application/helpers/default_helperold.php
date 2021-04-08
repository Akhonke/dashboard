<?php defined('BASEPATH') or exit('No direct script access allowed');

function userid()
{
	$CI = &get_instance();
	return isset($CI->session->userdata['user']['id']) ?  $CI->session->userdata['user']['id'] : "";
}

function adminid()
{
	$CI = &get_instance();
	//return $CI->session->userdata['admin']['id'];
	return isset($CI->session->userdata['admin']['id']) ?  $CI->session->userdata['admin']['id'] : "";

}
function trainerid()
{
	$CI = &get_instance();
	//return $CI->session->userdata['trainer']['id'];
	return isset($CI->session->userdata['trainer']['id']) ?  $CI->session->userdata['trainer']['id'] : "";

}

// *************************PROJECT MANAGER**********************************************
function projectmanagerid()
{
	$CI = &get_instance();
	return isset($CI->session->userdata['projectmanager']['id']) ?  $CI->session->userdata['projectmanager']['id'] : "";
}





/*=========================== profile pic ================================ 
function imageupload($path, $name)
{
	$CI = &get_instance();

	$config['upload_path']          = $path;
	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	$config['file_ext_tolower']		= TRUE;
	$config['overwrite']			= TRUE;
	$config['encrypt_name']			= TRUE;
	$config['detect_mime']			= TRUE;
	$config['remove_spaces']		= TRUE;
	$config['mod_mime_fix']			= TRUE;

	$CI->load->library('upload', $config);
	if (!$CI->upload->do_upload($name)) {
		$message = array('message' => 'Only jpg , jpeg, gif, png file allowed', 'success' => 0);
	} else {
		$data = $CI->upload->data();
		$message = array('message' => $data['file_name'], 'success' => 1);
	}
	return $message;
}
/*============================end=============end========================= */
