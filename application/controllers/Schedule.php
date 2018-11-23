<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class Schedule extends In_frontend{

	
	public function __construct() 
	{
		parent::__construct();	
				$this->load->model('Admin_model');
				$this->load->model('Schedule_model');
		
	
		
	}
	public function save_schedule(){
		if($this->session->userdata('admindetails'))
		{
			 $this->form_validation->set_rules('as_type', 'plan', 'required');
	         $this->form_validation->set_rules('gid', 'group', 'required');
			 $this->form_validation->set_rules('as_time', 'time', 'required');
	         $this->form_validation->set_rules('as_sdate', 'start date', 'required');
			  $this->form_validation->set_rules('as_edate', 'end date', 'required');
			   if ($this->form_validation->run() == FALSE)
                {
          $this->session->set_flashdata('error',validation_errors());
                    redirect('admin/addcampaign');

               }
			  
			$planid=$this->input->post('as_type');
			$gpid=$this->input->post('gid');
			if(isset($_POST['mid'])){
			$msgid=$this->input->post('mid');
			
			}
			else{
				$msg=$this->input->post('txtmsg');
				$data=array('template_content'=>$msg,'status'=>2);
				$msgid=$this->Admin_model->message_save2($data);
				
			}
			$sendtime=$this->input->post('as_time');
			$sdate=$this->input->post('as_sdate');
			$edate=$this->input->post('as_edate');
			//echo $sdate; exit;
			if($this->input->post('sch')==1){
				$status=1;
			}else{
				$status=2;
			}
			
			$ins_data=array('group_id'=>$gpid,'sms_type'=>$planid,
			'send_time'=>$sendtime,'start_date'=>$sdate,'end_date'=>$edate,'template_id'=>$msgid,'s_status'=>$status);
			$sid=$this->Schedule_model->save_schedule($ins_data);
			$smses=$this->Schedule_model->get_smses($planid);
			//echo $smses; exit;
			$arrtime=explode(':',$sendtime);
			$chours=$arrtime[0];
			//echo $chours; exit;
			for($i=1;$i<=$smses;$i++)
			{
				if($chours<24){
					$sendtime=$chours.':'.$arrtime[1];
				$ins_time[]=array('schedule_id'=>$sid,'schedule_time'=>$sendtime);
				$chours=$chours+3;
				}
				else{
					break;
				}
				
			}
			//echo '<pre>';print_r($ins_time);exit;
			$status=$this->Schedule_model->save_schedule_time($ins_time);
			if($status==1){
				$this->session->set_flashdata('success','campaign added successfully');
		redirect('admin/listcampaign');
			}
			else{
				$this->session->set_flashdata('error','campaign  not added ');
		redirect('admin/listcampaign');
				
			}
			
			
		}
		else{
			
			redirect('login');
		}
	}
	public function run_schedules(){
		$ctime=date('H:m');
		$ctime=$ctime.':00';
		
		$cdate=date('Y-m-d');
		//echo $cdate; exit;
           
            
           $username=$this->config->item('smsusername');
           $pass=$this->config->item('smspassword');
           $sender=$this->config->item('sender');
          
		   
		   $result=$this->Schedule_model->get_current_schedules($ctime,$cdate);
		   foreach ($result as $row){
			   $msg=$row->template_content;
			   $mobile=$row->cont_numbers;
			   $ch2 = curl_init();
           curl_setopt($ch2, CURLOPT_URL,"http://trans.smsfresh.co/api/sendmsg.php");
           curl_setopt($ch2, CURLOPT_POST, 1);
           curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender='.$sender.'&phone='.$mobile.'&text='.$msg.'&priority=ndnd&stype=normal');
           curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
           //echo '<pre>';print_r($ch);exit;
           $server_output = curl_exec ($ch2);
		  
           curl_close ($ch2);
			   
		   }
		   //echo '<pre>'; print_r($result);exit;
		   
           /* seller purpose*/
           
		
	  
	}
	public function edit_campaign_schedule(){
		if($this->session->userdata('admindetails'))
		{
		
		$sid=base64_decode($this->uri->segment(3));
		    $data['plans']=$this->Admin_model->get_all_plans();
			$data['groups']=$this->Admin_model->get_grouplist();
			$data['msgs']=$this->Admin_model->get_all_templates();
		$data['sch']=$this->Schedule_model->get_schedule($sid);
		$mid=$data['sch']->template_id;
		$temp=$this->Schedule_model->get_message($mid);
		//echo '<pre>';print_r($temp);exit;
		if($temp->template_name='' || $temp->template_name==NULL){
			
			$data['msgstatus']=1;
			$data['msgdet']=$temp;
		}
		else{
			
			$data['msgstatus']=0;
		}
	//echo $data['msgstatus'];exit;
		$this->load->view('admin/edit_campaign_schedule',$data);
		$this->load->view('admin/footer');
		}
		else{
			
			redirect('login');
		}
		
	}
	public function save_edit_campaign(){
		if($this->session->userdata('admindetails'))
		{
		
			$planid=$this->input->post('es_type');
			//echo $planid;exit;
			$gpid=$this->input->post('gid');
			if(isset($_POST['mid'])){
			$msgid=$this->input->post('mid');
			
			}
			else{
				$msg=$this->input->post('txtmsg');
				$data=array('template_content'=>$msg,'status'=>2);
				$msgid=$this->Admin_model->message_save2($data);
				
			}
			$sendtime=$this->input->post('es_time');
			$sdate=$this->input->post('es_sdate');
			$edate=$this->input->post('es_edate');
			//echo $sendtime.' '.$sdate." ".$edate.' '.$msgid.' '.$gpid.' '.$planid;
			
			$sid=$this->input->post('s_id');
			//echo " ".$sid; exit;
			$ins_data=array(
			'group_id'=>$gpid,
			'sms_type'=>$planid,
			'send_time'=>$sendtime,
			'start_date'=>$sdate,
			'end_date'=>$edate,
			'template_id'=>$msgid
			);
			//echo '<pre>'; print_r($ins_data); exit;
			$update=$this->Schedule_model->update_schedule($ins_data,$sid);
			//echo $this->db->last_query();
			//echo '<pre>'; print_r($update); exit;
			$smses=$this->Schedule_model->get_smses($planid);
			//echo $smses; exit;
			$arrtime=explode(':',$sendtime);
			$chours=$arrtime[0];
			//echo $chours; exit;
			for($i=1;$i<=$smses;$i++)
			{
				if($chours<24){
					$sendtime=$chours.':'.$arrtime[1];
				$ins_time[]=array('schedule_id'=>$sid,'schedule_time'=>$sendtime);
				$chours=$chours+3;
				}
				else{
					break;
				}
				
			}
			//echo '<pre>';print_r($ins_time);exit;
			$this->Schedule_model->delete_schedule_time($sid);
			$status=$this->Schedule_model->save_schedule_time($ins_time);
			if($status==1){
				$this->session->set_flashdata('success','campaign updated successfully');
		redirect('admin/listcampaign');
			}
			else{
				$this->session->set_flashdata('error','campaign  not updated ');
		          redirect('admin/listcampaign');
				
			}
	}
		else{
			
			redirect('login');
		}
	}
	
	public function delete_campaign_schedule(){
		
		if($this->session->userdata('admindetails'))
		{
			$sid=base64_decode($this->uri->segment(3));
			$status=$this->Schedule_model->delete_schedule($sid);
				if($status==1){
				$this->session->set_flashdata('success','campaign delted successfully');
		redirect('admin/listcampaign');
			}
			else{
				$this->session->set_flashdata('error','campaign  not deleted ');
		          redirect('admin/listcampaign');
				
			}
			
		}
		else{
			
			redirect('login');
		}
	}
	public function active_schedule(){
		if($this->session->userdata('admindetails'))
		{
			$sid=base64_decode($this->uri->segment(3));
			$status=$this->Schedule_model->active_schedule($sid);
				if($status==1){
				$this->session->set_flashdata('success','campaign activated successfully');
		redirect('admin/listcampaign');
			}
			else{
				$this->session->set_flashdata('error','campaign  not activated ');
		          redirect('admin/listcampaign');
				
			}
			
		}
	else{
			
			redirect('login');
		}
		
	}
	}