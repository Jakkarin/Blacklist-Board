<?php

/**
* เพิ่มระบบ cache ที่สามารถกำหนดได้ว่าจะเก็บอะไรบ้างไว้ใน cache
*/
class BL_Output extends CI_Output
{

	public function cache_remember($name, $time, $func, $custom_path = null)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');
		$cache_path = str_replace('/', '\\', ($path === '') ? APPPATH.'cache/'.$custom_path : $path.$custom_path);
		$name = md5($name);
		$time = time() + ($time * 60);
		if ( ! file_exists($cache_path.$name)) {
			if ( ! is_dir($cache_path)) {
				mkdir($cache_path, 0777, true);
			}
			if ( ! $fp = @fopen($cache_path.$name, 'w+b')) {
				log_message('error', 'Unable to write cache file: '.$cache_path.$name);
				return;
			}
			if (flock($fp, LOCK_EX)) {
				$data = call_user_func($func);
				// ^w^ -.- ^0^
				$Data_NanoDesu = array(
					'expire'	=> $time,
					'data'		=> $data
				);
				$cache_data = serialize($Data_NanoDesu);
				fwrite($fp, $cache_data);
				flock($fp, LOCK_UN);
			} else {
				log_message('error', 'Unable to secure a file lock for file at: '.$cache_path.$name);
				return;
			}
			fclose($fp);
		} else {
			if ($fop = file_get_contents($cache_path.$name)) {
				// ^w^ -.- ^0^
				$Data_NanoDesu = unserialize($fop);
				if ($Data_NanoDesu['expire'] <= time()) {
					@unlink($cache_path.$name);
					log_message('debug', 'Cache file has expired. File deleted.');
				}
			} else {
				log_message('error', 'Unable to read cache file: '.$cache_path.$name);
				return;
			}
		}
		// return ค่า นะจ๊ะ ^w^ -.- ^0^
		return $Data_NanoDesu['data'];
	}

	public function forget($name, $custom_path = null)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');
		$cache_path = ($path === '') ? APPPATH.'cache/'.$custom_path : $path.$custom_path;
		if (is_dir($cache_path) || is_really_writable($cache_path)) {
			$name = md5($name);
			if (@unlink($cache_path.$name)) {
				return true;
			}
		}
		log_message('error', 'Unable to delete cache file for '.$uri);
		return false;
	}

}