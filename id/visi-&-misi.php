<!-- Header -->
<?php $title = "Visi & Misi | PKPK";
$page = "vision-&-mission"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/vissionmissionController.php'); 
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
				<button class="button active" onClick="vissionFunction(this)">Visi</button>
				<button class="button" onClick="missionFunction(this)">Misi</button>
				<button class="button" onClick="mottoFunction(this)">Moto</button>
				<button class="button" onClick="phylosophyFunction(this)">Filosofi</button>
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
						<h4 style="font-weight: bolder;" class="quotes1"><?php echo $VMdata[$j]['visi']; ?></h4>
					</div>  
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-12" id="Mission" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title height">
						<h4 style="font-weight: bolder;"  class="quotes1"><?php echo $VMdata[$j]['misi']; ?></h4>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="col-lg-12" id="Motto" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title height">
						<h4 style="font-weight: bolder;"  class="quotes1"><?php echo $VMdata[$j]['moto']; ?></h4>
					</div>
				</div>  
			</div>
			<div class="row">
				<div class="col-lg-12" id="Phylosophy" style="font-style: oblique;justify-content: center; align-items: center; display: none;">
					<div class="section-title"> 
						<h4 style="font-weight: bold; white-space: pre-line; padding-left: 9%;" class="quotes3"><?php echo $VMdata[$j]['filosofi']; ?></h4>
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
function hideAll() {
	document.getElementById("Vision").style.display = "none";
	document.getElementById("Mission").style.display = "none";
	document.getElementById("Motto").style.display = "none";
	document.getElementById("Phylosophy").style.display = "none";

	document.querySelectorAll(".button").forEach(btn => btn.classList.remove("active"));
}

function vissionFunction(btn) {
	hideAll();
	document.getElementById("Vision").style.display = "flex";
	btn.classList.add("active");
}

function missionFunction(btn) {
	hideAll();
	document.getElementById("Mission").style.display = "flex";
	btn.classList.add("active");
}

function mottoFunction(btn) {
	hideAll();
	document.getElementById("Motto").style.display = "flex";
	btn.classList.add("active");
}

function phylosophyFunction(btn) {
	hideAll();
	document.getElementById("Phylosophy").style.display = "flex";
	btn.classList.add("active");
}
</script>