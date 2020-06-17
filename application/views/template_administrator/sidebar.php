<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url('assets/') ; ?>assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          <?=$simbol ; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav pb-0">
          <?php 
            $role_id   = $this->session->userdata('role_id'); 
            $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                         ";
            $menu = $this->db->query($queryMenu)->result_array();
            // var_dump($menu);die;
          ?>
          <!-- LOOPING MENU -->
          <?php foreach ($menu as $m): ?>
          <div align="center" class="sidebar-heading pb-0">
              <b>Menu <?= $m['menu'];  ?></b>
          </div>
          <!-- SIAPKAN SUBMENU SESUAI MENU -->
          <?php
              $menuId       = $m['id'];
              $querySubMenu = " SELECT *
                                  FROM `user_sub_menu` JOIN `user_menu`
                                    ON `user_sub_menu`.`menu_id` = `user_menu`. `id`
                                 WHERE `user_sub_menu`.`menu_id` = $menuId
                                   AND `user_sub_menu`.`is_active` = 1 
                              ";
              $subMenu = $this->db->query($querySubMenu)->result_array();
           ?>
            <?php foreach ($subMenu as $sm) : ?>
              <?php if($title == $sm['title']): ?>
              <li class="nav-item active ">
                <?php else : ?>
                  <li class="nav-item ">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']);  ?>">
                  <i class="material-icons"><?= $sm['icon'];  ?></i>
                  <p><?= $sm['title'] ;?></p>
                </a>
                <hr class="sidebar-divider">
              </li>
            <?php endforeach ;  ?>
            
        <?php endforeach; ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
          <hr align="center" class="sidebar-divider">
          
        </ul>
      </div>
    </div>
    <!-- Tutup Sidebar -->