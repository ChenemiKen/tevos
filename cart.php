<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$message=[];
include('dbconnection.php');
// add to cart
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

if(isset($_POST['placeorder'])){
    if(isset($_SESSION['user_id'])){
        // exit();
    }else{
        header("Location: login.php?ref=cart.php");
        exit();
    }
}

// Check the session variable for products in cart
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products_in_cart = array_keys($cart);
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($cart), '?'));
    $products_in_cart = implode("','",$products_in_cart);
    $stmt = "SELECT * FROM products WHERE id IN ('" . $products_in_cart . "')";
    // // We only need the array keys, not the values, the keys are the id's of the products
    $products = $conn->query($stmt);
    // // Fetch the products from the database and return the result as an Array
    
}
?>
<?php 
  $title = 'Products'; 
  include'./includes/header.php'; 
?>
<main role="main" class="container">
    <?php include'./includes/navbar.php'; ?>
    <?php include'./includes/flashMessage.php'; ?>

    <div class="cart content-wrapper">
        <h5 class="text-center mb-4 orange">Cart Summary </h5>
        <form action="cart.php" method="post" class="col-md-10 offset-md-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$products->num_rows>0): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                    <?php else: ?>
                    <?php while($product = $products->fetch_assoc()){ ?>
                    <tr>
                        <td class="img">
                            <a href="index.php?page=product&id=<?=$product['id']?>">
                                <img src="./media/uploads/<?=$product['picture']?>" width="50" height="50" alt="<?=$product['productname']?>">
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['productname']?></a>
                            <br>
                            <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove small text-secondary">Remove</a>
                        </td>
                        <td class="price">&dollar;<?=$product['price']?></td>
                        <td class="quantity">
                            <input type="number" name="quantity-<?=$product['id']?>" value="<?=$cart[$product['id']]?>" min="1" max="1000" placeholder="Quantity" required>
                        </td>
                        <td class="price">&dollar;<?=$product['price'] * $cart[$product['id']]?></td>
                    </tr>
                    <?php
                            $subtotal += (float)$product['price'] * (int)$cart[$product['id']];
                        } 
                    ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span class="text">Subtotal</span>
                <span class="price">&dollar;<?=$subtotal?></span>
            </div>
            <div class="buttons">
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Place Order" name="placeorder">
            </div>
        </form>
    </div>

</main>
<?php 

?>