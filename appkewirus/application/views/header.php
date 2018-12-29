<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kripik Lampung</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/arkadmin.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">Kripik Lampung</a>
        </div>
        <div class="navbar-collapse collapse">
          <?=form_open('home/search/',['class'=>'navbar-form navbar-left'])?>
            <div class="input-group">
	            <input type="text" placeholder="Cari Barang" class="form-control" name="search_product">
	            <span class="input-group-btn">
	            	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	            </span>
            </div>
          </form>
          <?php if($this->session->userdata('group')=='1'){ ?>
          <ul class="nav navbar-nav navbar-right">

          <?php if($this->session->userdata('username')){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
              <?php echo $this->session->userdata('username'); ?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('admin/users/detail_user/' . $this->session->userdata('id'), 'Profile'); ?></li>
                <li><?php echo anchor('admin/dashboard', 'Dashboard'); ?></li>
                <li class="divider"></li>
                <li><?php echo anchor('login/logout','Logout'); ?></li>
              </ul>
            </li>
          <?php }else{ ?>
            <li><?php echo anchor('register', '<span class="glyphicon glyphicon-user"></span> Daftar'); ?></li>
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login</a>
              <div class="dropdown-menu" style="padding: 20px 10px 5px 10px; width:300px;">
              <div class="col-md-12">
                <?=form_open('login',['class'=>'form-horizontal'])?>
                   <div class="form-group">
                    <input id="username" class="form-control" type="text" name="username" placeholder="Username" />
                  </div>
                  <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password"/>
                  </div>
                  <div class="form-group">
                    <input type="checkbox"> Ingat saya
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                  </div>
                </form>
                </div>
                <div class="bottom text-center">
                  Lupa password ? <?=anchor('register','<b>Reset password</b>')?>
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
          </div>
          </div>
          </div>
          <?php }else{ ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown messages-dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja <span class="badge"><?php $this->cart->total_items() ?></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php $this->cart->total_items() . ' Items' ?></li> 
                <li class="message-preview">
                <?php foreach ($this->cart->contents() as $items): ?>
                  <a href="#">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span class="avatar"><?=img(['src'=>'uploads/product-image/' . $items['image'],'width'=>'50','height'=>'50'])?></span>
                    <span class="name"><?php echo substr($items['name'], 0, 19)?></span>
                    <span class="message">Jumlah : <?= $items['qty'] ?></span>
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('h:i a') ?></span>
                  </a>
                <?php endforeach; ?>
                </li>
                <li class="divider"></li>
                <li><?php echo anchor('home/cart', 'Lihat Keranjang Belanja ' . $this->cart->total_items() . ' Item'); ?></li>
              </ul>
            </li>

          <?php if($this->session->userdata('username')){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
              <?php echo $this->session->userdata('username'); ?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('user/detail_user/' . $this->session->userdata('id'), 'Profile'); ?></li>
                <li><?php echo anchor('transaction/payment_confirmation', 'Konfirmasi Pembayaran'); ?></li>
                <li><?php echo anchor('transaction/shopping_history', 'Riwayat Belanja'); ?></li>
                <li class="divider"></li>
                <li><?php echo anchor('login/logout','Logout'); ?></li>
              </ul>
            </li>
          <?php }else{ ?>
            <li><?php echo anchor('register', '<span class="glyphicon glyphicon-user"></span> Daftar'); ?></li>
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login</a>
              <div class="dropdown-menu" style="padding: 20px 10px 5px 10px; width:300px;">
              <div class="col-md-12">
                <?=form_open('login',['class'=>'form-horizontal'])?>
                   <div class="form-group">
                    <input id="username" class="form-control" type="text" name="username" placeholder="Username" />
                  </div>
                  <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password"/>
                  </div>
                  <div class="form-group">
                    <input type="checkbox"> Ingat saya
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                  </div>
                </form>
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>