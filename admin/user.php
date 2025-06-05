<!-- Header -->
<?php include 'include/header.php' ?>
<!-- Header -->

<?php   
if ($user->get_session() == true) { 
	$uID = $user->get_UId();   
	$data = $user->getDataByUid($uID);  

	if (isset($_POST['upd'])){ 
		$userName = $_POST['username'];
		$email = $_POST['email'];
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$Address = $_POST['address'];
		$City = $_POST['city'];
		$Country = $_POST['country'];
		$phonenumber = $_POST['phonenumber'];
		$Aboutme = $_POST['aboutme']; 
		$update = $user->updateDataByUID($userName, $email, $firstName, $lastName, $Address, $City, $Country, $phonenumber, $Aboutme, $date, $uID);
		if($update){
			echo "<script type='text/javascript'>alert('User Update Success');</script>";
		}else{
			echo "<script type='text/javascript'>alert('User Update Failed');</script>";
		}
		echo "<script type='text/javascript'>window.location='user'</script>";
	}
}else{
	header("location:index");
}
?>
<body>
	<div class="wrapper ">
		<!-- SideBar -->
		<?php include 'include/sidebar.php' ?>
		<!-- SideBar -->

		<div class="main-panel">
			<!-- NavBar -->
			<?php include 'include/navbar.php' ?>
			<!-- NavBar -->

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<?php foreach($data as $dt) { ?>
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Profile</h4>
									</div>
									<div class="card-body">
										<form action="" method="post">
											<div class="row">
												<div class="col-md-5">
													<div class="form-group">
														<label>Company (disabled)</label>
														<input type="text" class="form-control" disabled="" placeholder="Company" value="DELI NIAGA SEJAHTERA">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Username</label>
														<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $dt['username']?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Email address</label>
														<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $dt['email_address']?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $dt['firstname']?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $dt['lastname']?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $dt['address']?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label>City</label>
														<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $dt['city']?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Country</label>
														<input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $dt['country']?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Phone Number</label>
														<input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" value="<?php echo $dt['phone_number']?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>About Me</label>
														<textarea rows="4" col="80" class="form-control" name="aboutme" placeholder="Here can be your description"><?php echo $dt['about_me']?></textarea>
													</div>
												</div>
											</div>
											<button type="submit" name ="upd" class="btn btn-info btn-fill pull-right">Update Profile</button>
											<div class="clearfix"></div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-user">
									<div class="card-image">
										<img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
									</div>
									<div class="card-body">
										<div class="author">
											<a href="#">
												<hr>
												<h5 class="title"></h5>
											</a>
											<p class="description">
												<hr><hr><hr><hr><hr><hr><hr><hr>
												<?php echo $dt['firstname'].' '.$dt['lastname']?>
											</p>
										</div>
										<p class="description text-center">
											<?php echo $dt['about_me']?>
										</p>
									</div>
									<hr>
									<!-- <div class="button-container mr-auto ml-auto">
										<button href="#" class="btn btn-simple btn-link btn-icon">
											<i class="fa fa-facebook-square"></i>
										</button>
										<button href="#" class="btn btn-simple btn-link btn-icon">
											<i class="fa fa-twitter"></i>
										</button>
										<button href="#" class="btn btn-simple btn-link btn-icon">
											<i class="fa fa-google-plus-square"></i>
										</button>
									</div> -->
								</div>
							</div>

						<?php } ?>
					</div>
				</div>
			</div> 
			<!-- Footer -->
			<?php include 'include/footer.php' ?>
			<!-- Footer -->
		</div>
	</div>
	<!-- Script -->
	<?php include 'include/script.php' ?>
	<!-- Script -->
</body>

</html>

