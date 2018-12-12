<?php
	if (!defined('BASEPATH'))
        exit('No direct script access allowed');
class catalog_model extends CI_Model {
	public function __construct()
        {
                $this->load->database();
        }
	public function get_threads() {
		//$query = $this->db->query("SELECT ID, name, comment, threadID FROM bboard WHERE ID = threadID");

		//return $query->result();
	}
	public function load_thread($threadID){
		//read query where threadID should be same with threaID from DB
		$query = $this->db->query("SELECT ID, name, comment, threadID FROM bboard WHERE threadID =".$threadID);
		foreach ($query->result() as $row){
			$data['id']	   = "$row->ID";
			$data['name'] = "$row->name";
			$data['comment'] = "$row->comment";			
		}
		
		return $data;
	}
}
?>