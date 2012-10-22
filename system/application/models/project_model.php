<?php
class project_model extends Model {
    function __construct(){
		parent::Model();
		$this->load->helper('date');
	}
	
	var $table		= "projectweb";
	
	function getKategory(){
		$query = $this->db->get("kategoryprojectweb");
		return $query->result();
	}
	
	function getlist(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/elearning/project';
		$config['total_rows'] = $this->db->count_all('projectweb');
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['content'] = 'project';
		$query = $this->db->order_by("IdPW", "desc");
		$query = $this->db->get('projectweb', $config['per_page'], $this->uri->segment(3));
		return $query->result();
	}
	
	function getProject($limit = array()){
		$this->db->order_by("IdPW", "desc");
		if ($limit == NULL)
			return $this->db->get("projectweb")->result();
		else
			return $this->db->limit($limit['perpage'], $limit['offset'])->get("projectweb")->result();
	}
	
	function cari_data($id_pw){
		return $this->db->get_where($this->table, array('IdPW' => $id_pw), 1)->row();
	}
	
	function simpan_update($id_pw,$data){
		$this->db->where('IdPW', $id_pw);
		$this->db->update($this->table, $data);
	}
	
	function countRows(){
		$query = $this->db->count_all("projectweb");
		return $query;
	}
	
	function aplot($idk,$idu,$jdl,$desc,$petz,$con,$stat){
		$datestring = "%Y-%m-%d";
		$data = array('IdKatPW'=>$idk, 'IdUser'=>$idu, 'JudulPW'=>$jdl, 'Deskripsi'=>$desc, 
						'path'=>$petz, 'tglpost'=>mdate($datestring), 'counter'=>$con, 'status'=>$stat);
		$query = $this->db->insert('projectweb',$data);
	}
	
	function find($mode,$var){
		if($mode == 'titel')
		{
			$this->db->like('JudulPW',$var);
		}
		else
		{
			$this->db->like('IdKatPW',$var);
		}
		$query = $this->db->get('projectweb');
		return $query->result();
	}
	
	function getPath($id){
		$query = $this->db->get_where('projectweb',array('IdPW' => $id));
		return $query->row_array();
	}
	
	function increaseCounter($id,$con){
		$conplus = $con+1;
		$data = array('counter' => $conplus);
		$this->db->where('IdPW', $id);
		$this->db->update('projectweb', $data);
	}
	
	function delete($IdPW){
		$this->db->where('IdPW', $IdPW);
		$this->db->delete('projectweb');
	}
}
?>