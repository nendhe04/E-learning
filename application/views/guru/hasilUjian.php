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
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Ujian</h3>
<!--                <p><?php //echo "<pre>"; print_r($ujian); echo "</pre>";?></p>-->
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                      <div class="card card-body">
                        <p class="text-small">Aturan Penilaian Essay
                            <ul>
                                <li>1 Soal Essay memiliki point 0-5</li>
                                <li>Yang dimasukkan di nilai essay merupakan total point dari semua soal essay</li>
                            </ul>
                        </p>
                            <!-- <a href="#modalUjian"  type="button" data-toggle="modal" class="btn btn-primary pull-right">Buat Ujian</a> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Nama Ujian</th>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Jawaban</th>
                                        <th>Nilai Pilgan</th>
                                        <th>Nilai Essay</th>
                                        <th>Nilai Total</th>
                                        <th>Jumlah Soal</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($jawaban as $k) {
                                     ?>
                                    <tr>
                                        <td><?php foreach ($ujian as $key) {
                                                if ($key->id == $k->id_ujian) {
                                                    echo $key->judul;
                                                }
                                            }?>
                                        </td>
                                        <td><?=$k->tgl?></td>
                                        <td><?php foreach ($siswa as $key) {
                                                if ($key->id == $k->no_induk) {
                                                    echo $key->NamaSiswa;
                                                }
                                            }?></td>
                                        <td><?=$k->jawaban?></td>
                                        <td><?=$k->nilai_pilgan?></td>
                                        <td><?php
                                        if ($k->nilai_essay=='') {
                                            ?>
                                            <form action="<?=base_url()?>guru/ujian/nilaiEssay/<?=$k->id_jawaban?>/<?=$id_ujian?>" method="post">
                                                <input type="number" name="nilai_essay" placeholder="total point" style="border: 1px solid black;width: 100px">
                                                <input type="hidden" name="nilai_pilgan" value="<?=$k->nilai_pilgan?>">
                                                <input type="hidden" name="jumlah_soal" value="<?=$k->jumlah_soal?>">
                                                <button type="Submit" class="btn btn-primary btn-sm">Submit</button>
                                            </form>
                                            <?php
                                        }else{
                                            echo $k->nilai_essay;
                                        }
                                        ?></td>
                                        <td><?=round($k->nilai_total,2)?></td>
                                        <td><?=$k->jumlah_soal?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                      </div>
                    </div>
                </div>
                <br>
                
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>
    
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#laki").click(function(){
        $("#perempuan").attr("checked", false);
        $("#laki").attr("checked", true);

    });
    $("#perempuan").click(function(){         
        $("#laki").attr("checked", false);
        $("#perempuan").attr("checked", true);
    });
});
</script>

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
