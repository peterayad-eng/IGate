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
		
        $file_sql = "SELECT * FROM carousel WHERE id = '{$deletedid}'";
        $fileresult = mysqli_query($conn, $file_sql);
        $filerow = $fileresult->fetch_assoc();
        $image=$filerow['imagePath'];
        $path="../Images/".$image;
        

		$delete_sql = "DELETE FROM carousel WHERE id = '{$deletedid}'";

        if ($conn->query($delete_sql) === TRUE) {
            unlink($path);
			$select_sql = "SELECT * FROM carousel";
			$result = mysqli_query($conn, $select_sql);
			for($i=0;$i<$result->num_rows;$i++){
				$row = $result->fetch_assoc();
				$newid=$i+1;
				$caption=$row['caption'];
				$update_sql = "UPDATE carousel SET id = '{$newid}' WHERE caption='{$caption}'";
				$updateid = mysqli_query($conn, $update_sql);
			}
            header("location: Carousel.php?deleteerror=0");
		} else {
			header("location: Carousel.php?deleteerror=1");
		}
?>