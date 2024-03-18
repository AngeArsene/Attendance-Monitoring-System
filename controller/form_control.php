<?php
    declare(strict_types = 1);

    function sanitize_input_text(string $input_text): string {
        $safe_text = trim($input_text);
        $safe_text = htmlentities($safe_text);
        $safe_text = stripslashes($safe_text);

        return $safe_text;
    }

    function sanitize_email(): string {
        $email_input = sanitize_input_text($_POST['email']);
        return filter_var($email_input, FILTER_SANITIZE_EMAIL);
    }

    function sanitize_first_name(): string {
        $name_input = sanitize_input_text($_POST['first_name']);
        return filter_var($name_input, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    function sanitize_last_name(): string {
        $name_input = sanitize_input_text($_POST['last_name']);
        return filter_var($name_input, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    function sanitize_phone_number(): string {
        $phone_number_input = sanitize_input_text($_POST['phone-number']);
        return filter_var($phone_number_input, FILTER_SANITIZE_NUMBER_INT);
    }

    function sanitize_address(): string {
        $phone_address = sanitize_input_text($_POST['address']);
        return filter_var($phone_address, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    function validate_email(): string {
        $email_input = sanitize_email();

        if (!filter_var($email_input, FILTER_VALIDATE_EMAIL))
            send_error('Error: Invalid input for email field, please try again.');

        return $email_input;
    }

    function validate_first_name(): string {
        $name_input = sanitize_first_name();

        if (!preg_match("/^[a-zA-Z ]*$/", $name_input))
            send_error('Error: Invalid input for name field, please try again.');

        return $name_input;
    }

    function validate_last_name(): string {
        $name_input = sanitize_last_name();

        if (!preg_match("/^[a-zA-Z ]*$/", $name_input))
            send_error('Error: Invalid input for name field, please try again.');

        return $name_input;
    }

    function validate_address(): string {
        $address_input = sanitize_address();

        if (!preg_match('~^[\p{L}\p{N}\s]+$~uD', $address_input))
            send_error('Error: Invalid input for address field, please try again.');

        return $address_input;
    }

    function validate_phone_number(): int {
        $phone_number_input = sanitize_phone_number();

        if (!filter_var($phone_number_input, FILTER_VALIDATE_INT, ['min-range' => 600000000, 'max-range' => 699999999]))
            send_error('Error: Invalid input for phone_number field, please try again.');

        return (int) $phone_number_input;
    }

    function check_login_form(): array {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login-btn'])) {
            return [
                'email' => validate_email()
            ];

        } else { send_error(INVALID_REQUEST); }
    }

    function check_registration_form($table_name = null): array {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && (isset($_POST['save-btn']))) {
            $entry_data = [
                'first_name' => validate_first_name(),
                'last_name' => validate_last_name(),
                'email' => validate_email(),
                'gender' => sanitize_input_text($_POST['gender']),
                'address' => validate_address(),
            ];

            if (!isset($table_name)) {
                $entry_data['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT, ['cost' => 15]);

            } else if ($table_name === 'student') {
                
                $entry_data['dob'] = sanitize_input_text($_POST['dob']);
                $entry_data['parent'] = sanitize_input_text($_POST['parent']);
            } else if ($table_name === 'teacher') {
                $entry_data['department'] = sanitize_input_text($_POST['department']);
            }

            return $entry_data;

        } else { send_error(INVALID_REQUEST); }
    }

    function check_edit_form(string $table_name = null): array {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && (isset($_POST['edit-btn']))) {
            $entry_data =  [
                'first_name' => validate_first_name(),
                'last_name' => validate_last_name(),
                'email' => validate_email(),
                'gender' => sanitize_input_text($_POST['gender']),
                'address' => validate_address(),
            ];

            if (isset($table_name) && $table_name === 'teacher') {
                $entry_data['department'] = sanitize_input_text($_POST['department']);
            }

            return $entry_data;

        } else { send_error(INVALID_REQUEST); }
    }

    function generate_ran_password() {
        $length = random_int(8, 16);
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';

        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);    
    }