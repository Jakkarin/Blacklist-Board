<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class AdminMiddleware
{
	public function run($next) {
		$bl =& get_instance();
		$bl->load->library('session');
		if ($bl->session->has_userdata('login')) {
			$bl->load->library('encrypt');
			$data = $bl->session->userdata('login');
			$login = unserialize($bl->encrypt->decode($data));
			if ($login->role === '1') {
				return $next;
			}
		}
		return show_404();
	}
}