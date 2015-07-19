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

			if (intval($this->session->userdata('p_login_attempt')['count']) >= 3) {
				if (intval($this->session->userdata('p_login_attempt')['time']) <= time()) {
					$this->session->unset_userdata('p_login_attempt');
				}
				echo 'wait';
				exit;
			}

			$attempt = array(
				'time' => time() + (15 * 60),
				'count' => $this->session->has_userdata('p_login_attempt') ? intval($this->session->userdata('p_login_attempt')['count']) + 1 : 1
			);
			$this->session->set_userdata('p_login_attempt', $attempt);

			$this->load->library('encrypt');
			$passwd = $this->input->post('login_token');
			$passwd2 = $this->user_model->getPasswd2($this->auth->id);
			if (password_verify($passwd, $passwd2->passwd2)) {
				$this->load->helper('string');
				$token = random_string('alnum', 16);
				$this->session->set_userdata('panel', $token);
				$this->user_model->setToken2($passwd2->id, $token);
				$this->output->forget('user_secure.'.$this->auth->id, 'users/');
				$this->session->unset_userdata('p_login_attempt');
				return true;
				exit;
			}
			echo 'wrong';
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
