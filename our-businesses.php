<!-- Header -->
<?php $title = "Our Businesses | PKPK";
$page = "bisnis-kami"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/ourBusinessesController.php');
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
				<button class="button active" onClick="showSection('Mining', this)">Mining</button>
				<button class="button" onClick="showSection('Equipment', this)">Equipment</button>
				<button class="button" onClick="showSection('Land', this)">Land Preparation</button>
				<button class="button" onClick="showSection('Construction', this)">Construction</button>
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
						<p><?php echo $OB[$j]['mining']; ?></p>
					</div>  
				</div>
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Equipment" style="justify-content: center; align-items: center;  display: none;">
						<p><?php echo $OB[$j]['equipment']; ?></p>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Land" style="justify-content: center; align-items: center; display: none;">
						<p><?php echo $OB[$j]['land']; ?></p>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Construction" style="justify-content: center; align-items: center; display: none;">  
						<div class="fs-about"> 
							<p><?php echo $OB[$j]['construction']; ?></p> 
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

<script>
function showSection(sectionId, btn) {
    // Hide all sections
    const sections = ['Mining', 'Equipment', 'Land', 'Construction'];
    sections.forEach(id => {
        document.getElementById(id).style.display = 'none';
    });

    // Remove 'active' class from all buttons
    document.querySelectorAll('.button').forEach(btn => btn.classList.remove('active'));

    // Show selected section
    document.getElementById(sectionId).style.display = 'flex';

    // Mark clicked button as active
    btn.classList.add('active');
}
</script>