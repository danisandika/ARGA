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
          <form role="form" action="<?php echo site_url('CSVisit/tambah') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Add <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="ap_id" value="<?php echo $visitid; ?>">
                    <label for="email2">Customer Name</label>&nbsp;<small style="color:red;">*</small>
                    <input type="text" class="form-control" readonly value="<?php echo $customerVisit->customer_name; ?>" placeholder="Customer Name">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Date Visit</label>&nbsp;<small style="color:red;">*</small>
                    <input type="date" class="form-control" name="visit_date" placeholder="Date" min="<?php echo date('Y-m-d') ?>">
                    <small style="color:red;"><?php echo form_error('visit_date') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Type</label>&nbsp;<small style="color:red;">*</small>
                    <select class="form-control" name="visit_type">
                      <option value="" disabled selected>--Select Visit Type--</option>
                      <option value="Visit">Visit</option>
                      <option value="Call">Call</option>
                      <option value="Offer">Offer</option>
                      <option value="Estimation">Estimation</option>
                    </select>
                    <small style="color:red;"><?php echo form_error('visit_type') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="email2">Visit Activity</label>&nbsp;<small style="color:red;">*</small>
                    <select class="form-control" name="visit_activity">
                      <option value="" disabled selected>--Select Visit Activity--</option>
                      <option value="Collect Order">Collect Order</option>
                      <option value="Delivery">Delivery</option>
                      <option value="Follow Up Tagihan">Follow Up Tagihan</option>
                    </select>
                    <small style="color:red;"><?php echo form_error('visit_activity') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Result</label>
                    <textarea name="visit_result" rows="5" cols="50" class="form-control"></textarea>

                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Problem</label>
                    <textarea name="visit_problem" rows="5" cols="50" class="form-control"></textarea>

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
