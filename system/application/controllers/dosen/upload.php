<?php
class Upload extends Controller{

	function upload(){
		parent::Controller();
		$this->load->model('upload_model');
		
	}
	function index(){
		$this->load->view('halaman_awal');
	}

	function awal_materi(){
		$this->load->library('pagination');
		$this->load->model('upload_model');
	
		$offset=$this->uri->segment(3);
		$per_page=5;
	
		$config['base_url'] = 'http://localhost/upload/index.php/upload/upload_materi/';
		$config['total_rows'] = $this->db->get('materi')->num_rows();
		//$config['per_page'] = 5;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data['materi']=$this->upload_model->ambil_materi($per_page,$offset);
		$data['pagination']=$this->pagination->create_links();
		//$data['materi']=$this->upload_model->ambil_materi();
		$this->load->view('upload_materi_view',$data);
	}

	function awal_soal(){
		$this->load->model('upload_model');
		$this->load->library('pagination');
		//$data['soal']=$this->upload_model->ambil_soal();
		
		$offset=$this->uri->segment(3);
		$per_page=5;
	
		$config['base_url'] = 'http://localhost/upload/index.php/upload/upload_soal/';
		$config['total_rows'] = $this->db->get('soal')->num_rows();
		//$config['per_page'] = 5;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data['soal']=$this->upload_model->ambil_soal($per_page,$offset);
		$data['kodeMateri']=$this->upload_model->ambil_nama_materi();
		$data['pagination']=$this->pagination->create_links();
		
		$this->load->view('upload_soal_view',$data);
	}

	function upload_materi(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('kodeMateri','Kode Materi','required');
		$this->form_validation->set_rules('namaMateri','nama Materi','required');
				
		if($this->form_validation->run()==false){
			$this->awal_materi();
		}else{
			$kodeMateri=$this->input->post('kodeMateri');
			$namaMateri=$this->input->post('namaMateri');
			$data=array(
				'kodeMateri' => $kodeMateri,
				'namaMateri' => $namaMateri
			);
			$this->load->model('upload_model');
			$this->upload_model->upload_materi($data);
			$this->awal_materi();
		}
	}
	function upload_soal(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('kodeSoal','Kode Soal','required');
		$this->form_validation->set_rules('pertanyaan','Pertanyaan','required');
		$this->form_validation->set_rules('jawabanA','Jawaban A','required');
		$this->form_validation->set_rules('jawabanB','Jawaban B','required');
		$this->form_validation->set_rules('jawabanC','Jawaban C','required');
		$this->form_validation->set_rules('jawabanD','Jawaban D','required');
		$this->form_validation->set_rules('jawabanE','Jawaban E','required');
		$this->form_validation->set_rules('jawabanBenar','Jawaban Benar','required');
		$this->form_validation->set_rules('nilaiJawaban','Nilai Jawaban','required');
		
		if($this->form_validation->run()==false){
			$this->awal_soal();
		}else{
			$kodeMateri=$this->input->post('kodeMateri');
			$kodeSoal=$this->input->post('kodeSoal');
			$pertanyaan=$this->input->post('pertanyaan');
			$jawabanA=$this->input->post('jawabanA');
			$jawabanB=$this->input->post('jawabanB');
			$jawabanC=$this->input->post('jawabanC');
			$jawabanD=$this->input->post('jawabanD');
			$jawabanE=$this->input->post('jawabanE');
			$jawabanBenar=$this->input->post('jawabanBenar');
			$nilaiJawaban=$this->input->post('nilaiJawaban');
	
			$data=array(
				'kodeMateri' => $kodeMateri,
				'kodeSoal' => $kodeSoal,
				'pertanyaan' => $pertanyaan,
				'jawabanA' => $jawabanA,
				'jawabanB' => $jawabanB,
				'jawabanC' => $jawabanC,
				'jawabanD' => $jawabanD,
				'jawabanE' => $jawabanE,
				'jawabanBenar' => $jawabanBenar,
				'nilaiJawaban' => $nilaiJawaban
			);
			$this->load->model('upload_model');
			$this->upload_model->upload_soal($data);
			$this->awal_soal();
		}
	}
	
