<!-- Header -->
<?php $title = "Good Corporate Governance | PKPK";
$page = "tata-kelola-perusahaan"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/gcgController.php');
$gcg = new gcgController();
$gcgDt = $gcg->getData();
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
				<button class="button active" onClick="overviewFunction(this)"><a>Overview</a></button> 
				<button class="button" onClick="remunerationFunction(this)"><a>Remuneration and Nominating Committee</a></button> 
				<button class="button" onClick="nominatingFunction(this)"><a>Internal Audit Unit</a></button>  
				<button class="button" onClick="IControlFunction(this)"><a>Internal Control System</a></button>   
				<button class="button" onClick="RismanFunction(this)"><a>Risk Management System</a></button>  
				<button class="button" onClick="CoCFunction(this)"><a>Code Of Conduct</a></button>  
				<button class="button" onClick="WhistleFunction(this)"><a>Whistleblowing System</a></button>  
				<button class="button" onClick="InfFunction(this)"><a>Information and Data Access</a></button>   
			</div>
		</div>
	</section>

	<!-- Testimoial Section Begin -->
	<?php for($j=0; $j< count($gcgDt); $j++){ ?>
	<section class="testimonial-section">
		<div class="container"> 
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<p><?php echo $gcgDt[$j]['OverviewEng']; ?></p>
					</div>   
					<div class="section-title"id="Remuneration" style="display: none;">
						<p><?php echo $gcgDt[$j]['RaNEng']; ?></p>
					</div> 
					<div class="section-title"id="Nominating" style="display: none;">
						<div class="fs-about"> 
							<div class="fa-logo1"> 
								<p><?php echo $gcgDt[$j]['IAEng']; ?></p>
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
						<p><?php echo $gcgDt[$j]['ICEng']; ?></p> 
					</div>   
					<div class="section-title"id="RisMan" style="display: none;">
						<p><?php echo $gcgDt[$j]['RMEng']; ?></p>
					</div> 
					<div class="section-title"id="Coc" style="display: none;">
						<p><?php echo $gcgDt[$j]['COCEng']; ?></p>
					</div> 
					<div class="section-title"id="Whistleblowing" style="display: none;">
						<p><?php echo $gcgDt[$j]['WhistleEng']; ?></p>
					</div> 
					<div class="section-title"id="Information" style="display: none;">
						<p><?php echo $gcgDt[$j]['IaDEng']; ?></p>
					</div> 
				</div>  
			</div>
		</div>
	</section>
<?php } ?>
	<!-- </div> -->
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>
</html>