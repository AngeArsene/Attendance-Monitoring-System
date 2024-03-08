<?php 
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../controller/redirect.php';
    require_once '../../../controller/form_control.php';
    require_once '../../../controller/db/connection.php';
    
    if (isset($_SESSION['user'])) {
        $user_info = check_registration_form(); $new_phone_number = validate_phone_number();

        $user = $_SESSION['user']; $user_role = $user['role']; $user_id = $user['id'];
        
        $db_connection = connect_to_database();
        
        $prepared_statement = $db_connection->prepare("UPDATE $user_role
                                                       SET first_name = :first_name, last_name = :last_name, email = :email, gender = :gender,
                                                       phone_number = $new_phone_number, address = :address,
                                                       password = :password, last_update = NOW()
                                                       WHERE id = $user_id"
                                                      );

        unset($db_connection);

        try {
            $prepared_statement->execute($user_info);

            $user_info['phone_number'] = $new_phone_number; $user_info['id'] = $user_id;
            $user_info['role'] = $user_role; $user_info['password'] = trim($_POST['password']);

            go_to("{$user_role}/profile.php", $user_info, RECORD_SUCCESSFUL);

        } catch (PDOException $_error) { send_error(); }

    } else { send_error(INVALID_REQUEST); }