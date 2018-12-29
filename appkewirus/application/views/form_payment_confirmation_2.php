<?php
foreach ($payments as $payment) {
  $code = $payment->payment_code;
  if($this->input->post('is_submitted')){
    $total = set_value('total');
  }else{
    $total = ($payment->quantity * $payment->price);
  }
}
?>
<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Konfirmasi Pembayaran : <?php echo $this->session->userdata('username'); ?></h1>
  </div>
  <div class="row">
  <div class="col-md-1"></div>
  	<div class="col-md-10">
        <div><?= $this->session->flashdata('error') ?></div>
        <?=form_open_multipart('transaction/payment_confirmation_2/'.$code,['class'=>'form-horizontal'])?>
        <?php $error = form_error("amount", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Jumlah Transfer</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="amount" value="<?= $total ?>">
              <?php echo $error; ?>
          	</div>
          </div>
          
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Bukti Transfer</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="bukti">
          	</div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary pull-right">Konfirmasi Pembayaran</button>
          	</div>
          </div>
        </form>
    </div>
    <div class="col-md-1"></div>
    </div>
    <hr>
<?php $this->load->view('footer'); ?>
