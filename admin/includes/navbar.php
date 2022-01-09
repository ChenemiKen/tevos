<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <?php
          if(isset($_SESSION['user_id'])){
        ?>
            <li class="nav-item">
              <a class="nav-link" href="./myproducts.php">My Products</a>
            </li>
        <?php 
          }
        ?>
      </ul>
      <ul class="navbar-nav">
        <?php
          if(!isset($_SESSION['user_id'])){
        ?>
            <li class="nav-item">
              <a class="nav-link" href="./register.php"><button class="btn btn-primary">Register</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php"><button class="btn btn-primary">Login</button></a>
            </li>
        <?php 
          }else{
        ?>
            <span class="navbar-text me-5">
              <strong class="mb-n1"><?php echo $_SESSION['user_names'];?></strong><br>
              <small><?php echo $_SESSION['user_email'];?></small>
            </span>
            <li class="nav-item">
              <a class="nav-link" href="./addproduct.php"><button class="btn btn-orange">Add product</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php"><button class="btn btn-secondary">Logout</button></a>
            </li>
        <?php 
          }
        ?>
      </ul>
    </div>
  </div>
</nav>