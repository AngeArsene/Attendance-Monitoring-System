<?php

    session_start();
      
    require_once '../../controller/redirect.php';
    require_once 'controller/admin.php';
    
    if (isset($_SESSION['user'], $_GET['id']) && $_SESSION['user']['role'] === 'administrator') {
        $user = $_SESSION['user']; $page_url = '/users/' . $user['role'] . '/departments.php?id=' . $_GET['id'];

        save_file_path($page_url);
        
        $page_name = "Department's CRUD Panel"; $dirname = '../../';
        $username = ucfirst(strtok($user['last_name'], " ")); $profile_img = ($user['gender'] === 'male' ? '1' : '2'); 

        $id = $_GET['id']; $dep_name = tuple('department', $id)['name'];


        $table_name = 'course'; $courses = table('department', $id);
        
        include_once "{$dirname}views/partials/header.php";

        include_once 'views/crud.php';

        include_once "{$dirname}views/partials/footer.php";
    
    } else { send_error(INVALID_REQUEST); }