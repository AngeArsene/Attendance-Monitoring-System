<?php session_start();
      
      require_once 'controller/redirect.php';
      save_file_path('/');

      include_once 'views/partials/header.php' ?>

    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  </span>
                  <span class="app-brand-text demo text-body fw-bold" style="text-transform: uppercase;">A M S</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2 text-center"><i class="bx bx-user"></i> Login</h4>

                <!-- Login Form -->
                <?php include_once 'views/forms/login.php' ?>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

<?php include_once 'views/partials/footer.php'?>
