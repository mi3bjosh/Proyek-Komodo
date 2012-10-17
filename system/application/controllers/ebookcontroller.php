<?php

/**
 * Description of EbookController
 *
 * @author DENY PRASETIA TW
 * http://denyprasetiatw.blogspot.com/
 * Created Jan 9, 2012 - 9:22:03 PM
 */
class EbookController extends Controller {
    
    function __construct() {
        parent::Controller();
        $this->load->Model('Ebook');
        $this->load->helper(array('url','html','text', 'file'));
        $this->load->library(array('pagination'));
    }

    public function index($offset=0) {      
        $config['base_url']     = base_url().'index.php/EbookController/index';
        $config['total_rows']   = $this->db->count_all('ebook');
        $config['per_page']     = 2;
        $config['next_link']    = ' Before ';
        $config['prev_link']    = ' After ';
        $config['uri_segment']  = 3;
        $this->pagination->initialize($config);
        $data['n_ebook'] = $this->Ebook->listEbook($config['per_page'], $offset);
        $this->load->view('ebook',$data);
    }

    public function validatorListEbook() {
        $data['n_ebook'] = $this->Ebook->listEbook();
        $this->load->View('ebook', $data);
    }
    
    public function validatorShowEbook($input) {
        $data['n_ebook'] = $this->Ebook->showEbook($input);
        $this->load->View('selectbook', $data);
    }
    
    public function validatorShowEbookOnline($input) {
        $data['n_ebook'] = $this->Ebook->showEbook($input);
        $this->load->View('tampilbook', $data);
    }    
    
}
?>
