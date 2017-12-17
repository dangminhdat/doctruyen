<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		if($data_user['quyen'] == 1)
		{
			echo "<h3>Tài khoản</h3>";
			if(isset($_GET['ac']))
			{
				$ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
			}
			else
			{
				$ac = '';
			}

			if($ac != '')
			{
				if($ac == 'add')
				{
					echo '
						<a href="taikhoan" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> Trở về
						</a>';
					echo 
					'
						<p class="form-add-taikhoan">
							<form method="POST" onsubmit="return false" id="AddTaiKhoan">
								<div class="form-group">
									<label>Tên đăng nhập</label>
									<input type="text" class="form-control" placeholder="Tên đăng nhập" id="user">
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" class="form-control" placeholder="Mật khẩu" id="pass">
								</div>
								<div class="form-group">
									<label>Nhập lại mật khẩu</label>
									<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="re_pass">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Thêm</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</p>
					'
					;	
				}
				else
				{
					new redirect($_DOMAIN.'taikhoan');
				}
			}
			else
			{
				echo 
				'
					<a href="taikhoan/add" class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Thêm
					</a>
					<a href="taikhoan" class="btn btn-default">
						<span class="glyphicon glyphicon-repeat"></span> Reload
					</a>
					<a class="btn btn-warning" id="lock_list_taikhoan">
						<span class="glyphicon glyphicon-lock"></span> Khóa
					</a>
					<a class="btn btn-success" id="unlock_list_taikhoan">
						<span class="glyphicon glyphicon-unlock"></span> Mở khóa
					</a>
					<a class="btn btn-danger" id="del_list_taikhoan">
						<span class="glyphicon glyphicon-trash"></span> Xóa
					</a>	
				';
				echo 
				'
				<p>
					<div class="table-responsive list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox"></th>
									<th>ID</th>
									<th>Username</th>
									<th>Tên hiển thị</th>
									<th>Quyền</th>
									<th>Trạng thái</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>
								
				';
				$sql = "SELECT * FROM taikhoan ORDER BY id_tk DESC";
				if($db->num_rows($sql))
				{
					$taikhoan = $db->fetch_assoc($sql,0);
					foreach ($taikhoan as $key => $value) {
						if($value['quyen'] == 1)
						{
							$quyen = '<span class="label label-success">ADMIN</span>';
						}
						else
						{
							$quyen = '<span class="label label-danger">Tác giả</span>';
						}
						if($value['trang_thai'] == 0)
						{
							$trang_thai = '<span class="label label-success">Hoạt động</span>';
						}
						else
						{
							$trang_thai = '<span class="label label-warning">Khóa</span>';
						}
						echo '	<tr>
									<td><input type="checkbox" data-id="'.$value['id_tk'].'"</td>
									<td>'.$value['id_tk'].'</td>
									<td>'.$value['username'].'</td>
									<td>'.$value['ten_hien_thi'].'</td>
									<td>'.$quyen.'</td>
									<td>'.$trang_thai.'</td>
									<td>
										<a class="btn btn-warning btn-sm lock_taikhoan" data-id="'.$value['id_tk'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>
										<a class="btn btn-success btn-sm unlock_taikhoan" data-id="'.$value['id_tk'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>
										<a class="btn btn-danger btn-sm del_taikhoan" data-id="'.$value['id_tk'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>	
									</td>
								</tr>';
						}	
				}				
				
				echo '		</tbody>
						</table>
					</div>	
				</p>
				'
				;
			}
		}
		else
		{
			echo "<div style='margin-top: 10px' class='alert alert-danger'>Bạn không đủ quyền truy cập</div>";
		}
	}
	else
	{
		new redirect($_DOMAIN);
	}

?>