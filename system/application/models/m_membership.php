<?php
class M_membership extends Model {
    function __construct(){
		parent::Model();
		$this->load->helper('date');
	}
	
	function getMember()
	{
		$query = $this->db->get('membership');
		return $query;
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('membership');
	}
	
	function update($id){
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('membership');
	}
}
?>