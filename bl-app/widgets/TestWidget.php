<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestWidget
{
	public function run() {
		$bl =& get_instance();
		$bl->load->view('widgets/test');
	}
}