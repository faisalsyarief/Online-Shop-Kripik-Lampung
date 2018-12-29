<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Pembayaran</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/payments', '<i class="fa fa-money"></i> Data Pembayaran'); ?></li>
              <li class="active"><i class="fa fa-money"></i> Detail Pembayaran</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
            <?php foreach($payments as $payment) : ?>
            <h4>ID Pembayaran : <?=$payment->code?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Status Pembayaran</strong></td>
                  <td>:</td>
                  <td><?=$payment->status?></td>
                </tr>
                <tr>
                  <td><strong>Bukti Pembayaran</strong></td>
                  <td>:</td>
                  <td><?=img(['src'=>'uploads/payment/' . $payment->image,'style'=>'max_width:100%; max_height:100%; height:400px;'])?></td>
                </tr>
                <tr>
                  <td><strong>Tanggal Konfirmasi</strong></td>
                  <td>:</td>
                  <td><?=$payment->date?></td>
                </tr>
                <tr>
                  <td><strong>Waktu Konfirmasi</strong></td>
                  <td>:</td>
                  <td><?=$payment->time?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                  <?php if($payment->status == 'Konfirmasi'){ ?>
                    <?=anchor('admin/payments/paid/' . $payment->code,'Proses Pembayaran',['class'=>'btn btn-primary btn-sm pull-right','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                  <?php }else{ ?>
                    <?=anchor('admin/payments/payment/' . $payment->code,'Proses Pembayaran',['class'=>'btn btn-primary btn-sm pull-right disabled','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                  <?php } ?>
                  </td>
                </tr>
            </table>
            <?php endforeach; ?>
          </div>
        </div>
    </div>