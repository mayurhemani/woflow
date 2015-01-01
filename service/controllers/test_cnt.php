<?php

class test_cntl 
{
	public function __construct() {
	}

	// must be part of every controller
	public function call($args) {
		print "Default function called"; 
	}

	public function foo($args) {
		print "Foo function called";
	}
}

?>
