<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Kategori Produk</h1>
  </div>
    <div class="container-fluid">
    <?php foreach($products as $product) : ?>
      <div class="col-sm-3 col-md-3">
      <?php if($product->discount > 0){ ?>
        <div class="panel panel-primary">
      <?php }else{ ?>
        <div class="panel panel-default">
      <?php } ?>
          <div class="panel-heading text-center">
            <h4 class="panel-title" style="min-height:35px"><strong><?=$product->name?></strong></h4>
          </div>
          <div class="panel-body text-center">
            <?=img(['src'=>'uploads/product-image/' . $product->image,'style'=>'max_width:100%; max_height:100%; height:100px;'])?>
          </div>
          <ul class="list-group">
            <li class="list-group-item" align="justify" style="min-height:82px"><?php echo substr($product->description, 0, 108)?>...</li>

            <?php if($product->stock > 0){ ?>
              <li class="list-group-item"><strong>Stok : </strong><?=$product->stock?></li>
            <?php }else{ ?>
              <li class="list-group-item"><span class="label label-danger">Maaf, Stok Habis!</span></li>
            <?php } ?>

            <?php if($product->discount > 0){ ?>
              <li class="list-group-item"><strong>Harga : </strong><span class="label label-warning"><s><?='Rp. '.$product->price?></s></span></li>
            <?php }else{ ?>
              <li class="list-group-item"><strong>Harga : </strong><?='Rp. '.$product->price?></li>
            <?php } ?>

            <?php if($product->discount == '0.05'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 5 %</span><?='Rp. '. 0.95 * $product->price?></li>
            <?php }elseif($product->discount == '0.1'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 10 %</span><?='Rp. '. 0.9 * $product->price?></li>
            <?php }elseif($product->discount == '0.15'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 15 %</span><?='Rp. '. 0.85 * $product->price?></li>
            <?php }elseif($product->discount == '0.2'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 20 %</span><?='Rp. '. 0.8 * $product->price?></li>
            <?php }elseif($product->discount == '0.25'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 25 %</span><?='Rp. '. 0.75 * $product->price?></li>
            <?php }elseif($product->discount == '0.3'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 30 %</span><?='Rp. '. 0.7 * $product->price?></li>
            <?php }elseif($product->discount == '0.35'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 35 %</span><?='Rp. '. 0.65 * $product->price?></li>
            <?php }elseif($product->discount == '0.4'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 40 %</span><?='Rp. '. 0.6 * $product->price?></li>
            <?php }elseif($product->discount == '0.45'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 45 %</span><?='Rp. '. 0.55 * $product->price?></li>
            <?php }elseif($product->discount == '0.5'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 50 %</span><?='Rp. '. 0.5 * $product->price?></li>
            <?php }elseif($product->discount == '0.55'){ ?>
              <li class="list-group-item"><span class="label label-success">Diskon 55 %</span><?='Rp. '. 0.45 * $product->price?></li>
            <?php }else{ ?>
              <li class="list-group-item"><span class="label label-default">Tidak Ada Diskon</span></li>
            <?php } ?>

            <?php if($this->session->userdata('group')=='1'){ ?>
              <li class="list-group-item">
                <?=anchor('admin/products/edit_product/' . $product->code,'Edit',['class'=>'btn btn-default'])?>
                <?=anchor('admin/products/delete_product/' . $product->code,'Hapus',['class'=>'btn btn-danger','onclick'=>'return confirm(\'Apakah kamu yakin?\')'])?>
              </li>
            <?php }else{ ?>
              <li class="list-group-item">
                <?=anchor('home/view_detail/' . $product->code,'Detail',['class'=>'btn btn-default','role'=>'button'])?>
                <?=anchor('home/add_to_cart/' . $product->code,'Beli Ini',['class'=>'btn btn-primary pull-right','role'=>'button'])?>
              </li>
            <?php } ?>
          </ul>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    <hr>
<?php $this->load->view('footer'); ?>