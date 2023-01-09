<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

		$fileExtensions=['jpeg','jpg','png'];
		$fileName = $_FILES['pimage']['name'];
		$fileSize = $_FILES['pimage']['size'];
		$fileTmpName  = $_FILES['pimage']['tmp_name'];
		$fileType = $_FILES['pimage']['type'];
        $tmp = explode('.', $fileName);
		$fileExtension = strtolower(end($tmp));

		
		function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
		}

        require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
		
        define("SIZE", 5242880);
        define("HARDSIZE", 30);
	  	$Addedid = $_POST['productid'];
        $title = test_input($_POST['title']);
		$title_ar = test_input($_POST['title_ar']);
        $categoryvalue = test_input($_POST['category']);
            $selectc_sql = "SELECT * FROM category WHERE value = '{$categoryvalue}'";
            $resultc = mysqli_query($conn, $selectc_sql);
            $rowc = $resultc->fetch_assoc();
            $categoryid = $rowc['id'];
        $brandvalue = test_input($_POST['brand']);
        $price = test_input($_POST['price']);
        
            //Computer Elements
            if($categoryvalue == "desktop" || $categoryvalue == "server" || $categoryvalue == "laptop" ){
                $processorseriesvalue = test_input($_POST['pseries']);
                $processormodel = test_input($_POST['pmodel']);
                $processorcache = test_input($_POST['pcache']);

                $ram = test_input($_POST['ram']);
                $ramtype = test_input($_POST['ramtype']);
                $phardsize = test_input($_POST['phard']);
                $phardtype = test_input($_POST['phardtype']);
                
                if($phardsize < HARDSIZE){
                    $phard = $phardsize."TB ".$phardtype;
                }else{
                    $phard = $phardsize."GB ".$phardtype;
                }
                
                $shardsize = test_input($_POST['shard']);
                if($shardsize != "none"){
                    $shardtype = test_input($_POST['shardtype']);
                    if($shardsize < HARDSIZE){
                        $shard = $shardsize."TB ".$shardtype;
                    }else{
                        $shard = $shardsize."GB ".$shardtype;
                    }
                }else{
                    $shard = "none";
                }
                $pvgatype = test_input($_POST['vgatype']);
                $pvgamodel = test_input($_POST['vgamodel']);
                
                $exvgatype = test_input($_POST['exvgatype']);
                if($exvgatype != "none"){
                    $exvgamodel = test_input($_POST['exvgamodel']);
                }else{
                    $exvgamodel = "none";
                }
                
            }else{
                $processorseriesvalue = "none";
                $processormodel = "none";
                $processorcache = 0;
                $ram = 0;
                $ramtype = 0;
                $phard = "none";
                $shard = "none";
                $pvgatype = "none";
                $pvgamodel = "none";
                $exvgatype = "none";
                $exvgamodel = "none";
            }
        
        //Monitor Elements
        if($categoryvalue == "laptop" || $categoryvalue == "monitor"){
            $display = test_input($_POST['display']);
            $resolution = test_input($_POST['resolution']);
            $hdmi = test_input($_POST['hdmi']);
        }else{
            $display = 0;
            $resolution = "none";
            $hdmi = "none";
        }

            //Interfaces Elements
            if($categoryvalue == "desktop" || $categoryvalue == "server" || $categoryvalue == "laptop" || $categoryvalue == "monitor"|| $categoryvalue == "printer"){
                $ethernet = test_input($_POST['ethernet']);
                $wifi = test_input($_POST['wifi']);
                $usb2 = test_input($_POST['usb2']);
                $usb3 = test_input($_POST['usb3']);
                $usbc = test_input($_POST['usbc']);
            }else{
                $ethernet = "none";
                $wifi = "none";
                $usb2 = 0;
                $usb3 = 0;
                $usbc = 0;
            }

        //Speed Elements
        if($categoryvalue == "printer"){
            $speed = test_input($_POST['speed']);
            $papersize = test_input($_POST['papersize']);
        }else{
            $speed = 0;
            $papersize = "none";
        }

            //Description Elements
            if($categoryvalue == "acc" || $categoryvalue == "network"|| $categoryvalue == "printer"){
                $description = test_input($_POST['description']);
                $description_ar = test_input($_POST['description_ar']);
            }else{
                $description = "none";
                $description_ar = "none";
            }

        $repeatflag=0;
		
        $select_sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $select_sql);
        for($i=0;$i<$Addedid;$i++){
                $row = $result->fetch_assoc();
                if($title == $row['title']){
                    $repeatflag=$repeatflag+1;
                }
        }
    
        if($repeatflag == 0){
            if(array_key_exists('pimage', $_FILES)){
                if ($_FILES['pimage']['error'] === UPLOAD_ERR_OK) {
                    if($fileSize>SIZE){
                        header("location: ProductsAdd.php?editIerror=2&category=$categoryid");
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
                        $sitepath= "Images/products/".$imageName;
                        $uploadpath= "../Images/products/".$imageName;
                        $upload= move_uploaded_file($fileTmpName, $uploadpath);
                        $added_sql = "INSERT INTO products (id, title, title_ar, category, brand, primaryimage, secimages, pseries, pmodel, pcache, ram, ramtype, hard, sechard, vgatype, vgamodel, exvgatype, exvgamodel, display, resolution, ethernet, wifi, usb2, usb3, usbc, hdmi, speed, papersize, description, description_ar, price) VALUES ('$Addedid', '$title', '$title_ar', '$categoryvalue', '$brandvalue', '$imageName', '$imageName', '$processorseriesvalue', '$processormodel', '$processorcache', '$ram', '$ramtype', '$phard', '$shard', '$pvgatype', '$pvgamodel', '$exvgatype', '$exvgamodel', '$display', '$resolution', '$ethernet', '$wifi', '$usb2', '$usb3', '$usbc', '$hdmi', '$speed', '$papersize', '$description', '$description_ar', '$price');";
                        if ($conn->query($added_sql) === TRUE) {
                            header("location: ProductsMain.php?adderror=0&category=$categoryid");
                        } else {
                            header("location: ProductsAdd.php?adderror=1&category=$categoryid");
                        }
                    }else{
                       header("location: ProductsAdd.php?editIerror=3&category=$categoryid");
                    }

                } else {
                  header("location: ProductsAdd.php?adderror=1&category=$categoryid");
                }
            }
        }else{
            header("location: ProductsAdd.php?adderror=2&category=$categoryid");
        }
?>