<?php
class M_blog extends model {

	function M_blog()
	{
		parent::Model();
	
	}
	
	function beritabaru() {
	$this->db->where('tipe', 'berita');
	$this->db->order_by("id", "desc"); 
	$query = $this->db->get('berita',1);
	return $query->result();

	}
	
	function beritasepuluh() {
	$this->db->where('tipe', 'berita');
	$berita = $this->db->get('berita',10);
	return $berita->result();

	}
	
	function lihatberita($id) {
	$this->db->where('tipe', 'berita');
	$this->db->where('id', $id);
	$berita = $this->db->get('berita');
	return $berita->result();

	}


}
?>