$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

function pre_img()
{
	img_up = $('#name_img').val();
	$('.pre_img').removeClass('hidden');
	$('.pre_img').html('<p><label>Ảnh xem trước</label></p>');
	if(img_up != '')
	{
		$('.pre_img').append('<img src="' + URL.createObjectURL(event.target.files[0]) + '" style="border: 1px solid #ddd; width: 100px; height: 100px; margin-right: 5px; margin-bottom: 5px;"/>');
	}
	else
	{
		$('.pre_img').addClass('hidden');
		$('.pre_img').html('');
	}
}

$('#AddTruyenTranh').submit(function(e){
	$this = $('#AddTruyenTranh  button');
	$this.html("Đang thêm...");

	$ten_truyentranh = $('#ten_truyentranh').val();
	$slug_truyentranh = $('#slug_truyentranh').val();
	$tac_gia = $('#tac_gia').val();
        $trang_thai = $('#AddTruyenTranh input[name="trang_thai"]:radio:checked').val();
	$hoa_si = $('#hoa_si').val();
	$ten_khac = $('#ten_khac').val();
	$the_loai = [];
	$('#AddTruyenTranh input[type="checkbox"]:checkbox:checked').each(function(index)
	{
		$the_loai[index] = $(this).val();
	})
	$mieu_ta = $('#mieu_ta').val();
	img_up = $('#name_img').val();
	if($ten_truyentranh == '' || $slug_truyentranh == '' || $tac_gia == '' || $trang_thai == '' || $hoa_si == '' || $ten_khac == '' || $the_loai == '' || $mieu_ta == '')
	{
		$('#AddTruyenTranh .alert').removeClass('hidden');
		$('#AddTruyenTranh .alert').html('Vui lòng điền đầy đủ thông tin');
		$this.html("Thêm");
	}
	else if(img_up == '')
	{
		$('#AddTruyenTranh .alert').removeClass('hidden');
		$('#AddTruyenTranh .alert').html('Bạn chưa chọn ảnh');
		$this.html("Thêm");
	}
	else
	{
		e.preventDefault();

		size_img = $('#name_img')[0].files[0].size;
		type_img = $('#name_img')[0].files[0].type;

		if(size_img > 5242880)
		{
			$('#AddTruyenTranh .alert').removeClass('hidden');
			$('#AddTruyenTranh .alert').html('Kích thước ảnh quá giới hạn 5MB');
			$this.html("Thêm");
		}
		else if(type_img != 'image/jpeg' && type_img != 'image/png' && type_img != 'image/gif')
		{
			$('#AddTruyenTranh .alert').removeClass('hidden');
			$('#AddTruyenTranh .alert').html('Đinh dạng ảnh không cho phép');
			$this.html("Thêm");
		}
		else
		{
			$(this).ajaxSubmit({
				data : {
					trang_thai : $trang_thai,
					ten_truyentranh : $ten_truyentranh,
					slug_truyentranh : $slug_truyentranh,
					tac_gia : $tac_gia,
					hoa_si : $hoa_si,
					ten_khac : $ten_khac,
					the_loai : $the_loai,
					mieu_ta : $mieu_ta,
					action : 'add_truyentranh'
				},success : function(data){
					$('#AddTruyenTranh .alert').removeClass('hidden');
					$('#AddTruyenTranh .alert').html(data);
					$this.html("Thêm");
				},error : function(){
					$('#AddTruyenTranh .alert').removeClass('hidden');
					$('#AddTruyenTranh .alert').html('Đã xảy ra lỗi, hãy thử lại sau');
					$this.html("Thêm");
				}
			})
		}
	}
})
$('#EditTruyenTranh').submit(function(e){
	$this = $('#EditTruyenTranh  button');
	$this.html("Đang cập nhật...");

	$id_tt = $('#EditTruyenTranh').attr('data-id');
	$trang_thai = $('#EditTruyenTranh input[name="trang_thai"]:radio:checked').val();
	$ten_truyentranh = $('#edit_ten_truyentranh').val();
	$slug_truyentranh = $('#edit_slug_truyentranh').val();
	$tac_gia = $('#edit_tac_gia').val();
	$hoa_si = $('#edit_hoa_si').val();
	$ten_khac = $('#edit_ten_khac').val();
	$the_loai = [];
	$('#EditTruyenTranh input[type="checkbox"]:checkbox:checked').each(function(index)
	{
		$the_loai[index] = $(this).val();
	})
	$mieu_ta = $('#edit_mieu_ta').val();
	$hinh_dai_dien = $('#hinh_dai_dien').val();
	img_up = $('#edit_name_img').val();
	if($ten_truyentranh == '' || $slug_truyentranh == '' || $tac_gia == '' || $trang_thai == '' || $hoa_si == '' || $ten_khac == '' || $the_loai == '' || $mieu_ta == '')
	{
		$('#EditTruyenTranh .alert').removeClass('hidden');
		$('#EditTruyenTranh .alert').html('Vui lòng điền đầy đủ thông tin');
		$this.html("Cập Nhật");
	}
	else
	{
		if(img_up != '')
		{
			e.preventDefault();

			size_img = $('#edit_name_img')[0].files[0].size;
			type_img = $('#edit_name_img')[0].files[0].type;

			if(size_img > 5242880)
			{
				$('#EditTruyenTranh .alert').removeClass('hidden');
				$('#EditTruyenTranh .alert').html('Kích thước ảnh quá giới hạn 5MB');
				$this.html("Thêm");
			}
			else if(type_img != 'image/jpeg' && type_img != 'image/png' && type_img != 'image/gif')
			{
				$('#EditTruyenTranh .alert').removeClass('hidden');
				$('#EditTruyenTranh .alert').html('Đinh dạng ảnh không cho phép');
				$this.html("Thêm");
			}
			else
			{
				$(this).ajaxSubmit({
					data : {
						trang_thai : $trang_thai,
						ten_truyentranh : $ten_truyentranh,
						slug_truyentranh : $slug_truyentranh,
						tac_gia : $tac_gia,
						hoa_si : $hoa_si,
						ten_khac : $ten_khac,
						the_loai : $the_loai,
						mieu_ta : $mieu_ta,
						id_tt : $id_tt,
						hinh_dai_dien : $hinh_dai_dien,
						action : 'edit_truyentranh'
					},success : function(data){
						$('#EditTruyenTranh .alert').removeClass('hidden');
						$('#EditTruyenTranh .alert').html(data);
						$this.html("Thêm");
					},error : function(){
						$('#EditTruyenTranh .alert').removeClass('hidden');
						$('#EditTruyenTranh .alert').html('Đã xảy ra lỗi, hãy thử lại sau');
						$this.html("Thêm");
					}
				})
			}
		}
		else
		{
			$(this).ajaxSubmit({
				data : {
					trang_thai : $trang_thai,
					ten_truyentranh : $ten_truyentranh,
					slug_truyentranh : $slug_truyentranh,
					tac_gia : $tac_gia,
					hoa_si : $hoa_si,
					ten_khac : $ten_khac,
					the_loai : $the_loai,
					mieu_ta : $mieu_ta,
					id_tt : $id_tt,
					hinh_dai_dien : $hinh_dai_dien,
					action : 'edit_truyentranh'
				},success : function(data){
					$('#EditTruyenTranh .alert').removeClass('hidden');
					$('#EditTruyenTranh .alert').html(data);
					$this.html("Thêm");
				},error : function(){
					$('#EditTruyenTranh .alert').removeClass('hidden');
					$('#EditTruyenTranh .alert').html('Đã xảy ra lỗi, hãy thử lại sau');
					$this.html("Thêm");
				}
			})
		}
	}
})

$('#del_list_truyentranh').click(function(){
	$confirm = confirm("Bạn có muốn xóa tất cả các truyện tranh không?");
	if($confirm == true)
	{
		$id_tt = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_tt[index] = $(this).attr('data-id');
		})

		if($id_tt.length === 0)
		{
			alert("Bạn chưa chọn mục nào cả!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'truyentranh.php',
				type : 'POST',
				data : {
					id_tt : $id_tt,
					action : 'del_list_truyentranh'
				},success : function(data){
					alert(data);
					location.reload();
				},error : function(){
					alert("Đã xảy ra lỗi, hãy thử lại sau");
				}
			})
		}
	}
	else
	{
		return false;
	}
})

$('.del_truyen_tranh').click(function(){
	$confirm = confirm("Bạn có muốn xóa truyện tranh này không?");
	if($confirm == true)
	{
		$id_tt = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'truyentranh.php',
			type : 'POST',
			data : {
				id_tt : $id_tt,
				action : 'del_truyentranh'
			},success : function(data){
				alert(data);
				location.reload();
			},error : function(){
				alert("Đã xảy ra lỗi, hãy thử lại sau");
			}
		})
	}
	else
	{
		return false;
	}
})
