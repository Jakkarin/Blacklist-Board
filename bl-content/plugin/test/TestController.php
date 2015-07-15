<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_TestController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->plugin('model:test','test');
		$this->load->helper(['plugin','asset','widget']);
	}

	public function index($method, $args=null)
	{
		switch ($method) {
			case 'show':
				$this->show($args);
				break;

			default:
				return show_404();
				break;
		}
	}

	public function show($args) {
		$this->load->plugin('view:test','test');
	}

}