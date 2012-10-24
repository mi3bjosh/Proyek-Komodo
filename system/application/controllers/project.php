<?php
class Project extends Controller {
	function __construct(){
		parent::Controller();
		$this->load->helper(array('form', 'url', 'date', 'html', 'download'));
		$this->load->model('project_model');
		$this->load->library(array('pagination','form_validation','session'));
	}
	
	//method index
	function index($offset = 0)
	{
		$perpage = 4; //jml data per-page
		/*$config = array(
			'base_url' => base_url().index_page().'/project/index/',
			'total_rows' => count($this->project_model->getProject()),
			'per_page' => $perpage,
		);
		$this->pagination->initialize($config);
		if($this->session->userdata('logged_in'))
		{$stat='login';}else{$stat='logot';}*/
		$stat='login';
		$data = array('kat' => $this->project_model->getKategory(),
						'select' => '', 'stat' => $stat,
						'count' => $this->project_model->countRows(),
						'prj' => $this->project_model->getProject(array('perpage' => $perpage, 'offset' => $offset))
					);	
		$this->load->view('upload_fer',$data);
	}

	//method untuk proses upload file
	function uploadfile()
	{
		//if($this->session->userdata('logged_in'))
		//{
			$sbmt = $this->input->post('submit');
			if($sbmt != 'upload')
			{
				redirect('project/index');
			}
			else
			{
				$form_rules = array(
					array('field'=>'judul','label'=>'"<b>title</b>"','rules'=>'trim|required'),
					array('field'=>'descript','label'=>'"<b>description</b>"','rules'=>'trim|required')
						);
				$this->form_validation->set_rules($form_rules);
				if ($this->form_validation->run() == false)
				{
					$data = array('kat' => $this->project_model->getKategory(),
								'error' => 'Proses upload gagal,\nada data yang masih kosong');
					$this->load->view('upload_fer',$data);
				}
				else
				{
					$config['upload_path'] = './f_project/';
					$path = 'f_project/';
					$config['allowed_types'] = 'tar|jar|exe|pdf|zip|rar'; //ekstensi file yang bisa diupload
					$file = $_FILES['userfile']['name']; //file name dari file yang diupload
					$config['max_size']	= '50000'; //max ukuran file adalah 50Mb
					
					$this->load->library('upload', $config);
		
					if ( ! $this->upload->do_upload('userfile'))
					{
						$this->load->model('project_model');
						$data = array('kat' => $this->project_model->getKategory(),
										'error' => $this->upload->display_errors()
									);
						$this->load->view('upload_fer', $data);
					}
					else
					{
						$jdl = $this->input->post('judul');
						$idk = $this->input->post('kate');
						$desc = $this->input->post('descript');
						$idu = $this->session->userdata('userdata');
						$con = 0;
						$stat = 1;
						$file = $this->upload->file_name;
						$petz = $path.$file;
						$this->project_model->aplot($idk,$idu,$jdl,$desc,$petz,$con,$stat); 
						$data = array('kat' => $this->project_model->getKategory(),
										'error' => 'sukses bro',
										'select'=>'',
										'prj' => $this->project_model->getProject(),
										'count' => $this->project_model->countRows()
									);
						$this->load->view('upload_success', $data);
					}
				}
			}
		//}else{
			//redirect('/project/');
		//}
	}
	
	//method untuk pencarian project
	function searchfile()
	{
		$mode = $this->input->post('mode');
		if($mode == 'titel')
		{
			$var = $this->input->post('judul');
			if($var == '')
			{
				redirect('project/index');
			}
		}
		else
		{
			$var = $this->input->post('kate');
		}
		
		$data = array('prj' => $this->project_model->find($mode,$var),
						'kat' => $this->project_model->getKategory(),
						'select'=>'',
						'count' => count($this->project_model->find($mode,$var))
					);
		$this->load->view('DownloadView',$data);
	}
	
	//function untuk menampilkan ajax combo box
	function pilihSearch($str)
	{		
		$data = array('kat' => $this->project_model->getKategory(),'select'=>$str);
		$this->load->view('SearchCategory',$data);
	}
	
	//function untuk proses download project
	function donlot($id,$con)
	{
		$this->project_model->increaseCounter($id,$con);
		$data = $this->project_model->getPath($id);
		$path = $data['path'];
		$xxx = file_get_contents($path);
		force_download($path, $xxx);	
		$con = $data['counter'];
		redirect('project/index');
	}
	
	//fungsi untuk menampilkan form upload project
	function uploadNewProject()
	{
		//if($this->session->userdata('logged_in'))
		//{
			$data = array('kat' => $this->project_model->getKategory(),'error' => '');
			$this->load->view('upload_fer',$data);
		//}
		//else
		//{
			//$this->load->view('LoginView');
			//redirect('log/index',$data);
		//}
	}
}
?>
