<?php 
    declare(strict_types = 1);
    
    session_start();
    
    require_once '../../../../controller/redirect.php';
    require_once '../../../../controller/form_control.php';
    require_once '../../../../controller/db/connection.php';
        
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator') {
        $table_name = $_POST['table']; $id = $_POST['id'];

        $user_info = check_dep_edit_form($table_name);

        $db_connection = connect_to_database();

        $prepared_statement = $db_connection -> prepare("UPDATE $table_name
                                                         SET name = :name, teacher = :teacher,
                                                             NOH = :NOH, start_date = :start_date,
                                                             end_date = :end_date, last_update = NOW()
                                                         WHERE id = $id");

        unset($db_connection);

        try {
            $prepared_statement->execute($user_info);

            go_to($_SESSION['previous-page-url'], $_SESSION['user'], RECORD_SUCCESSFUL, true);

        } catch (PDOException $_error) { echo "<pre>";
        var_dump ($_error);
        echo "</pre>"; }

    } else { send_error(INVALID_REQUEST); }