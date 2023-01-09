<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login.php");
			exit();
		}
	}

        require_once "connect.php";	
		$connec = new con();
		$conn = $connec->connect();
        
		function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
		}
		
        define("HARDSIZE", 30);
        $updatedid = $_POST['productid'];
	  	$title = test_input($_POST['title']);
		$title_ar = test_input($_POST['title_ar']);
        $categoryvalue = test_input($_POST['category']);
            $selectc_sql = "SELECT * FROM category WHERE value = '{$categoryvalue}'";
            $resultc = mysqli_query($conn, $selectc_sql);
            $rowc = $resultc->fetch_assoc();
            $categoryid = $rowc['id'];
        $brandvalue = test_input($_POST['brand']);
        $price = test_input($_POST['price']);
        $repeatflag=0;

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
		
        $select_sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $select_sql);
        for($i=0;$i<$Addedid;$i++){
                $row = $result->fetch_assoc();
                if($title == $row['title']){
                    if($updatedid == $row['id']){
                        continue;
                    }else{
                        $repeatflag=$repeatflag+1;
                    }
                }
        }

        if($repeatflag == 0){
            $update_sql = "UPDATE products SET title='{$title}', title_ar='{$title_ar}', category='{$categoryvalue}', brand='{$brandvalue}', pseries='{$processorseriesvalue}', pmodel='{$processormodel}', pcache='{$processorcache}', ram='{$ram}', ramtype='{$ramtype}', hard='{$phard}', sechard='{$shard}', vgatype='{$pvgatype}', vgamodel='{$pvgamodel}', exvgatype='{$exvgatype}', exvgamodel='{$exvgamodel}', display='{$display}', resolution='{$resolution}', ethernet='{$ethernet}', wifi='{$wifi}', usb2='{$usb2}', usb3='{$usb3}', usbc='{$usbc}', hdmi='{$hdmi}', speed='{$speed}', papersize='{$papersize}', description='{$description}', description_ar='{$description_ar}', price='{$price}' WHERE id = '{$updatedid}'";
            if ($conn->query($update_sql) === TRUE) {
                header("location: ProductsMain.php?editDerror=0&category=$categoryid");
            } else {
                header("location: ProductsEditData.php?editDerror=1&id=$id&category=$categoryid");
            } 
        }else{
            header("location: ProductsEditData.php?editDerror=2&id=$id&category=$categoryid");
        }
?>