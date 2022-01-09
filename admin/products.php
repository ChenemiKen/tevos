<?php 
session_start();
$message=[];
include('../dbconnection.php');
$sql = "SELECT * FROM products";
$products= $conn->query($sql);
?>
<?php
$title = "Admin::Products";
include('includes/header.php');
?>
<main role="main">
    <?php include('includes/navbar.php')?>
    <div class="flex-container">
        <div id="sidebar" class="collapse show">
            <div class="sidenav-item">
                <a href="dashboard.php">
                    <div class="my-4">
                        <i class="fas fa-tachometer-alt"></i>
                        <h6>Dashboard</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="users.php">
                    <div>
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Users</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="products.php">
                    <div class="sidenav-active">
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Products</h6>
                    </div>
                </a>
            </div>
            <div class="sidenav-item my-4">
                <a href="sellers.php">
                    <div>
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Sellers</h6>
                    </div>
                </a>
            </div>
        </div>
        <div id="workspace">
            <h6 class="text-center"><strong>All Products</strong></h6>
            <table class="table table-hover table-sm table-responsive-xs table-bordered students-table">
                <caption>All Products</caption>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Price</th>
                        <th scope="col">Seller_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($products->num_rows>0): ?>
                    <?php while($product = $products->fetch_assoc()): ?>
                        <tr>
                            <th scope="row"><?php echo $product['id']; ?></th>
                            <td><?php echo ($product['productname']) ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td><img src="../media/uploads/<?php echo $product['picture']; ?>" width="40" height="40" alt=""></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['user_id']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: echo"No products found"; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>
<?php include'includes/footer.php'; ?>