<?php

 
class logging_model extends Model {
   function selectAll(){
        return $this->db->get('log_ebook')->result();
    } 
}
?>