<?php
class Ebook extends Controller {

	function cek_login(){
		if ( !$this->session->userdata('is_logged_in'))
		{
			redirect('elearning');
			exit;
		}
	}

	function ebook()
	{
		parent::Controller();
		$this->cek_login();
		$this->load->model('ebook_model');	
	}
	
	function index()
	{
	$data['query'] = $this->ebook_model->daftarberita();
	$data['content'] = 'tampil_ebook';
	$this->load->view('admin/layout.php', $data);
	}
	tag cobak rek.

	function tambah_ebook()
	{
	$config['upload_path'] = 'uploads/'; 
	$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|js|swf|Xhtml|zip|gif|jpg|jpeg|png|html|htm|txt|rtf|doc|docx|xlsx'; 
	$config['max_size'] = '100000'; 
	$this->load->library('upload', $config); 
	if ( !$this->upload->do_upload('gambar'))
		{
	$data['error']= $this->upload->display_errors();
	$data['content'] = 'tambah_ebook';
	$this->load->view('admin/layout.php', $data);
		}
		else
		{
	$dok = $this->upload->data();
	$data['upload_data']= $dok;
	if ($dok['file_name']){
	$filedok = $config['upload_path'].$dok['file_name'];
		}
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tgl = date ('d - F - Y');
		$tipe = $this->input->post('tipe');
	$this->db->query("insert into berita (judul,isi,tanggal,gambar,tipe) values('$judul','$isi','$tgl','$filedok','$tipe')"); 
	redirect ('admin/ebook');
		}
	}
	
	function hapus_ebook($id) 
	{
	
	$data['query']= $this->ebook_model->delete_baris($id);
   	
	redirect ('admin/ebook');
	
	}
	
	function edit_ebook(){
	$id=$this->uri->segment(4);
	$data['query'] = $this->ebook_model->update($id);
	$data['content'] = 'edit_ebook';
	$this->load->view('admin/layout.php', $data);
	}
	
	function update()
	{
	$id = $this->input->post('id');
	$judul = $this->input->post('judul');
	$isi = $this->input->post('isi');
	$file = $this->input->post('path');
	$images = $this->input->post('gambar');
	$tgl = date('d - F - Y');
   		
		$this->db->where('id', $id);
		$this->db->set('judul',$judul); 
		$this->db->set('isi',$isi);
		$this->db->set('tanggal',$tgl);
		
		$config['upload_path'] = 'uploads/'; 
		$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|js|swf|Xhtml|zip|gif|jpg|jpeg|png|html|htm|txt|rtf|doc|docx|xlsx'; 
		$config['max_size'] = '100000'; 
		$this->load->library('upload', $config); 
		
		if (!$this->upload->do_upload('gambar'))
		{
			$this->db->set('gambar',$file);
			$this->db->update('berita');
			redirect ('admin/ebook');
			//$data['error']= $this->upload->display_errors();
		}else{
		$dok = $this->upload->data();
		$data['upload_data']= $dok;
		if ($dok['file_name']){
			$filedok = $config['upload_path'].$dok['file_name'];
			$this->db->set('gambar',$filedok);
			$this->db->update('berita');
			redirect ('admin/ebook');
			}
		}
	}

}