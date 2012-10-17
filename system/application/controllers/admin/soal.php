<?php
class soal extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	function soal(){
		parent::Controller();
		$this->cek_login();
		$this->load->model('soalModel');
	}

    function index() {
		//$this->load->view('home.php');
		redirect('admin/soal/viewSoal');
    }
	
	function viewSoal(){
		$this->load->model('soalModel');
		$data = array();
		$data['end'] = "4";
		$data['val'] = "";
		$data['soal'] = $this->soalModel->getSoal();
		$this->load->view('admin/soalView', $data);
	}
	
	function inputSoal(){
        if ($this->input->post('submit')) {
 			$soal = $this->input->xss_clean($this->input->post('soal'));
			$kategori = $this->input->xss_clean($this->input->post('kategori'));
			$user = $this->input->xss_clean($this->input->post('user'));
			$opsi1 = $this->input->xss_clean($this->input->post('opsi1'));
			$poin1 = $this->input->xss_clean($this->input->post('poin1'));
			$opsi2 = $this->input->xss_clean($this->input->post('opsi2'));
			$poin2 = $this->input->xss_clean($this->input->post('poin2'));
			$opsi3 = $this->input->xss_clean($this->input->post('opsi3'));
			$poin3 = $this->input->xss_clean($this->input->post('poin3'));
			$opsi4 = $this->input->xss_clean($this->input->post('opsi4'));
			$poin4 = $this->input->xss_clean($this->input->post('poin4'));

			$this->load->model('soalModel');
            $this->soalModel->addPost($soal, $kategori, $user, $opsi1, $poin1, $opsi2, $poin2, $opsi3, $poin3, $opsi4, $poin4);
			redirect ('admin/soal/viewSoal');
        }else{
			$this->load->model('soalModel');
			$data['end'] = "4";
			$data['val'] = "";
			$idUser = "0931140105";
			$data['idUser']=$idUser;
			$data['kategori'] = $this->soalModel->getKategori();
			$this->load->view('admin/soalInput', $data);
		}
	}
	
	function opsi(){
		 if ($this->input->post('add')) {
			$val = $this->input->xss_clean($this->input->post('val'));
		 }
		 $this->load->view('admin/soalView', $val);
	}
	
	function updateSoal() {
		$id = $this->uri->segment(4);
	 
		if ($this->input->post('submit')) {
			$soal = $this->input->xss_clean($this->input->post('soal'));
			$kategori = $this->input->xss_clean($this->input->post('kategori'));
			$opsi1 = $this->input->xss_clean($this->input->post('opsi1'));
			$poin1 = $this->input->xss_clean($this->input->post('poin1'));
			$opsi2 = $this->input->xss_clean($this->input->post('opsi2'));
			$poin2 = $this->input->xss_clean($this->input->post('poin2'));
			$opsi3 = $this->input->xss_clean($this->input->post('opsi3'));
			$poin3 = $this->input->xss_clean($this->input->post('poin3'));
			$opsi4 = $this->input->xss_clean($this->input->post('opsi4'));
			$poin4 = $this->input->xss_clean($this->input->post('poin4'));
			$this->load->model('soalModel');
			$this->soalModel->updatePost($id, $soal, $kategori, $opsi1, $poin1, $opsi2, $poin2, $opsi3, $poin3, $opsi4, $poin4);
	 
			$data['end'] = "4";
			$data['val'] = "";
			redirect ('admin/soal/viewSoal');
		} else {
			$this->load->model('soalModel');
			$data = array('id' => $id);
			$data['kategori'] = $this->soalModel->getKategori();
			$data['update'] = $this->soalModel->getUpdate();
			$data['end'] = "4";
			$data['val'] = "";
			$this->load->view('admin/updateForm', $data);
		}
	}
	
	function deleteSoal() {
		$this->load->model('soalModel');
		$id = $this->uri->segment(4);
		$this->soalModel->deletePost($id);
	 
		$data['soal'] = $this->soalModel->getsoal();
		$data['kategori'] = $this->soalModel->getKategori();
		$data['end'] = "4";
		$data['val'] = "";
		redirect ('admin/soal/viewSoal');
	}
	
  	function viewKategori() {
        if ($this->input->post('submit')) {
            $kategori = $this->input->xss_clean($this->input->post('kategori'));
 
			$this->load->model('soalModel');
            $this->soalModel->addPostKat($kategori);
        }
 
        $data = array();
	    $this->load->model('soalModel');
		$data['kategori'] = $this->soalModel->getPostKat();

		$this->load->view('admin/kategoriView', $data);
    }
	
	function updateKat() {
    $id = $this->uri->segment(3);
 
    if ($this->input->post('submit')) {
		$kategori = $this->input->xss_clean($this->input->post('kategori'));
		
 		$this->load->model('soalModel');
        $this->soalModel->updatePostKat($id, $kategori);
        redirect ('admin/soal/viewKategori');
    } else {
		$this->load->model('soalModel');
        $data = array('id' => $id);
		$data['update'] = $this->soalModel->getUpdateKat();
        $this->load->view('admin/updateKat', $data);
    }
	}
	
	function deleteKat() {
		$this->load->model('soalModel');
		$id = $this->uri->segment(3);
		$this->soalModel->deletePostKat($id);
	 
		$data['kategori'] = $this->soalModel->getPostKat();
		$this->load->view('admin/kategoriView', $data);
	}
}
?>