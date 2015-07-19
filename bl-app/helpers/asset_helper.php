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

if ( ! function_exists('csrf_token'))
{
	function csrf_token()
	{
		return get_instance()->security->get_csrf_hash();
	}
}

if ( ! function_exists('csrf_token_name'))
{
	function csrf_token_name()
	{
		return get_instance()->security->get_csrf_token_name();
	}
}

if ( ! function_exists('import')) {
	function import($path) {
		$path = str_replace('/', '\\', $path);
		include VIEWPATH.$path;
	}
}

if ( ! function_exists('auth'))
{
	function auth()
	{
		return get_instance()->auth;
	}
}