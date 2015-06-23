<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title><?= $title ?></title>
    

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/lib/twitter/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <?php  
    if(isset($additional_css) && !empty($additional_css) && is_array($additional_css)){
        foreach ($additional_css as $value) {
        echo'<link href="'. base_url().'assets/css/'.$value.'.css" rel="stylesheet">';
        }
    }
    if(isset($additional_js) && !empty($additional_js) && is_array($additional_js)){
        foreach ($additional_js as $value) {
           echo'<script src="'.base_url().'assets/js/'.$value.'.js"></script>';
        }
    }
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>