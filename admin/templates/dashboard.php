<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
?>
<h3>Truyện tranh</h3>
<div class="row">
	<div class="col-md-4">
	<?php
		$tong_truyen_tranh = "SELECT * FROM truyentranh";
		$tong = $db->num_rows($tong_truyen_tranh);
		echo 
			'<div class="alert alert-success">
				<h1>'.$tong.'</h1>
				<p>Tổng truyện tranh</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_truyen_tranh_full = "SELECT * FROM truyentranh WHERE trang_thai = 1";
		$tong_full = $db->num_rows($tong_truyen_tranh_full);
		echo 
			'<div class="alert alert-warning">
				<h1>'.$tong_full.'</h1>
				<p>Tổng truyện tranh full</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_truyen_tranh_more = "SELECT * FROM truyentranh WHERE trang_thai = 0";
		$tong_more= $db->num_rows($tong_truyen_tranh_more);
		echo 
			'<div class="alert alert-danger">
				<h1>'.$tong_more.'</h1>
				<p>Tổng truyện tranh còn tiếp</p>		
			</div>';
	?>
	</div>
</div>

<h3>Chapter</h3>
<div class="row">
	<div class="col-md-4">
	<?php
		$tong_chapter = "SELECT * FROM chuong";
		$tong_chapter = $db->num_rows($tong_chapter);
		echo 
			'<div class="alert alert-success">
				<h1>'.$tong_chapter.'</h1>
				<p>Tổng truyện đã có</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_chapter_xuatban = "SELECT * FROM chuong WHERE trang_thai = 0";
		$tong_chapter_xuatban = $db->num_rows($tong_chapter_xuatban);
		echo 
			'<div class="alert alert-warning">
				<h1>'.$tong_chapter_xuatban.'</h1>
				<p>Tổng chapter xuất bản</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_chapter_an = "SELECT * FROM chuong WHERE trang_thai = 1";
		$tong_chapter_an = $db->num_rows($tong_chapter_an);
		echo 
			'<div class="alert alert-danger">
				<h1>'.$tong_chapter_an.'</h1>
				<p>Tổng chapter ẩn</p>		
			</div>';
	?>
	</div>
</div>
	<?php
		if(@$data_user['quyen'] == 1)
		{
	?>	

<h3>Thể loại</h3>
<div class="row">
	<div class="col-md-4">
	<?php
		$tong_theloai = "SELECT * FROM theloai";
		$tong_theloai = $db->num_rows($tong_theloai);
		echo 
			'<div class="alert alert-success">
				<h1>'.$tong_theloai.'</h1>
				<p>Tổng thể loại</p>		
			</div>';
	?>
	</div>
</div>

<h3>Tài khoản</h3>
<div class="row">
	<div class="col-md-4">
	<?php
		$tong_taikhoan = "SELECT * FROM taikhoan";
		$tong_taikhoan = $db->num_rows($tong_taikhoan);
		echo 
			'<div class="alert alert-success">
				<h1>'.$tong_taikhoan.'</h1>
				<p>Tổng tài khoản</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_taikhoan_hoatdong = "SELECT * FROM taikhoan WHERE trang_thai = 0";
		$tong_taikhoan_hoatdong = $db->num_rows($tong_taikhoan_hoatdong);
		echo 
			'<div class="alert alert-warning">
				<h1>'.$tong_taikhoan_hoatdong.'</h1>
				<p>Tài khoản hoạt động</p>		
			</div>';
	?>
	</div>
	<div class="col-md-4">
	<?php
		$tong_taikhoan_khoa = "SELECT * FROM taikhoan WHERE trang_thai = 1";
		$tong_taikhoan_khoa = $db->num_rows($tong_taikhoan_khoa);
		echo 
			'<div class="alert alert-danger">
				<h1>'.$tong_taikhoan_khoa.'</h1>
				<p>Tài khoản bị khóa</p>		
			</div>';
	?>
	</div>
</div>

<?php
		}
	}
	else
	{
		new redirect($_DOMAIN);
	}
?>