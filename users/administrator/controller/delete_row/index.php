<?php 
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../../controller/redirect.php';
    require_once '../../../../controller/db/connection.php';
    
    if (isset($_SESSION['user']) &&
        $_SESSION['user']['role'] === 'administrator' &&
        $_SERVER['REQUEST_METHOD'] === "POST" &&
        isset($_POST['delete-row'])
       ) {

        $db_connection = connect_to_database();

        $id = $_POST['id']; $table_name = $_POST['table'];
        
        try {
            $db_connection->exec("DELETE FROM $table_name WHERE id = $id");

            unset($db_connection);

            go_to($_SESSION['previous-page-url'], $_SESSION['user'], RECORD_DELETED_SUCCESSFUL, true);

        } catch (PDOException $_error) { send_error(); }

    } else { send_error(INVALID_REQUEST); }