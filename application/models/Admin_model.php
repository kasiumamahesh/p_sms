<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function logincheck($userid, $password){
     $this->db->select('*');
	  $this->db->from('admin_tab');
	  $this->db->where('login_email',$userid);
	  $this->db->where('password',$password);
	  return $this->db->get()->row_array();
	
	}
	public  function get_email_details_check($email){
	  $this->db->select('*')->from('admin_tab');
	  $this->db->where('login_email',$email);
	  return $this->db->get()->row_array();
	}
	public function insert_group($ins_data){
		
		
	 $this->db->insert('group_tab',$ins_data);
	 $group_id=$this->db->insert_id();
	 	return $group_id;
		
	}
	public function insert_grp_numbers($data){
		
		
	 //$this->db->insert_batch('group_numbers',$data);
	 return $this->db->insert_batch('group_numbers',$data)?1:0;
	
		
	}
	public function get_grouplist(){
		
		$this->db->select('group_tab.group_id,group_tab.group_name,GROUP_CONCAT(group_numbers.cont_number) cont_numbers ');
		$this->db->from('group_tab');
		$this->db->join('group_numbers','group_numbers.group_id=group_tab.group_id','left');
		$this->db->where('group_tab.status',1);
		$this->db->group_by('group_tab.group_id,group_tab.group_name');
		$this->db->order_by('created_time','desc');
		return $this->db->get()->result();
	}
	public function get_group_details($id){
$this->db->select('group_tab.group_id,group_tab.group_name,GROUP_CONCAT(group_numbers.cont_number) cont_numbers ');
		$this->db->from('group_tab');
		$this->db->join('group_numbers','group_numbers.group_id=group_tab.group_id','left');
		$this->db->where('group_tab.group_id',$id);
		$this->db->where('group_tab.status',1);
		$this->db->group_by('group_tab.group_id,group_tab.group_name');	
				return $this->db->get()->row();
		
		}
		public function edit_group($id,$group_name){
		   $this->db->set('group_name', $group_name);
           $this->db->where('group_id', $id);
           $this->db->update('group_tab');
		  return ($this->db->affected_rows() > 0) ? 1 : 0; 
		}
		public function delete_group_numbers($id){
			 $this->db->where('group_id', $id);
           $this->db->delete('group_numbers');
		    return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function deactivate_group($id){
			  $this->db->set('status', 0);
           $this->db->where('group_id', $id);
           $this->db->update('group_tab');
		  return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function message_save($data){
		 $this->db->insert('message_template',$data);	
		 return ($this->db->affected_rows() > 0) ? 1 : 0; 
		}
		public function get_all_templates(){
			$this->db->select('*');
			$this->db->from('message_template');
			$this->db->where('status',1);
			$this->db->order_by('created_date','desc');
			return $this->db->get()->result();
		}
		public function get_template($tid){
			$this->db->select('*');
			$this->db->from('message_template');
			$this->db->where('template_id',$tid);
			return $this->db->get()->row();
			
		}
		public function save_edit_message( $tid,$data){
			$this->db->where('template_id', $tid);
        $this->db->update('message_template', $data);
		 return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function insert_plan($ins_data){
		
		
	 $this->db->insert('sms_plan_type',$ins_data);
	
	  return ($this->db->affected_rows() > 0) ? 1 : 0; 
		
	}
	public function get_all_plans(){
			$this->db->select('*');
			$this->db->from('sms_plan_type');
			$this->db->where('status',1);
			return $this->db->get()->row();
		}
		public function get_plan($pid){
			$this->db->select('*');
			$this->db->from('sms_plan_type');
			$this->db->where('plan_id',$pid);
			return $this->db->get()->row();
			
		}
		public function save_edit_plan( $pid,$data){
			$this->db->where('plan_id', $pid);
        $this->db->update('sms_plan_type', $data);
		 return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function deactivate_plan($id){
			$this->db->set('status',0);
			 $this->db->where('plan_id', $id);
           $this->db->update('sms_plan_type');
		    return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function deactivate_message($id){
			$this->db->set('status',0);
			 $this->db->where('template_id', $id);
           $this->db->update('message_template');
		    return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function message_save2($data){
		 $this->db->insert('message_template',$data);	
		$msgid=$this->db->insert_id();
	 	return $msgid;
		}
		public function get_groupname($gid,$gname){
			$this->db->select('group_name');
			$this->db->from('group_tab');
			$this->db->where('group_id !=',$gid);
			$this->db->where('status =',1);
			$gnames= $this->db->get()->result_array();
			$group_names = array_column($gnames, 'group_name');
			//print_r($group_names);exit;
			if(in_array($gname,$group_names)){
				
				return 1;
			}
			else{
				return 0;
			}
		
			
		}
		public function get_templatename($tid,$mname){
			$this->db->select('template_name');
			$this->db->from('message_template');
			$this->db->where('template_id !=',$tid);
			$this->db->where('status =',1);
			$tnames= $this->db->get()->result_array();
			$temp_names = array_column($tnames, 'template_name');
			//print_r($group_names);exit;
			if(in_array($mname,$temp_names)){
				
				return 1;
			}
			else{
				return 0;
			}
		
			
		}
		public function get_planname($pid,$pname){
			$this->db->select('plan_name');
			$this->db->from('sms_plan_type');
			$this->db->where('plan_id!=',$pid);
			$pnames= $this->db->get()->result_array();
			$temp_names = array_column($pnames, 'plan_name');
			//print_r($group_names);exit;
			if(in_array($pname,$temp_names)){
				
				return 1;
			}
			else{
				return 0;
			}
		
			
		}
		public function get_admin_details($id){
			
			$this->db->select('*');
			$this->db->from('admin_tab');
			$this->db->where('admin_id',$id);
			return $this->db->get()->row();
		}
		public function admin_det_update($data,$id){
			$this->db->where('admin_id',$id);
			$this->db->update('admin_tab',$data);
			   return ($this->db->affected_rows() > 0) ? 1 : 0; 
			
		}
		public function check_password($id,$pwd){
			$pwd=md5($pwd);
			$this->db->select('admin_id');
			$this->db->from('admin_tab');
			$this->db->where('admin_id',$id);
			$this->db->where('password',$pwd);
			 $res=$this->db->get()->result();
			 if(count($res)>0){
				 return 1;
				
			 }
			else {return 0;}
			 
			
		}
		public function set_new_password($id,$newpwd){
			$hashpwd=md5($newpwd);
			$this->db->set('password',$hashpwd);
			$this->db->set('org_password',$pwd);
			$this->db->where('admin_id',$id);
			$this->db->update('admin_tab');
			 return ($this->db->affected_rows() > 0) ? 1 : 0; 
		}
		
		public function check_unique_mail($id,$mail){
			$this->db->select('login_email');
			$this->db->from('admin_tab');
			$this->db->where('admin_id!=',$id);
			$lognames= $this->db->get()->result_array();
			$log_names = array_column($lognames, 'login_email');
			//print_r($group_names);exit;
			if(in_array($mail,$log_names)){
				
				return 1;
			}
			else{
				return 0;
			}
		
			
		}
		public function delete_temp_group($group_id){
			$this->db->where('group_id',$group_id);
			$this->db->delete('group_tab');
			return 1;
			
		}
	public function unique_group($name){
		$this->db->select('*');
		$this->db->from('group_tab');
		$this->db->where('status =',1);
		$this->db->where('group_name =',$name);
		
		
		return $this->db->get()->result()?1:0;
		
	}
	public function unique_message($name){
		$this->db->select('*');
		$this->db->from('message_template');
		$this->db->where('status =',1);
		$this->db->where('template_name =',$name);
		
		
		return $this->db->get()->result()?1:0;
		
	}
	public function unique_plan($name){
		$this->db->select('*');
		$this->db->from('sms_plan_type');
		$this->db->where('status =',1);
		$this->db->where('plan_name =',$name);
		
		
		return $this->db->get()->result()?1:0;
		
	}
	public function schedule_groups_list($sid){
		
		$this->db->select('group_tab.group_id,group_tab.group_name');
		$this->db->from('schedule_groups');
		$this->db->join('group_tab','group_tab.group_id=schedule_groups.group_id');
		$this->db->where('schedule_id=',$sid);
		$groupnames=$this->db->get()->result_array();
		$groupids = array_column($groupnames, 'group_id');
	    return $groupids;
	}
	
	}