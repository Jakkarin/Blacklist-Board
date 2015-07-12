<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_topic extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'bid' => array(
				'type' => 'MEDIUMINT',
				'constraint' => 8,
				'unsigned' => TRUE
			),
			'uid' => array(
				'type' => 'MEDIUMINT',
				'constraint' => 8,
				'unsigned' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'content' => array(
				'type' => 'TEXT'
			),
			'views' => array(
				'type' => 'MEDIUMINT',
				'constraint' => 8,
				'unsigned' => TRUE
			),
			'created_at' => array(
				'type' => 'TIMESTAMP'
			),
			'updated_at' => array(
				'type' => 'TIMESTAMP'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('topic');
	}

	public function down()
	{
		$this->dbforge->drop_table('topic');
	}

}