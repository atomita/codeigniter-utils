<?php

namespae atomita\codeigniter\controller;
use \MY_Controller;

/**
 * Test Controller
 */
class Test extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->initTest();
	}

	public function _output($output) {
		echo $this->unit->report();
	}

}
