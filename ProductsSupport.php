<?php
	require_once "connect.php";	
	$connec = new con();
	$conn = $connec->connect();
	
	require_once "header.php";
	require_once "ProductsPhoto.php";
    require_once "ProductsServices.php";
	require_once "footer.php";
	
	$connec->disconnect($conn);
?>