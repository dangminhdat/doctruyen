$_DOMAIN = "http://datdangtin.byethost12.com";
$.ajax({cache: false});

$('#AnhDaiDien').submit(function(e){
	img_up = $('#AnhDaiDien #name_img').val();

	if(img_up != '')
	{
		e.preventDefault();

		size_img = $('#name_img')[0].files[0].size;
		type_img = $('#name_img')[0].files[0].type;

		if(type_img != 'image/jpeg' && type_img != 'image/png' && type_img != 'image/gif')
		{
			$('#AnhDaiDien .alert').removeClass('hidden');
			$('#AnhDaiDien .alert').html('Hình ảnh có không đúng định dạng cho phép');
		}
		else if(size_img > 5242880)
		{
			$('#AnhDaiDien .alert').removeClass('hidden');
			$('#AnhDaiDien .alert').html('Hình ảnh có dung lượng quá 5MB');
		}
		else
		{
			$(this).ajaxSubmit({
				data : {
					action : 'upload_profile'
				},success : function(data){
					$('#AnhDaiDien .alert').attr('class','alert alert-success');
					$('#AnhDaiDien .alert').html(data);
				},error : function(){
					$('#AnhDaiDien .alert').removeClass('hidden');
					$('#AnhDaiDien .alert').html('Đã xảy ra lỗi, hãy thử lại sau');
				}
			})
		}
	}
	else
	{
		$('#AnhDaiDien .alert').removeClass('hidden');
		$('#AnhDaiDien .alert').html('Vui lòng chọn tệp ảnh');
	}
})

$('#Profile button').click(function(){
	$this = $('#Profile button');
	$this.html("Đang lưu...");

	$ten_hien_thi = $('#Profile #ten_hien_thi').val();
	$email = $('#Profile #email').val();

	if($ten_hien_thi == '' || $email == '')
	{
		$('#Profile .alert').removeClass('hidden');
		$('#Profile .alert').html("vui lòng nhập đầy đủ thông tin");
		$this.html("Lưu");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'profile.php',
			type : 'POST',
			data : {
				ten_hien_thi : $ten_hien_thi,
				email : $email,
				action : 'profile_tt'
			},success : function(data){
				$('#Profile .alert').removeClass('hidden');
				$('#Profile .alert').html(data);
				$this.html("Lưu");
			},error : function(){
				$('#Profile .alert').removeClass('hidden');
				$('#Profile .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Lưu");
			}
		});
	}
})

$('#Password button').click(function(){
	$this = $('#Password button');
	$this.html("Đang đổi mật khẩu...");

	$pass_change = $('#Password #pass_change').val();
	$pass_change_new = $('#Password #pass_change_new').val();
	$pass_change_re = $('#Password #pass_change_re').val();

	if($pass_change == '' || $pass_change_new == '' || $pass_change_re == '')
	{
		$('#Password .alert').removeClass('hidden');
		$('#Password .alert').html("vui lòng nhập đầy đủ thông tin");
		$this.html("Đổi mật khẩu");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'profile.php',
			type : 'POST',
			data : {
				pass_change : $pass_change,
				pass_change_new : $pass_change_new,
				pass_change_re : $pass_change_re,
				action : 'profile_pass'
			},success : function(data){
				$('#Password .alert').removeClass('hidden');
				$('#Password .alert').html(data);
				$this.html("Đổi mật khẩu");
			},error : function(){
				$('#Password .alert').removeClass('hidden');
				$('#Password .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Đổi mật khẩu");
			}
		});
	}
})