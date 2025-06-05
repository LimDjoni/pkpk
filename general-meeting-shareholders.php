<!-- Header -->
<?php $title = "General Meeting Shareholders | PKPK";
$page = "rups"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/rupsAnnouncementController.php');
include_once (PROJECT_ROOT_PATH . '/../Controller/rupsInvitationController.php');
include_once (PROJECT_ROOT_PATH . '/../Controller/rupsMOMController.php'); 
$rupsAnnounce = new rupsAnnouncementController();
$rupsInv = new rupsInvitationController();
$rupsMOM = new rupsMOMController();
$gmsAnnounce = $rupsAnnounce->getData();
$gmsAnnounceTahun = $rupsAnnounce->getDataTahun();
$gmsInvitation = $rupsInv->getData();
$gmsInvitationTahun = $rupsInv->getDataTahun();
$gmsMOM = $rupsMOM->getData();
$gmsMOMTahun = $rupsMOM->getDataTahun();
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

	<!-- Testimoial Section Begin -->
	<section class="testimonial-section">
		<div class="container">
			<div class="row justify-content-center">  
				<button class="button active" onClick="overviewFunction(this)"><a>GMS Announcement</a></button>
				<button class="button" onClick="remunerationFunction(this)"><a>GMS Invitation</a></button>
				<button class="button" onClick="nominatingFunction(this)"><a>GMS Minutes of Meeting</a></button> 
			</div>
		</div>
	</section>

	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput2" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($gmsAnnounceTahun as $dt) { ?>
										<option value="<?php echo $dt['Tahun']; ?>"><?php echo $dt['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
							<?php     
					        $perPage = 10;  
					        $totalRecordsAnnounce = count($gmsAnnounce);
					        $totalPagesAnnounce = ceil($totalRecordsAnnounce/$perPage);
						    ?>   
							<table id="myTable2" class="table"> 
                        		<tbody id="contentAnnounce"></tbody>  
							</table> 
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="pagination2"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPagesAnnounce" value="<?php echo $totalPagesAnnounce; ?>">    
						</div>
					</div> 
					<div class="section-title" id="Remuneration" style="display: none;">
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput3" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($gmsInvitationTahun as $du) { ?>
										<option value="<?php echo $du['Tahun']; ?>"><?php echo $du['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
							<?php     
					        $perPage = 10;  
					        $totalRecordsInvitation = count($gmsInvitation);
					        $totalPagesInvitation = ceil($totalRecordsInvitation/$perPage);
						    ?>   
							<table id="myTable3" class="table"> 
                        		<tbody id="contentInvitation"></tbody>  
							</table> 
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="paginationInvitation"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPagesInvitation" value="<?php echo $totalPagesInvitation; ?>">    
						</div>
					</div>	 
					<div class="section-title" id="Nominating" style="display: none;">
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput4" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($gmsMOMTahun as $dv) { ?>
										<option value="<?php echo $dv['Tahun']; ?>"><?php echo $dv['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
							<?php     
					        $perPage = 10;  
					        $totalRecordsMOM = count($gmsMOM);
					        $totalPagesMOM = ceil($totalRecordsMOM/$perPage);
						    ?>   
							<table id="myTable4" class="table"> 
                        		<tbody id="contentMOM"></tbody>  
							</table> 
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="paginationMOM"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPagesMOM" value="<?php echo $totalPagesMOM; ?>">    
						</div> 
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>