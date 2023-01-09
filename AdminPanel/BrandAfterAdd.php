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
		
        $Addedid = $_POST['id'];
        $brand = test_input($_POST['brand']);
        $p=strpos($brand, ' ');
        if($p == FALSE){
            $value=$brand;
        }else{
            $value=substr($brand, 0, strpos($brand, ' '));
        }
		$brand_ar = test_input($_POST['brand_ar']);
        $repeatflag=0;


		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        $select_sql = "SELECT * FROM brand";
        $result = mysqli_query($conn, $select_sql);
        for($i=0;$i<$Addedid;$i++){
            $row = $result->fetch_assoc();
            if($value == $row['value']){
                $repeatflag=$repeatflag+1;
            }
        }

        if($repeatflag == 0){
            $added_sql = "INSERT INTO brand (id, brand, brand_ar, value) VALUES ('$Addedid', '$brand', '$brand_ar', '$value');";
            if ($conn->query($added_sql) === TRUE) {
                header("location: Brands.php?adderror=0");
            } else {
                header("location: BrandsAdd.php?adderror=1&id=$Addedid");
            }
        }else{
            header("location: BrandsAdd.php?adderror=2&id=$Addedid");
        }
?>