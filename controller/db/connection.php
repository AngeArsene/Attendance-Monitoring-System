<?php
    declare(strict_types = 1);

    function connect_to_database(): PDO {
        $hostname = 'localhost'; $user_name = 'root';
        $database = 'ams'; $port = 3307; $connection_pass = 'angelswag@11433';

        try {
            $db_connection = new PDO("mysql:host=$hostname;port=$port;dbname=$database", $user_name, $connection_pass);
            $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db_connection;

        } catch (PDOException $_error) { send_error(); }
    }