<?php 
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../../controller/redirect.php';
    require_once '../../../../controller/form_control.php';
    require_once '../../../../controller/db/connection.php';

    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator') {
        $user_info = check_registration_form($_POST['table_name']);
        $table_name = $_POST['table_name']; $phone_number = sanitize_phone_number();

        $random_password = generate_ran_password();
        $user_info['password'] = password_hash($random_password, PASSWORD_DEFAULT, ['cost' => 15]);

        $db_connection = connect_to_database();

        require_once 'tricky_vars.php';

        $sql_query = <<<SQL
            INSERT INTO $table_name (
                first_name, last_name, gender,
                $dob email, address, $department phone_number,
                password $parent $admin
            ) VALUES (
                :first_name, :last_name, :gender,
                $dob_val :email, :address, $department_value $phone_number,
                :password $parent_val $admin_val 
            );
SQL;

        $prepared_statement = $db_connection->prepare($sql_query);

        unset($db_connection);

        try {
            $prepared_statement->execute($user_info);

            mail($user_info['email'], 'Password', "Password: $random_password", "From: " . $_SESSION['user']['email']);

            go_to($_SESSION['previous-page-url'], $_SESSION['user'], RECORD_ADDED_SUCCESSFUL, true);

        } catch (PDOException $_error) { 
            echo "<pre>";
            var_dump($user_info);
            echo '</pre>';
         }

    } else { send_error(INVALID_REQUEST); }