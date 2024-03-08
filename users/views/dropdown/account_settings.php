            <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'profile') ? 'active open' : ''; ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'profile') ? 'active' : ''; ?>">
                  <a href="/users/<?= $user['role'] ?>/profile.php" class="menu-link">
                    <div data-i18n="Account">My Profile</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/users/controller/logout" class="menu-link">
                    <div data-i18n="Connections">Log Out</div>
                  </a>
                </li>
              </ul>
            </li>
