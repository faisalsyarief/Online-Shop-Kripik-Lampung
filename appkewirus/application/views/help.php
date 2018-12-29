<?php $this->load->view('header') ?>
  <div class="page-header container">
    <h1>Bantuan</h1>
  </div>
  <?php foreach($helps as $help) : ?>
  <div class="container">
    <div class="col-lg-12">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?=$help->topic?></a>
                    </h4>
                </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body"><?=$help->detail?></div>
                    </div>
                </div>
            </div>
    </div>
   </div>
   <?php endforeach; ?>
   <div class="page-header container">
      <h1>Kontak</h1>
  </div>
  <div class="container">
        <?php foreach($contacts as $contact) : ?>
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <?php
                echo '<iframe id="map" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll='.$contact->latitude.','.$contact->longitude.'&amp;spn=56.506174,79.013672&amp;t=m&amp;z=18&amp;output=embed"></iframe>';
                ?>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Detail Kontak</h3>
                <p><strong><?=$contact->name?></strong></p>
                <p><?=$contact->address?> <?=$contact->zip_code?><br></p>
                <p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: <?=$contact->telp?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:name@example.com"><?=$contact->email?></a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
            </div>
        <?php endforeach; ?>
        </div>
  <hr>
<?php $this->load->view('footer'); ?>