<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['asset','widget','url']);
		$this->load->model('user_model');
		$this->auth = $this->user_model->verify();
	}

	public function index()
	{
		if ($this->auth) {
			return redirect('');
		}
		return redirect('auth/login');
	}

	public function login()
	{
		if ($this->auth) {
			return redirect('');
			exit();
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $this->input->post();
			if ($this->user_model->check($data['email'], $data['login_token']) && ! empty($data['passwd'])) {
				return redirect('');
			}
			$this->session->set_flashdata('error', 'ไม่สามารถเข้าสู่ระบบได้เนื่องจาก email หรือ รหัสผ่านผิด');
			return redirect('auth/login');
		} else {
			$error = empty($this->session->flashdata('error')) ? null : $this->session->flashdata('error');
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);
			return $this->load->view('auth/login', compact('error', 'csrf'));
		}
	}

	public function logout() {
		$this->session->unset_userdata('login');
		return redirect('');
	}

}
