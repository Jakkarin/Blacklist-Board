<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('asset'))
{
	/**
	 * asset
	 *
	 * สร้าง link ไปยัง asset ของ tempate
	 *
	 * @param	string	$uri
	 * @return	string
	 */
	function asset($uri)
	{
		return get_instance()->config->base_url('bl-content/templates/'.APP_TEMPLATE.'/'.$uri, NULL);
	}
}

if ( ! function_exists('import')) {
	function import($path) {
		$path = str_replace('/', '\\', $path);
		include VIEWPATH.$path;
	}
}