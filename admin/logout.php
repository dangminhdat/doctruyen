<?php
	require_once 'core/init.php';

	$session->destroy();

	new redirect($_DOMAIN);
?>