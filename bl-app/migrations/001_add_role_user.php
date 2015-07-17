<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_role_user extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'SMALLINT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'role_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('role_user');
		$this->load->database();
		$arr = array(
			'0'	=> array(
				'role_name'	=> 'admin'
			),
			'1'	=> array(
				'role_name'	=> 'user'
			),
		);
		foreach ($arr as $value) {
			$this->db->insert('role_user', $value);
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('role_user');
	}

}