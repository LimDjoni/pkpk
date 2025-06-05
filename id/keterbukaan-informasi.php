<!-- Header -->
<?php $title = "Keterbukaan Informasi | PKPK";
$page = "disclosure-information"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/DisclosureController.php'); 
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
	
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title">
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Tahun:</p>
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
		</div>
	</section>

	<!-- Testimoial Section Begin -->
	<!-- <section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"> 
                        <p>Our history of being involved in the coal industry can be traced back to around 2005 in South Kalimantan, Indonesia. Over the years, our business has evolved and today, we have established a reputation as a reliable coal trader and coal shipping company in Indonesia.

						We procure thermal coal from coal mines located in South Kalimantan for domestic sales to mainly coal traders. We also provide chartering services of tugboats, barges and bulk carrier to transport coal within the Indonesian territories.

						Led by an experienced management team, and with the depth and diversity of their technical and operational expertise, we are positioned to tap opportunities in Indonesia – one of the leading producers of coal globally.

						With increases in Indonesia’s electrification and new coal-fired power plants across the Indonesian archipelago, demand for coal and inter-island transportation of coal is expected to remain robust, driving our growth.
                        </p>
                    </div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>