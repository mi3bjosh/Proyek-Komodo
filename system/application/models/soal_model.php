<?php
class Soal_model extends model {

	function Soal_model()
	{
		parent::Model();
	}
	
	function daftarsoal() {
	$this->db->select('*');
	$this->db->from('soal');
	$this->db->order_by("no", "asc");
	$query = $this->db->get();
	return $query->result();
	}
	
	function delete_soal($no) {
       $this->load->database();
       $query = $this->db->delete('soal', array('no' => $no)); 
	   return $query;	
	}
	
	function update($no){
	$this->db->where('no', $no);
	$query = $this->db->get('soal');
	return $query->result();
	}
		
	function cekdb(){
	$user = $this->input->POST('username');
	$pass = $this->input->POST('password');

	$this->db->where('username', $user);
	$this->db->where('password', $pass);
	$query = $this->db->get('user'); 
	return $query->result();	
	}
	
	function carnoata(){
	$c = $this->input->POST('cari');
	$tipe = $this->input->POST('tipe'); 
	
	$this->db->like($tipe, $c);
	$query= $this->db->get('soal'); 
	return $query->result();
	}
}
?>