<?php 
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../controller/redirect.php';
    require_once '../../../controller/db/connection.php';
    
    if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['delete-btn'])) {
        $db_connection = connect_to_database();

        $user = $_SESSION['user']; $user_role = $user['role']; $user_id = $user['id'];
        
        try {
            $db_connection->exec("DELETE FROM $user_role WHERE id = $user_id");

            unset($db_connection); logout();

        } catch (PDOException $_error) { send_error(); }

    } else { send_error(INVALID_REQUEST); }