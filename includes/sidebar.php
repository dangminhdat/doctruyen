<?php
	if(isset($_GET['chapter']))
	{
		if($chi_tiet)
		{
			require_once 'chitiet.php';
		}
		else
		{
			require_once '404.php';
		}
	}
	else if(isset($_GET['id_tt']))
	{
		if($danh_sach_chapter)
		{
			require_once 'thongtin.php';
		}
		else
		{
			require_once '404.php';
		}
	}
	else if(isset($_GET['id_cm']))
	{
		if($chuyenmuc)
		{
			require_once 'chuyenmuc.php';
		}
		else
		{
			require_once '404.php';
		}
	}
	else
	{
		require_once 'layout.php';
	}

	require_once 'layout-right.php';

?>