<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	/**
	* id		- primary key (int)
	* sub		- submenu (int)
	* icon		- icon (string)
	* name		- menu name (string)
	* link		- link for menu (string)
	* target	- _parent and _blank (int)
	* type		- top menu or sub menu (int)
	*/
	protected $table = 'menu';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function all()
	{
		$this->db->order_by('order', 'ASC');
		return $this->db->get($this->table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, array('id' => $id), 1)->result()['0'];
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($id,$data)
	{
		$this->db->update($this->table, $data, array('id' => $id));
	}

	public function delete($id)
	{
		$this->db->delete($this->table, array('id' => $id));
	}

}