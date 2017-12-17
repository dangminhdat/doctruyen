						<div class="thongtin" id="show_timkiem">
							<button class="btn btn-default btn-sm trove"><a href="trang-chu"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a></button>
							<h3 class="text-center">Truyện <?=@$tieu_de['ten_chuyen_muc']?></h3>
							<div class="col-xs-12">
								<?php
								if(@$chuyenmuc)
								{
								foreach ($chuyenmuc as $key => $value) {
								?>
								<div class="col-md-6 chuyenmuc">
									<div class="media">
										<a class="media-left pull-left" href="<?=$value['slug']?>.jsp">
											<img class="media-object" width="100" height="150" src="<?=$value['hinh_dai_dien']?>" alt="">
										</a>
										<div class="media-body">
											<h4 class="media-heading"><a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></h4>
											<p>Thể loại: <?=$value['the_loai']?></p>
											<p>Tác giả: <?=$value['tac_gia']?></p>
											<p>Chap mới:17- Lần đọc:<?=$value['luot_xem']?></p>
											<p>Update: <?=$value['ngay_tao']?></p>
										</div>
									</div>
								</div>
								<?php
								}
								}
								?>
								
								<?=$trang?>
										
							</div>
						</div>	

					</div>