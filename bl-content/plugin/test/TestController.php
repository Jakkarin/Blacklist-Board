<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_TestController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->auth = $this->user_model->verify();
		$this->load->plugin('model:test','test');
		$this->load->helper(['plugin','asset','widget','url']);
	}

	public function index() {
		echo 'index นะจ๊ะ';
	}

	public function show($args) {
		$this->load->plugin('view:test','test');
	}

	public function Hi($args) {
		echo 'Hi!'.$args['0'];
	}

}