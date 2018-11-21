<?php
	if (!defined('BASEPATH'))
        exit('No direct script access allowed');
class catalog_model extends CI_Model {
	public function __construct()
        {
            parent::__construct();
        }
	public function get_threads() {
		//$query = $this->db->query("SELECT ID, name, comment, threadID FROM bboard WHERE ID = threadID");

		//return $query->result();
	}
}
?>