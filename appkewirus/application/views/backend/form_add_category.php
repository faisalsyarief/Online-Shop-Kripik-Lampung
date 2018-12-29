<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Kategori</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/categories', '<i class="fa fa-server"></i> Data Kategori'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Tambah Kategori</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?=form_open_multipart('admin/categories/add_category/',['class'=>'form-horizontal'])?>
	         <?php $error = form_error("category", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Topik</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="category" value="<?= set_value('category') ?>">
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