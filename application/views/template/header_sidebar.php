<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title; ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo base_url('assets/css/simple-sidebar.css');?>" rel="stylesheet">
</head>

<body>
  <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="<?php echo site_url();?>">Perpustakaan</a></li>        
        <li><a href="<?php echo site_url('peminjaman/riwayat');?>"><span class="glyphicon glyphicon-time"></span> Riwayat Peminjaman</a></li>
        <li><a href="<?php echo site_url('setting');?>"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
        <li><a href="<?php echo site_url('logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">