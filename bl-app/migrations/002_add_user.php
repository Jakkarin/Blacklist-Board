<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'avatar' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'passwd' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'TIMESTAMP',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user');
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}

}