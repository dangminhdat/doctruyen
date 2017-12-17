<?php
require_once 'model/m_truyen_tranh.php';
require_once 'model/pager.php';
require_once 'model/chapter.php';
/**
* 
*/
class C_truyen_tranh
{
	public function data_web()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$data_web = $m_truyen_tranh->data_web();
		return $data_web;
	}
	public function the_loai()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$the_loai = $m_truyen_tranh->the_loai();
		return $the_loai;
	}
	public function truyen_new()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_new = $m_truyen_tranh->truyen_new();
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		$pager = new Pagination(count($truyen_new),$current_page,4,5);
		$limit = $pager->limit;
		$vitri = ($current_page - 1)*$limit;
		$truyen_new = $m_truyen_tranh->truyen_new($vitri,$limit);
		$trang = $pager->show_html();
		return array('truyen_new'=>$truyen_new,'trang'=>$trang);
	}
	public function truyen_hot()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_hot = $m_truyen_tranh->truyen_hot();
		return $truyen_hot;
	}
	public function truyen_update()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_update = $m_truyen_tranh->truyen_update();
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		$pager = new Pagination(count($truyen_update),$current_page,4,5);
		$limit = $pager->limit;
		$vitri = ($current_page - 1)*$limit;
		$truyen_update = $m_truyen_tranh->truyen_update($vitri,$limit);
		$trang = $pager->show_html();
		return array('truyen_update'=>$truyen_update,'trang'=>$trang);
	}
	public function truyen_full()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_full = $m_truyen_tranh->truyen_full();
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		$pager = new Pagination(count($truyen_full),$current_page,4,5);
		$limit = $pager->limit;
		$vitri = ($current_page - 1)*$limit;
		$truyen_full = $m_truyen_tranh->truyen_full($vitri,$limit);
		$trang = $pager->show_html();
		return array('truyen_full'=>$truyen_full,'trang'=>$trang);
	}
	public function truyen_toptuan()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_toptuan = $m_truyen_tranh->truyen_toptuan();
		return $truyen_toptuan;
	}
	public function truyen_topthang()
	{
		$m_truyen_tranh = new M_truyen_tranh();
		$truyen_topthang = $m_truyen_tranh->truyen_topthang();
		return $truyen_topthang;
	}
	public function tieu_de()
	{
		$id_cm = isset($_GET['id_cm'])?$_GET['id_cm']:false;
		$m_truyen_tranh = new M_truyen_tranh();
		$tieu_de = $m_truyen_tranh->tieu_de($id_cm);
		return $tieu_de;
	}
	public function chi_tiet_chuyen_muc()
	{
		$id_cm = isset($_GET['id_cm'])?ucfirst($_GET['id_cm']):false;
		$m_truyen_tranh = new M_truyen_tranh();
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		$the_loai = $m_truyen_tranh->chi_tiet_chuyen_muc($id_cm);
		$pager = new Pagination(count($the_loai),$current_page,2,5);
		$limit = $pager->limit;
		$vitri = ($current_page - 1)*$limit;
		$the_loai = $m_truyen_tranh->chi_tiet_chuyen_muc($id_cm,$vitri,$limit);
		$trang = $pager->show_html();
		return array('the_loai'=>$the_loai,'trang'=>$trang);
	}
	public function chi_tiet_truyen()
	{
		$id_tt = isset($_GET['id_tt'])?$_GET['id_tt']:false;
		$m_truyen_tranh = new M_truyen_tranh();
		$chi_tiet_truyen = $m_truyen_tranh->chi_tiet_truyen($id_tt);
		return $chi_tiet_truyen;
	}
	public function danh_sach_chapter()
	{
		$id_tt = isset($_GET['id_tt'])?$_GET['id_tt']:false;
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 100;
		$start = ($page - 1) * $limit;
		$m_truyen_tranh = new M_truyen_tranh();
		$danh_sach_chapter = $m_truyen_tranh->danh_sach_chapter($id_tt);
		$id_chat = $danh_sach_chapter[count($danh_sach_chapter) - 1]['id_c'];
		$total_page = ceil(count($danh_sach_chapter)/$limit);
		$list = '<ul class="pagination">';
		for ($i=1; $i <= $total_page; $i++) { 
			if($page == $i)
			{
				$list .= '<li><a style="background: #ccc">'.$i.'</a></li>';
			}
			else
			{
				$list .= '<li><a href="'.$danh_sach_chapter[0]['slug'].'.jsp/page/'.$i.'">'.$i.'</a></li>';
			}
		}
		$list .= '</ul>';
		$danh_sach_chapter = $m_truyen_tranh->danh_sach_chapter($id_tt,$start,$limit);
		return array('danh_sach_chapter'=>$danh_sach_chapter,'button'=>$list,'total'=>count($danh_sach_chapter),'id_chat'=>$id_chat);
	}
	public function chi_tiet_chapter()
	{
		$id_tt = isset($_GET['id_tt'])?$_GET['id_tt']:false;
		$id_c = isset($_GET['id_c'])?$_GET['id_c']:false;
		$chapter = isset($_GET['chapter'])?$_GET['chapter']:false;
		$m_truyen_tranh = new M_truyen_tranh();
		$chi_tiet_chapter = $m_truyen_tranh->chi_tiet_chapter($id_tt,$chapter);
		$danh_sach_chapter = $m_truyen_tranh->danh_sach_chapter($id_tt);
		$class_chapter = new Chapter(count($danh_sach_chapter),$id_tt,$chapter,$id_c);
		$button = $class_chapter->show_chapter();
		return array('chi_tiet_chapter'=>$chi_tiet_chapter,'button'=>$button);
	}
	public function truyen_vua_doc($array)
	{
		$m_truyen_tranh = new M_truyen_tranh();
		foreach ($array as $key => $value) {
			$result[] = $m_truyen_tranh->truyen_vua_doc($value);
		}
		if(@$result)
		{
			$result = array_reverse($result);
			return $result;
		}
		return false;
	}
	public function luot_xem_chapter()
	{
		$id_c = isset($_GET['id_c'])?$_GET['id_c']:false;
		$m_truyen_tranh = new M_truyen_tranh();
		return $m_truyen_tranh->luot_xem_chapter($id_c);
	}
	public function luot_xem_truyentranh()
	{
		$id_tt = isset($_GET['id_tt'])?$_GET['id_tt']:false;
		$m_truyen_tranh = new M_truyen_tranh();
		return $m_truyen_tranh->luot_xem_truyentranh($id_tt);
	}
}
?>