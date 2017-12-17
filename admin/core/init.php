<?php
	define('DAT_DANG',true);

	require_once 'classes/database.php';
	require_once 'classes/session.php';
	require_once 'classes/function.php';

	$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

	$db = new database();
	$db->connect();
	$db->set_charset('utf8');

	$session = new session();
	$session->start();

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date_current = date('Y:m:d h:i:s a');

	if(@$session->get_session('datdoctruyen'))
	{
		$user = $session->get_session('datdoctruyen');
	}	
	else
	{
		$user = '';
	}

	if(@$user)
	{
		$sql = "SELECT * FROM taikhoan WHERE username = '$user'";
		if($db->num_rows($sql))
		{
			$data_user = $db->fetch_assoc($sql,1);
		}
	}
?>