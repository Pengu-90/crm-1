<nav class="navbar navbar-light bg-light position-fixed w-100">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-3 text-white">
      <img src="../img/Technocrats_logo.png" alt="" style="width: 20px !important;">
      Jinx Corp
    </a>
    <div class="d-flex">
      <a href="./main.php?user=<?php echo $user?>" class="p-2 text-decoration-none text-white">Home</a>
      
      <?php
      if (!isset($_SESSION['user'])) {
        ?>
        <button class="btn btn-outline-primary ms-4 px-3" onclick="login()">Login</button>
        
        <?php
      } else {
        ?>
        <a href="#" class="p-2 text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#cart">Cart</a>
        <a href="#" class="p-2 text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#orders">Orders</a>
        <button class="btn btn-danger ms-4 px-3" onclick="logout()">Logout</button>
      <?php
      }
      ?>

    </div>

  </div>
</nav>