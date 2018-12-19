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
	public function thread($id)
	{
		
		$threadData = $this->catalog_model->load_thread($threadID);
		$this->load->helper('form');
		$this->load->view('thread_view, $threadID');

	}
	public function make_thread()
	{
		$this->load->model('catalog_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim');
		$this->form_validation->set_rules('comment', 'Comment', 'trim');
		
		if ($this->form_validation->run())
		{

				if($this->catalog_model->add_thread())
				{
					echo '<p id="message" style="text-align:center;color:green;font-size:2em;font-weight:bold;">Post added</p>';
					echo '<a role="button" id="backtoposting" href="..">Back</a>';
				}
					else
				{
					echo '<p id="message" style="text-align:center;color:red;font-size:2em;font-weight:bold;">Post was not added</p>';
					echo '<a role="button" id="backtoposting" href="..">Back</a>';
				}
		}
	}
}
?>