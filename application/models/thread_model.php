<?php
class model_thread extends CI_Model {
	public function load_thread($threadID){
		//read query where threadID should be same with threaID from DB
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