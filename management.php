<!-- Header -->
<?php $title = "Management | PKPK";
$page = "managemen"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/peopleController.php'); 
include_once (PROJECT_ROOT_PATH . '/../Controller/managementController.php');
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
				<button class="button active" onClick="miningFunction(this)"><a>Overview</a></button>
				<button class="button" onClick="equipmentFunction(this)"><a>Board of Commissioners</a></button>
				<button class="button" onClick="landPreparationFunction(this)"><a>Board of Directors</a></button>
				<button class="button" onClick="constructionFunction(this)"><a>Audit Committee</a></button>
				<button class="button" onClick="cProctFunction(this)"><a>Corporate Secretary</a></button>
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
							<img  src="admin/assets/img/management/<?php echo $managementDt[$n]['Overview']; ?>" class="center"> 
						</div> 
					</div>   
					<div class="section-title"id="Equipment" style="display: none;"> 
						<div class="fs-about"> 
							<div class="fa-logo1"> 
							<img class="big" src="admin/assets/img/people/Komisioner.jpg" > 
									<p><?php echo $managementDt[$n]['bocEng']; ?></p>
									<?php $temp = 0; for($j=0; $j < count($Komisarisdata); $j++){  ?>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="admin/assets/img/people/<?php echo $Komisarisdata[$j]['Img']; ?>" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2><?php echo $Komisarisdata[$j]['Name']; ?></h2>
											<p class="centertxt"><?php echo $Komisarisdata[$j]['Position']; ?></p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
										<p><?php echo $Komisarisdata[$j]['Des']; ?></p>
									</div>  
								</div> 
								<?php $temp++; } ?>          
							</div> 
						</div>
					</div>  
					<div class="section-title"id="Land" style="display: none;">  
						<div class="fs-about"> 
							<div class="fa-logo1">
							<img class="big" src="admin/assets/img/people/Direksi.jpg" > 
									<p><?php echo $managementDt[$n]['bodEng']; ?></p>
								<?php for($k=0; $k < count($Direksidata); $k++){  ?>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="admin/assets/img/people/<?php echo $Direksidata[$k]['Img']; ?>" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2><?php echo $Direksidata[$k]['Name']; ?></h2>
											<p class="centertxt"><?php echo $Direksidata[$k]['Position']; ?></p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
										<p><?php echo $Direksidata[$k]['Des']; ?></p>
									</div>  
								</div> 
								<?php $temp++; } ?>  
							</div>    
						</div>
					</div> 
					<div class="section-title"id="Construction" style="display: none;">  
						<div class="fs-about"> 
							<div class="fa-logo1">  
									<p><?php echo $managementDt[$n]['acEng']; ?></p>
								<?php for($l=0; $l < count($KAdata); $l++){  ?>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="admin/assets/img/people/<?php echo $KAdata[$l]['Img']; ?>" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2><?php echo $KAdata[$l]['Name']; ?></h2>
											<p class="centertxt"><?php echo $KAdata[$l]['Position']; ?></p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
										<p><?php echo $KAdata[$l]['Des']; ?></p>
									</div>  
								</div> 
								<?php $temp++; } ?>     
							</div>  
						</div>
					</div>   
					<div class="section-title"id="Cus" style="display: none;">  
						<div class="fs-about"> 
							<div class="fa-logo1">
									<p><?php echo $managementDt[$n]['csEng']; ?></p>
								<?php if(empty($SPdata)){}else{
									for($m=0; $m < count($SPdata); $m++){  ?>
								<div class="content row">  
									<div class="col-sm-3">
										<img class="img-rounded" src="admin/assets/img/people/<?php echo $SPdata[$m]['Img']; ?>" alt="" >
									</div>
									<div class="col-sm-8">
										<div class="fa-name"> 
											<h2><?php echo $SPdata[$m]['Name']; ?></h2>
											<p class="centertxt"><?php echo $SPdata[$m]['Position']; ?></p> 
										</div>  
									</div>  
									<div class="col-sm-1">
										<h2 class="expand" onClick="myFunction<?php echo $temp; ?>()" id="click_advance<?php echo $temp; ?>"><i class="fa fa-angle-double-down"></i></h2>
									</div> 
									<div class="word" id="myDIV<?php echo $temp; ?>" style="display: none;">
										<p><?php echo $SPdata[$m]['Des']; ?></p>
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
	<?php } ?>
	<!-- Testimonial Section End -->
	<!-- </div>	 -->
	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html> 
