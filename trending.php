<?php
    session_start();
    $message=[];
    include('dbconnection.php');
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
    $products= $conn->query($sql);
?>
<?php 
  $title = 'Products'; 
  include'./includes/header.php'; 
?>
<main role="main" class="container">
    <?php include'./includes/navbar.php'; ?>
    <?php include'./includes/flashMessage.php'; ?>

    <hr class=" col-8 offset-2 mb-3">
    <h5 class="text-center"><strong>Trending products</strong></h5>
    <section class="text-center mt-5 mb-5">
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