		<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="#">Admin Panel Users</a></li>
                            <li class="active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <?php
					if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
						echo "<div style='color:green'>The user deleted successfully </div>";
					}

					if(isset($_GET['editperror']) && $_GET['editperror'] == 0){
						echo "<div style='color:green'>The password updated successfully </div>";
					}
				?>
				<div class="row">
				
					<?php 
						$color="text-primary border-primary";
						$color_array = array('text-primary border-primary', 'text-success border-success', 'text-warning border-warning', 'text-danger border-danger');
						$select_sql = "SELECT * FROM users WHERE id>'0'";
						$result = mysqli_query($conn, $select_sql);
						for($i=0;$i<$result->num_rows;$i++){
								$row = $result->fetch_assoc();
								$color=$color_array[$i%4];
					?>
					<div class="col-12 col-md-6">
                        <div class="card" style="padding:2%">
                            <div class="card-body pb-0">
								<div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="UsersPassEdit.php?id=<?=$row['id']?>">Edit Password</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="stat-widget-one row">
                                    <div class="stat-icon dib col-xs-3"><i class="ti-user <?=$color?>"></i></div>
                                    <div class="stat-content dib col-xs-6">
                                        <div class="stat-text">User</div>
										<div class="stat-digit"><?=$row['user']?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						}
					?>
					</br>
					
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->