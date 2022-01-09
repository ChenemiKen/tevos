<?php 
session_start();
$message=[];
include('../dbconnection.php');
$sql = "SELECT * FROM sellers";
$sellers= $conn->query($sql);
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
                    <div class="sidenav-active">
                        <i class="fas fa-calendar-alt"></i>
                        <h6>Sellers</h6>
                    </div>
                </a>
            </div>
        </div>
        <div id="workspace">
            <h6 class="text-center"><strong>Tevos Sellers</strong></h6>
            <table class="table table-hover table-sm table-responsive-xs table-bordered students-table">
                <caption>All tevos Sellers</caption>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Shop name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($sellers->num_rows>0): ?>
                    <?php while($seller = $sellers->fetch_assoc()): ?>
                        <tr>
                            <th scope="row"><?php echo $seller['id']; ?></th>
                            <td><?php echo ($seller['firstname'].' '.$seller['lastname']) ?></td>
                            <td><?php echo $seller['email']; ?></td>
                            <td><?php echo $seller['shopname']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: echo"No Sellers found"; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div> 
    </div>
</main>
<?php include'includes/footer.php'; ?>