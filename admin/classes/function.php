<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
/**
* 
*/

class redirect
{
	
	function __construct($url = null)
	{
		if($url)
		{
			echo "<script>location.href = '".$url."'</script>";
		}
	}
// slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
//     slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
//     slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
//     slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
//     slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
//     slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
//     slug = slug.replace(/đ/gi, 'd');
//     slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
//     slug = slug.replace(/ /gi, "-");
//     slug = slug.replace(/\-\-\-\-\-/gi, '-');
//     slug = slug.replace(/\-\-\-\-/gi, '-');
//     slug = slug.replace(/\-\-\-/gi, '-');
//     slug = slug.replace(/\-\-/gi, '-');
//     slug = '@' + slug + '@';
//     slug = slug.replace(/\@\-|\-\@|\@/gi, '');
	function slug($title)
	{
		if(!$title) return false;

		$array = array(
			'a'=>'á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'i|í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'' =>'`|~|!|@|#|||$|%|^|&|*|(|)|+|=|,|.|/|?|>|<|\'|"|:|;|_',
			'-'=>' '
			);
		foreach ($array as $key => $value) {
			$arrP = explode('|',$value);
			
			foreach ($arrP as $keyC => $valueC) {
				$title = str_replace($valueC,$key,$title);
			}
		}
		$title = strtolower($title);
    	return $title;
	}

    function changelink($string)
	{
		$result = "";
		$pattern = '#\'<img src="(.*)" .*/>\'#imsU';
		preg_match_all($pattern,$string,$matches);	
		foreach ($matches[1] as $key => $value) {
			$result .= ','.$value;
		}
		$result= trim($result,',');
		return $result;
	}
}

?>