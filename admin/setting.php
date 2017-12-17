<?php
	require_once 'core/init.php';
	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'trang_thai')
			{
				$trang_thai = trim(addslashes(htmlspecialchars($_POST['trang_thai'])));
				$sql = "UPDATE website SET trang_thai = '$trang_thai'";
				$db->query($sql);
				$db->disconnect();
				echo "Lưu thành công";
				echo "<script>location.reload();</script>";
			}
			else if($action == 'thong_tin')
			{
				$tieu_de = trim(addslashes(htmlspecialchars($_POST['tieu_de'])));
				$mieu_ta = trim(addslashes(htmlspecialchars($_POST['mieu_ta'])));
				$tu_khoa = trim(addslashes(htmlspecialchars($_POST['tu_khoa'])));
				
				$sql = "UPDATE website SET tieu_de = '$tieu_de', mieu_ta = '$mieu_ta', tu_khoa = '$tu_khoa'";
				$db->query($sql);
				$db->disconnect();
				echo "Cập nhật thành công";
				echo "<script>location.reload();</script>";
			}
		}
		else
		{
			new redirect($_DOMAIN);
		}
	}
	else
	{
		new redirect($_DOMAIN);
	}
?>