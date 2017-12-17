<?php
	require_once 'core/init.php';

	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'add_taikhoan')
			{
				$user = trim(addslashes(htmlspecialchars($_POST['user'])));
				$pass = trim(addslashes(htmlspecialchars($_POST['pass'])));
				$re_pass = trim(addslashes(htmlspecialchars($_POST['re_pass'])));
				
				$show = "<script>$('#AddTaiKhoan .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#AddTaiKhoan .alert').addClass('hidden');</script>";
				$success = "<script>$('#AddTaiKhoan .alert').attr('class','alert alert-success');</script>";
				
				if($user == '' || $pass == '' || $re_pass == '')
				{
					echo $show."Vui lòng điền đầy đủ thông tin";
				}
				else
				{
					$sql = "SELECT * FROM taikhoan WHERE username = '$user'";
					if(!$db->num_rows($sql))
					{
						if(strlen($user) < 5 || strlen($user) > 32)
						{
							echo $show."Tên đăng nhập có độ dài từ 5 đến 32 ký tự";
						}
						else if(preg_match('#\W\S#',$user))
						{
							echo $show."Tên đăng nhập không có ký tự đặc biệt và khoảng trắng";
						}
						else if(strlen($pass) < 8)
						{
							echo $show."Mật khẩu phải có độ dài lớn hơn 8";
						}
						else if($pass != $re_pass)
						{
							echo $show."Mật khẩu nhập lại không khớp";
						}
						else
						{
							$pass = md5($pass);
							$sql = "INSERT INTO taikhoan VALUES('','$user','$pass','','','','0','1','$date_current')";
							$db->query($sql);
							$db->disconnect();
							echo $success."Thêm thành công";
							new redirect($_DOMAIN.'taikhoan');
						}
					}
					else
					{
						echo $show."Tên đăng nhập đã tồn tại";
					}
				}
			}
			else if($action == 'del_list_taikhoan')
			{
				foreach ($_POST['id_tk'] as $key => $value) {
					$sql = "SELECT * FROM taikhoan WHERE id_tk = '$value'";
					if($db->num_rows($sql))
					{
						$sql_del = "DELETE FROM taikhoan WHERE id_tk = '$value' AND quyen != '1'";
						$db->query($sql_del);
					}
				}
				$db->disconnect();
			}
			else if($action == 'lock_list_taikhoan')
			{
				foreach ($_POST['id_tk'] as $key => $value) {
					$sql = "SELECT * FROM taikhoan WHERE id_tk = '$value'";
					if($db->num_rows($sql))
					{
						$sql_del = "UPDATE taikhoan SET trang_thai = 1 WHERE id_tk = '$value' AND quyen != '1'";
						$db->query($sql_del);
					}
				}
				$db->disconnect();
			}
			else if($action == 'unlock_list_taikhoan')
			{
				foreach ($_POST['id_tk'] as $key => $value) {
					$sql = "SELECT * FROM taikhoan WHERE id_tk = '$value'";
					if($db->num_rows($sql))
					{
						$sql_del = "UPDATE taikhoan SET trang_thai = 0 WHERE id_tk = '$value' AND quyen != '1'";
						$db->query($sql_del);
					}
				}
				$db->disconnect();
			}
			else if($action == 'del_taikhoan')
			{
				$id_tk = trim(addslashes(htmlspecialchars($_POST['id_tk'])));
				$sql = "SELECT * FROM taikhoan WHERE id_tk = '$id_tk'";
				if($db->num_rows($sql))
				{
					$sql_del = "DELETE FROM taikhoan WHERE id_tk = '$id_tk' AND quyen != '1'";
					$db->query($sql_del);
					$db->disconnect();
				}
			}
			else if($action == 'lock_taikhoan')
			{
				$id_tk = trim(addslashes(htmlspecialchars($_POST['id_tk'])));
				$sql = "SELECT * FROM taikhoan WHERE id_tk = '$id_tk'";
				if($db->num_rows($sql))
				{
					$sql_del = "UPDATE taikhoan SET trang_thai = 1 WHERE id_tk = '$id_tk' AND quyen != '1'";
					$db->query($sql_del);
					$db->disconnect();
				}
			}
			else if($action == 'unlock_taikhoan')
			{
				$id_tk = trim(addslashes(htmlspecialchars($_POST['id_tk'])));
				$sql = "SELECT * FROM taikhoan WHERE id_tk = '$id_tk'";
				if($db->num_rows($sql))
				{
					$sql_del = "UPDATE taikhoan SET trang_thai = 0 WHERE id_tk = '$id_tk' AND quyen != '1'";
					$db->query($sql_del);
					$db->disconnect();
				}
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