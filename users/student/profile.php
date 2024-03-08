<?php session_start();
      
      require_once '../../controller/redirect.php';
      
      if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'student') {
          $user = $_SESSION['user']; $page_url = '/users/' . $user['role'] . '/profile.php';

          save_file_path($page_url);
          
          $page_name = "Student's Profile"; $dirname = '../../';

          $username = ucfirst(strtok($user['last_name'], " ")); $profile_img = ($user['gender'] === 'male' ? '1' : '2'); 
          
          include_once "{$dirname}views/partials/header.php" ?>

<?php     include_once 'views/profile.php' ?>

<?php     include_once "{$dirname}views/partials/footer.php"; } else { send_error(INVALID_REQUEST); }?>