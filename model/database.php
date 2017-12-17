<?php
/**
* 	class database
*/
class database
{
	private $hostname = 'datdangtin.byethost12.com',
			$username = 'root',
			$password = '',
			$database = 'codethuan_doctruyen';	

	public $conn = '';

	// hàm kết nối
	public function __construct()
	{
		$this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
		mysqli_set_charset($this->conn,'utf8');
	}

	// hàm hủy
	public function disconnect()
	{
	 	if ($this->conn) {
	 		mysqli_close($this->conn);
	 	}
	} 

	// hàm truy vấn
	public function query($sql = NULL)
	{
		if ($this->conn) {
			mysqli_query($this->conn,$sql);
		}
	}

	// hàm đếm số hàng trả về
	public function num_rows($sql = NULL)
	{
		if ($this->conn) {
			$result = mysqli_query($this->conn,$sql);
			if ($result) {
				$rows = mysqli_num_rows($result);
				return $rows;
			}
		}
	}

	// hàm lấy dữ liệu
	public function fetch_assoc($sql = NULL,$type)
	{
		if ($this->conn) {
			$result = mysqli_query($this->conn,$sql);
			if ($result) {
				if($type == 0){
					// lấy danh sách dữ liệu
					while ($data = mysqli_fetch_assoc($result)) {
						$rows[] = $data;
					}
					return $rows;
				}else if ($type == 1) {
					// lấy một hàng dữ liệu
					$rows = mysqli_fetch_assoc($result);
					return $rows;
				}
			}
			else
			{
				$rows[] = '';
				return $rows;
			}
		}
	}

	// lấy id cao nhất trong danh sách
	public function insert_id()
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

	// hàm set charset database
	public function set_charset($unicode)
	{
		if ($this->conn) {
			mysqli_set_charset($this->conn,$unicode);
		}
	}
}
?>