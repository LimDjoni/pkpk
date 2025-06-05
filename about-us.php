<!-- Header -->
<?php $title = "Company Profile | PKPK";
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
	<?php include 'include/navbar.php' ?>
	<!-- Navbar -->

	<!-- Subheader -->
	<?php include 'include/subheader.php' ?>
	<!-- Subheader -->

	<?php for($i=0; $i< count($CPdata); $i++){ ?>
		<!-- Testimoial Section Begin -->
		<section class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="about-text">
						<div class="section-title"> 
							<p><?php echo $CPdata[$i]['body_eng']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Section End -->
	<?php } ?>

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>
