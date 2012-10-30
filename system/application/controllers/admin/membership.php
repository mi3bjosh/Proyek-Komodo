<?php
Class Membership extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	public function membership()
	{
		parent::Controller();
		//$this->cek_login();
		$this->load->model('M_membership');	
	}
	
	function index()
	{
			$data['query']=$this->M_membership->getMember();
			$this->load->view('admin/membership_view',$data);
	}
	
	function delete($id = null)
	{
		$this->load->model('m_membership');
		$this->m_membership->delete($id);
		redirect('admin/membership');
	}
	
	function update_status(){
			if($_POST == NULL) {
				
				$data['status'] = $this->m_membership->select($id);
				//$this->m_membership->batal_tampil($id);
				redirect('admin/membership');
				//$this->load->view('admin', $data);
			}
			else {
				$id = $this->input->post('id');
				$this->M_membership->update($id);
				
				redirect('admin/membership');
			}
	}

}

?>