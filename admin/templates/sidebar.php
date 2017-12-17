<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
	<nav class="navbar navbar-default bangdieukhien">
		<!-- <div class="row"> -->
			<div class="noidung">	
				<div class="col-md-3 content">
					<ul class="list">
						<li class="list-group-item">
							<div class="media">
								<a class="media-left pull-left" href="">
								<?php
									if(@$data_user['anh_dai_dien'] != '')
									{
										echo '<img class="media-object" src="'.str_replace('admin/','',$_DOMAIN).$data_user['anh_dai_dien'].'" style="width: 80px; height: 80px" alt="Ảnh đại diện">';
									}
									else
									{
										echo '<img class="media-object" src="images/1.png" style="width: 80px; height: 80px" alt="Ảnh đại diện">';
									}
								?>
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?=@$data_user['ten_hien_thi']?></h4>
								<?php
									if(@$data_user['quyen'] == 1)
									{
										echo "<span class='label label-primary'>Quản trị viên</span>";
									}
									else
									{
										echo "<span class='label label-success'>Tác giả</span>";
									}
								?>	
								</div>
							</div>
						</li>
						<li class="list-group-item active"><a href=""><span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển</a></li>
						<li class="list-group-item"><a href="profile"><span class="glyphicon glyphicon-user"></span> Hồ sơ cá nhân</a></li>
						<li class="list-group-item"><a href="chapter"><span class="glyphicon glyphicon-hd-video"></span> Chapter</a></li>
						<li class="list-group-item"><a href="truyentranh"><span class="glyphicon glyphicon-list"></span> Truyện tranh</a></li>
						<?php
							if(@$data_user['quyen'] == 1)
							{
						?>
						<li class="list-group-item"><a href="theloai"><span class="glyphicon glyphicon-list-alt"></span> Thể loại</a></li>
						<li class="list-group-item"><a href="taikhoan"><span class="glyphicon glyphicon-cog"></span> Tài khoản</a></li>
						<li class="list-group-item"><a href="setting"><span class="glyphicon glyphicon-cog"></span> Cài đặt chung</a></li>
						<?php
							}
						?>
						<li class="list-group-item"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>	
					</ul>
				</div>
				<div class="col-md-9 sidebar">
<?php
	if(isset($_GET['tab']))
	{
		$tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
	}
	else
	{
		$tab = '';
	}

	if($tab == 'profile')
	{
		require_once 'templates/profile.php';
	}
	else if($tab == 'chapter')
	{
		require_once 'templates/chapter.php';
	}
	else if($tab == 'truyentranh')
	{
		require_once 'templates/truyentranh.php';
	}
	else if($tab == 'theloai')
	{
		require_once 'templates/theloai.php';
	}
	else if($tab == 'taikhoan')
	{
		require_once 'templates/taikhoan.php';
	}
	else if($tab == 'setting')
	{
		require_once 'templates/setting.php';
	}
	else
	{
		require_once 'templates/dashboard.php';
	}
?>	
				</div>
			<!-- </div> -->
		</div>
	</nav>			