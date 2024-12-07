<?php
include '../../PHP/includes/session_handler.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="Pengu-90" content="" />
    <title>CRM - Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="../../styles/root.css"> -->
    <link href="./css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">

    <script defer src="../../JS/bootstrap/bootstrap.bundle.min.js"></script>
    <script defer src="./js/scripts.js"></script>
    <script defer src="./js/datatables-simple-demo.js"></script>
    <script defer src="./js/datatables.js"></script>

</head>

<body class="sb-nav-fixed">
    <?php
    include './components/modals/user_details.modal.php';
    include './components/modals/user_add.modal.php';
    include './components/modals/task_assign.modal.php';
    include './components/modals/emp_add.modal.php';

    include './components/top_nav.comp.php';
    ?>
    <div id="layoutSidenav">
        <?php
        include './components/side_nav.comp.php';

        ?>
        <div id="layoutSidenav_content">
            <main>
                <?php

                if ($_GET['page'] == 'dashboard') {
                    include './pages/dashboard.page.php';
                } else if ($_GET['page'] == 'orders_pending') {
                    include './pages/orders_pending.page.php';
                } else if ($_GET['page'] == 'orders_process') {
                    include './pages/orders_process.page.php';
                } else if ($_GET['page'] == 'orders_delivered') {
                    include './pages/orders_delivered.page.php';
                } else if ($_GET['page'] == 'orders_cancelled') {
                    include './pages/orders_cancelled.page.php';
                } else if ($_GET['page'] == 'users') {
                    include './pages/users.page.php';
                } else if ($_GET['page'] == 'tickets') {
                    include './pages/tickets.page.php';
                } else if ($_GET['page'] == 'task') {
                    include './pages/tasks.page.php';
                } else if ($_GET['page'] == 'emp') {
                    include './pages/employee.page.php';
                }
                ?>
            </main>
        </div>
    </div>
</body>

</html>