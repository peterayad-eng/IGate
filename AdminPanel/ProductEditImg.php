<main>
<?php
	$updatedid = $_GET['id'];
    $categoryid = $_GET['category'];
?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Carousel</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active"><a href="Carousel.php">Carousel</a></li>
                    </ol>
                </div>
            </div>
         </div>
    </div>
    <div id="services">
        <div class="animated fadeIn">
            <?php
                if(isset($_GET['editIerror']) && $_GET['editIerror'] == 1){
                    echo "<div style='color:red'>The Image could not be uploaded </div>";
				}
                elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 2){
                    echo "<div style='color:red'>The Image Must be less than 5MB </div>";
				}
                elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 3){
                    echo "<div style='color:red'>The File Must be an image </div>";
				}
            ?>
            <div class="login-form">
                 <div class="login-logo">
                    <h2> Update Product Primary Image </h2>
                </div>
                <form  action="ProductAfterEditImg.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$updatedid?>"/>
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
                        <button type="submit" class="btn btn-success save">Save</button>
                    </div>
                </form>
			</div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
</main>