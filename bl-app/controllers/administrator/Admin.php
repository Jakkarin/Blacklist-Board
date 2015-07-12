<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->middleware('admin');
		$this->load->helper(['admin','url']);
	}

	public function index()
	{
		$this->load->view_admin('main');
	}

	public function dashboard()
	{
		$this->load->view_admin('dashboard');
	}

}
