<?php $this->load->view('backend/header') ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
	</script>

	<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Data Produk</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/products', '<i class="fa fa-server"></i> Data Produk'); ?></li>
              
              <?=anchor('admin/products/add_product','Tambah Produk',['class'=>'btn btn-primary btn-sm','style'=>'float:right;'])?>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          	<table id="myTable" class="table table-hover">
          		<thead>
                  <tr>
                    <th class="header">Kode</th>
                    <th class="header">Nama Produk</th>
                    <th class="header">Kategori</th>
                    <th class="header">Harga</th>
                    <th class="header">Diskon</th>
                    <th class="header">Stok</th>
                    <th class="header"> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($products as $product) : ?>
                  <tr>
                  	<td><?=$product->code?></td>
                    <td><?=$product->name?></td>
                    <td><?=$product->category?></td>
                    <td><?=$product->price?></td>
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
                    <td><?=$product->stock?></td>
                    <td>
                        <?=anchor('admin/products/detail_product/' . $product->code,'Detail',['class'=>'btn btn-info btn-sm'])?>
                        <?=anchor('admin/products/edit_product/' . $product->code,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                        <?=anchor('admin/products/delete_product/' . $product->code,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>