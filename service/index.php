<?php
include "config/autoloader.inc.php";
include "core/dispatcher.php";
include "auth/auth.php";

if (auth::authorize($_SESSION)) {

	$disp = new dispatcher_t();

	if (isset($_GET['qargs'])) {
		$disp->dispatch($_GET['qargs'], array());
	} else {
		$disp->dispatch($_POST['qargs'], $_POST);
	}
}

?>
