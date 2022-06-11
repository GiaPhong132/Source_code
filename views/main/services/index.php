<?php
require_once('/xampp/htdocs/Source_Ref/views/main/navbar.php');
?>
<main id="main">
    <!-- Modal -->
    <?php
    foreach ($products as $product) {
        echo
        '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">' . $product->name . '</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <img src="' . $product->img . '" class="card-img-top" alt="...">
                  <h6 class="card-text"><strong>' . $product->description . '</strong></h6>
                  <p><strong>Giá thành: ' . $product->price . '</strong></p>
                  <p>' . $product->content . '</p>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>';
    }
    ?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h1 style="color: white;"><strong>SẢN PHẨM</strong></h1>
                <ol>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li>Sản phẩm</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php
                foreach ($products as $product) {
                    echo
                    '<!-- Card 1 -->
              <div class="col" data-aos="zoom-in" data-aos-delay="100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="card h-100">
                  <img src="' . $product->img . '" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">' . $product->name . '</h5>
                    <p class="card-text">' . $product->description . '</p>
                  </div>
                </div>
              </div>';
                }
                ?>

            </div>
        </div>

</main><!-- End #main -->

<?php
include_once('/xampp/htdocs/Source_Ref/views/main/footer.php');
?>