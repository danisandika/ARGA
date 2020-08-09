<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            <h5 class="text-white op-7 mb-2"><?php echo $this->session->userdata('user_role') ?></h5>
          </div>

        </div>
      </div>
    </div>
    <div class="page-inner mt--5">
      <div class="row mt--2">
        <div class="col-md-6">
          <div class="card full-height">
            <div class="card-body">
              <div class="card-title">Monthly sales visits</div>
              <div class="card-category">Information about Sales Visit on <?php echo date('F'); ?></div>
              <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                <div class="col-md-12">
                  <div id="chart-container">
                    <canvas id="totalVisitSales"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card full-height">
            <div class="card-body">
              <div class="card-title">Total income & Rest of Money statistics in <?php echo date('Y'); ?></div>
              <div class="row py-3">
                <div class="col-md-4 d-flex flex-column justify-content-around">
                  <div>
                    <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                    <h3 class="fw-bold">Rp.<?php echo number_format($totalincome->total); ?></h3>
                  </div>
                  <div>
                    <h6 class="fw-bold text-uppercase text-danger op-8">Total Rest</h6>
                    <h3 class="fw-bold">Rp.<?php echo number_format($totalincome->rest); ?></h3>
                  </div>
                </div>
                <div class="col-md-8">
                  <div id="chart-container">
                    <canvas id="totalIncomeChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-head-row">
                <div class="card-title">Sales Report in <?php echo date('Y'); ?></div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Sales</th>
                      <th>Plan</th>
                      <th>Revenue</th>
                      <th>Rest</th>
                      <th>Percentage</th>
                      <th>Month</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Sales</th>
                      <th>Plan</th>
                      <th>Revenue</th>
                      <th>Rest</th>
                      <th>Percentage</th>
                      <th>Month</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($resume as $item){
                     ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php if($item->sales == null){echo "-";}else{echo $item->sales;} ?></td>
                      <td>Rp.<?php if($item->plan == null){echo "-";}else{echo number_format($item->plan);} ?></td>
                      <td>Rp.<?php if($item->revenue == null){echo "-";}else{echo number_format($item->revenue);} ?></td>
                      <td>Rp.<?php if($item->sisa == null){echo "-";}else{echo number_format($item->sisa);} ?></td>
                      <td><?php echo round($item->precentage,2) ?>%</td>
                      <td><?php echo date_format(new datetime($item->date),"F Y"); ?></td>

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
