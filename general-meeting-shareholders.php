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
				<button class="button active" onClick="overviewFunction(this)">GMS Announcement</button>
				<button class="button" onClick="remunerationFunction(this)">GMS Invitation</button>
				<button class="button" onClick="nominatingFunction(this)">GMS Minutes of Meeting</button> 
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
        var totalPageAnnounce = parseInt($('#totalPagesAnnounce').val());   
        console.log("==totalPageAnnounce=="+totalPageAnnounce);

        var pag = $('#pagination2').simplePaginator({
            totalPages: totalPageAnnounce,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#contentAnnounce").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_rups_announcement.php",
                    method:"POST",
                    dataType: "json",       
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#contentAnnounce').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput2").on("change",function(){
	    	var year = $(this).val(); 
	        $.ajax({
		        url :"total_data_rups_announcement.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPagesAnnounce').val(obj.totalData);   

			    	var totalPageAnnounce = parseInt($('#totalPagesAnnounce').val());   
			    	console.log("==totalPageAnnounce=="+totalPageAnnounce);
			      
			        $('#pagination2').simplePaginator({
			            totalPages: totalPageAnnounce,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#contentAnnounce").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_rups_announcement.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#contentAnnounce').html(responseData.html);
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
        var totalPageInvitation = parseInt($('#totalPagesInvitation').val());   
        console.log("==totalPageInvitation=="+totalPageInvitation);

        var pag = $('#paginationInvitation').simplePaginator({
            totalPages: totalPageInvitation,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#contentInvitation").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_rups_invitation.php",
                    method:"POST",
                    dataType: "json",       
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#contentInvitation').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput3").on("change",function(){
	    	var year = $(this).val(); 
	        $.ajax({
		        url :"total_data_rups_invitation.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPagesInvitation').val(obj.totalData);   

			    	var totalPageInvitation = parseInt($('#totalPagesInvitation').val());   
			    	console.log("==totalPageInvitation=="+totalPageInvitation);
			      
			        $('#paginationInvitation').simplePaginator({
			            totalPages: totalPageInvitation,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#contentInvitation").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_rups_invitation.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#contentInvitation').html(responseData.html);
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
        var totalPageMOM = parseInt($('#totalPagesMOM').val());   
        console.log("==totalPageMOM=="+totalPageMOM);

        var pag = $('#paginationMOM').simplePaginator({
            totalPages: totalPageMOM,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            clickCurrentPage: true,
            pageChange: function(page) {    
                $("#contentMOM").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
                $.ajax({
                    url:"load_data_rups_mom.php",
                    method:"POST",
                    dataType: "json",       
                    data:{page: page, year:""},
                    success:function(responseData){ 
                        $('#contentMOM').html(responseData.html);
                    } 
                });
            }       
        });
    });
</script>


<script type="text/javascript">
	$(document).ready(function(){ 
	    $("#myInput4").on("change",function(){
	    	var year = $(this).val(); 
	        $.ajax({
		        url :"total_data_rups_mom.php",
		        type:"POST",
		        cache:false,
		        data: 'year=' + year,
		        success:function(response){  
					var obj=$.parseJSON(response);   
		        	$('#totalPagesMOM').val(obj.totalData);   

			    	var totalPageMOM = parseInt($('#totalPagesMOM').val());   
			    	console.log("==totalPageMOM=="+totalPageMOM);
			      
			        $('#paginationMOM').simplePaginator({
			            totalPages: totalPageMOM,
			            maxButtonsVisible: 5,
			            currentPage: 1,
			            nextLabel: 'Next',
			            prevLabel: 'Prev',
			            firstLabel: 'First',
			            lastLabel: 'Last',
			            clickCurrentPage: true,
			            pageChange: function(page) {  
			                $("#contentMOM").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
			                $.ajax({
			                    url:"load_data_rups_mom.php",
			                    method:"POST",
			                    dataType: "json",       
			                    data:{page: page, year: year},
			                    success:function(responseData){ 
			                        $('#contentMOM').html(responseData.html);
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