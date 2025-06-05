<!-- Header -->
<?php $title = "Disclosure Information | PKPK";
$page = "keterbukaan-informasi"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../Controller/DisclosureController.php');  
$disclosure = new DisclosureController(); 
$discDt = $disclosure->getData();
$discTahun = $disclosure->getDataTahun();
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
			<div class="row">
				<div class="about-text">
					<div class="section-title">
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput5" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($discTahun as $dt) { ?>
										<option value="<?php echo $dt['Tahun']; ?>"><?php echo $dt['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
							<?php     
					        $perPage = 10;  
					        $totalRecordsDisclosure = count($discDt);
					        $totalPagesDisclosure = ceil($totalRecordsDisclosure/$perPage);
						    ?>   
							<table id="myTable4" class="table"> 
                        		<tbody id="contentDisclosure"></tbody>  
							</table> 
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="paginationDisclosure"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPagesDisclosure" value="<?php echo $totalPagesDisclosure; ?>">    
						</div> 
					</div>  
				</div>
			</div>
		</div>
	</section> 

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>