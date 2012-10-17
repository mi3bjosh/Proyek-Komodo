<?php

/**
 * Description of Ebook
 *
 * @author DENY PRASETIA TW
 * http://denyprasetiatw.blogspot.com/
 * Created Jan 9, 2012 - 9:21:08 PM
 */
class Ebook extends Model {

    public function __construct() {
        parent::Model();
    }

    public function listEbook($page,$offset) {
        $data = $this->db->query("SELECT * FROM EBOOK WHERE STATUS='1' LIMIT ".$offset.",".$page."");
        return $data->result();
    }

    public function showEbook($input) {
        $data = $this->db->query("SELECT * FROM EBOOK WHERE IDEBOOK=$input AND STATUS='1'");
        return $data->result();
    }
    
}
?>
