<?php
class model_thread extends CI_Model {
	
	public function set_post($threadID){
    $this->load->helper('url');
    
    $data = array(
        'name' => $this->input->post('title'),,
        'comment' => $this->input->post('text')
    );

    return $this->db->insert('bboard', $data);
	}
}
?>