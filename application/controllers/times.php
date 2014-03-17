<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Times extends CI_Controller 
{

	public function main()
	{
		$view_date=array(
							"date"=>date("M j, Y"),
							"time"=>date("h:i:s A")	
						);
		$this->load->view('times',$view_date);
	}
}




?>