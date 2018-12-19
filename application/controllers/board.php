<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class board extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
                $this->load->model('thread_model');
                $this->load->helper('url');
        }

	public function thread($id)
	{
		
		$threadData = $this->catalog_model->load_thread($threadID);
		$this->load->helper('form');
		$this->load->view('thread_view, $threadID');

	}
	public function newpost($threadID){
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'User');
    	$this->form_validation->set_rules('comment', 'Text', 'required');

    	if ($this->form_validation->run() === FALSE)
    	{
    	  
	    }
	    else
	    {	
	    	
	    	  $this->thread_model->set_news();
	    	  $this->load->view('success');
    	}
	}
	/*blic function __construct() {
		parent::__construct();
	}*/
}
?>