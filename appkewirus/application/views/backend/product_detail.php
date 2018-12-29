<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Detail Produk</h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/products', '<i class="fa fa-server"></i> Data Produk'); ?></li>
              <li class="active"><i class="fa fa-server"></i> Detail Produk</li>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          <?php foreach($products as $product) : ?>
            <h4>Kode Produk : <?=$product->code?></h4>
          	<table class="table table-hover">
                <tr>
                  <td><strong>Nama Produk</strong></td>
                  <td>:</td>
                  <td><?=$product->name?></td>
                </tr>
                <tr>
                  <td><strong>Deskripsi</strong></td>
                  <td>:</td>
                  <td><?=$product->description?></td>
                </tr>
                <tr>
                  <td><strong>Kategori</strong></td>
                  <td>:</td>
                  <td><?=$product->category?></td>
                </tr>
                <tr>
                  <td><strong>Harga</strong></td>
                  <td>:</td>
                  <td><?=$product->price?></td>
                </tr>
                <tr>
                  <td><strong>Diskon</strong></td>
                  <td>:</td>
                  <td>
                    <?php if($product->discount == '0.05'){
                      echo ('5%');
                    }else if ($product->discount == '0.1'){
                      echo ('10%'); 
                    }else if ($product->discount == '0.15'){
                      echo ('15%');
                    }else if ($product->discount == '0.2'){
                      echo ('20%'); 
                    }else if ($product->discount == '0.25'){
                      echo ('25%'); 
                    }else if ($product->discount == '0.3'){
                      echo ('30%'); 
                    }else if ($product->discount == '0.35'){
                      echo ('35%'); 
                    }else if ($product->discount == '0.4'){
                      echo ('40%'); 
                    }else if ($product->discount == '0.45'){
                      echo ('45%'); 
                    }else if ($product->discount == '0.5'){
                      echo ('50%'); 
                    }else if ($product->discount == '0.55'){
                      echo ('55%'); 
                    }else{ 
                      echo ('Tidak Ada Diskon');
                    } ?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Stok</strong></td>
                  <td>:</td>
                  <td><?=$product->stock?></td>
                </tr>
                <tr>
                  <td><strong>Gambar</strong></td>
                  <td>:</td>
                  <td><?=img(['src'=>'uploads/product-image/' . $product->image,'style'=>'max_width:100%; max_height:100%; height:100px;'])?></td>
                </tr>
                <tr>
                  <td><?=anchor('admin/products/delete_product/' . $product->code,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?></td>
                  <td></td>
                  <td><?=anchor('admin/products/edit_product/' . $product->code,'Ubah',['class'=>'btn btn-primary btn-sm pull-right'])?></td>
                </tr>
            </table>
            <?php endforeach; ?>
          </div>
        </div>
    </div>