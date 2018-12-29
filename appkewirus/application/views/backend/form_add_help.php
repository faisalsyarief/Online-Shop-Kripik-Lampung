<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Bantuan</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/helps', '<i class="fa fa-info"></i> Data Bantuan'); ?></li>
              <li class="active"><i class="fa fa-info"></i> Tambah Bantuan</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?=form_open_multipart('admin/helps/add_help/',['class'=>'form-horizontal'])?>
	         <?php $error = form_error("topic", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Topik</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="topic" value="<?= set_value('topic') ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("detail", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Detail</label>
	            <div class="col-sm-10">
	              <textarea class="form-control" class="form-control" name="detail"><?= set_value('detail') ?></textarea>
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
	            </div>
	          </div>
	       </form>
	    </div>