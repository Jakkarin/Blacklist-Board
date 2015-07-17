<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['asset','widget','url']);
		$this->load->library('session');
		$this->load->model('user_model');
		$this->auth = $this->user_model->verify();
	}

	public function index()
	{
		$this->load->view('main');
	}
}
