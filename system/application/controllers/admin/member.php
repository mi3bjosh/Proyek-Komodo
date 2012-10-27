<?php
class Member extends Controller {
  function __construct(){
		parent::Controller();
		$this->cek_login();
		$this->load->helper(array('form', 'url', 'date', 'html', 'download'));
		$this->load->model('model_member');
		$this->load->library(array('pagination','form_validation','session'));
	}
	
	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}
	
	//method index
	function index()
	{
		$this->load->model('model_member');
		$data['query']=$this->model_member->getAllmember();
		$this->load->view('admin/memberlist',$data);
	}
	
}
?>
