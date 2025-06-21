<!-- Header -->
<?php $title = "Manajemen | PKPK";
$page = "management"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/peopleController.php'); 
include_once (PROJECT_ROOT_PATH . '/../../Controller/managementController.php');
$people = new peopleController();
$management = new managementController();
$managementDt = $management->getData();
$Komisarisdata = $people->getDataByStatus('Komisaris');
$Direksidata = $people->getDataByStatus('Direksi');
$KAdata = $people->getDataByStatus('Komite Audit');
$SPdata = $people->getDataByStatus('Sekretaris Perusahaan');
$Peopledata = $people->getData();
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
				<button class="button active" onClick="miningFunction(this)"><a>Sekilas</a></button>
				<button class="button" onClick="equipmentFunction(this)"><a>Dewan Komisaris</a></button>
				<button class="button" onClick="landPreparationFunction(this)"><a>Direksi</a></button>
				<button class="button" onClick="constructionFunction(this)"><a>Komite Audit</a></button>
				<button class="button" onClick="cProctFunction(this)"><a>Sekretaris Perusahaan</a></button>
			</div>
		</div> 
	</section>

	<?php for($n=0; $n < count($managementDt); $n++) { ?>
		<!-- Testimoial Section Begin -->
		<section class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="about-text">
						<div class="section-title"id="Mining">   
							<div class="fs-about">  
								<img loading="lazy" src="../admin/assets/img/management/<?php echo $managementDt[$n]['Overview']; ?>" class="center"> 
							</div> 
						</div>   
						<div class="section-title"id="Equipment" style="display: none;"> 
							<div class="fs-about"> 
								<div class="fa-logo1"> 
								<img loading="lazy" class="big" src="../admin/assets/img/people/Komisioner.jpg" > 
									<p><?php echo $managementDt[$n]['bocIndo']; ?></p>
									<?php $temp = 0; for($j=0; $j < count($Komisarisdata); $j++){  ?>
										<div class="content row">  
											<div class="col-sm-3">
												<img loading="lazy" class="img-rounded" src="../admin/assets/img/people/<?php echo $Komisarisdata[$j]['Img']; ?>" alt="" >
											</div>
											<div class="col-sm-8">
												<div class="fa-name"> 
													<h2><?php echo $Komisarisdata[$j]['Name']; ?></h2>
													<p class="centertxt"><?php echo $Komisarisdata[$j]['Jabatan']; ?></p> 
												</div>  
											</div>  
											<div class="col-sm-1">
												<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
											</div> 
											<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
												<p><?php echo $Komisarisdata[$j]['Deskripsi']; ?></p>
											</div>  
										</div> 
										<?php $temp++; } ?>     
									</div>              
								</div> 
							</div> 
							<div class="section-title"id="Land" style="display: none;">  
								<div class="fs-about"> 
									<div class="fa-logo1">
										<img loading="lazy" class="big" src="../admin/assets/img/people/Direksi.jpg" > 
										<p><?php echo $managementDt[$n]['bodIndo']; ?></p>
										<?php for($k=0; $k < count($Direksidata); $k++){  ?>
											<div class="content row">  
												<div class="col-sm-3">
													<img loading="lazy" class="img-rounded" src="../admin/assets/img/people/<?php echo $Direksidata[$k]['Img']; ?>" alt="" >
												</div>
												<div class="col-sm-8">
													<div class="fa-name"> 
														<h2><?php echo $Direksidata[$k]['Name']; ?></h2>
														<p class="centertxt"><?php echo $Direksidata[$k]['Jabatan']; ?></p> 
													</div>  
												</div>  
												<div class="col-sm-1">
													<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
												</div> 
												<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
													<p><?php echo $Direksidata[$k]['Deskripsi']; ?></p>
												</div>  
											</div> 
											<?php $temp++; } ?>  
										</div>
									</div> 
								</div>
								<div class="section-title"id="Construction" style="display: none;">  
									<div class="fs-about"> 
										<div class="fa-logo1">  
											<p><?php echo $managementDt[$n]['acIndo']; ?></p>
											<?php for($l=0; $l < count($KAdata); $l++){  ?>
												<div class="content row">  
													<div class="col-sm-3">
														<img loading="lazy" class="img-rounded" src="../admin/assets/img/people/<?php echo $KAdata[$l]['Img']; ?>" alt="" >
													</div>
													<div class="col-sm-8">
														<div class="fa-name"> 
															<h2><?php echo $KAdata[$l]['Name']; ?></h2>
															<p class="centertxt"><?php echo $KAdata[$l]['Jabatan']; ?></p> 
														</div>  
													</div>  
													<div class="col-sm-1">
														<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
													</div> 
													<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
														<p><?php echo $KAdata[$l]['Deskripsi']; ?></p>
													</div>  
												</div> 
												<?php $temp++; } ?>         
											</div>  
										</div> 
									</div>
									<div class="section-title"id="Cus" style="display: none;">  
										<div class="fs-about"> 
											<div class="fa-logo1">
												<p><?php echo $managementDt[$n]['csIndo']; ?></p>
												<?php if(empty($SPdata)){}else{
													for($m=0; $m < count($SPdata); $m++){  ?>
													<div class="content row">  
														<div class="col-sm-3">
															<img loading="lazy" class="img-rounded" src="../admin/assets/img/people/<?php echo $SPdata[$m]['Img']; ?>" alt="" >
														</div>
														<div class="col-sm-8">
															<div class="fa-name"> 
																<h2><?php echo $SPdata[$m]['Name']; ?></h2>
																<p class="centertxt"><?php echo $SPdata[$m]['Jabatan']; ?></p> 
															</div>  
														</div>  
														<div class="col-sm-1">
															<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
														</div> 
														<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
															<p><?php echo $SPdata[$m]['Deskripsi']; ?></p>
														</div>  
													</div> 
													<?php $temp++; }} ?>  
												</div>    
											</div>
										</div>
									</div>  
								</div>
							</div>
						</section>
					<?php }?>
					<!-- Testimonial Section End -->
					<!-- </div> -->
					
					<!-- Footer -->
					<?php include 'include/footer.php' ?>
					<!-- Footer -->
				</body>

				</html> 

