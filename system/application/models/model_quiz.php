<?php
Class Model_quiz extends Model{
	function __construct(){
		parent::Model();
	}
	var $table="post";
	
	function getUser(){
		 $cek_id="Select * from user_quiz where id_ambil_soal in (select max(id_ambil_soal) from soal)";
         $hasil_cek_id=$this->db->query("$cek_id");
		 return $hasil_cek_id->result();
	}
	
	function getSoal(){
		$query="select * from soal order by no";
   		$hasil=$this->db->query($query); 
		return $hasil->result();
	}
	
	function inUser(){
		$query="insert into user_quiz (nama,id_ambil_soal) values ('$xnama','$xnilai_id_max')";
        $run_query=$this->db->query("$query");
		return $run_query->result();
	}	
	
	function getTop() {
		$query="select nama,tanggal_test,waktu,nilai from user_quiz order by nilai desc limit 5";
 		$hasil=$this->db->query("$query");
		return $hasil->result();
	}
}