<?php
    session_start();
    $title = 'Ecommerce web application'; 
?>
<?php include'includes/header.php'; ?>
<main role="main" class="container">
    <?php include'includes/navbar.php'; ?>
    <?php include'includes/flashMessage.php'; ?>
    
    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel carousel-dark slide carousel-fade mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="media/images/Smart_Watch.jpg" class="d-block w-20" alt="...">
                <h5 class="text-center mt-4"><strong>Smart Watch</strong></h>
                <h6 class="text-center orange"><strong>$300</strong></h6>
                <div class="text-center"><button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button></div>
            </div>
            <div class="carousel-item">
                <img src="media/images/Mavic_Digi_i.jpg" class="d-block w-20" alt="...">
                <h5 class="text-center mt-4"><strong>Mavic Digi Drone</strong></h5>
                <h6 class="text-center orange"><strong>$900</strong></h6>
                <div class="text-center"><button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button></div>            </div>
            <div class="carousel-item">
                <img src="media/images/Beats_Headphone.jpg" class="d-block w-20" alt="...">
                <h5 class="text-center mt-4"><strong>Beats Headphones</strong></h5>
                <h6 class="text-center orange"><strong>$500</strong></h6>
                <div class="text-center"><button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button></div>            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Products section -->
    <section class="text-center mb-5">
        <hr class=" col-8 offset-2 mb-3">
        <h4 class="ht-brands mb-4"><strong>Hot Brands</strong></h4>
        <!--Grid row-->
        <div class="ms-lg-5 ps-lg-5">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-5">
                    <!--Card-->
                        <div class="card">
                        <!--Card image-->
                        <img src="media/images/15.jpg" alt="" >
                        <!--Card image-->
                        <!--Card content-->
                        <div class="card-body text-center">
                            <h5><strong>Denim jacket</strong></h5>
                            <h6 class="orange"><strong>$400</strong></h6>
                            <button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>
                        </div>
                        <!--Card content-->
                    </div>
                    <!--Card-->
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-2 col-md-5 offset-lg-1 mb-5">
                    <!--Card-->
                    <div class="card">
                        <!--Card image-->
                        <img src="media/images/Beats_Headphone.jpg" alt="" >
                        <!--Card image-->
                        <!--Card content-->
                        <div class="card-body text-center">
                            <h5><strong>Beats Headphone</strong></h5>
                            <h6 class="orange"><strong>$300</strong></h6>
                            <button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>                        </div>
                        <!--Card content-->
                    </div>
                    <!--Card-->
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-2 col-md-5 offset-lg-1 mb-5">
                    <!--Card-->
                    <div class="card">
                        <!--Card image-->
                        <img src="media/images/m1_macbook.jfif" alt="" >
                        <!--Card image-->
                        <!--Card content-->
                        <div class="card-body text-center">
                            <h5><strong>Mackbook pro M1</strong></h5>
                            <h6 class="orange"><strong>$900</strong></h6>
                            <button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>                        </div>
                        <!--Card content-->
                    </div>
                    <!--Card-->
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-2 col-md-5 offset-lg-1 mb-5">
                    <!--Card-->
                    <div class="card">
                        <!--Card image-->
                        <img src="media/images/Smart_Watch.jpg" alt="" >
                        <!--Card image-->
                        <!--Card content-->
                        <div class="card-body text-center">
                            <h5><strong>Smart Watch</strong></h5>
                            <h6 class="orange"><strong>$400</strong></h6>
                            <button class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>                        </div>
                        <!--Card content-->
                    </div>
                    <!--Card-->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!--Grid row-->
    </section>
</main>
<?php include'includes/footer.php'; ?>
