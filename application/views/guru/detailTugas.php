<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Guru</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2') { ?>
    <!-- <div align="left">
  <a href="<?php echo base_url('index.php/admin/guru/tambah/'); ?>" class="btn btn-success">Tambah</a>
</div> -->
    <br>
  <?php } ?>
  <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                        <h3 class="title-5 m-b-35">Detail Tugas</h3>
                        <?php echo $this->session->flashdata('alert');?>
                        <?php foreach ($tugas as $key) {?> 
                        <!-- <form action="<?= base_url('admin/prosesTambahPengumuman')?>" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>Isi Detail Tugas</strong>
                                </div>
                                <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label"><strong><?= $key->judul ?></strong></label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label"><u></u></label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="textarea-input" class=" form-control-label"><?= $key->tgl_posting?></label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label"><u></u></label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="textarea-input" class=" form-control-label"><?= $key->deadline?></label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-7">
                                               <p><?php echo $key->isi?></p> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-7">
                                               <p>Download File Tugas<a href="<?= base_url()."tugas/downloadTugas/".$key->file?>"><?php echo $key->file?></a></p> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>        
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            </div>
        </div>
    </div>
    
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo site_url('index.php/login/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

    <!-- ... -->
    <!-- di sini ada kode yang panjang -->
    <!-- ... -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
    <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>


    </body>

    </html>