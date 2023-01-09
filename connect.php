<?php
class con{
	public static $dbname= "id12449460_igate";
	public static $hostname= "localhost";
	public static $username= "root";
	public static $pass= "";
	public function connect() {
		$con = mysqli_connect(self::$hostname, self::$username, self::$pass, self::$dbname);
		if($con == false){
			die(mysqli_connect_error());
		}
		return $con;
	}
	public function disconnect($con) {
		mysqli_close($con);
	}
}
?>