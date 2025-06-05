<!-- Header -->
<?php $title = "Vision & Mission | PKPK";
$page = "visi-&-misi"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/vissionmissionController.php');
$vissionmission = new vissionmissionController(); 
$VMdata = $vissionmission->getData(); 
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
				<button class="button active" onClick="vissionFunction(this)"><a>Vision</a></button>
				<button class="button" onClick="missionFunction(this)"><a>Mission</a></button>
				<button class="button" onClick="mottoFunction(this)"><a>Motto</a></button>
				<button class="button" onClick="phylosophyFunction(this)"><a>Phylosophy</a></button>
			</div>
		</div>
	</section>
 
	<?php for($j=0; $j< count($VMdata); $j++){ ?>
	<!-- Testimoial Section Begin -->
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" id="Vision" style="font-style: oblique;justify-content: center; align-items: center; display: flex;">
					<div class="section-title height" >
						<h4 style="font-weight: bolder;" class="quotes1"><?php echo $VMdata[$j]['vission']; ?></h4>
					</div>  
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-12" id="Mission" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title height">
						<h4 style="font-weight: bolder;"  class="quotes1"><?php echo $VMdata[$j]['mission']; ?></h4>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="col-lg-12" id="Motto" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title height">
						<h4 style="font-weight: bolder;"  class="quotes1"><?php echo $VMdata[$j]['motto']; ?></h4>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="col-lg-12" id="Phylosophy" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title"> 
						<h4 style="font-weight: bold; white-space: pre-line;" class="quotes3"><?php echo $VMdata[$j]['phylosophy']; ?></h4>
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