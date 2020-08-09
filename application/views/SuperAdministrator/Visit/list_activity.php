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
              <th>Planning Visit</th>
              <th>Actual Visit</th>
              <th>Percent Visit</th>
              <th>Month</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Customer</th>
              <th>Planning Visit</th>
              <th>Actual Visit</th>
              <th>Percent Visit</th>
              <th>Month</th>
              <th style="width: 10%">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no=1;
            foreach($ap as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->customer_name == null){echo "-";}else{echo $item->customer_name;} ?></td>
              <td><?php echo $item->ap_visit ?></td>
              <td><?php echo $item->countVisit; ?></td>
              <td><?php if(round($item->percentage,2) > 80){echo "<span class='badge badge-primary'>".round($item->percentage,2)." %</span>";}else if(round($item->percentage,2) > 50){echo "<span class='badge badge-warning'>".round($item->percentage,2)." %</span>";}else{echo "<span class='badge badge-danger'>".round($item->percentage,2)." %</span>";} ?></td>
              <td><?php echo date_format(new datetime($item->ap_bulan_tahun),"F Y"); ?></td>
              <td>
                <div class="form-button-action">
                  <a href="<?php echo site_url('CVisit/list_visit/'.$item->ap_id) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Visit">
                    <i class="fa fa-edit"></i>
                  </a>
                </div>
              </td>
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
