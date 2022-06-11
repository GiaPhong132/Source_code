<?php
include_once('/xampp/htdocs/Source_Ref/views/main/navbar.php');
?>
<main id='main'>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h1 style="color: white;"><strong>KẾT NỐI</strong></h1>
                <ol>
                    <li><a href="index.php?page=main&controller=layouts&action=index">Trang chủ</a></li>
                    <li><a href="index.php?page=main&controller=contact&action=index">Kết nối</a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7839.393507316623!2d106.743711!3d10.757838!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb98f29e0479d526a!2sVNG%20Corporation!5e0!3m2!1sen!2sus!4v1637860473994!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">
                    <?php
                    foreach ($companies as $company) {
                        echo '
            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-6 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>CHI NHÁNH</h4>
                  <p>' . $company->name . '</p>
                </div>

                <div class="col-lg-6 info mt-4 mt-lg-0">
                  <i class="bi bi-map"></i>
                  <h4>ĐỊA CHỈ</h4>
                  <p>' . $company->address . '</p>
                </div>
              </div>
            </div>
            ';
                    }
                    ?>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
include_once('/xampp/htdocs/Source_Ref/views/main/footer.php');
?>