
    <div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/guru/overviewGuru')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Materi</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2'){ ?>
  <div align="left">
    <a href="<?php echo base_url('index.php/guru/materi/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div>
  <br>
<?php } ?>

      <br>
      <table class="table table-hover" id="myTable">
        <thead>
          <th>No</th>
          <th>Judul</th>
          <th>Kelas</th>
          <th>Mata Pelajaran</th>
          <th>Tanggal Upload</th>
          <th></th>
          <!-- <?php if ($this->session->userdata('level') == '1') { ?> -->
          <th>Action</th>
        <!-- <?php } ?> -->
        </thead>
        <tbody id="isi_user">
          <?php $no=1; foreach ($materi as $key) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->judul ?></td>
              <td><?php echo $key->KodeKelas; ?></td>
              <td><?php echo $key->KodeMapel; ?></td>
              <td><?php echo $key->tgl_posting; ?></td>
              <td>
              <td>
              <div class="table-data-feature">
              <a href="<?= base_url('guru/materi/detailMateri/').$key->id_materi?>"class="item" data-toggle="tooltip" data-placement="top" title="Open">
                  <i class="btn btn-info">Detail"></i>
                </a>
                <a href="<?= base_url('guru/materi/editMateri/'). $key->id_materi?>"class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                  <i class="btn btn-warning">Edit</i>
                </a>
                <a href="<?= base_url('guru/materi/hapusMateri/').$key->id_materi."/".$kodeKelas."/".$kodeMapel?>" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="btn btn-danger">Hapus"></i>
                </a>
              </div>
            </td>
            </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>

  
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
$(document).ready( function () {
$('#myTable').DataTable();

} );

</script>


</body>

</html>
