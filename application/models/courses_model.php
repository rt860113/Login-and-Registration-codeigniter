<?php
/**
*  model class
*/
class Courses_model extends CI_Model
{
	public function get_all_courses()
	{
		return $this->db->query("SELECT * FROM courses")->result_array();
	}
	public function add_course($array)
	{
		$query="INSERT INTO courses (name,description,created_at) VALUES (?,?,?)";
		$values=array($array['name'],$array['description'],date("Y-m-d, H:i:s"));
		return $this->db->query($query,$values);
	}
	public function get_course_id()
	{
		return $this->db->query("SELECT id FROM courses")->row_array();
	}
	public function delete_course()
	{
		$row=$this->get_course_id();
		$query="DELETE FROM courses WHERE id=?";
		$this->db->query($query,$row);
	}

}



?>