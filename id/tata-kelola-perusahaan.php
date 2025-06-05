<!-- Header -->
<?php $title = "Tata Kelola Perusahaan | PKPK";
$page = "good-corporate-governance";
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../../Controller/gcgController.php');
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
				<button class="button active" onClick="overviewFunction(this)"><a>Sekilas</a></button> 
				<button class="button" onClick="remunerationFunction(this)"><a>Komite Nominasi dan Remunerasi</a></button> 
				<button class="button" onClick="nominatingFunction(this)"><a>Unit Audit Internal</a></button>  
				<button class="button" onClick="IControlFunction(this)"><a>Sistem Pengendali Internal</a></button>   
				<button class="button" onClick="RismanFunction(this)"><a>Sistem Manajemen Resiko</a></button>  
				<button class="button" onClick="CoCFunction(this)"><a>Kode Etik</a></button>  
				<button class="button" onClick="WhistleFunction(this)"><a>Sistem Pelaporan Pelanggaran</a></button>  
				<button class="button" onClick="InfFunction(this)"><a>Akses Informasi dan Data</a></button>   
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
						<p><?php echo $gcgDt[$j]['OverviewInd']; ?></p>
					</div>   
					<div class="section-title"id="Remuneration" style="display: none;">
						<p><?php echo $gcgDt[$j]['RaNInd']; ?></p>
					</div> 
					<div class="section-title"id="Nominating" style="display: none;">
						<div class="fs-about"> 
							<div class="fa-logo1"> 
								<p><?php echo $gcgDt[$j]['IAInd']; ?></p>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="../admin/assets/img/people/bagoes.png" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2>Bagoes Adiyoga Koesasi</h2>
											<p class="centertxt">KETUA</p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="internalAuditFunc()" id="click_advanceIAudit"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIVIAudit" style="display: none;">
										<p>Warga Negara Indonesia, 34 tahun, berdomisili di Jakarta. 

										Bapak Bagoes Adiyoga Koesasi menjabat sebagai Kepala Unit Internal Audit Perseroan sejak tanggal 24 April 2025. Beliau memperoleh gelar Sarjana Ekonomi (2014) dari Universitas Trisakti, Jakarta, Indonesia. 

										Bapak Bagoes Adiyoga Koesasi tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.</p>
									</div>  
								</div>  
							</div>    
						</div>
					</div>  
					<div class="section-title"id="Icontrol" style="display: none;">
						<p><?php echo $gcgDt[$j]['ICInd']; ?></p>
					</div>  
					<div class="section-title"id="RisMan" style="display: none;">
						<p><?php echo $gcgDt[$j]['RMInd']; ?></p>
					</div> 
					<div class="section-title"id="Coc" style="display: none;">
						<p><?php echo $gcgDt[$j]['COCInd']; ?></p>
					</div> 
					<div class="section-title"id="Whistleblowing" style="display: none;">
						<p><?php echo $gcgDt[$j]['WhistleInd']; ?></p>
					</div> 
					<div class="section-title"id="Information" style="display: none;">
						<p><?php echo $gcgDt[$j]['IaDInd']; ?></p>
					</div> 
				</div>  
			</div>
		</div>
	</section>
	<?php } ?>
	<!-- Testimonial Section End -->
	<!-- </div> -->
		<!-- Footer -->
		<?php include 'include/footer.php' ?>
		<!-- Footer -->
	</body>

	</html>
