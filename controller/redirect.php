<?php
    declare(strict_types = 1);

    const DEFAULT_ERROR_MESSAGE = "Error: Oops something went wrong.";
    const INVALID_REQUEST = 'Invalid Request: Please either login or signup to proceed.';
    const RECORD_SUCCESSFUL = 'Record updated successfully';
    const RECORD_DELETED_SUCCESSFUL = 'Record deleted successfully';
    const RECORD_ADDED_SUCCESSFUL = 'Record added successfully';

    function save_file_path(string $current_page_url): void {
        $_SESSION['previous-page-url'] = $current_page_url;
    }    

    function send_error(string $message = DEFAULT_ERROR_MESSAGE): void {
        $to = $_SESSION['previous-page-url'] ?? '/';
        $_SESSION['error-message'] = $message; header("Location: $to"); exit;
    }

    function go_to(string $to, array $user_data, string $message = null, bool $abs_path = false) {
        $_SESSION['user'] = $user_data;
        $_SESSION['error-message'] = $message;

        $abs_path ? header("Location: $to") : header("Location: /users/$to"); exit;
    }

    function logout(): void {
        header("Location: /users/controller/logout"); exit;
    }