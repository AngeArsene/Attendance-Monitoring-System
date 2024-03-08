<?php
    declare(strict_types = 1);

    session_start();
    
    require_once '../../../controller/redirect.php';

    if (isset($_SESSION['user'])) {

        session_unset();
        
        session_destroy();

        header("Location: /");

    } else { send_error(INVALID_REQUEST); }