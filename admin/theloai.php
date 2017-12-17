<?php
	require_once 'core/init.php';

	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'add_theloai')
			{
				$ten_theloai = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_theloai']))));
				$slug_theloai = trim(addslashes(htmlspecialchars($_POST['slug_theloai'])));

				$show = "<script>$('#AddTheLoai .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#AddTheLoai .alert').addClass('hidden');</script>";
				$success = "<script>$('#AddTheLoai .alert').attr('class','alert alert-success');</script>";

				if($ten_theloai == '' || $slug_theloai == '')
				{
					echo $show."vui lòng điền đầy đủ thông tin";
				}
				else
				{
					$sql = "SELECT * FROM theloai WHERE ten_chuyen_muc = '$ten_theloai'";
					if(!$db->num_rows($sql))
					{
						$sql = "INSERT INTO theloai VALUES('','$ten_theloai','$slug_theloai','$date_current')";
						$db->query($sql);
						$db->disconnect();

						echo $success."Thêm thành công";
						new redirect($_DOMAIN.'theloai');
					}
					else
					{
						echo $show."Tên thể loại đã tồn tại";
					}
				}
			}
			else if($action == 'edit_theloai')
			{
				$id_cm = trim(addslashes(htmlspecialchars($_POST['id_cm'])));
				$ten_theloai = ucfirst(trim(addslashes(htmlspecialchars($_POST['ten_theloai']))));
				$slug_theloai = trim(addslashes(htmlspecialchars($_POST['slug_theloai'])));

				$show = "<script>$('#EditTheLoai .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#EditTheLoai .alert').addClass('hidden');</script>";
				$success = "<script>$('#EditTheLoai .alert').attr('class','alert alert-success');</script>";

				if($ten_theloai == '' || $slug_theloai == '')
				{
					echo $show."vui lòng điền đầy đủ thông tin";
				}
				else
				{
					$sql = "SELECT * FROM theloai WHERE ten_chuyen_muc = '$ten_theloai' AND id_cm != '$id_cm'";
					if(!$db->num_rows($sql))
					{
						$sql = "UPDATE theloai SET ten_chuyen_muc = '$ten_theloai', slug = '$slug_theloai' WHERE id_cm = '$id_cm'";
						$db->query($sql);
						$db->disconnect();

						echo $success."Cập nhật thành công";
						new redirect($_DOMAIN.'theloai');
					}
					else
					{
						echo $show."Tên thể loại đã tồn tại";
					}
				}
			}
			else if($action == 'del_list_theloai')
			{
				foreach ($_POST['id_cm'] as $key => $value) {
					$sql = "SELECT * FROM theloai WHERE id_cm = '$value'";
					if($db->num_rows($sql))
					{
						$sql_del_list = "DELETE FROM theloai WHERE id_cm = '$value'";
						$db->query($sql_del_list);
					}
				}
				$db->disconnect();
				echo "Xóa thành công";
			}
			else if($action == 'del_theloai')
			{
				$id_cm = trim(addslashes(htmlspecialchars($_POST['id_cm'])));	
				$sql = "SELECT * FROM theloai WHERE id_cm = '$id_cm'";
				if($db->num_rows($sql))
				{
					$sql_del_list = "DELETE FROM theloai WHERE id_cm = '$id_cm'";
					$db->query($sql_del_list);
				}
				$db->disconnect();
				echo "Xóa thành công";
			}
		}
		else
		{
			new redirect($_DOMAIN);
		}
	}
?>