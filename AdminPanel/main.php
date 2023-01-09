<main>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <?php
                if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
                    echo "<div style='color:green'>The paragraph deleted successfully </div>";
				}
                else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                    echo "<div style='color:red'>The paragraph could not be deleted </div>";
				}
	
                if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                    echo "<div style='color:green'>The Mail added successfully </div>";
				}
            ?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="Carousel.php"><img class="card-image" src="images/carouel.png"></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->

                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="Products.php"><img class="card-image" src="images/products.jpg"></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->

                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="Brands.php"><img class="card-image" src="images/brand.jpg"></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
                
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
</main>