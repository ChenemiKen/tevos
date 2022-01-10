<?php
  session_start();
  $message=[];
  if(isset($_SESSION['user_id']) && isset($_SESSION['admin'])){
    header('Location: dashboard.php');
  }else{
    if(isset($_POST['submit'])){
        // database connection
        include('../dbconnection.php');
        
        // get the form data /escaping special characters
        $email = $conn -> real_escape_string($_POST['email']);
        $password = $conn -> real_escape_string($_POST['password']);
  
        $sql = "SELECT * FROM users WHERE email='$email'";
        $user= $conn->query($sql);
        if ($user->num_rows >0){
          $user = $user->fetch_assoc();
          if($user['is_admin'] == true){
            if(password_verify($password, $user['password'])){
              $_SESSION['user_id']= $user['id'];
              $_SESSION['user_names']= $user['firstname']." ".$user['lastname'];
              $_SESSION['user_email']= $user['email'];
              $_SESSION['admin']= true;
              $_SESSION['flash_message'] = array("category"=>"success","message"=>"Logged in!");;
              header('Location: dashboard.php');
              exit();
            }else{
              $message=array("category"=>"danger","message"=>"Wrong password");
            } 
          }else{
            $message=array("category"=>"danger","message"=>"Access denied.");
          }
        } else {
          $message=array("category"=>"danger","message"=>"Incorrect email");
        }
        $conn->close();
    }
  }
?>
<?php
$title = "Admin";
include('includes/header.php');
?>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>

        <hr class=" col-6 offset-3 mb-3">
        <h3 class="text-center mb-4 orange">Tevos Admin</h3>
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
</body>
</html>