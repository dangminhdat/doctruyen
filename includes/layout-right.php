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
										if(@$truyen_vua_doc)
										{	
										foreach ($truyen_vua_doc as $key => $value) {
										?>
										<li class="list-group-item text-danger"><a href="<?=$value['slug']?>.jsp"><?=$i?>. <?=$value['ten_truyen_tranh']?></a></li>
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
								<li class="col-xs-6 text-center active"><a href="#toptuan" data-toggle="tab">Top Tuần</a></li>
								<li class="col-xs-6 text-center"><a href="#topthang" data-toggle="tab">Top Tháng</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="toptuan">
											<ul class="list-group">
												<?php
												if($truyen_toptuan)
												{
												$i = 1;
												foreach ($truyen_toptuan as $key => $value) {
													if($i==1)
													{
												?>
												<li class="list-group-item text-danger">1. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info">2. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success">3. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><?=$i?>. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
												?>
												<?php
												}
												}
												?>
											</ul>
								</div>
								<div class="tab-pane" id="topthang">
											<ul class="list-group">
												<?php
												if(@$truyen_topthang)
												{
												$i = 1;
												foreach ($truyen_topthang as $key => $value) {
													if($i==1)
													{
												?>
												<li class="list-group-item text-danger">1. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==2)
													{
												?>
												<li class="list-group-item text-info">2. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else if($i==3)
													{
												?>
												<li class="list-group-item text-success">3. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
													else
													{
												?>
												<li class="list-group-item text-default"><?=$i?>. <a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></li>
												<?php
													$i++;		
													}
												?>
												<?php
												}
												}
												?>
											</ul>
								</div>
							</div>
						</div>
                                                <div class="facebook">
							<div class="fb-page" data-href="https://www.facebook.com/dangminhdat.96" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/dangminhdat.96" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/dangminhdat.96">Đạt Đặng</a></blockquote></div>
						</div>	
					</div>		
				</div>
			</div>
		</div>