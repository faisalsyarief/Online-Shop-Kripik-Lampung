<?php
	$id = $category->id;
if($this->input->post('is_submitted')){
	$category = set_value('category');
}else{
	$category = $category->category;
}
?>
<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Kategori</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/categories', '<i class="fa fa-server"></i> Data Kategori'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Edit Kategori</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?php $error = form_error("category", "<p class='text-danger'>", '</p>'); ?>
	       <?=form_open_multipart('admin/categories/edit_category/' . $id,['class'=>'form-horizontal'])?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Topik</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="category" value="<?= $category ?>">
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