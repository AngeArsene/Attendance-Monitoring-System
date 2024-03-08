<?php 
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../../controller/redirect.php';
    require_once '../../../../controller/form_control.php';
    require_once '../../../../controller/db/connection.php';
        
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator') {

        $user_info = check_edit_form(); $new_phone_number = validate_phone_number();

        $table_name = $_POST['table']; $id = $_POST['id'];

        $db_connection = connect_to_database();

        $prepared_statement = $db_connection -> prepare("UPDATE $table_name
                                                         SET first_name = :first_name, last_name = :last_name,
                                                             email = :email, gender = :gender,
                                                             address = :address, phone_number = $new_phone_number,
                                                             last_update = NOW()
                                                         WHERE id = $id");

        unset($db_connection);

        try {
            $prepared_statement->execute($user_info);

            go_to($_SESSION['previous-page-url'], $_SESSION['user'], RECORD_SUCCESSFUL, true);

        } catch (PDOException $_error) { echo $_error->getMessage(); }

    } else { send_error(INVALID_REQUEST); }