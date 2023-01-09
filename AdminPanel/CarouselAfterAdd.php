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

		
		function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
		}
		
        define("SIZE", 5242880);
	  	$Addedid = $_POST['id'];
        $caption = test_input($_POST['caption']);
		$caption_ar = test_input($_POST['caption_ar']);
        $repeatflag=0;

		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        $select_sql = "SELECT * FROM carousel";
        $result = mysqli_query($conn, $select_sql);
        for($i=0;$i<$Addedid;$i++){
                $row = $result->fetch_assoc();
                if($caption == $row['caption']){
                    $repeatflag=$repeatflag+1;
                }
        }
    
        if($repeatflag == 0){
            if(array_key_exists('image', $_FILES)){
                if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    if($fileSize>SIZE){
                        header("location: CarouselAdds.php?editIerror=2&id=$Addedid");
                    }

                    else if (in_array($fileExtension,$fileExtensions)){
                        $imageName = basename($fileName);
                        $select_sql = "SELECT * FROM carousel";
                        $result = mysqli_query($conn, $select_sql);
                        for($i=0;$i<$result->num_rows;$i++){
                            $row = $result->fetch_assoc();
                            $image = $row['image'];
                            if ($imageName == $image ){
                                $imageName = "a".$imageName;
                            }
                        }
                        $sitepath= "Images/".$imageName;
                        $uploadpath= "../Images/".$imageName;
                        $upload= move_uploaded_file($fileTmpName, $uploadpath);
                        $added_sql = "INSERT INTO carousel (id, imagePath, caption, caption_ar) VALUES ('$Addedid', '$imageName', '$caption', '$caption_ar');";
                        if ($conn->query($added_sql) === TRUE) {
                            header("location: Carousel.php?adderror=0");
                        } else {
                            header("location: CarouselAdds.php?adderror=1&id=$Addedid");
                        }
                    }else{
                       header("location: CarouselAdds.php?editIerror=3&id=$Addedid");
                    }

                } else {
                  header("location: CarouselAdds.php?adderror=1&id=$Addedid");
                }
            }
        }else{
            header("location: CarouselAdds.php?adderror=2&id=$Addedid");
        }
?>