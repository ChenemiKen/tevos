<?php
    session_start();
    $message=[];
    include('dbconnection.php');
    $sql = "SELECT * FROM products";
    $products= $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="static/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="static/css/style.css">
    <title>Trevos::Products</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        
        <section class="text-center mt-5 mb-5">
            <hr class=" col-8 offset-2 mb-5">
            <!-- Grid row -->
            <div class="ms-lg-5">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <?php
                        if($products->num_rows>0){
                            while($product = $products->fetch_assoc()){
                    ?>
                                <div class="col-lg-2 col-md-6 mx-5 mb-5">
                                    <!--Card-->
                                    <div class="card">
                                        <!--Card image-->
                                        <img src=<?php echo('"media/uploads/'.$product['picture']).'"'?> alt="" >
                                        <!--Card image-->
                                        <!--Card content-->
                                        <div class="card-body text-center">
                                            <h5><strong><?php echo $product['productname'] ?></strong></h5>
                                            <h6 class="orange"><strong><?php echo('$'.$product['price']) ?></strong></h6>
                                        </div>
                                        <!--Card content-->
                                    </div>
                                    <!--Card-->
                                </div>
                    <?php   }
                        }else{
                            echo"No products found";
                        }
                    ?>
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid row -->
        </section>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>