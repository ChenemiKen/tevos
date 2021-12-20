<?php
  session_start();
  $message=[];
  // get the form data
  if(isset($_POST['submit'])){
    include('dbconnection.php');
    if(empty($_POST['firstname'])||empty($_POST['lastname'])||empty($_POST['email'])||empty($_POST['password1'])||empty($_POST['password2'])){
      $message=array("category"=>"danger","message"=>"Please fill all fields");
    }else{
      // get the form data /escaping special characters
      $first_name = $conn -> real_escape_string($_POST['firstname']);
      $last_name = $conn -> real_escape_string($_POST['lastname']);
      $email = $conn -> real_escape_string($_POST['email']);
      $password1 = $conn -> real_escape_string($_POST['password1']);
      $password2 = $conn -> real_escape_string($_POST['password2']);

      if(!($password1 === $password2)){
        $message=array("category"=>"danger","message"=>"Passwords do not match");
      }
      else{
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstname,lastname,email,`password`) VALUES('$first_name','$last_name','$email','$passwordHash')";
        if ($conn->query($sql) === TRUE) {
          $user_id = $conn->insert_id;
          $message=array("category"=>"success","message"=>"Registration successfull");
          $_SESSION['user_id']= $user_id;
          $_SESSION['user_names']=$first_name." ".$last_name;
          $_SESSION['user_email']= $email;
          $_SESSION['flash_message']= array("category"=>"success","message"=>"Signup Succesfull. You are Logged in!");
          header('Location: index.php');
          exit();
        } else {
          if(substr($conn->error,0,15)==="Duplicate entry" && substr($conn->error,-7)==="'email'"){
            $message=array("category"=>"danger","message"=>"Email already registered");
          }else{
            echo "Registration failed: " . $sql . "<br>" . $conn->error;
            $message=array("category"=>"danger","message"=>"Registration failed: " . $sql . "<br>" . $conn->error);
          }
        }
        
      }
    }
    $conn->close();
  }
?>
<?php 
  $title = 'Signup'; 
  include'./includes/header.php'; 
?>
<main role="main" class="container">
    <?php include'./includes/navbar.php'; ?>
    <?php include'./includes/flashMessage.php'; ?>
    
    <hr class=" col-6 offset-3 mb-3">
    <h3 class="text-center mb-4 orange">Signup</h3>
    <form action="" method="POST" class="g-3 col-md-8 offset-md-2" >
      <?php
        if($message){
          // $messages= implode('<br/>', $message);
          $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
          echo $messageText;
        }
      ?>
      <div class="row">
        <div class="col">
          <input type="text" name="firstname" class="form-control mb-4" placeholder="First name" aria-label="First name" required>
        </div>
        <div class="col">
          <input type="text" name="lastname" class="form-control mb-4" placeholder="Last name" aria-label="Last name" required>
        </div>
      </div>
      <input type="email" name="email" class="form-control mb-4" placeholder="Email" aria-label="Email" required>
      <div class="row">
        <div class="col">
          <input type="password" name="password1" class="form-control mb-4" placeholder="Password" aria-label="Password" required>
        </div>
        <div class="col">
          <input type="password" name="password2" class="form-control mb-4" placeholder="Confirm password" aria-label="Confirm Password" required>
        </div>
      </div>
      <div class="text-center mb-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="text-center">
        <small>Already have an account? <a href="login.php" class="orange">Login</a></small>
      </div>
    </form>
</main>
<?php include'includes/footer.php'; ?>

