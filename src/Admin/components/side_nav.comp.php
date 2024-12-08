<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion text-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-2 <?php if ($_GET['page'] == 'dashboard') {
                                            echo 'bg-info';
                                        } ?>" href="./main.php?role=<?php echo $role ?>&empid=<?php echo $user ?>&page=dashboard">
                    <div class="sb-nav-link-icon d-flex"><img src="../img/material-symbols--space-dashboard-sharp.svg" alt=""></div>
                    Dashboard
                </a>

                <!-- <span class="border border-white w-100"></span> -->



                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCandidate" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Candidates
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseCandidate" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCandidate" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Executives
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCandidate" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">President</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Vice President</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Vice President</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Secretary</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Treasurer</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">PIO</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Auditor</a>
                                    </nav>
                                </div>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesBM" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Board Members
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesBM" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">External Affairs</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Cultural Activities and Sports Development</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Student Organization</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Multimedia and Arts</a>
                                    </nav>
                                </div>

                            </nav>
                        </div> -->

                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
                <a class="nav-link collapsed <?php if ($_GET['page'] == 'orders_pending' || $_GET['page'] == 'orders_process' || $_GET['page'] == 'orders_shipping' || $_GET['page'] == 'orders_delivered' || $_GET['page'] == 'orders_cancelled') {
                                                    echo 'bg-info';
                                                } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon d-flex"><img src="../img/orders.svg" alt=""></div>
                    Orders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <?php
                        if (!isset($_GET['role'])) {
                        ?>
                            <a class="nav-link <?php if ($_GET['page'] == 'orders_pending') {
                                                    echo 'bg-dark';
                                                } ?>" href="./main.php?page=orders_pending">Pending</a>

                        <?php
                        }
                        ?>
                        <a class="nav-link <?php if ($_GET['page'] == 'orders_process') {
                                                echo 'bg-dark';
                                            } ?>" href="./main.php?role=<?php echo $role ?>&empid=<?php echo $user ?>&page=orders_process">Processing</a>
                        <a class="nav-link <?php if ($_GET['page'] == 'orders_shipping') {
                                                echo 'bg-dark';
                                            } ?>" href="./main.php?role=<?php echo $role ?>&empid=<?php echo $user ?>&page=orders_shipping">Shipping</a>
                        <a class="nav-link <?php if ($_GET['page'] == 'orders_delivered') {
                                                echo 'bg-dark';
                                            } ?>" href="./main.php?role=<?php echo $role ?>&empid=<?php echo $user ?>&page=orders_delivered">Delivered</a>
                        <a class="nav-link <?php if ($_GET['page'] == 'orders_cancelled') {
                                                echo 'bg-dark';
                                            } ?>" href="./main.php?role=<?php echo $role ?>&empid=<?php echo $user ?>&page=orders_cancelled">Cancelled</a>
                    </nav>
                </div>
                <a class="nav-link" href="./main.php?page=history">
                    <div class="sb-nav-link-icon"><img src="../img/bar-chart-4-bars.svg" alt=""></i></div>
                    Sales
                </a>
                <!-- <a class="nav-link" href="./main.php?page=task">
                    <div class="sb-nav-link-icon"><img src="../img/material-symbols--account-box-sharp.svg" alt=""></div>
                    Notifications
                </a> -->
                <a class="nav-link" href="./main.php?page=task">
                    <div class="sb-nav-link-icon"><img src="../img/material-symbols--account-box-sharp.svg" alt=""></div>
                    Tasks
                </a>
                <a class="nav-link" href="./main.php?page=tickets">
                    <div class="sb-nav-link-icon"><img src="../img/material-symbols--account-box-sharp.svg" alt=""></div>
                    Tickets
                </a>
                <a class="nav-link" href="./main.php?page=emp">
                    <div class="sb-nav-link-icon"><img src="../img/material-symbols--account-box-sharp.svg" alt=""></div>
                    Employees
                </a>
                <a class="nav-link" href="./main.php?page=users">
                    <div class="sb-nav-link-icon"><img src="../img/material-symbols--account-box-sharp.svg" alt=""></div>
                    Users
                </a>

                <?php
                if (!isset($_GET['role'])) {
                ?>
                    <div class="sb-sidenav-menu-heading">Settings</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><img src="../img/material-symbols--settings.svg" alt=""></div>
                        System Settings
                    </a>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Developed by:</div>
            Pengu-90,
            Fretzen,
            Pio
        </div>
    </nav>
</div>