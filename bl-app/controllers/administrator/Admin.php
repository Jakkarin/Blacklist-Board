<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->middleware('admin');
		$this->load->helper('admin');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view_admin('main');
	}

	protected function rr()
	{
		echo 'test';
	}

}
