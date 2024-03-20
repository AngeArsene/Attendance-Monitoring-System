            <li class="menu-item <?= strpos($_SERVER['PHP_SELF'], 'departments') ? 'active open' : ''; ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Departments</div>
              </a>
              <ul class="menu-sub">

<?php $department = get('department');
      foreach ($department as $dep) : ?>

                <li class="menu-item <?= strpos($_SERVER['REQUEST_URI'], $dep["id"]) ? 'active' : ''; ?>">
                  <a href=<?="/users/administrator/departments.php?id=" . $dep["id"] ?> class="menu-link">
                    <div data-i18n="Without menu"><?= $dep['name'] ?></div>
                  </a>
                </li>
                
<?php endforeach; ?>

              </ul>
            </li>
