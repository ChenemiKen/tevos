<?php
    session_start();
    $message=[];
    if(isset($_POST['submit'])){
        include('dbconnection.php');
        if(empty($_POST['product_name'])||empty($_POST['description'])||empty($_POST['price'])){
            $message=array("category"=>"danger","message"=>"Please fill all fields");
        }else{
            // var_dump($_FILES);
            if(!file_exists($_FILES['product_picture']['tmp_name'])){
                $message=array("category"=>"danger","message"=>"Please insert a picture of the product"); 
            }else{
                // get the form data and cleaning
                $product_name = $conn -> real_escape_string($_POST['product_name']);
                $description = $conn -> real_escape_string($_POST['description']);
                $price = $conn -> real_escape_string($_POST['price']);

                $user_id= $_SESSION['user_id'];

                $filePath = './media/uploads/'.$_FILES['product_picture']['name'];
                $picture_name = basename($_FILES['product_picture']['name']);
                $tmp_name= $_FILES['product_picture']['tmp_name'];
                // upload product picture
                if(move_uploaded_file($tmp_name, $filePath)){
                    // save the data to the database
                    $sql = "INSERT INTO products (`productname`,`description`,`picture`,`price`,`user_id`) VALUES('$product_name','$description','$picture_name','$price','$user_id')";
                    if ($conn->query($sql) === TRUE) {
                        $product_id = $conn->insert_id;
                        $_SESSION['flash_message']= array("category"=>"success","message"=>"New product addded successfully");
                        // header('Location: products.php');
                        // exit();
                    } else {
                        echo "failed to add product " . $sql . "<br>" . $conn->error;
                        $message=array("category"=>"danger","message"=>"failed to add product " . $sql . "<br>" . $conn->error);
                    }
                }else{
                    $message=array("category"=>"danger","message"=>"Unable to upload picture, failed to add product");
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="static/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="static/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/style.css">
    <title>Tevos::New product</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        <?php include'includes/flashMessage.php'; ?>
        
        <hr class=" col-6 offset-3 mb-5">
        <h4 class="text-center mb-4"><Strong>New product</Strong></h4>
        <form action="" method="POST" enctype="multipart/form-data" class="g-3 col-md-8 offset-md-2">
            <?php
                if($message){
                // $messages= implode('<br/>', $message);
                $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
                echo $messageText;
                }
            ?>
            <input type="text" name="product_name" required class="form-control mb-4" placeholder="Product name" aria-label="Product name">
            <textarea name="description" required class="form-control mb-4" rows="3" placeholder="Description"></textarea>
            <div class="row">
                <div class="col">
                    <label for="formFile" class="form-label">Picture</label>
                    <input type="file" required name="product_picture" class="form-control mb-4" id="formFile">
                </div>
                <div class="col">
                    <label for="price" class="form-label">Price($)</label>
                    <input type="number" required name="price" id="price" class="form-control mb-4" placeholder="Price" aria-label="Price">
                </div>
            </div>
            <div class="text-center">
            <button type="submit" name="submit" class="btn btn-orange">Submit</button>
            </div>
        </form>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>