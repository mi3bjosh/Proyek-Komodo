<?php
class Cartikel extends Controller {
	
	function index() {
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$this->load->library('pagination');
		
		
		$config['base_url'] = base_url().'index.php/cartikel/index/';
		$config['total_rows'] = $this->db->count_all('artikel');
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$this->pagination->initialize($config);
		$data['jenis'] = 'Artikel';
		$data['hasil'] =
		$this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
		$this->load->view('artikel_content', $data);
	}
	
	function view($id){
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$data['ambilisi'] = $this->m_artikel->ambilisi($id);
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$data['jenis'] = 'Isi Artikel';
		$this->load->view('artikel_content', $data);
	}
}
?>