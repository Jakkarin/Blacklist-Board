<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class AdminMiddleware
{
	function __construct()
	{
		$CI =& get_instance();
		$CI->load->helper('url');
	}

	public function run($next) {
		if (1+1===2) {
			return $next;
		}
		return show_404();
		
	}
}