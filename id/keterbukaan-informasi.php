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

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        var totalPageDisclosure = parseInt($('#totalPagesDisclosure').val());   

        var pag = $('#paginationDisclosure').simplePaginator({
            totalPages: totalPageDisclosure,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#contentDisclosure").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_disclosure.php",
                    method:"POST",
                    dataType: "json",       
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#contentDisclosure').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script> 

<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput5").on("change",function(){
	    	var year = $(this).val(); 
	        $.ajax({
		        url :"total_data_disclosure.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPagesDisclosure').val(obj.totalData);   

			    	var totalPageDisclosure = parseInt($('#totalPagesDisclosure').val());   
			      
			        $('#paginationDisclosure').simplePaginator({
			            totalPages: totalPageDisclosure,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#contentDisclosure").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_disclosure.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#contentDisclosure').html(responseData.html);
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