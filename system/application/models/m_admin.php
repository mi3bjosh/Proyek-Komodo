<?php
Class M_admin extends Model {
	
	function M_admin(){
		parent::Model();
	}

	function cekdb() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->result();
	}
}
?>