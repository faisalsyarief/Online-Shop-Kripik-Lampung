<?php $this->load->view('backend/header') ?>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script>
    $(document).ready(function(){
      $('#myTable').DataTable();
    });
  </script>

  <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Data Help</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/helps', '<i class="fa fa-info"></i> Data Bantuan'); ?></li>
              <li class="active"><i class="fa fa-info"></i> Data Bantuan</li>
              
              <?=anchor('admin/helps/add_help','Tambah Bantuan',['class'=>'btn btn-primary btn-sm','style'=>'float:right;'])?>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
            <table id="myTable" class="table table-hover">
              <thead>
                  <tr>
                    <th class="header">Nomor</th>
                    <th class="header">Topik</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($helps as $help) : ?>
                  <tr>
                    <td><?=$help->id?></td>
                    <td><?=$help->topic?></td>
                    <td>
                        <?=anchor('admin/helps/detail_help/' . $help->id,'Detail',['class'=>'btn btn-info btn-sm'])?>
                        <?=anchor('admin/helps/edit_help/' . $help->id,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                        <?=anchor('admin/helps/delete_help/' . $help->id,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>