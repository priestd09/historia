<h3><a class="brand" href="<?php echo base_url(); ?>"><i class="icon-book"></i> Historia</a></h3>
<ul class="nav">
  <li class="<?php echo isActive($pageName,"client")?>"><a href="<?php echo site_url('client'); ?>"><i class="icon-dashboard"></i> Dashboard</a></li>
</ul>
<div class="btn-group pull-right">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="icon-user"></i> <?php echo (isset($user->id) ? $user->first_name . ' ' . $user->last_name : 'Guest' ); ?>
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <?php if(isset($user->id)): ?>
    <li><a href="<?php echo site_url('manage'); ?>"><i class="icon-home"></i> Administration</a></li>
    <li><a href="<?php echo site_url('client'); ?>"><i class="icon-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo site_url('client/logout'); ?>"><i class="icon-signout"></i> Sign Out</a></li>
    <?php else: ?>
    <li><a href="<?php echo site_url('client/login'); ?>"><i class="icon-signin"></i> Sign In</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo site_url('client/forgot_password'); ?>"><i class="icon-question-sign"></i> Forgot Password</a></li>
    <?php endif; ?>
  </ul>
</div>

