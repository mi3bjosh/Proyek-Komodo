<?php
class Soals extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	function soals()
	{
		parent::Controller();
		$this->cek_login();
		$this->load->model('soal_model');	
	}
	
	function index()
	{
		redirect('admin/soals/tampil_soal');
	}
	
	function tampil_soal()
	{
		//$data['query'] = $this->soal_model->daftarsoal();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/admin/soals/tampil_soal';
		$config['total_rows'] = $this->db->count_all('soal');
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['content'] = 'tampil_soal';
		$this->db->order_by("no", "asc");
		$data['hasil'] = $this->db->get('soal', $config['per_page'], $this->uri->segment(4));
		$this->load->view('admin/layout.php', $data);
	}
	
	function tambah_soal()
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$opt1 = $this->input->post('opt1');
		$opt2 = $this->input->post('opt2');
		$opt3 = $this->input->post('opt3');
		$opt4 = $this->input->post('opt4');
		$jawab = $this->input->post('jawab');
		if ($this->input->post('submit')) {
			$this->load->model('soal_model');
			$this->db->query("insert into soal (pertanyaan,opt1,opt2,opt3,opt4,jawab) values('$pertanyaan','$opt1','$opt2','$opt3','$opt4','$jawab')"); 
			redirect ('admin/soals');
		}
		$data['content'] = 'tambah_soal';
		$this->load->view('admin/layout.php', $data);
	}
	
	function hapus_soal($no) 
	{
		$data['query']= $this->soal_model->delete_soal($no);
   	
		redirect ('admin/soals');
	
	}
	
	function edit_soal(){
		$no=$this->uri->segment(4);
		$data['query'] = $this->soal_model->update($no);
		$data['content'] = 'edit_soal';
		$this->load->view('admin/layout.php', $data);
	}
	
	function update()
	{
		$no = $this->input->post('no');
		$pertanyaan = $this->input->post('pertanyaan');
		$opt1 = $this->input->post('opt1');
		$opt2 = $this->input->post('opt2');
		$opt3 = $this->input->post('opt3');
		$opt4 = $this->input->post('opt4');
		$jawab = $this->input->post('jawab');
   		
		$this->db->where('no', $no);
		$this->db->set('pertanyaan',$pertanyaan); 
		$this->db->set('opt1',$opt1);
		$this->db->set('opt2',$opt2);
		$this->db->set('opt3',$opt3);
		$this->db->set('opt4',$opt4);
		$this->db->set('jawab',$jawab);
		$this->db->update('soal');
		
		redirect ('admin/soals');		
	}

}