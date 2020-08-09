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
          <form role="form" action="<?php echo site_url('CSActivity/tambah') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Add <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="email2">Customer Name</label>&nbsp;<small style="color:red;">*</small>
                    <select class="form-control" name="customer_id" required id="customer_id">
                      <option selected disabled>---Select Customer---</option>
                      <?php foreach($cus as $item){ ?>
                      <option value="<?php echo $item->customer_id ?>"><?php echo $item->customer_name; ?></option>
                      <?php } ?>
                    </select>
                    <small style="color:red;"><?php echo form_error('customer_id') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Address</label>
                    <input type="text" class="form-control" name="customer_alamat" placeholder="Customer Address" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Channel</label>
                    <input type="text" class="form-control" name="customer_channel" placeholder="Customer Channel" readonly>

                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Plan Revenue</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" name="ap_plan_revenue" placeholder="Plan Revenue">
                    <small style="color:red;"><?php echo form_error('ap_plan_revenue') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Plan Visit</label>&nbsp;<small style="color:red;">*</small>
                    <input type="number" class="form-control" name="ap_visit" placeholder="Enter Plan Visit">
                    <small style="color:red;"><?php echo form_error('ap_visit') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Month Year</label>&nbsp;<small style="color:red;">*</small>
                    <input type="date" class="form-control" name="ap_bulan_tahun" placeholder="Enter Month" min="<?php echo date('Y-m'); ?>">
                    <small style="color:red;"><?php echo form_error('ap_bulan_tahun') ?></small>
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
