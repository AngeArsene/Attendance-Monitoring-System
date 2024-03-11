            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Departments</div>
              </a>
              <ul class="menu-sub">

<?php $department = get('department');
      foreach ($department as $dep) : ?>

                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu"><?= $dep['name'] ?></div>
                  </a>
                </li>
                
<?php endforeach; ?>

              </ul>
            </li>
