<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
	if($user)
	{
		if($data_user['quyen'] == 1)
		{
			echo "<h3>Thể Loại</h3>";
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
					<a href="theloai" class="btn btn-default">
						<span class="glyphicon glyphicon-arrow-left"></span> Trở về
					</a>';

					echo 
					'
					<p class="form-add-theloai">
						<form method="POST" onsubmit="return false" id="AddTheLoai">
							<div class="form-group">
								<label>Tên thể loại</label>
								<input type="text" class="form-control title" placeholder="Nhập tên thể loại" id="ten_theloai">
							</div>
							<div class="form-group">
								<label>Slug thể loại</label>
								<input type="text" class="form-control slug" placeholder="Slug thể loại" id="slug_theloai">
							</div>
							<div class="form-group">
								<button class="btn btn-primary">Thêm</button>
							</div>
							<div class="alert alert-danger hidden"></div>
						</form>
					</p>
					'
					;
				}
				else if($ac == 'edit')
				{
					if(@$id)
					{
						$sql = "SELECT * FROM theloai WHERE id_cm = '$id'";
						if($db->num_rows($sql))
						{
							echo 
							'
							<a href="theloai" class="btn btn-default">
								<span class="glyphicon glyphicon-arrow-left"></span> Trở về
							</a>	
							';

							$data = $db->fetch_assoc($sql,1);
							echo 
							'
							<p class="form-edit-theloai">
								<form method="POST" onsubmit="return false" id="EditTheLoai" data-id="'.$data['id_cm'].'">
									<div class="form-group">
										<label>Tên thể loại</label>
										<input type="text" class="form-control title" value="'.$data['ten_chuyen_muc'].'" placeholder="Nhập tên thể loại" id="edit_ten_theloai">
									</div>
									<div class="form-group">
										<label>Slug thể loại</label>
										<input type="text" class="form-control slug" value="'.$data['slug'].'" placeholder="Slug thể loại" id="edit_slug_theloai">
									</div>
									<div class="form-group">
										<button class="btn btn-primary">Cập nhật</button>
									</div>
									<div class="alert alert-danger hidden"></div>
								</form>
							</p>
							';
						}
						else
						{
							echo "<div class='alert alert-danger'>Thể loại đã bị xóa hoặc không tồn tài</div>";
						}
					}
				}
				else
				{
					new redirect($_DOMAIN.'theloai');
				}
			}
			else
			{
				echo 
				'
					<a href="theloai/add" class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> Thêm
					</a>
					<a href="theloai" class="btn btn-default">
						<span class="glyphicon glyphicon-repeat"></span> Reload
					</a>
					<a class="btn btn-danger" id="del_list_theloai">
						<span class="glyphicon glyphicon-trash"></span> Xóa
					</a>	
				';
				
				echo 
				'
				<p>
					<div class="table-responsive list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox"></th>
									<th>ID</th>
									<th>Tên thể loại</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>
								
				';
				$sql = "SELECT * FROM theloai ORDER BY id_cm DESC";
				if($db->num_rows($sql))
				{
					$the_loai = $db->fetch_assoc($sql,0);
					foreach ($the_loai as $key => $value) {
						echo '	<tr>
									<td><input type="checkbox" data-id="'.$value['id_cm'].'"</td>
									<td>'.$value['id_cm'].'</td>
									<td><a href="theloai/edit/'.$value['id_cm'].'">'.$value['ten_chuyen_muc'].'</a></td>
									<td>
										<a href="theloai/edit/'.$value['id_cm'].'" class="btn btn-info btn-sm">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
										<a class="btn btn-danger btn-sm del_theloai" data-id="'.$value['id_cm'].'">
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

			}
		}
		else
		{
			echo "<div style='margin-top: 20px' class='alert alert-danger'>Bạn không đủ quyền truy cập</div>";
		}
	}
	else
	{
		new redirect($_DOMAIN);
	}		
?>
</div>