<?php
    declare(strict_types = 1);

    require_once '../../controller/db/connection.php';
    require_once '../../controller/redirect.php';

    function generate_query (string $table_name, int $user_id = null): string {
        if ($table_name === 'teacher' || $table_name === 'student') {
            $join_field = ($table_name === 'teacher' ? 'department' : 'parent');
            $origin_field = ($table_name === 'teacher' ? 'name' : 'first_name');

            return <<<SQL
            SELECT $table_name.id, $table_name.first_name, $table_name.last_name,
                   $table_name.email, $table_name.gender, $table_name.address, $table_name.phone_number,
                   $join_field.$origin_field AS $join_field
            FROM $table_name
            JOIN $join_field
            ON $table_name.$join_field = $join_field.id;
SQL;

        } elseif ($table_name === 'department') {
            return "SELECT * FROM course WHERE department = $user_id";
        }

        return "SELECT * FROM $table_name" . (isset($user_id) ? " WHERE id <> $user_id" : "");

    }

    function table(string $table_name, int $user_id = null): array {
        $db_connection = connect_to_database();

        $prepared_statement = $db_connection->prepare(generate_query($table_name, $user_id));

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

    function get(string $table_name): array {
        $db_connection = connect_to_database();

        $prepared_statement = $db_connection->prepare("SELECT * FROM $table_name");

        unset($db_connection);

        try {
            $prepared_statement->execute();
            return $prepared_statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $_error) { send_error(); }

    }

    function tuple(string $table_name, string $id): array {
        $db_connection = connect_to_database();

        $prepared_statement = $db_connection->prepare("SELECT * FROM $table_name WHERE id = $id");

        unset($db_connection);

        try {
            $prepared_statement->execute();
            return $prepared_statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $_error) { send_error(); }

    }

    function abbrev_dep_name (string $name): string {
        return match ($name) {
            'computer science' => 'Comp Sci',
            'management' => 'Man',
            'digital marketing' => 'Dig Ma'
        };
    }