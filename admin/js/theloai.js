$_DOMAIN = 'http://datdangtin.byethost12.com/admin/';

function slug(id)
{
	var title = $('.title').val();
	var slug = title.toLowerCase();

	slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    $(id).val(slug);
}

$('.title').change(function(){
	slug('#slug_theloai');
	slug('#edit_slug_theloai');
	slug('#slug_truyentranh');
})

$('#AddTheLoai button').click(function(){
	$this = $('#AddTheLoai button');
	$this.html("Đang thêm...");

	$ten_theloai = $('#AddTheLoai #ten_theloai').val();
	$slug_theloai = $('#AddTheLoai #slug_theloai').val();

	if($ten_theloai == '' || $slug_theloai == '')
	{
		$('#AddTheLoai .alert').removeClass('hidden');
		$('#AddTheLoai .alert').html("Vui lòng điền đầy đủ thông tin");
		$this.html("Thêm");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'theloai.php',
			type : 'POST',
			data : {
				ten_theloai : $ten_theloai,
				slug_theloai : $slug_theloai,
				action : 'add_theloai'
			},success : function(data){
				$('#AddTheLoai .alert').removeClass('hidden');
				$('#AddTheLoai .alert').html(data);
				$this.html("Thêm");
			},error : function(){
				$('#AddTheLoai .alert').removeClass('hidden');
				$('#AddTheLoai .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Thêm");
			}
		})
	}
})
$('#EditTheLoai button').click(function(){
	$this = $('#EditTheLoai button');
	$this.html("Đang cập nhật...");

	$id_cm = $('#EditTheLoai').attr('data-id');
	$ten_theloai = $('#EditTheLoai #edit_ten_theloai').val();
	$slug_theloai = $('#EditTheLoai #edit_slug_theloai').val();

	if($ten_theloai == '' || $slug_theloai == '')
	{
		$('#EditTheLoai .alert').removeClass('hidden');
		$('#EditTheLoai .alert').html("Vui lòng điền đầy đủ thông tin");
		$this.html("Cập nhật");
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'theloai.php',
			type : 'POST',
			data : {
				id_cm : $id_cm,
				ten_theloai : $ten_theloai,
				slug_theloai : $slug_theloai,
				action : 'edit_theloai'
			},success : function(data){
				$('#EditTheLoai .alert').removeClass('hidden');
				$('#EditTheLoai .alert').html(data);
				$this.html("Cập nhật");
			},error : function(){
				$('#EditTheLoai .alert').removeClass('hidden');
				$('#EditTheLoai .alert').html("Đã xảy ra lỗi, hãy thử lại sau");
				$this.html("Cập nhật");
			}
		})
	}
})

$('.list input[type="checkbox"]:eq(0)').click(function(){
	$('.list input[type="checkbox"]').prop('checked',$(this).prop('checked'));
})

$('#del_list_theloai').click(function(){
	$confirm = confirm("Bạn có chắc muốn xóa hết tất cả các thể loại không?");
	if($confirm == true)
	{
		$id_cm = [];

		$('.list input[type="checkbox"]:checkbox:checked').each(function(index){
			$id_cm[index] = $(this).attr('data-id');
		});

		if($id_cm.length === 0)
		{
			alert("Bạn chưa chọn thể loại nào!");
			return false;
		}
		else
		{
			$.ajax({
				url : $_DOMAIN + 'theloai.php',
				type : 'POST',
				data : {
					id_cm : $id_cm,
					action : 'del_list_theloai'
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

$('.del_theloai').click(function(){
	$confirm = confirm("Bạn có chắc muốn thể loại này không?");
	if($confirm == true)
	{
		$id_cm = $(this).attr('data-id');

		$.ajax({
			url : $_DOMAIN + 'theloai.php',
			type : 'POST',
			data : {
				id_cm : $id_cm,
				action : 'del_theloai'
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