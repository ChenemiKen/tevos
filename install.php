<?php
	// Database details
    $servername = "localhost";
    $username = "root";		//put your phpmyadmin username.(default is "root")
    $password = "";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "tevos";
    
	$conn = new mysqli($servername, $username, $password);

	// Create database
	$sql = "CREATE DATABASE tevos";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	}else{
		if($conn->error === "Can't create database 'tevos'; database exists"){
			echo "Database already exists";
		}else{
			echo "Error creating database: " . $conn->error;
		}
	}

	echo "<br>";
    
	$conn = new mysqli($servername, $username, $password, $dbname);

	// sql to create tables
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`firstname` varchar(100) NOT NULL,
			`lastname` varchar(100) NOT NULL,
			`email` varchar(50) NOT NULL UNIQUE,
			`password` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users created successfully";
	} else {
	    echo "Error creating users table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS `products` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`productname` varchar(100) NOT NULL,
			`description` varchar(200) NOT NULL,
			`picture` varchar(100) NOT NULL,
			`price` varchar(11) NOT NULL,
			`user_id` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table products created successfully";
	} else {
	    echo "Error creating products table: " . $conn->error;
	}
		
	$conn->close();
?>