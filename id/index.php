<!-- Header -->
<?php $title = "PKPK | Selamat Datang di Perdana Karya Perkasa, Tbk";
$page = "."; 
include 'include/header.php';
include_once (PROJECT_ROOT_PATH . '/../../Controller/homeController.php');
$home = new homeController();
$indx = $home->getData();
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

  <!-- Hero Section Begin -->
   <section class="hero-section">
    <div class="hs-slider owl-carousel normal">
      <?php for($i=0; $i< count($indx); $i++){ ?>
      <div class="hs-item"> 
        <img class="mx-auto" src="../admin/assets/img/home/id/<?php echo $indx[$i]['ImgIndo']; ?>">
      </div>
    <?php } ?>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Testimoial Section Begin -->
 <!--  <section class="testimonial-section">
    <div class="container">
      <div class="row">
        <div class="about-text">
          <div class="section-title">
            <div class="row">  
              <div class="col-sm-2">
                <div class="timeline-image"><img class="img-fluid" 
                  src="img/logoaj.png" alt="" />
                </div>
              </div>
              <div class="col-sm-10"> 
                <p style="margin-top: 4%; margin-bottom: 4%;">With a track record of consistent quality services and timely delivery, coupled with our long-standing relationships with customers, we have <a href="about-us">Read More...</a></p>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </section>  -->
  <!-- Testimonial Section End -->
  
  <!-- Testimoial Section Begin -->
 <!--  <section id="services" class="services spad">
    <div class="container"> 
      <div class="row">
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <h4>Press Release
              <a href="./company-report">See All</a></h4>
              <div class="container">
                <div class="row">  
                  <table id="myTable" class="table">
                    <tbody>
                      <?php foreach($data as $dt) { ?>
                        <tr>
                          <td><img class="mx-auto" src="img/file.png"></td>
                          <td><b><?php echo $dt['Tahun']; ?></b><br />
                            <a href="<?php echo "admin/assets/pdf/Upload/".$dt['PDF']; ?>" target="_blank"><?php echo $dt['Judul']; ?></a></td> 
                            <td hidden><?php echo $dt['Tahun']; ?></td>
                          </tr> 
                          <?php 
                          if($no === 3){ break; }else{ $no++; } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                  <h4>Our Businesses
                    <a href="./our-businesses">See All</a></h4>
                    <div class="container">
                      <div class="row">  
                        <table id="myTable" class="table">
                          <tbody>
                            <?php foreach($data as $dt) { ?>
                              <tr>
                                <td><img class="mx-auto" src="img/file.png"></td>
                                <td><b><?php echo $dt['Tahun']; ?></b><br />
                                  <a href="<?php echo "admin/assets/pdf/Upload/".$dt['PDF']; ?>" target="_blank"><?php echo $dt['Judul']; ?></a></td> 
                                </tr> 
                                <?php 
                                if($no === 5){ break; }else{ $no++; } } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </section> -->
              <!-- Testimonial Section End -->

              <!-- Footer -->
              <?php include 'include/footer.php' ?>
              <!-- Footer -->
            </body>

            </html>