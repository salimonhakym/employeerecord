<?php
   $pagename = 'Employee Records';
    include_once 'config.php';
    $pagetitle = "Employee Records";
    $sqlQuery = "SELECT * FROM employee";
    $sqlStatement = $conn->query($sqlQuery);
    require_once INCLUDE_PATH .'/layouts/admin/header.php';
    require_once INCLUDE_PATH .'/layouts/admin/sidebar.php';

?>

        <!-- Page Content -->
        <!-- ************************************************************************ -->

        <!-- ************************************************************************ -->
<?php require_once INCLUDE_PATH .'/layouts/admin/footer.php'; ?>