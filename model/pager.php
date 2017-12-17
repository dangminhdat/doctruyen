<?php
/**
* 
*/
class Pagination
{
	private $total_truyen_tranh,
			$total_page,
			$current_page,
			$limit_link;
	public $limit;		
	function __construct($total_truyen_tranh,$current_page=1,$limit=1,$limit_link=1)
	{
		$this->total_truyen_tranh = $total_truyen_tranh;
		$this->current_page = $current_page;
		if($limit_link % 2 ==0)
		{
			$limit_link = $limit_link + 1;
		}
		$this->limit_link = $limit_link;
		$this->limit = $limit;
		$this->total_page = ceil($total_truyen_tranh/$limit);
	}
	function show_html()
	{
		$html = '';
		if($this->total_page > 1)
		{
			$actual_link = isset($_SERVER['https'])?'https':'http'."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if(preg_match('#trang-chu#',$actual_link))
			{
				$actual_link = substr($actual_link,0,-9);
			}
			if(isset($_GET['page']))
			{
				if($_GET['page']>=10)
				{
					$actual_link = substr($actual_link,0,-7);
				}
				else
				{
					$actual_link = substr($actual_link,0,-6);	
				}
			}
			else
			{
				if(!preg_match('#\/#',substr($actual_link,-1)))
				{
					$actual_link .= '/';
				}
			}
			$prev = '';
			$start = '';
			if($this->current_page > 1)
			{
				$prev = '<li><a href="'.$actual_link.'page/'.($this->current_page-1).'">&laquo;</a></li>';
				$start = '<li><a href="'.$actual_link.'page/1">Start</a></li>';
			}
			$next = '';
			$end = '';
			if($this->current_page < $this->total_page)
			{
				$next = '<li><a href="'.$actual_link.'page/'.($this->current_page+1).'">&raquo;</a></li>';
				$end = '<li><a href="'.$actual_link.'page/'.$this->total_page.'">End</a></li>';
			}
			if($this->limit_link < $this->total_page)
			{
				if($this->current_page == 1)
				{
					$startPage = 1;
					$endPage = $this->limit_link;
				}
				else if($this->current_page == $this->total_page)
				{
					$startPage = $this->total_page - $this->limit_link;
					$endPage = $this->total_page;
				}
				else
				{
					$startPage = $this->current_page - ($this->limit_link - 1)/2;
					$endPage = $this->current_page + ($this->limit_link - 1)/2;
					if($startPage < 1)
					{
						$startPage = 1;
						$endPage = $endPage + 1;
					}
					else if($endPage > $this->total_page)
					{
						$endPage = $this->total_page;
						$startPage = $endPage - $this->limit_link;
					}
				}
			}
			else
			{
				$startPage = 1;
				$endPage = $this->total_page;
			}
			$list = '';
			for ($i=$startPage; $i <= $endPage; $i++) { 
				if($this->current_page == $i)
				{
					$list .= '<li><a style="background: #ccc">'.$i.'</a></li>';
				}
				else
				{
					$list .= '<li><a href="'.$actual_link.'page/'.$i.'">'.$i.'</a></li>';
				}
			}
			$html = '<ul class="pagination col-xs-11">'.$start.$prev.$list.$next.$end.'</ul>';
		}
		return $html;
	}
}
?>