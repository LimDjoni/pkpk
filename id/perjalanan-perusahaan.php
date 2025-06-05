<!-- Header -->
<?php $title = "Perjalanan Perusahaan | PKPK";
$page = "growth-journey"; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/growthjourneyController.php');  
$growthJrny = new growthjourneyController();
$GJdata = $growthJrny->getData();
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

  <ul class="timeline"> 
    <?php for($j=0; $j< count($GJdata); $j++){ 
      if($j%2==0) { ?>
        <li>
          <div class="timeline-badge"><img class="rounded-circle" src="../admin/assets/img/growthjourney/<?php echo $GJdata[$j]['PDF']; ?>" alt="" /> </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><?php echo $GJdata[$j]['Tahun']; ?></h4>
              <p><?php echo $GJdata[$j]['Judul']; ?></p>
            </div>
            <div class="timeline-body">
              <p><?php echo $GJdata[$j]['Deskripsi']; ?></p> 
            </div>
          </div>
        </li>
      <?php }else{ ?>
        <li class="timeline-inverted">
          <div class="timeline-badge"><img class="rounded-circle" src="../admin/assets/img/growthjourney/<?php echo $GJdata[$j]['PDF']; ?>" alt="" /> </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><?php echo $GJdata[$j]['Tahun']; ?></h4>
              <p><?php echo $GJdata[$j]['Judul']; ?></p>
            </div>
            <div class="timeline-body">
              <p><?php echo $GJdata[$j]['Deskripsi']; ?></p> 
            </div>
          </div>
        </li> 
      <?php }} ?>
    </ul>

    <!-- Footer -->
    <?php include 'include/footer.php' ?>
    <!-- Footer -->
  </body>

  </html>