<?php
include("dbconnection.php");
$requestMethod = $_SERVER["REQUEST_METHOD"]; 
if ($requestMethod == 'POST') {
    if(isset($_POST['email']) && isset($_POST['password'])){
        // get the form data /escaping special characters
        $email = $conn -> real_escape_string($_POST['email']);
        $password = $conn -> real_escape_string($_POST['password']);
    
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        // check for user in sellers
        $sql = "SELECT * FROM users WHERE email='$email'";
        $user= $conn->query($sql);
        if ($user->num_rows >0){
        $user = $user->fetch_assoc();
        // verify seller password
        if(password_verify($password, $user['password'])){
            http_response_code(200);
            $response = [];
            $response['status'] = 200;
            $response['email'] = $user['email'];
            if(isset($user['api_key'])){
                // if the user already has an api key return it
                $response['api_key'] = $user['api_key'];
                $response = json_encode($response);
                echo($response);
            }else{
                // if the user doesnt have a key, generate a new key and save it
                $new_key = bin2hex(random_bytes(10));
                $sql = "UPDATE users SET api_key='$new_key' WHERE email='$email'";
                $update= $conn->query($sql);
                $response['api_key'] = $new_key;
                $response = json_encode($response);
                echo($response);
            }
        }else{
            http_response_code(400);
            $response = [];
            $response['status'] = 400;
            $response['error'] = "Incorrect email or password";
            $response = json_encode($response);
            echo($response); 
        }
        }else {
            http_response_code(400);
            $response = [];
            $response['status'] = 400;
            $response['error'] = "Incorrect email or password";
            $response = json_encode($response);
            echo($response);
        }
    }else{
        http_response_code(400);
        $response = [];
        $response['status'] = 400;
        $response['error'] = "Email and password required";
        $response = json_encode($response);
        echo($response);
    }
}else{
    http_response_code(404);
}
?>