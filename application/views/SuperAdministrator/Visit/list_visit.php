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
              <th>Date</th>
              <th>Type</th>
              <th>Activity</th>
              <th>Result</th>
              <th>Problem</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Type</th>
              <th>Activity</th>
              <th>Result</th>
              <th>Problem</th>
              
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no=1;
            foreach($visit as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->visit_tanggal == null){echo "-";}else{echo date_format(new datetime($item->visit_tanggal),"d F Y");} ?></td>
              <td><?php if($item->visit_jenis_FU == null){echo "-";}else{echo $item->visit_jenis_FU;} ?></td>
              <td><?php if($item->visit_kegiatan == null){echo "-";}else{echo $item->visit_kegiatan;} ?></td>
              <td><?php if($item->visit_result_FU == null){echo "-";}else{echo $item->visit_result_FU;} ?></td>
              <td><?php if($item->visit_problem == null){echo "-";}else{echo $item->visit_problem;} ?></td>


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
