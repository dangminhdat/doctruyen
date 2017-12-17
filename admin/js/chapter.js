$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

$('#TimKiemChapter button').click(function(){
	$search = $('#TimKiemChapter #truyen_tranh_timkiem').val();
	if($search != '')
	{
		$.ajax({
			url : $_DOMAIN + 'chapter.php',
			type : 'POST',
			data : {
				search : $search,
				action : 'search_chapter'
			},success : function(data){
				$('#show_tim').html(data);
			}
		})
	}
	else
	{
		return false;
	}
})


function pre_img_list()
{
	img_up = $('#name_img').val();
	count_img_up = $('#name_img').get(0).files.length;
	$('.pre_img').removeClass('hidden');
	$('.pre_img').html('<p><label>Ảnh xem trước</label></p>');
	if(img_up != '')
	{
		for (var i = 0; i < count_img_up; i++) {
			$('.pre_img').append('<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="border: 1px solid #ddd; width: 100px; height: 100px; margin-right: 5px; margin-bottom: 5px;"/>');
		}
	}
	else
	{
		$('.pre_img').addClass('hidden');
		$('.pre_img').html('');
	}
}

$('#Chapter').submit(function(){
	$this = $('#Chapter button');
	$this.html("Đang thêm...");

	$trang_thai = $('#Chapter input[name="trang_thai"]:radio:checked').val();
	$id_chapter = $('#Chapter #id_chapter').val();
	$ten_chapter= $('#Chapter #ten_chapter').val();
	$ten_truyentranh = $('#Chapter #ten_truyentranh').val();
        $link_hinh_anh = $('#Chapter #link_hinh_anh').val();
	img_up = $('#name_img').val();

	if($id_chapter == '' || $ten_chapter == '' || $ten_truyentranh == '')
	{
		$('#Chapter .alert').removeClass('hidden');
		$('#Chapter .alert').html("Vui lòng điền đầy đủ thông tin");
		$this.html("Thêm");
	}
	else if(img_up == '')
	{
		if($link_hinh_anh == '')
		{
			$('#Chapter .alert').removeClass('hidden');
			$('#Chapter .alert').html("Vui lòng chọn hình ảnh cho chapter");
			$this.html("Thêm");
		}
		else
		{
			$(this).ajaxSubmit({
				data : {
					trang_thai : $trang_thai,
					id_chapter : $id_chapter,
					ten_chapter : $ten_chapter,
					ten_truyentranh : $ten_truyentranh,
					link_hinh_anh : $link_hinh_anh,
					action : 'add_chapter'
				},success : function(data){
					$('#Chapter .alert').attr('class','alert alert-success');
					$('#Chapter .alert').html(data);
					$this.html("Thêm");
				},error : function(){
					$('#Chapter .alert').removeClass('hidden');
					$('#Chapter .alert').html("Đã xảy ra lỗi, hãy thử lại.");
					$this.html("Thêm");
				}
			})
		}	
	}
	else
	{
		count_img_up = $('#name_img').get(0).files.length;
		size_img = 0;
		type_img = 0;

		for (var i = 0; i < count_img_up; i++) {
			size = $('#name_img').get(0).files[i].size;
			if(size > 5242880)
			{
				size_img += 1;
			}
			else
			{
				size_img += 0;
			}
		}
		for (var i = 0; i < count_img_up; i++) {
			type = $('#name_img').get(0).files[i].type;
			if(type != 'image/jpeg' && type != 'image/png' && type != 'image/gif')
			{
				type_img += 1;
			}
			else
			{
				type_img += 0;
			}
		}
		if(size_img > 0)
		{
			$('#Chapter .alert').removeClass('hidden');
			$('#Chapter .alert').html("Một bức ảnh có dung lượng lớn hơn 5MB");
			$this.html("Thêm");
		}
		else if(type_img > 0)
		{
			$('#Chapter .alert').removeClass('hidden');
			$('#Chapter .alert').html("Một bức ảnh có định dạng không cho phép");
			$this.html("Thêm");
		}
		else
		{
			$(this).ajaxSubmit({
				data : {
					id_chapter : $id_chapter,
					ten_truyentranh : $ten_truyentranh,
					ten_chapter : $ten_chapter,
					trang_thai : $trang_thai,
					action : 'add_chapter'
				},success : function(data){
					$('#Chapter .alert').attr('class','alert alert-success');
					$('#Chapter .alert').html(data);
					$this.html("Thêm");
				},error : function(){
					$('#Chapter .alert').removeClass('hidden');
					$('#Chapter .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
					$this.html("Thêm");
				}
			})
		}
	}
})

$('#EditChapter button').click(function(){
	$this = $('#EditChapter button');
	$this.html("Đang cập nhật...");

	$trang_thai = $('#EditChapter input[name="edit_trang_thai"]:radio:checked').val();
	$id_c = $('#EditChapter').attr('data-id');
	$id_chapter = $('#EditChapter #edit_id_chapter').val();
	$ten_chapter = $('#EditChapter #edit_ten_chapter').val();
	$link_hinh_anh = $('#EditChapter #edit_link_hinh_anh').val();
	$ten_truyentranh = $('#EditChapter #edit_ten_truyentranh').val();

	if($id_chapter == '' || $ten_chapter == '' || $trang_thai == '')
	{
		$('#EditChapter .alert').removeClass('hidden');
		$('#EditChapter .alert').html("Vui lòng điền đầy đủ thông tin");
		$this.html("Cập nhật");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'chapter.php',
			type : 'POST',
			data : {
				id_c : $id_c,
				trang_thai : $trang_thai,
				id_chapter : $id_chapter,
				ten_chapter : $ten_chapter,
				link_hinh_anh : $link_hinh_anh,
				ten_truyentranh : $ten_truyentranh,
				action : 'edit_chapter'
			},success : function(data){
				$('#EditChapter .alert').removeClass('hidden');
				$('#EditChapter .alert').html(data);
				$this.html("Cập nhật");
			},error : function(){
				$('#EditChapter .alert').removeClass('hidden');
				$('#EditChapter .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Cập nhật");
			}
		})
	}
})

$('#del_list_chapter').click(function(){
	$confirm = confirm("Bạn có chắc muốn xóa hết tất cả các chapter không?");
	if($confirm == true)
	{
		$id_c = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_c[index] = $(this).attr('data-id');
		});

		if($id_c.length === 0)
		{
			alert("Bạn chưa chọn chapter nào!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'chapter.php',
				type : 'POST',
				data : {
					id_c : $id_c,
					action : 'del_list_chapter'
				},success : function(data){
					alert(data);
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

$('.del_chapter').click(function(){
	$confirm = confirm("Bạn có chắc muốn chapter này không?");
	if($confirm == true)
	{
		$id_c = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'chapter.php',
			type : 'POST',
			data : {
				id_c : $id_c,
				action : 'del_chapter'
			},success : function(data){
				alert(data);
				location.reload();
			}
		})
	}
	else
	{
		return false;
	}
})