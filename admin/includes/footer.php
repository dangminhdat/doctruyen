<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<div class="footer">
	<div class="container">
		<div class="row">
			<p class="text-center">Copyright by admin</p>
		</div>
	</div>
</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/login.js"></script>
	<script src="js/truyentranh.js"></script>
	<script src="js/theloai.js"></script>
	<script src="js/taikhoan.js"></script>
	<script src="js/setting.js"></script>
	<script src="js/profile.js"></script>
	<script src="js/chapter.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
<?php
	if(isset($_GET['tab']))
	{
		$tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
	}
	else
	{
		$tab = '';
	}
	if($tab != '')
	{
		echo "<script>$('.bangdieukhien .list li:eq(1)').removeClass('active');</script>";
		if($tab == 'profile')
		{
			echo "<script>$('.bangdieukhien .list li:eq(2)').addClass('active')</script>";
		}
		else if($tab == 'chapter')
		{
			echo "<script>$('.bangdieukhien .list li:eq(3)').addClass('active')</script>";
		}
		else if($tab == 'truyentranh')
		{
			echo "<script>$('.bangdieukhien .list li:eq(4)').addClass('active')</script>";
		}
		else if($tab == 'theloai')
		{
			echo "<script>$('.bangdieukhien .list li:eq(5)').addClass('active')</script>";
		}
		else if($tab == 'taikhoan')
		{
			echo "<script>$('.bangdieukhien .list li:eq(6)').addClass('active')</script>";
		}
		else if($tab == 'setting')
		{
			echo "<script>$('.bangdieukhien .list li:eq(7)').addClass('active')</script>";
		}
	}
?>
</body>
</html>