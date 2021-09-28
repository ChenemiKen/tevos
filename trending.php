<?php
    session_start();
    $message=[];
    include('dbconnection.php');
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

        <hr class=" col-8 offset-2 mb-3">
        <h5 class="text-center"><strong>Trending products</strong></h5>
        <section class="text-center mt-5 mb-5">
            <!--Grid row-->
            <div class="ms-lg-5 ps-lg-5">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-5">
                        <!--Card-->
                            <div class="card">
                            <!--Card image-->
                            <img src="media/images/12.jpg" alt="" >
                            <!--Card image-->
                            <!--Card content-->
                            <div class="card-body text-center">
                                <h5><strong>Denim blue</strong></h5>
                                <h6 class="orange"><strong>$300</strong></h6>
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
                            <img src="media/images/m1_macbook.jfif" alt="" >
                            <!--Card image-->
                            <!--Card content-->
                            <div class="card-body text-center">
                                <h5><strong>Macbook M1 Pro</strong></h5>
                                <h6 class="orange"><strong>$900</strong></h6>
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
                            <img src="media/images/Smart_Watch.jpg" alt="" >
                            <!--Card image-->
                            <!--Card content-->
                            <div class="card-body text-center">
                                <h5><strong>Smart watch</strong></h5>
                                <h6 class="orange"><strong>$400</strong></h6>
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
                                <h6 class="orange"><strong>$350</strong></h6>
                            </div>
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
</body>
</html>