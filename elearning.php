<?php

class elearning extends Controller {

	function Welcome()
	{
		parent::Controller();	
	    $this->load->model('MCalendar');

	}
	
	function index()
	{
		$this->load->view('admin');
	}
	function admin()
	{
		$this->load->view('admin');
	}
	
	function upload(){
		parent::Controller();
		$this->load->model('upload_model');
		
	}
	

	function awal_materi(){
		$this->load->library('pagination');
		$this->load->model('upload_model');
	
		$offset=$this->uri->segment(3);
		$per_page=5;
	
		$config['base_url'] = 'http://localhost/elearning_polinema/index.php/elearning/upload_materi/';
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
	function logs(){
		$timeid = $this->uri->segment(3);
		if($timeid==0)
			$time = time();
		else
			$time = $timeid;
		
		$data = $this->_date($time);
		$data['title'] = "Manage Calendar";
		$data['header'] = 'Calendar';
		$data['main'] = 'calendar_home';
		
		$this->load->vars($data);
		$this->load->view('log');
	}
	function _date($time){
 	$this->load->model('MCalendar');

	$data['events']=$this->MCalendar->getEvents($time);

	$today = date("Y/n/j", time());
	$data['today']= $today;
	
	$current_month = date("n", $time);
	$data['current_month'] = $current_month;
	
	$current_year = date("Y", $time);
	$data['current_year'] = $current_year;
	
	$current_month_text = date("F Y", $time);
	$data['current_month_text'] = $current_month_text;
	
	$total_days_of_current_month = date("t", $time);
	$data['total_days_of_current_month']= $total_days_of_current_month;
	
	$first_day_of_month = mktime(0,0,0,$current_month,1,$current_year);
	$data['first_day_of_month'] = $first_day_of_month;
	
	//geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
	$first_w_of_month = date("w", $first_day_of_month);
	$data['first_w_of_month'] = $first_w_of_month;
	
	//how many rows will be in the calendar to show the dates
	$total_rows = ceil(($total_days_of_current_month + $first_w_of_month)/7);
	$data['total_rows']= $total_rows;
	
	//trick to show empty cell in the first row if the month doesn't start from Sunday
	$day = -$first_w_of_month;
	$data['day']= $day;
	
	$next_month = mktime(0,0,0,$current_month+1,1,$current_year);
	$data['next_month']= $next_month;
	
	$next_month_text = date("F \'y", $next_month);
	$data['next_month_text']= $next_month_text;
	
	$previous_month = mktime(0,0,0,$current_month-1,1,$current_year);
	$data['previous_month']= $previous_month;
	
	$previous_month_text = date("F \'y", $previous_month);
	$data['previous_month_text']= $previous_month_text;
	
	$next_year = mktime(0,0,0,$current_month,1,$current_year+1);
	$data['next_year']= $next_year;
	
	$next_year_text = date("F \'y", $next_year);
	$data['next_year_text']= $next_year_text;
	
	$previous_year = mktime(0,0,0,$current_month,1,$current_year-1);
	$data['previous_year']=$previous_year;
	
	$previous_year_text = date("F \'y", $previous_year);
	$data['previous_year_text']= $previous_year_text;
	
	return $data;
  
 }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */