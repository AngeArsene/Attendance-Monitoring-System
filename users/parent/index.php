<?php session_start();
      
      require_once '../../controller/redirect.php';

      if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'parent') {
          $user = $_SESSION['user'];  $page_url = '/users/' . $user['role'];

          save_file_path($page_url);

          $page_name = "Parent's Panel"; $dirname = '../../';
          $username = ucfirst(strtok($user['last_name'], " ")); $profile_img = ($user['gender'] === 'male' ? '1' : '2');

          include_once "{$dirname}views/partials/header.php" ?>

<?php     include_once 'views/dashboard.php' ?>

<?php     include_once "{$dirname}views/partials/footer.php"; } else { send_error(INVALID_REQUEST); }?>