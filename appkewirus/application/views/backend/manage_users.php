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
            <h1>Data User</small></h1>
            <ol class="breadcrumb">
              <li><?php echo anchor('admin/users', '<i class="fa fa-users"></i> Data User'); ?></li>
              <li class="active"><i class="fa fa-users"></i> Data User</li>
              
              <?=anchor('admin/users/add_user','Tambah User',['class'=>'btn btn-primary btn-sm','style'=>'float:right;'])?>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div>

        <div class="container table-responsive">
          <div class="col-lg-11">
          	<table id="myTable" class="table table-hover">
          		<thead>
                  <tr>
                    <th class="header">ID</th>
                    <th class="header">UserName</th>
                    <th class="header">Email</th>
                    <th class="header">Telepon</th>
                    <th class="header">Status</th>
                    <th class="header">Tgl Daftar</th>
                    <th class="header"> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $user) : ?>
                  <tr>
                  	<td><?=$user->id?></td>
                    <td><?=$user->username?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->telp?></td>
                    <td>
                        <?php if($user->group == '1'){
                          echo ('Administrator');
                        }else{
                          echo ('Member');
                        } ?>
                    </td>
                    <td><?php echo date('d M Y',strtotime($user->signup_date)) ?></td>
                    <td>
                        <?=anchor('admin/users/detail_user/' . $user->id,'Detail',['class'=>'btn btn-info btn-sm'])?>
                        <?=anchor('admin/users/edit_user/' . $user->id,'Ubah',['class'=>'btn btn-default btn-sm'])?>
                        <?=anchor('admin/users/delete_user/' . $user->id,'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>'return confirm(\'Apakah anda yakin?\')'])?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>