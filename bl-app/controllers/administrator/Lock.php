<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->middleware('admin');
		$this->load->helper(['admin','url']);
		$this->load->model('user_model');
		$this->auth = $this->user_model->verify();
	}

	public function index()
	{
		$this->load->library('session');
		if ( ! $this->session->has_userdata('panel')) {
			return $this->load->view_admin('lock');
		}
		//return redirect('administrator');
	}

	public function signin()
	{
		if (is_post()) {
			$this->load->library('session');
			$this->load->library('encrypt');
			$passwd = $this->input->post('login_token');
			$passwd2 = $this->user_model->getPasswd2($this->auth->id);
			if (password_verify($passwd, $passwd2->passwd2)) {
				$this->load->helper('string');
				$token = random_string('alnum', 16);
				$this->session->set_userdata('panel', $token);
				$this->user_model->setToken2($passwd2->id, $token);
				$this->output->forget('user_secure.'.$this->auth->id, 'users/');
				return true;
				exit;
			}
			return redirect('administrator/lock');
			exit;
		}
		return redirect('administrator/lock');
		exit;
	}

	public function signout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('panel');
		$this->output->forget('user_secure.'.$this->auth->id, 'users/');
		return redirect('administrator/lock');
	}

}
