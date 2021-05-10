<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/siswa/overviewSiswa') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <?php if ($this->session->userdata('level') == '3') { ?>
      <!-- <div align="left">
    <a href="<?php echo base_url('index.php/admin/siswa/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div> -->
      <br>
    <?php } ?>
    <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Profile Siswa</h3>
                <div class="mx-auto d-block">
                    <?php if ($profile[0]->foto == null) { ?>
                        <img class="rounded-circle " src="<?=base_url('assets/images/icon/user.png') ?>" alt="Card image cap">
                        
                    <?php }else{ ?>
                        <img class="rounded-circle " src="<?=base_url('assets/images/user/'.$profile[0]->foto) ?>" alt="Card image cap">
                    
                    <?php }?>
                </div>
                <div class="filters">
                    <form action="<?= base_url('siswa/updategambar')?>" enctype="multipart/form-data" method="post" class="row form-group">
                        <div class="col col-md-3">
                            <?php if ($this->session->flashdata('error') != null) {?>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">error</span>
                                    <?= $this->session->flashdata('error') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }?>
                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                        </div>
                        <div class="col-10 col-md-5">
                            <button type="submit" class="btn btn-primary btn-sm">Update Gambar</button>
                        </div>
                    </form>
                    <!-- <form action="<?=base_url('siswa/updateprofile/').$this->session->userdata('id_User');?>" method="post"> -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static"><?=
                                $this->session->userdata('username');
                                ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END MAP DATA-->
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
              <span aria-hidden="true">×</span>
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