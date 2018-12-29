<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Kontak</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/contacts', '<i class="fa fa-file"></i> Detail Kotak'); ?></li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          	<table class="table table-hover">
            <?php foreach($contacts as $contact) : ?>
                <tr>
                  <td><strong>Nama Perusahaan</strong></td>
                  <td>:</td>
                  <td><?=$contact->name?></td>
                </tr>
                <tr>
                  <td><strong>Alamat</strong></td>
                  <td>:</td>
                  <td><?=$contact->address?></td>
                </tr>
                <tr>
                  <td><strong>Kode Pos</strong></td>
                  <td>:</td>
                  <td><?=$contact->zip_code?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>:</td>
                  <td><?=$contact->email?></td>
                </tr>
                <tr>
                  <td><strong>Telepon</strong></td>
                  <td>:</td>
                  <td><?=$contact->telp?></td>
                </tr>
                <tr>
                  <td><strong>Latitude</strong></td>
                  <td>:</td>
                  <td><?=$contact->latitude?></td>
                </tr>
                <tr>
                  <td><strong>Longitude</strong></td>
                  <td>:</td>
                  <td><?=$contact->longitude?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><?=anchor('admin/contacts/edit_contact/' . $contact->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            <?php endforeach; ?>
            </table>
          </div>
        </div>
    </div>