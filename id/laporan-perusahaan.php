<!-- Header -->
<?php $title = "Laporan Perusahaan | PKPK";
$page = "company-report"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/auditController.php');   
include_once (PROJECT_ROOT_PATH . '/../../Controller/laporanController.php');
include_once (PROJECT_ROOT_PATH . '/../../Controller/financialStatementController.php'); 
include_once (PROJECT_ROOT_PATH . '/../../Controller/financialHighlightController.php');  
$audit = new auditController();
$laporan = new laporanController();
$financialHighlight = new financialHighlightController(); 
$financialStatement = new financialStatementController();
$data = $laporan->getData();
$dataAu = $audit->getData(); 
$dataTahunFS = $financialStatement->getDataTahun();
$dataTahun = $laporan->getDataTahun();  
$dataFS = $financialStatement->getData(); 
$dataFH = $financialHighlight->getData(); 
$dataTahunFH = $financialHighlight->getDataTahun();
?>
<!-- Header -->

<?php 
$dataAu = $audit->getData();  
?>
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
				<button class="button active" onClick="overviewFunction(this)">Sekilas</button>
				<button class="button" onClick="remunerationFunction(this)">Laporan Tahunan</button>
				<button class="button" onClick="nominatingFunction(this)">Laporan Keuangan</button> 
			</div>
		</div>
	</section>
	<section class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="about-text">
					<div class="section-title"id="Overview"> 
						<p>Hasil kuartalan terbaru, informasi dividen dan presentasi untuk Perusahaan PKPK dipublikasikan di situs ini. Meskipun dokumen yang terdapat di situs ini telah dipilih dan untuk kepentingan pemegang saham kami saat ini dan masa depan dan analis penelitian ekuitas, beberapa hal yang dibahas di situs ini mungkin berisi pernyataan berdasarkan perkiraan yang dibuat pada saat itu. , yang mengandung risiko dan ketidakpastian yang dapat mengakibatkan perbedaan material dari yang dinyatakan atau tersirat dalam pernyataan tersebut.</p> 
						
						<div class="table-responsive">
						<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center; background-color: #FF0000; color: white;">Akhir Tahun Buku 31 Des (IDR)</th>
							      <th scope="col" colspan="<?php echo count($dataAu)?>" style="text-align:center; background-color: #FF0000; color: white;">Audit</th>
							    </tr>
							    <tr>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
							      <th scope="col" style="text-align:center; background-color: #FF0000; color: white;"><?php echo $dataAu[$i]['Year']?></th>
							  	  <?php } ?> 
							    </tr>
							    <tr>
							      <th scope="col" colspan="<?php echo count($dataAu) +1?>" style="background-color: #FF7F7F; color: white;">Laporan Laba Rugi</th> 
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Pendapatan Usaha</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center;"><?php echo number_format((float)$dataAu[$i]['Revenue'], 0, ',', '.')?></td> 
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Laba Sebelum Pajak</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['ProfitBfTax'], 0, ',', '.')?></td> 
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Laba dapat diberikan ke Pemegang Saham</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['ProfitAttributable'], 0, ',', '.')?></td>  
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Laba per Saham <sup>(1)</sup></th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['EarningsPerShare'], 2, ',', '.')?></td>   
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="col" colspan="<?php echo count($dataAu) +1?>" style="background-color: #FF7F7F; color: white;">Neraca (per 31 Des)</th> 
							    </tr>
							    <tr>
							      <th scope="row">Aset tidak Lancar</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['NonCurrentAsset'], 0, ',', '.')?></td>    
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Aset Lancar</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['CurrentAssets'], 0, ',', '.')?></td>     
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Hutang tidak Lancar</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['NonCurrentLia'], 0, ',', '.')?></td>     
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Hutang lancar</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['CurrentLia'], 0, ',', '.')?></td>  
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">Nilai Aktiva Bersih (NAB) dapat diberikan ke Pemegang Saham</th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['AttEquity'], 0, ',', '.')?></td>   
							  	  <?php } ?>
							    </tr>
							    <tr>
							      <th scope="row">NAB per Saham <sup>(1)</sup></th>
							      <?php for($i=0; $i<count($dataAu); $i++) { ?>
								      <td style="color: black; text-align: center"><?php echo  number_format((float)$dataAu[$i]['NavPerShare'], 2, ',', '.')?></td>  
							  	  <?php } ?>
							    </tr>
							  </tbody>
							</table>    
							<p> Catatan:
							(1) Untuk tujuan perbandingan, laba per saham dan NAB per saham dihitung berdasarkan modal saham 600,000,000 saham pada saat pencatatan Perseroan.</p>
						</div>
					</div> 
					<div class="section-title"id="Remuneration" style="display: none;"> 
						<div class="container">
							<div class="d-flex align-items-center">  
								<p class="hidden">Tahun:</p>
								<select onchange="searchFunction()" id="myInput" class="col-sm-4 form-control form-control-sm">
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
								<p class="hidden">Tahun:</p>
								<select id="myInput1" class="col-sm-4 form-control form-control-sm">
									<option value="" selected>All</option>
									<?php foreach($dataTahunFS as $dt) { ?>
										<option value="<?php echo $dt['Tahun']; ?>"><?php echo $dt['Tahun']; ?></option> 
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

<script>
	function overviewFunction(btn) {
		document.getElementById("Overview").style.display = "block";
		document.getElementById("Remuneration").style.display = "none";
		document.getElementById("Nominating").style.display = "none";

		updateActiveButton(btn);
	}

	function remunerationFunction(btn) {
		document.getElementById("Overview").style.display = "none";
		document.getElementById("Remuneration").style.display = "block";
		document.getElementById("Nominating").style.display = "none";

		updateActiveButton(btn);
	}

	function nominatingFunction(btn) {
		document.getElementById("Overview").style.display = "none";
		document.getElementById("Remuneration").style.display = "none";
		document.getElementById("Nominating").style.display = "block";

		updateActiveButton(btn);
	}

	function updateActiveButton(btn) {
		const buttons = document.querySelectorAll(".button");
		buttons.forEach(b => b.classList.remove("active"));
		btn.classList.add("active");
	}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var totalPageAnnual = parseInt($('#totalPagesAnnual').val());   
        console.log("==totalPageAnnual=="+totalPageAnnual);

        $('#paginationAnnual').simplePaginator({
            totalPages: totalPageAnnual,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#contentAnnual").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_annual_report.php",
                    method:"POST",
                    dataType: "json",    
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#contentAnnual').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput").on("change",function(){
	    	var year = $(this).val();  
	        $.ajax({
		        url :"total_data_annual_report.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPagesAnnual').val(obj.totalData);   

			    	var totalPageAnnual = parseInt($('#totalPagesAnnual').val());   
			    	console.log("==totalPageAnnual=="+totalPageAnnual);
			      
			        $('#pagination').simplePaginator({
			            totalPages: totalPageAnnual,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#contentAnnual").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_annual_report.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#contentAnnual').html(responseData.html);
			                    },
						        error: function(jqXHR, textStatus, errorThrown) {
						           console.log(textStatus, errorThrown);
						        }
			                });
			            }       
			        });
		        }
			});
	    }); 
	});
</script>  

<script type="text/javascript">
    $(document).ready(function(){
        var totalPage = parseInt($('#totalPages').val());   

        var pag = $('#pagination').simplePaginator({
            totalPages: totalPage,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_financial_statement.php",
                    method:"POST",
                    dataType: "json",       
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#content').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput1").on("change",function(){
	    	var year = $(this).val(); 
	        $.ajax({
		        url :"total_data_financial_statement.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPages').val(obj.totalData);   

			    	var totalPage = parseInt($('#totalPages').val());   
			      
			        $('#pagination').simplePaginator({
			            totalPages: totalPage,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_financial_statement.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#content').html(responseData.html);
			                    },
						        error: function(jqXHR, textStatus, errorThrown) {
						           console.log(textStatus, errorThrown);
						        }
			                });
			            }       
			        });
		        }
			});
	    }); 
	});
</script>  