<?php
	require_once 'core/init.php';

	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'add_truyentranh')
			{
				$trang_thai = trim(addslashes(htmlspecialchars($_POST['trang_thai'])));
				$ten_truyentranh = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_truyentranh']))));
				$slug_truyentranh = trim(addslashes(htmlspecialchars($_POST['slug_truyentranh'])));
				$tac_gia = ucwords(trim(addslashes(htmlspecialchars($_POST['tac_gia']))));
				$hoa_si = ucfirst(trim(addslashes(htmlspecialchars($_POST['hoa_si']))));
				$ten_khac = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_khac']))));
				$theloai = '';
				foreach ($_POST['the_loai'] as $key => $value) {
					$theloai .= $value.', '; 
				}
				$theloai = trim($theloai,', ');
				$mieu_ta = trim(addslashes(htmlspecialchars($_POST['mieu_ta'])));
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
					if(!is_dir($folder.$year.'/'.$month))
					{
						mkdir($folder.$year.'/'.$month.'/');
					}
					if(!is_dir($folder.$year.'/'.$month.'/'.$day))
					{
						mkdir($folder.$year.'/'.$month.'/'.$day.'/');
					}
					$path = $folder.$year.'/'.$month.'/'.$day.'/'.$name_txt;
					@move_uploaded_file($tmp_txt,$path);

					$url = substr($path,3);

					$sql = "INSERT INTO truyentranh VALUES('','$ten_truyentranh','$slug_truyentranh','$tac_gia','$hoa_si','$ten_khac','$mieu_ta','$theloai','$trang_thai','0','$url','$date_current')";
					$db->query($sql);
					$db->disconnect();
					echo "<script>$('#AddTruyenTranh .alert').attr('class','alert alert-success');</script>Thêm thành công";
					new redirect($_DOMAIN.'truyentranh');
				}
			}
			else if($action == 'edit_truyentranh')
			{
				$id_tt = trim(addslashes(htmlspecialchars($_POST['id_tt'])));
				$trang_thai = trim(addslashes(htmlspecialchars($_POST['trang_thai'])));
				$ten_truyentranh = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_truyentranh']))));
				$slug_truyentranh = trim(addslashes(htmlspecialchars($_POST['slug_truyentranh'])));
				$tac_gia = ucwords(trim(addslashes(htmlspecialchars($_POST['tac_gia']))));
				$hoa_si = ucfirst(trim(addslashes(htmlspecialchars($_POST['hoa_si']))));
				$ten_khac = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_khac']))));
				$theloai = '';
				foreach ($_POST['the_loai'] as $key => $value) {
					$theloai .= $value.', '; 
				}
				$theloai = trim($theloai,', ');
				$mieu_ta = trim(addslashes(htmlspecialchars($_POST['mieu_ta'])));
				$hinh_dai_dien = trim(addslashes(htmlspecialchars($_POST['hinh_dai_dien'])));
				if(isset($_FILES['edit_name_img']))
				{
					$folder = '../upload/';
					$name_txt = $_FILES['edit_name_img']['name'];
					$tmp_txt = $_FILES['edit_name_img']['tmp_name'];

					$day = substr($date_current,8,2);
					$month = substr($date_current,5,2);
					$year = substr($date_current,0,4);

					if(!is_dir($folder.$year))
					{
						mkdir($folder.$year.'/');
					}
					if(!is_dir($folder.$year.'/'.$month))
					{
						mkdir($folder.$year.'/'.$month.'/');
					}
					if(!is_dir($folder.$year.'/'.$month.'/'.$day))
					{
						mkdir($folder.$year.'/'.$month.'/'.$day.'/');
					}
					$path = $folder.$year.'/'.$month.'/'.$day.'/'.$name_txt;
					@move_uploaded_file($tmp_txt,$path);

					$url = substr($path,3);
				}
				else
				{
					$url = $hinh_dai_dien;
				}

				$sql = "UPDATE truyentranh SET ten_truyen_tranh = '$ten_truyentranh', slug = '$slug_truyentranh', tac_gia = '$tac_gia', hoa_si = '$hoa_si', ten_khac = '$ten_khac',mieu_ta = '$mieu_ta', the_loai = '$theloai', hinh_dai_dien = '$url', trang_thai = '$trang_thai' WHERE id_tt = '$id_tt'";
				$db->query($sql);
				$db->disconnect();
				echo "<script>$('#EditTruyenTranh .alert').attr('class','alert alert-success');</script>Cập nhật thành công";
				new redirect($_DOMAIN.'truyentranh');
			}
			else if($action == 'del_list_truyentranh')
			{
				foreach ($_POST['id_tt'] as $key => $value) {
					$sql = "SELECT * FROM truyentranh WHERE id_tt = '$value'";
					if($db->num_rows($sql))
					{
                                                $data = $db->fetch_assoc($sql,1);
						if(file_exists('../'.$data['hinh_dai_dien']))
						{
							unlink('../'.$data['hinh_dai_dien']);
						}
						$sql_del = "DELETE FROM truyentranh WHERE id_tt = '$value'";
						$db->query($sql_del);
					}
				}
				$db->disconnect();
				echo "Xóa thành công";
			}
			else if($action == 'del_truyentranh')
			{
				$id_tt = trim(addslashes(htmlspecialchars($_POST['id_tt'])));
				$sql = "SELECT * FROM truyentranh WHERE id_tt = '$id_tt'";
				if($db->num_rows($sql))
				{
                                        $data = $db->fetch_assoc($sql,1);
					if(file_exists('../'.$data['hinh_dai_dien']))
					{
						unlink('../'.$data['hinh_dai_dien']);
					}
					$sql_del = "DELETE FROM truyentranh WHERE id_tt = '$id_tt'";
					$db->query($sql_del);
					$db->disconnect();
					echo "Xóa thành công";
				}
			}
		}
		else
		{
			new redirect($_DOMAIN.'truyentranh');
		}
	}
	else
	{
		new redirect($_DOMAIN.'truyentranh');
	}
?>