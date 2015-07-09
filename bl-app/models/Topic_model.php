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
		$query = $this->db->query('SELECT title,content FROM bl_topics LIMIT '.$n);
		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('topics', $data);
	}

}