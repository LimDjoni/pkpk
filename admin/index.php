<?php
$title = "ADMIN PORTAL | Paragon Karya Perkasa, Tbk"; 
include 'include/header.php';  
include_once 'include/logActivity.php'; // Add logging

// If already logged in
if (!empty($_SESSION['login'])) {
	header("Location: dashboard");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = htmlspecialchars(trim($_POST['username']));
	$password = $_POST['password'];

	$logged = $user->check_login($username, $password);
	if ($logged == 1) {
		session_regenerate_id(true);
		$_SESSION['login'] = true; 
		$_SESSION['username'] = $username;
		logActivity("LOGIN_SUCCESS", "User '$username' logged in successfully.");

		// CSRF token generation
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

		echo "<script type='text/javascript'>window.location='dashboard'</script>";
	} else {
		logActivity("LOGIN_FAIL", "Failed login attempt with username '$username'.");
		$error = "Login failed.";
		echo "<script type='text/javascript'>window.location='index'</script>";
	}
}
?>

<body class="">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
									</div>
					 				<form action="" method="post"  class="user">
										<div class="form-group">
											<input type="username" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>
										</div>
										<button name="submit" class="btn btn-primary btn-user btn-block">Login</button>
									</form> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Script -->
	<?php include 'include/script.php' ?>
	<!-- Script -->
</body>
</html>

