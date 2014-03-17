<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public $session_users;
	public function __construct()
	{
		parent::__construct();
		$this->session_users=$this->session->all_userdata();
	}
	public function index()
	{
		if (!isset($this->session_users['error_rm'])) 
		{
			$this->session->set_userdata('error_rm','');
		}
		if (!isset($this->session_users['error_lm'])) 
		{
			$this->session->set_userdata('error_lm','');
		}
		var_dump($this->session->all_userdata());
		$this->load->view('/login/login');
	}
	public function register()
	{
		$this->output->enable_profiler(TRUE);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run('register')===false) 
		{
			$this->session->set_userdata('error_rm',validation_errors());
			redirect('/login');
		}else
		{
			$this->session->unset_userdata('error_rm');
			$this->load->model('login_model');
			$id=$this->login_model->add_user($this->input->post(null,true));
			$info=$this->login_model->get_user_info_by_id($id);
			$this->session->set_userdata($info);
			redirect('/login/welcome');
		}

	}
	public function log_in()
	{
		$this->output->enable_profiler(TRUE);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run('login')===false) 
		{
			$this->session->set_userdata('error_lm',validation_errors());
			var_dump($this->session->all_userdata());

			redirect('/login');
		}else
		{
			$this->load->library('encrypt');
			$this->load->model('login_model');
			$info=$this->login_model->get_user_info_by_email($this->input->post('email'));
			var_dump($info);
			$temp=$this->encrypt->sha1($this->input->post('password'));
			var_dump($temp);
			echo sha1($this->input->post('password'));
			if (empty($info)) 
			{
				$this->session->set_userdata('error_lm','Empty Record!');
			}elseif ($temp==$info['password']) 
			{
				echo "here";
				$this->session->unset_userdata('error_lm');
				$this->session->set_userdata($info);
				var_dump($this->session->all_userdata());
				redirect('/login/welcome');
			}
		}
	}
	public function welcome()
	{
		$this->load->view('/login/profile');
	}
	public function log_out()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
}
