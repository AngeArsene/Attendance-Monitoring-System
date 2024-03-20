<?php include_once 'partials/header.php' ?>

<!-- / Side bar dropdowns -->

<?php /* include_once 'partials/crud_table.php'*/ ?>

<?php

    if (strpos($_SERVER['PHP_SELF'], "departments")) {
        include_once 'partials/dep_crud_table.php';
    } else {
        include_once 'partials/crud_table.php';
    }
?>

<?php include_once '../views/dashboard/footer.php' ?>