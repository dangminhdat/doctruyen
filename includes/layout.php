					<div id="show_timkiem">
						<div class="panel panel-default slide">
							<div class="panel-heading">
								<h4>Truyện Hot</h4>
							</div>
							<div class="panel-body">
								<div class="bxslider">
									<?php
										foreach ($truyen_hot as $key => $value) {
									?>
									<a href="<?=$value['slug']?>.jsp"><img src="<?=$value['hinh_dai_dien']?>" height="220" alt=""></a>
									<?php
										}
									?>
								</div>
							</div>
						</div>

						<div class="chitiet">
							<ul class="nav nav-tabs">
		                        <li class="col-xs-4 text-center active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-home"></span> Truyện New</a></li>
		                        <li class="col-xs-4 text-center"><a href="#info" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Truyện Full</a></li>
		                        <li class="col-xs-4 text-center"><a href="#contact" class="active" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Truyện Update</a></li>
		                    </ul>
 
		                    <div class="tab-content">
		                        <div class="tab-pane active" id="home">
		                        	<?php
		                        	if($truyen_n)
		                        	foreach ($truyen_n as $key => $value) {		 
		                        	?>
									<div class="col-md-6">
										<div class="media">
											<a class="media-left pull-left" href="<?=$value['slug']?>.jsp">
												<img class="media-object" src="<?=$value['hinh_dai_dien']?>" height="100" alt="">
											</a>
											<div class="media-body">
												<h4 class="media-heading"><a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></h4>
												<p>Thể loại: <?=$value['the_loai']?></p>
												<p>Chap mới:<?=$value['chapter']?>- Lần đọc:<?=$value['luot_xem']?></p>
												<p>Update: <?=$value['ngay_tao']?></p>							
											</div>
										</div>						
									</div>
									<?php
									}
									?>

									<?php //$trang_n?>

		                        </div>
		                        <div class="tab-pane fade" id="info">
		                        	<?php
		                        	if(@$trang_f)
		                        	foreach ($truyen_f as $key => $value) {
		                        	?>
									<div class="col-md-6">
										<div class="media">
											<a class="media-left pull-left" href="<?=$value['slug']?>.jsp">
												<img class="media-object" src="<?=$value['hinh_dai_dien']?>" height="100" alt="">
											</a>
											<div class="media-body">
												<h4 class="media-heading"><a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></h4>
												<p>Thể loại: <?=$value['the_loai']?></p>
												<p>Lần đọc:<?=$value['luot_xem']?></p>
												<p>Update: <?=$value['ngay_tao']?></p>							
											</div>
										</div>						
									</div>
									<?php
									}
									?>

									<?php //$trang_f?>

		                        </div>
		                        <div class="tab-pane fade" id="contact">
		                        	<?php
		                        	if(@$truyen_up)
		                        	foreach ($truyen_up as $key => $value) {
		                        	?>
									<div class="col-md-6">
										<div class="media">
											<a class="media-left pull-left" href="<?=$value['slug']?>.jsp">
												<img class="media-object" src="<?=$value['hinh_dai_dien']?>" height="100" alt="">
											</a>
											<div class="media-body">
												<h4 class="media-heading"><a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></h4>
												<p>Thể loại: <?=$value['the_loai']?></p>
												<p>Chap mới:<?=$value['chapter']?>- Lần đọc:<?=$value['luot_xem']?></p>
												<p>Update: <?=$value['ngay_tao']?></p>							
											</div>
										</div>						
									</div>
									<?php
									}
									?>
									<?php //$trang_up?>

		                        </div>
		                    </div>
						</div>
					</div>

					</div>