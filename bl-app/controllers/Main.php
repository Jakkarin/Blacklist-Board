<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['asset','widget']);
	}

	public function index()
	{
		$this->load->view('main', compact('topic'));
	}
}
