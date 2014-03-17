<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('error_t')) {
			$this->session->set_userdata('error_t',"");
		}
		$result=$this->display();
		$result1=array('result' => $result );
		$this->load->view('/courses/courses',$result1);
	}
	public function create()
	{
		$this->output->enable_profiler(TRUE);
		if (!$this->input->post('name')||strlen($this->input->post('name'))<15) {
			$this->session->set_userdata('error_t','The length of course name can not be less thatn 15.');
			redirect('/courses/courses');
		}else
		{
		$this->session->unset_userdata('error_t');
		$array=array(
			"name"=>$this->input->post('name'),
			"description"=>$this->input->post('description'));
		$this->load->model("courses_model");
		$test=$this->courses_model->add_course($array);
		var_dump($test);
		redirect('/courses/courses');
		}
	}
	public function destroy()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->model('courses_model');
		$this->courses_model->delete_course();
		redirect('/courses/courses');
	}
	public function display()

	{
		$this->output->enable_profiler(TRUE);
		$this->load->model('courses_model');
		$result=$this->courses_model->get_all_courses();
		for ($i=0; $i < count($result)/2; $i++) 
		{ 
			$temp=$result[count($result)-1-$i];
			$result[count($result)-1-$i]=$result[$i];
			$result[$i]=$temp;
		}
		return $result;
		// $this->load->view('courses',$result);
	}
}