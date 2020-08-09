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
        <h4 class="card-title">Role Data's</h4>
      
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No</th>
              <th>Position</th>
              <th>Description</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Position</th>
              <th>Description</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no=1;
            foreach($role as $item){
             ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php if($item->nama_role == null){echo "-";}else{echo $item->nama_role;} ?></td>
              <td><?php if($item->deskripsi == null){echo "-";}else{echo $item->deskripsi;} ?></td>
              <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
              <td>
                <div class="form-button-action">
                  <a href="<?php echo site_url('CRole/edit/'.$item->id_role) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                    <i class="fa fa-edit"></i>
                  </a>
                  <?php if($item->status==1){ ?>
                    <a  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteConfirm('<?php echo base_url('CRole/delete/'.$item->id_role) ?>')">
                      <i class="fa fa-times"></i>
                    </a>
                  <?php }else{ ?>
                    <a data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="Activate" onclick="aktifConfirm('<?php echo base_url('CRole/active/'.$item->id_role) ?>')">
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
            <div class="modal fade resume_role" id="detRowModal<?php echo $no?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                      Details</span>
                      <span class="fw-light">
                        <?php echo $item->nama_role ?>
                      </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="small"><?php echo $item->deskripsi ?></p>
                    <form>
                      <div class="row">
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
                            <?php if($item->modby != null){echo $item->modifiedby;}else{echo "-";} ?>
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
