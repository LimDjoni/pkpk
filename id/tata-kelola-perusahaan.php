<!-- Header -->
<?php $title = "Tata Kelola Perusahaan | PKPK";
$page = "good-corporate-governance";
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../../Controller/gcgController.php');
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
				<button class="button active" onClick="overviewFunction(this)">Sekilas</button> 
				<button class="button" onClick="remunerationFunction(this)">Komite Nominasi dan Remunerasi</button> 
				<button class="button" onClick="nominatingFunction(this)">Unit Audit Internal</button>  
				<button class="button" onClick="IControlFunction(this)">Sistem Pengendali Internal</button>   
				<button class="button" onClick="RismanFunction(this)">Sistem Manajemen Resiko</button>  
				<button class="button" onClick="CoCFunction(this)">Kode Etik</button>  
				<button class="button" onClick="WhistleFunction(this)">Sistem Pelaporan Pelanggaran</button>  
				<button class="button" onClick="InfFunction(this)">Akses Informasi dan Data</button>   
			</div>
		</div>
	</section> 
 
	<!-- Testimoial Section Begin -->
	<section class="testimonial-section">
		<div class="container"> 
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<p><?php echo $data['OverviewInd']; ?></p>
					</div>   
					<div class="section-title"id="Remuneration" style="display: none;">
						<p><?php echo $data['RaNInd']; ?></p>
					</div> 
					<div class="section-title"id="Nominating" style="display: none;">
						<div class="fs-about"> 
							<div class="fa-logo1"> 
								<p><?php echo $data['IAInd']; ?></p>
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
						<p><?php echo $data['ICInd']; ?></p>
					</div>  
					<div class="section-title"id="RisMan" style="display: none;">
						<p><?php echo $data['RMInd']; ?></p>
					</div> 
					<div class="section-title"id="Coc" style="display: none;">
						<p><?php echo $data['COCInd']; ?></p>
					</div> 
					<div class="section-title"id="Whistleblowing" style="display: none;">
						<p><?php echo $data['WhistleInd']; ?></p>
					</div> 
					<div class="section-title"id="Information" style="display: none;">
						<p><?php echo $data['IaDInd']; ?></p>
					</div> 
				</div>  
			</div>
		</div>
	</section>
	<!-- Testimonial Section End -->
	<!-- </div> -->
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