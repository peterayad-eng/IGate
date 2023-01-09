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
		
	  	
		if($_POST['user'] != ""){        
			$user = test_input($_POST['user']);
			$pass = test_input($_POST['password']);
			$cpass = test_input($_POST['cpassword']);
			
			if ($pass != $cpass) {
				header("location: UsersAdd.php?addmerror=3&user=$user");
			}
			
            require_once "connect.php";	
            $connec = new con();
            $conn = $connec->connect();
				
            $check_sql = "SELECT * FROM users WHERE user = '{$user}'";
            $check = mysqli_query($conn, $check_sql);
            if($check->num_rows == 0){
                $select_sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $select_sql);
                $Addedid= $result->num_rows +1;
                $added_sql = "INSERT INTO users (id, user, pass) VALUES ('$Addedid', '$user', '$pass');";
                if ($conn->query($added_sql) === TRUE) {
                    header("location: index.php?adderror=0");
				} else {
                    header("location: UsersAdd.php?addmerror=1&user=$user");
				}
            }
            else{
                header("location: UsersAdd.php?addmerror=2&user=$user");
            }
		}
		else{
				header("location: UsersAdd.php?addmerror=1&user=$user");	
		}
				
?>