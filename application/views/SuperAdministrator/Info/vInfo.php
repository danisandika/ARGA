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
        <h4 class="card-title">Information Data's</h4>
        <a href="<?php echo site_url('CInfo/tInfo')?>" class="btn btn-primary btn-round ml-auto">
          <i class="fa fa-plus"></i>
          Add Data
        </a>

      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No</th>
              <th>Information</th>
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
              <th>Information</th>
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
            foreach($info as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->nama_info == null){echo "-";}else{echo $item->nama_info;} ?></td>
              <td><?php if($item->desc_info == null){echo "-";}else{echo $item->desc_info;} ?></td>
              <td><?php echo date_format(new datetime($item->moddate),"d F Y"); ?></td>
              <td><?php if($item->modby == null){echo "-";}else{echo $item->modifiedby;} ?></td>
              <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
              <td>
                <div class="form-button-action">
                  <a href="<?php echo site_url('CInfo/edit/'.$item->id_info) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="<?php echo base_url()?>upload/info/<?php echo $item->info_file ?>" download="<?php echo $item->info_file ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Download">
                    <i class="fa fa-download"></i>
                  </a>
                  <?php if($item->status==1){ ?>
                    <a  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteConfirm('<?php echo base_url('CInfo/delete/'.$item->id_info) ?>')">
                      <i class="fa fa-times"></i>
                    </a>
                  <?php }else{ ?>
                    <a data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="Activate" onclick="aktifConfirm('<?php echo base_url('CInfo/active/'.$item->id_info) ?>')">
                      <i class="fa fa-check"></i>
                    </a>
                  <?php } ?>

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
