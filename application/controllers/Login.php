<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct() 
	{
	parent::__construct();	
		$this->load->helper(array('form', 'url','cookie'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');

	}
public function index(){
	
	if(!$this->session->userdata('admindetails')){
		//echo $this->input->cookie('username'); exit;
			
	$this->load->view('admin/header');
	$this->load->view('admin/login');
	$this->load->view('admin/footer');
		
	}else{

	redirect('admin/dashboard');
	}
	
	
}
public function logout(){
	if($this->session->userdata('admindetails'))
		{
				
			$this->session->unset_userdata('admindetails');
			$this->session->sess_destroy('admindetails');
			redirect('login');
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('login');
		} 
	
	
}
public function forgot_password(){
	if(!$this->session->userdata('admindetails')){
		$this->load->view('admin/header');
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/footer');
	}else{
		redirect('admin/dashboard');
	}
	
	
}


	
	
	
	
	
}

 ?>