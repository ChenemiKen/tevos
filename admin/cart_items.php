<?php 
session_start();
$message=[];
include('../dbconnection.php');
$sql = "SELECT * FROM carts";
$carts= $conn->query($sql);
$sql = "SELECT * FROM cart_items";
$cart_items= $conn->query($sql);
?>
<?php
$title = "Admin::Sellers";
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
                    <div>
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
            <div class="sidenav-item my-4">
                <a href="sellers.php">
                    <div class="sidenav-active">
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Carts</h6>
                    </div>
                </a>
            </div>
        </div>
        <div id="workspace">
            <div class="row">
                <!-- carts table -->
                <div class="col">
                    <h6 class="text-center"><strong>Carts</strong></h6>
                    <table class="table table-hover table-sm table-responsive-xs table-bordered students-table">
                        <caption>All Carts </caption>
                        <thead>
                            <tr>
                                <th scope="col">Cart Id</th>
                                <th scope="col">User Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($carts->num_rows>0): ?>
                            <?php while($cart = $carts->fetch_assoc()): ?>
                                <tr>
                                    <th scope="row"><?php echo $cart['id']; ?></th>
                                    <td><?php echo ($cart['user_id']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: echo"No Carts found"; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- cart items tabble -->
                <div class="offset-1 col-7">
                    <h6 class="text-center"><strong>Cart Items</strong></h6>
                    <table class="table table-hover table-sm table-responsive-xs table-bordered students-table">
                        <caption>Items in each cart</caption>
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Cart Id</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($cart_items->num_rows>0): ?>
                            <?php while($cart_item = $cart_items->fetch_assoc()): ?>
                                <tr>
                                    <th scope="row"><?php echo $cart_item['id']; ?></th>
                                    <td><?php echo ($cart_item['product_id']) ?></td>
                                    <td><?php echo $cart_item['cart_id']; ?></td>
                                    <td><?php echo $cart_item['quantity']; ?></td>
                                    <td><?php echo $cart_item['created_at']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: echo"No Carts found"; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div> 
    </div>
</main>
<?php include'includes/footer.php'; ?>