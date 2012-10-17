<?php
Class Ebooks_model extends Model {
	var $gallerypath;
	var $gallery_path_url;
	
	function Ebooks_model(){
		parent::Model();
		$this->gallerypath = realpath(APPPATH . '../ebooks_img');
		$this->gallery_path_url = base_url().'system/ebooks_img/';
	}
	
	function cek($judul){
		$this->db->select('judul');
		$this->db->from('ebook');
		$this->db->where('judul', $judul);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function daftar($limit, $offset){
		$this->db->select('idebook, judul, photo, deskripsi, url');
		$this->db->from('ebook');
		$this->db->where('status','1');
		$this->db->order_by("tgl", "desc"); 
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query;
	}
	
	function daftarall(){
		$this->db->select('idebook, judul');
		$this->db->from('ebook');
		$this->db->where('status','1');
		$this->db->order_by("tgl", "asc"); 
		$query = $this->db->get();
		return $query;
	}
	
	function do_upload() {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array(
			'source_image' => $datafile['full_path'],
			'new_image' => $this->gallerypath . '/thumbnails',
			'maintain_ration' => true,
			'width' => 160,
			'height' =>120
		);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$url = $this->input->post('url');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'url' => $url,
			'tgl' => $tanggal,
			'photo' => $userfile
			);
		$this->db->insert('ebook', $data);
	}

function do_upload1() {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array(
			'source_image' => $datafile['full_path'],
			'new_image' => $this->gallerypath . '/thumbnails',
			'maintain_ration' => true,
			'width' => 160,
			'height' =>120
		);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$url = $this->input->post('url');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'judul' => $judul,
			'deskripsi' => $deskripsi,
			'url' => $url,
			'tgl' => $tanggal,
			'photo' => $userfile,
			'status' => '1'
			);
		$this->db->insert('ebook', $data);
	}


	function edit($idebook) {
		$userfile = $_FILES['userfile']['name'];
		if(!empty($userfile)){
			$konfigurasi = array(
				'allowed_types' =>'jpg|jpeg|gif|png|bmp',
				'upload_path' => $this->gallerypath
			);
			$this->load->library('upload', $konfigurasi);
			$this->upload->do_upload();
			$datafile = $this->upload->data();
	
			$konfigurasi = array(
				'source_image' => $datafile['full_path'],
				'new_image' => $this->gallerypath . '/thumbnails',
				'maintain_ration' => true,
				'width' => 160,
				'height' =>120
			);
	
			$this->load->library('image_lib', $konfigurasi);
			$this->image_lib->resize();
			$judul = $this->input->post('judul');
			$deskripsi = $this->input->post('deskripsi');
			$url = $this->input->post('url');
			$userfile = $_FILES['userfile']['name'];
			$data = array(
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'url' => $url,
				'photo' => $userfile
				);
			$this->db->where('idebook', $idebook);
			$this->db->update('ebook', $data);
		}
		else{
			$judul = $this->input->post('judul');
			$deskripsi = $this->input->post('deskripsi');
			$url = $this->input->post('url');
			$data = array(
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'url' => $url
				);
			$this->db->where('idebook', $idebook);
			$this->db->update('ebook', $data);
		}
	
	}
	
	function select($idebook){
		return $this->db->get_where('ebook', array('idebook' => $idebook))->row();
	}

	
	function delete($idebook){
		$this->db->where('idebook', $idebook);
		$this->db->delete('ebook');
	}
	
	function ambil(){
		$this->db->select('judul, deskripsi');
		$this->db->from('ebook');
		$query = $this->db->get();
		return $query;
	}

	function ambilisi($idebook){
		$this->db->select('judul, isi, photo');
		$this->db->from('ebook');
		$this->db->where('idebook', $idebook);
		$query = $this->db->get();
		return $query;
	}
	
	function tampil($idebook) {
	
			$data = array(
				'status' => '1'
				);
			$this->db->where('idebook', $idebook);
			$this->db->update('ebook', $data);
	}
	
	function batal_tampil($idebook) {
	
			$data = array(
				'status' => '0'
				);
			$this->db->where('idebook', $idebook);
			$this->db->update('ebook', $data);
	}
	
}
?>