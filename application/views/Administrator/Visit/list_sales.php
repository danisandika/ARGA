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
        <a href="#">View Data Sales</a>
      </li>
    </ul>
  </div>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Sales Data's</h4>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th style="width: 10%">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no=1;
            foreach($user as $item) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $item->nama ?></td>
              <td><?php if($item->no_telp == null){echo "-";}else{echo $item->no_telp;} ?></td>
              <td><?php if($item->email == null){echo "-";}else{echo $item->email;} ?></td>
              <td>
                <div class="form-button-action">
                  <a href="<?php echo site_url('CAVisit/list_activity/'.$item->id_user) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Activity">
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
