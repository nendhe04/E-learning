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
      <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="title-5 m-b-35">Tugas Siswa </h3>
                                <?php echo $this->session->flashdata('alert');?>
                                <?php foreach ($tugas as $i) {?> 
                                <form action="<?= base_url('tugas/prosesTambahTugas')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Isi Tugas</strong>
                                        </div>
                                        <div class="card-body card-block">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label"><strong><?= $i->judul ?></strong></label>
                                                    </div>

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label"><u><?= $i->KodeGuru?></u></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="textarea-input" class=" form-control-label"><b>Start</b>  <?= $i->tgl_posting?></label>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label"><u></u></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="textarea-input" class=" form-control-label"><b>deadline</b>  <?= $i->deadline?></label>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-7">
                                                    <p><?php echo $i->isi?></p> 
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-7">
                                                    <p>Download File tugas <a href="<?= base_url()."Siswa/tugas/download/".$i->file?>"><?php echo $i->file?></a></p> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>        
                                </form>
                                <?php }?>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="mx-auto d-block">Nilai</strong>
                                        </div>
                                        <div class="card-body mx-auto d-block">
                                            <h1><?php if (!empty($nilai)) {
                                                echo $nilai[0]->nilai;
                                            }else{
                                                echo 0;
                                            } ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php echo $this->session->flashdata('alert');?>
    
                                    <form action="<?= base_url('siswa/tugas/uploadTugas')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Upload tugas</strong>
                                            </div>
                                            <div class="card-body card-block">
                                                <?php if (isset($error)) {?>
                                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                        <span class="badge badge-pill badge-danger">Error</span>
                                                        <?= $error?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <?php }?>
                                                <?php if ($this->session->flashdata('success') != null) {?>
                                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                        <span class="badge badge-pill badge-success">Success</span>
                                                        <?= $this->session->flashdata('success') ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <?php }?>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Upload Tugas</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="hidden" id="text-input" value="<?= $kodeKelas?>" name="KodeKelas" class="form-control">
                                                        <input type="hidden" id="text-input" value="<?= $idtugas?>" name="id_tugas" class="form-control">
                                                        <input type="hidden" id="text-input" value="<?= $kodeMapel?>" name="KodeMapel" class="form-control">
                                                        <input type="file" id="text-input" name="tugas" class="form-control">
                                                    </div>
                                                </div>
    
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END MAIN CONTENT-->
                        <!-- END PAGE CONTAINER-->
                        </div>
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