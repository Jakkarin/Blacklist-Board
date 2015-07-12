<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->middleware('admin');
		$this->load->helper('admin');
		$this->load->model('menu_model');
	}

	public function index()
	{
		
		$this->load->view_admin('menu/show');
	}

	public function lists()
	{
		$data = $this->menu_model->all();
		echo json_encode($data);
	}

	public function edit($action=null,$id=null)
	{
		if ($action === 'json') {
			$data = $this->menu_model->getById($id);
			echo json_encode($data);
		} elseif ($action === 'delete') {
			if (is_post()) {
				$this->menu_model->delete($this->input->post('id'));
			}
		} else {
			$this->load->view_admin('menu/edit');
		}
	}

	public function update($id) {
		if (is_post()) {
			$this->menu_model->update($id, $this->input->post());
		}
	}

	public function create()
	{
		if (is_post()) {
			$postData = $this->input->post();
			$this->menu_model->insert($postData);
		}
	}

}
