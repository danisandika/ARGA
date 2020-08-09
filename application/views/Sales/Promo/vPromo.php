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
        <h4 class="card-title">Promotion Data's</h4>


      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No</th>
              <th>Promo's Name</th>
              <th>Description</th>
              <th>Last Update</th>
              <th>Update By</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Promo's Name</th>
              <th>Description</th>
              <th>Last Update</th>
              <th>Update By</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no=1;
            foreach($promo as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->promo == null){echo "-";}else{echo $item->promo;} ?></td>
              <td><?php if($item->deskripsi == null){echo "-";}else{echo $item->deskripsi;} ?></td>
              <td><?php echo date_format(new datetime($item->moddate),"d F Y"); ?></td>
              <td><?php if($item->modby == null){echo "-";}else{echo $item->modifiedby;} ?></td>
              <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
              <td>
                <div class="form-button-action">

                  <a href="<?php echo base_url()?>upload/promo/<?php echo $item->promo_file ?>" download="<?php echo $item->promo_file ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Download">
                    <i class="fa fa-download"></i>
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
