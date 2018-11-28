<?php
class model_thread extends CI_Model {
	public function load_thread($threadid){
		$query = $this->db->query("SELECT ID, name, comment FROM bboard WHERE threadID =".$threadID);
		foreach ($query->result() as $row){
			$data['id']	   = "$row->ID";
			$data['name'] = "$row->name";
			$data['comment'] = "$row->comment";			
		}
		return $data;
	}
}
?>