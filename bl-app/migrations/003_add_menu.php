<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_menu extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => 8,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'sub' => array(
				'type' => 'MEDIUMINT',
				'constraint' => 8,
				'unsigned' => TRUE
			),
			'icon' => array(
				'type' => 'VARCHAR',
				'constraint' => 12
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 60
			),
			'link' => array(
				'type' => 'VARCHAR',
				'constraint' => 255
			),
			'target' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => TRUE
			),
			'type' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => TRUE
			),
			'order' => array(
				'type' => 'TINYINT',
				'constraint' => 3,
				'unsigned' => TRUE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('menu');
	}

	public function down()
	{
		$this->dbforge->drop_table('menu');
	}

}