<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* สำหรับตรวจสอบข้อมูลกลางทาง
*/
class CI_Middleware
{
	/**
	* method สำหรับนำเข้าไฟล์ middleware แล้วทำการประมวลผล
	* @param string filename
	* @return error page
	*/
	public function next($_name) {
		$_name = ucfirst($_name).'Middleware';
		// นำเข้าไฟล์
		require_once(APPPATH.'middleware\\'.$_name.'.php');
		// ใช้งาน object
		$obj = new $_name;
		// check ค่าว่าจริงหรือไม่
		if ($obj->run(true)) {
			return true;
		}
		// ถ้าไม่จริง แสดง error 404
		return show_404();
	}
}