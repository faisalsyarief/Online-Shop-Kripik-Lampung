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
            <h1>Data Pembayaran</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/payments', '<i class="fa fa-money"></i> Data Pembayaran'); ?></li>
              <li class="active"><i class="fa fa-money"></i> Data Pembayaran</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          	<table id="myTable" class="table table-hover">
          		<thead>
                  <tr>
                    <th class="header">Kode</th>
                    <th class="header">Id User</th>
                    <th class="header">Tgl Pembayaran</th>
                    <th class="header">Waktu Pembayaran</th>
                    <th class="header">Status</th>
                    <th class="header"> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($payments as $payment) : ?>
                  <tr>
                  	<td><?=$payment->code?></td>
                    <td><?=$payment->user_id?></td>
                    <td><?=date("d M Y",strtotime($payment->date))?></td>
                    <td><?=$payment->time?></td>
                    <td><?=$payment->status?></td>
                    <td>
                    <?php if($payment->status == 'Sudah bayar'){ ?>
                      <?=anchor('admin/payments/detail/' . $payment->code,'Detail',['class'=>'btn btn-info btn-sm'])?>
                    <?php }elseif($payment->status == 'Konfirmasi'){ ?>
                      <?=anchor('admin/payments/check/' . $payment->code,'Cek Pembayaran',['class'=>'btn btn-info btn-sm'])?>
                    <?php }else{ ?>
                      <?=anchor('admin/payments/detail/' . $payment->code,'Detail',['class'=>'btn btn-info btn-sm disabled'])?>
                    <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>