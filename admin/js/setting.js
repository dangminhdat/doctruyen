$_DOMAIN = "http://datdangtin.byethost12.com/admin/";

$('#TrangThai button').click(function(){
	$this = $('#TrangThai button');
	$trang_thai = $('#TrangThai input[name="trang_thai"]:radio:checked').val();
	
	$.ajax({
		url : $_DOMAIN + 'setting.php',
		type : 'POST',
		data : {
			trang_thai : $trang_thai,
			action : 'trang_thai'
		},success : function(data){
			$('#TrangThai .alert').attr('class','alert alert-success');
			$('#TrangThai .alert').html(data);
			$this.html("Lưu");
		},error : function(){
			$('#TrangThai .alert').removeClass('hidden');
			$('#TrangThai .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
			$this.html("Lưu");
		}
	});
});

$('#ThongTin button').click(function(){
	$this = $('#ThongTin button');
	$this.html("Đang lưu...");

	$tieu_de = $('#ThongTin #tieu_de').val();
	$mieu_ta = $('#ThongTin #mieu_ta').val();
	$tu_khoa = $('#ThongTin #tu_khoa').val();

	if($tieu_de == '' || $mieu_ta == '' || $tu_khoa == '')
	{
		$('#ThongTin .alert').removeClass('hidden');
		$('#ThongTin .alert').html("vui lòng nhập đầy đủ thông tin");
		$this.html("Lưu");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'setting.php',
			type : 'POST',
			data : {
				tieu_de : $tieu_de,
				mieu_ta : $mieu_ta,
				tu_khoa : $tu_khoa,
				action : 'thong_tin'
			},success : function(data){
				$('#ThongTin .alert').attr('class','alert alert-success');
				$('#ThongTin .alert').html(data);
				$this.html("Lưu");
			},error : function(){
				$('#ThongTin .alert').removeClass('hidden');
				$('#ThongTin .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Lưu");
			}
		});
	}
})