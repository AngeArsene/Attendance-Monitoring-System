<?php 
    declare(strict_types = 1);
    
    session_start();
    
    require_once '../../../../controller/redirect.php';
    require_once '../../../../controller/form_control.php';
    require_once '../../../../controller/db/connection.php';
        
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator') {
        $table_name = $_POST['table']; $id = $_POST['id'];

        $user_info = check_edit_form($table_name); $new_phone_number = validate_phone_number();

        $db_connection = connect_to_database();

        require_once "../tricky_vars.php";

        $prepared_statement = $db_connection -> prepare("UPDATE $table_name
                                                         SET first_name = :first_name, last_name = :last_name,
                                                             email = :email, gender = :gender,
                                                             address = :address, phone_number = $new_phone_number,
                                                             $dep last_update = NOW()
                                                         WHERE id = $id");

        unset($db_connection);

        try {
            $prepared_statement->execute($user_info);

            go_to($_SESSION['previous-page-url'], $_SESSION['user'], RECORD_SUCCESSFUL, true);

        } catch (PDOException $_error) { send_error(); }

    } else { send_error(INVALID_REQUEST); }