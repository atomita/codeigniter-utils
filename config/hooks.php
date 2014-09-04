<?php

if (!is_array($hook)){
	$hook = array();
}
if (!is_array($hook['pre_system'])){
	$hook['pre_system'] = array();
}


$hook['pre_system'][] = array(
	'function'	 => 'atomita\\codeigniter\\autoload',
	'filename'	 => 'functions.php',
	'filepath'	 => 'vendor/atomita/codeigniter-utils/src/',
);
