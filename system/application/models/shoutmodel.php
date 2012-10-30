<?php
class Shoutmodel extends Model{
/*constructor function*/
function Shoutmodel(){
parent::Model();
}

function getshout(){
$shouts = $this->db->get('shouts');
if($shouts->num_rows() > 0){foreach ($shouts->result() as $shout){
$data[] = $shout;
}
return $data;
}
}

function getcom(){
$comments = $this->db->get('comments');
if($comments->num_rows() > 0){foreach ($comments->result() as $shout){
$data[] = $comments;
}
return $data;
}
}


function newshout(){
$name=$_POST["name"];
$shout=$_POST["shout"];
$email=$_POST["email"];
$ins_shout = array(
'name'=>$name,
'shout'=>$shout,
'email'=>$email
);
$this->db->insert('shouts',$ins_shout);
}

function edit($id){
  $shout = $this->input->post('shout');
	$email = $this->input->post('email');
	$data = array(
			'shout' => $shout,
			'email' => $email
			);
	$this->db->where('id',$id);
	$query = $this->db->update('shouts',$data);
	return $query;
}

function hapus($id)
{	
	$this->db->where('id',$id);
	$query = $this->db->delete('shouts');
	return $query;
}

function GetId($id){
$this->db->where('id',$id);
$shouts = $this->db->get('shouts');
return $shouts;
}


}
?>