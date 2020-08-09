<?php

if(isset($incomeMonth)){
foreach ($incomeMonth as $items) {
  // code...
  $totalincomeGraph[] = $items->income;
  $monthGraph[] = $items->date;
  //echo $items->income;
  //echo $items->date;
}}

if(isset($visit)){
foreach ($visit as $items) {
  // code...
  $getvisit[] = $items->vis;
  $getnameSales[] = $items->visname;
  //echo $items->visname;
}}



 ?>
  <footer class="footer">
    <div class="container-fluid">

      <div class="copyright ml-auto">
        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
      </div>
    </div>
  </footer>
</div>
<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data Will Be Deleted</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Aktif Confirmation-->
<div class="modal fade" id="aktifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to activate this Data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data Will be Activate</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-aktif" class="btn btn-primary" href="#">Activate</a>
      </div>
    </div>
  </div>
</div>
<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Logo Header</h4>
        <div class="btnSwitch">
          <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
          <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
          <br/>
          <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Navbar Header</h4>
        <div class="btnSwitch">
          <button type="button" class="changeTopBarColor" data-color="dark"></button>
          <button type="button" class="changeTopBarColor" data-color="blue"></button>
          <button type="button" class="changeTopBarColor" data-color="purple"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
          <button type="button" class="changeTopBarColor" data-color="green"></button>
          <button type="button" class="changeTopBarColor" data-color="orange"></button>
          <button type="button" class="changeTopBarColor" data-color="red"></button>
          <button type="button" class="changeTopBarColor" data-color="white"></button>
          <br/>
          <button type="button" class="changeTopBarColor" data-color="dark2"></button>
          <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="purple2"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="green2"></button>
          <button type="button" class="changeTopBarColor" data-color="orange2"></button>
          <button type="button" class="changeTopBarColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button type="button" class="selected changeSideBarColor" data-color="white"></button>
          <button type="button" class="changeSideBarColor" data-color="dark"></button>
          <button type="button" class="changeSideBarColor" data-color="dark2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Background</h4>
        <div class="btnSwitch">
          <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
          <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
          <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
          <button type="button" class="changeBackgroundColor" data-color="dark"></button>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-toggle">
    <i class="flaticon-settings"></i>
  </div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('Atlantis/assets/js/core/jquery.3.2.1.min.js');?>"></script>
<script src="<?php echo base_url('Atlantis/assets/js/core/popper.min.js');?>"></script>
<script src="<?php echo base_url('Atlantis/assets/js/core/bootstrap.min.js');?>"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js');?>"></script>
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js');?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js');?>"></script>


<!-- Chart JS -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/chart.js/chart.min.js');?>"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js');?>"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/chart-circle/circles.min.js');?>"></script>

<!-- Datatables -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/datatables/datatables.min.js');?>"></script>

<!-- Bootstrap Notify -->
<!--<script src="<?php echo base_url('Atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js');?>"></script>-->

<!-- jQuery Vector Maps -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js');?>"></script>
<script src="<?php echo base_url('Atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js');?>"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/sweetalert/sweetalert.min.js');?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url('Atlantis/assets/js/plugin/datatables/datatables.min.js');?>"></script>
<!-- Atlantis JS -->
<script src="<?php echo base_url('Atlantis/assets/js/atlantis.min.js');?>"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('Atlantis/assets/js/setting-demo.js');?>"></script>
<script src="<?php echo base_url('Atlantis/assets/js/demo.js');?>"></script>

<!--Detail Role-->
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.resume_role') .hide()
$('a[href^="#"]').on('click', function(event) {
$('.resume_role') .hide()
  var target = $(this).attr('href');

  $('.resume_role'+target).toggle();

});
});
</script>

<script type="text/javascript">
  function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
</script>

<script type="text/javascript">
  function aktifConfirm(url){
      $('#btn-aktif').attr('href', url);
      $('#aktifModal').modal();
    }
</script>


<script>
$('#add-row').DataTable({
  "pageLength": 5,
});
</script>

<?php if ($this->session->flashdata('success')):  ?>
<script>
swal("Success!", "<?php echo $this->session->flashdata('success') ?>", {
	icon : "success",
	buttons: {
		confirm: {
			className : 'btn btn-success'
		}
	},
});
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('failed')):  ?>
<script>
swal("Failed!", "<?php echo $this->session->flashdata('failed') ?>", {
	icon : "error",
	buttons: {
		confirm: {
			className : 'btn btn-danger'
		}
	},
});
</script>
<?php endif; ?>



<script>



var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

<?php if(!empty($totalincomeGraph)){ ?>
var mytotalIncomeChart = new Chart(totalIncomeChart, {
  type: 'bar',
  data: {
    labels: <?php if(!empty($monthGraph)){ echo json_encode($monthGraph);} ?>,
    datasets : [{
      label: "Total Income",
      backgroundColor: '#ff9e27',
      borderColor: 'rgb(23, 125, 255)',
      data: <?php if(!empty($totalincomeGraph)){ echo json_encode($totalincomeGraph);} ?>,
    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
    scales: {
      yAxes: [{
        ticks: {
          display: false //this will remove only the label
        },
        gridLines : {
          drawBorder: false,
          display : false
        }
      }],
      xAxes : [ {
        gridLines : {
          drawBorder: false,
          display : false
        }
      }]
    },
  }
});
<?php } ?>

var totalVisitSales = document.getElementById('totalVisitSales').getContext('2d');

<?php if(!empty($getvisit)){?>
var mytotalVisitSales = new Chart(totalVisitSales, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: <?php if(!empty($getvisit)){ echo json_encode($getvisit);} ?>,
      backgroundColor: ['#00E566','#FFFE34','#FFAB24','#FF2F15','#7B2CFA','#0126FB','#00E7D5']
    }],

    labels: <?php if(!empty($getnameSales)){ echo json_encode($getnameSales);} ?>
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend : {
      position: 'bottom'
    },
    layout: {
      padding: {
        left: 20,
        right: 20,
        top: 20,
        bottom: 20
      }
    }
  }
});
<?php } ?>


</script>
</body>
</html>
