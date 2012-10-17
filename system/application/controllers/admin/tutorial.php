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
		$this->load->model('m_admin');	
	}
	
	function index()
	{
			$this->load->model('m_artikel');
			$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/admin/tutorial/manajemen_artikel/';
			$config['total_rows'] = $this->db->count_all('artikel');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'manajemen_artikel';
			$data['hasil'] =
			$this->db->get('artikel', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function manajemen_artikel() {
			$this->load->model('m_artikel');
			$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
			$this->load->library('pagination');
		
		
			$config['base_url'] = base_url().'index.php/admin/tutorial/manajemen_artikel/';
			$config['total_rows'] = $this->db->count_all('artikel');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'manajemen_artikel';
			$data['hasil'] =
			$this->db->get('artikel', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function artikel_status() {
			$this->load->model('m_artikel');
			$data['daftarartikel'] = $this->m_artikel->daftarall();
			$this->load->library('pagination');
		
		
			$config['base_url'] = base_url().'index.php/admin/tutorial/artikel_status/';
			$config['total_rows'] = $this->db->count_all('artikel');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'artikel_status';
			$data['hasil'] =
			$this->db->get('artikel', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function edit_manajemen_artikel($id = null) {
			if($_POST == NULL) {
				$this->load->model('m_artikel');
				$data['hasil'] = $this->m_artikel->select($id);
				$this->load->plugin('xinha_pi');
				$data['xinha_java']= javascript_xinha(array('isi')); // this line for the xinha
				$data['content'] = 'edit_manajemen_artikel';
				$this->load->view('admin/layout.php', $data);
			}
			else {
				$this->load->model('m_artikel');
				$this->m_artikel->edit($id);
				redirect('admin/tutorial/manajemen_artikel');
			}
	}
	
	function update_status($id = null){
			if($_POST == NULL) {
				$this->load->model('m_artikel');
				$data['hasil'] = $this->m_artikel->select($id);
				$this->m_artikel->tampil($id);
				redirect('admin/tutorial/artikel_status');
				//$this->load->view('admin', $data);
			}
			else {
				$this->load->model('m_artikel');
				$this->m_artikel->tampil($id);
				redirect('admin/tutorial/artikel_status');
			}
	}
	
function update_status2($id = null){
			if($_POST == NULL) {
				$this->load->model('m_artikel');
				$data['hasil'] = $this->m_artikel->select($id);
				$this->m_artikel->batal_tampil($id);
				redirect('admin/tutorial/artikel_status');
				//$this->load->view('admin', $data);
			}
			else {
				$this->load->model('m_artikel');
				$this->m_artikel->batal_tampil($id);
				redirect('admin/tutorial/artikel_status');
			}
	}
	
	function tambah_artikel() {
			if ($this->input->post('submit')) {
				$this->load->model('m_artikel');
				$this->m_artikel->do_upload1();
				redirect('admin/tutorial/manajemen_artikel');
			}
			$this->load->plugin('xinha_pi');
			$data['xinha_java']= javascript_xinha(array('isi')); // this line for the xinha
			$data['content'] = 'tambah_artikel';
			$this->load->view('admin/layout.php', $data);
	}
	
	function delete_manajemen_artikel($id = null) {
			$this->load->model('m_artikel');
			$this->m_artikel->delete($id);
			redirect('admin/tutorial');
	}
	
	function manajemen_link() {
			$this->load->model('m_link');
			$data['hasil'] = $this->m_link->daftar(10, 0);
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/admin/tutorial/manajemen_link/';
			$config['total_rows'] = $this->db->count_all('link');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['content'] = 'manajemen_link';
			$data['hasil'] =
			$this->db->get('link', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function edit_link($id = null) {
			if($_POST == NULL) {
				$this->load->model('m_link');
				$data['hasil'] = $this->m_link->select($id);
				$data['content'] = 'edit_link';
				$this->load->view('admin/layout.php', $data);
			}
			else {
				$this->load->model('m_link');
				$this->m_link->edit($id);
				redirect('admin/tutorial/manajemen_link');
			}
	}
	
	function delete_artikel($id = null) {
			$this->load->model('m_link');
			$this->m_link->delete($id);
			redirect('admin/tutorial/manajemen_link');
	}
	
	function tambah_link() {
			if ($this->input->post('submit')) {
				$this->load->model('m_link');
				$this->m_link->tambah();
				redirect('admin/tutorial/manajemen_link');
			}
			$data['content'] = 'tambah_link';
			$this->load->view('layout.php', $data);
	}
}

?>