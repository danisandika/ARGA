<div class="main-panel">
<div class="content">
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title"><?php echo $title ?></h4>
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
        <a href="#"><?php echo $title ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">View Data</a>
      </li>
    </ul>
  </div>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title"><?php echo $title ?> Data's</h4>

      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No</th>
              <th>Customer</th>
              <th>Plan Revenue</th>
              <th>Week 1</th>
              <th>Week 2</th>
              <th>Week 3</th>
              <th>Week 4</th>
              <th>Actual Revenue</th>
              <th>Rest</th>
              <th>Percentage</th>
              <th>Month</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Customer</th>
              <th>Plan Revenue</th>
              <th>Week 1</th>
              <th>Week 2</th>
              <th>Week 3</th>
              <th>Week 4</th>
              <th>Actual Revenue</th>
              <th>Rest</th>
              <th>Percentage</th>
              <th>Month</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no=1;
            foreach($rev as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->customer_name == null){echo "-";}else{echo $item->customer_name;} ?></td>
              <td>Rp.<?php if($item->ap_plan_revenue == null){echo "-";}else{echo number_format($item->ap_plan_revenue);} ?></td>

              <td>Rp.<?php if($item->rev_week1 == null){echo "-";}else{echo number_format($item->rev_week1);} ?></td>
              <td>Rp.<?php if($item->rev_week2 == null){echo "-";}else{echo number_format($item->rev_week2);} ?></td>
              <td>Rp.<?php if($item->rev_week3 == null){echo "-";}else{echo number_format($item->rev_week3);} ?></td>
              <td>Rp.<?php if($item->rev_week4 == null){echo "-";}else{echo number_format($item->rev_week4);} ?></td>
              <td>Rp.<?php if($item->rev_total == null){echo "-";}else{echo number_format($item->rev_total);} ?></td>
              <td>Rp.<?php if($item->rev_sisa == null){echo "-";}else{echo number_format($item->rev_sisa);} ?></td>
              <td><?php echo round($item->precentage,2) ?>%</td>
              <td><?php echo date_format(new datetime($item->ap_bulan_tahun),"F Y"); ?></td>

            </tr>
          <?php $no++;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="show_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Details</span>
          <span class="fw-light">
          Activity Plan
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>Week 1</label>
                <input type="text" id="week1" name="week1" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-6 pr-0">
              <div class="form-group form-group-default">
                <label>Week 2</label>
                <input type="text" id="week2" name="week2" class="form-control" readonly>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>Week 3</label>
                <input type="text" id="week3" name="week3" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-6 pr-0">
              <div class="form-group form-group-default">
                <label>Week 4</label>
                <input type="text" id="week4" name="week4" class="form-control" readonly>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label>Total</label>
                <input type="text" id="totall" name="totall" class="form-control" readonly>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer no-bd">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
