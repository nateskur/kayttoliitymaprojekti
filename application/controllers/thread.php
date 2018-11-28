<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class thread extends CI_Controller {

	public function view_thread($threadID)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('thread_view');
	}

	public function __construct() {
		parent::__construct();
	}
	
	public function file_view(){
		$this->load->view('thread_view', array('error' => ' ' ));
	}
	
	public function do_upload(){
		$config = array(
			'upload_path' => "./img/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' =>  md5($this->session->userdata('sposti')),
			'overwrite' => TRUE,
			'max_size' => "10240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "",
			'max_width' => "",	
		);
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload())
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$data = array(
					'image' => $file_name
			);
			
			//$this->db->where('ID', );
			$this->db->update('bboard',$data);
			print_r($this->upload->data());
			redirect('');
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
		//	$this->load->template('members');
		}
	}
}
?>