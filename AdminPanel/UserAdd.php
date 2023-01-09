		<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="#">Admin Panel Users</a></li>
                            <li class="active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <?php
					if(isset($_GET['addmerror']) && $_GET['addmerror'] == 1){
						echo "<div style='color:red'>The User Name is invalid </div>";
					}
					
					if(isset($_GET['addmerror']) && $_GET['addmerror'] == 2){
						echo "<div style='color:red'>This User is already registered </div>";
					}
					
					if(isset($_GET['addmerror']) && $_GET['addmerror'] == 3){
						echo "<div style='color:red'>The Password did not match </div>";
					}
				?>
				<div id="pass" style='color:red'></div>
				<div id="services" class="row">
					<div class="col-12">
						<div class="card">
						  <div class="card-header">
							<strong>Add New User</strong>
						  </div>
						  <form action="UserAfterAdd.php" method="post" class="form-horizontal">
							<div class="card-body card-block">
							  <div class="row form-group">
								<div class="col-12 col-md-3 middlevertical"><label for="hf-email" class=" form-control-label">User Name</label></div>
									<?php
										if(isset($_GET['user'])){
											$user=$_GET['user'];
									?>
										<div class="col-12 col-md-9"><input type="text" id="hf-email" name="user" placeholder="Enter User Name" class="form-control" value="<?=$user?>" required><span class="help-block">Please enter User Name</span></div>							  
									<?php
										} else{
									?>
										<div class="col-12 col-md-9"><input type="text" id="hf-email" name="user" placeholder="Enter User Name" class="form-control"><span class="help-block" required>Please enter User Name</span></div>							  
									<?php
									}
									?>
								</div>
								<div class="row form-group">
									<div class="col-12 col-md-3 middlevertical"><label for="hf-password" class=" form-control-label">Password</label></div>
									<div class="col-12 col-md-9"><input type="password" id="hf-password" name="password" placeholder="Enter Password..." class="form-control" onchange="check()" oninput="check()" required><span class="help-block">Please enter your password</span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3 middlevertical"><label for="hf-password" class=" form-control-label">Confirm Password</label></div>
									<div class="col-12 col-md-9"><input type="password" id="hf-cpassword" name="cpassword" placeholder="Enter Password again..." class="form-control" onchange="check()" oninput="check()" required><span class="help-block">Please confirm your password</span></div>
								</div>
							</div>
							  <div class="card-footer center">
								<button type="submit" class="btn btn-primary btn-sm" id="add">
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
		<script>
			function check(){
				var pass= document.getElementById('hf-password');
				var cpass= document.getElementById('hf-cpassword');
				if( pass.value != cpass.value){
					var div = document.getElementById('pass');
					div.innerHTML = 'Password must be matched';
					document.getElementById("add").disabled = true;
				}
				else{
					var div = document.getElementById('pass');
					div.innerHTML = '';
					document.getElementById("add").disabled = false;
				}
				
			}
		</script>