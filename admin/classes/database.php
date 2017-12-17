<?php if(!defined('DAT_DANG')) die('Page Not Found'); ?>
<?php
/**
* 
*/
class database
{
	private $hostname = 'datdangtin.byethost12.com',
			$username = 'root',
			$password = '',
			$database = 'codethuan_doctruyen';
	public $conn = null;
			
	public function connect()
	{
		if(!$this->conn)
		{
			$this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
		}
	}
	public function disconnect()
	{
		if($this->conn)
		{
			mysqli_close($this->conn);
		}
	}

	public function query($sql=null)
	{
		if($this->conn)
		{
			mysqli_query($this->conn,$sql);
		}
	}

	public function num_rows($sql = null)
	{
		if($this->conn)
		{
			$result = mysqli_query($this->conn,$sql);
			if($result)
			{
				$row = mysqli_num_rows($result);
			}
			return $row;
		}
	}

	public function fetch_assoc($sql=null,$type)
	{
		if($this->conn)
		{
			$result = mysqli_query($this->conn,$sql);
			if($result)
			{
				if($type == 0)
				{
					while ($data = mysqli_fetch_assoc($result)) {
						$row[] = $data;
					}
					return $row;
				}
				else if($type == 1)
				{
					$row = mysqli_fetch_assoc($result);
					return $row;
				}
			}
		}
	}

	public function insert_in()
	{
		if ($this->conn) {
			$count = mysqli_insert_id($this->conn);
			if ($count == '0') {
				$count = '1';
			}
			else{
				$count = $count;
			}
			return $count;
		}
	}

	public function set_charset($unicode)
	{
		if($this->conn)
		{
			mysqli_set_charset($this->conn,$unicode);
		}
	}
}
?>