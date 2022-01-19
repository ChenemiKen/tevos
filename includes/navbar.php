<?php
  function get_cart_count(){
    if(isset($_SESSION['cart'])&& is_array($_SESSION['cart'])){
        $cart_count=count($_SESSION['cart']);
        return $cart_count;
    }
    return 0;
  }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1"><strong>Tevos</strong></span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./trending.php">Trending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./products.php">Products</a>
        </li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <?php if(isset($_SESSION['seller'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="./myproducts.php">My Products</a>
              </li>
            <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">API Key</a>
            </li>
        <?php endif ?>
      </ul>
      <ul class="navbar-nav">
        <?php if(!isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="./signup.php"><button class="btn btn-primary btn-sm">Signup</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php"><button class="btn btn-primary btn-sm">Login</button></a>
            </li>
        <?php else: ?>
            <span class="navbar-text me-5">
              <strong class="mb-n1"><?php echo $_SESSION['user_names'];?></strong><br>
              <small><?php echo $_SESSION['user_email'];?></small>
            </span>
            <?php
              if(isset($_SESSION['user_id']) && isset($_SESSION['seller'])){
            ?>
              <li class="nav-item">
                <a class="nav-link" href="./addproduct.php"><button class="btn btn-orange btn-sm">Add product</button></a>
              </li>  
            <?php 
              }
            ?>  
        <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="./cart.php">
                <span class="fa-stack" data-count=<?php echo(get_cart_count()) ?>>
                  <i class="fas fa-shopping-cart fa-stack-2x text-dark"></i>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./sellerregister.php"><button class="btn btn-outline-primary btn-sm">Register as seller <i class="far fa-star"></i></button></a>
            </li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="./logout.php"><button class="btn btn-secondary btn-sm">Logout</button></a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- offcanvas for User API -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <strong id="offcanvasRightLabel">Tevos <span class="orange">API</span></strong>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="text-center mb-4">
      <strong class="mb-n1"><?php echo $_SESSION['user_names'];?></strong><br>
      <small><?php echo $_SESSION['user_email'];?></small>
    </div>
    <strong>API Key</strong>
    <p><?php echo $_SESSION['user_api_key'];?></p>
  </div>
</div>