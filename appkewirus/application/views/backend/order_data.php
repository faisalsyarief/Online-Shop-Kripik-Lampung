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
            <h1>Data Pesanan</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/orders', '<i class="fa fa-truck"></i> Data Pesanan'); ?></li>
              <li class="active"><i class="fa fa-truck"></i> Data Pesanan</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          	<table id="myTable" class="table table-hover">
          		<thead>
                  <tr>
                    <th class="header">#</th>
                    <th class="header">Kode Pembayaran</th>
                    <th class="header">Id User</th>
                    <th class="header">Kode Produk</th>
                    <th class="header">Tanggal</th>
                    <th class="header">Waktu</th>
                    <th class="header">Kuantitas</th>
                    <th class="header">Harga</th>
                    <th class="header">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $order) : ?>
                  <tr>
                  	<td><?=$order->id?></td>
                    <td><?=$order->payment_code?></td>
                    <td><?=$order->user_id?></td>
                    <td><?=$order->product_code?></td>
                    <td><?=date("d M Y",strtotime($order->date))?></td>
                    <td><?=$order->time?></td>
                    <td><?=$order->quantity?></td>
                    <td><?=$order->price?></td>
                    <td><?=$order->status?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>