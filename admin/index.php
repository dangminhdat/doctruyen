<?php

	require_once 'core/init.php';

	require_once 'includes/header.php';
	

	if($user)
	{
		require_once 'templates/sidebar.php';
	}
	else
	{
		require_once 'templates/login.php';
	}	
	require_once 'includes/footer.php';
?>