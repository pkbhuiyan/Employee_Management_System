<?php
	class Connect
	{
		var $hostname;
		var $database;
		var $username;
		var $password;
		
		public $connect;
		
		public function connection ($hostname,$database,$username,$password)
		{
			$this->hostname=$hostname;
			$this->database=$database;
			$this->username=$username;
			$this->password=$password;
			$connect= new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
		
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->setAttribute(PDO::ATTR_PERSISTENT, true);
		
		return $connect;
		}
	}
	
	$connection_object= new connect();
?>