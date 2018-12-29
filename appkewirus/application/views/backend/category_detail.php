<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Kategori</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/categories', '<i class="fa fa-server"></i> Data Kategori'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Detail Kategori</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
            <?php foreach($categories as $category) : ?>
            <h4>ID Kategori : <?=$category->id?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Kategori</strong></td>
                  <td>:</td>
                  <td><?=$category->category?></td>
                </tr>
                  <td><?=anchor('admin/categories/delete_category/' . $category->id,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?></td>
                  <td></td>
                  <td><?=anchor('admin/categories/edit_category/' . $category->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
            <?php endforeach; ?>
          </div>
        </div>
    </div>