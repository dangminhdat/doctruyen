$(document).ready(function(){
	$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

	$('#DangNhap button').click(function(){
		$this = $('#DangNhap button');
		$this.html("Đang đăng nhập, chờ tý...");

		$username = $('#DangNhap #username').val();
		$password = $('#DangNhap #password').val();

		if($username == '' || $password == '')
		{
			$('#DangNhap .alert').removeClass('hidden');
			$('#DangNhap .alert').html('Vui lòng điền đầy đủ thông tin');
			$this.html("Đăng nhập");
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'login.php',
				type : 'POST',
				data : {
					username : $username,
					password : $password
				},success : function(data){
					$('#DangNhap .alert').removeClass('hidden');
					$('#DangNhap .alert').html(data);
					$this.html("Đăng nhập");
				},error : function(){
					$('#DangNhap .alert').removeClass('hidden');
					$('#DangNhap .alert').html('Đã xảy ra lỗi, hãy thử lại sau');
					$this.html("Đăng nhập");
				}
			})
		}
	})
})