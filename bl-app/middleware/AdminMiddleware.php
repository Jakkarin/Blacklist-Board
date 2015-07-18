<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class AdminMiddleware
{
	public function run($next) {
		$bl =& get_instance();
		$bl->load->library('session');
		if ($bl->session->has_userdata('login')) {
			$bl->load->helper('url');
			$bl->load->library('encrypt');
			$data = $bl->session->userdata('login');
			$login = unserialize($bl->encrypt->decode($data));
			if ($login->role === '1') {
				if ($bl->session->has_userdata('panel')) {
					$time = $bl->config->item('cache_time');
					$token = $bl->output->cache_remember('user_secure.'.$login->id, $time, function() use ($bl, $login) {
						$bl->load->database();
						$data = $bl->db->get_where('user_secure', array('id' => $login->id), 1, 0)->result()['0'];
						return $data->login_token;
					}, 'users/');
					if ($token === $bl->session->userdata('panel')) {
						return $next;
						exit;
					}
				} elseif (strpos(uri_string(), 'administrator/lock') === 0) {
					return $next;
					exit;
				}
				redirect('administrator/lock');
				exit;
			}
		}
		return show_404();
	}
}