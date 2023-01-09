<main>
    <?php
        $updatedid = $_GET['id'];
        $select_sql = "SELECT * FROM brand WHERE id = '{$updatedid}'";
        $result = mysqli_query($conn, $select_sql);
        $row = $result->fetch_assoc();
    ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Brand</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active"><a href="Brands.php">Brand</a></li>
                    </ol>
                </div>
            </div>
         </div>
    </div>
    <div id="services">
        <?php
            if(isset($_GET['editDerror']) && $_GET['editDerror'] == 1){
			echo "<div style='color:red'>The Data could not be updated </div>";
            }
            elseif(isset($_GET['editDerror']) && $_GET['editDerror'] == 2){
                echo "<div style='color:red'>This Brand Exist </div>";
            }
        ?>
        <div class="animated fadeIn">
           <div class="login-form">
                 <div class="login-logo">
                    <h2> Edit Slide Data </h2>
                </div>
                <form  action="BrandAfterEditData.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$updatedid?>"/>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>English Name</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter English Brand Name" name="brand" value="<?=$row['brand']?>" required></div>
                    </div>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>Arabic Name</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter Arabic Brand Name" name="brand_ar" value="<?=$row['brand_ar']?>" required></div>
                    </div>
                
					<div class="center submitbtn">
                        <button type="submit" class="btn btn-success save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>