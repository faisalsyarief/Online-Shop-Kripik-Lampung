<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Pembayaran</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/payments', '<i class="fa fa-money"></i> Data Pembayaran'); ?></li>
              <li class="active"><i class="fa fa-Money"></i> Detail Pembayaran</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
            <h4>ID Pembayaran : <?=$payment->code?></h4>
          	<table class="table table-hover">
            <?php foreach($orders as $order) : ?>
                <tr>
                  <td><strong>Nama Lengkap</strong></td>
                  <td>:</td>
                  <td><?=$order->fullname?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>:</td>
                  <td><?=$order->email?></td>
                </tr>
                <tr>
                  <td><strong>Telepon</strong></td>
                  <td>:</td>
                  <td>0<?=$order->telp?></td>
                </tr>
                <tr>
                  <td><strong>Alamat</strong></td>
                  <td>:</td>
                  <td><?=$order->address?></td>
                </tr>
                <tr>
                  <td><strong>Kecamatan</strong></td>
                  <td>:</td>
                  <td><?=$order->district_id?></td>
                </tr>
                <tr>
                  <td><strong>Kabupaten</strong></td>
                  <td>:</td>
                  <td><?=$order->regency_id?></td>
                </tr>
                <tr>
                  <td><strong>Provinsi</strong></td>
                  <td>:</td>
                  <td><?=$order->province_id?></td>
                </tr>
                <tr>
                  <td><strong>Kode Pos</strong></td>
                  <td>:</td>
                  <td><?=$order->zip_code?></td>
                </tr>
                <tr>
                  <td><strong>Kode Produk</strong></td>
                  <td>:</td>
                  <td><?=$order->product_code?></td>
                </tr>
                <tr>
                  <td><strong>Kuantitas</strong></td>
                  <td>:</td>
                  <td><?=$order->quantity?></td>
                </tr>
                <tr>
                  <td><strong>Harga</strong></td>
                  <td>:</td>
                  <td>Rp. <?=$order->price?></td>
                </tr>
                <tr>
                  <td><strong>Total Bayar</strong></td>
                  <td>:</td>
                  <td>Rp. <?=$order->quantity * $order->price?></td>
                </tr>
                <tr>
                  <td><strong>Tanggal Pemesanan</strong></td>
                  <td>:</td>
                  <td><?=$order->date?></td>
                </tr>
                <tr>
                  <td><strong>Status Pemesanan</strong></td>
                  <td>:</td>
                  <td><?=$order->status?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                  <?php if($order->status == 'Belum diproses'){ ?>
                    <?=anchor('admin/payments/send/' . $order->id,'Proses Pemesanan',['class'=>'btn btn-primary btn-sm pull-right','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                  <?php }else{ ?>
                    <?=anchor('admin/payments/send/' . $order->id,'Proses Pemesanan',['class'=>'btn btn-primary btn-sm pull-right disabled','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                  <?php } ?>
                  </td>
                </tr>
            <?php endforeach; ?>
            </table>
          </div>
        </div>
    </div>