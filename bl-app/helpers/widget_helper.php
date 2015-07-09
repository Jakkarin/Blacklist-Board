<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('widget'))
{
	/**
	 * widget
	 *
	 * สร้าง widget
	 *
	 * @param	string
	 * @return	array
	 */
	function widget($name,$param=null)
	{
		return get_instance()->load->widget($name,$param);
	}
}