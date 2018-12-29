<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Keranjang Belanja</h1>
  </div>
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
        <table class="table table-hover">
        	<thead>
        	<tr>
            	<th>#</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php
				$i=0;
            	foreach ($this->cart->contents() as $items):
				$subtotal = ($items['qty'] * $items['price']);
				$i++;
			?>
            <tr>
            	<td><?= $i ?></td>
                <td><?= $items['name'] ?></td>
                <td class="text-center"><?= $items['qty'] ?></td>
                <td align="right"><?= 'Rp. '.number_format($items['price'],0,',','.') ?></td>
                <td align="right"><?= 'Rp. '.number_format($subtotal,0,',','.') ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
            	<td align="right" colspan="4"><strong>Total : </strong></td>
                <td align="right"><?= 'Rp. '.number_format($this->cart->total(),0,',','.'); ?></td>
            </tr>
            </tfoot>
        </table>
        </div>
        <div class="col-md-1"></div>
    	</div>
        <div align="center">
        	<?= anchor('home/clear_cart','Bersihkan',['class'=>'btn btn-danger']) ?>
            <?= anchor(base_url(),'Lanjutkan Belanja',['class'=>'btn btn-primary']) ?>
            <?php if  ($this->cart->total_items()!=0):?>
            	<?= anchor('transaction','Check Out',['class'=>'btn btn-success']) ?>
            <?php else:?>
            	<?= anchor(base_url(),'Check Out',['class'=>'btn btn-success']) ?>
            <?php endif ;?>
        </div>
        <hr>
<?php $this->load->view('footer'); ?>