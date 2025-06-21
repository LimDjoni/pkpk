<!-- Header -->
<?php 
$title = "Company Profile | PKPK";
$page = "tentang-kami"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/companyprofileController.php'); 
$companyprofile = new companyprofileController();
$CPdata = $companyprofile->getData();
?>
<!-- Header -->

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Navbar -->
	<?php include 'include/navbar.php'; ?>
	<!-- Navbar -->

	<!-- Subheader -->
	<?php include 'include/subheader.php'; ?>
	<!-- Subheader -->

	<!-- Company Profile Section -->
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"> 
						<?php if (!empty($CPdata) && is_array($CPdata)) { ?>
							<?php foreach ($CPdata as $data) { ?>
								<p><?php echo htmlspecialchars($data['body_eng'], ENT_QUOTES, 'UTF-8'); ?></p>
							<?php } ?>
						<?php } else { ?>
							<p>No data found.</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer -->
</body>
</html>