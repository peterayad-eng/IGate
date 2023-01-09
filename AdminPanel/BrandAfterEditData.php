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
        $Addedid= $result->num_rows;
        for($i=0;$i<$Addedid;$i++){
            $row = $result->fetch_assoc();
            if($value == $row['value']){
                if($id == $row['id']){
                    continue;
                }else{
                    $repeatflag=$repeatflag+1;
                }
            }
        }

        if($repeatflag == 0){
            $update_sql = "UPDATE brand SET brand='{$brand}', brand_ar='{$brand_ar}', value='{$value}'  WHERE id = '{$id}'";
            if ($conn->query($update_sql) === TRUE) {
                header("location: Brands.php?editDerror=0");
            } else {
                header("location: BrandsEditData.php?editDerror=1&id=$id");
            } 
        }else{
            header("location: BrandsEditData.php?editDerror=2&id=$id");
        }
?>