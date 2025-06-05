<!-- Header -->
<?php $title = "Company Report | PKPK";
$page = "laporan-perusahaan"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../Controller/auditController.php');   
include_once (PROJECT_ROOT_PATH . '/../Controller/laporanController.php');
include_once (PROJECT_ROOT_PATH . '/../Controller/financialHighlightController.php');  
include_once (PROJECT_ROOT_PATH . '/../Controller/financialStatementController.php'); 
$audit = new auditController();
$laporan = new laporanController();
$financialHighlight = new financialHighlightController(); 
$financialStatement = new financialStatementController();
$data = $laporan->getData();
$dataAu = $audit->getData(); 
$dataFS = $financialStatement->getData(); 
$dataTahunFS = $financialStatement->getDataTahun();
$dataTahun = $laporan->getDataTahun();  
$dataFH = $financialHighlight->getData(); 
$dataTahunFH = $financialHighlight->getDataTahun();
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
				<button class="button active" onClick="overviewFunction(this)"><a>Overview</a></button>
				<button class="button" onClick="remunerationFunction(this)"><a>Annual Reports</a></button>
				<button class="button" onClick="nominatingFunction(this)"><a>Financial Statements</a></button> 
			</div>
		</div>
	</section>
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<p>The latest quarterly results, dividend information and presentations for PKPK Companies are published on this site. Although the documents contained on this site have been selected and are in the interest of our current and future shareholders and equity research analysts, some of the matters discussed on this site may contain statements based on forecasts made at that time. , which contains risks and uncertainties that could result in material different from those expressed or implied in such statements.</p> 
						<div class="table-responsive">
						<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center; background-color: #FF0000; color: white;">Financial Year End 31 Dec (IDR)</th>
							      <th scope="col" colspan="<?php echo count($dataAu)?>" style="text-align:center; background-color: #FF0000; color: white;">Audit</th>
							    </tr>
							    <tr>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
							      <th scope="col" style="text-align:center; background-color: #FF0000; color: white;"><?php echo $dataAu[$i]['Year']?></th>
							  	  <?php } ?> 
							    </tr>
							    <tr>
							      <th scope="col" colspan="<?php echo count($dataAu) +1?>" style="background-color: #FF7F7F; color: white;">Profit and Loss Statement</th> 
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Revenue</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['Revenue'], 0, ',', '.')?></td>   
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Profit Before Tax</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['ProfitBfTax'], 0, ',', '.')?></td>    
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Profit attributable to equity holders of the Company</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['ProfitAttributable'], 0, ',', '.')?></td>     
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Earnings per share <sup>(1)</sup></th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['EarningsPerShare'], 2, ',', '.')?></td>
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="col" colspan="<?php echo count($dataAu) +1?>" style="background-color: #FF7F7F; color: white;">Balance Sheet (as at 31 Dec)</th> 
							    </tr>
							    <tr>
							      <th scope="row">Non-current assets</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['NonCurrentAsset'], 0, ',', '.')?></td> 
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Current assets</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['CurrentAssets'], 0, ',', '.')?></td>  
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Non-current liabilities</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['NonCurrentLia'], 0, ',', '.')?></td>   
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Current liabilities</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['CurrentLia'], 0, ',', '.')?></td>    
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Net assets value (NAV) attributable to equity holders of the Company</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['AttEquity'], 0, ',', '.')?></td>    
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">NAV per share <sup>(1)</sup></th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format($dataAu[$i]['NavPerShare'], 2, ',', '.')?></td>  
							  	  <?php } ?>
							    </tr>
							  </tbody>
							</table>    
							<p> Note:
							(1) For comparative purposes, the earnings per share and the NAV per share were computed based on the share capital of 600,000,000 shares upon the listing of the Company.</p>
						</div>
					</div> 
					<div class="section-title"id="Remuneration" style="display: none;"> 
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($dataTahun as $dt) { ?>
										<option value="<?php echo $dt['Tahun']; ?>"><?php echo $dt['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
						    <?php     
					        $perPageAnnual = 10;  
					        $totalRecordsAnnual = count($data);
					        $totalPagesAnnual = ceil($totalRecordsAnnual/$perPageAnnual);
						    ?>   
							<table id="myTable" class="table">
                        		<tbody id="contentAnnual"></tbody>   
							</table>
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="paginationAnnual"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPagesAnnual" value="<?php echo $totalPagesAnnual; ?>">    
						</div>
					</div>   
					<div class="section-title"id="Nominating" style="display: none;"> 
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Year:</p>
								<select id="myInput1" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($dataTahunFS as $dtFS) { ?>
										<option value="<?php echo $dtFS['Tahun']; ?>"><?php echo $dtFS['Tahun']; ?></option> 
									<?php  } ?>
								</select>
								<br>
							</div>
						    <?php     
					        $perPage = 10;  
					        $totalRecords = count($dataFS);
					        $totalPages = ceil($totalRecords/$perPage);
						    ?>   
							<table id="myTable1" class="table"> 
                        		<tbody id="content"></tbody>  
							</table> 
							 <nav aria-label="Page navigation example">
							    <ul class="pagination justify-content-center"> 
			                		<div id="pagination"></div>    
							    </ul>
							  </nav>
			                <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">    
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