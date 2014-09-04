<?php

namespae atomita\codeigniter\controller;
use \MY_Controller;

/**
 * Resource Controller
 *
 * リソースコントローラ抽象クラス
 *
 * Laravelのリソース定義を参考
 * @see http://laravel4.kore1server.com/docs/controllers#resource-controllers
 * @author atomita
 */
abstract class Resource extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function _remap($method, $params = array()) {
		$method_org = $method;

		$http_method = strtoupper($this->input->server('REQUEST_METHOD'));

		switch ($http_method . '/' . $method) {
			case 'GET/index':
			case 'GET/create':
				break;
			case 'POST/index':
				$method	 = 'store';
				break;
			default:
				$arg_cnt = count($params);
				if (1 <= $arg_cnt and $params[0] === 'edit') {
					$method	 = 'edit';
					unset($params[0]);
					$params	 = array_merge(array($method_org), $params);
				}
				else {
					switch ($http_method) {
						case 'GET':
							$method	 = 'show';
							array_unshift($params, $method_org);
							break;
						case 'PUT':
						case 'PATCH':
							$method	 = 'update';
							array_unshift($params, $method_org);
							break;
						case 'DELETE':
							$method	 = 'destroy';
							array_unshift($params, $method_org);
							break;
						default:
							$method	 = null;
							break;
					}
				}
				break;
		}

		if ($method and method_exists($this, $method)) {
			return call_user_func_array(array($this, $method), $params);
		}
		else if (!in_array($method_org, array('index', 'create', 'store', 'show', 'update', 'destroy', 'missingMethod')) and
				method_exists($this, $method_org)) {
			return call_user_func_array(array($this, $method_org), $params);
		}
		else if (method_exists($this, 'missingMethod')) {
			return call_user_func(array($this, 'missingMethod'), $params);
		}

		show_404();
	}

}
