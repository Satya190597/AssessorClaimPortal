<?php
	class connection
	{
		public $hostname='';
		public $username='';
		public $password='';
		public $dbname='';
		function getConnection()
		{
			$con = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname) or die("Unable to connect to database ...");
			return $con;
		}
	}
?>