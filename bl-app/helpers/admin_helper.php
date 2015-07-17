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

}

if ( ! function_exists('csrf_token'))
{
	function csrf_token()
	{
		return get_instance()->security->get_csrf_hash();
	}
}

if ( ! function_exists('auth'))
{
	function auth()
	{
		return get_instance()->auth;
	}
}

if ( ! function_exists('csrf_token_name'))
{
	function csrf_token_name()
	{
		return get_instance()->security->get_csrf_token_name();
	}
}

if ( ! function_exists('import'))
{
	function import($path)
	{
		$template = defined('ADMIN_TEMPLATES') ? ADMIN_TEMPLATES : 'default';
		$path = str_replace('/', '\\', $path);
		include APPPATH.'views\\'.$template.'\\'.$path.'.php';
	}
}

if ( ! function_exists('is_post'))
{
	function is_post()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}
}