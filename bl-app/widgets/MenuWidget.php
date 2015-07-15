<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuWidget
{
	public function run() {
		$bl =& get_instance();
		$time = $bl->config->item('cache_time');
		$data = $bl->output->cache_remember('widget.menu', $time, function() use ($bl) {
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
			return compact('a1','a2','a3','c2','c3');
		});
		$bl->load->view('widgets/menu', $data);
	}
}