
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        include "getSideBarMenu.php";
          $menuData = getSidebarMenu($dbConn, $_SESSION['userID']);
          $base_url = "/registration";
        ?>

<ul class="sidebar-menu" data-widget="tree">
    <?php foreach ($menuData as $groupID => $menu): ?>
        <?php if (count($menu['items']) > 1): // Menus with sub-items ?>
            <li class="treeview" id="<?= strtolower(str_replace(' ', '', $menu['title'])) ?>">
                <a href="#">
                    <i class="<?= htmlspecialchars($menu['items'][0]['group_icon']) ?>"></i> 
                    <span><?= htmlspecialchars($menu['title']) ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php foreach ($menu['items'] as $item): ?>
                        <li id="<?= $item['code'] ?>">
                            <a href="<?=$base_url . $item['link'] ?>">
                                <i class="<?= htmlspecialchars($item['icon']) ?>"></i> <?= htmlspecialchars($item['name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php else: // Standalone menu ?>
            <?php foreach ($menu['items'] as $item): ?>
                <li id="<?= $item['code'] ?>">
                    <a href="<?= $base_url .$item['link'] ?>">
                        <i class="<?= htmlspecialchars($item['icon']) ?>"></i> 
                        <span><?= htmlspecialchars($item['name']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

    </section>
    <!-- /.sidebar -->
  </aside>


 