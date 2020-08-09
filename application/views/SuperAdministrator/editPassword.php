<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title"><?php echo $title?></h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#"><?php echo $title?></a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form role="form" action="<?php echo site_url('CProfil/updatePassSuperadmin') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title"> <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="email2">Old Password</label>&nbsp;<small style="color:red;">*</small>
                    <input type="password" class="form-control" id="password" value="" onChange="checkPassword();" name="role_name" placeholder="Type your old password">
                    <input type="hidden" class="form-control" id="old_pass" name="old_pass" value="<?php echo $user->password;?>">
                    <small style="color:red;" class="registrationFormAlert" id="divPasswordValidationResult"></small>
                  </div>
                  <div class="form-group">
                    <label for="email2">New Password</label>&nbsp;<small style="color:red;">*</small>
                    <input type="password" class="form-control" placeholder="Type your new Password" id="newpassword" disabled>
                  </div>
                  <div class="form-group">
                    <label for="email2">Confirm Password</label>&nbsp;<small style="color:red;">*</small>
                    <input type="password" class="form-control" placeholder="Type your new Password Confirmation" id="repassword" name="repassword" disabled onChange="checkPassword2();">
                    <small style="color:red;" class="registrationFormAlert" id="divvalresult"></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-success" type="submit" name="Submit">Submit</button>
              <button class="btn btn-danger" type="reset" name="reset" onClick = "history.go(-1)">Cancel</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function checkPassword() {
    var password = $("#password").val();
    var old_pass = $("#old_pass").val();

    if (old_pass != password ){
      $('#newpassword').prop('disabled', true);
      $('#repassword').prop('disabled', true);
      $("#divPasswordValidationResult").html("Wrong Old Password");
    }
      else{
      $("#divPasswordValidationResult").html("");
      $('#newpassword').prop('disabled', false);
      $('#repassword').prop('disabled', false);
    }
}

function checkPassword2() {
    var newpassword = $("#newpassword").val();
    var repassword = $("#repassword").val();

    if (newpassword != repassword ){
      $("#divvalresult").html("Password is not Same");
    }
      else{
      $("#divvalresult").html("");
    }
}

$(document).ready(function () {
   $("#password").keyup(checkPassword);
   $("#repassword").keyup(checkPassword2);
});

</script>
