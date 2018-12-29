<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/arkadmin.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?=anchor('admin/dashboard','Administrator',['class'=>'navbar-brand'])?>
      </div>
      <?php 
        $pg = isset($page) && $page != '' ? $page :'dash';
      ?>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li <?php echo  $pg =='dash' ? 'class="active"' : '' ?>><?php echo anchor('admin/dashboard', '<i class="fa fa-dashboard"></i> Dashboard'); ?></li>
          <li <?php echo  $pg =='products' ? 'class="active"' : '' ?>><?php echo anchor('admin/products', '<i class="fa fa-server"></i> Data Produk'); ?></li>
          <li <?php echo  $pg =='user' ? 'class="active"' : '' ?>><?php echo anchor('admin/users', '<i class="fa fa-users"></i> Data User'); ?></li>
          <li <?php echo  $pg =='orders' ? 'class="active"' : '' ?>><?php echo anchor('admin/orders', '<i class="fa fa-truck"></i> Data Pesanan'); ?></li>
          <li <?php echo  $pg =='payments' ? 'class="active"' : '' ?>><?php echo anchor('admin/payments', '<i class="fa fa-money"></i> Data Pembayaran'); ?></li>
          <li <?php echo  $pg =='order_reports' ? 'class="active"' : '' ?>><?php echo anchor('admin/reports/order_reports', '<i class="fa fa-file"></i> Laporan Pemesanan'); ?></li>
          <li <?php echo  $pg =='payment_reports' ? 'class="active"' : '' ?>><?php echo anchor('admin/reports', '<i class="fa fa-file"></i> Laporan Pembayaran'); ?></li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username') ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('admin/users/detail_user/' . $this->session->userdata('id'), '<i class="fa fa-user"></i> Profile'); ?></li>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="divider"></li>
                <li><?php echo anchor('login/logout', '<i clas="fa fa-power-off"></i> Logout'); ?></li>
              </ul>
            </li>
          </ul>
      </div>
    </nav>