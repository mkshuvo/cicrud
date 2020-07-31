<?php
  class User_model extends CI_Model{
  	function create($formArray){
  		//					table_name, $model_data
  		//$this->db->insert('users',$formArray);
		//insert into users (field1, field2, ...) values (?, ? ,...);
  		$this->db->insert('users',$formArray);
	}
	function all(){
  		return $user = $this->db->get('users')->result_array();
	}
	function updateUser($user_id,$formArray){
		$this->db->where('user_id',$user_id);
		$this->db->update('users', $formArray);
	}
	function getUser($user_id){
  		$this->db->where('user_id',$user_id);
  		//update users set field1=?, field2=? where condition=?;
  		return $user = $this->db->get('users')->row_array();
	}
	function delete($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('users');
	}
}
