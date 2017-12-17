<?php
session_start();
error_reporting(0);
ini_set('display_errors', 'off');
ini_set('log_errors', 'on');
ini_set('error_log','public/error.php');

require_once 'controller/c_truyen_tranh.php';
$c_truyen_tranh = new C_truyen_tranh();
$data_web = $c_truyen_tranh->data_web();

$the_loai = $c_truyen_tranh->the_loai();
$truyen_hot = $c_truyen_tranh->truyen_hot();

$truyen_new = $c_truyen_tranh->truyen_new();
$truyen_n = $truyen_new['truyen_new'];
$trang_n = $truyen_new['trang'];

$truyen_full = $c_truyen_tranh->truyen_full();
$truyen_f = $truyen_full['truyen_full'];
$trang_f = $truyen_full['trang'];

$truyen_update = $c_truyen_tranh->truyen_update();
$truyen_up = $truyen_update['truyen_update'];
$trang_up = $truyen_update['trang'];

$truyen_toptuan = $c_truyen_tranh->truyen_toptuan();
$truyen_topthang = $c_truyen_tranh->truyen_topthang();


$chi_tiet_truyen = $c_truyen_tranh->chi_tiet_truyen();
$danh_sach_chapter = $c_truyen_tranh->danh_sach_chapter();
$danh_sach_chap = $danh_sach_chapter['danh_sach_chapter'];
$button_chap = $danh_sach_chapter['button'];
$total = $danh_sach_chapter['total'];
$id_chat = $danh_sach_chapter['id_chat'];

$tieu_de = $c_truyen_tranh->tieu_de();

$chi_tiet_chuyen_muc = $c_truyen_tranh->chi_tiet_chuyen_muc();
$chuyenmuc = $chi_tiet_chuyen_muc['the_loai'];
$trang = $chi_tiet_chuyen_muc['trang'];

$chi_tiet_chapter = $c_truyen_tranh->chi_tiet_chapter();
$chi_tiet = $chi_tiet_chapter['chi_tiet_chapter'];
$button = $chi_tiet_chapter['button'];

if(isset($_GET['chapter']) && $chi_tiet['ten_truyen_tranh'])
{
        if(!$_SESSION['luot_xem'])
	{
		$_SESSION['luot_xem'] = $_GET['id_tt'].'-'.$_GET['id_c'];
		$c_truyen_tranh->luot_xem_chapter();
		$c_truyen_tranh->luot_xem_truyentranh();
	}
	$_SESSION[$_GET['id_tt']] = $chi_tiet['ten_truyen_tranh'];
}
$truyen_vua_doc = $c_truyen_tranh->truyen_vua_doc($_SESSION);
?>