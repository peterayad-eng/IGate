<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

		$deletedid = $_GET['id'];
        $categoryid = $_GET['category'];

		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        $file_sql = "SELECT * FROM products WHERE id = '{$deletedid}'";
        $fileresult = mysqli_query($conn, $file_sql);
        $filerow = $fileresult->fetch_assoc();
        $image=$filerow['primaryimage'];
        $path="../Images/products/".$image;
        

		$delete_sql = "DELETE FROM products WHERE id = '{$deletedid}'";

        if ($conn->query($delete_sql) === TRUE) {
            unlink($path);
			$select_sql = "SELECT * FROM products";
			$result = mysqli_query($conn, $select_sql);
			for($i=0;$i<$result->num_rows;$i++){
				$row = $result->fetch_assoc();
				$newid=$i+1;
				$title=$row['title'];
				$update_sql = "UPDATE products SET id = '{$newid}' WHERE title='{$title}'";
				$updateid = mysqli_query($conn, $update_sql);
			}
            header("location: ProductsMain.php?deleteerror=0&category=$categoryid");
		} else {
			header("location: ProductsMain.php?deleteerror=1&category=$categoryid");
		}
?>