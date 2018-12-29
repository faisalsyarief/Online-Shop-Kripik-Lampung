<?php
	$id = $contact->id;
if($this->input->post('is_submitted')){
	$name = set_value('name');
	$address = set_value('address');
	$zip_code = set_value('zip_code');
	$email = set_value('email');
	$telp = set_value('telp');
	$latitude = set_value('latitude');
	$longitude = set_value('longitude');
}else{
	$name = $contact->name;
	$address = $contact->address;
	$zip_code = $contact->zip_code;
	$email = $contact->email;
	$telp = $contact->telp;
	$latitude = $contact->latitude;
	$longitude = $contact->longitude;
}
?>
<?php $this->load->view('backend/header') ?>

  	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Kontak</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/contacts', '<i class="fa fa-file"></i> Detail Kontak'); ?></li>
              <li class="active"><i class="fa fa-file"></i> Edit Kontak</li>
              
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="col-md-11">
	       <?php $error = form_error("name", "<p class='text-danger'>", '</p>'); ?>
	       <?=form_open_multipart('admin/contacts/edit_contact/' . $id,['class'=>'form-horizontal'])?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Nama Perusahaan</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="name" value="<?= $name ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("address", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Alamat</label>
	            <div class="col-sm-10">
	              <textarea class="form-control" class="form-control" name="address"><?= $address ?></textarea>
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("zip_code", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Kode Pos</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="zip_code" value="<?= $zip_code ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Email</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="email" value="<?= $email ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Telepon</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="telp" value="<?= $telp ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Latitude</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="latitude" value="<?= $latitude ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Longitude</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="longitude" value="<?= $longitude ?>">
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