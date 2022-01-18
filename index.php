<?php
    session_start();
    include('dbconnection.php');
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
    $products= $conn->query($sql);
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
                <div class="text-center">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value=1>
                        <button type="submit" name=add-to-cart class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>
                    </form>
                </div>
            </div>
            <div class="carousel-item">
                <img src="media/images/Mavic_Digi_i.jpg" class="d-block w-20" alt="...">
                <h5 class="text-center mt-4"><strong>Mavic Digi Drone</strong></h5>
                <h6 class="text-center orange"><strong>$900</strong></h6>
                <div class="text-center">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value=13>
                        <button type="submit" name=add-to-cart class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>
                    </form>
                </div>          
            </div>
            <div class="carousel-item">
                <img src="media/images/Beats_Headphone.jpg" class="d-block w-20" alt="...">
                <h5 class="text-center mt-4"><strong>Beats Headphones</strong></h5>
                <h6 class="text-center orange"><strong>$500</strong></h6>
                <div class="text-center">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value=14>
                        <button type="submit" name=add-to-cart class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>
                    </form>
                </div>
            </div>            
            </div>
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
            <div class="row prod-row">
                <!--Grid column-->
                <?php if($products->num_rows>0): ?>
                    <?php while($product = $products->fetch_assoc()): ?>
                    <div class="col-lg-2 col-md-6 prod mb-5">
                        <!--Card-->
                            <div class="card">
                            <!--Card image-->
                            <img src="<?php echo 'media/uploads/'.$product['picture'] ?>" alt="" >
                            <!--Card image-->
                            <!--Card content-->
                            <div class="card-body text-center">
                                <h5><strong><?php echo $product['productname'] ?></strong></h5>
                                <h6 class="orange"><strong><?php echo('$'.$product['price']) ?></strong></h6>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?=$product['id']?>">
                                    <button type="submit" name=add-to-cart class="btn btn-dark btn-sm">Add to cart <i class="fas fa-shopping-cart lightorange"></i></button>
                                </form>
                            </div>
                            <!--Card content-->
                        </div>
                        <!--Card-->
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!--Grid row-->
        </div>
        <!--Grid row-->
    </section>
</main>
<?php include'includes/footer.php'; ?>
