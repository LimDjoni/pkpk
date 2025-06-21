<?php
$prospectuses = [
    [
        "year" => "2023",
        "title" => "Prospektus Ringkas Penawaran Terbatas 2023",
        "file" => "Prospektus Ringkas PKPK - CETAK.pdf"
    ],
    [
        "year" => "2007",
        "title" => "Prospektus Penawaran Umum 2007",
        "file" => "Prospektus_Penawaran_Umum_2007.pdf"
    ],
    [
        "year" => "2023",
        "title" => "Prospektus Penawaran Terbatas 2023",
        "file" => "Prospektus PKPK - CETAK.pdf"
    ]
];
?>

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
								<table id="myTable1" class="table">
									<tbody>
										<?php foreach($prospectuses as $p): ?>
										<tr>
											<td style="text-align: center;">
												<img class="mx-auto hidden" style="width:100px;" src="img/file.png">
											</td> 
											<td>
												<b><?= $p['year'] ?></b><br />
												<a><?= $p['title'] ?></a><br />
											</td>
											<td style="text-align: center;">
												<a class="download" href="admin/assets/pdf/prospectus/<?= $p['file'] ?>" target="_blank">Download</a>
											</td>
											<td hidden><?= $p['year'] ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
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