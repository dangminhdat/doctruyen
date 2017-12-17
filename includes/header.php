<?php
	$title_error = 'Không tìm thấy trang';
	if(isset($_GET['id_c']) && isset($_GET['id_tt']))
	{	
		if($chi_tiet)
		{
			$title = $chi_tiet['ten_truyen_tranh'].' chap '.$chi_tiet['chapter'];
		}
		else
		{
			$title = $title_error;
		}
	}
	else if(isset($_GET['id_tt']))
	{
		if($chi_tiet_truyen['ten_truyen_tranh'])
		{
			$title = $chi_tiet_truyen['ten_truyen_tranh'];
		}
		else
		{
			$title = $title_error;
		}
	}
	else
	{
		$title = $data_web['tieu_de'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?=$data_web['tu_khoa']?>">
    <meta name="description" content="<?=$data_web['mieu_ta']?>">
    <meta name="author" name="Đặng Minh Đạt">
	<meta http-equiv="Content-Type" content="text/html">
	<meta http-equiv="robot" content="noindex,nofollow">
    <base href="http://datdangtin.byethost12.com/">
    <script src="public/jquery.min.js"></script>
    <script src="public/asset/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/script.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/asset/jquery.bxslider.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104515131-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=154433321780715";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

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
		    							$i = 1;  
                                                                        if(@$the_loai)
                                                                        {
		    							$count = ceil(count($the_loai)/3);
		    							foreach ($the_loai as $key => $value) {
		    								if($i==$count)
		    								{
		    									$i=1;
		    						?>	
		    							<li><a href="<?=$value['slug']?>"><?=$value['ten_chuyen_muc']?></a></li>
		    						</div>
		    						<div class="col-xs-4">		
		    						<?php
		    								}
		    								else
		    								{
		    						?>
		    							<li><a href="<?=$value['slug']?>"><?=$value['ten_chuyen_muc']?></a></li>
		    						<?php	
		    								$i++;		
		    								}
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