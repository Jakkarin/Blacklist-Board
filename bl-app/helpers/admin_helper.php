<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('adminAsset'))
{
	/**
	 * adminAsset
	 *
	 * สร้าง link ไปยัง asset ของ admin
	 *
	 * @param	string	$uri
	 * @return	string
	 */
	function adminAsset($uri)
	{
		$_template = defined('ADMIN_TEMPLATES') ? ADMIN_TEMPLATES : 'default';
		return get_instance()->config->base_url('bl-app/views/'.$_template.'/'.$uri, NULL);
	}

	function is_post() {
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}
}