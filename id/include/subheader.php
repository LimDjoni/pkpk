<?php  
include_once (PROJECT_ROOT_PATH . '/../../Controller/subheaderController.php'); 
$subhead = new subheaderController();
$sheadPage = $subhead->getDataByPageEnglish($page);
for($i=0; $i< count($sheadPage); $i++){ ?>
	<!-- Cta Section Begin -->
	<section class="cta-section spad set-bg" data-setbg="../admin/assets/img/subheader/<?php echo $sheadPage[$i]['sub_header']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cta-text">
						<!-- <h2><?php echo $sheadPage[$i]['PageNameInd']; ?></h2> -->
						<p> <br /><br /> <br />  </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Cta Section End -->
<?php } ?>