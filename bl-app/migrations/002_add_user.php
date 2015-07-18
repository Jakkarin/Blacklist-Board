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
			'role' => array(
				'type' => 'SMALLINT',
				'constraint' => 5,
				'unsigned' => TRUE,
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
			'login_token' => array(
				'type' => 'VARCHAR',
				'constraint' => '16',
			),
			'created_at' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'updated_at' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user');
		$this->load->database();
		$this->db->insert('user', array(
			'role'			=> 1,
			'username'		=> 'admin',
			'email'			=> 'admin@admin.com',
			'passwd'		=> password_hash('admin', PASSWORD_BCRYPT),
			'created_at'	=> time()
		));
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'uid' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'passwd2' => array(
				'type' => 'VARCHAR',
				'constraint' => '60'
			),
			'login_token' => array(
				'type' => 'VARCHAR',
				'constraint' => '16'
			),
			'updated_at' => array(
				'type' => 'INT',
				'constraint' => 11
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user_secure');
		$this->db->insert('user_secure', array(
			'uid'			=> 1,
			'passwd2'		=> password_hash(hash('sha512', 'admin'), PASSWORD_BCRYPT),
			'updated_at'	=> time()
		));
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}

}