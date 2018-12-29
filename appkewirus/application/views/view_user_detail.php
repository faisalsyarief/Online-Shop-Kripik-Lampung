<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Profile User</h1>
  </div>
  <div class="container-fluid">
  <div class="col-md-1"></div>
  <div class="col-md-10">
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
                  <td></td>
                  <td></td>
                  <td><?=anchor('user/edit_user/' . $user->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
        <?php endforeach; ?>
  </div>
  </div>
  <div class="col-md-1"></div>
  <hr>
<?php $this->load->view('footer'); ?>