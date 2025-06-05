<!-- Header -->
<?php $title = "Kepemilikan Saham | PKPK";
$page = "shareholders-information"; 
include 'include/header.php'; 
include_once (PROJECT_ROOT_PATH . '/../../Controller/shareholderController.php');
$shareholder = new shareholderController();
$SH = $shareholder->getData(); 
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
	<!-- <section class="testimonial-section">
		<div class="container">
			<div class="row justify-content-center">  
				<button class="button active" onClick="overviewFunction(this)"><a>Sekilas</a></button>
				 <button class="button" onClick="auditFunction(this)"><a>Primary and Controlling Shareholders</a></button> 
			</div>
		</div>
	</section> -->

	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<br>
				<div class="about-text"> 
					<div class="section-title"> 
						<div class="container">
							<div class="table-responsive">
								<table class="table table-bordered">
									<!-- <caption style="color: black;font-weight: bold;">Daftar Pemegang Saham di atas 5% per 31 Desember 2019.</caption>  -->
									<thead> 
										<tr style="color:white; background-color: red;">
											<th scope="col" style="text-align: center;">No.</th>
											<th scope="col" style="text-align: center;">Nama Pemegang Saham</th>
											<th scope="col" style="text-align: center;">Jumlah Saham</th>
											<th scope="col" style="text-align: center;">%</th>
										</tr> 
									</thead>
									<tbody>
										<?php for($j=0; $j< count($SH); $j++){ ?>	
											<tr class="color" >  
												<td scope="row" style="text-align: center;"><?php echo $no; ?></td>
												<td><?php echo $SH[$j]['nama_pemegangsaham']; ?></td>
												<td class="color"><?php echo number_format($SH[$j]['NOS'], 0, ',', '.');?></td>
												<td class="color"><?php echo $SH[$j]['percent']; ?></td>
											</tr> 
										<?php $total = $total + $SH[$j]['NOS'];
											$totalP = $totalP + $SH[$j]['percent'];
											$no++; }?>
											<tr>
												<th scope="col" colspan="2" style="text-align: center;">Total</th>
												<th><?php echo number_format($total, 0, ',', '.'); ?></th>
												<th><?php echo $totalP; ?></th>
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
	<!-- Testimonial Section End -->

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>