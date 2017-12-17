<?php
session_start();
require_once 'controller/c_truyen_tranh.php';
$c_truyen_tranh = new C_truyen_tranh();
$the_loai = $c_truyen_tranh->the_loai();
$chi_tiet_truyen = $c_truyen_tranh->chi_tiet_truyen();

$truyen_toptuan = $c_truyen_tranh->truyen_toptuan();
$truyen_topthang = $c_truyen_tranh->truyen_topthang();
$danh_sach_chapter = $c_truyen_tranh->danh_sach_chapter();

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

					<div id="show_timkiem">	
						<div class="thongtin">
							<button class="btn btn-default btn-sm trove"><a href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a></button>
							<div class="col-md-12 media tongquan">
								<a class="col-md-3 media-left pull-left" href="#">
									<img src="public/images/<?=$chi_tiet_truyen['hinh_dai_dien']?>" alt="" class="media-object img-responsive" height="1000" width="200" >
								</a>
								<div class="media-body chitietthongtin">
									<h4 class="media-heading"><?=$chi_tiet_truyen['ten_truyen_tranh']?></h4>
									<p><label>Tên khác:</label> <?=$chi_tiet_truyen['ten_khac']?></p>
									<p><label>Tác giả:</label> <?=$chi_tiet_truyen['tac_gia']?></p>
									<p><label>Thể loại:</label> <?=$chi_tiet_truyen['the_loai']?></p>
									<p><label>Số chương:</label> <?=$chi_tiet_truyen['tong_chap']?></p>
									<p><label>Tình trạng:</label> <?php echo ($chi_tiet_truyen['trang_thai'] == 1)?'Full':'Còn tiếp'; ?></p>
									<p><label>Lần đọc:</label> <?=$chi_tiet_truyen['luot_xem']?></p>
									<p><label>Like:</label> Like / Share</p>
								
								<a href="chitiet.php?id_tt=<?=$chi_tiet_truyen['slug']?>&id_c=<?=$danh_sach_chapter[0]['id_c']?>&chapter=1"><button class="btn btn-warning">Đọc chương 1</button></a>
								<a href="chitiet.php?id_tt=<?=$chi_tiet_truyen['slug']?>&id_c=<?=$danh_sach_chapter[count($danh_sach_chapter)-1]['id_c']?>&chapter=<?=$chi_tiet_truyen['tong_chap']?>"><button class="btn btn-warning">Đọc chương cuối</button></a>
								</div>
							</div>
							
							<div class="col-xs-12 thongtintruyen">
								<p><label>Nội dung truyện <?=$chi_tiet_truyen['ten_truyen_tranh']?>: </label></p>
								<p><?=$chi_tiet_truyen['mieu_ta']?></p>
							</div>
						</div>	
						<div class="chapter">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Danh sách chương của truyện</h3>
								</div>
								<div class="panel-body">
									<ul>
										<?php
										// print_r($danh_sach_chapter);
										foreach ($danh_sach_chapter as $key => $value) {
										?>
										<li><a href="chitiet.php?id_tt=<?=$chi_tiet_truyen['slug']?>&id_c=<?=$value['id_c']?>&chapter=<?=$value['chapter']?>"><?=$value['ten_truyen_tranh']?> chapter <?=$value['chapter']?></a></li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>	
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
										<li class="list-group-item text-danger"><a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$i?>. <?=$value['ten_truyen_tranh']?></a></li>
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
												<li class="list-group-item text-danger"><a href="thongtin.php?id_tt=<?=$value['slug']?>">1. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info"><a href="thongtin.php?id_tt=<?=$value['slug']?>">2. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success"><a href="thongtin.php?id_tt=<?=$value['slug']?>">3. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$i?>. <?=$value['ten_truyen_tranh']?></a></li>
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
												<li class="list-group-item text-danger"><a href="thongtin.php?id_tt=<?=$value['slug']?>">1. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info"><a href="thongtin.php?id_tt=<?=$value['slug']?>">2. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success"><a href="thongtin.php?id_tt=<?=$value['slug']?>">3. <?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><a href="thongtin.php?id_tt=<?=$value['slug']?>"><?=$i?>. <?=$value['ten_truyen_tranh']?></a></li>
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
