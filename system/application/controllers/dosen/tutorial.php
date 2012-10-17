<?php
Class Tutorial extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	function tutorial()
	{
		parent::Controller();
		$this->cek_login();	
	}
	
	function index()
	{
			redirect('dosen/tutorial/tampil_artikel');
	}
	
	function tampil_artikel() {
			$this->load->model('m_artikel');
			$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
			$this->load->library('pagination');
		
		
			$config['base_url'] = base_url().'index.php/dosen/tutorial/tampil_artikel/';
			$config['total_rows'] = $this->db->count_all('artikel');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'tampil_tutorial';
			$data['hasil'] =
			$this->db->get('artikel', $config['per_page'], $this->uri->segment(4));
			$this->load->view('dosen/layout.php', $data);
	}
	
	function tambah_artikel() {
			if ($this->input->post('submit')) {
				$this->load->model('m_artikel');
				$this->m_artikel->do_upload1();
				redirect('dosen/tutorial/tampil_artikel');
			}
			$this->load->plugin('xinha_pi');
			$data['xinha_java']= javascript_xinha(array('isi')); // this line for the xinha
			$data['content'] = 'tambah_tutorial';
			$this->load->view('dosen/layout.php', $data);
	}
	
}

?>