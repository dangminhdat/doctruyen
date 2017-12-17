<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		// if($data_user['quyen'] == 1)
		// {
			echo "<h3>Thông tin tài khoản</h3>";
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
				if($ac == 'avatar')
				{
					echo '
						<a href="profile" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> Trở về
						</a>';
					echo 
					'
						<div class="panel panel-default" style="margin-top: 20px">
							<div class="panel-heading">
								<h4 class="panel-title">Upload ảnh đại diện</h4>
							</div>
							<div class="panel-body">
								<p><label>Ảnh hiện tại</label></p>
					';
					if(@$data_user['anh_dai_dien'] != '')
					{
						echo '<img src="'.str_replace('admin/','',$_DOMAIN).@$data_user['anh_dai_dien'].'" style="width: 100px; height: 100px; margin-bottom: 20px;">';
					}
					else
					{
						echo '<img src="images/1.png" style="width: 100px; height: 100px; margin-bottom: 20px;">';
					}
					echo '
							<div class="alert alert-info">Vui lòng chọn file ảnh có đuôi .jpg, .png, .gif và có dung lượng dưới 5MB.</div>
								<form action="'.$_DOMAIN.'profile.php" method="POST" onsubmit="return false" id="AnhDaiDien" enctype="multipart/form-data">
									<div class="form-group">
										<label>Chọn ảnh</label>
										<input type="file" accept="image/*" id="name_img" name="name_img" onchange="pre_img()">
									</div>
									<div class="form-group pre_img hidden">
										<p><label>Ảnh xem trước</label></p>
									</div>
									<div class="form-group">
										<button class="btn btn-primary" type="submit">Thay đổi</button>
									</div>
									<div class="alert alert-danger hidden"></div>
								</form>
							</div>
						</div>
					'
					;	
				}
				else if($ac == 'password')
				{
					echo '
						<a href="profile" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> Trở về
						</a>';
					echo 
					'
						<p class="form-password">
							<form method="POST" onsubmit="return false" id="Password">
								<div class="form-group">
									<label>Mật khẩu cũ</label>
									<input type="password" class="form-control" placeholder="Mật khẩu cũ" id="pass_change">
								</div>
								<div class="form-group">
									<label>Mật khẩu mới</label>
									<input type="password" class="form-control" placeholder="Mật khẩu mới" id="pass_change_new">
								</div>
								<div class="form-group">
									<label>Nhập lại mật khẩu mới</label>
									<input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" id="pass_change_re">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Đổi mật khẩu</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</p>
					'
					;	
				}
				else
				{
					new redirect($_DOMAIN.'profile');
				}
			}
			else
			{
				echo 
				'
					<a href="profile/avatar" class="btn btn-info">
						<span class="glyphicon glyphicon-leaf"></span> Avatar
					</a>
					<a href="profile/password" class="btn btn-danger">
						<span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu
					</a>
				';
				
				echo 
				'
					<div class="panel panel-default" style="margin-top: 20px">
						<div class="panel-heading">
							<h4 class="panel-title">Cập nhật thông tin</h4>
						</div>
						<div class="panel-body">
							<form method="POST" onsubmit="return false" id="Profile">
								<div class="form-group">
									<label>Tên hiển thị (*)</label>
									<input type="text" id="ten_hien_thi" class="form-control" placeholder="Tên hiển thị.." value="'.@$data_user['ten_hien_thi'].'">
								</div>
								<div class="form-group">
									<label>Email (*)</label>
									<input type="text" id="email" placeholder="Email.." class="form-control" value="'.@$data_user['email'].'">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Lưu</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</div>
					</div>
				';
			}
		// }
		// else
		// {
		// 	echo "<div style='margin-top: 10px' class='alert alert-danger'>Bạn không đủ quyền truy cập</div>";
		// }
	}
	else
	{
		new redirect($_DOMAIN);
	}

?>