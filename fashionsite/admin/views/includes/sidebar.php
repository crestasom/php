<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if($_SESSION['isadmin']):?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo LINK_URL?>user/create"><i class="fa fa-user-plus"></i> Add New</a></li>
                <li><a href="<?php echo LINK_URL?>user/index"><i class="fa fa-users"></i> View All</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Manufacturer</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo LINK_URL?>manufacturer/create"><i class="fa fa-user-plus"></i> Add New</a></li>
                <li><a href="<?php echo LINK_URL?>manufacturer/index"><i class="fa fa-users"></i> View All</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo LINK_URL?>category/create"><i class="fa fa-user-plus"></i> Add New</a></li>
                <li><a href="<?php echo LINK_URL?>category/index"><i class="fa fa-users"></i> View All</a></li>
              </ul>
            </li>
            <?php endif;?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo LINK_URL?>product/create"><i class="fa fa-user-plus"></i> Add New</a></li>
                <li><a href="<?php echo LINK_URL?>product/index"><i class="fa fa-users"></i> View All</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo LINK_URL?>order/index"><i class="fa fa-users"></i> View All</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
