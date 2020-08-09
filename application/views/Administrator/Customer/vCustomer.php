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
        <h4 class="card-title">Customer Data's</h4>
        <a href="<?php echo site_url('CACustomer/tCustomer')?>" class="btn btn-primary btn-round ml-auto">
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
              <th>Name</th>
              <th>Channel</th>
              <th>Address</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Channel</th>
              <th>Address</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no=1;
            foreach($cust as $item) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $item->customer_name ?></td>
              <td><?php echo $item->customer_channel ?></td>
              <td><?php if($item->customer_alamat == null){echo "-";}else{echo $item->customer_alamat;} ?></td>
              <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
              <td>
                <div class="form-button-action">
                  <a href="<?php echo site_url('CACustomer/edit/'.$item->customer_id) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                    <i class="fa fa-edit"></i>
                  </a>
                  <?php if($item->status==1){ ?>
                    <a  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteConfirm('<?php echo base_url('CACustomer/delete/'.$item->customer_id) ?>')">
                      <i class="fa fa-times"></i>
                    </a>
                  <?php }else{ ?>
                    <a data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="Activate" onclick="aktifConfirm('<?php echo base_url('CACustomer/active/'.$item->customer_id) ?>')">
                      <i class="fa fa-check"></i>
                    </a>
                  <?php } ?>
                  <a href="#detRowModal<?php echo $no; ?>" data-toggle="modal" title="" class="btn btn-link btn-info" >
                    <i class="fa fa-plus" data-toggle="tooltip" data-original-title="Details"></i>
                  </a>
                </div>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="detRowModal<?php echo $no?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                      Details</span>
                      <span class="fw-light">
                      <?php echo $item->customer_name ?>
                      </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   <p class="small">Number : <?php echo $item->customer_no ?></p>
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default">
                            <label>Name</label>
                            <?php if($item->customer_name == null){echo "-";}else{echo $item->customer_name;} ?>
                          </div>
                        </div>
                        <div class="col-md-6 pr-0">
                          <div class="form-group form-group-default">
                            <label>Channel</label>
                            <?php if($item->customer_channel == null){echo "-";}else{echo $item->customer_channel;} ?>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group form-group-default">
                            <label>Address</label>
                            <?php if($item->customer_alamat == null){echo "-";}else{echo $item->customer_alamat;} ?>
                          </div>
                        </div>
                        <div class="col-md-6 pr-0">
                          <div class="form-group form-group-default">
                            <label>Create By</label>
                            <?php echo $item->createby ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Create Date</label>
                            <?php echo date('d F Y', strtotime($item->creadate))?>
                          </div>
                        </div>
                        <div class="col-md-6 pr-0">
                          <div class="form-group form-group-default">
                            <label>Modified By</label>
                            <?php if($item->modby == null){echo "-";}else{{echo $item->modifiedby;}} ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Modified Date</label>
                            <?php if($item->moddate != null){echo date('d F Y', strtotime($item->moddate));}else{echo "-";} ?>
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
