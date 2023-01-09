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
	  	$caption = test_input($_POST['caption']);
		$caption_ar = test_input($_POST['caption_ar']);
        $repeatflag=0;


		require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        $select_sql = "SELECT * FROM carousel";
        $result = mysqli_query($conn, $select_sql);
        $Addedid= $result->num_rows;
        for($i=0;$i<$Addedid;$i++){
                $row = $result->fetch_assoc();
                if($caption == $row['caption']){
                    if($id == $row['id']){
                        continue;
                    }else{
                        $repeatflag=$repeatflag+1;
                    }
                }
        }

        if($repeatflag == 0){
            $update_sql = "UPDATE carousel SET caption='{$caption}', caption_ar='{$caption_ar}'  WHERE id = '{$id}'";
            if ($conn->query($update_sql) === TRUE) {
                header("location: Carousel.php?editDerror=0");
            } else {
                header("location: CarouselEditDatas.php?editDerror=1&id=$id");
            } 
        }else{
            header("location: CarouselEditDatas.php?editDerror=2&id=$id");
        }
?>