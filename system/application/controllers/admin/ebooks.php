<?php
Class Ebooks extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	function Ebooks()
	{
		parent::Controller();
		$this->cek_login();	
	}
	
	function index()
	{
			redirect('admin/ebooks/tampilEbooks');
	}
	
	function tampilEbooks() {
			$this->load->model('ebooks_model');
			$data['daftarebooks'] = $this->ebooks_model->daftar(6,0);
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/admin/ebooks/tampilEbooks/';
			$config['total_rows'] = $this->db->count_all('ebook');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'tampil_ebooks';
			$data['hasil'] = $this->db->get('ebook', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function ebooks_status() {
			$this->load->model('ebooks_model');
			$data['daftarebooks'] = $this->ebooks_model->daftarall();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/admin/ebooks/ebooks_status/';
			$config['total_rows'] = $this->db->count_all('ebook');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'status_ebooks';
			$data['hasil'] = $this->db->get('ebook', $config['per_page'], $this->uri->segment(4));
			$this->load->view('admin/layout.php', $data);
	}
	
	function edit_ebooks($id = null) {
			if($_POST == NULL) {
				$this->load->model('ebooks_model');
				$data['hasil'] = $this->ebooks_model->select($id);
				$this->load->plugin('xinha_pi');
				$data['xinha_java']= javascript_xinha(array('deskripsi')); // this line for the xinha
				$data['content'] = 'edit_ebooks';
				$this->load->view('admin/layout.php', $data);
			}
			else {
				$this->load->model('ebooks_model');
				$this->ebooks_model->edit($id);
				redirect('admin/ebooks/tampilEbooks');
			}
	}
	
	function update_status($id = null){
			if($_POST == NULL) {
				$this->load->model('ebooks_model');
				$data['hasil'] = $this->ebooks_model->select($id);
				$this->ebooks_model->tampil($id);
				redirect('admin/ebooks/ebooks_status');
				//$this->load->view('admin', $data);
			}
			else {
				$this->load->model('ebooks_model');
				$this->ebooks_model->tampil($id);
				redirect('admin/ebooks/ebooks_status');
			}
	}
	
	function update_status2($id = null){
			if($_POST == NULL) {
				$this->load->model('ebooks_model');
				$data['hasil'] = $this->ebooks_model->select($id);
				$this->ebooks_model->batal_tampil($id);
				redirect('admin/ebooks/ebooks_status');
				//$this->load->view('admin', $data);
			}
			else {
				$this->load->model('ebooks_model');
				$this->ebooks_model->batal_tampil($id);
				redirect('admin/ebooks/ebooks_status');
			}
	}
	
	function tambah_ebooks() {
			if ($this->input->post('submit')) {
				$this->load->model('ebooks_model');
				$this->ebooks_model->do_upload1();
				redirect('admin/ebooks/tampilEbooks');
			}
			$this->load->plugin('xinha_pi');
			$data['xinha_java']= javascript_xinha(array('deskripsi')); // this line for the xinha
			$data['content'] = 'tambah_ebooks';
			$this->load->view('admin/layout.php', $data);
	}
	
	function delete_ebooks($id = null) {
			$this->load->model('ebooks_model');
			$this->ebooks_model->delete($id);
			redirect('admin/ebooks');
	}
}

?>