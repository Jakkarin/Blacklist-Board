<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('asset');
		$this->load->helper('widget');
	}

	public function index()
	{
		$this->load->view('main');
	}
}
