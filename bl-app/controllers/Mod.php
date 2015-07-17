<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function plugin($controller=null, $method=null)
	{
		$controller_name = ucfirst(strtolower($controller));
		$_path = CONTENT_PATH.'plugin/'.$controller.'/';
		$_name = $controller_name.'Controller.php';
		if ( ! file_exists($_path.'down') && file_exists($_path.$_name)) {
			require $_path.$_name;
			$class_name = 'Plugin_'.$controller_name.'Controller';
			$method = is_null($method) ? 'index' : $method ;
			$run = new $class_name;
			$args = func_get_args();
			unset($args['0'],$args['1']);
			$run->$method(array_values($args));
			return TRUE;
		}
		return show_404();
		exit;
	}

}
