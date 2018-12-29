<?php $this->load->view('backend/header') ?>

	<!--<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.1/raphael.min.js"></script> 
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script src="<?php echo base_url('assets/js/chart-data-morris.js'); ?>"></script>
  <script>
    $(document).ready(function(){
      $('#myTable').DataTable();
    });
  </script>

    <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>Kripik Lampung</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Selamat Datang di Panel Administrator
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-file"></i> Detail Kontak</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table">
                    <?php foreach($contacts as $contact) : ?>
                    <tr>
                      <td><strong>Perusahaan</strong></td>
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
                <?php endforeach; ?>
                </table>
                </div>
                <div class="text-right">
                  <td><?=anchor('admin/contacts/edit_contact/' . $contact->id,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-truck"></i> Pesanan Terbaru</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($orders as $order) : ?>
                      <tr>
                        <td><?=$order->id?></td>
                        <td><?=date("d M Y",strtotime($order->date))?></td>
                        <td><?=$order->time?></td>
                        <td>Rp. <?=$order->quantity * $order->price?></td>
                        <td><?=$order->status?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <?=anchor('admin/orders','Lihat Semua Pesanan <i class="fa fa-arrow-circle-right"></i>')?>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

     </div><!-- /#page-wrapper -->