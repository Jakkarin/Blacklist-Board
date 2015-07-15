<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('pluginAsset'))
{
	/**
	 * Plugin Asset
	 *
	 * สร้าง link ไปยัง asset ของ plugin
	 *
	 * @param	string	$uri
	 * @return	string
	 */
	function pluginAsset($uri)
	{
		$uri = explode(':', $uri);
		return get_instance()->config->base_url('bl-content/plugin/'.$uri['0'].'/'.$uri['1'], NULL);
	}

}
