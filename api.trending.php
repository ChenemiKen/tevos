<?php
include('dbconnection.php');
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
$products= $conn->query($sql);
?>