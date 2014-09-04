<?php

if (false){

	/**
	 * atomita_codeigniter_controller_Resource
	 *
	 * @author atomita
	 */
	class atomita_codeigniter_controller_Resource extends MY_Controller
	{
		function _remap($method, $params = array()){}
	}

}
else{
	$ds = DIRECTORY_SEPARATOR;
	$file = implode($ds, explode("{$ds}legacy{$ds}", __FILE__));

	$definition = ltrim(file_get_contents($file), '<?php');

	eval(str_replace(
		array(
			'namespace atomita\\codeigniter\\controller;',
			'use \\MY_Controller;',
			'class Resource',
		),
		array(
			'',
			'',
			'class atomita_codeigniter_controller_Resource',
		),
		$definition));
}
