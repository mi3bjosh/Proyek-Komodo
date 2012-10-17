<?php
Class M_artikel extends Model {
	var $gallerypath;
	var $gallery_path_url;
	
	function M_artikel(){
		parent::Model();
		$this->gallerypath = realpath(APPPATH . '../artikel');
		$this->gallery_path_url = base_url().'system/artikel/';
	}
	
	function cek($judul){
		$this->db->select('judul');
		$this->db->from('artikel');
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
		$this->db->select('id, judul, isi, gambar');
		$this->db->from('artikel');
		$this->db->where('status','1');
		$this->db->order_by("tgl", "desc"); 
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query;
	}
	
	function daftarall(){
		$this->db->select('id, judul');
		$this->db->from('artikel');
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
		$isi = $this->input->post('isi');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'judul' => $judul,
			'isi' => $isi,
			'tgl' => $tanggal,
			'gambar' => $userfile
			);
		$this->db->insert('artikel', $data);
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
		$isi = $this->input->post('isi');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'judul' => $judul,
			'isi' => $isi,
			'tgl' => $tanggal,
			'gambar' => $userfile,
			'status' => '1'
			);
		$this->db->insert('artikel', $data);
	}


	function edit($id) {
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
			$isi = $this->input->post('isi');
			$userfile = $_FILES['userfile']['name'];
			$data = array(
				'judul' => $judul,
				'isi' => $isi,
				'gambar' => $userfile
				);
			$this->db->where('id', $id);
			$this->db->update('artikel', $data);
		}
		else{
			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$data = array(
				'judul' => $judul,
				'isi' => $isi
				);
			$this->db->where('id', $id);
			$this->db->update('artikel', $data);
		}
	
	}
	
	function select($id){
		return $this->db->get_where('artikel', array('id' => $id))->row();
	}

	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('artikel');
	}
	
	function ambil(){
		$this->db->select('judul, isi');
		$this->db->from('artikel');
		$query = $this->db->get();
		return $query;
	}

	function ambilisi($id){
		$this->db->select('judul, isi, gambar');
		$this->db->from('artikel');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;
	}
	
	function tampil($id) {
	
			$data = array(
				'status' => '1'
				);
			$this->db->where('id', $id);
			$this->db->update('artikel', $data);
		
		
	
	}
	
	function batal_tampil($id) {
	
			$data = array(
				'status' => '0'
				);
			$this->db->where('id', $id);
			$this->db->update('artikel', $data);
		
		
	
	}
	
}
?>