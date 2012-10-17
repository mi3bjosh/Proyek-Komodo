<?php
Class M_link extends Model {
	var $gallerypath;
	var $gallery_path_url;

	function M_link(){
		parent::Model();
		$this->gallerypath = realpath(APPPATH . '../link');
		$this->gallery_path_url = base_url().'system/link/';
	}

	function cek($judul){
		$this->db->select('judul');
		$this->db->from('link');
		$this->db->where('judul', $judul);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	function daftar(){
		$this->db->select('judul, url, gambar');
		$this->db->from('link');
		$query = $this->db->get();
		return $query;
	}
	
	function tambah(){
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
		$userfile = $_FILES['userfile']['name'];
	
		$judul = $this->input->post('judul');
		$url = $this->input->post('url');
		$data = array(
			'judul' => $judul,
			'url' => $url,
			'gambar' => $userfile
			);
		$this->db->insert('link', $data);
	}
	
	function update($id){
		$this->db->set('url', $url);
		$this->db->where('judul', $judul);
		$this->db->update('link');
	}
	
	function ambil($id){
		$this->db->where('id', $id);
		$this->db->select('judul, link, gambar');
		$this->db->from('link');
		$query = $this->db->get();
		return $query;
	}
	
	function edit($id) {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
		$userfile = $_FILES['userfile']['name'];
		$judul = $this->input->post('judul');
		$url = $this->input->post('url');
		$data = array(
			'judul' => $judul,
			'url' => $url,
			'gambar' => $userfile
			);
		$this->db->where('id', $id);
		$this->db->update('link', $data);

	}
	
	function select($id){
		return $this->db->get_where('link', array('id' => $id))->row();
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('link');
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
		$nama = $this->input->post('nama');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'nama' => $nama,
			'gambar' => $userfile
		);
		$this->db->insert('upload', $data);
	}
}
?>