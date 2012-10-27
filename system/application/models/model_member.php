<?php
  class Model_member extends Model{
		function getAllmember(){
		$query = $this->db->get('membership');
		if ($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		}
	}
?>