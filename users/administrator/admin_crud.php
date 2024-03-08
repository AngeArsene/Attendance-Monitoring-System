<?php session_start();
      
      require_once '../../controller/redirect.php';
      require_once 'controller/admin.php';
      
      if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator') {
          $user = $_SESSION['user']; $page_url = '/users/' . $user['role'] . '/admin_crud.php';

          save_file_path($page_url);
          
          $page_name = "Admin's CRUD Panel"; $dirname = '../../';
          $username = ucfirst(strtok($user['last_name'], " ")); $profile_img = ($user['gender'] === 'male' ? '1' : '2'); 

          $table_name = 'administrator'; $persons = table($table_name, $user['id']);
          
          include_once "{$dirname}views/partials/header.php" ?>

<?php     include_once 'views/crud.php' ?>

<?php     include_once "{$dirname}views/partials/footer.php"; } else { send_error(INVALID_REQUEST); }?>