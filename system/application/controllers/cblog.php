<?php
Class Cblog extends Controller {
	
	function index(){
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$data['jenis'] = "Home";
		$this->load->view('template', $data);
	}	

	function cari() {
		$keyword = $this->input->post('search');
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$this->db->like('Judul', $keyword);
		$data['dapat'] = $this->db->get('artikel');
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$this->load->view('template', $data);
	}
}
?>