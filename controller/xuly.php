<?php
require_once '../model/m_truyen_tranh.php';
if(isset($_POST['action']))
{
	$action = trim(addslashes(htmlspecialchars($_POST['action'])));
	if($action == 'go')
	{
		$chapter = trim(addslashes(htmlspecialchars($_POST['chapter'])));
		$truyen_tranh = trim(addslashes(htmlspecialchars($_POST['truyen_tranh'])));
		$m_truyen_tranh = new M_truyen_tranh();
		$chi_tiet_chapter = $m_truyen_tranh->chi_tiet_chapter($truyen_tranh,$chapter);
		echo $truyen_tranh.'-chap-'.$chi_tiet_chapter['chapter'].'/'.$chi_tiet_chapter['id_c'].'.html';
	}
	else if($action == 'timkiem')
	{
		$search = trim(addslashes(htmlspecialchars($_POST['search'])));
		$m_truyen_tranh = new M_truyen_tranh();
		$ketqua = $m_truyen_tranh->tim_kiem($search);
?>
		<h4 style="margin-left: 20px">Tìm được <?php echo (@$ketqua)?count($ketqua):0;?> kết quả cho từ khóa '<?=$search?>'</h4>
		<div class="col-xs-12">
<?php
		if($ketqua)
		foreach ($ketqua as $key => $value) {
?>
			<div class="col-md-6 chuyenmuc">
				<div class="media">
					<a class="media-left pull-left" href="<?=$value['slug']?>.jsp">
						<img class="media-object" width="100" height="150" src="<?=$value['hinh_dai_dien']?>" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="<?=$value['slug']?>.jsp"><?=$value['ten_truyen_tranh']?></a></h4>
						<p>Thể loại: <?=$value['the_loai']?></p>
						<p>Tác giả: <?=$value['tac_gia']?></p>
						<p>Lần đọc:<?=$value['luot_xem']?></p>
						<p>Update: <?=$value['ngay_tao']?></p>
					</div>
				</div>
			</div>
<?php		
		}
		echo "</div>";
	}
}	
?>