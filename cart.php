<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include('dbconnection.php');
if(isset($_POST['add-to-cart'])){
    // If the user clicked the add to cart button on the product page we can check for the form data
    if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
        // Set the post variables so we easily identify them, also make sure they are integer
        $product_id = (int)$_POST['product_id'];
        // Prepare the SQL statement,
        $sql = "SELECT * FROM products WHERE id ='$product_id'";
        // Fetch the product from the database and return the result as an Array
        $product = $conn->query($sql);
        if ($product->num_rows>0){
            $product = $product->fetch_assoc();
            // Product exists in database, now we can create/update the session variable for the cart
            add_to_cart($product['id']);
        }
        // Prevent form resubmission...
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }
}
function add_to_cart($product_id){
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            // Product exists in cart so just update the quanity
            $_SESSION['cart'][$product_id] +=1;
        } else {
            // Product is not in cart so add it
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        // There are no products in cart, this will add the first product to cart
        $_SESSION['cart'] = array($product_id => 1);
    }
}

function get_cart_count(){
    if(isset($_SESSION['cart'])&& is_array($_SESSION['cart'])){
        $cart_count=count($_SESSION['cart']);
        return $cart_count;
    }
    return 0;
}

?>