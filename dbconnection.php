<?php
    // Database details
    $servername = "localhost";
    $username = "root";		//put your phpmyadmin username.(default is "root")
    $password = "";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "tevos";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    if (mysqli_connect_error()){
        die('Error connecting to the database:'.mysqli_connect_error());
    }
?>