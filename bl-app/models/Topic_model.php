<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic_model extends CI_Model {

	public $bid;
	public $title;
	public $content;
	public $created_at;
	public $updated_at;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($n)
	{
		$this->db->select('title,content');
		$this->db->from('topics');
		$this->db->limit($n);
		$this->db->order_by('created_at', 'DESC');
		//$query = $this->db->query('SELECT title,content FROM '.DB_PREFIX.'topics LIMIT '.$n);
		//return $query->row_array();
		return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert('topics', $data);
	}

}