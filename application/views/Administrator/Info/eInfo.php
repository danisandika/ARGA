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
          <form role="form" action="<?php echo site_url('CAInfo/update') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Edit <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="id_info" value="<?php echo $info->id_info;?>">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Info Name</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" name="info_name" placeholder="Enter Info Name" value="<?php echo $info->nama_info;?>">
                    <small style="color:red;"><?php echo form_error('info_name') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Info File</label>&nbsp;<small style="color:red;">*</small>
                    <input type="file" class="form-control" name="info_file" placeholder="Enter Info File">
                    <input type="hidden" name="info_file_old" value="<?php echo $info->info_file;?>">
                    <small style="color:red;"><?php echo form_error('info_file') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea class="form-control" id="comment" rows="5" name="desc_info"><?php echo $info->desc_info;?></textarea>
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
