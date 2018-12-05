<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class board extends CI_Controller {

	public function thread($threadID)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('thread_model');
		$threadData = $this->Thread_model->load_thread($threadID);

	}

	/*blic function __construct() {
		parent::__construct();
	}*/
}
?>