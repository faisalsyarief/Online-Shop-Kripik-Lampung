<?php $this->load->view('header') ?>
    <div class="page-header container">
        <h3 align="center">Terima kasih, barang pesanan anda sedang diproses...</h3>
        <h3 align="center">Segera lakukan pembayaran melalui ATM</h3>
        <h3 align="center">Kemudian lakukan <?=anchor('transaction/payment_confirmation','konfirmasi pembayaran')?></h3>
    </div>
<?php $this->load->view('footer'); ?>