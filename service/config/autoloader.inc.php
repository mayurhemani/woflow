<?php

/**
* Core class dispatcher
*/
function autoload($className)
{
	$components = explode("_", $className);
	$len = count($components);
	if ($len > 0) {
		$suffix = $components[1];
		if ($suffix === "cntl") {
			include "controllers/$className.php";
		} 
	} else {
		// should not happen
	}
}


?>
