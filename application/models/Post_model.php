<?php
class Model_post extends CI_Model {
	public function add_post()
	{
		$data = array(
			'name' 	   => $this->input->post('name'),
			'comment'  => $this->input->post('comment'),
			'threadID' => $this->input->post('threadID')
		);

		$this->db->insert('bboard', $data);
		if($this->db->affected_rows() == 0 ||$this->db->affected_rows() == 1)
		{
			return true;
		} else
		{
			return false;
		}
	}
	public function add_thread()
	{

		$data = array(
			'name' 		=> $this->input->post('name'),
			'comment'	=> $this->input->post('comment'),
			'threadID'	=> $this->input->post('threadID')
			);

		$this->db->insert('bboard', $data);
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