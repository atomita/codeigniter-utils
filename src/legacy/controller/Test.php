<?php

if (false){

	/**
	* atomita_codeigniter_controller_Test
	*
	* @author atomita
	*/
	class atomita_codeigniter_controller_Test extends MY_Controller
	{
		function __construct(){}
		function _output($output){}
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
			'class Test',
		),
		array(
			'',
			'',
			'class atomita_codeigniter_controller_Test',
		),
		$definition));
}
