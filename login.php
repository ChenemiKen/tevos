<?php
  session_start();
  $message=[];
  if(isset($_POST['submit'])){
      // database connection
      include('dbconnection.php');
      
      // get the form data /escaping special characters
      $email = $conn -> real_escape_string($_POST['email']);
      $password = $conn -> real_escape_string($_POST['password']);

      // check for user in sellers
      $sql = "SELECT * FROM sellers WHERE email='$email'";
      $seller= $conn->query($sql);
      if ($seller->num_rows >0){
        $seller = $seller->fetch_assoc();
        // verify seller password
        if(password_verify($password, $seller['password'])){
          $_SESSION['user_id']= $seller['id'];
          $_SESSION['user_names']= $seller['firstname']." ".$seller['lastname'];
          $_SESSION['user_email']= $seller['email'];
          $_SESSION['seller']= true;
          $_SESSION['flash_message'] = array("category"=>"success","message"=>"Logged in!");
          update_user_cart($conn);
          if(isset($_GET['ref'])){
            header('Location: '.$_GET['ref']);
          }else{
            header('Location: index.php');
          }
          exit();
        }else{
          $message=array("category"=>"danger","message"=>"Wrong password");
        } 
      }else{
        // if user is not in sellers check regular users
        $sql = "SELECT * FROM users WHERE email='$email'";
        $user= $conn->query($sql);
        if ($user->num_rows >0){
          $user = $user->fetch_assoc();
          // verify user password
          if(password_verify($password, $user['password'])){
            $_SESSION['user_id']= $user['id'];
            $_SESSION['user_names']= $user['firstname']." ".$user['lastname'];
            $_SESSION['user_email']= $user['email'];
            $_SESSION['user']= true;
            $_SESSION['flash_message'] = array("category"=>"success","message"=>"Logged in!");
            update_user_cart($conn);
            if(isset($_GET['ref'])){
              header('Location: '.$_GET['ref']);
            }else{
              header('Location: index.php');
            }
            exit();
          }else{
            $message=array("category"=>"danger","message"=>"Wrong password");
          } 
        }else{
          // user not found
          $message=array("category"=>"danger","message"=>"Incorrect details");
        }
      }
      $conn->close();
  }
?>
<?php 
  $title = 'Login'; 
  include'./includes/header.php'; 
?>
<main role="main" class="container">
    <?php include'includes/navbar.php'; ?>

    <hr class=" col-6 offset-3 mb-3">
    <h3 class="text-center mb-4 orange">Login</h3>
    <form action="" method="POST" class="g-3 col-md-6 offset-md-3">
      <?php
        if($message){
          // $messages= implode('<br/>', $message);
          $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
          echo $messageText;
        }
      ?>
      <input type="email" name="email" class="form-control mb-4" placeholder="Email" aria-label="Email" required>
      <input type="password" name="password" class="form-control mb-4" placeholder="Password" aria-label="Password" required>
      <div class="text-center mb-4">
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="text-center">
        <small>Don't have an account? <a href="register.php" class="orange">Sign Up</a></small>
    </div>
    </form>
</main>
<?php include'includes/footer.php'; ?>
<?php
  function update_user_cart($conn){
    if(isset($_SESSION['user_id'])){
      // fetch user cart
      $user_id = $_SESSION['user_id'];
      $user_cart_id = null;
      $sql = "SELECT * FROM carts WHERE `user_id`='$user_id'";
      $user_cart = $conn->query($sql);
      if($user_cart->num_rows>0){
          $user_cart = $user_cart->fetch_assoc();
          $user_cart_id = $user_cart['id'];
          $_SESSION['user_cart_id'] = $user_cart_id;
          $sql = "SELECT * FROM cart_items WHERE cart_id='$user_cart_id'";
          $cart_items = $conn->query($sql);
          if($cart_items->num_rows>0){
            $db_cart = array();
            while($item = $cart_items->fetch_assoc()){
                $db_cart[$item['product_id']] = $item['quantity']; 
            }
            if(isset($_SESSION['cart'])){
              var_dump($_SESSION['cart']);
              $new_items = array_diff_key($_SESSION['cart'],$db_cart);
              foreach($new_items as $item_key=>$item_value){
                  $sql = "INSERT INTO cart_items(product_id,cart_id,quantity)VALUES('$item_key','$user_cart_id','$item_value')";
                  $conn->query($sql);
              }
            }
            foreach($db_cart as $item_key=>$item_value){
              $_SESSION['cart'][$item_key] = $item_value; 
            }
          }
      }else{
        $session_id = session_id();
        $sql = "INSERT INTO carts(`user_id`,`session_id`)VALUES('$user_id','$session_id')";
        if($conn->query($sql) == TRUE){
          $user_cart_id = $conn->insert_id;
          $_SESSION['user_cart_id'] = $user_cart_id;
          if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $item_key=>$item_value){
              $sql = "INSERT INTO cart_items(product_id,cart_id,quantity)VALUES('$item_key','$user_cart_id','$item_value')";
              $conn->query($sql);
            }
          }
        }
      }  
    }
  }
?>