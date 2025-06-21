<?php  
include_once (PROJECT_ROOT_PATH . '/../Controller/subheaderController.php');
$subhead = new subheaderController();
$sheadPage = $subhead->getDataByPageIndonesia($page); 
if (!empty($sheadPage)) {
    $subHeader = $sheadPage[0];
?>
	<!-- Cta Section Begin -->
	<section class="cta-section spad set-bg" data-setbg="admin/assets/img/subheader/<?php echo $subHeader['sub_header']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cta-text">
						<!-- <h2><?php echo $subHeader['PageNameEng']; ?></h2> -->
						<p> <br /><br /> <br />  </p>
						<!-- <a href="#" class="primary-btn">Contact us</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Cta Section End  -->
 
<?php } ?>