<!-- Header -->
<?php $title = "Prospektus | PKPK";
$page = "prospectus"; 
include 'include/header.php' ?>
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
									<select onchange="searchFunction1()" id="myInput1" class="col-sm-4 form-control form-control-sm">
										<option value="" selected>All</option>
										<option value="2007">2007</option>
										<option value="2023">2023</option>
									</select>
									<br>
								</div>
								<table id="myTable1" class="table">
									<tbody>
										<tr>
											<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="../img/file.png"></td> 
											<td><b>2007</b><br /><a>Prospektus Penawaran Umum 2007</a></td>
					              			<td style="text-align: center;"><a class="download" href="../admin/assets/pdf/prospectus/Prospektus_Penawaran_Umum_2007.pdf" target="_blank">Download</a></td>
											<td hidden>2007</td>
										</tr> 
										<tr>
											<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="../img/file.png"></td> 
											<td><b>2023</b><br /><a>Prospektus Penawaran Terbatas 2023</a></td>
					              			<td style="text-align: center;"><a class="download" href="../admin/assets/pdf/prospectus/Prospektus PKPK - CETAK.pdf" target="_blank">Download</a></td>
											<td hidden>2023</td>
										</tr> 
										<tr>
											<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="../img/file.png"></td> 
											<td><b>2023</b><br /><a>Prospektus Ringkas Penawaran Terbatas 2023</a></td>
					              			<td style="text-align: center;"><a class="download" href="../admin/assets/pdf/prospectus/Prospektus Ringkas PKPK - CETAK.pdf" target="_blank">Download</a></td>
											<td hidden>2023</td>
										</tr> 
									</tbody>
								</table>
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