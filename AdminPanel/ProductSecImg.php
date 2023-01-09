<main>
    <?php
        $id = $_GET['id'];
        $categoryid = $_GET['category'];
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

    <div id="services">
        <div class="animated fadeIn">
            <?php
                if(isset($_GET['editIerror']) && $_GET['editIerror'] == 0){
                    echo "<div style='color:green'>The Image Added successfully </div>";
				}
	
                elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 1){
                    echo "<div style='color:red'>The Image could not be uploaded </div>";
				}
                elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 2){
                    echo "<div style='color:red'>The Image Must be less than 5MB </div>";
				}
                elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 3){
                    echo "<div style='color:red'>The File Must be an image </div>";
                }
					
                if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
                    echo "<div style='color:green'>The Product deleted successfully </div>";
				}
                else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                    echo "<div style='color:red'>The Product could not be deleted </div>";
				}
	
            ?>
            <div class="row bottommargin">	
				<?php 
                    $select_sql = "SELECT * FROM products where id = '{$id}'";
					$result = mysqli_query($conn, $select_sql);
                    $row = $result->fetch_assoc();
                    $secImg = $row['secimages'];
                    $secimagesarray = explode(",",$secImg);
                    $secarraycount = count($secimagesarray);
                    for($i=1;$i<$secarraycount;$i++){  
				?>
                <div class="col-4">
                    <div class="card">
                        <div class="card-image" style="position:relative">
							<img class="card-image" alt="<?=$secimagesarray[$i]?>" src="../Images/products/<?=$secimagesarray[$i]?>">
                            <div class="corner-ribon black-ribon" ></div>
                        </div>
                        <hr>
                        <div class="card-body nopadd bottommargin">
                            <div class="twt-write bottommargin center">
                                <a class="btn btn-secondary deleteButton" href="ProductSecImgAfterDelete.php?id=<?=$id?>&category=<?=$categoryid?>&no=<?=$i?>">Delete Image</a>
				            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
				?>
            </div><!-- .row -->
            
            <div class="login-form">
                 <div class="login-logo">
                    <h2> Add Secondary Image </h2>
                </div>
                <form  action="ProductSecImgAfterAdd.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <input type="hidden" name="categoryid" value="<?=$categoryid?>"/>
                    <div class="form-group row col-12 nopadd bottommargin">
                        <h5 class="col-12 center">Upload Image</h5>
                        <div class="col-sm-3 center database">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="col-sm-9 nopadd">
                            <div class="text-left dib row col-sm-12">
                                <div class="stat-heading col-sm-12">Select image to upload (jpg or png images only):</div>
                                <div class="stat-text col-sm-12"><input type="file" name="image" required/></div>
                                <div class="stat-text col-sm-12">MaxSize:5MB</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="center submitbtn">
                        <button type="submit" class="btn btn-success save">Add</button>
                    </div>
                </form>
			</div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
</main>	