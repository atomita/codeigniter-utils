<?php

$ds = DIRECTORY_SEPARATOR;
$file = implode($ds, explode("{$ds}legacy{$ds}", __FILE__));

$definition = ltrim(file_get_contents($file), '<?php');

eval(str_replace(
	array(
		'namespace atomita\\codeigniter;',
		'{$ds}autoload.php";',
	),
	array(
		'',
		'{$ds}..{$ds}autoload.php";',
	),
	$definition));
