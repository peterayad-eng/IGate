<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

		$fileExtensions=['jpeg','jpg','png'];
		$fileName = $_FILES['image']['name'];
		$fileSize = $_FILES['image']['size'];
		$fileTmpName  = $_FILES['image']['tmp_name'];
		$fileType = $_FILES['image']['type'];
        $tmp = explode('.', $fileName);
		$fileExtension = strtolower(end($tmp));
        $id = $_POST['id'];
        $categoryid = $_POST['categoryid'];
        define("SIZE", 5242880);
		
		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();

		if(array_key_exists('image', $_FILES)){
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                if($fileSize>SIZE){
					header("location: ProductsEditImg.php?editIerror=2&id=$id&category=$categoryid");
				}
				
				else if (in_array($fileExtension,$fileExtensions)){
                    $imageName = basename($fileName);
                    $select_sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
                        $image = $row['primaryimage'];
                        if ($imageName == $image ){
                            $imageName = "a".$imageName;
                        }
                    }
                    
                    $select_sql = "SELECT * FROM products WHERE id = '{$id}'";
                    $result = mysqli_query($conn, $select_sql);
                    $row = $result->fetch_assoc();
                    $oldImage = "../Images/products/".$row['primaryimage'];
                    $secimages = $row['secimages'];
                    $secimagesarray = explode(",",$secimages);
                    $secimagesarray[0] = $imageName;
                    $secimages = implode(",",$secimagesarray);
                    
					$sitepath= "Images/products/".basename($fileName);
					$uploadpath= "../Images/products/".basename($fileName);
					$upload= move_uploaded_file($fileTmpName, $uploadpath);
					$update_sql = "UPDATE products SET primaryimage='{$imageName}', secimages='{$secimages}' WHERE id = '{$id}'";
					if ($conn->query($update_sql) === TRUE) {
                        unlink($oldImage);
						header("location: ProductsMain.php?editIerror=0&category=$categoryid");
					} else {
						header("location: ProductsEditImg.php?editIerror=1&id=$id&category=$categoryid");
					}
				}else{
					header("location: ProductsEditImg.php?editIerror=3&id=$id&category=$categoryid");
				}
				
			} else {
			  header("location: ProductsEditImg.php?editIerror=1&id=$id&category=$categoryid");
			}
		}
?>