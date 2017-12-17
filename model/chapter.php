<?php
require_once 'database.php';
/**
* 
*/
class Chapter extends database
{
	private $total_chapter,
			$truyen_tranh,
			$chapter,
			$id_chapter;	
	function __construct($total_chapter,$truyen_tranh,$chapter,$id_chapter)
	{
		$this->total_chapter = $total_chapter;
		$this->truyen_tranh = $truyen_tranh;
		$this->chapter = $chapter;
		$this->id_chapter = $id_chapter;
	}
	function show_chapter()
	{
		parent::__construct();
		$prev = '';
		if($this->chapter > 1)
		{
			$sql = "SELECT * FROM chuong WHERE chapter = ($this->chapter-1) AND ten_truyen_tranh = (SELECT ten_truyen_tranh FROM truyentranh WHERE slug = '$this->truyen_tranh')";
			$data1 = $this->fetch_assoc($sql,1);
			$prev .= '<a href="'.$this->truyen_tranh.'-chap-'.($this->chapter-1).'/'.$data1['id_c'].'.html"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Trước</button></a>';
		}
		$next = '';
		if($this->chapter < $this->total_chapter)
		{
			$sql2 = "SELECT * FROM chuong WHERE chapter = ($this->chapter+1) AND ten_truyen_tranh = (SELECT ten_truyen_tranh FROM truyentranh WHERE slug = '$this->truyen_tranh')";
			$data2 = $this->fetch_assoc($sql2,1);
			$next .= '<a href="'.$this->truyen_tranh.'-chap-'.($this->chapter+1).'/'.$data2['id_c'].'.html"<button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-right"></span> Sau</button></a>';
		}
		$list = 
			'	Chọn chapter:
				<form method="POST" onsubmit="return false" id="chaper" data-id="'.$this->truyen_tranh.'">
				<input type="text" value="'.$this->chapter.'" size="2"> '.$this->total_chapter.'
									<button class="btn btn-info btn-sm" type="submit" id="go">GO!</button>
				</form>';
		$html = $prev.$list.$next;
		return $html;							
	}
}
?>