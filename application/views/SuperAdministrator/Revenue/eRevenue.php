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
          <form role="form" action="<?php echo site_url('CRevenue/update') ?>" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Edit <?php echo $title ?></div>
            </div>
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="rev_id_ap" value="<?php echo $rev->rev_id_ap; ?>">
                <input type="hidden" name="id_sales" value="<?php echo $rev->ap_id_sales; ?>">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Sales</label>
                    <input type="text" class="form-control" name="sales_name" placeholder="Sales Name" readonly value="<?php echo $rev->sales_name; ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Customer</label>
                    <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" readonly value="<?php echo $rev->customer_name; ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Plan Revenue</label>
                    <input type="text" class="form-control" name="plan_revenue" placeholder="Plan Revenue" readonly  value="Rp. <?php echo number_format($rev->ap_plan_revenue); ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Month</label>
                    <input type="text" class="form-control" name="month" placeholder="Month" readonly value="<?php echo date_format(new datetime($rev->ap_bulan_tahun),"F Y"); ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Total Revenue</label>
                    <input type="text" class="form-control" name="total_revenue" placeholder="Total Revenue" value="Rp. <?php echo number_format($rev->rev_total); ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Week 1</label>&nbsp;<small style="color:red;">*</small>
                    <input type="number" class="form-control" name="rev_week1" placeholder="Enter Revenue Week 1" min="0" required value="<?php echo $rev->rev_week1; ?>">
                    <small style="color:red;"><?php echo form_error('rev_week1') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Week 2</label>&nbsp;<small style="color:red;">*</small>
                    <input type="number" class="form-control" name="rev_week2" placeholder="Enter Revenue Week 2" min="0" required value="<?php echo $rev->rev_week2; ?>">
                    <small style="color:red;"><?php echo form_error('rev_week2') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Week 3</label>&nbsp;<small style="color:red;">*</small>
                    <input type="number" class="form-control" name="rev_week3" placeholder="Enter Revenue Week 3" min="0" required value="<?php echo $rev->rev_week3; ?>">
                    <small style="color:red;"><?php echo form_error('rev_week3') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="email2">Week 4</label>&nbsp;<small style="color:red;">*</small>
                    <input type="number" class="form-control" name="rev_week4" placeholder="Enter Revenue Week 4" min="0" required value="<?php echo $rev->rev_week4; ?>">
                    <small style="color:red;"><?php echo form_error('rev_week4') ?></small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                    <label for="comment">Rest Revenue</label>
                    <input type="number" class="form-control" name="rev_sisa" placeholder="Rest Revenue" value="<?php echo $rev->rev_sisa; ?>">
                    <small style="color:red;"><?php echo form_error('rev_sisa') ?></small>
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
