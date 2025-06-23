<!-- Header -->
<?php $title = "PKPK | Welcome to Paragon Karya Perkasa, Tbk";
$page = "."; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../Controller/homeController.php');
$home = new homeController();
$indx = $home->getData();?>
<!-- Header -->

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Navbar -->
  <?php include 'include/navbar.php' ?>
  <!-- Navbar -->

  <!-- Hero Section Begin -->
  <section class="hero-section">
    <div class="hs-slider owl-carousel normal">
      <?php for($i=0; $i< count($indx); $i++){ ?>
        <div class="hs-item"> 
          <img class="mx-auto" src="admin/assets/img/home/<?php echo htmlspecialchars($indx[$i]['ImgEng']); ?>" alt="PKPK Slide <?php echo $i+1; ?>">
        </div>
      <?php } ?>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Footer -->
  <?php include 'include/footer.php' ?>
  <!-- Footer -->
</body>

</html>

<script>
$('.normal').owlCarousel({
    loop:false, 
    nav:false,
    autoplay:false,
    autoplayTimeout:9000,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        640:{
            items:1
        },
      	960:{
            items:1
        },
        1200:{
            items:1
        }
    } 
})
</script>  