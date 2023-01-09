<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

		function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
		}
		
			$id = $_POST['id'];
			$oldpass = test_input($_POST['oldpass']);
			$newpass = test_input($_POST['newpass']);
			
			require_once "connect.php";	
			$connec = new con();
			$conn = $connec->connect();
			
			$check_sql = "SELECT * FROM users WHERE id = '{$id}'";
			$check = mysqli_query($conn, $check_sql);
			$check_row = $check->fetch_assoc();
			
			if($check_row['pass'] == $oldpass){
				$update_sql = "UPDATE users SET pass='{$newpass}' WHERE id = '{$id}'";
				if ($conn->query($update_sql) === TRUE) {
					header("location: UsersEdit.php?editperror=0");
				} else {
					header("location: UsersPassEdit.php?editperror=1&id=$id");
				}
			}
			else{
				header("location:UsersPassEdit.php?editperror=2&id=$id");
			}

?>