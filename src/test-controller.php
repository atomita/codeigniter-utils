<?php

/**
 * TestController
 */
class TestController extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->initTest();
	}

	public function _output($output) {
		echo $this->unit->report();
	}

}
