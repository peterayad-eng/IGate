<main>
    <?php
        $select_sql = "SELECT * FROM brand";
        $result = mysqli_query($conn, $select_sql);
        $Addedid = $result->num_rows+1;
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
            if(isset($_GET['adderror']) && $_GET['adderror'] == 1){
                echo "<div style='color:red'>The Brand could not be added </div>";
            }
            elseif(isset($_GET['adderror']) && $_GET['adderror'] == 2){
                echo "<div style='color:red'>This Brand Exist </div>";
            }
        ?>
        <div class="animated fadeIn">
           <div class="login-form">
                 <div class="login-logo">
                    <h2> Add Brand </h2>
                </div>
                <form  action="BrandAfterAdd.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$Addedid?>"/>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>English Name</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter English Brand Name" name="brand" required></div>
                    </div>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>Arabic Name</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter Arabic Brand Name" name="brand_ar" required></div>
                    </div>
                    
					<div class="center submitbtn">
                        <button type="submit" class="btn btn-success save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>