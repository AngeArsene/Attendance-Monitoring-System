<?php
    declare(strict_types = 1);

    session_start();

    require_once '../controller/redirect.php';
    require_once '../controller/form_control.php';
    require_once '../controller/db/connection.php';

    $user = check_login_form();

    $db_connection = connect_to_database();

    $user_role = sanitize_input_text($_POST['role']);

    $prepared_statement = $db_connection->prepare("SELECT * FROM $user_role WHERE email = :email LIMIT 1");

    unset($db_connection);

    try {
        $prepared_statement->execute($user);
        $user = $prepared_statement->fetch(PDO::FETCH_ASSOC);
        $password = trim($_POST['password']);

        if (!empty($user) && password_verify($password, $user['password'])) {
            $user['password'] = $password;
            $user['role'] = $user_role;

            go_to($user['role'], $user);
            
        } else { send_error('Error: Incorrect email or password.'); }

    } catch (PDOException $_error) { send_error(); }