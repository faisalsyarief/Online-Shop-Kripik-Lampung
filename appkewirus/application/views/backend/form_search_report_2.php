<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Cari Laporan</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/reports/order_reports', '<i class="fa fa-file"></i> Laporan'); ?></li>
              <li class="active"><i class="fa fa-file"></i> Cari Laporan</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <?php
		  $message = $this->session->flashdata('warning');
		  if($message){
		    echo '<div class="text-center alert alert-warning">' .$message. '</div>';
		  } ?>
        <div class="col-md-11">
	       <?=form_open_multipart('admin/reports/search_order/',['class'=>'form-horizontal'])?>
	         <?php $error = form_error("start_date", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Tanggal Awal</label>
	            <div class="col-sm-10">
	              <input type="date" class="form-control" name="start_date">
	              <?php echo $error; ?>
	            </div>
	          </div>

	         <?php $error = form_error("end_date", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Tanggal Akhir</label>
	            <div class="col-sm-10">
	              <input type="date" class="form-control" name="end_date" value="<?= date('Y-m-d') ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-primary pull-right">Cari</button>
	            </div>
	          </div>
	       </form>
	    </div>