<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script>
      $(function() {
        if (localStorage.chkbx && localStorage.chkbx != '') {
            $('#remember_me').attr('checked', 'checked');
            $('#username').val(localStorage.usrname);
            $('#password').val(localStorage.pass);
        } else {
            $('#remember_me').removeAttr('checked');
            $('#username').val('');
            $('#password').val('');
        }
        $('#remember_me').click(function() {
          if ($('#remember_me').is(':checked')) {
              localStorage.usrname = $('#username').val();
              localStorage.pass = $('#password').val();
              localStorage.chkbx = $('#remember_me').val();
          } else {
              localStorage.usrname = '';
              localStorage.pass = '';
              localStorage.chkbx = '';
          }
        });
      });
    </script>
  </head>
  <body>
  <div class="page-header container">
    <h1>Login User</h1>
  </div>
  </div>
  <?php
  $message = $this->session->flashdata('error');
  if($message){
    echo '<div class="text-center alert alert-danger">' .$message. '</div>';
  } ?>
    <div class="col-md-11">
        <?=form_open('login',['class'=>'form-horizontal'])?>
        <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username">
              <?php echo $error; ?>
            </div>
          </div>
          <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="password">
            <?php echo $error; ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember_me" id="remember_me"> Ingat saya
                </label>
                <button type="submit" class="btn btn-primary pull-right">Sign in</button>
              </div>
            </div>
          </div>
          <div class="bottom text-center">
            Belum punya akun ? <?=anchor('register','<b>Daftar disini</b>')?><br><br>
            <?=anchor('https://accounts.google.com/ServiceLogin?passive=1209600&continue=https://accounts.google.com/o/oauth2/auth?response_type%3Dcode%26redirect_uri%3Dhttp://localhost/proyek2/index.php/register/authentication%26client_id%3D191289730969-ignh2dlje7ncf6rs1pu4h1f93hbchat2.apps.googleusercontent.com%26scope%3Dhttps://www.googleapis.com/auth/userinfo.profile%2Bhttps://www.googleapis.com/auth/userinfo.email%26access_type%3Doffline%26approval_prompt%3Dforce%26from_login%3D1%26as%3D-5ab9fddaabf09f03&oauth=1&sarp=1&scc=1#identifier','Login with Google',['class'=>'btn btn-danger'])?><br><br>
            <?=anchor(base_url(),'Kembali',['class'=>'btn btn-default'])?>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
