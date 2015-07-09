<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['asset']);
		$this->load->library('form_validation');
		$this->load->model('topic_model');
	}

	public function index()
	{
		$this->load->view('forum/add_topic');
	}

	public function create()
	{
		$data = $this->input->post();
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		if ($this->form_validation->run() === TRUE) {
			$this->topic_model->insert($data);
		} else {
			echo 'Haha!';
		}
	}
}
