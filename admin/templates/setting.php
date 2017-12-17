<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		if($data_user['quyen'] == 1)
		{
			echo "<h3>Cài đặt chung</h3>";
			echo
			'
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Trạng thái hoạt động</h4>
					</div>
					<div class="panel-body">
						<form method="post" onsubmit="return false" id="TrangThai">';
			$sql = "SELECT * FROM website";
			$data_web = $db->fetch_assoc($sql,1);
			if($data_web['trang_thai'] == 0)
			{
				echo 
				'
					<div class="radio">
						<label>
							<input type="radio" name="trang_thai" value="0" checked="checked"> Mở
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="trang_thai" value="1"> Đóng
						</label>
					</div>
				';
			}
			else
			{
				echo 
				'
					<div class="radio">
						<label>
							<input type="radio" name="trang_thai" value="0"> Mở
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="trang_thai" value="1" checked="checked"> Đóng
						</label>
					</div>
				';
			}
			echo '
							<div class="form-group">
								<button class="btn btn-primary">Lưu</button>
							</div>
							<div class="alert alert-danger hidden"></div>
						</form>
				</div>
			</div>
			';
			
			echo
			'
				<div class="panel panel-default" style="margin-top: 20px">
					<div class="panel-heading">
						<h4 class="panel-title">Thông tin website</h4>
					</div>
					<div class="panel-body">
						<form method="POST" onsubmit="return false" id="ThongTin">
							<div class="form-group">
								<label>Tiêu đề</label>
								<input type="text" id="tieu_de" class="form-control" placeholder="Tiêu đề.." value="'.$data_web['tieu_de'].'">
							</div>
							<div class="form-group">
								<label>Miêu tả</label>
								<textarea id="mieu_ta" placeholder="Miêu tả.." class="form-control">'.$data_web['mieu_ta'].'</textarea>
							</div>
							<div class="form-group">
								<label>Từ khóa</label>
								<input type="text" id="tu_khoa" class="form-control" placeholder="Từ khóa.." value="'.$data_web['tu_khoa'].'">
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