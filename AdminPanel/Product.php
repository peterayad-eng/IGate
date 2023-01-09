<main>
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
                        <li class="active"><a href="#">Products</a></li>
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
                    echo "<div style='color:green'>The Slide deleted successfully </div>";
				}
                else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                    echo "<div style='color:red'>The Slide could not be deleted </div>";
				}
	
				if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                    echo "<div style='color:green'>The Slide Added successfully </div>";
				}
            ?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=1"><i class="fas fa-desktop producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->

                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=2"><i class="fas fa-server producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->

                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=3"><i class="fas fa-laptop producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
                
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=4"><i class="fas fa-tv producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
                
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=5"><i class="fas fa-keyboard producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
                
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=6"><i class="fas fa-print producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
                
                <div class="col-lg-3 col-md-6">
                    <div class="social-box">
                        <a href="ProductsMain.php?category=7"><i class="fas fa-network-wired producticons"></i></a>
                    </div>
                    <!--/social-box-->
                </div><!--/.col-->
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
</main>	