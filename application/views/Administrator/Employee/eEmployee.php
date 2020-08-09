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
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Edit Data</a>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <form role="form" action="<?php echo site_url('CAEmployee/update') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Add <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="id_user" value="<?php echo $em->id_user; ?>">
                    <label for="email2">Employee ID</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" name="employee_id" placeholder="Enter Employee ID" required value="<?php echo $em->id_karyawan; ?>">
                    <small style="color:red;"><?php echo form_error('employee_id') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Name</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" name="employee_name" placeholder="Enter Employee Name" required value="<?php echo $em->nama; ?>">
                    <small style="color:red;"><?php echo form_error('employee_name') ?></small>
                  </div>
                  <div class="form-group">
                    <label for="email2">Phone</label>
                    <input type="text" class="form-control" name="employee_phone" placeholder="Enter Phone Number" value="<?php echo $em->no_telp; ?>">
                    <small style="color:red;"><?php echo form_error('employee_phone') ?></small>
                  </div>
                  <div class="form-group">
                    <label for="email2">Date of Birth</label>
                    <input type="date" class="form-control" name="employee_dob" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $em->tgl_lahir; ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>&nbsp;<small style="color:red;">*</small>
                    <select class="form-control" id="exampleFormControlSelect1" name="employee_role" required>
                      <?php foreach($role as $item){ ?>
                        <option value="<?php echo $item->id_role; ?>" <?php if($item->id_role==$em->id_role){echo "selected";} ?>><?php echo $item->nama_role; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email2">Email</label>&nbsp;<small style="color:red;">*</small>
                    <input type="email" class="form-control" name="employee_email" placeholder="Enter Email" required value="<?php echo $em->email; ?>">
                    <small style="color:red;"><?php echo form_error('employee_email') ?></small>
                  </div>
                  <div class="form-check">
                    <label>Gender</label><br/>
                    <label class="form-radio-label">
                      <input class="form-radio-input" type="radio" name="employee_gender" value="Male"  <?php if($em->jenis_kelamin=="Male"){echo "checked";} ?>>
                      <span class="form-radio-sign">Male</span>
                    </label>
                    <label class="form-radio-label ml-3">
                      <input class="form-radio-input" type="radio" name="employee_gender" value="Female" <?php if($em->jenis_kelamin=="Female"){echo "checked";} ?>>
                      <span class="form-radio-sign">Female</span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <label for="comment">Address</label>
                  <textarea class="form-control" id="comment" rows="5" name="employee_address">
                    <?php echo $em->alamat ?>
                  </textarea>
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
