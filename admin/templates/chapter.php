<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		// if($data_user['quyen'] == 1)
		// {
			echo "<h3>Chapter</h3>";
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
						<a href="chapter" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> Trở về
						</a>';
					echo 
					'
						<p class="form-add-chapter">
							<form action="'.$_DOMAIN.'chapter.php" method="POST" onsubmit="return false" id="Chapter" enctype="multipart/form-data">
								<div class="form-group">
									<label>Trạng thái chapter</label>
									<div class="radio">
										<label>
											<input type="radio" value="0" name="trang_thai"> Xuất bản
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" value="1" checked="checked" name="trang_thai"> Ẩn
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Chapter số:</label>
									<input type="text" class="form-control" placeholder="ID chapter" id="id_chapter">
								</div>
								<div class="form-group">
									<label>Tên chapter</label>
									<input type="text" class="form-control" placeholder="Tên chapter" id="ten_chapter">
								</div>
								<div class="form-group">
									<label>Tên truyện tranh</label>
									<select id="ten_truyentranh" class="form-control" >';
					$sql = "SELECT * FROM truyentranh";
								foreach ($db->fetch_assoc($sql,0) as $key => $value) {
									echo '<option value="'.$value['ten_truyen_tranh'].'">'.$value['ten_truyen_tranh'].'</option>';
								}
					echo '			</select>
								</div>
								<div class="form-group">
									<label>Chọn hình ảnh cho truyện</label>
									<input type="file" accept="image/*" class="form-control" name="name_img[]" id="name_img" multiple="true" onchange="pre_img_list()">
								</div>
								<div class="form-group pre_img hidden">
									<p><label>Ảnh xem trước</label></p>
								</div>
                                                                <div class="form-group">
									<label>Link hình ảnh(nếu không có hình ảnh)</label>
									<textarea id="link_hinh_anh" class="form-control" placeholder="Nhập link hình ảnh"></textarea>
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
					$sql = "SELECT * FROM chuong WHERE id_c = '$id'";
					if($db->num_rows($sql))
					{
						$data = $db->fetch_assoc($sql,1);
						echo '
							<a href="chapter" class="btn btn-default">
								<span class="glyphicon glyphicon-arrow-left"></span> Trở về
							</a>';
						$tt1 = ($data['trang_thai'] == 0)?'checked="checked"':'';
						$tt2 = ($data['trang_thai'] == 1)?'checked="checked"':'';
						echo 
						'
							<p class="form-edit-chapter">
								<form method="post" onsubmit="return false;" id="EditChapter" data-id="'.$id.'">
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="edit_trang_thai" '.$tt1.' value="0"> Xuất bản
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="edit_trang_thai" '.$tt2.' value="1"> Ẩn
											</label>
										</div>
									</div>
									<div class="form-group">
										<label>Chapter số:</label>
										<input type="text" class="form-control" placeholder="ID Chapter" id="edit_id_chapter" value="'.$data['chapter'].'">
									</div>
									<div class="form-group">
										<label>Tên chapter</label>
										<input type="text" class="form-control" placeholder="Tên chapter" id="edit_ten_chapter" value="'.$data['ten_chap'].'">
									</div>
									<div class="form-group">
										<label>Tên truyện tranh</label>
										<input type="text" class="form-control" placeholder="Tên truyện tranh" id="edit_ten_truyentranh" value="'.$data['ten_truyen_tranh'].'" disabled>
									</div>
									<div class="form-group">
										<label>Link hình ảnh</label>
										<textarea id="edit_link_hinh_anh" class="form-control" placeholder="Nhập link hình ảnh"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-primary">Cập nhật</button>
									</div>
									<div class="alert alert-danger hidden"></div>
								</form>
							</p>
						'	
						;	
					}
					else
					{
						echo "<div class='alert alert-danger'>Chapter đã bị xóa hoặc không tồn tại</div>";
					}
				}
				else
				{
					new redirect($_DOMAIN.'chapter');
				}
			}
			else
			{
				echo 
				'
					<a href="chapter/add" class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Thêm
					</a>
					<a href="chapter" class="btn btn-default">
						<span class="glyphicon glyphicon-repeat"></span> Reload
					</a>
					<a class="btn btn-danger" id="del_list_chapter">
						<span class="glyphicon glyphicon-trash"></span> Xóa
					</a>	
				';
				echo 
				'
					<p class="form-tim-kiem">
						<form method="post" onsubmit="return false;" id="TimKiemChapter">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Nhập tên truyện tranh..." id="truyen_tranh_timkiem">
									<div class="input-group-btn">
										<button class="btn btn-default">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</div>
								</div>
							</div>
						</form>			
					</p>
				';

				echo 
				'
				<div id="show_tim">
					<div class="table-responsive list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox"></th>
									<th>ID</th>
									<th>ID chapter</th>
									<th>Tên chapter</th>
									<th>Tên truyện tranh</th>
									<th>Trạng thái</th>
									<th>Tổng chap</th>
									<th>Lượt xem</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>
								
				';
				$limit = 10;
				$total_chapter = $db->num_rows("SELECT * FROM chuong");
				$total_page = ceil($total_chapter/$limit);
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
				$sql = "SELECT * FROM chuong ORDER BY id_c DESC LIMIT $start,$limit";
				if($db->num_rows($sql))
				{
					$chapter = $db->fetch_assoc($sql,0);
					foreach ($chapter as $key => $value) {
						$sql = "SELECT MAX(chapter) AS max FROM chuong WHERE ten_truyen_tranh = '$value[ten_truyen_tranh]'";
						$max_chapter = $db->fetch_assoc($sql,1);
						if($value['trang_thai'] == 0)
						{
							$stt = '<span class="label label-success">Xuất bản</span>';
						}
						else
						{
							$stt = '<span class="label label-warning">Ẩn</span>';
						}
						echo '	<tr>
									<td><input type="checkbox" data-id="'.$value['id_c'].'"</td>
									<td>'.$value['id_c'].'</td>
									<td>'.$value['chapter'].'</td>
									<td><a href="chapter/edit/'.$value['id_c'].'">'.$value['ten_chap'].'</a></td>
									<td><strong>'.$value['ten_truyen_tranh'].'</strong></td>
									<td>'.$stt.'</td>
									<td>'.$max_chapter['max'].'</td>
									<td>'.$value['luot_xem'].'</td>
									<td>
										<a href="chapter/edit/'.$value['id_c'].'" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
										<a class="btn btn-danger btn-sm del_chapter" data-id="'.$value['id_c'].'">
											<span class="glyphicon glyphicon-trash"></span>
										</a>	
									</td>
								</tr>';
						}	
				}				
				
				echo '		</tbody>
						</table>
					</div>	
				</div>
				'
				;
				echo '<ul class="pagination">';
				if($current > 1)
				{
					echo 
						'<li>
							<a href="'.$_DOMAIN.'chapter/page-'.($current-1).'.html">
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
						echo '<li><a href="'.$_DOMAIN.'chapter/page-'.$i.'.html">'.$i.'</a></li>';
					}
				}
				if($current < $total_page)
				{
					echo '
						<li>
							<a href="'.$_DOMAIN.'chapter/page-'.($current+1).'.html">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>';
				}		
				echo '</ul>';
			}
		// }
		// else
		// {
		// 	echo "<div style='margin-top: 10px' class='alert alert-danger'>Bạn không đủ quyền truy cập</div>";
		// }
	}
	else
	{
		new redirect($_DOMAIN);
	}

?>