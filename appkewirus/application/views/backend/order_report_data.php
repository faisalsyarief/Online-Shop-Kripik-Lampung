<?php $this->load->view('backend/header') ?>
	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="text-center">Laporan Pemesanan CV. Surya Kencana</small></h3>
            <ol class="breadcrumb">
              <?=anchor('admin/reports/search_order','<i class="glyphicon glyphicon-search"></i> Cari Laporan',['class'=>'btn btn-primary btn-xs'])?>
              <button class="btn btn-default btn-xs pull-right" onclick="print()"><i class="glyphicon glyphicon-print"></i> Print</button>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container-fluid table-responsive">
          <div class="col-lg-12">
          	<table class="table table-bordered table-hover">
          		<thead>
                  <tr>
                    <th class="header">No.</th>
                    <th class="header">Nama</th>
                    <th class="header">Kode Pembayaran</th>
                    <th class="header">Kode Produk</th>
                    <th class="header">Tanggal</th>
                    <th class="header">Waktu</th>
                    <th class="header">Total</th>
                    <th class="header">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($reports as $report) :
                  $no++; 
                  ?>
                  <tr>
                  	<td><?=$no?></td>
                    <td><?=$report->fullname?></td>
                    <td><?=$report->payment_code?></td>
                    <td><?=$report->product_code?></td>
                    <td><?=date("d M Y",strtotime($report->date))?></td>
                    <td><?=$report->time?></td>
                    <td>Rp. <?=$report->quantity * $report->price?></td>
                    <td><?=$report->status?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>