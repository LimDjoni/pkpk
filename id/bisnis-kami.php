<!-- Header -->
<?php $title = "Bisnis Kami | PKPK";
$page = "our-businesses"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../../Controller/ourBusinessesController.php');
$ourBusinesses = new ourBusinessesController();
$OB = $ourBusinesses->getData();
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

	<section class="testimonial-section">
		<div class="container">
			<div class="row justify-content-center">  
				<button class="button active" onClick="miningFunction(this)"><a>Tambang</a></button>
				<button class="button" onClick="equipmentFunction(this)"><a>Perlengkapan</a></button>
				<button class="button" onClick="landPreparationFunction(this)"><a>Persiapan Lahan</a></button>
				<button class="button" onClick="constructionFunction(this)"><a>Konstruksi</a></button>
			</div>
		</div>
	</section>
 
	<!-- Testimoial Section Begin -->
	<?php for($j=0; $j< count($OB); $j++){ ?>	
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Mining"style="justify-content: center; align-items: center; display: flex;">
						<p><?php echo $OB[$j]['tambang']; ?></p>
					</div>  
				</div>
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Equipment" style="justify-content: center; align-items: center;  display: none;">
						<p><?php echo $OB[$j]['perlengkapan']; ?></p>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Land" style="justify-content: center; align-items: center; display: none;">
						<p><?php echo $OB[$j]['lahan']; ?></p>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Construction" style="justify-content: center; align-items: center; display: none;">  
						<div class="fs-about"> 
							<p><?php echo $OB[$j]['konstruksi']; ?></p> 
						</div>
					</div>
				</div> 
			</div> 
		</div>
	</section>
	<?php } ?>
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>