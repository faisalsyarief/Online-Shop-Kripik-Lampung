<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail User</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/users', '<i class="fa fa-users"></i> Data User'); ?></li>
              <li class="active"><i class="fa fa-user"></i> Detail User</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          <?php foreach($users as $user) : ?>
            <h4>ID User : <?=$user->id?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Nama Lengkap</strong></td>
                  <td>:</td>
                  <td><?=$user->fullname?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>:</td>
                  <td><?=$user->email?></td>
                </tr>
                <tr>
                  <td><strong>Telepon</strong></td>
                  <td>:</td>
                  <td>0<?=$user->telp?></td>
                </tr>
                <tr>
                  <td><strong>Username</strong></td>
                  <td>:</td>
                  <td><?=$user->username?></td>
                </tr>
                <tr>
                  <td><strong>Jenis Kelamin</strong></td>
                  <td>:</td>
                  <td><?=$user->gender?></td>
                </tr>
                <tr>
                  <td><strong>Alamat</strong></td>
                  <td>:</td>
                  <td><?=$user->address?></td>
                </tr>
                <tr>
                  <td><strong>Kecamatan</strong></td>
                  <td>:</td>
                  <td><?=$user->district_id?></td>
                </tr>
                <tr>
                  <td><strong>Kabupaten</strong></td>
                  <td>:</td>
                  <td><?=$user->regency_id?></td>
                </tr>
                <tr>
                  <td><strong>Provinsi</strong></td>
                  <td>:</td>
                  <td><?=$user->province_id?></td>
                </tr>
                <tr>
                  <td><strong>Kode Pos</strong></td>
                  <td>:</td>
                  <td><?=$user->zip_code?></td>
                </tr>
                <tr>
                  <td><strong>Grup</strong></td>
                  <td>:</td>
                  <td>
                  <?php if($user->group == '1'){
                      echo ('Administrator');
                  }else{
                      echo ('Member');
                  } ?>  
                  </td>
                </tr>
                <tr>
                  <td><strong>Tanggal Daftar</strong></td>
                  <td>:</td>
                  <td><?=$user->signup_date?></td>
                </tr>
                <tr>
                  <td><?=anchor('admin/users/delete_user/' . $user->id,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?></td>
                  <td></td>
                  <td><?=anchor('admin/users/edit_user/' . $user->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
            <?php endforeach; ?>
          </div>
        </div>
    </div>