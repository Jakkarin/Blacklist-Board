<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuWidget
{
	public function run() {
		$bl =& get_instance();
		$bl->load->model('menu_model');
		$data = $bl->menu_model->all();
		$a1 = [];
		$a2 = [];
		$a3 = [];
		$c2 = [];
		$c3 = [];
		foreach ($data as $k => $v) {
			if ($v->type == 0) {
				$a1[] = (array) $v;
			} elseif ($v->type == 1) {
				$a2[] = (array) $v;
				$c2[] = $v->sub;
			} elseif ($v->type == 2) {
				$a3[] = (array) $v;
				$c3[] = $v->sub;
			}
		}
		$bl->load->view('widgets/menu', compact('a1','a2','a3','c2','c3'));
	}
}