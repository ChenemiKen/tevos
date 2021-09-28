<?php
    session_start();
    $message=[];
    include('dbconnection.php');
    $user_id = $_SESSION['user_id'];

    // Delete product code
    if(isset($_POST['submit']) && $_POST['submit']==='delete'){
        $prod_id = $conn->real_escape_string($_POST['prod_id']);

        $sql ="DELETE FROM products WHERE id=$prod_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['flash_message']= array("category"=>"success","message"=>"Product deleted successfully");
        } else {
            echo "Unable to delete product " . $sql . "<br>" . $conn->error;
            $message=array("category"=>"danger","message"=>"Unable to delete product " . $sql . "<br>" . $conn->error);
        }
    }

    // render products 
    $sql = "SELECT * FROM products WHERE user_id='$user_id'";
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
    <title>Trevos::My Products</title>
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
                                            <h6 class="font-weight-bold blue-text"><strong><?php echo('$'.$product['price']) ?></strong></h6>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <form action="editProduct.php" method="POST" class="col">
                                                <input type="hidden" name="prod_id" value=<?php echo $product['id']?>>
                                                <input type="hidden" name="prod_name" value="<?php echo $product['productname']?>">
                                                <input type="hidden" name="prod_desc" value="<?php echo $product['description']?>">
                                                <input type="hidden" name="prod_price" value="<?php echo $product['price']?>">
                                                <input type="hidden" name="prod_pic" value="<?php echo $product['picture']?>">
                                                <button type="submit" name='submit' value="edit" class="btn btn-outline-primary btn-sm">Edit</button>
                                            </form>
                                            <form action="" method="POST" class="col">
                                                <input type="hidden" name="prod_id" value=<?php echo $product['id']?>>
                                                <button type="submit" name='submit' value="delete" class="btn btn-outline-warning btn-sm ">Delete</button>
                                            </form>
                                        </div>
                                        <!--Card content-->
                                    </div>
                                    <!--Card-->
                                </div>
                    <?php   }
                        }else{
                            echo" You have not added any products yet";
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