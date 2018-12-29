<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Riwayat Belanja : <?php echo $this->session->userdata('username'); ?></h1>
  </div>
<div class="row">
<?php
    $message = $this->session->flashdata('message');
    if($message){
        echo '<div class="text-center alert alert-success">' .$message. '</div>';
      } 
?>
<div class="col-md-1"></div>
<div class="col-md-10">
<?php if($history != false) : ?>
    <table class="table table-bordered table-striped table-hover">
    	<thead>
        <tr>
        	<th>Kode Pembayaran</th>
           	<th>Tanggal Pemesanan</th>
            <th>Waktu Pemesanan</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($history as $row): ?>
        <tr>
        	<td><?= $row->code ?></td>
            <td><?= $row->date ?></td>
            <td><?= $row->time ?></td>
            <td><?= 'Rp. '.$row->total ?></td>
            <td><?= $row->status ?></td>
            <td>
            <?php if($row->status == 'Belum bayar'){ ?>
				<?=anchor('transaction/payment_confirmation_2/'.$row->code,'Konfirmasi',array('class'=>'btn btn-primary btn-sm'))?>
                <?=anchor('transaction/canceled/'.$row->code,'Batalkan',array('class'=>'btn btn-danger btn-sm',
						'onclick'=>'return confirm(\'Apakah anda yakin?\')'))?>
			<?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col-md-1"></div>
</div>
<?php else : ?>
<p align="center">Tidak ada riwayat belanja untuk anda. <?=anchor('/','Belanja sekarang')?></p>
<?php endif; ?>
<hr>
<?php $this->load->view('footer'); ?>