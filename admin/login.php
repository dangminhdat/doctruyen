<?php
	require_once 'core/init.php';
	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		$username = trim(addslashes(htmlspecialchars($_POST['username'])));
		$password = trim(addslashes(htmlspecialchars($_POST['password'])));

		$show = "<script>$('#DangNhap .alert').removeClass('hidden');</script>";
		$hide = "<script>$('#DangNhap .alert').addClass('hidden');</script>";
		$success = "<script>$('#DangNhap .alert').attr('class','alert alert-success');</script>";

		if($username == '' || $password == '')
		{
			echo $show."vui lòng điền đầy đủ thông tin";
		}
		else
		{
			$sql = "SELECT * FROM taikhoan WHERE username = '$username'";
			if($db->num_rows($sql))
			{
				$password = md5($password);
				$sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
				if($db->num_rows($sql))
				{
					$session->set_session('datdoctruyen',$username);
					echo $success."Đăng nhập thành công";
					new redirect($_DOMAIN);
				}
				else
				{
					echo $show."Mật khẩu không chính xác";
				}
			}
			else
			{
				echo $show."Tên đăng nhập không đúng";
			}
		}
	}
?>