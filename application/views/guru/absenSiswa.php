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
                        <div class="map-data m-b-40">
                        <div class="row">
                            <div class="col-lg">
                                <h2 class="title-1 m-b-25">Absen Siswa</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id Siswa</th>
                                                <th>NISN</th>
                                                <th>Nama Siswa</th>
                                                <th>Kehadiran</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($absen as $key) { ?>
                                            <tr>
                                                <td>
                                                    <?= $key->no_induk?>
                                                </td>
                                                <td>
                                                    <?= $key->NISN?>
                                                </td>
                                                <td>
                                                    <?= $key->NamaSiswa?>
                                                </td>
                                                <td>
                                                    <?php if ($key->status == 0) {
                                                        echo "alpha";
                                                    } else if ($key->status == 1) {
                                                        echo "Hadir";
                                                    } else if ($key->status == 2){
                                                        echo "Izin";
                                                    } else if ($key->status == 3){
                                                        echo "Sakit";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-danger btn-sm" href="<?=base_url()?>absen/updateAbsenSiswa/<?=$key->id_absen_siswa;?>/<?=$key->id_absen?>/0">Alpha</a>
                                                    <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>absen/updateAbsenSiswa/<?=$key->id_absen_siswa;?>/<?=$key->id_absen?>/1">Hadir</a>
                                                    <a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>absen/updateAbsenSiswa/<?=$key->id_absen_siswa;?>/<?=$key->id_absen?>/2">Izin</a>
                                                    <a type="button" class="btn btn-warning btn-sm" href="<?=base_url()?>absen/updateAbsenSiswa/<?=$key->id_absen_siswa;?>/<?=$key->id_absen?>/3">Sakit</a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
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