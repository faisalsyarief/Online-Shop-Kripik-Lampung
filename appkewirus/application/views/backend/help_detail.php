<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Bantuan</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/helps', '<i class="fa fa-info"></i> Data Bantuan'); ?></li>
              <li class="active"><i class="fa fa-info"></i> Detail Bantuan</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
            <?php foreach($helps as $help) : ?>
            <h4>ID Bantuan : <?=$help->id?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Topik</strong></td>
                  <td>:</td>
                  <td><?=$help->topic?></td>
                </tr>
                <tr>
                  <td><strong>Detail</strong></td>
                  <td>:</td>
                  <td><?=$help->detail?></td>
                </tr>
                <tr>
                  <td><?=anchor('admin/helps/delete_help/' . $help->id,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?></td>
                  <td></td>
                  <td><?=anchor('admin/helps/edit_help/' . $help->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
            <?php endforeach; ?>
          </div>
        </div>
    </div>