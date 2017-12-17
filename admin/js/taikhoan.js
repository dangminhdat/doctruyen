$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

$('#AddTaiKhoan button').click(function(){
	$this = $('#AddTaiKhoan button');
	$this.html("Đang thêm...");

	$user = $('#user').val();
	$pass = $('#pass').val();
	$re_pass = $('#re_pass').val();

	if($user == '' || $pass == '' || $re_pass == '')
	{
		$('#AddTaiKhoan .alert').removeClass('hidden');
		$('#AddTaiKhoan .alert').html("vui lòng nhập đầy đủ thông tin");
		$this.html("Thêm");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'taikhoan.php',
			type : 'POST',
			data : {
				user : $user,
				pass : $pass,
				re_pass : $re_pass,
				action : 'add_taikhoan'
			},success : function(data){
				$('#AddTaiKhoan .alert').removeClass('hidden');
				$('#AddTaiKhoan .alert').html(data);
				$this.html("Thêm");
			},error : function(){
				$('#AddTaiKhoan .alert').removeClass('hidden');
				$('#AddTaiKhoan .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Thêm");
			}
		});
	}
})

$('#del_list_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn xóa hết tất cả các tài khoản không?");
	if($confirm == true)
	{
		$id_tk = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_tk[index] = $(this).attr('data-id');
		});

		if($id_tk.length === 0)
		{
			alert("Bạn chưa chọn tài khoản nào!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'taikhoan.php',
				type : 'POST',
				data : {
					id_tk : $id_tk,
					action : 'del_list_taikhoan'
				},success : function(){
					location.reload();
				}
			})
		}
	}
	else
	{
		return false;
	}
})
$('#lock_list_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn khóa hết tất cả các tài khoản không?");
	if($confirm == true)
	{
		$id_tk = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_tk[index] = $(this).attr('data-id');
		});

		if($id_tk.length === 0)
		{
			alert("Bạn chưa chọn tài khoản nào!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'taikhoan.php',
				type : 'POST',
				data : {
					id_tk : $id_tk,
					action : 'lock_list_taikhoan'
				},success : function(){
					location.reload();
				}
			})
		}
	}
	else
	{
		return false;
	}
})
$('#unlock_list_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn mở khóa hết tất cả các tài khoản không?");
	if($confirm == true)
	{
		$id_tk = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_tk[index] = $(this).attr('data-id');
		});

		if($id_tk.length === 0)
		{
			alert("Bạn chưa chọn tài khoản nào!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'taikhoan.php',
				type : 'POST',
				data : {
					id_tk : $id_tk,
					action : 'unlock_list_taikhoan'
				},success : function(){
					location.reload();
				}
			})
		}
	}
	else
	{
		return false;
	}
})

$('.del_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn xóa tài khoản này không?");
	if($confirm == true)
	{
		$id_tk = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'taikhoan.php',
			type : 'POST',
			data : {
				id_tk : $id_tk,
				action : 'del_taikhoan'
			},success : function(){
				location.reload();
			}
		})
	}
	else
	{
		return false;
	}
})
$('.lock_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn khóa tài khoản này không?");
	if($confirm == true)
	{
		$id_tk = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'taikhoan.php',
			type : 'POST',
			data : {
				id_tk : $id_tk,
				action : 'lock_taikhoan'
			},success : function(){
				location.reload();
			}
		})
	}
	else
	{
		return false;
	}
})
$('.unlock_taikhoan').click(function(){
	$confirm = confirm("Bạn có chắc muốn mở khóa tài khoản này không?");
	if($confirm == true)
	{
		$id_tk = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'taikhoan.php',
			type : 'POST',
			data : {
				id_tk : $id_tk,
				action : 'unlock_taikhoan'
			},success : function(){
				location.reload();
			}
		})
	}
	else
	{
		return false;
	}
})