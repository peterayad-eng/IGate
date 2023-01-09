<main>
    <?php
        $categoryid = $_GET['category'];
        $selectc_sql = "SELECT * FROM category where id = '{$categoryid}'";
        $resultc = mysqli_query($conn, $selectc_sql);
        $rowc = $resultc->fetch_assoc();
        $category=$rowc['value'];
    ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Products</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active"><a href="Products.php">Products</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <?php
                if(isset($_GET['editIerror']) && $_GET['editIerror'] == 0){
                    echo "<div style='color:green'>The Image uploaded successfully </div>";
				}
	
                if(isset($_GET['editDerror']) && $_GET['editDerror'] == 0){
                    echo "<div style='color:green'>The Data updated successfully </div>";
				}
					
                if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
                    echo "<div style='color:green'>The Product deleted successfully </div>";
				}
                else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                    echo "<div style='color:red'>The Product could not be deleted </div>";
				}
	
				if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                    echo "<div style='color:green'>The Product Added successfully </div>";
				}
            ?>
            <div class="row">	
				<?php 
                    $select_sql = "SELECT * FROM products where category = '{$category}'";
					$result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
				?>
                <div class="col-4">
                    <div class="card">
						<div class="card-header">
                            <strong class="card-title mb-3"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['title']?> <?php if ($categoryid == 4){ echo $row['category'];} ?> </strong>
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
								</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="ProductsEditImg.php?id=<?=$row['id']?>&category=<?=$categoryid?>">Edit Primary Image</a>
                                        <a class="dropdown-item" href="ProductsSecImg.php?id=<?=$row['id']?>&category=<?=$categoryid?>">Secondary Images</a>
                                        <a class="dropdown-item" href="ProductsEditData.php?id=<?=$row['id']?>&category=<?=$categoryid?>">Edit Data</a>
                                        <a class="dropdown-item deleteButton" href="ProductAfterDelete.php?id=<?=$row['id']?>&category=<?=$categoryid?>">Delete Product</a>
								    </div>										
								</div>
				            </div>
				        </div>

                        <div class="card-image" style="position:relative">
							<img class="card-image" alt="<?=$row['title']?>" src="../Images/products/<?=$row['primaryimage']?>">
                            <div class="corner-ribon black-ribon" ></div>
                        </div>
                        <hr>
                        <div class="card-body nopadd bottommargin">
                            <div class="twt-category">
                                <?php
                                    if($categoryid == 1 || $categoryid == 2 || $categoryid == 3){
                                        $selectp_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
                                        $resultp = mysqli_query($conn, $selectp_sql);
                                        $rowp = $resultp->fetch_assoc();
                                        $processor = $processor = $rowp['type']." ".$rowp['series']." ".$row['pmodel']." ".$row['pcache']."MB Cache";
                                        
                                        $vga = $row['vgatype']." ".$row['vgamodel'];
                                        if($row['exvgatype'] != "none"){
                                            $exvga = $row['exvgatype']." ".$row['exvgamodel'];
                                        }else{
                                            $exvga = "none";
                                        }
                                        
                                ?>
                                        <h3 class="text-sm-center mt-2 mb-1 height3line"><?=$processor?>, <?=$row['ram']?>GB RAM, <?=$row['hard']?>, <?php if($row['sechard'] != "none"){ echo $row['sechard'].', '; } ?>VGA <?php if($exvga != "none"){ echo $exvga; }else{echo $vga;} ?></h3>
                                <?php
                                    }elseif($categoryid == 4){
                                ?>
                                    <h3 class="text-sm-center mt-2 mb-1 height3line"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['category']?> <?=$row['display']?> inch, <?=$row['resolution']?>, <?php if($row['hdmi'] == "yes"){ echo 'HDMI'; } ?></h3>
                                <?php
                                    }elseif($categoryid == 5 || $categoryid == 7){
                                ?>
                                    <h3 class="text-sm-center mt-2 mb-1 height3line"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['description']?></h3>
                                <?php
                                    }elseif($categoryid == 6){
                                ?>
                                    <h3 class="text-sm-center mt-2 mb-1 height3line"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['papersize']?> <?php if($row['usb2'] != 0 || $row['usb3'] != 0){ echo ", USB"; } if($row['ethernet'] != "none"){ echo ", Ethernet"; } if($row['wifi'] == "yes"){ echo ", Wireless"; } ?> <?=$row['category']?></h3>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="twt-write col-sm-12 bottommargin">
                                <h3 class="text-sm-center mt-2 mb-1 price"><?=$row['price']?> EGP</h3>
				            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
				?>
            </div><!-- .row -->
            <div class="dbutton center bottommargin">
                <a href="ProductsAdd.php?&category=<?=$categoryid?>" class="btn btn-secondary btn-lg lbutton" role="button" aria-pressed="true">Add Product</a>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</main>	