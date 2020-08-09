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
            <a href="#">Add Data</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form role="form" action="<?php echo site_url('CPromo/tambah') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Add <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Promo Name</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" name="promo" placeholder="Enter Promo Name">
                    <small style="color:red;"><?php echo form_error('promo') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">File</label>&nbsp;<small style="color:red;">*</small>
                    <input id="fil" type="file" class="form-control col-lg-12" name="promo_file" required/>
                    <small style="color:red;"><?php echo form_error('promo_file') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea class="form-control" id="comment" rows="5" name="deskripsi"></textarea>
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
