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
        $imageno = $_GET['no'];

		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        $select_sql = "SELECT * FROM products WHERE id = '{$deletedid}'";
        $result = mysqli_query($conn, $select_sql);
        $row = $result->fetch_assoc();
        $secImg = $row['secimages'];
        $secimagesarray = explode(",",$secImg);
        $removedimg = $secimagesarray[$imageno];
        array_splice($secimagesarray,$imageno,1);
        $secimages = implode(",",$secimagesarray);
        $path="../Images/products/".$removedimg;
        

		$update_sql = "UPDATE products SET secimages='{$secimages}' WHERE id = '{$deletedid}'";
        if ($conn->query($update_sql) === TRUE) {
            unlink($path);
            header("location: ProductsSecImg.php?deleteerror=0&id=$deletedid&category=$categoryid");
		} else {
			header("location: ProductsSecImg.php?deleteerror=1&id=$deletedid&category=$categoryid");
		}
?>