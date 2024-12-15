<!-- <nav class="navbar navbar-light bg-light position-fixed w-100">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-3 text-white">
      <img src="../img/Technocrats_logo.png" alt="" style="width: 20px !important;">
      Jinx Corp
    </a>
    <div class="d-flex">
      <a href="./main.php?user=<?php echo $user ?>&page=<?php echo $page ?>" class="p-2 text-decoration-none text-white">Home</a>

      <?php
      if (!isset($_SESSION['user'])) {
      ?>
        <button class="btn btn-outline-primary ms-4 px-3" onclick="login()">Login</button>

      <?php
      } else {
      ?>
        <a href="#" class="p-2 text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#cart">Cart</a>
        <a href="./main.php?user=<?php echo $user ?>&page=orders" class="p-2 text-decoration-none text-white">Orders</a>
        <button class="btn btn-danger ms-4 px-3" onclick="logout()">Logout</button>
      <?php
      }
      ?>

    </div>

  </div>
</nav> -->

<nav class="sb-topnav navbar navbar-expand navbar-dark position-fixed w-100">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-3 text-white">
      <img src="../img/corplogo.png" alt="" style="width: 20px !important;">
      Jinx Corp
    </a>

    <div class="d-flex">
      <!--notifications -->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-2 d-flex justify-content-end w-100">
        <li class="nav-item dropdown">
          <a class="nav-link" id="notif_link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../img/../img/notification-1.5em.svg" alt="" id="notif_icon"></a>
          <ul class="dropdown-menu dropdown-menu-start dropdown-menu-sm-end bg-dark overflow-auto" aria-labelledby="notif_link" style="max-height: 30em !important;">

            <h6 class="text-light mx-3 pb-2 border-bottom">Notifications</h6>

            <div class="" id="notif_content">
              

            </div>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 d-flex justify-content-end w-100">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../img/material-symbols--menu-rounded.svg" alt=""></a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
            <li>
              <a href="#" class="dropdown-item text-light hover-nav" data-bs-toggle="modal" data-bs-target="#cart">Cart</a>

            </li>
            <li>
              <a href="./main.php?user=<?php echo $user ?>&page=orders" class="dropdown-item text-light hover-nav">Orders</a>

            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li class="px-2">
              <button class="btn btn-danger px-3 w-100" onclick="logout()">Logout</button>
            </li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>