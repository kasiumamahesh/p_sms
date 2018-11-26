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
	
$this->load->library('email'); 
$this->email->from('kasimahesh34@gmail.com', 'Sender Name');
$this->email->to('kasiphp5@gmail.com','Recipient Name');
$this->email->subject('Your Subject');
$this->email->message('Your Message'); 
try {
    $this->email->send();
    echo 'Message has been sent.';
	echo $this->email->print_debugger();
} catch(Exception $e) {
    echo $e->getMessage();
}
}
}