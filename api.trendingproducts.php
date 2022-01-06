<?php
include('dbconnection.php');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
if(isset($_GET['apikey'])){
    $api_key = $_GET['apikey'];
    // check if the api key exists
    $sql = "SELECT * FROM users WHERE api_key='$api_key'";
    $user = $conn->query($sql);
    if($user->num_rows>0){
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
        $products= $conn->query($sql);
        if($products->num_rows>0){
            $trending_products = array();
            while($product = $products->fetch_assoc()){
                array_push($trending_products,$product);
            }
            http_response_code(200);
            $trending_products = json_encode($trending_products);
            echo($trending_products);
        }
    }else{
        http_response_code(400);
        $response = [];
        $response['status'] = 400;
        $response['error'] = "Incorrect API key";
        $response = json_encode($response);
        echo($response);
    }
}else{
    http_response_code(400);
    $response = [];
    $response['status'] = 400;
    $response['error'] = "API key is required";
    $response = json_encode($response);
    echo($response);
}
?>