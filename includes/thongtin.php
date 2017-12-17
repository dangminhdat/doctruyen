					<div id="show_timkiem">	
						<div class="thongtin">
							<button class="btn btn-default btn-sm trove"><a href="trang-chu"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a></button>
							<div class="col-md-12 media tongquan">
								<a class="col-md-3 media-left pull-left">
									<img src="<?=$chi_tiet_truyen['hinh_dai_dien']?>" alt="" class="media-object img-responsive" height="1000" width="200" >
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
								
								<a href="<?=$chi_tiet_truyen['slug']?>-chap-1/<?=$danh_sach_chap[0]['id_c']?>.html"><button class="btn btn-warning">Đọc chương 1</button></a>
								<a href="<?=$chi_tiet_truyen['slug']?>-chap-<?=$total?>/<?=$id_chat?>.html"><button class="btn btn-warning">Đọc chương cuối</button></a>
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
										foreach ($danh_sach_chap as $key => $value) {
										?>
										<li><a href="<?=$chi_tiet_truyen['slug']?>-chap-<?=$value['chapter']?>/<?=$value['id_c']?>.html"><?=$value['ten_truyen_tranh']?> chapter <?=$value['chapter']?></a></li>
										<?php
										}
										?>
									</ul>
									<?=$button_chap?>
								</div>
							</div>	
						</div>
					</div>
					</div>