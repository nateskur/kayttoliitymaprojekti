<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('catalog_view');
		//$this->load->model('catalog_model');
		$this->load->database();
		//$data = $this->catalog_model->get_threads();
	}
	public function thread($threadID)
	{
		
		$threadData = $this->Thread_model->load_thread($threadID);
		$this->load->helper('form');
		$this->load->view('thread_view, $threadID');

	}
}
?>