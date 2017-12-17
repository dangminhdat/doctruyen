<?php
	require_once 'core/init.php';
	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'profile_tt')
			{
				$ten_hien_thi = trim(addslashes(htmlspecialchars($_POST['ten_hien_thi'])));
				$email = trim(addslashes(htmlspecialchars($_POST['email'])));
				
				$show = "<script>$('#Profile .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#Profile .alert').addClass('hidden');</script>";
				$success = "<script>$('#Profile .alert').attr('class','alert alert-success');</script>";
				
				if($ten_hien_thi == '' || $email == '')
				{
					echo $show."Vui lòng điền đầy đủ thông tin";
				}
				else
				{
					if(!filter_var($email,FILTER_VALIDATE_EMAIL))
					{
						echo $show."Email chưa đúng định dạng";
					}
					else
					{
						$sql = "UPDATE taikhoan SET ten_hien_thi = '$ten_hien_thi', email = '$email'";
						$db->query($sql);
						$db->disconnect();
						echo $success."Lưu thành công";
						echo "<script>location.reload();</script>";
					}
				}
			}
			else if($action == 'profile_pass')
			{
				$pass_change = trim(addslashes(htmlspecialchars($_POST['pass_change'])));
				$pass_change_new = trim(addslashes(htmlspecialchars($_POST['pass_change_new'])));
				$pass_change_re = trim(addslashes(htmlspecialchars($_POST['pass_change_re'])));
				
				$show = "<script>$('#Password .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#Password .alert').addClass('hidden');</script>";
				$success = "<script>$('#Password .alert').attr('class','alert alert-success');</script>";
				
				if($pass_change == '' || $pass_change_new == '' || $pass_change_re == '')
				{
					echo $show."Vui lòng điền đầy đủ thông tin";
				}
				else
				{
					if($data_user['password'] != md5($pass_change))
					{
						echo $show."Mật khẩu cũ chưa chính xác";
					}
					else if(strlen($pass_change_new) < 8)
					{
						echo $show."Mật khẩu mới phải lớn hơn 8 ký tự";
					}
					else if(preg_match('#\W#',$pass_change_new))
					{
						echo $show."Mật khẩu mới không có ký hiệu đặc biệt";
					}
					else if($pass_change_new != $pass_change_re)
					{
						echo $show."Mật khẩu mới nhập lại không khớp";
					}
					else
					{
						$pass_change_new = md5($pass_change_new);
						$sql = "UPDATE taikhoan SET password = '$pass_change_new'";
						$db->query($sql);
						$db->disconnect();
						echo $success."Đổi mật khẩu thành công";
						echo "<script>location.href= '".$_DOMAIN."profile';</script>";
					}
				}
			}
			else if($action == 'upload_profile')
			{
				if(isset($_FILES['name_img']))
				{
					$folder = '../upload/';
					$name_txt = $_FILES['name_img']['name'];
					$tmp_txt = $_FILES['name_img']['tmp_name'];

					$day = substr($date_current,8,2);
					$month = substr($date_current,5,2);
					$year = substr($date_current,0,4);

					if(!is_dir($folder.$year))
					{
						mkdir($folder.$year.'/');
					}
					else if(!is_dir($folder.$year.'/'.$month))
					{
						mkdir($folder.$year.'/'.$month.'/');
					}
					else if(!is_dir($folder.$year.'/'.$month.'/'.$day))
					{
						mkdir($folder.$year.'/'.$month.'/'.$day.'/');
					}
					$path = $folder.$year.'/'.$month.'/'.$day.'/'.$name_txt;
					@move_uploaded_file($tmp_txt,$path);

					$url = substr($path,3);
					$sql = "UPDATE taikhoan SET anh_dai_dien = '$url' WHERE id_tk = '$data_user[id_tk]'";
					$db->query($sql);
					$db->disconnect();
					echo "Thay đổi thành công";
					echo "<script>location.reload();</script>";
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