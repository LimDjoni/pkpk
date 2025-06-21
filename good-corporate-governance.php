<!-- Header -->
<?php $title = "Good Corporate Governance | PKPK";
$page = "tata-kelola-perusahaan"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/gcgController.php');
$gcg = new gcgController();
$gcgDt = $gcg->getData();
$data = $gcgDt[0]; 
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

	<!-- <div class="spad2"> -->
	<section class="testimonial-section">
		<div class="container">
			<div class="row justify-content-center">  
				<button class="button active" onClick="overviewFunction(this)">Overview</button> 
				<button class="button" onClick="remunerationFunction(this)">Remuneration and Nominating Committee</button> 
				<button class="button" onClick="nominatingFunction(this)">Internal Audit Unit</button>  
				<button class="button" onClick="IControlFunction(this)">Internal Control System</button>   
				<button class="button" onClick="RismanFunction(this)">Risk Management System</button>  
				<button class="button" onClick="CoCFunction(this)">Code Of Conduct</button>  
				<button class="button" onClick="WhistleFunction(this)">Whistleblowing System</button>  
				<button class="button" onClick="InfFunction(this)">Information and Data Access</button>   
			</div>
		</div>
	</section>

	<!-- Testimoial Section Begin --> 
	<section class="testimonial-section">
		<div class="container"> 
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<p><?php echo $data['OverviewEng']; ?></p>
					</div>   
					<div class="section-title"id="Remuneration" style="display: none;">
						<p><?php echo $data['RaNEng']; ?></p>
					</div> 
					<div class="section-title"id="Nominating" style="display: none;">
						<div class="fs-about"> 
							<div class="fa-logo1"> 
								<p><?php echo $data['IAEng']; ?></p>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="admin/assets/img/people/bagoes.png" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2>Bagoes Adiyoga Koesasi</h2>
											<p class="centertxt">CHIEF</p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="internalAuditFunc()" id="click_advanceIAudit"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIVIAudit" style="display: none;">
										<p>Indonesian citizen, 34 years old, domiciled in Jakarta. 

										Mr. Bagoes Adiyoga Koesasi has served as Head of the Company's Internal Audit Unit since 24 April 2025. He has a degree Bachelor of Accounting (2014) from Trisakti University, Jakarta, Indonesia. 

										Mr. Bagoes Adiyoga Koesasi has no affiliation with members of the Board of Directors, other Board of Commissioners, or controlling shareholders.</p>
									</div>  
								</div>  
							</div>    
						</div>
					</div> 
					<div class="section-title"id="Icontrol" style="display: none;">
						<p><?php echo $data['ICEng']; ?></p> 
					</div>   
					<div class="section-title"id="RisMan" style="display: none;">
						<p><?php echo $data['RMEng']; ?></p>
					</div> 
					<div class="section-title"id="Coc" style="display: none;">
						<p><?php echo $data['COCEng']; ?></p>
					</div> 
					<div class="section-title"id="Whistleblowing" style="display: none;">
						<p><?php echo $data['WhistleEng']; ?></p>
					</div> 
					<div class="section-title"id="Information" style="display: none;">
						<p><?php echo $data['IaDEng']; ?></p>
					</div> 
				</div>  
			</div>
		</div>
	</section>
	<!-- </div> -->
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>
</html>

<script>
function hideAllSections() {
  const ids = ["Overview", "Remuneration", "Nominating", "Icontrol", "RisMan", "Coc", "Whistleblowing", "Information"];
  ids.forEach(id => document.getElementById(id).style.display = "none");
  document.querySelectorAll('.button').forEach(btn => btn.classList.remove('active'));
}

function overviewFunction(el) {
  hideAllSections();
  document.getElementById("Overview").style.display = "block";
  el.classList.add('active');
}
function remunerationFunction(el) {
  hideAllSections();
  document.getElementById("Remuneration").style.display = "block";
  el.classList.add('active');
}
function nominatingFunction(el) {
  hideAllSections();
  document.getElementById("Nominating").style.display = "block";
  el.classList.add('active');
}
function IControlFunction(el) {
  hideAllSections();
  document.getElementById("Icontrol").style.display = "block";
  el.classList.add('active');
}
function RismanFunction(el) {
  hideAllSections();
  document.getElementById("RisMan").style.display = "block";
  el.classList.add('active');
}
function CoCFunction(el) {
  hideAllSections();
  document.getElementById("Coc").style.display = "block";
  el.classList.add('active');
}
function WhistleFunction(el) {
  hideAllSections();
  document.getElementById("Whistleblowing").style.display = "block";
  el.classList.add('active');
}
function InfFunction(el) {
  hideAllSections();
  document.getElementById("Information").style.display = "block";
  el.classList.add('active');	
}
function internalAuditFunc() {
  const x = document.getElementById("myDIVIAudit");
  x.style.display = (x.style.display === "none") ? "block" : "none";
}
</script>

<script>
window.onload = function () {
  overviewFunction(document.querySelector('.button.active'));
};
</script>