<?php
 
   class User extends Controller {
 
        public $swfCharts ;
 
        public function __construct() {
            parent::Controller() ;
            $this->load->helper('url') ;
            $this->swfCharts  = base_url().'public/flash/Pie3D.swf' ;
        }
 
        public function index() {
            $this->load->view('chart_user') ;
        }
    }
?>
