            <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'crud') ? 'active open' : ''; ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'admin_crud') ? 'active' : ''; ?>">
                  <a
                    href="/users/administrator/admin_crud.php"
                    target=""
                    class="menu-link">
                    <div data-i18n="">Administrators</div>
                  </a>
                </li>
                <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'teacher_crud') ? 'active' : ''; ?>">
                  <a href="/users/administrator/teacher_crud.php" class="menu-link">
                    <div data-i18n="">Teachers</div>
                  </a>
                </li>
                <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'student_crud') ? 'active' : ''; ?>">
                  <a
                    href="/users/administrator/student_crud.php"
                    target=""
                    class="menu-link">
                    <div data-i18n="">Students</div>
                  </a>
                </li>
                <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'parent_crud') ? 'active' : ''; ?>">
                  <a
                    href="/users/administrator/parent_crud.php"
                    target=""
                    class="menu-link">
                    <div data-i18n="">Parents</div>
                  </a>
                </li>
              </ul>
            </li>
