<?php

class Home extends Controller 
{
	function __construct()
	{
		parent::Controller();
		$this->is_logged_in();
	}

	function dosen_area()
	{
		$data['content'] = 'home';
		$this->load->view('dosen/layout.php', $data);
	}
	
	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$status = $this->session->userdata('status');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="'.site_url().'/elearning">Login</a>';	
			die();		
			$this->load->view('login_form');
		}		
	}	

}
