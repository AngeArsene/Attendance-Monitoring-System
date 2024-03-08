<?php
    declare(strict_types = 1);

    require_once '../../controller/db/connection.php';
    require_once '../../controller/redirect.php';

    function table(string $table_name, int $user_id = null): array {
        $db_connection = connect_to_database();

        $student_join = <<<SQL
            SELECT student.id, student.first_name, student.last_name,
                   student.email, student.gender, student.address, student.phone_number,
                   parent.first_name AS parent
            FROM student
            JOIN parent
            ON student.parent = parent.id;
SQL;

        $sql_query = ($table_name === 'student' ? $student_join : "SELECT * FROM $table_name" . (isset($user_id) ? " WHERE id <> $user_id" : ""));

        $prepared_statement = $db_connection->prepare($sql_query);

        unset($db_connection);

        try {
            $prepared_statement->execute();

        } catch (PDOException $_error) { send_error(); }
        
        return $prepared_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function num_of_(string $entity): int {
        $db_connection = connect_to_database();

        $prepared_statement = $db_connection->prepare("SELECT COUNT(id) FROM $entity;");

        unset($db_connection);

        try {
            $prepared_statement->execute();

        } catch (PDOException $_error) { send_error(); }

        return $prepared_statement->fetch(PDO::FETCH_NUM)[0];
    }

    function getParents(): array {
        $db_connection = connect_to_database();

        $prepared_statement = $db_connection->prepare("SELECT id, first_name, last_name FROM parent");

        unset($db_connection);

        try {
            $prepared_statement->execute();
            return $prepared_statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $_error) { send_error(); }

    }