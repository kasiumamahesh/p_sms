<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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

public function test(){
	$emailConfig = [
            'protocol' => 'smtp', 
            'smtp_host' => 'ssl://smtp.googlemail.com', 
            'smtp_port' => 465, 
            'smtp_user' => 'kasimahesh34@gmail.com', 
            'smtp_pass' => '9866482830', 
            'mailtype' => 'html', 
            'charset' => 'iso-8859-1'
        ];
$this->load->library('email',$emailConfig); 
$this->email->from('kasimahesh34@example.com', 'Sender Name');
$this->email->to('kasiphp5@example.com','Recipient Name');
$this->email->subject('Your Subject');
$this->email->message('Your Message'); 
try {
    $this->email->send();
    echo 'Message has been sent.';
} catch(Exception $e) {
    echo $e->getMessage();
}
}
}