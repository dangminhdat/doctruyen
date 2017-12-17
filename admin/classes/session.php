<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
/**
* 
*/
class session
{
	
	public function start()
	{
		session_start();
	}

	public function set_session($key,$value)
	{
		$_SESSION[$key] = $value;
	}

	public function get_session($key)
	{
		if(isset($_SESSION[$key]))
		{
			$user = $_SESSION[$key];
		}
		else
		{
			$user = '';
		}
		return $user;
	}

	public function destroy()
	{
		session_destroy();
	}
}
?>