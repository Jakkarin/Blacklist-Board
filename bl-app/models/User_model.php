<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $table = 'user';
	protected $table2 = 'role_user';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function show($id)
	{
		$this->load->database();
		return $this->db->get_where($this->table, array('id' => $id), 1, 0);
	}

	public function insert($data)
	{
		$this->load->database();
		$this->db->insert($this->table2, $data);
	}

	public function check($email, $passwd) {
		$this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->database();
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('email', $email);
		$q = $this->db->get()->result()['0'];
		if (password_verify($passwd, $q->passwd)) {
			$this->output->forget('user.'.$q->id, 'users/');
			$q->login_token = random_string('alnum', 16);
			$this->db->update($this->table, array('login_token' => $q->login_token), array('id' => $q->id));
			$this->session->set_userdata('login', $this->encrypt->encode(serialize($q)));
			return true;
		}
		return false;
	}

	public function verify() {
		if ($this->session->has_userdata('login')) {
			$this->load->library('encrypt');
			$data = $this->session->userdata('login');
			$login = unserialize($this->encrypt->decode($data));
			$time = $this->config->item('cache_time');
			$user_cache = $this->output->cache_remember('user.'.$login->id, $time, function() use ($login) {
				$this->load->database();
				$data = $this->db->get_where($this->table, array('id' => $login->id), 1, 0)->result()['0'];
				return $this->encrypt->encode(serialize($data));
			}, 'users/');
			$user = unserialize($this->encrypt->decode($user_cache));
			if ($user->login_token === $login->login_token) {
				return $login;
			}
		}
		return false;
	}

}