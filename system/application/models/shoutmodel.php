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
}
?>