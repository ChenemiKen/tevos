<?php
include('dbconnection.php');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
if(isset($_GET['apikey'])){
    if(isset($_GET['city'])){
        $city = $_GET['city'];
        $sql = "SELECT * FROM postal_codes WHERE city='$city'";
        $details = $conn->query($sql);
        if($details->num_rows>0){
            $city_details = [];
            while($detail = $details->fetch_assoc()){
                $city_details['city'] = $detail['city'];
                $city_details['postal code'] = $detail['postal_code'];
            }
            http_response_code(200);
            $city_details = json_encode($city_details);
            echo($city_details);
        }else{
            http_response_code(404);
            $response = [];
            $response['status'] = 400;
            $response['error'] = "City not found";
            $response = json_encode($response);
            echo($response);
        }
    }else{
        http_response_code(400);
        $response = [];
        $response['status'] = 400;
        $response['error'] = "City parameter is required.";
        $response = json_encode($response);
        echo($response);
    }
}else{
    http_response_code(400);
    $response = [];
    $response['status'] = 400;
    $response['error'] = "API key is required.";
    $response = json_encode($response);
    echo($response);
}
?>