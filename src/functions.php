<?php

namespace atomita\codeigniter;

function autoload()
{
	$ds = DIRECTORY_SEPARATOR;
	require dirname(__FILE__) . "{$ds}..{$ds}..{$ds}..{$ds}autoload.php";
}
