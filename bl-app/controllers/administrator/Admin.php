<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('middleware');
		$this->middleware->next('admin');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('admin');
		$this->load->view_admin('main');
	}

}
