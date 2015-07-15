<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['asset','widget']);
	}

	public function index()
	{
		//$this->load->view('main');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}
}
