<?php

class Membership_model extends Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return $query;
		}
	}
	
	function create_member()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email_address');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$new_member_insert_data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email_address' => $email,			
			'username' => $username,
			'password' => $password,
			'status' => 'mahasiswa'
			);
		
		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}