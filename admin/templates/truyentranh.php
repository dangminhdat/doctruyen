<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		// if($data_user['quyen'] == 1)
		// {
			echo "<h3>Truyện tranh</h3>";
			if(isset($_GET['ac']))
			{
				$ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
			}
			else
			{
				$ac = '';
			}
			if(isset($_GET['id']))
			{
				$id = trim(addslashes(htmlspecialchars($_GET['id'])));
			}
			else
			{
				$id = '';
			}

			if($ac != '')
			{
				if($ac == 'add')
				{
					echo '
					<a href="truyentranh" class="btn btn-default">
						<span class="glyphicon glyphicon-arrow-left"></span> Trở về
					</a>';
					$sql = "SELECT * FROM theloai";
					if($db->num_rows($sql))
					{
						$tl = '';
						foreach ($db->fetch_assoc($sql,0) as $key => $value) {
							$tl .= 
							'
								<div class="checkbox-inline">
									<input type="checkbox" value="'.$value['ten_chuyen_muc'].'">'.$value['ten_chuyen_muc'].
								'</div>
							';
						}
					}
					echo 
					'
					<p class="form-add-truyentranh">
						<form method="POST" action="'.$_DOMAIN.'truyentranh.php" onsubmit="return false" id="AddTruyenTranh" enctype="multipart/form-data">
							<div class="form-group">
								<label>Trạng thái truyện tranh</label>
								<div class="radio">
									<label>
										<input type="radio" value="1" name="trang_thai"> FULL
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="0" checked="checked" name="trang_thai"> Còn tiếp
									</label>
								</div>
							</div>
                                                        <div class="form-group">
								<label>Tên truyện tranh</label>
								<input type="text" class="form-control title" placeholder="Nhập tên truyện tranh" id="ten_truyentranh">
							</div>
							<div class="form-group">
								<label>Slug truyện tranh</label>
								<input type="text" class="form-control slug" placeholder="Slug thể loại" id="slug_truyentranh">
							</div>
							<div class="form-group">
								<label>Tác giả</label>
								<input type="text" class="form-control" placeholder="Tác giả" id="tac_gia">
							</div>
							<div class="form-group">
								<label>Họa sĩ</label>
								<input type="text" class="form-control" placeholder="Họa sĩ" id="hoa_si">
							</div>
							<div class="form-group">
								<label>Tên khác</label>
								<input type="text" class="form-control" placeholder="Tên khác" id="ten_khac">
							</div>
							<div class="form-group">
								<p><strong>Thể loại</strong></p>
								'.@$tl.'
							</div>
							<div class="form-group">
								<label>Miêu tả</label>
								<textarea rows="4" placeholder="Miêu tả truyện tranh" class="form-control" id="mieu_ta"></textarea>
							</div>
							<div class="form-group">
								<label>Hình đại diện</label>
								<input type="file" accept="image/*" class="form-control" id="name_img" name="name_img" onchange="pre_img()">
							</div>
							<div class="form-group pre_img hidden">
								<label>Ảnh xem trước</label>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Thêm</button>
							</div>
							<div class="alert alert-danger hidden"></div>
						</form>
					</p>
					'
					;
				}
				else if($ac == 'edit')
				{
					$sql_data = "SELECT * FROM truyentranh WHERE id_tt = '$id'";
					if($db->num_rows($sql_data))
					{
						echo '
							<a href="truyentranh" class="btn btn-default">
								<span class="glyphicon glyphicon-arrow-left"></span> Trở về
							</a>';
						$data = $db->fetch_assoc($sql_data,1);	
						$sql = "SELECT * FROM theloai";
						if($db->num_rows($sql))
						{
							$tl = '';
							foreach ($db->fetch_assoc($sql,0) as $key => $value) {
								if(preg_match('#'.$value['ten_chuyen_muc'].'#',$data['the_loai']))
								{
									$tl .= 
									'
										<div class="checkbox-inline">
											<input type="checkbox" checked="checked" value="'.$value['ten_chuyen_muc'].'">'.$value['ten_chuyen_muc'].
										'</div>
									';
								}
								else
								{
									$tl .= 
									'
										<div class="checkbox-inline">
											<input type="checkbox" value="'.$value['ten_chuyen_muc'].'">'.$value['ten_chuyen_muc'].
										'</div>
									';
								}
							}
						}
						$stt1 = ($data['trang_thai'] == 0)?'checked="checked"':'';
						$stt2 = ($data['trang_thai'] == 1)?'checked="checked"':'';
							echo 
						'
						<p class="form-add-truyentranh">
							<form method="POST" action="'.$_DOMAIN.'truyentranh.php" onsubmit="return false" id="EditTruyenTranh" enctype="multipart/form-data" data-id="'.$data['id_tt'].'">
								<div class="form-group">
									<label>Trạng thái truyện tranh</label>
									<div class="radio">
										<label>
											<input type="radio" value="1" '.$stt2.' name="trang_thai"> FULL
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" value="0" '.$stt1.' name="trang_thai"> Còn tiếp
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Tên truyện tranh</label>
									<input type="text" class="form-control title" placeholder="Nhập tên truyện tranh" id="edit_ten_truyentranh" value="'.$data['ten_truyen_tranh'].'">
								</div>
								<div class="form-group">
									<label>Slug truyện tranh</label>
									<input type="text" class="form-control slug" placeholder="Slug thể loại" id="edit_slug_truyentranh" value="'.$data['slug'].'">
								</div>
								<div class="form-group">
									<label>Tác giả</label>
									<input type="text" class="form-control" placeholder="Tác giả" id="edit_tac_gia" value="'.$data['tac_gia'].'">
								</div>
								<div class="form-group">
									<label>Họa sĩ</label>
									<input type="text" class="form-control" placeholder="Họa sĩ" id="edit_hoa_si" value="'.$data['hoa_si'].'">
								</div>
								<div class="form-group">
									<label>Tên khác</label>
									<input type="text" class="form-control" placeholder="Tên khác" id="edit_ten_khac" value="'.$data['ten_khac'].'">
								</div>
								<div class="form-group">
									<p><strong>Thể loại</strong></p>
									'.$tl.'
								</div>
								<div class="form-group">
									<label>Miêu tả</label>
									<textarea rows="4" placeholder="Miêu tả truyện tranh" class="form-control" id="edit_mieu_ta">'.$data['mieu_ta'].'</textarea>
								</div>
								<div class="form-group">
									<label>Ảnh hiện tại</label>
									<img src="../'.$data['hinh_dai_dien'].'" class="img-responsive" style="width: 200px; height: 350px">
									<input type="hidden" id="hinh_dai_dien" value="'.$data['hinh_dai_dien'].'">
								</div>
								<div class="form-group">
									<label>Hình đại diện</label>
									<input type="file" accept="image/*" class="form-control" id="edit_name_img" name="edit_name_img" onchange="pre_img()">
								</div>
								<div class="form-group pre_img hidden">
									<label>Ảnh xem trước</label>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Cập Nhật</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</p>
						'
						;
					}
					else
					{
						echo "<div class='alert alert-danger'>Truyện tranh đã bị xóa hoặc không tồn tại</div>";	
					}
				}
				else
				{
					new redirect($_DOMAIN.'truyentranh');
				}
			}
			else
			{
				echo 
				'
					<a href="truyentranh/add" class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Thêm
					</a>
					<a href="truyentranh" class="btn btn-default">
						<span class="glyphicon glyphicon-repeat"></span> Reload
					</a>
					<a class="btn btn-danger" id="del_list_truyentranh">
						<span class="glyphicon glyphicon-trash"></span> Xóa
					</a>
				'
				;
				echo 
				'
				<p>
					<div class="table-responsive list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox"></th>
									<th>ID</th>
									<th>Tên truyện tranh</th>
									<th>Tác giả</th>
									<th>Họa sĩ</th>
									<th>Tên khác</th>
									<th style="width: 15%"	z>Thể loại</th>
									<th>Trạng thái</th>
									<th>Lượt xem</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>
								
				';
				$limit = 10;
				$total_truyentranh = $db->num_rows("SELECT * FROM truyentranh");
				$total_page = ceil($total_truyentranh/$limit);
				if(isset($_GET['page']))
				{
					$current = trim(addslashes(htmlspecialchars($_GET['page'])));
					if($current < 1)
					{
						$current = 1;
					}
					else if($current > $total_page)
					{
						$current = $total_page;
					}
				}
				else
				{
					$current = 1;
				}
				$start = ($current - 1) * $limit;
				$sql = "SELECT * FROM truyentranh ORDER BY id_tt DESC LIMIT $start,$limit";
				if($db->num_rows($sql))
				{
					$truyentranh = $db->fetch_assoc($sql,0);
					foreach ($truyentranh as $key => $value) {
						if($value['trang_thai'] == 1)
						{
							$stt = '<span class="label label-success">FULL</span>';
						}
						else
						{
							$stt = '<span class="label label-danger">Còn tiếp</span>';
						}
						echo '	<tr>
									<td><input type="checkbox" data-id="'.$value['id_tt'].'"</td>
									<td>'.$value['id_tt'].'</td>
									<td><a href="truyentranh/edit/'.$value['id_tt'].'">'.$value['ten_truyen_tranh'].'</a></td>
									<td><strong><i>'.$value['tac_gia'].'</i></strong></td>
									<td>'.$value['hoa_si'].'</td>
									<td>'.$value['ten_khac'].'</td>
									<td>'.$value['the_loai'].'</td>
									<td>'.$stt.'</td>
									<td>'.$value['luot_xem'].'</td>
									<td>
										<a href="truyentranh/edit/'.$value['id_tt'].'" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
										<a class="btn btn-danger btn-sm del_truyen_tranh" data-id="'.$value['id_tt'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>	
									</td>
								</tr>';
						}	
				}				
				
				echo '		</tbody>
						</table>
					</div>	
				</p>
				'
				;
				echo '<ul class="pagination">';
				if($current > 1)
				{
					echo 
						'<li>
							<a href="'.$_DOMAIN.'truyentranh/page-'.($current-1).'.html">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>';
				}
				for ($i=1; $i <= $total_page; $i++) { 
					if($current == $i)
					{
						echo "<li><a style='background: #73d61b'>".$i."</a></li>";
					}
					else
					{
						echo '<li><a href="'.$_DOMAIN.'truyentranh/page-'.$i.'.html">'.$i.'</a></li>';
					}
				}
				if($current < $total_page)
				{
					echo '
						<li>
							<a href="'.$_DOMAIN.'truyentranh/page-'.($current+1).'.html">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>';
				}		
				echo '</ul>';
			}
		// }
		// else
		// {
		// 	echo "<div style='margin-top: 20px' class='alert alert-danger'>Bạn không đủ quyền truy cập</div>";
		// }
	}
	else
	{
		new redirect($_DOMAIN);
	}
?>	