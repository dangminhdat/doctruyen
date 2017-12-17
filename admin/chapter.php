<?php
	require_once 'core/init.php';

	if($user)
	{
		if(isset($_POST['action']))
		{
			$action = trim(addslashes(htmlspecialchars($_POST['action'])));
			if($action == 'add_chapter')
			{
				$trang_thai = trim(addslashes(htmlspecialchars($_POST['trang_thai'])));
				$id_chapter = trim(addslashes(htmlspecialchars($_POST['id_chapter'])));
				$ten_chapter = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_chapter']))));
				$ten_truyentranh = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_truyentranh']))));		
				$r = new redirect();
				$slug_truyentranh = $r->slug($ten_truyentranh);
				$noidung = '';
				if(isset($_FILES['name_img']))
				{
					foreach ($_FILES['name_img']['name'] as $key => $value) {
						$folder = "../upload/";
						$name_txt = $_FILES['name_img']['name'][$key];
						$tmp_txt = $_FILES['name_img']['tmp_name'][$key];
						if(!is_dir($folder.$slug_truyentranh))
						{
							mkdir($folder.$slug_truyentranh.'/');
						}
						else if(!is_dir($folder.$slug_truyentranh.'/'.$id_chapter))
						{
							mkdir($folder.$slug_truyentranh.'/'.$id_chapter.'/');
						}
						$path = $folder.$slug_truyentranh.'/'.$id_chapter.'/'.$name_txt;
						@move_uploaded_file($tmp_txt,$path);

						$url = substr($path,3);
						$noidung .= $url.',';
					}
					$noidung = trim($noidung,',');

					$sql = "INSERT INTO chuong VALUES('','$id_chapter','$ten_chapter','$ten_truyentranh','$noidung','$trang_thai','0','$date_current')";
					$db->query($sql);
					$db->disconnect();
					echo "Thêm thành công";
					echo "<script>location.href='".$_DOMAIN."chapter'</script>";
				}
                                else
				{
					$link_hinh_anh = $r->changelink($_POST['link_hinh_anh']);
					$sql = "INSERT INTO chuong VALUES('','$id_chapter','$ten_chapter','$ten_truyentranh','$link_hinh_anh','$trang_thai','0','$date_current')";
					$db->query($sql);
					$db->disconnect();
					echo "Thêm thành công";
					echo "<script>location.href='".$_DOMAIN."chapter'</script>";
				}
			}
			else if($action == 'edit_chapter')
			{
				$id_c = trim(addslashes(htmlspecialchars($_POST['id_c'])));
				$trang_thai = trim(addslashes(htmlspecialchars($_POST['trang_thai'])));
				$id_chapter = trim(addslashes(htmlspecialchars($_POST['id_chapter'])));
				$ten_chapter = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_chapter']))));
				$ten_truyentranh = ucwords(trim(addslashes(htmlspecialchars($_POST['ten_truyentranh']))));
            	
            	$r = new redirect();
				$link_hinh_anh = $r->changelink($_POST['link_hinh_anh']);

				$show = "<script>$('#EditChapter .alert').removeClass('hidden');</script>";
				$hide = "<script>$('#EditChapter .alert').addClass('hidden');</script>";
				$success = "<script>$('#EditChapter .alert').attr('class','alert alert-success');</script>";

				if($id_chapter == '' || $ten_chapter == '')
				{
					echo $show."vui lòng điền đầy đủ thông tin";
				}
				else
				{
					if($link_hinh_anh == '')
					{
						$sql = "UPDATE chuong SET chapter = '$id_chapter', trang_thai = '$trang_thai', ten_chap = '$ten_chapter', ten_truyen_tranh = '$ten_truyentranh' WHERE id_c = '$id_c'";
					}
					else
					{
						$sql = "UPDATE chuong SET chapter = '$id_chapter', trang_thai = '$trang_thai', ten_chap = '$ten_chapter', ten_truyen_tranh = '$ten_truyentranh', noi_dung = '$link_hinh_anh' WHERE id_c = '$id_c'";
					}	
					$db->query($sql);
					$db->disconnect();

					echo $success."Cập nhật thành công";
					new redirect($_DOMAIN.'chapter');
				}
			}
			else if($action == 'search_chapter')
			{
				$search = trim(addslashes(htmlspecialchars($_POST['search'])));
				$sql = "SELECT * FROM chuong WHERE ten_truyen_tranh LIKE '%$search%' ORDER BY id_c DESC";
				if($db->num_rows($sql))
				{
					echo 
						'
						<p id="show_tim">
							<div class="table-responsive list">
								<table class="table table-striped">
									<thead>
										<tr>
											<th><input type="checkbox"></th>
											<th>ID</th>
											<th>ID chapter</th>
											<th>Tên chapter</th>
											<th>Tên truyện tranh</th>
											<th>Trạng thái</th>
											<th>Tổng chap</th>
											<th>Lượt xem</th>
											<th>Tools</th>
										</tr>
									</thead>
									<tbody>
										
						';
						
					foreach ($db->fetch_assoc($sql,0) as $key => $value) {
						$sql = "SELECT MAX(chapter) AS max FROM chuong WHERE ten_truyen_tranh = '$value[ten_truyen_tranh]'";
						$max_chapter = $db->fetch_assoc($sql,1);
						if($value['trang_thai'] == 0)
						{
							$stt = '<span class="label label-success">Xuất bản</span>';
						}
						else
						{
							$stt = '<span class="label label-warning">Ẩn</span>';
						}
						echo '	<tr>
									<td><input type="checkbox" data-id="'.$value['id_c'].'"</td>
									<td>'.$value['id_c'].'</td>
									<td>'.$value['chapter'].'</td>
									<td><a href="chapter/edit/'.$value['id_c'].'">'.$value['ten_chap'].'</a></td>
									<td><strong>'.$value['ten_truyen_tranh'].'</strong></td>
									<td>'.$stt.'</td>
									<td>'.$max_chapter['max'].'</td>
									<td>'.$value['luot_xem'].'</td>
									<td>
										<a href="chapter/edit/'.$value['id_c'].'" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
										<a class="btn btn-danger btn-sm del_chapter" data-id="'.$value['id_c'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>	
									</td>
								</tr>';
						}				
						
						echo '		</tbody>
								</table>
							</div>	
						</p>
						'
						;
				}
			}
			else if($action == 'del_list_chapter')
			{
				foreach ($_POST['id_c'] as $key => $value) {
					$sql = "SELECT * FROM chuong WHERE id_c = '$value'";
					if($db->num_rows($sql))
					{
                                                $data = $db->fetch_assoc($sql,1);
						$array = explode(',',$data['noi_dung']);
						foreach ($array as $keyC => $valueC) {
							if(file_exists('../'.$valueC))
							{
								unlink('../'.$valueC);
							}
						}
						$sql_del_list = "DELETE FROM chuong WHERE id_c = '$value'";
						$db->query($sql_del_list);
					}
				}
				$db->disconnect();
				echo "Xóa thành công";
			}
			else if($action == 'del_chapter')
			{
				$id_c = trim(addslashes(htmlspecialchars($_POST['id_c'])));	
				$sql = "SELECT * FROM chuong WHERE id_c = '$id_c'";
				if($db->num_rows($sql))
				{
                                                $data = $db->fetch_assoc($sql,1);
						$array = explode(',',$data['noi_dung']);
						foreach ($array as $keyC => $valueC) {
							if(file_exists('../'.$valueC))
							{
								unlink('../'.$valueC);
							}
						}
					$sql_del_list = "DELETE FROM chuong WHERE id_c = '$id_c'";
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