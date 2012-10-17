<?php
class Project extends Controller {
	function __construct(){
		parent::Controller();
		$this->cek_login();
		$this->load->helper(array('form', 'url', 'date', 'html', 'download'));
		$this->load->model('project_model');
		$this->load->library(array('pagination','form_validation','session'));
	}
	
	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}
	
	//method index
	function index()
	{
		redirect('admin/project/viewproject');
	}

	function viewproject()
	{	
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/admin/project/viewproject';
		$config['total_rows'] = $this->db->count_all('projectweb');
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['content'] = 'project_view';
		$this->db->order_by("IdPW", "desc");
		$data['hasil'] = $this->db->get('projectweb', $config['per_page'], $this->uri->segment(4));
		$this->load->view('admin/layout.php', $data);
	}
	
	function publish($id_pw){
		$project = $this->project_model->cari_data($id_pw);
		$status	= $project->status;
		if ($status == 1)
		{
			$status	= 0;
			$message = "Tidak Dipublikasikan.";
		}
		else 
		{
			$status	= 1;
			$message = "Dipublikasikan.";
		}
		$data = array('status' =>$status);
		$this->project_model->simpan_update($id_pw,$data);	
		$this->session->set_flashdata('message','Data '.$message);
		redirect('admin/project/viewproject');
	}
	
	//method untuk proses upload file
	function uploadfile()
	{
		//if($this->session->userdata('logged_in'))
		//{
			$sbmt = $this->input->post('submit');
			if($sbmt != 'upload')
			{
				redirect('admin/project');
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
								'error' => 'proses upload gagal,\nada data yang masih kosong');
					$data['content'] = 'project_upload';
					$this->load->view('admin/layout.php',$data);
				}
				else
				{
					$config['upload_path'] = './project/';
					$path = 'project/';
					$config['allowed_types'] = 'rar|zip|7z'; //ekstensi file yang bisa diupload
					$file = $_FILES['userfile']['name']; //file name dari file yang diupload
					$config['max_size']	= '50000'; //max ukuran file adalah 50Mb
					
					$this->load->library('upload', $config);
		
					if ( ! $this->upload->do_upload('userfile'))
					{
						$this->load->model('project_model');
						$data = array('kat' => $this->project_model->getKategory(),
										'error' => $this->upload->display_errors()
									);
						$data['content'] = 'project_upload';
						$this->load->view('admin/layout.php',$data);
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
						redirect('admin/project',$data);
					}
				}
			}
		//}else{
		//	redirect('/project/');
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
			$data['content'] = 'project_upload';
			$this->load->view('admin/layout.php',$data);
		//}
		//else
		//{
		//	$this->load->view('LoginView');
			//redirect('log/index',$data);
		//}
	}
	
	function delete_project($id = null) {
			$this->load->model('project_model');
			$this->project_model->delete($id);
			redirect('admin/project');
	}
}
?>
