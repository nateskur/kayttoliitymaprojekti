<?php
	if (!defined('BASEPATH'))
        exit('No direct script access allowed');
class catalog_model extends CI_Model {
	public function __construct()
        {
                $this->load->database();
        }
	public function get_threads() {
		$query = $this->db->query("SELECT * FROM bboard");

		return $query->result();
	}
	public function load_thread($id){
		//read query where threadID should be same with threaID from DB
		$query = $this->db->query("SELECT ID, name, comment, threadID FROM bboard WHERE threadID =".$threadID);
		foreach ($query->result() as $row){
			$data['id']	   = "$row->ID";
			$data['name'] = "$row->name";
			$data['comment'] = "$row->comment";
			$data['threadID'] = "$row->threadID";			
		}
		
		return $data;
	}
	public function add_thread()
	{

		$data = array(
			'name'     => $this->input->post('name'),
			'comment'  => $this->input->post('comment')
			);
			
		$this->db->insert('bboard', $data);
		$insert_id = $this->db->insert_id();
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
}
?>