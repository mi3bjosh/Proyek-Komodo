<?php

class Elearning extends Controller {

	function Welcome()
	{
		parent::Controller();	
		$this->swfCharts  = base_url().'public/flash/Column3D.swf' ;
		
	}
	
	function index()
	{
		if( $this->session->userdata('is_logged_in'))
		{
			if ($this->session->userdata('status')=='mahasiswa')
			{
				redirect ('elearning/project');
			} else if ($this->session->userdata('status')=='admin')
			{
				redirect ('admin/home/admin_area');
			} else
			{
				redirect ('dosen/home/dosen_area');
			}
		}else
		{
			$data['main_content'] = 'login_form';
			$this->load->view('includes/template', $data);	
		}
			
	}
	
	function validate_credentials()
	{		
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			foreach ($query->result() as $row)
			{
			   $data = array(
				'id' => $row->id,
				'firstname' => $row->first_name,
				'lastname' => $row->last_name,
				'email' => $row->email_address,
				'username' => $row->username,
				'status' => $row->status,
				'is_logged_in' => true
			);
			}
			if($row->status == 'admin')
			{
				$this->session->set_userdata($data);
				redirect('admin/home/admin_area');
			} else if ($row->status == 'mahasiswa'){
				$this->session->set_userdata($data);
				$this->load->view('user');
				$this->load->Model('shoutmodel');
				$this->load->Model('ebook');
				$data['shout']=$this->shoutmodel->getshout();
			} else {
				$this->session->set_userdata($data);
				redirect('dosen/home/dosen_area');
			}
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('elearning');
	}
	
	/*
	function index()
	{
		$this->load->view('user');
		$this->load->Model('shoutmodel');
		$this->load->Model('ebook');
		$data['shout']=$this->shoutmodel->getshout();
		
	}*/
	
	//function admin()
	//{
	//	$this->load->view('admin');
	//}
	
	function forum()
	{
		$this->load->Model('shoutmodel');
    	$data['shout']=$this->shoutmodel->getshout();
    	$this->load->view('forum',$data);
	}
	
	function baca()
	{
	
	$this->load->Model('shoutmodel');
	
	$this->db->where('enty_id', $this->uri->segment(3));
	
	$data['query']=$this->db->get('comments');
	
	
	
	$this->load->view('comments_view', $data);
	}
	
	function comment_insert()
	{
	
	$this->db->insert('comments', $_POST);
	
	redirect('elearning/baca/'.$_POST['enty_id']);
	}
	
	
	function project()
	{
		$this->load->Model('project_model');
    	$data['prj']=$this->project_model->getlist();
    	$this->load->view('project',$data);
		//$this->load->view('project');
	}
	

		function delete($id)
	{
		$this->load->Model('shoutmodel');
		$this->shoutmodel->hapus($id);
		redirect('elearning/forum');
	}
	function GetById($id){
		$this->load->Model('shoutmodel');
		$data['forumku']=$this->shoutmodel->GetId($id);
		$this->load->view('forum_edit_view', $data);
		
	}
	
	
	function forum_edit($id)
	{
			
			$this->load->Model('shoutmodel');
			$this->shoutmodel->edit($id);
			redirect('elearning/forum');
			
	}
		

	function artikel()
	{
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$data['jenis'] = "Home";
		$this->load->view('artikel', $data);
	}
	
	function video()
	{
		//$this->load->Model('project_model');
    	//$data['prj']=$this->project_model->getlist();
    	//$this->load->view('project',$data);
		$this->load->view('video');
	}
	
	function upload()
	{
		$this->load->Model('project_model');
		$data = array('kat' => $this->project_model->getKategory(),'error' => '');
		$this->load->view('upload_fer',$data);
	}
	
	function quiz()
	{
		$this->load->model('model_quiz','',TRUE);
		$data['select'] = $this->model_quiz->getTop();	
      	$this->load->view('quiz', $data);
	}
	
	function chart()
	{
		$this->load->view('chart');
	}
	
	function ebook($offset=0)
	{
    	$this->load->Model('ebook');
		$config['total_rows']   = $this->db->count_all('ebook');
        $config['per_page']     = 2;
        $config['next_link']    = ' Before ';
        $config['prev_link']    = ' After ';
        $config['uri_segment']  = 3;
        $this->pagination->initialize($config);
        $data['n_ebook'] = $this->Ebook->listEbook($config['per_page'], $offset);
        $this->load->view('ebook',$data);
	}
	
	function blog($id)
	{
		$this->load->model('m_artikel');
		$this->load->model('m_link');
		$data['ambilisi'] = $this->m_artikel->ambilisi($id);
		$data['daftarartikel'] = $this->m_artikel->daftar(6,0);
		$data['daftarlink'] = $this->m_link->daftar();
		$data['jenis'] = 'Isi Artikel';
		$this->load->view('template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */