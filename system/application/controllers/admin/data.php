<?php

 
class data extends Controller {
    function  __construct() {
        parent::Controller();
  	$this->load->model('logging_model');
    }
	  function index(){
        $data['data'] = $this->logging_model->selectAll();
        $this->load->view('data_view', $data);
		$this->load->helper('url');
    }
 
}
?>