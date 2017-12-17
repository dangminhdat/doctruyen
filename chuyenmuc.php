<?php
session_start();
require_once 'controller/c_truyen_tranh.php';
$c_truyen_tranh = new C_truyen_tranh();
$the_loai = $c_truyen_tranh->the_loai();
$tieu_de = $c_truyen_tranh->tieu_de();

$chi_tiet_chuyen_muc = $c_truyen_tranh->chi_tiet_chuyen_muc();
$chuyenmuc = $chi_tiet_chuyen_muc['the_loai'];
$trang = $chi_tiet_chuyen_muc['trang'];

$truyen_toptuan = $c_truyen_tranh->truyen_toptuan();
$truyen_topthang = $c_truyen_tranh->truyen_topthang();

$truyen_vua_doc = $c_truyen_tranh->truyen_vua_doc($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="public/jquery.min.js"></script>
    <script src="public/asset/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/script.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/asset/jquery.bxslider.min.css">
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
		
		<div class="scrolltop">
			<div class="glyphicon glyphicon-arrow-up"></div>
		</div> <!-- hết scrollTop -->		

	    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
	    	<div class="container">
	    		<div class="row">
	    			<div class="navbar-header">
	    				<a class="navbar-brand" href="trang-chu"><b><i>Online</i></b></a>
	    				<button type="button" class="btn btn-primary navbar-toggle" data-toggle="collapse" data-target="#menu1"> &#9776;</button>
	    			</div>
	    			
	    			<div class="collapse navbar-collapse" id="menu1">	
		    			<ul class="nav navbar-nav">
		    				<li class="dropdown theloai">
		    					<a class="dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span> Thể Loại<span class="caret"></span></a>
		    					<ul class="dropdown-menu">
		    						<div class="col-xs-4">
		    						<?php
		    							$count = ceil(count($the_loai)/3);
		    							$i = 1;
		    							foreach ($the_loai as $key => $value) {
		    								if($i==$count)
		    								{
		    									$i=1;
		    						?>	
		    							<li><a href="chuyenmuc.php?id_cm=<?=$value['slug']?>"><?=$value['ten_chuyen_muc']?></a></li>
		    						</div>
		    						<div class="col-xs-4">		
		    						<?php
		    								}
		    								else
		    								{
		    						?>
		    							<li><a href="chuyenmuc.php?id_cm=<?=$value['slug']?>"><?=$value['ten_chuyen_muc']?></a></li>
		    						<?php	
		    								$i++;		
		    								}
		    							}
		    						?>
		    						</div>
		    						
		    					</ul>
		    				</li>
		    			</ul>
		    			<form class="form-inline navbar-form" id="TimKiem">
		    				<input class="form-control" type="text" id="textTimKiem" placeholder="Search">
		    				<button class="btn btn-default" type="button">Search</button>
		    			</form>
		    		</div>
	    			
	    		</div>
	    	</div>	  		
	    </nav>
	   	
	   	<div class="tieude">
		  	<div class="container">
		  		<div class="row">
		  			<p>Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.</p>
		  		</div>
		  	</div>
		</div>	

		
		<div class="truyenhot">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="thongtin" id="show_timkiem">
							<button class="btn btn-default btn-sm trove"><a href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a></button>
							<h3 class="text-center">Truyện <?=$tieu_de['ten_chuyen_muc']?></h3>
							<div class="col-xs-12">
								<?php
								foreach ($chuyenmuc as $key => $value) {
								?>
								<div class="col-md-6 chuyenmuc">
									<div class="media">
										<a class="media-left pull-left" href="thongtin.php?id_tt=<?=$value['slug']?>">
											<img class="media-object" width="100" height="150" src="public/images/<?=$value['hinh_dai_dien']?>" alt="">
										</a>
										<div class="media-body">
											<h4 class="media-heading"><a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></h4>
											<p>Thể loại: <?=$value['the_loai']?></p>
											<p>Tác giả: <?=$value['tac_gia']?></p>
											<p>Chap mới:17- Lần đọc:<?=$value['luot_xem']?></p>
											<p>Update: <?=$value['ngay_tao']?></p>
										</div>
									</div>
								</div>
								<?php
								}
								?>
								
								<?=$trang?>
										
							</div>
						</div>	

					</div>

					<div class="col-md-4">
						<div class="truyenmoidoc">
							<ul class="nav nav-tabs">
								<li class="col-md-12 text-center active"><a href="#truyenmoidoc" data-toggle="tab">Truyện mới đọc</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="truyenmoidoc">
									<ul class="list-group">
										<?php
										$i=1;
										if($truyen_vua_doc)
										{
											foreach ($truyen_vua_doc as $key => $value) {
										?>
										<li class="list-group-item text-danger"><?=$i?>. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
										<?php
											$i++;	
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>	
						<div class="topxem">
							<ul class="nav nav-tabs">
								<li class="col-md-6 text-center active"><a href="#toptuan" data-toggle="tab">Top Tuần</a></li>
								<li class="col-md-6 text-center"><a href="#topthang" data-toggle="tab">Top Tháng</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="toptuan">
											<ul class="list-group">
												<?php
												$i = 1;
												foreach ($truyen_toptuan as $key => $value) {
													if($i==1)
													{
												?>
												<li class="list-group-item text-danger">1. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info">2. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success">3. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><?=$i?>. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
												?>
												<?php
												}
												?>
											</ul>
								</div>
								<div class="tab-pane" id="topthang">
											<ul class="list-group">
												<?php
												$i = 1;
												foreach ($truyen_topthang as $key => $value) {
													if($i==1)
													{
												?>
												<li class="list-group-item text-danger">1. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info">2. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success">3. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><?=$i?>. <a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
												?>
												<?php
												}
												?>
											</ul>
								</div>
							</div>
						</div>	
					</div>		
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="container">
				<div class="row">
					<p class="text-center text-info">Copyright by admin</p>
				</div>
			</div>
		</div>
</body>
</html>
