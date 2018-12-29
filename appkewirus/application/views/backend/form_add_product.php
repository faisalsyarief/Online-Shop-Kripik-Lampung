<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Produk</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/products', '<i class="fa fa-server"></i> Data Produk'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Tambah Produk</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?=form_open_multipart('admin/products/add_product/',['class'=>'form-horizontal'])?>
	         <?php $error = form_error("name", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Nama Produk</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("description", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Deskripsi</label>
	            <div class="col-sm-10">
	              <textarea class="form-control" class="form-control" name="description"><?= set_value('description') ?></textarea>
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="col-sm-2 control-label">Kategori</label>
	            <div class="col-sm-10"> 
	              <select class="form-control" name="category">
	              	<option value='0'>--Pilih Kategori--</option>
	                <?php foreach($categories as $category) {
	                	echo "<option value='$category->category'>$category->category</option>";
	                } ?>
	              </select>
	            </div>
	          </div>
	          
	          <?php $error = form_error("price", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Harga</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="price" value="<?= set_value('price') ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-2 control-label">Diskon</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="discount">
	                <option value="0">Tidak ada diskon</option>
	                <option value="0.05">Diskon 5%</option>
	                <option value="0.1">Diskon 10%</option>
	                <option value="0.15">Diskon 15%</option>
	                <option value="0.2">Diskon 20%</option>
	                <option value="0.25">Diskon 25%</option>
	                <option value="0.3">Diskon 30%</option>
	                <option value="0.35">Diskon 35%</option>
	                <option value="0.4">Diskon 40%</option>
	                <option value="0.45">Diskon 45%</option>
	                <option value="0.5">Diskon 50%</option>
	                <option value="0.55">Diskon 55%</option>
	              </select>
	            </div>
	          </div>

	          <?php $error = form_error("stock", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Stok</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="stock" value="<?= set_value('stock') ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="col-sm-2 control-label">Gambar</label>
	            <div class="col-sm-10">
	              <input type="file" class="form-control" name="userfile">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
	            </div>
	          </div>
	       </form>
	    </div>