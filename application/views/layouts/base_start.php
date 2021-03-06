<!-- base_start.php -->

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php isset($title) ?: $title = 'Sewpad |'; echo $title ?></title>
    <title>Home</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
    <![endif]-->
  <style type="text/css">
    p,h3 {
    padding: 1px 10px;
    }

    .navbar-inverse {
    background-color: #0000;
    border-color: #080808;
    }
  </style>  
  </head>
  <body>
  <?php $this->load->view('layouts/header') ?>