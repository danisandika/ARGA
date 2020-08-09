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
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('<?php echo base_url('Atlantis/assets/img/blogpost.jpg');?>')">
									<div class="profile-picture">
										<div class="avatar avatar-xxl">
											<img src="<?php echo base_url('upload/profil/'.$this->session->userdata('user_profil'));?>" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
                  <form role="form" action="<?php echo site_url('CProfil/updateUserSuperadmin') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="email2">Employee ID</label>&nbsp;<small style="color:red;">*</small>
                      <input type="text" class="form-control" value="<?php echo $user->id_karyawan; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="email2">Name</label>&nbsp;<small style="color:red;">*</small>
                      <input type="text" class="form-control" value="<?php echo $user->nama; ?>" name="nama" placeholder="Type your Name">
                      <small style="color:red;"><?php echo form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="email2">Address</label>
                      <textarea name="alamat" class="form-control" rows="5"><?php echo $user->alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email2">Phone</label>
                      <input type="number" class="form-control" value="<?php echo $user->no_telp; ?>" name="no_telp" placeholder="Type your Phone Number">
                      <small style="color:red;"><?php echo form_error('no_telp') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="email2">Date of Birth</label>
                      <input type="date" class="form-control" value="<?php echo $user->tgl_lahir; ?>" name="tgl_lahir" placeholder="Type your Date of Birth">
                    </div>
                    <div class="form-group">
                      <label for="email2">Email</label>&nbsp;<small style="color:red;">*</small>
                      <input type="email" class="form-control" value="<?php echo $user->email; ?>" name="email" placeholder="Type your Email">
                      <small style="color:red;"><?php echo form_error('email') ?></small>
                    </div>
                    <div class="form-check">
                      <label>Gender</label><br/>
                      <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Male"  <?php if($user->jenis_kelamin=="Male"){echo "checked";} ?>>
                        <span class="form-radio-sign">Male</span>
                      </label>
                      <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Female" <?php if($user->jenis_kelamin=="Female"){echo "checked";} ?>>
                        <span class="form-radio-sign">Female</span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="email2">Username</label>&nbsp;<small style="color:red;">*</small>
                      <input type="text" class="form-control" value="<?php echo $user->username; ?>" name="username" placeholder="Type your Username">
                      <small style="color:red;"><?php echo form_error('username') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="email2">Profile</label>
                      <input type="hidden" class="form-control" value="<?php echo $user->foto_profil; ?>" name="old_foto" placeholder="Type your Profile">
                      <input type="file" class="form-control" value="<?php echo $user->foto_profil; ?>" name="foto_profil" placeholder="Type your Profile">
                      <small style="color:red;"><?php echo form_error('foto_profil') ?></small>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="save" class="btn btn-secondary btn-block">Submit</button>
                      <button type="reset" name="cancel" class="btn btn-danger btn-block"  onClick = "history.go(-1)">Cancel</button>
                    </div>
                </form>
								</div>

							</div>
						</div>
					</div>
        </div>
      </div>
    </div>
