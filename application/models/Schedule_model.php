<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_schedule($ins_data){
		 $this->db->insert('schedule_tab',$ins_data);
$sid=$this->db->insert_id();
	 	return $sid;
		
	}
	public function get_smses($planid){
		$this->db->select('sms_per_day');
		$this->db->from('sms_plan_type');
		$this->db->where('plan_id',$planid);
	$res=$this->db->get()->row();
	 return $res->sms_per_day;	
	}
	// list the schedules
	public function get_all_schedules(){
		
		$this->db->select('sms_plan_type.plan_name,sms_plan_type.sms_per_day,schedule_tab.send_time,schedule_tab.start_date,
		schedule_tab.end_date,message_template.template_content,schedule_tab.schedule_id,GROUP_CONCAT(group_tab.group_name) groupnames');
		$this->db->from('schedule_tab');
		$this->db->join('schedule_groups','schedule_groups.schedule_id=schedule_tab.schedule_id');
		$this->db->join('sms_plan_type','sms_plan_type.plan_id=schedule_tab.sms_type');
		$this->db->join('group_tab','group_tab.group_id=schedule_groups.group_id');
		$this->db->join('message_template','message_template.template_id=schedule_tab.template_id');
		$this->db->where('s_status',1);
		$this->db->group_by('sms_plan_type.plan_name,sms_plan_type.sms_per_day,schedule_tab.send_time,schedule_tab.start_date,
		schedule_tab.end_date,message_template.template_content,schedule_id');
		$this->db->order_by('created_at','desc');
		return $this->db->get()->result();
	}
	public function save_schedule_time($ins_time){
		return $this->db->insert_batch('schedule_times',$ins_time)?1:0;
	}
	//running the shedules
	public function get_current_schedules($ctime,$cdate){
		
		$this->db->select('group_tab.group_id,message_template.template_content,GROUP_CONCAT(group_numbers.cont_number) cont_numbers,count(group_numbers.cont_number)
		 msgcount');
		$this->db->from('schedule_tab');
		$this->db->join('schedule_groups','schedule_groups.schedule_id=schedule_tab.schedule_id');
        $this->db->join('group_tab','group_tab.group_id=schedule_groups.group_id');
		$this->db->join('group_numbers','group_tab.group_id=group_numbers.group_id');
		$this->db->join('message_template','message_template.template_id=schedule_tab.template_id');
		$this->db->join('schedule_times','schedule_times.schedule_id=schedule_tab.schedule_id');
		$this->db->where('schedule_times.schedule_time',$ctime);
		$this->db->where('schedule_tab.start_date<=',$cdate);
		$this->db->where('schedule_tab.end_date>=',$cdate);
		$this->db->where('s_status',1);
		$this->db->group_by('message_template.template_content,group_tab.group_id');
		$this->db->order_by('created_at','desc');
		return $this->db->get()->result();
	}
	public function get_schedule($sid){
		
		$this->db->select('*');
		$this->db->from('schedule_tab');
		$this->db->where('schedule_id',$sid);
		return $this->db->get()->row();
	}
	public function get_message($mid){
		
		$this->db->select('*');
		$this->db->from('message_template');
		$this->db->where('template_id',$mid);
		return $this->db->get()->row();
	}
	public function update_schedule($ins_data,$sid){
		//print_r($ins_data); exit;
	      
		 $this->db->where('schedule_id',$sid);
		 //$this->db->update('schedule_tab',$ins_data);

	 	 //return ($this->db->affected_rows() > 0) ? 1 : 0; 
		 
		 return $this->db->update('schedule_tab',$ins_data);
		
	}
	public function delete_schedule_time($sid){
		 $this->db->where('schedule_id',$sid);
		 $this->db->delete('schedule_times');

	 	 return ($this->db->affected_rows() > 0) ? 1 : 0; 
		
	}
	public function get_saved_Schedules(){
		
		$this->db->select('sms_plan_type.plan_name,sms_plan_type.sms_per_day,schedule_tab.send_time,schedule_tab.start_date,
		schedule_tab.end_date,message_template.template_content,schedule_tab.schedule_id,GROUP_CONCAT(group_tab.group_name) groupnames');
		$this->db->from('schedule_tab');
		$this->db->join('schedule_groups','schedule_groups.schedule_id=schedule_tab.schedule_id');
		$this->db->join('sms_plan_type','sms_plan_type.plan_id=schedule_tab.sms_type');
		$this->db->join('group_tab','group_tab.group_id=schedule_groups.group_id');
		$this->db->join('message_template','message_template.template_id=schedule_tab.template_id');
		$this->db->where('s_status',2);
		$this->db->group_by('sms_plan_type.plan_name,sms_plan_type.sms_per_day,schedule_tab.send_time,schedule_tab.start_date,
		schedule_tab.end_date,message_template.template_content,schedule_id');
		$this->db->order_by('created_at','desc');
		return $this->db->get()->result();
			
		}
		public function delete_schedule($sid){
			$this->db->set('s_status',0);
			 $this->db->where('schedule_id',$sid);
			$this->db->update('schedule_tab');
		 return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function active_schedule($sid){
			$this->db->set('s_status',1);
			 $this->db->where('schedule_id',$sid);
			$this->db->update('schedule_tab');
		 return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function sms_count_insert($gid,$count){
			$data=array('group_id'=>$gid,'no_smses'=>$count);
			$this->db->insert('sms_count_tab',$data);
			 return ($this->db->affected_rows() > 0) ? 1 : 0; 
		}
	  public function get_sms_count(){
		  $this->db->select('sum(no_smses) cnt');
		  $this->db->from('sms_count_tab');
		  $res=$this->db->get()->row();
		  return $res->cnt;
		  
	  }
	  public function insert_schedule_groups($group_data){
		  
		 return $this->db->insert_batch('schedule_groups',$group_data)?1:0;
	  }
	  public function delete_schedule_groups($sid){
		   $this->db->where('schedule_id',$sid);
		 $this->db->delete('schedule_groups');
		   return ($this->db->affected_rows() > 0) ? 1 : 0; 
	  }
	}