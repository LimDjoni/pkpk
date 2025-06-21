<?php 
$title = "DASHBOARD | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php'; 

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "<script>window.location='./index.php'</script>";
    exit;
} else{}
?>

<body>
	<div class="wrapper ">
		<!-- SideBar -->
		<?php include 'include/sidebar.php' ?>
		<!-- SideBar -->

		<div class="main-panel">
			<!-- NavBar -->
			<?php include 'include/navbar.php' ?>
			<!-- NavBar -->
			
			<div class="content" style="height:100vh;;"> 
			</div> 
			<!-- Fo

			<!-- Footer -->
			<?php include 'include/footer.php' ?>
			<!-- Footer -->
		</div>

	</div>
	<!-- Script -->
	<?php include 'include/script.php' ?>
	<!-- Script -->
</body>

</html>
