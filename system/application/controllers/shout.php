  <?php
    class Shout extends Controller {

	function Shout()  
    {  
        parent::Controller();  
        $this->load->model('shoutmodel');  
    }  
    function index()
    {
    $this->load->Model('shoutmodel');
    $data['shout']=$this->shoutmodel->getshout();
    $this->load->view('forum',$data);
    }

    function shout_input()
    {
    $this->load->Model('shoutmodel');
    $this->shoutmodel->newshout();
    $data['shout']=$this->shoutmodel->getshout();
    $this->load->view('forum',$data) ;
    }
    }
	
	?>