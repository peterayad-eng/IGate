<main>
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
                        <li class="active"><a href="#">Carousel</a></li>
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
				<?php 
                    $select_sql = "SELECT * FROM carousel";
					$result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
				?>
                <div class="col-4">
                    <div class="card">
						<div class="card-header">
                            <strong class="card-title mb-3">Slide (<?=$row['id']?>)</strong>
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
								</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="CarouselEditImgs.php?id=<?=$row['id']?>">Edit Image</a>
                                        <a class="dropdown-item" href="CarouselEditDatas.php?id=<?=$row['id']?>">Edit Label</a>
                                        <a class="dropdown-item deleteButton" href="CarouselAfterDelete.php?id=<?=$row['id']?>">Delete Slide</a>
								    </div>										
								</div>
				            </div>
				        </div>
							
                        <div style="position:relative">
							<img class="card-image" alt="<?=$row['imagePath']?>" src="../Images/<?=$row['imagePath']?>">
                            <div class="corner-ribon black-ribon" ></div>
                        </div>
                        <hr>
                        <div class="card-body nopadd bottommargin">
                            <div class="twt-category">
                                <h3 class="text-sm-center mt-2 mb-1 height2line"><?=$row['caption']?></h3>
                            </div>
                            <div class="twt-write col-sm-12 bottommargin">
                                <h5 class="text-sm-center mt-2 mb-1 height2line"><?=$row['caption_ar']?></h5>
				            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
				?>
            </div><!-- .row -->
            <div class="dbutton center bottommargin">
                <a href="CarouselAdds.php" class="btn btn-secondary btn-lg lbutton" role="button" aria-pressed="true">Add Slide</a>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</main>	