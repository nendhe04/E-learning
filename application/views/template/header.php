<!DOCTYPE html>
<html lang="en">

<head>
  <title>Apotek Arjasa 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/aos.css">
  <link href="<?php echo base_url(); ?>assets/assets/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/style.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> apotek.arjasa.id</a> 
          </div>
          <div class="col-lg-3 text-right">

            <a href="<?= base_url(). 'index.php/login/login/'; ?>" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Log In</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="<?php echo base_url().'main/index'; ?>" class="d-block">
              <img src="<?php echo base_url('assets/logo.png')?>" alt="Image" class="img-fluid" width="50px" height="50px">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="<?php echo site_url().'beranda';?>" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'pelanggan'; ?>" class="nav-link text-left">List Obat</a>
                </li>
              
              </ul>                                                                                                   
            </nav>

          </div>
        </div>
      </div>

    </header>