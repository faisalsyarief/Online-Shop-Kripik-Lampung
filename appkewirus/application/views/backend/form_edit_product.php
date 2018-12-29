<?php
	$code = $product->code;
if($this->input->post('is_submitted')){
	$name = set_value('name');
	$description = set_value('description');
	$category = set_value('category');
	$price = set_value('price');
	$discount = set_value('discount');
	$stock = set_value('stock');
}else{
	$name = $product->name;
	$description = $product->description;
	$category = $product->category;
	$price = $product->price;
	$discount = $product->discount;
	$stock = $product->stock;
}
?>
<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Produk</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/products', '<i class="fa fa-server"></i> Data Produk'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Edit Produk</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?php $error = form_error("name", "<p class='text-danger'>", '</p>'); ?>
	       <?=form_open_multipart('admin/products/edit_product/' . $code,['class'=>'form-horizontal'])?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Nama Produk</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="name" value="<?= $name ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("description", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Deskripsi</label>
	            <div class="col-sm-10">
	              <textarea class="form-control" class="form-control" name="description"><?= $description ?></textarea>
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="col-sm-2 control-label">Kategori</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="category">
	              	<option value="<?php echo $category; ?>"><?php echo $category; ?></option>
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
	              <input type="text" class="form-control" name="price" value="<?= $price ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-2 control-label">Diskon</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="discount">
	              	<option value="<?php echo $discount; ?>">
	              	<?php if($discount == '0.55'){ 
	              		echo ('Diskon 55%');
	              	}else if($discount == '0.50'){
	              		echo ('Diskon 50%');
	              	}else if($discount == '0.45'){
	              		echo ('Diskon 45%');
	              	}else if($discount == '0.40'){
	              		echo ('Diskon 40%');
	              	}else if($discount == '0.35'){
	              		echo ('Diskon 35%');
	              	}else if($discount == '0.30'){ 
	              		echo ('Diskon 30%');
	              	}else if($discount == '0.25'){
	              		echo ('Diskon 25%');
	              	}else if($discount == '0.20'){
	              		echo ('Diskon 20%');
	              	}else if($discount == '0.15'){
	              		echo ('Diskon 15%');
	              	}else if($discount == '0.10'){
	              		echo ('Diskon 10%');
	              	}else if($discount == '0.05'){
	              		echo ('Diskon 5%');
	              	}else{
	              		echo ('Tidak ada diskon'); 
	              	} ?></option>
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
	              <input type="text" class="form-control" name="stock" value="<?= $stock ?>">
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