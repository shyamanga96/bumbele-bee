<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>"><span
        class="logo-name">ADMIN PANEL</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php if($this->uri->segment(2) == 'orders') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/orders"><i data-feather="shopping-cart"></i><span>Orders</span></a></li>
      <li class="menu-header">Website Content</li>
      <li class="<?php if($this->uri->segment(2) == 'products') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/products"><i data-feather="grid"></i><span>Products</span></a></li>
      <li class="<?php if($this->uri->segment(2) == 'productCategories') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/productCategories"><i data-feather="layers"></i><span>Categories</span></a></li>
      <li class="menu-header">Settings</li>
      <li class="<?php if($this->uri->segment(2) == 'resetPassword') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/resetPassword"><i data-feather="settings"></i><span>Password Reset</span></a></li>
    </ul>
  </aside>
</div>