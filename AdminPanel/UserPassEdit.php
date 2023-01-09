	<?php
	$updatedid = $_GET['id'];
	?>
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
					if(isset($_GET['editperror']) && $_GET['editperror'] == 1){
						echo "<div style='color:red'>The password could not be updated </div>";
					}
					
					if(isset($_GET['editperror']) && $_GET['editperror'] == 2){
						echo "<div style='color:red'>The old password is incorrect </div>";
					}
				?>
				<div class="row">
					<?php 
						$select_sql = "SELECT * FROM users WHERE id = '{$updatedid}'";
						$result = mysqli_query($conn, $select_sql);
						$row = $result->fetch_assoc();
					?>
					<div class="col-lg-6">
						<div class="card">
						  <div class="card-header">
							<strong>Edit User</strong>
						  </div>
						  <form action="UserPassAfterEdit.php" method="post" class="form-horizontal">
							<div class="card-body card-block">
							  <div class="row form-group">
								<div class="col col-md-3"><label for="hf-email" class=" form-control-label">User Name</label></div>
										<input type="hidden" name="id" value="<?=$updatedid?>"/>
										<div class="col-12 col-md-9"><input type="text" id="hf-email" name="user" class="form-control" value="<?=$row['user']?>" disabled></div>							  
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="hf-password" class=" form-control-label">Old Password</label></div>
									<div class="col-12 col-md-9"><input type="password" id="hf-password" name="oldpass" placeholder="Enter The Old Password" class="form-control"><span class="help-block">Please enter old password</span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="hf-password" class=" form-control-label">New Password</label></div>
									<div class="col-12 col-md-9"><input type="password" id="hf-password" name="newpass" placeholder="Enter The New Password" class="form-control"><span class="help-block">Please enter new password</span></div>
								</div>
							</div>
							  <div class="card-footer center">
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Submit
								</button>
								<button type="reset" class="btn btn-danger btn-sm">
								  <i class="fa fa-ban"></i> Reset
								</button>
							  </div>
						  </form>
						</div>
					</div>
				</div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->