<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_Test_Install {
	public function run()
	{
		$bl =& get_instance();
		$bl->load->dbforge();
		return $this->dbforge->drop_table('test');
	}
}