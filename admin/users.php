<?php 
session_start();
$message=[];
include('../dbconnection.php');
$sql = "SELECT * FROM users";
$users= $conn->query($sql);
?>
<?php
$title = "Admin::Users";
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
                    <div class="sidenav-active">
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
                <a href="cart_items.php">
                    <div>
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Carts</h6>
                    </div>
                </a>
            </div>
        </div>
        <div id="workspace">
            <h6 class="text-center"><strong>Tevos Users</strong></h6>
            <table class="table table-hover table-sm table-responsive-xs table-bordered students-table">
                <caption>All tevos users</caption>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">API key</th>
                        <th scope="col">Is_admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users->num_rows>0): ?>
                    <?php while($user = $users->fetch_assoc()): ?>
                        <tr>
                            <th scope="row"><?php echo $user['id']; ?></th>
                            <td><?php echo ($user['firstname'].' '.$user['lastname']) ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['api_key']; ?></td>
                            <td><?php if($user['is_admin'] == true){echo "Admin";} ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: echo"No Users found"; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>
<?php include'includes/footer.php'; ?>