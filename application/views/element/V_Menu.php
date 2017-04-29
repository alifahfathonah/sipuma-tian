
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
      <!-- =========================BEGIN LEVEL = 1=====================================================-->
      <?php if ($id_role=="1") { ?>
        <li class="header">MAIN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?php echo base_url();?>C_Login/berhasil_login"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url()?>C_Admin/user"><i class="fa fa-users"></i> <span>User</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-th"></i> <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">All Content</a></li>
            <li><a href="#">Buat Baru</a></li>
          </ul>
        </li>
         <li><a href="#"><i class="fa fa-envelope"></i> <span>Contact</span></a></li>
         <li class="header">EXIT</li>
         <li><a href="<?php echo base_url();?>C_Login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      <!-- ================= END LEVEL = 1 ========================================================== -->

      <!-- =================  BEGIN LEVEL = 2===========================================================-->
      <?php } 
      elseif ($id_role=="2") { ?>
      <li class="header">MAIN</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?php echo base_url();?>C_Login/berhasil_login"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-th"></i><span>Content</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">All Content</a></li>
          <li><a href="#">Buat Baru</a></li>
        </ul>
      </li>
         <li><a href="#"><i class="fa fa-envelope"></i> <span>Contact</span></a></li>
         <li class="header">EXIT</li>
         <li><a href="<?php echo base_url();?>C_Login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      <?php } ?> 
      <!-- =========================END LEVEL = 2====================================================== -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
