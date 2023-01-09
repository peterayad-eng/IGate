<main>
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
                        <li class="active"><a href="#">Brand</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <?php
                if(isset($_GET['editDerror']) && $_GET['editDerror'] == 0){
                    echo "<div style='color:green'>The Data updated successfully </div>";
				}
					
                if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
                    echo "<div style='color:green'>The Brand deleted successfully </div>";
				}
                else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                    echo "<div style='color:red'>The Brand could not be deleted </div>";
				}
	
				if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                    echo "<div style='color:green'>The Brand Added successfully </div>";
				}
            ?>
            <div class="row">	
				<?php 
                    $color="text-primary border-primary";
                    $select_sql = "SELECT * FROM brand";
					$result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        if(fmod($i,4)==3){
									$color="text-danger border-danger";
								}
								elseif(fmod($i,4)==2){
									$color="text-warning border-warning";
								}
								elseif(fmod($i,4)==1){
									$color="text-success border-success";
								}
								else{
									$color="text-primary border-primary";
								}
								$row = $result->fetch_assoc();
				?>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body paddin">
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
								</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="BrandsEditData.php?id=<?=$row['id']?>">Edit</a>
                                        <a class="dropdown-item deleteButton" href="BrandAfterDelete.php?id=<?=$row['id']?>">Delete</a>
								    </div>										
								</div>
				            </div>
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="fa fa-bold fa-2x <?=$color?>"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Service (<?=$row['id']?>)</div>
                                    <div class="stat-digit"><?=$row['brand']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
				?>
            </div><!-- .row -->
            <div class="dbutton center bottommargin">
                <a href="BrandsAdd.php" class="btn btn-secondary btn-lg lbutton" role="button" aria-pressed="true">Add Brand</a>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</main>	