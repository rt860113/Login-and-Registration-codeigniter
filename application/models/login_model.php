<?php
class login_model extends CI_Model
{
	
	public function add_user($array)
	{
		$this->load->library('encrypt');
		$password=$this->encrypt->sha1($array['password']);
		$query="INSERT INTO users (first_name,last_name,email,password,created_at) VALUES (?,?,?,?,?)";
		$values=array($array['first_name'],$array['last_name'],$array['email'],$password,date("Y-m-d, H:i:s"));
		$this->db->query($query,$values);
		return $this->db->insert_id();
	}
	public function get_user_info_by_email($array)
	{
		$query="SELECT first_name,last_name,id,email,password FROM users WHERE email=?";

		return $this->db->query($query,$array)->row_array();
	}
	public function get_user_info_by_id($array)
	{
		$query="SELECT first_name,last_name,id,email FROM users WHERE id=?";

		return $this->db->query($query,$array)->row_array();
	}
}








?>