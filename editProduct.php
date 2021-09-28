<?php
    session_start();
    $message=[];
    include('dbconnection.php');
    
    $prod_id;
    $prod_name;
    $prod_desc;
    $prod_price;
    $prod_pic;

    if(isset($_POST['submit']) && $_POST['submit']=== 'edit'){
            // get the form data and cleaning
            $prod_id = $conn -> real_escape_string($_POST['prod_id']);
            $prod_name = $_POST['prod_name'];
            $prod_desc = $conn -> real_escape_string($_POST['prod_desc']);
            $prod_price = $conn -> real_escape_string($_POST['prod_price']);
            $prod_pic = $conn -> real_escape_string($_POST['prod_pic']);
            
            // $user_id= $_SESSION['user_id'];
    }else{
        if(isset($_POST['submit']) && $_POST['submit']=== 'done'){
            if(empty($_POST['product_name'])||empty($_POST['description'])||empty($_POST['price'])){
                $message=array("category"=>"danger","message"=>"Please fill all fields");
            }else{
                // get the form data and cleaning
                $prod_id = $conn -> real_escape_string($_POST['prod_id']);
                $prod_name = $conn -> real_escape_string($_POST['product_name']);
                $prod_desc = $conn -> real_escape_string($_POST['description']);
                $prod_price = $conn -> real_escape_string($_POST['price']);

                $user_id= $_SESSION['user_id'];

                // if new picture, upload and change picture
                if(file_exists($_FILES['product_picture']['tmp_name'])){
                    $filePath = './media/uploads/'.$_FILES['product_picture']['name'];
                    $new_picture_name = basename($_FILES['product_picture']['name']);
                    $tmp_name= $_FILES['product_picture']['tmp_name'];
                    // upload product picture
                    if(move_uploaded_file($tmp_name, $filePath)){
                        // save the data to the database'
                        $sql = "UPDATE products SET productname='$prod_name', `description`='$prod_desc', picture='$new_picture_name', price='$prod_price' WHERE id=$prod_id";
                        if ($conn->query($sql) === TRUE) {
                            $product_id = $conn->insert_id;
                            $_SESSION['flash_message']= array("category"=>"success","message"=>"Product updated successfully");
                            header('Location: myproducts.php');
                            // exit();
                        } else {
                            echo "failed to update product " . $sql . "<br>" . $conn->error;
                            $message=array("category"=>"danger","message"=>"failed to update product " . $sql . "<br>" . $conn->error);
                        }
                    }else{
                        $message=array("category"=>"danger","message"=>"Unable to upload picture, failed to update product");
                    }

                }else{
                    // if no new picture just update the rest
                    // save the data to the database
                    $sql = "UPDATE products SET productname='$prod_name', `description`='$prod_desc', price='$prod_price' WHERE id=$prod_id";
                    if ($conn->query($sql) === TRUE) {
                        $product_id = $conn->insert_id;
                        $_SESSION['flash_message']= array("category"=>"success","message"=>"Product updated successfully");
                        header('Location: myproducts.php');
                        // exit();
                    } else {
                        echo "failed to update product " . $sql . "<br>" . $conn->error;
                        $message=array("category"=>"danger","message"=>"failed to update product " . $sql . "<br>" . $conn->error);
                    }
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
    <title>Tevos::Edit product</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        <?php include'includes/flashMessage.php'; ?>
        
        <hr class=" col-6 offset-3 mb-5">
        <h3 class="text-center mb-4">Edit Product</h3>
        <form action="" method="POST" enctype="multipart/form-data" class="g-3 col-md-8 offset-md-2">
            <?php
                if($message){
                // $messages= implode('<br/>', $message);
                $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
                echo $messageText;
                }
            ?>
            <input type="hidden" name="prod_id" value=<?php echo $prod_id?> required aria-label="Product_id">
            <input type="text" name="product_name" value="<?php echo $prod_name?>" required class="form-control mb-4" placeholder="Product name" aria-label="Product name">
            <textarea name="description" required class="form-control mb-4" rows="3" placeholder="Description"><?php echo $prod_desc?></textarea>
            <div class="row">
                <div class="col">
                    <label for="formFile" class="form-label">Picture</label>
                    <input type="file" name="product_picture" class="form-control mb-4" id="formFile">
                </div>
                <div class="col">
                    <label for="price" class="form-label">price($)</label>
                    <input type="number" value=<?php echo $prod_price?> required name="price" id="price" class="form-control mb-4" placeholder="Price" aria-label="Price">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" value="done" class="btn btn-orange">Submit</button>
            </div>
        </form>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>