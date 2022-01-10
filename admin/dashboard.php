<?php 
session_start();
$message=[];
include('../dbconnection.php');
// get users count
$sql = "SELECT * FROM users";
$user_count = $conn->query($sql)->num_rows;
// get sellers count
$sql = "SELECT * FROM sellers";
$seller_count= $conn->query($sql)->num_rows;
// get product count
$sql = "SELECT * FROM products";
$product_count= $conn->query($sql)->num_rows;
// get cart count
$sql = "SELECT * FROM carts";
$cart_count= $conn->query($sql)->num_rows;
?>
<?php
$title = "Admin dashboard";
include('includes/header.php');
?>
<main role="main">
    <?php include('includes/navbar.php')?>
    <div class="flex-container">
        <div id="sidebar" class="collapse show">
            <div class="sidenav-item">
                <a href="dashboard.php">
                    <div class="sidenav-active my-4">
                        <i class="fas fa-tachometer-alt"></i>
                        <h6>Dashboard</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="users.php">
                    <div>
                        <i class="fas fa-users"></i>
                        <h6>Users</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="products.php">
                    <div>
                        <i class="fas fa-cookie"></i>
                        <h6>Products</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="sellers.php">
                    <div>
                        <i class="fas fa-store"></i>
                        <h6>Sellers</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="cart_items.php">
                    <div>
                        <i class="fas fa-shopping-cart"></i>
                        <h6>Carts</h6>
                    </div>
                </a>
            </div>
        </div>
        <div id="workspace">
            <div class="sessions-card card d-inline-block me-5">
                <small class="text-muted">User count</small>
                <h1><strong><?php echo $user_count; ?></strong></h1>
                <h6>Users</h6>
            </div>  
            <div class="sessions-card card float-left d-inline-block ms-5 me-5">
                <small class="text-muted">Seller count</small>
                <h1><strong><?php echo $seller_count; ?></strong></h1>
                <h6>Sellers</h6>
            </div>  
            <div class="sessions-card card d-inline-block ms-5 me-5">
                <small class="text-muted">Product count</small>
                <h1><strong><?php echo $product_count; ?></strong></h1>
                <h6>Products</h6>
            </div> 
            <div class="sessions-card card d-inline-block ms-5">
                <small class="text-muted">Cart count</small>
                <h1><strong><?php echo $cart_count; ?></strong></h1>
                <h6>Carts</h6>
            </div> 
    </div> 
    </div>
</main>
<?php include'includes/footer.php'; ?>