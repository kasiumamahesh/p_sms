<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Admin extends In_frontend{

	
	public function __construct() 
	{
		parent::__construct();	
				$this->load->model('Admin_model');
				$this->load->model('Schedule_model');
		
	
		
	}
	public function index(){
	
        if(!$this->session->userdata('admindetails')){
			redirect('login');
			
		}
			
		$num_sch=$this->Schedule_model->get_all_Schedules();
         $num_grps= $this->Admin_model->get_grouplist()	;
$data['smscount']=$this->Schedule_model->get_sms_count();		 
		 $data['ngrps']=count($num_grps);
		 $data['nschs']=count($num_sch);
	$this->load->view('admin/index',$data);
	$this->load->view('admin/footer');
			
		
	
	}
	public function checking(){
			
	 $this->form_validation->set_rules('email', 'user name', 'required');
	  $this->form_validation->set_rules('password', 'password', 'required');
	 
	   if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
                    redirect('login');

               }
			   //echo 'kdkd'; exit;
			   
	$userid=$this->input->post('email');
	$password=$this->input->post('password');
	
	

	$password=md5($password);
	
$row=$this->Admin_model->logincheck($userid,$password);
 //echo $this->input->post('remember_me');exit;

//echo '<pre>'; print_r($row);exit;
if(!(count($row)>0)){
	      $this->session->set_flashdata('error','email or password is incorrect');
                    redirect('login');
	
}
$this->session->set_userdata('admindetails',$row);
if($this->input->post('remember_me')){
$this->input->set_cookie('remember','yes','360000'); 
$this->input->set_cookie('username',$this->input->post('email'),'360000'); 
$this->input->set_cookie('password',$this->input->post('password'),'360000'); 
	}
	//echo $this->input->cookie('username'); exit;
		
		/*$this->load->view('admin/index');
	$this->load->view('admin/footer');*/
		
	
	redirect('admin');
	
	
	
}

	public function dashboard(){
		if($this->session->userdata('admindetails')){
			/*$this->load->view('admin/index');
	         $this->load->view('admin/footer');*/
			
			redirect('admin');
		}
		
		
	}
	public function addcampaign(){
		if($this->session->userdata('admindetails')){
			
			$data['plans']=$this->Admin_model->get_all_plans();
			$data['groups']=$this->Admin_model->get_grouplist();
			$data['msgs']=$this->Admin_model->get_all_templates();
			
			$this->load->view('admin/add_campaign_schedule',$data );
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function listcampaign(){
		if($this->session->userdata('admindetails')){
			$clist=$this->Schedule_model->get_all_Schedules();
		if(count($clist)>0){
				$data['status']=1;
				$data['clist']=$clist;
			}
			else{
				$data['status']=0;
			}
				$slist=$this->Schedule_model->get_saved_Schedules();
				if(count($slist)>0){
				$data['savestatus']=1;
				$data['slist']=$slist;
			}
			else{
				$data['savestatus']=0;
			}
			//echo $data['status'];exit;
			$this->load->view('admin/campaign_list',$data);
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function  addgroup(){
		if($this->session->userdata('admindetails')){
			 $this->load->view('admin/add_group');
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function  listgroup(){
		if($this->session->userdata('admindetails')){
			
			$result=$this->Admin_model->get_grouplist();
			
			//echo '<pre>';print_r($result);exit
			if(count($result)>0){
				$data['status']=1;
				$data['grouplist']=$result;
				
			}
			else{
				$data['status']=0;
			}
			
			 $this->load->view('admin/group_list',$data);
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function  addtemplate(){
		if($this->session->userdata('admindetails')){
			
			 $this->load->view('admin/add_message');
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function  listtemplate(){
		if($this->session->userdata('admindetails')){
			$msglist= $this->Admin_model->get_all_templates();
			if(count($msglist)>0){
				$data['status']=1;
				$data['msglist']=$msglist;
			}
			else{
				
				$data['status']=0;
				}
				//echo $data['status'];exit;
			
			 $this->load->view('admin/message_list',$data);
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function  listplan(){
		if($this->session->userdata('admindetails')){
			$planlist= $this->Admin_model->get_all_plans();
			if(count($planlist)>0){
				$data['status']=1;
				$data['planlist']=$planlist;
			}
			else{
				
				$data['status']=0;
				}
				//echo $data['status'];exit;
			
			 $this->load->view('admin/plan_list',$data);
	         $this->load->view('admin/footer');
			
			
		}
		}
		
		public function  reports(){
		if($this->session->userdata('admindetails')){
			
			 $this->load->view('admin/reports');
	         $this->load->view('admin/footer');
			
			
		}
		}
		public function savegroup(){
			if($this->session->userdata('admindetails')){

				$this->form_validation->set_rules('ag_name', 'group name', 'required|is_unique[group_tab.group_name]');
	            $this->form_validation->set_rules('ag_contacts', 'contact number ', 'required');
	          if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
                    redirect('admin/addgroup');

               }
			   				$groupname=$this->input->post('ag_name');
			
				$cont_numbers=$this->input->post('ag_contacts');
				$arr_numbers=explode(',',$cont_numbers);
				//echo '<pre>'; print_r($arr_numbers);exit;
				$nums=array();
				$grpdata=array('group_name'=>$groupname);
				$group_id=$this->Admin_model->insert_group($grpdata);
				//echo $group_id; exit;
				//$data=array();
			foreach($arr_numbers as $number){
			 $orgnumber=trim($number);
             if (is_numeric($orgnumber)&&strlen($orgnumber)==10){
				//array_push($nums,$orgnumber);
				$data[]=['group_id'=>$group_id,'cont_number'=>$orgnumber];
				
				 }
				
			}
//echo '<pre>'; print_r($data);exit;
if(!empty($data)) {
			$status=$this->Admin_model->insert_grp_numbers($data);
			//echo $this->db->last_query();exit;
			
		
				$this->session->set_flashdata('success','group added successfully');
				
			redirect('admin/listgroup');
			
}
			else{
				   $this->Admin_model->delete_temp_group($group_id);
					$this->session->set_flashdata('success','group  cannot be added without contact numbers');
					redirect('admin/listgroup');
				
			}
				
				}
				else{
					redirect('login');
				}
			
		}
		public function groupedit(){
			if($this->session->userdata('admindetails')){
				 $gid=base64_decode($this->uri->segment(3));
				 
				$data['gpdata']=$this->Admin_model->get_group_details($gid);
				//print_r($data);exit;
							
			 $this->load->view('admin/edit_group',$data);
	         $this->load->view('admin/footer');
				
			
				
			}
			else{
					redirect('login');
				}
			
		}
		public function save_edit_group(){
			if($this->session->userdata('admindetails')){
				
			$gid=$this->input->post('gid');
			$gname=$this->input->post('eg_name');
			$flag=$this->Admin_model->get_groupname($gid,$gname);
		
			if($flag==1){
				$this->session->set_flashdata('error','group name already existed');
				 redirect($_SERVER['HTTP_REFERER']);
				
			}
			
			$numbers=$this->input->post('eg_contacts');
			$arr_numbers=explode(',',$numbers);
				$group_id=$this->Admin_model->edit_group($gid,$gname);
				$data=[];
			foreach($arr_numbers as $number){
			 $orgnumber=trim($number);
             if (is_numeric($orgnumber)&&strlen($orgnumber)==10){
				
				$data[]=['group_id'=>$gid,'cont_number'=>$orgnumber];
				
				 }
				
			}
			$this->Admin_model->delete_group_numbers($gid);
//echo '<pre>'; print_r($data);exit;
if(!empty($data)) {
                
			$status=$this->Admin_model->insert_grp_numbers($data);
			
		
				$this->session->set_flashdata('success','group updated successfully');
				
			redirect('admin/listgroup');
		
}
			else{
					$this->session->set_flashdata('success','group updated successfully without contact numbers');
					redirect('admin/listgroup');
				
			}
			}
			else{
            redirect('login');
				
			}
			
			
		}
		public function groupdelete(){
			if($this->session->userdata('admindetails')){
			$gid=base64_decode($this->uri->segment(3));
			echo $gid;
			//$this->Admin_model->delete_group_numbers($gid);
			$status=$this->Admin_model->deactivate_group($gid);
			//echo $this->db->last_query();exit;
			if($status==1){
				$this->session->set_flashdata('success','group deactivated successfully ');
					redirect('admin/listgroup');
				
			}
			else{
				$this->session->set_flashdata('error','some technical problems, group not deleted ');
					redirect('admin/listgroup');
			}
			}
			else{
            redirect('login');
				
			}
		}
		public function addmessage(){	
		if($this->session->userdata('admindetails'))
		{
			$msg_name=$this->input->post('am_name');
			$msg_content=$this->input->post('am_message');
			$this->form_validation->set_rules('am_name', 'template name', 'required|is_unique[message_template.template_name]');
	  $this->form_validation->set_rules('am_message', 'message content', 'required');
	 
	   if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
                    redirect('admin/addgroup');

               }
			$data=array('template_name'=>$msg_name,'template_content'=>$msg_content);
			$status=$this->Admin_model->message_save($data);
			if($status==1){
				
				$this->session->set_flashdata('success','messsage template added successfully');
					redirect('admin/listtemplate');
			}
			else{	
			$this->session->set_flashdata('error','some technical problems');
					redirect('admin/listtemplate');
					}
		}
		else{
            redirect('login');
				
			}
	
	
}
public function edit_message(){
	if($this->session->userdata('admindetails')){
		$tid=base64_decode($this->uri->segment(3));
		$data['template']=$this->Admin_model->get_template($tid);
						
			 $this->load->view('admin/edit_message',$data);
	         $this->load->view('admin/footer');
		
		
	}else{redirect('login');}
}
public function save_edit_message(){
	if($this->session->userdata('admindetails')){
		$this->form_validation->set_rules('em_name', 'message name', 'required');
	            $this->form_validation->set_rules('em_message', 'message body ', 'required');
				
	          if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
		  $bid=base64_encode($this->input->post('t_id'));
                    redirect('admin/edit_message/'.$bid);

               }
			   $mname=$this->input->post('em_name');
			  $mcontent=$this->input->post('em_message');
			  $tid=$this->input->post('t_id');
			  $flag=$this->Admin_model->get_templatename($tid,$mname);
		
			if($flag==1){
				$this->session->set_flashdata('error','message name already existed');
				 redirect($_SERVER['HTTP_REFERER']);
				
			}
			   
			   $data=array(
			   'template_name'=>$mname,
			   'template_content'=>$mcontent);
		$status=$this->Admin_model->save_edit_message($tid,$data);
		if($status==1){
			$this->session->set_flashdata('success','message template updated successfully');
			redirect('admin/listtemplate');
			
		}else{
			$this->session->set_flashdata('error','you are not updated anything');
			redirect('admin/listtemplate');
		}
		
	}else{
		redirect('login');
		}
	
}
public function addplan(){
	if($this->session->userdata('admindetails')){
		$this->load->view('admin/add_plan');
		$this->load->view('admin/footer');
	}
	else{
		redirect('login');
		}
	
}
public function saveplan(){
	if($this->session->userdata('admindetails')){
		$this->form_validation->set_rules('ap_name', 'Plan Type', 'required|is_unique[sms_plan_type.plan_name]');
	    $this->form_validation->set_rules('ap_sms', 'Number of Smses  ', 'required');
		  if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
		 
               redirect('admin/addplan');

               }
			   $ins_data=array('plan_name'=>$this->input->post('ap_name'),
			   'sms_per_day'=>$this->input->post('ap_sms'));
			  $status=$this->Admin_model->insert_plan($ins_data);
			  if($status==1){
				   $this->session->set_flashdata('success','Plan added successfully');
				   redirect('admin/listplan');
				  
			  }
		
	}
	else{
		redirect('login');
		}
	
}
public function edit_plan(){
	if($this->session->userdata('admindetails')){
		$pid=base64_decode($this->uri->segment(3));
		$data['plan']=$this->Admin_model->get_plan($pid);
						
			 $this->load->view('admin/edit_plan',$data);
	         $this->load->view('admin/footer');
		
		
	}else{redirect('login');}
}
public function save_edit_plan(){
	if($this->session->userdata('admindetails')){
		$this->form_validation->set_rules('ep_name', 'Plan name', 'required');
	            $this->form_validation->set_rules('ep_sms', 'Number of Smses per day', 'required');
				
	          if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
		  $bid=base64_encode($this->input->post('p_id'));
                    redirect('admin/edit_plan/'.$bid);

               }
			   $pname=$this->input->post('ep_name');
			  $sms=$this->input->post('ep_sms');
			   $pid=$this->input->post('p_id');
			    $flag=$this->Admin_model->get_planname($pid,$pname);
		
			if($flag==1){
				$this->session->set_flashdata('error','message name already existed');
				 redirect($_SERVER['HTTP_REFERER']);
				
			}
			   $data=array(
			   'plan_name'=>$pname,
			   'sms_per_day'=>$sms);
		$status=$this->Admin_model->save_edit_plan($pid,$data);
		if($status==1){
			$this->session->set_flashdata('success','plan updated successfully');
			redirect('admin/listplan');
			
		}else{
			$this->session->set_flashdata('error','you are not updated anything');
			redirect('admin/listplan');
		}
		
	}else{
		redirect('login');
		}
	
}
public function delete_plan(){
	if($this->session->userdata('admindetails')){
	
    $pid=base64_decode($this->uri->segment(3));	
	$status=$this->Admin_model->deactivate_plan($pid);
	if($status==1){
		$this->session->set_flashdata('success','plan deactivated successfully');
		redirect('admin/listplan');
	}
	else{	$this->session->set_flashdata('error','plan  not deactivated ');
		redirect('admin/listplan');}
	}else{
		redirect('login');
		}
}
public function delete_message(){
	if($this->session->userdata('admindetails')){
	
    $mid=base64_decode($this->uri->segment(3));	
	$status=$this->Admin_model->deactivate_message($mid);
	if($status==1){
		$this->session->set_flashdata('success','Message deactivated successfully');
		redirect('admin/listtemplate');
	}
	else{
		$this->session->set_flashdata('error','Message not deactivated ');
		redirect('admin/listtemplate');
		}
	}else{
		redirect('login');
		}
}
public function profile(){
	if($this->session->userdata('admindetails')){
		$admin=$this->session->userdata('admindetails');
		$id=$admin['admin_id'];
		$data['admin']=$this->Admin_model->get_admin_details($id);
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/footer');
		
	}else{
		redirect('login');
	}
	
}
public function edit_profile(){
	if($this->session->userdata('admindetails')){
		$admin=$this->session->userdata('admindetails');
		$id=$admin['admin_id'];
		$data['admin']=$this->Admin_model->get_admin_details($id);
		$this->load->view('admin/edit_profile',$data);
		$this->load->view('admin/footer');
		
	}
	else{
		redirect('login');
	}
	
}
public function save_edit_profile(){
	if($this->session->userdata('admindetails')){
		$admin=$this->session->userdata('admindetails');
		$id=$admin['admin_id'];
		$admin=$this->Admin_model->get_admin_details($id);
		
		//echo $ss; exit;
		//echo $_FILES['ep_profile_pic']['name'];exit;
		/*$config['upload_path']          = APPPATH. '../assets/uploads/';
            $this->load->library('upload', $config);
           if ( ! $this->upload->do_upload('ep_profile_pic')){
			
			    redirect('admin/profile');
			}else{
 
				
				$upload_data = $this->upload->data();
 
				
				$profile_pic = $upload_data['file_name'];
 
	
		echo $profile_pic; exit;
 
			}*/
 
		
		if($_FILES['ep_profile_pic']['name']!=''){
					$pic=$_FILES['ep_profile_pic']['name'];
					move_uploaded_file($_FILES['ep_profile_pic']['tmp_name'], "assets/adminprofilepic/" . $_FILES['ep_profile_pic']['name']);
				

					}else{
					$pic=$admin->profile_pic;
					}
					$mail=$this->input->post('ep_email');
					$flag=$this->Admin_model->check_unique_mail($id,$mail);
					if($flag==1){
				$this->session->set_flashdata('error','login email name existed, choose other name');
				 redirect($_SERVER['HTTP_REFERER']);
				
			}
		$data=array('name'=>$this->input->post('ep_name'),'location'=>$this->input->post('ep_location'),'mobile_no'=>$this->input->post('ep_number'),'login_email'=>$this->input->post('ep_email'),'profile_pic'=>$pic);
		$status=$this->Admin_model->admin_det_update($data,$id);
		$admindet=$this->Admin_model->get_admin_details($id);
		$admindet=(array)$admindet;
		$this->session->unset_userdata('admindetails');
		$this->session->set_userdata('admindetails',$admindet);
		if($status==1){
			$this->session->set_flashdata('success','profile  updated successfully');
		redirect('admin');
			
		}
		else{
			$this->session->set_flashdata('error','profile not updated');
		redirect('admin');
		}
		
		
}
else{
	redirect('login');
}
}

public function change_password(){
	
	if($this->session->userdata('admindetails')){
		
		$this->load->view('admin/change_password');
		$this->load->view('admin/footer');
	}
	else{	redirect('login');}
	
}
public function new_password(){
	if($this->session->userdata('admindetails')){
	$this->form_validation->set_rules('cp_old', 'new Password', 'required');
	$this->form_validation->set_rules('cp_new', 'new Password', 'required|min_length[6]');
    $this->form_validation->set_rules('cp_new_confirm', 'Confirm Password', 'required|matches[cp_new]');
 if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
	
                    redirect($_SERVER['HTTP_REFERER']);

               }
			   $det=$this->session->userdata('admindetails');
			   $id=$det['admin_id'];
			   $pwd=$this->input->post('cp_old');
			   $newpwd=$this->input->post('cp_new');
			  $flag=$this->Admin_model->check_password($id,$pwd);
			  if($flag==1){
				 $flag=$this->Admin_model->set_new_password($id,$newpwd);
				 if($flag==1){
					 $this->session->set_flashdata('success','password successfully changed');
					 redirect('admin/profile');
				 }
				 else{
					 $this->session->set_flashdata('error','your password as sames as old password ,change password');
					redirect($_SERVER['HTTP_REFERER']);
				 }
			  }
			  else{
				 $this->session->set_flashdata('error','old password is incorrect enter correct password');
				   redirect($_SERVER['HTTP_REFERER']);

			  }
			  
}
}

}

