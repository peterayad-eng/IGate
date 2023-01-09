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
					header("location: ProductsSecImg.php?editIerror=2&id=$id&category=$categoryid");
				}
				
				else if (in_array($fileExtension,$fileExtensions)){
                    $imageName = basename($fileName);
                    $select_sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
                        $secImg = $row['secimages'];
                        $secImgarray = explode(",",$secImg);
                        $secImgarraycount = count($secImgarray);
                        for($j=0;$j<$secImgarraycount;$j++){  
                            if ($imageName == $secImgarray[$j]){
                                $imageName = "a".$imageName;
                            }else{
                                continue;
                            }
                        }
                    }
                    
                    $selectu_sql = "SELECT * FROM products WHERE id = '{$id}'";
                    $resultu = mysqli_query($conn, $selectu_sql);
                    $rowu = $resultu->fetch_assoc();
                    $secimages = $rowu['secimages'];
                    $secimagesarray = explode(",",$secimages);
                    array_push($secimagesarray,$imageName);
                    $secimages = implode(",",$secimagesarray);
					$sitepath= "Images/products/".$imageName;
					$uploadpath= "../Images/products/".$imageName;
					$upload= move_uploaded_file($fileTmpName, $uploadpath);
					$update_sql = "UPDATE products SET secimages='{$secimages}' WHERE id = '{$id}'";
					if ($conn->query($update_sql) === TRUE) {
						header("location: ProductsSecImg.php?editIerror=0&id=$id&category=$categoryid");
					} else {
						header("location: ProductsSecImg.php?editIerror=1&id=$id&category=$categoryid");
					}
				}else{
					header("location: ProductsSecImg.php?editIerror=3&id=$id&category=$categoryid");
				}
				
			} else {
			  header("location: ProductsSecImg.php?editIerror=1&id=$id&category=$categoryid");
			}
		}
?>