<script>
	function miningFunction(elem) {
		var a = document.getElementById("Mining");
		var b = document.getElementById("Equipment");
		var c = document.getElementById("Land");
		var d = document.getElementById("Construction");
		var e = document.getElementById("Cus");
		var btn = document.getElementsByTagName("button")
		for (i = 0; i < btn.length; i++) {
			btn[i].classList.remove('active');
		}
		elem.classList.add('active');
		if (a.style.display === "none") {
			a.style.display = "flex";  
			b.style.display = "none"; 
			c.style.display = "none"; 
			d.style.display = "none";     
			e.style.display = "none";   
		} else {
			// a.style.display = "none";
		}
	}
	function equipmentFunction(elem) {
		var a = document.getElementById("Mining");
		var b = document.getElementById("Equipment");
		var c = document.getElementById("Land");
		var d = document.getElementById("Construction");
		var e = document.getElementById("Cus");
		var btn = document.getElementsByTagName("button")
		for (i = 0; i < btn.length; i++) {
			btn[i].classList.remove('active');
		}
		elem.classList.add('active');
		if (b.style.display === "none") {
			a.style.display = "none";  
			b.style.display = "flex"; 
			c.style.display = "none"; 
			d.style.display = "none";    
			e.style.display = "none"; 
		} else {
			// b.style.display = "none";
		}
	}
	function landPreparationFunction(elem) {
		var a = document.getElementById("Mining");
		var b = document.getElementById("Equipment");
		var c = document.getElementById("Land");
		var d = document.getElementById("Construction");
		var e = document.getElementById("Cus");
		var btn = document.getElementsByTagName("button")
		for (i = 0; i < btn.length; i++) {
			btn[i].classList.remove('active');
		}
		elem.classList.add('active');
		if (c.style.display === "none") {
			a.style.display = "none"; 
			b.style.display = "none"; 
			c.style.display = "flex"; 
			d.style.display = "none";  
			e.style.display = "none";   
		} else {
			// c.style.display = "none";
		}
	}
	function constructionFunction(elem) {
		var a = document.getElementById("Mining");
		var b = document.getElementById("Equipment");
		var c = document.getElementById("Land");
		var d = document.getElementById("Construction");
		var e = document.getElementById("Cus");
		var btn = document.getElementsByTagName("button")
		for (i = 0; i < btn.length; i++) {
			btn[i].classList.remove('active');
		}
		elem.classList.add('active');
		if (d.style.display === "none") {
			a.style.display = "none"; 
			b.style.display = "none"; 
			c.style.display = "none"; 
			d.style.display = "flex";  
			e.style.display = "none"; 
		} else {
			// d.style.display = "none";
		}
	}
	function cProctFunction(elem) {
		var a = document.getElementById("Mining");
		var b = document.getElementById("Equipment");
		var c = document.getElementById("Land");
		var d = document.getElementById("Construction");
		var e = document.getElementById("Cus");
		var btn = document.getElementsByTagName("button")
		for (i = 0; i < btn.length; i++) {
			btn[i].classList.remove('active');
		}
		elem.classList.add('active');
		if (e.style.display === "none") {
			a.style.display = "none"; 
			b.style.display = "none"; 
			c.style.display = "none"; 
			d.style.display = "none";  
			e.style.display = "flex";  
		} else {
			// e.style.display = "none";
		}
	}
</script>