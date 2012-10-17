<?php
Class arsip_model extends Model{
	function __construct(){
		parent::Model();
	}
	//mendefinisikan nama tabel
	var $table		= "materi";
	var $tab_kat	= "kategori_materi"; 
	var $tab_mk		= "matkul"; 
	
	//untuk menampilkan materi
	function tampil_all(){
		$data_all=$this->db->query("select * from ".$this->table." where m_isdel=0 order by mid desc");
		return $data_all;
	}
	
	//untuk menampilkan mata kuliah
	function tampil_mk(){
		$data_mk=$this->db->query("select * from ".$this->tab_mk);
		return $data_mk;
	}
	
	//untuk menampilkan mata kuliah
	function tampil_tipe(){
		$data_tipe=$this->db->query("select * from tipe");
		return $data_tipe;
	}
	
	//untuk menampilkan kategori
	function tampil_kategori($mk){
		$data_cat=$this->db->query("select * from ".$this->tab_kat." where mkid=".$mk);
		return $data_cat;
	}
	
	//untuk menampilkan data awal
	function tampil_data($catid){
		$data_arsip=$this->db->query("select * from ".$this->table." where mcatid=".$catid." and m_isdel=0 order by mid desc");
		return $data_arsip;
	}
	
	//untuk menampilkan data untuk mahasiswa
	function tampil_data_m($catid){
		$data_arsip=$this->db->query("select * from ".$this->table." where mcatid=".$catid." and m_isdel=0 and m_ispub=1");
		return $data_arsip;
	}
	
	function trash_data($catid){
		$data_arsip=$this->db->query("select * from ".$this->table." where mcatid=".$catid." and m_isdel=1");
		return $data_arsip;
	}
	
	//untuk tambah data
	function simpan_arsip($data){
		$this->db->insert($this->table,$data);
	}
	
	//untuk update data
	function simpan_update($id_gb,$data){
		$this->db->where('mid', $id_gb);
		$this->db->update($this->table, $data);
	}
	
	//untuk hapus data
	function hapus_arsip($id_gb){
		$this->db->where('mid',$id_gb);
		$this->db->update($this->table, $data);
	}
	
	//cari data saat akan di edit
	function cari_data($id_gb){
		return $this->db->get_where($this->table, array('mid' => $id_gb), 1)->row();
	}
	
	//cari nama data tabel kategori
	function cari_kat($id){
		return $this->db->get_where($this->tab_kat, array('catid' => $id), 1)->row();
	}
	
	//cari nama data tabel mata kuliah
	function cari_mk($id){
		return $this->db->get_where($this->tab_mk, array('mkid' => $id), 1)->row();
	}
	
	
}
?>