<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

		$deletedid = $_GET['id'];

		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();

		$delete_sql = "DELETE FROM brand WHERE id = '{$deletedid}'";

        if ($conn->query($delete_sql) === TRUE) {
			$select_sql = "SELECT * FROM brand";
			$result = mysqli_query($conn, $select_sql);
			for($i=0;$i<$result->num_rows;$i++){
				$row = $result->fetch_assoc();
				$newid=$i+1;
				$value=$row['value'];
				$update_sql = "UPDATE brand SET id = '{$newid}' WHERE value='{$value}'";
				$updateid = mysqli_query($conn, $update_sql);
			}
            header("location: Brands.php?deleteerror=0");
		} else {
			header("location: Brands.php?deleteerror=1");
		}
?>