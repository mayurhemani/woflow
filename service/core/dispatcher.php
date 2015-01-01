<?php

class dispatcher_t
{
	public function __construct() 
	{
		$this->_controller = "error_cntl";
		$this->_method = "call";
		$this->_args = array();
	}

	private function parseRequest($req, $furtherArgs)
	{
		$components = explode("/", $req);
		$len = count($components);

		if ($len > 0) {
			$this->_controller = $components[0]."_cntl";
		}
		if ($len > 1) {
			$this->_method = $components[1];
		}
		if ($len > 2) {
			for ($i = 2; $i < $len; $i += 2) {
				$this->_args[$components[$i]] = $components[$i+1];
			}
		}
	}

	public function dispatch($request, $furtherArgs)
	{
		// parse request
		$this->parseRequest($request, $furtherArgs);

		
		try {
			// construct controller
			$controller = new $this->_controller();
			
			// call the method
			call_user_func_array(array($controller, $this->_method), $this->_args);

		} catch (Exception $e) {
			// if there is an error, then we will handle it through the exception handler
		   	// of the error controller	
			$err = new error_cntl();
			$err->handleException($e);
		}
	}


	private $_controller;
	private $_method;
	private $_args;
}

?>
