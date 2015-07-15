<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_Test_Install {
	public function run()
	{
		$bl =& get_instance();
		$bl->load->dbforge();
		$bl->dbforge->add_field(array(
			'blog_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
				'blog_title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'blog_description' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
		));
		$bl->dbforge->add_key('blog_id', TRUE);
		return $bl->dbforge->create_table('test');
	}
}