	function edit_materi(){
		if($this->input->post('submit')){
			$this->load->library('form_validation');
	
			$this->form_validation->set_rules('kodeMateri','Kode Materi','required');
			$this->form_validation->set_rules('namaMateri','nama Materi','required');
	
			if($this->form_validation->run()==false){
				$this->load->view('edit_materi_view');
			}else{
				$kodeMateri=$this->input->post('kodeMateri');
				$namaMateri=$this->input->post('namaMateri');
				$data=array(
					'kodeMateri' => $kodeMateri,
					'namaMateri' => $namaMateri
				);
				$this->load->model('upload_model');
				$this->upload_model->update_materi($data);
				$this->awal_materi();
			}
		}else{
			$this->load->model('upload_model');
			$data['query'] = $this->upload_model->ambil_kode_materi();
			$data['kode'] = $this->uri->segment(3);
			$this->load->view('edit_materi_view',$data);
		}
	}
	
	function edit_soal(){
		if($this->input->post('submit')){
			$this->load->library('form_validation');
	
			$this->form_validation->set_rules('kodeSoal','Kode Soal','required');
			$this->form_validation->set_rules('pertanyaan','Pertanyaan','required');
			$this->form_validation->set_rules('jawabanA','Jawaban A','required');
			$this->form_validation->set_rules('jawabanB','Jawaban B','required');
			$this->form_validation->set_rules('jawabanC','Jawaban C','required');
			$this->form_validation->set_rules('jawabanD','Jawaban D','required');
			$this->form_validation->set_rules('jawabanE','Jawaban E','required');
			$this->form_validation->set_rules('jawabanBenar','Jawaban Benar','required');
			$this->form_validation->set_rules('nilaiJawaban','Nilai Jawaban','required');

			if($this->form_validation->run()==false){
				$this->awal_soal();
			}else{
				$kodeMateri=$this->input->post('kodeMateri');
				$kodeSoal=$this->input->post('kodeSoal');
				$pertanyaan=$this->input->post('pertanyaan');
				$jawabanA=$this->input->post('jawabanA');
				$jawabanB=$this->input->post('jawabanB');
				$jawabanC=$this->input->post('jawabanC');
				$jawabanD=$this->input->post('jawabanD');
				$jawabanE=$this->input->post('jawabanE');
				$jawabanBenar=$this->input->post('jawabanBenar');
				$nilaiJawaban=$this->input->post('nilaiJawaban');
	
				$data=array(
					'kodeMateri' => $kodeMateri,
					'kodeSoal' => $kodeSoal,
					'pertanyaan' => $pertanyaan,
					'jawabanA' => $jawabanA,
					'jawabanB' => $jawabanB,
					'jawabanC' => $jawabanC,
					'jawabanD' => $jawabanD,
					'jawabanE' => $jawabanE,
					'jawabanBenar' => $jawabanBenar,
					'nilaiJawaban' => $nilaiJawaban
				);
				$this->load->model('upload_model');
				$this->upload_model->update_soal($data);
				$this->awal_soal();
			}
		}else{
			$this->load->model('upload_model');
			$data['kodeMateri']=$this->upload_model->ambil_nama_materi();
			$data['query'] = $this->upload_model->ambil_kode_soal();
			$data['kode'] = $this->uri->segment(3);
			$this->load->view('edit_soal_view',$data);
		}
	}
	function remove_materi(){
		$kodeMateri = $this->uri->segment(3);
		$this->load->model('upload_model');
		$this->upload_model->delete_materi($kodeMateri);
		$this->awal_materi();
	}
	function remove_soal(){
		$kodeSoal = $this->uri->segment(3);
		$this->load->model('upload_model');
		$this->upload_model->delete_soal($kodeSoal);
		$this->awal_soal();
	}
}
?>