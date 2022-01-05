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

      // validate email address
      $verifyEmail = verifyEmail($email);
      if($verifyEmail=='valid'){
        // check password
        if(!($password1 === $password2)){
          $message=array("category"=>"danger","message"=>"Passwords do not match");
        }else{
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
      }else{
        $message=array("category"=>"danger","message"=>$verifyEmail);
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
          <div class="input-group mb-4">
            <input type="password" name="password1" class="form-control border-end-0" placeholder="Password" aria-label="Password" required>
            <button id="password1eyebtn" class="btn btn-outline-secondary border-start-0 border">
              <i id="password1eye" class="fas fa-eye"></i>
            </button>
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-4">
            <input type="password" name="password2" class="form-control border-end-0" placeholder="Confirm password" aria-label="Confirm Password" required>
            <button id="password2eyebtn" class="btn btn-outline-secondary border-start-0 border">
              <i class="fas fa-eye" id="password2eye"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- password generator -->
        <div class="mb-4 text-center">
            <button id="gen-pass-btn" class="btn btn-secondary btn-sm">Generate Password <div id="pass-loader" class="loader d-none ms-1"></div></button>
            <div class="d-inline input-group">
              <input type="text" hidden name="gen-pass" id="autogen-pass-field" class="w-50 frm-input border-end-0">
              <button hidden id="passwordgeneyebtn" class="btn btn-outline-secondary btn-sm border-start-0 border ">
                <i class="fas fa-eye" id="passwordgeneye"></i>
              </button>
            </div>
            <button id="use-btn" hidden disabled class="btn btn-success btn-sm">Use</button>
            <button id="cancel-btn" hidden disabled class="btn btn-secondary btn-sm"><strong>X</strong></button>
            <small id="autogen-failed" class="text-danger" hidden>failed! Try again</small>
        </div>
      <!--  -->
      <div class="text-center mb-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="text-center">
        <small>Already have an account? <a href="login.php" class="orange">Login</a></small>
      </div>
    </form>
</main>
<script src="./static/js/script.js"></script>
<?php include'includes/footer.php'; ?>

<?php
// function to check the validity of email address using the email verification api
function verifyEmail($email){
  $curl = curl_init();
  
  curl_setopt_array($curl, [
    CURLOPT_URL => "https://email-validator15.p.rapidapi.com/v1/validation/single/".$email."?result_type=CHECK_IF_EMAIL_EXIST",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
      "x-rapidapi-host: email-validator15.p.rapidapi.com",
      "x-rapidapi-key: 23383a841fmsh07b5c90d4e5e4f8p12379djsn25c7dd3eeb36"
    ],
  ]);
  
  $response = json_decode(curl_exec($curl), true);
  $err = curl_error($curl);
  
  curl_close($curl);
  
  if ($err) {
    return "cURL Error #:" . $err;
  } else {
    $res = $response['check_if_email_exist'];
    if($res['is_reachable'] !='safe'){
      return "Email address is not reachable. Please enter a valid email";
    }
    if(!$res['smtp']['can_connect_smtp']){
      return "Unable to connect email address via smtp";
    }
    if($res['smtp']['is_disabled']){
      return "email address is disabled";
    }
    return "valid";
  }
}
?>