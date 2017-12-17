					<div class="thongtin" id="show_timkiem">	
						<a href="trang-chu"><button style="margin: 10px;" class="btn btn-default btn-sm trove"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</button></a>
							<div class="text-center">
								<h3><a href="<?=$chi_tiet_truyen['slug']?>.jsp"><?=$chi_tiet['ten_truyen_tranh']?></a></h3>
								<p><?=$chi_tiet['ten_truyen_tranh']?> chap <?=$chi_tiet['chapter']?></p>
								
									<?=$button?>
								

								<p class="noidung">
									<?php
										$data = explode(',',$chi_tiet['noi_dung']);
										for ($i=0; $i < count($data); $i++) {
									?>	
									<span class="col-xs-12 text-center">
										<img src="<?=$data[$i]?>" alt="" class="img-responsive">
									</span>
									<?php
										}
									?>	
								</p>	
							</div>
						</div>	

						
					</div>