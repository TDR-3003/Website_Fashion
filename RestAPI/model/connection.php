<?php 
	class Connect
	{
		var $conn;
		function __construct()
		{
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'dacn1_fashion';
			$this->conn = new mysqli($host, $username, $password, $dbname);
			$this->conn->set_charset('utf8');
			
			if($this->conn->connect_error)
			{
				die("Kết nối thất bại - Connection Failed: ".$this->conn->connect_error);
			}
		}
	}
?>