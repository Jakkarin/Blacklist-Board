<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BL_loader extends CI_Loader {

	// --------------------------------------------------------------------

	/**
	 * Model plugin Loader
	 *
	 * Loads and instantiates models.
	 *
	 * @param	string	$plugin		plugin name
	 * @param	string	$model		Model name
	 * @param	string	$name		An optional object name to assign to
	 * @param	bool	$db_conn	An optional database connection configuration to initialize
	 * @return	object
	 */
	public function plugin($action, $arg=null, $name = '', $db_conn = FALSE)
	{
		$action = explode(':', $action);
		switch ($action['0']) {
			case 'model':
				if (empty($arg))	{
					return $this;
				} elseif (is_array($arg))	{
					foreach ($arg as $key => $value) {
						is_int($key) ? $this->model($value, '', $db_conn) : $this->model($key, $value, $db_conn);
					}
					return $this;
				}

				if (empty($name)) {
					$name = $arg;
				}

				if (in_array($name, $this->_ci_models, TRUE)) {
					return $this;
				}

				$CI =& get_instance();
				if (isset($CI->$name)) {
					show_error('The model name you are loading is the name of a resource that is already being used: '.$name);
				}

				if ($db_conn !== FALSE && ! class_exists('CI_DB', FALSE)) {
					if ($db_conn === TRUE) {
						$db_conn = '';
					}
					$this->database($db_conn, FALSE, TRUE);
				}

				if ( ! class_exists('CI_Model', FALSE)) {
					load_class('Model', 'core');
				}

				$arg = ucfirst(strtolower($arg));
				$_path = CONTENT_PATH.'plugin/'.$action['1'].'/'.$arg.'Model.php';
				if (file_exists($_path)) {
					require_once($_path);
				}

				$model_name = 'Plugin_'.$arg.'Model';
				$this->_ci_models[] = $name;
				$CI->$name = new $model_name();
				return $this;

				// couldn't find the model
				show_error('Unable to locate the model you have specified: '.$arg);
				break;
			
			case 'view':
				return $this->_ci_load(array('_ci_plugin' => $action['1'], '_ci_view' => $arg, '_ci_vars' => $this->_ci_object_to_array([]), '_ci_return' => FALSE));
				break;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * View Admin Loader
	 *
	 * Loads "view" files.
	 *
	 * @param	string	$view	View name
	 * @param	array	$vars	An associative array of data
	 *				to be extracted for use in the view
	 * @param	bool	$return	Whether to return the view output
	 *				or leave it to the Output class
	 * @return	object|string
	 */
	public function view_admin($view, $vars = array(), $return = FALSE)
	{
		return $this->_ci_load(array('_ci_admin' => TRUE, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}

	/**
	* method สำหรับนำเข้าไฟล์ middleware แล้วทำการประมวลผล
	* @param string filename
	* @return error page
	*/
	public function middleware($_name)
	{
		$_name = ucfirst($_name).'Middleware';
		$_path = APPPATH.'middleware\\'.$_name.'.php';
		if (file_exists($_path)) {
			require_once($_path);
			$obj = new $_name;
			if ($obj->run(true)) {
				return true;
			}
		}
		return show_error('Unable to load the middleware file: '.$_name);
		exit(0);
	}

	/**
	* method สำหรับนำเข้าไฟล์ widget แล้วทำการประมวลผล
	* @param string filename
	* @param array
	* @return string
	*/
	public function widget($name,$array=null) {
		$_name = ucfirst($name).'Widget';
		$_path = APPPATH.'widgets\\'.$_name.'.php';
		if (file_exists($_path)) {
			require_once($_path);
			$obj = new $_name;
			if (is_null($array)) {
				return $obj->run();
			} else {
				return $obj->run($array);
			}
		}
		return 'Unable to load the widget : '.$_name;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Internal CI Data Loader
	 *
	 * Used to load views and files.
	 *
	 * Variables are prefixed with _ci_ to avoid symbol collision with
	 * variables made available to view files.
	 *
	 * @used-by	CI_Loader::view()
	 * @used-by	CI_Loader::file()
	 * @param	array	$_ci_data	Data to load
	 * @return	object
	 */
	protected function _ci_load($_ci_data)
	{
		// Set the default data variables
		foreach (array('_ci_admin', '_ci_view', '_ci_plugin', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val)
		{
			$$_ci_val = isset($_ci_data[$_ci_val]) ? $_ci_data[$_ci_val] : FALSE;
		}

		$file_exists = FALSE;

		// Set the path to the requested file
		if (is_string($_ci_path) && $_ci_path !== '')
		{
			$_ci_x = explode('/', $_ci_path);
			$_ci_file = end($_ci_x);
		}
		else
		{
			$_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
			$_ci_file = ($_ci_ext === '') ? $_ci_view.'.php' : $_ci_view;

			if ($_ci_admin === TRUE) {
				$_template = defined('ADMIN_TEMPLATES') ? ADMIN_TEMPLATES : 'default';
				$this->_ci_view_paths = array(
					APPPATH.'views\\'.$_template.DIRECTORY_SEPARATOR => TRUE
					);
			} elseif ($_ci_plugin !== FALSE) {
				$_ci_file = $_ci_view.'View.php';
				$this->_ci_view_paths = array(
					CONTENT_PATH.'plugin\\'.$_ci_plugin.DIRECTORY_SEPARATOR => TRUE
					);
			} else {
				$this->_ci_view_paths = array(VIEWPATH => TRUE);
			}

			foreach ($this->_ci_view_paths as $_ci_view_file => $cascade)
			{
				if (file_exists($_ci_view_file.$_ci_file))
				{
					$_ci_path = $_ci_view_file.$_ci_file;
					$file_exists = TRUE;
					break;
				}

				if ( ! $cascade)
				{
					break;
				}
			}
		}

		if ( ! $file_exists && ! file_exists($_ci_path))
		{
			show_error('Unable to load the requested file: '.$_ci_file);
		}

		// This allows anything loaded using $this->load (views, files, etc.)
		// to become accessible from within the Controller and Model functions.
		$_ci_CI =& get_instance();
		foreach (get_object_vars($_ci_CI) as $_ci_key => $_ci_var)
		{
			if ( ! isset($this->$_ci_key))
			{
				$this->$_ci_key =& $_ci_CI->$_ci_key;
			}
		}

		/*
		 * Extract and cache variables
		 *
		 * You can either set variables using the dedicated $this->load->vars()
		 * function or via the second parameter of this function. We'll merge
		 * the two types and cache them so that views that are embedded within
		 * other views can have access to these variables.
		 */
		if (is_array($_ci_vars))
		{
			$this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $_ci_vars);
		}
		extract($this->_ci_cached_vars);

		/*
		 * Buffer the output
		 *
		 * We buffer the output for two reasons:
		 * 1. Speed. You get a significant speed boost.
		 * 2. So that the final rendered template can be post-processed by
		 *	the output class. Why do we need post processing? For one thing,
		 *	in order to show the elapsed page load time. Unless we can
		 *	intercept the content right before it's sent to the browser and
		 *	then stop the timer it won't be accurate.
		 */
		ob_start();

		// If the PHP installation does not support short tags we'll
		// do a little string replacement, changing the short tags
		// to standard PHP echo statements.
		if ( ! is_php('5.4') && ! ini_get('short_open_tag') && config_item('rewrite_short_tags') === TRUE && function_usable('eval'))
		{
			echo eval('?>'.preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($_ci_path))));
		}
		else
		{
			include($_ci_path); // include() vs include_once() allows for multiple views with the same name
		}

		log_message('info', 'File loaded: '.$_ci_path);

		// Return the file data if requested
		if ($_ci_return === TRUE)
		{
			$buffer = ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}

		/*
		 * Flush the buffer... or buff the flusher?
		 *
		 * In order to permit views to be nested within
		 * other views, we need to flush the content back out whenever
		 * we are beyond the first level of output buffering so that
		 * it can be seen and included properly by the first included
		 * template and any subsequent ones. Oy!
		 */
		if (ob_get_level() > $this->_ci_ob_level + 1)
		{
			ob_end_flush();
		}
		else
		{
			$_ci_CI->output->append_output(ob_get_contents());
			@ob_end_clean();
		}

		return $this;
	}

}