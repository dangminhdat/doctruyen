<?php
require_once 'database.php';
/**
* 
*/
class M_truyen_tranh extends database
{
	public function data_web()
	{
		$sql = "SELECT * FROM website";
		return $this->fetch_assoc($sql,1);
	}
	public function the_loai()
	{
		$sql = "SELECT * FROM theloai";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_hot()
	{
		$sql = "SELECT tt.*,c.* FROM `chuong` c INNER JOIN truyentranh tt ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE c.chapter = (SELECT MAX(chapter) FROM `chuong` WHERE ten_truyen_tranh = tt.ten_truyen_tranh) ORDER BY c.id_c DESC LIMIT 7";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_update($vitri=-1,$limit=-1)
	{
		$sql = "SELECT tt.*,c.* FROM `chuong` c INNER JOIN truyentranh tt ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE c.chapter = (SELECT MAX(chapter) FROM `chuong` WHERE ten_truyen_tranh = tt.ten_truyen_tranh) ORDER BY c.id_c DESC";
		if($vitri>-1&&$limit>0)
		{
			$sql .= " LIMIT $vitri,$limit";
		}
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_new($vitri=-1,$limit=-1)
	{
		$sql = "SELECT tt.*,c.* FROM `chuong` c INNER JOIN truyentranh tt ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE c.chapter = (SELECT MAX(chapter) FROM `chuong` WHERE ten_truyen_tranh = tt.ten_truyen_tranh) ORDER BY tt.id_tt DESC";
		if($vitri>-1&&$limit>0)
		{
			$sql .= " LIMIT $vitri,$limit";
		}
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_full($vitri=-1,$limit=-1)
	{
		$sql = "SELECT * FROM truyentranh WHERE trang_thai = 1";
		if($vitri>-1&&$limit>0)
		{
			$sql .= " LIMIT $vitri,$limit";
		}
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_toptuan()
	{
		$sql = "SELECT tt.*,c.* FROM `chuong` c INNER JOIN truyentranh tt ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE c.luot_xem = (SELECT MAX(luot_xem) FROM chuong WHERE ten_truyen_tranh = tt.ten_truyen_tranh) AND DATEDIFF(c.ngay_tao,now()) < 7 GROUP BY tt.id_tt ORDER BY c.luot_xem DESC LIMIT 10";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function truyen_topthang()
	{
		$sql = "SELECT tt.*,c.* FROM `chuong` c INNER JOIN truyentranh tt ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE c.luot_xem = (SELECT MAX(luot_xem) FROM chuong WHERE ten_truyen_tranh = tt.ten_truyen_tranh) AND DATEDIFF(c.ngay_tao,now()) < 30 GROUP BY tt.id_tt ORDER BY c.luot_xem DESC LIMIT 10";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function tieu_de($id_cm)
	{
		$sql = "SELECT * FROM theloai WHERE slug = '$id_cm'";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,1);
		}
		return false;
	}
	public function chi_tiet_chuyen_muc($id_cm,$vitri=-1,$limit=-1)
	{
		$result = array();
		$sql = "SELECT * FROM truyentranh";
		if($vitri>-1&&$limit>0)
		{
			$sql .= " LIMIT $vitri,$limit";
		}
		@$data = $this->fetch_assoc($sql,0);
		$sql = "SELECT * FROM theloai WHERE slug = '$id_cm'";
		@$theloai = $this->fetch_assoc($sql,1);
		if(@$data)
		{
			foreach ($data as $key => $value) {
				if($theloai['ten_chuyen_muc'] != '')
				{
					if(preg_match('#'.$theloai['ten_chuyen_muc'].'#',$value['the_loai']))
					{
						$result[] = $value;
					}
				}
			}
		}
		return $result;
	}
	public function chi_tiet_truyen($id_tt)
	{
		$sql = "SELECT tt.*,MAX(c.chapter) as tong_chap FROM `truyentranh` tt INNER JOIN chuong c ON tt.ten_truyen_tranh = c.ten_truyen_tranh WHERE tt.slug LIKE '$id_tt'";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,1);
		}
		return false;
	}
	public function danh_sach_chapter($id_tt,$start=-1,$limit=-1)
	{
		$sql = "SELECT * FROM chuong c INNER JOIN truyentranh tt ON c.ten_truyen_tranh = tt.ten_truyen_tranh WHERE tt.slug Like '$id_tt' ORDER BY chapter ASC";
		if($start>-1&&$limit>0)
                {
                        $sql .= " LIMIT $start,$limit";
                }
                if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function chi_tiet_chapter($id_tt,$chapter)
	{
		$sql = "SELECT * FROM `chuong` WHERE chapter = '$chapter' AND ten_truyen_tranh = (SELECT ten_truyen_tranh FROM truyentranh WHERE slug = '$id_tt')";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,1);
		}
		return false;
	}
	public function truyen_vua_doc($truyen)
	{
		$sql = "SELECT * FROM truyentranh WHERE ten_truyen_tranh = '$truyen'";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,1);
		}
		return false;
	}
	public function tim_kiem($search)
	{
		$sql = "SELECT * FROM `truyentranh` WHERE ten_truyen_tranh LIKE '%$search%'";
		if($this->num_rows($sql))
		{
			return $this->fetch_assoc($sql,0);
		}
		return false;
	}
	public function luot_xem_chapter($id_c)
	{
		$sql = "UPDATE chuong SET luot_xem = luot_xem + 1 WHERE id_c = '$id_c'";
		return $this->query($sql);
	}
	public function luot_xem_truyentranh($slug)
	{
		$sql = "UPDATE truyentranh SET luot_xem = luot_xem + 1 WHERE slug = '$slug'";
		return $this->query($sql);
	}
}
?>	